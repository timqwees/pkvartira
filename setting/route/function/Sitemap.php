<?php declare(strict_types=1);

namespace Setting\route\function;

use App\Models\Article\Article;

/**
 * Генератор SitemapIndex + под-карт сайта
 */
class Sitemap
{
    private string $baseUrl;

    public function __construct()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $this->baseUrl = $scheme . '://' . $host;
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
            ['/blogs', '0.9', 'daily'],
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
    }

    private function buildServicesXml(): string
    {
        $services = [
            ['/services/studio', '0.8', 'weekly'],
            ['/services/pod-klyuch', '0.9', 'weekly'],
            ['/services/nowostroyka', '0.8', 'weekly'],
            ['/services/vtorichka', '0.8', 'weekly'],
            ['/services/1room', '0.7', 'weekly'],
            ['/services/2room', '0.7', 'weekly'],
            ['/services/3room', '0.7', 'weekly'],
            ['/services/4room', '0.7', 'weekly'],
            ['/services/doma', '0.7', 'weekly'],
            ['/services/kommercheskie', '0.7', 'weekly'],
        ];

        $xml = $this->openUrlset();

        foreach ($services as $s) {
            $xml .= $this->buildEntry($s[0], $s[1], $s[2]);
        }

        $xml .= '</urlset>' . "\n";
        return $xml;
    }

    // ======================== BLOG SITEMAP ========================

    public static function outputBlog(): void
    {
        $instance = new self();
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
    }

    private function buildBlogXml(): string
    {
        $xml = $this->openUrlset();

        try {
            $article = new Article();
            $articles = $article->getPaginatedArticles(1, 10000) ?? [];

            foreach ($articles as $art) {
                $lastmod = $art['updated_at'] ?? $art['created_at'] ?? date('Y-m-d');
                $lastmod = date('Y-m-d', strtotime((string)$lastmod));
                $xml .= $this->buildEntry('/blog/article/' . ($art['id'] ?? ''), '0.6', 'weekly', $lastmod);
            }
        } catch (\Exception $e) {
            // Нет таблицы статей — пустая карта
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
