<?php
/**
 * Head Includes Component
 *
 * Подключение всех CSS и JS ресурсов с приоритетом локальных файлов и CDN fallback.
 * Локальные файлы загружаются первыми для стабильности в РФ,
 * CDN используется как резервный источник через JavaScript проверку.
 */
$__headBase = htmlspecialchars((string) $site['baseUrl'], ENT_QUOTES, 'UTF-8');
$__brandName = $site['brand'] ?? $site['name'] ?? 'Проект Квартира';
$__shortBrand = $site['shortBrand'] ?? $site['shortName'] ?? 'ПКвартира';
$__ogAlt = htmlspecialchars(
    $__brandName . ' (' . $__shortBrand . ') — ремонт квартир под ключ в Москве',
    ENT_QUOTES,
    'UTF-8'
);
// hreflang должен указывать на каноникал текущей страницы, а не на главную
$__canonicalForHreflang = isset($seo['canonical']) ? $seo['canonical'] : ($site['canonicalUrl'] ?? $site['baseUrl'] ?? 'https://pkvartira.ru');
$__hreflangHref = htmlspecialchars((string) $__canonicalForHreflang, ENT_QUOTES, 'UTF-8');
$__brandKeywords = isset($seo['keywords']) ? $seo['keywords'] : htmlspecialchars($__brandName . ', ' . $__shortBrand . ', pkvartira.ru, pkvartira, ' . $__brandName . ' официальный сайт, ' . $__shortBrand . ' официальный сайт, pkvartira.ru официальный сайт, ООО Проект Квартира, ' . $__brandName . ' Москва, ' . $__brandName . ' отзывы, ремонт квартир, ремонт под ключ', ENT_QUOTES, 'UTF-8');
?>
<!-- CLS Prevention -->
<style>body{background:#fff;margin:0}
@font-face{font-family:'Font Awesome 6 Free';font-display:swap;font-style:normal;font-weight:900;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/webfonts/fa-solid-900.woff2) format('woff2')}
@font-face{font-family:'Font Awesome 6 Brands';font-display:swap;font-style:normal;font-weight:400;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/webfonts/fa-brands-400.woff2) format('woff2')}
@font-face{font-family:'Font Awesome 6 Regular';font-display:swap;font-style:normal;font-weight:400;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/webfonts/fa-regular-400.woff2) format('woff2')}
</style>

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
<link rel="alternate" hreflang="ru" href="<?= $__hreflangHref; ?>" />
<link rel="alternate" hreflang="x-default" href="<?= $__hreflangHref; ?>" />

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
<meta name="apple-mobile-web-app-title" content="<?= htmlspecialchars($__brandName, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="application-name" content="<?= htmlspecialchars($__brandName, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="author" content="<?= htmlspecialchars($__brandName . ' (' . $__shortBrand . ')', ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="keywords" content="<?= htmlspecialchars($__brandKeywords, ENT_QUOTES, 'UTF-8'); ?>" />
<link rel="manifest"
    href="<?= $__headBase; ?>/public/assets/images/logo/favicon/site.webmanifest" />
<link rel="search" type="application/opensearchdescription+xml" title="<?= htmlspecialchars($__brandName . ' — ' . $__shortBrand . ' поиск', ENT_QUOTES, 'UTF-8'); ?>" href="<?= $__headBase; ?>/opensearch.xml" />
<link rel="author" href="<?= $__headBase; ?>/about" />

<!-- Брендовые сигналы для поиска -->
<meta name="brand" content="<?= htmlspecialchars($__brandName, ENT_QUOTES, 'UTF-8'); ?>" />
<meta property="og:brand" content="<?= htmlspecialchars($__brandName, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="subject" content="<?= htmlspecialchars($__brandName . ' (' . $__shortBrand . ', pkvartira.ru) — официальный сайт', ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="classification" content="<?= htmlspecialchars($__brandName . ', ' . $__shortBrand . ', pkvartira.ru', ENT_QUOTES, 'UTF-8'); ?>" />
<?php if (!isset($seo) || !isset($seo['jsonLd'])): /* Глобальная микроразметка бренда для страниц без seo() — чтобы бренд «Проект Квартира» индексировался везде */ ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "<?= $__headBase; ?>#organization",
      "name": <?= json_encode($__brandName, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>,
      "alternateName": ["Проект Квартира","ПКвартира","пквартира","ПроектКвартира","ПКВАРТИРА","pkvartira.ru","pkvartira","Proekt Kvartira","proekt kvartira","PKVARTIRA","ООО Проект Квартира","Проект Квартира Москва","Проект Квартира официальный сайт"],
      "legalName": "ООО \"Проект Квартира\"",
      "url": "<?= $__headBase; ?>",
      "slogan": "Ремонт квартир под ключ в Москве",
      "description": "Проект Квартира (ПКвартира, pkvartira.ru) — официальный сайт компании по ремонту квартир и домов под ключ в Москве. Ищите нас как Проект Квартира, ПКвартира, pkvartira.ru",
      "logo": {
        "@type": "ImageObject",
        "url": "<?= $__headBase; ?>/public/assets/images/logo/favicon/favicon.svg",
        "width": 300,
        "height": 300
      },
      "brand": {
        "@type": "Brand",
        "name": "Проект Квартира",
        "alternateName": ["ПКвартира","пквартира","pkvartira.ru","pkvartira","ПроектКвартира"],
        "slogan": "Ремонт квартир под ключ в Москве"
      },
      "sameAs": ["https://t.me/pkvartira","https://wa.me/74951234567","https://yandex.ru/maps/org/proyekt_kvartira/"],
      "knowsAbout": ["ремонт квартир","ремонт под ключ","дизайнерский ремонт","капитальный ремонт"]
    },
    {
      "@type": "WebSite",
      "@id": "<?= $__headBase; ?>#website",
      "url": "<?= $__headBase; ?>",
      "name": "Проект Квартира — ПКвартира (pkvartira.ru) — официальный сайт",
      "alternateName": ["Проект Квартира","ПКвартира","pkvartira.ru","pkvartira","Проект Квартира официальный сайт","ПКвартира официальный сайт","pkvartira.ru официальный сайт"],
      "description": "Официальный сайт Проект Квартира (ПКвартира, pkvartira.ru) — ремонт квартир под ключ в Москве. Ищите: Проект Квартира, ПКвартира, pkvartira",
      "publisher": {"@id": "<?= $__headBase; ?>#organization"},
      "inLanguage": "ru-RU",
      "potentialAction": {
        "@type": "SearchAction",
        "target": {"@type": "EntryPoint", "urlTemplate": "<?= $__headBase; ?>/search?q={search_term_string}"},
        "query-input": "required name=search_term_string"
      }
    }
  ]
}
</script>
<?php endif; ?>

