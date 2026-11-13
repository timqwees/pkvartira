<?php
/**
 * Case-study: блок «реальный выполненный объект» (N-15, N-16, J-01, F-01).
 *
 * Ожидает (все параметры необязательны, кроме $caseData):
 * - $caseData (array) — ['img','alt','title','area','days','sum','note','photos'=>[], 'bullets'=>[]]
 * - $caseTitle  — заголовок секции
 * - $caseSubtitle — подзаголовок
 * - $caseNote   — примечание под блоком (ссылка на /prices и т.п.)
 * - $caseBefore (array|null) — ['img','alt','caption'] — фото «ДО» (J-01: сравнение до/после)
 */
if (empty($caseData)) {
    return;
}

$caseTitle    = $caseTitle    ?? 'Выполненный объект';
$caseSubtitle = $caseSubtitle ?? '';
$caseNote     = $caseNote     ?? '';
$caseBefore   = $caseBefore   ?? null;

$__casePhotos = $caseData['photos'] ?? [];
if (empty($__casePhotos) && !empty($caseData['img'])) {
    $__casePhotos = [$caseData['img']];
}
?>
<section class="reveal bg-white py-10 md:py-14" aria-labelledby="case-study-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="case-study-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            <?= htmlspecialchars($caseTitle) ?>
        </h2>
        <?php if ($caseSubtitle !== ''): ?>
        <p class="mt-3 text-center text-gray-600 max-w-3xl mx-auto"><?= htmlspecialchars($caseSubtitle) ?></p>
        <?php endif; ?>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="grid grid-cols-2 gap-3">
                <?php foreach (array_slice($__casePhotos, 0, 4) as $__i => $__src): ?>
                    <img src="<?= htmlspecialchars($__src) ?>"
                         alt="<?= htmlspecialchars(($caseData['alt'] ?? $caseData['title'] ?? 'Выполненный объект') . ($__i ? ' — фото ' . ($__i + 1) : '')) ?>"
                         loading="lazy" decoding="async"
                         class="w-full h-40 md:h-48 object-cover rounded-xl border border-gray-200">
                <?php endforeach; ?>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-7">
                <h3 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($caseData['title'] ?? '') ?></h3>

                <dl class="mt-4 grid grid-cols-3 gap-3">
                    <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                        <dt class="text-xs text-gray-500 uppercase tracking-wider">Площадь</dt>
                        <dd class="mt-1 text-lg font-bold text-gray-900"><?= htmlspecialchars($caseData['area'] ?? '') ?></dd>
                    </div>
                    <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                        <dt class="text-xs text-gray-500 uppercase tracking-wider">Срок</dt>
                        <dd class="mt-1 text-lg font-bold text-gray-900"><?= htmlspecialchars($caseData['days'] ?? '') ?></dd>
                    </div>
                    <div class="bg-white rounded-xl p-3 text-center border border-gray-200">
                        <dt class="text-xs text-gray-500 uppercase tracking-wider">Стоимость</dt>
                        <dd class="mt-1 text-lg font-bold text-[#6d5744]"><?= htmlspecialchars($caseData['sum'] ?? '') ?></dd>
                    </div>
                </dl>

                <?php if (!empty($caseData['note'])): ?>
                <p class="mt-4 text-[#4b5563] leading-relaxed"><?= htmlspecialchars($caseData['note']) ?></p>
                <?php endif; ?>

                <?php if (!empty($caseData['bullets'])): ?>
                <ul class="mt-4 space-y-2 text-sm text-[#4b5563]">
                    <?php foreach ($caseData['bullets'] as $__b): ?>
                    <li class="flex items-start gap-2">
                        <span class="text-[#876b55] mt-1">•</span>
                        <span><?= htmlspecialchars($__b) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <p class="mt-5 text-sm text-gray-600">
                    Цена зафиксирована в договоре. Стоимость работ указана без учёта материалов — закупаем их по вашей смете со скидкой 10–15%.
                </p>
                <a href="/calculator"
                   class="mt-5 inline-flex items-center justify-center px-6 py-3 rounded-lg bg-[#876b55] hover:bg-[#6d5744] text-white font-semibold transition">
                    Рассчитать стоимость ремонта
                </a>
            </div>
        </div>

        <?php if (!empty($caseBefore) && !empty($caseBefore['img'])): ?>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <figure class="bg-gray-50 border border-gray-200 rounded-2xl overflow-hidden">
                <img src="<?= htmlspecialchars($caseBefore['img']) ?>"
                     alt="<?= htmlspecialchars($caseBefore['alt'] ?? 'Состояние квартиры до ремонта') ?>"
                     loading="lazy" decoding="async"
                     class="w-full h-56 md:h-72 object-cover">
                <figcaption class="px-5 py-4">
                    <span class="inline-block text-xs uppercase tracking-wider text-gray-500">До</span>
                    <p class="mt-1 text-sm text-gray-700"><?= htmlspecialchars($caseBefore['caption'] ?? 'Состояние объекта до ремонта') ?></p>
                </figcaption>
            </figure>
            <figure class="bg-gray-50 border border-gray-200 rounded-2xl overflow-hidden">
                <img src="<?= htmlspecialchars($caseData['img'] ?? ($__casePhotos[0] ?? '')) ?>"
                     alt="<?= htmlspecialchars($caseData['alt'] ?? $caseData['title'] ?? 'Готовый объект') ?>"
                     loading="lazy" decoding="async"
                     class="w-full h-56 md:h-72 object-cover">
                <figcaption class="px-5 py-4">
                    <span class="inline-block text-xs uppercase tracking-wider text-[#876b55]">После</span>
                    <p class="mt-1 text-sm text-gray-700"><?= htmlspecialchars($caseData['after_caption'] ?? 'Тот же объект после ремонта — сдаём с гарантией 3 года.') ?></p>
                </figcaption>
            </figure>
        </div>
        <?php endif; ?>

        <?php if ($caseNote !== ''): ?>
        <p class="mt-6 text-center text-sm text-gray-600"><?= $caseNote ?></p>
        <?php endif; ?>
    </div>
</section>
