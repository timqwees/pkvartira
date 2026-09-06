<?php
use Setting\Route\Functions\TheFunction;
use Setting\Route\Functions\Vacancy;
$site = TheFunction::site();
$title = 'Вакансии — работа в ПКвартира — от 110 000 ₽';
$vacancies = Vacancy::all();
$vacCount = count($vacancies);
$benefits = Vacancy::benefits();
$steps = Vacancy::steps();

$catOf = function(array $vv): string {
    if (in_array($vv['slug'], ['malyar','plitochnik','shtukatur','plotnik'], true)) return 'otdelka';
    if (in_array($vv['slug'], ['santehnik','elektrik'], true)) return 'engineering';
    if ($vv['slug'] === 'kamenshchik') return 'stroika';
    return 'universal';
};
$catCount = ['all' => count($vacancies), 'otdelka' => 0, 'engineering' => 0, 'stroika' => 0, 'universal' => 0];
foreach ($vacancies as $vv) { $catCount[$catOf($vv)]++; }

$seo = TheFunction::seo([
    'title' => 'Работа в ПКвартира — ' . $vacCount . ' вакансий от 110 000 ₽',
    'description' => 'Работа в Проект Квартира (ПКвартира) — ' . $vacCount . ' вакансий: маляр, плиточник, сантехник, электрик, штукатур, плотник, каменщик, мастер-универсал. Выплаты каждую неделю без задержек, жильё на объекте, +5% бонус и аванс.',
    'keywords' => 'работа Проект Квартира, ПКвартира вакансии, работа маляр плиточник сантехник электрик штукатур плотник каменщик мастер универсал Москва, вакансии с еженедельной оплатой, работа с проживанием Москва',
    'image' => $site['baseUrl'] . '/public/assets/images/logo/favicon/web-app-manifest-512x512.png',
    'url' => $site['baseUrl'] . '/vakansii',
    'type' => 'website',
    'pageType' => 'CollectionPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Вакансии', 'url' => $site['baseUrl'] . '/vakansii'],
    ],
]);

