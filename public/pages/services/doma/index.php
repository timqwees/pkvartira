<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт домов и коттеджей — от 8 000 ₽/м², проект 180 м² за 3 240 000 ₽',
    'description' => 'Ремонт загородного дома или коттеджа под ключ в Москве и МО от 8 000 ₽/м². От фундамента до кровли: утепление, фасад, инженерия, отделка. Фиксированная смета в договоре, гарантия 3 года. Бесплатный выезд инженера. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/doma',
    'image' => '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.jpg',
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
    'name' => 'Doma',
    'url' => '/services/doma',
  ),
),
]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="robots" content="<?= (strtolower($_SERVER["HTTP_HOST"] ?? "") === "upgrade.pkvartira.ru") ? "noindex, nofollow" : "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" ?>">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta property="og:description"
        content="Ремонт домов под ключ: коттеджи и таунхаусы. Фиксированные цены, прозрачная смета, гарантия 3 года.">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт домов под ключ">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="twitter:description"
        content="Ремонт домов под ключ: коттеджи и таунхаусы. Фиксированные цены, прозрачная смета, гарантия 3 года.">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- Дополнительные мета-теги -->


    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 flex flex-col gap-0" style="padding-top:80px">

                <!-- 1. hero section -->
        <?php
        $heroFormId = 'doma_hero';
        $heroSubtitle = 'Пример под ключ: коттедж 180 м² за 45 дней — 3 240 000 ₽. Зафиксируем стоимость в договоре. Работаем с гарантией. Составим смету под ваш бюджет.';
        include './public/components/hero-section.php';
        ?>

