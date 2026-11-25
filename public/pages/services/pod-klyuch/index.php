<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт квартир под ключ — от 8 000 ₽/м²',
    'description' => 'Ремонт квартир под ключ в Москве 2026 — от 8 000 ₽/м². Полный цикл: от дизайн-проекта до финальной уборки. Без скрытых платежей, сроки в договоре, гарантия 3 года. Замер и смета бесплатно. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/pod-klyuch',
    'image' => '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg',
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
    'name' => 'Под ключ',
    'url' => '/services/pod-klyuch',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'Что входит в ремонт под ключ?', 'answer' => 'Полный цикл: дизайн-проект, закупка материалов, демонтаж, черновые и чистовые работы, инженерные системы, финальная уборка. Вы получаете готовую к жилью квартиру.'],
            ['question' => 'Сколько стоит ремонт под ключ в Москве?', 'answer' => 'Цены от 8 000 ₽/м². Итоговая стоимость зависит от площади, типа ремонта (косметический/капитальный/дизайнерский) и материалов. Точную сумму назваем после бесплатного замера и составления сметы.'],
            ['question' => 'Какие гарантии даете на ремонт под ключ?', 'answer' => 'Официальная гарантия 3 года на все выполненные работы и материалы. Фиксируется в договоре. На скрытые дефекты ответственность также несёт подрядчик в течение гарантийного срока.'],
            ['question' => 'Сколько времени занимает ремонт под ключ?', 'answer' => 'Сроки зависят от площади и сложности: студия — 21–35 дней, 1-комнатная — 28–45 дней, 2-комнатная — 35–60 дней, 3-комнатная — 45–75 дней. Точные сроки прописываем в договоре.'],
            ['question' => 'Работаете ли вы с материалами клиента?', 'answer' => 'Да, можем работать с вашими материалами. Но рекомендуем закупку через нас — даём скидку до 15% у поставщиков, гарантируем качество и своевременную доставку на объект.'],
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
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="robots" content="<?= (strtolower($_SERVER["HTTP_HOST"] ?? "") === "upgrade.pkvartira.ru") ? "noindex, nofollow" : "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" ?>">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title"
        content="Ремонт квартир под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta property="og:description"
        content="Ремонт квартир под ключ в Москве от 360 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title"
        content="Ремонт квартир под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="twitter:description"
        content="Ремонт квартир под ключ от 360 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- Дополнительные мета-теги -->


    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 flex flex-col gap-0" style="padding-top:80px">

                <!-- 1. hero section -->
        <?php
        $heroH1 = 'Ремонт квартир под ключ';
        $heroFormId = 'pod-klyuch_hero';
        $heroSubtitle = 'Один подрядчик на все этапы: от замера до финальной уборки. Вам не нужно координировать бригады, искать материалы или проверять сроки — мы берём всё на себя. Приедем, замерим, составим смету и сделаем ремонт под ключ строго по договору.';
        include './public/components/hero-section.php';
        ?>

<!-- 1.5. Internal links: передаём вес на калькулятор и связанные сервисы -->
        <section class="reveal bg-white py-8 md:py-10 border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <p class="text-sm text-gray-600 mb-3">Также может быть интересен:</p>
                <div class="flex flex-wrap gap-4">
                    <a href="/calculator" class="inline-flex items-center gap-2 text-sm font-medium text-[#6d5744] hover:text-[#5c4a3a] hover:underline bg-[#fef8f3] px-4 py-2 rounded-lg transition">
                        Калькулятор ремонта квартиры — расчёл стоимости за 1 минуту
                    </a>
                    <a href="/prices" class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-[#6d5744] hover:underline bg-gray-50 px-4 py-2 rounded-lg transition">
                        Цены на ремонт — полный прайс
                    </a>
                    <a href="/services/dizayn-interierov" class="inline-flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-[#6d5744] hover:underline bg-gray-50 px-4 py-2 rounded-lg transition">
                        Дизайн интерьеров
                    </a>
                </div>
            </div>
        </section>
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
                            Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются по действующим нормам и технологическим картам.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Примеры -->
        <section class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Реализованные проекты
                    под ключ</h2>
                <!-- cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
                    <?php $portfolioRepairLabels = ['Косметический', 'Капитальный', 'Дизайнерский']; ?>
                    <?php foreach ($portfolio as $key => $value): ?>
                        <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                            itemtype="https://schema.org/CreativeWork">
                            <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                            <meta itemprop="description"
                                content="Ремонт квартиры под ключ, срок: <?= htmlspecialchars($value['срок']); ?>, стоимость: <?= htmlspecialchars($value['цена']); ?>">
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
        // N-11: цены и таблицы живут на /prices; здесь — состав работ и этапы.
        // Дублирующая таблица цен удалена, оставлена только навигация к прайсу.
        ?>
        <div class="max-w-3xl mx-auto mt-10 rounded-2xl border border-gray-200 bg-white p-6 text-center">
            <p class="text-gray-700">
                Стоимость по метражу и полный прайс по всем видам работ — на странице
                <a href="/prices" class="text-[#6d5744] font-semibold underline hover:text-[#5c4a3a]">«Цены на ремонт»</a>.
                Здесь — состав работ, этапы и порядок приёмки.
            </p>
            <a href="/prices"
                class="inline-flex items-center justify-center mt-4 bg-[#876b55] hover:bg-[#6d5744] text-white px-6 py-3 rounded-lg font-semibold transition">Смотреть
                цены и таблицы</a>
        </div>

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
                            <span class="font-semibold text-gray-800" itemprop="name">Что входит в ремонт под ключ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Полный цикл работ: демонтаж, выравнивание стен и пола, разводка электрики и сантехники, отделка, установка дверей, монтаж освещения, сборка мебели и финальная уборка. Вы получаете готовую квартиру — заезжайте с чемоданами.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Какая гарантия на ремонт под ключ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Даём гарантию до 3 лет на все виды работ. Если в течение гарантийного срока проявится дефект — приедем и исправим бесплатно. Условия фиксируем в договоре.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Входит ли вывоз мусора в стоимость?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, вывоз строительного мусора включён в смету. Мешки собираем и вывозим поэтапно, чтобы на объекте всегда было чисто. Доплачивать за уборку не нужно.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Как вы контролируете качество работ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">За каждым объектом закреплён прораб и инженер технадзора. Ведём ежедневные фотоотчёты в MAX, поэтапную приёмку по чек-листу. Вы видите ход работ онлайн.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы по договору?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, работаем только по официальному договору. В нём фиксируются сроки, стоимость каждого этапа и гарантийные обязательства. Никаких устных договорённостей.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <?php
        $ctaFormId = 'pod_klyuch_cta';
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