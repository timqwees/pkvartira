<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Дизайн и ремонт квартир в ЖК Символ — под ключ';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
$caseProjects = TheFunction::featuredPortfolio(null, 1);
$case = $caseProjects[0] ?? null;
$caseCover = ($case && !empty($case['cover']))
    ? $site['baseUrl'] . '/' . $case['folder_image'] . '/' . $case['cover']
    : $site['baseUrl'] . $bg_url;
$caseUrl = ($case && !empty($case['slug'])) ? TheFunction::portfolioProjectUrl($case['slug']) : $site['baseUrl'] . '/portfolio';
$caseTitle = $case['title'] ?? 'Дизайн и ремонт квартиры под ключ';
$caseSize = $case['size'] ?? '60 м²';
$caseDuration = $case['duration'] ?? '';
$casePrice = $case['price'] ?? '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Дизайн и ремонт квартир в ЖК Символ под ключ в Москве от 8 000 ₽/м². Знаем планировки и требования УК комплекса. Фиксированная смета, гарантия 3 года. Бесплатный замер.',155)); ?>"><meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/zhk-simvol'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                    {"@type": "ListItem","position": 2,"name": "Ремонт в ЖК Символ","item": "<?= $site['baseUrl']; ?>/services/zhk-simvol"}
                ]
            },
            {
                "@type": "Service",
                "name": "Дизайн и ремонт квартир в ЖК Символ",
                "provider": {"@id": "<?= $site['baseUrl']; ?>#organization"},
                "areaServed": {"@type": "City","name": "Москва"},
                "description": "Дизайн и ремонт квартир в жилом комплексе Символ под ключ. Цены от 8 000 ₽/м²."
            }
        ]
    }
    </script>

    <script type="application/ld+json">
    {"@context": "https://schema.org", "@type": "FAQPage", "mainEntity": [{"@type": "Question", "name": "Сколько стоит ремонт квартиры в ЖК Символ?", "acceptedAnswer": {"@type": "Answer", "text": "Ремонт квартиры в ЖК Символ под ключ — от 8 000 ₽/м² косметический, от 13 000 ₽/м² капитальный, от 18 000 ₽/м² дизайнерский. Точную смету даём после бесплатного замера."}}, {"@type": "Question", "name": "Делаете ли дизайн и ремонт квартиры в ЖК Символ под ключ?", "acceptedAnswer": {"@type": "Answer", "text": "Да, делаем дизайн и ремонт квартир в ЖК Символ под ключ: знаем планировки корпусов и требования управляющей компании, берём на себя согласования, закупку и вывоз мусора."}}, {"@type": "Question", "name": "Сколько стоит дизайн проект квартиры в ЖК Символ?", "acceptedAnswer": {"@type": "Answer", "text": "Дизайн проект квартиры — от 1 200 ₽/м². При заказе ремонта под ключ делаем скидку на проект. Посчитайте свой метраж в калькуляторе на сайте."}}]}
    </script>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Дизайн и ремонт квартир в ЖК Символ</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Ремонт под ключ в жилом комплексе Символ: знаем планировки корпусов и требования УК. Дизайн-проект, закупка, согласования — берём на себя. Гарантия 3 года.</p>
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
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Ремонт в ЖК Символ под ключ</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Делаем дизайн и ремонт квартир в ЖК Символ под ключ: от приёмки у застройщика до меблировки. Знаем типовые планировки корпусов, согласовываем шумные работы и вывоз мусора с управляющей компанией.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Приёмка квартиры от застройщика</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Дизайн-проект под вашу планировку</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Черновой, капитальный, дизайнерский ремонт</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Работаем по правилам УК комплекса</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на ремонт в ЖК Символ</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Косметический</span><span class="font-bold text-[#111827]">от 8 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Капитальный</span><span class="font-bold text-[#111827]">от 13 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Дизайнерский</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Дизайн-проект</span><span class="font-bold text-[#111827]">от 1 200 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-8">
                <span class="text-sm font-semibold text-gray-500">Новые проекты дизайна и ремонта под ключ</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">Пример нашего кейса</h2>
            </div>
            <article class="grid grid-cols-1 lg:grid-cols-12 bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                <div class="lg:col-span-7 relative h-64 md:h-96 bg-gray-200">
                    <img src="<?= htmlspecialchars($caseCover) ?>"
                        alt="<?= htmlspecialchars($caseTitle) ?>"
                        title="<?= htmlspecialchars($caseTitle) ?>"
                        class="absolute inset-0 w-full h-full object-cover" width="1024" height="768"
                        decoding="async" loading="lazy">
                </div>
                <div class="lg:col-span-5 bg-white p-6 md:p-8 flex flex-col justify-center">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1"><?= htmlspecialchars($caseTitle) ?></h3>
                    <p class="text-sm text-gray-500 mb-6">Дизайн и ремонт квартиры под ключ</p>
                    <dl class="text-sm mb-8">
                        <div class="flex items-center justify-between gap-4 py-3 border-t border-gray-100">
                            <dt class="text-gray-500">Площадь объекта</dt>
                            <dd class="font-semibold text-gray-900 text-right"><?= htmlspecialchars($caseSize) ?></dd>
                        </div>
                        <?php if ($caseDuration !== ''): ?>
                            <div class="flex items-center justify-between gap-4 py-3 border-t border-gray-100">
                                <dt class="text-gray-500">Срок работ</dt>
                                <dd class="font-semibold text-gray-900 text-right"><?= htmlspecialchars($caseDuration) ?></dd>
                            </div>
                        <?php endif; ?>
                        <?php if ($casePrice !== ''): ?>
                            <div class="flex items-center justify-between gap-4 py-3 border-t border-b border-gray-100">
                                <dt class="text-gray-500">Стоимость работ</dt>
                                <dd class="font-semibold text-gray-900 text-right"><?= htmlspecialchars($casePrice) ?></dd>
                            </div>
                        <?php endif; ?>
                    </dl>
                    <div class="flex flex-col gap-3">
                        <button data-button-dialog
                            class="w-full inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                            ОБСУДИТЬ СВОЙ ПРОЕКТ
                        </button>
                        <a href="<?= htmlspecialchars($caseUrl) ?>"
                            class="w-full inline-flex items-center justify-center px-6 py-3 rounded-lg border border-gray-300 text-gray-800 text-sm font-bold hover:text-blue-700 transition">
                            ПОДРОБНЕЕ О ПРОЕКТЕ
                        </a>
                    </div>
                </div>
            </article>
            <p class="mt-4 text-center text-sm text-gray-500">Хотите так же в ЖК Символ? <a href="/calculator" class="text-orange-600 font-semibold hover:text-orange-700 underline">Посчитайте свой метраж в калькуляторе</a>.</p>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Как мы работаем</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Заявка</h3><p class="mt-1 text-sm text-[#6b7280]">Оставьте заявку на сайте или позвоните</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Замер</h3><p class="mt-1 text-sm text-[#6b7280]">Инженер выезжает в ЖК Символ бесплатно</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Смета</h3><p class="mt-1 text-sm text-[#6b7280]">Фиксированная смета без скрытых платежей</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Ремонт</h3><p class="mt-1 text-sm text-[#6b7280]">Выполняем работы в срок с гарантией</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'zhk_simvol_cta';
