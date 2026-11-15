<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$bg_url = '/public/assets/images/portfolio-photos/4room/standard/1_65sqm/1.png';

$seo = TheFunction::seo([
    'title' => 'Ремонт коммерческих помещений — под ключ',
    'description' => 'Ремонт коммерческих помещений в Москве. Офисы, магазины, кафе, рестораны, салоны красоты, стоматологии, аптеки, фитнес-центры, детские центры. С соблюдением СНиП и пожарных норм. Смета в день обращения, гарантия 3 года. Бесплатный выезд. — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/kommercheskie',
    'image' => '/public/assets/images/portfolio-photos/4room/standard/1_65sqm/1.png',
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
    'name' => 'Kommercheskie',
    'url' => '/services/kommercheskie',
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
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta property="og:description"
        content="Ремонт коммерческих помещений под ключ. Прозрачная смета, фиксированные сроки, гарантия 3 года.">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?> — Коммерческий ремонт">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title"
        content="<?= htmlspecialchars($title); ?> под ключ в Москве | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?>">
    <meta name="twitter:description"
        content="Ремонт коммерческих помещений под ключ. Прозрачная смета, фиксированные сроки, гарантия 3 года.">
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
    <main class="flex flex-col">

                <!-- 1. hero section -->
        <?php
        $heroFormId = 'kommercheskie_hero';
        $heroSubtitle = 'Зафиксируем стоимость в договоре. Работаем с гарантией. Составим смету под ваш бюджет.';
        include './public/components/hero-section.php';
        ?>

<!-- 2. price section -->
        <section id="price" class="reveal bg-white py-10 md:py-14">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">
                    Сколько стоит ремонт коммерческих помещений
                </h2>
                <p class="mt-2 text-gray-600 max-w-3xl">
                    Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%. Стоимость фиксируем в договоре. Точную смету рассчитаем после бесплатного замера.
                </p>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php foreach ($prices as $price): ?>
                        <article
                            class="bg-white <?= $price['стиль'] === 'рекомендуем' ? 'border-2 border-[#876b55] shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                            itemscope itemtype="https://schema.org/Service">
                            <meta itemprop="name"
                                content="<?= htmlspecialchars($price['заголовок']); ?> ремонт коммерческого помещения">
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
                        Ваш путь кльному ремонту:<br><span class="text-[#6d5744]">6 шагов</span> до новоселья
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
                            Ваше помещение в чистом виде и полностью готово к работе. Все работы выполняются по действующим нормам и технологическим картам.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Примеры -->

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
                            <span class="font-semibold text-gray-800" itemprop="name">Можно ли работать в помещении во
                                время
                                ремонта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">На грязных этапах работа в помещении затруднена. Мы согласуем
                                поэтапный график —
                                будет шумно и пыльно. Часть зон можем закрыть и вести работы в нерабочее время.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Что если смета вырастет в
                                процессе?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Смета фиксируется договором. Изменения возможны только по вашему
                                согласованию при
                                дополнительных работах.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Нужен ли дизайн-проект для
                                капитального
                                ремонта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Не обязательно. Но проект помогает точно рассчитать стоимость и
                                избежать переделок. Мы можем
                                сделать базовую планировку.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Как вы контролируете качество
                                работ?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Прораб и инженер технадзора контролируют этапы, ведем фотоотчеты и
                                приемку работ по
                                чек-листу.</span>
                        </div>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы по
                                договору?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, работаем по официальному договору. В нем фиксируются сроки,
                                стоимость и гарантия.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 11. Финальный CTA -->
        <?php
        $ctaFormId = 'kommercheskie_cta';
        $ctaFormTitle = 'Рассчитать стоимость ремонта';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        include './public/components/cta-section.php';
        ?>


        <!-- Типы коммерческих помещений -->
        <section class="py-16 bg-gray-50 reveal">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Ремонт любых коммерческих помещений в Москве</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Специализируемся на отделке коммерческой недвижимости. Учитываем специфику бизнеса, нормы СНиП, пожарную безопасность и санэпидемтребования.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="/services/kommercheskie" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-briefcase text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Офисы под ключ</h3><p class="text-gray-500 text-xs">Open space, кабинеты, переговорные, ресепшн</p></a>
                    <a href="/services/magazin" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-store text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Магазины и бутики</h3><p class="text-gray-500 text-xs">Торговые залы, витрины, примерочные, склад</p></a>
                    <a href="/services/kafe" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-utensils text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Кафе и рестораны</h3><p class="text-gray-500 text-xs">Залы, барные стойки, кухня, санузлы для посетителей</p></a>
                    <a href="/services/fitness" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-dumbbell text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Фитнес-центры</h3><p class="text-gray-500 text-xs">Залы, раздевалки, душевые, сауны, зона ресепшн</p></a>
                    <a href="/services/salon-krasoty" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-spa text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Салоны красоты</h3><p class="text-gray-500 text-xs">Парикмахерские, косметология, маникюр, зона ожидания</p></a>
                    <a href="/services/stomatologiya" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-tooth text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Стоматологии</h3><p class="text-gray-500 text-xs">Кабинеты, рентген, стерилизация, санузлы, зона ожидания</p></a>
                    <a href="/services/apteka" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md hover:border-[#876b55] transition"><i class="fas fa-tablets text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Аптеки</h3><p class="text-gray-500 text-xs">Торговый зал, подсобные, хранение, зона приёма товара</p></a>
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 text-center hover:shadow-md transition"><i class="fas fa-child text-[#6d5744] text-2xl mb-2"></i><h3 class="font-heading font-bold mb-1">Детские центры</h3><p class="text-gray-500 text-xs">Игровые, учебные классы, санузлы, зона родителей</p></div>
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