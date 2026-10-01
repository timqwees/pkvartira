<?php
/**
 * Hub-links: возвратный вес от страницы-акцептора к хабам (RangeRank Loop).
 * Подключать перед финальным CTA на посадочных услуг.
 * Ссылки относительные, анкоры — человеческие.
 */
if (!isset($hubLinksTitle)) $hubLinksTitle = 'Смотрите также';
if (!isset($hubLinks)) {
    $hubLinks = [
        ['url' => '/', 'label' => 'Главная'],
        ['url' => '/prices', 'label' => 'Цены на ремонт'],
        ['url' => '/services/smeta', 'label' => 'Смета на ремонт'],
        ['url' => '/calculator', 'label' => 'Калькулятор ремонта'],
        ['url' => '/services/pod-klyuch', 'label' => 'Ремонт под ключ'],
        ['url' => '/portfolio', 'label' => 'Портфолио работ'],
        ['url' => '/reviews', 'label' => 'Отзывы клиентов'],
        ['url' => '/blogs', 'label' => 'Блог о ремонте'],
    ];
}
?>
<section class="py-8 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-lg font-bold text-[#111827] text-center" style="font-family:var(--font-heading)"><?= htmlspecialchars($hubLinksTitle); ?></h2>
        <div class="mt-4 flex flex-wrap justify-center gap-3">
            <?php foreach ($hubLinks as $__hl): ?>
                <a href="<?= htmlspecialchars($__hl['url']); ?>" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500 transition"><?= htmlspecialchars($__hl['label']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
