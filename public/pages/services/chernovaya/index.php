<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seoTitle       = 'Ремонт новостройки с черновой отделкой в Москве — цены | ' . ($site['name'] ?? 'Проект Квартира');
$seoDescription = 'Ремонт новостройки с черновой отделкой в Москве. Штукатурка, стяжка, разводка коммуникаций. Подготовка к чистовой отделке. Цена от 8 000 ₽/м². Гарантия 3 года.';
$canonicalUrl   = $site['baseUrl'] . '/services/chernovaya';
$ogTitle        = 'Ремонт новостройки с черновой отделкой в Москве';
$ogDescription  = 'Ремонт новостройки с черновой отделкой в Москве. Штукатурка, стяжка, разводка коммуникаций. Подготовка к чистовой отделке. Цена от 8 000 ₽/м². Гарантия 3 года.';
$ogImage        = $site['baseUrl'] . '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$prices = [
    [
        'заголовок' => 'Косметический',
        'цена' => 'от 8 000 ₽',
        'цена_число' => '8000',
        'подзаголовок' => 'Итого для 45 м² - от 360 000 Р',
        'услуги' => ['Обои или покраска стен', 'Замена напольного покрытия', 'Потолки — покраска или натяжка', 'Замена розеток или выключателей', 'Финальная уборка'],
        'кнопка' => 'Заказать расчет',
        'стиль' => 'classic'
    ],
    [
        'заголовок' => 'Капитальный',
        'цена' => 'от 13 000 ₽',
        'цена_число' => '13000',
        'подзаголовок' => 'Итого для 45 м² - от 585 000 Р',
        'услуги' => ['Полная замена электрики', 'Полная замена сантехники', 'Стяжка полов и штукатурка стен', 'Чистовая отделка под ключ', 'Установка дверей и откосов', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'рекомендуем',
        'бейдж' => 'Рекомендуем'
    ],
    [
        'заголовок' => 'Дизайнерский',
        'цена' => 'от 18 000 ₽',
        'цена_число' => '18000',
        'подзаголовок' => 'Итого для 45 м² - от 810 000 Р',
        'услуги' => ['Дизайн-проект в подарок', 'Премиальные материалы', 'Сложные решения: ниши, подсветка', 'Авторский надзор архитектора', 'Все из пакета "Капитальный"', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'classic'
    ]
];

$svc = [
    'heroH1'       => 'Ремонт новостройки с черновой отделкой в Москве',
    'heroSubtitle' => 'Черновая отделка новостройки: штукатурка стен, стяжка пола, разводка коммуникаций. Подготовка к чистовому ремонту. Цена от 8 000 ₽/м². Гарантия 3 года.',
    'heroFormId'   => 'chernovaya_hero',
    'bg_url'       => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',

    'short_answer' => 'Черновая отделка квартиры в новостройке стоит от 8 000 ₽/м². Включает штукатурку стен по маякам, цементно-песчаные или сухую стяжку пола, разводку электрики (кабели, подрозетники, щитки), подводку водоснабжения и канализации. Квартира готова к чистовому ремонту. Сроки: 30–60 дней. Фиксированная смета в договоре, гарантия 3 года. Бесплатный замер.',

    'prices'        => $prices,
    'price_title'   => 'Сколько стоит черновая отделка квартиры в новостройке',
    'price_subtitle'=> 'Стоимость чернового ремонта в новостройке — от 8 000 ₽/м². Черновая отделка квартиры в новостройке по этой цене включает штукатурку стен по маякам, стяжку пола, разводку электрики и сантехники — квартира готова к чистовому ремонту.',
    'service_name'  => 'черновой отделки',

    'includes' => [
        ['icon' => '<i class="fa-solid fa-trowel" aria-hidden="true"></i>',        'title' => 'Штукатурка',       'desc' => 'По маякам с выравниванием'],
        ['icon' => '<i class="fa-solid fa-ruler-combined" aria-hidden="true"></i>',  'title' => 'Стяжка',            'desc' => 'Цементно-песчаная/сухая'],
        ['icon' => '<i class="fa-solid fa-bolt" aria-hidden="true"></i>',            'title' => 'Электрика',         'desc' => 'Кабели, подрозетники, щитки'],
        ['icon' => '<i class="fa-solid fa-pipe" aria-hidden="true"></i>',            'title' => 'Водоснабжение',     'desc' => 'Подводка и канализация'],
        ['icon' => '<i class="fa-solid fa-window-maximize" aria-hidden="true"></i>',  'title' => 'Окна/подоконники',  'desc' => 'Установка при необходимости'],
        ['icon' => '<i class="fa-solid fa-fan" aria-hidden="true"></i>',             'title' => 'Вентиляция',        'desc' => 'Вентиляционные короба'],
        ['icon' => '<i class="fa-solid fa-temperature-high" aria-hidden="true"></i>', 'title' => 'Теплый пол',        'desc' => 'Разводка контуров (опц.)'],
        ['icon' => '<i class="fa-solid fa-shield-halved" aria-hidden="true"></i>',   'title' => 'Гидроизоляция',     'desc' => 'Санузлы и балконы'],
    ],

    'timeline' => [
        ['label' => 'Студия / 1-к', 'value' => '2–3 недели', 'desc' => 'Штукатурка + стяжка + базовая инженерия'],
        ['label' => '2-к / 3-к',     'value' => '3–5 недель', 'desc' => 'Больше площадей, больше санузлов'],
        ['label' => 'Сложная инженерия', 'value' => '4–6 недель', 'desc' => 'Теплый пол, вентиляция, умный дом'],
    ],

    'mistakes' => [
        ['title' => 'Не делают штукатурку по маякам', 'desc' => 'Стены кривые — чистовая отделка «гуляет». Маяки каждые 1.5 м + линейка 2 м — контроль геометрии.'],
        ['title' => 'Стяжка без армирования и деформационных швов', 'desc' => 'Трещины через месяц. Сетка 100×100 мм 4 мм + швы по периметру и на стыках плит — обязательны.'],
        ['title' => 'Экономят на трубах/кабелях для инженерии', 'desc' => 'Прорыв/короткое замыкание после чистовой — ломаем стяжку. Только ПЭХ/металлопластик для воды, ВВГнг-LS для электрики.'],
        ['title' => 'Не делают гидроизоляцию в санузлах', 'desc' => 'Утечка к соседям снизу — ремонт за свои деньги. Двухкомпонентная гидроизоляция 2 слоя + запечатка углов — стандарт.'],
        ['title' => 'Не проверяют наклон канализации', 'desc' => 'Заторы каждую неделю. Наклон 2 см/м + ревизии на каждом повороте — контроль проходимости.'],
        ['title' => 'Подписывают акт приёмки без тепловизора/влагомера', 'desc' => 'Сырые зоны, холодные мостики обнаруживаются после плитки. Приёмка приборами — стандарт у нас.'],
    ],

    'portfolio' => [],

    'faq' => [
        ['q' => 'Сколько стоит черновая отделка квартиры в новостройке?', 'a' => 'От 8 000 ₽/м²: штукатурка, стяжка, электрика, сантехника. Студия 28 м² — от 224 000 ₽, 45 м² — от 360 000 ₽. Точную смету рассчитаем после бесплатного замера.'],
        ['q' => 'Какая цена черновой отделки квартиры в новостройке?', 'a' => 'Цена черновой отделки квартиры в новостройке — от 8 000 ₽/м², черновой ремонт квартиры в новостройке под ключ с материалами — от 13 000 ₽/м². Фиксируем в договоре.'],
        ['q' => 'Сколько стоит черновой ремонт квартиры в новостройке?', 'a' => 'Стоимость чернового ремонта квартиры в новостройке зависит от площади и состояния объекта: в среднем от 8 000 ₽/м². Рассчитайте свой вариант в калькуляторе за 1 минуту.'],
        ['q' => 'Как рассчитать черновой ремонт новостройки?', 'a' => 'Оставьте заявку — инженер приедет бесплатно, замерит квартиру и за 24 часа подготовит смету. Или посчитайте предварительно в калькуляторе.'],
        ['q' => 'Что такое черновая отделка?', 'a' => 'Это подготовительные работы: штукатурка стен, стяжка пола, разводка электрики и сантехники. После черновой отделки квартира готова к чистовому ремонту.'],
        ['q' => 'Можно ли сразу сделать чистовую отделку?', 'a' => 'Да, если стены уже оштукатурены и пол стянут. Если нет — сначала выполняем черновую, затем чистовую. Выполняем полный цикл.'],
    ],

    'price_rows' => [
        ['label' => 'Косметический', 'price' => '8000'],
        ['label' => 'Капитальный',   'price' => '13000'],
        ['label' => 'Дизайнерский',  'price' => '18000'],
    ],
    'price_table_title' => 'Стоимость черновой отделки по метражу',

    'ctaFormId'       => 'chernovaya_cta',
    'ctaFormTitle'    => 'Рассчитать стоимость черновой отделки',
    'ctaFormSubtitle' => 'Бесплатный расчёт за 5 минут',
    'ctaButtonText'   => 'Рассчитать',
    'ctaExpandable'   => false,
    'ctaSectionBadge' => 'Бесплатный расчёт',
    'ctaSectionHeading' => 'Готовы рассчитать стоимость: ремонт новостройки с черновой отделкой',
    'ctaSectionText'    => 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.',
    'ctaSectionBenefits' => ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'],

    'otdelka_cluster' => true,
    'otdelka_cluster_current' => 'chernovaya',

    'show_process' => true,
];

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seoTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($seoDescription, 155)) ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($ogDescription) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($ogDescription) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)) ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "<?= $site['canonicalUrl'] ?>#service",
      "name": "Ремонт новостройки с черновой отделкой",
      "description": "Профессиональный ремонт квартир и домов под ключ в Москве",
      "provider": { "@id": "<?= $site['baseUrl'] ?>#organization" },
      "serviceType": "Ремонтные услуги",
      "areaServed": { "@type": "City", "name": "Москва" },
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Услуги по ремонту",
        "itemListElement": [
          <?php foreach (($prices ?? []) as $__oi => $__offer): ?>
          {
            "@type": "Offer",
            "price": "<?= htmlspecialchars($__offer['цена_число'] ?? '') ?>",
            "priceCurrency": "RUB",
            "itemOffered": {
              "@type": "Service",
              "name": <?= json_encode(($__offer['заголовок'] ?? '') . ' ремонт', JSON_UNESCAPED_UNICODE) ?>
            }
          }<?= $__oi < count($prices) - 1 ? ',' : '' ?>
          <?php endforeach; ?>
        ]
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "<?= $site['canonicalUrl'] ?>#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Главная", "item": "<?= $site['baseUrl'] ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Услуги", "item": "<?= $site['baseUrl'] ?>/services" },
        { "@type": "ListItem", "position": 3, "name": "Ремонт с черновой отделкой", "item": "<?= $site['canonicalUrl'] ?>" }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "<?= $site['canonicalUrl'] ?>#faq",
      "mainEntity": [
        <?php foreach ($svc['faq'] as $i => $faq): ?>
        {
          "@type": "Question",
          "name": <?= json_encode($faq['q'], JSON_UNESCAPED_UNICODE) ?>,
          "acceptedAnswer": {
            "@type": "Answer",
            "text": <?= json_encode($faq['a'], JSON_UNESCAPED_UNICODE) ?>
          }
        }<?= $i < count($svc['faq']) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
      ]
    }
  ]
}
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="flex flex-col">

        <?php include './public/components/service-page-sections.php'; ?>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>