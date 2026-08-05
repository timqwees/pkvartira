<?php
use Setting\Route\Function\Functions;
$site = Functions::site();
$title = 'Ремонт квартир в Лобне — цены под ключ, гарантия 3 года | ПКвартира';
$bg_url = '/public/assets/images/portfolio-photos/studio/1_24sqm/1.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?> | <?= htmlspecialchars($site['name'] ?? 'ПКвартира'); ?></title>
    <meta name="description" content="Ремонт квартир в Лобне под ключ. Цены от 8 000 ₽/м². Косметический, капитальный, дизайнерский ремонт. Фиксированная смета, гарантия 3 года. Замер и смета в Лобне бесплатно.">
    <meta name="keywords" content="ремонт квартир Лобня, ремонт под ключ в Лобне, отделка квартир в Лобне, ремонт квартир в Лобня цены">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/lobnya'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Ремонт в Лобне","item": "<?= $site['baseUrl']; ?>/services/lobnya"}
            ]},
            {"@type": "Service","name": "Ремонт квартир в Лобне","provider": {"@type": "Organization","name": "ПКвартира"},"areaServed": {"@type": "City","name": "Лобня"}}
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
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Ремонт квартир в Лобне</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Профессиональный ремонт квартир под ключ в Лобне. Цены от 8 000 ₽/м². Фиксированная смета, гарантия 3 года, бесплатный замер.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">₽</span> от 8 000 ₽/м²</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Гарантия 3 года</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Замер бесплатно</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Ремонт квартир в Лобне под ключ</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Выполняем ремонт квартир в Лобне под ключ любой сложности. Работаем с новостройками, вторичным жильём, частными домами. Составляем прозрачную смету, фиксируем сроки в договоре. Выезд инженера на замер — бесплатно.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Косметический, капитальный, дизайнерский ремонт</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Ремонт квартир, домов, коммерческих помещений</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> С материалами заказчика или под ключ</li>
                    </ul>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Цены на ремонт в Лобне</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Косметический</span><span class="font-bold text-[#111827]">от 8 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200"><span class="text-[#4b5563]">Капитальный</span><span class="font-bold text-[#111827]">от 13 000 ₽/м²</span></div>
                        <div class="flex justify-between items-center py-2"><span class="text-[#4b5563]">Дизайнерский</span><span class="font-bold text-[#111827]">от 18 000 ₽/м²</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Как мы работаем</h2>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">1</span><h3 class="mt-3 font-semibold text-[#111827]">Заявка</h3><p class="mt-1 text-sm text-[#6b7280]">Оставьте заявку на сайте</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">2</span><h3 class="mt-3 font-semibold text-[#111827]">Выезд</h3><p class="mt-1 text-sm text-[#6b7280]">Инженер приедет на замер</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">3</span><h3 class="mt-3 font-semibold text-[#111827]">Смета</h3><p class="mt-1 text-sm text-[#6b7280]">Фиксированная смета в день обращения</p></div>
                <div class="bg-white rounded-xl p-5 text-center"><span class="w-10 h-10 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center mx-auto font-bold text-lg">4</span><h3 class="mt-3 font-semibold text-[#111827]">Ремонт</h3><p class="mt-1 text-sm text-[#6b7280]">Выполняем в срок с гарантией</p></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Рассчитать стоимость ремонта в Лобне</h2>
                <form action="/send/email" method="POST" class="mt-6 space-y-4">
                    <input name="имя" type="text" placeholder="Ваше имя" required class="w-full px-4 py-3 border border-gray-300 rounded-xl text-[#111827]">
                    <div class="relative">
                        <input name="телефн" data-type-phone type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" placeholder="(___) ___-__-__" required class="w-full px-4 py-3 border border-gray-300 rounded-xl text-[#111827]">
                    </div>
                    <input type="hidden" name="Город" value="Лобня">
                    <label class="flex items-start gap-2 text-xs text-[#6b7280] cursor-pointer mb-3"><input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0"><span>Согласен на обработку персональных данных</span></label>
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                    <button type="submit" class="w-full py-4 rounded-xl bg-[#f97316] text-white font-bold hover:bg-[#ea580c] transition-colors">Рассчитать</button>
                </form>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Часто задаваемые вопросы</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Работаете ли вы в Лобне?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, выезжаем на объекты в Лобне и в ближайших районах. Выезд бесплатный.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Сколько стоит ремонт квартиры в Лобне?</summary><p class="mt-2 text-sm text-[#6b7280]">Цены от 8 000 ₽/м². Точная стоимость зависит от объёма работ и материалов. Рассчитаем смету после бесплатного замера.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Делаете ли ремонт под ключ с материалами?</summary><p class="mt-2 text-sm text-[#6b7280]">Да, работаем по схеме под ключ: от закупки материалов до финальной уборки. Вам останется только завезти мебель.</p></details>
            </div>
        </div>
    </section>
</main>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Другие услуги</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/services/lyubertsy" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Люберцах</a>
                <a href="/services/odintsovo" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Одинцово</a>
                <a href="/services/mitino" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Митино</a>
                <a href="/services/khimki" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Химках</a>
                <a href="/services/balashikha" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Балашихе</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/services/nowostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт новостроек</a>
                <a href="/services/studio" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт студий</a>
                <a href="/services/vtorichka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Вторичное жильё</a>
                <a href="/services/kaluga" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Калуге</a>
                <a href="/services/solnechnogorsk" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в Солнечногорске</a>
                <a href="/services/ontario" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">ЖК Онтарио</a>
                <a href="/services/ukladka-laminata" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Укладка ламината</a>
                <a href="/services/keramogranit-nazarovo" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Укладка керамогранита</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
            </div>
        </div>
    </section>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="/public/assets/scripts/components/reveal.min.js" defer></script>
</body>
</html>