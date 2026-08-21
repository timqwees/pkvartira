<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи',
    'description' => 'Профессиональный ремонт квартиры под сдачу в москве — цена от 250 000 ₽, для аренды и продажи в Москве. Качественный ремонт под ключ с гарантией.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/services/dlya-sdachi',
    'type' => 'website',
    'pageType' => 'Service',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Услуги', 'url' => $site['baseUrl'] . '/services/pod-klyuch'],
        ['name' => 'Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи', 'url' => $site['baseUrl'] . '/services/dlya-sdachi'],
    ],
    'schema' => [
        Setting\Route\Function\Functions::serviceSchema([
            'slug' => 'dlya-sdachi',
            'title' => 'Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи',
            'description' => 'Профессиональный ремонт квартиры под сдачу в москве — цена от 250 000 ₽, для аренды и продажи в Москве. Качественный ремонт под ключ с гарантией.',
        ]),
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | ПКвартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="keywords" content="Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи, dlya-sdachi, ремонт под ключ, ПКвартира, ремонт под ключ, ПКвартира">
    <meta name="robots" content="index, follow">
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
                        <li><a href="/services/pod-klyuch" class="hover:text-blue-600 transition">Услуги</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Профессиональный ремонт квартиры под сдачу в москве — цена от 250 000 ₽, для аренды и продажи в Москве. Качественный ремонт под ключ с гарантией.
                </p>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Что входит в Ремонт квартиры под сдачу в Москве — цена от 250 000 ₽, для аренды и продажи</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Полный комплекс работ по ремонт квартиры под сдачу в москве — цена от 250 000 ₽, для аренды и продажи под ключ. Вы получаете готовый результат без скрытых платежей и с гарантией 3 года.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <h4 class="font-semibold text-gray-900 mb-2">Что включено</h4>
                        <ul class="space-y-1 text-gray-600 text-sm">
                            <li>• Замер и консультация — бесплатно</li>
                            <li>• Подготовка детальной сметы — 3 варианта</li>
                            <li>• Демонтаж старых покрытий</li>
                            <li>• Черновые работы (электрика, сантехника, стяжка, штукатурка)</li>
                            <li>• Чистовая отделка под ключ</li>
                            <li>• Финальная уборка и приёмка</li>
                        </ul>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <h4 class="font-semibold text-gray-900 mb-2">Гарантии</h4>
                        <ul class="space-y-1 text-gray-600 text-sm">
                            <li>• Фиксированная цена в договоре</li>
                            <li>• Гарантия 3 года на все работы</li>
                            <li>• Ежедневные фотоотчёты</li>
                            <li>• Комплектация материалами под ключ</li>
                            <li>• Авторский надзор (по желанию)</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/calculator"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        Рассчитать стоимость
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Получить консультацию
                    </a>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Похожие услуги</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <a href="/services/pod-klyuch" class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition">
                    <h3 class="font-bold text-gray-900 mb-2">Ремонт под ключ</h3>
                    <p class="text-gray-600 text-sm">Полный цикл работ от дизайна до уборки</p>
                </a>
                <a href="/services/nowostroyka" class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition">
                    <h3 class="font-bold text-gray-900 mb-2">Ремонт в новостройке</h3>
                    <p class="text-gray-600 text-sm">С чернового состояния до заезда</p>
                </a>
                <a href="/services/vtorichka" class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition">
                    <h3 class="font-bold text-gray-900 mb-2">Ремонт вторички</h3>
                    <p class="text-gray-600 text-sm">С заменой коммуникаций и перепланировкой</p>
                </a>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="/public/assets/scripts/components/lazyIMG.min.js" defer></script>
    <script src="/public/assets/scripts/main/header.min.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.min.js" defer></script>
</body>

</html>