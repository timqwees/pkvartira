<?php declare(strict_types=1);

namespace Setting\route\function;

use App\Models\Article\Article;

/**
 * Генератор RSS 2.0 ленты блога
 */
class RssFeed
{
    private string $baseUrl;
    private string $siteName;
    private string $siteEmail;
    private string $sitePhone;

    public function __construct()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $this->baseUrl = $scheme . '://' . $host;
        $this->siteName = 'ПКвартира';
        $this->siteEmail = 'info@pkvartira.ru';
        $this->sitePhone = '+7 495 473-17-37';
    }

    public static function output(): void
    {
        $instance = new self();
        $xml = $instance->buildXml();

        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/rss+xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=1800');
        header('Content-Length: ' . strlen($xml));
        echo $xml;
    }

    private function buildXml(): string
    {
        $articles = $this->getArticles();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss version="2.0"' . "\n"
              . '     xmlns:content="http://purl.org/rss/1.0/modules/content/"' . "\n"
              . '     xmlns:dc="http://purl.org/dc/elements/1.1/"' . "\n"
              . '     xmlns:media="http://search.yahoo.com/mrss/"' . "\n"
              . '     xmlns:atom="http://www.w3.org/2005/Atom">' . "\n";
        $xml .= '  <channel>' . "\n";

        // Channel metadata
        $xml .= '    <title>' . $this->escape($this->siteName . ' — Блог о ремонте квартир') . "</title>\n";
        $xml .= '    <link>' . $this->escape($this->baseUrl . '/blogs') . "</link>\n";
        $xml .= '    <description>Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.</description>' . "\n";
        $xml .= '    <language>ru</language>' . "\n";
        $xml .= '    <lastBuildDate>' . $this->formatDate($articles[0]['created_at'] ?? date('Y-m-d H:i:s')) . "</lastBuildDate>\n";
        $xml .= '    <ttl>60</ttl>' . "\n";
        $xml .= '    <atom:link href="' . $this->escape($this->baseUrl . '/rss.xml') . '" rel="self" type="application/rss+xml"/>' . "\n";
        $xml .= '    <managingEditor>' . $this->escape($this->siteEmail) . ' ('.$this->siteName.')</managingEditor>' . "\n";
        $xml .= '    <webMaster>' . $this->escape($this->siteEmail) . ' ('.$this->siteName.')</webMaster>' . "\n";

        // Channel image
        $xml .= '    <image>' . "\n";
        $xml .= '      <url>' . $this->escape($this->baseUrl . '/public/assets/images/logo/favicon/web-app-manifest-512x512.png') . "</url>\n";
        $xml .= '      <title>' . $this->escape($this->siteName) . "</title>\n";
        $xml .= '      <link>' . $this->escape($this->baseUrl . '/blogs') . "</link>\n";
        $xml .= '      <width>512</width>' . "\n";
        $xml .= '      <height>512</height>' . "\n";
        $xml .= '    </image>' . "\n";

        // Items
        foreach ($articles as $art) {
            $xml .= '    <item>' . "\n";
            $xml .= '      <title>' . $this->escape($art['title'] ?? '') . "</title>\n";
            $xml .= '      <link>' . $this->escape($this->baseUrl . '/blog/article/' . $art['id']) . "</link>\n";
            $xml .= '      <guid isPermaLink="true">' . $this->escape($this->baseUrl . '/blog/article/' . $art['id']) . "</guid>\n";
            $xml .= '      <pubDate>' . $this->formatDate($art['created_at']) . "</pubDate>\n";
            if (!empty($art['category'])) {
                $xml .= '      <category>' . $this->escape($art['category']) . "</category>\n";
            }
            if (!empty($art['image'])) {
                $xml .= '      <enclosure url="' . $this->escape($art['image']) . '" type="image/jpeg" length="0"/>' . "\n";
                $xml .= '      <media:content url="' . $this->escape($art['image']) . '" medium="image">' . "\n";
                $xml .= '        <media:title>' . $this->escape($art['title'] ?? '') . "</media:title>\n";
                $xml .= '      </media:content>' . "\n";
            }
            $xml .= '      <description><![CDATA[' . $this->escapeCdata($art['content'] ?? '') . "]]></description>\n";
            $xml .= '      <dc:creator>' . $this->escape($this->siteName) . "</dc:creator>\n";

            // Full content from the content file
            $fullContent = $this->loadFullContent((int)$art['id']);
            if ($fullContent !== '') {
                $xml .= '      <content:encoded><![CDATA[' . $this->escapeCdata($fullContent) . "]]></content:encoded>\n";
            }

            $xml .= '    </item>' . "\n";
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>' . "\n";

        return $xml;
    }

    private function getArticles(): array
    {
        try {
            $article = new Article();
            return $article->getPaginatedArticles(1, 1000) ?: [];
        } catch (\Exception $e) {
            return [];
        }
    }

    private function loadFullContent(int $id): string
    {
        $file = dirname(__DIR__, 3) . '/public/pages/blog/article/content/' . $id . '.php';
        if (!file_exists($file)) {
            return '';
        }
        ob_start();
        include $file;
        $content = ob_get_clean();

        // Strip PHP tags if any (shouldn't be, but safety)
        $content = preg_replace('/<\?.*?\?>/s', '', $content);

        // Convert relative image URLs to absolute
        $content = str_replace('src="/', 'src="' . $this->baseUrl . '/', $content);
        $content = str_replace('href="/', 'href="' . $this->baseUrl . '/', $content);

        return trim($content);
    }

    private function formatDate(string $date): string
    {
        $timestamp = strtotime($date);
        if ($timestamp === false) {
            return date('r');
        }
        return date('r', $timestamp);
    }

    private function escape(string $str): string
    {
        return htmlspecialchars($str, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }

    private function escapeCdata(string $str): string
    {
        // CDATA can't contain nested CDATA — escape if present
        return str_replace(']]>', ']]]]><![CDATA[>', $str);
    }
}
