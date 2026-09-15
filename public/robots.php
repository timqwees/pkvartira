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
$rawHost = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
$rawHost = preg_replace('/:\d+$/', '', (string)$rawHost) ?? '';
$isProd = str_ends_with(strtolower($rawHost), 'pkvartira.ru');
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

echo "User-agent: *\n";
echo "Disallow: /api/\n";
echo "Disallow: /*?*\n";
echo "Allow: /*?page=\n";
echo "\n";
echo "User-agent: Yandex\n";
echo "Disallow: /api/\n";
echo "Disallow: /*?*\n";
echo "Allow: /*?page=\n";
echo "Crawl-delay: 0.8\n";
echo "\n";
echo "User-agent: Googlebot\n";
echo "Disallow: /api/\n";
echo "Disallow: /*?*\n";
echo "Allow: /*?page=\n";
echo "\n";
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
echo "Sitemap: {$baseUrl}/sitemap.xml\n";
echo "\n";
echo "Host: {$host}\n";