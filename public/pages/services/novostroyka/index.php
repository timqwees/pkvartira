<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Ремонт квартир в новостройке — от 8 000 ₽/м²';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
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
$portfolio = (new Functions())->getPortfolio('public/assets/images/portfolio-photos/newbuilds');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Ремонт новой квартиры в новостройке под ключ в Москве от 8 000 ₽/м². White box, черновая, предчистовая, чистовая отделка. Приёмка квартиры от застройщика. Учитываем усадку дома. Гарантия 3 года. Бесплатный замер. — Проект Квартира (Проект Квартира).',155)); ?>"><meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/novostroyka'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta property="og:description"
        content="Ремонт квартир в новостройке под ключ в Москве от 360 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/services/novostroyka'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="twitter:description"
        content="Ремонт квартир в новостройках под ключ от 360 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <!-- Дополнительные мета-теги -->


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
        "description": <?= json_encode($site['description'], JSON_UNESCAPED_UNICODE); ?>,
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
        "description": "Ремонт квартир в новостройках под ключ в Москве. Фиксированные цены от 360 000 ₽, реальные сроки, гарантия 3 года.",
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
        "name": "Ремонт квартир в новостройках под ключ",
        "description": "Профессиональный ремонт квартир и домов под ключ в Москве",
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
          "name": "Услуги по ремонту",
          "itemListElement": [
            <?php foreach (($prices ?? []) as $__oi => $__offer): ?>
            {
              "@type": "Offer",
              "price": "<?= htmlspecialchars($__offer['цена_число'] ?? ''); ?>",
              "priceCurrency": "RUB",
              "itemOffered": {
                "@type": "Service",
                "name": <?= json_encode(($__offer['заголовок'] ?? '') . ' ремонт', JSON_UNESCAPED_UNICODE); ?>
              }
            }<?= $__oi < count($prices) - 1 ? ',' : ''; ?>
            <?php endforeach; ?>
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
            "name": "Ремонт квартир в новостройке",
            "item": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          }
        ]
      },
      {
        "@type": "FAQPage",
        "@id": <?= json_encode($site['canonicalUrl'] . '#faq', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Сколько стоит ремонт квартиры в новостройке?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Ремонт квартиры в новостройке под ключ стоит от 8 000 ₽/м² за косметический, от 13 000 ₽/м² за капитальный и от 18 000 ₽/м² за дизайнерский. Точную смету даём после бесплатного замера."
            }
          },
          {
            "@type": "Question",
            "name": "Сколько стоит ремонт в новостройке под ключ за м²?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Стоимость отделки квартиры под ключ за м² в новостройке — от 8 000 ₽/м², полный цикл с нуля — от 13 000 ₽/м². Цена фиксируется в договоре."
            }
          },
          {
            "@type": "Question",
            "name": "Сколько стоит ремонт студии в новостройке под ключ?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Ремонт студии 28 м² в новостройке под ключ — от 224 000 ₽ (косметический) и от 364 000 ₽ (капитальный с нуля). Срок 30–45 дней."
            }
          },
          {
            "@type": "Question",
            "name": "Когда лучше начинать ремонт в новостройке?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Оптимально — через 1–2 года после сдачи дома, когда пройдёт основная усадка. Но мы используем технологии, которые минимизируют риски: армированная стяжка, пластичные шпаклёвки, деформационные швы."
            }
          },
          {
            "@type": "Question",
            "name": "Нужно ли ждать усадки дома?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "В кирпичных и монолитных домах усадка минимальна — ремонт можно делать сразу. В панельных рекомендуем подождать 1–2 года."
            }
          },
          {
            "@type": "Question",
            "name": "Сколько стоит черновой ремонт в новостройке?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Средняя стоимость чернового ремонта в новостройке — от 8 000 ₽ за м²: стяжка пола, штукатурка стен, разводка электрики и сантехники."
            }
          },
          {
            "@type": "Question",
            "name": "Делаете ли вы приёмку квартиры от застройщика?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Да, выезжаем на приёмку, проверяем стяжку, штукатурку, остекление и инженерные системы, составляем акт недостатков."
            }
          },
          {
            "@type": "Question",
            "name": "Работаете ли вы по договору?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Да, работаем по официальному договору. В нем фиксируются сроки, стоимость и гарантия."
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
        $heroFormId = 'novostroyka_hero';
        $heroSubtitle = 'С 2014 года делаем ремонт в новостройках Москвы. Работаем с бетоном, голыми стенами и стяжкой. Делаем разводку электрики и сантехники с нуля, учитываем усадку дома. Принимаем квартиру от застройщика и готовим под чистовую отделку.';
        include './public/components/hero-section.php';
        ?>

<!-- 2. price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Сколько стоит ремонт квартиры в новостройке
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Стоимость отделки квартиры под ключ за м² в новостройке — от 8 000 ₽/м². Выберите подходящий пакет. Точную стоимость ремонта в новостройке рассчитаем после замера и составления сметы.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-orange-500 shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                            itemscope itemtype="https://schema.org/Service">
                            <meta itemprop="name"
                                content="<?= htmlspecialchars($price['заголовок']); ?> ремонт в новостройке">
                            <?php if (isset($price['бейдж'])): ?>
                                <div
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-600 border border-orange-200">
                                    <?= htmlspecialchars($price['бейдж']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="<?= isset($price['бейдж']) ? 'mt-3' : ''; ?> text-sm text-gray-600">
                                <?= htmlspecialchars($price['заголовок']); ?>
                            </div>
                            <div class="mt-2 text-3xl font-bold text-gray-900" itemprop="offers" itemscope
                                itemtype="https://schema.org/Offer">
                                <span itemprop="price"
                                    content="<?= htmlspecialchars($price['цена_число']); ?>"><?= htmlspecialchars($price['цена']); ?></span>
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

                <div class="mt-8 bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900">Сколько стоит ремонт в новостройке: примеры для типовых площадей</h3>
                    <p class="mt-1 text-sm text-gray-600">Ориентировочная цена ремонта новостройки под ключ, работа + черновые материалы.</p>
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                        <div class="bg-white rounded-xl border border-gray-200 p-4">
                            <div class="font-semibold text-gray-900">Студия 28 м²</div>
                            <div class="mt-1 text-gray-600">косметический — от 224 000 ₽</div>
                            <div class="text-gray-600">капитальный — от 364 000 ₽</div>
                        </div>
                        <div class="bg-white rounded-xl border border-gray-200 p-4">
                            <div class="font-semibold text-gray-900">1-комнатная 45 м²</div>
                            <div class="mt-1 text-gray-600">косметический — от 360 000 ₽</div>
                            <div class="text-gray-600">капитальный — от 585 000 ₽</div>
                        </div>
                        <div class="bg-white rounded-xl border border-gray-200 p-4">
                            <div class="font-semibold text-gray-900">2-комнатная 60 м²</div>
                            <div class="mt-1 text-gray-600">косметический — от 480 000 ₽</div>
                            <div class="text-gray-600">капитальный — от 780 000 ₽</div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-600">Нужна точная цифра под вашу планировку? <a href="/calculator" class="text-orange-600 font-semibold hover:text-orange-700 underline">Посчитайте в калькуляторе за 1 минуту</a>.</p>
                </div>
            </div>
        </section>

        <!-- 3. Что входит в стоимость ремонта -->
        <section class="reveal bg-gray-50 py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
                    Что входит в пакет
                </h2>

                <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-screwdriver-wrench"
                                aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Демонтаж</div>
                        <div class="text-sm text-gray-600 mt-1">Подготовительные работы</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Электрика</div>
                        <div class="text-sm text-gray-600 mt-1">Проводка и щит</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-faucet-drip" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Сантехника</div>
                        <div class="text-sm text-gray-600 mt-1">Разводка и установка</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-paint-roller" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Отделка</div>
                        <div class="text-sm text-gray-600 mt-1">Стены, пол, потолок</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-door-open" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Двери</div>
                        <div class="text-sm text-gray-600 mt-1">Монтаж и доборы</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Освещение</div>
                        <div class="text-sm text-gray-600 mt-1">Светильники и выключатели</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-couch" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Мебель</div>
                        <div class="text-sm text-gray-600 mt-1">Сборка и установка</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-orange-600 text-xl"><i class="fa-solid fa-broom" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Уборка</div>
                        <div class="text-sm text-gray-600 mt-1">После работ</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Этапы работ -->
        <section id="process" class="reveal py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Ваш путь к идеальному ремонту:<br><span class="text-orange-600">6 шагов</span> до новоселья
                    </h2>
                    <p class="text-xl text-gray-600">
                        Мы выстроили систему так, чтобы вы не тратили время на контроль и закупки
                    </p>
                </div>

                <div class="relative grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="hidden md:block absolute w-full h-0.5 bg-gray-300 top-8 z-0"></div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            01
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Ваша заявка</h3>
                        <p class="text-sm text-gray-600">
                            Оставьте заявку на сайте или позвоните нам. Менеджер ответит на все вопросы и забронирует за
                            вами время для бесплатного выезда инженера-сметчика.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            02
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Профессиональный замер</h3>
                        <p class="text-sm text-gray-600">
                            Приезжаем со сверхточным лазерным оборудованием. Анализируем состояние стен, углов и
                            инженерных коммуникаций. Через 24 часа вы получаете 3 варианта детальной сметы под ваш
                            бюджет.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            03
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Договор и фиксация цены</h3>
                        <p class="text-sm text-gray-600">
                            Подписываем официальный договор, где четко прописаны сроки и финальная стоимость. Цена
                            фиксируется в договоре. Дополнительные работы — только после вашего согласования: сначала показываем причину и стоимость, начинаем только после подтверждения.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            04
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Закупка материалов</h3>
                        <p class="text-sm text-gray-600">
                            Закупку, доставку и подъём материалов берём на себя — вам не нужно ездить по магазинам. И наша собственная
                            гарантия.Организуем доставку, разгрузку и подъем. Вы получаете все отчеты в цифровом виде.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            05
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Производство работ</h3>
                        <p class="text-sm text-gray-600">
                            Профильные бригады (электрики, сантехники, плиточники) приступают к делу. Вы получаете
                            ежедневные фото- и видеоотчеты в MAX. Контролируйте ремонт из любой точки мира.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            06
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Сдача и гарантия</h3>
                        <p class="text-sm text-gray-600">
                            Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются по действующим нормам и технологическим картам.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Примеры -->
        <section class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Реализованные проекты в
                    новостройках</h2>
                <!-- cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
                    <?php $portfolioRepairLabels = ['Косметический', 'Капитальный', 'Дизайнерский']; ?>
                    <?php foreach ($portfolio as $key => $value): ?>
                        <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                            itemtype="https://schema.org/CreativeWork">
                            <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                            <meta itemprop="description"
                                content="Ремонт в новостройке, срок: <?= htmlspecialchars($value['срок']); ?>, стоимость: <?= htmlspecialchars($value['цена']); ?>">
                            <div class="relative h-52">
                                <div class="swiper swiper-type-one w-full h-full">
                                    <div class="swiper-wrapper">
                                        <?php foreach ((new Functions())->getPhotos($value['текущая_папка']) as $key => $img): ?>
                                            <div class="swiper-slide">
                                                <img decoding="async" loading="lazy"
                                                    src="<?= htmlspecialchars($site['baseUrl'] . '/' . $value['текущая_папка'] . '/' . $img) ?>"
                                                    class="w-full h-full object-cover" width="1280" height="720" alt="<?= htmlspecialchars(trim($value['заголовок'] . (!empty($value['срок']) ? ', срок ' . $value['срок'] : '') . (!empty($value['цена']) ? ', ' . $value['цена'] : '') . ' — фото ' . ((int)$key + 1))) ?>"
                                                    title="<?= htmlspecialchars($value['заголовок'] . ' — фото ' . ((int)$key + 1)) ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 z-20 p-4 bg-gradient-to-t from-black/70 to-transparent">
                                    <div class="text-xs text-white/80">
                                        <?= htmlspecialchars($portfolioRepairLabels[$key % 3]) ?>
                                    </div>
                                    <div class="mt-1 font-semibold text-white"><?= htmlspecialchars($value['заголовок']) ?>
                                    </div>
                                    <div class="flex gap-4 items-center mt-2 text-sm text-white/90"><span>Срок:
                                            <?= htmlspecialchars($value['срок']) ?></span> ∙
                                        <span>Стоимость: <?= htmlspecialchars($value['цена']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900">Почему выбирают нас</h3>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-orange-600">0 ₽</div>
                                <div class="text-sm text-gray-600 mt-1">выезд инженера</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-orange-600">24 ч</div>
                                <div class="text-sm text-gray-600 mt-1">подготовка сметы</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-orange-600">3 года</div>
                                <div class="text-sm text-gray-600 mt-1">гарантия на работы</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-orange-600">Нормы</div>
                                <div class="text-sm text-gray-600 mt-1">работаем по техкартам</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900">Сроки и договор</h3>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100"><i
                                    class="fa-solid fa-copyright"></i> Работаем
                                официально</span>
                        </div>
                        <ul class="mt-4 space-y-3 text-sm text-gray-700">
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Фиксируем сроки в
                                    договоре</span></li>
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Ежедневный
                                    фотоотчет</span></li>
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Оплата по этапам
                                    работ</span></li>
                        </ul>
                        <button data-button-dialog
                            class="block max-w-fit cta-button mt-6 bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition sm:w-auto">Получить
                            консультацию</button>
                    </div>
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

        <!-- 10. FAQ по этой услуге -->
        <section class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Отвечаем на главные вопросы
                </h2>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит ремонт квартиры в новостройке?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Ремонт квартиры в новостройке под ключ стоит от 8 000 ₽/м² за косметический, от 13 000 ₽/м² за капитальный и от 18 000 ₽/м² за дизайнерский. Например, 1-комнатная 45 м² — от 360 000 ₽, 2-комнатная 60 м² — от 780 000 ₽ за капитальный. Точную смету даём после бесплатного замера.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит ремонт в новостройке под ключ за м²?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Стоимость отделки квартиры под ключ за м² в новостройке — от 8 000 ₽/м² (чистовая отделка white box), от 13 000 ₽/м² (полный цикл с нуля: стяжка, штукатурка, электрика, сантехника). Цена фиксируется в договоре после замера.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит ремонт студии в новостройке под ключ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Ремонт студии в новостройке под ключ — от 224 000 ₽ за 28 м² (косметический) и от 364 000 ₽ (капитальный с нуля). Студии делаем за 30–45 дней, включая разводку электрики и сантехники.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Когда лучше начинать ремонт в новостройке?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Оптимально — через 1–2 года после сдачи дома, когда пройдёт основная усадка. Но если ждать не хотите, мы используем технологии, которые минимизируют риски: армированная стяжка, пластичные шпаклёвки, деформационные швы.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Нужно ли ждать усадки дома?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">В кирпичных и монолитных домах усадка минимальна — ремонт можно делать сразу после сдачи. В панельных домах рекомендуем подождать 1–2 года. Мы помогаем оценить состояние стен и даём рекомендации на бесплатном замере.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Делаете ли вы приёмку квартиры от застройщика?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, мы выезжаем на приёмку вместе с вами. Проверяем качество стяжки, штукатурки, остекления, работу инженерных систем. Составляем акт недостатков, если нужно — помогаем в переговорах с застройщиком.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит черновой ремонт в новостройке?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Средняя стоимость чернового ремонта в новостройке — от 8 000 ₽ за м². В цену входит стяжка пола, штукатурка стен, разводка электрики и сантехники. Точную смету составляем после замера — бесплатно.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы по договору?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, работаем только по официальному договору. В нём фиксируются сроки, стоимость каждого этапа и гарантийные обязательства. Никаких устных договорённостей.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <?php
        $ctaFormId = 'novostroyka_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        include './public/components/cta-section.php';
        ?>


        <!-- Типы отделки новостроек -->
        <section class="py-16 bg-gray-50 reveal">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Ремонт новостройки с любым типом отделки</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Независимо от того, что оставил застройщик — голые стены, стяжку или white box — мы доведём квартиру до идеала под ключ.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-heading font-bold mb-3 flex items-center gap-2"><span class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600 font-bold text-sm">1</span>Без отделки (черновая)</h3>
                        <p class="text-gray-600 text-sm mb-3">Голые стены, стяжка, подведены коммуникации. Полный цикл: штукатурка, электрика, сантехника, чистовая отделка. Самый популярный формат.</p>
                        <p class="text-orange-600 font-semibold text-sm">От 13 000 ₽/м² под ключ</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-heading font-bold mb-3 flex items-center gap-2"><span class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600 font-bold text-sm">2</span>White Box (предчистовая)</h3>
                        <p class="text-gray-600 text-sm mb-3">Стены оштукатурены, стяжка залита, разведена электрика и сантехника. Остаётся чистовая отделка: финишные покрытия, двери, сантехника, освещение.</p>
                        <p class="text-orange-600 font-semibold text-sm">От 8 000 ₽/м² чистовой отделки</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-heading font-bold mb-3 flex items-center gap-2"><span class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600 font-bold text-sm">3</span>С чистовой отделкой от застройщика</h3>
                        <p class="text-gray-600 text-sm mb-3">Косметический ремонт: замена напольных покрытий, переклейка обоев, обновление сантехники и фурнитуры. Бюджетное преображение без перепланировок.</p>
                        <p class="text-orange-600 font-semibold text-sm">От 5 000 ₽/м² — косметика, с материалами</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <h3 class="text-lg font-heading font-bold mb-3 flex items-center gap-2"><span class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center text-orange-600 font-bold text-sm">4</span>Приёмка квартиры в новостройке</h3>
                        <p class="text-gray-600 text-sm mb-3">Выезд технического специалиста на приёмку квартиры от застройщика. Проверка качества отделки, замеры, фиксация дефектов. Поможем отстоять свои права.</p>
                        <p class="text-orange-600 font-semibold text-sm">Бесплатно при заказе ремонта</p>
                    </div>
                </div>
                <p class="mt-6 text-center text-[#4b5563]">Ключи только через несколько месяцев? <a href="/services/budushchiy-remont" class="text-orange-600 underline hover:text-orange-700 font-semibold">Узнайте стоимость ремонта уже сейчас</a> и спланируйте бюджет заранее.</p>
            </div>
        </section>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // FAQ Toggle functionality
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