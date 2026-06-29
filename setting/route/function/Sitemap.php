<?php declare(strict_types=1);

namespace Setting\route\function;

use App\Models\Article\Article;

/**
 * Генератор XML Sitemap для SEO
 */
class Sitemap
{
    private string $baseUrl;

    public function __construct()
    {
        // Динамический базовый URL из текущего запроса
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $this->baseUrl = $scheme . '://' . $host;
    }

    /**
     * Генерация sitemap.xml
     * @param string $format 'yandex' или 'google'
     */
    public static function generate(string $format = 'yandex'): string
    {
        $instance = new self();
        return $instance->buildXml($format);
    }

    /**
     * Сохранение sitemap в файл
     */
    public static function saveToFile(string $path, string $content): bool
    {
        // Не перезаписываем существующий файл
        if (file_exists($path)) {
            return true;
        }

        $dir = dirname($path);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return file_put_contents($path, $content) !== false;
    }

    /**
     * Отдача XML с gzip сжатием
     * @param string $format 'yandex' или 'google'
     * @param bool $createFile создать файл если его нет
     */
    public static function outputCompressed(string $format = 'yandex', bool $createFile = false): void
    {
        $filePath = './file/sitemap_' . $format . '.xml';

        // Если файл есть — отдаём с ETag для 304 кэширования
        if (file_exists($filePath)) {
            $etag = md5_file($filePath);

            if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
                http_response_code(304);
                return;
            }

            header('Content-Type: application/xml; charset=utf-8');
            header('ETag: ' . $etag);
            header('Cache-Control: public, max-age=3600');
            readfile($filePath);
            return;
        }

        // Если файла нет — генерируем
        $xml = self::generate($format);

        if ($createFile) {
            self::saveToFile($filePath, $xml);
        }

        header('Content-Type: application/xml; charset=utf-8');
        header('Content-Length: ' . strlen($xml));
        echo $xml;
    }

    /**
     * Построение XML
     * @param string $format 'yandex' или 'google'
     */
    private function buildXml(string $format = 'yandex'): string
    {
        $urls = $this->collectUrls();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
        $xml .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
        $xml .= '        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        foreach ($urls as $url) {
            $xml .= $this->buildUrlEntry($url, $format);
        }

        $xml .= '</urlset>' . "\n";
        return $xml;
    }

    /**
     * Сбор всех URL
     */
    private function collectUrls(): array
    {
        $urls = [];

        // Главная страница
        $urls[] = [
            'loc' => '/',
            'priority' => '1.0',
            'changefreq' => 'daily'
        ];

        // Основные страницы
        $mainPages = [
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

        // Страницы услуг
        $servicePages = [
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

        $allPages = array_merge($mainPages, $servicePages);

        foreach ($allPages as $page) {
            $urls[] = [
                'loc' => $page[0],
                'priority' => $page[1],
                'changefreq' => $page[2]
            ];
        }

        // Получаем все статьи блога
        try {
            $article = new Article();
            // Получаем все статьи (до 10000)
            $articles = $article->getPaginatedArticles(1, 10000) ?? [];

            foreach ($articles as $art) {
                $urls[] = [
                    'loc' => '/blog/article/' . ($art['id'] ?? ''),
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                    'lastmod' => $art['updated_at'] ?? $art['created_at'] ?? date('Y-m-d')
                ];
            }
        } catch (\Exception $e) {
            // Если нет таблицы статей — пропускаем
        }

        return $urls;
    }

    /**
     * Построение записи URL
     * @param string $format 'yandex' или 'google'
     */
    private function buildUrlEntry(array $url, string $format = 'yandex'): string
    {
        $fullUrl = $this->baseUrl . $url['loc'];
        $lastmod = $url['lastmod'] ?? date('Y-m-d');

        $xml = "  <url>\n";
        $xml .= "    <loc>" . htmlspecialchars($fullUrl, ENT_XML1, 'UTF-8') . "</loc>\n";
        $xml .= "    <lastmod>" . $lastmod . "</lastmod>\n";

        // Для Яндекса добавляем changefreq и priority
        if ($format === 'yandex') {
            $xml .= "    <changefreq>" . $url['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $url['priority'] . "</priority>\n";
        }

        $xml .= "  </url>\n";

        return $xml;
    }
}
