<?php
$site = Setting\Route\Function\Functions::site();
$featuredProjects = Setting\Route\Function\Functions::featuredPortfolio('3-комнатные', 3);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ в Москве
    </title>
    <meta name="description"
        content="Профессиональный ремонт квартир и домов под ключ в Москве. Гарантия 3 года, прозрачные цены, опытные мастера. Бесплатный выезд и смета.">
    <meta name="keywords"
        content="ремонт квартир, ремонт под ключ, ремонт квартир Москва, отделка квартир, дизайн интерьера">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['canonicalUrl']); ?>">

    <meta name="google-site-verification" content="jLp0P98pT6xSVSJnELONG18GuBE5WAoL6q3o8P9UxwA" />
    <meta name="yandex-verification" content="bf2ddc27f35803d2" />

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ в Москве">
    <meta property="og:description"
        content="Профессиональный ремонт квартир и домов под ключ. Гарантия 3 года, прозрачные цены, бесплатный выезд и смета.">
    <meta property="og:url" content="<?= htmlspecialchars($site['canonicalUrl']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ в Москве">
    <meta name="twitter:description"
        content="Профессиональный ремонт квартир и домов под ключ. Гарантия 3 года, прозрачные цены.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain"
        content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "LocalBusiness",
        "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
        "description": <?= json_encode($site['description'], JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
        "email": <?= json_encode($site['email'], JSON_UNESCAPED_UNICODE); ?>,
        "address": {
          "@type": "PostalAddress",
          "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
          "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
          "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
          "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
          "addressCountry": <?= json_encode($site['address']['addressCountry'], JSON_UNESCAPED_UNICODE); ?>
        },
        "geo": {
          "@type": "GeoCoordinates",
          "latitude": <?= json_encode($site['geo']['latitude'], JSON_UNESCAPED_UNICODE); ?>,
          "longitude": <?= json_encode($site['geo']['longitude'], JSON_UNESCAPED_UNICODE); ?>
        },
        "openingHours": <?= json_encode($site['openingHours'], JSON_UNESCAPED_UNICODE); ?>,
        "priceRange": <?= json_encode($site['priceRange'], JSON_UNESCAPED_UNICODE); ?>,
        "image": <?= json_encode($site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "logo": <?= json_encode($site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
        "potentialAction": {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": <?= json_encode($site['baseUrl'] . '/search?q={search_term_string}', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          },
          "query": "required name=search_term_string"
        },
        "inLanguage": "ru-RU"
      },
      {
        "@type": "WebPage",
        "@id": <?= json_encode($site['baseUrl'] . '/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": "Ремонт квартир под ключ в Москве — <?= htmlspecialchars($site['name']); ?>",
        "description": "Профессиональный ремонт квартир и домов под ключ в Москве. Гарантия 3 года, прозрачные цены, бесплатный выезд и смета.",
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
        "@id": <?= json_encode($site['baseUrl'] . '#service', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": "Ремонт квартир под ключ",
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
        "@type": "AggregateRating",
        "@id": <?= json_encode($site['baseUrl'] . '#rating', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "itemReviewed": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "ratingValue": "<?= htmlspecialchars(number_format((float) (empty($averageRating) ? 4.8 : $averageRating), 1, '.', '')); ?>",
        "reviewCount": "<?= empty($reviewCount) ? 156 : (int) $reviewCount; ?>",
        "bestRating": "5"
      },
      {
        "@type": "BreadcrumbList",
        "@id": <?= json_encode($site['baseUrl'] . '/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Главная",
            "item": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
          }
        ]
      },
      {
        "@type": "FAQPage",
        "@id": <?= json_encode($site['baseUrl'] . '/#faq', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Компания «ПКвартира» выполняет полный ремонт квартир под ключ — что это значит?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Мы берём на себя все этапы — от демонтажа старых покрытий до финальной уборки. Вам не нужно искать отдельных мастеров по электрике, сантехнике или отделке — все работы выполняет одна бригада под контролем прораба. Компания «ПКвартира» работает в Москве и Подмосковье с 2014 года."
            }
          },
          {
            "@type": "Question",
            "name": "Какие виды ремонта вы выполняете?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Для квартир в новостройке мы делаем черновой ремонт — стяжку, штукатурку, разводку коммуникаций. Для вторичного жилья — полный цикл: демонтаж старых покрытий, замена проводки и труб, выравнивание стен, чистовая отделка. Также специализируемся на дизайнерском ремонте с авторским надзором архитектора, перепланировке с согласованием в Мосжилинспекции и ремонте коммерческих помещений."
            }
          },
          {
            "@type": "Question",
            "name": "Сколько стоит ремонт квартиры?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Цена ремонта зависит от площади, состояния объекта и выбранного пакета. Косметический ремонт начинается от 8 000 ₽ за м², капитальный — от 13 000 ₽ за м², дизайнерский — от 18 000 ₽ за м². Точную стоимость мы рассчитываем после бесплатного выезда инженера на замер. Средний срок ремонта однокомнатной квартиры — 6–8 недель, двухкомнатной — 8–10 недель, трёхкомнатной — 10–14 недель."
            }
          },
          {
            "@type": "Question",
            "name": "Стоимость ремонта фиксируется в договоре?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Да, стоимость фиксируется в договоре и не меняется в процессе. Мы работаем по прозрачной смете: каждый материал, каждая работа прописаны с точной ценой. Если вдруг что-то потребует дополнительных затрат — мы согласовываем это с вами заранее."
            }
          },
          {
            "@type": "Question",
            "name": "Почему заказывают ремонт именно у вас?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "За 10 лет работы мы сделали более 500 объектов. Мы предоставляем гарантию до 3 лет на все виды работ, работаем по официальному договору и ведём ежедневные фотоотчёты. Бесплатный выезд инженера, замер лазером и подготовка сметы — всё без предоплаты."
            }
          }
        ]
      }
    ]
  }
  </script>

    <?php include_once './public/components/head-includes.php'; ?>
    <!-- Preload LCP hero image -->
    <link rel="preload" as="image" href="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp" fetchpriority="high">
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 flex flex-col gap-6">

        <!-- Hero Content -->
        <section
            class="relative text-white py-12 md:py-32 bg-[url(<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp)] bg-center bg-cover bg-no-repeat">
            <div
                class="absolute z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-gradient-to-r from-[white] via-[white] to-transparent">
            </div>
            <div class="relative z-10 container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <div class="max-w-4xl">
                        <h1 class="z-10 hero-title text-3xl md:text-5xl font-bold mb-6 text-black leading-tight">
                            Ремонт в Москве без нервов:<br>
                            <strong class="text-orange-500">фиксированная цена</strong>,<br>
                            реальные сроки и <strong class="text-orange-500">компенсация</strong><br>
                            если что-то пойдет не так
                        </h1>
                        <p class="z-10 hero-subtitle text-2xl mb-8 text-gray-800 max-w-3xl">
                            Приедем на замер в день обращения. Составим смету в <strong class="text-orange-500">3
                                вариантах
                            </strong> под ваш бюджет. Начнем работу
                            через <strong class="text-orange-500">2 дня</strong>.
                        </p>

                        <ul class="flex items-center flex-wrap gap-3 mb-6 md:mb-8 justify-start">
                            <li
                                class="flex items-center justify-center space-x-3 md:space-x-4 rounded-lg border-2 border-orange-500/30 bg-white/80 backdrop-blur-sm px-4 py-2 hover:border-orange-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-solid fa-ruler-combined text-orange-500 text-xl md:text-2xl"></i>
                                <p class="text-black text-xs md:text-sm">Замер + смета бесплатно</p>
                            </li>
                            <li
                                class="flex items-center justify-center space-x-3 md:space-x-4 rounded-lg border-2 border-orange-500/30 bg-white/80 backdrop-blur-sm px-4 py-2 hover:border-orange-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-solid fa-file-word text-orange-500 text-xl md:text-2xl"></i>
                                <p class="text-black text-xs md:text-sm">3 варианта под ваш бюджет
                                </p>
                            </li>
                            <li
                                class="flex items-center justify-center space-x-3 md:space-x-4 rounded-lg border-2 border-orange-500/30 bg-white/80 backdrop-blur-sm px-4 py-2 hover:border-orange-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-solid fa-file-circle-check text-orange-500 text-xl md:text-2xl"></i>
                                <p class="text-black text-xs md:text-sm">цена в договоре - без
                                    сюрпризов
                                </p>
                            </li>
                            <li
                                class="flex items-center justify-center space-x-3 md:space-x-4 rounded-lg border-2 border-orange-500/30 bg-white/80 backdrop-blur-sm px-4 py-2 hover:border-orange-500 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                <i class="fa-solid fa-file-shield text-orange-500 text-xl md:text-2xl"></i>
                                <p class="text-black text-xs md:text-sm">Гарантия 3 года
                                </p>
                            </li>
                        </ul>

                        <div class="relative">
                            <button data-button-dialog
                                class="cta-button relative bg-orange-500 text-white px-6 md:px-8 py-3 rounded-xl text-[10px] md:text-lg w-full md:w-auto">
                                <span class="drop-shadow-lg font-sans">Рассчитать стоимость ремонта за 60 секунд</span>
                            </button>
                        </div>
                    </div>

                    <form action="/send/email" method="POST"
                        class="w-full md:max-w-[560px] md:ml-auto -translate-y-10 mt-4 md:mt-0">
                        <div
                            class="bg-white/90 backdrop-blur-sm border border-gray-200 rounded-2xl shadow-xl p-5 md:p-6">
                            <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-4">Рассчитать стоимость</h2>

                            <div class="grid grid-cols-2 gap-2 bg-gray-100 p-1 rounded-xl mb-4" role="radiogroup"
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
                                    <div class="text-sm font-semibold text-gray-900"><span id="value_range"></span> м²
                                    </div>
                                </div>
                                <input id="RangeSize" name="Площадь" type="range" min="20" max="300" value="20"
                                    aria-label="Площадь в квадратных метрах"
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
                                <select name="Ремонт"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-black"
                                    aria-label="Тип ремонта">
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

                            <div class="mb-5 relative text-black">
                                <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone
                                    name="телефн" placeholder=" (___) ___-__-__" aria-label="Телефон" maxlength="15"
                                    class="border w-full rounded-xl p-4" required>
                                <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон <span
                                        class="text-red-400">*</span></span>
                            </div>

                            <button type="submit"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-xl text-base md:text-xl font-bold">
                                Рассчитать стоимость
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </section>

        <!-- 2 -->
        <section
            class="py-16 bg-gradient-to-r from-[#D1E4F2] from-[#DFEFFB] from-[#D1E4F2] border-solid border rounded-2xl">
            <div class="container mx-auto px-4">
                <!-- title -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Рассчитайте стоимость вашего ремонта<br>и получите <span class="text-orange-500">3
                            варианта</span> сметы под ваш бюджет
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base">
                        Ответьте на 5 простых вопроса, чтобы мы подготовили для вас 3 варианта сметы под ваш бюджет
                    </p>
                </div>

                <form action="/send/email" method="POST" class="max-w-[95%] md:max-w-[80%] mx-auto">
                    <div class="flex flex-col justify-center items-center gap-4">
                        <div class="flex flex-col flex-wrap md:flex-row gap-3 md:gap-4 justify-center items-center">
                            <select name="тип жилья"
                                class="w-full max-w-[350px] px-4 pr-8 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 custom-select text-sm md:text-base"
                                aria-label="Тип жилья">
                                <option value="" selected disabled>Какой у вас тип жилья?</option>
                                <option value="Новостройка (бетонные стены)">Новостройка (бетонные стены)</option>
                                <option value="Новостройка (с предчистовой отделкой / White Box)">Новостройка (с
                                    предчистовой
                                    отделкой / White Box)</option>
                                <option value="Вторичное жилье (старый фонд)">Вторичное жилье (старый фонд)</option>
                                <option value="Коттедж / Загородный дом">Коттедж / Загородный дом</option>
                            </select>
                            <select name="площадь обьекта"
                                class="w-full max-w-[350px] px-4 pr-8 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 custom-select text-sm md:text-base"
                                aria-label="Площадь объекта">
                                <option value="" selected disabled>Какая площадь объекта?</option>
                                <!-- range 20-150 -->
                                <?php for ($i = 20; $i <= 150; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> м²</option>
                                <?php } ?>
                            </select>
                            <select name="Стиль ремонта"
                                class="w-full max-w-[350px] px-4 pr-8 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 custom-select text-sm md:text-base"
                                aria-label="Стиль ремонта">
                                <option value="" selected disabled>В каком стиле планируете ремонт?</option>
                                <option value="Современный / Минимализм">Современный / Минимализм</option>
                                <option value="Классический / Неоклассика">Классический / Неоклассика</option>
                                <option value="Лофт">Лофт</option>
                                <option value="Скандинавский">Скандинавский</option>
                                <option value="Еще не определился(-ась)">Еще не определился(-ась)</option>
                            </select>
                            <select name="Дата планировки"
                                class="w-full max-w-[350px] px-4 pr-8 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 custom-select text-sm md:text-base"
                                aria-label="Когда планируете начинать работы">
                                <option value="" selected disabled>Когда планируете начинать работы?</option>
                                <option value="В ближайшее время (нужен замер)">В ближайшее время (нужен замер)</option>
                                <option value="Через 1–2 месяца">Через 1–2 месяца</option>
                                <option value="Просто прицениваюсь на будущее">Просто прицениваюсь на будущее</option>
                                <option value="Еще не определился(-ась)">Еще не определился(-ась)</option>
                            </select>
                            <select name="Куда прислать расчет?"
                                class="w-full max-w-[350px] px-4 pr-8 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 custom-select text-sm md:text-base"
                                aria-label="Куда прислать расчет">
                                <option value="" selected disabled>Куда прислать расчет?</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Telegram">Telegram</option>
                                <option value="MAX">MAX</option>
                            </select>
                            <div class="relative text-blackw-full">
                                <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone
                                    name="телефн" placeholder=" (___) ___-__-__" aria-label="Телефон" maxlength="15"
                                    class="border w-full rounded-xl p-4" required>
                                <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон <span
                                        class="text-red-400">*</span></span>
                            </div>
                        </div>
                        <button type="submit"
                            class="cta-button relative bg-orange-500 text-white px-6 md:px-8 py-3 rounded-xl text-base md:text-xl w-full md:w-auto">
                            Получить расчет стоимости
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- 3 -->
        <section class="py-6 md:py-10 rounded-2xl">
            <div class="container mx-auto px-4">
                <!-- title -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Почему <strong class="text-orange-500">9 из 10</strong> клиентов выбирают именно нас
                    </h2>
                </div>
                <div class="max-w-[80%] mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-8 justify-center">
                    <!-- Card 1 -->
                    <div
                        class="p-3 md:p-4 text-center border-2 border-dashed border-[#3F6A9B]/20 rounded-xl bg-white hover:border-[#3F6A9B] hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-12 h-12 md:w-16 md:h-16 bg-[#E7F2F9] rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                            <i class="fas fa-home text-[#3F6A9B] text-lg md:text-2xl"></i>
                        </div>
                        <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1"><span
                                class="text-[#3F6A9B]">Бесплатный выезд инженера</span> и смета в 3-х вариантах</h3>
                        <p class="text-xs md:text-base">Приедем на объект в день обращения. Сделаем <strong>точные
                                лазерные замеры</strong> и составим подробный расчет стоимости (<strong>Эконом</strong>,
                            <strong>Стандарт</strong>, <strong>Бизнес</strong>) под ваш бюджет за 24 часа.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="p-3 md:p-4 border-dashed text-center border-2 border-[#3F6A9B]/20 rounded-xl bg-white hover:border-[#3F6A9B] hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-12 h-12 md:w-16 md:h-16 bg-[#E7F2F9] rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                            <i class="fas fa-file-contract text-[#3F6A9B] text-lg md:text-2xl mb-1"><span
                                    class="sr-only">Иконка с договором</span></i>
                        </div>
                        <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1"><span
                                class="text-[#3F6A9B]">Фиксация итоговой стоимости</span> в договоре</h3>
                        <p class="text-xs md:text-base">Сумма, прописанная в смете, является
                            <strong>окончательной</strong>. Мы гарантируем: <strong>никаких "непредвиденных
                                расходов"</strong> и доплат в процессе. Если мы чего-то не учли — это станет нашей
                            заботой, а не вашим расходом.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="p-3 md:p-4 border-dashed text-center border-2 border-[#3F6A9B]/20 rounded-xl bg-white hover:border-[#3F6A9B] hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-12 h-12 md:w-16 md:h-16 bg-[#E7F2F9] rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                            <i class="fas fa-shield-alt text-[#3F6A9B] text-lg md:text-2xl"></i>
                        </div>
                        <h3 class="text-sm md:text-lg font-semibold text-gray-800 mb-1"><span
                                class="text-[#3F6A9B]">Поэтапная оплата</span> и гарантия 3 года</h3>
                        <p class="text-xs md:text-base"><strong>Никаких 100% предоплат</strong>. Вы платите только за
                            <strong>фактически выполненные</strong> и принятые вами этапы работ. Мы уверены в качестве,
                            поэтому несем <strong>полную юридическую ответственность</strong> за ваш ремонт в течение
                            <strong>36 месяцев</strong>.
                        </p>
                    </div>

                </div>
                <div class="max-w-[100%] max-w-[80%] mx-auto text-center mt-8">
                    <button data-button-dialog
                        class="relative text-black border border-dashed border-orange-500 px-6 md:px-8 py-3 rounded-xl text-base md:text-xl hover:bg-orange-500 hover:border-white transition hover:text-white inline-block animate-bounce">
                        <i class="fa fa-hand-pointer mr-4 cursor-pointer"></i> Получить расчет стоимости в 3-х вариантах
                    </button>
                </div>
            </div>
        </section>

        <!-- 4 -->
        <section class="max-w-[100%] md:max-w-[70%] mx-auto py-16 rounded-2xl">
            <div class="container mx-auto px-4">
                <!-- title -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Выберите подходящий формат ремонта для вашей квартиры
                    </h2>
                    <p class="text-xl text-gray-600">
                        Работаем честно — вы платите только за те работы, которые реально необходимы вашему объекту
                    </p>
                </div>

                <!-- swiper -->
                <div class="swiper swiper-type-2 py-8 md:py-14 mx-auto">
                    <div class="swiper-wrapper flex items-stretch">

                        <!-- Slide 1: Косметический ремонт -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-dashed border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/cosmetic.png"
                                        alt="Косметический ремонт" title="Косметический ремонт — от 8 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 8 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Косметический ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-[#3F6A9B]">от 14 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Если нужно обновить
                                            интерьер
                                            перед заездом или для сдачи в аренду.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Демонтаж старых покрытий,
                                            переклейка обоев, укладка ламината, покраска потолков, замена розеток.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Самый быстрый способ
                                            превратить «бабушкин ремонт» в современное жилье без огромных вложений.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Капитальный ремонт (Популярный) -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="absolute -top-6 left-4 bg-orange-500 text-white px-3 py-1 rounded-t-lg text-xs font-bold z-10">
                                Самый популярный
                            </div>
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-orange-500 h-full flex flex-col relative">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/capital.png"
                                        alt="Капитальный ремонт" title="Капитальный ремонт — от 13 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 13 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Капитальный ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-orange-500">от 45 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Для новостроек в бетоне или
                                            «вторички» с изношенными коммуникациями.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Полная замена электрики и
                                            сантехники, возведение перегородок, выравнивание стен по маякам, стяжка
                                            пола,
                                            чистовая отделка.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Полное обновление всех
                                            инженерных систем. Забудете о проблемах с проводкой или трубами на ближайшие
                                            20
                                            лет.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Дизайнерский ремонт -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-dashed border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/finish.png"
                                        alt="Дизайнерский ремонт" title="Дизайнерский ремонт — от 18 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 18 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Дизайнерский ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-[#3F6A9B]">от 60 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Для тех, кому важна
                                            уникальная
                                            эстетика, перепланировка и сложные решения.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Работа по индивидуальному
                                            дизайн-проекту, многоуровневое освещение, скрытые двери, теневые профили,
                                            декоративная штукатурка.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Мы воплощаем в жизнь
                                            самые
                                            сложные идеи. Авторский надзор и комплектация объекта материалами — на нас.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination mt-8"></div>
                    <div class="swiper-button-next" aria-label="Следующий формат ремонта"></div>
                    <div class="swiper-button-prev" aria-label="Предыдущий формат ремонта"></div>
                </div>

                <!-- Footer: Trigger доверия -->
                <div
                    class="bg-gradient-to-r from-[#3F6A9B]/10 to-orange-500/10 rounded-xl p-6 md:p-8 border border-dashed border-[#3F6A9B]/30">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex-1">
                            <h4 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                                <i class="fas fa-question-circle text-[#3F6A9B] mr-2"></i>
                                Не знаете, какой вид ремонта вам нужен?
                            </h4>
                            <p class="text-gray-600 text-sm md:text-base">
                                Приедем, проверим состояние стен и инженерных систем и скажем честно: где можно
                                сэкономить, а где — категорически нельзя.
                            </p>
                        </div>
                        <button data-button-dialog
                            class="shrink-0 bg-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-600 transition shadow-lg hover:shadow-xl flex items-center gap-2">
                            <i class="fas fa-user-tie"></i>
                            Вызвать инженера на бесплатную консультацию
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- 5 -->
        <section class="md:py-16">
            <div class="container mx-auto px-4">
                <!-- Header -->
                <div
                    class="portfolio-header relative mx-auto max-w-[75%] flex flex-col md:flex-row items-start md:items-center justify-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                        Наши последние работы
                    </h2>
                    <a href="/portfolio"
                        class="view-all-link block md:absolute right-0 text-blue-600 hover:text-blue-700 transition font-semibold flex items-center gap-2">
                        Смотреть всё портфолио
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- list -->
                <div class="container mx-auto">
                    <div
                        class="flex flex-wrap gap-3 md:gap-4 justify-center max-w-[95%] md:max-w-[90%] mx-auto text-sm md:text-xl">
                        <!-- Button 1 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/nowostroyka"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-building text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт квартир в новостройке</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 2 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-home text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт во вторичке</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 3 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-couch text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт студии</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 4 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-door-open text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 1-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 5 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-bed text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 2-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 6 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center"
                            style="width: fit-content;">
                            <i class="fas fa-house-user text-orange-500 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 3-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>
                    </div>
                </div>

                <!-- Project Cards -->
                <div class="relative mx-auto mt-10">
                    <!-- Swiper -->
                    <div class="swiper swiper-type-4 py-10">
                        <div class="swiper-wrapper">
                            <?php foreach ($featuredProjects as $project): ?>
                                <?php
                                $coverUrl = $project['cover']
                                    ? htmlspecialchars($site['baseUrl'] . '/' . $project['folder_image'] . '/' . $project['cover'])
                                    : '';
                                $descriptionParts = [htmlspecialchars($project['category']) . ', площадь ' . htmlspecialchars($project['size']) . '.'];
                                if (!empty($project['duration'])) {
                                    $descriptionParts[] = 'Срок выполнения — ' . htmlspecialchars($project['duration']) . '.';
                                }
                                if (!empty($project['price'])) {
                                    $descriptionParts[] = 'Стоимость — ' . htmlspecialchars($project['price']) . '.';
                                }
                                ?>
                                <div class="swiper-slide">
                                    <div
                                        class="border-2 border-dashed border-orange-500 bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition h-full list-none">
                                        <div class="relative">
                                            <?php if ($coverUrl): ?>
                                                <img data-src="<?= $coverUrl ?>"
                                                    alt="<?= htmlspecialchars($project['title']) ?>"
                                                    title="<?= htmlspecialchars($project['title']) ?>"
                                                    class="lazy w-full h-48 object-cover" width="768" height="384"
                                                    decoding="async" loading="lazy">
                                            <?php endif; ?>
                                        </div>

                                        <div class="flex flex-col justify-between items-center p-6 h-[calc(100%-12rem)]">
                                            <div class="flex flex-col w-full">
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                                    <?= htmlspecialchars($project['title']) ?>
                                                </h3>
                                                <p class="text-gray-600 mb-4">
                                                    <?= implode(' ', $descriptionParts) ?>
                                                </p>
                                            </div>

                                            <div class="flex items-center justify-between w-full gap-2">
                                                <div class="flex flex-col items-start justify-start text-sm text-gray-500">
                                                    <div class="relative">
                                                        <i class="fas fa-ruler-combined mr-1"></i>
                                                        <?= htmlspecialchars($project['size']) ?>
                                                    </div>
                                                    <?php if (!empty($project['duration'])): ?>
                                                        <div class="relative">
                                                            <i class="fas fa-clock mr-1"></i>
                                                            <?= htmlspecialchars($project['duration']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <a href="<?= htmlspecialchars(Setting\Route\Function\Functions::portfolioProjectUrl($project['slug'])) ?>"
                                                    class="text-orange-500 hover:text-orange-600 transition font-semibold flex items-center gap-1">
                                                    Смотреть проект
                                                    <i class="fas fa-arrow-right text-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev" aria-label="Предыдущий слайд"></div>
                    <div class="swiper-button-next" aria-label="Следующий слайд"></div>
                </div>
            </div>
        </section>

        <!-- 7 -->
        <section id="process" class="py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Ваш путь к идеальному ремонту:<br><strong class="text-orange-500">6 шагов</strong> до новоселья
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
                            Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются согласно
                            ГОСТ и СНИП.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8 -->
        <section id="prices" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Прозрачная стоимость работ:<br>фиксируем смету и не меняем её до конца ремонта
                    </h2>
                    <p class="text-xl text-gray-600">
                        Выберите пакет услуг под ваши задачи. Итоговая сумма прописывается в договоре и не растет в
                        процессе.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div
                        class="flex flex-col justify-between items-center bg-white border-2 border-gray-200 rounded-xl p-8 hover:border-blue-600 transition">
                        <div class="block">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Эконом (Косметический)</h3>
                            <div class="text-3xl font-bold text-blue-600 mb-2">от 8 000 ₽/м²</div>
                            <div class="text-sm text-gray-500 mb-4">Срок: от 14 дней · Гарантия: 3 год</div>
                            <p class="text-gray-600 mb-4">Идеально, чтобы освежить квартиру: замена обоев, ламината и
                                покраска потолков.</p>
                            <p class="text-sm font-semibold text-gray-800 mb-2">Что входит:</p>
                            <ul class="text-gray-600 space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Демонтаж старых покрытий</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Грунтовка и частичная шпаклевка стен
                                </li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Поклейка обоев или покраска</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Укладка ламината/линолеума</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Монтаж плинтусов и розеток</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg hover:bg-gray-300 transition">
                            Выбрать пакет
                        </button>
                    </div>

                    <div
                        class="flex flex-col justify-between items-center bg-blue-600 text-white rounded-xl p-8 hover:scale-110 transition duration-500">
                        <div class="block">
                            <div
                                class="bg-orange-500 text-white text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
                                ПОПУЛЯРНЫЙ
                            </div>
                            <h3 class="text-2xl font-bold mb-4">Стандарт (Капитальный)</h3>
                            <div class="text-3xl font-bold text-orange-300 mb-2">от 13 000 ₽/м²</div>
                            <div class="text-sm text-blue-200 mb-4">Срок: от 30 дней · Гарантия: 3 года</div>
                            <p class="mb-4">Полное обновление инженерных систем и идеально ровные поверхности.</p>
                            <p class="text-sm font-semibold mb-2">Что входит:</p>
                            <ul class="space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Весь перечень из «Эконом»</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Выравнивание стен по маякам</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Разводка новой электрики и
                                    сантехники
                                </li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Устройство стяжки пола</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Укладка плитки в санузлах</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition font-semibold">
                            Выбрать пакет
                        </button>
                    </div>

                    <div
                        class="flex flex-col justify-between items-center bg-white border-2 border-gray-200 rounded-xl p-8 hover:border-blue-600 transition">
                        <div class="block">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Премиум (Дизайнерский)</h3>
                            <div class="text-3xl font-bold text-blue-600 mb-2">от 18 000 ₽/м²</div>
                            <div class="text-sm text-gray-500 mb-4">Срок: от 45 дней · Гарантия: 3 лет</div>
                            <p class="text-gray-600 mb-4">Бескомпромиссное качество и работа со сложными дизайнерскими
                                решениями.</p>
                            <p class="text-sm font-semibold text-gray-800 mb-2">Что входит:</p>
                            <ul class="text-gray-600 space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Весь перечень из «Стандарт»</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Монтаж многоуровневых потолков</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Декоративная штукатурка / Лепнина
                                </li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Установка скрытых дверей и трекового
                                    освещения</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Теплые полы и инсталляции</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg hover:bg-gray-300 transition">
                            Выбрать пакет
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9 -->
        <section id="reviews" class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Что говорят о нас те, кто уже переехал в новую квартиру
                    </h2>
                    <!-- <p class="text-xl text-gray-600">
                        Что говорят о нас наши клиенты
                    </p> -->
                </div>

                <!-- <review-lab data-widgetid="69d6a3731ab6330a0b879de7"></review-lab>
                <script src="https://app.reviewlab.ru/widget/index-es2015.js" defer></script> -->

                <!-- Ручные отзывы -->
                <div class="max-w-6xl mx-auto">
                    <p class="text-sm text-gray-500 mb-6">150+ проверенных отзывов</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Отзыв 1 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/01.jpeg"
                                        alt="Александр В." title="Александр В." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Александр В.</p>
                                    <p class="text-xs text-gray-400">15 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">ЖК «Сердце Столицы»</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Главный страх был, что цена в процессе вырастет в два раза. Но ребята из Проект
                                квартира молодцы — как в смете прописали сумму, так она и осталась до конца. Делали
                                ремонт в новостройке (64 м²). По срокам уложились день в день. Особенно порадовали
                                ежедневные фото в MAX — не нужно было через всю Москву ездить проверять».
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 2 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-pink-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/02.jpeg" alt="Мария" title="Мария"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Анатолий</p>
                                    <p class="text-xs text-gray-400">12 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Вторичка на Профсоюзной</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Нужно было капитально обновить старую сталинку. Переживала за трубы и проводку. Бригада
                                сработала очень чисто, сами договорились с УК об отключении стояков. Весь мусор вывозили
                                сразу, соседи ни разу не пожаловались. Качество отделки — на высоте, стены идеально
                                ровные под покраску».
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 3 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/03.jpeg" alt="Дмитрий" title="Дмитрий"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Дмитрий</p>
                                    <p class="text-xs text-gray-400">10 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Студия 35 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Заказывал черновой ремонт в студии. Понравилось, что не навязывали лишнего. Инженер на
                                замере сразу подсказал, где можно сэкономить на материалах, а где лучше взять подороже.
                                Сэкономил около 40 тысяч на закупках через их скидки в Петровиче. Рекомендую».
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 4 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-green-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/04.jpeg"
                                        alt="Елена и Игорь" title="Елена и Игорь" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Елена</p>
                                    <p class="text-xs text-gray-400">8 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Дизайнерский ремонт 78 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Делали дизайнерский ремонт по нашему проекту. Было много сложных моментов с трековым
                                освещением и скрытыми дверями. Мастера справились на 5+. Гарантию дали на 3 года, но,
                                судя по качеству, она нам не пригодится. Спасибо!»
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 5 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-orange-100 overflow-hidden flex-shrink-0">
<img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/05.jpeg" alt="Сергей К." title="Сергей К."
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Оля</p>
                                    <p class="text-xs text-gray-400">5 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Капитальный ремонт 52 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Нормальная контора. Делают быстро, лишних денег не просят. Смета понятная, каждый
                                гвоздь прописан. Оплата была поэтапная — сделал этап, я проверил, заплатил. Для меня это
                                было самым важным критерием доверия».
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 6 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-purple-100 overflow-hidden flex-shrink-0">
<img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/06.jpeg" alt="Ольга Николаевна" title="Ольга Николаевна"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Ольга Николаевна</p>
                                    <p class="text-xs text-gray-400">2 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Косметический ремонт 45 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Освежили мне квартиру за 2 недели (косметика). Обои поклеены стык в стык, ламинат не
                                скрипит. Очень вежливые ребята, после себя оставили порядок. Приятно иметь дело с
                                профессионалами».
                            </p>
                            <p class="text-xs text-gray-400">Проверенный отзыв</p>
                        </div>

                    </div>
                    <div class="flex flex-col justify-center items-center mt-4">
                        <a href="<?= $site['baseUrl'] ?>/reviews"
                            class="mx-auto px-10 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Читать все отзывы
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Отвечаем на важные вопросы <strong class="text-orange-500">честно</strong> и <strong
                            class="text-orange-500">без воды</strong>
                    </h2>
                    <p class="text-xl text-gray-600">
                        Разбираем технические и финансовые нюансы вашего будущего ремонта
                    </p>
                </div>

                <div class="max-w-3xl mx-auto">
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">1. Какой срок выполнения ремонта?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p class="mb-2"><strong>Ответ:</strong> Всё зависит от площади и сложности:</p>
                                <ul class="list-disc ml-5 space-y-1 mb-3">
                                    <li>Косметический ремонт — от 14 дней.</li>
                                    <li>Капитальный в ремонт — от 30 дней.</li>
                                    <li>Дизайнерский ремонт — от 40 дней.</li>
                                </ul>
                                <p><strong>Важно:</strong> Мы фиксируем дату сдачи в договоре. Если мы опоздаем хотя бы
                                    на день — мы выплачиваем вам неустойку за каждые сутки просрочки.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">2. Какая гарантия на работы?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p><strong>Ответ:</strong> Мы даем полную гарантию 3 года на все виды отделочных и
                                    инженерных работ. Если в течение этого срока у вас отклеится плинтус или возникнут
                                    проблемы с электрикой — мы приедем и бесплатно устраним всё в течение 48 часов. Наша
                                    ответственность прописана в договоре и закреплена юридически.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">3. Работаете ли вы с материалами
                                    заказчика?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p><strong>Ответ:</strong> Да, конечно. Мы можем работать с вашими материалами, но
                                    рекомендуем закупать их через нас. Благодаря собственному складу мы сможем поставить
                                    материалы дешевле. Всю логистику, проверку качества и подъем на этаж мы берем на
                                    себя.
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">4. Как происходит оплата?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p class="mb-2"><strong>Ответ:</strong> Оплата происходит строго поэтапно:</p>
                                <ol class="list-decimal ml-5 space-y-1 mb-2">
                                    <li>Мы выполняем определенный объем работ (например, черновую отделку).</li>
                                    <li>Вы принимаете этап по акту.</li>
                                    <li>Только после этого вы оплачиваете этот объем.</li>
                                </ol>
                                <p>Вы всегда видите, за что платите, и контролируете бюджет.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">5. Кто именно будет работать у меня в
                                    квартире?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p><strong>Ответ:</strong> У нас работают только узкопрофильные специалисты со стажем от
                                    5 лет. Электрику делает электрик, плитку кладет плиточник — никаких «универсалов».
                                    Все мастера — граждане РФ и РБ с проверенной репутацией. Мы несем полную
                                    ответственность за порядок на объекте и культуру поведения рабочих.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">6. Не будет ли проблем с соседями и
                                    Управляющей Компанией?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p><strong>Ответ:</strong> Мы берем все коммуникации на себя. Работаем строго по «закону
                                    о тишине» в Москве (шумные работы только с 9:00 до 13:00 и с 15:00 до 19:00). После
                                    каждого этапа убираем мусор в подъезде и лифте. Если Управляющей Компании
                                    понадобятся акты скрытых работ или допуски СРО — мы предоставим весь комплект
                                    документов в течение дня.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-lg p-6">
                            <button class="w-full text-left flex justify-between items-center faq-toggle">
                                <h3 class="text-lg font-semibold text-gray-800">7. Могу ли я контролировать ремонт, если
                                    нахожусь в другом городе?</h3>
                                <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                            </button>
                            <div class="mt-4 text-gray-600 hidden faq-content">
                                <p><strong>Ответ:</strong> Более 40% наших клиентов делают ремонт удаленно. Мы создаем
                                    для вас персональный чат в Telegram, куда ежедневно присылаем фото- и
                                    видеоотчеты о проделанной работе. Также мы можем установить на объекте камеру
                                    видеонаблюдения, чтобы вы могли в любой момент проверить процесс через смартфон.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 text-center">
                        <p class="text-gray-600 mb-4">Не нашли ответ на свой вопрос? Задайте его нашему инженеру лично!
                        </p>
                        <button data-button-dialog
                            class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Получить консультацию
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SEO FAQ Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 max-w-4xl">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8 text-center">Ремонт квартир в Москве и Московской области</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center faq-toggle">
                            <h3 class="text-lg font-semibold text-gray-800">Компания «ПКвартира» выполняет полный ремонт квартир под ключ — что это значит?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 hidden faq-content">
                            <p>Мы берём на себя все этапы — от демонтажа старых покрытий до финальной уборки. Вам не нужно искать отдельных мастеров по электрике, сантехнике или отделке — все работы выполняет одна бригада под контролем прораба. Компания «ПКвартира» работает в Москве и Подмосковье с 2014 года.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center faq-toggle">
                            <h3 class="text-lg font-semibold text-gray-800">Какие виды ремонта вы выполняете?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 hidden faq-content">
                            <p>Для квартир в новостройке мы делаем черновой ремонт — стяжку, штукатурку, разводку коммуникаций. Для вторичного жилья — полный цикл: демонтаж старых покрытий, замена проводки и труб, выравнивание стен, чистовая отделка. Также специализируемся на дизайнерском ремонте с авторским надзором архитектора, перепланировке с согласованием в Мосжилинспекции и ремонте коммерческих помещений.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center faq-toggle">
                            <h3 class="text-lg font-semibold text-gray-800">Сколько стоит ремонт квартиры?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 hidden faq-content">
                            <p>Цена ремонта зависит от площади, состояния объекта и выбранного пакета. Косметический ремонт начинается от 8 000 ₽ за м², капитальный — от 13 000 ₽ за м², дизайнерский — от 18 000 ₽ за м². Точную стоимость мы рассчитываем после бесплатного выезда инженера на замер. Средний срок ремонта однокомнатной квартиры — 6–8 недель, двухкомнатной — 8–10 недель, трёхкомнатной — 10–14 недель.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center faq-toggle">
                            <h3 class="text-lg font-semibold text-gray-800">Стоимость ремонта фиксируется в договоре?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 hidden faq-content">
                            <p>Да, стоимость фиксируется в договоре и не меняется в процессе. Мы работаем по прозрачной смете: каждый материал, каждая работа прописаны с точной ценой. Если вдруг что-то потребует дополнительных затрат — мы согласовываем это с вами заранее. Никаких «непредвиденных расходов» и доплат после начала работ.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <button class="w-full text-left flex justify-between items-center faq-toggle">
                            <h3 class="text-lg font-semibold text-gray-800">Почему заказывают ремонт именно у вас?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="mt-4 text-gray-600 hidden faq-content">
                            <p>За 10 лет работы мы сделали более 500 объектов. Среди наших клиентов — владельцы квартир в новостройках, жители вторичного жилья, собственники коттеджей и коммерческих помещений. Мы предоставляем гарантию до 3 лет на все виды работ, работаем по официальному договору и ведём ежедневные фотоотчёты. Бесплатный выезд инженера, замер лазером и подготовка сметы — всё без предоплаты.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 gradient-primary text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Начните ремонт, который не захочется переделывать
                </h2>
                <p class="text-xl mb-8 text-gray-100">
                    Забронируйте бесплатный выезд инженера сегодня. Мы проведем замеры лазером, найдем все<br>«косяки»
                    застройщика и составим смету, которая не вырастет ни на рубль.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:<?php echo $site['phone']; ?>"
                        class="bg-orange-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-600 transition transform hover:scale-105">
                        <i class="fas fa-phone mr-2"></i>
                        Вызвать инженера на замер
                    </a>
                    <button data-button-dialog
                        class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                        <i class="fas fa-comments mr-2"></i>
                        Получить консультацию
                    </button>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->

    <script src="/public/assets/scripts/components/swiper.js" defer></script>
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/faq.js" defer></script>

    <!-- Google tag (gtag.js) GA4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E9ZV484NQJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-E9ZV484NQJ');
    </script>

    <!-- Yandex.Metrika counter -->
    <script>
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js?id=108587554', 'ym');

        ym(108587554, 'init', { ssr: true, webvisor: true, clickmap: true, ecommerce: "dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce: true, trackLinks: true });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/108587554" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

</body>

</html>