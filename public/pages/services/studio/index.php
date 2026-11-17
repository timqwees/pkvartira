<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Ремонт квартиры-студии под ключ в Москве — от 8 000 ₽/м²',
    'description' => 'Ремонт квартиры-студии под ключ в Москве: косметический от 8 000 ₽/м², капитальный от 13 000 ₽/м². Готовые кейсы 20–35 м², сроки 21–35 дней, гарантия 3 года. Бесплатный замер. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/studio',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => array (
  0 =>
  array (
    'name' => 'Главная',
    'url' => '/',
  ),
  1 =>
  array (
    'name' => 'Услуги',
    'url' => '/services',
  ),
  2 =>
  array (
    'name' => 'Студия',
    'url' => '/services/studio',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Сколько стоит ремонт студии под ключ в Москве?', 'answer' => 'Косметический ремонт — от 8 000 ₽/м² (от ~160 000 ₽ за 20 м²). Капитальный с заменой инженерии — от 13 000 ₽/м². Точная сумма после бесплатного замера и сметы.'],
            ['question' => 'Какие особенности ремонта студии?', 'answer' => 'Главное — правильное зонирование (кухня-гостиная, спальная зона, входная группа), вентиляция кухонной зоны, шумка изоляция санузла, эргономика хранения. Учитываем всё в проекте и смете.'],
            ['question' => 'Сколько времени занимает ремонт студии?', 'answer' => 'Косметический — 21–28 дней. Капитальный с перепланировкой и инженерией — 28–35 дней. Сроки фиксируем в договоре.'],
            ['question' => 'Делаете ли вы проектирование студий?', 'answer' => 'Да, предлагаем эскизный проект (зонирование, планировки) от 1 500 ₽/м² и стандартный с 3D и чертежами от 2 200 ₽/м². Поможем правильно разместить кухню, спальное место, хранение.'],
            ['question' => 'Какая гарантия на ремонт студии?', 'answer' => 'Официальная гарантия 3 года на все работы и материалы. Фиксируется в договоре. На скрытые дефекты (проводка, трубы в стяжке) ответственность подрядчика сохраняется весь гарантийный срок.'],
        ]),
    ],
]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="flex flex-col">

        <?php
        $svc = [
            'heroH1' => 'Ремонт квартиры-студии',
            'heroSubtitle' => 'Компактное жильё — не повод для компромиссов. Сделаем ремонт студии под ключ: грамотная планировка, свет, эргономика, гарантия 3 года.',
            'heroFormId' => 'studio_hero',
            'bg_url' => '/public/assets/images/portfolio-photos/studio/1_24sqm/1.jpg',
        ];
        include './public/components/service-page-sections.php';
        ?>

        <!-- 2. Цены -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Стоимость ремонта студии под ключ
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%
                    у поставщиков. Стоимость фиксируем в договоре, точную сумму называем после бесплатного замера.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php
                    $studioPrices = [
                        [
                            'title' => 'Косметический',
                            'price' => 'от 8 000 ₽/м²',
                            'term' => '21–28 дней',
                            'items' => ['Стены и потолки: шпаклёвка, покраска', 'Замена покрытия пола', 'Косметика электрики', 'Двери, плинтусы, уборка'],
                        ],
                        [
                            'title' => 'Капитальный',
                            'price' => 'от 13 000 ₽/м²',
                            'term' => '28–35 дней',
                            'items' => ['Полная замена электрики и сантехники', 'Стяжка и выравнивание стен', 'Плитка в санузле', 'Чистовая отделка под ключ'],
                        ],
                        [
                            'title' => 'Дизайнерский',
                            'price' => 'от 18 000 ₽/м²',
                            'term' => '35–45 дней',
                            'items' => ['Дизайн-проект и авторский надзор', 'Сложные решения по свету и зонированию', 'Встроенная мебель и хранение', 'Премиальные материалы'],
                        ],
                    ];
                    foreach ($studioPrices as $sp): ?>
                        <article class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6">
                            <div class="text-sm text-gray-600"><?= htmlspecialchars($sp['title']); ?> ремонт</div>
                            <div class="mt-2 text-3xl font-bold text-gray-900"><?= htmlspecialchars($sp['price']); ?></div>
                            <div class="text-sm text-gray-600">Срок: <?= htmlspecialchars($sp['term']); ?></div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <?php foreach ($sp['items'] as $item): ?>
                                    <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span><?= htmlspecialchars($item); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="/contact"
                                class="flex items-center justify-center mt-6 w-full border border-blue-700 text-blue-700 hover:bg-blue-50 px-5 py-3 rounded-lg font-semibold transition">Рассчитать
                                студию</a>
                        </article>
                    <?php endforeach; ?>
                </div>
                <p class="mt-6 text-center text-sm text-gray-600">Все расценки — на странице <a href="/prices" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">цен на ремонт</a> или <a href="/calculator" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">посчитайте в калькуляторе</a>.</p>
            </div>
        </section>

<?php
// J-01: кейс с фотографиями, площадью, сроками и итоговой стоимостью
$caseData = [
    'title'  => 'Студия, 24 м²',
    'area'   => '24 м²',
    'days'   => '28 дней',
    'sum'    => '192 000 ₽',
    'alt'    => 'Ремонт квартиры-студии 24 м² — выполненный объект',
    'photos' => [
        '/public/assets/images/portfolio-photos/studio/1_24sqm/1.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/3.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/4.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/2.webp',
    ],
    'note'   => 'Квартира-студия с новостройки: голые стены и один выход на юг. Сделали лёгкий, но полноценный ремонт — за счёт планировки, а не объёма работ.',
    'bullets' => [
        'Демонтаж и выравнивание стен, покраска в один тон',
        'Замена электрики, розетки и светильники',
        'Ламинат на тёплый пол по всей площади',
        'Покраска потолка, установка плинтусов и двери',
        'Финальная уборка',
    ],
];

$caseTitle    = 'Наши объекты: студии';
$caseSubtitle = 'Косметический пакет в однушке-студии: заменили покрытия, выровняли стены, обновили электрику.';
$caseNote     = 'Ещё примеры работ — в <a href="/portfolio" class="text-[#6d5744] font-semibold underline">портфолио</a>.';
include './public/components/case-study.php';
?>


    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>

</html>