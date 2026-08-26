<?php
use Setting\Route\Function\Functions;
$site = Functions::site();

// Список всех услуг — читаем директории
$servicesDir = __DIR__;
$all = [];
if (is_dir($servicesDir)) {
    foreach (scandir($servicesDir) as $item) {
        if ($item === '.' || $item === '..' || $item === 'index.php') continue;
        $indexFile = $servicesDir . '/' . $item . '/index.php';
        if (is_file($indexFile)) {
            // Попытаемся вытащить $title из файла без исполнения: читаем первую строку с $title
            $title = $item;
            $content = file_get_contents($indexFile);
            if (preg_match('/\$title\s*=\s*[\'"]([^\'"]+)[\'"]/', $content, $m)) {
                $title = $m[1];
                // Убираем цену из заголовка для краткости
                $title = preg_replace('/\s*—\s*цена.*$/u', '', $title);
                $title = trim(explode('—', $title)[0]);
            }
            $all[] = ['slug' => $item, 'title' => $title];
        }
    }
    usort($all, fn($a,$b) => strcmp($a['slug'], $b['slug']));
}

$seo = Functions::seo([
    'title' => 'Услуги по ремонту квартир и домов под ключ в Москве — цены от 8 000 ₽/м²',
    'description' => 'Все виды ремонта от ПКвартира: квартиры под ключ, студии, новостройки, вторичка, дома, коттеджи, коммерческие помещения, ремонт по районам Москвы и МО. Фиксированная смета, гарантия 3 года.',
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/services',
    'type' => 'website',
    'pageType' => 'CollectionPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Услуги', 'url' => $site['baseUrl'] . '/services'],
    ],
]);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($seo['title']); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="robots" content="index, follow">
    <meta name="referrer" content="origin-when-crossorigin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta property="og:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($seo['canonical']); ?>">
    <meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($seo['og']['site_name']); ?>">
    <meta property="og:locale" content="ru_RU">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
    <?php include_once dirname(__DIR__, 3) . '/public/components/head-includes.php'; ?>
</head>
<body class="bg-white">
<?php include_once dirname(__DIR__, 3) . '/public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="py-8 bg-gray-50 border-b border-gray-100">
        <div class="container mx-auto px-4 max-w-6xl">
            <nav aria-label="breadcrumb" class="text-sm text-gray-600 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="/" class="hover:text-blue-600">Главная</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900 font-medium">Услуги</li>
                </ol>
            </nav>
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Услуги по ремонту квартир и домов</h1>
            <p class="mt-3 text-gray-600 max-w-3xl">Выберите нужный раздел — фиксированная цена в договоре, гарантия 3 года, бесплатный замер и смета за 24 часа. Работаем по Москве и Московской области.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="/calculator" class="inline-flex items-center px-6 py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">Рассчитать стоимость</a>
                <a href="tel:<?= htmlspecialchars($site['phone']); ?>" class="inline-flex items-center px-6 py-3 rounded-lg bg-white border border-gray-300 font-semibold hover:bg-gray-50 transition">Позвонить <?= htmlspecialchars($site['phone']); ?></a>
            </div>
        </div>
    </section>

    <section class="py-10">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-gray-900">Все направления</h2>
            <p class="text-sm text-gray-500 mt-1">Всего услуг: <?= count($all); ?>. Выберите интересующее направление.</p>
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($all as $svc): ?>
                    <a href="/services/<?= htmlspecialchars($svc['slug']); ?>" class="group block bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-500 hover:shadow-md transition">
                        <div class="text-sm font-semibold text-gray-900 group-hover:text-orange-600 transition"><?= htmlspecialchars($svc['title']); ?></div>
                        <div class="text-xs text-gray-500 mt-1">/services/<?= htmlspecialchars($svc['slug']); ?></div>
                        <div class="mt-3 inline-flex items-center gap-1 text-sm font-medium text-orange-600">Перейти <i class="fa-solid fa-arrow-right text-xs"></i></div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-6">
                    <div class="font-bold text-gray-900">Под ключ</div>
                    <ul class="mt-3 space-y-1 text-sm">
                        <li><a href="/services/pod-klyuch" class="text-blue-700 hover:underline">Ремонт под ключ</a></li>
                        <li><a href="/services/nowostroyka" class="text-blue-700 hover:underline">Ремонт новостройки</a></li>
                        <li><a href="/services/vtorichka" class="text-blue-700 hover:underline">Ремонт вторички</a></li>
                        <li><a href="/services/studio" class="text-blue-700 hover:underline">Студии</a></li>
                        <li><a href="/services/doma" class="text-blue-700 hover:underline">Дома и коттеджи</a></li>
                        <li><a href="/services/kommercheskie" class="text-blue-700 hover:underline">Коммерческие</a></li>
                    </ul>
                </div>
                <div class="bg-orange-50 border border-orange-100 rounded-xl p-6">
                    <div class="font-bold text-gray-900">По площади и типу</div>
                    <ul class="mt-3 space-y-1 text-sm">
                        <li><a href="/services/1room" class="text-orange-700 hover:underline">1-комнатные</a></li>
                        <li><a href="/services/2room" class="text-orange-700 hover:underline">2-комнатные</a></li>
                        <li><a href="/services/3room" class="text-orange-700 hover:underline">3-комнатные</a></li>
                        <li><a href="/services/4room" class="text-orange-700 hover:underline">4-комнатные</a></li>
                        <li><a href="/services/evro-dvushka" class="text-orange-700 hover:underline">Евродвушка</a></li>
                        <li><a href="/services/evro-treshka" class="text-orange-700 hover:underline">Евротрешка</a></li>
                    </ul>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                    <div class="font-bold text-gray-900">Популярные районы</div>
                    <ul class="mt-3 space-y-1 text-sm grid grid-cols-2 gap-x-4">
                        <li><a href="/services/lyubertsy" class="text-gray-700 hover:text-orange-600">Люберцы</a></li>
                        <li><a href="/services/odintsovo" class="text-gray-700 hover:text-orange-600">Одинцово</a></li>
                        <li><a href="/services/mitino" class="text-gray-700 hover:text-orange-600">Митино</a></li>
                        <li><a href="/services/khimki" class="text-gray-700 hover:text-orange-600">Химки</a></li>
                        <li><a href="/services/balashikha" class="text-gray-700 hover:text-orange-600">Балашиха</a></li>
                        <li><a href="/services/krasnogorsk" class="text-gray-700 hover:text-orange-600">Красногорск</a></li>
                        <li><a href="/services/mytishchi" class="text-gray-700 hover:text-orange-600">Мытищи</a></li>
                        <li><a href="/services/podolsk" class="text-gray-700 hover:text-orange-600">Подольск</a></li>
                    </ul>
                    <a href="#all" onclick="window.scrollTo({top: document.body.scrollHeight, behavior:'smooth'}); return false;" class="mt-4 inline-block text-sm text-orange-600 font-medium hover:underline">Показать все районы →</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once dirname(__DIR__, 3) . '/public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
