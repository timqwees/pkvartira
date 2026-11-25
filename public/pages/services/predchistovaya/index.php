<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт с предчистовой отделкой — цены',
    'description' => 'Ремонт новостройки с предчистовой отделкой в Москве. Штукатурка, стяжка, коммуникации — поверх чистовая отделка. Цена от 8 000 ₽/м². Гарантия 3 года. От компании Проект Квартира (Проект Квартира).',
    'canonical' => '/services/predchistovaya',
    'image' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
    'type' => 'website',
    'pageType' => 'Service',
    'breadcrumbs' => array (
  0 => 
  array (
    'name' => 'Главная',
    'url' => '/',
  ),
  1 => 
  array (
    'name' => 'Ремонт с предчистовой отделкой',
    'url' => '/services/predchistovaya',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Ремонт новостройки с предчистовой отделкой',
    'provider' => 
    array (
      '@id' => '#organization',
    ),
    'areaServed' => 
    array (
      '@type' => 'City',
      'name' => 'Москва',
    ),
  ),
  1 => 
  array (
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => 
    array (
      0 => 
      array (
        '@type' => 'Question',
        'name' => 'Что входит в предчистовую отделку застройщика?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Штукатурка стен, стяжка пола, разводка электрики и сантехники до точек. Это базовая подготовка для чистовой отделки.',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Что нужно делать после предчистовой отделки?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Чистовая отделка: покраска или обои, укладка плитки и ламината, установка дверей, монтаж сантехники и розеток.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Сколько стоит чистовая отделка поверх предчистовой?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Цены от 8 000 ₽/м². Точная стоимость зависит от выбранных материалов и объёма работ. Рассчитаем смету после бесплатного замера.',
        ),
      ),
    ),
  ),
),
    'articleSection' => 'Ремонт',
]);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($seo['title']); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="<?= (strtolower($_SERVER["HTTP_HOST"] ?? "") === "upgrade.pkvartira.ru") ? "noindex, nofollow" : "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" ?>">
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
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт новостройки с предчистовой отделкой</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Предчистовая отделка — штукатурка, стяжка, разведённые коммуникации. Поверх неё выполняем чистовую отделку. Цена от 8 000 ₽/м². Гарантия 3 года.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">₽</span> от 8 000 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">✓</span> Гарантия 3 года</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">✓</span> Замер бесплатно</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Что такое предчистовая отделка</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Предчистовая отделка — это этап подготовки новостройки, на котором застройщик выполняет базовые работы: оштукатуривание стен, стяжку пола, разводку инженерных коммуникаций (электрика, сантехника, отопление).</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">После предчистовой отделки стены выровнены и готовы к покраске или оклейке обоями, пол — к укладке финишного покрытия. Остаётся только чистовая отделка: обои, покраска, плитка, ламинат, установка дверей и сантехники.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Штукатурка стен по маякам — выравнивание под чистовую отделку</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Цементно-песчаная стяжка пола с выведением уровня</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Разводка электрики: проводка, подрозетники, щитки</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Подводка водоснабжения и канализации к точкам</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на чистовую отделку поверх предчистовой</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Косметический</span><span class="font-bold text-[#111827]">от 8 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Капитальный</span><span class="font-bold text-[#111827]">от 13 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Дизайнерский</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                    <p class="mt-4 text-sm text-[#6b7280]">Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%.</p>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Как мы работаем</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Заявка</h3><p class="mt-1 text-sm text-[#6b7280]">Оставьте заявку на сайте</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Выезд</h3><p class="mt-1 text-sm text-[#6b7280]">Инженер приедет на замер</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Смета</h3><p class="mt-1 text-sm text-[#6b7280]">Фиксированная смета в день обращения</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Ремонт</h3><p class="mt-1 text-sm text-[#6b7280]">Выполняем в срок с гарантией</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'predchistovaya_cta';
$ctaFormTitle = 'Рассчитать стоимость ремонта';
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

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Часто задаваемые вопросы</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что входит в предчистовую отделку застройщика?</summary><p class="mt-2 text-sm text-[#6b7280]">Штукатурка стен, стяжка пола, разводка электрики и сантехники до точек. Это базовая подготовка для чистовой отделки.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что нужно делать после предчистовой отделки?</summary><p class="mt-2 text-sm text-[#6b7280]">Чистовая отделка: покраска или обои, укладка плитки и ламината, установка дверей, монтаж сантехники и розеток.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит чистовая отделка поверх предчистовой?</summary><p class="mt-2 text-sm text-[#6b7280]">Цены от 8 000 ₽/м². Точная стоимость зависит от выбранных материалов и объёма работ. Рассчитаем смету после бесплатного замера.</p></details>
            </div>
        </div>
    </section>
</main>
<?php
$otdelkaClusterCurrent = 'predchistovaya';
include './public/components/otdelka-cluster.php';
?>


<?php
// N-15: кейс «Новостройка 86 м², 60 дней, 1 118 000 ₽»
$caseData = [
    'title'  => 'Новостройка, 86 м²',
    'area'   => '86 м²',
    'days'   => '60 дней',
    'sum'    => '1 118 000 ₽',
    'alt'    => 'Ремонт новостройки 86 м² — выполненный объект',
    'photos' => [
        '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
        '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/2.jpg',
        '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/3.jpg',
        '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/4.jpg',
    ],
    'note'   => 'Квартира сдана из состояния «без отделки»: голые стены, без стяжки и коммуникаций. Сделали полный цикл — черновые работы, инженерия, чистовая отделка. Срок и сумма зафиксированы в договоре.',
    'bullets' => [
        'Демонтаж, штукатурка стен по маякам, стяжка с выравниванием',
        'Полная разводка электрики и сантехники',
        'Чистовая отделка всех помещений, двери и плинтусы',
        'Финальная уборка и передача ключей',
    ],
];
$caseTitle    = 'Наш объект: новостройка 86 м² за 60 дней';
$caseSubtitle = 'Квартира без отделки от застройщика — полный цикл работ. Срок и стоимость из договора.';
$caseNote     = 'Хотите такой же результат в своей квартире? Посчитаем за 5 минут — <a href="/calculator" class="text-[#6d5744] font-semibold underline">калькулятор ремонта</a>.';
include './public/components/case-study.php';
?>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/evro-dvushka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт евродвушки</a>
                <a href="/services/evro-treshka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт евротрешки</a>
                <a href="/services/chistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Чистовая отделка</a>
                <a href="/services/chernovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Черновая отделка</a>
                <a href="/services/bez-otdelki" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Без отделки</a>
                <a href="/services/white-box" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">White box</a>
                <a href="/services/ot-zastroyschika" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">От застройщика</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт новостроек</a>
                <a href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Вторичное жильё</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт студий</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт под ключ</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'predchistovaya_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт новостройки с предчистовой отделкой';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];

        // N-17: взаимные ссылки кластера «отделка в новостройке»
        $otdelkaClusterTitle = 'Другие типы отделки в новостройке';
        $otdelkaClusterCurrent = 'predchistovaya';
        include './public/components/otdelka-cluster.php';

        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
