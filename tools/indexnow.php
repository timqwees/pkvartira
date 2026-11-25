<?php
/**
 * IndexNow — уведомление Bing и Яндекс об изменённых страницах.
 *
 * ВАЖНО: проект выкатывается на upgrade.pkvartira.ru (второй сайт), поэтому
 * по умолчанию хост = upgrade.pkvartira.ru. Для основного сайта явно:
 *   php tools/indexnow.php --host=remont.pkvartira.ru
 *
 * Использование:
 *   php tools/indexnow.php                          # все индексируемые URL текущего сайта
 *   php tools/indexnow.php --host=upgrade.pkvartira.ru
 *   php tools/indexnow.php --file=urls.txt          # только URL из файла (по одному на строке)
 *   php tools/indexnow.php --dry-run                # показать, что будет отправлено
 *
 * Требования на стороне сайта (уже выполнены):
 *   - файл ключа доступен: https://<host>/<key>.txt и его содержимое = ключ
 *   - URL из списка принадлежат этому хосту (иначе IndexNow вернёт 422)
 *
 * Коды ответа: 200/202 — принято, 403 — ключ не найден, 422 — чужой хост или битые URL,
 * 429 — слишком много запросов (подождать).
 */

const INDEXNOW_KEY = '769e1df8217a98f76286a4d39b571085';
const INDEXNOW_DEFAULT_HOST = 'upgrade.pkvartira.ru';

const INDEXNOW_ENDPOINTS = [
    'https://api.indexnow.org/indexnow', // шлюз: Bing, Yandex, Seznam, Naver
    'https://www.bing.com/indexnow',
    'https://yandex.com/indexnow',
];

function arg(string $name, ?string $default = null): ?string
{
    foreach ($GLOBALS['argv'] as $a) {
        if (str_starts_with($a, '--' . $name . '=')) {
            return substr($a, strlen($name) + 3);
        }
        if ($a === '--' . $name) {
            return '';
        }
    }
    return $default;
}

/** Индексируемые URL проекта: те же правила, что и в GET /indexnow */
function collectUrls(string $host): array
{
    $root = dirname(__DIR__);
    $urls = [
        '/', '/about', '/contact', '/stocks', '/portfolio', '/reviews', '/prices',
        '/calculator', '/services', '/smeta-obrazec', '/dogovor-obrazec', '/author',
    ];

    $servicesDir = $root . '/public/pages/services';
    if (is_dir($servicesDir)) {
        foreach (scandir($servicesDir) as $item) {
            if ($item === '.' || $item === '..' || $item === 'index.php') {
                continue;
            }
            if (is_file($servicesDir . '/' . $item . '/index.php') && isIndexable('/services/' . $item, $host)) {
                $urls[] = '/services/' . $item;
            }
        }
    }

    // Блог: на обоих доменах canonical self-referencing — отправляем статьи обоим
    $articlesFile = $root . '/public/pages/blog/data/articles.json';
    if (is_file($articlesFile)) {
        $articles = json_decode((string) file_get_contents($articlesFile), true) ?: [];
        $urls[] = '/blogs';
        foreach ($articles as $art) {
            $slug = $art['slug'] ?? '';
            if ($slug !== '') {
                $urls[] = '/blog/' . $slug;
            }
        }
    }

    $urls = array_values(array_unique(array_filter($urls, fn($u) => isIndexable($u, $host))));
    sort($urls);

    return $urls;
}

function isIndexable(string $route, string $host): bool
{
    static $blocked = ['/search', '/soglashenie', '/other', '/kalkulyator-ploshchadi', '/pages'];
    if (in_array($route, $blocked, true)) {
        return false;
    }
    if (str_starts_with($route, '/vakansii')) {
        return false; // noindex
    }
    if (str_starts_with($route, '/services/')) {
        $slug = substr($route, strlen('/services/'));
        $noindex = ['apteka', 'fitness', 'kafe', 'magazin', 'restoran', 'salon-krasoty', 'stomatologiya', 'ukladka-laminata', 'keramogranit-nazarovo'];
        if (in_array($slug, $noindex, true)) {
            return false;
        }
    }

    return true;
}

$host = (string) (arg('host') ?: INDEXNOW_DEFAULT_HOST);
$dryRun = in_array('--dry-run', $argv, true);

$fileArg = arg('file');
if ($fileArg) {
    $urls = array_values(array_filter(array_map('trim', file($fileArg) ?: [])));
} else {
    $urls = array_map(fn($r) => 'https://' . $host . $r, collectUrls($host));
}

if (!$urls) {
    fwrite(STDERR, "Нет URL для отправки\n");
    exit(1);
}

echo 'Host: ' . $host . PHP_EOL;
echo 'URLs: ' . count($urls) . PHP_EOL;

if ($dryRun) {
    echo implode(PHP_EOL, $urls) . PHP_EOL;
    exit(0);
}

$payload = json_encode([
    'host' => $host,
    'key' => INDEXNOW_KEY,
    'keyLocation' => 'https://' . $host . '/' . INDEXNOW_KEY . '.txt',
    'urlList' => array_slice($urls, 0, 10000),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$failed = 0;
foreach (INDEXNOW_ENDPOINTS as $endpoint) {
    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf-8'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
    ]);
    curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);

    $ok = $code >= 200 && $code < 300;
    if (!$ok) {
        $failed++;
    }
    printf("%-42s HTTP %d %s%s\n", $endpoint, $code, $ok ? 'принято' : 'ОШИБКА', $err ? " ($err)" : '');
}

echo $failed === 0
    ? "Готово: все шлюзы приняли список." . PHP_EOL
    : "Внимание: {$failed} шлюз(а) ответили ошибкой — см. коды выше." . PHP_EOL;

exit($failed === 0 ? 0 : 2);
