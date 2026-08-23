<?php declare(strict_types=1);

namespace Setting\route\function;

use App\Models\Router\Routes;
use App\Config\Database;
use App\Config\Session;
use App\Models\Network\Network;
use App\Controllers\AuthController;
use App\Controllers\MailController;
use App\Models\Article\Article;
use App\Models\Network\Message;
use App\Models\User\User;
use Exception;
use App\Controllers\API\API;

class functions
{
    //======СПИСОК ФУНКЦИЙ / LIST FUNCTIONS===========//

    # Главная страница || Main page (В маршрутных функциях писать, только маршрут в path болье ничего не нужно)
    public function on_Main($path = '/public/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница контактов || Contact page
    public function on_Contact($path = '/public/pages/contact/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница акций || Stocks page
    public function on_Stocks($path = '/public/pages/stocks/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница о компании || About page
    public function on_About($path = '/public/pages/about/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница другие || Other page
    public function on_Other($path = '/public/pages/other/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница отзывы || Reviews page
    public function on_Reviews($path = '/public/pages/reviews/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница портфолио || Portfolio page
    public function on_Portfolio($path = '/public/pages/portfolio/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница цены || Prices page
    public function on_Prices($path = '/public/pages/prices/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница блог || Blog page
    public function on_Blog($path = '/public/pages/blog/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница калькулятор || Calculator page
    public function on_Calculator($path = '/public/pages/calculator/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница калькулятор площади || Area calculator page
    public function on_AreaCalculator($path = '/public/pages/kalkulyator-ploshchadi/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Соглашение и документы (ПДн) || Legal / consent page
    public function on_Soglashenie($path = '/public/pages/soglashenie/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница образец сметы || Smeta sample page
    public function on_Smeta($path = '/public/pages/smeta-obrazec/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница шаблон договора || Dogovor template page
    public function on_Dogovor($path = '/public/pages/dogovor-obrazec/index.php')
    {
    header('Cache-Control: no-cache');
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    // siteInfo — главное зеркало https://pkvartira.ru (301 на него в .htaccess)
    public static function site(): array
    {
        $rawHost = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $rawHost = preg_replace('/:\d+$/', '', (string)$rawHost);
        $isProd = str_ends_with(strtolower($rawHost), 'pkvartira.ru');
        if ($isProd) {
            // Продакшн: всегда https и без www (каноникал)
            $scheme = 'https';
            $host = 'pkvartira.ru';
        } else {
            // Локалка / дев: как пришло (http для 127.0.0.1, localhost)
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
                $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'https' : $scheme;
            }
            $host = $rawHost ?: 'pkvartira.ru';
        }
        $baseUrl = $scheme . '://' . $host;
        $pathOnly = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        if (!is_string($pathOnly) || $pathOnly === '') {
            $pathOnly = '/';
        }
        $canonicalUrl = $baseUrl . $pathOnly;
        $shareImageUrl = $baseUrl . '/public/assets/images/logo/favicon/web-app-manifest-512x512.png';

        return [
            'baseUrl' => $baseUrl,
            'path' => $pathOnly,
            'canonicalUrl' => $canonicalUrl,
            'shareImageUrl' => $shareImageUrl,
            'name' => 'ПКвартира',
            'description' => 'Профессиональный ремонт квартир и домов под ключ в Москве',
            'phone' => '+7 495 473-17-37',
            'email' => 'info@pkvartira.ru',
            'address' => [
                'streetAddress' => 'ул. Варшавское ш., д. 28А',
                'addressLocality' => 'Москва',
                'addressRegion' => 'Москва',
                'postalCode' => '117105',
                'addressCountry' => 'RU'
            ],
            'geo' => [
                'latitude' => '55.682803',
                'longitude' => '37.617941'
            ],
            'openingHours' => 'Mo-Fr 09:00-22:00',
            'priceRange' => '₽₽',
            'kartaAdress' => 'https://yandex.ru/maps/213/moscow/house/varshavskoye_shosse_28a/Z04YcAZnQEEGQFtvfXp5c3RjZw==/?indoorLevel=1&ll=37.617940%2C55.682803&source=serp_navig&z=16.99',
            'telegram' => 'https://t.me/pkvartira',
            'whatsapp' => 'https://wa.me/74951234567',
            'vk' => '', // VK сообщество pkvartira не найдено (404) — скрываем ссылку до появления валидного URL; укажите реальный адрес вида https://vk.com/clubXXXX или https://vk.com/pkvartira_ru
            'max' => '',
            'phone8800' => '8 800 302-17-37',
        ];
    }

    /**
     * Cache-busting для статики: /path/file.css?v=filemtime
     * Использование: <?= \Setting\Route\Function\Functions::asset('/public/assets/styles/main.min.css') ?>
     */
    public static function asset(string $path): string
    {
        // $path ожидается с ведущим /
        if ($path === '' || $path[0] !== '/') $path = '/' . $path;
        $full = dirname(__DIR__, 3) . $path;
        // Для файлов вне public (напр. /public/assets/...) — проверяем
        if (is_file($full)) {
            $v = filemtime($full);
            return $path . '?v=' . $v;
        }
        // Пробуем с DOCUMENT_ROOT для совместимости с dev
        $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? dirname(__DIR__, 3);
        $alt = rtrim($docRoot, '/') . $path;
        if (is_file($alt)) {
            $v = filemtime($alt);
            return $path . '?v=' . $v;
        }
        return $path;
    }

    /**
     * Трим для SEO: обрезает title/description без разрыва слов, до $max символов
     */
    public static function truncateSeo(string $text, int $max): string
    {
        $text = trim(preg_replace('/\s+/', ' ', $text));
        if (mb_strlen($text) <= $max) return $text;
        $cut = mb_substr($text, 0, $max);
        $lastSpace = mb_strrpos($cut, ' ');
        if ($lastSpace !== false && $lastSpace > $max * 0.7) {
            $cut = mb_substr($cut, 0, $lastSpace);
        }
        return rtrim($cut, " ,.—:") . '…';
    }

    /**
     * Анти-бот: ограничение частоты заявок с одного IP (rate limit)
     */
    private static function antiBotRateLimit(): bool
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $ip = trim(explode(',', $ip)[0]);
        $dir = sys_get_temp_dir() . '/pkvartira-ratelimit/';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);

        $file = $dir . md5($ip) . '.json';
        $now = time();
        $window = 3600;      // окно 1 час
        $maxRequests = 5;    // максимум 5 заявок в час с одного IP

        $history = [];
        if (is_file($file)) {
            $history = json_decode((string) file_get_contents($file), true) ?: [];
            // Убираем устаревшие записи
            $history = array_values(array_filter($history, fn($t) => ($now - (int) $t) < $window));
        }

        if (count($history) >= $maxRequests) {
            error_log("Anti-bot: rate limit exceeded for IP {$ip} (" . count($history) . " requests/hour)");
            return false;
        }

        $history[] = $now;
        file_put_contents($file, json_encode($history));
        return true;
    }

    /**
     * Анти-бот: проверка JS-токена (заполняется только браузером с включённым JS)
     */
    private static function antiBotJsToken(object $data): bool
    {
        $token = (string) ($_POST['_js_token'] ?? '');
        // Токен отсутствует или пустой — вероятно бот без JS
        if ($token === '') {
            error_log('Anti-bot: missing _js_token — likely bot without JS');
            return false;
        }
        // Токен должен быть числом в разумном диапазоне (timestamp мс)
        if (!ctype_digit($token) || strlen($token) < 10 || strlen($token) > 15) {
            error_log("Anti-bot: invalid _js_token format: {$token}");
            return false;
        }
        return true;
    }

    /**
     * Анти-бот: проверка телефона на мусорные/шаблонные значения
     */
    private static function antiBotPhoneCheck(string $phone): bool
    {
        // Слишком короткий или слишком длинный
        $digits = (string) preg_replace('/[^0-9]/', '', $phone);
        if (strlen($digits) < 10 || strlen($digits) > 15) {
            return false;
        }
        // Повторяющиеся цифры (1111111111, 1234567890 и т.п.)
        if (preg_match('/^(\d)\1+$/', $digits)) {
            return false;
        }
        if ($digits === '1234567890' || $digits === '0123456789') {
            return false;
        }
        return true;
    }

    /**
     * Приведение значения формы к строке (массив/null → строка)
     */
    private static function toStr(mixed $value): string
    {
        if (is_array($value)) {
            return implode(', ', array_map(static fn($v): string => (string) $v, $value));
        }
        return (string) ($value ?? '');
    }

    /**
     * @param object $data Данные письма
     * @return void
     */
    public static function sendMail(object $data): void
    {
        // === АНТИ-БОТ: уровень 1 — rate limit по IP ===
        if (!self::antiBotRateLimit()) {
            Network::onRedirect("/?message_status=error&message_msg=" . urlencode('Слишком много заявок. Попробуйте позже или позвоните нам.'));
            return;
        }

        // === АНТИ-БОТ: уровень 2 — honeypot ===
        if (!empty($_POST['website'])) {
            error_log('Honeypot trap triggered: ' . ($_POST['website'] ?? ''));
            Network::onRedirect("/?message_status=success&message_msg=" . urlencode('Спасибо, мы свяжемся с вами!'));
            return;
        }

        // === АНТИ-БОТ: уровень 3 — time-check (отправка быстрее 3 секунд) ===
        $ts = (int) ($_POST['_ts'] ?? 0);
        if ($ts > 0) {
            $elapsed = (int) ((microtime(true) * 1000 - $ts) / 1000);
            if ($elapsed < 3) {
                error_log("Anti-bot: form submitted in {$elapsed}s — likely bot");
                Network::onRedirect("/?message_status=success&message_msg=" . urlencode('Спасибо, мы свяжемся с вами!'));
                return;
            }
        }

        // === АНТИ-БОТ: уровень 4 — JS-токен ===
        if (!self::antiBotJsToken($data)) {
            Network::onRedirect("/?message_status=success&message_msg=" . urlencode('Спасибо, мы свяжемся с вами!'));
            return;
        }

        // Серверная валидация телефона
        $phoneRaw = $data->телефн ?? $data->телефон ?? $data->теефон ?? $data->phone ?? '';
        $phone = trim((string) preg_replace('/[^0-9+]/', '', self::toStr($phoneRaw)));

        // === АНТИ-БОТ: уровень 5 — проверка качества телефона ===
        if ($phone === '' || !self::antiBotPhoneCheck($phone)) {
            error_log("Anti-bot: suspicious phone: {$phone}");
            Network::onRedirect("/?message_status=error&message_msg=" . urlencode('Укажите корректный номер телефона'));
            return;
        }

        // Нормализация номера: всегда приводим к формату +7XXXXXXXXXX
        $digits = preg_replace('/[^0-9]/', '', $phone) ?? '';
        if (strlen($digits) === 10) {
            $phone = '+7' . $digits;          // 9991234567 → +79991234567
        } elseif (strlen($digits) === 11 && $digits[0] === '8') {
            $phone = '+7' . substr($digits, 1); // 89991234567 → +79991234567
        } else {
            $phone = '+' . ltrim($digits, '+'); // уже с кодом страны
        }

        $source = $data->источник_заявки ?? '';
        $formId = $data->форма ?? '';

        $message = "<strong>Заявка с сайта</strong>";
        if ($source) $message .= "<br><strong>Источник:</strong> " . htmlspecialchars(self::toStr($source), ENT_QUOTES, 'UTF-8');
        if ($formId) $message .= "<br><strong>Форма:</strong> " . htmlspecialchars(self::toStr($formId), ENT_QUOTES, 'UTF-8');
        $message .= "<hr><strong>Данные:</strong>";
        foreach ($data as $key => $value) {
            if (in_array((string) $key, ['источник_заявки', 'форма', 'website', '_ts', '_js_token'], true)) continue;
            $val = self::toStr($value);
            $message .= "<br>" . ucfirst((string) $key) . ': ' . htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
        }
        $success = false;
        try {
            $result = (new MailController())->onMail('info@pkvartira.ru', 'Заявление с сайта', $message);
            $success = $result;
        } catch (Exception $e) {
            error_log('Mail Error: ' . $e->getMessage());
        }

        self::sendToBitrix24($data);

        if (!isset($data->both)) {
            $status = $success ? 'success' : 'error';
            $msg = $success ? 'Спасибо, мы свяжемся с вами!' : 'Ошибка отправки. Попробуйте еще раз.';
            Network::onRedirect("/?message_status={$status}&message_msg=" . urlencode($msg));
        }
    }

    /**
     * Отправка сделки в Bitrix24 через CRM REST API
     */
    private static function sendToBitrix24(object $data): void
    {
        $name = $data->имя ?? $data->name ?? '';
        $phone = $data->телефн ?? $data->телефон ?? $data->теефон ?? $data->phone ?? '';
        $email = $data->почта ?? $data->email ?? '';
        $comment = $data->сообщение ?? $data->message ?? '';
        $source = $data->источник_заявки ?? '';
        $formId = $data->форма ?? '';

        $info = "Телефон: {$phone}";
        if ($name) $info .= "\nИмя: {$name}";
        if ($email) $info .= "\nEmail: {$email}";
        if ($source) $info .= "\nИсточник: {$source}";
        if ($formId) $info .= "\nФорма: {$formId}";

        // Добавляем все остальные поля формы (Тип жилья, Комнат, Площадь, Ремонт и т.д.)
        $extra = [];
        foreach ($data as $key => $value) {
            if (!in_array((string) $key, ['имя', 'name', 'телефн', 'телефон', 'phone', 'почта', 'email', 'сообщение', 'message', 'both', 'источник_заявки', 'форма', 'website', '_ts', '_js_token'], true)) {
                if (is_string($value) && $value !== '') {
                    $extra[] = "{$key}: {$value}";
                }
            }
        }
        if ($extra) $info .= "\n\n" . implode("\n", $extra);
        if ($comment) $info .= "\n\n{$comment}";

        $webhookUrl = 'https://b24-383l4m.bitrix24.ru/rest/1/chhw3puiokfsraz1/crm.deal.add.json';
        $postData = http_build_query(['fields' => [
            'TITLE' => 'Заявка с сайта ' . ($_SERVER['SERVER_NAME'] ?? ''),
            // Воронка 7 «Заявки ремонт квартир»: стадия указана явно с префиксом C7,
            // иначе Битрикс при невалидной стадии сбрасывает сделку в первую воронку
            'CATEGORY_ID' => 7,
            'STAGE_ID' => 'C7:NEW',
            'COMMENTS' => $info,
            'SOURCE_DESCRIPTION' => 'Заявка с сайта pkvartira.ru',
        ]]);

        $ch = curl_init($webhookUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_CONNECTTIMEOUT => 5,
        ]);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if (!is_string($response)) {
            error_log("Bitrix24: пустой ответ (curl_exec вернул false)");
            return;
        }

        if ($curlError) {
            error_log("Bitrix24 curl error: {$curlError}");
        } elseif ($httpCode !== 200) {
            error_log("Bitrix24 HTTP {$httpCode}: " . mb_substr($response, 0, 500));
        } else {
            $result = json_decode($response, true);
            if (!empty($result['error'])) {
                error_log("Bitrix24 API error: {$result['error']} — {$result['error_description']}");
            }
        }
    }

    public function getPhotos(string $path): array
    {
        return is_dir($path) ? array_diff(scandir($path, SCANDIR_SORT_ASCENDING), ['.', '..', 'about.json']) : [];
    }

    public function getPortfolio(string $path): array
    {
        $array = [];//тут будут данные портфолио
        foreach (array_diff(scandir($path, SCANDIR_SORT_ASCENDING), ['.', '..']) as $key => $value) {//список директорий
            $content = @file_get_contents($path . '/' . $value . '/' . 'about.json');
            if ($content === false) continue;//файл недоступен — пропускаем
            $информация = (array) json_decode($content);//получаем информацию
            $array[] = isset($информация) ? $информация : Null;
        }
        return $array;
    }

    public static function portfolioSlug(string $folder): string
    {
        return substr(md5($folder), 0, 10);
    }

    public static function portfolioMeta(string $folder): array
    {
        $path = $folder . '/about.json';
        if (!is_file($path)) {
            return [];
        }

        $meta = json_decode((string) file_get_contents($path), true);
        return is_array($meta) ? $meta : [];
    }

    public static function portfolioItems(): array
    {
        static $items = null;
        if ($items !== null) {
            return $items;
        }

        $portfolio = require dirname(__DIR__, 3) . '/public/data/portfolio.php';
        $instance = new self();
        $items = [];

        foreach ($portfolio as $item) {
            $meta = self::portfolioMeta($item['folder_image']);
            $photos = $instance->getPhotos($item['folder_image']);
            $cover = $photos ? reset($photos) : null;

            $items[] = array_merge($item, [
                'slug' => self::portfolioSlug($item['folder_image']),
                'duration' => $meta['срок'] ?? '',
                'price' => $meta['цена'] ?? '',
                'subtitle' => $meta['заголовок'] ?? '',
                'photos' => array_values($photos),
                'cover' => $cover,
            ]);
        }

        return $items;
    }

    public static function portfolioBySlug(string $slug): ?array
    {
        foreach (self::portfolioItems() as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }

        return null;
    }

    public static function featuredPortfolio(?string $type = null, int $limit = 3): array
    {
        $items = self::portfolioItems();

        if ($type !== null) {
            $items = array_values(array_filter($items, static fn(array $item): bool => $item['type'] === $type));
        }

        return array_slice($items, 0, $limit);
    }

    public static function portfolioProjectUrl(string $slug): string
    {
        $baseUrl = rtrim(self::site()['baseUrl'] ?? '', '/');

        return $baseUrl . '/portfolio?project=' . urlencode($slug);
    }

    public static function seo(array $options = []): array
    {
        $site = self::site();
        $defaults = [
            'title' => $site['name'] . ' — ремонт квартир под ключ в Москве',
            'description' => $site['description'],
            'image' => $site['shareImageUrl'],
            'url' => $site['canonicalUrl'],
            'type' => 'website',
            'pageType' => 'WebPage',
            'breadcrumbs' => [],
            'schema' => [],
            'author' => null,
            'datePublished' => null,
            'dateModified' => null,
            'articleSection' => null,
            'keywords' => null,
        ];
        $opts = array_merge($defaults, $options);
        // SEO лимиты: title ≤55 (финал + " | ПКвартира" ≤67), description ≤155 (сниппет 160)
        $opts['title'] = self::truncateSeo((string)$opts['title'], 48);
        $opts['description'] = self::truncateSeo((string)$opts['description'], 155);

        $ogImage = $opts['image'];
        $ogType = $opts['type'];
        $pageUrl = $opts['url'];
        $pageTitle = $opts['title'];
        $pageDescription = $opts['description'];
        // Фильтруем пустые соцсети (например VK если не задан — не попадает в sameAs, чтобы не плодить битую ссылку)
        $sameAs = array_values(array_filter([$site['vk'], $site['telegram'], $site['whatsapp']], fn($v) => is_string($v) && $v !== ''));

        $jsonLd = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => $site['baseUrl'] . '#organization',
                    'name' => $site['name'],
                    'url' => $site['baseUrl'],
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => $site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg',
                        'width' => 300,
                        'height' => 300,
                    ],
                    'contactPoint' => [
                        '@type' => 'ContactPoint',
                        'telephone' => $site['phone'],
                        'contactType' => 'customer service',
                        'availableLanguage' => ['Russian'],
                        'areaServed' => 'RU',
                    ],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => $site['address']['streetAddress'],
                        'addressLocality' => $site['address']['addressLocality'],
                        'addressRegion' => $site['address']['addressRegion'],
                        'postalCode' => $site['address']['postalCode'],
                        'addressCountry' => $site['address']['addressCountry'],
                    ],
                    'sameAs' => $sameAs,
                    'image' => $site['shareImageUrl'],
                ],
                [
                    '@type' => 'LocalBusiness',
                    '@id' => $site['baseUrl'] . '#localbusiness',
                    'name' => $site['name'],
                    'url' => $site['baseUrl'],
                    'description' => $site['description'],
                    'telephone' => $site['phone'],
                    'email' => $site['email'],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => $site['address']['streetAddress'],
                        'addressLocality' => $site['address']['addressLocality'],
                        'addressRegion' => $site['address']['addressRegion'],
                        'postalCode' => $site['address']['postalCode'],
                        'addressCountry' => $site['address']['addressCountry'],
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => $site['geo']['latitude'] ?? '55.682803',
                        'longitude' => $site['geo']['longitude'] ?? '37.617941',
                    ],
                    'openingHoursSpecification' => [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                        'opens' => '09:00',
                        'closes' => '22:00',
                    ],
                    'priceRange' => $site['priceRange'] ?? '₽₽',
                    'currenciesAccepted' => 'RUB',
                    'paymentAccepted' => 'Cash, Credit Card, Bank Transfer',
                    'areaServed' => [
                        '@type' => 'City',
                        'name' => 'Москва',
                    ],
                    'hasOfferCatalog' => [
                        '@type' => 'OfferCatalog',
                        'name' => 'Услуги по ремонту',
                    ],
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => $site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg',
                        'width' => 300,
                        'height' => 300,
                    ],
                    'image' => $site['shareImageUrl'],
                    'sameAs' => $sameAs,
                    'priceRange' => $site['priceRange'] ?? '₽₽',
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => $site['baseUrl'] . '#website',
                    'url' => $site['baseUrl'],
                    'name' => $site['name'],
                    'description' => $site['description'],
                    'publisher' => ['@id' => $site['baseUrl'] . '#organization'],
                    'inLanguage' => 'ru-RU',
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => [
                            '@type' => 'EntryPoint',
                            'urlTemplate' => $site['baseUrl'] . '/search?q={search_term_string}',
                        ],
                        'query' => 'required name=search_term_string',
                    ],
                ],
                [
                    '@type' => $opts['pageType'],
                    '@id' => $pageUrl . '#webpage',
                    'url' => $pageUrl,
                    'name' => $pageTitle,
                    'description' => $pageDescription,
                    'isPartOf' => ['@id' => $site['baseUrl'] . '#website'],
                    'about' => ['@id' => $site['baseUrl'] . '#organization'],
                    'inLanguage' => 'ru-RU',
                    'image' => [
                        '@type' => 'ImageObject',
                        'url' => $ogImage,
                        'width' => 1200,
                        'height' => 630,
                    ],
                ],
            ],
        ];

        // Add Service schema if pageType is Service
        if ($opts['pageType'] === 'Service') {
            $jsonLd['@graph'][] = [
                '@type' => 'Service',
                '@id' => $pageUrl . '#service',
                'url' => $pageUrl,
                'name' => $opts['title'],
                'description' => $opts['description'],
                'provider' => ['@id' => $site['baseUrl'] . '#organization'],
                'serviceType' => 'Ремонтные услуги',
                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Москва',
                ],
                'providerMobility' => 'TravelToCustomer',
                'hasOfferCatalog' => [
                    '@type' => 'OfferCatalog',
                    'name' => 'Услуги по ремонту',
                    'itemListElement' => [],
                ],
            ];
        }

        // Add BlogPosting / Article schema if pageType is BlogPosting
        if ($opts['pageType'] === 'BlogPosting') {
            $jsonLd['@graph'][] = [
                '@type' => 'BlogPosting',
                '@id' => $pageUrl . '#article',
                'url' => $pageUrl,
                'headline' => $opts['title'],
                'description' => $opts['description'],
                'image' => [
                    '@type' => 'ImageObject',
                    'url' => $opts['image'],
                    'width' => 1200,
                    'height' => 630,
                ],
                'datePublished' => $opts['datePublished'] ?? date('c'),
                'dateModified' => $opts['dateModified'] ?? date('c'),
                'author' => [
                    '@type' => 'Organization',
                    'name' => $site['name'],
                    'url' => $site['baseUrl'],
                ],
                'publisher' => [
                    '@id' => $site['baseUrl'] . '#organization',
                ],
                'articleSection' => $opts['articleSection'] ?? 'Ремонт',
                'keywords' => $opts['keywords'] ?? 'ремонт квартиры, дизайн интерьера',
                'inLanguage' => 'ru-RU',
            ];
        }

        // Add Product schema if pageType is Product
        if ($opts['pageType'] === 'Product') {
            $jsonLd['@graph'][] = self::productSchema([
                'slug' => basename($pageUrl),
                'name' => $opts['title'],
                'description' => $opts['description'],
                'image' => $opts['image'],
                'price' => $opts['price'] ?? 0,
                'sku' => $opts['sku'] ?? '',
                'gtin' => $opts['gtin'] ?? '',
                'mpn' => $opts['mpn'] ?? '',
                'category' => $opts['category'] ?? '',
                'availability' => $opts['availability'] ?? 'https://schema.org/InStock',
                'priceValidUntil' => $opts['priceValidUntil'] ?? '',
                'ratingValue' => $opts['ratingValue'] ?? 0,
                'reviewCount' => $opts['reviewCount'] ?? 0,
                'review' => $opts['review'] ?? [],
                'material' => $opts['material'] ?? '',
                'color' => $opts['color'] ?? '',
                'size' => $opts['size'] ?? '',
                'weight' => $opts['weight'] ?? 0,
                'depth' => $opts['depth'] ?? 0,
                'height' => $opts['height'] ?? 0,
                'width' => $opts['width'] ?? 0,
                'accessoryFor' => $opts['accessoryFor'] ?? [],
                'consumableFor' => $opts['consumableFor'] ?? [],
                'relatedProducts' => $opts['relatedProducts'] ?? [],
                'similarProducts' => $opts['similarProducts'] ?? [],
            ]);
        }

        // Breadcrumbs
        if (!empty($opts['breadcrumbs'])) {
            $items = [];
            foreach ($opts['breadcrumbs'] as $i => $crumb) {
                $items[] = [
                    '@type' => 'ListItem',
                    'position' => $i + 1,
                    'name' => $crumb['name'],
                    'item' => $crumb['url'],
                ];
            }
            $jsonLd['@graph'][] = [
                '@type' => 'BreadcrumbList',
                '@id' => $pageUrl . '#breadcrumb',
                'itemListElement' => $items,
            ];
        }

        // Custom schema from options
        if (!empty($opts['schema'])) {
            foreach ($opts['schema'] as $schema) {
                $jsonLd['@graph'][] = $schema;
            }
        }

        return [
            'title' => $opts['title'],
            'description' => $opts['description'],
            'canonical' => $pageUrl,
            'og' => [
                'type' => $opts['type'],
                'title' => $opts['title'] . ' — ' . $site['name'],
                'description' => $opts['description'],
                'url' => $pageUrl,
                'image' => $opts['image'],
                'site_name' => $site['name'] . ' — Ремонт квартир под ключ',
                'locale' => 'ru_RU',
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'site' => '@pkvartira',
                'title' => $opts['title'],
                'description' => $opts['description'],
                'image' => $opts['image'],
                'creator' => '@pkvartira',
                'domain' => parse_url($site['baseUrl'], PHP_URL_HOST),
            ],
            'jsonLd' => json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ];
    }

    public static function articleSchema(array $article): array
    {
        $site = self::site();
        $id = (string) ($article['id'] ?? '');
        $tsCreated = strtotime((string) ($article['created_at'] ?? '')) ?: time();
        $tsModified = strtotime((string) ($article['updated_at'] ?? '')) ?: $tsCreated;

        return [
            '@type' => 'BlogPosting',
            '@id' => $site['baseUrl'] . '/blog/article/' . $id . '#article',
            'url' => $site['baseUrl'] . '/blog/article/' . $id,
            'headline' => (string) ($article['title'] ?? ''),
            'description' => (string) ($article['meta_description'] ?? ''),
            'image' => [
                '@type' => 'ImageObject',
                'url' => (string) ($article['image'] ?? $site['shareImageUrl']),
                'width' => 1200,
                'height' => 630,
            ],
            'datePublished' => date('c', $tsCreated),
            'dateModified' => date('c', $tsModified),
            'author' => ['@id' => $site['baseUrl'] . '#organization'],
            'publisher' => ['@id' => $site['baseUrl'] . '#organization'],
            'articleSection' => (string) ($article['category'] ?? 'Ремонт'),
            'keywords' => (string) ($article['tags'] ?? 'ремонт квартиры, дизайн интерьера'),
            'wordCount' => (int) str_word_count(strip_tags((string) ($article['content'] ?? ''))),
            'inLanguage' => 'ru-RU',
        ];
    }

    public static function serviceSchema(array $service): array
    {
        $site = self::site();
        return [
            '@type' => 'Service',
            '@id' => $site['baseUrl'] . '/services/' . $service['slug'] . '#service',
            'url' => $site['baseUrl'] . '/services/' . $service['slug'],
            'name' => $service['title'],
            'description' => $service['description'] ?? '',
            'provider' => ['@id' => $site['baseUrl'] . '#organization'],
            'serviceType' => 'Ремонтные услуги',
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Москва',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Услуги по ремонту',
                'itemListElement' => [],
            ],
        ];
    }

