<?php
header('Content-Type: text/plain; charset=utf-8');
// Отдаётся напрямую через RewriteRule в обход роутера, поэтому security-заголовки
// ставим здесь же через header() (те же значения, что в SecurityHeaders::sendSecurity()).
// .htaccess на reg.ru держим без директив Header — только rewrite/сжатие/Expires.
if (!headers_sent()) {
    if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')) {
        header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload');
    }
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=(), payment=(), usb=()');
    header('Cross-Origin-Opener-Policy: same-origin-allow-popups');
    header('Cross-Origin-Resource-Policy: same-origin');
    header('Cross-Origin-Embedder-Policy: unsafe-none');
    header("Content-Security-Policy: upgrade-insecure-requests; frame-ancestors 'self'");
    header('Cache-Control: public, max-age=3600, must-revalidate');
}
// Канонический хост: whitelist вместо suffix-проверки (защита от evil-pkvartira.ru)
require_once dirname(__DIR__) . '/setting/Route/Functions/SiteUrl.php';
$rawHost = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
$rawHost = preg_replace('/:\\d+$/', '', (string)$rawHost) ?? '';
$canonicalHosts = \Setting\Route\Functions\SiteUrl::canonicalHosts();
$isUpgrade = strtolower($rawHost) === 'upgrade.pkvartira.ru';
$isProd = in_array(strtolower($rawHost), $canonicalHosts, true);
if ($isProd) {
    $scheme = 'https';
    $host = 'pkvartira.ru';
} else {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'https' : $scheme;
    }
    $host = $rawHost ?: 'pkvartira.ru';
}
$baseUrl = $scheme . '://' . $host;

// upgrade.pkvartira.ru — легитимный второй сайт (multi-site strategy), открыт для индексации
// Self-referencing canonical + уникальный контент + cross-linking предотвращают канибализацию


// Content-Signal (IETF draft draft-romm-aipref-contentsignals): предпочтения
// использования контента AI-системами. Политика сайта — полный допуск:
// search=yes (поиск), ai-train=yes (обучение), ai-input=yes (ответы).
// Неизвестная директива игнорируется обычными краулерами.
echo "# Content-Signal: search=yes, ai-train=yes, ai-input=yes\n";
echo "Content-Signal: search=yes, ai-train=yes, ai-input=yes\n";
echo "\n";
// Clean-param (Яндекс): склеивает URL с рекламными/трекерными параметрами.
// Без него ?utm_source=… и ?gclid=… считаются отдельными страницами-дублями.
echo "Clean-param: utm_source&utm_medium&utm_campaign&utm_term&utm_content&yclid&gclid&fbclid&ref&from&source\n";
echo "\n";
// Технические и служебные файлы — закрыты от индексации (N-06).
// Сами файлы отдаются с X-Robots-Tag: noindex, follow (роуты в setting/Route/routes.php),
// поэтому поисковик может их обойти и увидеть запрет индексации.
$technicalDisallow = [
    '/llms.txt',
    '/llms-full.txt',
    '/opensearch.xml',
    '/public/documents/',
    '/storage/',
];
foreach (['*', 'Yandex', 'Googlebot'] as $searchBot) {
    echo "User-agent: {$searchBot}\n";
    echo "Disallow: /api/\n";
    echo "Disallow: /mcp/\n";
    echo "Disallow: /indexnow/\n";
    foreach ($technicalDisallow as $path) {
        echo "Disallow: {$path}\n";
    }
    echo "Allow: /*?page=\n";
    echo "Allow: /portfolio?project=\n";
    echo "\n";
}
echo "User-agent: OAI-SearchBot\n";
echo "Allow: /\n";
echo "\n";
// AI-краулеры: ПОЛНЫЙ допуск (Allow: / без единого Disallow) — enterno показывает «Разрешено».
// /api/ в приложении не существует (такие URL и так отдают 404), закрывать ботам нечего.
// Поисковым (*, Yandex, Googlebot) правила не трогаем.
foreach (['GPTBot', 'ChatGPT-User', 'ClaudeBot', 'anthropic-ai', 'PerplexityBot', 'Google-Extended', 'CCBot', 'Applebot-Extended', 'Bytespider', 'cohere-ai', 'Diffbot'] as $aiBot) {
    echo "User-agent: {$aiBot}\n";
    echo "Allow: /\n";
    echo "\n";
}
// LLM/AGENT discovery (ai.txt / agents.json) — открыто для всех.
// /llms.txt и /llms-full.txt остаются закрытыми (N-06): это служебные файлы,
// их содержимое дублирует страницы сайта.
echo "User-agent: *\n";
echo "Allow: /.well-known/agents.json\n";
echo "Allow: /ai-plugin.json\n";
echo "Allow: /openapi.yaml\n";
echo "Allow: /.well-known/api-catalog\n";
echo "Allow: /.well-known/agent-skills/index.json\n";
echo "\n";
echo "Sitemap: {$baseUrl}/sitemap.xml\n";