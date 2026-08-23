<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Договор на ремонт квартиры: шаблон, скачать бесплатно',
    'description' => 'Шаблон договора на ремонт квартиры и отделочные работы — скачайте бесплатно в DOCX. Структура договора подряда: предмет, сроки, оплата, гарантия, ответственность сторон.',
    'image' => $site['baseUrl'] . '/public/assets/images/pages/main/renovation-format/capital.png',
    'url' => $site['baseUrl'] . '/dogovor-obrazec',
    'type' => 'article',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Договор на ремонт: шаблон', 'url' => $site['baseUrl'] . '/dogovor-obrazec'],
    ],
    'schema' => [
        [
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Что должно быть в договоре на ремонт квартиры?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'В договоре подряда на ремонт должны быть: предмет договора со ссылкой на смету, стоимость и порядок оплаты, сроки работ, обязанности сторон, порядок приёмки, гарантийные обязательства и ответственность за просрочку.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Можно ли скачать шаблон договора на ремонт бесплатно?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Да, шаблон договора на ремонт квартиры можно скачать бесплатно в формате DOCX на этой странице. Он включает все ключевые разделы и может быть заполнен в любом текстовом редакторе.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Какую гарантию даёт компания на ремонт квартиры?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Мы даём гарантию 36 месяцев на все выполненные работы — она фиксируется в договоре. На скрытые дефекты ответственность также несёт подрядчик в течение гарантийного срока.',
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
                        <li class="text-gray-900 font-medium">Договор на ремонт квартиры: шаблон</li>
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Договор на ремонт квартиры — шаблон</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Скачайте шаблон договора подряда на ремонтно-отделочные работы в формате DOCX —
                    с предметом договора, сметой, сроками, порядком оплаты, гарантией и ответственностью
                    сторон. Заполните реквизиты — и документ готов к подписанию.
                </p>
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="/public/documents/dogovor-remonta-obrazec.docx" download
                        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        <i class="fas fa-file-word"></i>
                        Скачать шаблон договора (DOCX)
                    </a>
                    <a href="/contact"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                        Обсудить договор с нами
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Что должно быть в договоре на ремонт квартиры</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Ремонт — это дорогостоящая работа с долгим сроком исполнения, поэтому договор подряда
                обязателен. Он защищает обе стороны: заказчик получает фиксированную цену и сроки,
                а подрядчик — гарантию оплаты и понятные условия. В шаблоне — 10 обязательных разделов:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li><strong>Предмет договора</strong> — состав работ по утверждённой смете (приложение к договору);</li>
                <li><strong>Стоимость работ и порядок расчётов</strong> — фиксированная цена, аванс 30% и оплата по этапам;</li>
                <li><strong>Сроки выполнения работ</strong> — даты начала и окончания, график этапов;</li>
                <li><strong>Обязанности сторон</strong> — доступ в помещение, материалы, качество работ;</li>
                <li><strong>Порядок приёмки</strong> — акты выполненных работ, сроки и претензии;</li>
                <li><strong>Гарантийные обязательства</strong> — 36 месяцев на работы;</li>
                <li><strong>Ответственность сторон</strong> — неустойка за просрочку;</li>
                <li><strong>Форс-мажор, срок действия и реквизиты сторон</strong>.</li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
                Образец сметы, которая прикладывается к договору, смотрите на странице
                <a href="/smeta-obrazec" class="text-blue-600 font-semibold hover:underline">«Смета на ремонт квартиры: образец»</a> —
                она идёт приложением № 1 к договору.
            </p>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Какие пункты защищают заказчика</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Шаблон договора — основа, но от спорных ситуаций заказчика защищают конкретные формулировки.
                Убедитесь, что в вашем договоре есть:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li><strong>Фиксированная смета.</strong> Цена не меняется в процессе — увеличение возможно только по дополнительному соглашению;</li>
                <li><strong>Поэтапная оплата.</strong> Аванс не более 30%, остальное — по актам выполненных этапов;</li>
                <li><strong>Неустойка за просрочку</strong> — 0,1% в день от стоимости невыполненных работ дисциплинирует подрядчика;</li>
                <li><strong>Гарантия 36 месяцев</strong> с обязанностью устранять недостатки за свой счёт;</li>
                <li><strong>Порядок изменения объёмов</strong> — любые «а давайте ещё» оформляются допсоглашением с ценой.</li>
            </ul>
            <div class="rounded-xl border border-yellow-200 bg-yellow-50 p-5 mb-6">
                <h3 class="font-semibold text-gray-900 mb-1">Совет</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Не подписывайте договор, в котором нет сметы или графика производства работ — без них
                    «объём работ» ничем не зафиксирован, и в процессе ремонта появятся доплаты. Смета и график
                    должны быть приложениями к договору с подписями обеих сторон.
                </p>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Как мы работаем по договору</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                ООО «Проект Квартира» заключает договор подряда с каждым клиентом — с фиксированной сметой,
                сроками и гарантией 36 месяцев. Как это выглядит на практике:
            </p>
            <ul class="list-disc pl-6 text-gray-600 space-y-2 mb-6">
                <li>бесплатный выезд на замер и составление детальной сметы в день обращения;</li>
                <li>фиксация цены, сроков и графика этапов в договоре — итоговая сумма не меняется;</li>
                <li>поэтапная оплата: аванс 30% и оплата по актам выполненных работ;</li>
                <li>приёмка каждого этапа с подписанием акта и проверкой качества;</li>
                <li>гарантия 36 месяцев на все работы — устранение недостатков за наш счёт.</li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
                Подробнее о том, сколько времени занимает ремонт по такому договору, читайте в разделе
                <a href="/blogs" class="text-blue-600 font-semibold hover:underline">блога о ремонте</a>.
            </p>
        </section>

        <section class="container mx-auto px-4 max-w-4xl reveal">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Получите договор и смету под вашу квартиру</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Приедем на замер, составим детальную смету и подготовим договор с фиксированными
                    сроками и гарантией. Бесплатно и без обязательств.
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
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Частые вопросы о договоре на ремонт</h2>
            <div class="space-y-4">
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Что должно быть в договоре на ремонт квартиры?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">В договоре подряда на ремонт должны быть: предмет договора со ссылкой на смету, стоимость и порядок оплаты, сроки работ, обязанности сторон, порядок приёмки, гарантийные обязательства и ответственность за просрочку.</p>
                </div>
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Можно ли скачать шаблон договора на ремонт бесплатно?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Да, шаблон договора на ремонт квартиры можно скачать бесплатно в формате DOCX на этой странице. Он включает все ключевые разделы и может быть заполнен в любом текстовом редакторе.</p>
                </div>
                <div class="rounded-xl border border-gray-200 p-5">
                    <h3 class="font-semibold text-gray-900 mb-1">Какую гарантию даёт компания на ремонт квартиры?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Мы даём гарантию 36 месяцев на все выполненные работы — она фиксируется в договоре. На скрытые дефекты ответственность также несёт подрядчик в течение гарантийного срока.</p>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>

</html>