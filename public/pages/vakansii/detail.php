<?php
use Setting\Route\Functions\TheFunction;
use Setting\Route\Functions\Vacancy;
$site = TheFunction::site();
$slug = $vacancySlug ?? ($name ?? '');
$all = Vacancy::all();
$vacancy = $all[$slug] ?? null;
if (!$vacancy) { http_response_code(404); include dirname(__DIR__,3).'/app/Models/Router/view/404/404.html'; exit; }

$related = array_values(array_filter($all, fn($v)=>$v['slug']!==$slug));
shuffle($related);
$related = array_slice($related, 0, 3);

$seo = TheFunction::seo([
    'title' => $vacancy['seoTitle'],
    'description' => $vacancy['seoDescription'],
    'keywords' => $vacancy['keywords'],
    'image' => $site['shareImageUrl'],
    'url' => $site['baseUrl'] . '/vakansii/' . $vacancy['slug'],
    'type' => 'website',
    'pageType' => 'WebPage',
    'breadcrumbs' => [
        ['name' => 'Главная', 'url' => $site['baseUrl'] . '/'],
        ['name' => 'Вакансии', 'url' => $site['baseUrl'] . '/vakansii'],
        ['name' => $vacancy['fullTitle'], 'url' => $site['baseUrl'] . '/vakansii/' . $vacancy['slug']],
    ],
    'schema' => [
        [
            '@type' => 'SpeakableSpecification',
            '@id' => $site['baseUrl'] . '/vakansii/' . $vacancy['slug'] . '#speakable',
            'cssSelector' => ['h1', '.vd-hero-desc', '.vd-hero-about'],
        ],
    ],
]);

$benefits = Vacancy::benefits();
$isProrab = ($slug === 'prorab');
$datePosted = date('Y-m-d');
$validThrough = date('Y-m-d', strtotime('+60 days') ?: time());
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
<link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/vakansii/' . $vacancy['slug']); ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($vacancy['h1']); ?> — Проект Квартира">
<meta property="og:description" content="<?= htmlspecialchars($vacancy['seoDescription']); ?>">
<meta property="og:url" content="<?= htmlspecialchars($site['baseUrl'] . '/vakansii/' . $vacancy['slug']); ?>">
<meta property="og:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
<meta property="og:site_name" content="<?= htmlspecialchars($site['name']); ?>">
<meta property="og:locale" content="ru_RU">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($vacancy['h1']); ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($vacancy['seoDescription']); ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($seo['og']['image']); ?>">
<script type="application/ld+json"><?= $seo['jsonLd']; ?></script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@graph":[
    {
      "@type":"JobPosting",
      "@id":"<?= htmlspecialchars($site['baseUrl']); ?>/vakansii/<?= htmlspecialchars($vacancy['slug']); ?>#job",
      "title":"<?= htmlspecialchars($vacancy['fullTitle'], ENT_QUOTES); ?>",
      "description":"<?= htmlspecialchars(strip_tags($vacancy['about'].' '.implode(' ', $vacancy['tasks'])), ENT_QUOTES); ?>",
      "datePosted":"<?= $datePosted; ?>",
      "validThrough":"<?= $validThrough; ?>T23:59:59+03:00",
      "employmentType":"FULL_TIME",
      "jobLocationType":"ON_SITE",
      "occupationalCategory":"<?= htmlspecialchars($vacancy['title'], ENT_QUOTES); ?>",
      "identifier":{
        "@type":"PropertyValue",
        "name":"vacancy_id",
        "value":"<?= htmlspecialchars($vacancy['slug'], ENT_QUOTES); ?>"
      },
      "hiringOrganization":{
        "@type":"Organization",
        "name":"<?= htmlspecialchars($site['name'], ENT_QUOTES); ?>",
        "sameAs":"<?= htmlspecialchars($site['baseUrl']); ?>",
        "logo":"<?= htmlspecialchars($site['baseUrl']); ?>/public/assets/images/logo/favicon/favicon.svg"
      },
      "jobLocation":{
        "@type":"Place",
        "address":{
          "@type":"PostalAddress",
          "addressLocality":"Москва",
          "addressRegion":"Москва",
          "addressCountry":"RU"
        }
      },
      "baseSalary":{
        "@type":"MonetaryAmount",
        "currency":"RUB",
        "value":{
          "@type":"QuantitativeValue",
          "minValue": <?= (int)$vacancy['salaryFrom']; ?>,
          "maxValue": <?= (int)$vacancy['salaryTo']; ?>,
          "unitText":"MONTH"
        }
      },
      "applicantLocationRequirements":{
        "@type":"Country",
        "name":"RU"
      },
      "directApply": true,
      "seeAlso": "<?= htmlspecialchars($site['baseUrl']); ?>/vakansii"
    },
    {
      "@type":"FAQPage",
      "@id":"<?= $site['baseUrl']; ?>/vakansii/<?= $vacancy['slug']; ?>#faq",
      "mainEntity":[
        <?php foreach ($vacancy['faq'] as $i=>$f): ?>
        {"@type":"Question","name":<?= json_encode($f['q'], JSON_UNESCAPED_UNICODE); ?>,"acceptedAnswer":{"@type":"Answer","text":<?= json_encode($f['a'], JSON_UNESCAPED_UNICODE); ?>}}<?= $i < count($vacancy['faq'])-1 ? ',' : ''; ?>

        <?php endforeach; ?>
      ]
    },
    {
      "@type":"ItemList",
      "@id":"<?= $site['baseUrl']; ?>/vakansii/<?= $vacancy['slug']; ?>#related",
      "name":"Похожие вакансии",
      "itemListElement":[
        <?php foreach ($related as $ri=>$r): ?>
        {"@type":"ListItem","position":<?= $ri+1; ?>,"url":"<?= $site['baseUrl']; ?>/vakansii/<?= htmlspecialchars($r['slug'], ENT_QUOTES); ?>","name":"<?= htmlspecialchars($r['fullTitle'], ENT_QUOTES); ?>"}<?= $ri < count($related)-1 ? ',' : ''; ?>

        <?php endforeach; ?>
      ]
    }
  ]
}
</script>
<?php include_once dirname(__DIR__, 2) . '/components/head-includes.php'; ?>
<style>
:root {
  --alfa-red: #f97316;
  --alfa-red-dark: #ea580c;
  --alfa-gray: #F5F5F5;
  --alfa-dark: #1A1A1A;
  --alfa-text: #333333;
  --alfa-muted: #6B7280;
  --alfa-border: #E5E7EB;
  --alfa-radius: 24px;
  --alfa-radius-sm: 16px;
  --alfa-radius-xs: 12px;
}

