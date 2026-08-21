<?php
if (!isset($ctaFormId)) $ctaFormId = 'cta';
if (!isset($ctaFormTitle)) $ctaFormTitle = 'Рассчитать стоимость ремонта';
if (!isset($ctaFormSubtitle)) $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
if (!isset($ctaButtonText)) $ctaButtonText = 'Получить расчёт бесплатно';
if (!isset($ctaFormClasses)) $ctaFormClasses = '';
if (!isset($ctaExpandable)) $ctaExpandable = false;
if (!isset($ctaShowName)) $ctaShowName = false;
if (!isset($ctaHiddenCity)) $ctaHiddenCity = '';

$p = $ctaFormId;
?>
<div class="<?= htmlspecialchars($ctaFormClasses); ?>">
<form action="/send/email" method="POST" data-form-id="<?= htmlspecialchars($ctaFormId); ?>"
    class="w-full max-w-md mx-auto relative">
    <div class="bg-white/90 backdrop-blur-sm border border-gray-200 rounded-2xl shadow-xl p-5 md:p-6">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($ctaFormTitle); ?></h2>
        <p class="text-sm text-gray-500 mb-4"><?= htmlspecialchars($ctaFormSubtitle); ?></p>

        <?php if ($ctaShowName): ?>
        <div class="mb-4 relative">
            <input type="text" name="имя" placeholder="Ваше имя" aria-label="Имя" class="border w-full rounded-xl p-4" required>
            <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-gray-900">Имя <span class="text-red-500">*</span></span>
        </div>
        <?php endif; ?>

        <?php if ($ctaHiddenCity): ?>
        <input type="hidden" name="Город" value="<?= htmlspecialchars($ctaHiddenCity); ?>">
        <?php endif; ?>

        <div class="mb-4 relative">
            <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн"
                placeholder="+7 (999) 123-45-67" aria-label="Телефон" class="border w-full rounded-xl p-4" required>
            <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-gray-900">Телефон <span class="text-red-500">*</span></span>
        </div>

        <label class="flex items-start gap-2 text-xs text-gray-500 cursor-pointer mb-3">
            <input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0">
            <span>Согласен на обработку персональных данных</span>
        </label>
        <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

        <button type="submit"
            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-xl text-base md:text-xl font-bold shadow-lg shadow-orange-500/25 transition-all">
            <?= htmlspecialchars($ctaButtonText); ?>
        </button>
        <p class="text-xs text-gray-400 text-center mt-2">Ответим за 5 минут</p>

        <?php if ($ctaExpandable): ?>
        <button type="button" id="<?= $p; ?>ToggleDetails"
            class="mt-4 inline-flex items-center gap-2 bg-white hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 cursor-pointer group w-full justify-center">
            <i class="fa-solid fa-chevron-down transition-all duration-300 group-hover:rotate-180"></i>
            <span id="<?= $p; ?>ToggleText">Указать детали ремонта</span>
        </button>
        <?php endif; ?>
    </div>

    <?php if ($ctaExpandable): ?>
        <div id="<?= $p; ?>Expandable" class="form-expandable hero-expandable-panel">
                <div class="grid grid-cols-2 gap-2 bg-gray-100 p-1 rounded-xl mb-4" role="radiogroup" aria-label="Тип жилья">
                    <input id="<?= $p; ?>HousingNew" type="radio" name="Тип жилья" value="Новостройка" checked class="sr-only">
                    <label for="<?= $p; ?>HousingNew" class="form-option w-full py-2 rounded-lg text-sm md:text-base font-semibold text-gray-700 text-center">Новостройка</label>
                    <input id="<?= $p; ?>HousingOld" type="radio" name="Тип жилья" value="Вторичка" class="sr-only">
                    <label for="<?= $p; ?>HousingOld" class="form-option w-full py-2 rounded-lg text-sm md:text-base font-semibold text-gray-700 text-center">Вторичка</label>
                </div>

                <div class="mb-4">
                    <div class="text-sm text-gray-700 mb-2">Комнат</div>
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $rooms = [['id' => '1', 'val' => '1'], ['id' => '2', 'val' => '2'], ['id' => '3', 'val' => '3'], ['id' => '4', 'val' => '4+'], ['id' => 'Studio', 'val' => 'студия']];
                        $roomDefault = true;
                        foreach ($rooms as $r):
                        ?>
                        <input id="<?= $p; ?>Rooms<?= $r['id']; ?>" type="radio" name="Комнат" value="<?= htmlspecialchars($r['val']); ?>" <?= $roomDefault ? 'checked' : ''; $roomDefault = false; ?> class="sr-only">
                        <label for="<?= $p; ?>Rooms<?= $r['id']; ?>" class="form-pill px-4 py-2 rounded-lg border border-gray-200 bg-white font-semibold text-sm text-gray-800 text-center"><?= htmlspecialchars($r['val']); ?></label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="text-sm text-gray-700">Площадь</div>
                        <div class="text-sm font-semibold text-gray-900"><span id="<?= $p; ?>RangeValue"></span> м²</div>
                    </div>
                    <input id="<?= $p; ?>RangeSize" name="Площадь" type="range" min="20" max="300" value="20"
                        aria-label="Площадь в квадратных метрах" class="w-full accent-orange-500">
                </div>

                <div class="mb-4">
                    <div class="text-sm text-gray-700 mb-2">Тип ремонта</div>
                    <select name="Ремонт" aria-label="Тип ремонта" class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-white text-black">
                        <option value="Черновой ремонт">Черновой ремонт</option>
                        <option value="Чистовой ремонт">Чистовой ремонт</option>
                        <option value="Дизайнерский ремонт">Дизайнерский ремонт</option>
                        <option value="Косметический ремонт">Косметический ремонт</option>
                        <option value="Капитальный ремонт">Капитальный ремонт</option>
                    </select>
                </div>

                <div class="mb-1">
                    <div class="text-sm text-gray-700 mb-2">Включить в расчёт</div>
                    <div class="flex flex-wrap gap-2">
                        <input id="<?= $p; ?>ExtraDraft" type="checkbox" name="Включить в расчёт" value="Черновой материал" class="sr-only">
                        <label for="<?= $p; ?>ExtraDraft" class="form-pill px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-sm font-semibold text-gray-800">Черновой материал</label>
                        <input id="<?= $p; ?>ExtraFinish" type="checkbox" name="Включить в расчёт2" value="Чистовой материал" class="sr-only">
                        <label for="<?= $p; ?>ExtraFinish" class="form-pill px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-sm font-semibold text-gray-800">Чистовой материал</label>
                        <input id="<?= $p; ?>ExtraDesign" type="checkbox" name="Включить в расчёт3" value="Дизайн-проект" class="sr-only">
                        <label for="<?= $p; ?>ExtraDesign" class="form-pill px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-sm font-semibold text-gray-800">Дизайн-проект</label>
                    </div>
                </div>
        </div>
        <?php endif; ?>
