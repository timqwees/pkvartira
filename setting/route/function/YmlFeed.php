<?php declare(strict_types=1);

namespace Setting\route\function;

/**
 * Генератор YML-фида для Яндекс.Бизнес / Яндекс.Услуги
 */
class YmlFeed
{
    private string $baseUrl;
    private string $siteName;
    private string $sitePhone;
    private string $siteEmail;

    private array $services = [];

    public function __construct()
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'pkvartira.ru';
        $this->baseUrl = $scheme . '://' . $host;
        $this->siteName = 'ПКвартира';
        $this->sitePhone = '+7 495 473-17-37';
        $this->siteEmail = 'info@pkvartira.ru';

        $this->services = [
            'studio' => [
                'name' => 'квартиры-студии',
                'slug' => 'studio',
                'price' => 325000,
                'image' => '/public/assets/images/portfolio-photos/studio/2_31sqm/01_gostinaya-kukhnya.jpg',
                'desc' => 'Капитальный ремонт квартиры-студии под ключ. Выезд специалиста, замер, смета — бесплатно. Гарантия 3 года.',
            ],
            '1room' => [
                'name' => 'однокомнатной квартиры',
                'slug' => '1room',
                'price' => 520000,
                'image' => '/public/assets/images/portfolio-photos/1room/standard/2_37sqm/2.jpg',
                'desc' => 'Капитальный ремонт однокомнатной квартиры под ключ. Выезд специалиста, замер, смета — бесплатно. Гарантия 3 года.',
            ],
            '2room' => [
                'name' => 'двухкомнатной квартиры',
                'slug' => '2room',
                'price' => 650000,
                'image' => '/public/assets/images/portfolio-photos/2room/standard/1_55sqm/3.jpg',
                'desc' => 'Капитальный ремонт двухкомнатной квартиры под ключ. Выезд специалиста, замер, смета — бесплатно. Гарантия 3 года.',
            ],
            '3room' => [
                'name' => 'трёхкомнатной квартиры',
                'slug' => '3room',
                'price' => 910000,
                'image' => '/public/assets/images/portfolio-photos/3room/standard/2_60sqm/6.webp',
                'desc' => 'Капитальный ремонт трёхкомнатной квартиры под ключ. Выезд специалиста, замер, смета — бесплатно. Гарантия 3 года.',
            ],
            '4room' => [
                'name' => 'четырёхкомнатной квартиры',
                'slug' => '4room',
                'price' => 1170000,
                'image' => '/public/assets/images/portfolio-photos/4room/standard/1_65sqm/1.png',
                'desc' => 'Капитальный ремонт четырёхкомнатной квартиры под ключ. Выезд специалиста, замер, смета — бесплатно. Гарантия 3 года.',
            ],
            'pod-klyuch' => [
                'name' => 'квартир под ключ',
                'slug' => 'pod-klyuch',
                'price' => 585000,
                'image' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
                'desc' => 'Ремонт квартир под ключ — полный цикл работ от замера до отделки. Выезд специалиста, смета — бесплатно. Гарантия 3 года.',
            ],
            'nowostroyka' => [
                'name' => 'в новостройке',
                'slug' => 'nowostroyka',
                'price' => 585000,
                'image' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
                'desc' => 'Ремонт квартиры в новостройке с нуля. Адаптация под усадку дома, качественные материалы. Гарантия 3 года.',
            ],
            'vtorichka' => [
                'name' => 'вторичного жилья',
                'slug' => 'vtorichka',
                'price' => 1040000,
                'image' => '/public/assets/images/portfolio-photos/secondary/1_80sqm/04.jpg',
                'desc' => 'Ремонт вторичной квартиры с демонтажем и заменой коммуникаций. Выезд, замер — бесплатно. Гарантия 3 года.',
            ],
            'doma' => [
                'name' => 'домов и коттеджей',
                'slug' => 'doma',
                'price' => 585000,
                'image' => '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.jpg',
                'desc' => 'Капитальный ремонт дома или коттеджа под ключ. От фундамента до кровли. Гарантия 3 года.',
            ],
            'kommercheskie' => [
                'name' => 'коммерческих помещений',
                'slug' => 'kommercheskie',
                'price' => 585000,
                'image' => '/public/assets/images/portfolio-photos/4room/standard/1_65sqm/1.png',
                'desc' => 'Ремонт офисов, магазинов и коммерческих помещений. С соблюдением норм СНиП и пожарной безопасности.',
            ],
        ];
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

        header('Content-Type: application/xml; charset=utf-8');
        header('ETag: ' . $etag);
        header('Cache-Control: public, max-age=1800');
        header('Content-Length: ' . strlen($xml));
        echo $xml;
    }

    private function buildXml(): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<yml_catalog date="' . date('Y-m-d H:i') . '">' . "\n";
        $xml .= '  <shop>' . "\n";

        // Shop info
        $xml .= '    <name>' . $this->escape($this->siteName) . "</name>\n";
        $xml .= '    <company>' . $this->escape($this->siteName) . "</company>\n";
        $xml .= '    <url>' . $this->escape($this->baseUrl) . "</url>\n";
        $xml .= '    <phone>' . $this->escape($this->sitePhone) . "</phone>\n";
        $xml .= '    <email>' . $this->escape($this->siteEmail) . "</email>\n";

        // Categories
        $xml .= '    <categories>' . "\n";
        $xml .= '      <category id="1">Ремонт квартир</category>' . "\n";
        $xml .= '    </categories>' . "\n";

        // Offers
        $xml .= '    <offers>' . "\n";

        $idx = 1000;
        foreach ($this->services as $key => $svc) {
            $idx++;
            $fullUrl = $this->baseUrl . '/services/' . $svc['slug'];
            $imageUrl = $this->baseUrl . $svc['image'];

            $xml .= '      <offer id="' . $idx . '" available="true">' . "\n";
            $xml .= '        <name>Ремонт ' . $this->escape($svc['name']) . "</name>\n";
            $xml .= '        <vendor>' . $this->escape($this->siteName) . "</vendor>\n";
            $xml .= '        <price>' . $svc['price'] . "</price>\n";
            $xml .= '        <currencyId>RUR</currencyId>' . "\n";
            $xml .= '        <categoryId>1</categoryId>' . "\n";
            $xml .= '        <picture>' . $this->escape($imageUrl) . "</picture>\n";
            $xml .= '        <url>' . $this->escape($fullUrl) . "</url>\n";
            $xml .= '        <description>' . $this->escape($svc['desc']) . "</description>\n";

            $short = 'от ' . number_format($svc['price'], 0, ',', ' ') . ' ₽';
            $xml .= '        <shortDescription>' . $this->escape($short) . "</shortDescription>\n";
            $xml .= '      </offer>' . "\n";
        }

        $xml .= '    </offers>' . "\n";
        $xml .= '  </shop>' . "\n";
        $xml .= '</yml_catalog>' . "\n";

        return $xml;
    }

    private function escape(string $str): string
    {
        return htmlspecialchars($str, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }
}
