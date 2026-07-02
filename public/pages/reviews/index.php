<?php
use Setting\Route\Function\Functions;
$site = Functions::site();
$portfolio = (new Functions())->getPortfolio('public/assets/images/portfolio-photos/3room/standard');
$euroAbout = 'public/assets/images/portfolio-photos/cottage/2_euro_230sqm/about.json';
if (is_readable($euroAbout)) {
    $euro = json_decode((string) file_get_contents($euroAbout), true);
    if (is_array($euro)) {
        $portfolio[] = $euro;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Отзывы о ремонте квартир — рейтинг 5.0, реальные клиенты | ПКвартира</title>
    <meta name="description"
        content="Реальные отзывы клиентов о ремонте квартир в ПКвартира. Рейтинг 5.0 на Яндекс Картах, 90+ отзывов с фото. Видеоотзывы с объективным мнением.">
    <meta name="keywords" content="отзывы, отзывы о ремонте, рейтинг ремонт, мнения клиентов">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/reviews'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Отзывы клиентов — реальные мнения | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta property="og:description"
        content="Отзывы клиентов о ремонте квартир. Рейтинг 5.0/5, реальные фото и видео отзывы.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/reviews'); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Отзывы клиентов — реальные мнения | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Отзывы клиентов о ремонте квартир. Рейтинг 5.0/5, реальные фото и видео отзывы.">
    <meta name="twitter:image" content="<?= htmlspecialchars($site['shareImageUrl']); ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain"
        content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)); ?>">

    <!-- Дополнительные мета-теги -->


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
        "inLanguage": "ru-RU"
      },
      {
        "@type": "WebPage",
        "@id": <?= json_encode($site['baseUrl'] . '/reviews/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'] . '/reviews', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": "Отзывы клиентов — <?= htmlspecialchars($site['name']); ?>",
        "description": "Отзывы клиентов о ремонте квартир и домов под ключ от <?= htmlspecialchars($site['name']); ?>. Реальные мнения и оценки.",
        "isPartOf": {
          "@id": <?= json_encode($site['baseUrl'] . '#website', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "about": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "inLanguage": "ru-RU"
      },
      {
        "@type": "AggregateRating",
        "@id": <?= json_encode($site['baseUrl'] . '/reviews/#rating', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "itemReviewed": {
          "@id": <?= json_encode($site['baseUrl'] . '#organization', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
        },
        "ratingValue": "<?= htmlspecialchars(number_format((float) (empty($averageRating) ? 4.8 : $averageRating), 1, '.', '')); ?>",
        "reviewCount": "<?= empty($reviewCount) ? 156 : (int) $reviewCount; ?>",
        "bestRating": "5"
      },
      {
        "@type": "BreadcrumbList",
        "@id": <?= json_encode($site['baseUrl'] . '/reviews/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
            "name": "Отзывы",
            "item": <?= json_encode($site['baseUrl'] . '/reviews', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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
    <main class="pt-20 flex flex-col gap-6">

        <section id="reviews" class="py-16 bg-white reveal">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Что говорят о нас те, кто уже переехал в новую квартиру
                    </h1>
                    <!-- <p class="text-xl text-gray-600">
                        Что говорят о нас наши клиенты
                    </p> -->
                </div>

                <!-- <review-lab data-widgetid="69d6a3731ab6330a0b879de7"></review-lab>
                <script src="https://app.reviewlab.ru/widget/index-es2015.js" defer></script> -->

                <!-- Ручные отзывы -->
                <div class="max-w-6xl mx-auto">
                    <p class="text-sm text-gray-500 mb-6">170+ проверенных отзывов</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Отзыв 1 -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-blue-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/01.jpeg"
                                        alt="Александр В." title="Александр В." class="w-full h-full object-cover">
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
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-pink-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/02.jpeg" alt="Анатолий"
                                        title="Анатолий" class="w-full h-full object-cover">
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
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/03.jpeg" alt="Дмитрий"
                                        title="Дмитрий" class="w-full h-full object-cover">
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
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-green-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/04.jpeg"
                                        alt="Елена" title="Елена" class="w-full h-full object-cover">
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
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-orange-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/05.jpeg"
                                        alt="Оля" title="Оля" class="w-full h-full object-cover">
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
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-purple-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/06.jpeg"
                                        alt="Ольга Николаевна" title="Ольга Николаевна" class="w-full h-full object-cover">
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

                    <div class="hidden-review grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4"
                        style="display: none;">
                        <!-- Дополнительные отзывы (изначально скрыты) -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-red-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/023.jpeg"
                                        alt="Иван Петров" title="Иван Петров" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Иван Петров</p>
                                    <p class="text-xs text-gray-500">30 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Трехкомнатная квартира 85 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Делали полный ремонт под ключ в семейной квартире. Очень понравился подход к
                                деталям — инженер сам предложил несколько вариантов планировки. Все коммуникации
                                заменили, теперь у нас умный дом. Рекомендую!».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-indigo-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/027.jpg"
                                        alt="Анна Смирнова" title="Анна Смирнова" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Анна Смирнова</p>
                                    <p class="text-xs text-gray-500">28 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Двухкомнатная квартира 58 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Искала исполнителя долго, сравнивала 5 компаний. Выбрала этих и не пожалела. Цена
                                была не самая низкая, но качество оправдало каждый рубль. Особенно порадовал
                                дизайнер — помог подобрать цвета».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-yellow-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/028.jpg"
                                        alt="Михаил Козлов" title="Михаил Козлов" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Михаил Козлов</p>
                                    <p class="text-xs text-gray-500">25 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Черновой ремонт 42 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Сделали черновой ремонт в новостройке. Все коммуникации проложили ровно, стены
                                выровняли идеально. Приемка у застройщика прошла без проблем. Спасибо за
                                профессионализм!».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Анна С. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-blue-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/07.jpeg" alt="Анна С."
                                        title="Анна С." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Анна С.</p>
                                    <p class="text-xs text-gray-500">30 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Капитальный ремонт 60 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Очень переживала, что не уложатся в три месяца — квартира съёмная, каждый день
                                простоя в копеечку. Ребята закончили на четыре дня раньше срока. Прораб вёл проект
                                как часы: каждое утро отчёт, вечером — что сделано. Ни одного скрытого платежа, всё
                                по смете».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Михаил Р. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-green-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/08.jpeg"
                                        alt="Мария Р." title="Мария Р." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Мария Р.</p>
                                    <p class="text-xs text-gray-500">19 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">ЖК «Селигер Сити» 72 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Брал ремонт под ключ с черновой отделки. До этого общался с пятью бригадами — везде
                                либо мутная цена, либо "потом досчитаем". У Проект Квартира сразу прислали детальную
                                смету на 38 страницах. По факту вышло даже на 12 тысяч меньше, потому что не
                                понадобилась часть штукатурки. Честность подкупает».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Татьяна и Павел -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-purple-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/09.jpeg"
                                        alt="Павел" title="Павел" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Павел</p>
                                    <p class="text-xs text-gray-500">4 мар. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Дизайнерский ремонт 95 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Делали ремонт по проекту нашего дизайнера — сложная геометрия потолков, скрытый
                                плинтус, бесшовная стяжка. Бригада вникала в каждый узел, не было фразы "так не
                                делается". Когда возник вопрос по тёплому полу, инженер сам связался с дизайнером и
                                предложил решение. Профессионалы».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Игорь В. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-orange-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/010.jpeg"
                                        alt="Игорь В." title="Игорь В." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Игорь В.</p>
                                    <p class="text-xs text-gray-500">27 февр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Студия 28 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Маленькая студия — отдельная боль, не каждая бригада берётся. Тут согласились без
                                вопросов, ещё и подсказали, как визуально расширить пространство за счёт ниш. Цена
                                адекватная, никаких накруток за "сложность". Сдали за 6 недель».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Виктория К. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-pink-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/011.jpeg"
                                        alt="Виктория К." title="Виктория К." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Виктория К.</p>
                                    <p class="text-xs text-gray-500">8 февр. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Вторичка, хрущёвка 45 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Дому 60 лет, проводка алюминиевая, трубы в плачевном состоянии. Заменили всё под
                                ноль, сделали перепланировку с согласованием. Снизила полбалла за то, что были
                                задержки с поставкой плитки от поставщика — но ребята тут не виноваты, честно
                                предупреждали. В целом очень довольна».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Андрей П. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-indigo-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/012.jpeg"
                                        alt="Александра П." title="Александра П." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Александра П.</p>
                                    <p class="text-xs text-gray-500">21 янв. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">ЖК «Прайм Парк» 88 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Заехал в новостройку с черновой. Сравнивал с двумя другими подрядчиками — разница в
                                смете около 200 тысяч в пользу Проект Квартира при том же объёме работ. Сначала
                                насторожило, но качество оказалось на уровне. Стяжка идеально ровная, обои встык,
                                плитка без перепадов».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Наталья Д. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-red-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/013.jpeg"
                                        alt="Игорь Д." title="Игорь Д." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Игорь Д.</p>
                                    <p class="text-xs text-gray-500">11 янв. 2026 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Косметический ремонт 38 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Сдавала квартиру в аренду, нужно было быстро привести в порядок перед новыми
                                жильцами. Покрасили стены, перетянули двери, обновили сантехнику. Уложились в 9
                                дней. Жильцы заехали вовремя, я не потеряла месяц аренды. Спасибо за оперативность».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Кирилл и Ольга -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-teal-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/014.jpeg"
                                        alt="Кирилл Е." title="Кирилл Е." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Кирилл Е.</p>
                                    <p class="text-xs text-gray-500">17 дек. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Двухкомнатная 65 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Ждали второго ребёнка, нужно было успеть до родов. Сроки горели. Бригада работала в
                                две смены последние две недели, чтобы мы успели въехать. Никакого хаоса, никаких
                                "извините, не успеваем". Жена была беременна — относились к ней максимально бережно,
                                даже пыль выносили аккуратно, чтобы подъезд не пачкать».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Светлана М. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-cyan-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/015.jpg"
                                        alt="Светлана М." title="Сергей М." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Сергей М.</p>
                                    <p class="text-xs text-gray-500">29 нояб. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Ремонт под ключ 42 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Живу одна, в стройке не разбираюсь от слова совсем. Боялась, что разведут. Со мной
                                работал инженер — объяснял каждый этап на пальцах, присылал фото каждый день. Когда
                                нужно было выбирать материалы, дал ссылки на проверенные магазины со скидками. Ни
                                разу не возникло ощущения, что меня дурят».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Роман Г. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-lime-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/016.jpg"
                                        alt="Роман Г." title="Роман Г." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Роман Г.</p>
                                    <p class="text-xs text-gray-500">8 нояб. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Новостройка 55 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Это мой первый ремонт в жизни. Думал, будет нервотрёпка на полгода. По факту —
                                сдали за 2,5 месяца, я почти не приезжал, всё контролировалось онлайн. Когда нашёл
                                небольшой дефект на ламинате после приёмки — приехали через два дня и переложили
                                доску бесплатно. Гарантия работает».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Юлия Ф. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-amber-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/017.jpg" alt="Юлия Ф."
                                        title="Юлия Ф." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Юлия Ф.</p>
                                    <p class="text-xs text-gray-500">16 окт. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Перепланировка 70 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Сносили несущую перегородку с согласованием в МосЖилИнспекции. Ребята взяли на себя
                                всю бумажную волокиту — мне оставалось только подписать документы. Конструкторский
                                расчёт, разрешение, монтаж усиления — всё под ключ. Без них я бы запуталась в
                                инстанциях на полгода».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Денис К. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-emerald-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/018.jpg"
                                        alt="Денис К." title="Аля К." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Аля К.</p>
                                    <p class="text-xs text-gray-500">2 окт. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">ЖК «Символ» 80 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Сравнивал три компании. У двух других смета была "от" — то есть фактически без
                                потолка. Проект Квартира сделал фиксированную смету с пунктом про материалы. По
                                итогу вышли в смету копейка в копейку. Это редкость на рынке, поверьте».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Екатерина Б. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-violet-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/019.jpeg"
                                        alt="Екатерина Б." title="Екатерина Б." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Екатерина Б.</p>
                                    <p class="text-xs text-gray-500">11 сент. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star-half-alt text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Сталинка 90 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Дом старый, на Чистых прудах. Согласовали реставрацию лепнины, сохранили родной
                                паркет — отшлифовали, покрыли маслом. Из минусов: пару раз были недопонимания с
                                прорабом по графику, но решили. Финальный результат стоит того. Полбалла за
                                коммуникацию на старте».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Артём Л. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-fuchsia-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/020.jpeg"
                                        alt="Артём Л." title="Артём Л." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Артём Л.</p>
                                    <p class="text-xs text-gray-500">23 авг. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Студия 32 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Купил студию под сдачу. Нужно было сделать максимально просто, дёшево и быстро. Не
                                уговаривали на дорогие материалы, наоборот — подсказали, где можно сэкономить без
                                потери в качестве. Окупаемость ремонта по моим расчётам — 14 месяцев. Деловой
                                подход».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Владимир Т. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-sky-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/022.jpeg"
                                        alt="Владимир Т." title="Владимир Т." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Владимир Т.</p>
                                    <p class="text-xs text-gray-500">17 июля 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Ремонт ванной и кухни</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Не хотел трогать всю квартиру, но кухня и санузел просились на капремонт давно.
                                Часто такие "куски" компании не берут — невыгодно. Тут взялись без вопросов. За три
                                недели поменяли разводку, плитку, технику. Жил всё это время в квартире, ребята пыль
                                и грязь локализовали как могли».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Григорий О. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-zinc-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/024.jpeg"
                                        alt="Григорий О." title="Гульнара О." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Гульнара О.</p>
                                    <p class="text-xs text-gray-500">6 июня 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Дизайнерский ремонт 120 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Большая квартира, премиум-сегмент, дорогие материалы — итальянская плитка,
                                шпонированные двери, мрамор. Цена ошибки высокая. Ни одной царапины на материалах,
                                ни одного скола на плитке. Хранили всё в специальной комнате с климат-контролем.
                                Видно опыт работы с премиумом».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Полина Р. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-stone-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/025.jpeg"
                                        alt="Полина Р." title="Николай Р." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Николай Р.</p>
                                    <p class="text-xs text-gray-500">19 мая 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Новостройка 48 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Однушка в новом доме, бюджет был ограничен. Не пытались впарить ничего лишнего.
                                Когда я хотела дорогую плитку в санузел, инженер показал альтернативу за 40% дешевле
                                — визуально не отличить. Сэкономила около 80 тысяч на материалах за счёт их
                                рекомендаций».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>

                        <!-- Станислав Е. -->
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 rounded-full bg-neutral-100 overflow-hidden flex-shrink-0">
                                    <img src="<?= $site['baseUrl'] ?>/public/assets/images/reviews/026.jpeg"
                                        alt="Станислав Е." title="Станислав Е." class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800 text-sm">Станислав Е.</p>
                                    <p class="text-xs text-gray-500">28 апр. 2025 г.</p>
                                </div>
                                <div class="ml-auto flex gap-0.5">
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                    <i class="fas fa-star text-yellow-400 text-xs"></i>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mb-1">Вторичка 67 м²</p>
                            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                                «Купил квартиру с ремонтом 90-х. Снос всего, кроме несущих. Команда работала чётко:
                                демонтаж — 4 дня, черновые работы — 3 недели, чистовая отделка — 5 недель. Каждую
                                пятницу присылали отчёт с фото. Никакого "забыли", "не успели", "придётся
                                доплатить". Возьму их же на дачу следующим летом».
                            </p>
                            <p class="text-xs text-gray-500">Проверенный отзыв</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center items-center mt-4">
                    <button id="showMoreReviews"
                        class="mx-auto px-10 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                        Читать все отзывы
                    </button>
                </div>
            </div>

            </div>
        </section>

        <!-- 5. Примеры -->
        <section class="pb-12 reveal">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Реальные объекты наших клиентов</h2>
                    <!-- cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
                        <?php foreach ($portfolio as $key => $value): ?>
                            <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                                itemtype="https://schema.org/CreativeWork">
                                <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок']); ?>">
                                <meta itemprop="description"
                                    content="Ремонт двухкомнатной квартиры, срок: <?= htmlspecialchars($value['срок']); ?>, стоимость: <?= htmlspecialchars($value['цена']); ?>">
                                <div class="relative h-52">
                                    <div class="swiper swiper-type-one w-full h-full">
                                        <div class="swiper-wrapper">
                                            <?php foreach ((new Functions())->getPhotos($value['текущая_папка']) as $key => $img): ?>
                                                <div class="swiper-slide">
                                                    <img decoding="async" loading="lazy"
                                                        src="<?= htmlspecialchars($site['baseUrl'] . '/' . $value['текущая_папка'] . '/' . $img) ?>"
                                                        class="w-full h-full object-cover" width="1280" height="720" alt="<?= htmlspecialchars($value['заголовок']) ?>"
                                                        title="<?= htmlspecialchars($value['заголовок']) ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 right-0 z-20 p-4 bg-gradient-to-t from-black/70 to-transparent">
                                        <div class="text-xs text-white/80">Косметический</div>
                                        <div class="mt-1 font-semibold text-white">
                                            <?= htmlspecialchars($value['заголовок']) ?>
                                        </div>
                                        <div class="flex gap-4 items-center mt-2 text-sm text-white/90"><span>Срок:
                                                <?= htmlspecialchars($value['срок']) ?>
                                            </span> ∙
                                            <span>Стоимость:
                                                <?= htmlspecialchars($value['цена']) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
                        <div class="bg-white border border-gray-200 rounded-2xl p-6">
                            <h3 class="text-xl font-bold text-gray-900">Почему 98% клиентов выбирают нас</h3>
                            <div class="mt-4 grid grid-cols-2 gap-4">
                                <div class="rounded-xl border border-gray-200 p-4">
                                    <div class="text-2xl font-bold text-orange-600">0 ₽</div>
                                    <div class="text-sm text-gray-600 mt-1">выезд инженера</div>
                                </div>
                                <div class="rounded-xl border border-gray-200 p-4">
                                    <div class="text-2xl font-bold text-orange-600">24 ч</div>
                                    <div class="text-sm text-gray-600 mt-1">подготовка сметы</div>
                                </div>
                                <div class="rounded-xl border border-gray-200 p-4">
                                    <div class="text-2xl font-bold text-orange-600">3 года</div>
                                    <div class="text-sm text-gray-600 mt-1">гарантия на работы</div>
                                </div>
                                <div class="rounded-xl border border-gray-200 p-4">
                                    <div class="text-2xl font-bold text-orange-600">ГОСТ</div>
                                    <div class="text-sm text-gray-600 mt-1">соблюдаем нормативы</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border border-gray-200 rounded-2xl p-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl max-w-[60%] font-bold text-gray-900">Готовы обсудить стоимость
                                    вашего
                                    ремонта?</h3>
                                <span
                                    class="text-xs font-semibold px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100"><i
                                        class="fa-solid fa-copyright"></i> Работаем
                                    официально</span>
                            </div>
                            <ul class="mt-4 space-y-3 text-sm text-gray-700">
                                <li class="flex gap-2"><i
                                        class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Фиксируем сроки
                                        в
                                        договоре</span></li>
                                <li class="flex gap-2"><i
                                        class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Ежедневный
                                        фотоотчет</span></li>
                                <li class="flex gap-2"><i
                                        class="fa-solid fa-circle-check text-green-600 mt-0.5"></i><span>Оплата по
                                        этапам
                                        работ</span></li>
                            </ul>
                            <a href="tel:<?= $site['phone'] ?>"
                                class="block max-w-fit cta-button mt-6 bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition sm:w-auto">
                                Связаться прямо сейчас!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="/public/assets/scripts/components/lazyIMG.js" defer></script>
    <script src="/public/assets/scripts/main/header.js" defer></script>
    <script src="/public/assets/scripts/components/faq.js" defer></script>
    <script src="/public/assets/scripts/components/reveal.js" defer></script>

    <script src="https://myreviews.dev/widget/dist/index.js" defer></script>

    <!-- Reviews Show/Hide Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var showMoreBtn = document.getElementById('showMoreReviews');
            var hiddenReviews = document.querySelector('.hidden-review');
            var isVisible = false;

            showMoreBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (isVisible) {
                    hiddenReviews.style.display = 'none';
                    showMoreBtn.textContent = 'Читать все отзывы';
                    isVisible = false;
                } else {
                    hiddenReviews.style.display = '';
                    showMoreBtn.textContent = 'Скрыть отзывы';
                    isVisible = true;
                }
            });
        });
    </script>
    <script>
        (function () {
            var myReviewsInit = function () {
                new window.myReviews.BlockWidget({
                    uuid: "1d241d42-ea23-4cd7-9053-ea70e3006641",
                    name: "g88142113",
                    additionalFrame: "none",
                    lang: "ru",
                    widgetId: "1"
                }).init();

                new window.myReviews.StickerWidget({
                    uuid: "1d241d42-ea23-4cd7-9053-ea70e3006641",
                    name: "sticker_2",
                    additionalFrame: "none",
                    lang: "ru",
                    widgetId: "2",
                    serviceId: "2"
                }).init();
            };

            if (document.readyState === "loading") {
                document.addEventListener('DOMContentLoaded', function () {
                    myReviewsInit();
                });
            } else {
                myReviewsInit();
            }
        })();
    </script>
</body>

</html>