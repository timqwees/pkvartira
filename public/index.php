<?php
$site = Setting\Route\Function\Functions::site();
$featuredProjects = Setting\Route\Function\Functions::featuredPortfolio('3-комнатные', 3);

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Ремонт квартир под ключ в Москве — от 8 000 ₽/м², гарантия 3 года',
    'description' => 'Ремонт квартир и домов под ключ в Москве: косметический от 8 000 ₽/м², капитальный от 13 000 ₽, дизайнерский от 18 000 ₽. Фиксированная смета, гарантия 3 года, бесплатный замер.',
    'image' => $site['baseUrl'] . '/public/assets/images/pages/main/hero/bg.webp',
    'url' => $site['canonicalUrl'],
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="keywords"
        content="заказать ремонт квартиры, ремонт квартир, ремонт квартир под ключ, ремонт дачи, ремонт котеджа, ремонт квартир Москва, капитальный ремонт квартиры, дизайнерский ремонт, элитный ремонт квартир, премиальный ремонт, ремонт недорого, ремонт для сдачи, ремонт для продажи, ремонт с мебелью, ремонт с материалом, отделка квартир, комплексный ремонт квартир">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <!--Verefy-->
    <meta name="google-site-verification" content="jLp0P98pT6xSVSJnELONG18GuBE5WAoL6q3o8P9UxwA" />
    <meta name="yandex-verification" content="bf2ddc27f35803d2" />

    <!-- Open Graph -->
    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seo['og']['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['og']['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">

    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="<?= htmlspecialchars($seo['twitter']['card']); ?>">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    <?= $seo['jsonLd']; ?>
    </script>


    <?php include_once './public/components/head-includes.php'; ?>
    <!-- Preload LCP hero image -->
    <link rel="preload" as="image" href="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp" fetchpriority="high">
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="pt-20 flex flex-col" style="padding-top:80px">

        <!-- Hero Content -->
        <section class="relative text-white py-12 md:py-32 bg-center bg-cover bg-no-repeat" style="background-image: url(<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp);">
            <div class="hero-overlay"></div>
            <div class="relative z-10 container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                    <div class="max-w-4xl">
                        <h1 class="z-10 hero-title text-3xl md:text-5xl font-bold mb-6 text-white leading-tight">
                            Ремонт в Москве без нервов:<br>
                            - <strong class="text-orange-500">фиксированная</strong> цена,<br>
                            - <strong class="text-orange-400">реальные</strong> сроки<br>
                            - <strong class="text-orange-300">компенсация</strong>, если что-то пойдет не так
                        </h1>
                        <p class="z-10 hero-subtitle text-2xl mb-8 text-white max-w-3xl">
                            Приедем на замер в день обращения. Составим смету в <strong class="text-orange-500">3&nbsp;вариантах
                            </strong> под ваш бюджет. Начнем работу
                            через <strong class="text-orange-500">2 дня</strong>
                        </p>

                        <div class="flex items-center flex-wrap gap-3 mb-6">
                            <button data-button-dialog
                                class="ripple inline-flex items-center gap-2 bg-white text-black px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-black/25 hover:shadow-xl hover:shadow-black/30 hover:-translate-y-0.5 hover:scale-[1.03] transition-all duration-300 cursor-pointer">
                                <i class="fa-solid fa-calculator"></i>
                                <span>Рассчитать ремонта за <span class="text-orange-500"> 60 секунд</span></span>
                            </button>
                            <span class="hero-stat"><i class="fa-solid fa-star text-yellow-400"></i> 5.0 рейтинг на Яндекс</span>
                            <span class="hero-stat"><i class="fa-solid fa-building"></i> 320+ объектов</span>
                            <span class="hero-stat"><i class="fa-solid fa-shield-halved"></i> Гарантия 3 года</span>
                            <span class="hero-stat"><i class="fa-solid fa-ruler-combined"></i> Замер + смета бесплатно</span>
                            <span class="hero-stat"><i class="fa-solid fa-file-word"></i> 3 варианта под ваш бюджет</span>
                            <span class="hero-stat"><i class="fa-solid fa-file-circle-check"></i> Цена в договоре без сюрпризов</span>
                        </div>

                        <!-- <div class="flex items-center flex-wrap gap-2 mb-3">
                            <span class="hero-stat"><i class="fa-solid fa-ruler-combined"></i> Замер + смета бесплатно</span>
                            <span class="hero-stat"><i class="fa-solid fa-file-word"></i> 3 варианта под ваш бюджет</span>
                            <span class="hero-stat"><i class="fa-solid fa-file-circle-check"></i> Цена в договоре без сюрпризов</span>
                        </div> -->
                    </div>

                    <?php
                    $ctaFormId = 'hero_glavnaya';
                    $ctaExpandable = true;
                    include './public/components/cta-form.php';
                    ?>

                </div>

            </div>
        </section>

        <!-- 2 -->
        <section
            class="py-16 bg-gradient-to-r from-blue-50 via-blue-100 to-blue-50 reveal">
            <span class="section-number">02</span>
            <div class="container mx-auto px-4">
                <!-- title -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Рассчитайте стоимость вашего ремонта<br>и получите <span class="text-orange-600">3
                            варианта</span> сметы под ваш бюджет
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base">
                        Ответьте на 5 простых вопроса, чтобы мы подготовили для вас 3 варианта сметы под ваш бюджет
                    </p>
                </div>

                <form action="/send/email" method="POST" data-form-id="quiz_glavnaya" class="max-w-5xl mx-auto">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 md:p-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <select name="тип жилья"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                aria-label="Тип жилья">
                                <option value="" selected disabled>Тип жилья?</option>
                                <option value="Новостройка">Новостройка</option>
                                <option value="Вторичка">Вторичка</option>
                                <option value="Коттедж">Коттедж / Загородный дом</option>
                            </select>
                            <select name="площадь обьекта"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                aria-label="Площадь объекта">
                                <option value="" selected disabled>Площадь?</option>
                                <?php for ($i = 20; $i <= 150; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> м²</option>
                                <?php } ?>
                            </select>
                            <select name="Стиль ремонта"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                aria-label="Стиль ремонта">
                                <option value="" selected disabled>Стиль?</option>
                                <option value="Современный">Современный</option>
                                <option value="Классический">Классический</option>
                                <option value="Лофт">Лофт</option>
                                <option value="Скандинавский">Скандинавский</option>
                                <option value="Не определился">Ещё не определился</option>
                            </select>
                            <select name="Дата планировки"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                aria-label="Когда планируете начинать работы">
                                <option value="" selected disabled>Когда начать?</option>
                                <option value="Сейчас">В ближайшее время</option>
                                <option value="Через 1–2 мес">Через 1–2 месяца</option>
                                <option value="На будущее">Просто прицениваюсь</option>
                            </select>
                            <select name="Куда прислать расчет?"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                aria-label="Куда прислать расчет">
                                <option value="" selected disabled>Куда прислать?</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Telegram">Telegram</option>
                                <option value="MAX">MAX</option>
                            </select>
                            <div class="relative">
                                <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone
                                    name="телефн" placeholder="(___) ___-__-__" aria-label="Телефон"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition" required>
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <label class="flex items-start gap-2 text-xs text-gray-500 cursor-pointer">
                                <input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0">
                                <span>Согласен на обработку персональных данных</span>
                            </label>
                            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
                            <button type="submit"
                                class="cta-button bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-xl text-base font-bold shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition-all whitespace-nowrap">
                                Получить расчёт бесплатно
                            </button>
                        </div>
                        <p class="text-xs text-gray-400 text-center mt-3">Ответим за 5 минут</p>
                    </div>
                </form>
            </div>
        </section>

        <!-- Trust Stats Section -->
        <section class="py-16 md:py-24 bg-gray-50 counter-section" id="counters">
            <span class="section-number">03</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-14">
                    <span class="label-tag">О компании</span>
                    <h2 class="section-heading mb-4">
                        Нам доверяют — <strong class="text-orange-600">10 лет</strong> безупречной репутации
                    </h2>
                    <p class="section-subtitle mx-auto">
                        Каждый объект — это чья-то история. Мы гордимся каждой из них.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 max-w-4xl mx-auto">
                    <div class="stat-card reveal">
                        <div class="stat-icon"><i class="fa-regular fa-calendar-check"></i></div>
                        <div class="stat-number"><span class="counter" data-target="12" data-suffix="+"></span></div>
                        <div class="stat-label">Лет на рынке ремонта</div>
                    </div>
                    <div class="stat-card reveal reveal-delay-1">
                        <div class="stat-icon"><i class="fa-regular fa-building"></i></div>
                        <div class="stat-number"><span class="counter" data-target="325" data-suffix=""></span></div>
                        <div class="stat-label">Выполненных объектов</div>
                    </div>
                    <div class="stat-card reveal reveal-delay-2">
                        <div class="stat-icon"><i class="fa-regular fa-heart"></i></div>
                        <div class="stat-number"><span class="counter" data-target="98" data-suffix="%"></span></div>
                        <div class="stat-label">Довольных клиентов</div>
                    </div>
                    <div class="stat-card reveal reveal-delay-3">
                        <div class="stat-icon"><i class="fa-regular fa-handshake"></i></div>
                        <div class="stat-number"><span class="counter" data-target="3" data-suffix=" года"></span></div>
                        <div class="stat-label">Гарантии на работы</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4 -->
        <section class="max-w-[90%] mx-auto py-16 rounded-2xl reveal">
            <span class="section-number">04</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-14">
                    <span class="label-tag">Форматы ремонта</span>
                    <h2 class="section-heading mb-4">
                        Выберите подходящий формат ремонта для вашей квартиры
                    </h2>
                    <p class="text-xl text-gray-600">
                        Работаем честно — вы платите только за те работы, которые реально необходимы вашему объекту
                    </p>
                </div>

                <!-- Desktop: all 4 cards in grid | Mobile: swiper -->
                <div class="swiper swiper-type-2 md:hidden">
                    <div class="swiper-wrapper">

                        <!-- Slide 1: Косметический ремонт -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/cosmetic.png"
                                        alt="Косметический ремонт" title="Косметический ремонт — от 8 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 8 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Косметический ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-[#3F6A9B]">от 14 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Если нужно обновить
                                            интерьер
                                            перед заездом или для сдачи в аренду.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Демонтаж старых покрытий,
                                            переклейка обоев, укладка ламината, покраска потолков, замена розеток.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Самый быстрый способ
                                            превратить «бабушкин ремонт» в современное жилье без огромных вложений.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2: Капитальный ремонт (Популярный) -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="absolute -top-6 left-4 bg-orange-500 text-white px-3 py-1 rounded-t-lg text-xs font-bold z-10">
                                Самый популярный
                            </div>
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-orange-500 h-full flex flex-col relative">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/capital.png"
                                        alt="Капитальный ремонт" title="Капитальный ремонт — от 13 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 13 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Капитальный ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-orange-600">от 45 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Для новостроек в бетоне или
                                            «вторички» с изношенными коммуникациями.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Полная замена электрики и
                                            сантехники, возведение перегородек, выравнивание стен по маякам, стяжка
                                            пола,
                                            чистовая отделка.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Полное обновление всех
                                            инженерных систем. Забудете о проблемах с проводкой или трубами на ближайшие
                                            20
                                            лет.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3: Дизайнерский ремонт -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/finish.png"
                                        alt="Дизайнерский ремонт" title="Дизайнерский ремонт — от 18 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 18 000 ₽/м²
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Дизайнерский ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-[#3F6A9B]">от 60 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Для тех, кому важна
                                            уникальная
                                            эстетика, перепланировка и сложные решения.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Работа по индивидуальному
                                            дизайн-проекту, многоуровневое освещение, скрытые двери, теневые профили,
                                            декоративная штукатурка.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Мы воплощаем в жизнь
                                            самые
                                            сложные идеи. Авторский надзор и комплектация объекта материалами — на нас.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 4: Премиум и элитный ремонт -->
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-yellow-400/30 hover:border-yellow-500 h-full flex flex-col">
                                <div class="relative">
                                    <img data-src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/finish.png"
                                        alt="Премиум и элитный ремонт" title="Премиум и элитный ремонт — от 25 000 ₽/м²" class="lazy w-full h-36 md:h-40 object-cover"
                                        width="640" height="360" decoding="async" loading="lazy">
                                    <div
                                        class="absolute top-2 right-2 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                        от 25 000 ₽/м²
                                    </div>
                                    <div class="absolute top-2 left-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                        PREMIUM
                                    </div>
                                </div>
                                <div class="p-4 flex flex-col flex-grow justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">Премиум и элитный ремонт</h3>

                                        <div class="mb-3">
                                            <span class="text-sm text-gray-500">Срок:</span>
                                            <span class="text-sm font-semibold text-yellow-600">от 90 дней</span>
                                        </div>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Для кого:</strong> Для владельцев бизнес-класса
                                            и премиум-недвижимости. Максимальное качество и эксклюзивность.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-2">
                                            <strong class="text-gray-800">Что входит:</strong> Итальянская плитка, паркет,
                                            авторская мебель, умный дом, сложные архитектурные решения, полная
                                            автоматизация.
                                        </p>

                                        <p class="text-gray-600 text-sm mb-4">
                                            <strong class="text-green-600">Ваша выгода:</strong> Персональный архитектор,
                                            комплектация премиальными материалами, гарантия 5 лет на все работы.
                                        </p>
                                    </div>

                                    <a href="/calculator"
                                        class="block w-full text-center bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-4 py-2 rounded-lg hover:from-yellow-600 hover:to-orange-600 transition text-sm font-semibold mt-auto shadow-md">
                                        Рассчитать для моей площади
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination mt-8"></div>
                    <div class="swiper-button-next" aria-label="Следующий формат ремонта"></div>
                    <div class="swiper-button-prev" aria-label="Предыдущий формат ремонта"></div>
                </div>

                <!-- Desktop grid: все 4 карты сразу видны -->
                <div class="hidden md:grid grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                    <!-- Card 1: Косметический ремонт -->
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                        <div class="relative">
                            <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/cosmetic.png"
                                alt="Косметический ремонт — быстрый ремонт квартиры по цене | ПКвартира" title="Косметический ремонт — от 8 000 ₽/м²" class="w-full h-36 md:h-40 object-cover"
                                width="640" height="360" decoding="async" loading="lazy">
                            <div
                                class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                от 8 000 ₽/м²
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Косметический ремонт</h3>

                                <div class="mb-3">
                                    <span class="text-sm text-gray-500">Срок:</span>
                                    <span class="text-sm font-semibold text-[#3F6A9B]">от 14 дней</span>
                                </div>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Для кого:</strong> Если нужно обновить интерьер
                                    перед заездом или для сдачи в аренду.
                                </p>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Что входит:</strong> Демонтаж старых покрытий,
                                    переклейка обоев, укладка ламината, покраска потолков, замена розеток.
                                </p>

                                <p class="text-gray-600 text-sm mb-4">
                                    <strong class="text-green-600">Ваша выгода:</strong> Самый быстрый способ
                                    превратить «бабушкин ремонт» в современное жилье без огромных вложений.
                                </p>
                            </div>

                            <a href="/calculator"
                                class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                Рассчитать для моей площади
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Капитальный ремонт (Популярный) -->
                    <div class="relative">
                        <div
                            class="absolute -top-8 left-1/2 -translate-x-1/2 bg-orange-500 text-white px-4 py-1 rounded-t-lg text-xs font-bold z-20 shadow-md">
                            Самый популярный
                        </div>
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-orange-500 h-full flex flex-col pt-4">
                            <div class="relative">
                                <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/capital.png"
                                    alt="Капитальный ремонт — полный ремонт квартиры с заменой коммуникаций | ПКвартира" title="Капитальный ремонт — от 13 000 ₽/м²" class="w-full h-36 md:h-40 object-cover"
                                    width="640" height="360" decoding="async" loading="lazy">
                                <div
                                    class="absolute top-2 right-2 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                    от 13 000 ₽/м²
                                </div>
                            </div>
                            <div class="p-4 flex flex-col flex-grow justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 mb-2">Капитальный ремонт</h3>

                                    <div class="mb-3">
                                        <span class="text-sm text-gray-500">Срок:</span>
                                        <span class="text-sm font-semibold text-orange-600">от 45 дней</span>
                                    </div>

                                    <p class="text-gray-600 text-sm mb-2">
                                        <strong class="text-gray-800">Для кого:</strong> Для новостроек в бетоне или
                                        «вторички» с изношенными коммуникациями.
                                    </p>

                                    <p class="text-gray-600 text-sm mb-2">
                                        <strong class="text-gray-800">Что входит:</strong> Полная замена электрики и
                                        сантехники, возведение перегородек, выравнивание стен по маякам, стяжка
                                        пола,
                                        чистовая отделка.
                                    </p>

                                    <p class="text-gray-600 text-sm mb-4">
                                        <strong class="text-green-600">Ваша выгода:</strong> Полное обновление всех
                                        инженерных систем. Забудете о проблемах с проводкой или трубами на ближайшие
                                        20
                                        лет.
                                    </p>
                                </div>

                                <a href="/calculator"
                                    class="block w-full text-center bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition text-sm font-semibold mt-auto">
                                    Рассчитать для моей площади
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Дизайнерский ремонт -->
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-[#3F6A9B]/20 hover:border-[#3F6A9B] h-full flex flex-col">
                        <div class="relative">
                            <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/finish.png"
                                alt="Дизайнерский ремонт — авторский ремонт с дизайн-проектом | ПКвартира" title="Дизайнерский ремонт — от 18 000 ₽/м²" class="w-full h-36 md:h-40 object-cover"
                                width="640" height="360" decoding="async" loading="lazy">
                            <div
                                class="absolute top-2 right-2 bg-[#3F6A9B] text-white px-3 py-1 rounded-full text-sm font-bold">
                                от 18 000 ₽/м²
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Дизайнерский ремонт</h3>

                                <div class="mb-3">
                                    <span class="text-sm text-gray-500">Срок:</span>
                                    <span class="text-sm font-semibold text-[#3F6A9B]">от 60 дней</span>
                                </div>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Для кого:</strong> Для тех, кому важна уникальная
                                    эстетика, перепланировка и сложные решения.
                                </p>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Что входит:</strong> Работа по индивидуальному
                                    дизайн-проекту, многоуровневое освещение, скрытые двери, теневые профили,
                                    декоративная штукатурка.
                                </p>

                                <p class="text-gray-600 text-sm mb-4">
                                    <strong class="text-green-600">Ваша выгода:</strong> Мы воплощаем в жизнь самые
                                    сложные идеи. Авторский надзор и комплектация объекта материалами — на нас.
                                </p>
                            </div>

                            <a href="/calculator"
                                class="block w-full text-center bg-[#3F6A9B] text-white px-4 py-2 rounded-lg hover:bg-[#2d527a] transition text-sm font-semibold mt-auto">
                                Рассчитать для моей площади
                            </a>
                        </div>
                    </div>

                    <!-- Card 4: Премиум и элитный ремонт -->
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition border-2 border-yellow-400/30 hover:border-yellow-500 h-full flex flex-col">
                        <div class="relative">
                            <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/renovation-format/finish.png"
                                alt="Премиум и элитный ремонт — роскошь и эксклюзивность квартиры | ПКвартира" title="Премиум и элитный ремонт — от 25 000 ₽/м²" class="w-full h-36 md:h-40 object-cover"
                                width="640" height="360" decoding="async" loading="lazy">
                            <div
                                class="absolute top-2 right-2 bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                от 25 000 ₽/м²
                            </div>
                            <div class="absolute top-2 left-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                PREMIUM
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800 mb-2">Премиум и элитный ремонт</h3>

                                <div class="mb-3">
                                    <span class="text-sm text-gray-500">Срок:</span>
                                    <span class="text-sm font-semibold text-yellow-600">от 90 дней</span>
                                </div>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Для кого:</strong> Для владельцев бизнес-класса
                                    и премиум-недвижимости. Максимальное качество и эксклюзивность.
                                </p>

                                <p class="text-gray-600 text-sm mb-2">
                                    <strong class="text-gray-800">Что входит:</strong> Итальянская плитка, паркет,
                                    авторская мебель, умный дом, сложные архитектурные решения, полная
                                    автоматизация.
                                </p>

                                <p class="text-gray-600 text-sm mb-4">
                                    <strong class="text-green-600">Ваша выгода:</strong> Персональный архитектор,
                                    комплектация премиальными материалами, гарантия 5 лет на все работы.
                                </p>
                            </div>

                            <a href="/calculator"
                                class="block w-full text-center bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-4 py-2 rounded-lg hover:from-yellow-600 hover:to-orange-600 transition text-sm font-semibold mt-auto shadow-md">
                                Рассчитать для моей площади
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CTA: Все форматы -->
                <div class="text-center mt-10">
                    <a href="/services/pod-klyuch"
                        class="inline-flex items-center gap-2 bg-[#0F172A] text-white px-6 py-3 rounded-lg hover:bg-[#1e293b] transition text-sm font-semibold shadow-md">
                        <i class="fas fa-th-large"></i>
                        Все форматы и виды ремонта (71 услуга)
                    </a>
                </div>

                <!-- Footer: Trigger доверия -->
                <div
                    class="bg-gradient-to-r from-[#3F6A9B]/10 to-orange-500/10 rounded-xl p-6 md:p-8 border border-[#3F6A9B]/30">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex-1">
                            <h4 class="text-xl md:text-2xl font-bold text-gray-800 mb-2">
                                <i class="fas fa-question-circle text-[#3F6A9B] mr-2"></i>
                                Не знаете, какой вид ремонта вам нужен?
                            </h4>
                            <p class="text-gray-600 text-sm md:text-base">
                                Приедем, проверим состояние стен и инженерных систем и скажем честно: где можно
                                сэкономить, а где — категорически нельзя.
                            </p>
                        </div>
                        <button data-button-dialog
                            class="shrink-0 bg-orange-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-orange-600 transition shadow-lg hover:shadow-xl flex items-center gap-2">
                            <i class="fas fa-user-tie"></i>
                            Вызвать инженера на бесплатную консультацию
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- GEO: Районы обслуживания -->
        <section class="py-16 bg-gray-50 reveal">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="section-number section-number-dark">05</span>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-gray-900 mb-4">Ремонт квартир в Москве и Московской области</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">Работаем по всей Москве и ближайшим городам Подмосковья. Бесплатный выезд инженера и точная смета в день обращения.</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                    <?php
                    $geoCities = ['Люберцы','Одинцово','Подольск','Мытищи','Химки','Лобня','Солнечногорск','Реутов','Зеленоград','Раменское','Пушкино','Видное','Балашиха','Домодедово','Долгопрудный','Щербинка','Звенигород','Красногорск','Митино','Бутово','Академический','Ленинский пр.', 'и другие...'];
                    $geoLinks = [
                        'Люберцы' => '/services/lyubertsy',
                        'Одинцово' => '/services/odintsovo',
                        'Подольск' => '/services/podolsk',
                        'Мытищи' => '/services/mytishchi',
                        'Химки' => '/services/khimki',
                        'Лобня' => '/services/lobnya',
                        'Солнечногорск' => '/services/solnechnogorsk',
                        'Реутов' => '/services/reutov',
                        'Зеленоград' => '/services/zelenograd',
                        'Раменское' => '/services/ramenskoye',
                        'Пушкино' => '/services/pushkino',
                        'Видное' => '/services/vidnoye',
                        'Балашиха' => '/services/balashikha',
                        'Домодедово' => '/services/domodedovo',
                        'Долгопрудный' => '/services/dolgoprudny',
                        'Щербинка' => '/services/shcherbinka',
                        'Звенигород' => '/services/zvenigorod',
                        'Красногорск' => '/services/krasnogorsk',
                        'Митино' => '/services/mitino',
                    ];
                    foreach ($geoCities as $g):
                        $link = $geoLinks[$g] ?? null;
                    ?>
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm border border-gray-100 hover:shadow-md hover:border-orange-200 transition">
                        <?php if ($link): ?>
                            <a href="<?= $link ?>" class="text-sm font-medium text-gray-700 hover:text-orange-500"><?= $g ?></a>
                        <?php else: ?>
                            <span class="text-sm font-medium text-gray-700"><?= $g ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mt-8">
                    <a href="/contact" class="text-orange-600 font-semibold hover:text-orange-700">Посмотреть контакты и схему проезда →</a>
                </div>
            </div>
        </section>

        <!-- 6 -->
        <section class="md:py-16 reveal bg-gray-50">
            <span class="section-number">06</span>
            <div class="container mx-auto px-4">
                <div
                    class="relative mx-auto max-w-[90%] md:max-w-[75%] flex flex-col md:flex-row items-start md:items-center justify-center mb-12">
                    <div class="text-center">
                        <span class="label-tag">Портфолио</span>
                        <h2 class="section-heading">
                            Наши последние работы
                        </h2>
                    </div>
                    <a href="/portfolio"
                        class="view-all-link block md:absolute right-0 text-blue-600 hover:text-blue-700 transition font-semibold flex items-center gap-2">
                        Смотреть всё портфолио
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- list -->
                <div class="container mx-auto">
                    <div
                        class="flex flex-wrap gap-3 md:gap-4 justify-center max-w-[95%] md:max-w-[90%] mx-auto text-sm md:text-xl">
                        <!-- Button 1 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/nowostroyka"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-building text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт квартир в новостройке</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 2 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-home text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт во вторичке</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 3 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-couch text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт студии</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 4 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-door-open text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 1-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 5 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-bed text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 2-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>

                        <!-- Button 6 -->
                        <a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room"
                            class="flex items-center gap-2 md:gap-3 bg-white border border-gray-300 rounded-lg px-3 py-2 md:px-4 md:py-3 hover:bg-gray-50 transition shadow-sm w-full sm:w-auto justify-center w-fit">
                            <i class="fas fa-house-user text-orange-600 text-sm md:text-base"></i>
                            <span class="text-gray-800 font-medium">Ремонт 3-комнатной</span>
                            <i class="fas fa-arrow-right text-orange-400 text-sm md:text-base"></i>
                        </a>
                    </div>
                </div>

                <!-- Project Cards -->
                <div class="relative mx-auto mt-10">
                    <!-- Swiper -->
                    <div class="swiper swiper-type-4 py-10">
                        <div class="swiper-wrapper">
                            <?php foreach ($featuredProjects as $project): ?>
                                <?php
                                $coverUrl = $project['cover']
                                    ? htmlspecialchars($site['baseUrl'] . '/' . $project['folder_image'] . '/' . $project['cover'])
                                    : '';
                                $descriptionParts = [htmlspecialchars($project['category']) . ', площадь ' . htmlspecialchars($project['size']) . '.'];
                                if (!empty($project['duration'])) {
                                    $descriptionParts[] = 'Срок выполнения — ' . htmlspecialchars($project['duration']) . '.';
                                }
                                if (!empty($project['price'])) {
                                    $descriptionParts[] = 'Стоимость — ' . htmlspecialchars($project['price']) . '.';
                                }
                                ?>
                                <div class="swiper-slide">
                                    <div
                                        class="border border-gray-100 shadow-sm bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition h-full list-none">
                                        <div class="relative">
                                            <?php if ($coverUrl): ?>
                                                <img data-src="<?= $coverUrl ?>"
                                                    alt="<?= htmlspecialchars($project['title']) ?>"
                                                    title="<?= htmlspecialchars($project['title']) ?>"
                                                    class="lazy w-full h-48 object-cover" width="768" height="384"
                                                    decoding="async" loading="lazy">
                                            <?php endif; ?>
                                        </div>

                                        <div class="flex flex-col justify-between items-center p-6 h-[calc(100%-12rem)]">
                                            <div class="flex flex-col w-full">
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                                    <?= htmlspecialchars($project['title']) ?>
                                                </h3>
                                                <p class="text-gray-600 mb-4">
                                                    <?= implode(' ', $descriptionParts) ?>
                                                </p>
                                            </div>

                                            <div class="flex items-center justify-between w-full gap-2">
                                                <div class="flex flex-col items-start justify-start text-sm text-gray-500">
                                                    <div class="relative">
                                                        <i class="fas fa-ruler-combined mr-1"></i>
                                                        <?= htmlspecialchars($project['size']) ?>
                                                    </div>
                                                    <?php if (!empty($project['duration'])): ?>
                                                        <div class="relative">
                                                            <i class="fas fa-clock mr-1"></i>
                                                            <?= htmlspecialchars($project['duration']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <a href="<?= htmlspecialchars(Setting\Route\Function\Functions::portfolioProjectUrl($project['slug'])) ?>"
                                                    class="text-orange-600 hover:text-orange-600 transition font-semibold flex items-center gap-1">
                                                    Смотреть проект
                                                    <i class="fas fa-arrow-right text-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <div class="swiper-button-prev" aria-label="Предыдущий слайд"></div>
                    <div class="swiper-button-next" aria-label="Следующий слайд"></div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-white reveal">
            <div class="container mx-auto px-4 text-center">
                <span class="label-tag">Направления</span>
                <h2 class="section-heading mb-6">Популярные виды работ и районы</h2>
                <div class="flex flex-wrap justify-center gap-3 max-w-4xl mx-auto">
                    <a href="/services/ukladka-laminata" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Укладка ламината</a>
                    <a href="/services/keramogranit-nazarovo" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Укладка керамогранита</a>
                    <a href="/services/ontario" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">ЖК Онтарио</a>
                    <a href="/services/solnechnogorsk" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Солнечногорске</a>
                    <a href="/services/lyubertsy" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Люберцах</a>
                    <a href="/services/odintsovo" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Одинцово</a>
                    <a href="/services/mitino" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Митино</a>
                    <a href="/services/khimki" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Химках</a>
                    <a href="/services/balashikha" class="px-5 py-3 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-700 hover:border-orange-500 hover:text-orange-500 transition shadow-sm">Ремонт в Балашихе</a>
                </div>
            </div>
        </section>

        <!-- 8 -->
        <section id="process" class="py-16 md:py-24 bg-blue-50 reveal">
            <span class="section-number">07</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-14">
                    <span class="label-tag">Как мы работаем</span>
                    <h2 class="section-heading mb-4">
                        Ваш путь к идеальному ремонту:<br><strong class="text-orange-600">6 шагов</strong> до новоселья
                    </h2>
                    <p class="text-xl text-gray-600">
                        Мы выстроили систему так, чтобы вы не тратили время на контроль и закупки
                    </p>
                </div>

                <div class="relative grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="hidden md:block absolute w-full h-0.5 bg-gray-300 top-8 z-0"></div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            01
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Ваша заявка</h3>
                        <p class="text-sm text-gray-600">
                            Оставьте заявку на сайте или позвоните нам. Менеджер ответит на все вопросы и забронирует за
                            вами время для бесплатного выезда инженера-сметчика.
                        </p>
                    </div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            02
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Профессиональный замер</h3>
                        <p class="text-sm text-gray-600">
                            Приезжаем со сверхточным лазерным оборудованием. Анализируем состояние стен, углов и
                            инженерных коммуникаций. Через 24 часа вы получаете 3 варианта детальной сметы под ваш
                            бюджет.
                        </p>
                    </div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            03
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Договор и фиксация цены</h3>
                        <p class="text-sm text-gray-600">
                            Подписываем официальный договор, где четко прописаны сроки и финальная стоимость. Цена
                            фиксируется на 100% — мы гарантируем отсутствие доплат и «скрытых» расходов в процессе.
                        </p>
                    </div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            04
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Закупка материалов</h3>
                        <p class="text-sm text-gray-600">
                            Собственный склад материалов. За счёт этого цены на материалы ниже. И наша собственная
                            гарантия.Организуем доставку, разгрузку и подъем. Вы получаете все отчеты в цифровом виде.
                        </p>
                    </div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            05
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Производство работ</h3>
                        <p class="text-sm text-gray-600">
                            Профильные бригады (электрики, сантехники, плиточники) приступают к делу. Вы получаете
                            ежедневные фото- и видеоотчеты в MAX. Контролируйте ремонт из любой точки мира.
                        </p>
                    </div>

                    <div class="text-center z-10 lift-hover">
                        <div
                            class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-lg shadow-blue-600/20 flex items-center justify-center mx-auto mb-4 text-xl font-bold">
                            06
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Сдача и гарантия</h3>
                        <p class="text-sm text-gray-600">
                            Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются согласно
                            ГОСТ и СНИП.
                            Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9 -->
        <section id="prices" class="py-16 md:py-24 bg-gray-50 reveal">
            <span class="section-number">08</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="label-tag">Стоимость</span>
                    <h2 class="section-heading mb-4">
                        Прозрачная стоимость работ:<br>фиксируем смету и не меняем её до конца ремонта
                    </h2>
                    <p class="section-subtitle mx-auto">
                        Выберите пакет услуг под ваши задачи. Итоговая сумма прописывается в договоре и не растет в
                        процессе.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div
                        class="flex flex-col justify-between items-center bg-white border-2 border-gray-200 rounded-xl p-8 hover:border-blue-600 transition lift-hover">
                        <div class="block">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Эконом (Косметический)</h3>
                            <div class="text-3xl font-bold text-blue-600 mb-2">от 8 000 ₽/м²</div>
                            <div class="text-sm text-gray-500 mb-4">Срок: от 14 дней · Гарантия: 3 год</div>
                            <p class="text-gray-600 mb-4">Идеально, чтобы освежить квартиру: замена обоев, ламината и
                                покраска потолков.</p>
                            <p class="text-sm font-semibold text-gray-800 mb-2">Что входит:</p>
                            <ul class="text-gray-600 space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Демонтаж старых покрытий</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Грунтовка и частичная шпаклевка стен
                                </li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Поклейка обоев или покраска</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Укладка ламината/линолеума</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Монтаж плинтусов и розеток</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg hover:bg-gray-300 transition">
                            Выбрать пакет
                        </button>
                    </div>

                    <div
                        class="flex flex-col justify-between items-center bg-blue-600 text-white rounded-xl p-8 hover:shadow-2xl transition-shadow duration-300 lift-hover">
                        <div class="block">
                            <div
                                class="bg-orange-500 text-white text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
                                ПОПУЛЯРНЫЙ
                            </div>
                            <h3 class="text-2xl font-bold mb-4">Стандарт (Капитальный)</h3>
                            <div class="text-3xl font-bold text-orange-300 mb-2">от 13 000 ₽/м²</div>
                            <div class="text-sm text-blue-100 mb-4">Срок: от 30 дней · Гарантия: 3 года</div>
                            <p class="mb-4">Полное обновление инженерных систем и идеально ровные поверхности.</p>
                            <p class="text-sm font-semibold mb-2">Что входит:</p>
                            <ul class="space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Весь перечень из «Эконом»</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Выравнивание стен по маякам</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Разводка новой электрики и
                                    сантехники
                                </li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Устройство стяжки пола</li>
                                <li><i class="fas fa-check text-orange-300 mr-2"></i>Укладка плитки в санузлах</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition font-semibold">
                            Выбрать пакет
                        </button>
                    </div>

                    <div
                        class="flex flex-col justify-between items-center bg-white border-2 border-gray-200 rounded-xl p-8 hover:border-blue-600 transition lift-hover">
                        <div class="block">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">Премиум (Дизайнерский)</h3>
                            <div class="text-3xl font-bold text-blue-600 mb-2">от 18 000 ₽/м²</div>
                            <div class="text-sm text-gray-500 mb-4">Срок: от 45 дней · Гарантия: 3 лет</div>
                            <p class="text-gray-600 mb-4">Бескомпромиссное качество и работа со сложными дизайнерскими
                                решениями.</p>
                            <p class="text-sm font-semibold text-gray-800 mb-2">Что входит:</p>
                            <ul class="text-gray-600 space-y-2 mb-8 text-sm">
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Весь перечень из «Стандарт»</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Монтаж многоуровневых потолков</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Декоративная штукатурка / Лепнина
                                </li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Установка скрытых дверей и трекового
                                    освещения</li>
                                <li><i class="fas fa-check text-green-500 mr-2"></i>Теплые полы и инсталляции</li>
                            </ul>
                        </div>
                        <button data-button-dialog
                            class="w-full bg-gray-200 text-gray-800 py-3 rounded-lg hover:bg-gray-300 transition">
                            Выбрать пакет
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- 10 -->
        <section id="reviews" class="py-16 md:py-24 bg-white reveal">
            <span class="section-number">09</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-14">
                    <span class="label-tag">Отзывы</span>
                    <h2 class="section-heading mb-4">
                        Что говорят о нас те, кто уже переехал в новую квартиру
                    </h2>
                </div>

                <!-- Ручные отзывы -->
                <div class="max-w-6xl mx-auto">
                    <p class="text-sm text-gray-500 mb-6">150+ проверенных отзывов</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Отзыв 1 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-blue-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/01.jpeg"
                                        alt="Александр В." title="Александр В." width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Александр В.</p>
                                    <p class="text-xs text-gray-500">15 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">ЖК «Сердце Столицы»</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Главный страх был, что цена в процессе вырастет в два раза. Но ребята из Проект
                                квартира молодцы — как в смете прописали сумму, так она и осталась до конца. Делали
                                ремонт в новостройке (64 м²). По срокам уложились день в день. Особенно порадовали
                                ежедневные фото в MAX — не нужно было через всю Москву ездить проверять».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 2 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-pink-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/02.jpeg" alt="Мария" title="Мария"
                                        width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Анатолий</p>
                                    <p class="text-xs text-gray-500">12 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Вторичка на Профсоюзной</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Нужно было капитально обновить старую сталинку. Переживала за трубы и проводку. Бригада
                                сработала очень чисто, сами договорились с УК об отключении стояков. Весь мусор вывозили
                                сразу, соседи ни разу не пожаловались. Качество отделки — на высоте, стены идеально
                                ровные под покраску».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 3 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/03.jpeg" alt="Дмитрий" title="Дмитрий"
                                        width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Дмитрий</p>
                                    <p class="text-xs text-gray-500">10 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Студия 35 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Заказывал черновой ремонт в студии. Понравилось, что не навязывали лишнего. Инженер на
                                замере сразу подсказал, где можно сэкономить на материалах, а где лучше взять подороже.
                                Сэкономил около 40 тысяч на закупках через их скидки в Петровиче. Рекомендую».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 4 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-green-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/04.jpeg"
                                        alt="Елена и Игорь" title="Елена и Игорь" width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Елена</p>
                                    <p class="text-xs text-gray-500">8 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Дизайнерский ремонт 78 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Делали дизайнерский ремонт по нашему проекту. Было много сложных моментов с трековым
                                освещением и скрытыми дверями. Мастера справились на 5+. Гарантию дали на 3 года, но,
                                судя по качеству, она нам не пригодится. Спасибо!»
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 5 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-orange-100 overflow-hidden flex-shrink-0">
<img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/05.jpeg" alt="Сергей К." title="Сергей К."
                                        width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Оля</p>
                                    <p class="text-xs text-gray-500">5 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Капитальный ремонт 52 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Нормальная контора. Делают быстро, лишних денег не просят. Смета понятная, каждый
                                гвоздь прописан. Оплата была поэтапная — сделал этап, я проверил, заплатил. Для меня это
                                было самым важным критерием доверия».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Отзыв 6 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100 lift-hover">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-purple-100 overflow-hidden flex-shrink-0">
<img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/06.jpeg" alt="Ольга Николаевна" title="Ольга Николаевна"
                                        width="48" height="48" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Ольга Николаевна</p>
                                    <p class="text-xs text-gray-500">2 апр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Косметический ремонт 45 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Освежили мне квартиру за 2 недели (косметика). Обои поклеены стык в стык, ламинат не
                                скрипит. Очень вежливые ребята, после себя оставили порядок. Приятно иметь дело с
                                профессионалами».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center mt-4">
                        <a href="<?= $site['baseUrl'] ?>/reviews"
                            class="mx-auto px-10 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                            Читать все отзывы
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 md:py-24 bg-gray-50 reveal" itemscope itemtype="https://schema.org/FAQPage">
            <span class="section-number">10</span>
            <div class="container mx-auto px-4">
                <div class="text-center mb-14">
                    <span class="label-tag">FAQ</span>
                    <h2 class="section-heading mb-4">
                        Отвечаем на важные вопросы <strong class="text-orange-600">честно</strong> и <strong
                            class="text-orange-600">без воды</strong>
                    </h2>
                    <p class="section-subtitle mx-auto">
                        Разбираем технические и финансовые нюансы вашего будущего ремонта
                    </p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Какой срок выполнения ремонта?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-2">Всё зависит от площади и сложности:</p>
                                <ul class="list-disc ml-5 space-y-1 mb-3">
                                    <li>Косметический ремонт — от 14 дней.</li>
                                    <li>Капитальный в ремонт — от 30 дней.</li>
                                    <li>Дизайнерский ремонт — от 40 дней.</li>
                                </ul>
                                <p>Мы фиксируем дату сдачи в договоре. Если мы опоздаем хотя бы на день — мы выплачиваем вам неустойку за каждые сутки просрочки.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Какая гарантия на работы?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Мы даем полную гарантию 3 года на все виды отделочных и инженерных работ. Если в течение этого срока у вас отклеится плинтус или возникнут проблемы с электрикой — мы приедем и бесплатно устраним всё в течение 48 часов. Наша ответственность прописана в договоре и закреплена юридически.</span>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Работаете ли вы с материалами заказчика?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Да, конечно. Мы можем работать с вашими материалами, но рекомендуем закупать их через нас. Благодаря собственному складу мы сможем поставить материалы дешевле. Всю логистику, проверку качества и подъем на этаж мы берем на себя.</span>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Как происходит оплата?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-2">Оплата происходит строго поэтапно:</p>
                                <ol class="list-decimal ml-5 space-y-1 mb-2">
                                    <li>Мы выполняем определенный объем работ (например, черновую отделку).</li>
                                    <li>Вы принимаете этап по акту.</li>
                                    <li>Только после этого вы оплачиваете этот объем.</li>
                                </ol>
                                <p>Вы всегда видите, за что платите, и контролируете бюджет.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Кто именно будет работать у меня в квартире?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">У нас работают только узкопрофильные специалисты со стажем от 5 лет. Электрику делает электрик, плитку кладет плиточник — никаких «универсалов». Все мастера — граждане РФ и РБ с проверенной репутацией. Мы несем полную ответственность за порядок на объекте и культуру поведения рабочих.</span>
                        </div>
                    </div>

                    <div class="border border-gray-200 rounded-xl overflow-hidden lift-hover" itemscope itemprop="mainEntity"
                        itemtype="https://schema.org/Question">
                        <button
                            class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                            <span class="font-semibold text-gray-800" itemprop="name">Не будет ли проблем с соседями и Управляющей Компанией?</span>
                            <i class="fas fa-chevron-down text-blue-600"></i>
                        </button>
                        <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                            itemtype="https://schema.org/Answer">
                            <span itemprop="text">Мы берем все коммуникации на себя. Работаем строго по «закону о тишине» в Москве (шумные работы только с 9:00 до 13:00 и с 15:00 до 19:00). После завершения работ проводим финальную уборку и вывозим мусор. Соседи и УК будут только благодарны, что вы выбрали профессионалов.</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 text-white reveal" style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #0f172a 100%);">
            <span class="section-number section-number-dark">11</span>
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Начните ремонт, который не захочется переделывать
                </h2>
                <p class="text-xl mb-8" style="color: #cbd5e1;">
                    Забронируйте бесплатный выезд инженера сегодня. Мы проведем замеры лазером, найдем все<br>«косяки»
                    застройщика и составим смету, которая не вырастет ни на рубль.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:<?php echo $site['phone']; ?>"
                        class="bg-orange-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-600 transition">
                        <i class="fas fa-phone mr-2"></i>
                        Вызвать инженера на замер
                    </a>
                    <button data-button-dialog
                        class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition">
                        <i class="fas fa-comments mr-2"></i>
                        Получить консультацию
                    </button>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Floating CTA for mobile -->
    <div class="floating-cta">
        <a href="tel:<?php echo $site['phone']; ?>" class="cta-phone"><i class="fas fa-phone mr-2"></i>Позвонить</a>
        <button data-button-dialog class="cta-calc"><i class="fas fa-calculator mr-2"></i>Расчёт сметы</button>
    </div>

    <!-- Local Scripts -->

    <script src="/public/assets/scripts/components/lazyIMG.min.js" defer></script>
    <script src="/public/assets/scripts/main/header.min.js" defer></script>
    <script src="/public/assets/scripts/components/faq.min.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.min.js" defer></script>

    <!-- Google tag (gtag.js) GA4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E9ZV484NQJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-E9ZV484NQJ');
    </script>

    <!-- Yandex.Metrika counter -->
    <script>
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js?id=108587554', 'ym');

        ym(108587554, 'init', { ssr: true, webvisor: true, clickmap: true, ecommerce: "dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce: true, trackLinks: true });
    </script>
<noscript>
        <div><img src="https://mc.yandex.ru/watch/108587554" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

<script src="https://analytics.ahrefs.com/analytics.js" data-key="IQF63+np/5nlOq39Ble4hg" async></script>
<script async>
  var ahrefs_analytics_script = document.createElement('script');
  ahrefs_analytics_script.async = true;
  ahrefs_analytics_script.src = 'https://analytics.ahrefs.com/analytics.js';
  ahrefs_analytics_script.setAttribute('data-key', 'IQF63+np/5nlOq39Ble4hg');
  document.getElementsByTagName('head')[0].appendChild(ahrefs_analytics_script);
</script>

<?php include_once './public/components/cta-modal.php'; ?>

</body>
</html>