$itemList = [];
$pos = 1;
foreach ($vacancies as $v) {
    $itemList[] = [
        '@type' => 'ListItem',
        'position' => $pos++,
        'url' => $site['baseUrl'] . '/vakansii/' . $v['slug'],
        'name' => $v['fullTitle'] . ' — ' . $v['salaryText'] . ' · Москва',
    ];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($seo['title']); ?> | Проект Квартира</title>
<meta name="description" content="<?= htmlspecialchars($seo['description']); ?>">
<meta name="robots" content="index, follow">
<meta name="referrer" content="origin-when-crossorigin">
<meta name="content-language" content="ru">
<link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/vakansii'); ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($seo['title']); ?>">
<meta property="og:description" content="<?= htmlspecialchars($seo['description']); ?>">
<meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/vakansii'); ?>">
<meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
<meta property="og:site_name" content="<?= htmlspecialchars($site['name']); ?> — вакансии">
<meta property="og:locale" content="ru_RU">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($seo['title']); ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($seo['description']); ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
<script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@graph":[
    {
      "@type":"ItemList",
      "@id":"<?= htmlspecialchars($site['baseUrl']); ?>/vakansii#vacancies",
      "name":"Вакансии Проект Квартира",
      "numberOfItems": <?= count($vacancies); ?>,
      "itemListElement": <?= json_encode($itemList, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?>
    },
    {
      "@type":"FAQPage",
      "@id":"<?= htmlspecialchars($site['baseUrl']); ?>/vakansii#faq",
      "mainEntity":[
        {"@type":"Question","name":"Как часто платите?","acceptedAnswer":{"@type":"Answer","text":"Каждую неделю без задержек, по факту закрытого этапа. На питание и крупный инструмент — аванс в первый день."}},
        {"@type":"Question","name":"Можно ли жить на объекте?","acceptedAnswer":{"@type":"Answer","text":"Да, на большинстве объектов есть комната/бытовка для проживания. Особенно удобно иногородним — экономия 30–40 тыс ₽ в месяц."}},
        {"@type":"Question","name":"Что за бонус 5% при переходе?","acceptedAnswer":{"@type":"Answer","text":"Сдали объект — переходите на следующий и получаете +5% от сметы предыдущего сверх оплаты. Без простоев."}},
        {"@type":"Question","name":"Нужно ли своё оборудование?","acceptedAnswer":{"@type":"Answer","text":"Мелкий ручной — свой, крупный (станции, станки, леса, торцовки, пресс) — выдаём. На питание и инструмент даём аванс."}},
        {"@type":"Question","name":"Оформление официальное?","acceptedAnswer":{"@type":"Answer","text":"Работа по договору подряда с фиксированными сроками и ставками. Всё прозрачно, без «серых» схем."}},
        {"@type":"Question","name":"Какие объекты?","acceptedAnswer":{"@type":"Answer","text":"Квартиры 40–120 м² в Москве и МО: новостройки, вторичка, дома. Все с дизайн-проектом, прорабом и снабжением."}}
      ]
    }
  ]
}
</script>
<?php include_once dirname(__DIR__, 2) . '/components/head-includes.php'; ?>
<style>
:root{--alfa-red:#f97316;--alfa-red-dark:#ea580c;--alfa-gray:#F5F5F5;--alfa-dark:#1A1A1A;--alfa-text:#333;--alfa-muted:#6B7280;--alfa-border:#E5E7EB}

body.alv-page{font-family:-apple-system,BlinkMacSystemFont,'SF Pro Text','Segoe UI',Roboto,sans-serif;color:var(--alfa-text);background:#fff;-webkit-font-smoothing:antialiased;margin:0;padding:0}
body.alv-page a:focus-visible,body.alv-page button:focus-visible,body.alv-page input:focus-visible,body.alv-page select:focus-visible{outline:2px solid var(--alfa-red);outline-offset:3px;border-radius:6px}

/* ===== HERO ===== */
[data-code="home_head"]::before{content:'';position:absolute;left:0;right:0;bottom:0;height:60px;background-color:var(--alfa-gray);border-radius:60px 60px 0 0;z-index:5}
[data-code="home_head"]::after{content:'';position:absolute;right:-20px;top:0;background-image:url(/public/assets/images/pages/vacansia/hero.jpg);background-size:cover;background-position:center;pointer-events:none;z-index:0;height:105%;width:920px}
[data-code="home_head"] .box{position:relative;z-index:2}
[data-code="home_head"] .box::before,[data-code="home_head"] .intro__content::before{display:none !important}
.box{max-width:1216px;margin:0 auto;padding:0 20px}
@media(min-width:640px){.box{padding:0 32px}}
.intro__content{max-width:640px;width:auto;position:relative;z-index:2;margin-top:62px}
@media(max-width:992px){.intro__content{max-width:100%}}

/* ===== KEYFRAMES ===== */
@keyframes layer1Flow{0%{transform:translate(0,0) scale(1) rotate(0);opacity:.95}12.5%{transform:translate(-40px,25px) scale(1.08) rotate(4deg);opacity:.9}25%{transform:translate(-70px,0) scale(1.12) rotate(0);opacity:.95}37.5%{transform:translate(-50px,-35px) scale(1.06) rotate(-5deg);opacity:.88}50%{transform:translate(0,-50px) scale(.95) rotate(0);opacity:.92}62.5%{transform:translate(45px,-30px) scale(.9) rotate(5deg);opacity:.98}75%{transform:translate(60px,0) scale(.94) rotate(0);opacity:.9}87.5%{transform:translate(35px,30px) scale(1.02) rotate(-4deg);opacity:.94}100%{transform:translate(0,0) scale(1) rotate(0);opacity:.95}}
@keyframes layer2Flow{0%{transform:translate(0,0) scale(1) rotate(0);opacity:.8}12.5%{transform:translate(35px,-20px) scale(.92) rotate(-3deg);opacity:.85}25%{transform:translate(55px,0) scale(.88) rotate(0);opacity:.78}37.5%{transform:translate(40px,30px) scale(.94) rotate(4deg);opacity:.9}50%{transform:translate(0,45px) scale(1.05) rotate(0);opacity:.82}62.5%{transform:translate(-40px,25px) scale(1.1) rotate(-4deg);opacity:.75}75%{transform:translate(-55px,0) scale(1.06) rotate(0);opacity:.88}87.5%{transform:translate(-30px,-25px) scale(.98) rotate(3deg);opacity:.82}100%{transform:translate(0,0) scale(1) rotate(0);opacity:.8}}
@keyframes layer1FlowMobile{0%{transform:translate(0,0) scale(1) rotate(0);opacity:.95}12.5%{transform:translate(-30px,40px) scale(1.05) rotate(3deg);opacity:.9}25%{transform:translate(-50px,25px) scale(1.08) rotate(0);opacity:.95}37.5%{transform:translate(-35px,10px) scale(1.04) rotate(-3deg);opacity:.88}50%{transform:translate(0,-5px) scale(.98) rotate(0);opacity:.92}62.5%{transform:translate(35px,20px) scale(.94) rotate(4deg);opacity:.98}75%{transform:translate(45px,35px) scale(.96) rotate(0);opacity:.9}87.5%{transform:translate(25px,50px) scale(1.02) rotate(-3deg);opacity:.94}100%{transform:translate(0,0) scale(1) rotate(0);opacity:.95}}
@media(max-width:1024px){[data-code="home_head"]::after{width:500px;right:-40px}}
@media(max-width:992px){[data-code="home_head"] .box::before{box-shadow:36px 331px 0 200px #D46DFA,-271px 369px 0 150px #EF3124,180px 220px 0 130px #EF3124}[data-code="home_head"] .box::after{content:none}[data-code="home_head"]{min-height:600px}}
@media(max-width:768px){[data-code="home_head"]::after{width:100%;height:200px;right:0;top:auto;bottom:0;opacity:.15;background-position:center 30%}[data-code="home_head"]::before{display:none}[data-code="home_head"]{background-color:white !important;min-height:auto;padding:32px 0 72px !important;overflow:hidden}[data-code="home_head"] .intro__content::before{content:none}[data-code="home_head"] .box::before{display:none !important}[data-code="home_head"] .intro__content{margin-top:48px !important}}

/* ===== LAYOUT ===== */
.alv-container{max-width:1216px;margin:0 auto;padding:0 20px}
@media(min-width:640px){.alv-container{padding:0 32px}}
.alv-section{padding:48px 0}
@media(min-width:768px){.alv-section{padding:64px 0}}
@media(max-width:480px){.alv-section{padding:32px 0}}
.alv-section-gray{background:var(--alfa-gray)}
.alv-section-dark{background:radial-gradient(800px 400px at 85% -10%,rgba(239,49,36,.18),transparent 60%),radial-gradient(600px 400px at 10% 110%,rgba(212,109,250,.12),transparent 60%),var(--alfa-dark);color:#fff;position:relative;overflow:hidden}
.alv-section-dark::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.04) 1px,transparent 1px);background-size:20px 20px;opacity:.5;pointer-events:none}

/* ===== EYEBROW + ORNAMENT ===== */
.alv-eyebrow{display:flex;align-items:center;gap:12px;font-size:12px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--alfa-red)}
.alv-eyebrow::before{content:'';width:32px;height:1px;background:var(--alfa-red)}
.alv-eyebrow.center{justify-content:center}
.alv-eyebrow.center::after{content:'';width:32px;height:1px;background:var(--alfa-red)}
.alv-count{font-weight:800;color:var(--alfa-dark);letter-spacing:0;background:var(--alfa-gray);padding:4px 12px;border-radius:8px;font-size:12px;white-space:nowrap}
.alv-section-title{font-size:clamp(24px,3.5vw,40px);font-weight:800;line-height:1.1;letter-spacing:-.03em;color:var(--alfa-dark);margin:12px 0 0}
.alv-section-desc{font-size:17px;color:var(--alfa-muted);line-height:1.6;margin-top:12px;max-width:600px}
.alv-orn{display:flex;align-items:center;justify-content:center;gap:14px;color:#D1D5DB;margin:24px 0}
.alv-orn::before,.alv-orn::after{content:'';height:1px;width:min(200px,28vw);background:linear-gradient(90deg,transparent,#E5E7EB,transparent)}
.alv-orn i{width:7px;height:7px;border:1px solid #D1D5DB;transform:rotate(45deg)}

/* ===== CARDS ===== */
.alv-grid{display:flex;flex-wrap:wrap;gap:16px;width:100%;margin:0 auto;overflow:hidden}
.alv-card{display:block;width:100%;min-width:0;box-sizing:border-box;background:#fff;border:1px solid var(--alfa-border);border-radius:24px;padding:24px;text-decoration:none;color:inherit;box-shadow:0 4px 24px rgba(0,0,0,.06);transition:box-shadow .2s,transform .2s}
.alv-card:hover{box-shadow:0 8px 32px rgba(0,0,0,.10);transform:translateY(-1px)}
@media(min-width:640px){.alv-card{width:calc(50% - 8px)}}
@media(max-width:640px){.alv-card{padding:16px;border-radius:16px}}
.alv-card-badges{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:24px}
.alv-card-badge{display:inline-flex;align-items:center;min-height:32px;padding:6px 12px;border-radius:8px;background:#F0F0F0;color:#333;font-size:13px;font-weight:500;line-height:1.2}
.alv-card-badge.hot{background:#FFF1E8;color:#C2410C}
.alv-card h3{margin:0;font-size:22px;font-weight:700;line-height:1.25;letter-spacing:-.02em;color:#1A1A1A}
.alv-card-meta{margin-top:8px;font-size:15px;line-height:1.4;color:#6B7280}
.alv-card-desc{margin-top:12px;font-size:15px;line-height:1.5;color:#333}
.alv-card-footer{margin-top:24px;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
.alv-card-cta{display:inline-flex;align-items:center;justify-content:center;min-height:40px;padding:8px 16px;border-radius:12px;background:var(--alfa-red);color:#fff;font-size:14px;font-weight:600;line-height:1}
.alv-card:hover .alv-card-cta{background:var(--alfa-red-dark)}
.alv-card-price{margin:0 0 0 auto;font-size:18px;font-weight:700;color:#1A1A1A;font-variant-numeric:tabular-nums;white-space:nowrap}

/* ===== BENEFITS ===== */
.alv-benefits{display:grid;grid-template-columns:1fr;gap:16px}
@media(min-width:640px){.alv-benefits{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1024px){.alv-benefits{grid-template-columns:repeat(4,1fr)}}
.alv-benefit{position:relative;background:#fff;border:1px solid var(--alfa-border);border-radius:16px;padding:24px;transition:all .35s cubic-bezier(.2,.7,.3,1);overflow:hidden}
.alv-benefit::before{content:'';position:absolute;top:0;left:20px;right:20px;height:1px;background:linear-gradient(90deg,transparent,rgba(239,49,36,.25),transparent);opacity:0;transition:opacity .3s}
.alv-benefit:hover::before{opacity:1}
.alv-benefit:hover{transform:translateY(-6px);box-shadow:0 16px 32px rgba(0,0,0,.08);border-color:rgba(212,109,250,.3)}
.alv-benefit-num{position:absolute;top:14px;right:16px;font-size:40px;font-weight:800;line-height:1;color:var(--alfa-gray);letter-spacing:-.04em;pointer-events:none;transition:color .3s}
.alv-benefit:hover .alv-benefit-num{color:rgba(239,49,36,.08)}
.alv-benefit-icon{width:44px;height:44px;border-radius:50%;border:1px solid var(--alfa-red);color:var(--alfa-red);display:flex;align-items:center;justify-content:center;background:#FFF5F5}
.alv-benefit h4{font-size:15px;font-weight:700;color:var(--alfa-dark);margin:16px 0 0}
.alv-benefit p{font-size:14px;color:var(--alfa-muted);line-height:1.5;margin:6px 0 0}

/* ===== STEPS ===== */
.alv-steps{display:grid;grid-template-columns:1fr;gap:16px;max-width:1000px;margin:40px auto 0;position:relative}
@media(min-width:1024px){.alv-steps::before{content:'';position:absolute;top:48px;left:12%;right:12%;height:1px;background:linear-gradient(90deg,transparent 0%,#E5E7EB 12%,#E5E7EB 88%,transparent 100%);border-top:1px dashed #E5E7EB}}
@media(min-width:640px){.alv-steps{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1024px){.alv-steps{grid-template-columns:repeat(4,1fr)}}
.alv-step{background:#fff;border:1px solid var(--alfa-border);border-radius:16px;padding:24px;text-align:center;position:relative;transition:transform .3s cubic-bezier(.2,.7,.3,1),box-shadow .3s,border-color .3s}
.alv-step:hover{transform:translateY(-4px);box-shadow:0 12px 28px rgba(0,0,0,.07);border-color:rgba(212,109,250,.25)}
.alv-step-num{width:48px;height:48px;border-radius:50%;background:var(--alfa-dark);color:#fff;display:flex;align-items:center;justify-content:center;margin:0 auto;font-size:18px;font-weight:800;border:2px solid rgba(239,49,36,.3);position:relative;z-index:1;transition:transform .3s cubic-bezier(.2,.7,.3,1),box-shadow .3s}
.alv-step:hover .alv-step-num{transform:scale(1.08);box-shadow:0 8px 20px rgba(239,49,36,.25)}
.alv-step h4{font-size:15px;font-weight:700;color:var(--alfa-dark);margin:16px 0 0}
.alv-step p{font-size:13px;color:var(--alfa-muted);line-height:1.5;margin:6px 0 0}

/* ===== FAQ ===== */
.alv-faq{border-bottom:1px solid var(--alfa-border);border-radius:0;transition:background .2s}
.alv-faq:has(.alv-faq-toggle[aria-expanded="true"]){background:#fff;margin:0 -16px;padding:0 16px;border-radius:16px;border:1px solid var(--alfa-border);box-shadow:0 8px 24px rgba(0,0,0,.06)}
@media(min-width:640px){.alv-faq:has(.alv-faq-toggle[aria-expanded="true"]){margin:0 -20px;padding:0 20px}}
@media(max-width:640px){.alv-faq:has(.alv-faq-toggle[aria-expanded="true"]){margin:0;padding:0 12px}}
.alv-faq:first-child{border-top:1px solid var(--alfa-border)}
.alv-faq-toggle{width:100%;display:flex;align-items:center;justify-content:space-between;gap:16px;padding:20px 0;text-align:left;font-weight:700;font-size:16px;color:var(--alfa-dark);background:none;border:none;cursor:pointer;transition:color .2s}
.alv-faq-toggle:hover{color:var(--alfa-red)}
.alv-faq-toggle i{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:var(--alfa-gray);color:var(--alfa-muted);transition:transform .35s cubic-bezier(.2,.7,.3,1),background .2s,color .2s;flex-shrink:0;font-size:12px}
.alv-faq-toggle:hover i{background:#fff;color:var(--alfa-red);border:1px solid var(--alfa-border)}
.alv-faq-toggle[aria-expanded="true"] i{transform:rotate(180deg);background:var(--alfa-dark);color:#fff;border-color:var(--alfa-dark)}
.alv-faq-content{display:grid;grid-template-rows:0fr;transition:grid-template-rows .35s cubic-bezier(.2,.7,.3,1)}
.alv-faq-content.open{grid-template-rows:1fr}
.alv-faq-content>div{overflow:hidden}
.alv-faq-content-inner{padding-bottom:20px;font-size:15px;color:var(--alfa-muted);line-height:1.65;max-width:640px}

/* ===== BUTTONS ===== */
.alv-btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;min-height:52px;padding:14px 28px;border-radius:12px;font-weight:700;font-size:16px;line-height:1.25;white-space:nowrap;text-decoration:none;transition:all .2s;border:none;cursor:pointer}
.alv-btn-red{background:var(--alfa-red);color:#fff}
.alv-btn-red:hover{background:var(--alfa-red-dark);box-shadow:0 8px 24px rgba(239,49,36,.3)}
.alv-btn-dark{background:var(--alfa-dark);color:#fff}
.alv-btn-dark:hover{background:#000}
.alv-btn-block{width:100%}
@media(max-width:520px){.alv-btn{width:100%;white-space:normal;text-align:center}}
@media(max-width:480px){.alv-btn{min-height:46px;padding:10px 16px;font-size:14px}}

/* ===== EMPTY STATE ===== */
.alv-empty{text-align:center;padding:64px 20px}
.alv-empty-icon{width:64px;height:64px;border-radius:50%;border:1px solid var(--alfa-border);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:var(--alfa-muted);font-size:24px}

/* ===== FORM ===== */
.alv-form-card{background:#fff;border:1px solid var(--alfa-border);border-radius:24px;padding:32px;box-shadow:0 20px 50px rgba(0,0,0,.08)}
.alv-form-card select,.alv-form-card input[type="text"],.alv-form-card input[type="tel"]{width:100%;padding:14px 16px;border:1.5px solid var(--alfa-border);border-radius:12px;background:#F9FAFB;font-size:14px;color:var(--alfa-dark);transition:border-color .2s,box-shadow .2s}
.alv-form-card select:focus,.alv-form-card input:focus{outline:none;border-color:var(--alfa-red);box-shadow:0 0 0 4px rgba(239,49,36,.12);background:#fff}
.alv-form-card select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236B7280' viewBox='0 0 16 16'%3E%3Cpath d='M4 6l4 4 4-4'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;padding-right:40px}
@media(max-width:640px){.alv-form-card{padding:20px}}
/* ===== HERO TEXT ===== */
.main-text{font-weight:700;font-size:48px;font-family:'SF Pro Text',sans-serif}
.main-text-red{color:#f97316;white-space:nowrap}
.brake{display:inline;white-space:nowrap}
.subtitle{font-size:16px;font-weight:400;font-family:'SF Pro Text',sans-serif;margin-top:0}
.header-link{font-weight:400 !important}
.intro__text{font-weight:600;font-size:20px;line-height:calc(26/20)}
@media(max-width:768px){.main-text{font-weight:600;font-size:34px}.brake{display:block}}

/* ===== CTA GRID ===== */
.alv-cta-grid{display:grid;gap:32px;align-items:center;max-width:1100px;margin:0 auto;grid-template-columns:1fr}
@media(min-width:768px){.alv-cta-grid{grid-template-columns:1fr 1fr;gap:48px}}
.alv-cta-eyebrow{color:var(--alfa-red)}

/* ===== HERO SECTION ===== */
.alv-hero{padding:64px 0 60px;min-height:674px}
@media(max-width:768px){.alv-hero{padding:32px 0 72px;min-height:auto}}
.alv-hero-text{color:#000}

/* ===== EMPTY STATE ===== */
.alv-empty-title{font-weight:700;color:var(--alfa-dark)}
.alv-empty-desc{font-size:14px;color:var(--alfa-muted);margin-top:4px}
.alv-empty-reset{font-size:14px}

/* ===== STEPS / FAQ CONTAINER ===== */
.alv-steps-header{text-align:center}
.alv-faq-container{max-width:720px}

/* ===== CTA SECTION ===== */
.alv-cta-title{color:#fff}
.alv-cta-desc{color:rgba(255,255,255,0.7)}
.alv-cta-list{margin-top:24px;display:grid;gap:16px;font-size:15px;color:rgba(255,255,255,0.8);list-style:none;padding:0}
.alv-cta-list-item{display:flex;align-items:center;gap:12px}
.alv-cta-check{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;background:rgba(255,255,255,0.1)}
.alv-cta-check i{font-size:12px}

/* ===== FORM ELEMENTS ===== */
.alv-form-title{font-size:20px;font-weight:800;color:var(--alfa-dark);margin:0}
.alv-form-subtitle{font-size:14px;color:var(--alfa-muted);margin-top:4px}
.alv-form-grid{margin-top:24px;display:grid;gap:16px}
.alv-phone-wrap{position:relative}
.alv-phone-label{position:absolute;top:-8px;left:16px;font-size:11px;color:var(--alfa-muted);background:#fff;padding:0 4px}
.alv-phone-required{color:var(--alfa-red)}
.alv-checkbox-label{display:flex;align-items:flex-start;gap:8px;font-size:12px;color:var(--alfa-muted);cursor:pointer}
.alv-checkbox{accent-color:var(--alfa-red);margin-top:2px}
.alv-form-footer{font-size:12px;color:#9CA3AF;text-align:center}
.alv-form-phone-link{color:var(--alfa-dark);font-weight:700;text-decoration:none;transition:color .2s}
.alv-form-phone-link:hover{color:var(--alfa-red)}
.alv-form-agreement{text-decoration:underline}

[data-code="choose"]{display:none}

/* ===== EXTERNAL CLASS OVERRIDES (framework-generated) ===== */
.ChipLinksWidget_chip-links__WBefA{margin-top:24px;overflow:visible}
.ChipLinksWidget_chip-links__desktop__MCYxe{display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.ChipLinksWidget_chip-links__chip__6irpI{min-height:44px;padding:10px 18px !important;border-radius:999px;border:1.5px solid #E5E7EB;background:#fff;color:#1A1A1A;font-size:14px;font-weight:500;display:inline-flex;align-items:center;cursor:pointer;transition:all .2s;white-space:nowrap}
.ChipLinksWidget_chip-links__chip__6irpI:hover{border-color:#EF3124;color:#EF3124;transform:translateY(-1px)}
.ChipLinksWidget_chip-links__chip__6irpI.active,.ChipLinksWidget_chip-links__chip__6irpI[data-active="true"]{background:#1A1A1A !important;color:#fff !important;border-color:#1A1A1A !important}
.ChipLinksWidget_chip-links__hightlited__tU0Cw{background:#fff !important;color:#1A1A1A !important;border:1.5px solid #1A1A1A !important;display:inline-flex;align-items:center;gap:6px}
.ChipLinksWidget_chip-links__hightlited__tU0Cw:hover{background:#1A1A1A !important;color:#fff !important}
.HorizontalScroll_scroll__Zsnig{overflow:visible;scrollbar-width:none;-ms-overflow-style:none}
.HorizontalScroll_scroll__Zsnig::-webkit-scrollbar{display:none}
.HorizontalScroll_content__llf9q{display:flex;gap:8px;flex-wrap:wrap}
.ChipLinksWidget_chip-links__mobile__fn_sT{display:none}
@media(max-width:768px){.ChipLinksWidget_chip-links__desktop__MCYxe{display:none}.ChipLinksWidget_chip-links__mobile__fn_sT{display:block}}
.SearchBarWidget_search-bar__6dISE{position:relative;margin-top:32px;max-width:600px}
.SearchBarWidget_search-bar__wrapper__vZFcH{position:relative;display:flex;align-items:center;background:#F2F4F7;border-radius:999px;padding:14px 16px;gap:12px;transition:background .2s,box-shadow .2s}
.SearchBarWidget_search-bar__wrapper__vZFcH:focus-within{background:#fff;box-shadow:0 0 0 4px rgba(239,49,36,.12)}
.SearchBarWidget_search-bar__search-icon___aBy_{color:#9CA3AF;flex-shrink:0}
.SearchBarWidget_search-bar__input__18IWy{flex:1;border:none;background:transparent;font-size:16px;color:#1A1A1A;outline:none}
.SearchBarWidget_search-bar__input__18IWy::placeholder{color:#9CA3AF}
.SearchBarWidget_suggest{display:none;position:absolute;left:0;right:0;top:calc(100% + 12px);background:#fff;border:1px solid #E5E7EB;border-radius:16px;box-shadow:0 20px 40px rgba(0,0,0,.12);padding:8px;z-index:20}
.SearchBarWidget_suggest.open{display:block}
.SearchBarWidget_suggest a{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;font-size:14px;color:#1A1A1A;text-decoration:none}
.SearchBarWidget_suggest a:hover{background:#F5F5F5}
.SearchBarWidget_suggest a span{color:#6B7280;font-size:12px;margin-left:auto}

/* ===== REDUCED MOTION ===== */
@media(prefers-reduced-motion:reduce){.alv-faq-content{transition:none !important}[data-code="home_head"]::before{animation:none !important}html{scroll-behavior:auto}}
</style>
</head>
<body class="alv-page">
<?php include_once dirname(__DIR__, 2) . '/components/header.php'; ?>
<main style="padding-top:80px">

<section id="vacancies" data-code="home_head" class="relative overflow-hidden bg-white alv-hero"><div class="box"><div class="intro__content">
<div class="recommend-block" style="display:none"><button role="button" type="button" class="button button_style_red button_view_default button_size_m button_theme_alfa-on-white"><span class="button__content"><span class="button__text">Приведи друга</span></span></button></div>
<div class="text intro__text alv-hero-text"><p class="main-text">Работа <span class="brake"> в&nbsp;<span class="main-text-red">Проект Квартира</span></span></p>
<p class="subtitle"><?= (int)$vacCount; ?> вакансий от 110 000 ₽ — еженедельные выплаты, жильё на объекте, бонус +5% — <a class="header-link" href="https://pkvartira.ru" target="_blank">pkvartira.ru</a></p></div>
<div class="SearchBarWidget_search-bar__6dISE"><div class="SearchBarWidget_search-bar__wrapper__vZFcH" id="alvSearchWrap"><svg class="SearchBarWidget_search-bar__search-icon___aBy_" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"></circle><line x1="16.5" y1="16.5" x2="21" y2="21"></line></svg><input id="alvSearch" type="text" placeholder="Найти вакансию" class="SearchBarWidget_search-bar__input__18IWy" value="" autocomplete="off" spellcheck="false"><button type="button" class="alv-search-clear" id="alvClear" aria-label="Очистить" style="width:32px;height:32px;border-radius:50%;background:#E5E7EB;color:#6B7280;border:none;cursor:pointer;line-height:0"><svg width="14" height="14" viewBox="0 0 16 16" fill="none" style="display:block;margin:auto"><path d="M4 4L12 12M12 4L4 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></button></div><div class="SearchBarWidget_suggest" id="alvSuggest"></div></div>
<div class="ChipLinksWidget_chip-links__WBefA" id="alvChips"><div class="ChipLinksWidget_chip-links__desktop__MCYxe" id="alvChipsScroll">
<button type="button" data-filter="otdelka" class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-0__q99S8 alv-chip">Отделка · <?= $catCount['otdelka']; ?></button>
<button type="button" data-filter="engineering" class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-1__lKFd4 alv-chip">Инженерия · <?= $catCount['engineering']; ?></button>
<button type="button" data-filter="stroika" class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-2__27fpa alv-chip">Стройка · <?= $catCount['stroika']; ?></button>
<button type="button" data-filter="universal" class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-3__Xb_rI alv-chip">Универсал · <?= $catCount['universal']; ?></button>
<button type="button" data-filter="all" class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-4__PktNc active alv-chip" data-active="true">Все · <?= $catCount['all']; ?></button>
<div class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-links__hightlited__tU0Cw alv-chip" data-filter="all" onclick="document.querySelectorAll('[data-filter]').forEach(b=>b.classList.remove('active'));document.querySelector('[data-filter=all]').classList.add('active');document.getElementById('alvSearch').value='';document.getElementById('alvSearch').dispatchEvent(new Event('input'))">Все вакансии<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 0C15.5229 1.05821e-05 20 4.47721 20 10C20 15.5228 15.5229 20 10 20C4.47717 20 2.41411e-07 15.5229 0 10C2.74e-07 4.4772 4.47717 2.41411e-07 10 0ZM7.29297 5.70703L11.5859 10L7.29297 14.293L8.70703 15.707L14.4141 10L8.70703 4.29297L7.29297 5.70703Z" fill="currentColor"></path></svg></div>
</div>
<div class="ChipLinksWidget_chip-links__mobile__fn_sT"><div class="HorizontalScroll_scroll__Zsnig"><div class="HorizontalScroll_content__llf9q">
<button type="button" data-filter="otdelka" class="ChipLinksWidget_chip-links__chip__6irpI alv-chip">Отделка</button>
<button type="button" data-filter="engineering" class="ChipLinksWidget_chip-links__chip__6irpI alv-chip">Инженерия</button>
<button type="button" data-filter="stroika" class="ChipLinksWidget_chip-links__chip__6irpI alv-chip">Стройка</button>
<button type="button" data-filter="universal" class="ChipLinksWidget_chip-links__chip__6irpI alv-chip">Универсал</button>
<div class="ChipLinksWidget_chip-links__chip__6irpI ChipLinksWidget_chip-links__chip--highlighted-new__GbMBw alv-chip" data-filter="all">Все вакансии<svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M10 0C15.5229 1.05821e-05 20 4.47721 20 10C20 15.5228 15.5229 20 10 20C4.47717 20 2.41411e-07 15.5229 0 10C2.74e-07 4.4772 4.47717 2.41411e-07 10 0ZM7.29297 5.70703L11.5859 10L7.29297 14.293L8.70703 15.707L14.4141 10L8.70703 4.29297L7.29297 5.70703Z" fill="currentColor"></path></svg></div>
</div></div></div></div>
</div></div>
</section>

<!-- ============ CARDS GRID ============ -->
<section class="alv-section">
  <div class="alv-container">
    <div class="alv-eyebrow center">Открытые позиции · <span id="alvCount" class="alv-count"><?= count($vacancies); ?> вакансий</span></div>
    <h2 class="alv-section-title text-center mt-3">Выберите свою вакансию</h2>
    <div class="alv-orn mt-4"><i></i></div>

    <div id="alvGrid" class="alv-grid mt-8">
      <?php foreach ($vacancies as $v):
        $cat = $catOf($v);
      ?>
      <a href="<?= htmlspecialchars($site['baseUrl']); ?>/vakansii/<?= htmlspecialchars($v['slug']); ?>" data-category="<?= htmlspecialchars($cat); ?>" data-title="<?= htmlspecialchars(mb_strtolower($v['title'].' '.$v['fullTitle'].' '.$v['city'].' '.$v['subtitle'], 'UTF-8')); ?>" class="alv-card">
        <div class="alv-card-badges">
          <span class="alv-card-badge"><?= htmlspecialchars($v['employment']); ?></span>
          <span class="alv-card-badge"><?= htmlspecialchars($v['experience']); ?></span>
          <span class="alv-card-badge"><?= htmlspecialchars($v['schedule']); ?></span>
          <?php if (!empty($v['hot'])): ?><span class="alv-card-badge hot">Горячая</span><?php endif; ?>
          <?php if (!empty($v['top'])): ?><span class="alv-card-badge">Топ ставка</span><?php endif; ?>
        </div>
        <h3><?= htmlspecialchars($v['fullTitle']); ?></h3>
        <div class="alv-card-meta"><?= htmlspecialchars($v['city']); ?></div>
        <p class="alv-card-desc"><?= htmlspecialchars($v['subtitle']); ?></p>
        <div class="alv-card-footer">
          <span class="alv-card-cta">Откликнуться</span>
          <span class="alv-card-price"><?= htmlspecialchars($v['salaryText']); ?></span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div id="alvEmpty" class="alv-empty hidden">
      <div class="alv-empty-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
      <div class="alv-empty-title">Ничего не нашли</div>
      <div class="alv-empty-desc">Попробуйте другое слово — например «плиточник» или «универсал»</div>
      <button type="button" onclick="document.getElementById('alvSearch').value='';document.getElementById('alvSearch').dispatchEvent(new Event('input'))" class="alv-btn alv-btn-dark mt-6 alv-empty-reset">Сбросить поиск</button>
    </div>
  </div>
</section>

<!-- ============ BENEFITS ============ -->
<section class="alv-section alv-section-gray">
  <div class="alv-container">
    <div class="alv-eyebrow">Почему именно мы</div>
    <h2 class="alv-section-title mt-3">Условия, из-за которых<br>не хочется уходить</h2>
    <p class="alv-section-desc">Честно про деньги, быт и загрузку. Без «золотых гор» — только то, что выполняем каждый день.</p>

    <div class="alv-benefits mt-8">
      <?php $bi=0; foreach ($benefits as $b): $bi++; ?>
      <div class="alv-benefit">
        <span class="alv-benefit-num"><?= sprintf('%02d',$bi); ?></span>
        <div class="alv-benefit-icon"><i class="fa-solid <?= htmlspecialchars($b['icon']); ?>"></i></div>
        <h4><?= htmlspecialchars($b['title']); ?></h4>
        <p><?= htmlspecialchars($b['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ STEPS ============ -->
<section class="alv-section">
  <div class="alv-container">
    <div class="alv-steps-header">
      <div class="alv-eyebrow center">Путь в команду</div>
      <h2 class="alv-section-title mt-3">От отклика до объекта — 1–2 дня</h2>
      <div class="alv-orn mt-4"><i></i></div>
    </div>

    <div class="alv-steps">
      <?php foreach ($steps as $s): ?>
      <div class="alv-step">
        <div class="alv-step-num"><?= htmlspecialchars($s['num']); ?></div>
        <h4><?= htmlspecialchars($s['title']); ?></h4>
        <p><?= htmlspecialchars($s['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="alv-section alv-section-gray">
  <div class="alv-container alv-faq-container">
    <div class="alv-eyebrow center">Вопросы и ответы</div>
    <h2 class="alv-section-title text-center mt-3">Отвечаем честно</h2>
    <div class="alv-orn mt-4 mb-6"><i></i></div>

    <div>
      <?php
      $faqs = [
        ['q'=>'Как часто платите?','a'=>'Каждую неделю, без задержек. Закрыли этап — в пятницу/понедельник деньги на карту. На питание даём аванс в первый день.'],
        ['q'=>'Можно ли жить на объекте?','a'=>'Да, почти на всех объектах есть бытовка или выделенная комната с душем и кухней. Для иногородних это экономия 30–40 тыс ₽ в месяц на жилье.'],
        ['q'=>'Что за бонус 5% при переходе?','a'=>'Сдаёте объект, переходите на следующий — получаете дополнительно 5% от сметы сданного объекта. Так мотивируем без простоев и быстро сдавать качество.'],
        ['q'=>'Нужно ли своё оборудование?','a'=>'Мелкий ручной инструмент — свой (валики, шпатели, уровень). Крупный — наш: штукатурные станции, плиткорезы 1200, торцовки, леса, пресс-клещи, краскопульты.'],
        ['q'=>'Какие объекты?','a'=>'Квартиры 40–120 м² в Москве и МО: новостройки, вторичка, дома. Все с дизайн-проектом, прорабом и снабжением. Вы не бегаете за материалом.'],
        ['q'=>'Оформление?','a'=>'По договору подряда с фиксированными расценками (м²/точка/шт). Всё прозрачно, оплата по акту.'],
      ];
      foreach ($faqs as $f): ?>
      <div class="alv-faq">
        <button type="button" class="alv-faq-toggle" aria-expanded="false">
          <span><?= htmlspecialchars($f['q']); ?></span><i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="alv-faq-content"><div><div class="alv-faq-content-inner"><?= htmlspecialchars($f['a']); ?></div></div></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ FINAL CTA ============ -->
<section class="alv-section alv-section-dark">
  <div class="alv-container">
    <div class="alv-cta-grid">
      <div>
        <div class="alv-eyebrow alv-cta-eyebrow">Последний шаг</div>
        <h2 class="alv-section-title alv-cta-title mt-4">Готовы выйти на объект<br>уже на этой неделе?</h2>
        <p class="alv-section-desc alv-cta-desc mt-4">Оставьте номер — перезвоним за 10 минут, подберём ближайший объект под вашу специализацию.</p>
        <ul class="alv-cta-list">
          <li class="alv-cta-list-item"><span class="alv-cta-check"><i class="fa-solid fa-check"></i></span> Отвечаем 9:00–22:00 без выходных</li>
          <li class="alv-cta-list-item"><span class="alv-cta-check"><i class="fa-solid fa-check"></i></span> Подберём объект рядом с домом</li>
          <li class="alv-cta-list-item"><span class="alv-cta-check"><i class="fa-solid fa-check"></i></span> Аванс и инструмент — в первый день</li>
        </ul>
      </div>
      <div class="alv-form-card">
        <h3 class="alv-form-title">Оставить отклик</h3>
        <p class="alv-form-subtitle">Займёт 1 минуту. Перезвоним за 10 минут.</p>
        <form action="/send/email" method="POST" data-form-id="vakansii_hub_bottom" class="alv-form-grid">
          <select name="Вакансия" aria-label="Вакансия">
            <option value="" disabled selected>Выберите вакансию</option>
            <?php foreach ($vacancies as $v): ?>
            <option value="<?= htmlspecialchars($v['fullTitle']); ?>"><?= htmlspecialchars($v['fullTitle']); ?> — <?= htmlspecialchars($v['salaryShort']); ?></option>
            <?php endforeach; ?>
          </select>
          <input type="text" name="имя" placeholder="Ваше имя" aria-label="Имя">
          <div class="alv-phone-wrap">
            <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн" placeholder="(___) ___-__-__" required aria-label="Телефон">
            <span class="alv-phone-label">Телефон <span class="alv-phone-required">*</span></span>
          </div>
          <label class="alv-checkbox-label"><input type="checkbox" required class="alv-checkbox"> <span>Согласен на обработку персональных данных и <a href="/soglashenie" class="alv-form-agreement">соглашение</a></span></label>
          <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
          <button type="submit" class="alv-btn alv-btn-red alv-btn-block"><span>Откликнуться</span></button>
          <p class="alv-form-footer">Или позвоните: <a href="tel:<?= htmlspecialchars($site['phone']); ?>" class="alv-form-phone-link"><?= htmlspecialchars($site['phone']); ?></a></p>
        </form>
      </div>
    </div>
  </div>
</section>

</main>
<?php include_once dirname(__DIR__, 2) . '/components/footer.php'; ?>
<script src="<?= TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js'); ?>" defer></script>
<script src="<?= TheFunction::asset('/public/assets/scripts/main/header.min.js'); ?>" defer></script>
<script src="<?= TheFunction::asset('/public/assets/scripts/components/reveal.min.js'); ?>" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  // FAQ — аккордеон, только один открыт, smooth grid animation + :has()
  var faqItems = Array.from(document.querySelectorAll('.alv-faq'));
  faqItems.forEach(function(item){
    var btn = item.querySelector('.alv-faq-toggle');
    var content = item.querySelector('.alv-faq-content');
    btn.addEventListener('click', function(){
      var isOpen = btn.getAttribute('aria-expanded') === 'true';
      faqItems.forEach(function(o){
        o.querySelector('.alv-faq-toggle').setAttribute('aria-expanded','false');
        o.querySelector('.alv-faq-content').classList.remove('open');
      });
      if(!isOpen){
        btn.setAttribute('aria-expanded','true');
        content.classList.add('open');
      }
    });
  });

  var search = document.getElementById('alvSearch');
  var searchWrap = document.getElementById('alvSearchWrap');
  var clearBtn = document.getElementById('alvClear');
  var suggestBox = document.getElementById('alvSuggest');
  var grid = document.getElementById('alvGrid');
  var cards = grid ? Array.from(grid.querySelectorAll('.alv-card')) : [];
  var chips = Array.from(document.querySelectorAll('.alv-chip'));
  var chipsWrap = document.getElementById('alvChips');
  var chipsScroll = document.getElementById('alvChipsScroll');
  var countEl = document.getElementById('alvCount');
  var emptyEl = document.getElementById('alvEmpty');
  var activeCat = 'all';

  var suggestData = [
    {q:'Маляр', cat:'otdelka', label:'Отделка · 4 вакансии'},
    {q:'Плиточник', cat:'otdelka', label:'Отделка'},
    {q:'Штукатур', cat:'otdelka', label:'Отделка'},
    {q:'Плотник', cat:'otdelka', label:'Отделка'},
    {q:'Сантехник', cat:'engineering', label:'Инженерия'},
    {q:'Электрик', cat:'engineering', label:'Инженерия'},
    {q:'Каменщик', cat:'stroika', label:'Стройка'},
    {q:'Универсал', cat:'universal', label:'Топ ставка 140–220k'},
  ];

  function word(n,f){n=Math.abs(n)%100;var d=n%10;if(n>10&&n<20)return f[2];if(d>1&&d<5)return f[1];if(d===1)return f[0];return f[2];}

  function renderSuggest(q){
    if(!q || q.length < 2){ suggestBox.classList.remove('open'); suggestBox.innerHTML=''; return; }
    var qq = q.toLowerCase();
    var hits = suggestData.filter(function(s){ return s.q.toLowerCase().indexOf(qq) !== -1; }).slice(0,5);
    if(!hits.length){ suggestBox.classList.remove('open'); return; }
    suggestBox.innerHTML = hits.map(function(h){
      return '<a href="#" data-suggest="'+h.q+'" data-cat="'+h.cat+'"><i class="fa-solid fa-magnifying-glass" style="color:#9CA3AF"></i> '+h.q+' <span>'+h.label+'</span></a>';
    }).join('');
    suggestBox.classList.add('open');
  }

  function apply(){
    var q = (search && search.value || '').trim().toLowerCase();
    var visible = 0;
    cards.forEach(function(card){
      var title = card.getAttribute('data-title') || '';
      var cat = card.getAttribute('data-category') || '';
      var matchQ = !q || title.indexOf(q) !== -1;
      var matchCat = activeCat==='all' || cat===activeCat;
      var show = matchQ && matchCat;
      card.style.display = show ? '' : 'none';
      if(show){
        card.style.opacity='0'; card.style.transform='translateY(8px)';
        requestAnimationFrame(function(){ card.style.transition='opacity .35s ease, transform .35s cubic-bezier(0.2,0.7,0.3,1)'; card.style.opacity='1'; card.style.transform='none'; });
        visible++;
      }
    });
    if(countEl){
      countEl.style.transform='scale(1.08)'; countEl.style.transition='transform .15s';
      countEl.textContent = visible + ' ' + word(visible,['вакансия','вакансии','вакансий']);
      setTimeout(function(){ countEl.style.transform=''; },150);
    }
    if(emptyEl) emptyEl.classList.toggle('hidden', visible!==0);
    if(clearBtn) clearBtn.classList.toggle('visible', !!q);
    renderSuggest(search.value.trim());
  }

  if(search){
    search.addEventListener('input', apply);
    search.addEventListener('focus', function(){ if(search.value.trim().length>=2) renderSuggest(search.value.trim()); });
    search.addEventListener('keydown', function(e){
      if(e.key==='Escape'){ suggestBox.classList.remove('open'); search.blur(); }
      if(e.key==='Enter'){ suggestBox.classList.remove('open'); }
    });
  }
  if(clearBtn){
    clearBtn.addEventListener('click', function(){
      search.value=''; search.focus(); apply();
    });
  }
  if(suggestBox){
    suggestBox.addEventListener('click', function(e){
      var a = e.target.closest('a[data-suggest]');
      if(!a) return;
      e.preventDefault();
      search.value = a.getAttribute('data-suggest');
      var cat = a.getAttribute('data-cat');
      if(cat){
        chips.forEach(function(c){ c.classList.toggle('active', c.getAttribute('data-filter')===cat); });
        activeCat = cat;
      }
      suggestBox.classList.remove('open');
      apply();
      document.getElementById('alvGrid').scrollIntoView({behavior:'smooth', block:'start'});
    });
  }
  document.addEventListener('click', function(e){
    var bar = document.querySelector('.SearchBarWidget_search-bar__6dISE');
    if(bar && !bar.contains(e.target) && suggestBox) suggestBox.classList.remove('open');
  });

  // chips — скролл + fade edges
  function updateChipsFade(){
    if(!chipsScroll || !chipsWrap) return;
    var max = chipsScroll.scrollWidth - chipsScroll.clientWidth;
    chipsWrap.classList.toggle('has-left', chipsScroll.scrollLeft > 8);
    chipsWrap.classList.toggle('has-right', chipsScroll.scrollLeft < max - 8);
  }
  if(chipsScroll){
    chipsScroll.addEventListener('scroll', updateChipsFade, {passive:true});
    window.addEventListener('resize', updateChipsFade);
    updateChipsFade();
  }

  chips.forEach(function(ch){
    ch.addEventListener('click', function(){
      var f = ch.getAttribute('data-filter');
      chips.forEach(function(c){ if(c.getAttribute('data-filter')===f) c.classList.add('active'); else c.classList.remove('active'); });
      activeCat = f;
      ch.style.transform='scale(.96)'; setTimeout(function(){ ch.style.transform=''; },120);
      apply();
    });
  });

  // sticky search fade on scroll
  var searchSection = document.getElementById('vacancies');
  if(searchSection){
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(en){
        if(!en.isIntersecting) searchSection.style.boxShadow='0 4px 24px rgba(0,0,0,.06)';
        else searchSection.style.boxShadow='';
      });
    }, {threshold:0});
    obs.observe(searchSection);
  }

  apply();
});
</script>
</body>
</html>
