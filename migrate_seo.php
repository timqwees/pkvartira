<?php
/**
 * SEO Migration Script v2
 * Converts hardcoded SEO in public/pages to use TheFunction::seo() helper
 *
 * Usage: php migrate_seo.php [--dry-run] [--apply]
 */

require_once __DIR__ . '/vendor/autoload.php';

use Setting\Route\Functions\TheFunction;

$dryRun = in_array('--dry-run', $argv);
$apply = in_array('--apply', $argv);

if (!$dryRun && !$apply) {
    echo "Usage: php migrate_seo.php [--dry-run] [--apply]\n";
    echo "  --dry-run  Show what would be changed without writing\n";
    echo "  --apply    Actually write changes\n";
    exit(1);
}

$pagesDir = __DIR__ . '/public/pages';
$indexFiles = glob($pagesDir . '/*/*/index.php');

$stats = ['total' => 0, 'already_using' => 0, 'migrated' => 0, 'skipped' => 0, 'errors' => 0];

foreach ($indexFiles as $file) {
    $stats['total']++;
    $content = file_get_contents($file);
    
    if (strpos($content, 'TheFunction::seo') !== false) {
        $stats['already_using']++;
        continue;
    }
    
    if (strpos($file, '/blog/article/') !== false) {
        $stats['skipped']++;
        continue;
    }
    
    $result = migratePage($file, $content);
    
    if ($result['status'] === 'migrated') {
        $stats['migrated']++;
        if ($apply) {
            file_put_contents($file, $result['newContent']);
        }
        if ($dryRun) {
            echo "MIGRATE: $file\n";
            echo "  Title: {$result['meta']['title']}\n";
            echo "  Type: {$result['meta']['pageType']}\n";
            if (!empty($result['meta']['schema'])) {
                echo "  Custom schema: " . count($result['meta']['schema']) . " items\n";
            }
        }
    } elseif ($result['status'] === 'skipped') {
        $stats['skipped']++;
        if ($dryRun) {
            echo "SKIP: $file - {$result['reason']}\n";
        }
    } else {
        $stats['errors']++;
        echo "ERROR: $file - {$result['reason']}\n";
    }
}

echo "\n=== Summary ===\n";
echo "Total pages: {$stats['total']}\n";
echo "Already using helper: {$stats['already_using']}\n";
echo "Migrated: {$stats['migrated']}\n";
echo "Skipped: {$stats['skipped']}\n";
echo "Errors: {$stats['errors']}\n";

function migratePage(string $file, string $content): array
{
    $parts = splitPhpAndHtml($content);
    $phpBlock = $parts['php'] ?? '';
    $htmlPart = $parts['html'] ?? '';
    
    $vars = extractPhpVariables($phpBlock);
    $seoMeta = extractSeoMetaFromHtml($htmlPart);
    $schemas = extractJsonLd($htmlPart);
    
    $pageType = determinePageType($file, $schemas);
    $options = buildSeoOptions($vars, $seoMeta, $schemas, $pageType, $file);
    
    if (empty($options['title'])) {
        return ['status' => 'skipped', 'reason' => 'Could not extract title'];
    }
    
    $newPhpBlock = generatePhpBlock($options, $vars);
    $newHtmlPart = replaceHtmlHead($htmlPart, $options);
    
    $newContent = $newPhpBlock . "\n" . $newHtmlPart;
    
    if ($newContent === $content) {
        return ['status' => 'skipped', 'reason' => 'No changes generated'];
    }
    
    return [
        'status' => 'migrated',
        'newContent' => $newContent,
        'meta' => $options
    ];
}

function splitPhpAndHtml(string $content): array
{
    if (preg_match('/^(<\?php.*?\?>)/s', $content, $matches)) {
        $phpBlock = $matches[1];
        $htmlPart = substr($content, strlen($phpBlock));
        return ['php' => $phpBlock, 'html' => $htmlPart];
    }
    return ['php' => '', 'html' => $content];
}

