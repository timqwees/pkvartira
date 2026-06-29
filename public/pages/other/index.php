<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>Современный интерьер в ЖК «Пример Парк» | Портфолио работ</title>
    <meta name="description"
        content="Пример выполненного ремонта квартиры в ЖК Пример Парк. Современный интерьер, фото до и после, список работ и использованные материалы.">
    <meta name="keywords"
        content="ремонт квартир, портфолио, ЖК Пример Парк, современный интерьер, ремонт под ключ, Москва">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/other'); ?>">

    <!-- Open Graph (для соцсетей) -->
    <meta property="og:title" content="Современный интерьер в ЖК «Пример Парк» | Портфолио">
    <meta property="og:description"
        content="Пример выполненного ремонта квартиры в ЖК Пример Парк. Современный интерьер, фото до и после, список работ и использованные материалы.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/other'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Современный интерьер в ЖК «Пример Парк» | Портфолио">
    <meta name="twitter:description"
        content="Пример выполненного ремонта квартиры в ЖК Пример Парк. Современный интерьер, фото до и после, список работ и использованные материалы.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
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
                "@id": <?= json_encode($site['baseUrl'] . '/other/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/other', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Современный интерьер в ЖК «Пример Парк» — <?= htmlspecialchars($site['name']); ?>",
                "description": "Пример выполненного ремонта квартиры в ЖК Пример Парк. Современный интерьер, фото до и после, список работ и использованные материалы.",
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "CreativeWork",
                "@id": <?= json_encode($site['baseUrl'] . '/other/#project', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Современный интерьер в ЖК «Пример Парк»",
                "description": "Ремонт 3-комнатной квартиры площадью 85 м² в ЖК Пример Парк. Современный интерьер для семьи с двумя детьми.",
                "creator": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "image": [
                    <?= json_encode($site['baseUrl'] . '/public/assets/images/pages/main/recent-works/3room/after.jpg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                ],
                "dateCreated": "2024",
                "keywords": "ремонт квартир, ЖК Пример Парк, современный интерьер, ремонт под ключ"
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['baseUrl'] . '/other/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "Портфолио",
                        "item": <?= json_encode($site['baseUrl'] . '/other', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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

        <!-- Hero Section with Gallery -->
        <section class="bg-white reveal">
            <div class="container mx-auto px-4 max-w-6xl py-12">
                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-8">Современный интерьер в ЖК «Пример Парк»
                </h1>

                <!-- Image Gallery -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-12">
                    <div class="relative overflow-hidden rounded-xl">
                        <img src="https://placehold.co/800x600/6366f1/ffffff?text=Интерьер+гостиной"
                            alt="Интерьер гостиной" class="w-full h-full object-cover rounded-xl">
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://placehold.co/800x200/10b981/ffffff?text=Интерьер+кухни"
                                alt="Интерьер кухни" class="w-full h-40 object-cover rounded-xl">
                        </div>
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://placehold.co/800x200/f59e0b/ffffff?text=Интерьер+спальни"
                                alt="Интерьер спальни" class="w-full h-40 object-cover rounded-xl">
                        </div>
                        <div class="relative overflow-hidden rounded-xl">
                            <img src="https://placehold.co/800x200/8b5cf6/ffffff?text=Интерьер+ванной"
                                alt="Интерьер ванной" class="w-full h-40 object-cover rounded-xl">
                        </div>
                    </div>
                </div>

                <!-- Key Parameters -->
                <div class="bg-gray-100 rounded-xl p-6 mb-12">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/4">
                            <h2 class="text-xl font-bold text-gray-800 bg-gray-200 px-3 py-1.5 rounded-lg">Основные
                                параметры
                            </h2>
                        </div>
                        <div class="md:w-3/4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Площадь</p>
                                    <p class="font-semibold text-gray-800">72 м²</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Тип квартиры</p>
                                    <p class="font-semibold text-gray-800">Двухкомнатная</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">ЖК</p>
                                    <p class="font-semibold text-gray-800">Пример Парк</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 mb-1">Срок</p>
                                    <p class="font-semibold text-gray-800">4 месяца</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm text-gray-500 mb-1">Стоимость</p>
                                    <p class="font-semibold text-gray-800">2,5 – 3 млн ₽</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Task -->
                <div class="mb-12">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/4">
                            <h2 class="text-xl font-bold text-gray-800 bg-gray-200 px-3 py-1.5 rounded-lg">Задача
                                клиента</h2>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-600 leading-relaxed">
                                Создать стильный и функциональный интерьер для комфортного проживания молодой пары.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- What We Did -->
                <div class="mb-12">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/4">
                            <h2 class="text-xl font-bold text-gray-800 bg-gray-200 px-3 py-1.5 rounded-lg">Что мы
                                сделали</h2>
                        </div>
                        <div class="md:w-3/4">
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                <li>Разработали дизайн-проект</li>
                                <li>Выполнили демонтаж и отделочные работы</li>
                                <li>Обустроили кухню-гостиную, спальню и ванную</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- List of Works -->
                <div class="mb-12">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="md:w-1/4">
                            <h2 class="text-xl font-bold text-gray-800 bg-gray-200 px-3 py-1.5 rounded-lg">Список работ
                            </h2>
                        </div>
                        <div class="md:w-3/4">
                            <ul class="list-disc list-inside space-y-2 text-gray-600">
                                <li>Демонтаж перегородок</li>
                                <li>Прокладка электрики</li>
                                <li>Выравнивание стен и пола</li>
                                <li>Установка дверей и освещения</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Materials and Solutions -->
                <div class="mb-12">
                    <div class="flex flex-row md:flex-col gap-6">
                        <div class="w-fill flex items-center justify-center">
                            <h2 class="text-xl font-bold text-gray-800 bg-gray-200 px-3 py-1.5 rounded-lg">Материалы и
                                решения
                            </h2>
                            <div class="h-[0.5px] bg-gray-400 flex-1 ml-4"></div>
                        </div>
                        <div class="flex justify-stretch items-stretch gap-4">
                            <!-- Left: Materials -->
                            <div>
                                <div class="flex gap-4 mb-4">
                                    <div class="flex-1 text-center">
                                        <div
                                            class="border relative overflow-hidden rounded-lg mb-2 aspect-square bg-amber-100">
                                            <img src="https://placehold.co/100x100/d4a574/ffffff?text=Ламинат"
                                                alt="Ламинат" class="w-full h-full object-cover">
                                        </div>
                                        <p class="text-xs font-medium text-gray-800">Ламинат</p>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <div
                                            class="border relative overflow-hidden rounded-lg mb-2 aspect-square bg-gray-300">
                                            <img src="https://placehold.co/100x100/9ca3af/ffffff?text=Керамогранит"
                                                alt="Керамогранит" class="w-full h-full object-cover">
                                        </div>
                                        <p class="text-xs font-medium text-gray-800">Керамогранит</p>
                                    </div>
                                    <div class="flex-1 text-center">
                                        <div
                                            class="border relative overflow-hidden rounded-lg mb-2 aspect-square bg-gray-100">
                                            <img src="https://placehold.co/100x100/f3f4f6/333333?text=Натяжные"
                                                alt="Натяжные потолки" class="w-full h-full object-cover">
                                        </div>
                                        <p class="text-xs font-medium text-gray-800">Натяжные потолки</p>
                                    </div>
                                </div>
                                <!-- Buttons/Badges -->
                                <div class="flex w-full gap-2">
                                    <span
                                        class="w-full flex border items-center justify-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-md">Декоративные
                                        панели</span>
                                    <span
                                        class="w-full border text-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-md">Декоративные
                                        панели</span>
                                </div>
                            </div>
                            <!-- Right: Bedroom Images -->
                            <div class="flex flex-row h-full gap-3">
                                <div class="relative overflow-hidden rounded-lg w-full">
                                    <img src="https://placehold.co/300x200/e5e7eb/666666?text=Спальня+1" alt="Спальня 1"
                                        class="w-full h-48 object-cover rounded-lg">
                                </div>
                                <div class="relative overflow-hidden rounded-lg w-full">
                                    <img src="https://placehold.co/300x200/d1d5db/666666?text=Спальня+2" alt="Спальня 2"
                                        class="w-full h-48 object-cover rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="text-center py-12">
                    <p class="text-gray-600 mb-6">Современный и уютный интерьер, полностью готовый к проживанию.</p>
                    <a href="/contact"
                        class="bg-orange-500 text-white px-8 py-4 rounded-lg font-medium hover:bg-orange-600 transition inline-flex items-center justify-center gap-2 text-lg">
                        Хочу похожий ремонт
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>
        </section>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.js" defer></script>
</body>

</html>
