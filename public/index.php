<?php
ini_set('max_execution_time', 300);
ini_set('memory_limit', '512M');
// Ошибки не должны попадать в HTML (иначе Warning'и вида «Undefined variable»
// рендерятся прямо в вёрстку и ломают страницу). Всё пишем в лог сервера.
error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('log_errors', '1');
$site = Setting\Route\Functions\TheFunction::site();
$featuredProjects = Setting\Route\Functions\TheFunction::featuredPortfolio(null, 5);

$seo = Setting\Route\Functions\TheFunction::seo([
    'title' => 'Ремонт квартир под ключ в Москве — от 8000 ₽/м²',
    'description' => 'Проект Квартира (Проект Квартира, pkvartira.ru) — официальный сайт. Ремонт под ключ в Москве: цены от 8 000 ₽/м², смета и замер бесплатно, гарантия 3 года.',
    'keywords' => 'Проект Квартира, Проект Квартира, pkvartira, pkvartira.ru, Проект Квартира официальный сайт, Проект Квартира официальный сайт, pkvartira.ru официальный сайт, Проект Квартира Москва, ООО Проект Квартира, Проект Квартира отзывы, Проект Квартира отзывы, Проект Квартира ремонт, Проект Квартира ремонт квартир, ремонт квартир Москва Проект Квартира, ПроектКвартира, проект квартира, Проект Квартира',
    'image' => $site['baseUrl'] . '/public/assets/images/pages/main/hero/og-home-1200x630.jpg',
    'url' => $site['canonicalUrl'],
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
    ],
    'speakable' => ['#ai-short-answer', '.hero-subtitle'],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="<?= (parse_url($_SERVER['HTTP_HOST'] ?? '', PHP_URL_HOST) === 'upgrade.pkvartira.ru') ? 'noindex, nofollow' : 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' ?>">
    <meta name="referrer" content="strict-origin-when-cross-origin">
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
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/jpeg">

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
    <main class="flex flex-col">

        <!-- CINEMA HERO — FSS design system 1:1 -->
        <section id="hero" class="hero" aria-labelledby="hero-title" data-cinema data-nav-hero>
            <div class="hero-visual" data-hero-frame>
                <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp"
                     srcset="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp 720w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp 1200w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp 1672w"
                     alt="Ремонт квартир под ключ в Москве — Проект Квартира"
                     title="Ремонт квартир под ключ в Москве — Проект Квартира"
                     sizes="100vw" loading="eager" fetchpriority="high" data-cinema-image="0" decoding="async"
                     width="1672" height="941" class="cinema-image is-active">
                <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/1room/standard/2_37sqm/1.webp"
                     srcset="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/1room/standard/2_37sqm/1.webp 720w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/1room/standard/2_37sqm/1.webp 1200w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/1room/standard/2_37sqm/1.webp 1672w"
                     alt="Дизайн интерьера квартиры в Москве"
                     sizes="100vw" loading="lazy" fetchpriority="auto" data-cinema-image="1" decoding="async"
                     width="1672" height="941" class="cinema-image">
                <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/cottage/2_euro_230sqm/10.webp"
                     srcset="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/cottage/2_euro_230sqm/10.webp 720w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/cottage/2_euro_230sqm/10.webp 1200w, <?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/portfolio-photos/cottage/2_euro_230sqm/10.webp 1672w"
                     alt="Ремонт квартиры 230 м² в бизнес-классе"
                     title="Ремонт квартиры 230 м² в бизнес-классе"
                     sizes="100vw" loading="lazy" fetchpriority="auto" data-cinema-image="2" decoding="async"
                     width="1672" height="941" class="cinema-image">
            </div>
            <div class="hero-shade" aria-hidden="true"></div>
            <div class="hero-content">
                <p class="eyebrow hero-eyebrow">
                    <span class="live-dot" aria-hidden="true"></span>
                    Ремонт квартир · Под ключ · Москва
                </p>
                <h1 id="hero-title">
                    <span>Ремонт квартир</span>
                    <span>под ключ в Москве<span class="accent-dot">.</span></span>
                </h1>
                <div class="hero-intro">
                    <p>Приедем на замер в день обращения. Составим смету в 3 варианта под ваш бюджет за 24 часа.</p>
                    <a class="text-link" href="#counters" data-goal="hero_about" title="Узнать о компании">Узнать о компании <span>&#8595;</span></a>
                </div>
            </div>
            <div class="hero-bottom">
                <a href="/portfolio" class="hero-project" data-cinema-link title="Посмотреть проекты">
                    <span class="eyebrow">Избранный проект / <span data-cinema-number>01</span></span>
                    <strong data-cinema-name>Ремонт квартиры 180 м²</strong>
                    <span data-cinema-caption>Москва / Премиум</span>
                    <span class="hero-project-arrow">
                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                            <path d="M7 7h10v10"></path>
                            <path d="M7 17 17 7"></path>
                        </svg>
                    </span>
                </a>
                <div class="hero-controls">
                    <div class="cinema-pagination" role="group" aria-label="Избранные проекты">
                        <button type="button" data-cinema-select="0" data-name="Ремонт квартиры 180 м²" data-caption="Москва / Премиум" aria-label="Показать проект ремонта квартиры 180 м²" aria-pressed="true">01<span></span></button>
                        <button type="button" data-cinema-select="1" data-name="Ремонт квартиры 230 м²" data-caption="Москва / Бизнес-класс" aria-label="Показать проект ремонта квартиры 230 м²" aria-pressed="false">02<span></span></button>
                        <button type="button" data-cinema-select="2" data-name="Дизайн-интерьер 90 м²" data-caption="Московская область / Дизайн" aria-label="Показать проект дизайн-интерьера 90 м²" aria-pressed="false">03<span></span></button>
                    </div>
                    <p class="eyebrow" data-cinema-status aria-live="polite">01 / 03 — Ремонт квартиры 180 м² — Москва</p>
                </div>
                <a href="#counters" class="hero-cta" data-goal="hero_projects" title="Рассчитать стоимость">
                    Рассчитать стоимость
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </a>
            </div>
        </section>

        <section class="counter-section section-shell" id="counters">
            <span class="section-number">02</span>
            <div class="section-topline">
                <p class="eyebrow">02 / О компании</p>
                <span class="eyebrow">Один подрядчик — весь ремонт</span>
            </div>
            <div class="head-row">
                    <h2>
                        Ремонт под ключ — <strong class="text-orange-600">один подрядчик</strong> от замера до сдачи
                    </h2>
                    <p>
                        Один подрядчик отвечает за весь ремонт: замер, смета, закупка, контроль, фотоотчёт каждый день, оплата по этапам. Стоимость и срок — в договоре, гарантия 3 года.
                    </p>
                </div>
                <dl class="stats-fss">
                    <div>
                        <dd><span class="counter" data-target="35">0</span></dd>
                        <dt>Отзывов со ссылками на источники</dt>
                    </div>
                    <div>
                        <dd><span class="counter" data-target="21">0</span></dd>
                        <dt>Статья в блоге с честными ценами</dt>
                    </div>
                    <div>
                        <dd><span class="counter" data-target="3" data-suffix=" года">0</span></dd>
                        <dt>Гарантии на работы</dt>
                    </div>
                </dl>
                <p class="mt-6 text-center text-sm text-gray-600 max-w-3xl mx-auto">
                    Все отзывы проверены, сметы составляются по ГЭСН, договор защищает ваши интересы.
                </p>
        </section>

        <!-- 4 -->
        <section id="formats" class="format-section section-shell reveal">
            <span class="section-number">03</span>
            <div class="section-topline">
                <p class="eyebrow">03 / Форматы ремонта</p>
                <span class="eyebrow">Москва и область · смета в договоре</span>
            </div>
            <div class="head-row">
                <h2>Четыре формата.<br><span>Один стандарт качества.</span></h2>
                <p>Работаем честно — вы платите только за те работы,<br>которые реально необходимы вашему объекту.</p>
            </div>

            <?php
            $formatCards = [
                [
                    'num' => '01',
                    'href' => '/services/pod-klyuch',
                    'title' => 'Косметический ремонт',
                    'price' => 'от 8 000 ₽/м²',
                    'term' => 'от 14 дней',
                    'badge' => '',
                    'img' => '/public/assets/images/pages/main/renovation-format/cosmetic.webp',
                    'alt' => 'Косметический ремонт — быстрый ремонт квартиры по цене',
                    'audience' => 'Если нужно обновить интерьер перед заездом или для сдачи в аренду.',
                    'includes' => 'Демонтаж старых покрытий, переклейка обоев, укладка ламината, покраска потолков, замена розеток.',
                    'benefit' => 'Самый быстрый способ превратить «бабушкин ремонт» в современное жилье без огромных вложений.',
                ],
                [
                    'num' => '02',
                    'href' => '/services/pod-klyuch',
                    'title' => 'Капитальный ремонт',
                    'price' => 'от 13 000 ₽/м²',
                    'term' => 'от 45 дней',
                    'badge' => 'Самый популярный',
                    'img' => '/public/assets/images/pages/main/renovation-format/capital.webp',
                    'alt' => 'Капитальный ремонт — полный ремонт квартиры с заменой коммуникаций',
                    'audience' => 'Для новостроек в бетоне или «вторички» с изношенными коммуникациями.',
                    'includes' => 'Полная замена электрики и сантехники, возведение перегородок, выравнивание стен по маякам, стяжка пола, чистовая отделка.',
                    'benefit' => 'Полное обновление всех инженерных систем. Забудете о проблемах с проводкой или трубами на ближайшие 20 лет.',
                ],
                [
                    'num' => '03',
                    'href' => '/services/pod-klyuch',
                    'title' => 'Дизайнерский ремонт',
                    'price' => 'от 18 000 ₽/м²',
                    'term' => 'от 60 дней',
                    'badge' => '',
                    'img' => '/public/assets/images/pages/main/renovation-format/finish.webp',
                    'alt' => 'Дизайнерский ремонт — авторский ремонт с дизайн-проектом',
                    'audience' => 'Для тех, кому важна уникальная эстетика, перепланировка и сложные решения.',
                    'includes' => 'Работа по индивидуальному дизайн-проекту, многоуровневое освещение, скрытые двери, теневые профили, декоративная штукатурка.',
                    'benefit' => 'Мы воплощаем в жизнь самые сложные идеи. Авторский надзор и комплектация объекта материалами — на нас.',
                ],
                [
                    'num' => '04',
                    'href' => '/services/pod-klyuch',
                    'title' => 'Премиум и элитный ремонт',
                    'price' => 'от 25 000 ₽/м²',
                    'term' => 'от 90 дней',
                    'badge' => 'Premium',
                    'img' => '/public/assets/images/portfolio-photos/cottage/1_180sqm/2.webp',
                    'alt' => 'Премиум и элитный ремонт — роскошь и эксклюзивность квартиры',
                    'audience' => 'Для владельцев бизнес-класса и премиум-недвижимости. Максимальное качество и эксклюзивность.',
                    'includes' => 'Итальянская плитка, паркет, авторская мебель, умный дом, сложные архитектурные решения, полная автоматизация.',
                    'benefit' => 'Персональный архитектор, комплектация премиальными материалами, гарантия 5 лет на премиум-пакет (на остальные пакеты — 3 года).',
                ],
            ];
            ?>

            <div class="format-grid">
                <?php foreach ($formatCards as $card): ?>
                    <article class="format-card">
                        <a class="format-media" href="<?= htmlspecialchars($site['baseUrl'] . $card['href']); ?>" tabindex="-1"
                            aria-hidden="true">
                            <img src="<?= htmlspecialchars($site['baseUrl'] . $card['img']); ?>"
                                alt="<?= htmlspecialchars($card['alt']); ?>" width="640" height="480" loading="lazy"
                                decoding="async">
                            <span class="format-price"><?= htmlspecialchars($card['price']); ?></span>
                        </a>

                        <div class="format-label">
                            <span class="format-meta">
                                <span class="format-index"><?= htmlspecialchars($card['num']); ?></span>
                                <span class="format-term"><?= htmlspecialchars($card['term']); ?></span>
                            </span>
                            <?php if ($card['badge'] !== ''): ?>
                                <span class="format-badge"><?= htmlspecialchars($card['badge']); ?></span>
                            <?php endif; ?>
                        </div>

                        <h3>
                            <a href="<?= htmlspecialchars($site['baseUrl'] . $card['href']); ?>"
                                title="<?= htmlspecialchars($card['title'] . ' — ' . $card['price']); ?>"><?= htmlspecialchars($card['title']); ?></a>
                        </h3>

                        <dl class="format-specs">
                            <div>
                                <dt>Для кого</dt>
                                <dd><?= htmlspecialchars($card['audience']); ?></dd>
                            </div>
                            <div>
                                <dt>Что входит</dt>
                                <dd><?= htmlspecialchars($card['includes']); ?></dd>
                            </div>
                            <div>
                                <dt>Ваша выгода</dt>
                                <dd><?= htmlspecialchars($card['benefit']); ?></dd>
                            </div>
                        </dl>

                        <a href="/calculator" class="text-link">Рассчитать для моей площади
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                focusable="false">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="format-foot">
                <p class="format-note">
                    Не знаете, какой формат нужен? Приедем, проверим состояние стен и инженерных систем и скажем
                    честно: где можно сэкономить, а где — категорически нельзя.
                    <button type="button" data-button-dialog class="text-link">Вызвать инженера на бесплатную
                        консультацию</button>
                </p>
                <a href="/services/pod-klyuch" class="text-link">Все форматы и виды ремонта (71 услуга)
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- GEO: Районы обслуживания -->
        <section id="geo" class="geo-section section-shell reveal">
            <span class="section-number">04</span>
            <div class="section-topline">
                <p class="eyebrow">04 / География работ</p>
                <span class="eyebrow">Москва · Подмосковье</span>
            </div>
            <div class="head-row">
                <h2>Ремонт квартир<br><span>в Москве и области.</span></h2>
                <p>Бесплатный выезд инженера, предварительный расчёт в день обращения,<br>детальная смета в 3 вариантах — за 24 часа после замера.</p>
            </div>

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
            ?>
            <div class="geo-grid">
                <?php foreach ($geoCities as $g):
                    $link = $geoLinks[$g] ?? null;
                ?>
                    <div class="geo-chip">
                        <?php if ($link): ?>
                            <a href="<?= htmlspecialchars($link); ?>" class="geo-chip-link"
                                title="Ремонт квартир в <?= htmlspecialchars($g); ?>"><?= htmlspecialchars($g); ?></a>
                        <?php else: ?>
                            <span class="geo-chip-link"><?= htmlspecialchars($g); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="geo-foot">
                <a href="/contact" class="text-link">Посмотреть контакты и схему проезда
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- 6 -->
        <section id="portfolio" class="selected-work section-shell reveal">
            <span class="section-number">05</span>
            <div class="section-topline">
                <p class="eyebrow">05 / Избранные проекты</p>
                <a href="/portfolio" class="text-link">Смотреть все объекты
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                        focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </a>
            </div>

            <div class="work-heading">
                <h2>Места, где уже<br><span>живут.</span></h2>
                <p>Пять проектов последних месяцев:<br>от студии до премиум-квартиры.</p>
            </div>

            <ul class="case-filter">
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/novostroyka">Ремонт квартир в новостройке <span aria-hidden="true">↗</span></a></li>
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka">Ремонт во вторичке <span aria-hidden="true">↗</span></a></li>
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio">Ремонт студии <span aria-hidden="true">↗</span></a></li>
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room">Ремонт 1-комнатной <span aria-hidden="true">↗</span></a></li>
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room">Ремонт 2-комнатной <span aria-hidden="true">↗</span></a></li>
                <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room">Ремонт 3-комнатной <span aria-hidden="true">↗</span></a></li>
            </ul>

            <div class="featured-grid">
                <?php foreach ($featuredProjects as $index => $project): ?>
                    <?php
                    $coverUrl = $project['cover']
                        ? htmlspecialchars($site['baseUrl'] . '/' . $project['folder_image'] . '/' . $project['cover'])
                        : '';
                    $projectUrl = htmlspecialchars(Setting\Route\Functions\TheFunction::portfolioProjectUrl($project['slug']));
                    $projectTitle = htmlspecialchars($project['title']);
                    $projectType = htmlspecialchars($project['type'] ?? '');
                    $projectSize = htmlspecialchars($project['size'] ?? '');
                    $projectDuration = htmlspecialchars($project['duration'] ?? '');
                    $projectPrice = htmlspecialchars($project['price'] ?? '');
                    $projectSubtitle = !empty($project['subtitle']) ? htmlspecialchars($project['subtitle']) : $projectType . ' · под ключ';
                    $projectNum = str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT);
                    $captionParts = array_filter([$projectSize, $projectDuration], static fn($v) => $v !== '');
                    ?>
                    <article class="project-card">
                        <a href="<?= $projectUrl ?>" class="project-card__link" title="<?= $projectTitle ?> — объект Проект Квартира">
                            <div class="project-card__image">
                                <?php if ($coverUrl): ?>
                                    <img src="<?= $coverUrl ?>" alt="<?= $projectTitle ?>" title="<?= $projectTitle ?>"
                                        width="1280" height="960" loading="lazy" decoding="async">
                                <?php endif; ?>
                                <span class="project-card__number"><?= $projectNum ?><?= $projectType !== '' ? ' — ' . $projectType : '' ?></span>
                                <span class="project-card__arrow">
                                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false">
                                        <path d="M7 7h10v10"></path>
                                        <path d="M7 17 17 7"></path>
                                    </svg>
                                </span>
                                <?php if ($captionParts): ?>
                                    <span class="project-card__caption"><?= implode(' · ', $captionParts) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="project-card__meta">
                                <span><?= $projectType !== '' ? $projectType : 'Ремонт под ключ' ?></span>
                                <span><?= $projectPrice !== '' ? $projectPrice : 'по запросу' ?></span>
                            </div>
                            <h3><?= $projectTitle ?></h3>
                            <p><?= $projectSubtitle ?></p>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="format-foot">
                <p class="format-note">Каждый объект — это фиксированная смета, ежедневные фотоотчёты и гарантия
                    по договору. Покажем похожий проект под вашу планировку.</p>
                <button type="button" data-button-dialog class="text-link">Обсудить свой проект
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </button>
            </div>
        </section>

        <section id="directions" class="directions-section section-shell reveal">
            <span class="section-number">06</span>
            <div class="section-topline">
                <p class="eyebrow">06 / Направления</p>
                <span class="eyebrow">Популярные виды работ и районы</span>
            </div>
            <div class="head-row">
                <h2>Востребованные<br><span>направления.</span></h2>
                <p>Быстрый переход к услугам и районам,<br>по которым чаще всего работаем.</p>
            </div>

            <div class="directions-grid">
                <?php
                $directions = [
                    ['href' => '/services/pod-klyuch', 'label' => 'Ремонт под ключ', 'num' => '01'],
                    ['href' => '/services/novostroyka', 'label' => 'Ремонт в новостройке', 'num' => '02'],
                    ['href' => '/services/ontario', 'label' => 'ЖК Онтарио', 'num' => '03'],
                    ['href' => '/services/mitino', 'label' => 'Ремонт в Митино', 'num' => '04'],
                    ['href' => '/services/khimki', 'label' => 'Ремонт в Химках', 'num' => '05'],
                    ['href' => '/services/odintsovo', 'label' => 'Ремонт в Одинцово', 'num' => '06'],
                    ['href' => '/services/solnechnogorsk', 'label' => 'Ремонт в Солнечногорске', 'num' => '07'],
                    ['href' => '/services/lyubertsy', 'label' => 'Ремонт в Люберцах', 'num' => '08'],
                    ['href' => '/services/balashikha', 'label' => 'Ремонт в Балашихе', 'num' => '09'],
                ];
                ?>
                <?php foreach ($directions as $dir): ?>
                    <a href="<?= htmlspecialchars($site['baseUrl'] . $dir['href']); ?>" class="direction-link"
                        title="<?= htmlspecialchars($dir['label']); ?> — Проект Квартира">
                        <small><?= htmlspecialchars($dir['num']); ?></small>
                        <span><?= htmlspecialchars($dir['label']); ?></span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                            focusable="false">
                            <path d="M7 7h10v10"></path>
                            <path d="M7 17 17 7"></path>
                        </svg>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="process" class="process-section reveal">
            <div class="process-photo">
                <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/main/hero/bg.webp"
                    alt="Интерьер квартиры после ремонта — Проект Квартира" width="1672" height="941" loading="lazy"
                    decoding="async">
            </div>
            <div class="process-content section-shell">
                <p class="eyebrow">Как мы работаем</p>
                <h2>Ваш путь к идеальному ремонту:<br><span>6 шагов</span> до новоселья</h2>
                <div class="process-steps">
                    <details data-phase="0" open>
                        <summary>
                            <span>01</span>
                            <h3>Ваша заявка</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Оставьте заявку на сайте или позвоните нам. Менеджер ответит на все вопросы и забронирует за
                            вами время для бесплатного выезда инженера-сметчика.</p>
                    </details>
                    <details data-phase="1">
                        <summary>
                            <span>02</span>
                            <h3>Профессиональный замер</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Приезжаем со сверхточным лазерным оборудованием. Анализируем состояние стен, углов и
                            инженерных коммуникаций. Через 24 часа вы получаете 3 варианта детальной сметы под ваш
                            бюджет.</p>
                    </details>
                    <details data-phase="2">
                        <summary>
                            <span>03</span>
                            <h3>Договор и фиксация цены</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Подписываем официальный договор, где четко прописаны сроки и финальная стоимость. Цена
                            фиксируется в договоре. Дополнительные работы — только после вашего согласования: сначала показываем причину и стоимость, начинаем только после подтверждения.</p>
                    </details>
                    <details data-phase="3">
                        <summary>
                            <span>04</span>
                            <h3>Закупка материалов</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Закупку, доставку и подъём материалов берём на себя — вам не нужно ездить по магазинам. Организуем
                            доставку, разгрузку и подъем. Вы получаете все отчеты в цифровом виде.</p>
                    </details>
                    <details data-phase="4">
                        <summary>
                            <span>05</span>
                            <h3>Производство работ</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Профильные бригады (электрики, сантехники, плиточники) приступают к делу. Вы получаете
                            ежедневные фото- и видеоотчеты в MAX. Контролируйте ремонт из любой точки мира.</p>
                    </details>
                    <details data-phase="5">
                        <summary>
                            <span>06</span>
                            <h3>Сдача и гарантия</h3>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                        </summary>
                        <p>Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются по действующим нормам и технологическим картам. Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.</p>
                    </details>
                </div>
            </div>
        </section>

        <!-- 9 -->
        <section id="prices" class="price-section section-shell reveal">
            <span class="section-number">07</span>
            <div class="section-topline">
                <p class="eyebrow">07 / Стоимость</p>
                <span class="eyebrow">Смета фиксируется в договоре</span>
            </div>
            <div class="head-row">
                <h2>Прозрачная стоимость<br><span>без роста в процессе.</span></h2>
                <p>Выберите пакет услуг под ваши задачи.<br>Итоговая сумма прописывается в договоре.</p>
            </div>

                <div class="price-grid">
                    <article class="price-card-premium">
                        <div>
                            <h3 class="price-name">Эконом</h3>
                            <div class="price-amount">от 8 000 ₽<span class="price-unit">/м²</span></div>
                            <div class="price-meta">Косметический · от 14 дней · гарантия 3 года</div>
                            <p class="price-desc">Идеально, чтобы освежить квартиру: замена обоев, ламината и покраска потолков.</p>
                            <ul class="price-list">
                                <li><i class="fas fa-check"></i>Демонтаж старых покрытий</li>
                                <li><i class="fas fa-check"></i>Грунтовка и частичная шпаклевка стен</li>
                                <li><i class="fas fa-check"></i>Поклейка обоев или покраска</li>
                                <li><i class="fas fa-check"></i>Укладка ламината или линолеума</li>
                                <li><i class="fas fa-check"></i>Монтаж плинтусов и розеток</li>
                            </ul>
                        </div>
                        <button data-button-dialog class="price-btn">Выбрать пакет</button>
                    </article>

                    <article class="price-card-premium featured">
                        <div>
                            <span class="price-badge">Популярный выбор</span>
                            <h3 class="price-name">Стандарт</h3>
                            <div class="price-amount">от 13 000 ₽<span class="price-unit">/м²</span></div>
                            <div class="price-meta">Капитальный · от 45 дней · гарантия 3 года</div>
                            <p class="price-desc">Полное обновление инженерных систем и идеально ровные поверхности.</p>
                            <ul class="price-list">
                                <li><i class="fas fa-check"></i>Весь перечень из «Эконом»</li>
                                <li><i class="fas fa-check"></i>Выравнивание стен по маякам</li>
                                <li><i class="fas fa-check"></i>Разводка новой электрики и сантехники</li>
                                <li><i class="fas fa-check"></i>Устройство стяжки пола</li>
                                <li><i class="fas fa-check"></i>Укладка плитки в санузлах</li>
                            </ul>
                        </div>
                        <button data-button-dialog class="price-btn">Выбрать пакет</button>
                    </article>

                    <article class="price-card-premium">
                        <div>
                            <h3 class="price-name">Дизайнерский</h3>
                            <div class="price-amount">от 18 000 ₽<span class="price-unit">/м²</span></div>
                            <div class="price-meta">Дизайнерский · от 60 дней · гарантия 3 года</div>
                            <p class="price-desc">Приёмка каждого этапа по чек-листу и работа со сложными дизайнерскими решениями.</p>
                            <ul class="price-list">
                                <li><i class="fas fa-check"></i>Весь перечень из «Стандарт»</li>
                                <li><i class="fas fa-check"></i>Монтаж многоуровневых потолков</li>
                                <li><i class="fas fa-check"></i>Декоративная штукатурка и лепнина</li>
                                <li><i class="fas fa-check"></i>Скрытые двери и трековое освещение</li>
                                <li><i class="fas fa-check"></i>Тёплые полы и инсталляции</li>
                            </ul>
                        </div>
                        <button data-button-dialog class="price-btn">Выбрать пакет</button>
                    </article>

                    <article class="price-card-premium">
                        <div>
                            <h3 class="price-name">Премиум</h3>
                            <div class="price-amount">от 25 000 ₽<span class="price-unit">/м²</span></div>
                            <div class="price-meta">С дизайн-проектом · от 90 дней · гарантия 3 года</div>
                            <p class="price-desc">Авторский дизайн-проект, элитные материалы, умный дом и меблировка — под ключ.</p>
                            <ul class="price-list">
                                <li><i class="fas fa-check"></i>Весь перечень из «Дизайнерский»</li>
                                <li><i class="fas fa-check"></i>Дизайн-проект в комплекте</li>
                                <li><i class="fas fa-check"></i>Умный дом и климат-контроль</li>
                                <li><i class="fas fa-check"></i>Меблировка и декорирование</li>
                                <li><i class="fas fa-check"></i>Персональный архитектор</li>
                            </ul>
                        </div>
                        <a href="/services/premium" class="price-btn">Подробнее о премиуме</a>
                    </article>
                </div>

            <!-- Квиз встроен в секцию цен -->
            <div class="price-quiz" id="quiz">
                <div class="price-quiz-head">
                    <p class="eyebrow">Смета за 24 часа</p>
                    <h3>Не знаете, какой пакет выбрать?</h3>
                    <p>Ответьте на 5 вопросов — пришлём 3 варианта сметы под ваш бюджет: Эконом, Оптимальный и Комфорт.</p>
                </div>
                <div class="price-quiz-form">
                    <form action="/send/email" method="POST" data-form-id="quiz_glavnaya" class="max-w-5xl mx-auto">
                        <div class="quiz-shell">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <select name="тип жилья"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-sm transition"
                                    aria-label="Тип жилья">
                                    <option value="" selected disabled>Тип жилья?</option>
                                    <option value="Новостройка">Новостройка</option>
                                    <option value="Вторичка">Вторичка</option>
                                    <option value="Коттедж">Коттедж / Загородный дом</option>
                                </select>
                                <select name="площадь объекта"
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
            </div>
        </section>

        <!-- 10 -->
        <section id="reviews" class="reviews-section section-shell reveal">
            <span class="section-number">08</span>
            <div class="section-topline">
                <p class="eyebrow">08 / Отзывы</p>
                <span class="eyebrow">35 отзывов со ссылками на источники</span>
            </div>
            <div class="head-row">
                    <h2>
                        Отзывы тех, кто уже переехал в новую квартиру
                    </h2>
                    <p>
                        Реальные истории: сроки, бюджеты и результат, который принимают. 35 отзывов со ссылками на источники
                    </p>
                </div>

            <!-- Ручные отзывы -->
                <div class="reviews-grid">
                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">01</span>
                            </div>
                            <p class="review-text">«Главный страх был, что цена в процессе вырастет в два раза. Но ребята из Проект
                                квартира молодцы — как в смете прописали сумму, так она и осталась до конца. Делали
                                ремонт в новостройке (64 м²). По срокам уложились день в день. Особенно порадовали
                                ежедневные фото в MAX — не нужно было через всю Москву ездить проверять».</p>
                            <div class="review-author">
                                <strong>Александр В.</strong>
                                <span>ЖК «Сердце Столицы»</span>
                                <time datetime="2026-04-15">15 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>

                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">02</span>
                            </div>
                            <p class="review-text">«Нужно было капитально обновить старую сталинку. Переживала за трубы и проводку. Бригада
                                сработала очень чисто, сами договорились с УК об отключении стояков. Весь мусор вывозили
                                сразу, соседи ни разу не пожаловались. Качество отделки — на высоте, стены идеально
                                ровные под покраску».</p>
                            <div class="review-author">
                                <strong>Анатолий</strong>
                                <span>Вторичка на Профсоюзной</span>
                                <time datetime="2026-04-12">12 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>

                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 4,5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star-half-alt text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">03</span>
                            </div>
                            <p class="review-text">«Заказывал черновой ремонт в студии. Понравилось, что не навязывали лишнего. Инженер на
                                замере сразу подсказал, где можно сэкономить на материалах, а где лучше взять подороже.
                                Сэкономил около 40 тысяч на закупках через их скидки в Петровиче. Рекомендую».</p>
                            <div class="review-author">
                                <strong>Дмитрий</strong>
                                <span>Студия 35 м²</span>
                                <time datetime="2026-04-10">10 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>

                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">04</span>
                            </div>
                            <p class="review-text">«Делали дизайнерский ремонт по нашему проекту. Было много сложных моментов с трековым
                                освещением и скрытыми дверями. Мастера справились на 5+. Гарантию дали на 3 года, но,
                                судя по качеству, она нам не пригодится. Спасибо!»</p>
                            <div class="review-author">
                                <strong>Елена</strong>
                                <span>Дизайнерский ремонт 78 м²</span>
                                <time datetime="2026-04-08">8 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>

                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 4,5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star-half-alt text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">05</span>
                            </div>
                            <p class="review-text">«Нормальная контора. Делают быстро, лишних денег не просят. Смета понятная, каждый
                                гвоздь прописан. Оплата была поэтапная — сделал этап, я проверил, заплатил. Для меня это
                                было самым важным критерием доверия».</p>
                            <div class="review-author">
                                <strong>Оля</strong>
                                <span>Капитальный ремонт 52 м²</span>
                                <time datetime="2026-04-05">5 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>

                        <article class="review-card">
                            <div class="review-card-top">
                                <span class="review-stars" aria-label="Оценка 5 из 5">
