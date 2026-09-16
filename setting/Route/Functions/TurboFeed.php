<?php declare(strict_types=1);

namespace Setting\Route\Functions;

use App\Models\Article\Article;

/**
 * Генератор RSS-ленты для Яндекс Турбо-страниц.
 *
 * Формат: https://yandex.ru/support/webmaster/turbo/feed.html
 * Каждый <item turbo="true"> обязан содержать <link> и <turbo:content>
 * с валидной Turbo-разметкой (header > h1 обязателен).
 */
class TurboFeed
{
    private string $baseUrl;
    private string $siteName;
    private string $metricaId;

    public function __construct()
    {
        // Канонический baseUrl из конфига сайта (защита от Host header injection)
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
            $host = preg_replace('/[^a-zA-Z0-9\.\-:]/', '', $host) ?? '';
            if (empty($host)) $host = 'pkvartira.ru';
            $this->baseUrl = $scheme . '://' . $host;
        }
        $this->siteName = 'Проект Квартира';
        // Счётчик Метрики из footer.php (ym(108587554, ...)) — для turbo:analytics
        $this->metricaId = '108587554';
    }

    public static function output(): void
    {
        $instance = new self();
        $xml = $instance->buildXml();

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

    private function buildXml(): string
    {
        $articles = $this->getArticles();
        usort($articles, function ($a, $b) {
            $ta = strtotime($a['created_at'] ?? '') ?: 0;
            $tb = strtotime($b['created_at'] ?? '') ?: 0;
            return $tb <=> $ta;
        });

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss xmlns:yandex="http://news.yandex.ru"' . "\n"
              . '     xmlns:media="http://search.yahoo.com/mrss/"' . "\n"
              . '     xmlns:turbo="http://turbo.yandex.ru"' . "\n"
              . '     version="2.0">' . "\n";
        $xml .= '  <channel>' . "\n";
        $xml .= '    <title>' . $this->escape($this->siteName . ' — Блог о ремонте квартир') . "</title>\n";
        $xml .= '    <link>' . $this->escape($this->baseUrl . '/blogs') . "</link>\n";
        $xml .= '    <description>Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.</description>' . "\n";
        $xml .= '    <language>ru</language>' . "\n";
        $xml .= '    <turbo:analytics id="' . $this->escape($this->metricaId) . '" type="Yandex"></turbo:analytics>' . "\n";

        foreach ($articles as $art) {
            if (empty($art['id'])) {
                continue;
            }
            // Заголовок никогда не пустой: фолбэк meta_description → «Статья №id»
            $itemTitle = trim((string)($art['title'] ?? ''));
            if ($itemTitle === '') {
                $fallback = trim((string)($art['meta_description'] ?? ''));
                $itemTitle = $fallback !== ''
                    ? mb_substr($fallback, 0, 120, 'UTF-8')
                    : 'Статья №' . $art['id'];
            }
            $link = $this->baseUrl . '/blog/article/' . $art['id'];

            // Полный текст статьи → чистим до разрешённых в Турбо тегов
            $fullContent = $this->loadFullContent((int)$art['id']);
            if ($fullContent === '') {
                $fullContent = '<p>' . $this->escape((string)($art['content'] ?? '')) . '</p>';
            }
            $turboHtml = $this->turboSanitize($fullContent);

            $xml .= '    <item turbo="true">' . "\n";
            $xml .= '      <title>' . $this->escape($itemTitle) . "</title>\n";
            $xml .= '      <link>' . $this->escape($link) . "</link>\n";
            $xml .= '      <pubDate>' . $this->formatDate((string)($art['created_at'] ?? '')) . "</pubDate>\n";
            if (!empty($art['category'])) {
                $xml .= '      <category>' . $this->escape($art['category']) . "</category>\n";
            }
            $xml .= '      <turbo:content><![CDATA[' . "\n";
            $xml .= '        <header>' . "\n";
            $xml .= '          <h1>' . $this->escapeCdata($itemTitle) . '</h1>' . "\n";
            $xml .= '          <menu>' . "\n";
            $xml .= '            <a href="' . $this->escape($this->baseUrl . '/') . '">Главная</a>' . "\n";
            $xml .= '            <a href="' . $this->escape($this->baseUrl . '/blogs') . '">Блог</a>' . "\n";
            $xml .= '            <a href="' . $this->escape($this->baseUrl . '/calculator') . '">Калькулятор ремонта</a>' . "\n";
            $xml .= '          </menu>' . "\n";
            $xml .= '        </header>' . "\n";
            $xml .= $this->escapeCdata($turboHtml) . "\n";
            $xml .= '      ]]></turbo:content>' . "\n";
            $xml .= '    </item>' . "\n";
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>' . "\n";

        return $xml;
    }

    /**
     * Чистит HTML статьи до тегов, разрешённых в Турбо-страницах,
     * относительные ссылки делает абсолютными.
     */
    private function turboSanitize(string $html): string
    {
        // Выкидываем PHP-остатки, если вдруг попали
        $html = preg_replace('/<\?.*?\?>/s', '', $html) ?? $html;
        // Только разрешённые Турбо теги (плюс figure/img для картинок)
        $html = strip_tags($html, '<header><h1><h2><h3><p><img><figure><figcaption><br><ul><ol><li><b><strong><i><em><sup><sub><a><menu>');
        // Убираем служебные атрибуты наших шаблонов, Турбо их не понимает
        $html = preg_replace('/\s+data-[a-z\-]+="[^"]*"/i', '', $html) ?? $html;
        $html = preg_replace('/\s+style="[^"]*"/i', '', $html) ?? $html;
        // Относительные ссылки → абсолютные
        $html = str_replace('src="/', 'src="' . $this->baseUrl . '/', $html);
        $html = str_replace('href="/', 'href="' . $this->baseUrl . '/', $html);
        return trim($html);
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
            error_log('TurboFeed DB fallback: '.$e->getMessage());
        }

        // 2) Фолбэк — читаем JSON напрямую
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
                    error_log('TurboFeed JSON decode failed for '.$jsonPath.': '.json_last_error_msg());
                }
            }
        } else {
            error_log('TurboFeed JSON not found in candidates: '.implode(', ', $candidates));
        }
        return [];
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

        $content = preg_replace('/<\?.*?\?>/s', '', $content) ?? $content;
        $content = str_replace('src="/', 'src="' . $this->baseUrl . '/', $content);
        $content = str_replace('href="/', 'href="' . $this->baseUrl . '/', $content);

        return trim($content);
    }

    private function formatDate(string $date): string
    {
        $date = trim($date);
        if ($date === '') return date('r');
        $dt = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $errors = \DateTime::getLastErrors();
        if ($dt !== false && is_array($errors) && ($errors['warning_count'] ?? 0) === 0 && ($errors['error_count'] ?? 0) === 0) {
            return $dt->format('r');
        }
        if ($dt !== false && is_array($errors) && ($errors['warning_count'] ?? 0) > 0) {
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
        return str_replace(']]>', ']]]]><![CDATA[>', $str);
    }
}
