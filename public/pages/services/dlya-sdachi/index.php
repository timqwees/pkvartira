<?php
use Setting\Route\Function\Functions;
$site = Functions::site();
$title = 'Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
$prices = [
    [
        'заголовок' => 'Для сдачи в аренду',
        'цена' => 'от 8 000 ₽',
        'цена_число' => '8000',
        'подзаголовок' => 'Итого для 40 м² - от 320 000 Р',
        'услуги' => ['Штукатурка стен', 'Бюджетный пол (ламинат/линолеум)', 'Простые потолки (покраска/побелка)', 'Базовая сантехника', 'Финальная уборка'],
        'кнопка' => 'Заказать расчет',
        'стиль' => 'classic'
    ],
    [
        'заголовок' => 'Для продажи',
        'цена' => 'от 13 000 ₽',
        'цена_число' => '13000',
        'подзаголовок' => 'Итого для 40 м² - от 520 000 Р',
        'услуги' => ['Дизайн-проект в подарок', 'Премиальная отделка', 'Подсветка и декоративные элементы', 'Установка дверей и откосов', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'рекомендуем',
        'бейдж' => 'Рекомендуем'
    ],
    [
        'заголовок' => 'Под заселение (с мебелью)',
        'цена' => 'от 18 000 ₽',
        'цена_число' => '18000',
        'подзаголовок' => 'Итого для 40 м² - от 720 000 Р',
        'услуги' => ['Полный ремонт под ключ', 'Мебель и техника в комплекте', 'Авторский надзор', 'Все из пакета "Для продажи"', 'Умный дом (базовый)', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'classic'
    ]
];
$portfolio = (new Functions())->getPortfolio('public/assets/images/portfolio-photos/newbuilds');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars(\Setting\Route\Function\Functions::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Function\Functions::truncateSeo('Ремонт квартиры под сдачу, для продажи и под заселение в Москве. С материалами и мебелью. Фиксированная смета, гарантия 3 года. Недорого и качественно. Бесплатный замер. — Проект Квартира (ПКвартира).',155)); ?> От компании Проект Квартира (ПКвартира)."><meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/dlya-sdachi'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($title); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta property="og:description" content="Ремонт квартиры под сдачу, для продажи и под заселение в Москве. Фиксированная смета, гарантия 3 года. Бесплатный замер.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/services/dlya-sdachi'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta property="og:image:alt" content="Ремонт для сдачи и продажи квартиры">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="Ремонт квартиры под сдачу, для продажи и под заселение в Москве. Фиксированная смета, гарантия 3 года. Бесплатный замер.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "logo": {
          "@type": "ImageObject",
          "url": <?= json_encode($site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
          "width": 300,
          "height": 300
        },
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
          "contactType": "customer service",
          "availableLanguage": ["Russian"],
          "areaServed": "RU"
        },
        "address": {
          "@type": "PostalAddress",
          "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
          "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
          "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
          "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
          "addressCountry": <?= json_encode($site['address']['addressCountry'], JSON_UNESCAPED_UNICODE); ?>
        },
        "sameAs": <?= json_encode(array_values(array_filter([$site['vk'], $site['telegram'], $site['whatsapp']])), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
      },
      {
        "@type": "WebSite",
        "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
        "description": <?= json_encode($site['description'], JSON_UNESCAPED_UNICODE); ?>,
        "publisher": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "inLanguage": "ru-RU"
      },
      {
        "@type": "WebPage",
        "@id": <?= json_encode($site['canonicalUrl'] . '#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($title . ' — ' . ($site['name'] ?? 'Проект Квартира'), JSON_UNESCAPED_UNICODE); ?>,
        "description": "Ремонт квартиры под сдачу, для продажи и под заселение в Москве. Фиксированная смета, гарантия 3 года. Бесплатный замер.",
        "isPartOf": {
          "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "about": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "inLanguage": "ru-RU"
      },
      {
        "@type": "Service",
        "@id": <?= json_encode($site['canonicalUrl'] . '#service', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": "Ремонт квартиры для сдачи и продажи",
        "description": "Профессиональный ремонт квартир для сдачи в аренду, продажи и заселения в Москве",
        "provider": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "serviceType": "Ремонтные услуги",
        "areaServed": {
          "@type": "City",
          "name": "Москва"
        },
        "hasOfferCatalog": {
          "@type": "OfferCatalog",
          "name": "Услуги по ремонту для сдачи",
          "itemListElement": [
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Для сдачи в аренду",
                "description": "Бюджетный ремонт для сдачи квартиры в аренду"
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Для продажи",
                "description": "Премиальный ремонт для продажи квартиры"
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Под заселение",
                "description": "Полный ремонт с мебелью и техникой"
              }
            }
          ]
        }
      },
      {
        "@type": "BreadcrumbList",
        "@id": <?= json_encode($site['canonicalUrl'] . '#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Главная",
            "item": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Услуги",
            "item": <?= json_encode($site['baseUrl'] . '/services', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Ремонт для сдачи и продажи",
            "item": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          }
        ]
      }
    ]
  }
  </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white text-gray-900 font-body antialiased">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20 flex flex-col gap-0" style="padding-top:80px">

        <!-- 1. Hero section -->
        <section class="relative text-white py-12 md:py-32 bg-cover bg-center bg-no-repeat" style="background-image: url(<?= htmlspecialchars($bg_url); ?>);">
            <div class="absolute z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
            <div class="relative z-10 container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <div class="max-w-3xl">
                        <h1 class="text-3xl md:text-5xl font-heading font-bold mb-6 text-white leading-tight">
                            Ремонт квартиры<br>
                            <strong class="text-orange-500">под сдачу или продажу</strong><br>
                            в Москве
                        </h1>
                        <p class="text-xl mb-8 text-white max-w-2xl">Сделайте квартиру ликвидной: бюджетный ремонт для сдачи или премиальный — для продажи. Фиксированная смета и гарантия 3 года.</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="tel:<?= $site['phone']; ?>" class="bg-orange-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-orange-600 transition text-lg"><i class="fas fa-phone mr-2"></i>Вызвать инженера</a>
                            <button data-button-dialog class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold hover:bg-white hover:text-gray-900 transition"><i class="fas fa-calculator mr-2"></i>Расчёт сметы</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. Price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Выберите цель ремонта</h2>
                    <p class="text-xl text-gray-600">Для сдачи, продажи или собственного проживания — подберём оптимальный вариант</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                    <?php foreach ($prices as $price): ?>
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition group <?= ($price['стиль'] ?? '') === 'рекомендуем' ? 'ring-2 ring-orange-500 scale-105' : '' ?>">
                        <?php if (!empty($price['бейдж'])): ?>
                        <div class="bg-orange-500 text-white text-center text-sm font-bold py-2"><?= htmlspecialchars($price['бейдж']) ?></div>
                        <?php endif; ?>
                        <div class="p-6">
                            <h3 class="text-2xl font-heading font-bold mb-2"><?= htmlspecialchars($price['заголовок']) ?></h3>
                            <div class="text-3xl font-bold text-orange-600 mb-1"><?= htmlspecialchars($price['цена']) ?></div>
                            <p class="text-sm text-gray-500 mb-4"><?= htmlspecialchars($price['подзаголовок']) ?></p>
                            <ul class="space-y-2 mb-6">
                                <?php foreach ($price['услуги'] as $service): ?>
                                <li class="flex items-start gap-2 text-sm text-gray-600"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><?= htmlspecialchars($service) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button data-button-dialog class="w-full bg-orange-500 text-white py-3 rounded-xl font-semibold hover:bg-orange-600 transition"><?= htmlspecialchars($price['кнопка']) ?></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 3. Benefits -->
        <section class="reveal bg-gray-50 py-10 md:py-14">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Ремонт с материалом, мебелью и техникой</h2>
                    <p class="text-xl text-gray-600">Закажите ремонт квартиры под ключ с полным оснащением — въезжайте сразу после сдачи</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-6 shadow-sm text-center"><div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-truck text-green-600 text-2xl"></i></div><h3 class="text-lg font-heading font-bold mb-2">Ремонт с черновыми материалами</h3><p class="text-gray-600 text-sm">Мы закупаем и доставляем все черновые материалы: цемент, штукатурку, проводку, трубы. Вам не нужно ездить по строительным рынкам.</p></div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm text-center"><div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-palette text-blue-600 text-2xl"></i></div><h3 class="text-lg font-heading font-bold mb-2">Ремонт с чистовыми материалами</h3><p class="text-gray-600 text-sm">Плитка, ламинат, обои, двери, сантехника — подбираем под бюджет и стиль. Помогаем с выбором и закупаем по оптовым ценам.</p></div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm text-center"><div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-couch text-purple-600 text-2xl"></i></div><h3 class="text-lg font-heading font-bold mb-2">Ремонт с мебелью и техникой</h3><p class="text-gray-600 text-sm">Полностью меблированная квартира под ключ: кухня, шкафы, кровати, бытовая техника. Идеально для сдачи в аренду — высокая ставка аренды.</p></div>
                </div>
            </div>
        </section>

        <!-- 4. Process -->
        <section id="process" class="reveal py-16 bg-blue-50">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="text-center mb-14">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Как мы готовим квартиру к сдаче или продаже</h2>
                    <p class="text-xl text-gray-600">5 шагов от замера до полной готовности объекта</p>
                </div>
                <div class="grid md:grid-cols-5 gap-4">
                    <div class="bg-white rounded-2xl p-5 shadow-sm text-center"><div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-orange-600 font-heading font-bold text-xl">1</span></div><h3 class="font-heading font-bold mb-2">Замер и смета</h3><p class="text-gray-500 text-sm">Выезд инженера, 3 варианта сметы под ваш бюджет</p></div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm text-center"><div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-orange-600 font-heading font-bold text-xl">2</span></div><h3 class="font-heading font-bold mb-2">Дизайн-проект</h3><p class="text-gray-500 text-sm">Планировка, материалы, мебель под цель ремонта</p></div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm text-center"><div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-orange-600 font-heading font-bold text-xl">3</span></div><h3 class="font-heading font-bold mb-2">Ремонт</h3><p class="text-gray-500 text-sm">Штатные мастера, фиксированные сроки, фотоотчёты</p></div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm text-center"><div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-orange-600 font-heading font-bold text-xl">4</span></div><h3 class="font-heading font-bold mb-2">Меблировка</h3><p class="text-gray-500 text-sm">Сборка и расстановка мебели, подключение техники</p></div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm text-center"><div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-3"><span class="text-orange-600 font-heading font-bold text-xl">5</span></div><h3 class="font-heading font-bold mb-2">Приёмка</h3><p class="text-gray-500 text-sm">Подписание акта, гарантия 3 года, ключи вам</p></div>
                </div>
            </div>
        </section>

        <?php
        $priceRows = [
            ['label' => 'Косметический', 'price' => '8000'],
            ['label' => 'Капитальный', 'price' => '13000'],
            ['label' => 'Дизайнерский', 'price' => '18000'],
        ];
        $priceTableTitle = 'Стоимость по метражу';
        include './public/components/price-table.php';
        ?>

        <!-- 5. FAQ -->
        <section class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="container mx-auto px-4 max-w-4xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Частые вопросы о ремонте для сдачи и продажи</h2>
                </div>
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="faq-toggle w-full flex items-center justify-between p-5 bg-white hover:bg-gray-50 transition text-left"><span class="font-heading font-semibold" itemprop="name">Какой ремонт лучше сделать для сдачи квартиры?</span><i class="fas fa-chevron-down text-gray-400 transition-transform"></i></button>
                        <div class="hidden px-5 pb-5 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Для сдачи в аренду оптимален косметический или капитальный ремонт бюджетного сегмента: качественная отделка без излишеств. Главное — надёжная сантехника, исправная проводка, аккуратное покрытие пола и стен. Такой ремонт окупается за 6-12 месяцев аренды. Под ключ с материалом — от 8 000 ₽/м².</div></div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="faq-toggle w-full flex items-center justify-between p-5 bg-white hover:bg-gray-50 transition text-left"><span class="font-heading font-semibold" itemprop="name">Какой ремонт повышает стоимость квартиры при продаже?</span><i class="fas fa-chevron-down text-gray-400 transition-transform"></i></button>
                        <div class="hidden px-5 pb-5 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Дизайнерский ремонт с качественными материалами и мебелью увеличивает стоимость квартиры на 15-25%. Покупатели готовы платить больше за готовое жильё «под ключ» с современной отделкой и техникой. Окупаемость — полностью за счёт увеличенной цены продажи.</div></div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="faq-toggle w-full flex items-center justify-between p-5 bg-white hover:bg-gray-50 transition text-left"><span class="font-heading font-semibold" itemprop="name">Делаете ремонт с мебелью и техникой?</span><i class="fas fa-chevron-down text-gray-400 transition-transform"></i></button>
                        <div class="hidden px-5 pb-5 text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да, мы комплектуем квартиру полностью: кухонный гарнитур, встроенная техника, сантехника, светильники, мебель для комнат. Работаем с проверенными поставщиками, даём гарантию на мебель и технику 1 год. Идеальный вариант для сдачи квартиры под ключ с мебелью.</div></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. CTA -->
        <?php
        $ctaFormId = 'dlya_sdachi_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Сдать или продать';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт квартиры под сдачу в Москве';
        $ctaSectionText = 'Оставьте заявку на бесплатный расчёт стоимости ремонта под вашу цель';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 30 минут', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>
</html>
