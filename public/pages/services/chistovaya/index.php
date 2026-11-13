<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seoTitle       = 'Ремонт новостройки с чистовой отделкой в Москве — цены | ' . ($site['name'] ?? 'Проект Квартира');
$seoDescription = 'Ремонт новостройки с чистовой отделкой в Москве. Полная чистовая от чернового: обои, покраска, плитка, ламинат, двери. Цена от 8 000 ₽/м². Гарантия 3 года.';
$canonicalUrl   = $site['baseUrl'] . '/services/chistovaya';
$ogTitle        = 'Ремонт новостройки с чистовой отделкой в Москве';
$ogDescription  = 'Ремонт новостройки с чистовой отделкой в Москве. Полная чистовая от чернового: обои, покраска, плитка, ламинат, двери. Цена от 8 000 ₽/м². Гарантия 3 года.';
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
    'heroH1'       => 'Ремонт новостройки с чистовой отделкой в Москве',
    'heroSubtitle' => 'Полная чистовая отделка новостройки от чернового состояния: обои, покраска, плитка, ламинат, установка дверей. Цена от 8 000 ₽/м². Гарантия 3 года.',
    'heroFormId'   => 'chistovaya_hero',
    'bg_url'       => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',

    'short_answer' => 'Ремонт новостройки с чистовой отделкой в Москве стоит от 8 000 ₽/м². Включает покраску/обои, плиточные работы, укладку ламината, установку дверей, монтаж плинтусов, розеток, освещения, установку сантехники. Сроки: 2–6 недель. Фиксированная смета в договоре, гарантия 3 года. Бесплатный замер. Работаем поверх предчистовой или черновой отделки застройщика.',

    'prices'        => $prices,
    'price_title'   => 'Цены на чистовую отделку',
    'price_subtitle'=> 'Чистовая отделка — это финальный этап ремонта, который превращает голые стены новостройки в готовое к проживанию жильё. Выбирайте пакет под ваш бюджет.',
    'service_name'  => 'чистовой отделки',

    'includes' => [
        ['icon' => '<i class="fa-solid fa-paint-roller" aria-hidden="true"></i>', 'title' => 'Покраска/обои',       'desc' => 'Стены и потолки'],
        ['icon' => '<i class="fa-solid fa-square" aria-hidden="true"></i>',         'title' => 'Плиточные работы',   'desc' => 'Ванная и кухня'],
        ['icon' => '<i class="fa-solid fa-border-all" aria-hidden="true"></i>',      'title' => 'Ламинат/паркет',     'desc' => 'Жилые комнаты'],
        ['icon' => '<i class="fa-solid fa-door-open" aria-hidden="true"></i>',      'title' => 'Двери/плинтуса',    'desc' => 'Монтаж и доборы'],
        ['icon' => '<i class="fa-solid fa-plug" aria-hidden="true"></i>',           'title' => 'Розетки/выключатели','desc' => 'Электрооборудование'],
        ['icon' => '<i class="fa-solid fa-lightbulb" aria-hidden="true"></i>',      'title' => 'Освещение',          'desc' => 'Светильники'],
        ['icon' => '<i class="fa-solid fa-faucet-drip" aria-hidden="true"></i>',    'title' => 'Сантехника',         'desc' => 'Установка и подключение'],
        ['icon' => '<i class="fa-solid fa-kitchen-set" aria-hidden="true"></i>',    'title' => 'Кухонный гарнитур',  'desc' => 'Монтаж и подключение'],
    ],

    'timeline' => [
        ['label' => 'Студия / 1-к', 'value' => '2–3 недели', 'desc' => 'Площадь до 40 м², стандартный набор работ'],
        ['label' => '2-к / 3-к',     'value' => '3–4 недели', 'desc' => 'Площадь 45–70 м², больше санузлов'],
        ['label' => 'Большие / люкс', 'value' => '4–6 недель', 'desc' => 'Площадь 80+ м², сложные решения, премиум-материалы'],
    ],

    'mistakes' => [
        ['title' => 'Начинают чистовую на сырую штукатурку/стяжку', 'desc' => 'Плиска отслаивается, ламинат влагает. Влага стяжки должна быть < 2%, штукатурки — < 5%. Замеряем влагомером.'],
        ['title' => 'Не делают грунтовку перед покраской/плиткой', 'desc' => 'Отделка отслаивается за полгода. Глубокопроникающая грунтовка 2 слоя — обязательна на любом основании.'],
        ['title' => 'Экономят на клее для плитки/ламината', 'desc' => 'Дешёвый клей теряет сцепление. Используем только клей C2TE S1/S2 для плитки и подложку с влагозащитой для ламината.'],
        ['title' => 'Ставят двери до финальной уборки', 'desc' => 'Пыль и строительная грязь забивают петли, заедают замки. Двери — после уборки и защиты пола.'],
        ['title' => 'Не оставляют технические зазоры у плитки', 'desc' => 'Плитка трескается при усадке. Швы 2–3 мм + эпоксидная затирка + деформационные швы по периметру.'],
        ['title' => 'Подписывают акт приёмки без проверки геометрии', 'desc' => 'Кривые углы, перепады пола обнаруживаются после мебели. Приёмка лазерным уровнем и линейкой — стандарт у нас.'],
    ],

    'portfolio' => [],

    'faq' => [
        ['q' => 'Что входит в чистовую отделку?', 'a' => 'Покраска/обои, плиточные работы, укладка ламината, установка дверей, монтаж плинтусов, розеток, освещения, установка сантехники.'],
        ['q' => 'Сколько занимает чистовая отделка?', 'a' => 'Сроки зависят от объёма работ и площади. В среднем 2–6 недель. Точные сроки фиксируем в договоре.'],
        ['q' => 'Можно ли выбрать свои материалы?', 'a' => 'Да, работаем с материалами заказчика или поможем подобрать оптимальные варианты под ваш бюджет.'],
        ['q' => 'Работаете ли вы по договору?', 'a' => 'Да, работаем по официальному договору. В нём фиксируются сроки, стоимость и гарантия.'],
        ['q' => 'Можно ли сразу сделать чистовую, если стены уже оштукатурены?', 'a' => 'Да, если стены уже оштукатурены и пол стянут — делаем чистовую сразу. Если нет — сначала черновую/предчистовую. Выполняем полный цикл.'],
        ['q' => 'Какая гарантия на чистовую отделку?', 'a' => 'Гарантия 3 года на все виды работ. Если проявится дефект — приедем и исправим бесплатно.'],
    ],

    'price_rows' => [
        ['label' => 'Косметический', 'price' => '8000'],
        ['label' => 'Капитальный',   'price' => '13000'],
        ['label' => 'Дизайнерский',  'price' => '18000'],
    ],
    'price_table_title' => 'Стоимость чистовой отделки по метражу',

    'ctaFormId'       => 'chistovaya_cta',
    'ctaFormTitle'    => 'Рассчитать стоимость чистовой отделки',
    'ctaFormSubtitle' => 'Бесплатный расчёт за 5 минут',
    'ctaButtonText'   => 'Рассчитать',
    'ctaExpandable'   => false,
    'ctaSectionBadge' => 'Бесплатный расчёт',
    'ctaSectionHeading' => 'Готовы рассчитать стоимость: ремонт новостройки с чистовой отделкой',
    'ctaSectionText'    => 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.',
    'ctaSectionBenefits' => ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'],

    'otdelka_cluster' => true,
    'otdelka_cluster_current' => 'chistovaya',

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
      "name": "Ремонт новостройки с чистовой отделкой",
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
        { "@type": "ListItem", "position": 3, "name": "Ремонт с чистовой отделкой", "item": "<?= $site['canonicalUrl'] ?>" }
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