    public static function productSchema(array $product): array
    {
        $site = self::site();
        return [
            '@type' => 'Product',
            '@id' => $site['baseUrl'] . '/product/' . $product['slug'] . '#product',
            'url' => $site['baseUrl'] . '/product/' . $product['slug'],
            'name' => $product['name'],
            'description' => $product['description'] ?? '',
            'image' => $product['image'] ?? $site['shareImageUrl'],
            'brand' => [
                '@type' => 'Brand',
                'name' => $site['name'],
            ],
            'sku' => $product['sku'] ?? '',
            'gtin' => $product['gtin'] ?? '',
            'mpn' => $product['mpn'] ?? '',
            'category' => $product['category'] ?? '',
            'offers' => [
                '@type' => 'Offer',
                '@id' => $site['baseUrl'] . '/product/' . $product['slug'] . '#offer',
                'url' => $site['baseUrl'] . '/product/' . $product['slug'],
                'priceCurrency' => 'RUB',
                'price' => $product['price'] ?? 0,
                'priceValidUntil' => $product['priceValidUntil'] ?? '',
                'availability' => $product['availability'] ?? 'https://schema.org/InStock',
                'seller' => [
                    '@type' => 'Organization',
                    '@id' => $site['baseUrl'] . '#organization',
                    'name' => $site['name'],
                ],
                'priceValidUntil' => $product['priceValidUntil'] ?? '',
                'priceSpecification' => [
                    '@type' => 'PriceSpecification',
                    'priceCurrency' => 'RUB',
                    'price' => $product['price'] ?? 0,
                    'priceType' => 'https://schema.org/ListPrice',
                    'valueAddedTaxIncluded' => true,
                ],
            ],
            'aggregateRating' => $product['aggregateRating'] ?? [
                '@type' => 'AggregateRating',
                'ratingValue' => $product['ratingValue'] ?? 0,
                'reviewCount' => $product['reviewCount'] ?? 0,
                'bestRating' => 5,
                'worstRating' => 1,
            ],
            'review' => $product['review'] ?? [],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Homeowners, Renters, Property Managers',
            ],
            'isAccessoryOrSparePartFor' => $product['accessoryFor'] ?? [],
            'isConsumableFor' => $product['consumableFor'] ?? [],
            'isRelatedTo' => $product['relatedProducts'] ?? [],
            'isSimilarTo' => $product['similarProducts'] ?? [],
            'manufacturer' => [
                '@type' => 'Organization',
                'name' => $site['name'],
                'url' => $site['baseUrl'],
            ],
            'material' => $product['material'] ?? '',
            'color' => $product['color'] ?? '',
            'size' => $product['size'] ?? '',
            'weight' => [
                '@type' => 'QuantitativeValue',
                'value' => $product['weight'] ?? 0,
                'unitCode' => 'KGM',
            ],
            'depth' => [
                '@type' => 'QuantitativeValue',
                'value' => $product['depth'] ?? 0,
                'unitCode' => 'CMT',
            ],
            'height' => [
                '@type' => 'QuantitativeValue',
                'value' => $product['height'] ?? 0,
                'unitCode' => 'CMT',
            ],
            'width' => [
                '@type' => 'QuantitativeValue',
                'value' => $product['width'] ?? 0,
                'unitCode' => 'CMT',
            ],
        ];
    }

    public static function faqSchema(array $faqs): array
    {
        $entities = [];
        foreach ($faqs as $faq) {
            $entities[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ];
        }
        return [
            '@type' => 'FAQPage',
            'mainEntity' => $entities,
        ];
    }
}