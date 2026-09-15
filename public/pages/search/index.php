<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$q = trim((string) ($_GET['q'] ?? ''));
$q = mb_substr($q, 0, 120);
$results = $q !== '' ? TheFunction::siteSearch($q) : [];

$pageTitle = $q !== '' ? 'Поиск: ' . $q : 'Поиск по сайту';
$seo = TheFunction::seo([
    'title' => mb_substr($pageTitle . ' — Проект Квартира', 0, 48),
    'description' => $q !== ''
        ? 'Результаты поиска по запросу «' . mb_substr($q, 0, 60) . '» на сайте Проект Квартира (ПКвартира, pkvartira.ru).'
        : 'Поиск по сайту Проект Квартира (ПКвартира, pkvartira.ru): услуги, статьи блога, цены, вакансии.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/search',
    'type' => 'website',
    'pageType' => 'SearchResultsPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Поиск', 'url' => $site['baseUrl'] . '/search'],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($seo['title']); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="noindex, follow">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
    <?php include_once dirname(__DIR__, 3) . '/public/components/head-includes.php'; ?>
</head>
<body class="bg-white">
<?php include_once dirname(__DIR__, 3) . '/public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="py-8 bg-gray-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="/" class="hover:text-blue-600">Главная</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900 font-medium">Поиск</li>
                </ol>
            </nav>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Поиск по сайту</h1>
            <form action="/search" method="GET" class="mt-6 flex flex-col sm:flex-row gap-3 max-w-2xl" role="search">
                <input type="search" name="q" value="<?= htmlspecialchars($q); ?>" required minlength="2" maxlength="120"
                    placeholder="Например: дизайнерский ремонт, смета, вакансии…"
                    aria-label="Поисковый запрос"
                    class="flex-1 px-4 py-3 border border-gray-300 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                <button type="submit" class="px-6 py-3 rounded-xl bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">Найти</button>
            </form>
        </div>
    </section>

    <section class="py-10">
        <div class="container mx-auto px-4 max-w-6xl">
            <?php if ($q === ''): ?>
                <p class="text-gray-600">Введите запрос — ищем по услугам, статьям блога, ценам, вакансиям и страницам сайта.</p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <?php foreach (['дизайнерский ремонт', 'смета', 'новостройка', 'вакансии', 'гарантия', 'калькулятор'] as $hint): ?>
                        <a href="/search?q=<?= urlencode($hint); ?>" class="px-3 py-1.5 text-sm bg-gray-100 hover:bg-orange-100 hover:text-orange-700 rounded-full transition"><?= htmlspecialchars($hint); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($results === []): ?>
                <h2 class="text-xl font-bold text-gray-900">По запросу «<?= htmlspecialchars($q); ?>» ничего не найдено</h2>
                <p class="text-gray-600 mt-2">Попробуйте другие слова или позвоните нам: <a href="tel:<?= htmlspecialchars($site['phone']); ?>" class="text-orange-600 font-semibold hover:underline"><?= htmlspecialchars($site['phone']); ?></a></p>
            <?php else: ?>
                <h2 class="text-xl font-bold text-gray-900">Найдено: <?= count($results); ?> — «<?= htmlspecialchars($q); ?>»</h2>
                <div class="mt-6 space-y-4">
                    <?php foreach ($results as $r): ?>
                        <article class="block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                            <div class="text-xs font-semibold uppercase tracking-wide text-orange-600"><?= htmlspecialchars($r['section']); ?></div>
                            <a href="<?= htmlspecialchars(preg_replace('~^https?://[^/]+~', '', $r['url'])); ?>" class="mt-1 block text-lg font-bold text-gray-900 hover:text-orange-600 transition"><?= htmlspecialchars($r['title']); ?></a>
                            <?php if (!empty($r['snippet'])): ?>
                                <p class="mt-1 text-sm text-gray-600"><?= htmlspecialchars($r['snippet']); ?></p>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php include_once dirname(__DIR__, 3) . '/public/components/footer.php'; ?>
<script src="<?= TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
