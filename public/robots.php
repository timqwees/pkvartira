<?php
$rawHost = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
$rawHost = preg_replace('/:\d+$/', '', (string)$rawHost);
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
echo "Content-Signal: allow\n";
echo "\n";
echo "User-agent: Yandex\n";
echo "Disallow: /api/\n";
echo "Disallow: /*?*\n";
echo "Allow: /*?page=\n";
echo "Crawl-delay: 0.8\n";
echo "Content-Signal: allow\n";
echo "\n";
echo "User-agent: Googlebot\n";
echo "Disallow: /api/\n";
echo "Disallow: /*?*\n";
echo "Allow: /*?page=\n";
echo "Content-Signal: allow\n";
echo "\n";
echo "User-agent: GPTBot\n";
echo "Disallow: /api/\n";
echo "Content-Signal: allow\n";
echo "\n";
echo "User-agent: ClaudeBot\n";
echo "Disallow: /api/\n";
echo "Content-Signal: allow\n";
echo "\n";
echo "User-agent: PerplexityBot\n";
echo "Disallow: /api/\n";
echo "Content-Signal: allow\n";
echo "\n";
echo "# Sitemaps\n";
echo "Sitemap: {$baseUrl}/sitemap.xml\n";
echo "\n";
echo "Host: {$host}\n";
echo "\n";
echo "LLM-friendly content: {$baseUrl}/llms-full.txt\n";