<i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i><i class="fas fa-star text-yellow-400 text-xs is-on"></i>
                                </span>
                                <span class="review-index">06</span>
                            </div>
                            <p class="review-text">«Освежили мне квартиру за 2 недели (косметика). Обои поклеены стык в стык, ламинат не
                                скрипит. Очень вежливые ребята, после себя оставили порядок. Приятно иметь дело с
                                профессионалами».</p>
                            <div class="review-author">
                                <strong>Ольга Николаевна</strong>
                                <span>Косметический ремонт 45 м²</span>
                                <time datetime="2026-04-02">2 апр. 2026 г.</time>
                            </div>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </article>
            </div>

            <div class="reviews-foot">
                <a href="<?= $site['baseUrl'] ?>/reviews" class="text-link">Читать все отзывы
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M7 7h10v10"></path>
                        <path d="M7 17 17 7"></path>
                    </svg>
                </a>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="faq-section section-shell reveal" itemscope itemtype="https://schema.org/FAQPage" aria-labelledby="faq-heading">
            <span class="section-number">09</span>
            <div class="section-topline">
                <p class="eyebrow">09 / Вопросы</p>
                <span class="eyebrow">Сроки, цены, гарантии и процесс</span>
            </div>
            <div class="head-row">
                    <h2 id="faq-heading">
                        Отвечаем на важные вопросы <strong class="text-orange-600">честно</strong> и <strong
                            class="text-orange-600">без воды</strong>
                    </h2>
                    <p>
                        Разбираем технические, финансовые и организационные нюансы вашего будущего ремонта
                    </p>
                </div>

                <div class="faq-categories">
                    <nav class="faq-tabs" role="tablist" aria-label="Категории вопросов">
                        <button role="tab" aria-selected="true" data-tab="all" class="faq-tab active">Все вопросы</button>
                        <button role="tab" aria-selected="false" data-tab="price" class="faq-tab">Цены и оплата</button>
                        <button role="tab" aria-selected="false" data-tab="terms" class="faq-tab">Сроки и этапы</button>
                        <button role="tab" aria-selected="false" data-tab="guarantee" class="faq-tab">Гарантия и качество</button>
                        <button role="tab" aria-selected="false" data-tab="process" class="faq-tab">Процесс и команда</button>
                        <button role="tab" aria-selected="false" data-tab="legal" class="faq-tab">Документы и договор</button>
                    </nav>
                </div>

                <div class="faq-grid" role="tabpanel">
                    <!-- Цены и оплата -->
                    <details class="faq-ex faq-item" data-category="price" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-1">
                        <summary>
                            <span itemprop="name">Сколько стоит ремонт квартиры под ключ в Москве?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Ориентировочные цены за работы (без материалов):</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Косметический ремонт</strong> — от 8 000 ₽/м² (обновление отделки без переделок инженерии).</li>
                                    <li><strong>Капитальный ремонт</strong> — от 13 000 ₽/м² (полная замена электрики, сантехники, стяжка, штукатурка, чистовая отделка).</li>
                                    <li><strong>Дизайнерский ремонт</strong> — от 18 000 ₽/м² (сложные решения, авторский надзор, премиум-материалы).</li>
                                    <li><strong>Премиум / Люкс</strong> — от 25 000 ₽/м² (авторский дизайн-проект, элитные материалы, умный дом, меблировка).</li>
                                </ul>
                                <p class="mb-3"><strong>Примеры для типовых квартир (работы + материалы):</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Студия 25 м² — от 200 000 ₽ (косметический) до 450 000 ₽ (дизайнерский).</li>
                                    <li>1-комнатная 37 м² — от 300 000 ₽ до 650 000 ₽.</li>
                                    <li>2-комнатная 55 м² — от 440 000 ₽ до 1 000 000 ₽.</li>
                                    <li>3-комнатная 70 м² — от 560 000 ₽ до 1 400 000 ₽.</li>
                                    <li>4-комнатная 90 м² — от 720 000 ₽ до 1 800 000 ₽.</li>
                                </ul>
                                <div class="mt-4 p-4 bg-gray-50 rounded-xl">
                                    <p class="text-sm text-gray-700"><strong>Важно:</strong> Цены выше — ориентиры за работы. Материалы закупаем по вашей смете со скидкой 10–15%. Точную стоимость (работы + материалы) назваем после бесплатного замера — смету пришлём за 24 часа.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="price" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-2">
                        <summary>
                            <span itemprop="name">Есть ли скрытые платежи? Может ли смета вырасти?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Нет.</strong> Смета фиксируется в договоре до начала работ и не меняется в процессе.</p>
                                <p class="mb-3">Единственные основания для изменения стоимости:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Вы сами попросили добавить работы, которых не было в смете (дополнительное соглашение с фиксированной ценой).</li>
                                    <li>Обнаружены скрытые дефекты, которые невозможно было выявить без вскрытия (старая штукатурка с полостями, заложенные коммуникации). В этом случае мы останавливаемся, показываем, считаем, согласовываем с вами — и только потом продолжаем.</li>
                                </ul>
                                <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                                    <p class="text-sm text-yellow-800"><strong>Важно:</strong> В нашем договоре прописано: любые изменения стоимости возможны только по вашему письменному согласию. Никаких «доплат» в чеке в конце работ.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="price" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-3">
                        <summary>
                            <span itemprop="name">Как формируется итоговая стоимость «под ключ»?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3">Итоговая сумма = <strong>Работы</strong> + <strong>Материалы</strong> + <strong>Логистика</strong>.</p>
                                <div class="overflow-x-auto mb-4">
                                    <table class="w-full text-sm border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-4 py-3 text-left font-semibold">Статья</th>
                                                <th class="px-4 py-3 text-left font-semibold">Что входит</th>
                                                <th class="px-4 py-3 text-left font-semibold">Кто закупает</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <tr><td class="px-4 py-3 font-medium">Работы</td><td class="px-4 py-3">Все виды работ по пакету (см. выше)</td><td class="px-4 py-3 text-green-700">Мы (в стоимости работ)</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3 font-medium">Черновые материалы</td><td class="px-4 py-3">Цемент, песок, штукатурка, провода, трубы, гидроизоляция</td><td class="px-4 py-3 text-green-700">Мы (по смете со скидкой 10–15%)</td></tr>
                                            <tr><td class="px-4 py-3 font-medium">Чистовые материалы</td><td class="px-4 py-3">Плитка, ламинат, обои, краска, сантехника, двери, светильники</td><td class="px-4 py-3 text-blue-700">Вы или мы (по вашей смете со скидкой)</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3 font-medium">Логистика</td><td class="px-4 py-3">Доставка, подъём, вывоз мусора, уборка</td><td class="px-4 py-3 text-green-700">Мы (в стоимости работ)</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="mb-2">Материалы закупаем по вашей смете — вы платите только за фактические объёмы без наценок. Остатки материалов — ваши.</p>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="price" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-4">
                        <summary>
                            <span itemprop="name">Как происходит оплата? Можно ли платить частями?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3">Оплата <strong>поэтапная</strong> — после приёмки каждого этапа работ по акту.</p>
                                <ol class="list-decimal ml-5 space-y-2 mb-4">
                                    <li>Аванс 10% при подписании договора (фиксация дат, закупка материалов).</li>
                                    <li>Оплата этапов: демонтаж → черновики → инженерия → чистовая отделка → сдача.</li>
                                    <li>Каждый этап принимаете по акту, проверяете по чек-листу, платите только за выполненное.</li>
                                </ol>
                                <p class="mb-3"><strong>Способы оплаты:</strong> картой, СБП, безналичный расчёт (для юрлиц), наличные (по акту).</p>
                                <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                                    <p class="text-sm text-red-800"><strong>Важно:</strong> Не работаем по схеме «100% предоплата» или «100% после». Поэтапная оплата защищает обе стороны — вы платите за готовый результат, мы получаем оплату за выполненную работу.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <!-- Сроки и этапы -->
                    <details class="faq-ex faq-item" data-category="terms" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-5">
                        <summary>
                            <span itemprop="name">Сколько времени занимает ремонт квартиры под ключ?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3">Сроки зависят от площади, пакета и состояния квартиры. Ориентировочные сроки для квартиры 50–60 м²:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Косметический</strong> — 20–35 дней.</li>
                                    <li><strong>Капитальный</strong> — 45–60 дней.</li>
                                    <li><strong>Дизайнерский</strong> — 60–75 дней.</li>
                                    <li><strong>Премиум</strong> — 90+ дней.</li>
                                </ul>
                                <div class="overflow-x-auto mb-4">
                                    <table class="w-full text-sm border-collapse">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-4 py-3 text-left font-semibold">Этап</th>
                                                <th class="px-4 py-3 text-left font-semibold">Что делаем</th>
                                                <th class="px-4 py-3 text-right font-semibold">Срок, 60 м²</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <tr><td class="px-4 py-3">1. Демонтаж</td><td class="px-4 py-3">Снос, разбор, вывоз мусора</td><td class="px-4 py-3 text-right">3–5 дней</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3">2. Черновая подготовка</td><td class="px-4 py-3">Демонтаж покрытий, выравнивание стен</td><td class="px-4 py-3 text-right">5–8 дней</td></tr>
                                            <tr class="bg-white"><td class="px-4 py-3">3. Инженерия (проект)</td><td class="px-4 py-3">Электрика, сантехника, вентиляция</td><td class="px-4 py-3 text-right">7–10 дней</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3">4. Стяжка и штукатурка</td><td class="px-4 py-3">Заливка, выравнивание по маякам</td><td class="px-4 py-3 text-right">10–14 дней</td></tr>
                                            <tr class="bg-white"><td class="px-4 py-3">5. Черновые работы</td><td class="px-4 py-3">Розетки, сантехника, радиаторы</td><td class="px-4 py-3 text-right">7–10 дней</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3">6. Чистовая отделка</td><td class="px-4 py-3">Штукатурка, обои/покраска, полы, плитка</td><td class="px-4 py-3 text-right">10–14 дней</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3">7. Двери, плинтусы, свет</td><td class="px-4 py-3">Монтаж, электрика, аксессуары</td><td class="px-4 py-3 text-right">3–5 дней</td></tr>
                                            <tr class="bg-gray-50"><td class="px-4 py-3">8. Уборка и сдача</td><td class="px-4 py-3">Генеральная уборка, приёмка, гарантия</td><td class="px-4 py-3 text-right">1–2 дня</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p class="mb-3"><strong>Итого полный цикл на квартиру 60 м² — 45–75 дней</strong> без учёта технологических пауз на набор прочности стяжки и штукатурки. По стоимости работ — от 8 000 ₽/м² за косметический пакет, от 13 000 ₽/м² за капитальный. Смета с позициями и ценами 2027 года — в статье <a href="/blog/skolko-stoit-remont-v-novostroyke-2027" class="text-[#6d5744] font-semibold underline hover:text-[#5c4a3a]">«Сколько стоит ремонт в новостройке в 2027 году»</a>.</p>
                                <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
                                    <p class="text-sm text-blue-800"><strong>Важно:</strong> Сроки фиксируем в договоре. Если мы опаздываем — платим неустойку за каждый день просрочки (прописывается в договоре).</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="terms" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-6">
                        <summary>
                            <span itemprop="name">Можно ли начать ремонт до получения ключей?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Да, и это часто выгодно.</strong> Если квартира ещё не получена, мы можем:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Подготовить смету и договор заранее (инженер замерит заранее по доступу застройщика).</li>
                                    <li>Закупить и привезти материалы к дате получения ключей.</li>
                                    <li>Начать демонтаж и черновые работы сразу после передачи ключей.</li>
                                </ul>
                                <p class="mb-3"><strong>Выгода:</strong> экономия 2–4 недели на старте. Если ремонт нужен к определённой дате, планировать нужно от неё назад: 60 м² под ключ — 46–68 дней, плюс 2–4 недели на очередь в сезон.</p>
                                <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
                                    <p class="text-sm text-green-800"><strong>Чек-лист до получения ключей:</strong> договор с застройщиком → акт приёмки → доступ в квартиру → замер → смета → договор → старт.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="terms" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-7">
                        <summary>
                            <span itemprop="name">Можно ли делать ремонт поэтапно (сначала кухню, потом комнаты)?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Да, но не рекомендуем.</strong> Поэтапный ремонт увеличивает сроки на 30–50% и стоимость на 15–20%.</p>
                                <p class="mb-3"><strong>Почему:</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Бригада ждёт, пока вы соберётесь / закупите / решите.</li>
                                    <li>Сантехника и электрика проходят по всей квартире — переделывать их по кускам дороже в 2–3 раза.</li>
                                    <li>Сложнее гарантировать качество на стыках этапов.</li>
                                </ul>
                                <p class="mb-3"><strong>Если бюджет ограничен:</strong> лучше сделать капитальный ремонт всего сразу по оптимальному пакету, чем растягивать на годы. У нас есть пакет «Эконом» — только самое необходимое за разумные деньги.</p>
                            </div>
                        </div>
                    </details>

                    <!-- Гарантия и качество -->
                    <details class="faq-ex faq-item" data-category="guarantee" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-8">
                        <summary>
                            <span itemprop="name">Какая гарантия на работы? Что если что-то сломается?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Базовая гарантия</strong> — 3 года на все виды отделочных и инженерных работ.</li>
                                    <li><strong>Премиум-пакет</strong> — 5 лет гарантии.</li>
                                    <li>Если в течение гарантийного срока что-то пойдёт не так — приедем и бесплатно устраним всё в течение 48 часов.</li>
                                    <li>Ответственность прописана в договоре и гарантийном сертификате.</li>
                                </ul>
                                <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl">
                                    <p class="text-sm text-green-800"><strong>Что НЕ в гарантии:</strong> естественный износ материалов, повреждения от неправильной эксплуатации, форс-мажоры (пожар, наводнение, действия третьих лиц). Полный список — в договоре.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="guarantee" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-9">
                        <summary>
                            <span itemprop="name">Как вы контролируете качество на каждом этапе?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ol class="list-decimal ml-5 space-y-2 mb-4">
                                    <li><strong>Чек-листы приёмки</strong> — каждый этап принимается по чек-листу из 50+ пунктов (геометрия, влажность, натяжение проводки, герметичность соединений и т.д.).</li>
                                    <li><strong>Фотоотчёты каждый день</strong> — в личном кабинете MAX вы видите фото/видео с объекта, комментарии прораба, % готовности этапа.</li>
                                    <li><strong>Приёмка этапов</strong> — каждый этап принимается по чек-листу с фотоотчётом. Не приняли этап — не платите за него и не идём дальше.</li>
                                    <li><strong>Финальная приёмка</strong> — чек-лист 100+ пунктов, акт приёмки этапа, гарантийный талон, инструкции по эксплуатации.</li>
                                </ol>
                                <p class="mt-3">Вы принимаете каждый этап по акту. Не приняли — не платите за него и не идём дальше.</p>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="guarantee" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-10">
                        <summary>
                            <span itemprop="name">Что если после сдачи обнаружится дефект?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ol class="list-decimal ml-5 space-y-2 mb-4">
                                    <li>Пишете нам в чат/звоните — фиксируем обращение.</li>
                                    <li>Инженер приезжает на осмотр в течение 24–48 часов (по Москве/МО).</li>
                                    <li>Определяем: гарантийный случай или нет (фото/видео, замеры).</li>
                                    <li>Если гарантийный — составляем акт, составляем план устранения, делаем в приоритетном порядке (в течение 48 часов для критичных, до 7 дней для косметических).</li>
                                    <li>Подписываете акт выполненных гарантийных работ.</li>
                                </ol>
                                <p class="mt-3">Среднее время реакции — 4 часа. Среднее время устранения — 1.5 дня.</p>
                            </div>
                        </div>
                    </details>

                    <!-- Процесс и команда -->
                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-11">
                        <summary>
                            <span itemprop="name">Кто будет работать у меня в квартире? Свои люди или подрядчики?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Только наши штатные бригады.</strong> Никаких «субподрядчиков» и «райдеров».</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>В штате: прорабы, электрики, сантехники, плиточники, штукатуры, маляры, штукатуры, плотники, мебельщики, уборщики.</li>
                                    <li>Все проходят внутреннюю аттестацию, работают по нашим технологическим картам и чек-листам.</li>
                                    <li>За работу каждого отвечает прораб и наша компания по договору.</li>
                                    <li>Никаких «гастарбайтеров», студентов или случайных людей с Авито.</li>
                                </ul>
                                <div class="mt-3 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                                    <p class="text-sm text-blue-800"><strong>Можете проверить:</strong> на замере инженер покажет профили бригад, фото объектов, контакты прораба.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-12">
                        <summary>
                            <span itemprop="name">Как я буду узнавать о ходе работ, если не могу приезжать каждый день?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Приложение MAX</strong> — ежедневные фото/видео от прораба, % готовности этапа, комментарии.</li>
                                    <li><strong>Еженедельные отчёты</strong> — PDF с фото, % готовности, потраченные материалы, план на неделю.</li>
                                    <li><strong>Чат с прорабом</strong> — прямой контакт в Telegram/WhatsApp для оперативных вопросов.</li>
                                    <li><strong>Еженедельные созвоны</strong> — 15 мин по звонку/видео: статус, план, вопросы.</li>
                                </ul>
                                <p class="mt-3">Вы видите всё в телефоне — не нужно ездить на объект каждый день.</p>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-13">
                        <summary>
                            <span itemprop="name">Кто закупает материалы? Могу ли я купить сам?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Рекомендуем закупать через нас.</strong> Почему:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Скидка 10–15%</strong> у поставщиков (Леруа, Петрович, Спецстрой, локальные склады). Экономия 10–15% от стоимости материалов.</li>
                                    <li><strong>Точный расчёт.</strong> Считаем материалы по вашей смете + 5–10% запас на подрезку и брак. Реже — подрядчик закупил дешевле, чем предполагалось, и не хватило.</li>
                                    <li><strong>Логистика на нас.</strong> Закупка, доставка, подъём, хранение, возврат брака — на нас. Вы не ездите за материалами.</li>
                                    <li><strong>Качество под контролем.</strong> Проверяем партии при приёмке, брак меняем за свой счёт.</li>
                                </ul>
                                <p class="mt-3"><strong>Можете купить сами</strong> — если хотите конкретный бренд/коллекцию. Мы дадим ведомость с точными объёмами и артикулами. Но: ответственность за сроки доставки, брак, недокупку — на вас.</p>
                                <div class="mt-3 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                                    <p class="text-sm text-gray-700"><strong>Совет:</strong> черновые материалы (цемент, песок, провода, трубы) — всегда закупаем мы. Чистовые (плитка, ламинат, сантехника, краска) — можете выбрать сами, мы закупим по вашей ведомости со скидкой.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <!-- Документы и договор -->
                    <details class="faq-ex faq-item" data-category="legal" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-14">
                        <summary>
                            <span itemprop="name">Какой договор заключаете? Можно ли посмотреть образец?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3">Заключаем <strong>Договор подряда на выполнение строительно-монтажных работ</strong> (ст. 702 ГК РФ) с приложениями:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Приложение 1:</strong> Смета (позиционная, с расшифровкой, ценами, итогами).</li>
                                    <li><strong>Приложение 2:</strong> График работ (этапы, даты начала/окончания, неустойки).</li>
                                    <li><strong>Приложение 3:</strong> Техническое задание и чек-листы приёмки.</li>
                                    <li><strong>Приложение 4:</strong> Ведомость материалов (кто закупает, объёмы, цены).</li>
                                    <li><strong>Приложение 5:</strong> Акт приёмки-передачи этапов и итоговый акт.</li>
                                    <li><strong>Приложение 6:</strong> Гарантийный талон и инструкции по эксплуатации.</li>
                                </ul>
                                <p class="mb-3">Образец договора пришлём на email или в чат после замер — изучите спокойно, проконсультируйтесь с юристом.</p>
                                <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                                    <p class="text-sm text-yellow-800"><strong>Важно:</strong> В договоре прописаны: фиксированная цена, фиксированные сроки, неустойки за просрочку, порядок изменений объёмов/цен, порядок разрешения споров (претензионный досудебный + суд по месту нахождения подрядчика).</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="legal" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-15">
                        <summary>
                            <span itemprop="name">Нужно ли согласовывать перепланировку? Поможете с проектом?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>Если не меняете несущие стены и не меняете назначение комнат</strong> — согласование не нужно (текущий ремонт).</p>
                                <p class="mb-3"><strong>Нужно согласование (проект + Мосжилинспекция/МФЦ), если:</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Сносите/строите перегородки (меняется планировка).</li>
                                    <li>Переносите санузел, расширяете проём, сносите несущую стену — нужно.</li>
                                    <li>Объединяете кухню с гостиной — нужно.</li>
                                    </ul>
                                <p class="mb-3"><strong>Мы помогаем:</strong> готовим проект перепланировки (СССР/СССР), согласовываем в Мосжилинспекции/МФЦ, получаем акт о завершении перепланировки, вносим изменения в ЕГРН. Стоимость проекта от 20 000 ₽, срок согласования 30–45 дней.</p>
                                <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-xl">
                                    <p class="text-sm text-red-800"><strong>Важно:</strong> не начинайте снос перегородок до получения разрешения — штраф до 50 000 ₽ и обязанность восстановить исходное состояние за свой счёт (ст. 7.22 КоАП РФ, ст. 29 ЖК РФ).</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="legal" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-16">
                        <summary>
                            <span itemprop="name">Можно ли оплатить ремонт через ипотеку / маткапитал / рассрочку?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Ипотека на ремонт</strong> — да, работаем с банками-партнёрами (Сбер, Альфа, Тинькофф, ВТБ). Помогаем оформить: смету для банка, договор, акты этапов. Банк переводит деньги поэтапно по актам.</li>
                                    <li><strong>Материнский капитал</strong> — можно направить на оплату работ (не материалов). Помогаем оформить пакет документов для ПФР/МФЦ.</li>
                                    <li><strong>Рассрочка от нас</strong> — до 6 месяцев без процентов (первый взнос 30%, остальное равными частями по этапам). Оформляется доп. соглашением к договору.</li>
                                </ul>
                                <p class="mb-3">Подробнее обсудим на замере — инженер подскажет оптимальный вариант под вашу ситуацию.</p>
                            </div>
                        </div>
                    </details>

                    <!-- Дополнительные полезные вопросы -->
                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-17">
                        <summary>
                            <span itemprop="name">Можно ли жить в квартире во время ремонта?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>При капитальном ремонте — крайне не рекомендуем.</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Пыль, шум, грязь — вредны для здоровья (особенно детей и аллергиков).</li>
                                    <li>Электричество и вода периодически отключаются.</li>
                                    <li>Бригаде тесно — мешает двигаться, сроки сдвигаются.</li>
                                    <li>Риск повредить уже сделанное (пройти по свежей штукатурке, задеть свежую плитку).</li>
                                </ul>
                                <p class="mb-3"><strong>Косметический ремонт</strong> — можно остаться, если работает 1 комната и есть где спать/помыться. Но всё равно — пыль и шум.</p>
                                <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
                                    <p class="text-sm text-green-800"><strong>Совет:</strong> снимайте квартиру на время ремонта. Экономия на аренде не стоит здоровья и нервов. Мы поможем найти вариант рядом.</p>
                                </div>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-18">
                        <summary>
                            <span itemprop="name">Что нужно подготовить к приезду инженера на замер?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3">Минимум — доступ в квартиру и 30 минут времени. Желательно подготовить:</p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Документы:</strong> паспорт, ДДУ/выписка ЕГРН, план БТИ/ПИК (если есть).</li>
                                    <li><strong>Инструменты:</strong> рулетка 5м + лазерный дальномер, уровень 1м, фонарик, зажигалка/свеча (для вентиляции), индикаторная отвертка, мел/малярный скотч (отмечать дефекты), телефон с камерой.</li>
                                    <li><strong>Шаблон акта:</strong> скачайте <a href="/smeta-obrazec" style="color:#2563eb;">бланк акта приемки</a> заранее, чтобы не писать от руки на коленке.</li>
                                    <li><strong>Пожелания по планировке/стилю/бюджету</strong> (даже грубые: «хочу кухню-гостиную», «нужно 2 санузла»).</li>
                                </ul>
                                <p class="mb-3">Инженер будет 40–60 минут: замеряет лазером, фотофиксирует дефекты, задаёт вопросы про привычки/планы, записывает пожелания. Через 24 часа пришлём смету в 3 вариантах.</p>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-19">
                        <summary>
                            <span itemprop="name">Что если на замер приедет не инженер, а менеджер/менеджер?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <p class="mb-3"><strong>У нас выезжает только инженер-сметчик (5+ лет опыта).</strong></p>
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li>Менеджеры не умеют замерять, не видят технические риски (вентканалы, несущие стены, геометрия).</li>
                                    <li>Инженер сразу видит: где нужна гидроизоляция, где стоят несущие стены, как проложить коммуникации без конфликтов.</li>
                                    <li>Смета инженера — точная. Смета менеджера — «примерная», потом растёт.</li>
                                </ul>
                                <p class="mb-3">Наш инженер — ваш технический консультант. Он скажет, где можно сэкономить, а где экономить нельзя. Это бесплатно.</p>
                            </div>
                        </div>
                    </details>

                    <details class="faq-ex faq-item" data-category="process" itemscope itemtype="https://schema.org/Question" data-faq-id="faq-20">
                        <summary>
                            <span itemprop="name">Как вы относитесь к экологии и безопасности? Есть ли пыль/запахи?</span>
                            <span class="faq-mark" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text">
                                <ul class="list-disc ml-5 space-y-2 mb-4">
                                    <li><strong>Пыль:</strong> промышленные пылесосы (класс M/H) на каждом этапе, влажная уборка каждый день, запоры на дверях (пластик + зиппер).</li>
                                    <li><strong>Запахи:</strong> используем низковольатильные краски/клеи (Эколейбл, М1), вентиляция принудительная. Запах исчезает за 3–5 дней после уборки.</li>
                                    <li><strong>Отходы:</strong> сортируем (бетон/кирпич — на переработку, дерево — в брикеты, опасы — по договору с лицензированным подрядчиком). Вывозим в контейнерах, не в мусоропровод.</li>
                                    <li><strong>Безопасность:</strong> щиты заземлены, РУЗ на каждой группе, ограждения на окнах/балконах (высота >2м), ОСХАРД карта на объекте.</li>
                                </ul>
                            </div>
                        </div>
                    </details>
                </div>

                <div class="faq-no-results hidden" role="status" aria-live="polite">
                    <p class="text-center text-gray-500 py-8">По вашему запросу ничего не найдено. Попробуйте другую категорию.</p>
                </div>

            <div class="faq-cta mt-10 text-center">
                <p class="text-gray-600 mb-4 max-w-2xl mx-auto">Не нашли ответ? Напишите нам — инженер ответит за 15 минут в рабочее время.</p>
                <div class="flex flex-wrap justify-center gap-3 mt-4">
                    <a href="/contact" class="fss-btn-light">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                        Задать вопрос инженеру
                    </a>
                    <a href="/calculator" class="fss-btn-ghost">
                        <i class="fas fa-calculator" aria-hidden="true"></i>
                        Быстрый расчёт стоимости
                    </a>
                </div>
            </div>
        </section>

