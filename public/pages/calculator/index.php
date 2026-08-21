<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Калькулятор ремонта квартиры — рассчитать стоимость под ключ онлайн',
    'description' => 'Онлайн-калькулятор ремонта квартиры: рассчитайте точную стоимость под ключ в Москве за 1 минуту. Учитывает площадь, тип ремонта, материалы, сложность работ. Мгновенный результат бесплатно.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/calculator',
    'type' => 'website',
    'pageType' => 'WebApplication',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Калькулятор', 'url' => $site['baseUrl'] . '/calculator'],
    ],
    'schema' => [
        [
            '@type' => 'WebApplication',
            'name' => 'Калькулятор ремонта',
            'description' => 'Онлайн-калькулятор стоимости ремонта квартиры',
            'url' => $site['baseUrl'] . '/calculator',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'RUB',
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
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="keywords"
        content="калькулятор ремонта квартиры, расчёт стоимости ремонта, сколько стоит ремонт, ремонт под ключ цена">
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
                        <li class="text-gray-900 font-medium">Калькулятор стоимости</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Калькулятор стоимости ремонта</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Узнайте точную стоимость вашего ремонта за 1 минуту. Укажите параметры — получите 3 варианта сметы под ваш бюджет.
                </p>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="#calculator"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        Перейти к калькулятору
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Связаться с нами
                    </a>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-6xl reveal">
            <div id="calculator" class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <h2 class="text-2xl font-bold text-gray-900">Параметры ремонта</h2>

                        <form id="calculatorForm" class="space-y-6" novalidate>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Тип жилья *</label>
                                <select name="property_type" id="property_type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                    <option value="" disabled selected>Выберите тип жилья</option>
                                    <option value="apartment">Квартира</option>
                                    <option value="studio">Студия</option>
                                    <option value="house">Дом / Коттедж</option>
                                    <option value="commercial">Коммерческое помещение</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Площадь (м²) *</label>
                                <input type="number" name="area" id="area" min="10" max="500" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    placeholder="Например: 55">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Тип ремонта *</label>
                                <select name="repair_type" id="repair_type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                    <option value="" disabled selected>Выберите тип ремонта</option>
                                    <option value="cosmetic">Косметический (от 8 000 ₽/м²)</option>
                                    <option value="capital">Капитальный (от 13 000 ₽/м²)</option>
                                    <option value="designer">Дизайнерский (от 18 000 ₽/м²)</option>
                                    <option value="premium">Премиум / Элитный (от 25 000 ₽/м²)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Сроки *</label>
                                <select name="timeline" id="timeline" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                    <option value="" disabled selected>Когда планируете начать?</option>
                                    <option value="asap">Как можно скорее</option>
                                    <option value="1-2_months">Через 1-2 месяца</option>
                                    <option value="3-6_months">Через 3-6 месяцев</option>
                                    <option value="planning">Просто прицениваюсь</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Контактный телефон *</label>
                                <input type="tel" name="phone" id="phone" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    placeholder="+7 (___) ___-__-__" inputmode="tel">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Способ связи</label>
                                <select name="contact_method" id="contact_method"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                    <option value="phone">Звонок</option>
                                    <option value="whatsapp">WhatsApp</option>
                                    <option value="telegram">Telegram</option>
                                </select>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-6 rounded-lg font-semibold text-lg transition-all duration-300 shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-calculator mr-3"></i>
                                Рассчитать стоимость
                            </button>
                        </form>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-6 md:p-8 border border-blue-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Что вы получите</h3>
                        <ul class="space-y-4 text-gray-700">
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>3 варианта сметы под ваш бюджет</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Бесплатный выезд инженера на замер</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Фиксированная цена в договоре</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Гарантия 3 года на все работы</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Ежедневные фотоотчёты с объекта</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Комплектация материалами под ключ</span>
                            </li>
                        </ul>

                        <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-200">
                            <p class="text-blue-900 font-semibold">Средняя стоимость:</p>
                            <ul class="text-blue-800 mt-2 space-y-1 text-sm">
                                <li>Косметический — от 8 000 ₽/м²</li>
                                <li>Капитальный — от 13 000 ₽/м²</li>
                                <li>Дизайнерский — от 18 000 ₽/м²</li>
                                <li>Премиум — от 25 000 ₽/м²</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-6xl reveal">
            <div class="text-center py-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Есть вопросы?</h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Позвоните или напишите — ответим за 5 минут, проконсультируем бесплатно и без обязательств.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="tel:<?= htmlspecialchars($site['phone']); ?>"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        <i class="fas fa-phone mr-2"></i>
                        <?= htmlspecialchars($site['phone']); ?>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Написать нам
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="/public/assets/scripts/components/lazyIMG.min.js" defer></script>
    <script src="/public/assets/scripts/main/header.min.js" defer></script>
    <script src="/public/assets/scripts/main/calculator.min.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.min.js" defer></script>
</body>

</html>