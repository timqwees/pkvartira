<?php
$site = Setting\Route\Function\Functions::site();

// Кэширование списка статей (ускорение повторных загрузок)
$cacheFile = __DIR__ . '/data/articles.cache';
$cacheTtl = 3600; // 1 час
$articlesJsonPath = __DIR__ . '/data/articles.json';

$__blogJson = [];
$cached = false;
if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTtl)
    && file_exists($articlesJsonPath)) {
    // Используем кэш, если он свежее, чем источник
    $__blogJson = json_decode((string) @file_get_contents($cacheFile), true) ?: [];
    $cached = $__blogJson !== [];
}
if (!$cached) {
    // Обновляем кэш из источника
    $__blogJson = json_decode((string) @file_get_contents($articlesJsonPath), true) ?: [];
    // Запись кэша не обязательна: на хостинге без прав на запись просто работаем без него
    if (@file_put_contents($cacheFile, json_encode($__blogJson)) === false) {
        @unlink($cacheFile);
    }
}

usort($__blogJson, fn($a, $b) => strtotime($b['created_at']) - strtotime($a['created_at']));

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Блог о ремонте квартир — полезные статьи, советы, цены 2026',
    'description' => 'Полезные статьи о ремонте квартир: пошаговые руководства, выбор материалов, дизайн интерьера, актуальные цены 2026. Советы экспертов с 10-летним опытом ремонта. От компании Проект Квартира (ПКвартира).',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/blogs',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Блог', 'url' => $site['baseUrl'] . '/blogs'],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
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
</head>
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
                $__blogJson = json_decode(file_get_contents(__DIR__ . '/data/articles.json'), true) ?: [];
                usort($__blogJson, fn($a, $b) => strtotime($b['created_at']) - strtotime($a['created_at']));

                $show_articles = 5;
                $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                if ($current_page < 1) $current_page = 1;
                $max_pages = ceil(count($__blogJson) / $show_articles);
                if ($current_page > $max_pages) $current_page = $max_pages;
                $offset = ($current_page - 1) * $show_articles;
                $articles = array_slice($__blogJson, $offset, $show_articles);

                $__seenCats = [];
                $categoriyes = [];
                foreach ($__blogJson as $__item) {
                    if (!empty($__item['category']) && !in_array($__item['category'], $__seenCats)) {
                        $__seenCats[] = $__item['category'];
                        $categoriyes[] = ['category' => $__item['category']];
                    }
                }

                $tops = array_slice($__blogJson, 0, 5);
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

        <section class="py-10">
            <div class="container mx-auto px-4 max-w-6xl">
                <h3 class="text-xl font-bold text-[#111827]">Наши услуги</h3>
                <nav class="mt-6">
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        <li class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#eff6ff] text-[#2563eb] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-[#111827] text-sm">Ремонт "под ключ"</div>
                                <div class="text-xs text-[#6b7280] mt-0.5">Полный комплекс работ с гарантией 5 лет</div>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#eff6ff] text-[#2563eb] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-[#111827] text-sm">Дизайн интерьера</div>
                                <div class="text-xs text-[#6b7280] mt-0.5">Любой сложности</div>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#eff6ff] text-[#2563eb] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-[#111827] text-sm">Подбор материалов</div>
                                <div class="text-xs text-[#6b7280] mt-0.5">Выбор и покупка материалов</div>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-[#eff6ff] text-[#2563eb] flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-[#111827] text-sm">Управление проектом</div>
                                <div class="text-xs text-[#6b7280] mt-0.5">Полный контроль объекта</div>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-6">
                        <a href="/services/pod-klyuch"
                            class="inline-flex items-center h-9 px-4 rounded-md bg-[#2563eb] text-white text-sm font-medium hover:bg-[#1d4ed8] transition-colors">
                            Все услуги компании
                            <i class="fa-solid fa-chevron-right ml-1.5 text-[10px]"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </section>
        <hr>
        <section class="py-16 bg-[#f9fafb] border-t border-[#e5e7eb]">
            <div class="container mx-auto px-4 max-w-6xl text-center">
                <h3 class="text-2xl md:text-3xl font-bold text-[#111827]">
                    Хотите рассчитать стоимость ремонта?
                </h3>
                <p class="mt-3 text-[#6b7280]">
                    Получите расчёт и бесплатную консультацию без обязательств.
                </p>

                <a href="#calculator"
                    class="mt-8 inline-flex items-center h-12 px-8 rounded-lg bg-[#f97316] text-white font-semibold hover:bg-[#ea580c] transition-colors">
                    Рассчитать стоимость
                </a>

                <div class="mt-8 flex items-center justify-center gap-6 flex-wrap text-sm text-[#4b5563]">
                    <span class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#fed7aa] flex items-center justify-center text-[#f97316] text-[10px]"><i class="fa-solid fa-check"></i></span>
                        Перезвоним через 15 минут
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#fed7aa] flex items-center justify-center text-[#f97316] text-[10px]"><i class="fa-solid fa-check"></i></span>
                        Обсудим все пожелания
                    </span>
                    <span class="flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#fed7aa] flex items-center justify-center text-[#f97316] text-[10px]"><i class="fa-solid fa-check"></i></span>
                        Сориентируем по стоимости
                    </span>
                </div>
            </div>
        </section>
    </main>

    <?php include_once './public/components/footer.php'; ?>

    <style>
        .blog-card {
            border-radius: 12px;
            background: #fff;
            border: 1px solid #e5e7eb;
            transition: box-shadow .2s;
            overflow: hidden;
        }
        .blog-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .blog-card-grid {
            display: grid;
            grid-template-columns: 260px 1fr;
            min-height: 180px;
        }
        @media (max-width: 767px) {
            .blog-card-grid {
                grid-template-columns: 1fr;
            }
        }

        .blog-card-img-wrap {
            position: relative;
            overflow: hidden;
            min-height: 180px;
            background: #f3f4f6;
        }
        .blog-card-img-wrap .blog-card-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transition: transform .3s;
        }
        .blog-card:hover .blog-card-img-wrap .blog-card-bg {
            transform: scale(1.04);
        }
        .blog-card-category {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 3px 10px;
            border-radius: 4px;
            background: #f97316;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
        }

        .blog-card-body {
            padding: 20px 22px 16px;
            display: flex;
            flex-direction: column;
        }
        .blog-card-title {
            font-size: 18px;
            line-height: 24px;
            font-weight: 700;
            color: #111827;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card-text {
            margin-top: 8px;
            font-size: 14px;
            line-height: 20px;
            color: #6b7280;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card-meta {
            margin-top: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #9ca3af;
        }
        .blog-btn-more {
            margin-left: auto;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            height: 30px;
            padding: 0 14px;
            border-radius: 6px;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            background: #f97316;
            text-decoration: none;
            transition: background .2s;
        }
        .blog-btn-more:hover {
            background: #ea580c;
        }
        .blog-btn-more i {
            font-size: 10px;
        }

        .filter-btn {
            height: 34px;
            padding: 0 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid #d1d5db;
            background: #fff;
            color: #374151;
            transition: background .15s, border-color .15s;
        }
        .filter-btn:hover {
            border-color: #9ca3af;
            background: #f9fafb;
        }
        .filter-btn.active {
            background: #f97316;
            color: #fff;
            border-color: #f97316;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            min-width: 36px;
            padding: 0 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            background: #fff;
            border: 1px solid #d1d5db;
            text-decoration: none;
            transition: background .15s;
        }
        .pagination-btn:hover {
            background: #f9fafb;
        }
        .pagination-btn.active {
            background: #f97316;
            color: #fff;
            border-color: #f97316;
        }

        .sidebar-card {
            border-radius: 12px;
            background: #fff;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }
        .sidebar-card-header {
            padding: 14px 18px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }
        .sidebar-card-body {
            padding: 12px 18px;
        }

        .popular-item {
            display: flex;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
            text-decoration: none;
        }
        .popular-item:last-child {
            border-bottom: none;
        }
        .popular-item-num {
            width: 24px;
            height: 24px;
            min-width: 24px;
            border-radius: 4px;
            background: #f97316;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
        }
        .popular-item-img {
            width: 72px;
            height: 52px;
            min-width: 72px;
            border-radius: 6px;
            object-fit: cover;
            background: #f3f4f6;
        }
        .popular-item-body {
            flex: 1;
            min-width: 0;
        }
        .popular-item-title {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
            line-height: 17px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .popular-item-meta {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
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
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }
        .service-widget-title {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }
        .service-widget-desc {
            font-size: 12px;
            color: #6b7280;
            margin-top: 1px;
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

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>
