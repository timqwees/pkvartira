<?php declare(strict_types=1);

namespace Setting\Route\Functions;

use App\Models\Article\Article;

/**
 * Генератор RSS 2.0 ленты блога
 */
class RssFeed
{
    /**
     * Файловый кэш ленты (подход: лента генерируется в статический rss.xml в корне).
     * Роут отдаёт файл, пока он свежий, иначе пересобирает. Cron может греть кэш заранее:
     * php public/assets/files/generate-rss.php
     */
    private const CACHE_TTL = 1800; // 30 минут
    private const MAX_ITEMS = 100;  // максимум статей в ленте (новые сверху)

    private string $baseUrl;
    private string $siteName;
    private string $shortName;
    private string $siteEmail;
    private string $sitePhone;

    public function __construct()
    {
        // Предпочитаем канонический baseUrl из конфига сайта, чтобы избежать Host header injection
        $configuredBaseUrl = null;
        if (class_exists(\Setting\Route\Functions\TheFunction::class) && method_exists(\Setting\Route\Functions\TheFunction::class, 'site')) {
            try {
                $site = \Setting\Route\Functions\TheFunction::site();
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
            $host = preg_replace('/[^a-zA-Z0-9\.\-:]/', '', $host) ?? '';
            if (empty($host)) $host = 'pkvartira.ru';
            $this->baseUrl = $scheme . '://' . $host;
        }
        $this->siteName = 'Проект Квартира';
        $this->shortName = 'ПКвартира';
        $this->siteEmail = 'info@pkvartira.ru';
        $this->sitePhone = '+7 495 473-17-37';
    }

    public static function output(): void
    {
        $instance = new self();
        $cache = $instance->cachePath();

        // Свежий файловый кэш — отдаём сразу, без пересборки
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

        // Кэш протух или отсутствует — пересобираем и сохраняем в файл
        $xml = $instance->buildXml();
        @file_put_contents($cache, $xml, LOCK_EX);

        $etag = md5($xml);

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) === $etag) {
            http_response_code(304);
            return;
        }

