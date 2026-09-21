<?php declare(strict_types=1);

namespace Setting\Route\Functions;

use App\Models\Article\Article;

/**
 * Чистый RSS 2.0 для /rss.xml — только RSS, никакого HTML.
 * Без XSL, без CDATA, без неймспейсов, без картинок и полного текста статей.
 * Только: title / link / description (плоский текст) / pubDate / guid / category.
 */
final class RssFeed
{
    private const CACHE_TTL = 1800;
    private const MAX_ITEMS = 100;
    private const DESC_LIMIT = 400;

    public static function output(): void
    {
        $cache = self::cachePath();

        if (is_file($cache) && (time() - (int)filemtime($cache)) < self::CACHE_TTL) {
            $etag = md5_file($cache) ?: '';
            if ($etag !== '' && isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) {
                http_response_code(304);
                return;
            }
            header('Content-Type: application/rss+xml; charset=utf-8');
            if ($etag !== '') {
                header('ETag: ' . $etag);
            }
            header('Cache-Control: public, max-age=1800');
            readfile($cache);
            return;
        }

        $xml = self::build();
        @file_put_contents($cache, $xml, LOCK_EX);

        $etag = md5($xml);
        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) {
            http_response_code(304);
            return;
        }
        header('Content-Type: application/rss+xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=1800');
        echo $xml;
    }

    /** Принудительная генерация статического файла (cron/CLI). Возвращает XML. */
    public static function saveToFile(): string
    {
        $xml = self::build();
        file_put_contents(self::cachePath(), $xml, LOCK_EX);
        return $xml;
    }

    private static function cachePath(): string
    {
        return dirname(__DIR__, 3) . '/rss.xml';
    }

    private static function build(): string
    {
        $base = self::baseUrl();
        $articles = self::articles();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss version="2.0">' . "\n";
        $xml .= '  <channel>' . "\n";
        $xml .= '    <title>' . self::esc('Проект Квартира — Блог о ремонте квартир') . '</title>' . "\n";
        $xml .= '    <link>' . self::esc($base . '/blogs') . '</link>' . "\n";
        $xml .= '    <description>' . self::esc('Статьи о ремонте квартир: сметы, цены, сроки, выбор материалов.') . '</description>' . "\n";
        $xml .= '    <language>ru</language>' . "\n";
        $xml .= '    <lastBuildDate>' . self::pubDate((string)($articles[0]['created_at'] ?? '')) . '</lastBuildDate>' . "\n";

        foreach ($articles as $art) {
            if (empty($art['id'])) {
                continue;
            }
            $title = trim((string)($art['title'] ?? ''));
            if ($title === '') {
                $title = 'Статья №' . $art['id'];
            }
            $link = $base . '/blog/article/' . $art['id'];

            $xml .= '    <item>' . "\n";
            $xml .= '      <title>' . self::esc($title) . '</title>' . "\n";
            $xml .= '      <link>' . self::esc($link) . '</link>' . "\n";
            $xml .= '      <description>' . self::esc(self::text($art)) . '</description>' . "\n";
            $xml .= '      <pubDate>' . self::pubDate((string)($art['created_at'] ?? '')) . '</pubDate>' . "\n";
            $xml .= '      <guid isPermaLink="true">' . self::esc($link) . '</guid>' . "\n";
            if (!empty($art['category'])) {
                $xml .= '      <category>' . self::esc((string)$art['category']) . '</category>' . "\n";
            }
            $xml .= '    </item>' . "\n";
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>' . "\n";

        return $xml;
    }

    /** Плоский текст для description: без единого тега, макс. 400 символов. */
    private static function text(array $art): string
    {
        $text = trim((string)($art['meta_description'] ?? ''));
        if ($text === '') {
            $text = trim(strip_tags((string)($art['content'] ?? '')));
        }
        $text = preg_replace('/\s+/u', ' ', $text) ?? '';
        $text = trim($text);
        if (mb_strlen($text, 'UTF-8') > self::DESC_LIMIT) {
            $text = rtrim(mb_substr($text, 0, self::DESC_LIMIT, 'UTF-8')) . '…';
        }
        return $text;
    }

    private static function articles(): array
    {
        try {
            $rows = (new Article())->getPaginatedArticles(1, 1000);
            if (!empty($rows) && is_array($rows)) {
                $filtered = array_values(array_filter($rows, fn($r) => !empty($r['id']) && !empty($r['title'])));
                if ($filtered !== []) {
                    return self::sorted($filtered);
                }
            }
        } catch (\Throwable $e) {
            error_log('RssFeed DB fallback: ' . $e->getMessage());
        }

        $jsonPath = dirname(__DIR__, 3) . '/public/pages/blog/data/articles.json';
        if (is_file($jsonPath) && is_readable($jsonPath)) {
            $data = json_decode((string)file_get_contents($jsonPath), true);
            if (is_array($data) && $data !== []) {
                return self::sorted($data);
            }
        }
        return [];
    }

    private static function sorted(array $rows): array
    {
        usort($rows, fn($a, $b) => (strtotime($b['created_at'] ?? '') ?: 0) <=> (strtotime($a['created_at'] ?? '') ?: 0));
        return array_slice($rows, 0, self::MAX_ITEMS);
    }

    private static function baseUrl(): string
    {
        try {
            $site = TheFunction::site();
            if (is_array($site) && isset($site['baseUrl']) && filter_var($site['baseUrl'], FILTER_VALIDATE_URL)) {
                return rtrim((string)$site['baseUrl'], '/');
            }
        } catch (\Throwable $e) {
            // fallback ниже
        }
        return 'https://pkvartira.ru';
    }

    private static function pubDate(string $date): string
    {
        $tz = new \DateTimeZone('Europe/Moscow');
        try {
            $dt = new \DateTime($date !== '' ? $date : 'now', $tz);
        } catch (\Throwable $e) {
            $dt = new \DateTime('now', $tz);
        }
        return $dt->format('r');
    }

    private static function esc(string $str): string
    {
        return htmlspecialchars($str, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