function extractPhpVariables(string $phpBlock): array
{
    $vars = ['title' => '', 'description' => '', 'bg_url' => '', 'seoTitle' => '', 'canonical' => ''];
    
    if (preg_match('/\$title\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['title'] = $m[1];
    }
    
    if (preg_match('/\$seoTitle\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['seoTitle'] = $m[1];
    }
    
    if (preg_match('/\$description\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['description'] = $m[1];
    }
    
    if (preg_match('/\$bg_url\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['bg_url'] = $m[1];
    }
    
    if (preg_match('/\$canonical\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['canonical'] = $m[1];
    }
    
    if (preg_match('/\$meta[_-]?(?:desc|description)\s*=\s*["\']([^"\']+)["\']/', $phpBlock, $m)) {
        $vars['description'] = $m[1];
    }
    
    return $vars;
}

function extractSeoMetaFromHtml(string $html): array
{
    $meta = [];
    
    if (preg_match('/<title>(.*?)<\/title>/s', $html, $m)) {
        $title = trim($m[1]);
        if (strpos($title, '<?') === false) {
            $meta['title_raw'] = $title;
        }
    }
    
    if (preg_match('/<meta name="description" content="([^"]*)"/', $html, $m)) {
        $desc = $m[1];
        if (strpos($desc, '<?') !== false) {
            if (preg_match("/truncateSeo\s*\(\s*['\"]([^'\"]+)['\"]/", $desc, $m2)) {
                $meta['description'] = $m2[1];
            } elseif (preg_match("/['\"]([^'\"]{20,})['\"]/", $desc, $m2)) {
                $meta['description'] = $m2[1];
            }
        } else {
            $meta['description'] = html_entity_decode($desc, ENT_QUOTES, 'UTF-8');
        }
    }
    
    if (preg_match('/<link rel="canonical" href="([^"]*)"/', $html, $m)) {
        $canon = $m[1];
        if (strpos($canon, '<?') === false) {
            $meta['canonical'] = $canon;
        }
    }
    
    if (preg_match('/<meta property="og:image" content="([^"]*)"/', $html, $m)) {
        $img = $m[1];
        if (strpos($img, '<?') === false) {
            $meta['og_image'] = $img;
        }
    }
    
    if (preg_match('/<meta property="og:type" content="([^"]*)"/', $html, $m)) {
        $meta['og_type'] = $m[1];
    }
    
    if (preg_match('/<meta property="og:title" content="([^"]*)"/', $html, $m)) {
        $ot = $m[1];
        if (strpos($ot, '<?') === false) {
            $meta['og_title'] = $ot;
        }
    }
    
    if (preg_match('/<meta property="og:description" content="([^"]*)"/', $html, $m)) {
        $od = $m[1];
        if (strpos($od, '<?') === false) {
            $meta['og_description'] = $od;
        }
    }
    
    if (preg_match('/<meta property="og:url" content="([^"]*)"/', $html, $m)) {
        $ou = $m[1];
        if (strpos($ou, '<?') === false) {
            $meta['og_url'] = $ou;
        }
    }
    
    return $meta;
}

function extractJsonLd(string $html): array
{
    $schemas = [];
    
    preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);
    
    foreach ($matches[1] as $script) {
        $script = trim($script);
        if ($script === '') continue;
        
        $cleanScript = preg_replace('/<\?php.*?\?>/s', '', $script);
        $cleanScript = preg_replace('/<\?=.*?\?>/s', '', $cleanScript);
        $cleanScript = trim($cleanScript);
        
        if ($cleanScript === '') continue;
        
        $decoded = json_decode($cleanScript, true);
        if ($decoded === null) continue;
        
        if (isset($decoded['@graph']) && is_array($decoded['@graph'])) {
            foreach ($decoded['@graph'] as $node) {
                $schemas[] = cleanSchemaNode($node);
            }
        } else {
            $schemas[] = cleanSchemaNode($decoded);
        }
    }
    
    return $schemas;
}

function cleanSchemaNode(array $node): array
{
    array_walk_recursive($node, function (&$value) {
        if (is_string($value)) {
            $value = preg_replace('/<\?php.*?\?>/s', '', $value);
            $value = preg_replace('/<\?=.*?\?>/s', '', $value);
            $value = trim($value);
        }
    });
    return $node;
}

function determinePageType(string $file, array $schemas): string
{
    $path = str_replace(__DIR__ . '/public/pages/', '', $file);
    $path = dirname($path);
    
    foreach ($schemas as $schema) {
        $type = $schema['@type'] ?? '';
        if (in_array($type, ['Service', 'Product', 'BlogPosting', 'Article', 'AboutPage', 'ContactPage', 'ProfilePage', 'PriceSpecification', 'ItemList', 'WebPage'])) {
            return $type;
        }
    }
    
    if (strpos($path, '/blog/') === 0 || strpos($path, '/blogs/') === 0) {
        return 'BlogPosting';
    }
    if (strpos($path, '/services/') === 0) {
        return 'Service';
    }
    if (in_array($path, ['contact', 'calculator', 'prices', 'about', 'author', 'stocks', 'portfolio', 'reviews', 'other', 'kalkulyator-ploshchadi', 'smeta-obrazec', 'dogovor-obrazec', 'vakansii', 'search', 'soglashenie'])) {
        $map = [
            'contact' => 'ContactPage',
            'calculator' => 'WebPage',
            'prices' => 'PriceSpecification',
            'about' => 'AboutPage',
            'author' => 'ProfilePage',
            'stocks' => 'WebPage',
            'portfolio' => 'WebPage',
            'reviews' => 'WebPage',
            'other' => 'WebPage',
            'kalkulyator-ploshchadi' => 'WebPage',
            'smeta-obrazec' => 'WebPage',
            'dogovor-obrazec' => 'WebPage',
            'vakansii' => 'WebPage',
            'search' => 'SearchResultsPage',
            'soglashenie' => 'WebPage',
        ];
        return $map[$path] ?? 'WebPage';
    }
    
    return 'WebPage';
}

function buildSeoOptions(array $vars, array $seoMeta, array $schemas, string $pageType, string $file): array
{
    $path = str_replace(__DIR__ . '/public/pages/', '', $file);
    $path = dirname($path);
    $slug = basename($path);
    
    $title = $vars['seoTitle'] ?: $vars['title'] ?: ($seoMeta['title_raw'] ?? '');
    $title = preg_replace('/\s*\|\s*Проект Квартира$/', '', $title);
    
    $description = $vars['description'] ?: ($seoMeta['description'] ?? '');
    if (empty($description) && !empty($title)) {
        $description = $title . ' — Проект Квартира (Проект Квартира).';
    }
    
    $canonical = $vars['canonical'] ?: ($seoMeta['canonical'] ?? '');
    if (empty($canonical) && !empty($slug)) {
        $canonical = '/services/' . $slug;
        if (strpos($path, '/services/') !== 0) {
            $canonical = '/' . $path;
        }
    }
    
    $image = $seoMeta['og_image'] ?? '';
    if (empty($image) && !empty($vars['bg_url'])) {
        $image = $vars['bg_url'];
    }
    
    $ogType = $seoMeta['og_type'] ?? 'website';
    
    $breadcrumbs = [];
    foreach ($schemas as $schema) {
        if (($schema['@type'] ?? '') === 'BreadcrumbList' && isset($schema['itemListElement'])) {
            foreach ($schema['itemListElement'] as $item) {
                $name = $item['name'] ?? '';
                $url = $item['item'] ?? '';
                $name = preg_replace('/<\?.*?\?>/', '', $name);
                $url = preg_replace('/<\?.*?\?>/', '', $url);
                if ($name && $url) {
                    $breadcrumbs[] = ['name' => $name, 'url' => $url];
                }
            }
            break;
        }
    }
    
    if (empty($breadcrumbs) && !empty($slug)) {
        $breadcrumbs = [
            ['name' => 'Главная', 'url' => '/'],
            ['name' => 'Услуги', 'url' => '/services'],
            ['name' => ucfirst(str_replace('-', ' ', $slug)), 'url' => '/services/' . $slug],
        ];
    }
    
    $customSchema = [];
    foreach ($schemas as $schema) {
        $type = $schema['@type'] ?? '';
        if (!in_array($type, ['Organization', 'WebSite', 'LocalBusiness', 'HomeAndConstructionBusiness'])) {
            if ($type === 'BreadcrumbList' && !empty($breadcrumbs)) {
                continue;
            }
            $customSchema[] = $schema;
        }
    }
    
    return [
        'title' => $title,
        'description' => $description,
        'canonical' => $canonical,
        'image' => $image,
        'type' => $ogType,
        'pageType' => $pageType,
        'breadcrumbs' => $breadcrumbs,
        'schema' => $customSchema,
        'articleSection' => $pageType === 'Service' ? 'Ремонт' : null,
    ];
}

function generatePhpBlock(array $options, array $vars): string
{
    $lines = [];
    $lines[] = '<?php';
    $lines[] = 'use Setting\\Route\\Functions\\TheFunction;';
    $lines[] = '$site = TheFunction::site();';
    
    // Include bg_url if it was in the original
    if (!empty($vars['bg_url'])) {
        $lines[] = '$bg_url = \'' . addcslashes($vars['bg_url'], "\n\r\t\$'\"\\") . '\';';
    }
    
    $lines[] = '';
    $lines[] = '$seo = TheFunction::seo([';
    
    foreach ($options as $key => $value) {
        if ($value === null || $value === '' || $value === []) continue;
        
        if (is_array($value)) {
            $lines[] = "    '$key' => " . var_export($value, true) . ',';
        } elseif (is_string($value)) {
            $escaped = addcslashes($value, "\n\r\t\$'\"\\");
            $lines[] = "    '$key' => '$escaped',";
        }
    }
    
    $lines[] = ']);';
    $lines[] = '?>';
    
    return implode("\n", $lines);
}

function replaceHtmlHead(string $html, array $options): string
{
    $titleReplacement = "<title><?= htmlspecialchars(\$seo['title']); ?> | <?= htmlspecialchars(\$site['name'] ?? 'Проект Квартира'); ?></title>";
    $descReplacement = '<meta name="description" content="<?= htmlspecialchars($seo[\'description\']); ?>">';
    $canonReplacement = '<link rel="canonical" href="<?= htmlspecialchars($seo[\'canonical\']); ?>">';
    $ogTitleReplacement = '<meta property="og:title" content="<?= htmlspecialchars($seo[\'og\'][\'title\']); ?>">';
    $ogDescReplacement = '<meta property="og:description" content="<?= htmlspecialchars($seo[\'og\'][\'description\']); ?>">';
    $ogUrlReplacement = '<meta property="og:url" content="<?= htmlspecialchars($seo[\'og\'][\'url\']); ?>">';
    $ogImgReplacement = '<meta property="og:image" content="<?= htmlspecialchars($seo[\'og\'][\'image\']); ?>">';
    $ogSiteReplacement = '<meta property="og:site_name" content="<?= htmlspecialchars($seo[\'og\'][\'site_name\']); ?>">';
    $ogTypeReplacement = '<meta property="og:type" content="<?= htmlspecialchars($seo[\'og\'][\'type\']); ?>">';
    $ogLocaleReplacement = '<meta property="og:locale" content="<?= htmlspecialchars($seo[\'og\'][\'locale\']); ?>">';
    $twTitleReplacement = '<meta name="twitter:title" content="<?= htmlspecialchars($seo[\'twitter\'][\'title\']); ?>">';
    $twDescReplacement = '<meta name="twitter:description" content="<?= htmlspecialchars($seo[\'twitter\'][\'description\']); ?>">';
    $twImgReplacement = '<meta name="twitter:image" content="<?= htmlspecialchars($seo[\'twitter\'][\'image\']); ?>">';
    $twSiteReplacement = '<meta name="twitter:site" content="<?= htmlspecialchars($seo[\'twitter\'][\'site\']); ?>">';
    $twCreatorReplacement = '<meta name="twitter:creator" content="<?= htmlspecialchars($seo[\'twitter\'][\'creator\']); ?>">';
    $twDomainReplacement = '<meta name="twitter:domain" content="<?= htmlspecialchars($seo[\'twitter\'][\'domain\']); ?>">';
    $jsonLdReplacement = '<script type="application/ld+json"><?= $seo[\'jsonLd\']; ?></script>';

    $html = preg_replace(
        '/<title>\s*<\?=.*?\?>\s*\|\s*<\?=.*?\?>\s*<\/title>/',
        $titleReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<title>([^<]+)<\/title>/',
        $titleReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="description" content="[^"]*">/',
        $descReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<link rel="canonical" href="[^"]*">/',
        $canonReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:title" content="[^"]*">/',
        $ogTitleReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:description" content="[^"]*">/',
        $ogDescReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:url" content="[^"]*">/',
        $ogUrlReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:image" content="[^"]*">/',
        $ogImgReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:site_name" content="[^"]*">/',
        $ogSiteReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:type" content="[^"]*">/',
        $ogTypeReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta property="og:locale" content="[^"]*">/',
        $ogLocaleReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:title" content="[^"]*">/',
        $twTitleReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:description" content="[^"]*">/',
        $twDescReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:image" content="[^"]*">/',
        $twImgReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:site" content="[^"]*">/',
        $twSiteReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:creator" content="[^"]*">/',
        $twCreatorReplacement,
        $html
    );
    
    $html = preg_replace(
        '/<meta name="twitter:domain" content="[^"]*">/',
        $twDomainReplacement,
        $html
    );
    
    // Replace ALL JSON-LD script blocks (from first to last) with a single one
    $html = preg_replace(
        '/(<script type="application\/ld\+json">\s*.*?\s*<\/script>\s*)+/s',
        $jsonLdReplacement . "\n",
        $html
    );
    
    $html = preg_replace(
        '/<\?php include_once [\'"].*head-includes\.php[\'"]; \?>\s*/',
        '',
        $html
    );
    
    return $html;
}