        header('Content-Type: application/rss+xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=1800');
        // Content-Length intentionally not sent to avoid truncation with gzip
        echo $xml;
    }

    /**
     * Принудительная генерация ленты в статический файл (для cron/CLI).
     * Возвращает XML-строку.
     */
    public static function saveToFile(): string
    {
        $instance = new self();
        $xml = $instance->buildXml();
        file_put_contents($instance->cachePath(), $xml, LOCK_EX);
        return $xml;
    }

    private function cachePath(): string
    {
        return dirname(__DIR__, 3) . '/rss.xml';
    }

    private function buildXml(): string
    {
        $articles = $this->getArticles();
        // Сортируем по дате (новые сверху): ветка БД уже идёт ORDER BY created_at DESC,
        // но после фильтрации порядок гарантируем здесь — от него зависит lastBuildDate и порядок <item>.
        usort($articles, function ($a, $b) {
            $ta = strtotime($a['created_at'] ?? '') ?: 0;
            $tb = strtotime($b['created_at'] ?? '') ?: 0;
            return $tb <=> $ta;
        });
        // Лимит ленты: только свежие
        $articles = array_slice($articles, 0, self::MAX_ITEMS);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        // XSL-оформление: без него браузеры показывают ленту как plain-text.
        // Сам файл отдаётся маршрутом /rss.xsl ниже (text/xsl + кэш).
        $xml .= '<?xml-stylesheet href="' . $this->escape($this->baseUrl . '/rss.xsl') . '" type="application/xslt+xml"?>' . "\n";
        $xml .= '<rss version="2.0"' . "\n"
              . '     xmlns:content="http://purl.org/rss/1.0/modules/content/"' . "\n"
              . '     xmlns:dc="http://purl.org/dc/elements/1.1/"' . "\n"
              . '     xmlns:media="http://search.yahoo.com/mrss/"' . "\n"
              . '     xmlns:turbo="http://turbo.yandex.ru"' . "\n"
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
        $xml .= '    <generator>Проект Квартира (PKvartira) RssFeed 2.0</generator>' . "\n";

        // Items
        foreach ($articles as $art) {
            // Пропускаем битые записи без id — иначе <link>/<guid> ведут в никуда
            if (empty($art['id'])) {
                continue;
            }
            // Заголовок никогда не оставляем пустым: иначе в ридерах/валидаторах item без названия.
            // Фолбэк: meta_description (первые 120 символов) → «Статья №id».
            $itemTitle = trim((string)($art['title'] ?? ''));
            if ($itemTitle === '') {
                $fallback = trim((string)($art['meta_description'] ?? ''));
                if ($fallback !== '') {
                    $itemTitle = mb_substr($fallback, 0, 120, 'UTF-8');
                } else {
                    $itemTitle = 'Статья №' . $art['id'];
                }
            }
            $link = $this->baseUrl . '/blog/article/' . $art['id'];
            // Короткое текстовое описание (без HTML): meta_description → stripped content, макс. 400 символов
            $description = $this->buildDescription($art);
            $author = trim((string)($art['author'] ?? ''));
            if ($author === '') {
                $author = $this->siteName;
            }
            $xml .= '    <item turbo="true">' . "\n";
            $xml .= '      <title>' . $this->escape($itemTitle) . "</title>\n";
            $xml .= '      <link>' . $this->escape($link) . "</link>\n";
            $xml .= '      <description><![CDATA[' . $this->escapeCdata($description) . "]]></description>\n";
            $xml .= '      <pubDate>' . $this->formatDate((string)($art['created_at'] ?? '')) . "</pubDate>\n";
            $xml .= '      <guid isPermaLink="true">' . $this->escape($link) . "</guid>\n";
            if (!empty($art['category'])) {
                $xml .= '      <category>' . $this->escape($art['category']) . "</category>\n";
            }
            if (!empty($art['image'])) {
                $imgUrl = $this->normalizeImageUrl($art['image']);
                $mime = $this->detectMimeFromUrl($imgUrl);
                $xml .= '      <enclosure url="' . $this->escape($imgUrl) . '" type="' . $mime . '" length="0"/>' . "\n";
                $xml .= '      <media:content url="' . $this->escape($imgUrl) . '" medium="image" type="' . $mime . '">' . "\n";
                $xml .= '        <media:title>' . $this->escape($itemTitle) . "</media:title>\n";
                $xml .= '      </media:content>' . "\n";
            }
            $xml .= '      <dc:creator>' . $this->escape($author) . "</dc:creator>\n";

            // Чистый turbo-контент по образцу: header > h1 + figure + хлебные крошки + вычищенное тело
            $xml .= '      <turbo:content><![CDATA[' . "\n";
            $xml .= $this->escapeCdata($this->buildTurboContent($art, $itemTitle, $link, $description)) . "\n";
            $xml .= '      ]]></turbo:content>' . "\n";

            $xml .= '    </item>' . "\n";
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>' . "\n";

        return $xml;
    }

    private function getArticles(): array
    {
        // 1) Пытаемся из БД (может быть пусто, если статьи в JSON)
        try {
            $article = new Article();
            $rows = $article->getPaginatedArticles(1, 1000);
            if (!empty($rows) && is_array($rows)) {
                $filtered = array_values(array_filter($rows, fn($r) => !empty($r['id']) && !empty($r['title'])));
                if ($filtered !== []) {
                    return $filtered;
                }
            }
        } catch (\Throwable $e) {
            error_log('RssFeed DB fallback: '.$e->getMessage());
        }

        // 2) Фолбэк — читаем JSON напрямую (актуально когда DATABASE не настроена или таблица пуста)
        $candidates = [
            dirname(__DIR__, 3) . '/public/pages/blog/data/articles.json',
            __DIR__ . '/../../../public/pages/blog/data/articles.json',
            ($_SERVER['DOCUMENT_ROOT'] ?? '') . '/public/pages/blog/data/articles.json',
            getcwd() . '/public/pages/blog/data/articles.json',
        ];
        $jsonPath = null;
        foreach ($candidates as $cand) {
            if ($cand && is_file($cand) && is_readable($cand)) {
                $jsonPath = $cand;
                break;
            }
        }
        if ($jsonPath) {
            $raw = @file_get_contents($jsonPath);
            if ($raw !== false && $raw !== '') {
                $data = json_decode($raw, true);
                if (is_array($data) && $data !== []) {
                    usort($data, function($a, $b) {
                        $ta = strtotime($a['created_at'] ?? '') ?: 0;
                        $tb = strtotime($b['created_at'] ?? '') ?: 0;
                        return $tb <=> $ta;
                    });
                    return array_slice($data, 0, 1000);
                } else {
                    error_log('RssFeed JSON decode failed for '.$jsonPath.': '.json_last_error_msg());
                }
            }
        } else {
            error_log('RssFeed JSON not found in candidates: '.implode(', ', $candidates));
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

    /**
     * Короткое текстовое описание для <description>: без HTML, макс. 400 символов.
     */
    private function buildDescription(array $art): string
    {
        $text = trim((string)($art['meta_description'] ?? ''));
        if ($text === '') {
            $text = trim(strip_tags((string)($art['content'] ?? '')));
        }
        $text = preg_replace('/\s+/u', ' ', $text) ?? $text;
        $text = trim($text);
        if (mb_strlen($text, 'UTF-8') > 400) {
            $text = rtrim(mb_substr($text, 0, 400, 'UTF-8')) . '…';
        }
        return $text;
    }

    /**
     * Чистый turbo-контент по образцу:
     * header > h1 + figure + хлебные крошки, затем вычищенное от мусора тело статьи.
     */
    private function buildTurboContent(array $art, string $itemTitle, string $link, string $description): string
    {
        $out = '<header>' . "\n";
        $out .= '  <h1>' . $this->escapeCdata($itemTitle) . '</h1>' . "\n";
        if (!empty($art['image'])) {
            $imgUrl = $this->normalizeImageUrl((string)$art['image']);
            $out .= '  <figure><img src="' . $this->escape($imgUrl) . '" alt="' . $this->escape($itemTitle) . '"/></figure>' . "\n";
        }
        $out .= '  <div data-block="breadcrumblist">' . "\n";
        $out .= '    <a href="' . $this->escape($this->baseUrl . '/') . '">Главная</a>' . "\n";
        $out .= '    <a href="' . $this->escape($this->baseUrl . '/blogs') . '">Блог</a>' . "\n";
        $out .= '    <a href="' . $this->escape($link) . '">' . $this->escapeCdata($itemTitle) . '</a>' . "\n";
        $out .= '  </div>' . "\n";
        $out .= '</header>' . "\n";

        $fullContent = $this->loadFullContent((int)$art['id']);
        if ($fullContent !== '') {
            $out .= TurboFeed::sanitize($fullContent, $this->baseUrl);
        } else {
            $out .= '<p>' . $this->escapeCdata($description) . '</p>';
        }

        return trim($out);
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
        $content = preg_replace('/<\?.*?\?>/s', '', $content) ?? $content;

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
