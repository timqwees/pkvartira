<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Дизайн интерьеров в Москве — от 2 500 ₽/м², авторский надзор, гарантия';
$bg_url = '/public/assets/images/portfolio-photos/cottage/1_180sqm/2.jpg';
$prices = [
    [
        'заголовок' => 'Эскизный проект',
        'цена' => 'от 2 500 ₽',
        'цена_число' => '2500',
        'подзаголовок' => 'Итого для 50 м² — от 125 000 Р',
        'услуги' => ['Планировочное решение', 'Эскизы основных зон', 'Подбор цветовой палитры', 'Визуализация 2–3 помещений', 'Смета на материалы'],
        'кнопка' => 'Заказать проект',
        'стиль' => 'classic'
    ],
    [
        'заголовок' => 'Стандарт',
        'цена' => 'от 4 500 ₽',
        'цена_число' => '4500',
        'подзаголовок' => 'Итого для 50 м² — от 225 000 Р',
        'услуги' => ['Полная планировка', '3D-визуализация всех комнат', 'Чертежи для бригад', 'Подбор мебели и материалов', 'Авторский надзор на объекте', 'Эксклюзивные решения'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'рекомендуем',
        'бейдж' => 'Рекомендуем'
    ],
    [
        'заголовок' => 'Премиум',
        'цена' => 'от 7 000 ₽',
        'цена_число' => '7000',
        'подзаголовок' => 'Итого для 50 м² — от 350 000 Р',
        'услуги' => ['Индивидуальный дизайн', 'Фотореалистичная 3D-визуализация', 'Полный комплект чертежей', 'Подбор эксклюзивных материалов', 'Комплектация объекта под ключ', 'Авторский надзор до сдачи'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'classic'
    ]
];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title, 48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Дизайн интерьеров в Москве от 2 500 ₽/м². Эскизный проект, 3D-визуализация, чертежи, подбор мебели и материалов. Авторский надзор. Гарантия результата. — Проект Квартира (ПКвартира).', 155)); ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/dizajn-interierov'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($title); ?>">
    <meta property="og:description" content="Дизайн интерьеров в Москве от 2 500 ₽/м². Эскизный проект, 3D-визуализация, чертежи, подбор мебели и материалов. Авторский надзор.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/services/dizajn-interierov'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="Дизайн интерьера в Москве от 2 500 ₽/м². Эскизный проект, 3D-визуализация, чертежи, авторский надзор.">
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
        }
      },
      {
        "@type": "WebSite",
        "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>
      },
      {
        "@type": "WebPage",
        "@id": <?= json_encode($site['baseUrl'] . '/services/dizajn-interierov#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'] . '/services/dizajn-interierov', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($title, JSON_UNESCAPED_UNICODE); ?>,
        "isPartOf": {"@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>},
        "primaryImageOfPage": {"@id": <?= json_encode($site['baseUrl'] . $bg_url, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>},
        "datePublished": "2026-09-09T00:00:00+03:00",
        "dateModified": "2026-09-09T00:00:00+03:00"
      },
      {
        "@type": "Service",
        "name": "Дизайн интерьеров в Москве",
        "description": "Разработка дизайн-проекта интерьера квартир и домов в Москве. Эскизный проект, 3D-визуализация, чертежи, подбор мебели и материалов.",
        "provider": {"@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>},
        "areaServed": {"@type": "City", "name": "Москва"},
        "offers": {
          "@type": "AggregateOffer",
          "lowPrice": "2500",
          "highPrice": "7000",
          "priceCurrency": "RUB",
          "offerCount": "3"
        }
      },
      {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {"@type": "ListItem", "position": 1, "item": {"@id": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>, "name": "Главная"}},
          {"@type": "ListItem", "position": 2, "item": {"@id": <?= json_encode($site['baseUrl'] . '/services', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>, "name": "Услуги"}},
          {"@type": "ListItem", "position": 3, "item": {"@id": <?= json_encode($site['baseUrl'] . '/services/dizajn-interierov', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>, "name": "Дизайн интерьеров"}}
        ]
      },
      {
        "@type": "FAQPage",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Сколько стоит дизайн интерьера?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Стоимость зависит от площади и сложности проекта. Эскизный проект — от 2 500 ₽/м², стандарт — от 4 500 ₽/м², премиум — от 7 000 ₽/м². Точный расчёт после консультации."
            }
          },
          {
            "@type": "Question",
            "name": "Сколько времени занимает разработка дизайн-проекта?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Эскизный проект — 5–7 рабочих дней. Стандарт — 10–15 рабочих дней. Премиум — 20–30 рабочих дней. Сроки фиксируются в договоре."
            }
          },
          {
            "@type": "Question",
            "name": "Входит ли авторский надзор в стоимость?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Авторский надзор входит в пакеты «Стандарт» и «Премиум». Дизайнер контролирует соответствие проекта на всех этапах ремонта и помогает бригаде с решениями."
            }
          },
          {
            "@type": "Question",
            "name": "Можно ли сделать дизайн-проект только для одной комнаты?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Да, мы разрабатываем проекты как для всей квартиры, так и для отдельных помещений: кухни, спальни, детской, ванной. Стоимость рассчитывается индивидуально."
            }
          },
          {
            "@type": "Question",
            "name": "Работаете ли вы с новостройками?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Да, у нас большой опыт работы с новостройками. Учитываем особенности планировок, несущие стены, инженерные коммуникации. Помогаем с планировкой с нуля."
            }
          }
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
    <main class="pt-20 flex flex-col gap-0" style="padding-top:80px">

        <!-- 1. hero section -->
        <?php
        $heroFormId = 'dizajn_hero';
        $heroSubtitle = 'Создаём интерьеры, в которых хочется жить. От первого эскиза до финальной расстановки мебели — берём на себя весь процесс. Работаем с новостройками и вторичкой в Москве и МО.';
        $heroCtaText = 'Заказать дизайн-проект';
        $heroCtaAnchorText = 'Смотреть цены';
        include './public/components/hero-section.php';
        ?>

        <!-- 2. Price cards -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Стоимость дизайн-проекта интерьера
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Выберите подходящий пакет. Точную стоимость рассчитаем после знакомства с объектом и вашими пожеланиями.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-orange-500 shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                            itemscope itemtype="https://schema.org/Service">
                            <meta itemprop="name" content="<?= htmlspecialchars($price['заголовок']); ?> дизайн интерьера">
                            <?php if (isset($price['бейдж'])): ?>
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-600 border border-orange-200">
                                    <?= htmlspecialchars($price['бейдж']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="<?= isset($price['бейдж']) ? 'mt-3' : ''; ?> text-sm text-gray-600">
                                <?= htmlspecialchars($price['заголовок']); ?>
                            </div>
                            <div class="mt-2 text-3xl font-bold text-gray-900" itemprop="offers" itemscope
                                itemtype="https://schema.org/Offer">
                                <span itemprop="price"
                                    content="<?= htmlspecialchars($price['цена_число']); ?>"><?= htmlspecialchars($price['цена']); ?></span>/м²
                                <meta itemprop="priceCurrency" content="RUB">
                                <meta itemprop="priceValidUntil" content="2026-12-31">
                            </div>
                            <div class="text-sm text-gray-600"><?= htmlspecialchars($price['подзаголовок']); ?></div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <?php foreach ($price['услуги'] as $услуга): ?>
                                    <li class="flex gap-2"><i
                                            class="fa-solid fa-check text-green-600 mt-0.5"></i><span><?= htmlspecialchars($услуга); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="tel:<?= $site['phone'] ?>"
                                class="flex items-center justify-center mt-6 w-full <?= $price['стиль'] === 'рекомендуем' ? 'bg-orange-500 hover:bg-orange-600 text-white' : 'border border-blue-700 text-blue-700 hover:bg-blue-50' ?> px-5 py-3 rounded-lg font-semibold transition"><?= htmlspecialchars($price['кнопка']); ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- 3. Что входит в дизайн-проект -->
        <section class="reveal bg-gray-50 py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
                    Что входит в дизайн-проект
                </h2>

                <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-pencil-ruler" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Замер и обмер</div>
                        <div class="text-sm text-gray-600 mt-1">Точные размеры всех помещений</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-drafting-compass" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Планировка</div>
                        <div class="text-sm text-gray-600 mt-1">Оптимальная расстановка стен и мебели</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-cube" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">3D-визуализация</div>
                        <div class="text-sm text-gray-600 mt-1">Фотореалистичные картинки будущего интерьера</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-file-lines" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Чертежи</div>
                        <div class="text-sm text-gray-600 mt-1">Полный комплект для бригады</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-palette" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Подбор материалов</div>
                        <div class="text-sm text-gray-600 mt-1">Обои, плитка, напольные покрытия</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-couch" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Мебель</div>
                        <div class="text-sm text-gray-600 mt-1">Подбор и расстановка мебели</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-lightbulb" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Освещение</div>
                        <div class="text-sm text-gray-600 mt-1">Схема света и подбор светильников</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-eye" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Авторский надзор</div>
                        <div class="text-sm text-gray-600 mt-1">Контроль на всех этапах ремонта</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Этапы работ -->
        <section id="process" class="reveal py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Как мы создаём дизайн интерьера:<br><span class="text-orange-600">5 шагов</span> к идеальному пространству
                    </h2>
                    <p class="text-xl text-gray-600">
                        От первого разговора до финальной расстановки мебели — прозрачный процесс
                    </p>
                </div>

                <div class="relative grid md:grid-cols-3 lg:grid-cols-5 gap-6">
                    <div class="hidden md:block absolute w-full h-0.5 bg-gray-300 top-8 z-0"></div>

                    <div class="text-center z-10">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">01</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Знакомство и замер</h3>
                        <p class="text-sm text-gray-600">Обсуждаем ваши пожелания, стиль, бюджет. Выезжаем на замер, фиксируем все размеры и особенности помещения.</p>
                    </div>

                    <div class="text-center z-10">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">02</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Планировка и эскизы</div>
                        <p class="text-sm text-gray-600">Разрабатываем варианты планировки, подбираем стиль, цветовую палитру. Согласовываем с вами каждый элемент.</p>
                    </div>

                    <div class="text-center z-10">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">03</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">3D-визуализация</h3>
                        <p class="text-sm text-gray-600">Создаём фотореалистичные картинки вашего будущего интерьера. Вы видите результат до начала ремонта.</p>
                    </div>

                    <div class="text-center z-10">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">04</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Чертежи и комплектация</h3>
                        <p class="text-sm text-gray-600">Готовим полный комплект чертежей для бригады. Подбираем все материалы, мебель, освещение.</p>
                    </div>

                    <div class="text-center z-10">
                        <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">05</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Авторский надзор</h3>
                        <p class="text-sm text-gray-600">Дизайнер контролирует соответствие проекта на всех этапах ремонта. Гарантируем результат как на картинке.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Почему выбирают нас -->
        <section class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-8">
                    Почему 98% клиентов рекомендуют нас
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div>
                        <div class="text-3xl md:text-4xl font-extrabold text-orange-600">325+</div>
                        <div class="mt-1 text-sm text-gray-600">Сданных объектов</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-extrabold text-orange-600">10</div>
                        <div class="mt-1 text-sm text-gray-600">Лет на рынке</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-extrabold text-orange-600">3 года</div>
                        <div class="mt-1 text-sm text-gray-600">Гарантии на все работы</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-extrabold text-orange-600">45–300</div>
                        <div class="mt-1 text-sm text-gray-600">м² — от студий до коттеджей</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. FAQ -->
        <section class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="container mx-auto px-4">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Частые вопросы о дизайне интерьеров
                </h2>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит дизайн интерьера?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Стоимость зависит от площади и пакета услуг. Эскизный проект — от 2 500 ₽/м², стандарт — от 4 500 ₽/м², премиум — от 7 000 ₽/м². Точный расчёт делаем после бесплатной консультации.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько времени занимает разработка дизайн-проекта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Эскизный проект — 5–7 рабочих дней. Стандарт — 10–15 рабочих дней. Премиум — 20–30 рабочих дней. Сроки фиксируются в договоре и мы их не срываем.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Входит ли авторский надзор в стоимость?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Авторский надзор входит в пакеты «Стандарт» и «Премиум». Дизайнер контролирует соответствие проекта на всех этапах ремонта, помогает бригаде с решениями и следит за качеством.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Можно ли сделать дизайн-проект только для одной комнаты?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, мы разрабатываем проекты как для всей квартиры, так и для отдельных помещений: кухни, спальни, детской, ванной. Стоимость рассчитывается индивидуально.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы с новостройками?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, у нас большой опыт работы с новостройками. Учитываем особенности планировок, несущие стены, инженерные коммуникации. Помогаем с планировкой с нуля — от голых стен до готового интерьера.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. Финальный CTA -->
        <?php
        $ctaFormId = 'dizajn_cta';
        $ctaFormTitle = 'Закажите дизайн интерьера';
        $ctaFormSubtitle = 'Бесплатная консультация за 15 минут';
        $ctaButtonText = 'Получить консультацию';
        $ctaExpandable = false;
        include './public/components/cta-section.php';
        ?>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
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
