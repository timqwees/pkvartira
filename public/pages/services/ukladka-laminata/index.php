<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/1room/standard/2_37sqm/2.jpg';

$seo = TheFunction::seo([
    'title' => 'Укладка ламината — цена за м²',
    'description' => 'Укладка ламината в Москве — цена за квадратный метр вместе с укладкой фанеры. Стоимость работы от 350 ₽/м², с материалом от 800 ₽/м². Гарантия 3 года, выезд мастера бесплатно. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/ukladka-laminata',
    'image' => '/public/assets/images/portfolio-photos/1room/standard/2_37sqm/2.jpg',
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
    'name' => 'Укладка ламината',
    'url' => '/services/ukladka-laminata',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Укладка ламината в Москве',
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
        'name' => 'Сколько стоит укладка ламината за квадратный метр?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Работа от 350 ₽/м², с фанерой от 600 ₽/м², с материалом от 1 200 ₽/м².',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Нужно ли укладывать фанеру под ламинат?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Фанера нужна для выравнивания основания. На идеально ровный пол можно укладывать без неё.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Какой ламинат лучше выбрать?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Для квартиры рекомендуем 32-33 класс толщиной 8-12 мм. Поможем с выбором.',
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
        $heroH1 = 'Укладка ламината в Москве — цена за м²';
        $heroFormId = 'ukladka-laminata_hero';
        $heroSubtitle = 'Профессиональная укладка ламината с фанерой. Стоимость работы от 350 ₽/м². Фиксированная смета, гарантия 3 года.';
        include './public/components/hero-section.php';
        ?>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Сколько стоит укладка ламината?</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Стоимость укладки ламината зависит от объёма работ, основания и класса материала. Мы предлагаем прозрачные цены без скрытых платежей. В стоимость входит подготовка основания, укладка подложки, монтаж ламината и установка плинтуса.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Подготовка и выравнивание пола</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Укладка фанеры (при необходимости)</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Монтаж ламината любой сложности</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Установка плинтуса и порожков</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на укладку ламината</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка ламината (работа)</span><span class="font-bold text-[#111827]">от 350 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка фанеры</span><span class="font-bold text-[#111827]">от 250 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка ламината + фанера</span><span class="font-bold text-[#111827]">от 600 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Ламинат + работа (под ключ)</span><span class="font-bold text-[#111827]">от 1 200 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Демонтаж старого покрытия</span><span class="font-bold text-[#111827]">от 150 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Этапы работ</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Демонтаж</h3><p class="mt-1 text-sm text-[#6b7280]">Снимаем старое покрытие, вывозим мусор</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Основание</h3><p class="mt-1 text-sm text-[#6b7280]">Выравниваем пол, укладываем фанеру</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Укладка</h3><p class="mt-1 text-sm text-[#6b7280]">Монтируем ламинат с подложкой</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-[#876b55] flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Финиш</h3><p class="mt-1 text-sm text-[#6b7280]">Устанавливаем плинтус, убираем объект</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'ukladka-laminata_cta';
$ctaFormTitle = 'Заказать укладку ламината';
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
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Вопросы об укладке ламината</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит укладка ламината за квадратный метр?</summary><p class="mt-2 text-sm text-[#6b7280]">Работа от 350 ₽/м², с фанерой от 600 ₽/м², с материалом от 1 200 ₽/м².</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Нужно ли укладывать фанеру под ламинат?</summary><p class="mt-2 text-sm text-[#6b7280]">Фанера нужна для выравнивания основания. На идеально ровный пол можно укладывать без неё.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Какой ламинат лучше выбрать?</summary><p class="mt-2 text-sm text-[#6b7280]">Для квартиры рекомендуем 32-33 класс толщиной 8-12 мм. Поможем с выбором.</p></details>
            </div>
        </div>
    </section>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/keramogranit-nazarovo" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Укладка керамогранита</a>
                <a href="/services/solnechnogorsk" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Солнечногорске</a>
                <a href="/services/lyubertsy" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Люберцах</a>
                <a href="/services/odintsovo" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в Одинцово</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт под ключ</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт новостроек</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'ukladka-laminata_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: укладка ламината в Москве';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
