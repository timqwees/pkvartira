<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Блог / статьи —
        <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>
    </title>
    <meta name="description"
        content="Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <?php
    $__blogCanon = $site['baseUrl'] . '/blog';
    if (!empty($_GET['page']) && (int) $_GET['page'] > 1) {
        $__blogCanon .= '?page=' . (int) $_GET['page'];
    }
    ?>
    <link rel="canonical" href="<?= htmlspecialchars($__blogCanon); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Блог / статьи — <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.">
    <meta property="og:url" content="<?= htmlspecialchars($__blogCanon); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="Блог / статьи — <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.">
    <meta name="twitter:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">


    <!-- Структурированные данные (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
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
                    "availableLanguage": ["Russian"],
                    "areaServed": "RU"
                },
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": <?= json_encode($site['address']['streetAddress'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressLocality": <?= json_encode($site['address']['addressLocality'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressRegion": <?= json_encode($site['address']['addressRegion'], JSON_UNESCAPED_UNICODE); ?>,
                    "postalCode": <?= json_encode($site['address']['postalCode'], JSON_UNESCAPED_UNICODE); ?>,
                    "addressCountry": <?= json_encode($site['address']['addressCountry'], JSON_UNESCAPED_UNICODE); ?>
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
                "description": <?= json_encode($site['description'], JSON_UNESCAPED_UNICODE); ?>,
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": <?= json_encode($site['baseUrl'] . '/search?q={search_term_string}', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    "query": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": <?= json_encode($site['baseUrl'] . '/blog/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/blog', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Блог / статьи — <?= htmlspecialchars($site['name']); ?>",
                "description": "Полезные советы и лайфхаки для ремонта квартир под ключ. Практическая информация, руководства по отделке, выбору материалов и дизайну интерьера.",
                "isPartOf": {
                    "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "about": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                },
                "inLanguage": "ru-RU"
            },
            {
                "@type": "Blog",
                "@id": <?= json_encode($site['baseUrl'] . '/blog/#blog', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "url": <?= json_encode($site['baseUrl'] . '/blog', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "name": "Блог — <?= htmlspecialchars($site['name']); ?>",
                "description": "Полезные советы и лайфхаки для ремонта квартир под ключ",
                "publisher": {
                    "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                }
            },
            {
                "@type": "BreadcrumbList",
                "@id": <?= json_encode($site['baseUrl'] . '/blog/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Главная",
                        "item": <?= json_encode($site['baseUrl'] . '/', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Блог",
                        "item": <?= json_encode($site['baseUrl'] . '/blog', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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

    <main class="pt-20">
        <section class="py-8">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="mb-4">
                    <h1 class="text-[34px] leading-[40px] font-extrabold text-[#2a2e3b]">Блог / статьи</h1>
                    <p class="mt-2 text-[14px] leading-[20px] text-[#7a7f8c] max-w-2xl">
                        Полезные советы и лайфхаки для ремонта квартир под ключ, практическая информация и наши
                        наработки.
                    </p>
                </div>

                <?php
                $article = new App\Models\Article\Article;
                $show_articles = 5;
                $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                if ($current_page < 1)
                    $current_page = 1;//защита от понижения страниц при 0 когда минимум 1 = стр будет снова 1
                $max_pages = ceil($article->getCountArticles() / $show_articles);//округляем в большую сторону убирая не целые числа
                if ($current_page > $max_pages)
                    $current_page = $max_pages;//защита от превыщения страниц max=2 при стр 3 = будет стр 2
                $articles = $article->getPaginatedArticles($current_page, $show_articles) ?: [];//object articles
                //================================
                $categoriyes = $article->getAllCategory();//получнеие всхе категорий
                //================================
                $tops = $article->getTops();
                ?>

                <div class="flex flex-wrap gap-2 mb-6">
                    <button data-filter="all"
                        class="filter-btn h-10 px-4 rounded-md bg-white border border-gray-200 text-gray-700 text-sm font-semibold transition <?= $current_page == 1 ? 'bg-blue-700 text-white' : ''; ?>">
                        Все статьи</button>
                    <?php foreach ($categoriyes as $key): ?>
                        <button data-filter="<?php echo $key['category']; ?>"
                            class="filter-btn h-10 px-4 rounded-md bg-white border border-gray-200 text-gray-700 text-sm font-semibold transition">
                            <?php echo $key['category']; ?></button>
                    <? endforeach; ?>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                    <div class="lg:col-span-8 space-y-4">

                        <?php if (empty($articles)): ?>
                            <div class="blog-card p-6 text-center">
                                <p class="text-[#7a7f8c]">Пока нет статей. Вернитесь позже!</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($articles as $article): ?>
                                <article class="rounded-xl blog-card" data-category="<?php echo $article['category']; ?>"
                                    itemscope itemtype="https://schema.org/Article">
                                    <meta itemprop="inLanguage" content="ru-RU" />
                                    <div class="blog-card-grid">
                                        <div class="bg-[url('<?php echo $article['image'] ?: 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=700&q=60'; ?>')] bg-center bg-cover"
                                            itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                            <meta itemprop="url"
                                                content="<?php echo htmlspecialchars($article['image'] ?: 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=700&q=60'); ?>">
                                        </div>
                                        <div class="blog-card-body">
                                            <h2 class="blog-card-title" itemprop="headline">
                                                <?php echo htmlspecialchars($article['title']); ?>
                                            </h2>
                                            <p class="blog-card-text" itemprop="description">
                                                <?php echo htmlspecialchars(substr($article['content'], 0, 150)) . '...'; ?>
                                            </p>
                                            <div class="blog-card-meta">
                                                <span><time itemprop="datePublished"
                                                        datetime="<?php echo htmlspecialchars(date('c', strtotime($article['created_at']))); ?>"><?php echo date('d M Y', strtotime($article['created_at'])); ?></time></span>
                                                <span class="flex items-center gap-1" itemprop="articleSection">
                                                    <i class="fa-solid fa-tag"></i>
                                                    <?php echo $article['category']; ?>
                                                </span>
                                                <a href="/blog/article/<?php echo $article['id']; ?>" class="blog-btn-more"
                                                    itemprop="url">Читать далее</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ($max_pages > 1): ?>
                            <div class="flex justify-center items-center gap-2 mt-6">
                                <?php if ($current_page > 1): //если будет 1 - 1 = 0 то систем защиты поставит автомтаически, но м ыне выводим 1 а только 2 в пагинации ?>
                                    <a href="?page=<?php echo $current_page - 1; ?>" class="pagination-btn">
                                        Назад
                                    </a>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $max_pages; $i++): ?>
                                    <?php if ($i === $current_page): ?>
                                        <span class="pagination-btn active"><?php echo $i; ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?php echo $i; ?>" class="pagination-btn"><?php echo $i; ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($current_page < $max_pages): ?>
                                    <a href="?page=<?php echo $current_page + 1; ?>" class="pagination-btn">
                                        Вперед
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <aside class="lg:col-span-4 lg:sticky space-y-4">
                        <nav
                            class="bg-white rounded-xl border border-[#e6e7ee] shadow-[0_2px_10px_rgba(0,0,0,0.06)] overflow-hidden">
                            <div class="px-4 py-3 bg-[#f2f3f8] border-b border-[#e6e7ee]">
                                <div class="font-extrabold text-[#2a2e3b]">Популярные материалы</div>
                            </div>
                            <style>
                                .custom-list {
                                    list-style: none;
                                    counter-reset: item;
                                }

                                .custom-list li {
                                    counter-increment: item;
                                }

                                .custom-list li::before {
                                    content: counter(item);
                                    position: absolute;
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 1px 6px;
                                    top: 0px;
                                    background-color: #ff7a21;
                                    color: white;
                                    border-radius: 4px;
                                    font-size: 12px;
                                    font-weight: bold;
                                    flex-shrink: 0;
                                }
                            </style>
                            <ol class="p-4 space-y-3 custom-list">
                                <?php if (empty($articles)): ?>
                                    <div class="blog-card p-6 text-center">
                                        <p class="text-[#7a7f8c]">Пока нет статей. Вернитесь позже!</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($tops as $key => $value): //key = number article ?>
                                        <li
                                            class="flex gap-3 relative cursor-pointer rounded-xl hover:bg-gray-100 transition-all">
                                            <a class="flex gap-3" href="<?php echo $value['link'] ?>">
                                                <div class="flex gap-3">
                                                    <img class="w-[80px] object-cover rounded" alt="<?php echo htmlspecialchars($value['title']); ?>"
                                                        src="<?php echo $value['image']; ?>">
                                                    <div class="flex flex-col">
                                                        <h3 class="text-[13px] font-bold text-[#2a2e3b] leading-[16px]">
                                                            <?php echo $value['title']; ?>
                                                        </h3>
                                                        <p class="text-[11px] text-[#8a90a0] mt-1">
                                                            <?php echo date('d M Y', strtotime($value['created_at'])); ?>
                                                        </p>
                                                        <span class="flex text-sm text-[#8a90a0] items-center gap-1">
                                                            <i class="fa-solid fa-tag"></i>
                                                            <?php echo $value['category']; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <hr>
                                    <?php endforeach; ?>
                                <? endif; ?>
                            </ol>

                            <div
                                class="bg-white rounded-xl border border-[#e6e7ee] shadow-[0_2px_10px_rgba(0,0,0,0.06)] overflow-hidden">
                                <div class="px-4 py-3 bg-[#f2f3f8] border-b border-[#e6e7ee]">
                                    <div class="font-extrabold text-[#2a2e3b]">Наши услуги</div>
                                </div>
                                <div class="p-4 space-y-4">
                                    <div class="flex gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-[#e9f1ff] text-[#1f5ea8] flex items-center justify-center">
                                            <i class="fa-solid fa-screwdriver-wrench"></i>
                                        </div>
                                        <div>
                                            <div class="text-[13px] font-bold text-[#2a2e3b]">Ремонт "под ключ"</div>
                                            <div class="text-[12px] text-[#7a7f8c]">Полный комплекс работ с гарантией 3
                                                года
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-[#e9f1ff] text-[#1f5ea8] flex items-center justify-center">
                                            <i class="fa-solid fa-pen-ruler"></i>
                                        </div>
                                        <div>
                                            <div class="text-[13px] font-bold text-[#2a2e3b]">Проектирование интерьера
                                            </div>
                                            <div class="text-[12px] text-[#7a7f8c]">Дизайн интерьера любой сложности
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-[#e9f1ff] text-[#1f5ea8] flex items-center justify-center">
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                        <div>
                                            <div class="text-[13px] font-bold text-[#2a2e3b]">Подбор материалов</div>
                                            <div class="text-[12px] text-[#7a7f8c]">Выбор и комплектация материалов
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </aside>
                </div>
            </div>
        </section>

        <section class="py-10">
            <div class="container mx-auto px-4 max-w-6xl">
                <h3 class="text-[22px] font-extrabold text-[#2a2e3b]">Наши услуги</h3>
                <nav class="flex flex-col justify-between items-center mt-4 p-5">
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <li class="flex flex-1 items-start gap-3">
                            <div class="w-14 h-11 rounded-lg bg-[#1f5ea8] text-white flex items-center justify-center">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <div>
                                <div class="font-bold text-[#2a2e3b] text-[13px]">Ремонт "под ключ"</div>
                                <div class="text-[12px] text-[#7a7f8c]">Полный комплекс работ с гарантией 5 года</div>
                            </div>
                        </li>
                        <li class="flex flex-1 items-start gap-3">
                            <div class="w-11 h-11 rounded-lg bg-[#1f5ea8] text-white flex items-center justify-center">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <div>
                                <div class="font-bold text-[#2a2e3b] text-[13px]">Дизайн интерьера</div>
                                <div class="text-[12px] text-[#7a7f8c]">Дизайн интерьера любой сложности</div>
                            </div>
                        </li>
                        <li class="flex flex-1 items-start gap-3">
                            <div class="w-11 h-11 rounded-lg bg-[#1f5ea8] text-white flex items-center justify-center">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <div>
                                <div class="font-bold text-[#2a2e3b] text-[13px]">Подбор материалов</div>
                                <div class="text-[12px] text-[#7a7f8c]">Выбор и покупка материалов</div>
                            </div>
                        </li>
                        <li class="flex flex-1 items-start gap-3">
                            <div class="w-11 h-11 rounded-lg bg-[#1f5ea8] text-white flex items-center justify-center">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="font-bold text-[#2a2e3b] text-[13px]">Управление проектом</div>
                                <div class="text-[12px] text-[#7a7f8c]">Полный контроль объекта</div>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-5">
                        <a href="/services"
                            class="inline-flex items-center justify-center h-[36px] px-5 rounded-md bg-[#1f5ea8] text-white text-[13px] font-bold shadow-[0_2px_0_rgba(0,0,0,0.15)]">
                            Посмотреть все услуги компании
                            <i class="fa-solid fa-chevron-right ml-2 text-[11px]"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </section>
        <hr>
        <section class="py-14">
            <div class="container text-center mx-auto px-4 max-w-6xl">
                <h3 class="text-[24px] md:text-[26px] font-extrabold text-[#2a2e3b]">
                    Хотите рассчитать стоимость ремонта в вашей квартире?
                </h3>
                <p class="mt-2 text-xl text-[#7a7f8c]">
                    Получите расчет и бесплатную консультацию без обязательств.
                </p>

                <div class="mt-6">
                    <a href="#calculator"
                        class="inline-flex items-center justify-center h-[46px] px-16 rounded-full bg-[#ff7a21] text-white text-[15px] font-extrabold shadow-[0_6px_0_rgba(0,0,0,0.12)]">
                        Рассчитать стоимость
                    </a>
                </div>

                <div class="mt-6 flex items-center justify-center mx-auto">
                    <div class="flex gap-4 justify-center flex-wrap text-center gap-2">
                        <div class="flex items-center gap-2 text-[13px] text-[#2a2e3b]">
                            <span
                                class="w-5 h-5 rounded-full bg-[#ffddb9] flex items-center justify-center text-[#ff7a21] text-[12px]"><i
                                    class="fa-solid fa-check"></i></span>
                            <span>Перезвоним через 15 минут</span>
                        </div>
                        <div class="flex items-center gap-2 text-[13px] text-[#2a2e3b]">
                            <span
                                class="w-5 h-5 rounded-full bg-[#ffddb9] flex items-center justify-center text-[#ff7a21] text-[12px]"><i
                                    class="fa-solid fa-check"></i></span>
                            <span>Обсудим все пожелания</span>
                        </div>
                        <div class="flex items-center gap-2 text-[13px] text-[#2a2e3b]">
                            <span
                                class="w-5 h-5 rounded-full bg-[#ffddb9] flex items-center justify-center text-[#ff7a21] text-[12px]"><i
                                    class="fa-solid fa-check"></i></span>
                            <span>Сориентируем по стоимости</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <style>
        .blog-tab {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 32px;
            padding: 0 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 800;
            color: #2a2e3b;
            background: linear-gradient(180deg, #ffffff 0%, #f4f5fb 100%);
            border: 1px solid #d7d9e2;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .blog-tab.active {
            background: linear-gradient(180deg, #f7f8fe 0%, #eef0f8 45%, #f7f8fe 100%);
            color: #fff;
            border-color: rgba(0, 0, 0, 0.08);
        }

        .blog-card {
            background: #fff;
            border: 1px solid #e6e7ee;
            overflow: hidden;
        }

        .blog-card-grid {
            display: grid;
            grid-template-columns: 240px 1fr;
        }

        @media (max-width: 767px) {
            .blog-card-grid {
                grid-template-columns: 1fr;
            }
        }

        .blog-card-img {
            background: #f2f3f8;
            height: 170px;
            overflow: hidden;
        }

        .blog-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .blog-card-body {
            padding: 18px 18px 14px;
        }

        .blog-card-title {
            font-size: 18px;
            line-height: 24px;
            font-weight: 900;
            color: #2a2e3b;
        }

        .blog-card-text {
            margin-top: 8px;
            font-size: 13px;
            line-height: 18px;
            color: #7a7f8c;
        }

        .blog-card-meta {
            margin-top: 14px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 12px;
            color: #8a90a0;
        }

        .blog-btn-more {
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            padding: 0 16px;
            border-radius: 8px;
            color: #fff;
            font-size: 12px;
            font-weight: 900;
            background: linear-gradient(180deg, #ff943d 0%, #ff7a21 100%);
            box-shadow: 0 3px 0 rgba(0, 0, 0, 0.12);
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            min-width: 36px;
            padding: 0 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #2a2e3b;
            background: linear-gradient(180deg, #ffffff 0%, #f4f5fb 100%);
            border: 1px solid #d7d9e2;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9), 0 2px 4px rgba(0, 0, 0, 0.04);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pagination-btn:hover {
            background: linear-gradient(180deg, #f7f8fe 0%, #e8eaf5 100%);
            border-color: #c5c8d8;
        }

        .pagination-btn.active {
            background: linear-gradient(180deg, #2a75c8 0%, #1f5ea8 100%);
            color: #fff;
            border-color: rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 12px rgba(31, 94, 168, 0.25);
            cursor: default;
        }

        .pagination-btn.active:hover {
            background: linear-gradient(180deg, #2a75c8 0%, #1f5ea8 100%);
            color: #fff;
            border-color: rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 12px rgba(31, 94, 168, 0.25);
            cursor: default;
        }

        .pagination-btn i {
            font-size: 11px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-filter]').forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    var filter = this.dataset.filter;

                    document.querySelectorAll('[data-filter]').forEach(function (b) {
                        b.classList.remove('bg-blue-700', 'text-white');
                        b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
                    });
                    this.classList.add('bg-blue-700', 'text-white');
                    this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');

                    document.querySelectorAll('.blog-card').forEach(function (card) {
                        if (filter === 'all' || card.dataset.category === filter) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
