<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$failures = [];

function check(bool $condition, string $message): void
{
    global $failures;
    if (!$condition) {
        $failures[] = $message;
        fwrite(STDERR, "FAIL: {$message}\n");
    }
}

function schemaGraph(array $seo): array
{
    $decoded = json_decode($seo['jsonLd'], true, 512, JSON_THROW_ON_ERROR);
    return $decoded['@graph'] ?? [];
}

$_SERVER = [
    'HTTP_HOST' => 'remont.pkvartira.ru',
    'REQUEST_URI' => '/blog/seo-test',
    'HTTPS' => 'on',
];

$pageUrl = 'https://remont.pkvartira.ru/blog/seo-test';
$customArticle = [
    '@type' => 'BlogPosting',
    '@id' => $pageUrl . '#article',
    'url' => $pageUrl,
    'headline' => 'Каноничная статья',
    'datePublished' => '2024-02-03T00:00:00+00:00',
];
$seoWithCustomArticle = Setting\Route\Functions\TheFunction::seo([
    'title' => 'SEO test',
    'description' => 'Описание тестовой статьи.',
    'url' => $pageUrl,
    'pageType' => 'BlogPosting',
    'schema' => [$customArticle],
]);
$articleNodes = array_values(array_filter(
    schemaGraph($seoWithCustomArticle),
    static fn(array $node): bool => ($node['@type'] ?? null) === 'BlogPosting'
));
check(count($articleNodes) === 1, 'custom BlogPosting is not duplicated');
check(($articleNodes[0]['headline'] ?? null) === 'Каноничная статья', 'custom BlogPosting remains authoritative');

$seoWithoutDates = Setting\Route\Functions\TheFunction::seo([
    'title' => 'SEO test',
    'description' => 'Описание тестовой статьи.',
    'url' => $pageUrl,
    'pageType' => 'BlogPosting',
]);
$generatedArticle = array_values(array_filter(
    schemaGraph($seoWithoutDates),
    static fn(array $node): bool => ($node['@type'] ?? null) === 'BlogPosting'
))[0] ?? [];
check(!array_key_exists('datePublished', $generatedArticle), 'missing publish date is not replaced with the current time');
check(!array_key_exists('dateModified', $generatedArticle), 'missing modified date is not replaced with the current time');

$articleSchema = Setting\Route\Functions\TheFunction::articleSchema([
    'id' => 987654321,
    'slug' => 'seo-test-no-faq',
    'title' => 'Статья без FAQ и дат',
    'meta_description' => 'Описание',
    'content' => 'Обычный текст статьи без секции с вопросами.',
]);
check(!array_key_exists('hasPart', $articleSchema), 'article schema does not invent generic FAQ content');
check(!array_key_exists('datePublished', $articleSchema), 'article schema omits an unknown publication date');
check(!array_key_exists('dateModified', $articleSchema), 'article schema omits an unknown modified date');

$_SERVER = ['HTTP_HOST' => 'upgrade.pkvartira.ru', 'HTTPS' => 'on', 'REQUEST_URI' => '/'];
check(
    Setting\Route\Functions\TheFunction::site()['baseUrl'] === 'https://upgrade.pkvartira.ru',
    'known upgrade subdomain keeps its own canonical base URL'
);

$_SERVER = ['HTTP_HOST' => 'localhost:8080', 'REQUEST_URI' => '/'];
check(
    Setting\Route\Functions\TheFunction::site()['baseUrl'] === 'http://localhost:8080',
    'local canonical URLs retain a non-default development port'
);

$buildEntry = new ReflectionMethod(Setting\Route\Functions\Sitemap::class, 'buildEntry');
$entry = $buildEntry->invoke(new Setting\Route\Functions\Sitemap(), '/about', '0.8', 'weekly', null);
check(!str_contains($entry, '<lastmod>'), 'sitemap omits lastmod when no reliable timestamp is supplied');

if ($failures !== []) {
    fwrite(STDERR, count($failures) . " SEO regression check(s) failed.\n");
    exit(1);
}

echo "All SEO regression checks passed.\n";
