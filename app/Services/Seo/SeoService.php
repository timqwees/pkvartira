<?php

namespace App\Services\Seo;

class SeoService
{
    private $meta = [];

    public function __construct()
    {
        $this->meta = [
            'title' => 'Замена и отбеливание подошвы Loro Piana в Москве — ХИТ | Реставрация сумок | MANDO MEMORI',
            'description' => 'ХИТ: замена подошвы Loro Piana от 18 990 ₽, отбеливание подошвы Loro Piana от 10 990 ₽, реставрация сумок Hermès/Chanel от 7 990 ₽, реставрация обуви от 6 490 ₽. Мастерская в Москве. ' . \Setting\Route\Function\Functions::deliveryNote() . '. Гарантия качества.',
            'keywords' => 'замена подошвы Loro Piana Москва, отбеливание подошвы Loro Piana, реставрация сумок Москва, реставрация обуви Loro Piana, химчистка Loro Piana, MANDO MEMORI',
            'h1' => 'Замена и отбеливание подошвы Loro Piana, реставрация сумок в Москве — MANDO MEMORI'
        ];
    }

    public function renderHead($meta = [])
    {
        $mergedMeta = array_merge($this->meta, $meta);
        
        $html = '<title>' . htmlspecialchars($mergedMeta['title']) . '</title>' . "\n";
        $html .= '<meta name="description" content="' . htmlspecialchars($mergedMeta['description']) . '">' . "\n";
        $html .= '<meta name="keywords" content="' . htmlspecialchars($mergedMeta['keywords']) . '">' . "\n";
        
        return $html;
    }

    public function jsonLdWebSite()
    {
    $s = SeoMeta::siteUrl();
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $s . '/#website',
        'name' => 'MANDO MEMORI',
        'alternateName' => 'mmclean.ru',
        'url' => $s,
        'description' => 'Химчистка и реставрация обуви и сумок в Москве. Loro Piana, Hermès, Berluti.',
        'inLanguage' => 'ru-RU',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => $s . '/blog?search={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    public function jsonLdOrganization()
    {
    $s = SeoMeta::siteUrl();
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => $s . '/#organization',
        'name' => 'MANDO MEMORI',
        'url' => $s,
        'logo' => [
            '@type' => 'ImageObject',
            'url' => $s . '/public/assets/images/favicon_full_black.svg',
            'width' => 90,
            'height' => 52,
        ],
        'description' => 'Мастерская по химчистке и реставрации обуви в Москве с 2015 года.',
        'foundingDate' => '2015',
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+7 (916) 182-92-72',
            'contactType' => 'customer service',
            'availableLanguage' => 'Russian',
        ],
        'sameAs' => [
            'https://t.me/maksim1144',
        ],
    ];
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    public function jsonLdServices()
    {
    $s = SeoMeta::siteUrl();
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => 'Химчистка и реставрация обуви',
            'name' => 'Химчистка и реставрация обуви',
            'description' => 'Ручная химчистка и реставрация обуви и сумок в Москве. Loro Piana, Hermès, Berluti. Стоимость от 1 490 ₽.',
            'provider' => [
                '@type' => 'Organization',
                '@id' => $s . '/#organization',
                'name' => 'MANDO MEMORI',
            ],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Москва',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Каталог услуг MANDO MEMORI',
                'itemListElement' => [
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Химчистка премиальной обуви', 'description' => 'Ручная чистка от 5 990 ₽ за пару']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Реставрация обуви Loro Piana', 'description' => 'Восстановление от 6 490 ₽ за пару']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Замена подошвы Loro Piana', 'description' => 'Замена от 18 990 ₽ за пару']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Отбеливание подошвы', 'description' => 'Отбеливание от 10 990 ₽ за пару']],
                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Реставрация сумок', 'description' => 'Реставрация от 7 990 ₽ за изделие']],
                ],
            ],
        ];
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }

    public function jsonLdFaq()
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Сколько стоит химчистка обуви в Москве?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Стоимость химчистки обуви в нашей мастерской — от 5 990 ₽ за пару. Цена зависит от материала, сложности загрязнений и состояния обуви. Мы предлагаем бесплатную консультацию и оценку.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Сколько времени занимает химчистка обуви?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Ручная химчистка премиальной обуви занимает от 1 до 6 дней в зависимости от материала и сложности. Срочная обработка возможна за 1 день.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Вы забираете обувь на химчистку с доставкой?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Да, мы предлагаем химчистку обуви с доставкой по Москве. Наш курьер приедет к вам, заберёт обувь и вернёт её чистой. ' . \Setting\Route\Function\Functions::deliveryNote() . '.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Какие бренды обуви вы принимаете на химчистку?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Мы специализируемся на сегменте: Loro Piana, Hermès, Berluti, Gucci, Prada, Louis Vuitton, Balenciaga, Christian Louboutin. Каждая пара получает индивидуальный подход с учётом материала и конструкции.'
                    ]
                ],
            ]
        ];
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
