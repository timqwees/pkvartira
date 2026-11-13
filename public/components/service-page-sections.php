<?php
/**
 * Service Page Sections — AI Overview structure
 * Ожидает массив $svc с ключами:
 * - short_answer     (string, 50-80 слов) — мгновенный ответ после H1
 * - prices           (array) — уже используется в price-section
 * - includes         (array) — карточки "Что входит"
 * - timeline         (array) — H2 Сроки: ['label' => 'Косметический', 'value' => '14–21 день', 'desc' => '...']
 * - mistakes         (array) — H2 Ошибки: ['title' => 'Ошибка', 'desc' => '...']
 * - portfolio        (array, optional) — H2 Примеры работ: данные из getPortfolio
 * - faq              (array) — FAQ: ['q' => 'Вопрос', 'a' => 'Ответ']
 * - price_rows       (array) — для price-table.php
 * - price_table_title (string)
 * - heroH1           (string) — чистый H1 для hero-section.php
 * - heroSubtitle     (string)
 * - heroFormId       (string)
 * - bg_url           (string)
 * - ctaFormId        (string)
 * - ctaFormTitle     (string)
 * - ctaFormSubtitle  (string)
 * - ctaButtonText    (string)
 * - ctaExpandable    (bool)
 * - ctaSection*      (optional, для cta-section.php)
 */
$svc = $svc ?? [];
$site = \Setting\Route\Functions\TheFunction::site();

/* ---------- 1. HERO (вызываем hero-section.php с чистым H1) ---------- */
if (!empty($svc['heroH1'])) {
    $heroH1        = $svc['heroH1'];
    $heroSubtitle  = $svc['heroSubtitle'] ?? '';
    $heroFormId    = $svc['heroFormId'] ?? 'hero_form';
    $bg_url        = $svc['bg_url'] ?? '/public/assets/images/pages/main/hero/bg.webp';
    include __DIR__ . '/hero-section.php';
}

/* ---------- 2. КРАТКИЙ ОТВЕТ (AI Overview: 50-80 слов сразу после H1) ---------- */
if (!empty($svc['short_answer'])):
?>
<section class="ai-short-answer reveal bg-white py-6 md:py-8 border-b border-gray-100" aria-labelledby="short-answer-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="short-answer-heading" class="sr-only">Краткий ответ</h2>
        <p class="text-lg md:text-xl text-gray-700 leading-relaxed max-w-4xl"><?= htmlspecialchars($svc['short_answer']) ?></p>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 3. ЦЕНЫ (H2 Стоимость) ---------- */
if (!empty($svc['prices'])):
    $prices = $svc['prices'];
