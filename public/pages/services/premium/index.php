<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Ремонт квартиры под ключ с дизайн проектом';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Ремонт квартиры под ключ с дизайн проектом в Москве от 18 000 ₽/м². Авторский дизайн, элитные материалы, умный дом, меблировка. Смета за 24 часа, гарантия 3 года. — Проект Квартира (Проект Квартира).',155)); ?>"><meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/premium'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Премиальный ремонт","item": "<?= $site['baseUrl']; ?>/services/premium"}
            ]},
            {"@type": "Service","name": "Ремонт квартиры под ключ с дизайн проектом","provider": {"@id": "<?= $site['baseUrl']; ?>#organization"},"areaServed": {"@type": "City","name": "Москва"}}
        ]
    }
    </script>

    <script type="application/ld+json">
    {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Что входит в ремонт квартиры под ключ с дизайн проектом?", "acceptedAnswer": {"@type": "Answer", "text": "Авторский дизайн-проект, черновые работы, замена электрики и сантехники, чистовая отделка, умный дом, меблировка и финальная уборка. Цена фиксируется в договоре."}}, {"@type": "Question", "name": "Сколько стоит ремонт квартиры под ключ с дизайн проектом за м²?", "acceptedAnswer": {"@type": "Answer", "text": "От 18 000 ₽/м² (премиум) и от 25 000 ₽/м² (люкс). Например, 1-комнатная 45 м² — от 810 000 ₽, 2-комнатная 60 м² — от 1 080 000 ₽. Точную смету даём после бесплатного замера."}}, {"@type": "Question", "name": "Можно ли сделать ремонт по готовому дизайн проекту?", "acceptedAnswer": {"@type": "Answer", "text": "Да, берём в работу готовые дизайн проекты: проверяем чертежи, считаем смету и выполняем ремонт под ключ. Также адаптируем готовые решения под вашу планировку."}}, {"@type": "Question", "name": "Что входит в премиальный ремонт?", "acceptedAnswer": {"@type": "Answer", "text": "Премиальный ремонт включает элитные материалы, авторский дизайн, интеграцию «умного дома», меблировку, климат-контроль и полную комплектацию квартиры."}}, {"@type": "Question", "name": "Сколько времени занимает премиальный ремонт?", "acceptedAnswer": {"@type": "Answer", "text": "Сроки зависят от площади и сложности проекта. В среднем от 2 до 6 месяцев. Точные сроки фиксируются в договоре."}}, {"@type": "Question", "name": "Можно ли сделать премиальный ремонт в новостройке?", "acceptedAnswer": {"@type": "Answer", "text": "Да, работаем с новостройками и вторичным жильём. Выполняем полный цикл от черновой отделки до меблировки."}}]}
    </script>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт квартиры под ключ с дизайн-проектом</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Премиальный ремонт квартир в Москве: авторский дизайн-проект, элитные материалы, умный дом и меблировка. Стоимость ремонта с дизайн проектом — от 18 000 ₽/м². Гарантия 3 года.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">₽</span> от 18 000 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Гарантия 3 года</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Авторский дизайн</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Сколько стоит ремонт квартиры под ключ с дизайн проектом</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Стоимость ремонта квартиры под ключ с дизайн проектом — от 18 000 ₽/м². Дизайн-проект включён в цену: авторский проект, черновые работы, инженерия, чистовая отделка, умный дом и меблировка.</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Примеры: 1-комнатная 45 м² — от 810 000 ₽, 2-комнатная 60 м² — от 1 080 000 ₽. Точную смету рассчитаем после бесплатного замера или <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">посчитайте в калькуляторе</a>.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Элитные материалы: мрамор, натуральное дерево, кожа</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Авторский дизайн-проект от ведущих архитекторов</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Интеграция «умного дома» и системы климат-контроля</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Меблировка и декор по индивидуальному заказу</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на премиальный ремонт</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Премиум</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Люкс</span><span class="font-bold text-[#111827]">от 25 000 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Что входит в ремонт квартиры под ключ с дизайн проектом</h2>
            <p class="mt-3 text-center text-[#4b5563] max-w-2xl mx-auto">Полный цикл: от первого эскиза до меблировки. Работаем и по своему, и по готовому дизайн проекту.</p>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Авторский дизайн-проект</div><p class="mt-1 text-sm text-[#6b7280]">Планировка, 3D-визуализация, чертежи, ведомость материалов.</p></div>
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Черновые работы</div><p class="mt-1 text-sm text-[#6b7280]">Демонтаж, стяжка, штукатурка по маякам.</p></div>
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Инженерия</div><p class="mt-1 text-sm text-[#6b7280]">Электрика, сантехника, умный дом, климат-контроль.</p></div>
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Чистовая отделка</div><p class="mt-1 text-sm text-[#6b7280]">Элитные материалы: мрамор, дерево, декоративные покрытия.</p></div>
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Меблировка и декор</div><p class="mt-1 text-sm text-[#6b7280]">Мебель и свет по индивидуальному заказу, текстиль.</p></div>
                <div class="bg-[#f9fafb] rounded-xl p-5 border border-gray-100"><div class="font-semibold text-[#111827]">Сдача и уборка</div><p class="mt-1 text-sm text-[#6b7280]">Приёмка по акту, клининг, гарантия 3 года.</p></div>
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
$ctaFormId = 'premium_cta';
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что входит в ремонт квартиры под ключ с дизайн проектом?</summary><p class="mt-2 text-sm text-[#6b7280]">Авторский дизайн-проект, черновые работы, замена электрики и сантехники, чистовая отделка элитными материалами, умный дом, меблировка и финальная уборка. Цена фиксируется в договоре.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит ремонт квартиры под ключ с дизайн проектом за м²?</summary><p class="mt-2 text-sm text-[#6b7280]">От 18 000 ₽/м² (премиум) и от 25 000 ₽/м² (люкс). Например, 45 м² — от 810 000 ₽. Точную смету рассчитаем после бесплатного замера или <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">посчитайте в калькуляторе</a>.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Можно ли сделать ремонт по готовому дизайн проекту?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, берём в работу готовые дизайн проекты: проверяем чертежи, считаем смету и выполняем ремонт под ключ. Адаптируем готовые решения под вашу планировку.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что входит в премиальный ремонт?</summary><p class="mt-2 text-sm text-[#6b7280]">Премиальный ремонт включает элитные материалы, авторский дизайн, интеграцию «умного дома», меблировку, климат-контроль и полную комплектацию квартиры.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько времени занимает премиальный ремонт?</summary><p class="mt-2 text-sm text-[#6b7280]">Сроки зависят от площади и сложности проекта. В среднем от 2 до 6 месяцев. Точные сроки фиксируются в договоре.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Можно ли сделать премиальный ремонт в новостройке?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, работаем с новостройками и вторичным жильём. Выполняем полный цикл от черновой отделки до меблировки.</p></details>
            </div>
        </div>
    </section>

    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Вторичное жильё</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт студий</a>
                <a href="/services/doma" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт домов</a>
                <a href="/services/business" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Бизнес класс</a>
                <a href="/services/komfort" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Комфорт класс</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'premium_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: премиальный ремонт квартир в Москве';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