$ctaFormTitle = 'Рассчитайте стоимость ремонта в ЖК Символ';
$ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
$ctaButtonText = 'Рассчитать стоимость';
$ctaShowName = true;
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
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит ремонт квартиры в ЖК Символ?</summary><p class="mt-2 text-sm text-[#6b7280]">Ремонт квартиры в ЖК Символ под ключ — от 8 000 ₽/м² косметический, от 13 000 ₽/м² капитальный, от 18 000 ₽/м² дизайнерский. Точную смету даём после бесплатного замера.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Делаете ли дизайн и ремонт квартиры в ЖК Символ под ключ?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, делаем дизайн и ремонт квартир в ЖК Символ под ключ: знаем планировки корпусов и требования управляющей компании, берём на себя согласования, закупку материалов и вывоз мусора.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит дизайн проект квартиры в ЖК Символ?</summary><p class="mt-2 text-sm text-[#6b7280]">Дизайн проект квартиры — от 1 200 ₽/м². При заказе ремонта под ключ делаем скидку на проект. <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">Посчитайте свой метраж в калькуляторе</a>.</p></details>
            </div>
        </div>
    </section>

    <section class="py-12 text-center">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a href="/services/premium" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт с дизайн-проектом</a>
                <a href="/services/dizayn-interierov" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Дизайн интерьеров</a>
                <a href="/services/ontario" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">ЖК Онтарио</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'zhk_simvol_bottom_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Готовы рассчитать стоимость: дизайн и ремонт квартир в ЖК Символ';
        $ctaSectionText = 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
