<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Чистовая отделка квартиры в Москве — от 8 000 ₽/м²',
    'description' => 'Чистовая отделка квартиры под ключ в Москве: стены, потолки, полы, сантехника, электрика. Косметический от 8 000 ₽/м², капитальный от 13 000 ₽/м². Фиксированная смета, гарантия 3 года, бесплатный замер. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/chistovaya',
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
    'name' => 'Чистовая отделка',
    'url' => '/services/chistovaya',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Что входит в чистовую отделку квартиры?', 'answer' => 'Полный цикл: покраска/обои стен, покраска потолков, укладка напольных покрытий (ламинат, паркет, плитка), установка сантехники и смесителей, монтаж светильников и розеток, плинтуса, дверей, финальная уборка.'],
            ['question' => 'Сколько стоит чистовая отделка в Москве?', 'answer' => 'Косметическая чистовая — от 8 000 ₽/м². Капитальная с подготовкой основ — от 13 000 ₽/м². Цена включает материалы и работу. Точная смета после бесплатного замера.'],
            ['question' => 'Сколько времени занимает чистовая отделка?', 'answer' => 'Зависит от площади и состояния основ: студия — 14–21 день, 1-комнатная — 21–28 дней, 2-комнатная — 28–35 дней. Сроки фиксируем в договоре.'],
            ['question' => 'Работаете ли с нашими материалами?', 'answer' => 'Да, можем уложить купленные вами ламинат, плитку, обои. Но рекомендуем закупку через нас — скидка до 15%, гарантия качества и своевременная доставка.'],
            ['question' => 'Какая гарантия на чистовую отделку?', 'answer' => 'Официальная гарантия 3 года на все работы и материалы. Фиксируется в договоре. На скрытые дефекты (клей, шпаклевка, водоизоляция) ответственность сохраняется весь гарантийный срок.'],
        ]),
    ],
]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="<?= (strtolower($_SERVER["HTTP_HOST"] ?? "") === "upgrade.pkvartira.ru") ? "noindex, nofollow" : "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" ?>">
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

    <?php include_once './public/components/head-includes.php'; ?>
</head>