<!-- 2. price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Сколько стоит ремонт домов и коттеджей
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Стоимость работ без учёта материалов, цену фиксируем в договоре. Выберите подходящий пакет. Точную стоимость рассчитаем после замера и составления сметы.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-[#876b55] shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                            itemscope itemtype="https://schema.org/Service">
                            <meta itemprop="name"
                                content="<?= htmlspecialchars($price['заголовок']); ?> ремонт дома под ключ">
                            <?php if (isset($price['бейдж'])): ?>
                                <div
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#fef8f3] text-[#6d5744] border border-orange-200">
                                    <?= htmlspecialchars($price['бейдж']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="<?= isset($price['бейдж']) ? 'mt-3' : ''; ?> text-sm text-gray-600">
                                <?= htmlspecialchars($price['заголовок']); ?>
                            </div>
                            <div class="mt-2 text-3xl font-bold text-gray-900" itemprop="offers" itemscope
                                itemtype="https://schema.org/Offer">
                                <span itemprop="price"
                                    content="<?= htmlspecialchars($price['цена_число']); ?>"><?= htmlspecialchars($price['цена']); ?></span>
                                <meta itemprop="priceCurrency" content="RUB">
                                <meta itemprop="priceValidUntil" content="2026-12-31">
                            </div>
                            <div class="text-sm text-gray-600"><?= htmlspecialchars($price['подзаголовок']); ?></div>
                            <ul class="mt-4 space-y-2 text-sm text-gray-700">
                                <?php foreach ($price['услуги'] as $услуга): ?>
                                    <li class="flex gap-2"><i
                                            class="fa-solid fa-check text-green-600 mt-0.5"></i><span><?= htmlspecialchars($услуга); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="tel:<?= $site['phone'] ?>"
                                class="flex items-center justify-center mt-6 w-full <?= $price['стиль'] === 'рекомендуем' ? 'bg-[#876b55] hover:bg-[#6d5744] text-white' : 'border border-blue-700 text-blue-700 hover:bg-blue-50' ?> px-5 py-3 rounded-lg font-semibold transition"><?= htmlspecialchars($price['кнопка']); ?></a>
                        </article>
                    <?php endforeach; ?>
                </div>
                <p class="mt-6 text-center text-sm text-gray-600">Все расценки — на странице <a href="/prices" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">цен на ремонт</a> или <a href="/calculator" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">посчитайте в калькуляторе</a>.</p>
            </div>
        </section>

        <!-- 3. Что входит в стоимость ремонта -->
        <section class="reveal bg-gray-50 py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
                    Что входит в пакет
                </h2>

                <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-screwdriver-wrench"
                                aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Демонтаж</div>
                        <div class="text-sm text-gray-600 mt-1">Подготовительные работы</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-bolt" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Электрика</div>
                        <div class="text-sm text-gray-600 mt-1">Проводка и щит</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-faucet-drip" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Сантехника</div>
                        <div class="text-sm text-gray-600 mt-1">Разводка и установка</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-paint-roller" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Отделка</div>
                        <div class="text-sm text-gray-600 mt-1">Стены, пол, потолок</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-door-open" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Двери</div>
                        <div class="text-sm text-gray-600 mt-1">Монтаж и доборы</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
                        </div>
                        <div class="mt-2 font-semibold text-gray-900">Освещение</div>
                        <div class="text-sm text-gray-600 mt-1">Светильники и выключатели</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-couch" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Мебель</div>
                        <div class="text-sm text-gray-600 mt-1">Сборка и установка</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4">
                        <div class="text-[#6d5744] text-xl"><i class="fa-solid fa-broom" aria-hidden="true"></i></div>
                        <div class="mt-2 font-semibold text-gray-900">Уборка</div>
                        <div class="text-sm text-gray-600 mt-1">После работ</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Этапы работ -->
        <section id="process" class="reveal py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Ваш путь к идеальному ремонту:<br><span class="text-[#6d5744]">6 шагов</span> до новоселья
                    </h2>
                    <p class="text-xl text-gray-600">
                        Мы выстроили систему так, чтобы вы не тратили время на контроль и закупки
                    </p>
                </div>

                <div class="relative grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="hidden md:block absolute w-full h-0.5 bg-gray-300 top-8 z-0"></div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            01
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Ваша заявка</h3>
                        <p class="text-sm text-gray-600">
                            Оставьте заявку на сайте или позвоните нам. Менеджер ответит на все вопросы и забронирует за
                            вами время для бесплатного выезда инженера-сметчика.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            02
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Профессиональный замер</h3>
                        <p class="text-sm text-gray-600">
                            Приезжаем со сверхточным лазерным оборудованием. Анализируем состояние стен, углов и
                            инженерных коммуникаций. Через 24 часа вы получаете 3 варианта детальной сметы под ваш
                            бюджет.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            03
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Договор и фиксация цены</h3>
                        <p class="text-sm text-gray-600">
                            Подписываем официальный договор, где четко прописаны сроки и финальная стоимость. Цена
                            фиксируется в договоре. Дополнительные работы — только после вашего согласования: сначала показываем причину и стоимость, начинаем только после подтверждения.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            04
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Закупка материалов</h3>
                        <p class="text-sm text-gray-600">
                            Закупку, доставку и подъём материалов берём на себя — вам не нужно ездить по магазинам. И наша собственная
                            гарантия.Организуем доставку, разгрузку и подъем. Вы получаете все отчеты в цифровом виде.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            05
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Производство работ</h3>
                        <p class="text-sm text-gray-600">
                            Профильные бригады (электрики, сантехники, плиточники) приступают к делу. Вы получаете
                            ежедневные фото- и видеоотчеты в MAX. Контролируйте ремонт из любой точки мира.
                        </p>
                    </div>

                    <div class="text-center z-10">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            06
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Сдача и гарантия</h3>
                        <p class="text-sm text-gray-600">
                            Ваш дом в чистом виде и полностью готов для жизни. Все работы выполняются по действующим нормам и технологическим картам.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Примеры -->
        <section class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Реализованные дома и коттеджи
                    под ключ</h2>
                <!-- cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
                    <?php $portfolioRepairLabels = ['Косметический', 'Капитальный', 'Дизайнерский']; ?>
                    <?php foreach ($portfolio as $key => $value): ?>
                        <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                            itemtype="https://schema.org/CreativeWork">
                            <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                            <meta itemprop="description"
                                content="Ремонт дома, срок: <?= htmlspecialchars($value['срок']); ?>, стоимость: <?= htmlspecialchars($value['цена']); ?>">
                            <div class="relative h-52">
                                <div class="swiper swiper-type-one w-full h-full">
                                    <div class="swiper-wrapper">
                                        <?php foreach ((new Functions())->getPhotos($value['текущая_папка']) as $key => $img): ?>
                                            <div class="swiper-slide">
                                                <img decoding="async" loading="lazy"
                                                    src="<?= htmlspecialchars($site['baseUrl'] . '/' . $value['текущая_папка'] . '/' . $img) ?>"
                                                    class="w-full h-full object-cover" width="1280" height="720" alt="<?= htmlspecialchars(trim($value['заголовок'] . (!empty($value['срок']) ? ', срок ' . $value['срок'] : '') . (!empty($value['цена']) ? ', ' . $value['цена'] : '') . ' — фото ' . ((int)$key + 1))) ?>"
                                                    title="<?= htmlspecialchars($value['заголовок'] . ' — фото ' . ((int)$key + 1)) ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 z-20 p-4 bg-gradient-to-t from-black/70 to-transparent">
                                    <div class="text-xs text-white/80">
                                        <?= htmlspecialchars($portfolioRepairLabels[$key % 3]) ?>
                                    </div>
                                    <div class="mt-1 font-semibold text-white"><?= htmlspecialchars($value['заголовок']) ?>
                                    </div>
                                    <div class="flex gap-4 items-center mt-2 text-sm text-white/90"><span>Срок:
                                            <?= htmlspecialchars($value['срок']) ?></span> ∙
                                        <span>Стоимость: <?= htmlspecialchars($value['цена']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900">Почему выбирают нас</h3>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-[#6d5744]">0 ₽</div>
                                <div class="text-sm text-gray-600 mt-1">выезд инженера</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-[#6d5744]">24 ч</div>
                                <div class="text-sm text-gray-600 mt-1">подготовка сметы</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-[#6d5744]">3 года</div>
                                <div class="text-sm text-gray-600 mt-1">гарантия на работы</div>
                            </div>
                            <div class="rounded-xl border border-gray-200 p-4">
                                <div class="text-2xl font-bold text-[#6d5744]">Нормы</div>
                                <div class="text-sm text-gray-600 mt-1">работаем по техкартам</div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900">Сроки и договор</h3>
                            <span
                                class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100"><i
                                    class="fa-solid fa-copyright"></i> Работаем
                                официально</span>
                        </div>
                        <ul class="mt-4 space-y-3 text-sm text-gray-700">
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Фиксируем сроки в
                                    договоре</span></li>
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Ежедневный
                                    фотоотчет</span></li>
                            <li class="flex gap-2"><i
                                    class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Оплата по этапам
                                    работ</span></li>
                        </ul>
                        <button data-button-dialog
                            class="block max-w-fit cta-button mt-6 bg-[#876b55] hover:bg-[#6d5744] text-white px-6 py-3 rounded-lg font-semibold transition sm:w-auto">Получить
                            консультацию</button>
                    </div>
                </div>
            </div>
        </section>

        <?php
        // N-16 / F-01: кейс с высоким чеком — коттедж 180 м² за 3 240 000 ₽
        $caseData = [
            'title'  => 'Коттедж, 180 м²',
            'area'   => '180 м²',
            'days'   => '45 дней',
            'sum'    => '3 240 000 ₽',
            'alt'    => 'Ремонт коттеджа 180 м² под ключ — выполненный объект',
            'img'    => '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.jpg',
            'photos' => [
                '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.jpg',
                '/public/assets/images/portfolio-photos/cottage/1_180sqm/2.jpg',
                '/public/assets/images/portfolio-photos/cottage/1_180sqm/1.webp',
                '/public/assets/images/portfolio-photos/cottage/1_180sqm/2.webp',
            ],
            'note'   => 'Двухэтажный коттедж под ключ: инженерия, черновая и чистовая отделка, лестница, санузлы. Смета зафиксирована в договоре, срок — 45 дней.',
            'bullets' => [
                'Отопление, водоснабжение и вентиляция — проектирование и монтаж',
                'Электрика: вводной щит, группы, УЗО, заземление',
                'Черновая отделка: стяжка, штукатурка, гидроизоляция санузлов',
                'Чистовая отделка: полы, стены, потолки, двери, лестница',
                'Финальная уборка и сдача по чек-листу',
            ],
        ];
        $caseTitle    = 'Кейс: коттедж 180 м² под ключ';
        $caseSubtitle = 'Проект с высоким чеком — 3 240 000 ₽ за 45 дней. Полный цикл: от инженерии до чистовой отделки.';
        $caseNote     = 'Другие объекты — в <a href="/portfolio" class="text-[#6d5744] font-semibold underline">портфолио</a>.';
        include './public/components/case-study.php';
        ?>

        <?php
        $priceRows = [
            ['label' => 'Косметический', 'price' => '8000'],
            ['label' => 'Капитальный', 'price' => '13000'],
            ['label' => 'Дизайнерский', 'price' => '18000'],
        ];
        $priceTableTitle = 'Стоимость по метражу';
        include './public/components/price-table.php';
        ?>

        <!-- 10. FAQ по этой услуге -->
        <section class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
                    Отвечаем на главные вопросы
                </h2>

                                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Как правильно спланировать инженерные системы в частном доме?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Инженерные системы проектируем на этапе архитектурного проекта: 1) Водоснабжение — центральный водопровод или скважина/колодец, насосная станция, гидроаккумулятор, фильтрация. 2) Канализация — септик/ЛОС или центральная, трубы ПВХ 110/160 мм с наклоном 2 см/м. 3) Отопление — котел (газ/электро/твердое топливо), коллекторная разводка, теплый пол/радиаторы, автоматика. 4) Вентиляция — приточная/вытяжная с рекуператором. 5) Электрика — щит вводной/групповой, заземление, УЗО, резервный вход. Все узлы в инженерных шкафах с доступом.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                        <span class="font-semibold text-gray-800" itemprop="name">Какую систему отопления выбрать для частного дома?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Выбор зависит от доступности газа и площади: 1) Газовый котел + теплый пол/радиаторы — оптимально при наличии газа, автономность, низкая стоимость отопления. 2) Электрический котел + теплый пол — при отсутствии газа, простая установка, но дорогие тарифы. 3) Твердотопливный/пеллетный котел — автономность, требует хранения топлива. 4) Теплый пол по всему дому — комфорт, равномерный нагрев, работает с любым котелом. Рекомендуем: газ + теплый пол 1 этаж + радиаторы 2 этаж + автоматика по комнатам.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                        <span class="font-semibold text-gray-800" itemprop="name">Как организовать водоснабжение и канализацию в доме?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Водоснабжение: центральный водопровод (счетчик, обратный клапан, фильтр) или скважина (насос, гидроаккумулятор, фильтры). Разводка коллекторная ПЭХ/металлопластик к каждой точке. Канализация: внешняя ПВХ 110/160 мм с наклоном 2 см/м, септик/ЛОС (биологическая очистка до 98%) или центральная. Внутренняя разводка ПВХ 50/110 мм, вентиляция стояков через крышу. Все узлы в инженерных шкафах с доступом.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                        <span class="font-semibold text-gray-800" itemprop="name">Сколько стоит ремонт частного дома под ключ?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">От 15 000 ₽/м² (косметический), от 25 000 ₽/м² (капитальный). Для дома 150 м² — от 2 250 000 ₽ до 3 750 000 ₽. Цена зависит от площади, этажности, сложности инженерии, материалов. Точную смету — после бесплатного замера и обсуждения проекта.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                        <span class="font-semibold text-gray-800" itemprop="name">Сколько времени занимает ремонт частного дома?</span>
                        <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Капитальный ремонт дома 150-200 м² — 4-6 месяцев. Включает: инженерию (1-1.5 мес), стяжку/штукатурку (1 мес), чистовую отделку (1.5-2 мес), инженерию финишную/мебель (0.5 мес). Точные сроки в договоре после проекта и замера.</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <?php
        $ctaFormId = 'doma_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        include './public/components/cta-section.php';
        ?>



    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // FAQ Toggle functionality
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