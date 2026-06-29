<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>О компании
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ
    </title>
    <meta name="description"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — профессиональный ремонт квартир и домов под ключ. Опыт работы более 10 лет, гарантия качества, прозрачные цены.">
    <meta name="keywords"
        content="о компании, ремонт квартир, <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>, ремонт под ключ, строительная компания">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/about'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="О компании <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ">
    <meta property="og:description"
        content="Профессиональный ремонт квартир и домов под ключ. Опыт работы более 10 лет, гарантия качества.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/about'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="О компании <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — ремонт квартир под ключ">
    <meta name="twitter:description"
        content="Профессиональный ремонт квартир и домов под ключ. Опыт работы более 10 лет, гарантия качества.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
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
                "@type": "AboutPage",
                "@id": <?= json_encode($site['baseUrl'] . '/about/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/about', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "О компании <?= htmlspecialchars($site['name']); ?> — ремонт квартир под ключ",
                "description": "<?= htmlspecialchars($site['name']); ?> — профессиональный ремонт квартир и домов под ключ. Опыт работы более 10 лет, гарантия качества, прозрачные цены.",
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
                "@id": <?= json_encode($site['baseUrl'] . '/about/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "О компании",
                        "item": <?= json_encode($site['baseUrl'] . '/about', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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
    <main class="pt-20">

        <!-- Section 1: Кто мы -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 max-w-6xl">
                <!-- Section Header -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-600 p-2.5 rounded-full w-10 h-10 flex items-center justify-center text-white">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800">О компании ПКвартира</h1>
                    <div class="h-[0.5px] bg-gray-400 flex-1 ml-4"></div>
                </div>

                <div class="flex flex-col gap-4 md:gap-8">

                    <!-- Block 1 -->
                    <div class="flex flex-col md:flex-row gap-8 items-stretch justify-stretch">
                        <!-- Left: Image -->
                        <div class="relative flex-1">
                            <img src="/public/assets/images/about/team.jpg" alt="Наша команда"
                                class="rounded-lg object-cover w-full h-full">
                        </div>

                        <!-- Right: Service Options -->
                        <div class="w-full flex-1 bg-[#F8F8FB] p-6 rounded-lg flex flex-col gap-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-wallet text-blue-600"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-800">Ремонт квартир</h2>
                                    <p class="text-sm text-gray-500">Косметический, капитальный и дизайнерский ремонт
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-th-large text-blue-600"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-800">Проектирование</h2>
                                    <p class="text-sm text-gray-500">Разработка дизайн-проектов любой сложности</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-layer-group text-blue-600"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-800">Подбор материалов</h2>
                                    <p class="text-sm text-gray-500">Помощь в выборе материалов с выгодными ценами</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-chart-line text-blue-600"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-800">Управление проектом</h2>
                                    <p class="text-sm text-gray-500">Полный контроль сроков и качества работ</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check-circle text-blue-600"></i>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-gray-800">Гарантия 3 года</h2>
                                    <p class="text-sm text-gray-500">Официальная гарантия на все виды работ</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Block 2 -->
                    <div class="flex flex-col md:flex-row items-start">
                        <!-- Left: Benefits -->
                        <div class="w-full">
                            <div class="w-fit grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-1">
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Опыт <strong>5 лет</strong> профессиональной
                                        работы</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Собственный склад материалов с выгодными
                                        ценами</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Более <strong>40+</strong> специалистов в
                                        штате</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Страхование объекта на время ремонта</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Фиксированные цены</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="check-icon-small">
                                        <i class="fas fa-check-circle text-orange-600"></i>
                                    </div>
                                    <span class="text-sm text-gray-700">Без скрытых платежей</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Button -->
                        <div class="w-full md:w-1/3 flex justify-start mt-4 md:mt-auto md:justify-end">
                            <a href="tel:<?= $site['phone']; ?>"
                                class="bg-orange-500 text-white px-6 py-3 rounded-lg font-medium hover:bg-orange-600 transition inline-flex items-center justify-center gap-2">
                                Получить консультацию
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Section 2: Наша команда -->
        <section id="team-section" class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 max-w-6xl">
                <!-- Section Header -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-600 p-2.5 rounded-full w-10 h-10 flex items-center justify-center text-white">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Наша команда</h2>
                    <div class="h-[0.5px] bg-gray-400 flex-1 ml-4"></div>
                </div>

                <!-- Team Grid -->
                <div class="swiper swiper-type-5">
                    <div class="swiper-wrapper">
                        <!-- Team Member 1 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/1.jpg" alt="Владимир Соболев"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Владимир Соболев</h3>
                            <p class="text-xs text-gray-500">Руководитель сметно-договорного отдела</p>
                        </div>

                        <!-- Team Member 3 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/2.jpg" alt="Семён Серебренников"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Семён Серебренников</h3>
                            <p class="text-xs text-gray-500">Главный инженер</p>
                        </div>

                        <!-- Team Member 4 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/3.jpg" alt="Илья Архипов"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Илья Архипов</h3>
                            <p class="text-xs text-gray-500">Ведущий инженер-сметчик</p>
                        </div>

                        <!-- Team Member 5 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/4.jpg" alt="Роман Сайферт"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Роман Сайферт</h3>
                            <p class="text-xs text-gray-500">Руководитель отдела продаж</p>
                        </div>

                        <!-- Team Member 5 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/5.jpg" alt="Николай Сучков"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Николай Сучков</h3>
                            <p class="text-xs text-gray-500">Менеджер по сопровождению проектов</p>
                        </div>

                        <!-- Team Member 5 -->
                        <div class="swiper-slide cursor-pointer text-center group">
                            <div class="relative overflow-hidden rounded-xl mb-4">
                                <img src="/public/assets/images/about/team/6.jpg" alt="Иван Филиппов"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <h3 class="font-semibold text-gray-800 text-sm">Иван Филиппов</h3>
                            <p class="text-xs text-gray-500">Руководитель студии дизайна</p>
                        </div>

                    </div>
                </div>

                <!-- View All Link -->
                <div class="text-center mt-8">
                    <a href="#team-section" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                        Посмотреть всех специалистов
                        <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section 3: Как мы контролируем качество -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 max-w-6xl">
                <!-- Section Header -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-600 p-2.5 rounded-full w-10 h-10 flex items-center justify-center text-white">
                        <i class="fas fa-atom"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Наш шоурум</h2>
                    <div class="h-[0.5px] bg-gray-400 flex-1 ml-4"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Showroom Card 1 -->
                    <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/public/assets/images/pages/about/quality-control/img.jpg"
                                alt="Шоурум и офис ПКвартира" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-info text-white text-sm"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800">Шоурум и офис</h3>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Приезжайте к нам в шоурум.
                            </p>
                        </div>
                    </div>

                    <!-- Showroom Card 2 -->
                    <!-- <div class="bg-gray-50 rounded-xl overflow-hidden">
                        <div class="relative h-64 overflow-hidden">
                            <img src="/public/assets/images/pages/about/quality-control/img.jpg"
                                alt="Шоурум" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <h3 class="font-semibold text-gray-800">Шоурум и офис</h3>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Познакомьтесь с ним с продуманным тактовымнапам, по стоянием, инжинирингом и погр -
                                качественные пьедие. Первичные риски работу на странице площадь темпарез 3.
                            </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <!-- Section 4: Документы и гарантии -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 max-w-6xl">
                <!-- Section Header -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-600 p-2.5 rounded-full w-10 h-10 flex items-center justify-center text-white">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Документы и гарантии</h2>
                    <div class="h-[0.5px] bg-gray-400 flex-1 ml-4"></div>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 items-start">
                    <!-- Documents List -->
                    <div class="lg:w-1/2 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <div class="check-icon">
                                    <i class="fas fa-check-circle text-orange-600"></i>
                                </div>
                                <span class="text-sm text-gray-700">Честный текст договора</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="check-icon">
                                    <i class="fas fa-check-circle text-orange-600"></i>
                                </div>
                                <span class="text-sm text-gray-700">Договор и смета</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="check-icon">
                                    <i class="fas fa-check-circle text-orange-600"></i>
                                </div>
                                <span class="text-sm text-gray-700">Заявление об учете и актах</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="check-icon">
                                    <i class="fas fa-check-circle text-orange-600"></i>
                                </div>
                                <span class="text-sm text-gray-700">ИНН / ОГРН</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="check-icon">
                                    <i class="fas fa-check-circle text-orange-600"></i>
                                </div>
                                <span class="text-sm text-gray-700">Гарантийные обязательства</span>
                            </div>
                        </div>

                        <button
                            class="mt-6 bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded-full text-sm font-medium hover:bg-gray-50 transition inline-flex items-center gap-2">
                            Приложить к договору
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>

                    <!-- Documents Images -->
                    <div class="flex justify-center items-center">
                        <img src="/public/assets/images/pages/about/contract.jpg" alt="Документы и договор"
                            class="w-full max-w-md rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
            </div>
        </section>

        <!-- <section class="py-10 bg-white border-t border-gray-200">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="swiper swiper-type-6">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/mail.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/rus24.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/2gis.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="2gis">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/mail.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/rus24.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/2gis.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="2gis">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/mail.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/rus24.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="russia 24">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img src="/public/assets/images/partners/2gis.svg" class="h-16 md:h-20 lg:h-24 object-contain" alt="2gis">
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
</body>

</html>
