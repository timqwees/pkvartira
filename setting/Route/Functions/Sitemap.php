<?php declare(strict_types=1);

namespace Setting\Route\Functions;



/**
 * Генератор SitemapIndex + под-карт сайта
 */
class Sitemap
{
    private string $baseUrl;
    private string $cacheDir;

    public function __construct()
    {
        $this->baseUrl = SiteUrl::baseUrl();
        $this->cacheDir = sys_get_temp_dir() . '/pkvartira-sitemap/';
    }

    /**
     * Ключ кэша привязан к хосту: два сайта (pkvartira.ru и upgrade.pkvartira.ru)
     * работают из одного кода, и общий кэш отдавал sitemap чужого хоста
     * (на pkvartira.ru были <loc>https://upgrade.pkvartira.ru/…</loc>).
     */
    private function hostKey(): string
    {
        return substr(md5($this->baseUrl), 0, 10) . '-';
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
        return $this->cacheDir . $this->hostKey() . ($map[$type] ?? null);
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

    // ======================== PUBLIC: ВСЕ URL (для /pages) ========================

    /**
     * Плоский список всех URL из трёх под-карт.
     * Нужен UrlList::output() — раньше он вызывал удалённый Sitemap::generate() и отдавал 500.
     */
    public static function allUrls(): array
    {
        $instance = new self();
        $urls = [];

        foreach ([$instance->buildPagesXml(), $instance->buildServicesXml(), $instance->buildBlogXml()] as $xml) {
            if (preg_match_all('#<loc>(.*?)</loc>#s', $xml, $m)) {
                foreach ($m[1] as $loc) {
                    $urls[] = html_entity_decode((string) $loc, ENT_QUOTES | ENT_XML1, 'UTF-8');
                }
            }
        }

        return array_values(array_unique($urls));
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
        // lastmod для индекса — реальное время изменения исходных файлов
        $sourceMtime = filemtime(__FILE__);
        $pagesFile = __DIR__ . '/../../../public/pages';
        if (is_dir($pagesFile)) {
            $sourceMtime = max($sourceMtime, filemtime($pagesFile));
        }
        $lastmod = date('Y-m-d', $sourceMtime);

        $sitemaps = [
            ['loc' => '/sitemap-pages.xml', 'lastmod' => $lastmod],
            ['loc' => '/sitemap-services.xml', 'lastmod' => $lastmod],
            ['loc' => '/sitemap-blog.xml', 'lastmod' => $lastmod],
        ];

        // upgrade.pkvartira.ru: статьи блога — копии статей основного сайта и отдают
        // canonical на pkvartira.ru. Держать их в sitemap второго сайта смысла нет.
        if (str_contains($this->baseUrl, 'upgrade.pkvartira.ru')) {
            $sitemaps = array_values(array_filter($sitemaps, static fn(array $s): bool => $s['loc'] !== '/sitemap-blog.xml'));
        }

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
        // Сам код генератора: правки логики sitemap обязаны сбрасывать кэш
        $sourceMtime = max($sourceMtime, filemtime(__FILE__));
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
        $vacanciesFile = __DIR__ . '/../../../public/pages/vakansii/vacancies.json';
        if (file_exists($vacanciesFile)) {
            $sourceMtime = max($sourceMtime, filemtime($vacanciesFile));
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
        // /soglashenie имеет noindex,follow — не должен быть в sitemap (Submitted URL marked 'noindex')
        // /kalkulyator-ploshchadi 301 редиректит на /calculator — не в sitemap
        $pages = [
            ['/', '1.0', 'daily'],
            ['/about', '0.8', 'weekly'],
            ['/prices', '0.8', 'weekly'],
            ['/portfolio', '0.8', 'weekly'],
            ['/reviews', '0.7', 'weekly'],
            ['/stocks', '0.7', 'weekly'],
            ['/contact', '0.6', 'monthly'],
            ['/calculator', '0.8', 'weekly'],
            ['/services', '0.9', 'weekly'],
            ['/blogs', '0.9', 'daily'],
            ['/smeta-obrazec', '0.8', 'weekly'],
            ['/dogovor-obrazec', '0.8', 'weekly'],
            ['/author', '0.4', 'monthly'],
            // N-07: /vakansii и дочерние страницы закрыты от индексации (noindex) — в sitemap их нет.
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
        // Сам код генератора: правки логики sitemap обязаны сбрасывать кэш
        $sourceMtime = max($sourceMtime, filemtime(__FILE__));
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
            'novostroyka' => ['0.8', 'weekly'],
            'vtorichka' => ['0.8', 'weekly'],
            '1room' => ['0.7', 'weekly'],
            '2room' => ['0.7', 'weekly'],
            '3room' => ['0.7', 'weekly'],
            '4room' => ['0.7', 'weekly'],
            'doma' => ['0.7', 'weekly'],
            'kommercheskie' => ['0.7', 'weekly'],
            'dlya-sdachi' => ['0.7', 'weekly'],
            'dizayn-interierov' => ['0.8', 'weekly'],
        ];

        // Страницы вне периметра услуг / не по региону — исключаем из sitemap
        // Исключены из карты: страницы вне периметра услуг (N-08) и узкие коммерческие
        // страницы без кейсов и уникального наполнения (F-02).
        $excludeServices = [
            'ukladka-laminata',
            'keramogranit-nazarovo',
            'kafe',
            'restoran',
            'magazin',
            'stomatologiya',
            'apteka',
            'fitness',
            'salon-krasoty',
            'showroom',
            'office',
        ];

        $dir = __DIR__ . '/../../../public/pages/services';
        $entries = [];

        if (is_dir($dir)) {
            $items = scandir($dir);
            foreach ($items as $item) {
                if ($item === '.' || $item === '..') continue;
                if (in_array($item, $excludeServices)) continue;
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
        // Сам код генератора: правки логики sitemap обязаны сбрасывать кэш
        $sourceMtime = max($sourceMtime, filemtime(__FILE__));
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
                    $lastmod = null;
                    // Используем только реальные даты — updated_at приоритетнее, затем created_at
                    // Не фоллбекаем на сегодня — если даты нет, lastmod не выводим
                    if (!empty($art['updated_at'])) {
                        $lastmodTs = strtotime((string)$art['updated_at']);
                        if ($lastmodTs) {
                            $lastmod = date('Y-m-d', $lastmodTs);
                        }
                    } elseif (!empty($art['created_at'])) {
                        $lastmodTs = strtotime((string)$art['created_at']);
                        if ($lastmodTs) {
                            $lastmod = date('Y-m-d', $lastmodTs);
                        }
                    }
                    // Каноника статей — короткие ЧПУ-слаги; фолбэк id на случай битой записи
                    $slug = !empty($art['slug']) ? (string) $art['slug'] : (string) ($art['id'] ?? '');
                    $xml .= $this->buildEntry('/blog/' . $slug, '0.6', 'weekly', $lastmod);
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

        $entry = "  <url>\n"
             . "    <loc>" . $this->escape($fullUrl) . "</loc>\n";
        if ($lastmod !== null) {
            $entry .= "    <lastmod>" . $this->escape($lastmod) . "</lastmod>\n";
        }
        $entry .= "    <changefreq>" . $this->escape($changefreq) . "</changefreq>\n"
             . "    <priority>" . $this->escape($priority) . "</priority>\n"
             . "  </url>\n";

        return $entry;
    }

    private function escape(string $str): string
    {
        return htmlspecialchars($str, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
