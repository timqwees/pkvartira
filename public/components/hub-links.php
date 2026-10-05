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
        ['url' => '/services/1room', 'label' => 'Ремонт 1-комнатной'],
        ['url' => '/services/2room', 'label' => 'Ремонт 2-комнатной'],
        ['url' => '/services/3room', 'label' => 'Ремонт 3-комнатной'],
        ['url' => '/services/4room', 'label' => 'Ремонт 4-комнатной'],
        ['url' => '/services/studio', 'label' => 'Ремонт студии'],
        ['url' => '/services/budushchiy-remont', 'label' => 'Ремонт к дате ключей'],
        ['url' => '/services/novostroyka', 'label' => 'Ремонт в новостройке'],
        ['url' => '/services/vtorichka', 'label' => 'Ремонт во вторичке'],
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
