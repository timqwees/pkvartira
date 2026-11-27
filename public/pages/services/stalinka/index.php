<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт квартир в сталинке — под ключ цены',
    'description' => 'Ремонт квартир в сталинке под ключ в Москве. Высокие потолки 2.7-3м, толстые стены. Косметический от 8 000 ₽/м², капитальный от 13 000 ₽/м². Гарантия 3 года. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/stalinka',
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
    'name' => 'Ремонт в сталинке',
    'url' => '/services/stalinka',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Ремонт квартир в сталинке',
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
        'name' => 'Сколько стоит ремонт квартиры в сталинке?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Косметический ремонт от 8 000 ₽/м², капитальный — от 13 000 ₽/м². Точная стоимость зависит от объёма работ, состояния инженерных сетей и материалов.',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Можно ли сохранить лепнину при ремонте?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Да, мы работаем с историческими элементами: реставрируем лепнину, восстанавливаем паркет, обновляем подоконники. Это особенно актуально для домов с высокой исторической ценностью.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Какой ремонт лучше для сталинки?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Для сталинок рекомендуем дизайнерский ремонт, чтобы раскрыть потенциал высоких потолков и просторных комнат. Капитальный ремонт также подходит для обновления инженерных сетей.',
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
        <?php
        $heroH1 = 'Ремонт квартир в сталинке под ключ';
        $heroFormId = 'stalinka_hero';
        $heroSubtitle = 'Профессиональный ремонт квартир в сталинке под ключ в Москве. Высокие потолки, просторные комнаты, толстые стены. Цены от 8 000 ₽/м², гарантия 3 года.';
        include './public/components/hero-section.php';
        ?>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Особенности ремонта в сталинке</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Сталинские дома — это массивные кирпичные и монолитные дома 30–60х годов. Их отличают высокие потолки 2,7–3 м, толстые несущие стены, просторные комнаты и часто нестандартные планировки. При ремонте важно сохранить исторические элементы и усилить инженерные сети.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Высокие потолки 2,7–3 м — идеально для дизайнерских решений</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Толстые несущие стены — хорошая звукоизоляция</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Просторные комнаты — удобная меблировка</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Исторические элементы — лепнина, паркет, подоконники</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на ремонт в сталинке</h3>
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
$ctaFormId = 'stalinka_cta';
$ctaFormTitle = 'Рассчитать стоимость ремонта в сталинке';
$ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
$ctaButtonText = 'Рассчитать';
$ctaShowName = true;
$ctaHiddenCity = 'stalinka';
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит ремонт квартиры в сталинке?</summary><p class="mt-2 text-sm text-[#6b7280]">Косметический ремонт от 8 000 ₽/м², капитальный — от 13 000 ₽/м². Точная стоимость зависит от объёма работ, состояния инженерных сетей и материалов.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Можно ли сохранить лепнину при ремонте?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, мы работаем с историческими элементами: реставрируем лепнину, восстанавливаем паркет, обновляем подоконники. Это особенно актуально для домов с высокой исторической ценностью.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Какой ремонт лучше для сталинки?</summary><p class="mt-2 text-sm text-[#6b7280]">Для сталинок рекомендуем дизайнерский ремонт, чтобы раскрыть потенциал высоких потолков и просторных комнат. Капитальный ремонт также подходит для обновления инженерных сетей.</p></details>
            </div>
        </div>
    </section>
</main>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие виды домов</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/hrushchevka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в хрущёвке</a>
                <a href="/services/brezhnevka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в брежневке</a>
                <a href="/services/panelny" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Панельный дом</a>
                <a href="/services/monolit" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Монолитный дом</a>
                <a href="/services/kirpich" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Кирпичный дом</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт новостроек</a>
                <a href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Вторичное жильё</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт под ключ</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт студий</a>
                <a href="/services/doma" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт домов</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'stalinka_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт квартир в сталинке под ключ';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
