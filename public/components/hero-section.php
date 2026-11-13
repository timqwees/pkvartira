<?php
/**
 * Cinema-hero в формате ФСС (единый для всех страниц услуг).
 * Ожидает:
 * - $heroH1 (string, обязательный) — чистое название услуги для H1 (например: "Ремонт однокомнатной квартиры в Москве")
 * - $heroSubtitle (string) — подзаголовок под H1
 * - $heroFormId (string) — ID формы в hero
 * - $bg_url (string) — фоновое изображение
 * - $title (string) — SEO title страницы (для alt/title)
 */

if (!isset($heroSubtitle) || $heroSubtitle === '') {
    $heroSubtitle = 'Зафиксируем стоимость в договоре, выполним работы в срок и дадим гарантию 3 года на все виды работ.';
}

/* $heroH1 теперь должен приходить чистым из вызывающей страницы.
 * Если не передан — фоллбек на $title без SEO-хвостов.
 */
$heroH1 = $heroH1 ?? ($title ?? 'Ремонт квартир под ключ');
$heroH1 = trim(preg_replace('/\s*\|.*$/u', '', $heroH1));

/* Не разбиваем на части по " — " — используем целиком как одну строку H1.
 * Для длинных заголовков добавляем модификатор класса.
 */
$heroLine1 = $heroH1;
$heroLine2 = '';

/* Длинные заголовки услуг не должны «взрывать» первый экран */
$heroTitleLen = mb_strlen($heroLine1);
$heroTitleClass = $heroTitleLen > 48 ? 'hero-title--long' : ($heroTitleLen > 28 ? 'hero-title--mid' : '');

/* Длинные заголовки услуг не должны «взрывать» первый экран */
$heroTitleLen = mb_strlen($heroLine1 . ' ' . $heroLine2);
$heroTitleClass = $heroTitleLen > 48 ? 'hero-title--long' : ($heroTitleLen > 28 ? 'hero-title--mid' : '');

$heroSlides = [
    [
        'src' => '/public/assets/images/pages/main/hero/bg.webp',
        'alt' => $heroH1 . ' — Проект Квартира',
    ],
    [
        'src' => '/public/assets/images/portfolio-photos/1room/standard/2_37sqm/1.webp',
        'alt' => 'Дизайн интерьера квартиры в Москве',
    ],
    [
        'src' => '/public/assets/images/portfolio-photos/cottage/2_euro_230sqm/10.webp',
        'alt' => 'Ремонт квартиры 230 м² в бизнес-классе',
    ],
];

$heroBg = $bg_url ?? '';
if (is_string($heroBg) && str_starts_with($heroBg, '/public/')) {
    $heroFile = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/') . $heroBg;
    if (is_file($heroFile)) {
        $heroSlides[0]['src'] = $heroBg;
        $heroSlides[0]['alt'] = $heroH1 . ' — Проект Квартира';
    }
}

$heroProjects = [
    ['name' => 'Ремонт квартиры 180 м²', 'caption' => 'Москва / Премиум'],
    ['name' => 'Ремонт квартиры 230 м²', 'caption' => 'Москва / Бизнес-класс'],
    ['name' => 'Дизайн-интерьер 90 м²', 'caption' => 'Московская область / Дизайн'],
];
?>
<section id="hero" class="hero" aria-labelledby="hero-title" data-cinema data-nav-hero>
    <div class="hero-visual" data-hero-frame>
        <?php foreach ($heroSlides as $i => $slide): ?>
            <img src="<?= htmlspecialchars($slide['src']); ?>"
                 srcset="<?= htmlspecialchars($slide['src']); ?> 720w, <?= htmlspecialchars($slide['src']); ?> 1200w, <?= htmlspecialchars($slide['src']); ?> 1672w"
                 alt="<?= htmlspecialchars($slide['alt']); ?>"
                 title="<?= htmlspecialchars($slide['alt']); ?>"
                 sizes="100vw"
                 loading="<?= $i === 0 ? 'eager' : 'lazy'; ?>"
                 fetchpriority="<?= $i === 0 ? 'high' : 'auto'; ?>"
                 data-cinema-image="<?= $i; ?>" decoding="async"
                 width="1672" height="941"
                 class="cinema-image<?= $i === 0 ? ' is-active' : ''; ?>">
        <?php endforeach; ?>
    </div>
    <div class="hero-shade" aria-hidden="true"></div>
    <div class="hero-content">
        <p class="eyebrow hero-eyebrow">
            <span class="live-dot" aria-hidden="true"></span>
            Ремонт квартир · Под ключ · Москва и МО
        </p>
        <h1 id="hero-title"<?= $heroTitleClass !== '' ? ' class="' . $heroTitleClass . '"' : ''; ?>>
            <span><?= htmlspecialchars($heroLine1); ?></span>
        </h1>
        <div class="hero-intro">
            <p><?= htmlspecialchars($heroSubtitle); ?></p>
            <a class="text-link" href="/about" data-goal="hero_about" title="Узнать о компании">Узнать о компании <span>&#8595;</span></a>
        </div>
    </div>
    <div class="hero-bottom">
        <a href="/portfolio" class="hero-project" data-cinema-link title="Посмотреть проекты">
            <span class="eyebrow">Избранный проект / <span data-cinema-number>01</span></span>
            <strong data-cinema-name><?= htmlspecialchars($heroProjects[0]['name']); ?></strong>
            <span data-cinema-caption><?= htmlspecialchars($heroProjects[0]['caption']); ?></span>
            <span class="hero-project-arrow">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                    <path d="M7 7h10v10"></path>
                    <path d="M7 17 17 7"></path>
                </svg>
            </span>
        </a>
        <div class="hero-controls">
            <div class="cinema-pagination" role="group" aria-label="Избранные проекты">
                <?php foreach ($heroProjects as $i => $project): ?>
                    <button type="button"
                            data-cinema-select="<?= $i; ?>"
                            data-name="<?= htmlspecialchars($project['name']); ?>"
                            data-caption="<?= htmlspecialchars($project['caption']); ?>"
                            aria-label="Показать <?= htmlspecialchars(mb_strtolower($project['name'])); ?>"
                            aria-pressed="<?= $i === 0 ? 'true' : 'false'; ?>"><?= sprintf('%02d', $i + 1); ?><span></span></button>
                <?php endforeach; ?>
            </div>
            <p class="eyebrow" data-cinema-status aria-live="polite">01 / 03 — <?= htmlspecialchars($heroProjects[0]['name']); ?> — Москва</p>
        </div>
        <a href="/calculator" class="hero-cta" data-goal="hero_projects" title="Рассчитать стоимость">
            Рассчитать стоимость
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                <path d="M7 7h10v10"></path>
                <path d="M7 17 17 7"></path>
            </svg>
        </a>
    </div>
</section>
