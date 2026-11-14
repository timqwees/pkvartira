<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seo = TheFunction::seo([
    'title' => 'Ремонт квартиры-студии под ключ в Москве — цена за м² | ',
    'description' => 'Ремонт квартиры-студии под ключ в Москве — цена за м² |  — Проект Квартира (Проект Квартира).',
    'canonical' => '/services/studio',
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => array (
  0 => 
  array (
    'name' => 'Главная',
    'url' => '/',
  ),
  1 => 
  array (
    'name' => 'Услуги',
    'url' => '/services',
  ),
  2 => 
  array (
    'name' => 'Studio',
    'url' => '/services/studio',
  ),
),
]);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seoTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= htmlspecialchars($seo['twitter']['site']); ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($seo['twitter']['title']); ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($seo['twitter']['description']); ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($seo['twitter']['image']); ?>">
    <meta name="twitter:creator" content="<?= htmlspecialchars($seo['twitter']['creator']); ?>">
    <meta name="twitter:domain" content="<?= htmlspecialchars($seo['twitter']['domain']); ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
</head>

<body class="bg-white">

    <?php include_once './public/components/header.php'; ?>

    <!-- Main Content -->
    <main class="flex flex-col">

        <?php include './public/components/service-page-sections.php'; ?>

<?php
// J-01: кейс с фотографиями, площадью, сроками и итоговой стоимостью
$caseData = [
    'title'  => 'Студия, 24 м²',
    'area'   => '24 м²',
    'days'   => '28 дней',
    'sum'    => '192 000 ₽',
    'alt'    => 'Ремонт квартиры-студии 24 м² — выполненный объект',
    'photos' => [
        '/public/assets/images/portfolio-photos/studio/1_24sqm/1.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/3.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/4.jpg',
        '/public/assets/images/portfolio-photos/studio/1_24sqm/2.webp',
    ],
    'note'   => 'Квартира-студия с новостройки: голые стены и один выход на юг. Сделали лёгкий, но полноценный ремонт — за счёт планировки, а не объёма работ.',
    'bullets' => [
        'Демонтаж и выравнивание стен, покраска в один тон',
        'Замена электрики, розетки и светильники',
        'Ламинат на тёплый пол по всей площади',
        'Покраска потолка, установка плинтусов и двери',
        'Финальная уборка',
    ],
];

$caseTitle    = 'Наши объекты: студии';
$caseSubtitle = 'Косметический пакет в однушке-студии: заменили покрытия, выровняли стены, обновили электрику.';
$caseNote     = 'Ещё примеры работ — в <a href="/portfolio" class="text-[#6d5744] font-semibold underline">портфолио</a>.';
include './public/components/case-study.php';
?>


    </main>

    <?php include_once './public/components/footer.php'; ?>

    <!-- Local Scripts -->
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/main/header.min.js') ?>" defer></script>
    <script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>

    <!-- Service Page Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-toggle').forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>

</html>