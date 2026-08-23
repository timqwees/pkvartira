<?php
$site = Setting\Route\Function\Functions::site();

$seo = Setting\Route\Function\Functions::seo([
    'title' => 'Контакты — заказать ремонт квартиры в Москве',
    'description' => 'ПКвартира: +7 495 473-17-37, Москва, Варшавское шоссе. Офис, шоурум, склад. Бесплатная консультация, выезд инженера на замер, смета за 30 минут. Работаем ежедневно.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/contact',
    'type' => 'website',
    'pageType' => 'ContactPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Контакты', 'url' => $site['baseUrl'] . '/contact'],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seo['title']); ?> | ПКвартира</title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>"><meta name="robots" content="index, follow">
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
                                    class="text-blue-500 hover:text-blue-700 text-4xl" aria-label="Написать в Telegram" rel="nofollow noopener noreferrer" target="_blank"><i
                                        class="fab fa-telegram"></i></a>
                                <a href="<?= $site['whatsapp']; ?>"
                                    class="text-green-500 hover:text-green-700 text-4xl" aria-label="Написать в WhatsApp" rel="nofollow noopener noreferrer" target="_blank"><i
                                        class="fab fa-whatsapp"></i></a>
                                <?php if (!empty($site['max'])): ?>
                                <a href="<?= $site['max'] ?>"
                                    class="flex items-center text-gray-600 hover:text-blue-600 transition" aria-label="Написать в MAX">
                                    <img class="h-9 w-9" src="<?= \Setting\Route\Function\Functions::asset('/public/assets/images/icons/MAX.svg') ?>" alt="Logo Max" title="MAX — мессенджер">
                                </a>
                                <?php endif; ?>
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

                        <!-- Менеджеры (требование чек-листа: отдельные контакты менеджеров) -->
                        <div class="mt-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-users text-blue-600 mr-3"></i>Менеджеры проектов
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-white border border-gray-200 rounded-xl p-4 flex gap-4 items-center">
                                    <img src="<?= \Setting\Route\Function\Functions::asset('/public/assets/images/about/team/1.jpg') ?>" alt="Владимир Соболев — руководитель проектов" class="w-14 h-14 rounded-full object-cover flex-shrink-0" width="56" height="56" loading="lazy">
                                    <div class="min-w-0">
                                        <div class="font-semibold text-gray-900 text-sm">Владимир Соболев</div>
                                        <div class="text-xs text-gray-500">Руководитель проектов</div>
                                        <a href="tel:+74954731737" class="text-sm font-medium text-blue-600 hover:underline">+7 495 473-17-37 доб. 1</a><br>
                                        <a href="mailto:m1@pkvartira.ru" class="text-xs text-gray-600 hover:text-blue-600">m1@pkvartira.ru</a>
                                    </div>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-xl p-4 flex gap-4 items-center">
                                    <img src="<?= \Setting\Route\Function\Functions::asset('/public/assets/images/about/team/2.jpg') ?>" alt="Семён Серебренников — сметчик" class="w-14 h-14 rounded-full object-cover flex-shrink-0" width="56" height="56" loading="lazy">
                                    <div class="min-w-0">
                                        <div class="font-semibold text-gray-900 text-sm">Семён Серебренников</div>
                                        <div class="text-xs text-gray-500">Сметчик / замер</div>
                                        <a href="tel:+74954731738" class="text-sm font-medium text-blue-600 hover:underline">+7 495 473-17-38</a><br>
                                        <a href="mailto:m2@pkvartira.ru" class="text-xs text-gray-600 hover:text-blue-600">m2@pkvartira.ru</a>
                                    </div>
                                </div>
                            </div>
                            <!--<p class="text-xs text-gray-500 mt-2">Звоните напрямую — ответим за 5 минут. Бесплатная линия <a href="tel:88003021737" class="text-blue-600 hover:underline">8 800 302-17-37</a></p>-->
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
                                    <input name="телефон" data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15"
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
                                <label class="flex items-start gap-2 text-xs text-[#6b7280] cursor-pointer mb-3"><input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0"><span>Согласен на обработку персональных данных</span></label>
                                <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
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
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>

    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/faq.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

</body>

</html>
