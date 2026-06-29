<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Калькулятор ремонта квартиры — рассчитать стоимость онлайн |
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>
    </title>
    <meta name="description"
        content="Бесплатный онлайн-калькулятор ремонта квартиры. Рассчитайте стоимость ремонта под ключ за 1 минуту. Точный расчёт с учётом площади, типа ремонта и дополнительных опций.">
    <meta name="keywords"
        content="калькулятор ремонта квартиры, расчёт стоимости ремонта, сколько стоит ремонт, ремонт под ключ цена">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/calculator'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Калькулятор ремонта квартиры — рассчитать стоимость онлайн">
    <meta property="og:description"
        content="Бесплатный онлайн-калькулятор ремонта квартиры. Рассчитайте стоимость ремонта под ключ за 1 минуту.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/calculator'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="Калькулятор ремонта квартиры — рассчитать стоимость онлайн">
    <meta name="twitter:description"
        content="Бесплатный онлайн-калькулятор ремонта квартиры. Рассчитайте стоимость ремонта под ключ за 1 минуту.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
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
                "inLanguage": "ru-RU",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": <?= json_encode($site['baseUrl'] . '/search?q={search_term_string}', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "query": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": <?= json_encode($site['baseUrl'] . '/calculator/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/calculator', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Калькулятор ремонта квартиры — рассчитать стоимость онлайн | <?= htmlspecialchars($site['name']); ?>",
                "description": "Бесплатный онлайн-калькулятор ремонта квартиры. Рассчитайте стоимость ремонта под ключ за 1 минуту. Точный расчёт с учётом площади, типа ремонта и дополнительных опций.",
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "WebApplication",
                "@id": <?= json_encode($site['baseUrl'] . '/calculator/#app', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/calculator', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Калькулятор ремонта квартиры",
                "description": "Бесплатный онлайн-калькулятор для расчёта стоимости ремонта квартиры под ключ",
                "applicationCategory": "FinanceApplication",
                "operatingSystem": "Any",
                "offers": {
                    "@type": "Offer",
                    "price": "0",
                    "priceCurrency": "RUB"
                },
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "image": <?= json_encode($site['shareImageUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['baseUrl'] . '/calculator/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "Калькулятор",
                        "item": <?= json_encode($site['baseUrl'] . '/calculator', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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

    <main class="pt-20 bg-[#f3f4fb]">
        <section class="py-10" id="calculator">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="bg-white rounded-2xl border border-[#e6e7ee] shadow-[0_10px_30px_rgba(0,0,0,0.08)]">
                    <div class="px-6 pt-6 pb-4">
                        <h1 class="text-[24px] md:text-[28px] font-extrabold text-[#2a2e3b]">Калькулятор ремонта
                            квартиры</h1>
                        <p class="mt-1 text-[13px] text-[#7a7f8c]">Рассчитайте стоимость ремонта квартиры за <span
                                class="font-bold">1 минуту</span></p>
                    </div>

                    <div class="px-6 pb-6">
                        <div class="flex items-center justify-start gap-2">
                            <style>
                                .bg_active {
                                    background-color: rgb(249 115 22);
                                    color: white;
                                    border: none;
                                }
                            </style>
                            <button type="button" data-toggle-section="новостройка"
                                class="h-[32px] px-4 rounded-md border border-[#1f5ea8] text-[#1f5ea8] text-[12px] font-extrabold bg_active">
                                Новостройка
                            </button>
                            <button type="button" data-toggle-section="вторичка"
                                class="h-[32px] px-4 rounded-md border border-[#1f5ea8] text-[#1f5ea8] text-[12px] font-extrabold">
                                Вторичка
                            </button>
                        </div>

                        <!-- НОВОСТРОЙКА -->
                        <div data-section="новостройка">
                            <form class="flex flex-col gap-2 mt-4 rounded-xl bg-[#f5f6fb] border border-[#e6e7ee] p-5"
                                action="/send/email" method="POST">
                                <!-- 1. Тип ремонта -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-2">1. Какой ремонт
                                        планируете?<span class="ml-1 text-red-400">*</span></div>
                                    <div class="flex flex-wrap gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Косметический" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Косметический</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Капитальный" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Капитальный</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Дизайнерский" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Дизайнерский</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 2. Площадь -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-2">2. Какая площадь
                                        квартиры?<span class="ml-1 text-red-400">*</span></div>
                                    <div class="bg-white border border-[#e6e7ee] rounded-md p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-[12px] text-gray-600">от <span class="font-bold">20</span>
                                                до <span class="font-bold">300</span> м²</span>
                                            <span class="text-[16px] font-extrabold text-[#1f5ea8]"><span
                                                    id="value_range_2">60</span> м²</span>
                                        </div>
                                        <input required id="RangeSize2" name="Какая площадь квартиры?" type="range"
                                            min="20" max="300" value="60" aria-label="Площадь квартиры"
                                            class="w-full accent-orange-500 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                    </div>
                                </div>
                                <hr>
                                <!-- 3. Состояние квартиры -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">3. В каком состоянии
                                        квартира?<span class="ml-1 text-red-400">*</span></div>
                                    <select required name="В каком состоянии квартира?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Состояние квартиры (новостройка)">
                                        <option value="">Выберите</option>
                                        <option value="Сдана без отделки">Сдана без отделки</option>
                                        <option value="Сдана с черновой отделкой">Сдана с черновой отделкой</option>
                                        <option value="Сдана с предчистовой отделкой (White box)">Сдана с предчистовой
                                            отделкой (White box)</option>
                                        <option value="Незнаю (сложно сказать)">Незнаю (сложно сказать)</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 4. Наполненное покрытие -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">4. Выберите наполненное
                                        покрытие
                                    </div>
                                    <select name="Выберите наполненное покрытие"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Напольное покрытие">
                                        <option value="">Выберите</option>
                                        <option value="Ламинат">Ламинат</option>
                                        <option value="Паркетная доска">Паркет</option>
                                        <option value="Кварцвинил">Кварцвинил</option>
                                        <option value="Керамогранит">Керамогранит</option>
                                        <option value="Массивная доска">Массивная доска</option>
                                        <option value="Инженерная доска">Инженерная доска</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 5. Покрытие потолка -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">5. Какой нуже потолок?
                                    </div>
                                    <select name="Какой нуже потолок?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Тип потолка (новостройка)">
                                        <option value="">Выберите</option>
                                        <option value="Покраска">Покраска</option>
                                        <option value="Натяжной">Натяжной</option>
                                        <option value="Многоуровневый">Многоуровневый</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 6. Инженерные сети -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-1">6. Какие инженерные
                                        сети сделать?</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?"
                                                value="Электрика" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Электрика</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?2"
                                                value="Сантехника" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Сантехника</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?3"
                                                value="Теплый пол" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Теплый пол</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?4"
                                                value="Вентиляция" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Вентиляция</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 7. Дополнительные работы -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-1">7. Выберите
                                        дополнительные работы</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы"
                                                value="Разработка дизайн-проекта" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Разработка дизайн-проекта</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы2"
                                                value="Производство кухонного гарнтира"
                                                class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Производство кухонного гарнтира</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы3"
                                                value="Согласование перепланировки" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Согласование перепланировки</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 8. Доставка материалов под ключ -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-1">8. Купить и доставить
                                        материалы под ключ?</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="radio" name="Купить и доставить материалы под ключ?" value="Да"
                                                class="accent-orange-500">
                                            <span class="text-[12px]">Да</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="radio" name="Купить и доставить материалы под ключ?"
                                                value="Нет" class="accent-orange-500">
                                            <span class="text-[12px]">Нет</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 9. Когда ремонт -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">9. Когда начать ремонт?<span
                                            class="ml-1 text-red-400">*</span></div>
                                    <select required name="Когда начать ремонт?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Когда начать ремонт (новостройка)">
                                        <option value="">Выберите</option>
                                        <option value="В течение месяца">В течение месяца</option>
                                        <option value="Через 2-3 месяца">Через 2-3 месяца</option>
                                        <option value="Через 4 и более месяца">Через 4 и более месяца</option>
                                        <option value="Не знаю">Не знаю</option>
                                    </select>
                                </div>
                                <!-- Контакты (общие) -->
                                <div class="mt-4 pt-4 border-t border-[#e6e7ee]">
                                    <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                        <div class="text-[13px] font-extrabold text-[#2a2e3b]">Ваши контакты <span
                                                class="ml-1 text-red-400">*</span></div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                            <input name="имя" type="text" placeholder="Ваше имя" required aria-label="Ваше имя"
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                            <input name="телефон" data-type-phone type="tel"
                                                pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                                placeholder=" (___) ___-__-__" required aria-label="Телефон"
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                            <input name="телефон" data-type-phone type="tel"
                                                pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                                placeholder=" (___) ___-__-__" required
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Кнопка -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 pt-2">
                                    <div></div>
                                    <button
                                        class="w-full h-[48px] rounded-md bg-[#ff7a21] text-white text-[14px] font-extrabold shadow-[0_4px_0_rgba(0,0,0,0.12)] hover:bg-[#e86a15] transition">
                                        Заказать расчет
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- ВТОРИЧКА -->
                        <div data-section="вторичка" class="hidden">
                            <form class=" flex flex-col gap-2 mt-4 rounded-xl bg-[#f5f6fb] border border-[#e6e7ee] p-5"
                                action="/send/email" method="POST">
                                <!-- 1. Тип ремонта -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-2">1. Какой тип ремонта
                                        планируете?<span class="ml-1 text-red-400">*</span></div>
                                    <div class="flex flex-wrap gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Косметический" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Косметический</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Капитальный" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Капитальный</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer hover:border-orange-400 transition">
                                            <input required type="radio" name="Какой ремонт планируете?"
                                                value="Дизайнерский" class="accent-orange-500">
                                            <span class="text-[12px] font-semibold text-gray-800">Дизайнерский</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 2. Площадь -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-2">2. Какая площадь
                                        квартиры?<span class="ml-1 text-red-400">*</span></div>
                                    <div class="bg-white border border-[#e6e7ee] rounded-md p-3">
                                        <div class="flex items-center justify-between mb-2">
                                            <span class="text-[12px] text-gray-600">от <span class="font-bold">20</span>
                                                до <span class="font-bold">300</span> м²</span>
                                            <span class="text-[16px] font-extrabold text-[#1f5ea8]"><span
                                                    id="value_range_2">60</span> м²</span>
                                        </div>
                                        <input required id="RangeSize2" name="Какая площадь квартиры?" type="range"
                                            min="20" max="300" value="60" aria-label="Площадь квартиры (вторичка)"
                                            class="w-full accent-orange-500 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                    </div>
                                </div>
                                <hr>
                                <!-- 3. Состояние квартиры -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">3. В каком состоянии
                                        квартира?<span class="ml-1 text-red-400">*</span></div>
                                    <select required name="В каком состоянии квартира?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Состояние квартиры (вторичка)">
                                        <option value="">Выберите</option>
                                        <option value="Жилое состояние">Жилое состояние</option>
                                        <option value="Плохое состояние">Плохое состояние</option>
                                        <option value="Очень плохое состояние">Очень плохое состояние</option>
                                        <option value="Незнаю (сложно сказать)">Незнаю (сложно сказать)</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 4. Наполненное покрытие -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">4. Какой тип вашего дома?
                                    </div>
                                    <select name="Какой тип вашего дома?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Тип дома">
                                        <option value="">Выберите</option>
                                        <option value="Панельный">Панельный</option>
                                        <option value="Кирпичный">Кирпичный</option>
                                        <option value="Монолитный">Монолитный</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 5. Наполненое покрытие -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">5. Выберите Наполненое
                                        покрытие
                                    </div>
                                    <select name="Наполненное покрытие"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Напольное покрытие (вторичка)">
                                        <option value="">Выберите</option>
                                        <option value="Ламинат">Ламинат</option>
                                        <option value="Паркет">Паркет</option>
                                        <option value="Керамогранит">Керамогранит</option>
                                        <option value="Инженерная доска">Инженерная доска</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 6. Покрытие потолка -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">6. Какой нуже потолок?
                                    </div>
                                    <select name="Какой нуже потолок?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Тип потолка (вторичка)">
                                        <option value="">Выберите</option>
                                        <option value="Покраска">Покраска</option>
                                        <option value="Натяжной">Натяжной</option>
                                        <option value="Многоуровневый">Многоуровневый</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                                <hr>
                                <!-- 7. Инженерные сети -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-1">7. Включитьв расчет
                                        следующие работы?</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?"
                                                value="Замена окон" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Замена окон</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?2"
                                                value="Замена дверей" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Замена дверей</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Какие инженерные сети сделать?3"
                                                value="Замена радиаторов отопления" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Замена радиаторов отопления</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 8. Дополнительные работы -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-start">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] md:pt-1">8. Выберите
                                        дополнительные работы</div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы"
                                                value="Разработка дизайн-проекта" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Разработка дизайн-проекта</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы2"
                                                value="Производство кухонного гарнтира"
                                                class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Производство кухонного гарнтира</span>
                                        </label>
                                        <label
                                            class="flex items-center gap-2 bg-white border border-[#e6e7ee] rounded-md p-2 cursor-pointer">
                                            <input type="checkbox" name="Дополнительные работы3"
                                                value="Согласование перепланировки" class="accent-orange-500 w-4 h-4">
                                            <span class="text-[12px]">Согласование перепланировки</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!-- 9. Когда ремонт -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                    <div class="text-[13px] font-extrabold text-[#2a2e3b]">9. Когда начать ремонт?<span
                                            class="ml-1 text-red-400">*</span></div>
                                    <select required name="Когда начать ремонт?"
                                        class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500"
                                        aria-label="Когда начать ремонт (новостройка)">
                                        <option value="">Выберите</option>
                                        <option value="В течение месяца">В течение месяца</option>
                                        <option value="Через 2-3 месяца">Через 2-3 месяца</option>
                                        <option value="Через 4 и более месяца">Через 4 и более месяца</option>
                                        <option value="Не знаю">Не знаю</option>
                                    </select>
                                </div>
                                <!-- Контакты (общие) -->
                                <div class="mt-4 pt-4 border-t border-[#e6e7ee]">
                                    <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 items-center">
                                        <div class="text-[13px] font-extrabold text-[#2a2e3b]">Ваши контакты <span
                                                class="ml-1 text-red-400">*</span></div>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                            <input name="имя" type="text" placeholder="Ваше имя" required aria-label="Ваше имя"
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                            <input name="телефон" data-type-phone type="tel"
                                                pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                                placeholder=" (___) ___-__-__" required aria-label="Телефон"
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                            <input name="телефон" data-type-phone type="tel"
                                                pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                                placeholder=" (___) ___-__-__" required aria-label="Телефон"
                                                class="w-full px-3 py-2.5 rounded-md border border-[#e6e7ee] bg-white text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Кнопка -->
                                <div class="grid grid-cols-1 md:grid-cols-[280px_1fr] gap-2 md:gap-4 pt-2">
                                    <div></div>
                                    <button
                                        class="w-full h-[48px] rounded-md bg-[#ff7a21] text-white text-[14px] font-extrabold shadow-[0_4px_0_rgba(0,0,0,0.12)] hover:bg-[#e86a15] transition">
                                        Заказать расчет
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div
                    class="mt-6 text-center flex flex-col justify-center items-center bg-[#1f5ea8] px-6 py-6 text-white">
                    <h2 class="text-3xl font-extrabold">Получить точную смету по вашему объекту</h2>
                        <form method="POST" action="/send/email"
                            class="mt-3 flex flex-col sm:flex-row gap-3 sm:items-center text-black">
                            <input name="телефон" data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+"
                                maxlength="15" placeholder=" (___) ___-__-__" required aria-label="Телефон"
                                class="w-full text-black px-3 py-2.5 rounded-md border border-[#e6e7ee] text-[13px] focus:outline-none focus:ring-2 focus:ring-orange-500" />
                            <button
                                class="py-3 px-6 rounded-md bg-[#ff7a21] text-white text-[13px] font-extrabold shadow-[0_4px_0_rgba(0,0,0,0.12)] whitespace-nowrap">Получить
                                смету</button>
                        </form>
                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-2 text-lg text-white/90">
                            <div class="flex justify-center items-center gap-2"><i
                                    class="fa-solid fa-check"></i><span>Бесплатный выезд
                                    инженера</span></div>
                            <div class="flex justify-center items-center gap-2"><i
                                    class="fa-solid fa-check"></i><span>Точная смета за
                                    1 день</span></div>
                            <div class="flex justify-center items-center gap-2"><i
                                    class="fa-solid fa-check"></i><span>Ответим за 5–10
                                    минут</span></div>
                        </div>
                </div>


                <div
                    class="mt-6 bg-white rounded-2xl border border-[#e6e7ee] shadow-[0_10px_30px_rgba(0,0,0,0.08)] overflow-hidden">

                    <div class="px-6 py-6">
                        <!-- <div class="text-[18px] font-extrabold text-[#2a2e3b]">Получить точную смету <span
                                class="text-[#ff7a21]">вашему</span></div> -->
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="rounded-xl bg-[#f5f6fb] border border-[#e6e7ee] p-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white border border-[#e6e7ee] flex items-center justify-center text-[#1f5ea8]">
                                    <i class="fa-solid fa-ruler-combined"></i>
                                </div>
                                <div class="mt-3 font-extrabold text-[#2a2e3b] text-[13px]">Замерщик бесплатно</div>
                                <div class="mt-1 text-[12px] text-[#7a7f8c]">Приедет и сделает точный замер помещения
                                </div>
                            </div>
                            <div class="rounded-xl bg-[#f5f6fb] border border-[#e6e7ee] p-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white border border-[#e6e7ee] flex items-center justify-center text-[#1f5ea8]">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>
                                <div class="mt-3 font-extrabold text-[#2a2e3b] text-[13px]">Точная смета</div>
                                <div class="mt-1 text-[12px] text-[#7a7f8c]">Подробный расчёт с перечнем работ и
                                    материалов</div>
                            </div>
                            <div class="rounded-xl bg-[#f5f6fb] border border-[#e6e7ee] p-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white border border-[#e6e7ee] flex items-center justify-center text-[#1f5ea8]">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="mt-3 font-extrabold text-[#2a2e3b] text-[13px]">Ответим за 5–10 минут</div>
                                <div class="mt-1 text-[12px] text-[#7a7f8c]">Консультация и помощь с подбором решения
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('value_range').textContent = '60';
            document.getElementById('RangeSize').addEventListener('input', (event) => {
                document.getElementById('value_range').textContent = event.target.value;
            });

            document.getElementById('value_range_2').textContent = '60';
            document.getElementById('RangeSize2').addEventListener('input', (event) => {
                document.getElementById('value_range_2').textContent = event.target.value;
            });
        });
    </script>
    <script src="/public/assets/scripts/components/toggleWindow.js"></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>

</body>
