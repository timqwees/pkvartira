<?php
use Setting\Route\Function\Functions;
$site = Functions::site();
$title = 'Ремонт коммерческих помещений в Москве — офисы, магазины';
$bg_url = '/public/assets/images/portfolio-photos/4room/standard/1_65sqm/1.png';
$prices = [
    [
        'заголовок' => 'Косметический',
        'цена' => 'от 8 000 ₽',
        'цена_число' => '8000',
        'подзаголовок' => 'Итого для 45 м² - от 360 000 Р',
        'услуги' => ['Обои или покраска стен', 'Замена напольного покрытия', 'Потолки - покраска или натяжка', 'Замена розеток или выключателей', 'Финальная уборка'],
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
$portfolio = (new Functions())->getPortfolio('public/assets/images/portfolio-photos/4room/standard');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title); ?> | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?></title>
    <meta name="description"
        content="Ремонт офисов, магазинов, кафе и коммерческих помещений в Москве. С соблюдением СНиП и пожарных норм. Смета в день обращения, гарантия 3 года. Бесплатный выезд.">
    <meta name="keywords"
        content="ремонт офиса, ремонт магазина, отделка коммерческого помещения, ремонт под ключ Москва">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/kommercheskie'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Ремонт коммерческих помещений под ключ. Прозрачная смета, фиксированные сроки, гарантия 3 года.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/services/kommercheskie'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Коммерческий ремонт">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Ремонт коммерческих помещений под ключ. Прозрачная смета, фиксированные сроки, гарантия 3 года.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
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
        "sameAs": [
          <?= json_encode($site['vk'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
          <?= json_encode($site['telegram'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
          <?= json_encode($site['whatsapp'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        ]
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
        "name": <?= json_encode($title . ' — ' . ($site['name'] ?? 'ПКвартира'), JSON_UNESCAPED_UNICODE); ?>,
        "description": "Ремонт коммерческих помещений и офисов под ключ. Фиксированные цены, реальные сроки, гарантия 3 года.",
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
        "name": "Ремонт коммерческих помещений",
        "description": "Профессиональный ремонт офисов, магазинов и коммерческих помещений в Москве и области",
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
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Черновой ремонт",
                "description": "Строительные работы для подготовки помещения к чистовой отделке"
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Чистовой ремонт",
                "description": "Полная отделка помещения с использованием качественных материалов"
              }
            },
            {
              "@type": "Offer",
              "itemOffered": {
                "@type": "Service",
                "name": "Ремонт под ключ",
                "description": "Полный комплекс работ от проектирования до финальной уборки"
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
            "name": "Ремонт коммерческих помещений",
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
            "name": "Можно ли работать в помещении во время ремонта?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Частично — да: зонирование и график согласуем заранее. На грязных этапах доступ ограничиваем ради безопасности и сроков."
            }
          },
          {
            "@type": "Question",
            "name": "Что если смета вырастет в процессе?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Смета фиксируется договором. Изменения возможны только по вашему согласованию при дополнительных работах."
            }
          },
          {
            "@type": "Question",
            "name": "Нужен ли дизайн-проект для капитального ремонта?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Не обязательно. Но проект помогает точно рассчитать стоимость и избежать переделок. Мы можем сделать базовую планировку."
            }
          },
          {
            "@type": "Question",
            "name": "Как вы контролируете качество работ?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Прораб и инженер технадзора контролируют этапы, ведем фотоотчеты и приемку работ по чек-листу."
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
    <main class="pt-20 flex flex-col gap-0">

        <!-- 1. hero section -->
        <section
            class="reveal bg-[url(<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>)] bg-center bg-cover bg-no-repeat relative overflow-hidden">
            <div class="absolute blur-xl z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-black/50">
            </div>
            <div class="relative text-white z-10 max-w-7xl mx-auto px-4 py-10 md:py-14">
                <nav aria-label="breadcrumb" class="mb-6">
                    <ol class="flex flex-wrap items-center gap-2 text-sm" itemscope
                        itemtype="https://schema.org/BreadcrumbList">
                        <li class="font-medium" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a href="<?= $site['baseUrl'] ?>" class="hover:text-orange-600 transition" itemprop="item">
                                <span itemprop="name">Главная</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li>/</li>
                        <li class="font-medium" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a href="<?= $site['baseUrl'] ?>/services" class="hover:text-orange-600 transition"
                                itemprop="item">
                                <span itemprop="name">Услуги</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li>/</li>
                        <li class="font-medium" itemprop="itemListElement" itemscope
                            itemtype="https://schema.org/ListItem">
                            <a href="<?= $site['canonicalUrl'] ?>" class="hover:text-orange-600 transition"
                                itemprop="item">
                                <span itemprop="name"><?= htmlspecialchars($title); ?></span>
                            </a>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold leading-tight">
                            <span class="underline"><?= htmlspecialchars($title); ?></span> <span
                                class="text-orange-400">фиксированная цена</span>,
                            реальные сроки и <span class="text-orange-400">компенсация</span> если что-то пойдет не так
                        </h1>
                        <p class="mt-4 max-w-xl">
                            Зафиксируем стоимость в договоре. Работаем с гарантией. Составим смету под ваш бюджет.
                        </p>

                        <div class="mt-6 flex flex-col sm:flex-row gap-3">
                            <button data-button-dialog
                                class="cta-button bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                                Рассчитать стоимость
                            </button>
                            <a href="#price"
                                class="cta-button border border-gray-300 bg-white hover:bg-gray-50 text-gray-900 px-6 py-3 rounded-lg font-semibold transition text-center">
                                Смотреть цены
                            </a>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-6 text-sm">
                            <div class="flex items-center gap-2">
                                <span
                                    class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center">
                                    <i class="fa-solid fa-phone text-orange-600"></i>
                                </span>
                                <span>Ответим за 5 минут</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span
                                    class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center">
                                    <i class="fa-solid fa-location-dot text-orange-600"></i>
                                </span>
                                <span>Работаем по Москве и области</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="relative">
                        <form action="<?= htmlspecialchars($site['baseUrl']); ?>/send/email" method="POST"
                            class="w-full md:max-w-[560px] md:ml-auto" itemscope
                            itemtype="https://schema.org/ContactPoint">
                            <div
                                class="bg-white/90 backdrop-blur-sm border border-gray-200 rounded-2xl shadow-xl p-5 md:p-6">
                                <h2 class="text-lg md:text-xl font-bold text-gray-900">Рассчитайте стоимость
                                    ремонта
                                </h2>
                                <p class="text-sm text-gray-600 mt-1">Заполните форму и получите смету за 5
                                    минут</p>

                                <div class="grid grid-cols-2 gap-2 bg-gray-100 p-1 rounded-xl mb-4 mt-4" role="radiogroup"
                                    aria-label="Тип жилья">
                                    <input id="heroHousingNew" type="radio" name="Тип жилья" value="Новостройка" checked
                                        class="sr-only peer/heroHousingNew">
                                    <label for="heroHousingNew"
                                        class="w-full cursor-pointer py-2 rounded-lg text-sm md:text-base font-semibold text-gray-700 text-center peer-checked/heroHousingNew:bg-white peer-checked/heroHousingNew:shadow peer-checked/heroHousingNew:text-gray-900">Новостройка</label>

                                    <input id="heroHousingOld" type="radio" name="Тип жилья" value="Вторичка"
                                        class="sr-only peer/heroHousingOld">
                                    <label for="heroHousingOld"
                                        class="w-full cursor-pointer py-2 rounded-lg text-sm md:text-base font-semibold text-gray-700 text-center peer-checked/heroHousingOld:bg-white peer-checked/heroHousingOld:shadow peer-checked/heroHousingOld:text-gray-900">Вторичка</label>
                                </div>

                                <div class="mb-4">
                                    <div class="text-sm text-gray-700 mb-2">Комнат</div>
                                    <div class="grid grid-cols-4 gap-2">
                                        <input id="heroRooms1" type="radio" name="Комнат" value="1" checked
                                            class="sr-only peer/heroRooms1">
                                        <label for="heroRooms1"
                                            class="cursor-pointer py-2 rounded-lg border border-gray-200 bg-gray-100 font-semibold text-gray-800 text-center peer-checked/heroRooms1:bg-white peer-checked/heroRooms1:text-gray-900">1</label>

                                        <input id="heroRooms2" type="radio" name="Комнат" value="2"
                                            class="sr-only peer/heroRooms2">
                                        <label for="heroRooms2"
                                            class="cursor-pointer py-2 rounded-lg border border-gray-200 bg-gray-100 font-semibold text-gray-800 text-center peer-checked/heroRooms2:bg-white peer-checked/heroRooms2:text-gray-900">2</label>

                                        <input id="heroRooms3" type="radio" name="Комнат" value="3"
                                            class="sr-only peer/heroRooms3">
                                        <label for="heroRooms3"
                                            class="cursor-pointer py-2 rounded-lg border border-gray-200 bg-gray-100 font-semibold text-gray-800 text-center peer-checked/heroRooms3:bg-white peer-checked/heroRooms3:text-gray-900">3</label>

                                        <input id="heroRooms4" type="radio" name="Комнат" value="4+"
                                            class="sr-only peer/heroRooms4">
                                        <label for="heroRooms4"
                                            class="cursor-pointer py-2 rounded-lg border border-gray-200 bg-gray-100 font-semibold text-gray-800 text-center peer-checked/heroRooms4:bg-white peer-checked/heroRooms4:text-gray-900">4+</label>

                                        <input id="studio" type="radio" name="Комнат" value="студия"
                                            class="sr-only peer/studio">
                                        <label for="studio"
                                            class="cursor-pointer py-2 rounded-lg border border-gray-200 bg-gray-100 font-semibold text-gray-800 text-center peer-checked/studio:bg-white peer-checked/studio:text-gray-900">студия</label>

                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="text-sm text-gray-700">Площадь</div>
                                        <div class="text-sm font-semibold text-gray-900"><span id="value_range"></span>
                                            м²
                                        </div>
                                    </div>
                                    <input id="RangeSize" name="Площадь" type="range" min="20" max="300" value="20" aria-label="Площадь в квадратных метрах"
                                        class="w-full accent-orange-500">
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        document.getElementById('value_range').textContent = '20';
                                        document.getElementById('RangeSize').addEventListener('input', (event) => {
                                            document.getElementById('value_range').textContent = event.target.value;
                                        });
                                    });
                                </script>

                                <div class="mb-4">
                                    <div class="text-sm text-gray-700 mb-2">Ремонт</div>
                                    <select name="Ремонт" aria-label="Тип ремонта"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-black">
                                        <option value="Черновой ремонт">Черновой ремонт</option>
                                        <option value="Чистовой ремонт">Чистовой ремонт</option>
                                        <option value="Дизайнерский ремонт">Дизайнерский ремонт</option>
                                        <option value="Косметических ремонт">Косметических ремонт</option>
                                        <option value="Капитальный ремонт">Капитальный ремонт</option>
                                    </select>
                                </div>

                                <div class="mb-5">
                                    <div class="text-sm text-gray-700 mb-2">Включить в расчёт</div>
                                    <div class="flex flex-wrap gap-2">
                                        <input id="heroExtraDraft" type="checkbox" name="Включить в расчёт"
                                            value="Черновой материал" class="sr-only peer/heroExtraDraft">
                                        <label for="heroExtraDraft"
                                            class="cursor-pointer px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-sm font-semibold text-gray-800 peer-checked/heroExtraDraft:bg-orange-500 peer-checked/heroExtraDraft:text-white peer-checked/heroExtraDraft:border-orange-500">Черновой
                                            материал</label>

                                        <input id="heroExtraFinish" type="checkbox" name="Включить в расчёт2"
                                            value="Чистовой материал" class="sr-only peer/heroExtraFinish">
                                        <label for="heroExtraFinish"
                                            class="cursor-pointer px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-sm font-semibold text-gray-800 peer-checked/heroExtraFinish:bg-orange-500 peer-checked/heroExtraFinish:text-white peer-checked/heroExtraFinish:border-orange-500">Чистовой
                                            материал</label>

                                        <input id="heroExtraDesign" type="checkbox" name="Включить в расчёт3"
                                            value="Дизайн-проект" class="sr-only peer/heroExtraDesign">
                                        <label for="heroExtraDesign"
                                            class="cursor-pointer px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-sm font-semibold text-gray-800 peer-checked/heroExtraDesign:bg-orange-500 peer-checked/heroExtraDesign:text-white peer-checked/heroExtraDesign:border-orange-500">Дизайн-проект</label>
                                    </div>
                                </div>

                                <div class="mb-5 relative">
                                    <input data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                        name="телефн" placeholder="(___) ___-__-__" maxlength="15" aria-label="Телефон"
                                        class="border w-full rounded-xl text-black p-4" required>
                                    <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон
                                        <span class="text-red-400">*</span></span>
                                </div>

                                <button type="submit"
                                    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-xl text-base md:text-xl font-bold">
                                    Рассчитать стоимость
                                </button>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </section>

        <!-- 2. price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Сколько стоит
                    <?= htmlspecialchars($title); ?> в Москве
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Выберите подходящий пакет. Точную стоимость рассчитаем после замера и составления сметы.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-orange-500 shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                            itemscope itemtype="https://schema.org/Product">
                            <meta itemprop="name"
                                content="<?= htmlspecialchars($price['заголовок']); ?> ремонт коммерческого помещения">
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
                        Ваш путь кльному ремонту:<br><span class="text-orange-600">6 шагов</span> до новоселья
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
                            фиксируется на 100% — мы гарантируем отсутствие доплат и «скрытых» расходов в процессе.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            04
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Закупка материалов</h3>
                        <p class="text-sm text-gray-600">
                            Собственный склад материалов. За счёт этого цены на материалы ниже. И наша собственная
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
                            Ваше помещение в чистом виде и полностью готово к работе. Все работы выполняются согласно
                            ГОСТ и СНИП.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Примеры -->

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
                            <span class="font-semibold text-gray-800" itemprop="name">Можно ли работать в помещении во
                                время
                                ремонта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">На грязных этапах работа в помещении затруднена. Мы согласуем
                                поэтапный график —
                                будет шумно и пыльно. Часть зон можем закрыть и вести работы в нерабочее время.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Что если смета вырастет в
                                процессе?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Смета фиксируется договором. Изменения возможны только по вашему
                                согласованию при
                                дополнительных работах.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Нужен ли дизайн-проект для
                                капитального
                                ремонта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Не обязательно. Но проект помогает точно рассчитать стоимость и
                                избежать переделок. Мы можем
                                сделать базовую планировку.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Как вы контролируете качество
                                работ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Прораб и инженер технадзора контролируют этапы, ведем фотоотчеты и
                                приемку работ по
                                чек-листу.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы по
                                договору?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, работаем по официальному договору. В нем фиксируются сроки,
                                стоимость и гарантия.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <section class="reveal w-full py-12 md:py-16 bg-gray-50">
            <div
                class="flex flex-col items-center justify-center mx-auto bg-gradient-to-r from-blue-800 to-blue-900 p-8 md:p-12 text-white text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">
                    Готовы рассчитать стоимость вашего ремонта?
                </h2>
                <p class="text-blue-100 mb-8">
                    Мы готовы выполнить свою оценку — оставьте заявку на бесплатный расчет стоимости ремонта.
                </p>

                <form action="/send/email" method="POST"
                    class="flex flex-col sm:flex-row gap-4 justify-center max-w-lg mx-auto mb-8">
                    <div class="relative text-black">
                        <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн"
                            placeholder="(___) ___-__-__" maxlength="15" aria-label="Телефон" class="border w-full rounded-xl p-4" required>
                        <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон <span
                                class="text-red-400">*</span></span>
                    </div><button
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Получить расчет
                    </button>
                </form>

                <ol class="w-fit grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                    <li class="flex items-center justify-center gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Бесплатный выезд инженера</span>
                    </li>
                    <li class="flex items-center justify-start gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Моментальный расчет</span>
                    </li>
                    <li class="flex items-center justify-start gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Консультация на объекте</span>
                    </li>
                    <li class="flex items-center justify-start gap-2">
                        <i class="fas fa-check-circle text-green-400"></i>
                        <span>Выезд сегодня за 3 часа</span>
                    </li>
                </ol>
            </div>
        </section>


    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.js" defer></script>

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