<!-- LLM Discovery -->
<meta name="llms:website" content="<?= $__headBase; ?>/llms.txt">
<meta name="llms:full" content="<?= $__headBase; ?>/llms-full.txt">

<!-- Performance Hints (max 4 preconnects) -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
<link rel="preconnect" href="https://mc.yandex.ru" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Swiper CSS - Non-blocking -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</noscript>

<!-- Font Awesome - Blocking CSS (prevents 0-width icons causing CLS) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Google Fonts - Non-blocking (preloaded, then swapped) -->
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700;800&display=swap" onload="this.rel='stylesheet'">
<noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700;800&display=swap">
</noscript>

<!-- Tailwind CSS (local, pre-built) - Blocking (prevents unstyled HTML causing CLS) -->
<link rel="stylesheet" href="<?= \Setting\Route\Function\Functions::asset('/public/assets/styles/tailwind-built.css') ?>">

<!-- Custom utility classes (replaces Tailwind JIT arbitrary values) -->
<link rel="stylesheet" href="<?= \Setting\Route\Function\Functions::asset('/public/assets/styles/custom-utilities.min.css') ?>" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="<?= \Setting\Route\Function\Functions::asset('/public/assets/styles/custom-utilities.min.css') ?>">
</noscript>

<!-- Local Styles - Blocking -->
<link rel="stylesheet" href="<?= \Setting\Route\Function\Functions::asset('/public/assets/styles/main.min.css') ?>">

<!-- Swiper JS - deferred -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/swiper.min.js') ?>" defer></script>

<!-- Phone formatting - deferred -->
<script src="<?= \Setting\Route\Function\Functions::asset('/public/assets/scripts/components/phoneFormat.min.js') ?>" defer></script>

<!-- UTM / conversion tracking — auto-injects hidden fields into all forms -->
<script>
(function(){
    'use strict';
    var PARAMS = ['utm_source','utm_medium','utm_campaign','utm_term','utm_content','yclid','gclid'];
    var STORE_KEY = 'pkv_utm';
    var stored = {};

    // 1. Read from URL
    var url = new URLSearchParams(window.location.search);
    var hasAny = false;
    PARAMS.forEach(function(p){
        var v = url.get(p) || '';
        stored[p] = v;
        if (v) hasAny = true;
    });
    stored['landing_page'] = window.location.href;
    stored['referrer'] = document.referrer || '';

    // 2. Merge with localStorage (URL params override, but keep old if no new UTM)
    try {
        var prev = JSON.parse(localStorage.getItem(STORE_KEY) || '{}');
        if (hasAny) {
            // New UTM — update everything
            localStorage.setItem(STORE_KEY, JSON.stringify(stored));
        } else if (!prev.utm_source && !prev.yclid) {
            // No UTM in URL and no saved UTM — fresh visit
            localStorage.setItem(STORE_KEY, JSON.stringify(stored));
        } else {
            // No UTM in URL but we have saved — keep saved, update landing_page
            prev['landing_page'] = stored['landing_page'];
            prev['referrer'] = stored['referrer'];
            stored = prev;
        }
    } catch(e) {
        try { localStorage.setItem(STORE_KEY, JSON.stringify(stored)); } catch(e2){}
    }

    // 3. Inject hidden fields into all forms that POST to /send/email
    function injectUtm(){
        var forms = document.querySelectorAll('form[action="/send/email"]');
        forms.forEach(function(form){
            // Skip if already injected
            if (form.dataset.utmInjected) return;
            form.dataset.utmInjected = '1';
            var fields = PARAMS.concat(['landing_page','referrer']);
            fields.forEach(function(name){
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = stored[name] || '';
                form.appendChild(input);
            });
        });
    }

    // Run when DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', injectUtm);
    } else {
        injectUtm();
    }

    // Re-inject when new forms appear (SPA, dynamic forms)
    if (typeof MutationObserver !== 'undefined') {
        var observer = new MutationObserver(function(){
            var forms = document.querySelectorAll('form[action="/send/email"]:not([data-utm-injected])');
            if (forms.length) injectUtm();
        });
        observer.observe(document.body, { childList: true, subtree: true });
    }
})();
</script>
