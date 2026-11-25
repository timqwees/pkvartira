<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Дизайн интерьеров — от 1 500 ₽/м²',
    'description' => 'Дизайн интерьеров в Москве от 1 500 ₽/м². Консультация перед покупкой квартиры — 20 000 ₽, эскизный проект от 1 500 ₽/м², стандартный от 2 200 ₽/м², авторский от 4 000 ₽/м². Чертежи, 3D, подбор материалов. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/dizayn-interierov',
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
    'name' => 'Дизайн интерьеров',
    'url' => '/services/dizayn-interierov',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Сколько стоит дизайн-проект квартиры в Москве?', 'answer' => 'Консультация перед покупкой — 20 000 ₽. Эскизный проект (планировки, зонирование) — от 1 500 ₽/м². Стандартный (чертежи, 3D, ведомости) — от 2 200 ₽/м². Авторский (полное ТЗ, авторский надзор) — от 4 000 ₽/м².'],
            ['question' => 'Что входит в стандартный дизайн-проект?', 'answer' => 'Планировочные решения, 3D-визуализация всех комнат, полный комплект чертежей (планировки, электрика, сантехника, полы, потолки, раскладка плитки), ведомости материалов и мебели, смету на закупку.'],
            ['question' => 'Сколько времени занимает разработка дизайн-проекта?', 'answer' => 'Эскизный — 7–14 дней. Стандартный — 21–35 дней в зависимости от площади и сложности. Авторский — от 45 дней. Сроки фиксируем в договоре.'],
            ['question' => 'Помогаете ли с закупкой материалов и мебли?', 'answer' => 'Да, в стандартный и авторский проекты входит подбор материалов и мебели с ссылками на поставщиков. Даём скидку до 15% у партнёров. Авторский надзор — контроль соответствия реализации проекту на объекте.'],
            ['question' => 'Работаете ли вы с уже купленной квартирой в новостройке?', 'answer' => 'Да, частый кейс: клиент приходит с ключами от застройщика. Замеряем «голую» квартиру, проектируем с учётом усадки, готовим чертежи под инженерию и чистовую отделку.'],
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
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
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

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">
    <?php include_once './public/components/header.php'; ?>

