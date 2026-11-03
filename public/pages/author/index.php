<?php
$site = Setting\Route\Functions\TheFunction::site();

$seo = Setting\Route\Functions\TheFunction::seo([
    'title' => 'Елена — основатель Проект Квартира, эксперт по ремонту',
    'description' => 'Елена — основатель и CEO Проект Квартира. 10+ лет опыта в ремонте квартир под ключ в Москве. Экспертиза: сметы, выбор материалов, управление проектами, контроль качества. 35 отзывов клиентов.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/author',
    'type' => 'profile',
    'pageType' => 'ProfilePage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Об авторе', 'url' => $site['baseUrl'] . '/author'],
    ],
    'schema' => [
        [
            '@type' => 'Person',
            '@id' => $site['baseUrl'] . '/author#person',
            'name' => 'Елена',
            'alternateName' => ['Основатель Проект Квартира', 'CEO Проект Квартира'],
            'description' => 'Основатель компании Проект Квартира. 10+ лет экспертизы в ремонте квартир под ключ в Москве. Автор статей по сметным расчетам, выбору материалов, управлению строительством.',
            'url' => $site['baseUrl'] . '/author',
            'image' => $site['baseUrl'] . '/public/assets/images/about/team/1.jpg',
            'jobTitle' => 'Основатель, CEO',
            'worksFor' => ['@id' => $site['baseUrl'] . '#organization'],
            'knowsAbout' => [
                'ремонт квартир под ключ',
                'сметное дело',
                'выбор строительных материалов',
                'управление строительством',
                'контроль качества ремонта',
                'перепланировка квартир',
                'дизайн интерьера'
            ],
            'sameAs' => [
                $site['telegram'],
                $site['whatsapp'],
                'https://yandex.ru/maps/org/proyekt_kvartira/'
            ],
        ],
        [
            '@type' => 'ProfilePage',
            '@id' => $site['baseUrl'] . '/author#profile',
            'url' => $site['baseUrl'] . '/author',
            'name' => 'Елена — основатель Проект Квартира',
            'description' => 'Страница автора: Елена, основатель Проект Квартира. Эксперт по ремонту квартир под ключ.',
            'mainEntity' => ['@id' => $site['baseUrl'] . '/author#person'],
            'inLanguage' => 'ru-RU',
        ],
    ],
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
    <meta property="og:type" content="profile">
    <meta property="og:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="ru_RU">
    <meta property="profile:first_name" content="Елена">
    <meta property="profile:last_name" content="">
    <meta property="profile:username" content="pkvartira">
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
        <section class="py-16 bg-white reveal">
            <div class="container mx-auto px-4 max-w-4xl">
                <div class="flex flex-col md:flex-row gap-10 items-center md:items-start">
                    <div class="md:w-1/3 flex-shrink-0">
                        <img src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/about/team/1.jpg') ?>" alt="Елена — основатель Проект Квартира"
                            class="rounded-2xl w-full h-auto object-cover shadow-lg" width="400" height="500">
                    </div>
                    <div class="md:w-2/3 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-[#1f2937]">Елена</h1>
                        <p class="mt-2 text-xl text-orange-600 font-semibold">Основатель и CEO Проект Квартира</p>
                        <p class="mt-4 text-gray-600 leading-relaxed">
                            Более 10 лет опыта в ремонте квартир под ключ в Москве. За это время компания выполнила сотни проектов — от студий до элитных пентхаусов.
                            Главный принцип: честная смета, фиксированная цена в договоре, ежедневные фотоотчёты, гарантия 3 года.
                        </p>
                        <div class="mt-6 grid grid-cols-3 gap-4 text-center md:text-left">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="text-2xl font-extrabold text-orange-600">10+</div>
                                <div class="text-sm text-gray-600">лет опыта</div>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="text-2xl font-extrabold text-orange-600">35</div>
                                <div class="text-sm text-gray-600">отзывов клиентов</div>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <div class="text-2xl font-extrabold text-orange-600">3</div>
                                <div class="text-sm text-gray-600">года гарантии</div>
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col md:flex-row gap-3 justify-center md:justify-start">
                            <a href="tel:<?= $site['phone']; ?>" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                                <i class="fas fa-phone mr-2"></i> Связаться
                            </a>
                            <a href="/calculator" class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 font-semibold hover:bg-gray-50 transition">
                                <i class="fas fa-calculator mr-2"></i> Рассчитать ремонт
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50 reveal">
            <div class="container mx-auto px-4 max-w-4xl">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#1f2937] text-center mb-10">Экспертиза и статьи</h2>
                <div class="space-y-4">
                    <a href="/blog/smeta-na-remont-kvartiry-primer" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900">Смета в ремонте — что это простыми словами</h3>
                        <p class="mt-1 text-sm text-gray-600">Состав сметы, пример на 60 м², как проверить за 10 минут</p>
                    </a>
                    <a href="/blog/smeta-na-remont-kvartiry-nakrutki" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900">Смета на ремонт: 12 скрытых накруток</h3>
                        <p class="mt-1 text-sm text-gray-600">Как читать смету и не переплатить подрядчику</p>
                    </a>
                    <a href="/blog/skolko-stoit-remont-kvartiry-2026" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900">Сколько стоит ремонт в Москве в 2026</h3>
                        <p class="mt-1 text-sm text-gray-600">Цены за м² и таблица по площадям 30–120 м²</p>
                    </a>
                    <a href="/blog/remont-kvartiry-s-chego-nachat" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900">С чего начать ремонт квартиры в 2026</h3>
                        <p class="mt-1 text-sm text-gray-600">Пошаговый план от замеров до финальной отделки</p>
                    </a>
                    <a href="/blog/pereplanirovka-kuhni-gostinoy" class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <h3 class="font-bold text-gray-900">Перепланировка 2026: кухня-гостиная и мастер-спальня</h3>
                        <p class="mt-1 text-sm text-gray-600">Законное объединение, согласование в Мосжилинспекции</p>
                    </a>
                </div>
                <div class="mt-6 text-center">
                    <a href="/blogs" class="inline-flex items-center gap-2 text-orange-600 font-semibold hover:text-orange-700 hover:underline">
                        Все статьи автора <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-16 bg-white reveal">
            <div class="container mx-auto px-4 max-w-4xl">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#1f2937] text-center mb-10">Что говорят клиенты</h2>
                <div class="bg-gray-50 rounded-2xl p-8 text-center">
                    <p class="text-xl text-gray-700 italic mb-4">«Главный страх был, что цена в процессе вырастет в два раза. Но ребята из Проект Квартира молодцы — как в смете прописали сумму, так она и осталась до конца.»</p>
                    <p class="font-semibold text-gray-900">— Александр В., ЖК «Сердце Столицы»</p>
                    <div class="mt-4 flex justify-center gap-2">
                        <a href="/reviews" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                            Все 35 отзывов
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-orange-50 reveal">
            <div class="container mx-auto px-4 max-w-4xl text-center">
                <h2 class="text-2xl md:text-3xl font-extrabold text-[#1f2937] mb-4">Нужен экспертный взгляд на ваш ремонт?</h2>
                <p class="mt-3 text-gray-600 max-w-2xl mx-auto">Получите бесплатную консультацию и расчёт стоимости от команды Проект Квартира. Приедем на замер, составим смету в 3 вариантах и ответим на все вопросы.</p>
                <div class="mt-8 flex flex-col md:flex-row gap-4 justify-center">
                    <a href="/calculator" class="inline-flex items-center justify-center px-8 py-4 rounded-lg bg-orange-500 text-white font-extrabold hover:bg-orange-600 transition">
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