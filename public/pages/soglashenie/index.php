<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Политика конфиденциальности и согласие на обработку данных | ПКвартира</title>
    <meta name="description"
        content="Политика конфиденциальности, согласие на обработку персональных данных и пользовательское соглашение. Ознакомьтесь с документами перед заказом ремонта.">
    <meta name="robots" content="noindex, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/soglashenie'); ?>">

    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Соглашение и обработка персональных данных | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Согласие на обработку персональных данных и политика конфиденциальности в формате DOCX.">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/soglashenie'); ?>">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Соглашение и обработка персональных данных | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Согласие на обработку персональных данных и политика конфиденциальности в формате DOCX.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">


    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "WebPage",
                "@id": <?= json_encode($site['baseUrl'] . '/soglashenie#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/soglashenie', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Соглашение и обработка персональных данных",
                "description": "Согласие на обработку персональных данных и политика конфиденциальности.",
                "inLanguage": "ru-RU"
            },
            {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Главная",
                        "item": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Соглашение",
                        "item": <?= json_encode($site['baseUrl'] . '/soglashenie', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    }
                ]
            }
        ]
    }
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20 flex flex-col gap-8 pb-16">
        <section class="py-12 bg-gradient-to-r from-blue-50 to-white reveal">
            <div class="container mx-auto px-4 max-w-3xl">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Соглашение и документы</h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    На этой странице собраны документы по обработке персональных данных и конфиденциальности.
                    Вы можете скачать их в формате Microsoft Word (DOCX).
                </p>
            </div>
        </section>

        <section class="container mx-auto px-4 max-w-3xl flex flex-col gap-6 reveal">
            <article id="soglasie"
                class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:border-orange-300 transition">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Согласие на обработку персональных данных</h2>
                <p class="text-gray-600 mb-4">
                    Оставляя заявку на сайте <?= parse_url($site['baseUrl'], PHP_URL_HOST) ?>, вы даёте согласие на обработку ваших персональных
                    данных — имени, номера телефона, адреса электронной почты и адреса объекта. Мы используем эти
                    данные исключительно для связи с вами, подготовки коммерческого предложения, выезда инженера
                    на замер и последующего сопровождения договора. Передача третьим лицам возможна только в
                    случаях, предусмотренных законодательством РФ. Согласие действует бессрочно и может быть
                    отозвано вами в любой момент по запросу на почту или через форму обратной связи. После отзыва
                    мы прекращаем обработку и удаляем данные в течение 30 дней.
                </p>
                <p class="text-gray-600 mb-4">
                    Обработка включает сбор, запись, систематизацию, накопление, хранение, уточнение, извлечение,
                    использование, передачу, обезличивание, блокирование и уничтожение данных. Все операции
                    выполняются с соблюдением требований Федерального закона № 152-ФЗ «О персональных данных».
                </p>
                <p class="text-gray-600 text-sm mb-4">Скачать полный текст согласия в формате DOCX</p>
                <a href="/public/documents/soglasie-na-obrabotku-personalnyh-dannyh.docx"
                    class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:underline" download>
                    <i class="fas fa-file-word"></i>
                    Скачать согласие
                </a>
            </article>

            <article id="politika"
                class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:border-orange-300 transition">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Политика конфиденциальности</h2>
                <p class="text-gray-600 mb-4">
                    Настоящая политика конфиденциальности определяет порядок обработки и защиты персональных
                    данных пользователей сайта <?= parse_url($site['baseUrl'], PHP_URL_HOST) ?>. Мы принимаем все необходимые организационные и
                    технические меры для предотвращения несанкционированного доступа, уничтожения, изменения
                    или разглашения ваших данных.
                </p>
                <p class="text-gray-600 mb-4">
                    При посещении сайта мы можем автоматически собирать техническую информацию: IP-адрес, тип
                    браузера, операционную систему, дату и время визита, просмотренные страницы. Эти данные
                    используются для анализа посещаемости, улучшения работы сайта и не позволяют идентифицировать
                    конкретного пользователя. На сайте используются файлы cookie, которые можно отключить в
                    настройках браузера.
                </p>
                <p class="text-gray-600 mb-4">
                    Вы вправе в любой момент запросить полную информацию о хранящихся у нас данных, потребовать
                    их исправления или удаления. Для этого достаточно направить запрос на нашу электронную почту
                    или через форму обратной связи на сайте. Мы гарантируем ответ в срок, не превышающий 30 дней
                    с момента получения запроса.
                </p>
                <p class="text-gray-600 text-sm mb-4">Скачать полный текст политики в формате DOCX</p>
                <a href="/public/documents/politika-konfidencialnosti.docx"
                    class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:underline" download>
                    <i class="fas fa-file-word"></i>
                    Скачать политику
                </a>
            </article>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.js" defer></script>
</body>

</html>
