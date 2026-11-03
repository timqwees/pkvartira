<?php
$site = Setting\Route\Functions\TheFunction::site();
$slug = isset($slug) ? $slug : '';
$__blogJson = json_decode(file_get_contents(__DIR__ . '/../data/articles.json'), true) ?: [];
$articleData = null;
if ($slug) {
    // Прямая обработка slug без редиректов: совпало — показываем, нет — 404
    foreach ($__blogJson as $__item) {
        if (($__item['slug'] ?? '') === $slug) {
            $articleData = $__item;
            break;
        }
    }
}

// SEO: несуществующая статья = настоящий 404 (защита от soft-404)
if (!$articleData) {
    http_response_code(404);
}
// ЧПУ: дальше странице нужен и slug (URL), и id (файл контента content/{id}.php)
$id = (int) ($articleData['id'] ?? 0);

$seo = Setting\Route\Functions\TheFunction::seo([
    'title' => $articleData['title'] ?? 'Статья не найдена',
    'description' => $articleData ? ($articleData['meta_description'] ?? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? '')) ?? ''), 0, 160)) : 'Запрошенная статья не найдена.',
    'image' => $articleData['image'] ?? $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/blog/' . $slug,
    'type' => 'article',
    'pageType' => 'BlogPosting',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Блог', 'url' => $site['baseUrl'] . '/blogs'],
        ['name' => $articleData['title'] ?? 'Статья', 'url' => $site['baseUrl'] . '/blog/' . $slug],
    ],
    'schema' => [Setting\Route\Functions\TheFunction::articleSchema($articleData ?? []), [
        '@type' => 'ItemList',
        '@id' => $site['baseUrl'] . '/blogs#itemlist',
        'name' => 'Статьи блога',
        'numberOfItems' => count($__blogJson),
        'itemListElement' => array_values(array_map(function($art, $i) use ($site) {
            return [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'url' => $site['baseUrl'] . '/blog/' . ($art['slug'] ?? $art['id'] ?? ''),
                'name' => (string) ($art['title'] ?? ''),
            ];
        }, array_slice($__blogJson, 0, 5), array_keys(array_slice($__blogJson, 0, 5)))),
    ]],
    'speakable' => ['.article-body [data-type="start"]', '.article-body section:first-of-type p:first-of-type'],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="<?= $articleData ? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' : 'noindex, nofollow'; ?>">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seo['og']['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['og']['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:image:alt" content="<?= htmlspecialchars($articleData['title'] ?? 'Статья блога — ' . ($site['name'] ?? 'Проект Квартира')); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">
    <meta property="article:published_time" content="<?= htmlspecialchars(date('c', strtotime($articleData['created_at'] ?? date('c')))); ?>">
    <meta property="article:modified_time" content="<?= htmlspecialchars(date('c', strtotime($articleData['updated_at'] ?? $articleData['created_at'] ?? date('c')))); ?>">
    <meta property="article:author" content="<?= htmlspecialchars($articleData['author'] ?? 'Проект Квартира'); ?>">
    <meta property="article:section" content="<?= htmlspecialchars($articleData['category'] ?? 'Ремонт'); ?>">
    <meta property="article:tag" content="<?= htmlspecialchars($articleData['tags'] ?? 'ремонт квартиры, дизайн интерьера'); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($articleData['image'] ?? $site['shareImageUrl']); ?>">
    <meta name="twitter:image:alt" content="<?= htmlspecialchars($articleData['title'] ?? 'Статья блога'); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <?php include_once './public/components/head-includes.php'; ?>

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    <?= $seo['jsonLd']; ?>
    </script>

</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20" style="padding-top:80px">
        <section class="py-8 reveal">
            <div class="container mx-auto px-4 max-w-6xl">
                <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4" itemscope
                    itemtype="https://schema.org/BreadcrumbList">
                    <ol class="flex flex-wrap items-center gap-2" itemscope
                        itemtype="https://www.schema.org/SiteNavigationElement">
                        <li itemprop="url" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/" class="hover:text-blue-600 transition">
                                <span itemprop="name">Главная</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="text-gray-400">/</li>
                        <li itemprop="url" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/blogs" class="hover:text-blue-600 transition">
                                <span itemprop="name">Блог</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li class="text-gray-400">/</li>
                        <li itemprop="url" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"
                            class="text-gray-900 font-medium truncate max-w-[60vw]">
                            <span
                                itemprop="name"><?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?></span>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>
                </nav>

                <?php if (!$articleData): ?>
                    <div class="rounded-2xl border border-gray-200 p-8 text-center">
                        <h1 class="text-2xl font-extrabold text-gray-900">Статья не найдена</h1>
                        <p class="mt-2 text-gray-600">Проверьте ссылку или вернитесь в список статей.</p>
                        <a href="/blogs"
                            class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                            Перейти в блог
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                <?php else: ?>
                    <?php
                    // «Читайте также» — свежие статьи (JSON лежит от старых к новым, сортируем явно)
                    $__sortedBlog = $__blogJson;
                    usort($__sortedBlog, fn($a, $b) => strtotime($b['created_at'] ?? '') - strtotime($a['created_at'] ?? ''));
                    $tops = array_slice($__sortedBlog, 0, 5);
                    $__fallbackImg = 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=700&q=60';
                    // «Услуги по теме статьи» — мосты веса блог → деньги.
                    // Кнопка под статьёй ведёт на первую услугу из карты, сайдбар — на все.
                    $__serviceMap = [
                        'remont-kvartiry-s-chego-nachat' => [['/calculator', 'Калькулятор ремонта'], ['/services/pod-klyuch', 'Ремонт под ключ'], ['/author', 'Об авторе']],
                        'remont-pod-klyuch-2026' => [['/services/pod-klyuch', 'Ремонт под ключ'], ['/calculator', 'Калькулятор ремонта'], ['/author', 'Об авторе']],
                        'kosmeticheskiy-remont-2026' => [['/services/econom', 'Косметический ремонт'], ['/calculator', 'Калькулятор ремонта'], ['/author', 'Об авторе']],
                        'umnyy-dom-2026' => [['/services/premium', 'Премиальный ремонт'], ['/services/business', 'Бизнес-класс'], ['/author', 'Об авторе']],
                        'tsveta-materialy-2026' => [['/services/dizayn-interierov', 'Дизайн интерьеров'], ['/author', 'Об авторе']],
                        'remont-novostroyki-2026' => [['/services/novostroyka', 'Ремонт в новостройке'], ['/services/budushchiy-remont', 'Ремонт к дате ключей'], ['/author', 'Об авторе']],
                        'energoeffektivnyy-remont' => [['/calculator', 'Калькулятор ремонта'], ['/services/pod-klyuch', 'Ремонт под ключ'], ['/author', 'Об авторе']],
                        'dizaynerskiy-remont' => [['/services/premium', 'Премиальный ремонт'], ['/services/dizayn-interierov', 'Дизайн интерьеров'], ['/author', 'Об авторе']],
                        'remont-kuhni-2026' => [['/services/pod-klyuch', 'Ремонт под ключ'], ['/services/komfort', 'Комфорт-класс'], ['/author', 'Об авторе']],
                        'trendy-dizayna-interera-2026' => [['/services/dizayn-interierov', 'Дизайн интерьеров'], ['/author', 'Об авторе']],
                        'byudzhet-remont-2026' => [['/services/smeta', 'Смета на ремонт'], ['/prices', 'Цены на ремонт'], ['/author', 'Об авторе']],
                        'kak-poschitat-kvadratnye-metry' => [['/kalkulyator-ploshchadi', 'Калькулятор площади'], ['/calculator', 'Калькулятор ремонта'], ['/author', 'Об авторе']],
                        'priemka-kvartiry-zastroyshchik' => [['/services/novostroyka', 'Ремонт в новостройке'], ['/services/ot-zastroyschika', 'Отделка от застройщика'], ['/author', 'Об авторе']],
                        'smeta-na-remont-kvartiry-nakrutki' => [['/services/smeta', 'Смета на ремонт'], ['/author', 'Об авторе']],
                        'skolko-stoit-remont-kvartiry-2026' => [['/prices', 'Цены на ремонт'], ['/calculator', 'Калькулятор ремонта'], ['/author', 'Об авторе']],
                        'shumoizolyatsiya-kvartiry-panelny-dom' => [['/services/panelny', 'Ремонт в панельном доме'], ['/author', 'Об авторе']],
                        'smeta-na-remont-kvartiry-primer' => [['/services/smeta', 'Смета на ремонт'], ['/prices', 'Цены на ремонт'], ['/author', 'Об авторе']],
                    ];
                    $__serviceLinks = $__serviceMap[$slug] ?? [['/services/pod-klyuch', 'Ремонт под ключ'], ['/calculator', 'Калькулятор ремонта']];

                    // prev/next — соседние статьи в ленте блога (кластер: PageRank ходит внутри серии).
                    // Лента отсортирована от новых к старым: prev = новее, next = старше.
                    $__prevArticle = null;
                    $__nextArticle = null;
                    foreach ($__sortedBlog as $__bi => $__bitem) {
                        if (($__bitem['slug'] ?? '') === $slug) {
                            $__prevArticle = $__sortedBlog[$__bi - 1] ?? null;
                            $__nextArticle = $__sortedBlog[$__bi + 1] ?? null;
                            break;
                        }
                    }
                    ?>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8" itemscope itemtype="http://schema.org/Article">
                        <meta itemprop="inLanguage" content="ru-RU" />
                        <article class="lg:col-span-8" itemscope itemtype="https://schema.org/BlogPosting">
                            <meta itemprop="datePublished"
                                content="<?= htmlspecialchars(date('c', strtotime($articleData['created_at'] ?? date('c')))); ?>">
                            <meta itemprop="dateModified"
                                content="<?= htmlspecialchars(date('c', strtotime($articleData['updated_at'] ?? $articleData['created_at'] ?? date('c')))); ?>">
                            <meta itemprop="author"
                                content="<?= htmlspecialchars($articleData['author'] ?? 'Проект Квартира'); ?>">
                            <meta itemprop="articleSection"
                                content="<?= htmlspecialchars($articleData['category'] ?? 'Ремонт'); ?>">
                            <link itemprop="publisher"
                                href="<?= htmlspecialchars($site['baseUrl']); ?>#organization">

                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500">
                                    <?php if (!empty($articleData['category'] ?? '')): ?>
                                        <a href="/blogs" rel="tag"
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-800 font-semibold hover:bg-gray-200 transition">
                                            <?= htmlspecialchars($articleData['category']); ?>
                                        </a>
                                    <?php endif; ?>
                                    <span class="inline-flex items-center gap-2">
                                        <i class="fa-regular fa-calendar"></i>
                                        <time itemprop="datePublished"
                                            datetime="<?= htmlspecialchars(date('c', strtotime($articleData['created_at'] ?? date('c')))); ?>">
                                            <?= htmlspecialchars(date('d.m.Y', strtotime($articleData['created_at'] ?? date('c')))); ?>
                                        </time>
                                    </span>
                                </div>

                                <div
                                    class="flex flex-wrap justify-start sm:justify-end gap-x-3 gap-y-1 text-[12px] font-bold text-blue-700">
                                    <a class="hover:text-blue-800 transition" href="/blogs" rel="tag">#ремонтподключ</a>
                                    <a class="hover:text-blue-800 transition" href="/blogs" rel="tag">#дизайнинтерьера</a>
                                    <a class="hover:text-blue-800 transition" href="/blogs" rel="tag">#отделкастен</a>
                                    <a class="hover:text-blue-800 transition" href="/blogs" rel="tag">#напольныепокрытия</a>
                                </div>
                            </div>

                            <h1 itemprop="headline"
                                class="mt-4 text-[32px] leading-[38px] md:text-[40px] md:leading-[46px] font-extrabold text-[#2a2e3b]">
                                <?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>
                            </h1>

                            <p itemprop="description" class="mt-3 text-[15px] leading-[22px] text-[#7a7f8c] max-w-3xl">
                                <?= htmlspecialchars($articleData ? trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? '')) ?? '') : 'Запрошенная статья не найдена.'); ?>
                            </p>

                            <?php if ($articleData && !empty($articleData['meta_description'])): ?>
                            <!-- TL;DR: прямой ответ для AI Overviews / featured snippets -->
                            <div class="mt-5 rounded-xl border-l-4 border-blue-600 bg-[#f5f8ff] p-4" itemprop="abstract">
                                <div class="text-[11px] font-extrabold uppercase tracking-wide text-blue-700 mb-1">Кратко</div>
                                <p class="text-[15px] leading-[23px] text-[#2a2e3b]">
                                    <?= htmlspecialchars($articleData['meta_description']); ?>
                                </p>
                            </div>
                            <?php endif; ?>

                            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
