<?php $site = Setting\Route\Function\Functions::site(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Контакты — заказать ремонт квартиры в Москве | ПКвартира</title>
    <meta name="description"
        content="ПКвартира: +7 495 473-17-37, Москва, Варшавское шоссе. Офис, шоурум, склад. Бесплатная консультация, выезд инженера на замер, смета за 30 минут.">
    <meta name="keywords" content="контакты, телефон, адрес, связаться, ремонт квартир">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/contact'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Контакты — заказать ремонт квартиры в Москве | ПКвартира">
    <meta property="og:description"
        content="ПКвартира: +7 495 473-17-37, Москва, Варшавское шоссе. Бесплатная консультация, выезд инженера на замер, смета за 30 минут.">
    <meta property="og:url"
        content="<?= htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? '') . '/contact'); ?>">
    <meta property="og:image"
        content="<?= htmlspecialchars($site['shareImageUrl']); ?>">

    <meta property="og:site_name"
        content="<?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title"
        content="Контакты — связаться с нами | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>">
    <meta name="twitter:description"
        content="Контакты <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?>. Телефон, адрес, WhatsApp, Telegram. Бесплатная консультация.">
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
        "contactPoint": [
          {
            "@type": "ContactPoint",
            "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
            "contactType": "customer service",
            "contactOption": "TollFree",
            "availableLanguage": ["Russian"],
            "areaServed": "RU"
          },
          {
            "@type": "ContactPoint",
            "telephone": <?= json_encode($site['phone'], JSON_UNESCAPED_UNICODE); ?>,
            "contactType": "sales",
            "availableLanguage": ["Russian"],
            "areaServed": {
              "@type": "City",
              "name": "Москва"
            }
          }
        ],
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
        "@id": <?= json_encode($site['baseUrl'] . '/contact/#webpage', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "url": <?= json_encode($site['baseUrl'] . '/contact', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
        "name": "Контакты — <?= htmlspecialchars($site['name']); ?>",
        "description": "Контактная информация <?= htmlspecialchars($site['name']); ?>. Телефон, адрес, WhatsApp, Telegram. Бесплатная консультация и выезд на объект.",
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
        "@id": <?= json_encode($site['baseUrl'] . '/contact/#breadcrumb', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
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
            "name": "Контакты",
            "item": <?= json_encode($site['baseUrl'] . '/contact', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
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
    <main class="pt-24 flex flex-col gap-6">

        <!-- Contact Section -->
        <section class="reveal">
            <div class="container mx-auto px-4">
                <div class="text-start mb-12">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        Контакты
                    </h1>
                    <p class="text-xl text-gray-600">
                        Свяжитесь с нами для консультации
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Left Column -->
                    <div>
                        <!-- Address -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-600 mr-3"></i>Наш адрес
                            </h2>
                            <p class="text-gray-700 text-lg mb-2">
                                <?= htmlspecialchars($site['address']['addressLocality']); ?>,
                                <?= htmlspecialchars($site['address']['streetAddress']); ?>
                            </p>
                            <p class="text-gray-600 mb-4">
                                <?= htmlspecialchars($site['description']); ?>
                            </p>
                            <a href="tel:<?= $site['phone']; ?>"
                                class="cta-button bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition">
                                Записаться на визит
                            </a>
                        </div>

                        <!-- Map -->
                        <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
                            <iframe
                                src="https://yandex.ru/map-widget/v1/?um=constructor%3Af7ad50414c62379c5c51eb60cf29ce866dd6e5bd0e1914048a94a2cd0f7dd129&amp;source=constructor"
                                width="100%" height="400" frameborder="0" title="Карта расположения офиса ПКвартира"></iframe>
                        </div>

                        <!-- Phone -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-phone-alt text-blue-600 mr-3"></i>
                                <?= htmlspecialchars($site['phone']); ?>
                            </h2>
                            <a href="tel:<?= $site['phone']; ?>"
                                class="cta-button bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                                Позвонить нам
                            </a>
                        </div>

                        <!-- Messengers -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-comment-dots text-blue-600 mr-3"></i>Мессенджеры
                            </h2>
                            <div class="flex space-x-4 mb-3">
                                <a href="<?= $site['telegram']; ?>"
                                    class="text-blue-500 hover:text-blue-700 text-4xl" aria-label="Написать в Telegram"><i
                                        class="fab fa-telegram"></i></a>
                                <a href="<?= $site['whatsapp']; ?>"
                                    class="text-green-500 hover:text-green-700 text-4xl" aria-label="Написать в WhatsApp"><i
                                        class="fab fa-whatsapp"></i></a>
                                <a href="<?= $site['max'] ?>"
                                    class="flex items-center text-gray-600 hover:text-blue-600 transition" aria-label="Написать в MAX">
                                    <img class="h-9 w-9" src="/public/assets/images/icons/MAX.svg" alt="Logo Max" title="MAX — мессенджер">
                                </a>
                            </div>
                            <a href="mailto:<?php echo $site['email']; ?>"
                                class="text-blue-600 hover:underline">Написать нам</a>
                        </div>

                        <!-- Company Details -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-building text-blue-600 mr-3"></i>Реквизиты
                            </h2>
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <p class="text-gray-700 mb-2"><strong>ООО "Проект Квартира"</strong></p>
                                <p class="text-gray-600 mb-2">ИНН: 9719013990</p>
                                <p class="text-gray-600 mb-2">ОГРН: 1217700135058</p>
                                <p class="text-gray-600">Юридический адрес:
                                    <?= $site['address']['addressLocality']
                                        . ', ' . $site['address']['streetAddress'] ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div>
                        <!-- Contact Form -->
                        <div class="bg-white border rounded-xl p-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">Оставить заявку</h2>
                            <form action="/send/email" method="POST" class="space-y-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Ваше имя *</label>
                                    <input name="имя" type="text" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Телефон *</label>
                                    <input name="телефон" type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                    <input name="почта" type="email"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Тип ремонта</label>
                                    <select name="тип ремонта"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                        <option>Ремонт под ключ</option>
                                        <option>Черновой ремонт</option>
                                        <option>Чистовой ремонт</option>
                                        <option>Косметический ремонт</option>
                                        <option>Дизайн-проект</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Площадь (м²)</label>
                                    <input name="площадь" type="number"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Сообщение</label>
                                    <textarea name="сообщение" rows="4"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" id="privacy" class="mr-2" required>
                                    <label for="privacy" class="text-gray-600 text-sm">
                                        Согласен с <a href="/soglashenie" class="text-blue-600 hover:underline">политикой
                                            конфиденциальности</a>
                                    </label>
                                </div>
                                <button type="submit"
                                    class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                                    Отправить заявку
                                </button>
                            </form>
                        </div>

                        <!-- Working Hours -->
                        <div class="mt-8 bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-clock text-blue-600 mr-3"></i>Время работы
                            </h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Понедельник - Пятница</span>
                                    <span class="font-semibold text-gray-800">9:00 - 22:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Суббота</span>
                                    <span class="font-semibold text-gray-800">9:00 - 22:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Воскресенье</span>
                                    <span class="font-semibold text-gray-800">9:00 - 22:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="reveal py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Остались вопросы?
                </h2>
                <p class="text-xl mb-8">
                    Наши специалисты готовы проконсультировать вас по любым вопросам
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:<?= $site['phone']; ?>"
                        class="bg-orange-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-600 transition">
                        <i class="fas fa-phone mr-2"></i>
                        Позвонить нам
                    </a>
                    <a href="mailto:<?php echo $site['email']; ?>?cc=<?php echo $site['email']; ?>&body=Здравствуйте, хотели бы получить консультацию по вашим услугам"
                        class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                        <i class="fas fa-envelope mr-2"></i>
                        Написать письмо
                    </a>
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

</body>

</html>
