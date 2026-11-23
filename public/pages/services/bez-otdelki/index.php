<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Ремонт новостройки без отделки — цены';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title, 55)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="Ремонт новостройки без отделки в Москве. Полный цикл от голых стен: черновая + чистовая отделка. Цена от 8 000 ₽/м². Гарантия 3 года. От компании Проект Квартира (Проект Квартира)."><meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/bez-otdelki'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title, 60)); ?> | Проект Квартира">
    <meta property="og:description" content="Ремонт новостройки без отделки в Москве. Полный цикл от голых стен: черновая + чистовая отделка. Цена от 8 000 ₽/м². Гарантия 3 года. От компании Проект Квартира (Проект Квартира).">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/services/bez-otdelki'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title, 60)); ?> | Проект Квартира">
    <meta name="twitter:description" content="Ремонт новостройки без отделки в Москве. Полный цикл от голых стен: черновая + чистовая отделка. Цена от 8 000 ₽/м². Гарантия 3 года. От компании Проект Квартира (Проект Квартира).">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Ремонт без отделки","item": "<?= $site['baseUrl']; ?>/services/bez-otdelki"}
            ]},
            {"@type": "Service","name": "Ремонт новостройки без отделки","provider": {"@id": "<?= $site['baseUrl']; ?>#organization"},"areaServed": {"@type": "City","name": "Москва"}}
        ]
    }
    </script>

    <script type="application/ld+json">
    {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Что такое новостройка без отделки?", "acceptedAnswer": {"@type": "Answer", "text": "Это квартира со голыми стенами, без штукатурки, стяжки и коммуникаций. Самый дешёвый вариант входа, но требует полного цикла ремонтных работ."}}, {"@type": "Question", "name": "Сколько времени занимает полный цикл?", "acceptedAnswer": {"@type": "Answer", "text": "Сроки зависят от площади и сложности. В среднем 6–10 недель. Точные сроки фиксируем в договоре."}}, {"@type": "Question", "name": "Выгоднее ли брать квартиру без отделки?", "acceptedAnswer": {"@type": "Answer", "text": "Да, квартиры без отделки дешевле. Но полный цикл ремонта обойдётся дороже, чем чистовая поверх предчистовой. Сравним цены на замере."}}]}
    </script>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт новостройки без отделки</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Полный цикл ремонта от голых стен: черновая отделка, коммуникации, чистовая отделка. Всё в одном договоре. Цена от 8 000 ₽/м². Гарантия 3 года.</p>
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
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Полный цикл от голых стен</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Новостройка без отделки — это квартира с голыми стенами, без штукатурки, стяжки и коммуникаций. Самый бюджетный вариант входа, но требует полного цикла ремонтных работ.</p>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Выполняем всё от и до: штукатурка, стяжка, разводка электрики и сантехники, чистовая отделка, установка дверей и сантехники. Вам не нужно искать нескольких подрядчиков — всё в одном договоре.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Штукатурка стен, стяжка пола</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Разводка электрики от щитка до точек</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Подводка водоснабжения и канализации</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Чистовая отделка: обои, плитка, ламинат</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Установка дверей, сантехники, освещения</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на полный цикл</h3>
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
$ctaFormId = 'bez-otdelki_cta';
$ctaFormTitle = 'Рассчитать стоимость полного цикла';
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
                <details open class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что такое новостройка без отделки?</summary><p class="mt-2 text-sm text-[#6b7280]">Это квартира со голыми стенами, без штукатурки, стяжки и коммуникаций. Самый дешёвый вариант входа, но требует полного цикла ремонтных работ.</p></details>
                <details open class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько времени занимает полный цикл?</summary><p class="mt-2 text-sm text-[#6b7280]">Сроки зависят от площади и сложности. В среднем 6–10 недель. Точные сроки фиксируем в договоре.</p></details>
                <details open class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Выгоднее ли брать квартиру без отделки?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, квартиры без отделки дешевле. Но полный цикл ремонта обойдётся дороже, чем чистовая поверх предчистовой. Сравним цены на замере.</p></details>
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
                <a href="/services/chernovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Черновая отделка</a>
                <a href="/services/white-box" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">White box</a>
                <a href="/services/ot-zastroyschika" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">От застройщика</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a                 <a href="/services/budushchiy-remont" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт к дате ключей</a>
                <a href="/services/chernovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Черновая отделка</a>
                <a href="/services/chistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Чистовая отделка</a>
                <a href="/services/ot-zastroyschika" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Отделка от застройщика</a>
                <a href="/services/predchistovaya" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Предчистовая отделка</a>
                <a href="/services/white-box" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">White box</a>
                href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Вторичное жильё</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт студий</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->

        <!-- N-15. Кейс новостройки 86 м² -->
        <section class="py-16 bg-white reveal">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="md:w-1/2">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Кейс: Новостройка 86 м², 60 дней, 1 118 000 ₽</h2>
                        <p class="text-gray-600 mb-6">Квартира в новой Москве, сдача 2026. Полный цикл: от приёмки у застройщика до финальной уборки. Черновая отделка, штукатурка, электрика, сантехника, плитка, ламинат, двери.</p>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-600"></i>Площадь 86 м², 2-комнатная</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-600"></i>Срок 60 дней</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-600"></i>Бюджет 1 118 000 ₽ — фиксировано в договоре</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-check text-green-600"></i>Гарантия 3 года на все работы</li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <a href="/services/pod-klyuch" class="inline-flex items-center justify-center w-full md:w-auto px-6 py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                            Подобный ремонт →
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'bez-otdelki_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: ремонт новостройки без отделки';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
