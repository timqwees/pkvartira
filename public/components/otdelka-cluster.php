<?php
/**
 * Cluster-links: взаимные ссылки кластера «отделка в новостройке» (N-12, N-17).
 *
 * Страница /services/novostroyka ссылается на все 7 типов отделки,
 * и каждая из 7 страниц ссылается на остальные 6 — взаимные связи внутри кластера.
 *
 * Ожидает (необязательно):
 * - $otdelkaClusterTitle — заголовок блока
 * - $otdelkaClusterCurrent — текущий слаг (будет исключён из списка)
 */
if (!isset($otdelkaClusterTitle)) {
    $otdelkaClusterTitle = 'Типы отделки в новостройке';
}
if (!isset($otdelkaClusterCurrent)) {
    $otdelkaClusterCurrent = '';
}

$otdelkaCluster = [
    ['slug' => 'bez-otdelki',     'label' => 'Без отделки',        'desc' => 'Только инженерия и подготовка стен'],
    ['slug' => 'chernovaya',      'label' => 'Черновая отделка',   'desc' => 'Стяжка, штукатурка, разводка сетей'],
    ['slug' => 'predchistovaya',  'label' => 'Предчистовая',       'desc' => 'Финишная подготовка под чистую отделку'],
    ['slug' => 'chistovaya',      'label' => 'Чистовая отделка',   'desc' => 'Полностью готовая квартира к заселению'],
    ['slug' => 'white-box',       'label' => 'White box',          'desc' => 'Белая коробка: ровные стены и пол'],
    ['slug' => 'ot-zastroyschika','label' => 'Отделка от застройщика', 'desc' => 'Доработка и замена базовой отделки'],
    ['slug' => 'pod-zaselenie',   'label' => 'Под заселение',      'desc' => 'Быстрый ремонт к сдаче квартиры'],
];
?>
<section class="reveal py-10 md:py-14 bg-gray-50" aria-labelledby="otdelka-cluster-heading">
    <div class="max-w-7xl mx-auto px-4">
        <h2 id="otdelka-cluster-heading" class="text-2xl md:text-3xl font-bold text-gray-900 text-center">
            <?= htmlspecialchars($otdelkaClusterTitle) ?>
        </h2>
        <p class="mt-3 text-center text-sm text-gray-600 max-w-3xl mx-auto">
            Цена и состав работ зависят от того, на каком этапе вы покупаете новостройку. Выберите свой вариант — покажем, что входит и сколько стоит.
        </p>
        <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($otdelkaCluster as $__oc): ?>
                <?php if ($__oc['slug'] === $otdelkaClusterCurrent) { continue; } ?>
                <a href="/services/<?= htmlspecialchars($__oc['slug']) ?>"
                   class="bg-white border border-gray-200 rounded-xl p-4 hover:border-[#876b55] hover:shadow-md transition">
                    <div class="font-semibold text-gray-900 text-[15px] leading-tight"><?= htmlspecialchars($__oc['label']) ?></div>
                    <div class="text-sm text-gray-600 mt-1"><?= htmlspecialchars($__oc['desc']) ?></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
