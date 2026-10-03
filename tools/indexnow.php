<?php
// IndexNow: уведомление Bing и Яндекс об изменённых страницах.
// Использование:
//   php tools/indexnow.php                — отправить все страницы услуг + главные
//   php tools/indexnow.php urls.txt       — отправить URL из файла (по одному на строке)
//
// Требуется: файл ключа в корне сайта (https://pkvartira.ru/<key>.txt),
// ключ ниже должен совпадать с именем файла.

const INDEXNOW_KEY = '769e1df8217a98f76286a4d39b571085';
const INDEXNOW_HOST = 'pkvartira.ru';
const INDEXNOW_ENDPOINTS = [
    'https://www.bing.com/indexnow',
    'https://yandex.com/indexnow',
];

function collectServiceUrls(): array
{
    $urls = ['https://pkvartira.ru/'];
    $dir = dirname(__DIR__) . '/public/pages';
    foreach (new DirectoryIterator($dir) as $section) {
        if ($section->isDot() || !$section->isDir()) {
            continue;
        }
        $sectionPath = $section->getPathname();
        if ($section->getFilename() === 'services') {
            foreach (new DirectoryIterator($sectionPath) as $page) {
                if ($page->isDot() || !$page->isDir()) {
                    continue;
                }
                if (is_file($page->getPathname() . '/index.php')) {
                    $urls[] = 'https://pkvartira.ru/services/' . $page->getFilename();
                }
            }
            continue;
        }
        if (is_file($sectionPath . '/index.php')) {
            $urls[] = 'https://pkvartira.ru/' . $section->getFilename();
        }
    }
    sort($urls);
    return array_values(array_unique($urls));
}

$urls = [];
if (isset($argv[1]) && is_file($argv[1])) {
    $urls = array_values(array_filter(array_map('trim', file($argv[1]))));
} else {
    $urls = collectServiceUrls();
}

$payload = json_encode([
    'host' => INDEXNOW_HOST,
    'key' => INDEXNOW_KEY,
    'keyLocation' => 'https://pkvartira.ru/' . INDEXNOW_KEY . '.txt',
    'urlList' => $urls,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

echo 'URLs: ' . count($urls) . PHP_EOL;
foreach (INDEXNOW_ENDPOINTS as $endpoint) {
    $ch = curl_init($endpoint);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf-8'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
    ]);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    echo $endpoint . ' -> HTTP ' . $code . ($err ? " ($err)" : '') . PHP_EOL;
}
echo "OK: 202 = принято. Проверьте файл ключа: https://pkvartira.ru/" . INDEXNOW_KEY . ".txt" . PHP_EOL;
