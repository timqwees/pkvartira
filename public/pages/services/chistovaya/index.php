<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Чистовая отделка квартиры в Москве — от 8 000 ₽/м²',
    'description' => 'Чистовая отделка квартиры под ключ в Москве: стены, потолки, полы, сантехника, электрика. Косметический от 8 000 ₽/м², капитальный от 13 000 ₽/м². Фиксированная смета, гарантия 3 года, бесплатный замер. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/chistovaya',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => array (
  0 =>
  array (
    'name' => 'Главная',
    'url' => '/',
  ),
  1 =>
  array (
    'name' => 'Услуги',
    'url' => '/services',
  ),
  2 =>
  array (
    'name' => 'Чистовая отделка',
    'url' => '/services/chistovaya',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Что входит в чистовую отделку квартиры?', 'answer' => 'Полный цикл: покраска/обои стен, покраска потолков, укладка напольных покрытий (ламинат, паркет, плитка), установка сантехники и смесителей, монтаж светильников и розеток, плинтуса, дверей, финальная уборка.'],
            ['question' => 'Сколько стоит чистовая отделка в Москве?', 'answer' => 'Косметическая чистовая — от 8 000 ₽/м². Капитальная с подготовкой основ — от 13 000 ₽/м². Цена включает материалы и работу. Точная смета после бесплатного замера.'],
            ['question' => 'Сколько времени занимает чистовая отделка?', 'answer' => 'Зависит от площади и состояния основ: студия — 14–21 день, 1-комнатная — 21–28 дней, 2-комнатная — 28–35 дней. Сроки фиксируем в договоре.'],
            ['question' => 'Работаете ли с нашими материалами?', 'answer' => 'Да, можем уложить купленные вами ламинат, плитку, обои. Но рекомендуем закупку через нас — скидка до 15%, гарантия качества и своевременная доставка.'],
            ['question' => 'Какая гарантия на чистовую отделку?', 'answer' => 'Официальная гарантия 3 года на все работы и материалы. Фиксируется в договоре. На скрытые дефекты (клей, шпаклевка, водоизоляция) ответственность сохраняется весь гарантийный срок.'],
        ]),
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
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="flex flex-col">

        <?php
        $svc = [
            'heroH1' => 'Чистовая отделка квартиры',
            'heroSubtitle' => 'Полная чистовая отделка под ключ: стены, потолки, полы, сантехника, электрика. Работаем по договору с фиксированной ценой и гарантией 3 года.',
            'heroFormId' => 'chistovaya_hero',
            'bg_url' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
            // N-17: взаимные ссылки кластера отделки в новостройке
            'otdelka_cluster' => true,
            'otdelka_cluster_current' => 'chistovaya',
        ];
        include './public/components/service-page-sections.php';
        ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>