.vd-page {
  font-family: -apple-system, BlinkMacSystemFont, 'SF Pro Text', 'Segoe UI', Roboto, sans-serif;
  color: var(--alfa-text);
  background: #fff;
  -webkit-font-smoothing: antialiased;
}

.vd-container {
  max-width: 1216px;
  margin: 0 auto;
  padding: 0 20px;
}
@media (min-width: 640px) { .vd-container { padding: 0 32px; } }

/* ---------- HERO ---------- */
.vd-hero {
  background: #fff;
  position: relative;
  overflow: hidden;
}
.vd-hero::before {
  content: '';
  position: absolute;
  left: 0; right: 0; bottom: 0;
  height: 60px;
  background-color: var(--alfa-gray);
  border-radius: 60px 60px 0 0;
  z-index: 5;
}
.vd-hero-box {
  position: relative;
  z-index: 2;
}
.vd-hero-box::before {
  content: '';
  position: absolute;
  right: 200px; top: 100px;
  width: 1px; height: 1px;
  border-radius: 50%;
  box-shadow: 140px 20px 0 120px #fdba74, -27px 180px 0 120px #f97316;
  filter: blur(50px);
  pointer-events: none; z-index: 0;
  animation: vdBlob1 14s linear infinite;
}
@keyframes vdBlob1 {
  0% { transform: translate(0,0) scale(1); opacity:.9; }
  25% { transform: translate(-50px,0) scale(1.08); opacity:.85; }
  50% { transform: translate(0,-30px) scale(.95); opacity:.9; }
  75% { transform: translate(40px,0) scale(.92); opacity:.85; }
  100% { transform: translate(0,0) scale(1); opacity:.9; }
}

/* ---------- BREADCRUMNS ---------- */
.vd-breadcrumbs {
  display: flex; flex-wrap: wrap; align-items: center; gap: 8px;
  font-size: 14px; color: var(--alfa-muted); margin-bottom: 24px;
}
.vd-breadcrumbs a { color: var(--alfa-muted); text-decoration: none; transition: color .2s; }
.vd-breadcrumbs a:hover { color: var(--alfa-dark); }
.vd-breadcrumbs .current { color: var(--alfa-dark); font-weight: 500; }

