<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Смета на ремонт квартиры: образец, скачать бесплатно',
    'description' => 'Смета на ремонт квартиры — образец с ценами 2026. Скачайте готовую смету в DOCX бесплатно. Структура и расценки по этапам. Расчёт с выездом на замер в Москве.',
    'image' => $site['baseUrl'] . '/public/assets/images/pages/main/renovation-format/cosmetic.png',
    'url' => $site['baseUrl'] . '/smeta-obrazec',
    'type' => 'article',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Смета на ремонт: образец', 'url' => $site['baseUrl'] . '/smeta-obrazec'],
    ],
    'schema' => [
        [
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Сколько стоит составить смету на ремонт квартиры?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'У нас составление сметы — бесплатно: приедем на замер в день обращения и посчитаем работы и материалы. Образец сметы можно скачать в формате DOCX и заполнить самостоятельно.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Что входит в смету на ремонт квартиры?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Смета включает демонтажные работы, черновую отделку (стяжка, штукатурка, шпаклёвка), электромонтаж, сантехнику и чистовые работы — с количеством, ценой за единицу и итоговой суммой по каждому этапу.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Можно ли скачать образец сметы на ремонт бесплатно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Да, образец сметы на ремонт квартиры с ценами можно скачать бесплатно в формате DOCX на этой странице. Он подходит как основа для вашего расчёта.',
                    ],
                ],
            ],
        ],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | ПКвартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
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
    <meta name="twitter:card" content="<?= htmlspecialchars($seo['twitter']['card']); ?>">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    <?= $seo['jsonLd']; ?>
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20 flex flex-col gap-8 pb-16">
        <section class="py-12 bg-gradient-to-r from-blue-50 to-white reveal">
            <div class="container mx-auto px-4 max-w-4xl">
                <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="/" class="hover:text-blue-600 transition">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Смета на ремонт квартиры: образец</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Смета на ремонт квартиры — образец</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Скачайте готовый образец сметы на ремонт квартиры в формате DOCX — со структурой,
                    количеством работ и ценами за единицу. Он подойдёт как основа для планирования бюджета
                    или для сравнения предложений подрядчиков в Москве в 2026 году.
                </p>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="/public/documents/smeta-remonta-obrazec.docx" download
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        <i class="fas fa-file-word"></i>
                        Скачать образец сметы (DOCX)
                    </a>
                    <a href="/calculator"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Рассчитать свою смету
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Что входит в смету на ремонт квартиры</h2>
            <p class="text-gray-600 mb-4 leading-relaxed">
                Грамотная смета — это не просто список работ и цифр. Это документ, который защищает и заказчика,
                и подрядчика: он фиксирует объём работ, цены и итоговую стоимость, поэтому в процессе ремонта
                не возникает споров «а это было в смете?». В наш образец входят все основные разделы:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li><strong>Демонтажные работы</strong> — снятие старых обоев, напольных покрытий, вынос мусора;</li>
                <li><strong>Черновые работы</strong> — стяжка пола, штукатурка стен по маякам, шпаклёвка;</li>
                <li><strong>Электромонтаж</strong> — замена проводки, установка розеток и выключателей;</li>
                <li><strong>Сантехнические работы</strong> — разводка труб, монтаж сантехники;</li>
                <li><strong>Чистовые работы</strong> — плитка, ламинат, обои или покраска, плинтусы, уборка.</li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
                По каждому разделу указаны единица измерения, количество, цена за единицу и сумма.
                Итоговая строка — общая стоимость работ. Такую же структуру мы используем в договорах
                с нашими клиентами — посмотрите
                <a href="/dogovor-obrazec" class="text-blue-600 font-semibold hover:underline">шаблон договора на ремонт квартиры</a>.
            </p>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Пример сметы на ремонт квартиры 50 м² (цены 2026)</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Ниже — фрагмент образца сметы: основные позиции с актуальными ценами на работы
                в Москве в 2026 году. Полный документ с расчётами вы можете скачать в формате DOCX.
            </p>
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-900 font-semibold">
                            <th class="px-4 py-3 text-left border-b border-gray-200">Работы</th>
                            <th class="px-4 py-3 text-right border-b border-gray-200">Ед.</th>
                            <th class="px-4 py-3 text-right border-b border-gray-200">Кол-во</th>
                            <th class="px-4 py-3 text-right border-b border-gray-200">Цена, ₽</th>
                            <th class="px-4 py-3 text-right border-b border-gray-200">Сумма, ₽</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100" colspan="5" style="background:#f9fafb;font-weight:600">Демонтажные работы</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Демонтаж обоев и краски</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">150</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">50</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">7 500</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Демонтаж напольного покрытия</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">50</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">80</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">4 000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100" colspan="5" style="background:#f9fafb;font-weight:600">Черновые работы</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Стяжка пола (до 50 мм)</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">50</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">550</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">27 500</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Штукатурка стен по маякам</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">130</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">520</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">67 600</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Шпаклёвка стен под покраску/обои</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">130</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">320</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">41 600</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100" colspan="5" style="background:#f9fafb;font-weight:600">Электромонтаж и сантехника</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Замена электропроводки</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">компл.</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">1</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">45 000</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">45 000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Разводка труб ХВС/ГВС</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">компл.</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">1</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">38 000</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">38 000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100" colspan="5" style="background:#f9fafb;font-weight:600">Чистовые работы</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Укладка плитки (стены и пол)</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">20</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">1 200</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">24 000</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2.5 border-b border-gray-100">Укладка ламината</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">м²</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">45</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">380</td>
                            <td class="px-4 py-2.5 border-b border-gray-100 text-right">17 100</td>
                        </tr>
                        <tr class="bg-gray-50 font-semibold text-gray-900">
                            <td class="px-4 py-3 border-t-2 border-gray-300" colspan="4">ИТОГО за работы</td>
                            <td class="px-4 py-3 border-t-2 border-gray-300 text-right">370 400</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-gray-500 text-sm mt-4">
                Стоимость материалов в образец не включена. Точная смета под вашу квартиру зависит от
                состояния стен, площади и выбранных материалов — поэтому мы всегда приезжаем на замер.
            </p>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Как правильно читать смету подрядчика</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Даже с образцом в руках недобросовестный подрядчик может «заложить» лишнее. Проверяйте три вещи:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li><strong>Единицы измерения.</strong> «Работы — 1 компл.» без расшифровки объёма — повод попросить детализацию: сколько метров штукатурки, сколько точек электрики;</li>
                <li><strong>Скрытые позиции.</strong> Грунтовка, вынос мусора, подъём материалов, уборка — если их нет в смете, они появятся «доплатой» в процессе;</li>
                <li><strong>Срок действия цены.</strong> Фиксированная цена должна действовать весь срок ремонта, а не «до конца месяца».</li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
                В нашей смете все позиции детализированы, а цена фиксируется в договоре — поэтому
                итоговая сумма не меняется в процессе. С образцом сметы из DOCX вы сможете сравнить
                предложения разных подрядчиков «позиция к позиции».
            </p>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Получите бесплатную смету с выездом на замер</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Приедем на замер в день обращения, посчитаем точные объёмы работ и стоимость —
                    и зафиксируем её в договоре. Бесплатно и без обязательств.
                </p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="/calculator"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        Рассчитать стоимость
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Связаться с нами
                    </a>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Частые вопросы о смете на ремонт</h2>
            <div class="space-y-4">
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Сколько стоит составить смету на ремонт квартиры?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">У нас составление сметы — бесплатно: приедем на замер в день обращения и посчитаем работы и материалы. Образец сметы можно скачать в формате DOCX и заполнить самостоятельно.</p>
                </div>
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Что входит в смету на ремонт квартиры?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Смета включает демонтажные работы, черновую отделку (стяжка, штукатурка, шпаклёвка), электромонтаж, сантехнику и чистовые работы — с количеством, ценой за единицу и итоговой суммой по каждому этапу.</p>
                </div>
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Можно ли скачать образец сметы на ремонт бесплатно?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Да, образец сметы на ремонт квартиры с ценами можно скачать бесплатно в формате DOCX на этой странице. Он подходит как основа для вашего расчёта.</p>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="/public/assets/scripts/components/lazyIMG.min.js" defer></script>
    <script src="/public/assets/scripts/main/header.min.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.min.js" defer></script>
</body>

</html>