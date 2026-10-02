<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Ремонт новостройки с черновой отделкой — цены';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Ремонт новостройки с черновой отделкой в Москве. Штукатурка, стяжка, разводка коммуникаций. Подготовка к чистовой отделке. Цена от 8 000 ₽/м². Гарантия 3 года. — Проект Квартира (Проект Квартира).',155)); ?>"><meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/chernovaya'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Ремонт с черновой отделкой","item": "<?= $site['baseUrl']; ?>/services/chernovaya"}
            ]},
            {"@type": "Service","name": "Ремонт новостройки с черновой отделкой","provider": {"@id": "<?= $site['baseUrl']; ?>#organization"},"areaServed": {"@type": "City","name": "Москва"}},
            {"@type": "FAQPage","mainEntity": [
                {"@type": "Question","name": "Сколько стоит черновая отделка квартиры в новостройке?","acceptedAnswer": {"@type": "Answer","text": "Черновая отделка квартиры в новостройке стоит от 8 000 ₽/м²: штукатурка стен, стяжка пола, разводка электрики и сантехники. Точную смету даём после бесплатного замера."}},
                {"@type": "Question","name": "Какая цена черновой отделки квартиры в новостройке?","acceptedAnswer": {"@type": "Answer","text": "Цена черновой отделки квартиры в новостройке — от 8 000 ₽/м². Полный черновой ремонт квартиры в новостройке с материалами — от 13 000 ₽/м²."}},
                {"@type": "Question","name": "Сколько стоит черновой ремонт квартиры в новостройке?","acceptedAnswer": {"@type": "Answer","text": "Стоимость чернового ремонта квартиры в новостройке — от 8 000 ₽/м². Например, студия 28 м² — от 224 000 ₽, 1-комнатная 45 м² — от 360 000 ₽."}},
                {"@type": "Question","name": "Как рассчитать черновой ремонт новостройки?","acceptedAnswer": {"@type": "Answer","text": "Оставьте заявку — приедем на бесплатный замер и за 24 часа рассчитаем точную смету чернового ремонта новостройки с фиксированной ценой."}}
            ]}
        ]
    }
    </script>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт новостройки с черновой отделкой</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Черновая отделка новостройки: штукатурка стен, стяжка пола, разводка коммуникаций. Подготовка к чистовому ремонту. Цена от 8 000 ₽/м². Гарантия 3 года.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">₽</span> от 8 000 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Гарантия 3 года</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Замер бесплатно</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Сколько стоит черновая отделка квартиры в новостройке</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Стоимость чернового ремонта в новостройке — от 8 000 ₽/м². Черновая отделка квартиры в новостройке по этой цене включает штукатурку стен по маякам, стяжку пола, разводку электрики и сантехники — квартира готова к чистовому ремонту.</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Черновая отделка квартиры в новостройке, цена под ключ: студия 28 м² — от 224 000 ₽, 1-комнатная 45 м² — от 360 000 ₽, 2-комнатная 60 м² — от 480 000 ₽. Ремонт в новостройке с черновой отделкой делаем за 30–60 дней.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Штукатурка стен по маякам с выравниванием</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Цементно-песчаная или сухая стяжка пола</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Разводка электрики: кабели, подрозетники, щитки</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Подводка водоснабжения и канализации</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Установка окон и подоконников (при необходимости)</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на черновую отделку в новостройке</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Косметический</span><span class="font-bold text-[#111827]">от 8 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Капитальный</span><span class="font-bold text-[#111827]">от 13 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Дизайнерский</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Как мы работаем</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Заявка</h3><p class="mt-1 text-sm text-[#6b7280]">Оставьте заявку на сайте</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Выезд</h3><p class="mt-1 text-sm text-[#6b7280]">Инженер приедет на замер</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Смета</h3><p class="mt-1 text-sm text-[#6b7280]">Фиксированная смета в день обращения</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Ремонт</h3><p class="mt-1 text-sm text-[#6b7280]">Выполняем в срок с гарантией</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'chernovaya_cta';
$ctaFormTitle = 'Рассчитать стоимость черновой отделки';
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит черновая отделка квартиры в новостройке?</summary><p class="mt-2 text-sm text-[#6b7280]">От 8 000 ₽/м²: штукатурка, стяжка, электрика, сантехника. Студия 28 м² — от 224 000 ₽, 45 м² — от 360 000 ₽. Точную смету рассчитаем после бесплатного замера.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Какая цена черновой отделки квартиры в новостройке?</summary><p class="mt-2 text-sm text-[#6b7280]">Цена черновой отделки квартиры в новостройке — от 8 000 ₽/м², черновой ремонт квартиры в новостройке под ключ с материалами — от 13 000 ₽/м². Фиксируем в договоре.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит черновой ремонт квартиры в новостройке?</summary><p class="mt-2 text-sm text-[#6b7280]">Стоимость чернового ремонта квартиры в новостройке зависит от площади и состояния объекта: в среднем от 8 000 ₽/м². Рассчитайте свой вариант в <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">калькуляторе</a> за 1 минуту.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Как рассчитать черновой ремонт новостройки?</summary><p class="mt-2 text-sm text-[#6b7280]">Оставьте заявку — инженер приедет бесплатно, замерит квартиру и за 24 часа подготовит смету. Или посчитайте предварительно в <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">калькуляторе</a>.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что такое черновая отделка?</summary><p class="mt-2 text-sm text-[#6b7280]">Это подготовительные работы: штукатурка стен, стяжка пола, разводка электрики и сантехники. После черновой отделки квартира готова к чистовому ремонту.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит черновая отделка?</summary><p class="mt-2 text-sm text-[#6b7280]">Цены от 8 000 ₽/м². Точная стоимость зависит от объёма работ и состояния объекта. Рассчитаем смету после бесплатного замера.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Можно ли сразу сделать чистовую отделку?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, если стены уже оштукатурены и пол стянут. Если нет — сначала выполняем черновую, затем чистовую. Выполняем полный цикл.</p></details>
            </div>
        </div>
    </section>
</main>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/evro-dvushka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт евродвушки</a>
                <a href="/services/evro-treshka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт евротрешки</a>
                <a href="/services/predchistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Предчистовая отделка</a>
                <a href="/services/chistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Чистовая отделка</a>
                <a href="/services/bez-otdelki" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Без отделки</a>
                <a href="/services/white-box" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">White box</a>
                <a href="/services/ot-zastroyschika" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">От застройщика</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Вторичное жильё</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт студий</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'chernovaya_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт новостройки с черновой отделкой';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
