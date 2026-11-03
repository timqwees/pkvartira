<?php
$site = Setting\Route\Functions\TheFunction::site();

$seo = Setting\Route\Functions\TheFunction::seo([
    'title' => 'Ремонт квартир в Москве — полное руководство 2026: виды, цены, этапы, советы',
    'description' => 'Главная страница кластера «Ремонт квартир»: виды ремонта (косметический, капитальный, дизайнерский), цены за м² и по площадям, этапы работ, как выбрать подрядчика, советы экспертов. Ссылки на все 21 статью блога. От компании Проект Квартира (Проект Квартира).',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/blogs/pilar-remont-kvartir',
    'type' => 'article',
    'pageType' => 'BlogPosting',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Блог', 'url' => $site['baseUrl'] . '/blogs'],
        ['name' => 'Ремонт квартир — полное руководство', 'url' => $site['baseUrl'] . '/blogs/pilar-remont-kvartir'],
    ],
    'schema' => [
        Setting\Route\Functions\TheFunction::articleSchema([
            'id' => 'pillar',
            'title' => 'Ремонт квартир в Москве — полное руководство 2026',
            'meta_description' => 'Виды ремонта, цены, этапы, как выбрать подрядчика — полное руководство 2026',
            'content' => 'Полное руководство по ремонту квартир в Москве 2026 года.',
            'category' => 'Ремонт квартир',
            'tags' => 'ремонт квартиры, цены, виды ремонта, подрядчик, сметы',
            'slug' => 'pilar-remont-kvartir',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'author' => 'Проект Квартира',
            'image' => $site['shareImageUrl'],
        ]),
    ],
    'speakable' => ['.pillar-intro', '.pillar-section:first-of-type p:first-of-type'],
]);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="ru_RU">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
    <?php include_once '../../components/head-includes.php'; ?>
