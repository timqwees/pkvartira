<?php
if (!isset($ctaFormId)) $ctaFormId = 'cta';
if (!isset($ctaFormTitle)) $ctaFormTitle = 'Рассчитать стоимость ремонта';
if (!isset($ctaFormSubtitle)) $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
if (!isset($ctaButtonText)) $ctaButtonText = 'Получить расчёт бесплатно';
if (!isset($ctaExpandable)) $ctaExpandable = false;
if (!isset($ctaSectionBadge)) $ctaSectionBadge = 'Бесплатный расчёт';
if (!isset($ctaSectionHeading)) $ctaSectionHeading = 'Готовы рассчитать стоимость вашего ремонта?';
if (!isset($ctaSectionText)) $ctaSectionText = 'Мы готовы выполнить свою оценку — оставьте заявку на бесплатный расчёт стоимости ремонта.';
if (!isset($ctaSectionBenefits)) $ctaSectionBenefits = [
    'Бесплатный выезд инженера',
    'Моментальный расчёт',
    'Консультация на объекте',
    'Выезд сегодня за 3 часа',
];
?>
<section class="reveal relative w-full py-16 md:py-24 bg-gray-50 overflow-hidden">
    <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-blue-100/50 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 rounded-full bg-orange-100/50 blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            <div class="text-left">
                <span class="label-tag"><?= htmlspecialchars($ctaSectionBadge); ?></span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight tracking-tight">
                    <?= htmlspecialchars($ctaSectionHeading); ?>
                </h2>
                <p class="mt-4 text-lg text-gray-500 leading-relaxed max-w-xl">
                    <?= htmlspecialchars($ctaSectionText); ?>
                </p>

                <ul class="mt-8 space-y-4">
                    <?php foreach ($ctaSectionBenefits as $i => $benefit): ?>
                    <li class="flex items-center gap-3">
                        <span class="w-9 h-9 rounded-full <?= $i === count($ctaSectionBenefits) - 1 ? 'bg-orange-100 text-orange-600' : 'bg-green-100 text-green-600'; ?> flex items-center justify-center shrink-0"><i class="fas fa-<?= $i === count($ctaSectionBenefits) - 1 ? 'bolt' : 'check'; ?> text-sm"></i></span>
                        <span class="text-gray-700 font-medium"><?= htmlspecialchars($benefit); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="w-full lg:max-w-lg lg:ml-auto">
                <?php include __DIR__ . '/cta-form.php'; ?>
            </div>
        </div>
    </div>
</section>
