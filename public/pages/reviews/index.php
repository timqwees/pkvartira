<?php
use Setting\Route\Function\Functions;
use Setting\route\function\ReviewsParser;
require_once dirname(__DIR__, 3) . '/setting/route/function/ReviewsParser.php';

$site = Functions::site();
$portfolio = (new Functions())->getPortfolio('public/assets/images/portfolio-photos/3room/standard');
$euroAbout = 'public/assets/images/portfolio-photos/cottage/2_euro_230sqm/about.json';
if (is_readable($euroAbout)) {
    $euro = json_decode((string) file_get_contents($euroAbout), true);
    if (is_array($euro)) {
        $portfolio[] = $euro;
    }
}

$reviewsParser = new ReviewsParser();
$reviews = $reviewsParser->getReviews();
shuffle($reviews);
$reviews = array_slice($reviews, 0, count($reviews));
$sourceCounts = $reviewsParser->getSourceCounts();
$totalReviews = count($reviews);
$sourceOrder = ['2GIS', 'Яндекс Карты', 'YouDo', 'Авито', 'Профи.ру'];
$orderedSources = [];
foreach ($sourceOrder as $s) {
    if (isset($sourceCounts[$s])) $orderedSources[$s] = $sourceCounts[$s];
}
foreach ($sourceCounts as $k => $v) {
    if (!isset($orderedSources[$k])) $orderedSources[$k] = $v;
}

function formatRuDate(string $iso): string {
    if ($iso === '') return '';
    $ts = strtotime($iso);
    if ($ts === false) return $iso;
    $months = [1=>'янв.',2=>'февр.',3=>'мар.',4=>'апр.',5=>'мая',6=>'июня',7=>'июля',8=>'авг.',9=>'сент.',10=>'окт.',11=>'нояб.',12=>'дек.'];
    $d = (int)date('j', $ts);
    $m = (int)date('n', $ts);
    $y = date('Y', $ts);
    return $d . ' ' . ($months[$m] ?? '') . ' ' . $y . ' г.';
}

function sourceIcon(string $source, string $size = '20'): string {
    $s = (int)$size;
    $map = [
        '2GIS' => '2gis.svg',
        'Яндекс Карты' => 'yandex-maps.svg',
        'YouDo' => 'youdo.svg',
        'Авито' => 'avito.svg',
        'Профи.ру' => 'profi.svg',
    ];
    if (isset($map[$source])) {
        $src = '/public/assets/images/icons/reviews/' . $map[$source];
        $extra = $source === 'YouDo' ? 'background:#fff;border-radius:4px;' : '';
        return '<img src="'.htmlspecialchars($src).'" width="'.$s.'" height="'.$s.'" alt="'.htmlspecialchars($source).'" loading="lazy" style="width:'.$s.'px;height:'.$s.'px;object-fit:contain;flex-shrink:0;'.$extra.'">';
    }
    return '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="10" cy="10" r="10" fill="#9CA3AF"/><text x="10" y="14" text-anchor="middle" fill="#fff" font-family="Arial,sans-serif" font-size="11" font-weight="bold">'.htmlspecialchars(mb_substr($source,0,1)).'</text></svg>';
}

