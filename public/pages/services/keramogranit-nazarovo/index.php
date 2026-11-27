<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/3room/standard/2_60sqm/6.webp';

$seo = TheFunction::seo([
    'title' => 'Укладка керамогранита — цена за м²',
    'description' => 'Укладка керамогранита — цена за квадратный метр. Стоимость работы от 1 200 ₽/м². Укладка на пол и стены, с подрезкой и без. Гарантия 3 года. Работаем в Москве и области. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/keramogranit-nazarovo',
    'image' => '/public/assets/images/portfolio-photos/3room/standard/2_60sqm/6.webp',
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
    'name' => 'Укладка керамогранита',
    'url' => '/services/keramogranit-nazarovo',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Укладка керамогранита',
    'provider' => 
    array (
      '@id' => '#organization',
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
        'name' => 'Сколько стоит укладка керамогранита за квадратный метр?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Цена работы от 1 200 ₽/м² на пол, от 1 400 ₽/м² на стены. С материалом от 2 500 ₽/м².',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Какой керамогранит лучше для пола?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Для пола рекомендуем керамогранит толщиной от 8 мм, класс износостойкости PEI 4-5.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Сколько сохнет керамогранит после укладки?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Ходить можно через 24 часа, полная нагрузка через 5-7 дней.',
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
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="noindex, follow">
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
        $heroH1 = 'Укладка керамогранита — цена за м²';
        $heroFormId = 'keramogranit-nazarovo_hero';
        $heroSubtitle = 'Профессиональная укладка керамогранита на пол и стены. Стоимость работы от 1 200 ₽/м². Фиксированная смета, гарантия 3 года.';
        include './public/components/hero-section.php';
        ?>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Цена укладки керамогранита</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Стоимость укладки керамогранита зависит от формата плитки, сложности узора и подготовки основания. Выполняем работы любой сложности: от стандартной укладки до художественного панно. Используем профессиональные инструменты и качественные смеси.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Подготовка и выравнивание основания</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Укладка керамогранита на пол и стены</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Резка, подрезка, сверление отверстий</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Затирка швов, финишная обработка</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Стоимость работ</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка керамогранита на пол</span><span class="font-bold text-[#111827]">от 1 200 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка на стены</span><span class="font-bold text-[#111827]">от 1 400 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Крупноформатный (от 60×60)</span><span class="font-bold text-[#111827]">от 1 600 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Под ключ (с материалом)</span><span class="font-bold text-[#111827]">от 2 500 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Демонтаж старой плитки</span><span class="font-bold text-[#111827]">от 300 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Этапы укладки керамогранита</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Подготовка</h3><p class="mt-1 text-sm text-[#6b7280]">Выравниваем пол/стены, грунтуем</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Разметка</h3><p class="mt-1 text-sm text-[#6b7280]">Делаем раскладку с учётом рисунка</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Укладка</h3><p class="mt-1 text-sm text-[#6b7280]">Монтируем керамогранит на клей</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Затирка</h3><p class="mt-1 text-sm text-[#6b7280]">Затираем швы, очищаем поверхность</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'keramogranit-nazarovo_cta';
$ctaFormTitle = 'Заказать укладку керамогранита';
$ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
$ctaButtonText = 'Заказать';
$ctaShowName = true;
$ctaExpandable = false;
include './public/components/cta-form.php';
?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Вопросы об укладке керамогранита</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит укладка керамогранита за квадратный метр?</summary><p class="mt-2 text-sm text-[#6b7280]">Цена работы от 1 200 ₽/м² на пол, от 1 400 ₽/м² на стены. С материалом от 2 500 ₽/м².</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Какой керамогранит лучше для пола?</summary><p class="mt-2 text-sm text-[#6b7280]">Для пола рекомендуем керамогранит толщиной от 8 мм, класс износостойкости PEI 4-5.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько сохнет керамогранит после укладки?</summary><p class="mt-2 text-sm text-[#6b7280]">Ходить можно через 24 часа, полная нагрузка через 5-7 дней.</p></details>
            </div>
        </div>
    </section>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/ukladka-laminata" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Укладка ламината</a>
                <a href="/services/solnechnogorsk" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Солнечногорске</a>
                <a href="/services/mytishchi" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Мытищах</a>
                <a href="/services/balashikha" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Балашихе</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт под ключ</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт новостроек</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'keramogranit-nazarovo_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: укладка керамогранита';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
