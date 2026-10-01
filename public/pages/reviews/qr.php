<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'QR-коды для отзывов — ПКвартира';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/reviews/qr'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <style>
        .qr-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; }
        .qr-card { border: 1px solid #e5e7eb; border-radius: 16px; padding: 24px; text-align: center; background: #fff; }
        .qr-card img { width: 180px; height: 180px; }
        .qr-card .platform { font-weight: 700; margin-top: 12px; font-size: 15px; }
        .qr-card .hint { font-size: 13px; color: #6b7280; margin-top: 4px; }
        @media print {
            .no-print { display: none !important; }
            .qr-card { break-inside: avoid; border: 2px solid #000; }
        }
    </style>
</head>
<body class="bg-gray-50">
<main class="py-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="no-print mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-gray-900">QR-коды для отзывов</h1>
            <p class="mt-2 text-gray-600">Распечатайте и разместите на объекте — клиент сканирует и оставляет отзыв на нужной площадке.</p>
            <button onclick="window.print()" class="mt-4 px-6 py-3 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">Распечатать все</button>
        </div>

        <div class="qr-grid">
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://2gis.ru/moscow/firm/70000001114907613/tab/reviews') ?>" alt="2ГИС" loading="lazy">
                <div class="platform">2ГИС</div>
                <div class="hint">17 отзывов</div>
            </div>
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://yandex.ru/profile/90420725359') ?>" alt="Яндекс Карты" loading="lazy">
                <div class="platform">Яндекс Карты</div>
                <div class="hint">4 отзыва</div>
            </div>
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://profi.ru/profile/SuchkovNO2/') ?>" alt="Профи.ру" loading="lazy">
                <div class="platform">Профи.ру</div>
                <div class="hint">13 отзывов</div>
            </div>
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://youdo.com/u14181521') ?>" alt="YouDo" loading="lazy">
                <div class="platform">YouDo</div>
                <div class="hint">3 отзыва</div>
            </div>
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://www.avito.ru/brands/d903aeeb161754cab1f9b4e77a072e60') ?>" alt="Авито" loading="lazy">
                <div class="platform">Авито</div>
                <div class="hint">2 отзыва</div>
            </div>
            <div class="qr-card">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode('https://pkvartira.ru/reviews') ?>" alt="Сайт" loading="lazy">
                <div class="platform">Сайт</div>
                <div class="hint">35 отзывов</div>
            </div>
        </div>

        <div class="no-print mt-8 text-center text-sm text-gray-500">
            <p>Разместите QR на объекте: у входной двери, на кухне, в санузле. Клиент сканирует камерой телефона и попадает на страницу отзывов.</p>
        </div>
    </div>
</main>
</body>
</html>