<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="flex flex-col">
        <?php
        $svc = [
            'heroH1' => 'Чистовая отделка квартиры',
            'heroSubtitle' => 'Полная чистовая отделка под ключ: стены, потолки, полы, сантехника, электрика. Работаем по договору с фиксированной ценой и гарантией 3 года.',
            'heroFormId' => 'chistovaya_hero',
            'bg_url' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
            'otdelka_cluster' => true,
            'otdelka_cluster_current' => 'chistovaya',
        ];
        include './public/components/service-page-sections.php';
        ?>

        <!-- Краткий ответ (AI Overview) -->
        <section class="reveal bg-white py-8 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed max-w-4xl">Чистовая отделка квартиры в Москве — это финальный этап ремонта: покраска и оклейка стен, монтаж полов и потолков, установка сантехники, дверей и освещения. Стоимость от 8 000 ₽/м², срок — от 21 до 60 дней. Мы фиксируем смету в договоре и даём гарантию 3 года на работы и материалы.</p>
            </div>
        </section>

        <!-- Цены -->
        <section id="price" class="reveal bg-white py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Сколько стоит чистовая отделка квартиры</h2>
                <p class="mt-2 text-gray-600 max-w-3xl">Цены указаны за работы, без учёта материалов. Точная стоимость рассчитывается после замера.</p>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <article class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6">
                            <div class="text-sm text-gray-600">Косметический</div>
                            <div class="mt-2 text-3xl font-bold text-gray-900">от 8 000 ₽/м²</div>
                            <div class="text-sm text-gray-600">Срок: 21–28 дней</div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Покраска стен и потолков</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Замена покрытия пола</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Обновление электрики</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Двери, плинтусы, уборка</span></li>
                            </ul>
                            <a href="/contact" class="flex items-center justify-center mt-6 w-full border border-[#876b55] text-[#6d5744] hover:bg-[#fef8f3] px-5 py-3 rounded-lg font-semibold transition">Рассчитать стоимость</a>
                        </article>
                        <article class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6">
                            <div class="text-sm text-gray-600">Капитальный</div>
                            <div class="mt-2 text-3xl font-bold text-gray-900">от 13 000 ₽/м²</div>
                            <div class="text-sm text-gray-600">Срок: 28–45 дней</div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Полная замена инженерии</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Выравнивание стен и пола</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Плитка и сантехника</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Чистовая отделка под ключ</span></li>
                            </ul>
                            <a href="/contact" class="flex items-center justify-center mt-6 w-full border border-[#876b55] text-[#6d5744] hover:bg-[#fef8f3] px-5 py-3 rounded-lg font-semibold transition">Рассчитать стоимость</a>
                        </article>
                        <article class="bg-white border border-gray-200 shadow-sm rounded-2xl p-6">
                            <div class="text-sm text-gray-600">Дизайнерский</div>
                            <div class="mt-2 text-3xl font-bold text-gray-900">от 18 000 ₽/м²</div>
                            <div class="text-sm text-gray-600">Срок: 45–60 дней</div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Дизайн-проект и авторский надзор</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Сложные решения по свету</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Встроенная мебель и хранение</span></li>
                                <li class="flex gap-2"><i class="fa-solid fa-check text-green-600 mt-0.5"></i><span>Премиальные материалы</span></li>
                            </ul>
                            <a href="/contact" class="flex items-center justify-center mt-6 w-full border border-[#876b55] text-[#6d5744] hover:bg-[#fef8f3] px-5 py-3 rounded-lg font-semibold transition">Рассчитать стоимость</a>
                        </article>
                </div>
                <p class="mt-6 text-center text-sm text-gray-600">Все расценки — на странице <a href="/prices" class="text-[#6d5744] font-semibold underline">цен на ремонт</a> или <a href="/calculator" class="text-[#6d5744] font-semibold underline">посчитайте в калькуляторе</a>.</p>
            </div>
        </section>

        <!-- Что входит -->
        <section class="reveal bg-gray-50 py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Что входит в работу</h2>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-200 rounded-xl p-4"><div class="text-[#6d5744] text-xl"><i class="fa-solid fa-check" aria-hidden="true"></i></div><div class="mt-2 font-semibold text-gray-900">Стены</div><div class="text-sm text-gray-600 mt-1">Шпаклёвка, покраска, обои или декоративная штукатурка</div></div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4"><div class="text-[#6d5744] text-xl"><i class="fa-solid fa-check" aria-hidden="true"></i></div><div class="mt-2 font-semibold text-gray-900">Потолки</div><div class="text-sm text-gray-600 mt-1">Гладкие, натяжные или многоуровневые</div></div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4"><div class="text-[#6d5744] text-xl"><i class="fa-solid fa-check" aria-hidden="true"></i></div><div class="mt-2 font-semibold text-gray-900">Полы</div><div class="text-sm text-gray-600 mt-1">Ламинат, плитка, инженерная доска, тёплый пол</div></div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4"><div class="text-[#6d5744] text-xl"><i class="fa-solid fa-check" aria-hidden="true"></i></div><div class="mt-2 font-semibold text-gray-900">Инженерия</div><div class="text-sm text-gray-600 mt-1">Розетки, выключатели, сантехника, освещение</div></div>
                </div>
            </div>
        </section>

        <!-- Процесс -->
        <section id="process" class="reveal py-12 md:py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Как мы работаем</h2>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-gray-50 rounded-xl p-5"><span class="w-10 h-10 rounded-lg bg-[#fef8f3] text-[#6d5744] flex items-center justify-center font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-gray-900">Заявка</h3><p class="mt-1 text-sm text-gray-600">Оставьте заявку или позвоните нам</p></div>
                    <div class="bg-gray-50 rounded-xl p-5"><span class="w-10 h-10 rounded-lg bg-[#fef8f3] text-[#6d5744] flex items-center justify-center font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-gray-900">Замер</h3><p class="mt-1 text-sm text-gray-600">Инженер приедет и замерит квартиру</p></div>
                    <div class="bg-gray-50 rounded-xl p-5"><span class="w-10 h-10 rounded-lg bg-[#fef8f3] text-[#6d5744] flex items-center justify-center font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-gray-900">Смета</h3><p class="mt-1 text-sm text-gray-600">Рассчитаем фиксированную стоимость</p></div>
                    <div class="bg-gray-50 rounded-xl p-5"><span class="w-10 h-10 rounded-lg bg-[#fef8f3] text-[#6d5744] flex items-center justify-center font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-gray-900">Работа</h3><p class="mt-1 text-sm text-gray-600">Выполним в срок с гарантией 3 года</p></div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="reveal bg-gray-50 py-12 md:py-16">
            <div class="max-w-7xl mx-auto px-4">
                <div class="max-w-2xl mx-auto">
                    <?php
                    $ctaFormId = 'chistovaya_hero_cta';
                    $ctaFormTitle = 'Рассчитать стоимость';
                    $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
                    $ctaButtonText = 'Рассчитать';
                    $ctaShowName = true;
                    $ctaHiddenCity = 'Москва';
                    $ctaExpandable = false;
                    include './public/components/cta-form.php';
                    ?>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="max-w-3xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Часто задаваемые вопросы</h2>
                <div class="mt-8 space-y-3">
                    <details class="faq-ex bg-white rounded-xl p-4 border border-gray-100" itemscope itemtype="https://schema.org/Question">
                        <summary class="font-semibold text-gray-900 cursor-pointer" itemprop="name">Что входит в чистовую отделку квартиры?</summary>
                        <div class="mt-2 text-sm text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Финальные работы: стены и потолки, напольные покрытия, плитка, сантехника, двери, розетки и светильники, финальная уборка.</div></div>
                    </details>
                    <details class="faq-ex bg-white rounded-xl p-4 border border-gray-100" itemscope itemtype="https://schema.org/Question">
                        <summary class="font-semibold text-gray-900 cursor-pointer" itemprop="name">Сколько стоит чистовая отделка в Москве?</summary>
                        <div class="mt-2 text-sm text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Косметический пакет — от 8 000 ₽/м², капитальный — от 13 000 ₽/м², дизайнерский — от 18 000 ₽/м². Точная смета после бесплатного замера.</div></div>
                    </details>
                    <details class="faq-ex bg-white rounded-xl p-4 border border-gray-100" itemscope itemtype="https://schema.org/Question">
                        <summary class="font-semibold text-gray-900 cursor-pointer" itemprop="name">Сколько времени занимает чистовая отделка?</summary>
                        <div class="mt-2 text-sm text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">От 21 дня для косметического пакета до 45–60 дней для дизайнерского. Сроки фиксируем в договоре.</div></div>
                    </details>
                    <details class="faq-ex bg-white rounded-xl p-4 border border-gray-100" itemscope itemtype="https://schema.org/Question">
                        <summary class="font-semibold text-gray-900 cursor-pointer" itemprop="name">Можно ли сделать только чистовую отделку?</summary>
                        <div class="mt-2 text-sm text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да, если черновые работы уже выполнены: стены оштукатурены, пол стянут, инженерия разведена. В остальных случаях сначала делаем черновой цикл.</div></div>
                    </details>
                    <details class="faq-ex bg-white rounded-xl p-4 border border-gray-100" itemscope itemtype="https://schema.org/Question">
                        <summary class="font-semibold text-gray-900 cursor-pointer" itemprop="name">Какая гарантия на чистовую отделку?</summary>
                        <div class="mt-2 text-sm text-gray-600" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Гарантия 3 года на все работы и материалы, фиксируется в договоре.</div></div>
                    </details>
                </div>
            </div>
        </section>

        <!-- Другие услуги -->
        <?php include './public/components/hub-links.php'; ?>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/phoneFormat.min.js') ?>" defer></script>

</body>

</html>
