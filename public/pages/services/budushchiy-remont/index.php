<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт квартиры в будущем — узнайте цену заранее',
    'description' => 'Ремонт квартиры в новостройке под ключ от 8 000 ₽/м² в Москве. Узнайте стоимость ремонта уже сейчас, до получения ключей: план бюджета, смета за 24 часа, бесплатный замер. — Проект Квартира.',
    'canonical' => '/services/budushchiy-remont',
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
    'name' => 'Ремонт в будущем',
    'url' => '/services/budushchiy-remont',
  ),
),
    'schema' => array (
  0 => 
  array (
    '@type' => 'Service',
    'name' => 'Планирование ремонта квартиры',
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
        'name' => 'Когда лучше заказывать ремонт, если ключи будут через полгода?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Ориентир цены можно получить уже сейчас через калькулятор. Точную смету составим после бесплатного замера готовой квартиры — заявка ни к чему не обязывает.',
        ),
      ),
      1 => 
      array (
        '@type' => 'Question',
        'name' => 'Цена не вырастет, пока я жду ключи?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Точная стоимость фиксируется в договоре по смете после замера. Ориентир сейчас нужен, чтобы спланировать бюджет.',
        ),
      ),
      2 => 
      array (
        '@type' => 'Question',
        'name' => 'Что проверить при приёмке квартиры?',
        'acceptedAnswer' => 
        array (
          '@type' => 'Answer',
          'text' => 'Геометрию стен, стяжку, окна, электрику и сантехнику. Подробно — в нашем чек-листе приёмки. Можем выехать на приёмку вместе с вами.',
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
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Планируете ремонт квартиры? Узнайте стоимость уже сейчас</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Ждёте ключи от новостройки? Посчитайте ориентир цены заранее и спокойно спланируйте бюджет — а точную смету сделаем после бесплатного замера готовой квартиры.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">₽</span> Ориентир за 5 минут</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">✓</span> Замер бесплатно</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-[#876b55] flex items-center justify-center text-[10px]">✓</span> Старт в удобную дату</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Сколько заложить в бюджет</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Ориентиры 2026 года для планирования: точная цифра зависит от площади, состояния квартиры и материалов — её даст смета после замера.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Косметический — от 8 000 ₽/м²</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Капитальный — от 13 000 ₽/м²</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">•</span> Дизайнерский — от 18 000 ₽/м²</li>
                    </ul>
                    <p class="mt-4 text-sm text-[#6b7280]">Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%.</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Посчитайте свой метраж прямо сейчас: <a href="/calculator" class="text-[#6d5744] underline hover:text-[#5c4a3a]">калькулятор ремонта</a>, полные таблицы — на странице <a href="/prices" class="text-[#6d5744] underline hover:text-[#5c4a3a]">цен</a>.</p>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Как спланировать ремонт заранее</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-[#876b55]">1</span><span class="text-[#4b5563]">Ориентир сейчас: калькулятор и <a href="/services/smeta" class="text-[#6d5744] underline hover:text-[#5c4a3a]">пример сметы</a></span></div>
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-[#876b55]">2</span><span class="text-[#4b5563]">Приёмка квартиры: на что смотреть у застройщика — <a href="/blog/priemka-kvartiry-zastroyshchik" class="text-[#6d5744] underline hover:text-[#5c4a3a]">чек-лист</a></span></div>
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-[#876b55]">3</span><span class="text-[#4b5563]">Замер готовой квартиры — бесплатно</span></div>
                        <div class="flex gap-3 py-2"><span class="font-bold text-[#876b55]">4</span><span class="text-[#4b5563]">Смета в 3 вариантах за 24 часа, старт в удобную дату</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- F-04: ориентиры стоимости по метражу + чек-лист подготовки к ключам -->
    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Ориентир по бюджету: сколько заложить на ремонт</h2>
            <p class="mt-3 text-center text-[#6b7280] max-w-3xl mx-auto">Таблица для планирования, пока квартира ещё не получена. Итоговая сумма считается по факту замера.</p>

            <div class="mt-8 overflow-x-auto">
                <table class="w-full text-sm bg-white rounded-2xl border border-gray-200 overflow-hidden min-w-[520px]">
                    <thead>
                        <tr class="bg-[#f0e6da] text-[#554433]">
                            <th class="px-4 py-3 text-left font-semibold">Площадь</th>
                            <th class="px-4 py-3 text-right font-semibold">Косметический</th>
                            <th class="px-4 py-3 text-right font-semibold">Капитальный</th>
                            <th class="px-4 py-3 text-right font-semibold">Дизайнерский</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr><td class="px-4 py-3 font-medium">30 м²</td><td class="px-4 py-3 text-right">от 240 000 ₽</td><td class="px-4 py-3 text-right">от 390 000 ₽</td><td class="px-4 py-3 text-right">от 540 000 ₽</td></tr>
                        <tr class="bg-gray-50"><td class="px-4 py-3 font-medium">40 м²</td><td class="px-4 py-3 text-right">от 320 000 ₽</td><td class="px-4 py-3 text-right">от 520 000 ₽</td><td class="px-4 py-3 text-right">от 720 000 ₽</td></tr>
                        <tr><td class="px-4 py-3 font-medium">50 м²</td><td class="px-4 py-3 text-right">от 400 000 ₽</td><td class="px-4 py-3 text-right">от 650 000 ₽</td><td class="px-4 py-3 text-right">от 900 000 ₽</td></tr>
                        <tr class="bg-gray-50"><td class="px-4 py-3 font-medium">60 м²</td><td class="px-4 py-3 text-right">от 480 000 ₽</td><td class="px-4 py-3 text-right">от 780 000 ₽</td><td class="px-4 py-3 text-right">от 1 080 000 ₽</td></tr>
                        <tr><td class="px-4 py-3 font-medium">70 м²</td><td class="px-4 py-3 text-right">от 560 000 ₽</td><td class="px-4 py-3 text-right">от 910 000 ₽</td><td class="px-4 py-3 text-right">от 1 260 000 ₽</td></tr>
                        <tr class="bg-gray-50"><td class="px-4 py-3 font-medium">80 м²</td><td class="px-4 py-3 text-right">от 640 000 ₽</td><td class="px-4 py-3 text-right">от 1 040 000 ₽</td><td class="px-4 py-3 text-right">от 1 440 000 ₽</td></tr>
                        <tr><td class="px-4 py-3 font-medium">100 м²</td><td class="px-4 py-3 text-right">от 800 000 ₽</td><td class="px-4 py-3 text-right">от 1 300 000 ₽</td><td class="px-4 py-3 text-right">от 1 800 000 ₽</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-4 text-center text-sm text-[#6b7280]">Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%. Точный расчёт — после бесплатного замера.</p>

            <h3 class="mt-12 text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Чек-лист подготовки к получению ключей</h3>
            <p class="mt-3 text-center text-[#6b7280] max-w-3xl mx-auto">Пройдите этот список заранее — к дате передачи ключей вы будете знать, что делать с квартирой в первый же день.</p>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <ul class="space-y-2">
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Заранее уточните дату передачи ключей и срок, на который объект будет закрыт на ремонт</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Закажите замер за 1–2 недели до передачи: инженер оценит состояние квартиры</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Проверьте, работает ли электричество и вода в квартире</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Согласуйте с застройщиком доступ и наличие электричества на площадке ремонта</li>
                </ul>
                <ul class="space-y-2">
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Сделайте фото состояния квартиры до начала работ — это база для фиксации объёмов</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Определите, какие вещи забираете в квартиру, а какие оставляете на складе у застройщика</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Проверьте доступ к мусорной площадке и возможность вывоза мусора</li>
                    <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-[#876b55] mt-1">✓</span> Зафиксируйте в договоре дату начала работ и срок — ремонт к ключам идёт по графику</li>
                </ul>
            </div>
            <div class="mt-8 text-center">
                <a href="/contact" class="inline-block px-6 py-3 rounded-lg bg-[#876b55] hover:bg-[#6d5744] text-white font-semibold transition">Записаться на замер до получения ключей</a>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Ремонт в новостройке — с чего начать</h2>
            <p class="mt-3 text-center text-[#6b7280] max-w-2xl mx-auto">Если квартира ещё строится — изучите <a href="/services/novostroyka" class="text-[#6d5744] underline hover:text-[#5c4a3a]">ремонт в новостройке</a>: типы отделки от застройщика, усадка дома, приёмка.</p>
            <div class="mt-6 text-center">
                <a href="/blog/remont-novostroyki-2026" class="inline-block px-6 py-3 rounded-lg border border-gray-300 bg-white font-semibold text-[#111827] hover:border-[#876b55] transition">Гайд: с чего начать и на чём сэкономить →</a>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'budushchiy_cta';
$ctaFormTitle = 'Получить ориентир стоимости';
$ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
$ctaButtonText = 'Получить ориентир';
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Когда лучше заказывать ремонт, если ключи будут через полгода?</summary><p class="mt-2 text-sm text-[#6b7280]">Ориентир цены можно получить уже сейчас через калькулятор. Точную смету составим после бесплатного замера готовой квартиры — заявка ни к чему не обязывает.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Цена не вырастет, пока я жду ключи?</summary><p class="mt-2 text-sm text-[#6b7280]">Точная стоимость фиксируется в договоре по смете после замера. Ориентир сейчас нужен, чтобы спланировать бюджет.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что проверить при приёмке квартиры?</summary><p class="mt-2 text-sm text-[#6b7280]">Геометрию стен, стяжку, окна, электрику и сантехнику. Подробно — в нашем чек-листе приёмки. Можем выехать на приёмку вместе с вами.</p></details>
            </div>
        </div>
    </section>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Смотрите также</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Главная</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт в новостройке</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Ремонт под ключ</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Калькулятор</a>
                <a href="/services/smeta" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-[#876b55]">Смета</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'budushchiy_bottom_cta';
        $ctaFormTitle = 'Получить ориентир стоимости';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Планируете ремонт? Узнайте цену уже сейчас';
        $ctaSectionText = 'Оставьте заявку — посчитаем ориентир под ваш метраж, а точную смету сделаем после замера.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
