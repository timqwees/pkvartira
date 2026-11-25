<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Черновая отделка квартиры в Москве — от 6 000 ₽/м²',
    'description' => 'Черновая отделка квартиры под ключ в Москве: стяжка, штукатурка, шпаклёвка, разводка электрики и сантехники. От 6 000 ₽/м². Фиксированная смета, гарантия 3 года, бесплатный замер. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/chernovaya',
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
    'name' => 'Черновая отделка',
    'url' => '/services/chernovaya',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Что входит в черновую отделку квартиры?', 'answer' => 'Полный цикл: демонтаж, стяжка пола (полусухая/мокрые), штукатурка стен по маякам, шпаклёвка (стартовая/финишная), разводка электрики (проводка, коробки, трассы), сантехники (трубы, слив), гидроизоляция санузлов.'],
            ['question' => 'Сколько стоит черновая отделка в Москве?', 'answer' => 'От 6 000 ₽/м² (стяжка + штукатурка + шпаклёвка + инженерия). Цена зависит от высоты стен, кривизны основ, количества точек воды/электрики. Точная смета после бесплатного замера.'],
            ['question' => 'Сколько времени занимает черновая отделка?', 'answer' => 'Студия — 14–21 день, 1-комнатная — 21–28 дней, 2-комнатная — 28–35 дней, 3-комнатная — 35–45 дней. Стыжка высыхает 21–28 дней — это критический путь. Сроки в договоре.'],
            ['question' => 'Можно ли заказать только стяжку или только штукатурку?', 'answer' => 'Да, выполняем любые отдельные виды черновых работ: только стяжку, только штукатурку, только электрику/сантехнику. Считаем стоимость по позициям в смете.'],
            ['question' => 'Какая гарантия на черновую отделку?', 'answer' => 'Официальная гарантия 3 года на все работы и материалы. Фиксируется в договоре. На скрытые дефекты (трубы в стяжке, проводка в штробах) ответственность подрядчика сохраняется весь гарантийный срок.'],
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
    <meta name="robots" content="<?= (strtolower($_SERVER["HTTP_HOST"] ?? "") === "upgrade.pkvartira.ru") ? "noindex, nofollow" : "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" ?>">
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
            'heroH1' => 'Черновая отделка квартиры',
            'heroSubtitle' => 'Черновая отделка под ключ: стяжка, штукатурка, шпаклёвка, разводка электрики и сантехники. Фиксированная смета, гарантия 3 года, бесплатный замер.',
            'heroFormId' => 'chernovaya_hero',
            'bg_url' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
            // N-17: взаимные ссылки кластера отделки в новостройке
            'otdelka_cluster' => true,
            'otdelka_cluster_current' => 'chernovaya',
        ];
        include './public/components/service-page-sections.php';
        ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>