<div class="flex items-center gap-3">
    <div
        class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center font-extrabold">
        PK</div>
    <div>
        <div class="text-sm font-extrabold text-[#2a2e3b]"><a href="/author" rel="author" itemprop="url" class="hover:text-blue-700 transition">Елена</a></div>
        <div class="text-xs text-[#7a7f8c]">Основатель Проект Квартира</div>
    </div>
</div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="/calculator"
                                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-black text-white font-semibold hover:bg-gray-900 transition">
                                        Получить расчёт
                                    </a>
                                    <a href="tel:<?= htmlspecialchars($site['phone']); ?>"
                                        class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition">
                                        Позвонить
                                    </a>
                                </div>
                            </div>

                            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject"
                                class="mt-6 rounded-2xl overflow-hidden border border-gray-200 bg-gray-50">
                                <meta itemprop="url"
                                    content="<?= htmlspecialchars($articleData['image'] ?? 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=1400&q=60'); ?>">
                                <meta itemprop="width" content="1400">
                                <meta itemprop="height" content="900">
                                <img src="<?= htmlspecialchars($articleData['image'] ?? 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=1400&q=60'); ?>"
                                    alt="<?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>"
                                    title="<?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>"
                                    width="1400" height="900" fetchpriority="high" decoding="async"
                                    class="w-full h-[260px] md:h-[420px] object-cover">
                            </div>

                            <style>
                                /* === БАЗОВЫЕ СТИЛИ СТАТЬИ === */
                                .article-body {
                                    font-size: 16px;
                                    line-height: 1.7;
                                    color: #444;
                                }

                                /* Все секции имеют отступы */
                                .article-body>section {
                                    margin: 32px 0;
                                }

                                /* Заголовки h2 — основные разделы */
                                .article-body>section>h2 {
                                    font-size: 24px;
                                    margin: 0 0 16px 0;
                                    color: #111;
                                    font-weight: 700;
                                }

                                /* Заголовки h3 — подразделы */
                                .article-body>section>h3 {
                                    font-size: 20px;
                                    margin: 24px 0 12px 0;
                                    color: #222;
                                    font-weight: 600;
                                }

                                /* Параграфы */
                                .article-body>section>p {
                                    font-size: 16px;
                                    line-height: 1.7;
                                    color: #444;
                                    margin: 0 0 16px 0;
                                }

                                .article-body>section>p:last-child {
                                    margin-bottom: 0;
                                }

                                /* Списки */
                                .article-body>section>ul,
                                .article-body>section>ol {
                                    margin: 0 0 16px 0;
                                    padding-left: 24px;
                                }

                                .article-body>section li {
                                    margin: 8px 0;
                                }

                                /* Ссылки */
                                .article-body a {
                                    color: #2563eb;
                                    text-decoration: none;
                                }

                                .article-body a:hover {
                                    text-decoration: underline;
                                }

                                /* === СТРУКТУРА СТАТЬИ === */
                                /* Секция = логический раздел, внутри неё элементы с data-type */

                                /* start — вводная часть (крупный текст) */
                                .article-body [data-type="start"] {
                                    font-size: 18px;
                                    line-height: 1.7;
                                    color: #555;
                                    margin: 0 0 24px 0;
                                }

                                /* list — содержание статьи (серый фон) */
                                .article-body [data-type="list"] {
                                    background: #f8f9fa;
                                    border-radius: 12px;
                                    padding: 20px 24px;
                                    margin: 24px 0;
                                }

                                .article-body [data-type="list"] h2 {
                                    font-size: 18px;
                                    margin: 0 0 12px 0;
                                    color: #111;
                                }

                                .article-body [data-type="list"] ul {
                                    margin: 0;
                                    padding-left: 20px;
                                }

                                .article-body [data-type="list"] li {
                                    margin: 8px 0;
                                }

                                /* image — картинки внутри секции */
                                .article-body [data-type="image"] {
                                    margin: 24px 0;
                                }

                                .article-body [data-type="image"] img {
                                    width: 100%;
                                    height: 320px;
                                    object-fit: cover;
                                    border-radius: 16px;
                                    display: block;
                                }

                                /* compare — сравнение двух вариантов (может быть внутри секции или отдельно) */
                                .article-body [data-type="compare"] {
                                    display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    gap: 16px;
                                    margin: 24px 0;
                                }

                                @media (max-width: 640px) {
                                    .article-body [data-type="compare"] {
                                        grid-template-columns: 1fr;
                                    }
                                }

                                .article-body [data-type="compare"]>h2,
                                .article-body [data-type="compare"]>h3 {
                                    grid-column: 1 / -1;
                                    margin-bottom: 8px;
                                }

                                /* box — цветные выделенные блоки */
                                .article-body [data-type="box"] {
                                    border-radius: 16px;
                                    padding: 20px;
                                    border: 2px solid;
                                    margin: 24px 0;
                                }

                                .article-body [data-type="box"]>h3,
                                .article-body [data-type="box"]>h4 {
                                    margin: 0 0 12px 0;
                                    font-size: 16px;
                                }

                                .article-body [data-type="box"]>p {
                                    margin: 0;
                                    font-size: 15px;
                                }

                                /* Цвета box блоков */
                                .article-body [data-type="box"][data-color="green"] {
                                    background: #f0fdf4;
                                    border-color: #bbf7d0;
                                }

                                .article-body [data-type="box"][data-color="green"]>h3,
                                .article-body [data-type="box"][data-color="green"]>h4 {
                                    color: #166534;
                                }

                                .article-body [data-type="box"][data-color="green"]>p {
                                    color: #14532d;
                                }

                                .article-body [data-type="box"][data-color="red"] {
                                    background: #fef2f2;
                                    border-color: #fecaca;
                                }

                                .article-body [data-type="box"][data-color="red"]>h3,
                                .article-body [data-type="box"][data-color="red"]>h4 {
                                    color: #991b1b;
                                }

                                .article-body [data-type="box"][data-color="red"]>p {
                                    color: #7f1d1d;
                                }

                                .article-body [data-type="box"][data-color="blue"] {
                                    background: #eff6ff;
                                    border-color: #bfdbfe;
                                }

                                .article-body [data-type="box"][data-color="blue"]>h3,
                                .article-body [data-type="box"][data-color="blue"]>h4 {
                                    color: #1e40af;
                                }

                                .article-body [data-type="box"][data-color="blue"]>p {
                                    color: #1e3a8a;
                                }

                                .article-body [data-type="box"][data-color="yellow"] {
                                    background: #fefce8;
                                    border-color: #fde047;
                                }

                                .article-body [data-type="box"][data-color="yellow"]>h3,
                                .article-body [data-type="box"][data-color="yellow"]>h4 {
                                    color: #854d0e;
                                }

                                .article-body [data-type="box"][data-color="yellow"]>p {
                                    color: #713f12;
                                }

                                /* Темные и нейтральные цвета (основные для сайта) */
                                .article-body [data-type="box"][data-color="dark"] {
                                    background: #1f2937;
                                    border-color: #374151;
                                }

                                .article-body [data-type="box"][data-color="dark"]>h3,
                                .article-body [data-type="box"][data-color="dark"]>h4 {
                                    color: #f9fafb;
                                }

                                .article-body [data-type="box"][data-color="dark"]>p {
                                    color: #d1d5db;
                                }

                                .article-body [data-type="box"][data-color="gray"] {
                                    background: #f3f4f6;
                                    border-color: #d1d5db;
                                }

                                .article-body [data-type="box"][data-color="gray"]>h3,
                                .article-body [data-type="box"][data-color="gray"]>h4 {
                                    color: #374151;
                                }

                                .article-body [data-type="box"][data-color="gray"]>p {
                                    color: #4b5563;
                                }

                                .article-body [data-type="box"][data-color="muted"] {
                                    background: #f9fafb;
                                    border-color: #e5e7eb;
                                }

                                .article-body [data-type="box"][data-color="muted"]>h3,
                                .article-body [data-type="box"][data-color="muted"]>h4 {
                                    color: #6b7280;
                                }

                                .article-body [data-type="box"][data-color="muted"]>p {
                                    color: #9ca3af;
                                }

                                /* compare — карточки с цветами */
                                .article-body [data-type="compare"]>article {
                                    border-radius: 16px;
                                    padding: 20px;
                                    border: 2px solid;
                                }

                                .article-body [data-type="compare"]>article>h3 {
                                    margin: 0 0 12px 0;
                                    font-size: 16px;
                                    display: flex;
                                    align-items: center;
                                    gap: 8px;
                                }

                                .article-body [data-type="compare"]>article>p {
                                    margin: 0;
                                    font-size: 15px;
                                }

                                /* Цвета для compare */
                                .article-body [data-type="compare"]>article[data-variant="good"] {
                                    background: #f0fdf4;
                                    border-color: #bbf7d0;
                                }

                                .article-body [data-type="compare"]>article[data-variant="good"]>h3 {
                                    color: #166534;
                                }

                                .article-body [data-type="compare"]>article[data-variant="good"]>p {
                                    color: #14532d;
                                }

                                .article-body [data-type="compare"]>article[data-variant="bad"] {
                                    background: #fef2f2;
                                    border-color: #fecaca;
                                }

                                .article-body [data-type="compare"]>article[data-variant="bad"]>h3 {
                                    color: #991b1b;
                                }

                                .article-body [data-type="compare"]>article[data-variant="bad"]>p {
                                    color: #7f1d1d;
                                }
                            </style>
                            <!-- CONTENT INCLUDE -->
                            <article class="article-body mt-8">
                                <?php file_exists(__DIR__ . '/content/' . $id . '.php') ? include __DIR__ . '/content/' . $id . '.php' : include __DIR__ . '/content/_default.php'; ?>
                            </article>

                            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                                <a href="<?= htmlspecialchars($__serviceLinks[0][0]); ?>"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                                    <?= htmlspecialchars($__serviceLinks[0][1]); ?>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="/blogs"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-800 font-semibold hover:bg-gray-50 transition">
                                    К спискам блогов
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>

                            <?php if ($__prevArticle || $__nextArticle): ?>
                            <nav class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4" aria-label="Навигация по статьям">
                                <?php if ($__prevArticle): ?>
                                <a href="/blog/<?= htmlspecialchars($__prevArticle['slug']); ?>" rel="prev"
                                    class="group block rounded-xl border border-[#e6e7ee] bg-white p-4 hover:border-blue-400 hover:shadow-sm transition">
                                    <span class="flex items-center gap-1 text-[11px] uppercase tracking-wide text-[#8a90a0] font-bold">
                                        <i class="fas fa-arrow-left"></i> Предыдущая
                                    </span>
                                    <span class="mt-1 block text-[14px] font-extrabold text-[#2a2e3b] group-hover:text-blue-700 leading-[19px]">
                                        <?= htmlspecialchars($__prevArticle['title']); ?>
                                    </span>
                                </a>
                                <?php endif; ?>
                                <?php if ($__nextArticle): ?>
                                <a href="/blog/<?= htmlspecialchars($__nextArticle['slug']); ?>" rel="next"
                                    class="group block rounded-xl border border-[#e6e7ee] bg-white p-4 hover:border-blue-400 hover:shadow-sm transition sm:text-right">
                                    <span class="flex items-center gap-1 text-[11px] uppercase tracking-wide text-[#8a90a0] font-bold sm:justify-end">
                                        Следующая <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="mt-1 block text-[14px] font-extrabold text-[#2a2e3b] group-hover:text-blue-700 leading-[19px]">
                                        <?= htmlspecialchars($__nextArticle['title']); ?>
                                    </span>
                                </a>
                                <?php endif; ?>
                            </nav>
                            <?php endif; ?>
                        </article>

                        <aside class="lg:col-span-4 lg:sticky lg:top-24 h-max space-y-4">
                            <div
                                class="bg-white rounded-2xl border border-[#e6e7ee] shadow-[0_2px_10px_rgba(0,0,0,0.06)] overflow-hidden">
                                <div class="px-4 py-3 bg-[#f2f3f8] border-b border-[#e6e7ee]">
                                    <div class="font-extrabold text-[#2a2e3b]">Читайте также</div>
                                </div>
                                <div class="p-4 space-y-3">
                                    <?php foreach ($tops as $item): ?>
                                        <?php if ((int) $item['id'] === $id)
                                            continue; ?>
                                        <a href="/blog/<?= $item['slug']; ?>" rel="bookmark"
                                            class="block rounded-xl hover:bg-gray-50 transition p-2">
                                            <div class="flex gap-3">
                                                <img class="w-[84px] h-[64px] object-cover rounded-lg"
                                                    alt="<?= htmlspecialchars($item['title']); ?>"
                                                    title="<?= htmlspecialchars($item['title']); ?>"
                                                    width="84" height="64" loading="lazy" decoding="async"
                                                    src="<?= htmlspecialchars($item['image'] ?: $__fallbackImg); ?>">
                                                <div class="flex-1">
                                                    <div class="text-[13px] font-extrabold text-[#2a2e3b] leading-[16px]">
                                                        <?= htmlspecialchars($item['title']); ?>
                                                    </div>
                                                    <div class="mt-1 text-[11px] text-[#8a90a0]">
                                                        <?= htmlspecialchars(date('d M Y', strtotime($item['created_at']))); ?>
                                                    </div>
                                                    <?php if (!empty($item['category'])): ?>
                                                        <div class="mt-1 text-[11px] text-[#8a90a0] flex items-center gap-1">
                                                            <i class="fa-solid fa-tag"></i>
                                                            <?= htmlspecialchars($item['category']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <?php
                            // «Услуги по теме статьи» — $__serviceLinks уже посчитаны выше (карта $__serviceMap).
                            ?>
                            <div class="bg-white rounded-2xl border border-[#e6e7ee] shadow-[0_2px_10px_rgba(0,0,0,0.06)] overflow-hidden">
                                <div class="px-4 py-3 bg-[#f2f3f8] border-b border-[#e6e7ee]">
                                    <div class="font-extrabold text-[#2a2e3b]">Услуги по теме</div>
                                </div>
                                <div class="p-4 space-y-2">
                                    <?php foreach ($__serviceLinks as $__sl): ?>
                                        <a href="<?= htmlspecialchars($__sl[0]); ?>"
                                            class="flex items-center justify-between rounded-xl hover:bg-gray-50 transition p-2 text-sm font-bold text-blue-700">
                                            <?= htmlspecialchars($__sl[1]); ?>
                                            <i class="fas fa-arrow-right text-xs text-gray-400"></i>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div
                                class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 p-5 text-white overflow-hidden">
                                <div class="text-lg font-extrabold">Получите расчёт стоимости</div>
                                <div class="mt-2 text-sm text-blue-100">Ответим за 5 минут • Бесплатно • Без обязательств
                                </div>
                                <a href="/calculator"
                                    class="mt-4 inline-flex items-center justify-center w-full px-6 py-3 rounded-lg bg-white text-blue-800 font-extrabold hover:bg-blue-50 transition">
                                    Перейти в калькулятор
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </aside>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>