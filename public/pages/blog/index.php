<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Блог о ремонте квартир — полезные статьи, советы, цены 2026 | ПКвартира</title>
    <meta name="description"
        content="Полезные статьи о ремонте квартир: пошаговые руководства, выбор материалов, дизайн интерьера, актуальные цены 2026. Советы экспертов с 10-летним опытом ремонта.">
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

    <main class="pt-20" style="padding-top:80px">
        <section class="py-8 reveal">
            <div class="container mx-auto px-4 max-w-6xl">
                <div class="mb-8">
                    <h1 class="text-[32px] md:text-[40px] font-extrabold text-[#1f2937] leading-tight" style="font-family:var(--font-heading)">Блог / статьи</h1>
                    <p class="mt-3 text-[15px] leading-[22px] text-[#6b7280] max-w-2xl">
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

                <div class="flex flex-wrap gap-2 mb-8">
                    <button data-filter="all"
                        class="filter-btn active">
                        Все статьи</button>
                    <?php foreach ($categoriyes as $key): ?>
                        <button data-filter="<?php echo $key['category']; ?>"
                            class="filter-btn">
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
                                <article class="blog-card" data-category="<?php echo $article['category']; ?>"
                                    itemscope itemtype="https://schema.org/Article">
                                    <meta itemprop="inLanguage" content="ru-RU" />
                                    <div class="blog-card-grid">
                                        <div class="blog-card-img-wrap">
                                            <div class="blog-card-bg" style="background-image: url('<?php echo $article['image'] ?: 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=700&q=60'; ?>');"
                                                itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                                <meta itemprop="url"
                                                    content="<?php echo htmlspecialchars($article['image'] ?: 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?auto=format&fit=crop&w=700&q=60'); ?>">
                                            </div>
                                            <?php if (!empty($article['category'])): ?>
                                                <span class="blog-card-category"><?php echo $article['category']; ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="blog-card-body">
                                            <h2 class="blog-card-title" itemprop="headline">
                                                <?php echo htmlspecialchars($article['title']); ?>
                                            </h2>
                                            <p class="blog-card-text" itemprop="description">
                                                <?php echo htmlspecialchars(mb_substr($article['content'], 0, 150)) . '...'; ?>
                                            </p>
                                            <div class="blog-card-meta">
                                                <span class="blog-card-date"><time itemprop="datePublished"
                                                        datetime="<?php echo htmlspecialchars(date('c', strtotime($article['created_at']))); ?>"><?php echo date('d.m.Y', strtotime($article['created_at'])); ?></time></span>
                                                <a href="/blog/article/<?php echo $article['id']; ?>" class="blog-btn-more"
                                                    itemprop="url">Читать далее <i class="fa-solid fa-arrow-right"></i></a>
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

                    <aside class="lg:col-span-4 lg:sticky space-y-5">
                        <nav class="sidebar-card">
                            <div class="sidebar-card-header">Популярные материалы</div>
                            <div class="sidebar-card-body">
                                <?php if (empty($articles)): ?>
                                    <p class="text-[#7a7f8c] text-center py-4">Пока нет статей. Вернитесь позже!</p>
                                <?php else: ?>
                                    <?php foreach ($tops as $key => $value): ?>
                                        <a class="popular-item" href="<?php echo $value['link'] ?>">
                                            <span class="popular-item-num"><?php echo $key + 1; ?></span>
                                            <img class="popular-item-img" alt="<?php echo htmlspecialchars($value['title']); ?>"
                                                src="<?php echo $value['image']; ?>">
                                            <div class="popular-item-body">
                                                <div class="popular-item-title"><?php echo $value['title']; ?></div>
                                                <div class="popular-item-meta"><?php echo date('d.m.Y', strtotime($value['created_at'])); ?></div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <? endif; ?>
                            </div>
                        </nav>

                        <div class="sidebar-card">
                            <div class="sidebar-card-header">Наши услуги</div>
                            <div class="sidebar-card-body">
                                <div class="service-widget-item">
                                    <div class="service-widget-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                    <div>
                                        <div class="service-widget-title">Ремонт "под ключ"</div>
                                        <div class="service-widget-desc">Полный комплекс работ с гарантией 3 года</div>
                                    </div>
                                </div>
                                <div class="service-widget-item">
                                    <div class="service-widget-icon"><i class="fa-solid fa-pen-ruler"></i></div>
                                    <div>
                                        <div class="service-widget-title">Проектирование интерьера</div>
                                        <div class="service-widget-desc">Дизайн интерьера любой сложности</div>
                                    </div>
                                </div>
                                <div class="service-widget-item">
                                    <div class="service-widget-icon"><i class="fa-solid fa-layer-group"></i></div>
                                    <div>
                                        <div class="service-widget-title">Подбор материалов</div>
                                        <div class="service-widget-desc">Выбор и комплектация материалов</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <section class="py-10 reveal">
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
        <section class="py-14 md:py-20 reveal bg-gradient-to-b from-white to-[#f9fafb]">
            <div class="container text-center mx-auto px-4 max-w-6xl">
                <h3 class="text-[28px] md:text-[32px] font-extrabold text-[#1f2937] leading-tight" style="font-family:var(--font-heading)">
                    Хотите рассчитать стоимость ремонта в вашей квартире?
                </h3>
                <p class="mt-3 text-[17px] text-[#6b7280]">
                    Получите расчёт и бесплатную консультацию без обязательств.
                </p>

                <div class="mt-8">
                    <a href="#calculator"
                        class="inline-flex items-center justify-center h-[50px] px-10 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white text-[16px] font-bold shadow-lg shadow-orange-500/25 hover:shadow-xl hover:shadow-orange-500/30 hover:-translate-y-0.5 transition-all duration-300">
                        Рассчитать стоимость
                    </a>
                </div>

                <div class="mt-8 flex items-center justify-center gap-6 flex-wrap">
                    <div class="flex items-center gap-2.5 text-[14px] text-[#4b5563]">
                        <span class="w-6 h-6 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 text-[11px]"><i class="fa-solid fa-check"></i></span>
                        <span>Перезвоним через 15 минут</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-[14px] text-[#4b5563]">
                        <span class="w-6 h-6 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 text-[11px]"><i class="fa-solid fa-check"></i></span>
                        <span>Обсудим все пожелания</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-[14px] text-[#4b5563]">
                        <span class="w-6 h-6 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 text-[11px]"><i class="fa-solid fa-check"></i></span>
                        <span>Сориентируем по стоимости</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <style>
        .blog-card {
            border-radius: 16px;
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
            overflow: hidden;
        }
        .blog-card:hover {
            box-shadow: 0 4px 6px rgba(0,0,0,0.05), 0 12px 28px rgba(0,0,0,0.08);
            transform: translateY(-2px);
        }

        .blog-card-grid {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 190px;
        }
        @media (max-width: 767px) {
            .blog-card-grid {
                grid-template-columns: 1fr;
            }
        }

        .blog-card-img-wrap {
            position: relative;
            overflow: hidden;
            min-height: 190px;
            background: #f2f3f8;
        }
        .blog-card-img-wrap .blog-card-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s cubic-bezier(0.4,0,0.2,1);
        }
        .blog-card:hover .blog-card-img-wrap .blog-card-bg {
            transform: scale(1.05);
        }
        .blog-card-category {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            background: rgba(255,122,33,0.92);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            backdrop-filter: blur(4px);
            letter-spacing: 0.02em;
        }

        .blog-card-body {
            padding: 22px 24px 18px;
            display: flex;
            flex-direction: column;
        }
        .blog-card-title {
            font-size: 18px;
            line-height: 24px;
            font-weight: 800;
            color: #1f2937;
            font-family: var(--font-heading);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card-text {
            margin-top: 10px;
            font-size: 13.5px;
            line-height: 20px;
            color: #6b7280;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card-meta {
            margin-top: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 12px;
            color: #9ca3af;
            flex-wrap: wrap;
        }
        .blog-card-meta .blog-card-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .blog-card-meta .blog-card-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            background: #f3f4f6;
            color: #6b7280;
            font-size: 11px;
            font-weight: 600;
        }
        .blog-btn-more {
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            height: 32px;
            padding: 0 18px;
            border-radius: 8px;
            color: #fff;
            font-size: 12.5px;
            font-weight: 700;
            background: linear-gradient(135deg, #ff7a21, #c2410c);
            transition: all 0.2s ease;
            text-decoration: none;
            letter-spacing: 0.01em;
        }
        .blog-btn-more:hover {
            box-shadow: 0 4px 12px rgba(194,65,12,0.3);
            transform: translateY(-1px);
        }
        .blog-btn-more i {
            font-size: 10px;
            transition: transform 0.2s ease;
        }
        .blog-btn-more:hover i {
            transform: translateX(2px);
        }

        .filter-btn {
            height: 36px;
            padding: 0 18px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
            cursor: pointer;
            border: 1.5px solid #e5e7eb;
            background: #fff;
            color: #4b5563;
        }
        .filter-btn:hover {
            border-color: #c2410c;
            color: #c2410c;
            background: #fff7ed;
        }
        .filter-btn.active {
            background: #c2410c;
            color: #fff;
            border-color: #c2410c;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 38px;
            min-width: 38px;
            padding: 0 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
            background: #fff;
            border: 1.5px solid #e5e7eb;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .pagination-btn:hover {
            border-color: #c2410c;
            color: #c2410c;
        }
        .pagination-btn.active {
            background: #c2410c;
            color: #fff;
            border-color: #c2410c;
            box-shadow: 0 4px 12px rgba(194,65,12,0.25);
        }

        .sidebar-card {
            border-radius: 14px;
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
            overflow: hidden;
        }
        .sidebar-card-header {
            padding: 14px 18px;
            background: #f9fafb;
            border-bottom: 1px solid #f3f4f6;
            font-size: 15px;
            font-weight: 800;
            color: #1f2937;
            font-family: var(--font-heading);
        }
        .sidebar-card-body {
            padding: 14px 18px;
        }

        .popular-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.2s ease;
        }
        .popular-item:last-child {
            border-bottom: none;
        }
        .popular-item:hover {
            opacity: 0.8;
        }
        .popular-item-num {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 8px;
            background: linear-gradient(135deg, #ff7a21, #c2410c);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
        }
        .popular-item-img {
            width: 72px;
            height: 56px;
            min-width: 72px;
            border-radius: 8px;
            object-fit: cover;
            background: #f3f4f6;
        }
        .popular-item-body {
            flex: 1;
            min-width: 0;
        }
        .popular-item-title {
            font-size: 13px;
            font-weight: 700;
            color: #1f2937;
            line-height: 17px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .popular-item-meta {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .service-widget-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .service-widget-item:last-child {
            border-bottom: none;
        }
        .service-widget-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .service-widget-title {
            font-size: 13px;
            font-weight: 700;
            color: #1f2937;
        }
        .service-widget-desc {
            font-size: 12px;
            color: #6b7280;
            margin-top: 2px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-filter]').forEach(function (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    var filter = this.dataset.filter;

                    document.querySelectorAll('[data-filter]').forEach(function (b) {
                        b.classList.remove('active');
                    });
                    this.classList.add('active');

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

    <script src="/public/assets/scripts/components/reveal.min.js" defer></script>

</body>

</html>
