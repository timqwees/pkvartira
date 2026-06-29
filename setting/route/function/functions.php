<?php declare(strict_types=1);

namespace Setting\Route\Function;

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
use LDAP\ResultEntry;
use App\Controllers\API\API;

class Functions
{
    //======СПИСОК ФУНКЦИЙ / LIST FUNCTIONS===========//

    # Главная страница || Main page (В маршрутных функциях писать, только маршрут в path болье ничего не нужно)
    public function on_Main($path = '/public/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница контактов || Contact page
    public function on_Contact($path = '/public/pages/contact/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница акций || Stocks page
    public function on_Stocks($path = '/public/pages/stocks/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница о компании || About page
    public function on_About($path = '/public/pages/about/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница другие || Other page
    public function on_Other($path = '/public/pages/other/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница отзывы || Reviews page
    public function on_Reviews($path = '/public/pages/reviews/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница портфолио || Portfolio page
    public function on_Portfolio($path = '/public/pages/portfolio/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница цены || Prices page
    public function on_Prices($path = '/public/pages/prices/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница блог || Blog page
    public function on_Blog($path = '/public/pages/blog/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Страница калькулятор || Calculator page
    public function on_Calculator($path = '/public/pages/calculator/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    # Соглашение и документы (ПДн) || Legal / consent page
    public function on_Soglashenie($path = '/public/pages/soglashenie/index.php')
    {
        Routes::auto_element(dirname(__DIR__, 3) . $path, get_defined_vars());
    }

    // siteInfo
    public static function site(): array
    {
        // Динамический базовый URL из текущего запроса
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
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
            'vk' => 'https://vk.com/pkvartira',
            'max' => ''
        ];
    }

    /**
     * @param object $data Данные письма
     * @return void
     */
    public static function sendMail(object $data): void
    {
        $message = "<strong>Информация:</strong>";
        foreach ($data as $key => $value) {
            $message .= "<hr>" . ucfirst($key) . ': ' . $value;
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
     * Отправка лида в Bitrix24 через CRM REST API
     */
    private static function sendToBitrix24(object $data): void
    {
        $webhookUrl = 'https://b24-383l4m.bitrix24.ru/rest/1/chhw3puiokfsraz1/crm.lead.add.json';
        $categoryId = 7;

        $name = $data->имя ?? $data->name ?? '';
        $phone = $data->телефн ?? $data->телефон ?? $data->phone ?? '';
        $email = $data->почта ?? $data->email ?? '';
        $comment = $data->сообщение ?? $data->message ?? '';

        $source = '';
        foreach ($data as $key => $value) {
            if (stripos($key, 'источник') !== false && !empty($value)) {
                $source = $value;
                break;
            }
        }

        $comments = $source ? "Источник: {$source}\n{$comment}" : $comment;

        foreach ($data as $key => $value) {
            if (in_array($key, ['имя', 'name', 'телефн', 'телефон', 'phone', 'почта', 'email', 'сообщение', 'message', 'согласие_персональные_данные'])) {
                continue;
            }
            if (!empty($value) && !is_array($value)) {
                $comments .= "\n{$key}: {$value}";
            }
        }

        $fields = [
            'TITLE' => 'Заявка с сайта pkvartira.ru',
            'NAME' => $name,
            'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']],
            'COMMENTS' => trim($comments),
            'CATEGORY_ID' => $categoryId,
        ];

        if (!empty($email)) {
            $fields['EMAIL'] = [['VALUE' => $email, 'VALUE_TYPE' => 'WORK']];
        }

        $ch = curl_init($webhookUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(['fields' => $fields]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $result = json_decode($response, true);
            if (isset($result['error'])) {
                error_log('Bitrix24 Error: ' . ($result['error_description'] ?? $result['error']));
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
            $информация = (array) json_decode(file_get_contents($path . '/' . $value . '/' . 'about.json', true));//получаем информацию
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

        require dirname(__DIR__, 3) . '/public/data/portfolio.php';
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
}