<!-- Main Content -->
    <main class="flex flex-col">

        <!-- 1. hero section -->
        <?php
        $heroH1 = 'Дизайн интерьеров';
        $heroFormId = 'dizajn_hero';
        $heroSubtitle = 'Создаём интерьеры, в которых хочется жить. От первого эскиза до финальной расстановки мебели — берём на себя весь процесс. Работаем с новостройками и вторичкой в Москве и МО.';
        include './public/components/hero-section.php';
        ?>

        <!-- 2. Price cards -->
        <section id="price" class="reveal bg-white py-14 md:py-20">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight">
                        Стоимость дизайн проекта квартиры — от 1 500 ₽/м²
                    </h2>
                    <p class="mt-4 text-lg text-[#78716c] max-w-3xl mx-auto">
                        Стоимость зависит от площади и комплектации: эскизный, стандартный или полный пакет с авторским надзором. Выберите пакет или <a href="/calculator" class="text-[#876b55] underline hover:text-[#6d5744] font-semibold">посчитайте стоимость в калькуляторе</a>. Точную смету дадим после замера.
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-[#876b55] shadow-[0_8px_24px_rgba(135,107,85,0.15)]' : 'border border-[#e7e5e4] shadow-[0_1px_3px_rgba(23,19,16,0.04)]' ?> rounded-2xl p-7 w-full"
                            itemscope itemtype="https://schema.org/Service">
                            <meta itemprop="name" content="<?= htmlspecialchars($price['заголовок']); ?> дизайн интерьера">
                            <?php if (isset($price['бейдж'])): ?>
                                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#fef8f3] text-[#6d5744] border border-[#efe7d6] mb-3">
                                    <?= htmlspecialchars($price['бейдж']); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="text-sm text-[#6b7280] mb-2">
                                <?= htmlspecialchars($price['заголовок']); ?>
                            </h3>
                            <div class="mt-3 text-3xl font-bold text-[#171310]" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                <span itemprop="price" content="<?= htmlspecialchars($price['цена_число']); ?>"><?= htmlspecialchars($price['цена']); ?></span><?= (!isset($price['per_m2']) || $price['per_m2']) ? '/м²' : '' ?>
                                <meta itemprop="priceCurrency" content="RUB">
                                <meta itemprop="priceValidUntil" content="2026-12-31">
                            </div>
                            <div class="mt-1 text-sm text-[#6b7280]"><?= htmlspecialchars($price['подзаголовок']); ?></div>
                            <ul class="mt-5 space-y-3 text-sm text-[#4b5563]">
                                <?php foreach ($price['услуги'] as $услуга): ?>
                                    <li class="flex gap-3"><i class="fa-solid fa-check text-[#876b55] mt-0.5"></i><span><?= htmlspecialchars($услуга); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if (isset($price['примечание'])): ?>
                                <div class="mt-4 text-sm font-medium text-[#171310]"><?= htmlspecialchars($price['примечание']); ?></div>
                            <?php endif; ?>
                            <a href="tel:<?= $site['phone'] ?>"
                                class="flex items-center justify-center mt-7 w-full <?= $price['стиль'] === 'рекомендуем' ? 'bg-[#876b55] hover:bg-[#6d5744] text-white' : 'border border-[#876b55] text-[#876b55] hover:bg-[#fef8f3]' ?> px-5 py-3 rounded-xl font-semibold transition" style="border-radius: 12px;">
                                <?= htmlspecialchars($price['кнопка']); ?>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
                <p class="mt-8 text-center text-sm text-[#6b7280]">Все расценки — на странице <a href="/prices" class="text-[#6d5744] font-semibold hover:text-[#6d5744] underline">цен на ремонт</a> или <a href="/calculator" class="text-[#6d5744] font-semibold hover:text-[#6d5744] underline">посчитайте в калькуляторе</a>.</p>
            </div>
        </section>

        <!-- 3. Что входит в дизайн-проект -->
        <section class="reveal bg-[#fafafa] py-14 md:py-20">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight">
                        Что входит в дизайн-проект
                    </h2>
                    <p class="mt-4 text-lg text-[#78716c] max-w-3xl mx-auto">
                        Полный комплект документации для реализации интерьера без сюрпризов и переделок.
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-pencil-ruler"></i></div>
                        <h3 class="title">Замер и обмер</h3>
                        <p class="desc">Точные размеры всех помещений</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-drafting-compass"></i></div>
                        <h3 class="title">Планировка</h3>
                        <p class="desc">Оптимальная расстановка стен и мебели</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-cube"></i></div>
                        <h3 class="title">3D-визуализация</h3>
                        <p class="desc">Фотореалистичные картинки будущего интерьера</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-file-lines"></i></div>
                        <h3 class="title">Чертежи</h3>
                        <p class="desc">Полный комплект для бригады</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-palette"></i></div>
                        <h3 class="title">Подбор материалов</h3>
                        <p class="desc">Обои, плитка, напольные покрытия</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-couch"></i></div>
                        <h3 class="title">Мебель</h3>
                        <p class="desc">Подбор и расстановка мебели</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-lightbulb"></i></div>
                        <h3 class="title">Освещение</h3>
                        <p class="desc">Схема света и подбор светильников</p>
                    </div>
                    <div class="card-premium hover-lift">
                        <div class="icon-wrap"><i class="fa-solid fa-eye"></i></div>
                        <h3 class="title">Авторский надзор</h3>
                        <p class="desc">Контроль на всех этапах ремонта</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Этапы работ -->
        <section id="process" class="reveal py-20 bg-gradient-to-br from-[#fef8f3] via-white to-[#fef8f3]">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-14">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight mb-5">
                        Как мы создаём дизайн интерьера:<br><span class="text-[#876b55]">5 шагов</span> к идеальному пространству
                    </h2>
                    <p class="text-xl text-[#78716c] max-w-3xl mx-auto">
                        От первого разговора до финальной расстановки мебели — прозрачный процесс без сюрпризов.
                    </p>
                </div>

                <ol class="relative grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 list-none m-0 p-0">
                    <div class="hidden lg:block absolute w-full h-0.5 bg-gradient-to-r from-[#efe7d6] via-[#b1907a] to-[#876b55] top-8 left-0 z-0" aria-hidden="true"></div>

                    <li class="text-center z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#876b55] to-[#6d5744] text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold">01</div>
                        <h3 class="text-lg font-bold text-[#171310] mb-3">Знакомство и замер</h3>
                        <p class="text-sm text-[#6b7280]">Обсуждаем пожелания, стиль, бюджет. Выезжаем на замер, фиксируем все размеры и особенности помещения.</p>
                    </li>

                    <li class="text-center z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#876b55] to-[#6d5744] text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold">02</div>
                        <h3 class="text-lg font-bold text-[#171310] mb-3">Планировка и эскизы</h3>
                        <p class="text-sm text-[#6b7280]">Разрабатываем варианты планировки, подбираем стиль, цветовую палитру. Согласовываем каждый элемент.</p>
                    </li>

                    <li class="text-center z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#876b55] to-[#6d5744] text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold">03</div>
                        <h3 class="text-lg font-bold text-[#171310] mb-3">3D-визуализация</h3>
                        <p class="text-sm text-[#6b7280]">Создаём фотореалистичные картинки будущего интерьера. Вы видите результат до начала ремонта.</p>
                    </li>

                    <li class="text-center z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#876b55] to-[#6d5744] text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold">04</div>
                        <h3 class="text-lg font-bold text-[#171310] mb-3">Чертежи и комплектация</h3>
                        <p class="text-sm text-[#6b7280]">Готовим полный комплект чертежей для бригады. Подбираем все материалы, мебель, освещение.</p>
                    </li>

                    <li class="text-center z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#876b55] to-[#6d5744] text-white rounded-full flex items-center justify-center mx-auto mb-5 text-xl font-bold">05</div>
                        <h3 class="text-lg font-bold text-[#171310] mb-3">Авторский надзор</h3>
                        <p class="text-sm text-[#6b7280]">По желанию дизайнер сопровождает ремонт: следит за соответствием проекту и помогает бригаде.</p>
                    </li>
                </ol>
            </div>
        </section>

        <!-- 5. Примеры реализованных проектов -->
        <section class="reveal py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-14">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight mb-5">
                        Реализованные проекты с дизайном
                    </h2>
                    <p class="text-lg text-[#78716c] max-w-2xl mx-auto">
                        Несколько примеров квартир, где мы разрабатывали дизайн-проект и сопровождали ремонт под ключ.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                    <!-- Новостройка 32 м² -->
                    <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition"
                        itemscope itemtype="https://schema.org/CreativeWork">
                        <div class="relative h-48 bg-gray-100">
                            <img src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/portfolio-photos/newbuilds/1_32new/11.png') ?>"
                                alt="Новостройка 32 м² — дизайн-проект"
                                class="w-full h-full object-cover"
                                width="600" height="400" loading="lazy">
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                <span class="px-2 py-1 bg-[#fef8f3] text-[#5c4a3a] rounded-full text-xs font-medium">Новостройка</span>
                                <span>32 м²</span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-1">Новостройка, 32 м²</h3>
                            <p class="text-sm text-gray-500 mb-4">Современный минимализм, светлые тона, встроенные хранилища. Дизайн-проект + авторский надзор.</p>
                            <div class="flex items-center justify-between text-sm text-gray-500 border-t border-gray-100 pt-4">
                                <span>45 дней</span>
                                <span class="font-semibold text-gray-900">2 118 000 ₽</span>
                            </div>
                        </div>
                    </article>

                    <!-- Новостройка 62 м² -->
                    <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition"
                        itemscope itemtype="https://schema.org/CreativeWork">
                        <div class="relative h-48 bg-gray-100">
                            <img src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/portfolio-photos/newbuilds/1_62new/11.jpeg') ?>"
                                alt="Новостройка 62 м² — дизайн-проект"
                                class="w-full h-full object-cover"
                                width="600" height="400" loading="lazy">
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                <span class="px-2 py-1 bg-[#fef8f3] text-[#5c4a3a] rounded-full text-xs font-medium">Новостройка</span>
                                <span>62 м²</span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-1">Новостройка, 62 м²</h3>
                            <p class="text-sm text-gray-500 mb-4">Семейная квартира для двоих детей. Зонирование, детская, мастер-спальня. Полный комплект чертежей.</p>
                            <div class="flex items-center justify-between text-sm text-gray-500 border-t border-gray-100 pt-4">
                                <span>90 дней</span>
                                <span class="font-semibold text-gray-900">3 118 000 ₽</span>
                            </div>
                        </div>
                    </article>

                    <!-- Капитальный ремонт, новостройка 86 м² -->
                    <article class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition"
                        itemscope itemtype="https://schema.org/CreativeWork">
                        <div class="relative h-48 bg-gray-100">
                            <img src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg') ?>"
                                alt="Капитальный ремонт новостройка 86 м² — дизайн-проект"
                                class="w-full h-full object-cover"
                                width="600" height="400" loading="lazy">
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                                <span class="px-2 py-1 bg-[#fef8f3] text-[#5c4a3a] rounded-full text-xs font-medium">Новостройка</span>
                                <span>86 м²</span>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-1">Капитальный ремонт, новостройка 86 м²</h3>
                            <p class="text-sm text-gray-500 mb-4">Премиальная отделка, сложные инженерные системы, индивидуальная мебель. Авторский дизайн-проект.</p>
                            <div class="flex items-center justify-between text-sm text-gray-500 border-t border-gray-100 pt-4">
                                <span>60 дней</span>
                                <span class="font-semibold text-gray-900">1 118 000 ₽</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="text-center mt-8">
                    <a href="/portfolio" class="inline-flex items-center gap-2 text-[#6d5744] font-semibold hover:text-[#5c4a3a] hover:underline">
                        Все проекты в портфолио <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- 6. Почему выбирают нас -->
        <section class="reveal bg-[#fafafa] py-16 md:py-24">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight mb-5">
                        Почему выбирают нас
                    </h2>
                    <p class="text-lg text-[#78716c] max-w-2xl mx-auto">
                        Честные цены, прозрачный процесс и результат, который превосходит ожидания.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="card-premium p-6">
                        <div class="text-3xl md:text-4xl font-extrabold text-[#876b55] mb-2">35</div>
                        <div class="text-sm text-[#6b7280]">Отзывов со ссылками на источники</div>
                    </div>
                    <div class="card-premium p-6">
                        <div class="text-3xl md:text-4xl font-extrabold text-[#876b55] mb-2">3</div>
                        <div class="text-sm text-[#6b7280]">Варианта сметы под бюджет</div>
                    </div>
                    <div class="card-premium p-6">
                        <div class="text-3xl md:text-4xl font-extrabold text-[#876b55] mb-2">3 года</div>
                        <div class="text-sm text-[#6b7280]">Гарантии на все работы</div>
                    </div>
                    <div class="card-premium p-6">
                        <div class="text-3xl md:text-4xl font-extrabold text-[#876b55] mb-2">0 ₽</div>
                        <div class="text-sm text-[#6b7280]">Замер и смета — бесплатно</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. FAQ -->
                <!-- 7. FAQ -->
        <section class="reveal py-14 md:py-20 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="max-w-4xl mx-auto px-4">
                <div class="text-center mb-14">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#171310] leading-tight mb-5">
                        Частые вопросы о дизайне интерьеров
                    </h2>
                    <p class="text-lg text-[#78716c] max-w-2xl mx-auto">
                        Ответы на самые популярные вопросы о дизайне интерьера и сотрудничестве с нами.
                    </p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Сколько стоит дизайн проект квартиры?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Стоимость дизайн проекта квартиры — от 1 500 ₽/м² (эскизный), от 2 200 ₽/м² (стандартный) и от 4 000 ₽/м² (авторский). Например, 1-комнатная 37 м² — от 55 500 ₽. <a href="/calculator" class="text-[#876b55] underline hover:text-[#6d5744] font-semibold">Посчитайте свой метраж в калькуляторе</a>.</span>
                        </div>
                    </div>
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Сколько стоит дизайн интерьера?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Консультация перед покупкой квартиры — 20 000 ₽. Эскизный дизайн-проект — от 1 500 ₽/м², стандартный дизайн-проект — от 2 200 ₽/м², авторский дизайн-проект — от 4 000 ₽/м². Фотореалистичная 3D-визуализация — +600 ₽/м². Точный расчёт делаем после бесплатной консультации.</span>
                        </div>
                    </div>
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Сколько времени занимает разработка дизайн-проекта?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Эскизный дизайн-проект — 5–7 рабочих дней. Стандартный дизайн-проект — 10–15 рабочих дней. Сроки фиксируются в договоре и мы их не срываем.</span>
                        </div>
                    </div>
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Входит ли авторский надзор в стоимость?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Авторский надзор обсуждается отдельно. Дизайнер контролирует соответствие проекта на всех этапах ремонта, помогает бригаде с решениями и следит за качеством.</span>
                        </div>
                    </div>
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Можно ли сделать дизайн-проект только для одной комнаты?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, мы разрабатываем проекты как для всей квартиры, так и для отдельных помещений: кухни, спальни, детской, ванной. Стоимость рассчитывается индивидуально.</span>
                        </div>
                    </div>
                    <div class="card-premium overflow-hidden" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <button class="w-full flex items-start justify-between p-5 bg-[#fafafa] hover:bg-[#f5f5f4] transition faq-toggle">
                            <span class="font-semibold text-[#171310]" itemprop="name">Работаете ли вы с новостройками?</span>
                            <i class="fas fa-chevron-down text-[#876b55]"></i>
                        </button>
                        <div class="hidden p-5 text-[#6b7280] faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, у нас большой опыт работы с новостройками. Учитываем особенности планировок, несущие стены, инженерные коммуникации. Помогаем с планировкой с нуля — от голых стен до готового интерьера.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>

</html>
