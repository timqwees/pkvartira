<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт с отделкой от застройщика — цены',
    'description' => 'Ремонт новостройки с отделкой от застройщика в Москве. Доработка и улучшение стандартной отделки. Замена, переделка, доработка под ваш вкус. Цена от 8 000 ₽/м². Гарантия 3 года. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/ot-zastroyschika',
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
    'name' => 'Ремонт с отделкой от застройщика',
    'url' => '/services/ot-zastroyschika',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Ремонт новостройки с отделкой от застройщика',
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
        'name' => 'Стоит ли брать квартиру с отделкой от застройщика?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Да, если планируете доработать. Отделка от застройщика — это база, которую можно улучшить под свой вкус. Обойдётся дешевле, чем ремонт с нуля.',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Что можно улучшить в отделке от застройщика?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Почти всё: замена полов, переклейка обоев, установка качественных дверей, улучшение освещения, замена сантехники.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Сколько стоит доработка отделки?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Цены от 8 000 ₽/м². Точная стоимость зависит от объёма работ. Рассчитаем смету после бесплатного замера.',
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
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
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
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт новостройки с отделкой от застройщика</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Доработка и улучшение стандартной отделки от застройщика. Замена, переделка, доработка под ваш вкус. Цена от 8 000 ₽/м². Гарантия 3 года.</p>
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
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Доработка отделки от застройщика</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Застройщик выполняет стандартную отделку по минимальной смете: базовые обои, линолеум, простая плитка. Многим владельцам такая отделка не подходит по качеству или дизайну.</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Выполняем доработку и улучшение: замена напольного покрытия, переклейка обоев, замена сантехники, установка нормальных дверей, переделка освещения. Работаем аккуратно, не повреждая то, что можно оставить.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Замена линолеума на ламинат или плитку</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Переклейка обоев, покраска стен</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Замена стандартных дверей на качественные</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Улучшение освещения, замена розеток</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Замена сантехники и смесителей</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Доработка кухонного гарнитура</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на доработку отделки</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Косметический</span><span class="font-bold text-[#111827]">от 8 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Капитальный</span><span class="font-bold text-[#111827]">от 13 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Дизайнерский</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                    </div>
                    <p class="mt-4 text-sm text-[#6b7280]">Цены указаны за работы, без учёта материалов. Итоговую стоимость считаем после замера.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Почему 5 000 ₽/м² и 8 000 ₽/м² — это разные объёмы работ</h2>
            <p class="mt-3 text-center text-[#6b7280] max-w-3xl mx-auto">Цена зависит не от адреса квартиры, а от того, что именно нужно сделать с базовой отделкой застройщика.</p>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">От 5 000 ₽/м² — обновление отделки</h3>
                    <p class="mt-2 text-sm text-[#4b5563]">Берём то, что застройщик уже сделал, и освежаем покрытия: переклеиваем обои, красим потолки, меняем линолеум на ламинат, ставим розетки и светильники. Инженерия, стяжка и штукатурка остаются как есть — мы их не трогаем.</p>
                    <p class="mt-3 text-sm font-semibold text-[#876b55]">Подходит, когда базовая отделка в хорошем состоянии и нужно просто освежить.</p>
                </div>
                <div class="bg-white rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">От 8 000 ₽/м² — полная доработка</h3>
                    <p class="mt-2 text-sm text-[#4b5563]">Дополнительно меняем покрытия, ставим нормальные двери и сантехнику, переделываем освещение, выравниваем стены и полы, доводим кухонный блок. Это уже полноценный ремонт под ключ с инженерией.</p>
                    <p class="mt-3 text-sm font-semibold text-[#876b55]">Подходит, когда отделка застройщика не устраивает по качеству или планировке.</p>
                </div>
            </div>
            <div class="mt-6 bg-white rounded-xl p-6">
                <h3 class="text-lg font-bold text-[#111827]">Что входит в любой вариант</h3>
                <ul class="mt-3 space-y-2">
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Демонтаж старых покрытий и вывоз мусора</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Замена электрики и освещения в зоне ремонта</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Фиксированная смета в договоре — без роста цены в процессе</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Ежедневный фотоотчёт и приёмка этапов по чек-листу</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Гарантия 3 года на все выполненные работы</li>
                </ul>
                <p class="mt-4 text-sm text-[#6b7280]">Точный вариант определяем на замере: смотрим состояние базовой отделки и считаем смету по объёму работ.</p>
            </div>
        </div>
    </section>

    <section class="py-12">
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
$ctaFormId = 'ot-zastroyschika_cta';
$ctaFormTitle = 'Рассчитать стоимость доработки';
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Стоит ли брать квартиру с отделкой от застройщика?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, если планируете доработать. Отделка от застройщика — это база, которую можно улучшить под свой вкус. Обойдётся дешевле, чем ремонт с нуля.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что можно улучшить в отделке от застройщика?</summary><p class="mt-2 text-sm text-[#6b7280]">Почти всё: замена полов, переклейка обоев, установка качественных дверей, улучшение освещения, замена сантехники.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит доработка отделки?</summary><p class="mt-2 text-sm text-[#6b7280]">Цены от 8 000 ₽/м². Точная стоимость зависит от объёма работ. Рассчитаем смету после бесплатного замера.</p></details>
            </div>
        </div>
    </section>
</main>
<?php
$otdelkaClusterCurrent = 'ot-zastroyschika';
include './public/components/otdelka-cluster.php';
?>

    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/evro-dvushka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт евродвушки</a>
                <a href="/services/evro-treshka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт евротрешки</a>
                <a href="/services/predchistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Предчистовая отделка</a>
                <a href="/services/chistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Чистовая отделка</a>
                <a href="/services/chernovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Черновая отделка</a>
                <a href="/services/bez-otdelki" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Без отделки</a>
                <a href="/services/white-box" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">White box</a>
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
        $ctaFormId = 'ot-zastroyschika_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт новостройки с отделкой от застройщика';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
