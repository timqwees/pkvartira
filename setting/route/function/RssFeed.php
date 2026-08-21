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
        // Предпочитаем канонический baseUrl из конфига сайта, чтобы избежать Host header injection
        $configuredBaseUrl = null;
        if (class_exists(\Setting\route\function\Functions::class) && method_exists(\Setting\route\function\Functions::class, 'site')) {
            try {
                $site = \Setting\route\function\Functions::site();
                if (is_array($site) && isset($site['baseUrl']) && is_string($site['baseUrl'])) {
                    $configuredBaseUrl = $site['baseUrl'];
                }
            } catch (\Throwable $e) {
                $configuredBaseUrl = null;
            }
        }
        if (!empty($configuredBaseUrl) && filter_var($configuredBaseUrl, FILTER_VALIDATE_URL)) {
            $this->baseUrl = rtrim($configuredBaseUrl, '/');
        } else {
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
            // Белый список символов хоста
            $host = preg_replace('/[^a-zA-Z0-9\.\-:]/', '', $host);
            if (empty($host)) $host = 'pkvartira.ru';
            $this->baseUrl = $scheme . '://' . $host;
        }
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

        // Channel image — размеры по спецификации RSS 2.0: max 144x400
        $xml .= '    <image>' . "\n";
        $xml .= '      <url>' . $this->escape($this->baseUrl . '/public/assets/images/logo/favicon/web-app-manifest-512x512.png') . "</url>\n";
        $xml .= '      <title>' . $this->escape($this->siteName) . "</title>\n";
        $xml .= '      <link>' . $this->escape($this->baseUrl . '/blogs') . "</link>\n";
        $xml .= '      <width>144</width>' . "\n";
        $xml .= '      <height>144</height>' . "\n";
        $xml .= '    </image>' . "\n";
        $xml .= '    <generator>PKvartira RssFeed 1.0</generator>' . "\n";

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
                $imgUrl = $this->normalizeImageUrl($art['image']);
                $mime = $this->detectMimeFromUrl($imgUrl);
                $xml .= '      <enclosure url="' . $this->escape($imgUrl) . '" type="' . $mime . '" length="0"/>' . "\n";
                $xml .= '      <media:content url="' . $this->escape($imgUrl) . '" medium="image" type="' . $mime . '">' . "\n";
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
        // 1) Пытаемся из БД
        try {
            $article = new Article();
            $rows = $article->getPaginatedArticles(1, 1000);
            if (!empty($rows) && is_array($rows)) {
                // Фильтруем битые даты (напр. 2026-06-31)
                return array_values(array_filter($rows, fn($r) => !empty($r['id']) && !empty($r['title'])));
            }
        } catch (\Exception $e) {
            // fallthrough to file fallback
        }

        // 2) Фолбэк — читаем JSON напрямую (актуально когда DATABASE не настроена)
        $jsonPath = dirname(__DIR__, 3) . '/public/pages/blog/data/articles.json';
        if (is_file($jsonPath)) {
            $raw = @file_get_contents($jsonPath);
            $data = json_decode($raw, true);
            if (is_array($data) && $data !== []) {
                // Сортировка по created_at DESC (как в БД)
                usort($data, function($a, $b) {
                    $ta = strtotime($a['created_at'] ?? '') ?: 0;
                    $tb = strtotime($b['created_at'] ?? '') ?: 0;
                    return $tb <=> $ta;
                });
                return array_slice($data, 0, 1000);
            }
        }
        return [];
    }

    private function normalizeImageUrl(string $url): string
    {
        $url = trim($url);
        if ($url === '') return $url;
        // уже абсолютный
        if (preg_match('#^https?://#i', $url)) return $url;
        // относительный — делаем абсолютным
        if (str_starts_with($url, '/')) return $this->baseUrl . $url;
        return $this->baseUrl . '/' . $url;
    }

    private function detectMimeFromUrl(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH) ?: $url;
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        // Убираем query-параметры типа ?auto=format
        $ext = explode('?', $ext)[0];
        return match($ext) {
            'png' => 'image/png',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
            'avif' => 'image/avif',
            'svg' => 'image/svg+xml',
            default => 'image/jpeg',
        };
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
        $date = trim($date);
        if ($date === '') return date('r');
        // Валидируем календарную дату: 2026-06-31 -> невалидна, корректируем к последнему дню месяца
        // Пробуем DateTime с проверкой ошибок
        $dt = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $errors = \DateTime::getLastErrors();
        if ($dt !== false && is_array($errors) && ($errors['warning_count'] ?? 0) === 0 && ($errors['error_count'] ?? 0) === 0) {
            return $dt->format('r');
        }
        if ($dt !== false && is_array($errors) && ($errors['warning_count'] ?? 0) > 0) {
            // некорректная дата вроде 2026-06-31 — попытаемся исправить день
            if (preg_match('/^(\d{4})-(\d{2})-(\d{2})/', $date, $m)) {
                $y = (int)$m[1]; $mo = (int)$m[2]; $d = (int)$m[3];
                $lastDay = cal_days_in_month(CAL_GREGORIAN, $mo, $y);
                if ($d > $lastDay) {
                    $fixed = sprintf('%04d-%02d-%02d', $y, $mo, $lastDay) . substr($date, 10);
                    $dt2 = \DateTime::createFromFormat('Y-m-d H:i:s', $fixed);
                    if ($dt2 !== false) return $dt2->format('r');
                }
            }
        }
        // Fallback: strtotime
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