?>
<section id="price" class="reveal bg-white py-10 md:py-14" aria-labelledby="price-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="price-heading" class="text-2xl md:text-3xl font-bold text-gray-900">
            <?= htmlspecialchars($svc['price_title'] ?? 'Сколько стоит ремонт') ?>
        </h2>
        <?php if (!empty($svc['price_subtitle'])): ?>
        <p class="mt-2 text-gray-600 max-w-3xl"><?= htmlspecialchars($svc['price_subtitle']) ?></p>
        <?php endif; ?>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($prices as $price): ?>
            <article
                class="bg-white <?= ($price['стиль'] ?? '') === 'рекомендуем' ? 'border-2 border-[#876b55] shadow-md' : 'border border-gray-200 shadow-sm' ?> rounded-2xl p-6"
                itemscope itemtype="https://schema.org/Service">
                <meta itemprop="name"
                    content="<?= htmlspecialchars(($price['заголовок'] ?? '') . ' ' . ($svc['service_name'] ?? 'ремонт')) ?>">
                <?php if (isset($price['бейдж'])): ?>
                <div
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#fef8f3] text-[#6d5744] border border-orange-200">
                    <?= htmlspecialchars($price['бейдж']) ?>
                </div>
                <?php endif; ?>
                <div class="<?= isset($price['бейдж']) ? 'mt-3' : ''; ?> text-sm text-gray-600">
                    <?= htmlspecialchars($price['заголовок'] ?? '') ?>
                </div>
                <div class="mt-2 text-3xl font-bold text-gray-900" itemprop="offers" itemscope
                    itemtype="https://schema.org/Offer">
                    <span itemprop="price"
                        content="<?= htmlspecialchars($price['цена_число'] ?? '') ?>"><?= htmlspecialchars($price['цена'] ?? '') ?></span>
                    <meta itemprop="priceCurrency" content="RUB">
                    <meta itemprop="priceValidUntil" content="2026-12-31">
                </div>
                <div class="text-sm text-gray-600"><?= htmlspecialchars($price['подзаголовок'] ?? '') ?></div>
                <ul class="mt-4 space-y-2 text-sm text-gray-700">
                    <?php foreach (($price['услуги'] ?? []) as $услуга): ?>
                    <li class="flex gap-2"><i
                            class="fa-solid fa-check text-green-600 mt-0.5"></i><span><?= htmlspecialchars($услуга) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="tel:<?= $site['phone'] ?>"
                    class="flex items-center justify-center mt-6 w-full <?= ($price['стиль'] ?? '') === 'рекомендуем' ? 'bg-[#876b55] hover:bg-[#6d5744] text-white' : 'border border-blue-700 text-blue-700 hover:bg-blue-50' ?> px-5 py-3 rounded-lg font-semibold transition"><?= htmlspecialchars($price['кнопка'] ?? 'Получить расчет') ?></a>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="mt-6 text-center text-sm text-gray-600">Все расценки — на странице <a href="/prices" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">цен на ремонт</a> или <a href="/calculator" class="text-[#6d5744] font-semibold hover:text-[#5c4a3a] underline">посчитайте в калькуляторе</a>.</p>
        <p class="mt-2 text-center text-xs text-gray-500">Цены указаны за работы, без учёта материалов. Материалы закупаем по вашей смете со скидкой 10–15%.</p>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 4. ЧТО ВХОДИТ (H2 Что входит) ---------- */
if (!empty($svc['includes'])):
?>
<section class="reveal bg-gray-50 py-10 md:py-14" aria-labelledby="includes-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="includes-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            Что входит в пакет
        </h2>
        <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($svc['includes'] as $item): ?>
            <div class="bg-white border border-gray-200 rounded-xl p-4">
                <div class="text-[#6d5744] text-xl"><?= $item['icon'] ?? '<i class="fa-solid fa-check" aria-hidden="true"></i>' ?></div>
                <div class="mt-2 font-semibold text-gray-900"><?= htmlspecialchars($item['title'] ?? '') ?></div>
                <div class="text-sm text-gray-600 mt-1"><?= htmlspecialchars($item['desc'] ?? '') ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 5. СРОКИ (H2 Сроки — НОВАЯ СЕКЦИЯ) ---------- */
if (!empty($svc['timeline'])):
?>
<section class="reveal bg-white py-10 md:py-14" aria-labelledby="timeline-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="timeline-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            Сроки ремонта
        </h2>
        <p class="mt-2 text-center text-gray-600 max-w-3xl mx-auto">Точные сроки фиксируются в договоре после замера и согласования сметы.</p>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($svc['timeline'] as $item): ?>
            <article class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center">
                <div class="text-sm text-gray-500 uppercase tracking-wider"><?= htmlspecialchars($item['label'] ?? '') ?></div>
                <div class="mt-2 text-3xl md:text-4xl font-bold text-[#6d5744]"><?= htmlspecialchars($item['value'] ?? '') ?></div>
                <?php if (!empty($item['desc'])): ?>
                <p class="mt-2 text-sm text-gray-600"><?= htmlspecialchars($item['desc']) ?></p>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 6. ОШИБКИ (H2 Ошибки — НОВАЯ СЕКЦИЯ) ---------- */
if (!empty($svc['mistakes'])):
?>
<section class="reveal bg-[#fef8f3] py-10 md:py-14" aria-labelledby="mistakes-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="mistakes-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            Типичные ошибки, которых стоит избегать
        </h2>
        <p class="mt-2 text-center text-gray-600 max-w-3xl mx-auto">Узнайте из чужого опыта — сэкономите деньги и нервы.</p>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($svc['mistakes'] as $i => $item): ?>
            <article class="bg-white border border-gray-200 rounded-2xl p-6">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-orange-100 text-[#6d5744] flex items-center justify-center font-bold text-sm"><?= $i + 1 ?></div>
                    <div>
                        <h3 class="font-semibold text-gray-900"><?= htmlspecialchars($item['title'] ?? '') ?></h3>
                        <p class="mt-1 text-sm text-gray-600"><?= htmlspecialchars($item['desc'] ?? '') ?></p>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 7. ПРИМЕРЫ РАБОТ (H2 Примеры работ) ---------- */
if (!empty($svc['portfolio'])):
    $portfolio = $svc['portfolio'];
    $portfolioLabels = ['Косметический', 'Капитальный', 'Дизайнерский'];
?>
<section class="reveal bg-white py-10 md:py-14" aria-labelledby="portfolio-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="portfolio-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            Реализованные проекты
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-6">
            <?php foreach ($portfolio as $key => $value): ?>
            <article class="border border-gray-200 rounded-2xl overflow-hidden bg-white shadow-sm" itemscope
                itemtype="https://schema.org/CreativeWork">
                <meta itemprop="name" content="<?= htmlspecialchars($value['заголовок'] ?? '') ?>">
                <meta itemprop="description"
                    content="Ремонт, срок: <?= htmlspecialchars($value['срок'] ?? '') ?>, стоимость: <?= htmlspecialchars($value['цена'] ?? '') ?>">
                <div class="relative h-52">
                    <div class="swiper swiper-type-one w-full h-full">
                        <div class="swiper-wrapper">
                            <?php foreach ((new \Functions())->getPhotos($value['текущая_папка'] ?? '') as $k => $img): ?>
                            <div class="swiper-slide">
                                <img decoding="async" loading="lazy"
                                    src="<?= htmlspecialchars($site['baseUrl'] . '/' . ($value['текущая_папка'] ?? '') . '/' . $img) ?>"
                                    class="w-full h-full object-cover" width="1280" height="720"
                                    alt="<?= htmlspecialchars(trim(($value['заголовок'] ?? '') . (!empty($value['срок']) ? ', срок ' . $value['срок'] : '') . (!empty($value['цена']) ? ', ' . $value['цена'] : '') . ' — фото ' . ((int)$k + 1))) ?>"
                                    title="<?= htmlspecialchars(($value['заголовок'] ?? '') . ' — фото ' . ((int)$k + 1)) ?>">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 z-20 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <div class="text-xs text-white/80">
                            <?= htmlspecialchars($portfolioLabels[$key % 3]) ?>
                        </div>
                        <div class="mt-1 font-semibold text-white"><?= htmlspecialchars($value['заголовок'] ?? '') ?>
                        </div>
                        <div class="flex gap-4 items-center mt-2 text-sm text-white/90"><span>Срок:
                                <?= htmlspecialchars($value['срок'] ?? '') ?></span> ∙
                            <span>Стоимость: <?= htmlspecialchars($value['цена'] ?? '') ?></span>
                        </div>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php

/* ---------- 8. ЭТАПЫ РАБОТ (H2 Этапы — сохраняем как было) ---------- */
if (!empty($svc['show_process']) && $svc['show_process'] === true):
?>
<section id="process" class="reveal py-16 bg-blue-50" aria-labelledby="process-heading">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 id="process-heading" class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Ваш путь к идеальному ремонту:<br><span class="text-[#6d5744]">6 шагов</span> до новоселья
            </h2>
            <p class="text-xl text-gray-600">
                Мы выстроили систему так, чтобы вы не тратили время на контроль и закупки
            </p>
        </div>
        <div class="relative grid md:grid-cols-3 lg:grid-cols-6 gap-6">
            <div class="hidden md:block absolute w-full h-0.5 bg-gray-300 top-8 z-0"></div>
            <?php
            $steps = [
                ['num' => '01', 'title' => 'Ваша заявка', 'desc' => 'Оставьте заявку на сайте или позвоните нам. Менеджер ответит на все вопросы и забронирует за вами время для бесплатного выезда инженера-сметчика.'],
                ['num' => '02', 'title' => 'Профессиональный замер', 'desc' => 'Приезжаем со сверхточным лазерным оборудованием. Анализируем состояние стен, углов и инженерных коммуникаций. Через 24 часа вы получаете 3 варианта детальной сметы под ваш бюджет.'],
                ['num' => '03', 'title' => 'Договор и фиксация цены', 'desc' => 'Подписываем официальный договор, где четко прописаны сроки и финальная стоимость. Цена фиксируется в договоре. Дополнительные работы — только после вашего согласования: сначала показываем причину и стоимость, начинаем только после подтверждения.'],
                ['num' => '04', 'title' => 'Закупка материалов', 'desc' => 'Закупку, доставку и подъём материалов берём на себя — вам не нужно ездить по магазинам. И наша собственная гарантия. Организуем доставку, разгрузку и подъем. Вы получаете все отчеты в цифровом виде.'],
                ['num' => '05', 'title' => 'Производство работ', 'desc' => 'Профильные бригады (электрики, сантехники, плиточники) приступают к делу. Вы получаете ежедневные фото- и видеоотчеты в MAX. Контролируйте ремонт из любой точки мира.'],
                ['num' => '06', 'title' => 'Сдача и гарантия', 'desc' => 'Ваша квартира в чистом виде и полностью готова для жизни. Все работы выполняются по действующим нормам и технологическим картам. Получаете гарантийный сертификат на 3 года. Мы остаемся на связи и после ремонта.'],
            ];
            foreach ($steps as $step):
            ?>
            <div class="text-center z-10">
                <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold"><?= $step['num'] ?></div>
                <h3 class="text-lg font-bold text-gray-800 mb-2"><?= $step['title'] ?></h3>
                <p class="text-sm text-gray-600"><?= $step['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
/* ---------- 9. PRICE TABLE (таблица по метражу) ---------- */
if (!empty($svc['price_rows'])):
    $priceRows       = $svc['price_rows'];
    $priceTableTitle = $svc['price_table_title'] ?? 'Стоимость по метражу';
    include __DIR__ . '/price-table.php';
endif;
?>

<?php
/* ---------- 10. FAQ (H2 FAQ — уникальный для каждой страницы) ---------- */
if (!empty($svc['faq'])):
?>
<section class="reveal py-12 md:py-16 bg-white" itemscope itemtype="https://schema.org/FAQPage" aria-labelledby="faq-heading">
    <div class="container mx-auto px-4">
        <h2 id="faq-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-10">
            Отвечаем на главные вопросы
        </h2>
        <div class="max-w-3xl mx-auto space-y-4">
            <?php foreach ($svc['faq'] as $item): ?>
            <div class="border border-gray-200 rounded-xl overflow-hidden" itemscope itemprop="mainEntity"
                itemtype="https://schema.org/Question">
                <button
                    class="w-full flex items-start justify-between p-4 bg-gray-50 hover:bg-gray-100 transition faq-toggle">
                    <span class="font-semibold text-gray-800" itemprop="name"><?= htmlspecialchars($item['q'] ?? '') ?></span>
                    <i class="fas fa-chevron-down text-blue-600"></i>
                </button>
                <div class="hidden p-4 text-gray-600 faq-content" itemscope itemprop="acceptedAnswer"
                    itemtype="https://schema.org/Answer">
                    <span itemprop="text"><?= htmlspecialchars($item['a'] ?? '') ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
/* ---------- 11. КЛАСТЕР ОТДЕЛКИ В НОВОСТРОЙКЕ (N-12, N-17) ---------- */
if (!empty($svc['otdelka_cluster'])):
    $otdelkaClusterTitle   = $svc['otdelka_cluster_title'] ?? 'Типы отделки в новостройке';
    $otdelkaClusterCurrent = $svc['otdelka_cluster_current'] ?? '';
    include __DIR__ . '/otdelka-cluster.php';
endif;
?>

/* ---------- 12. HUB LINKS (RangeRank Loop) ---------- */
<?php include __DIR__ . '/hub-links.php'; ?>

/* ---------- 12. ФИНАЛЬНЫЙ CTA ---------- */
<?php
$ctaFormId       = $svc['ctaFormId'] ?? 'cta_form';
$ctaFormTitle    = $svc['ctaFormTitle'] ?? 'Рассчитать стоимость ремонта';
$ctaFormSubtitle = $svc['ctaFormSubtitle'] ?? 'Бесплатный расчёт за 5 минут';
$ctaButtonText   = $svc['ctaButtonText'] ?? 'Получить расчёт бесплатно';
$ctaExpandable   = $svc['ctaExpandable'] ?? false;
$ctaSectionBadge = $svc['ctaSectionBadge'] ?? '';
$ctaSectionHeading = $svc['ctaSectionHeading'] ?? '';
$ctaSectionText    = $svc['ctaSectionText'] ?? '';
$ctaSectionBenefits = $svc['ctaSectionBenefits'] ?? [];
include __DIR__ . '/cta-section.php';
?>