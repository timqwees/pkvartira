<?php
/**
 * Head Includes Component
 *
 * Подключение всех CSS и JS ресурсов с приоритетом локальных файлов и CDN fallback.
 * Локальные файлы загружаются первыми для стабильности в РФ,
 * CDN используется как резервный источник через JavaScript проверку.
 */
$__headBase = htmlspecialchars((string) $site['baseUrl'], ENT_QUOTES, 'UTF-8');
$__ogAlt = htmlspecialchars(
    ($site['name'] ?? 'ПКвартира') . ' — ремонт квартир под ключ в Москве',
    ENT_QUOTES,
    'UTF-8'
);
?>
<!-- CLS Prevention: set body background immediately before Tailwind loads -->
<style>body{background:#fff;margin:0}</style>

<!-- Глобальные подсказки браузерам -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="theme-color" content="#FF6B35">
<meta name="format-detection" content="telephone=no">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="msapplication-TileColor" content="#FF6B35">

<meta property="og:image:width" content="512" />
<meta property="og:image:height" content="512" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:alt" content="<?= $__ogAlt; ?>" />
<meta name="twitter:image:alt" content="<?= $__ogAlt; ?>" />
<link rel="alternate" hreflang="ru" href="<?= $__headBase; ?>" />
<link rel="alternate" hreflang="x-default" href="<?= $__headBase; ?>" />

<!-- Фавиконы и иконки -->
<link rel="icon" type="image/png"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/favicon-96x96.png"
    sizes="96x96" />
<link rel="icon" type="image/svg+xml"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/favicon.svg" />
<link rel="shortcut icon"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="ПКвартира" />
<link rel="manifest"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/site.webmanifest" />

<!-- LLM Discovery -->
<meta name="llms:website" content="<?= $__headBase; ?>/llms.txt">
<meta name="llms:full" content="<?= $__headBase; ?>/llms-full.txt">

<!-- Performance Hints (max 4 preconnects) -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
<link rel="preconnect" href="https://mc.yandex.ru" crossorigin>
<link rel="dns-prefetch" href="//cdn.tailwindcss.com">

<!-- Swiper CSS - Non-blocking -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</noscript>

<!-- Font Awesome - Non-blocking CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" media="print"
    onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</noscript>

<!-- Tailwind CSS (deferred) -->
<script src="https://cdn.tailwindcss.com" defer></script>

<!-- Google Fonts - Inter + Unbounded -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Swiper JS - deferred -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<script src="/public/assets/scripts/components/swiper.js" defer></script>

<!-- Local Styles - Non-blocking -->
<link rel="stylesheet" href="/public/assets/styles/main.css" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="/public/assets/styles/main.css">
</noscript>

<!-- Phone formatting - deferred -->
<script src="/public/assets/scripts/components/phoneFormat.js" defer></script>
