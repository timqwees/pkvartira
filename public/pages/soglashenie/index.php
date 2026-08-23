<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Политика конфиденциальности и согласие на обработку данных',
    'description' => 'Политика конфиденциальности, согласие на обработку персональных данных и пользовательское соглашение. Ознакомьтесь с документами перед заказом ремонта.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/soglashenie',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Соглашение', 'url' => $site['baseUrl'] . '/soglashenie'],
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
    <meta name="robots" content="noindex, follow">
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
            <div class="container mx-auto px-4 max-w-3xl">
                <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="/" class="hover:text-blue-600 transition">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Соглашение</li>
                    </ol>
                </nav>
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

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>

</html>