<!-- SEO Бренд-блок: «Проект Квартира» (для брендовых запросов) -->
        <section class="brand-section section-shell" aria-label="О бренде Проект Квартира — официальный сайт pkvartira.ru" itemscope itemtype="https://schema.org/Organization">
            <meta itemprop="alternateName" content="Проект Квартира">
            <meta itemprop="alternateName" content="pkvartira.ru">
            <meta itemprop="alternateName" content="pkvartira">
            <meta itemprop="alternateName" content="ООО Проект Квартира">
            <meta itemprop="url" content="<?= htmlspecialchars($site['baseUrl']) ?>">
            <link itemprop="logo" href="<?= htmlspecialchars($site['baseUrl']) ?>/public/assets/images/logo/favicon/favicon.svg">

            <div class="section-topline">
                <p class="eyebrow">О бренде</p>
                <span class="eyebrow">pkvartira.ru · Москва</span>
            </div>

            <div class="brand-grid">
                <h2 itemprop="name">Проект Квартира —<br><span>официальный сайт.</span></h2>

                <div class="brand-copy">
                    <p><strong itemprop="brand">Проект Квартира</strong> — официальное название компании,
                        <strong>Проект Квартира</strong> — сокращённое наименование и домен <strong>pkvartira.ru</strong>
                        (также ищут как <strong>pkvartira</strong>, <strong>ПроектКвартира</strong>,
                        <strong>Proekt Kvartira</strong>).</p>
                    <p>Нас находят по запросам: Проект Квартира официальный сайт, pkvartira.ru официальный сайт,
                        Проект Квартира Москва, Проект Квартира отзывы, pkvartira отзывы, Проект Квартира ремонт,
                        ремонт квартир, ООО Проект Квартира.</p>
                    <p>Мы — ООО «Проект Квартира»: делаем ремонт квартир и домов под ключ в Москве и Подмосковье,
                        гарантия 3 года, фиксированная смета. Забронируйте бесплатный замер — убедитесь, что выбрали
                        профессионалов <strong>Проект Квартира</strong>.</p>

                    <div class="brand-meta">
                        Официальный сайт — <a href="<?= htmlspecialchars($site['baseUrl']) ?>/">pkvartira.ru</a> • ООО «Проект Квартира»
                        <br>
                        <span itemprop="brand" itemscope itemtype="https://schema.org/Brand">
                            <span itemprop="name">Проект Квартира</span> |
                            <span itemprop="alternateName">pkvartira.ru</span> |
                            <span itemprop="alternateName">ООО Проект Квартира</span>
                        </span>
                        <br>
                        ИНН 9719013990, ОГРН 1217700135058, адрес:
                        <span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress"><span itemprop="streetAddress">Москва, Варшавское ш., д. 28А</span></span>
                        • Тел. <a href="tel:+74954731737" itemprop="telephone">+7 495 473-17-37</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand FAQ для сниппетов по брендовым запросам -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": [
            {
              "@type": "Question",
              "name": "Где официальный сайт Проект Квартира?",
              "acceptedAnswer": {"@type": "Answer", "text": "Официальный сайт компании Проект Квартира — <?= htmlspecialchars($site['baseUrl']) ?>. Проверяйте домен в адресной строке, чтобы не попасть к мошенникам."}
            },
            {
              "@type": "Question",
              "name": "Как правильно называется компания: Проект Квартира или Проект Квартира?",
              "acceptedAnswer": {"@type": "Answer", "text": "Официальное название — Проект Квартира (ООО «Проект Квартира»). Сокращённо — Проект Квартира, латиницей — pkvartira, домен — pkvartira.ru, транслитом — Proekt Kvartira. Все варианты относятся к одной компании."}
            },
            {
              "@type": "Question",
              "name": "Что такое Проект Квартира (pkvartira.ru)?",
              "acceptedAnswer": {"@type": "Answer", "text": "Проект Квартира (pkvartira.ru) — сокращённое название бренда Проект Квартира (ООО «Проект Квартира», ОГРН 1217700135058). Ремонт квартир и домов под ключ в Москве и Подмосковье. Гарантия 3 года, фиксированная смета."}
            },
            {
              "@type": "Question",
              "name": "Как найти отзывы о Проект Квартира?",
              "acceptedAnswer": {"@type": "Answer", "text": "Отзывы о Проект Квартира — на странице <?= htmlspecialchars($site['baseUrl']) ?>/reviews, а также на Яндекс Картах и 2ГИС. Ищите по запросам: Проект Квартира отзывы, pkvartira отзывы, ООО Проект Квартира отзывы."}
            }
          ]
        }
        </script>

        <!-- CTA Section -->
        <section class="fss-cta-band reveal" aria-labelledby="cta-title">
            <span class="section-number section-number-dark">11</span>
            <div class="container mx-auto px-4">
                <span class="label-tag">Свободные даты на замер</span>
                <h2 id="cta-title">
                    Начните ремонт, который<br>не захочется переделывать
                </h2>
                <p>
                    Забронируйте бесплатный выезд инженера сегодня. Сделаем замеры лазером, найдём все
                    «косяки» застройщика и составим смету с фиксированной стоимостью: допработы — только после
                    вашего согласования.
                </p>
                <div class="fss-cta-actions">
                    <a href="tel:<?php echo $site['phone']; ?>" class="fss-btn-light">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        Вызвать инженера на замер
                    </a>
                    <button type="button" data-button-dialog class="fss-btn-ghost">
                        <i class="fas fa-comments" aria-hidden="true"></i>
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

    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/faq.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Google tag (gtag.js) GA4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E9ZV484NQJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-E9ZV484NQJ');
    </script>

    <!-- Yandex.Metrica counter — перенесён в components/head-includes.php (M-03),
         чтобы счётчик работал на всех страницах сайта, а не только на главной. -->

<script src="https://analytics.ahrefs.com/analytics.js" data-key="IQF63+np/5nlOq39Ble4hg" async></script>

<?php include_once './public/components/cta-modal.php'; ?>

</body>
</html>