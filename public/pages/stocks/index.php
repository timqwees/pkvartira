<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Акции и скидки на ремонт — выгодные предложения |
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>
    </title>
    <meta name="description"
        content="Акции и скидки на ремонт квартир. Бесплатный дизайн-проект, сезонные скидки, специальные предложения на комплексный ремонт.">
    <meta name="keywords" content="акции ремонт, скидки ремонт, выгодные предложения, ремонт под ключ акция">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/stocks'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Акции и скидки на ремонт — выгодные предложения | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Акции и скидки на ремонт квартир. Бесплатный дизайн-проект, сезонные скидки, специальные предложения.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/stocks'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Акции и скидки на ремонт — выгодные предложения | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Акции и скидки на ремонт квартир. Бесплатный дизайн-проект, сезонные скидки.">
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
                "@type": "WebPage",
                "@id": <?= json_encode($site['baseUrl'] . '/stocks/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/stocks', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Акции и скидки — <?= htmlspecialchars($site['name']); ?>",
                "description": "Акции и скидки на ремонт квартир и домов под ключ от <?= htmlspecialchars($site['name']); ?>. Выгодные предложения, бесплатный дизайн-проект, сезонные скидки.",
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "Offer",
                "@id": <?= json_encode($site['baseUrl'] . '/stocks/#offer1', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Скидка 10% до конца мая",
                "description": "Прозрачность на всех этапах работ, Бесплатный выезд и смета, приятная скидка",
                "provider": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "priceSpecification": {
                    "@type": "PriceSpecification",
                    "priceCurrency": "RUB",
                    "discount": "10"
                },
                "availability": "https://schema.org/InStock",
                "validFrom": <?= json_encode(date('Y-m-d'), JSON_UNESCAPED_UNICODE); ?>,
                "validThrough": <?= json_encode(date('Y-m-d', strtotime('+3 months')), JSON_UNESCAPED_UNICODE); ?>
            },
            {
                "@type": "Offer",
                "@id": <?= json_encode($site['baseUrl'] . '/stocks/#offer2', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Бесплатный дизайн-проект",
                "description": "Проект учитывает все нюансы ремонта при заказе от 1 000 000 ₽",
                "provider": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "priceSpecification": {
                    "@type": "PriceSpecification",
                    "priceCurrency": "RUB",
                    "price": "0",
                    "eligibleQuantity": {
                        "@type": "QuantitativeValue",
                        "minValue": "1000000"
                    }
                },
                "availability": "https://schema.org/InStock",
                "validFrom": <?= json_encode(date('Y-m-d'), JSON_UNESCAPED_UNICODE); ?>,
                "validThrough": <?= json_encode(date('Y-m-d', strtotime('+3 months')), JSON_UNESCAPED_UNICODE); ?>
            },
            {
                "@type": "Offer",
                "@id": <?= json_encode($site['baseUrl'] . '/stocks/#offer3', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Бесплатный выезд замерщика",
                "description": "Бесплатный выезд замерщика предоставляется для всех договоров",
                "provider": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "priceSpecification": {
                    "@type": "PriceSpecification",
                    "priceCurrency": "RUB",
                    "price": "0"
                },
                "availability": "https://schema.org/InStock",
                "validFrom": <?= json_encode(date('Y-m-d'), JSON_UNESCAPED_UNICODE); ?>,
                "validThrough": <?= json_encode(date('Y-m-d', strtotime('+3 months')), JSON_UNESCAPED_UNICODE); ?>
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['baseUrl'] . '/stocks/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "Акции",
                        "item": <?= json_encode($site['baseUrl'] . '/stocks', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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
    <main class="pt-20 flex flex-col gap-6">
        <!-- Hero Section -->
        <section class="py-16 bg-gradient-to-r from-blue-50">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                    Акции и специальные предложения
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Выгодные условия на ремонт квартир и домов под ключ в Москве.
                    Воспользуйтесь нашими специальными предложениями и сэкономьте до 20%!
                </p>
            </div>
        </section>

        <!-- Stock Cards Section -->
        <section class="py-10">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap gap-6">

                    <!-- Stock Card 1: Скидка 10% -->
                    <div
                        class="w-full relative bg-[url('https://kuhni-kristall.ru/images/orderKitchenEasy_bg.png')] bg-center bg-content bg-no-repeat rounded-xl overflow-hidden border border-blue-200">
                        <!-- background layer -->
                        <div
                            class="absolute z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-gradient-to-r from-[#D2E0F99D] via-transparent to-transparent">
                        </div>

                        <div class="relative z-10 p-6">
                            <!-- Tag Stock -->
                            <div
                                class="absolute inline-block top-0 right-0 px-4 py-2 bg-blue-600 text-white rounded-bl-lg flex items-center justify-center text-xl font-sans tracking-[4px]">
                                Акция</div>

                            <!-- Акция label -->
                            <div
                                class="bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-md inline-block mb-3">
                                Спец предложение</div>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Скидка 10% до конца мая</h3>

                            <!-- Benefits -->
                            <ul class="text-gray-600 space-y-2 mb-6 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-500 mr-2"></i>Прозрачность на всех этапах
                                    работ</li>
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-500 mr-2"></i>Бесплатный выезд замерщика
                                </li>
                            </ul>

                            <!-- Discount badge -->
                            <div
                                class="bottom-4 lg:bottom-10 left-4 lg:right-4 lg:left-auto lg:text-2xl lg:w-20 lg:h-20 w-14 h-14 text-md absolute bg-orange-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                                -10%</div>

                            <!-- Button -->
                            <div class="flex justify-end items-end">
                                <button onclick="window.location.href='/order'"
                                    class="w-fit lg:w-1/3 cursor-pointer bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold">Получить
                                    скидку</button>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Card 2: Бесплатный дизайн-проект -->
                    <div
                        class="w-full relative bg-[url('https://kuhni-kristall.ru/images/orderKitchenEasy_bg.png')] bg-center bg-content bg-no-repeat rounded-xl overflow-hidden border border-blue-200">
                        <!-- background layer -->
                        <div
                            class="absolute z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-gradient-to-r from-[#D2E0F99D] via-transparent to-transparent">
                        </div>

                        <div class="relative z-10 p-6">
                            <!-- Tag Stock -->
                            <div
                                class="absolute inline-block top-0 right-0 px-4 py-2 bg-blue-600 text-white rounded-bl-lg flex items-center justify-center text-xl font-sans tracking-[4px]">
                                Акция</div>

                            <!-- Акция label -->
                            <div
                                class="bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-md inline-block mb-3">
                                Спец предложение</div>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Бесплатный дизайн-проект</h3>

                            <!-- Benefits -->
                            <ul class="text-gray-600 space-y-2 mb-6 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-500 mr-2"></i>Проект поможет вам
                                    представить будущий ремонт</li>
                            </ul>

                            <!-- Discount badge -->
                            <div
                                class="bottom-4 lg:bottom-10 left-4 lg:right-4 lg:left-auto lg:text-2xl lg:w-20 lg:h-20 w-14 h-14 text-md absolute bg-green-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                                0 руб</div>

                            <!-- Button -->
                            <div class="flex justify-end items-end">
                                <button onclick="window.location.href='/order'"
                                    class="w-fit lg:w-1/3 cursor-pointer bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold">Получить
                                    проект
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Card 2: Бесплатный дизайн-проект -->
                    <div
                        class="w-full relative bg-[url('https://kuhni-kristall.ru/images/orderKitchenEasy_bg.png')] bg-center bg-content bg-no-repeat rounded-xl overflow-hidden border border-blue-200">
                        <!-- background layer -->
                        <div
                            class="absolute z-0 top-0 left-0 right-0 bottom-0 w-full h-full bg-gradient-to-r from-[#D2E0F99D] via-transparent to-transparent">
                        </div>

                        <div class="relative z-10 p-6">
                            <!-- Tag Stock -->
                            <div
                                class="absolute inline-block top-0 right-0 px-4 py-2 bg-blue-600 text-white rounded-bl-lg flex items-center justify-center text-xl font-sans tracking-[4px]">
                                Акция</div>

                            <!-- Акция label -->
                            <div
                                class="bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded-md inline-block mb-3">
                                Спец предложение</div>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Выезд замерщика бесплатно</h3>

                            <!-- Benefits -->
                            <ul class="text-gray-600 space-y-2 mb-6 text-sm">
                                <li class="flex items-center"><i
                                        class="fas fa-check-circle text-blue-500 mr-2"></i>ПБесплатный выезд замерщика
                                    для точного расчета</li>
                            </ul>

                            <!-- Discount badge -->
                            <div
                                class="bottom-4 lg:bottom-10 left-4 lg:right-4 lg:left-auto lg:text-2xl lg:w-20 lg:h-20 absolute w-14 h-14 text-md bg-green-500 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                                0 руб</div>

                            <!-- Button -->
                            <div class="flex justify-end items-end">
                                <button onclick="window.location.href='/order'"
                                    class="w-fit lg:w-1/3 cursor-pointer bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold">Вызвать
                                    замерщика
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Terms and Conditions Section -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Terms -->
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Условия
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Акционные предложения не суммируются между собой.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Для получения скидки необходимо заключить договор на ремонт
                                    квартиры под ключ.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Бесплатный дизайн-проект предоставляется для договоров от 1
                                    000 000 ₽.</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Limitations -->
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                            Ограничения
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Скидка действует для договоров, заключенных до 31 мая 2024
                                    года включительно.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Бесплатный дизайн-проект предоставляется для договоров от 1
                                    000 000 ₽.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Предложения ограничены и действуют до окончания
                                    акций.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Хотите рассчитать стоимость ремонта в вашей квартире?
                </h2>
                <p class="text-xl mb-8">
                    Получите расчет и бесплатную консультацию без обязательств.
                </p>

                <!-- Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-phone text-3xl mb-3"></i>
                        <span class="font-semibold">Перезвоним через 15 минут</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fas fa-comments text-3xl mb-3"></i>
                        <span class="font-semibold">Обсудим все пожелания</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <i class="fas fa-calculator text-3xl mb-3"></i>
                        <span class="font-semibold">Сориентируем по стоимости</span>
                    </div>
                </div>

                <button
                    class="bg-orange-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-600 transition text-lg">
                    Рассчитать стоимость
                </button>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/faq.js" defer></script>
</body>

</html>