$filterParam = $_GET['filter'] ?? 'all';
$validFilters = array_merge(['all'], array_keys($orderedSources));
if (!in_array($filterParam, $validFilters, true)) $filterParam = 'all';

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Отзывы — ' . $totalReviews . ' реальных отзывов, рейтинг 5.0',
    'description' => 'Все отзывы о Проект Квартира (ПКвартира): ' . $totalReviews . ' реальных отзывов с 2ГИС, Яндекс Карт, YouDo и Авито. Рейтинг 5.0. Фото объектов, ссылки на источники.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/reviews',
    'type' => 'website',
    'pageType' => 'CollectionPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Отзывы', 'url' => $site['baseUrl'] . '/reviews'],
    ],
    'schema' => [
        [
            '@type' => 'AggregateRating',
            'itemReviewed' => [
                '@type' => 'LocalBusiness',
                'name' => $site['name'],
            ],
            'ratingValue' => '5.0',
            'reviewCount' => (string)$totalReviews,
            'bestRating' => '5',
            'worstRating' => '1',
        ],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">

    <meta property="og:type" content="<?= htmlspecialchars($seo['og']['type']); ?>">
    <meta property="og:title" content="<?= htmlspecialchars($seo['og']['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['og']['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['og']['url']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="<?= htmlspecialchars($seo['og']['locale']); ?>">

    <meta name="twitter:card" content="<?= htmlspecialchars($seo['twitter']['card']); ?>">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <script type="application/ld+json">
    <?= $seo['jsonLd']; ?>
    </script>

    <?php include_once './public/components/head-includes.php'; ?>
    <style>
        .reviews-filter-pill{display:inline-flex;align-items:center;gap:6px;padding:8px 18px;border-radius:9999px;font-size:14px;font-weight:600;border:1.5px solid #e5e7eb;background:#fff;color:#374151;transition:all .2s;cursor:pointer;white-space:nowrap}
        .reviews-filter-pill:hover{border-color:#d1d5db;background:#f9fafb;transform:translateY(-1px)}
        .reviews-filter-pill.active{background:#0f172a;color:#fff;border-color:#0f172a;box-shadow:0 2px 8px rgba(15,23,42,.2)}
        #reviewDropdown{opacity:0;transform:scale(.95) translateY(-8px);pointer-events:none;transition:opacity .25s ease,transform .25s cubic-bezier(.4,0,.2,1)}
        #reviewDropdown.dropdown-open{opacity:1!important;transform:scale(1) translateY(0)!important;pointer-events:auto!important}
        .review-card{background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:24px;display:flex;flex-direction:column;gap:16px;transition:all .3s cubic-bezier(.4,0,.2,1)}
        .review-card:hover{border-color:#d1d5db;box-shadow:0 4px 6px rgba(0,0,0,.05),0 12px 28px rgba(0,0,0,.08);transform:translateY(-2px)}
        .review-text{font-size:15px;line-height:1.6;color:#374151;display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden;transition:all .3s}
        .review-card.expanded .review-text{-webkit-line-clamp:unset}
        .review-source-link{font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:#9ca3af}
        .review-source-link a{color:#f97316;text-decoration:none;transition:color .15s}
        .review-source-link a:hover{color:#ea580c;text-decoration:underline}
        .review-date{font-size:13px;color:#9ca3af}
        .review-name{font-size:16px;font-weight:700;color:#111827;line-height:1.3}
        ._yqcu8m{-webkit-box-align:center;-webkit-box-pack:center;font-size:14px;line-height:16px;font-weight:700;letter-spacing:-.5px;border-radius:50%;display:flex;justify-content:center;align-items:center;width:100%;height:100%;color:#fff;overflow:hidden}
        .avatar-wrap{width:44px;height:44px;border-radius:9999px;overflow:hidden;flex-shrink:0;background:#f3f4f6;display:flex;align-items:center;justify-content:center}
        .avatar-wrap img{width:100%;height:100%;object-fit:cover}
        .mobile-review-bar{position:fixed;left:16px;right:16px;bottom:16px;z-index:40;background:rgba(249,115,22,.96);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-radius:16px;padding:12px 18px;display:flex;align-items:center;justify-content:space-between;gap:12px;box-shadow:0 8px 24px rgba(249,115,22,.30);border:1px solid rgba(255,255,255,.2)}
        .mobile-review-bar span{color:#fff;font-size:14px;font-weight:600}
        @media(min-width:768px){.mobile-review-bar{display:none}}
        .filter-scroll{scrollbar-width:none;-ms-overflow-style:none}
        .filter-scroll::-webkit-scrollbar{display:none}
        .show-more-btn{padding:12px 32px;border-radius:9999px;font-size:15px;font-weight:600;border:1.5px solid #e5e7eb;background:#fff;color:#374151;transition:all .2s;cursor:pointer}
        .show-more-btn:hover{border-color:#f97316;color:#f97316;transform:translateY(-1px);box-shadow:0 4px 12px rgba(249,115,22,.15)}
        .stat-badge{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:12px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);color:#fff;font-size:14px;font-weight:600;backdrop-filter:blur(8px)}
        .stat-badge i{color:#fbbf24}
        .text-yellow-500{color:#eab308}
        .review-card.hidden{display:none!important}
        @keyframes reviewsFadeIn{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
        #reviewsGrid .review-card:not(.hidden){animation:reviewsFadeIn .45s ease both}
        #reviewsGrid{column-count:1;column-gap:20px}
        #reviewsGrid .review-card{break-inside:avoid;margin-bottom:20px;width:100%}
        @media(min-width:768px){#reviewsGrid{column-count:2;column-gap:24px}#reviewsGrid .review-card{margin-bottom:24px}}
        @media(min-width:1024px){#reviewsGrid{column-count:3}}
    </style>
</head>

<body class="bg-[#fafbfc]">

    <?php include_once './public/components/header.php'; ?>

    <main>
        <!-- Reviews section -->
        <section id="reviews" class="pt-24 pb-16 md:pt-28 md:pb-24">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">

                    <!-- Heading -->
                    <div class="flex items-center justify-between gap-4 mb-8 md:mb-10">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">Отзывы клиентов</h1>
                            <p class="text-sm text-gray-500 mt-1"><?= $totalReviews ?> реальных отзывов · рейтинг 5.0</p>
                        </div>
                        <div class="flex-shrink-0 relative" id="reviewBtnWrap">
                            <button id="reviewBtn" type="button" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white text-sm font-semibold px-5 py-2.5 rounded-lg shadow-md shadow-orange-500/25 transition-all duration-200 hover:shadow-orange-500/40">
                                <i class="fas fa-pen text-xs"></i> Написать отзыв
                            </button>
                            <div id="reviewDropdown" class="hidden absolute right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50" style="min-width:380px">
                                <div class="px-4 pb-2 pt-2 text-xs tracking-wider font-bold text-gray-400 uppercase">Выберите площадку</div>
                                <a href="https://2gis.ru/moscow/firm/70000001114907613/tab/reviews" target="_blank" rel="noopener" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition text-sm text-gray-700"><?= sourceIcon('2GIS', '28') ?> 2ГИС <span class="ml-auto text-xs text-gray-400">17 отзывов</span></a>
                                <a href="https://yandex.ru/profile/90420725359" target="_blank" rel="noopener" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition text-sm text-gray-700"><?= sourceIcon('Яндекс Карты', '28') ?> Яндекс Карты <span class="ml-auto text-xs text-gray-400">4 отзыва</span></a>
                                <a href="https://www.avito.ru/brands/d903aeeb161754cab1f9b4e77a072e60" target="_blank" rel="noopener" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition text-sm text-gray-700"><?= sourceIcon('Авито', '28') ?> Авито <span class="ml-auto text-xs text-gray-400">2 отзыва</span></a>
                                <a href="https://youdo.com/u14181521" target="_blank" rel="noopener" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition text-sm text-gray-700"><?= sourceIcon('YouDo', '28') ?> YouDo <span class="ml-auto text-xs text-gray-400">3 отзыва</span></a>
                                <a href="https://profi.ru/profile/SuchkovNO2/" target="_blank" rel="noopener" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition text-sm text-gray-700"><?= sourceIcon('Профи.ру', '28') ?> Профи.ру</a>
                            </div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="mb-8 md:mb-10">
                        <div class="flex items-center gap-3 overflow-x-auto filter-scroll" style="padding-bottom:8px">
                            <button type="button" data-filter="all" class="reviews-filter-pill<?= $filterParam === 'all' ? ' active' : '' ?>">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" fill="currentColor" opacity=".6"/><rect x="9" y="1" width="6" height="6" rx="1.5" fill="currentColor" opacity=".6"/><rect x="1" y="9" width="6" height="6" rx="1.5" fill="currentColor" opacity=".6"/><rect x="9" y="9" width="6" height="6" rx="1.5" fill="currentColor" opacity=".6"/></svg>
                                Все <span class="opacity-60 ml-0.5"><?= $totalReviews ?></span>
                            </button>
                            <?php foreach ($orderedSources as $src => $cnt): ?>
                                <button type="button" data-filter="<?= htmlspecialchars($src) ?>" class="reviews-filter-pill<?= $filterParam === $src ? ' active' : '' ?>">
                                    <?= sourceIcon($src, '16') ?> <?= htmlspecialchars($src) ?> <span class="opacity-60 ml-0.5"><?= $cnt ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Grid -->
                    <div id="reviewsGrid">
                        <?php foreach ($reviews as $idx => $r): ?>
                            <?php
                                $avatar = (string)($r['avatar'] ?? '');
                                $isHtmlAvatar = str_starts_with(trim($avatar), '<div');
                                $date = formatRuDate((string)($r['date'] ?? ''));
                                $source = (string)($r['source'] ?? '');
                                $sourceUrl = (string)($r['source_url'] ?? '');
                                $rating = (int)($r['rating'] ?? 5);
                                $photos = is_array($r['photos'] ?? null) ? $r['photos'] : [];
                            ?>
                            <article class="review-card" data-source="<?= htmlspecialchars($source) ?>" data-index="<?= $idx ?>">
                                <div class="flex items-start gap-4">
                                    <div class="avatar-wrap">
                                        <?php if ($isHtmlAvatar): ?>
                                            <?= $avatar ?>
                                        <?php elseif ($avatar !== ''): ?>
                                            <img src="<?= htmlspecialchars($avatar) ?>" alt="<?= htmlspecialchars($r['name']) ?>" loading="lazy">
                                        <?php else: ?>
                                            <span class="text-[14px] font-bold text-gray-500"><?= htmlspecialchars(mb_substr($r['name'],0,2)) ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="review-name truncate"><?= htmlspecialchars($r['name']) ?></div>
                                        <div class="flex items-center gap-2 mt-1">
                                            <div class="flex gap-0.5">
                                                <?php for ($i=0;$i<5;$i++): ?>
                                                    <i class="fas fa-star <?= $i < $rating ? 'text-yellow-500' : 'text-gray-200' ?> text-[12px]"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <span class="review-date"><?= htmlspecialchars($date) ?></span>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <?= sourceIcon($source, '28') ?>
                                    </div>
                                </div>

                                <div class="review-text"><?= nl2br(htmlspecialchars($r['text'])) ?></div>

                                <?php if (!empty($photos)): ?>
                                    <div class="flex gap-2 overflow-x-auto -mx-1 px-1">
                                        <?php foreach ($photos as $ph): ?>
                                            <a href="<?= htmlspecialchars($ph) ?>" target="_blank" rel="noopener" class="flex-shrink-0 w-[80px] h-[80px] rounded-xl overflow-hidden bg-gray-50 border border-gray-100 hover:shadow-md transition-all duration-200 hover:scale-105">
                                                <img src="<?= htmlspecialchars($ph) ?>?w=320" alt="Фото к отзыву" class="w-full h-full object-cover" loading="lazy">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="flex items-center justify-between pt-1">
                                    <span class="review-source-link"><a href="<?= htmlspecialchars($sourceUrl) ?>" target="_blank" rel="noopener">в <?= htmlspecialchars($source) ?> <i class="fas fa-external-link-alt text-[9px] ml-0.5"></i></a></span>
                                    <button type="button" class="text-[13px] font-medium text-gray-400 hover:text-gray-700 transition more-btn hidden">Показать полностью</button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="flex justify-center mt-10 md:mt-12">
                        <button id="showMoreBtn" type="button" class="show-more-btn hidden">
                            <i class="fas fa-plus text-[12px] mr-1.5"></i> Показать ещё <span id="remainingCount" class="ml-1 text-gray-400"></span>
                        </button>
                        <p id="noResults" class="hidden text-[15px] text-gray-500 py-10">Нет отзывов по этому фильтру</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio section -->
        <section class="pb-16" style="padding-top:64px">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Реальные объекты наших клиентов</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto">
                        <?php foreach ($portfolio as $value): ?>
                            <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope itemtype="https://schema.org/CreativeWork">
                                <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                                <div class="relative h-52">
                                    <div class="swiper swiper-type-one w-full h-full">
                                        <div class="swiper-wrapper">
                                            <?php foreach ((new Functions())->getPhotos($value['текущая_папка']) as $img): ?>
                                                <div class="swiper-slide">
                                                    <img decoding="async" loading="lazy" src="<?= htmlspecialchars($site['baseUrl'] . '/' . $value['текущая_папка'] . '/' . $img) ?>" class="w-full h-full object-cover" width="640" height="360" alt="<?= htmlspecialchars($value['заголовок']) ?>" title="<?= htmlspecialchars($value['заголовок']) ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 z-20 p-4 bg-gradient-to-t from-black/70 to-transparent">
                                        <div class="text-[12px] text-white/80 font-medium uppercase tracking-wide">Косметический</div>
                                        <div class="mt-1 text-[15px] font-bold text-white"><?= htmlspecialchars($value['заголовок']) ?></div>
                                        <div class="flex gap-3 items-center mt-1.5 text-[13px] text-white/90"><span>Срок: <?= htmlspecialchars($value['срок']) ?></span> <span class="text-white/40">·</span> <span><?= htmlspecialchars($value['цена']) ?></span></div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA section — premium -->
        <section class="py-16 md:py-24 relative overflow-hidden" style="background:#0f172a">
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full blur-3xl" style="background:rgba(249,115,22,.18)"></div>
                <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full blur-3xl" style="background:rgba(59,130,246,.15)"></div>
                <div class="absolute inset-0" style="opacity:0.03;background-image:radial-gradient(circle at 1px 1px, #fff 1px, transparent 0);background-size:32px 32px"></div>
            </div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase border mb-6" style="background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.10);color:#fb923c">
                            <span class="rounded-full bg-orange-500" style="width:8px;height:8px;box-shadow:0 0 0 6px rgba(249,115,22,.15)"></span>
                            Бесплатный выезд сметчика сегодня
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold tracking-tight leading-tight mb-4" style="color:#fff">
                            Рассчитайте<br>
                            <span style="color:#fb923c">стоимость ремонта</span><br>
                            за 5 минут
                        </h2>
                        <p class="text-base md:text-lg leading-relaxed mb-8" style="color:rgba(255,255,255,.65)">Оставьте номер — перезвоним, уточним детали и назовём точную цену без скрытых доплат. Фиксация в договоре.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8">
                            <div class="flex items-center gap-3 rounded-2xl px-4 py-3" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08)">
                                <span class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(249,115,22,.15)"><i class="fas fa-check text-orange-400 text-sm"></i></span>
                                <span class="text-sm font-semibold" style="color:#fff">Точная смета без доплат</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl px-4 py-3" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08)">
                                <span class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(249,115,22,.15)"><i class="fas fa-file-contract text-orange-400 text-sm"></i></span>
                                <span class="text-sm font-semibold" style="color:#fff">Фиксация цены в договоре</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl px-4 py-3" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08)">
                                <span class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(249,115,22,.15)"><i class="fas fa-shield-alt text-orange-400 text-sm"></i></span>
                                <span class="text-sm font-semibold" style="color:#fff">Гарантия 3 года</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl px-4 py-3" style="background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08)">
                                <span class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(249,115,22,.15)"><i class="fas fa-clock text-orange-400 text-sm"></i></span>
                                <span class="text-sm font-semibold" style="color:#fff">Ответ за 5 минут</span>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="tel:+74954731737" class="inline-flex items-center gap-2 px-5 py-3 rounded-full font-bold text-sm" style="background:#fff;color:#0f172a">
                                <i class="fas fa-phone text-xs"></i> +7 495 473-17-37
                            </a>
                            <span class="text-xs" style="color:rgba(255,255,255,.45)">или напишите в <a href="https://t.me/pkvartira" target="_blank" rel="noopener" class="underline hover:text-white" style="color:rgba(255,255,255,.65)">Telegram</a> / <a href="https://wa.me/74951234567" target="_blank" rel="noopener" class="underline hover:text-white" style="color:rgba(255,255,255,.65)">WhatsApp</a></span>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-6">
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold border" style="background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.08);color:rgba(255,255,255,.75)"><i class="fas fa-award text-yellow-400 text-xs"></i> 10 лет на рынке</span>
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold border" style="background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.08);color:rgba(255,255,255,.75)"><i class="fas fa-star text-yellow-400 text-xs"></i> 5.0 · 25 отзывов</span>
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold border" style="background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.08);color:rgba(255,255,255,.75)">400+ объектов</span>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-3 rounded-2xl blur-3xl opacity-40 pointer-events-none" style="background:linear-gradient(135deg, rgba(249,115,22,.25), rgba(59,130,246,.20))"></div>
                        <div class="relative">
                            <?php include_once './public/components/cta-form.php'; ?>
                        </div>
                        <p class="text-center text-xs mt-3" style="color:rgba(255,255,255,.35)">Нажимая, вы соглашаетесь с обработкой персональных данных</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Mobile glass bar -->
    <div class="mobile-review-bar md:hidden" id="mobileBar">
        <span>Оставьте отзыв</span>
        <button id="mobileReviewBtn" type="button" class="bg-white text-orange-600 text-[14px] font-semibold px-5 py-2.5 rounded-full">Написать</button>
    </div>
    <div id="mobileDropdown" class="hidden fixed inset-0 z-50">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" id="mobileOverlay"></div>
        <div class="absolute left-4 right-4 bottom-[80px] bg-white rounded-2xl shadow-2xl border border-gray-100 py-2">
            <div class="px-5 py-2.5 text-[11px] font-bold tracking-wider text-gray-400 uppercase">Где оставить отзыв?</div>
            <a href="https://2gis.ru/moscow/firm/70000001114907613/tab/reviews" target="_blank" rel="noopener" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-[15px] text-gray-700"><?= sourceIcon('2GIS', '32') ?> 2ГИС</a>
            <a href="https://yandex.ru/profile/90420725359" target="_blank" rel="noopener" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-[15px] text-gray-700"><?= sourceIcon('Яндекс Карты', '32') ?> Яндекс Карты</a>
            <a href="https://www.avito.ru/brands/d903aeeb161754cab1f9b4e77a072e60" target="_blank" rel="noopener" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-[15px] text-gray-700"><?= sourceIcon('Авито', '32') ?> Авито</a>
            <a href="https://youdo.com/u14181521" target="_blank" rel="noopener" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-50 text-[15px] text-gray-700"><?= sourceIcon('YouDo', '32') ?> YouDo</a>
        </div>
    </div>

    <?php include_once './public/components/footer.php'; ?>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const grid = document.getElementById('reviewsGrid');
        if (!grid) return;
        const cards = [...grid.querySelectorAll('.review-card')];
        const pills = [...document.querySelectorAll('.reviews-filter-pill')];
        const moreBtn = document.getElementById('showMoreBtn');
        const remEl = document.getElementById('remainingCount');
        const empty = document.getElementById('noResults');
        let active = <?= json_encode($filterParam, JSON_UNESCAPED_UNICODE) ?>;
        let shown = 9; const PAGE = 9;
        const getFiltered = () => active === 'all' ? cards : cards.filter(c => c.dataset.source === active);
        function render() {
            const list = getFiltered();
            cards.forEach(c => c.classList.add('hidden'));
            list.slice(0, shown).forEach(c => c.classList.remove('hidden'));
            requestAnimationFrame(() => {
                list.slice(0, shown).forEach(c => {
                    const t = c.querySelector('.review-text'), b = c.querySelector('.more-btn');
                    if (!t || !b) return;
                    b.classList.toggle('hidden', t.scrollHeight <= t.clientHeight + 4);
                });
            });
            const rest = list.length - shown;
            if (rest > 0) { moreBtn.classList.remove('hidden'); remEl.textContent = '· ещё ' + rest; empty.classList.add('hidden'); }
            else { moreBtn.classList.add('hidden'); empty.classList.toggle('hidden', list.length !== 0); }
        }
        pills.forEach(p => p.addEventListener('click', () => {
            pills.forEach(x => x.classList.remove('active')); p.classList.add('active');
            active = p.dataset.filter; shown = PAGE;
            const u = new URL(location.href);
            if (active === 'all') u.searchParams.delete('filter'); else u.searchParams.set('filter', active);
            history.replaceState(null, '', u);
            render();
        }));
        moreBtn?.addEventListener('click', () => { shown += PAGE; render(); });
        grid.addEventListener('click', e => {
            if (!e.target.classList.contains('more-btn')) return;
            const card = e.target.closest('.review-card');
            card.classList.toggle('expanded');
            e.target.textContent = card.classList.contains('expanded') ? 'Свернуть' : 'Показать полностью';
        });
        render();
    });
    document.addEventListener('DOMContentLoaded', () => {
        const w = document.getElementById('reviewBtnWrap'), d = document.getElementById('reviewDropdown'), b = document.getElementById('reviewBtn');
        if (!w || !d || !b) return;
        const open = () => { d.classList.remove('hidden'); d.offsetHeight; d.classList.add('dropdown-open'); };
        const close = () => { d.classList.remove('dropdown-open'); d.addEventListener('transitionend', function h(){ d.removeEventListener('transitionend', h); if(!d.classList.contains('dropdown-open')) d.classList.add('hidden'); }); };
        b.addEventListener('click', e => { e.stopPropagation(); d.classList.contains('hidden') ? open() : close(); });
        document.addEventListener('click', e => { if(!w.contains(e.target) && !d.classList.contains('hidden')) close(); });
        document.getElementById('mobileReviewBtn')?.addEventListener('click', () => document.getElementById('mobileDropdown')?.classList.remove('hidden'));
        document.getElementById('mobileOverlay')?.addEventListener('click', () => document.getElementById('mobileDropdown')?.classList.add('hidden'));
    });
    </script>
</body>

</html>
