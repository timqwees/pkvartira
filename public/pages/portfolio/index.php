<?php

use Setting\Route\Function\Functions;

$site = Functions::site();
$portfolio = Functions::portfolioItems();
$types = array_column($portfolio, 'type');
$portfolioJson = array_map(static function (array $item) use ($site): array {
    return [
        'slug' => $item['slug'],
        'title' => $item['title'],
        'subtitle' => $item['subtitle'],
        'size' => $item['size'],
        'category' => $item['category'],
        'duration' => $item['duration'],
        'price' => $item['price'],
        'photos' => array_map(
            static fn(string $photo): string => $site['baseUrl'] . '/' . $item['folder_image'] . '/' . $photo,
            $item['photos']
        ),
    ];
}, $portfolio);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Портфолио ремонтов — реальные проекты |
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>
    </title>
    <meta name="description"
        content="Наши выполненные проекты — фото «до» и «после», планировки, сроки и бюджеты реальных объектов.">
    <meta name="keywords" content="наши проекты, фото работ, примеры объектов, портфолио">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/portfolio'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Наши проекты — фото «до» и «после» | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Выполненные проекты — фото «до» и «после», планировки, сроки и бюджеты.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/portfolio'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Наши проекты — фото «до» и «после» | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Выполненные проекты — фото «до» и «после», планировки, сроки.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain"
        content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <!-- Дополнительные мета-теги -->


    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [{
                    "@type": "Organization",
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
                    "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "logo": {
                        "@type": "ImageObject",
                        "url": <?= json_encode($site['baseUrl'] . '/public/assets/images/logo/favicon/favicon.svg', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                        "width": 300,
                        "height": 300
                    },
                    "contactPoint": {
                        "@type": "ContactPoint",
                        "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
                        "contactType": "customer service",
                        "availableLanguage": ["Russian"]
                    },
                    "address": {
                        "@type": "PostalAddress",
                        "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
                        "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
                        "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
                        "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
                        "addressCountry": "RU"
                    },
                    "sameAs": [
                        <?= json_encode($site['vk'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                        <?= json_encode($site['telegram'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                        <?= json_encode($site['whatsapp'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    ]
                },
                {
                    "@type": "WebSite",
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "url": <?= json_encode($site['baseUrl'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "name": <?= json_encode($site['name'], JSON_UNESCAPED_UNICODE); ?>,
                    "description": "Выполненные проекты для клиентов",
                    "publisher": {
                        "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "inLanguage": "ru-RU"
                },
                {
                    "@type": "WebPage",
                    "@id": <?= json_encode($site['baseUrl'] . '/portfolio/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "url": <?= json_encode($site['baseUrl'] . '/portfolio/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "name": "Наши проекты",
                    "description": "Примеры выполненных объектов: фото, планировки и сроки.",
                    "isPartOf": {
                        "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "about": {
                        "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "inLanguage": "ru-RU"
                },
                {
                    "@type": "BreadcrumbList",
                    "@id": <?= json_encode($site['baseUrl'] . '/portfolio/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                    "itemListElement": [{
                            "@type": "ListItem",
                            "position": 1,
                            "name": "Главная",
                            "item": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                        },
                        {
                            "@type": "ListItem",
                            "position": 2,
                            "name": "Портфолио",
                            "item": <?= json_encode($site['baseUrl'] . '/portfolio/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                        }
                    ]
                }
            ]
        }
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="pt-20">

        <section class="reveal bg-gray-50">
            <div class="container mx-auto px-4 max-w-6xl py-10">
                <div class="relative bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-12">
                        <div class="lg:col-span-7 p-6 md:p-10">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">Наше портфолио</h1>
                            <p class="mt-2 text-gray-600">Посмотрите фото и видео наших работ, восхититесь тем, как мы
                                преображаем пространства.</p>
                            <p class="mt-3 text-sm text-gray-500">Оцените наши работы, ориентируйтесь по цене и срокам.</p>

                            <div class="mt-6">
                                <a href="/calculator"
                                    class="inline-flex items-center justify-center px-7 py-3 rounded-lg bg-orange-500 text-white font-semibold shadow hover:bg-orange-600 transition">
                                    Рассчитать стоимость
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-5 relative min-h-48">
                            <img src="<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/pages/portfolio/img.jpg"
                                class="w-full h-full object-cover" alt="Портфолио" title="Портфолио выполненных ремонтов">
                            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/60 to-transparent"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 bg-[#F3F6FB] rounded-2xl border border-gray-200 shadow-sm p-5 md:p-6">
                    <div class="flex items-center justify-between gap-4 flex-wrap">
                        <div class="text-sm font-semibold text-gray-800">Фильтры</div>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2" id="filterContainer">
                        <button data-filter="all"
                            class="filter-btn h-10 px-4 rounded-md bg-blue-700 text-white text-sm font-semibold transition">Все
                            проекты</button>

                        <?php foreach (array_unique($types) as $key => $value): ?>
                            <button data-filter="<?= htmlspecialchars($value) ?>"
                                class="filter-btn h-10 px-4 rounded-md bg-white border border-gray-200 text-gray-700 text-sm font-semibold transition"><?= htmlspecialchars($value) ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <ul class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6" id="projectsGrid">

                    <!-- cards -->

                    <?php foreach ($portfolio as $key => $value): ?>
                        <li itemscope itemtype="https://schema.org/Project"
                            id="project-<?= htmlspecialchars($value['slug']) ?>"
                            class="project-card bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden cursor-pointer hover:shadow-md transition"
                            data-categories="<?= htmlspecialchars($value['type']) ?>"
                            data-project-slug="<?= htmlspecialchars($value['slug']) ?>">
                            <!-- photo -->
                            <div class="relative h-52">
                                <div class="swiper swiper-type-one w-full h-full">
                                    <div class="swiper-wrapper">
                                        <?php
                                        foreach ((new Functions())->getPhotos($value['folder_image']) as $key => $img): ?>
                                            <div class="swiper-slide">
                                                <img decoding="async" loading="lazy" itemprop="image"
                                                    src="<?= htmlspecialchars($site['baseUrl'] . '/' . $value['folder_image'] . '/' . $img) ?>"
                                                    class="w-full h-full object-cover" width="1280" height="720" alt="<?= htmlspecialchars($value['title'] ?? 'Фото ремонта'); ?>">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div
                                        class="swiper-button-next !w-8 !h-8 !bg-white/90 !rounded-full !text-blue-700 !flex !items-center !justify-center after:!content-none"
                                        aria-label="Следующее фото">
                                        <i class="fas fa-chevron-right text-xs"></i>
                                    </div>
                                    <div
                                        class="swiper-button-prev !w-8 !h-8 !bg-white/90 !rounded-full !text-blue-700 !flex !items-center !justify-center after:!content-none"
                                        aria-label="Предыдущее фото">
                                        <i class="fas fa-chevron-left text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- body -->
                            <div class="p-5">
                                <div itemprop="name" class="font-bold text-gray-900 leading-snug">
                                    <?= htmlspecialchars($value['title']) ?>
                                </div>
                                <div class="mt-4 flex flex-wrap items-center justify-between gap-4 text-xs text-gray-600">
                                    <div class="flex flex-wrap items-center gap-4">
                                        <div class="inline-flex items-center gap-2" itemprop="category"><i
                                                class="fas fa-tag text-blue-700"></i><?= htmlspecialchars($value['category']) ?>
                                        </div>
                                        <div itemprop="additionalProperty" itemscope
                                            itemtype="https://schema.org/PropertyValue"
                                            class="inline-flex items-center gap-2">
                                            <meta itemprop="name" content="Площадь" />
                                            <meta itemprop="value" content="<?= htmlspecialchars($value['size']) ?>" />
                                            <i
                                                class="fas fa-ruler-combined text-blue-700"></i><?= htmlspecialchars($value['size']) ?>
                                        </div>
                                        <?php if (!empty($value['duration'])): ?>
                                            <div class="inline-flex items-center gap-2">
                                                <i class="fas fa-clock text-blue-700"></i><?= htmlspecialchars($value['duration']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <button type="button" data-open-project="<?= htmlspecialchars($value['slug']) ?>"
                                        class="text-orange-600 hover:text-orange-600 font-semibold inline-flex items-center gap-1">
                                        Смотреть проект
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>

                <div class="mt-10 bg-gradient-to-r from-blue-800 to-blue-700 rounded-2xl p-6 md:p-8 text-white">
                    <div class="text-xl md:text-2xl font-bold">Хотите такой же проект?</div>
                    <div class="mt-5 grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                        <form action="/send/email" method="POST" class="md:col-span-7">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <input type="hidden" name="Источник: Портфолио" id="">
                                <input name="теефон" data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+"
                                    maxlength="15" placeholder="+7 ___ ___-__-__" aria-label="Телефон"
                                    class="w-full px-4 py-3 rounded-lg text-gray-900 outline-none">
                                <button
                                    class="w-full sm:w-auto px-6 py-3 rounded-lg bg-orange-500 font-semibold hover:bg-orange-600 transition whitespace-nowrap">Рассчитать
                                    стоимость</button>
                            </div>
                        </form>
                        <div class="md:col-span-5 text-center">
                            <div class="text-sm text-blue-100">Бесплатная честная смета</div>
                            <div class="mt-2 text-sm text-blue-100">Точный расчет за 1 день</div>
                            <div class="mt-2 text-sm text-blue-100">Ответим за 5–10 минут</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include_once './public/components/portfolio-project-modal.php'; ?>
    <script type="application/json" id="portfolio-projects-data"><?= json_encode($portfolioJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/portfolio-modal.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.js" defer></script>

    <!-- Portfolio Swiper & Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Before/After Sliders
            const beforeAfterSliders = document.querySelectorAll('.before-after-slider');
            beforeAfterSliders.forEach(function (slider) {
                const handle = slider.querySelector('.slider-handle');
                const beforeContainer = slider.querySelector('.img-container.before');
                let isDragging = false;

                function updateSlider(x) {
                    const rect = slider.getBoundingClientRect();
                    let percentage = ((x - rect.left) / rect.width) * 100;
                    percentage = Math.max(0, Math.min(100, percentage));
                    handle.style.left = percentage + '%';
                    beforeContainer.style.width = percentage + '%';
                }

                handle.addEventListener('mousedown', function (e) {
                    isDragging = true;
                    e.preventDefault();
                    e.stopPropagation();
                });

                document.addEventListener('mousemove', function (e) {
                    if (!isDragging) return;
                    e.preventDefault();
                    updateSlider(e.clientX);
                });

                document.addEventListener('mouseup', function () {
                    isDragging = false;
                });

                // Touch support
                handle.addEventListener('touchstart', function (e) {
                    isDragging = true;
                    e.stopPropagation();
                }, {
                    passive: true
                });

                document.addEventListener('touchmove', function (e) {
                    if (!isDragging) return;
                    updateSlider(e.touches[0].clientX);
                }, {
                    passive: true
                });

                document.addEventListener('touchend', function () {
                    isDragging = false;
                });

                // Click to jump
                slider.addEventListener('click', function (e) {
                    if (e.target.closest('.slider-handle')) return;
                    updateSlider(e.clientX);
                });
            });

            // Filter functionality
            const filterBtns = document.querySelectorAll('.filter-btn');
            const projectCards = document.querySelectorAll('.project-card');
            const projectsGrid = document.getElementById('projectsGrid');

            filterBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const filter = this.getAttribute('data-filter');

                    // Update active button state
                    filterBtns.forEach(function (b) {
                        b.classList.remove('bg-blue-700', 'text-white');
                        b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
                    });
                    this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
                    this.classList.add('bg-blue-700', 'text-white');

                    // Filter projects
                    let visibleCount = 0;
                    projectCards.forEach(function (card) {
                        if (filter === 'all') {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            const categories = card.getAttribute('data-categories');
                            if (categories && categories.includes(filter)) {
                                card.style.display = 'block';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });

                    // Update counter
                    const counterEl = document.querySelector('.text-sm.text-gray-500');
                    if (counterEl) {
                        counterEl.textContent = 'Найдено ' + visibleCount + ' проект' + (visibleCount === 1 ? '' : visibleCount < 5 ? 'а' : 'ов');
                    }
                });
            });
        });
    </script>
</body>

</html>
