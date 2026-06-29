<?php
$site = Setting\Route\Function\Functions::site();
$id = isset($id) ? (int) $id : 0;
$articleData = $id > 0 ? (new App\Models\Article\Article())->getArticleById($id) : null;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?></title>
    <meta name="description"
        content="<?= htmlspecialchars($articleData ? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))), 0, 160) : 'Запрошенная статья не найдена.'); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/blog/article/' . $id); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>">
    <meta property="og:description"
        content="<?= htmlspecialchars($articleData ? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))), 0, 160) : 'Запрошенная статья не найдена.'); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/blog/article/' . $id); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($articleData['image'] ?? 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=1400&q=60'); ?>">
    <meta property="og:image:alt"
        content="<?= htmlspecialchars($articleData['title'] ?? 'Статья блога — ' . ($site['name'] ?? 'ПКвартира')); ?>">
    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">
    <meta property="article:published_time"
        content="<?= htmlspecialchars(date('c', strtotime($articleData['created_at'] ?? date('c')))); ?>">
    <meta property="article:modified_time"
        content="<?= htmlspecialchars(date('c', strtotime($articleData['updated_at'] ?? $articleData['created_at'] ?? date('c')))); ?>">
    <meta property="article:author" content="<?= htmlspecialchars($articleData['author'] ?? 'ПКвартира'); ?>">
    <meta property="article:section" content="<?= htmlspecialchars($articleData['category'] ?? 'Ремонт'); ?>">
    <meta property="article:tag"
        content="<?= htmlspecialchars($articleData['tags'] ?? 'ремонт квартиры, дизайн интерьера'); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>">
    <meta name="twitter:description"
        content="<?= htmlspecialchars($articleData ? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))), 0, 160) : 'Запрошенная статья не найдена.'); ?>">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($articleData['image'] ?? 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=1400&q=60'); ?>">
    <meta name="twitter:image:alt"
        content="<?= htmlspecialchars($articleData['title'] ?? 'Статья блога'); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">


    <?php include_once './public/components/head-includes.php'; ?>

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "logo": {
                    "@type": "ImageObject",
                    "url": <?= json_encode($site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "width": 300,
                    "height": 300
                },
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
                    "contactType": "customer service",
                    "availableLanguage": ["Russian"],
                    "areaServed": "RU"
                },
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
                    "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressCountry": <?= json_encode($site['address']['addressCountry'], JSON_UNESCAPED_UNICODE); ?>
                },
                "sameAs": [
                    <?= json_encode($site['vk'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    <?= json_encode($site['telegram'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    <?= json_encode($site['whatsapp'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                ],
                "image": <?= json_encode($site['shareImageUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
            },
            {
                "@type": "WebSite",
                "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
                "description": <?= json_encode($site['description'], JSON_UNESCAPED_UNICODE); ?>,
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": <?= json_encode($site['baseUrl'] . '/search?q={search_term_string}', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "query": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": <?= json_encode($site['canonicalUrl'] . '#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": <?= json_encode(($articleData['title'] ?? 'Статья не найдена') . ' — ' . $site['name'], JSON_UNESCAPED_UNICODE); ?>,
                "description": <?= json_encode($articleData ? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))), 0, 160) : 'Запрошенная статья не найдена.', JSON_UNESCAPED_UNICODE); ?>,
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "BlogPosting",
                "@id": <?= json_encode($site['canonicalUrl'] . '#article', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "mainEntityOfPage": {
                    "@id": <?= json_encode($site['canonicalUrl'] . '#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "headline": <?= json_encode($articleData['title'] ?? 'Статья не найдена', JSON_UNESCAPED_UNICODE); ?>,
                "description": <?= json_encode($articleData ? mb_substr(trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))), 0, 160) : 'Запрошенная статья не найдена.', JSON_UNESCAPED_UNICODE); ?>,
                "image": <?= json_encode($articleData['image'] ?? $site['shareImageUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "datePublished": <?= json_encode(date('c', strtotime($articleData['created_at'] ?? date('c'))), JSON_UNESCAPED_UNICODE); ?>,
                "dateModified": <?= json_encode(date('c', strtotime($articleData['updated_at'] ?? $articleData['created_at'] ?? date('c'))), JSON_UNESCAPED_UNICODE); ?>,
                "author": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "articleSection": <?= json_encode($articleData['category'] ?? 'Ремонт', JSON_UNESCAPED_UNICODE); ?>,
                "keywords": <?= json_encode($articleData['tags'] ?? 'ремонт квартиры, дизайн интерьера', JSON_UNESCAPED_UNICODE); ?>,
                "wordCount": <?= (int) str_word_count(strip_tags($articleData['content'] ?? '')); ?>,
                "inLanguage": "ru-RU"
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['canonicalUrl'] . '#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
                        "name": "Блог",
                        "item": <?= json_encode($site['baseUrl'] . '/blogs', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": <?= json_encode($articleData['title'] ?? 'Статья', JSON_UNESCAPED_UNICODE); ?>,
                        "item": <?= json_encode($site['canonicalUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    }
                ]
            }
        ]
    }
    </script>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <main class="pt-20">
        <section class="py-8">
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
                    $tops = (new App\Models\Article\Article())->getTops() ?: [];
                    ?>
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8" itemscope itemtype="http://schema.org/Article">
                        <meta itemprop="inLanguage" content="ru-RU" />
                        <article class="lg:col-span-8" itemscope itemtype="https://schema.org/BlogPosting">
                            <meta itemprop="datePublished"
                                content="<?= htmlspecialchars(date('c', strtotime($articleData['created_at'] ?? date('c')))); ?>">
                            <meta itemprop="dateModified"
                                content="<?= htmlspecialchars(date('c', strtotime($articleData['updated_at'] ?? $articleData['created_at'] ?? date('c')))); ?>">
                            <meta itemprop="author"
                                content="<?= htmlspecialchars($articleData['author'] ?? 'ПКвартира'); ?>">
                            <meta itemprop="articleSection"
                                content="<?= htmlspecialchars($articleData['category'] ?? 'Ремонт'); ?>">
                            <link itemprop="publisher"
                                href="<?= htmlspecialchars($site['baseUrl']); ?>#organization">

                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                                <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500">
                                    <?php if (!empty($articleData['category'] ?? '')): ?>
                                        <span itemprop="articleSection"
                                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 text-gray-800 font-semibold">
                                            <?= htmlspecialchars($articleData['category']); ?>
                                        </span>
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
                                    <a class="hover:text-blue-800 transition" href="/blog?tag=ремонт">#ремонтподключ</a>
                                    <a class="hover:text-blue-800 transition" href="/blog?tag=дизайн">#дизайнинтерьера</a>
                                    <a class="hover:text-blue-800 transition" href="/blog?tag=отделка">#отделкастен</a>
                                    <a class="hover:text-blue-800 transition" href="/blog?tag=полы">#напольныепокрытия</a>
                                </div>
                            </div>

                            <h1 itemprop="headline"
                                class="mt-4 text-[32px] leading-[38px] md:text-[40px] md:leading-[46px] font-extrabold text-[#2a2e3b]">
                                <?= htmlspecialchars($articleData['title'] ?? 'Статья не найдена'); ?>
                            </h1>

                            <p itemprop="description" class="mt-3 text-[15px] leading-[22px] text-[#7a7f8c] max-w-3xl">
                                <?= htmlspecialchars($articleData ? trim(preg_replace('/\s+/', ' ', strip_tags($articleData['content'] ?? ''))) : 'Запрошенная статья не найдена.'); ?>
                            </p>

                            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center font-extrabold">
                                        PK</div>
                                    <div>
                                        <div class="text-sm font-extrabold text-[#2a2e3b]">ПКвартира</div>
                                        <div class="text-xs text-[#7a7f8c]">Специалист</div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="<?= htmlspecialchars($site['baseUrl'] ?? '/calculator'); ?>"
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
                                <a href="<?= htmlspecialchars($site['baseUrl'] ?? '/calculator'); ?>"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                                    Перейти на главную
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <a href="/blogs"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-white border border-gray-300 text-gray-800 font-semibold hover:bg-gray-50 transition">
                                    Ко списокам блогов
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
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
                                        <a href="/blog/article/<?= (int) $item['id']; ?>"
                                            class="block rounded-xl hover:bg-gray-50 transition p-2">
                                            <div class="flex gap-3">
                                                <img class="w-[84px] h-[64px] object-cover rounded-lg"
                                                    alt="<?= htmlspecialchars($item['title']); ?>"
                                                    title="<?= htmlspecialchars($item['title']); ?>"
                                                    src="<?= htmlspecialchars($item['image'] ?: $image); ?>">
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
                        </aside>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

</body>

</html>