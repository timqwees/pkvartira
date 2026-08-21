<?php declare(strict_types=1);

namespace Setting\route\function;



/**
 * Генератор SitemapIndex + под-карт сайта
 */
class Sitemap
{
    private string $baseUrl;
    private string $cacheDir;

    public function __construct()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $this->baseUrl = $scheme . '://' . $host;
        $this->cacheDir = sys_get_temp_dir() . '/pkvartira-sitemap/';
    }

    private function ensureCacheDirectory(): void
    {
        if (!is_dir($this->cacheDir)) {
            @mkdir($this->cacheDir, 0755, true);
        }
    }

    private function getCacheFilePath(string $type): ?string
    {
        $map = [
            'index' => 'index.xml',
            'pages' => 'pages.xml',
            'services' => 'services.xml',
            'blog' => 'blog.xml',
        ];
        return $this->cacheDir . ($map[$type] ?? null);
    }

    private function isCacheFresh(string $cacheFile, float $sourceMtime): bool
    {
        if (!file_exists($cacheFile)) return false;
        return filemtime($cacheFile) >= $sourceMtime;
    }

    private function writeCache(string $type, string $xml): void
    {
        $this->ensureCacheDirectory();
        $path = $this->getCacheFilePath($type);
        if ($path) {
            file_put_contents($path, $xml);
        }
    }

    private function readCache(string $type): ?string
    {
        $path = $this->getCacheFilePath($type);
        if ($path && file_exists($path)) {
            return file_get_contents($path);
        }
        return null;
    }

    // ======================== SITEMAP INDEX ========================

    public static function outputIndex(): void
    {
        $instance = new self();
        $xml = $instance->buildIndexXml();

        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=3600');
        header('Content-Length: ' . strlen($xml));
        echo $xml;
    }

    private function buildIndexXml(): string
    {
        $today = date('Y-m-d');

        $sitemaps = [
            ['loc' => '/sitemap-pages.xml', 'lastmod' => $today],
            ['loc' => '/sitemap-services.xml', 'lastmod' => $today],
            ['loc' => '/sitemap-blog.xml', 'lastmod' => $today],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($sitemaps as $s) {
            $xml .= '  <sitemap>' . "\n";
            $xml .= '    <loc>' . $this->escape($this->baseUrl . $s['loc']) . "</loc>\n";
            $xml .= '    <lastmod>' . $s['lastmod'] . "</lastmod>\n";
            $xml .= '  </sitemap>' . "\n";
        }

        $xml .= '</sitemapindex>' . "\n";
        return $xml;
    }

    // ======================== PAGES SITEMAP ========================

    public static function outputPages(): void
    {
        $instance = new self();

        // Попытка servir кэшированную версию
        $cacheFile = $instance->getCacheFilePath('pages');
        $sourceMtime = 0;
        // Время модификации основного файла маршрутизации (routes.php)
        $routesFile = __DIR__ . '/../../../routes.php';
        if (file_exists($routesFile)) {
            $sourceMtime = max($sourceMtime, filemtime($routesFile));
        }
        // Время модификации статьи id 14 (последняя добавленная)
        $articlesFile = __DIR__ . '/../../../public/pages/blog/data/articles.json';
        if (file_exists($articlesFile)) {
            $sourceMtime = max($sourceMtime, filemtime($articlesFile));
        }

        if ($cacheFile && $instance->isCacheFresh($cacheFile, $sourceMtime)) {
            $xml = $instance->readCache('pages');
            if ($xml) {
                $etag = md5($xml);
                if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
                    http_response_code(304);
                    return;
                }
                header('Content-Type: application/xml; charset=utf-8');
                header('ETag: ' . $etag);
                header('Cache-Control: public, max-age=3600');
                header('Content-Length: ' . strlen($xml));
                echo $xml;
                return;
            }
        }

        $xml = $instance->buildPagesXml();
        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=3600');
        header('Content-Length: ' . strlen($xml));
        echo $xml;

        // Сохраняем в кэш
        $instance->writeCache('pages', $xml);
    }

    private function buildPagesXml(): string
    {
        $pages = [
            ['/', '1.0', 'daily'],
            ['/about', '0.8', 'weekly'],
            ['/prices', '0.8', 'weekly'],
            ['/portfolio', '0.8', 'weekly'],
            ['/reviews', '0.7', 'weekly'],
            ['/stocks', '0.7', 'weekly'],
            ['/contact', '0.6', 'monthly'],
            ['/soglashenie', '0.4', 'yearly'],
            ['/calculator', '0.8', 'weekly'],
            ['/kalkulyator-ploshchadi', '0.8', 'weekly'],
            ['/blogs', '0.9', 'daily'],
            ['/smeta-obrazec', '0.8', 'weekly'],
            ['/dogovor-obrazec', '0.8', 'weekly'],
        ];

        $xml = $this->openUrlset();

        foreach ($pages as $p) {
            $xml .= $this->buildEntry($p[0], $p[1], $p[2]);
        }

        $xml .= '</urlset>' . "\n";
        return $xml;
    }

    // ======================== SERVICES SITEMAP ========================

    public static function outputServices(): void
    {
        $instance = new self();

        // Попытка servir кэшированную версию
        $cacheFile = $instance->getCacheFilePath('services');
        $sourceMtime = 0;
        // Время модификации директории services
        $servicesDir = __DIR__ . '/../../../public/pages/services';
        if (is_dir($servicesDir)) {
            $sourceMtime = max($sourceMtime, filemtime($servicesDir));
            // Также учитываем время модификации любых index.php в поддиректориях
            $items = @scandir($servicesDir);
            if ($items) {
                foreach ($items as $item) {
                    if ($item === '.' || $item === '..') continue;
                    $indexFile = $servicesDir . '/' . $item . '/index.php';
                    if (is_file($indexFile)) {
                        $sourceMtime = max($sourceMtime, filemtime($indexFile));
                    }
                }
            }
        }

        if ($cacheFile && $instance->isCacheFresh($cacheFile, $sourceMtime)) {
            $xml = $instance->readCache('services');
            if ($xml) {
                $etag = md5($xml);
                if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
                    http_response_code(304);
                    return;
                }
                header('Content-Type: application/xml; charset=utf-8');
                header('ETag: ' . $etag);
                header('Cache-Control: public, max-age=3600');
                header('Content-Length: ' . strlen($xml));
                echo $xml;
                return;
            }
        }

        $xml = $instance->buildServicesXml();
        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=3600');
        header('Content-Length: ' . strlen($xml));
        echo $xml;

        // Сохраняем в кэш
        $instance->writeCache('services', $xml);
    }

    private function buildServicesXml(): string
    {
        $priorityMap = [
            'pod-klyuch' => ['0.9', 'weekly'],
            'studio' => ['0.8', 'weekly'],
            'nowostroyka' => ['0.8', 'weekly'],
            'vtorichka' => ['0.8', 'weekly'],
            '1room' => ['0.7', 'weekly'],
            '2room' => ['0.7', 'weekly'],
            '3room' => ['0.7', 'weekly'],
            '4room' => ['0.7', 'weekly'],
            'doma' => ['0.7', 'weekly'],
            'kommercheskie' => ['0.7', 'weekly'],
            'dlya-sdachi' => ['0.7', 'weekly'],
        ];

        $dir = __DIR__ . '/../../../public/pages/services';
        $entries = [];

        if (is_dir($dir)) {
            $items = scandir($dir);
            foreach ($items as $item) {
                if ($item === '.' || $item === '..') continue;
                $indexFile = $dir . '/' . $item . '/index.php';
                if (is_file($indexFile)) {
                    if (isset($priorityMap[$item])) {
                        $entries[] = ['/services/' . $item, $priorityMap[$item][0], $priorityMap[$item][1]];
                    } else {
                        $entries[] = ['/services/' . $item, '0.6', 'weekly'];
                    }
                }
            }
        }

        usort($entries, fn($a, $b) => $b[1] <=> $a[1]);

        $xml = $this->openUrlset();
        foreach ($entries as $e) {
            $xml .= $this->buildEntry($e[0], $e[1], $e[2]);
        }
        $xml .= '</urlset>' . "\n";

        return $xml;
    }

    // ======================== BLOG SITEMAP ========================

    public static function outputBlog(): void
    {
        $instance = new self();

        // Попытка servir кэшированную версию
        $cacheFile = $instance->getCacheFilePath('blog');
        $sourceMtime = 0;
        // Время модификации articles.json
        $articlesFile = __DIR__ . '/../../../public/pages/blog/data/articles.json';
        if (file_exists($articlesFile)) {
            $sourceMtime = max($sourceMtime, filemtime($articlesFile));
            // Также учитываем время модификации самой статьи id 15 (последняя добавленная)
            // ищем самый новый updated_at
            $articles = json_decode(file_get_contents($articlesFile), true ?? []);
            if (is_array($articles)) {
                foreach ($articles as $art) {
                    $artMtime = strtotime($art['updated_at'] ?? $art['created_at'] ?? '');
                    if ($artMtime) {
                        $sourceMtime = max($sourceMtime, $artMtime);
                    }
                }
            }
        }

        if ($cacheFile && $instance->isCacheFresh($cacheFile, $sourceMtime)) {
            $xml = $instance->readCache('blog');
            if ($xml) {
                $etag = md5($xml);
                if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
                    http_response_code(304);
                    return;
                }
                header('Content-Type: application/xml; charset=utf-8');
                header('ETag: ' . $etag);
                header('Cache-Control: public, max-age=3600');
                header('Content-Length: ' . strlen($xml));
                echo $xml;
                return;
            }
        }

        $xml = $instance->buildBlogXml();
        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=3600');
        header('Content-Length: ' . strlen($xml));
        echo $xml;

        // Сохраняем в кэш
        $instance->writeCache('blog', $xml);
    }

    private function buildBlogXml(): string
    {
        $xml = $this->openUrlset();

        $jsonPath = __DIR__ . '/../../../public/pages/blog/data/articles.json';
        if (is_file($jsonPath)) {
            $articles = json_decode(file_get_contents($jsonPath), true);
            if (is_array($articles)) {
                foreach ($articles as $art) {
                    $lastmod = $art['updated_at'] ?? $art['created_at'] ?? date('Y-m-d');
                    $lastmod = date('Y-m-d', strtotime((string)$lastmod));
                    $slug = $art['id'] ?? '';
                    $xml .= $this->buildEntry('/blog/article/' . $slug, '0.6', 'weekly', $lastmod);
                }
            }
        }

        $xml .= '</urlset>' . "\n";
        return $xml;
    }

    // ======================== HELPERS ========================

    private function openUrlset(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
             . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n"
             . '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n"
             . '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n"
             . '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";
    }

    private function buildEntry(string $loc, string $priority, string $changefreq, ?string $lastmod = null): string
    {
        $fullUrl = $this->baseUrl . $loc;
        $lm = $lastmod ?? date('Y-m-d');

        return "  <url>\n"
             . "    <loc>" . $this->escape($fullUrl) . "</loc>\n"
             . "    <lastmod>" . $lm . "</lastmod>\n"
             . "    <changefreq>" . $changefreq . "</changefreq>\n"
             . "    <priority>" . $priority . "</priority>\n"
             . "  </url>\n";
    }

    private function escape(string $str): string
    {
        return htmlspecialchars($str, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