/* ---------- HERO CONTENT ---------- */
.vd-hero-content {
  position: relative; z-index: 2;
  padding-top: 32px; padding-bottom: 80px;
}
.vd-badge {
  display: inline-flex; align-items: center; gap: 6px;
  min-height: 30px; padding: 6px 14px; border-radius: 999px;
  font-size: 12px; font-weight: 700; white-space: nowrap;
}
.vd-badge-red { background: var(--alfa-red); color: #fff; }
.vd-badge-dark { background: var(--alfa-dark); color: #fff; }
.vd-badge-green { background: #ECFDF5; color: #059669; border: 1px solid #A7F3D0; }
.vd-badge-blue { background: #EFF6FF; color: #2563EB; border: 1px solid #DBEAFE; }
.vd-badge-orange { background: #FFF7ED; color: #EA580C; border: 1px solid #FED7AA; }
.vd-hero h1 {
  font-weight: 800; font-size: clamp(28px, 4vw, 44px);
  line-height: 1.05; letter-spacing: -.03em;
  color: var(--alfa-dark); margin: 16px 0 0;
}
.vd-hero-desc { font-size: 17px; color: var(--alfa-muted); line-height: 1.6; margin-top: 16px; max-width: 680px; }
.vd-hero-about { font-size: 15px; color: var(--alfa-muted); line-height: 1.6; margin-top: 12px; max-width: 680px; }

/* ---------- SALARY BLOCK ---------- */
.vd-salary-block {
  display: inline-flex; align-items: baseline; gap: 12px;
  background: var(--alfa-dark); color: #fff;
  padding: 20px 28px; border-radius: var(--alfa-radius-sm);
  margin-top: 24px; position: relative;
}
.vd-salary-block::after {
  content: ''; position: absolute; inset: 6px;
  border: 1px solid rgba(231,211,164,.3); border-radius: 12px; pointer-events: none;
}
.vd-salary { font-size: 36px; font-weight: 800; line-height: 1; }
.vd-salary-label { font-size: 14px; color: rgba(255,255,255,.6); }

/* ---------- FACTS ---------- */
.vd-facts {
  display: grid; grid-template-columns: repeat(2, minmax(0,1fr));
  gap: 12px; margin-top: 24px;
}
@media (min-width: 768px) { .vd-facts { grid-template-columns: repeat(4, minmax(0,1fr)); } }
.vd-fact {
  background: var(--alfa-gray); border: 1px solid var(--alfa-border);
  border-radius: var(--alfa-radius-xs); padding: 16px;
}
.vd-fact-label {
  font-size: 11px; font-weight: 700; letter-spacing: .1em;
  text-transform: uppercase; color: var(--alfa-muted);
}
.vd-fact-value {
  font-weight: 700; font-size: 15px; margin-top: 4px;
  color: var(--alfa-dark); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}

/* ---------- ACTION BUTTONS ---------- */
.vd-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px; }
.vd-btn {
  display: inline-flex; align-items: center; justify-content: center; gap: 10px;
  min-height: 52px; padding: 14px 28px; border-radius: var(--alfa-radius-xs);
  font-weight: 700; font-size: 16px; line-height: 1.25;
  white-space: nowrap; text-decoration: none; transition: all .2s;
  border: none; cursor: pointer;
}
.vd-btn-red { background: var(--alfa-red); color: #fff; }
.vd-btn-red:hover { background: var(--alfa-red-dark); box-shadow: 0 8px 24px rgba(239,49,36,.3); }
.vd-btn-outline { background: #fff; color: var(--alfa-dark); border: 1.5px solid var(--alfa-border); }
.vd-btn-outline:hover { border-color: var(--alfa-dark); }
.vd-btn-dark { background: var(--alfa-dark); color: #fff; }
.vd-btn-dark:hover { background: #000; }
.vd-btn-block { width: 100%; }
@media (max-width: 520px) { .vd-btn { width: 100%; white-space: normal; text-align: center; } }

/* ---------- CONTENT SECTION ---------- */
.vd-content { background: var(--alfa-gray); padding: 40px 0 80px; }
@media (min-width: 1024px) { .vd-content { padding: 48px 0 64px; } }
.vd-body { display: grid; gap: 24px; align-items: start; }
@media (min-width: 1024px) {
  .vd-body { grid-template-columns: minmax(0,1.55fr) minmax(300px,360px); gap: 32px; }
}
.vd-col { display: grid; gap: 16px; }

/* ---------- PANELS (match index cards) ---------- */
.vd-panel {
  background: #fff;
  border: none;
  border-radius: var(--alfa-radius);
  padding: 28px;
  box-shadow: 0 4px 24px rgba(0,0,0,.06);
}
@media (max-width: 640px) { .vd-panel { padding: 20px; border-radius: 16px; } }
.vd-panel h2 { font-size: 20px; font-weight: 700; letter-spacing: -.02em; color: var(--alfa-dark); margin: 0; }

/* ---------- EYEBROW (match index - RED) ---------- */
.vd-eyebrow {
  display: flex; align-items: center; gap: 10px;
  font-size: 12px; font-weight: 700; letter-spacing: .1em;
  text-transform: uppercase; color: var(--alfa-red);
}
.vd-eyebrow::before { content: ''; width: 16px; height: 1px; background: var(--alfa-red); }

/* ---------- LISTS ---------- */
.vd-list { list-style: none; padding: 0; margin: 16px 0 0; }
.vd-list li {
  display: flex; gap: 12px; padding: 10px 0;
  border-bottom: 1px solid #F1F1F1;
  font-size: 15px; color: var(--alfa-text); line-height: 1.55;
}
.vd-list li:last-child { border-bottom: none; }
.vd-list-icon {
  width: 6px; height: 6px; border-radius: 50%;
  background: #D4D4D4; flex-shrink: 0; margin-top: 8px;
}

/* ---------- CONDITIONS ---------- */
.vd-conditions {
  display: grid; grid-template-columns: 1fr; gap: 0; margin-top: 8px;
}
@media (min-width: 640px) { .vd-conditions { grid-template-columns: 1fr 1fr; column-gap: 32px; } }
.vd-condition {
  display: block; padding: 14px 0; border-bottom: 1px solid #F1F1F1;
  background: none; border-radius: 0;
}
.vd-condition-title { font-weight: 650; font-size: 14px; color: var(--alfa-dark); }
.vd-condition-desc { font-size: 13px; color: var(--alfa-muted); line-height: 1.5; margin-top: 4px; }
.vd-note {
  margin-top: 20px; padding: 14px 16px; border-radius: 8px;
  background: #FAFAFA; border: 1px solid #EFEFEF;
  font-size: 14px; color: var(--alfa-text); line-height: 1.55;
}

/* ---------- EARNINGS BLOCK ---------- */
.vd-earnings {
  background: var(--alfa-dark); color: #fff;
  border-radius: var(--alfa-radius); padding: 28px;
}
@media (max-width: 640px) { .vd-earnings { padding: 20px; } }
.vd-earnings-eyebrow { color: rgba(255,255,255,.55); }
.vd-earnings-title { font-family: inherit; }
.vd-earnings-desc { font-size: 14px; color: rgba(255,255,255,.55); margin-top: 6px; }
.vd-earnings-grid {
  display: grid; grid-template-columns: 1fr; gap: 10px; margin-top: 20px;
}
@media (min-width: 640px) { .vd-earnings-grid { grid-template-columns: repeat(3,1fr); } }
.vd-earnings-card {
  background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.1);
  border-radius: 8px; padding: 14px 16px;
}
.vd-earnings-card.accent { background: var(--alfa-red); border-color: var(--alfa-red); }
.vd-earnings-label { font-size: 12px; color: rgba(255,255,255,.55); }
.vd-earnings-value { font-weight: 700; font-size: 18px; margin-top: 6px; font-variant-numeric: tabular-nums; }
.vd-earnings-sub { font-size: 12px; color: rgba(255,255,255,.5); margin-top: 4px; }
.vd-earnings-disclaimer { font-size: 12px; color: rgba(255,255,255,.45); margin-top: 14px; }

/* ---------- FAQ (match index) ---------- */
.vd-faq { border-bottom: 1px solid #F1F1F1; }
.vd-faq:first-child { border-top: 1px solid #F1F1F1; }
.vd-faq-toggle {
  width: 100%; display: flex; align-items: center; justify-content: space-between;
  gap: 16px; padding: 16px 0; text-align: left;
  font-weight: 650; font-size: 15px; color: var(--alfa-dark);
  background: none; border: none; cursor: pointer;
}
.vd-faq-toggle:hover { color: var(--alfa-red); }
.vd-faq-toggle i {
  width: 32px; height: 32px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: var(--alfa-gray); color: var(--alfa-muted);
  transition: transform .35s cubic-bezier(.2,.7,.3,1), background .2s, color .2s;
  flex-shrink: 0; font-size: 12px;
}
.vd-faq-toggle:hover i { background: #fff; color: var(--alfa-red); border: 1px solid var(--alfa-border); }
.vd-faq-toggle[aria-expanded="true"] i {
  transform: rotate(180deg); background: var(--alfa-dark); color: #fff; border-color: var(--alfa-dark);
}
.vd-faq-content { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .35s cubic-bezier(.2,.7,.3,1); }
.vd-faq-content.open { grid-template-rows: 1fr; }
.vd-faq-content > div { overflow: hidden; }
.vd-faq-content-inner { padding-bottom: 20px; font-size: 15px; color: var(--alfa-muted); line-height: 1.65; max-width: 640px; }

/* ---------- RELATED CARDS (match index) ---------- */
.vd-related { display: grid; grid-template-columns: 1fr; gap: 10px; }
.vd-related-card {
  background: #FAFAFA; border: 1px solid #EFEFEF;
  border-radius: 10px; padding: 14px 16px;
  text-decoration: none; color: inherit; display: block;
  transition: box-shadow .2s, transform .2s, border-color .2s, background .2s;
}
.vd-related-card:hover {
  border-color: #DDD; background: #fff;
  box-shadow: 0 4px 16px rgba(0,0,0,.06); transform: translateY(-1px);
}
.vd-related-title { font-weight: 650; font-size: 14px; color: var(--alfa-dark); }
.vd-related-meta { font-size: 13px; color: var(--alfa-muted); margin-top: 4px; }
.vd-related-title-heading { font-size: 16px; font-weight: 700; color: var(--alfa-dark); margin: 0; }
.vd-back {
  display: inline-block; margin-top: 16px; font-size: 14px;
  font-weight: 600; color: var(--alfa-muted); text-decoration: none;
}
.vd-back:hover { color: var(--alfa-dark); }

/* ---------- SIDEBAR ---------- */
.vd-sidebar-card {
  background: #fff; border: none; border-radius: var(--alfa-radius);
  padding: 24px; box-shadow: 0 4px 24px rgba(0,0,0,.06);
}
@media (max-width: 640px) { .vd-sidebar-card { border-radius: 16px; } }
.vd-sidebar-stat-value { font-weight: 700; font-size: 20px; color: var(--alfa-dark); }
.vd-sidebar-stat-label { font-size: 12px; color: var(--alfa-muted); margin-top: 2px; }
.vd-sidebar-employer { font-size: 14px; color: var(--alfa-text); line-height: 1.55; margin-top: 10px; }

/* ---------- EMPLOYER CARD ---------- */
.vd-employer-card { overflow: hidden; }
.vd-employer-header {
  display: flex; align-items: center; gap: 14px; margin-bottom: 16px;
}
.vd-employer-logo {
  width: 48px; height: 48px; border-radius: 14px;
  background: linear-gradient(135deg, var(--alfa-red), var(--alfa-red-dark));
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 12px rgba(249,115,22,.25);
  flex-shrink: 0;
}
.vd-employer-logo img { width: 28px; height: 28px; filter: brightness(0) invert(1); }
.vd-employer-name {
  font-size: 16px; font-weight: 700; color: var(--alfa-dark); margin-top: 4px;
}
.vd-employer-stats {
  display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px;
}
.vd-employer-stat {
  text-align: center; padding: 14px 8px; border-radius: 12px;
  background: var(--alfa-gray); transition: transform .2s, box-shadow .2s;
}
.vd-employer-stat:hover {
  transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,.06);
}
.vd-employer-stat-value {
  font-size: 22px; font-weight: 800; color: var(--alfa-dark);
  letter-spacing: -.02em; line-height: 1;
}
.vd-employer-stat-label {
  font-size: 12px; color: var(--alfa-muted); margin-top: 4px;
}
.vd-employer-stat-stars {
  font-size: 10px; color: #FBBF24; margin-top: 4px; letter-spacing: 1px;
}
#apply { scroll-margin-top: 104px; }

/* ---------- FORM CARD (match index) ---------- */
.vd-form-card {
  background: #fff; border: none; border-radius: var(--alfa-radius);
  padding: 24px; box-shadow: 0 4px 24px rgba(0,0,0,.06);
}
@media (max-width: 640px) { .vd-form-card { border-radius: 16px; } }
.vd-form-card select,
.vd-form-card input[type="text"],
.vd-form-card input[type="tel"] {
  width: 100%; padding: 14px 16px; border: 1.5px solid var(--alfa-border);
  border-radius: var(--alfa-radius-xs); background: #F9FAFB;
  font-size: 14px; color: var(--alfa-dark); transition: border-color .2s, box-shadow .2s;
}
.vd-form-card select:focus,
.vd-form-card input:focus {
  outline: none; border-color: var(--alfa-red);
  box-shadow: 0 0 0 4px rgba(239,49,36,.12); background: #fff;
}
.vd-form-card select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236B7280' viewBox='0 0 16 16'%3E%3Cpath d='M4 6l4 4 4-4'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 14px center; padding-right: 40px;
}
.vd-form-title { font-size: 18px; font-weight: 700; color: var(--alfa-dark); margin: 0; }
.vd-form-subtitle { font-size: 13px; color: var(--alfa-muted); margin-top: 4px; }
.vd-form-phone-wrap { position: relative; }
.vd-form-phone-label {
  position: absolute; top: -8px; left: 16px; font-size: 11px;
  color: var(--alfa-muted); background: #fff; padding: 0 4px;
}
.vd-form-phone-required { color: var(--alfa-red); }
.vd-form-checkbox-label {
  display: flex; align-items: flex-start; gap: 8px;
  font-size: 12px; color: var(--alfa-muted); cursor: pointer;
}
.vd-form-checkbox { accent-color: var(--alfa-red); margin-top: 2px; }
.vd-form-agreement { text-decoration: underline; }
.vd-form-footer { font-size: 12px; color: #9CA3AF; text-align: center; }

/* ---------- SHARE ---------- */
.vd-share { display: flex; gap: 8px; margin-top: 12px; }
.vd-share-title { font-size: 14px; font-weight: 650; color: var(--alfa-dark); }
.vd-share a,
.vd-share button {
  flex: 1; padding: 10px 8px; border-radius: 8px;
  font-size: 13px; font-weight: 600; text-decoration: none; text-align: center;
  border: 1px solid var(--alfa-border); background: #fff;
  color: var(--alfa-dark); cursor: pointer;
}
.vd-share a:hover,
.vd-share button:hover { background: #FAFAFA; }

/* ---------- DIVIDER ---------- */
.vd-divider { height: 1px; background: var(--alfa-border); margin: 20px 0; }

/* ---------- TARIFFS TABLE ---------- */
.vd-tariffs { margin-top: 16px; }
.vd-tariff-group { margin-top: 20px; }
.vd-tariff-group:first-child { margin-top: 0; }
.vd-tariff-group-title {
  font-size: 15px; font-weight: 700; color: var(--alfa-dark);
  padding-bottom: 10px; border-bottom: 2px solid var(--alfa-red);
  display: flex; align-items: center; gap: 8px;
}
.vd-tariff-group-title i { color: var(--alfa-red); font-size: 14px; }
.vd-tariff-row {
  display: flex; justify-content: space-between; align-items: flex-start;
  padding: 10px 0; border-bottom: 1px solid #F1F1F1;
}
.vd-tariff-row:last-child { border-bottom: none; }
.vd-tariff-name { font-size: 14px; color: var(--alfa-text); line-height: 1.5; flex: 1; }
.vd-tariff-price {
  font-size: 14px; font-weight: 700; color: var(--alfa-dark);
  white-space: nowrap; margin-left: 16px; text-align: right;
}
.vd-tariff-note {
  font-size: 12px; color: var(--alfa-muted); line-height: 1.4;
  padding: 6px 0 0; font-style: italic;
}
.vd-tariff-sub {
  padding-left: 16px;
}
.vd-tariff-sub .vd-tariff-row { padding: 8px 0; }
.vd-tariff-sub .vd-tariff-name { font-size: 13px; color: var(--alfa-muted); }
.vd-tariff-sub .vd-tariff-price { font-size: 13px; font-weight: 600; color: var(--alfa-text); }

/* ---------- MOBILE STICKY BAR ---------- */
.vd-sticky-bar {
  position: fixed; bottom: 0; left: 0; right: 0;
  background: #fff; border-top: 1px solid var(--alfa-border);
  padding: 12px; display: flex; gap: 12px; z-index: 40;
  box-shadow: 0 -4px 16px rgba(0,0,0,.06);
}
@media (max-width: 1023px) { main { padding-bottom: 72px; } }
@media (min-width: 1024px) { .vd-sticky-bar { display: none; } }

/* ---------- REDUCED MOTION ---------- */
@media (prefers-reduced-motion: reduce) {
  .vd-card, .vd-related-card, .vd-btn { transition: none !important; }
  .vd-hero-box::before { animation: none !important; }
  html { scroll-behavior: auto; }
}

/* ---------- FOCUS ---------- */
.vd-page a:focus-visible,
.vd-page button:focus-visible,
.vd-page input:focus-visible,
.vd-page select:focus-visible {
  outline: 2px solid var(--alfa-red); outline-offset: 3px; border-radius: 6px;
}

/* ---------- SMOOTH SCROLL ---------- */
html { scroll-behavior: smooth; }

/* ---------- PULSE ANIMATION ---------- */
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.5} }

/* ---------- MOBILE RESPONSIVE ---------- */
@media (max-width: 640px) {
  .vd-hero h1 { font-size: 28px; }
  .vd-salary-block { flex-direction: column; gap: 4px; padding: 16px 20px; }
  .vd-salary { font-size: 28px; }
  .vd-facts { grid-template-columns: repeat(2,1fr); }
}
</style>
</head>
<body class="vd-page">
<?php include_once dirname(__DIR__, 2) . '/components/header.php'; ?>
<main style="padding-top:80px">

<!-- ============ HERO ============ -->
<section class="vd-hero">
  <div class="vd-hero-box">
    <div class="vd-hero-content vd-container">
      <div class="vd-breadcrumbs">
        <a href="<?= htmlspecialchars($site['baseUrl']); ?>/">Главная</a>
        <span>/</span>
        <a href="<?= htmlspecialchars($site['baseUrl']); ?>/vakansii">Вакансии</a>
        <span>/</span>
        <span class="current"><?= htmlspecialchars($vacancy['fullTitle']); ?></span>
        <span class="ml-auto hidden md:inline-flex">
          <span class="vd-badge vd-badge-green"><span style="width:8px;height:8px;border-radius:50%;background:#10B981;display:inline-block;animation:pulse 2s infinite"></span> Отвечаем за 10 минут</span>
        </span>
      </div>

      <div class="flex flex-wrap gap-2 mb-4">
        <span class="vd-badge vd-badge-dark"><?= htmlspecialchars($vacancy['experience']); ?></span>
        <span class="vd-badge vd-badge-green">Прямой работодатель</span>
        <?php if (!empty($vacancy['hot'])): ?><span class="vd-badge vd-badge-red">Горячая вакансия</span><?php endif; ?>
        <?php if (!empty($vacancy['top'])): ?><span class="vd-badge vd-badge-dark">Топ ставка</span><?php endif; ?>
      </div>

      <h1><?= htmlspecialchars($vacancy['h1']); ?></h1>
      <p class="vd-hero-desc"><?= htmlspecialchars($vacancy['subtitle']); ?></p>
      <p class="vd-hero-about"><?= htmlspecialchars($vacancy['about']); ?></p>

      <div class="vd-salary-block">
        <span class="vd-salary"><?= htmlspecialchars($vacancy['salaryText']); ?></span>
        <span class="vd-salary-label">/мес на руки</span>
      </div>

      <div class="flex flex-wrap gap-2 mt-4">
        <?php if ($isProrab): ?>
        <span class="vd-badge vd-badge-green">Выплаты раз в месяц, по актам</span>
        <span class="vd-badge vd-badge-blue">Крупный инструмент — наш</span>
        <span class="vd-badge vd-badge-orange">5–7 объектов рядом с домом</span>
        <?php else: ?>
        <span class="vd-badge vd-badge-green">Выплаты каждую неделю</span>
        <span class="vd-badge vd-badge-blue">Жильё на объекте</span>
        <span class="vd-badge vd-badge-orange">Аванс сразу</span>
        <?php endif; ?>
      </div>

      <div class="vd-facts">
        <div class="vd-fact"><div class="vd-fact-label">График</div><div class="vd-fact-value"><?= htmlspecialchars($vacancy['schedule']); ?></div></div>
        <div class="vd-fact"><div class="vd-fact-label">Занятость</div><div class="vd-fact-value"><?= htmlspecialchars($vacancy['employment']); ?></div></div>
        <div class="vd-fact"><div class="vd-fact-label">Опыт</div><div class="vd-fact-value"><?= htmlspecialchars($vacancy['experience']); ?></div></div>
        <div class="vd-fact"><div class="vd-fact-label">Город</div><div class="vd-fact-value"><?= htmlspecialchars($vacancy['city']); ?></div></div>
      </div>

      <div class="vd-actions">
        <a href="#apply" class="vd-btn vd-btn-red" style="position:relative;overflow:hidden">
          <span style="width:8px;height:8px;border-radius:50%;background:#fff;display:inline-block;animation:pulse 2s infinite"></span>
          Откликнуться
        </a>
        <a href="tel:79380909272" class="vd-btn vd-btn-outline"><i class="fa-solid fa-phone"></i> Связаться</a>
      </div>
    </div>
  </div>
</section>

<section class="vd-content">
  <div class="vd-container">
    <div class="vd-body">

      <div class="vd-col">

        <div class="vd-panel">
          <div class="vd-eyebrow">Задачи</div>
          <h2 class="mt-2">Что делать</h2>
          <ul class="vd-list">
            <?php foreach ($vacancy['tasks'] as $t): ?>
            <li><span class="vd-list-icon"></span><span><?= htmlspecialchars($t); ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="vd-panel">
          <div class="vd-eyebrow">Требования</div>
          <h2 class="mt-2">Кого ждём</h2>
          <ul class="vd-list">
            <?php foreach ($vacancy['requirements'] as $r): ?>
            <li><span class="vd-list-icon"></span><span><?= htmlspecialchars($r); ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="vd-panel">
          <div class="vd-eyebrow">Условия</div>
          <h2 class="mt-2">Честно и по делу</h2>
          <div class="vd-conditions">
            <?php
            if ($isProrab) {
              $conditions = [
                ['title'=>'Выплаты раз в месяц','desc'=>'По закрытым актам, без задержек. Деньги — на карту.'],
                ['title'=>'Крупный инструмент наш','desc'=>'Всё необходимое для бригад — выдаём со склада.'],
                ['title'=>'Стабильные объекты','desc'=>'5–7 квартир 40–120 м² и домов — без простоев круглый год.'],
              ];
            } else {
              $conditions = [
                ['title'=>'Выплаты каждую неделю','desc'=>'Без задержек, по закрытому этапу. Деньги — на карту.'],
                ['title'=>'Можно жить на объекте','desc'=>'Бытовка/комната с душем и кухней — экономия на жилье.'],
                ['title'=>'+5 % при переходе','desc'=>'Сдали объект — получили бонус со сметы старого.'],
                ['title'=>'Крупный инструмент наш','desc'=>'Станции, станки, торцовки, леса, пресс — выдаём.'],
                ['title'=>'Аванс на питание','desc'=>'Даём в первый день, без «подожди до пятницы».'],
                ['title'=>'Стабильные объекты','desc'=>'Квартиры 40–120 м² и дома — без простоев круглый год.'],
              ];
            }
            foreach ($vacancy['conditionsExtra'] as $extra) $conditions[] = ['title'=>$extra,'desc'=>''];
            foreach ($conditions as $c): ?>
            <div class="vd-condition">
              <div class="vd-condition-title"><?= htmlspecialchars($c['title']); ?></div>
              <?php if($c['desc']): ?><div class="vd-condition-desc"><?= htmlspecialchars($c['desc']); ?></div><?php endif; ?>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="vd-note"><b>Прямой работодатель — ПКвартира.</b> Без посредников. Договор, фиксированные расценки, снабжение — с нас.</div>
        </div>

        <div class="vd-panel">
          <div class="vd-eyebrow">Расценки</div>
          <h2 class="mt-2">Прайс-лист на работы</h2>
          <div class="vd-tariffs">
            <div class="vd-tariff-group">
              <div class="vd-tariff-group-title"><i class="fa-solid fa-wrench"></i> Инженерные сети</div>
              <div class="vd-tariff-sub">
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Сантехника</span>
                  <span class="vd-tariff-price">от 4 000 ₽ / точка</span>
                </div>
                <div class="vd-tariff-note">В ставку включена установка коллекторного шкафа. Итоговая оплата будет в 1,5 раза выше за счёт доп. работ.</div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Электрика</span>
                  <span class="vd-tariff-price">от 1 000 ₽ / точка</span>
                </div>
                <div class="vd-tariff-note">В ставку включён монтаж электрического шкафа. Итоговая оплата будет в 1,5 раза выше за счёт доп. работ.</div>
              </div>
            </div>

            <div class="vd-tariff-group">
              <div class="vd-tariff-group-title"><i class="fa-solid fa-hard-hat"></i> Черновые работы</div>
              <div class="vd-tariff-sub">
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Штукатурка — слой до 2 см</span>
                  <span class="vd-tariff-price">550 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Штукатурка — слой до 3 см</span>
                  <span class="vd-tariff-price">600 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Подготовка стен — под покраску / шпаклёвку</span>
                  <span class="vd-tariff-price">900 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Подготовка стен — под обои</span>
                  <span class="vd-tariff-price">320 ₽ / м²</span>
                </div>
              </div>
            </div>

            <div class="vd-tariff-group">
              <div class="vd-tariff-group-title"><i class="fa-solid fa-paint-roller"></i> Чистовая отделка</div>
              <div class="vd-tariff-sub">
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Покраска стен (2 слоя валиком)</span>
                  <span class="vd-tariff-price">251 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Обои флизелиновые (без подбора рисунка)</span>
                  <span class="vd-tariff-price">284 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Обои флизелиновые (с подбором рисунка)</span>
                  <span class="vd-tariff-price">317 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Обои бумажные (без подбора рисунка)</span>
                  <span class="vd-tariff-price">374 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Обои бумажные (с подбором рисунка)</span>
                  <span class="vd-tariff-price">392 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Укладка ламината</span>
                  <span class="vd-tariff-price">377 ₽ / м²</span>
                </div>
              </div>
            </div>

            <div class="vd-tariff-group">
              <div class="vd-tariff-group-title"><i class="fa-solid fa-border-all"></i> Плиточные работы</div>
              <div class="vd-tariff-sub">
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Укладка плитки (пол)</span>
                  <span class="vd-tariff-price">1 800 ₽ / м²</span>
                </div>
                <div class="vd-tariff-row">
                  <span class="vd-tariff-name">Укладка плитки (стены)</span>
                  <span class="vd-tariff-price">2 000 ₽ / м²</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="vd-earnings">
          <div class="vd-eyebrow vd-earnings-eyebrow">Доход</div>
          <h3 class="mt-2 text-xl font-bold vd-earnings-title">Сколько можно заработать</h3>
          <p class="vd-earnings-desc"><?php if ($isProrab): ?>Пример для прораба на 5–7 объектах — доход складывается из % от смет, черновых и допработ.<?php else: ?>Пример для <?= htmlspecialchars($vacancy['shortTitle']); ?>а на объекте 65 м² — закрытие за 3–4 недели.<?php endif; ?></p>
          <div class="vd-earnings-grid">
            <div class="vd-earnings-card">
              <div class="vd-earnings-label">Ставка</div>
              <div class="vd-earnings-value"><?= number_format($vacancy['salaryFrom'],0,' ',' '); ?> ₽</div>
              <div class="vd-earnings-sub">минимум в месяц</div>
            </div>
            <div class="vd-earnings-card">
              <div class="vd-earnings-label">На объекте 65 м²</div>
              <div class="vd-earnings-value">~<?= number_format((int)($vacancy['salaryFrom']*1.15),0,' ',' '); ?> ₽</div>
              <div class="vd-earnings-sub">за 3–4 недели</div>
            </div>
            <div class="vd-earnings-card accent">
              <div class="vd-earnings-label">С бонусом +5%</div>
              <div class="vd-earnings-value">+<?= number_format((int)($vacancy['salaryFrom']*0.05),0,' ',' '); ?> ₽</div>
              <div class="vd-earnings-sub">при переходе</div>
            </div>
          </div>
          <p class="vd-earnings-disclaimer"><?php if ($isProrab): ?>Расчёт примерный. Точную схему % — обсудим на собеседовании с руководителем.<?php else: ?>Расчёт примерный. Точные расценки — на созвоне с прорабом.<?php endif; ?></p>
        </div>

        <div class="vd-panel">
          <div class="vd-eyebrow">Вопросы</div>
          <h2 class="mt-2">Частые вопросы</h2>
          <div class="mt-3">
            <?php foreach ($vacancy['faq'] as $f): ?>
            <div class="vd-faq">
              <button type="button" class="vd-faq-toggle" aria-expanded="false">
                <span><?= htmlspecialchars($f['q']); ?></span><i class="fa-solid fa-chevron-down"></i>
              </button>
              <div class="vd-faq-content"><div><div class="vd-faq-content-inner"><?= htmlspecialchars($f['a']); ?></div></div></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="vd-panel">
          <h3 class="vd-related-title-heading">Другие вакансии</h3>
          <div class="vd-related mt-4">
            <?php foreach ($related as $r): ?>
            <a href="<?= htmlspecialchars($site['baseUrl']); ?>/vakansii/<?= htmlspecialchars($r['slug']); ?>" class="vd-related-card">
              <div class="vd-related-title"><?= htmlspecialchars($r['fullTitle']); ?></div>
              <div class="vd-related-meta"><?= htmlspecialchars($r['salaryText']); ?> · <?= htmlspecialchars($r['city']); ?></div>
              <?php if (!empty($r['hot'])): ?><span class="vd-badge vd-badge-red" style="margin-top:8px;display:inline-flex">Горячая</span><?php endif; ?>
            </a>
            <?php endforeach; ?>
          </div>
          <a href="<?= htmlspecialchars($site['baseUrl']); ?>/vakansii" class="vd-back">← Все вакансии</a>
        </div>
      </div>

      <aside class="vd-aside">
        <div id="apply" class="lg:sticky lg:top-[96px] space-y-4">
          <div class="vd-form-card">
            <h2 class="vd-form-title">Отклик на вакансию</h2>
            <p class="vd-form-subtitle"><?= htmlspecialchars($vacancy['fullTitle']); ?> — перезвоним за 10 минут</p>
            <form action="/send/email" method="POST" data-form-id="vakansii_<?= htmlspecialchars($vacancy['slug']); ?>" class="mt-5 space-y-4">
              <input type="hidden" name="Вакансия" value="<?= htmlspecialchars($vacancy['fullTitle']); ?> — <?= htmlspecialchars($vacancy['slug']); ?>">
              <select name="Вакансия_выбор" aria-label="Вакансия">
                <option selected><?= htmlspecialchars($vacancy['fullTitle']); ?> — <?= htmlspecialchars($vacancy['salaryShort']); ?></option>
                <?php foreach ($all as $o): if($o['slug']===$slug) continue; ?>
                <option value="<?= htmlspecialchars($o['fullTitle']); ?>"><?= htmlspecialchars($o['fullTitle']); ?> — <?= htmlspecialchars($o['salaryShort']); ?></option>
                <?php endforeach; ?>
              </select>
              <input type="text" name="имя" placeholder="Ваше имя" aria-label="Имя">
              <div class="vd-form-phone-wrap">
                <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн" placeholder="(___) ___-__-__" required aria-label="Телефон">
                <span class="vd-form-phone-label">Телефон <span class="vd-form-phone-required">*</span></span>
              </div>
              <label class="vd-form-checkbox-label"><input type="checkbox" required class="vd-form-checkbox"> <span>Согласен на обработку ПДн и <a href="/soglashenie" class="vd-form-agreement">соглашение</a></span></label>
              <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
              <button type="submit" class="vd-btn vd-btn-red vd-btn-block"><span>Откликнуться</span></button>
              <p class="vd-form-footer"><?php if ($isProrab): ?>Отвечаем 9:00–22:00 · выплаты раз в месяц по актам<?php else: ?>Отвечаем 9:00–22:00 · аванс в первый день<?php endif; ?></p>
            </form>
          </div>

          <div class="vd-sidebar-card vd-employer-card">
            <div class="vd-employer-header">
              <div class="vd-employer-logo">
                <img src="/public/assets/images/logo/favicon/favicon.svg" alt="Проект Квартира" width="40" height="40">
              </div>
              <div>
                <div class="vd-eyebrow">Работодатель</div>
                <div class="vd-employer-name">Проект Квартира</div>
              </div>
            </div>
            <p class="vd-sidebar-employer"><?php if ($isProrab): ?>Прямой работодатель. 10 лет на рынке, 325+ сданных объектов. Готовые бригады, свой склад, прозрачный % от сметы.<?php else: ?>Прямой работодатель. 10 лет на рынке, 325+ сданных объектов. Фиксированные расценки, снабжение — с нас. Иногородним можно жить на объекте.<?php endif; ?></p>
            <div class="vd-divider"></div>
            <div class="vd-employer-stats">
              <div class="vd-employer-stat">
                <div class="vd-employer-stat-value">10</div>
                <div class="vd-employer-stat-label">лет</div>
              </div>
              <div class="vd-employer-stat">
                <div class="vd-employer-stat-value">325+</div>
                <div class="vd-employer-stat-label">объектов</div>
              </div>
              <div class="vd-employer-stat">
                <div class="vd-employer-stat-value">4.9</div>
                <div class="vd-employer-stat-label">отзывы</div>
                <div class="vd-employer-stat-stars">★★★★★</div>
              </div>
            </div>
          </div>

          <div class="vd-sidebar-card">
            <div class="vd-share-title">Поделиться</div>
            <div class="vd-share">
              <a href="https://t.me/share/url?url=<?= urlencode($site['baseUrl'].'/vakansii/'.$vacancy['slug']); ?>&text=<?= urlencode('Вакансия '.$vacancy['fullTitle'].' от '. $vacancy['salaryText']); ?>" target="_blank" rel="nofollow noopener">Telegram</a>
              <a href="https://wa.me/?text=<?= urlencode($site['baseUrl'].'/vakansii/'.$vacancy['slug']); ?>" target="_blank" rel="nofollow noopener">WhatsApp</a>
              <button type="button" onclick="navigator.clipboard.writeText(window.location.href)">Копировать</button>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>


</main>

<!-- Mobile Sticky Bar -->
<div class="vd-sticky-bar">
  <a href="tel:79380909272" class="vd-btn vd-btn-outline flex-1"><i class="fa-solid fa-phone"></i><span>Позвонить</span></a>
  <a href="#apply" class="vd-btn vd-btn-red flex-1"><i class="fa-solid fa-paper-plane"></i><span>Откликнуться</span></a>
</div>

<?php include_once dirname(__DIR__, 2) . '/components/footer.php'; ?>
<script src="<?= TheFunction::asset('/public/assets/scripts/components/lazyIMG.min.js'); ?>" defer></script>
<script src="<?= TheFunction::asset('/public/assets/scripts/main/header.min.js'); ?>" defer></script>
<script src="<?= TheFunction::asset('/public/assets/scripts/components/reveal.min.js'); ?>" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('.vd-faq-toggle').forEach(function(btn){
    btn.addEventListener('click', function(){
      var c = btn.nextElementSibling;
      var open = c.classList.contains('open');
      c.classList.toggle('open', !open);
      btn.setAttribute('aria-expanded', String(!open));
    });
  });
});
</script>
</body>
</html>