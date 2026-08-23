<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Калькулятор площади комнаты онлайн — расчёт м² стен и пола',
    'description' => 'Калькулятор площади квартиры онлайн: расчёт м² комнаты, стен, пола и потолка за 10 секунд. Формулы для любых помещений + перевод площади в стоимость ремонта.',
    'image' => $site['baseUrl'] . '/public/assets/images/pages/main/hero/bg.webp',
    'url' => $site['baseUrl'] . '/kalkulyator-ploshchadi',
    'type' => 'website',
    'pageType' => 'WebApplication',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Калькулятор площади', 'url' => $site['baseUrl'] . '/kalkulyator-ploshchadi'],
    ],
    'schema' => [
        [
            '@type' => 'WebApplication',
            'name' => 'Калькулятор площади квартиры',
            'description' => 'Онлайн-расчёт площади комнаты, стен, пола и потолка в квадратных метрах',
            'url' => $site['baseUrl'] . '/kalkulyator-ploshchadi',
            'applicationCategory' => 'UtilitiesApplication',
            'operatingSystem' => 'Web',
            'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'RUB'],
        ],
        [
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Как посчитать площадь комнаты в квадратных метрах?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Умножьте длину комнаты на ширину: S = длина × ширина. Например, комната 4 м × 5 м = 20 м². Для сложной формы разбейте помещение на прямоугольники и сложите их площади.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Как рассчитать площадь стен для обоев?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Периметр умножьте на высоту потолка и вычтите площадь окон и дверей: S = (длина + ширина) × 2 × высота − окна − двери. Калькулятор делает этот расчёт автоматически.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Сколько стоит ремонт одного квадратного метра?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'В Москве в 2026 году косметический ремонт — от 8 000 ₽/м², капитальный — от 13 000 ₽/м², дизайнерский — от 18 000 ₽/м². Калькулятор автоматически пересчитает вашу площадь в стоимость.',
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

    <style>
        .area-calc-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color .15s, box-shadow .15s;
        }
        .area-calc-input:focus {
            outline: none;
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249, 115, 22, .15);
        }
        .area-result-card {
            background: linear-gradient(135deg, #fff7ed 0%, #ffffff 100%);
            border: 1px solid #fed7aa;
            border-radius: 14px;
            padding: 18px 20px;
        }
        .area-result-value {
            font-size: 30px;
            font-weight: 800;
            color: #ea580c;
            line-height: 1.1;
        }
        .area-tab-btn {
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid #e5e7eb;
            background: #fff;
            color: #4b5563;
            transition: all .15s;
        }
        .area-tab-btn.active {
            background: #f97316;
            border-color: #f97316;
            color: #fff;
        }
        /* Строки «Вся квартира»: название / площадь / удалить */
        .apt-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .apt-name {
            flex: 1 1 200px;
            width: auto;
            min-width: 0;
        }
        .apt-area {
            flex: 0 0 120px;
            width: 120px;
        }
        .apt-del {
            flex: 0 0 44px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 480px) {
            .apt-name { flex-basis: 100%; }
        }
        /* Кнопки: вертикальный отступ (класс py-3.5 отсутствует в собранном tailwind) */
        .btn-pad {
            padding-top: 14px;
            padding-bottom: 14px;
        }
        /* Классы, отсутствующие в собранном tailwind-built.css */
        .grad-hero { background: linear-gradient(to right, #fff7ed, #ffffff); }
        .tabs-bar { background: #f9fafb; }
        .dash { border-style: dashed; }
        .price-card { min-width: 0; }
        @media (min-width: 768px) {
            .price-card { min-width: 280px; }
        }
        details.faq[open] { border-color: #fed7aa; background: rgba(255,247,237,.35); }
        details.faq[open] .chev { transform: rotate(180deg); }
    </style>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20 flex flex-col gap-8 pb-16">
        <!-- Hero -->
        <section class="py-12 grad-hero reveal">
            <div class="container mx-auto px-4 max-w-5xl">
                <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="/" class="hover:text-blue-600 transition">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Калькулятор площади</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Калькулятор площади квартиры и комнаты онлайн
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed max-w-3xl">
                    Посчитайте площадь комнаты, пола, потолка и стен в м² за 10 секунд.
                    Введите размеры — калькулятор сразу покажет результат и переведёт его в примерную стоимость ремонта.
                </p>
            </div>
        </section>

        <!-- Calculator -->
        <section class="container mx-auto px-4 max-w-5xl reveal">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Tabs -->
                <div class="flex flex-wrap gap-2 p-5 md:p-6 border-b border-gray-100 tabs-bar">
                    <button type="button" class="area-tab-btn active" data-area-tab="room">Комната / пол / потолок</button>
                    <button type="button" class="area-tab-btn" data-area-tab="walls">Стены (обои, покраска)</button>
                    <button type="button" class="area-tab-btn" data-area-tab="apartment">Вся квартира</button>
                </div>

                <div class="p-5 md:p-8">
                    <!-- TAB: ROOM -->
                    <div data-area-panel="room">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="roomLength">Длина, м</label>
                                <input type="number" step="0.01" min="0.1" id="roomLength" class="area-calc-input" placeholder="например 4.5" value="4.5">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="roomWidth">Ширина, м</label>
                                <input type="number" step="0.01" min="0.1" id="roomWidth" class="area-calc-input" placeholder="например 3.2" value="3.2">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="roomCount">Кол-во комнат</label>
                                <input type="number" step="1" min="1" id="roomCount" class="area-calc-input" value="1">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Площадь одной комнаты</div>
                                <div class="area-result-value"><span id="resRoomOne">14,40</span> м²</div>
                            </div>
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Суммарная площадь (все комнаты)</div>
                                <div class="area-result-value"><span id="resRoomAll">14,40</span> м²</div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB: WALLS -->
                    <div data-area-panel="walls" class="hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="wallLength">Длина, м</label>
                                <input type="number" step="0.01" min="0.1" id="wallLength" class="area-calc-input" value="4.5">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="wallWidth">Ширина, м</label>
                                <input type="number" step="0.01" min="0.1" id="wallWidth" class="area-calc-input" value="3.2">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="wallHeight">Высота потолка, м</label>
                                <input type="number" step="0.01" min="1" id="wallHeight" class="area-calc-input" value="2.7">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="wallOpenings">Окна + двери, м²</label>
                                <input type="number" step="0.1" min="0" id="wallOpenings" class="area-calc-input" value="3.4">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Площадь стен (с вычетом окон и дверей)</div>
                                <div class="area-result-value"><span id="resWalls">38,90</span> м²</div>
                            </div>
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Периметр комнаты</div>
                                <div class="area-result-value"><span id="resPerimeter">15,40</span> м</div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB: APARTMENT -->
                    <div data-area-panel="apartment" class="hidden">
                        <p class="text-gray-600 mb-4 text-sm">Введите площадь каждой комнаты — калькулятор сложит общую площадь квартиры.</p>
                        <div id="aptRooms" class="space-y-3 mb-4">
                            <div class="apt-row">
                                <input type="text" class="area-calc-input apt-name" placeholder="Название (Гостиная)" value="Гостиная" aria-label="Название помещения">
                                <input type="number" step="0.1" min="0" class="area-calc-input apt-area" placeholder="м²" value="18.5" data-apt-area aria-label="Площадь, м²">
                                <button type="button" class="apt-del rounded-lg border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-200 transition" data-apt-remove aria-label="Удалить">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="apt-row">
                                <input type="text" class="area-calc-input apt-name" placeholder="Название (Спальня)" value="Спальня" aria-label="Название помещения">
                                <input type="number" step="0.1" min="0" class="area-calc-input apt-area" placeholder="м²" value="13.2" data-apt-area aria-label="Площадь, м²">
                                <button type="button" class="apt-del rounded-lg border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-200 transition" data-apt-remove aria-label="Удалить">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="apt-row">
                                <input type="text" class="area-calc-input apt-name" placeholder="Название (Кухня)" value="Кухня" aria-label="Название помещения">
                                <input type="number" step="0.1" min="0" class="area-calc-input apt-area" placeholder="м²" value="11.0" data-apt-area aria-label="Площадь, м²">
                                <button type="button" class="apt-del rounded-lg border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-200 transition" data-apt-remove aria-label="Удалить">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="aptAddRoom" class="mb-6 inline-flex items-center gap-2 px-4 py-2.5 rounded-lg border-2 dash border-gray-300 text-gray-500 hover:border-orange-300 hover:text-orange-500 transition text-sm font-semibold">
                            <i class="fas fa-plus"></i> Добавить помещение
                        </button>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Общая площадь квартиры</div>
                                <div class="area-result-value"><span id="resAptTotal">42,70</span> м²</div>
                            </div>
                            <div class="area-result-card">
                                <div class="text-sm text-gray-500 mb-1">Примерная стоимость ремонта под ключ</div>
                                <div class="area-result-value"><span id="resAptPrice">от 555 100 ₽</span></div>
                                <div class="text-xs text-gray-400 mt-1">по капитальному ремонту от 13 000 ₽/м²</div>
                            </div>
                        </div>
                    </div>

                    <!-- Price conversion (for room & walls tabs) -->
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex flex-col md:flex-row md:items-end gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-semibold text-gray-700 mb-2" for="priceType">Тип ремонта для оценки стоимости</label>
                                <select id="priceType" class="area-calc-input">
                                    <option value="8000">Косметический — от 8 000 ₽/м²</option>
                                    <option value="13000" selected>Капитальный — от 13 000 ₽/м²</option>
                                    <option value="18000">Дизайнерский — от 18 000 ₽/м²</option>
                                    <option value="25000">Премиум — от 25 000 ₽/м²</option>
                                </select>
                            </div>
                            <div class="area-result-card price-card">
                                <div class="text-sm text-gray-500 mb-1">Ориентировочная стоимость работ</div>
                                <div class="area-result-value" id="resPrice">от 187 200 ₽</div>
                            </div>
                        </div>
                        <a href="/calculator"
                            class="mt-5 inline-flex items-center justify-center w-full sm:w-auto px-6 btn-pad rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold transition shadow-lg shadow-orange-500/25">
                            <i class="fas fa-calculator mr-2"></i>
                            Получить точную смету бесплатно
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulas -->
        <section class="container mx-auto px-4 max-w-5xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Формулы расчёта площади</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mb-3">
                        <i class="fas fa-vector-square"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Пол / потолок</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <strong>S = длина × ширина</strong><br><br>
                        Комната 4,5 × 3,2 м = <strong>14,4 м²</strong>.
                        Если помещение сложной формы — разбейте его на прямоугольники и сложите результаты.
                    </p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mb-3">
                        <i class="fas fa-ruler-combined"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Стены под обои</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <strong>S = периметр × высота − проёмы</strong><br><br>
                        (4,5 + 3,2) × 2 × 2,7 − 3,4 (окна/двери) = <strong>38,1 м²</strong>.
                        Берите обои с запасом 10% на подгонку рисунка.
                    </p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mb-3">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Площадь квартиры</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Сложите площади всех жилых и вспомогательных помещений.
                        По документам (БТИ) площадь может отличаться на 1–3 м² из-за коэффициентов лоджий и балконов.
                    </p>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="container mx-auto px-4 max-w-5xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Частые вопросы</h2>
            <div class="space-y-4">
                <details class="faq group bg-white rounded-xl border border-gray-200 p-5">
                    <summary class="font-semibold text-gray-900 cursor-pointer list-none flex justify-between items-center">
                        Как посчитать площадь комнаты в квадратных метрах?
                        <i class="fas fa-chevron-down text-gray-400 chev transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Умножьте длину комнаты на ширину: S = длина × ширина. Например, комната 4 м × 5 м = 20 м².
                        Для сложной формы разбейте помещение на прямоугольники и сложите их площади.
                    </p>
                </details>
                <details class="faq group bg-white rounded-xl border border-gray-200 p-5">
                    <summary class="font-semibold text-gray-900 cursor-pointer list-none flex justify-between items-center">
                        Как рассчитать площадь стен для обоев?
                        <i class="fas fa-chevron-down text-gray-400 chev transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        Периметр умножьте на высоту потолка и вычтите площадь окон и дверей:
                        S = (длина + ширина) × 2 × высота − окна − двери. Калькулятор выше делает этот расчёт автоматически.
                    </p>
                </details>
                <details class="faq group bg-white rounded-xl border border-gray-200 p-5">
                    <summary class="font-semibold text-gray-900 cursor-pointer list-none flex justify-between items-center">
                        Сколько стоит ремонт одного квадратного метра?
                        <i class="fas fa-chevron-down text-gray-400 chev transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        В Москве в 2026 году косметический ремонт — от 8 000 ₽/м², капитальный — от 13 000 ₽/м²,
                        дизайнерский — от 18 000 ₽/м². Точную смету с выездом на замер мы составляем бесплатно.
                    </p>
                </details>
                <details class="faq group bg-white rounded-xl border border-gray-200 p-5">
                    <summary class="font-semibold text-gray-900 cursor-pointer list-none flex justify-between items-center">
                        Зачем знать точную площадь перед ремонтом?
                        <i class="fas fa-chevron-down text-gray-400 chev transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed">
                        От площади зависит количество материалов (обои, ламинат, краска, плитка) и итоговая смета.
                        Ошибка в 10% площади — это переплата или нехватка материалов в самый разгар ремонта.
                    </p>
                </details>
            </div>
        </section>

        <!-- CTA -->
        <section class="container mx-auto px-4 max-w-5xl reveal">
            <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 p-8 text-white text-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-3">Знаете площадь? Получите точную смету</h2>
                <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                    Приедем на замер в день обращения, проверим ваши расчёты лазерным дальномером
                    и составим 3 варианта сметы под ваш бюджет. Бесплатно и без обязательств.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="/calculator"
                        class="inline-flex items-center justify-center px-6 btn-pad rounded-lg bg-white text-blue-800 font-extrabold hover:bg-blue-50 transition">
                        Рассчитать стоимость ремонта
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/blog/article/14"
                        class="inline-flex items-center justify-center px-6 btn-pad rounded-lg bg-white/10 border border-white/30 text-white font-semibold hover:bg-white/20 transition">
                        Как считать м² вручную — гайд
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <script>
    (function () {
        'use strict';

        var fmt = function (n, d) {
            d = (d === undefined) ? 2 : d;
            return n.toFixed(d).replace('.', ',');
        };
        var fmtMoney = function (n) {
            return 'от ' + Math.round(n).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ') + ' ₽';
        };

        /* ---------- Tabs ---------- */
        var tabBtns = document.querySelectorAll('[data-area-tab]');
        var panels = document.querySelectorAll('[data-area-panel]');
        tabBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                tabBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                panels.forEach(function (p) { p.classList.add('hidden'); });
                document.querySelector('[data-area-panel="' + btn.dataset.areaTab + '"]').classList.remove('hidden');
                recalcAll();
            });
        });

        /* ---------- Room tab ---------- */
        function calcRoom() {
            var l = parseFloat(document.getElementById('roomLength').value) || 0;
            var w = parseFloat(document.getElementById('roomWidth').value) || 0;
            var c = parseInt(document.getElementById('roomCount').value) || 1;
            var one = l * w;
            document.getElementById('resRoomOne').textContent = fmt(one);
            document.getElementById('resRoomAll').textContent = fmt(one * c);
            return one * c;
        }

        /* ---------- Walls tab ---------- */
        function calcWalls() {
            var l = parseFloat(document.getElementById('wallLength').value) || 0;
            var w = parseFloat(document.getElementById('wallWidth').value) || 0;
            var h = parseFloat(document.getElementById('wallHeight').value) || 0;
            var op = parseFloat(document.getElementById('wallOpenings').value) || 0;
            var perim = (l + w) * 2;
            var walls = Math.max(perim * h - op, 0);
            document.getElementById('resWalls').textContent = fmt(walls);
            document.getElementById('resPerimeter').textContent = fmt(perim, 1);
            return walls;
        }

        /* ---------- Apartment tab ---------- */
        function calcApartment() {
            var total = 0;
            document.querySelectorAll('#aptRooms [data-apt-area]').forEach(function (input) {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('resAptTotal').textContent = fmt(total);
            var rate = parseInt(document.getElementById('priceType').value) || 13000;
            document.getElementById('resAptPrice').textContent = fmtMoney(total * rate);
            return total;
        }

        /* ---------- Price for current active tab ---------- */
        function activeTabArea() {
            var active = document.querySelector('.area-tab-btn.active');
            if (!active) return 0;
            switch (active.dataset.areaTab) {
                case 'room': return calcRoom();
                case 'walls': return calcWalls();
                case 'apartment': return calcApartment();
            }
            return 0;
        }

        function calcPrice() {
            var rate = parseInt(document.getElementById('priceType').value) || 13000;
            var area = activeTabArea();
            document.getElementById('resPrice').textContent = fmtMoney(area * rate);
        }

        function recalcAll() {
            calcRoom();
            calcWalls();
            calcApartment();
            calcPrice();
        }

        /* ---------- Listeners ---------- */
        ['roomLength', 'roomWidth', 'roomCount', 'wallLength', 'wallWidth', 'wallHeight', 'wallOpenings', 'priceType']
            .forEach(function (id) {
                var el = document.getElementById(id);
                if (el) el.addEventListener('input', recalcAll);
            });

        document.addEventListener('input', function (e) {
            if (e.target.matches('[data-apt-area]')) recalcAll();
        });

        document.getElementById('aptAddRoom').addEventListener('click', function () {
            var row = document.createElement('div');
            row.className = 'apt-row';
            row.innerHTML =
                '<input type="text" class="area-calc-input apt-name" placeholder="Название помещения" aria-label="Название помещения">' +
                '<input type="number" step="0.1" min="0" class="area-calc-input apt-area" placeholder="м²" data-apt-area aria-label="Площадь, м²">' +
                '<button type="button" class="apt-del rounded-lg border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-200 transition" data-apt-remove aria-label="Удалить"><i class="fas fa-times"></i></button>';
            document.getElementById('aptRooms').appendChild(row);
            row.querySelector('.apt-name').focus();
        });

        document.addEventListener('click', function (e) {
            var removeBtn = e.target.closest('[data-apt-remove]');
            if (removeBtn) {
                var rows = document.querySelectorAll('#aptRooms .apt-row');
                if (rows.length > 1) {
                    removeBtn.closest('.apt-row').remove();
                    recalcAll();
                }
            }
        });

        recalcAll();
    })();
    </script>
</body>

</html>