</form>

<?php if ($ctaExpandable): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.getElementById('<?= $p; ?>ToggleDetails');
    var expandable = document.getElementById('<?= $p; ?>Expandable');
    var icon = toggle ? toggle.querySelector('i') : null;
    var text = document.getElementById('<?= $p; ?>ToggleText');
    var range = document.getElementById('<?= $p; ?>RangeSize');
    var rangeVal = document.getElementById('<?= $p; ?>RangeValue');
    if (toggle && expandable) {
        toggle.addEventListener('click', function() {
            expandable.classList.toggle('expanded');
            if (icon) icon.classList.toggle('rotate-180');
            text.textContent = expandable.classList.contains('expanded') ? 'Свернуть' : 'Указать детали ремонта';
            toggle.classList.toggle('active');
        });
    }
    if (range && rangeVal) {
        rangeVal.textContent = '20';
        range.addEventListener('input', function(e) { rangeVal.textContent = e.target.value; });
    }

    if (expandable) {
        var labelFor = function(id) {
            return document.querySelector('label[for="' + id + '"]');
        };
        var refresh = function(input) {
            var label = labelFor(input.id);
            if (!label) return;
            if (input.type === 'radio') {
                expandable.querySelectorAll('input[type="radio"]').forEach(function(r) {
                    if (r.name === input.name) {
                        var l = labelFor(r.id);
                        if (l) l.classList.remove('active');
                    }
                });
                if (input.checked) label.classList.add('active');
            } else if (input.type === 'checkbox') {
                label.classList.toggle('active', input.checked);
            }
        };
        expandable.addEventListener('change', function(e) {
            if (e.target && e.target.tagName === 'INPUT') refresh(e.target);
        });
        expandable.querySelectorAll('input:checked').forEach(function(input) {
            var label = labelFor(input.id);
            if (label) label.classList.add('active');
        });
    }
});
</script>
<?php endif; ?>
</div>
