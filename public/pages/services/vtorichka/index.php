<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/secondary/1_80sqm/04.jpg';

$seo = TheFunction::seo([
    'title' => 'Ремонт вторички — от 640 000 ₽',
    'description' => 'Ремонт квартиры на вторичном рынке в Москве от 640 000 ₽. Демонтаж, замена коммуникаций, отделка под ключ. Ремонт в хрущёвке, сталинке, панельном и кирпичном доме. Фиксированная смета, гарантия 3 года. Выезд инженера — бесплатно. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/vtorichka',
    'image' => '/public/assets/images/portfolio-photos/secondary/1_80sqm/04.jpg',
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
    'name' => 'Во вторичке',
    'url' => '/services/vtorichka',
  ),
),
    'schema' => [
        TheFunction::faqSchema([
            ['question' => 'В чём отличие ремонта во вторичке от новостройки?', 'answer' => 'Главное — демонтаж старой отделки, замена изношенных коммуникаций (электрика, трубы, вентиляция), выравнивание кривых стен и потолков старого фонда. Работаем с хрущёвками, сталинками, панельными и кирпичными домами.'],
            ['question' => 'Обязательно ли менять проводку и трубы во вторичке?', 'answer' => 'В 90% случаев — да. Старая алюминиевая проводка и стальные трубы не соответствуют современным нагрузкам и СНиП. Заменяем на медную проводку ВВГнг-LS и полипропилен/металлопластик — входит в капитальный ремонт.'],
            ['question' => 'Сколько стоит ремонт в хрущёвке / сталинке / панельке?', 'answer' => 'От 640 000 ₽ за квартиру (косметический пакет). Капитальный с заменой коммуникаций — от 13 000 ₽/м². Точная цена после замеров: учтём площадь, состояние стен, тип перекрытий, нужный пакет работ.'],
            ['question' => 'Как вы работаете с перепланировкой во вторичке?', 'answer' => 'Помогаем согласовать перепланировку в Мосжилинспекции: готовим проект, координируем с проектировщиками. Работы по сносу/возведению стен включаем в общую смету ремонта.'],
            ['question' => 'Даете ли гарантию на ремонт во вторичке?', 'answer' => 'Да, официальная гарантия 3 года на все работы и материалы, включая замену коммуникаций. Фиксируется в договоре. На скрытые дефекты (проводка в стенах, трубы в стяжке) ответственность сохраняется весь срок.'],
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
        content="<?= htmlspecialchars($seo['og']['title']); ?>">
    <meta property="og:description"
        content="Ремонт квартиры на вторичном рынке в Москве от 640 000 ₽. Демонтаж, замена коммуникаций, отделка под ключ. Ремонт в хрущёвке, сталинке, панельном и кирпичном доме.">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description"
        content="Ремонт квартир на вторичном рынке под ключ от 640 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.">
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
        $heroH1 = 'Ремонт квартир во вторичке';
        $heroFormId = 'vtorichka_hero';
        $heroSubtitle = 'С 2014 года делаем ремонт на вторичном рынке Москвы. Работаем со старым фондом, «хрущёвками» и сталинками. Заменяем всю электрику и сантехнику на новую. Отлично знаем нюансы старого жилья.';
        include './public/components/hero-section.php';
        ?>

<!-- 2. price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Сколько стоит ремонт вторички
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
                                content="<?= htmlspecialchars($price['заголовок']); ?> ремонт в новостройке">
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
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center">Реализованные проекты на
                    вторичном рынке</h2>
                <!-- cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
                    <?php $portfolioRepairLabels = ['Косметический', 'Капитальный', 'Дизайнерский']; ?>
                    <?php foreach ($portfolio as $key => $value): ?>
                        <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                            itemtype="https://schema.org/CreativeWork">
                            <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                            <meta itemprop="description"
                                content="Ремонт на вторичном рынке, срок: <?= htmlspecialchars($value['срок']); ?>, стоимость: <?= htmlspecialchars($value['цена']); ?>">
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
                            <span class="font-semibold text-gray-800" itemprop="name">Когда лучше начинать ремонт во вторичке?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Начинать можно в любое время. В отличие от новостройки, вторичный фонд не даёт усадку, поэтому нет ограничений по срокам начала работ.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Нужно ли полностью вывозить мебель?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Для капитального ремонта — да, мебель мешает демонтажу и отделке. Мы можем помочь с упаковкой и временным хранением. Для косметического — частично освобождаем зоны работ.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Могут ли возникнуть скрытые проблемы?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">В старом фонде бывают сюрпризы: гнилые перекрытия, старая проводка, плесень. На бесплатном замере мы проверяем все скрытые зоны тепловизором и влагомером и предупреждаем о рисках.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Можно ли делать перепланировку во вторичке?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Можно, но требуется согласование. Мы помогаем подготовить проект и документы для Мосжилинспекции. Сами не трогаем несущие стены без проекта.</span>
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

        <!-- J-05: блок «С чего начать» со ссылками на этапы ремонта -->
        <section class="reveal bg-white py-10 md:py-14" aria-labelledby="vtorichka-start-heading">
            <div class="max-w-7xl mx-auto px-4">
                <h2 id="vtorichka-start-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
                    С чего начать ремонт во вторичке
                </h2>
                <p class="mt-3 text-center text-gray-600 max-w-3xl mx-auto">
                    Пять шагов, которые снимают 80% сюрпризов: от диагностики инженерии до фиксированной сметы.
                </p>
                <ol class="mt-8 grid grid-cols-1 md:grid-cols-5 gap-4">
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <div class="text-sm font-bold text-[#6d5744]">01</div>
                        <div class="mt-1 font-semibold text-gray-900">Диагностика</div>
                        <p class="mt-1 text-sm text-gray-600">Проверяем электрику, стояки, вентиляцию и несущие конструкции. По итогам — список обязательных замен.</p>
                    </li>
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <div class="text-sm font-bold text-[#6d5744]">02</div>
                        <div class="mt-1 font-semibold text-gray-900">Планировка</div>
                        <p class="mt-1 text-sm text-gray-600">Решаем, что меняем без согласования, а где нужен проект. <a href="/services/evro-dvushka" class="text-[#6d5744] underline">Варианты планировок</a>.</p>
                    </li>
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <div class="text-sm font-bold text-[#6d5744]">03</div>
                        <div class="mt-1 font-semibold text-gray-900">Смета</div>
                        <p class="mt-1 text-sm text-gray-600">Считаем работы по ГЭСН и фиксируем сумму в договоре. <a href="/smeta-obrazec" class="text-[#6d5744] underline">Образец сметы</a>.</p>
                    </li>
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <div class="text-sm font-bold text-[#6d5744]">04</div>
                        <div class="mt-1 font-semibold text-gray-900">Инженерия</div>
                        <p class="mt-1 text-sm text-gray-600">Меняем то, что нельзя сделать потом: проводка, трубы, стяжка, гидроизоляция.</p>
                    </li>
                    <li class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <div class="text-sm font-bold text-[#6d5744]">05</div>
                        <div class="mt-1 font-semibold text-gray-900">Отделка</div>
                        <p class="mt-1 text-sm text-gray-600">Стены, полы, потолки, двери. <a href="/calculator" class="text-[#6d5744] underline">Рассчитайте стоимость</a> заранее.</p>
                    </li>
                </ol>
            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <?php
        $ctaFormId = 'vtorichka_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        include './public/components/cta-section.php';
        ?>


        <!-- Типы домов на вторичном рынке -->
        <section class="py-16 bg-gray-50 reveal">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Ремонт квартир в любом типе дома</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Работаем со всеми типами жилья на вторичном рынке Москвы. Учитываем особенности конструкции, возраста дома и износа коммуникаций.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-building text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в панельном доме</h3>
                        <p class="text-gray-600 text-sm">Неровные стены и потолки требуют выравнивания штукатуркой. Швы между панелями нуждаются в усиленной звукоизоляции. Опыт — 100+ панельных проектов.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-home text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в кирпичном доме</h3>
                        <p class="text-gray-600 text-sm">Старый кирпич требует бережного штробления под проводку. Высокая несущая способность позволяет любые перепланировки. Плюс — отличная звукоизоляция стен.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-city text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в монолитном доме</h3>
                        <p class="text-gray-600 text-sm">Свободная планировка — главный плюс. Стены возводятся из газоблока или кирпича. Тёплые полы эффективны благодаря бетонным перекрытиям.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-clock text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в хрущёвке</h3>
                        <p class="text-gray-600 text-sm">Полная замена коммуникаций — обязательна. Небольшие метражи требуют эргономичных решений. Демонтаж встроенных шкафов и антресолей расширит пространство.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-crown text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в сталинке</h3>
                        <p class="text-gray-600 text-sm">Высокие потолки (до 3,5 м) позволяют двухуровневые решения. Паркет восстанавливаем, лепнину сохраняем. Большие комнаты — для дизайнерских проектов.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-layer-group text-[#6d5744] text-xl"></i></div>
                        <h3 class="text-lg font-heading font-bold mb-2">Ремонт в брежневке</h3>
                        <p class="text-gray-600 text-sm">Улучшенная планировка по сравнению с хрущёвками. Раздельные санузлы, изолированные комнаты. Замена проводки и труб — обязательный этап капремонта.</p>
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