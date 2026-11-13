<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();

$seoTitle       = 'Ремонт квартиры-студии под ключ в Москве — цена за м² | ' . ($site['name'] ?? 'Проект Квартира');
$seoDescription = 'Ремонт квартиры-студии под ключ в Москве от 200 000 ₽. Фиксированная смета в договоре, гарантия 3 года. Дизайн-проект в подарок. Бесплатный замер и расчёт.';
$canonicalUrl   = $site['baseUrl'] . '/services/studio';
$ogTitle        = 'Ремонт квартиры-студии — от 200 000 ₽';
$ogDescription  = 'Ремонт квартир-студий под ключ в Москве от 200 000 ₽. Фиксированные цены, реальные сроки, гарантия 3 года.';
$ogImage        = $site['baseUrl'] . '/public/assets/images/portfolio-photos/studio/2_31sqm/01_gostinaya-kukhnya.webp';

$prices = [
    [
        'заголовок' => 'Косметический',
        'цена' => 'от 8 000 ₽',
        'цена_число' => '8000',
        'подзаголовок' => 'Итого для 25 м² - от 200 000 Р',
        'услуги' => ['Обои или покраска стен', 'Замена напольного покрытия', 'Потолки — покраска или натяжка', 'Замена розеток или выключателей', 'Финальная уборка'],
        'кнопка' => 'Заказать расчет',
        'стиль' => 'classic'
    ],
    [
        'заголовок' => 'Капитальный',
        'цена' => 'от 13 000 ₽',
        'цена_число' => '13000',
        'подзаголовок' => 'Итого для 25 м² - от 325 000 Р',
        'услуги' => ['Полная замена электрики', 'Полная замена сантехники', 'Стяжка полов и штукатурка стен', 'Чистовая отделка под ключ', 'Установка дверей и откосов', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'рекомендуем',
        'бейдж' => 'Рекомендуем'
    ],
    [
        'заголовок' => 'Дизайнерский',
        'цена' => 'от 18 000 ₽',
        'цена_число' => '18000',
        'подзаголовок' => 'Итого для 25 м² - от 450 000 Р',
        'услуги' => ['Дизайн-проект в подарок', 'Премиальные материалы', 'Сложные решения: ниши, подсветка', 'Авторский надзор архитектора', 'Все из пакета "Капитальный"', 'Финальная уборка'],
        'кнопка' => 'Получить расчет',
        'стиль' => 'classic'
    ]
];

$svc = [
    'heroH1'       => 'Ремонт квартиры-студии в Москве',
    'heroSubtitle' => 'Зафиксируем стоимость в договоре. Работаем с гарантией. Составим смету под ваш бюджет.',
    'heroFormId'   => 'studio_hero',
    'bg_url'       => '/public/assets/images/portfolio-photos/studio/2_31sqm/01_gostinaya-kukhnya.webp',

    'short_answer' => 'Ремонт квартиры-студии под ключ в Москве стоит от 200 000 ₽ (25 м²). Включает демонтаж, электрику, сантехнику, чистовую отделку, двери, освещение, мебель и уборку. Сроки: косметический — 10–14 дней, капитальный — 21–35 дней. Фиксированная смета в договоре, гарантия 3 года. Бесплатный замер и расчёт за 24 часа.',

    'prices'        => $prices,
    'price_title'   => 'Сколько стоит ремонт квартиры-студии',
        'price_subtitle'=> 'Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%. Стоимость фиксируем в договоре. Точную смету рассчитаем после бесплатного замера.',
    'service_name'  => 'квартиры-студии',

    'includes' => [
        ['icon' => '<i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i>', 'title' => 'Демонтаж',       'desc' => 'Подготовительные работы'],
        ['icon' => '<i class="fa-solid fa-bolt" aria-hidden="true"></i>',               'title' => 'Электрика',      'desc' => 'Проводка и щит'],
        ['icon' => '<i class="fa-solid fa-faucet-drip" aria-hidden="true"></i>',       'title' => 'Сантехника',     'desc' => 'Разводка и установка'],
        ['icon' => '<i class="fa-solid fa-paint-roller" aria-hidden="true"></i>',      'title' => 'Отделка',        'desc' => 'Стены, пол, потолок'],
        ['icon' => '<i class="fa-solid fa-door-open" aria-hidden="true"></i>',         'title' => 'Двери',          'desc' => 'Монтаж и доборы'],
        ['icon' => '<i class="fa-solid fa-lightbulb" aria-hidden="true"></i>',         'title' => 'Освещение',      'desc' => 'Светильники и выключатели'],
        ['icon' => '<i class="fa-solid fa-couch" aria-hidden="true"></i>',             'title' => 'Мебель',         'desc' => 'Сборка и установка'],
        ['icon' => '<i class="fa-solid fa-broom" aria-hidden="true"></i>',             'title' => 'Уборка',         'desc' => 'После работ'],
    ],

    'timeline' => [
        ['label' => 'Косметический', 'value' => '10–14 дней', 'desc' => 'Обновление отделки без переделок инженерии'],
        ['label' => 'Капитальный',   'value' => '21–35 дней', 'desc' => 'Полная замена электрики, сантехники, выравнивание'],
        ['label' => 'Дизайнерский',  'value' => '35–45 дней', 'desc' => 'Сложные решения, авторский надзор, премиум-материалы'],
    ],

    'mistakes' => [
        ['title' => 'Не зонируют кухню и спальную зону', 'desc' => 'Запахи готовки и шум в зоне сна. Правильно: барная стойка, разные напольные покрытия, подсветка, низкая перегородка.'],
        ['title' => 'Игнорируют вентиляцию на кухне', 'desc' => 'Влажность и запахи заполняют всю студию. Мощный вытяжной + приточная вентиляция — обязательны.'],
        ['title' => 'Не закладывают хранение (15–20% площади)', 'desc' => 'Вещи валяются открыто. Встроенные пеналы, кровать с ящиками, ниши в стенах — в проекте заранее.'],
        ['title' => 'Покупают материалы без учёта малой площади', 'desc' => 'Хвосты материалов съедают 15–20% бюджета. Мы закупаем точно по смете со скидкой 10–15%.'],
        ['title' => 'Начинают без дизайн-проекта', 'desc' => 'В студии каждый см важен. Ошибка в планировке — переделка всего. Проект окупается за 1 день.'],
        ['title' => 'Подписывают договор без поэтапных сроков', 'desc' => 'Сроки «плывут». У нас каждый этап с дедлайном в договоре и штрафными санкциями.'],
    ],

    'portfolio' => (new \Functions())->getPortfolio('public/assets/images/portfolio-photos/studio'),

        'faq' => [
        ['q' => 'Как организовать зонирование в студии без перегородок?', 'a' => 'В студии зонирование делаем через: разные напольные покрытия (плитка в зоне кухни, ламинат в зоне сна), цветовые акценты на стенах, расстановку мебели (диван как перегородка), подвесные конструкции или разные уровни потолка. Перегородки не обязательны — визуальное разделение работает лучше.'],
        ['q' => 'Где хранить вещи в студии, если нет кладовой?', 'a' => 'В студии хранилища выстраиваем вертикально и в мебели: кровать с выдвижными ящиками, пеналы до потолка, ниши в стенах под телевизор/книги, верхние ярусы кухонных гарнитуров, пьедестал под ванной. В проекте закладываем минимум 15–20% площади под хранение.'],
        ['q' => 'Как отделить кухню от спальной зоны в студии?', 'a' => 'Разделение делаем через: барную стойку/остров, разную подсветку (рабочая над кухней, мягкая в зоне сна), разные материалы пола, низкую перегородку-стойку или шторку. Важно оставить проход не менее 90 см.'],
        ['q' => 'Сколько стоит ремонт студии под ключ?', 'a' => 'От 200 000 ₽ за 25 м² (косметический), от 325 000 ₽ (капитальный). Точная стоимость зависит от метража, состояния стен и выбранных материалов. Точную смету даём после бесплатного замера.'],
        ['q' => 'Сколько времени занимает ремонт студии?', 'a' => 'Косметический — 10–14 дней, капитальный — 21–35 дней. Точные сроки фиксируем в договоре после замера и согласования сметы.'],
        ['q' => 'Что если смета вырастёт в процессе?', 'a' => 'Смета фиксируется в договоре до начала работ и не меняется. Если по ходу ремонта вы сами хотите добавить работы — считаем их отдельной позицией и согласовываем с вами до начала. Никаких доплат «по факту».'],
    ],
'price_rows' => [
        ['label' => 'Косметический', 'price' => '8000'],
        ['label' => 'Капитальный',   'price' => '13000'],
        ['label' => 'Дизайнерский',  'price' => '18000'],
    ],
    'price_table_title' => 'Стоимость по метражу',

    'ctaFormId'       => 'studio_cta',
    'ctaFormTitle'    => 'Рассчитать стоимость ремонта',
    'ctaFormSubtitle' => 'Бесплатный расчёт за 5 минут',
    'ctaButtonText'   => 'Получить расчёт бесплатно',
    'ctaExpandable'   => false,
    'ctaSectionBadge' => 'Бесплатный расчёт',
    'ctaSectionHeading' => 'Готовы рассчитать стоимость: ремонт квартиры-студии',
    'ctaSectionText'    => 'Оставьте заявку — бесплатно приедем на замер и составим точную смету с фиксированной ценой.',
    'ctaSectionBenefits' => ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'],

    'show_process' => true,
];

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($seoTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($seoDescription, 155)) ?>">
    <meta name="author" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="content-language" content="ru">
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($ogDescription) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['name'] ?? 'Проект Квартира') ?> — Ремонт квартир под ключ">
    <meta property="og:locale" content="ru_RU">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@pkvartira">
    <meta name="twitter:title" content="<?= htmlspecialchars($ogTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($ogDescription) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImage) ?>">
    <meta name="twitter:creator" content="@pkvartira">
    <meta name="twitter:domain" content="<?= htmlspecialchars(parse_url($site['baseUrl'], PHP_URL_HOST)) ?>">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "<?= $site['canonicalUrl'] ?>#service",
      "name": "Ремонт квартир-студий под ключ",
      "description": "Профессиональный ремонт квартир и домов под ключ в Москве",
      "provider": { "@id": "<?= $site['baseUrl'] ?>#organization" },
      "serviceType": "Ремонтные услуги",
      "areaServed": { "@type": "City", "name": "Москва" },
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Услуги по ремонту",
        "itemListElement": [
          <?php foreach (($prices ?? []) as $__oi => $__offer): ?>
          {
            "@type": "Offer",
            "price": "<?= htmlspecialchars($__offer['цена_число'] ?? '') ?>",
            "priceCurrency": "RUB",
            "itemOffered": {
              "@type": "Service",
              "name": <?= json_encode(($__offer['заголовок'] ?? '') . ' ремонт', JSON_UNESCAPED_UNICODE) ?>
            }
          }<?= $__oi < count($prices) - 1 ? ',' : '' ?>
          <?php endforeach; ?>
        ]
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "<?= $site['canonicalUrl'] ?>#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Главная", "item": "<?= $site['baseUrl'] ?>/" },
        { "@type": "ListItem", "position": 2, "name": "Услуги", "item": "<?= $site['baseUrl'] ?>/services" },
        { "@type": "ListItem", "position": 3, "name": "Ремонт квартиры-студии", "item": "<?= $site['canonicalUrl'] ?>" }
      ]
    },
    {
      "@type": "FAQPage",
      "@id": "<?= $site['canonicalUrl'] ?>#faq",
      "mainEntity": [
        <?php foreach ($svc['faq'] as $i => $faq): ?>
        {
          "@type": "Question",
          "name": <?= json_encode($faq['q'], JSON_UNESCAPED_UNICODE) ?>,
          "acceptedAnswer": {
            "@type": "Answer",
            "text": <?= json_encode($faq['a'], JSON_UNESCAPED_UNICODE) ?>
          }
        }<?= $i < count($svc['faq']) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
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