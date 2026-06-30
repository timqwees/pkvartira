<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Цены на ремонт квартир — прозрачный прайс |
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>
    </title>
    <meta name="description"
        content="Актуальные цены на ремонт квартир. Полный прайс-лист: от чернового до премиального ремонта. Без скрытых платежей.">
    <meta name="keywords" content="цены на ремонт, стоимость ремонта, прайс, расценки ремонт квартир">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/prices'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Цены на ремонт квартир — прозрачный прайс | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Актуальные цены на ремонт квартир. Полный прайс-лист: от чернового до премиального ремонта.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/prices'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Цены на ремонт квартир — прозрачный прайс | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Актуальные цены на ремонт квартир. Полный прайс-лист: от чернового до премиального ремонта.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain"
        content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

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
                    "availableLanguage": ["Russian"]
                },
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
                    "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressCountry": "RU"
                },
                "sameAs": [
                    <?= json_encode($site['vk'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    <?= json_encode($site['telegram'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                ]
            },
            {
                "@type": "WebSite",
                "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
                "description": "Профессиональный ремонт квартир и домов под ключ",
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "WebPage",
                "@id": <?= json_encode($site['baseUrl'] . '/prices/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/prices/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Цены на ремонт - Ремонт квартир и домов под ключ",
                "description": "Актуальные цены на ремонт квартир в Москве. Стоимость от 6 500 ₽/м². Прозрачная смета без скрытых платежей.",
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['baseUrl'] . '/prices/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "Цены",
                        "item": <?= json_encode($site['baseUrl'] . '/prices/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    }
                ]
            },
            {
                "@type": "FAQPage",
                "@id": <?= json_encode($site['canonicalUrl'] . '#faq', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "mainEntity": [
                    {
                        "@type": "Question",
                        "name": "Как формируется итоговая цена?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Цена зависит от площади, типа ремонта, состояния помещения и выбранных материалов. Мы делаем прозрачную смету без скрытых платежей."
                        }
                    },
                    {
                        "@type": "Question",
                        "name": "Отличается ли цена на ремонт в новостройке и вторичке?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Ремонт в новостройке обычно дешевле на 15-20%, так как не требуется демонтаж и выравнивание. Вторичка требует больше подготовительных работ."
                        }
                    },
                    {
                        "@type": "Question",
                        "name": "Как получить смету?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "После замера инженер составляет смету в 3-х вариантах. Вы получаете детальный расчет с разбивкой по видам работ."
                        }
                    },
                    {
                        "@type": "Question",
                        "name": "Есть ли скрытые платежи?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Нет, в нашей смете нет скрытых платежей. Все работы и материалы указаны заранее. Дополнительные работы согласовываются отдельно."
                        }
                    },
                    {
                        "@type": "Question",
                        "name": "Какие есть способы оплаты?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Мы принимаем наличные, банковские переводы, карты."
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
            class="reveal bg-[url(/public/assets/images/portfolio-photos/cottage/1_180sqm/2.jpg)] bg-center bg-cover bg-no-repeat relative overflow-hidden py-20">
            <div class="absolute blur-xl z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-white/50">
            </div>
            <div class="relative z-10 container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

                    <div class="max-w-3xl mb-4">
                        <nav aria-label="breadcrumb" class="mb-4">
                            <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                                <li class="text-gray-900 font-medium"><a href="/"
                                        class="hover:text-blue-600 transition">Главная</a></li>
                                <li class="text-black">/</li>
                                <li class="text-gray-900 font-medium"><a href="/prices"
                                        class="hover:text-blue-600 transition">Цены</a></li>
                            </ol>
                        </nav>
                        <h1 class="z-10 hero-title text-4xl md:text-5xl font-bold mb-6 text-black">
                            Цены на ремонт квартир<br><span class="text-blue-600">в Москве</span>
                        </h1>
                        <p class="mb-6 text-xl text-gray-800">
                            <span class="bg-white px-2 py-1 rounded-lg text-black">Прозрачные цены. Точный расчет цены.
                                Делаем стоимость ремонта выгодной</span>
                        </p>

                        <!-- CTA Button -->
                        <div class="text-start">
                            <a href="tel:<?= $site['phone']; ?>"
                                class="cta-button relative bg-orange-500 text-white px-6 md:px-8 py-3 rounded-xl text-lg w-full max-w-xs md:w-auto">
                                <span class="drop-shadow-lg font-sans">Расчитать Стоимость</span>
                            </a>
                            <p class="text-xs md:text-sm mt-6 text-white">
                                <span class="bg-white px-2 py-1 rounded-lg text-black whitespace-nowrap">Ответим за 5
                                    минут</span> • <span
                                    class="bg-white px-2 py-1 rounded-lg text-black whitespace-nowrap">Бесплатно</span>
                                • <span class="bg-white px-2 py-1 rounded-lg text-black whitespace-nowrap">Без
                                    обязательств</span>
                            </p>
                        </div>

                        <!-- Promo Link -->
                        <div class="mt-6">
                            <a href="/stocks"
                                class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-lg hover:bg-red-100 transition group">
                                <i class="fas fa-percent text-sm"></i>
                                <span class="font-medium">Специальные акции и скидки</span>
                                <i
                                    class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <form action="/send/email" method="POST" class="w-full md:max-w-[560px] md:ml-auto -translate-y-10">
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
                                    name="телефн" placeholder="(___) ___-__-__" aria-label="Телефон" maxlength="15"
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

        <!-- 2. Цена за м² по типам ремонта -->
        <section class="reveal py-12 md:py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Цены за м² по типам ремонта
                </h2>
                <div class="flex justify-center flex-wrap items-center gap-4 md:gap-6 max-w-5xl mx-auto">
                    <!-- Косметический ремонт -->
                    <div class="break-all bg-gray-50 rounded-xl p-6 text-start hover:shadow-lg transition">
                        <div class="text-xl font-bold text-black mb-2">Косметический ремонт</div>
                        <!-- <div class="text-xs text-gray-400 mb-3">без материалов</div> -->
                        <div class="text-xl text-black font-normal">от <font class="font-bold text-blue-600 text-2xl">8
                                000 ₽/м²</font>
                        </div>
                    </div>
                    <!-- Капитальный ремонт -->
                    <div
                        class="break-all bg-gray-50 rounded-xl p-6 text-start hover:shadow-lg transition border-2 border-orange-200 relative">
                        <div
                            class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-orange-500 text-white text-xs px-3 py-1 rounded-full">
                            Популярно
                        </div>
                        <div class="text-xl font-bold text-black mb-2">Капитальный ремонт</div>
                        <!-- <div class="text-xs text-gray-400 mb-3">частично с материалами</div> -->
                        <div class="text-xl text-black font-normal">от <font class="font-bold text-blue-600 text-2xl">13
                                000 ₽/м²</font>
                        </div>
                    </div>
                    <!-- Дизайнерский ремонт -->
                    <div class="break-all bg-gray-50 rounded-xl p-6 text-start hover:shadow-lg transition">
                        <div class="text-xl font-bold text-black mb-2">Дизайнерский ремонт</div>
                        <!-- <div class="text-xs text-gray-400 mb-3">без материалов</div> -->
                        <div class="text-xl text-black font-normal">от <font class="font-bold text-blue-600 text-2xl">18
                                000 ₽/м²</font>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Цена по типам объектов: студия / 1к / 3к -->
        <section class="reveal py-12 md:py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Цена по типам объектов: студия / 1к / 2к / 3к
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">

                    <!-- студия -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/studio/2_31sqm/03_gostinaya-kukhnya.jpg"
                            alt="Студия" title="Ремонт студии — от 200 000 ₽" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-semibold text-gray-800">Студия</h3>
                                <span class="text-xs text-gray-500">от 25 м²</span>
                            </div>
                            <div class="text-xl text-black font-normal">от <font
                                    class="font-bold text-blue-600 text-2xl">200 000
                                    ₽</font>
                            </div>
                        </div>
                    </div>

                    <!-- 1-комнатная -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/1room/standard/3_43sqm/1.webp"
                            alt="1 комнатная" title="Ремонт 1-комнатной квартиры — от 296 000 ₽" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-semibold text-gray-800">1-комнатная</h3>
                                <span class="text-xs text-gray-500">от 37 м²</span>
                            </div>
                            <div class="text-xl text-black font-normal">от <font
                                    class="font-bold text-blue-600 text-2xl">296 000
                                    ₽/м²</font>
                            </div>
                        </div>
                    </div>

                    <!-- 2-комнатная -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/2room/standard/3_49sqm/1.png"
                            alt="2 комнатная" title="Ремонт 2-комнатной квартиры — от 400 000 ₽" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-semibold text-gray-800">2-комнатная</h3>
                                <span class="text-xs text-gray-500">от 50 м²</span>
                            </div>
                            <div class="text-xl text-black font-normal">от <font
                                    class="font-bold text-blue-600 text-2xl">400 000 ₽/м²</font>
                            </div>
                        </div>
                    </div>

                    <!-- 3-комнатная -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/3room/standard/2_60sqm/1.webp"
                            alt="3 комнатная" title="Ремонт 3-комнатной квартиры — от 560 000 ₽" class="w-full h-40 object-cover">
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-semibold text-gray-800">3-комнатная</h3>
                                <span class="text-xs text-gray-500">от 70 м²</span>
                            </div>
                            <div class="text-xl text-black font-normal">от <font
                                    class="font-bold text-blue-600 text-2xl">560 000 ₽/м²</font>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- 5. Пример сметы -->
        <!-- <section class="py-12 md:py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-4">
                    Пример сметы
                </h2>
                <p class="text-center text-gray-600 mb-8">Пример сметы на капитальный ремонт квартиры 42 м²</p>
                <div class="relative grid grid-cols-1 md:grid-cols-2 gap-4 mx-auto max-w-6xl">

                    <div class="w-full bg-gray-50 rounded-xl overflow-hidden">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-100 text-gray-800">
                                <tr>
                                    <th class="px-4 py-3 font-light text-left">Наименование работ</th>
                                    <th class="px-4 py-3 font-light text-right">Цена за м²</th>
                                    <th class="px-4 py-3 font-light text-right">Всего м²</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-blue-200">
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Устройство ковра</td>
                                    <td class="px-4 py-3 text-right">120 000 ₽</td>
                                    <td class="px-4 py-3 text-right">42</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Электроша в квартире</td>
                                    <td class="px-4 py-3 text-right">зависит от проекта</td>
                                    <td class="px-4 py-3 text-right">—</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Замена водопровода/канализации</td>
                                    <td class="px-4 py-3 text-right">от 55 000 ₽</td>
                                    <td class="px-4 py-3 text-right">точка</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-between p-4 bg-blue-50 border-t border-blue-100">
                            <p class="text-sm text-gray-600">Итоговая стоимость</p>
                            <span>от <font class="font-bold">1222 ₽</font></span>
                        </div>
                    </div>

                    <div class="w-full bg-gray-50 rounded-xl overflow-hidden">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-100 text-gray-800">
                                <tr>
                                    <th class="px-4 py-3 font-light text-left">Наименование работ</th>
                                    <th class="px-4 py-3 font-light text-right">Цена за м²</th>
                                    <th class="px-4 py-3 font-light text-right">Всего м²</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-blue-200">
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Устройство ковра</td>
                                    <td class="px-4 py-3 text-right">120 000 ₽</td>
                                    <td class="px-4 py-3 text-right">42</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Электроша в квартире</td>
                                    <td class="px-4 py-3 text-right">зависит от проекта</td>
                                    <td class="px-4 py-3 text-right">—</td>
                                </tr>
                                <tr class="bg-white">
                                    <td class="px-4 py-3">Замена водопровода/канализации</td>
                                    <td class="px-4 py-3 text-right">от 55 000 ₽</td>
                                    <td class="px-4 py-3 text-right">точка</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-between p-4 bg-blue-50 border-t border-blue-100">
                            <p class="text-sm text-gray-600">Итоговая стоимость</p>
                            <span>от <font class="font-bold">1222 ₽</font></span>
                        </div>
                    </div>

                </div>
            </div>
        </section> -->

        <!-- 6. Что входит в стоимость -->
        <section class="reveal bg-gray-50 py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
                    Что входит в стоимость ремонта
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

        <!-- 9. FAQ по цене -->
        <section class="reveal py-12 md:py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Отвечаем на важные вопросы о цене честно и без воды
                </h2>
                <div class="max-w-3xl mx-auto space-y-4">
                    <!-- FAQ 1 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between faq-toggle">
                            <h3 class="font-semibold text-gray-800">Как формируется итоговая цена?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 hidden faq-content">
                            Цена зависит от площади, типа ремонта, состояния помещения и выбранных материалов. Мы делаем
                            прозрачную смету без скрытых платежей.
                        </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between faq-toggle">
                            <h3 class="font-semibold text-gray-800">Отличается ли цена на ремонт в новостройке и
                                вторичке?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 hidden faq-content">
                            Ремонт в новостройке обычно дешевле на 15-20%, так как не требуется демонтаж и выравнивание.
                            Вторичка требует больше подготовительных работ.
                        </div>
                    </div>
                    <!-- FAQ 3 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between faq-toggle">
                            <h3 class="font-semibold text-gray-800">Как получить смету?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 hidden faq-content">
                            После замера инженер составляет смету в 3-х вариантах. Вы получаете детальный расчет с
                            разбивкой по видам работ.
                        </div>
                    </div>
                    <!-- FAQ 4 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between faq-toggle">
                            <h3 class="font-semibold text-gray-800">Есть ли скрытые платежи?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 hidden faq-content">
                            Нет, в нашей смете нет скрытых платежей. Все работы и материалы указаны заранее.
                            Дополнительные работы согласовываются отдельно.
                        </div>
                    </div>
                    <!-- FAQ 5 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between faq-toggle">
                            <h3 class="font-semibold text-gray-800">Какие есть способы оплаты?</h3>
                            <i class="fas fa-chevron-down text-blue-600 transition-transform"></i>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 hidden faq-content">
                            Мы принимаем наличные, банковские переводы, карты.
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

                <form action="/send/email" class="flex flex-col sm:flex-row gap-4 justify-center max-w-lg mx-auto mb-8">
                    <input type="hidden" name="Получить расчет" value="">

                    <div class="relative text-black">
                        <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн"
                            placeholder="(___) ___-__-__" aria-label="Телефон" maxlength="15" class="border w-full rounded-xl p-4" required>
                        <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон <span
                                class="text-red-400">*</span></span>
                    </div>

                    <button
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Получить расчет
                    </button>
                </form>

                <ol class="w-fit grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
                    <li class="flex items-center justify-start gap-2">
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

    <!-- FAQ Toggle Script -->
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