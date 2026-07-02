<?php if (!isset($priceRows)) $priceRows = []; if (!isset($priceTableTitle)) $priceTableTitle = 'Цены за м2 по типам ремонта'; if (!isset($priceTableNote)) $priceTableNote = 'Точная стоимость зависит от состояния помещения, сложности работ и выбранных материалов. Бесплатный замер и смета в день обращения.'; ?>
<section class="reveal py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-4">
            <?= htmlspecialchars($priceTableTitle); ?>
        </h2>
        <p class="text-center text-gray-600 mb-10 max-w-3xl mx-auto">
            <?= htmlspecialchars($priceTableNote); ?>
        </p>
        <div class="overflow-x-auto">
            <table class="w-full max-w-4xl mx-auto text-sm text-gray-700">
                <thead>
                    <tr class="bg-orange-500 text-white">
                        <th class="px-4 py-3 text-left font-semibold">Площадь</th>
                        <?php foreach ($priceRows as $row): ?>
                            <th class="px-4 py-3 text-center font-semibold"><?= htmlspecialchars($row['label']); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $areas = [30, 45, 60, 80, 100, 120, 150, 200]; ?>
                    <?php foreach ($areas as $area): ?>
                        <tr class="<?= $loop = ($area === 100 ? 'bg-orange-50 font-semibold' : ($loop ?? false ? 'bg-white' : 'bg-white')); unset($loop); ?>">
                            <td class="px-4 py-3 border-b border-gray-200 font-medium"><?= $area; ?> м²</td>
                            <?php foreach ($priceRows as $row): ?>
                                <td class="px-4 py-3 border-b border-gray-200 text-center">
                                    <?php
                                    $total = $area * (int)$row['price'];
                                    echo number_format($total, 0, '.', ' ') . ' руб';
                                    ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="text-xs text-gray-400 text-center mt-6">* Цены указаны за работу без учёта материалов. Итоговая стоимость рассчитывается индивидуально.</p>
    </div>
</section>