</head>
<body class="bg-white">
    <?php include_once '../../components/header.php'; ?>
    <main class="pt-20" style="padding-top:80px">
        <section class="py-16 bg-white reveal pillar-intro">
            <div class="container mx-auto px-4 max-w-6xl">
                <nav aria-label="breadcrumb" class="mb-6">
                    <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                        <li><a href="/" class="hover:text-blue-600">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li><a href="/blogs" class="hover:text-blue-600">Блог</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Ремонт квартир — полное руководство</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#1f2937] leading-tight mb-6">
                    Ремонт квартир в Москве: полное руководство 2026
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mb-8">
                    От выбора типа ремонта и подрядчика до приёмки работ — всё, что нужно знать, чтобы не переплатить, уложиться в сроки и получить качественный результат.
                </p>
                <div class="flex flex-wrap gap-3 mb-8">
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#fef8f3] text-[#5c4a3a] font-semibold">
                        <i class="fas fa-book-open mr-2"></i> 21 статья
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-700 font-semibold">
                        <i class="fas fa-user-check mr-2"></i> Эксперт: Елена, основатель
                    </span>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 text-green-700 font-semibold">
                        <i class="fas fa-award mr-2"></i> Гарантия 3 года
                    </span>
                </div>
            </div>
        </section>

        <section class="py-8 bg-gray-50 reveal">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg hover:border-[#876b55] transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-layer-group text-[#6d5744] text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 mb-2">Виды ремонта</h3>
                        <p class="text-gray-600 mb-4">Косметический, капитальный, дизайнерский — в чём разница и что выбрать вашей квартире.</p>
                        <div class="space-y-2">
                            <a href="/blog/kosmeticheskiy-remont-2026" class="block text-[#6d5744] hover:underline font-medium">Косметический ремонт 2026 →</a>
                            <a href="/blog/remont-pod-klyuch-2026" class="block text-[#6d5744] hover:underline font-medium">Ремонт под ключ: почему профессионалы вытесняют DIY →</a>
                            <a href="/blog/dizaynerskiy-remont" class="block text-[#6d5744] hover:underline font-medium">Дизайнерский ремонт: архитектурный подход →</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg hover:border-[#876b55] transition">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-calculator text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 mb-2">Цены и сметы</h3>
                        <p class="text-gray-600 mb-4">Реальные цены 2026 за м² и по площадям, как читать смету и не переплатить.</p>
                        <div class="space-y-2">
                            <a href="/blog/skolko-stoit-remont-kvartiry-2026" class="block text-blue-600 hover:underline font-medium">Сколько стоит ремонт в Москве в 2026 →</a>
                            <a href="/blog/smeta-na-remont-kvartiry-primer" class="block text-blue-600 hover:underline font-medium">Смета — что это простыми словами →</a>
                            <a href="/blog/smeta-na-remont-kvartiry-nakrutki" class="block text-blue-600 hover:underline font-medium">12 скрытых накруток в смете →</a>
                            <a href="/blog/byudzhet-remont-2026" class="block text-blue-600 hover:underline font-medium">Бюджет на ремонт: как спланировать →</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-lg hover:border-[#876b55] transition">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-tools text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900 mb-2">Этапы и управление</h3>
                        <p class="text-gray-600 mb-4">От замеров до приёмки: пошаговый план, сроки, контроль качества, работа с подрядчиком.</p>
                        <div class="space-y-2">
                            <a href="/blog/remont-kvartiry-s-chego-nachat" class="block text-green-600 hover:underline font-medium">С чего начать ремонт квартиры →</a>
                            <a href="/blog/skolko-dlitsya-remont-komnaty" class="block text-green-600 hover:underline font-medium">Сколько длится ремонт комнаты →</a>
                            <a href="/blog/pereplanirovka-kuhni-gostinoy" class="block text-green-600 hover:underline font-medium">Перепланировка: кухня-гостиная →</a>
                            <a href="/blog/priemka-kvartiry-zastroyshchik" class="block text-green-600 hover:underline font-medium">Приёмка квартиры у застройщика →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-white reveal pillar-section">
            <div class="container mx-auto px-4 max-w-6xl">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 text-center mb-12">Все статьи кластера «Ремонт квартир»</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/blog/remont-kvartiry-s-chego-nachat" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">С чего начать ремонт квартиры в 2026 — пошаговый план</h3>
                        <p class="mt-1 text-sm text-gray-600">5 этапов: демонтаж → инженерия → черновая → чистовая → финал</p>
                    </a>
                    <a href="/blog/remont-pod-klyuch-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Ремонт под ключ в 2026: почему профессионалы вытесняют DIY</h3>
                        <p class="mt-1 text-sm text-gray-600">Спрос вырос на 40%. Как не ошибиться с подрядчиком.</p>
                    </a>
                    <a href="/blog/kosmeticheskiy-remont-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Косметический ремонт 2026: как обновить квартиру без капитальных вложений</h3>
                        <p class="mt-1 text-sm text-gray-600">За 2 недели и до 500 000 ₽ преобразить квартиру.</p>
                    </a>
                    <a href="/blog/umnyy-dom-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Умный дом в 2026: что реально нужно, а что — маркетинг</h3>
                        <p class="mt-1 text-sm text-gray-600">IoT-устройства, которые упростят жизнь, и от чего отказаться.</p>
                    </a>
                    <a href="/blog/rabochee-mesto-doma" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Рабочее место дома: как адаптировать квартиру под удалённую работу</h3>
                        <p class="mt-1 text-sm text-gray-600">Эргономичный home office без перепланировки.</p>
                    </a>
                    <a href="/blog/tsveta-materialy-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Цвета и материалы 2026: тренды, которые не устареют через год</h3>
                        <p class="mt-1 text-sm text-gray-600">Тёплые нейтральные, натуральные фактуры, экоматериалы.</p>
                    </a>
                    <a href="/blog/pereplanirovka-kuhni-gostinoy" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Перепланировка 2026: объединение кухни-гостиной и мастер-спальни</h3>
                        <p class="mt-1 text-sm text-gray-600">Законные способы, цены, типичные ошибки.</p>
                    </a>
                    <a href="/blog/remont-novostroyki-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Ремонт в новостройке 2026: с чего начать и на чём сэкономить</h3>
                        <p class="mt-1 text-sm text-gray-600">Усадка дома, некачественная стяжка, приёмка у застройщика.</p>
                    </a>
                    <a href="/blog/energoeffektivnyy-remont" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Энергоэффективный ремонт: как сэкономить на отоплении и электричестве</h3>
                        <p class="mt-1 text-sm text-gray-600">Утепление, вентиляция с рекуперацией, умное отопление.</p>
                    </a>
                    <a href="/blog/dizaynerskiy-remont" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Дизайнерский ремонт: почему спрос растёт быстрее бюджетного</h3>
                        <p class="mt-1 text-sm text-gray-600">Архитектурный подход, премиум-материалы, авторский надзор.</p>
                    </a>
                    <a href="/blog/remont-kuhni-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Ремонт кухни 2026: тренды, планировка, бюджет</h3>
                        <p class="mt-1 text-sm text-gray-600">Эргономика, встроенная техника, натуральные материалы.</p>
                    </a>
                    <a href="/blog/trendy-dizayna-interera-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Тренды дизайна интерьера 2026: натуральные фактуры, экоматериалы</h3>
                        <p class="mt-1 text-sm text-gray-600">Бетон, дерево, природный камень, терракота + умный дом.</p>
                    </a>
                    <a href="/blog/byudzhet-remont-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Бюджет на ремонт в 2026: как спланировать расходы и не переплатить</h3>
                        <p class="mt-1 text-sm text-gray-600">Пошаговый план, советы по экономии, выбор подрядчика.</p>
                    </a>
                    <a href="/blog/kak-poschitat-kvadratnye-metry" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Как посчитать квадратные метры комнаты: формулы и примеры</h3>
                        <p class="mt-1 text-sm text-gray-600">Прямоугольные, Г-образные, неправильные помещения. Калькулятор.</p>
                    </a>
                    <a href="/blog/skolko-dlitsya-remont-komnaty" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Сколько длится ремонт комнаты в 2026: точные сроки по этапам</h3>
                        <p class="mt-1 text-sm text-gray-600">Косметический 5–7 дней, капитальный 21–35 дней с просушкой.</p>
                    </a>
                    <a href="/blog/priemka-kvartiry-zastroyshchik" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Приёмка квартиры у застройщика в Москве 2026: чек-лист 30 пунктов</h3>
                        <p class="mt-1 text-sm text-gray-600">Окна, стены, пол, электрика, вентиляция. Акт с дефектами.</p>
                    </a>
                    <a href="/blog/smeta-na-remont-kvartiry-nakrutki" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Смета на ремонт квартиры 2026: как читать и 12 скрытых накруток</h3>
                        <p class="mt-1 text-sm text-gray-600">Пример сметы на 60 м², чек-лист проверки, как сэкономить.</p>
                    </a>
                    <a href="/blog/skolko-stoit-remont-kvartiry-2026" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Сколько стоит ремонт квартиры в Москве в 2026: цены за м² и таблица</h3>
                        <p class="mt-1 text-sm text-gray-600">Косметический от 8 000 ₽, капитальный от 13 000 ₽ за м².</p>
                    </a>
                    <a href="/blog/shumoizolyatsiya-kvartiry-panelny-dom" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Шумоизоляция квартиры в панельном доме 2026: материалы, цены, ошибки</h3>
                        <p class="mt-1 text-sm text-gray-600">ЗИПС, Тексаунд, Шуманет — сравнение по толщине и эффективности.</p>
                    </a>
                    <a href="/blog/smeta-na-remont-kvartiry-primer" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-[#876b55] hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900 group-hover:text-[#6d5744] transition">Смета в ремонте — что это простыми словами: состав, пример, как проверить</h3>
                        <p class="mt-1 text-sm text-gray-600">Пример на 60 м², чтение за 10 минут, цены 2026 Москва.</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-16 bg-[#fef8f3] reveal">
            <div class="container mx-auto px-4 max-w-6xl text-center">
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-4">Хотите точный расчёт для своей квартиры?</h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Получите бесплатную консультацию и смету в 3 вариантах от команды Проект Квартира. Приедем на замер, ответим на все вопросы.</p>
                <div class="mt-8 flex flex-col md:flex-row gap-4 justify-center">
                    <a href="/calculator" class="inline-flex items-center justify-center px-8 py-4 rounded-lg bg-[#876b55] text-white font-extrabold hover:bg-[#6d5744] transition">
                        Рассчитать стоимость
                    </a>
                    <a href="tel:<?= $site['phone']; ?>" class="inline-flex items-center justify-center px-8 py-4 rounded-lg bg-white border border-gray-300 font-extrabold hover:bg-gray-50 transition">
                        <i class="fas fa-phone mr-2"></i> Позвонить: <?= $site['phone']; ?>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <?php include_once '../../components/footer.php'; ?>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>