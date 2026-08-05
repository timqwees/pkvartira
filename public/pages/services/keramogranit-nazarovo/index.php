<?php
use Setting\Route\Function\Functions;
$site = Functions::site();
$title = 'Укладка керамогранита — цена за м², работа в Москве и Назарово | ПКвартира';
$bg_url = '/public/assets/images/portfolio-photos/3room/standard/2_60sqm/6.webp';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?> | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?></title>
    <meta name="description" content="Укладка керамогранита — цена за квадратный метр. Стоимость работы от 1 200 ₽/м². Укладка на пол и стены, с подрезкой и без. Гарантия 3 года. Работаем в Москве и области.">
    <meta name="keywords" content="укладка керамогранита цена, цена поклеить керамогранит, керамогранит укладка стоимость, сколько стоит уложить керамогранит, цена керамогранита за м2">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/keramogranit-nazarovo'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Укладка керамогранита","item": "<?= $site['baseUrl']; ?>/services/keramogranit-nazarovo"}
            ]},
            {"@type": "Service","name": "Укладка керамогранита","provider": {"@type": "Organization","name": "ПКвартира"}}
        ]
    }
    </script>
</head>
<body class="bg-white">
<?php include_once './public/components/header.php'; ?>
<main class="pt-20" style="padding-top:80px">
    <section class="relative bg-[#1f2937] text-white">
        <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('<?= $bg_url; ?>')"></div>
        <div class="relative container mx-auto px-4 max-w-6xl py-14 md:py-20">
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Укладка керамогранита — цена за м²</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Профессиональная укладка керамогранита на пол и стены. Стоимость работы от 1 200 ₽/м². Фиксированная смета, гарантия 3 года.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">₽</span> Работа от 1 200 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> С материалом от 2 500 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Гарантия 3 года</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Цена укладки керамогранита</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Стоимость укладки керамогранита зависит от формата плитки, сложности узора и подготовки основания. Выполняем работы любой сложности: от стандартной укладки до художественного панно. Используем профессиональные инструменты и качественные смеси.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Подготовка и выравнивание основания</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Укладка керамогранита на пол и стены</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Резка, подрезка, сверление отверстий</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Затирка швов, финишная обработка</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Стоимость работ</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка керамогранита на пол</span><span class="font-bold text-[#111827]">от 1 200 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Укладка на стены</span><span class="font-bold text-[#111827]">от 1 400 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Крупноформатный (от 60×60)</span><span class="font-bold text-[#111827]">от 1 600 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Под ключ (с материалом)</span><span class="font-bold text-[#111827]">от 2 500 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Демонтаж старой плитки</span><span class="font-bold text-[#111827]">от 300 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Этапы укладки керамогранита</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Подготовка</h3><p class="mt-1 text-sm text-[#6b7280]">Выравниваем пол/стены, грунтуем</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Разметка</h3><p class="mt-1 text-sm text-[#6b7280]">Делаем раскладку с учётом рисунка</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Укладка</h3><p class="mt-1 text-sm text-[#6b7280]">Монтируем керамогранит на клей</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Затирка</h3><p class="mt-1 text-sm text-[#6b7280]">Затираем швы, очищаем поверхность</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Заказать укладку керамогранита</h2>
                <form action="/send/email" method="POST" class="mt-6 space-y-4">
                    <input name="имя" type="text" placeholder="Ваше имя" required class="w-full px-4 py-3 border border-gray-300 rounded-xl text-[#111827]">
                    <div class="relative">
                        <input name="телефн" data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" placeholder="(___) ___-__-__" required class="w-full px-4 py-3 border border-gray-300 rounded-xl text-[#111827]">
                    </div>
                    <input type="hidden" name="Услуга" value="Укладка керамогранита">
                    <label class="flex items-start gap-2 text-xs text-[#6b7280] cursor-pointer mb-3"><input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0"><span>Согласен на обработку персональных данных</span></label>
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                    <button type="submit" class="w-full py-4 rounded-xl bg-[#f97316] text-white font-bold hover:bg-[#ea580c] transition-colors">Заказать</button>
                </form>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Вопросы об укладке керамогранита</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит укладка керамогранита за квадратный метр?</summary><p class="mt-2 text-sm text-[#6b7280]">Цена работы от 1 200 ₽/м² на пол, от 1 400 ₽/м² на стены. С материалом от 2 500 ₽/м².</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Какой керамогранит лучше для пола?</summary><p class="mt-2 text-sm text-[#6b7280]">Для пола рекомендуем керамогранит толщиной от 8 мм, класс износостойкости PEI 4-5.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько сохнет керамогранит после укладки?</summary><p class="mt-2 text-sm text-[#6b7280]">Ходить можно через 24 часа, полная нагрузка через 5-7 дней.</p></details>
            </div>
        </div>
    </section>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/ukladka-laminata" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Укладка ламината</a>
                <a href="/services/solnechnogorsk" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Солнечногорске</a>
                <a href="/services/mytishchi" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Мытищах</a>
                <a href="/services/balashikha" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Балашихе</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/services/nowostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="/public/assets/scripts/components/reveal.min.js" defer></script>
</body>
</html>
