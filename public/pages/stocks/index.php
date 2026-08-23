<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Акции на ремонт квартир 2026 — скидки до 30%',
    'description' => 'Акции на ремонт квартир в Москве 2026: дизайн-проект в подарок при заказе под ключ, скидки до 30%, бесплатный замер. Закажите ремонт по выгодной цене!',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/stocks',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Акции', 'url' => $site['baseUrl'] . '/stocks'],
    ],
    'schema' => [
        [
            '@type' => 'ItemList',
            'name' => 'Акции на ремонт',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'item' => [
                        '@type' => 'Offer',
                        'name' => 'Бесплатный дизайн-проект',
                        'description' => 'При заказе ремонта под ключ — дизайн-проект в подарок',
                        'availability' => 'https://schema.org/InStock',
                    ],
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'item' => [
                        '@type' => 'Offer',
                        'name' => 'Скидка до 30%',
                        'description' => 'Сезонные скидки на комплексный ремонт под ключ',
                        'availability' => 'https://schema.org/InStock',
                    ],
                ],
            ],
        ],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | ПКвартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seo['og']['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['og']['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="<?= htmlspecialchars($seo['twitter']['card']); ?>">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    <?= $seo['jsonLd']; ?>
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20 flex flex-col gap-8 pb-16">
        <section class="py-12 bg-gradient-to-r from-blue-50 to-white reveal">
            <div class="container mx-auto px-4 max-w-4xl">
                <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="/" class="hover:text-blue-600 transition">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Акции</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Акции и скидки на ремонт</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Выгодные предложения на ремонт квартир под ключ. Успейте воспользоваться сезонными скидками и бесплатными бонусами.
                </p>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-gift text-2xl text-orange-500"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Бесплатный дизайн-проект</h2>
                            <p class="text-gray-600 mb-4">При заказе ремонта под ключ — полный дизайн-проект с 3D-визуализацией в подарок (ценность до 50 000 ₽).</p>
                            <a href="/contact" class="text-orange-600 font-semibold hover:underline">Узнать условия <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-percent text-2xl text-green-500"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Скидка до 30% на ремонт</h2>
                            <p class="text-gray-600 mb-4">Сезонные скидки на комплексный ремонт под ключ. Чем больше объём работ — тем больше скидка.</p>
                            <a href="/contact" class="text-green-600 font-semibold hover:underline">Рассчитать скидку <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-ruler-combined text-2xl text-blue-500"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Бесплатный замер и расчёт</h2>
                            <p class="text-gray-600 mb-4">Инженер приедет в день обращения, замерит объект и подготовит 3 варианта сметы под ваш бюджет. Бесплатно.</p>
                            <a href="/calculator" class="text-blue-600 font-semibold hover:underline">Заказать замер <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm hover:shadow-lg transition">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-alt text-2xl text-purple-500"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">Гарантия 3 года</h2>
                            <p class="text-gray-600 mb-4">Официальная гарантия на все выполненные работы. На скрытые дефекты ответственность не ограничена сроком.</p>
                            <a href="/dogovor-obrazec" class="text-purple-600 font-semibold hover:underline">Смотреть договор <i class="fas fa-arrow-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <div class="text-center py-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Выберите акцию и начните ремонт выгодно</h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Оставьте заявку — менеджер свяжется за 5 минут, расскажет о всех действующих предложениях и подскажет лучший вариант для вашего бюджета.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="/calculator"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        Рассчитать стоимость
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Узнать об акциях
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>

</html>