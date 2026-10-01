<?php
use Setting\Route\Functions\TheFunction;
$site = TheFunction::site();
$title = 'Ремонт квартиры в будущем — узнайте цену заранее';
$bg_url = '/public/assets/images/portfolio-photos/newbuilds/1_86sqm/1.jpg';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo($title,48)); ?> | <?= htmlspecialchars($site['name'] ?? 'Проект Квартира'); ?></title>
    <meta name="description" content="<?= htmlspecialchars(\Setting\Route\Functions\TheFunction::truncateSeo('Планируете ремонт квартиры и скоро получаете ключи? Узнайте стоимость ремонта уже сейчас: ориентиры цен, план бюджета, бесплатный замер ближе к дате. — Проект Квартира (Проект Квартира).',155)); ?>"><meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($site['baseUrl'] . '/services/budushchiy-remont'); ?>">
    <?php include_once './public/components/head-includes.php'; ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {"@type": "BreadcrumbList","itemListElement": [
                {"@type": "ListItem","position": 1,"name": "Главная","item": "<?= $site['baseUrl']; ?>/"},
                {"@type": "ListItem","position": 2,"name": "Ремонт в будущем","item": "<?= $site['baseUrl']; ?>/services/budushchiy-remont"}
            ]},
            {"@type": "Service","name": "Планирование ремонта квартиры","provider": {"@id": "<?= $site['baseUrl']; ?>#organization"},"areaServed": {"@type": "City","name": "Москва"}}
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
            <h1 class="text-[28px] md:text-[40px] font-extrabold leading-tight" style="font-family:var(--font-heading)">Планируете ремонт квартиры? Узнайте стоимость уже сейчас</h1>
            <p class="mt-4 text-[17px] text-gray-300 max-w-2xl">Ждёте ключи от новостройки? Посчитайте ориентир цены заранее и спокойно спланируйте бюджет — а точную смету сделаем после бесплатного замера готовой квартиры.</p>
            <div class="mt-6 flex flex-wrap gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">₽</span> Ориентир за 5 минут</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Замер бесплатно</div>
                <div class="flex items-center gap-2 text-sm text-gray-300"><span class="w-5 h-5 rounded-full bg-orange-500 flex items-center justify-center text-[10px]">✓</span> Старт в удобную дату</div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Сколько заложить в бюджет</h2>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Ориентиры 2026 года для планирования: точная цифра зависит от площади, состояния квартиры и материалов — её даст смета после замера.</p>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Косметический — от 8 000 ₽/м²</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Капитальный — от 13 000 ₽/м²</li>
                        <li class="flex items-start gap-2 text-[#4b5563]"><span class="text-orange-500 mt-1">•</span> Дизайнерский — от 18 000 ₽/м²</li>
                    </ul>
                    <p class="mt-4 text-[#4b5563] leading-relaxed">Посчитайте свой метраж прямо сейчас: <a href="/calculator" class="text-orange-600 underline hover:text-orange-700">калькулятор ремонта</a>, полные таблицы — на странице <a href="/prices" class="text-orange-600 underline hover:text-orange-700">цен</a>.</p>
                </div>
                <div class="bg-[#f9fafb] rounded-xl p-6">
                    <h3 class="text-lg font-bold text-[#111827]">Как спланировать ремонт заранее</h3>
                    <div class="mt-4 space-y-3">
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-orange-500">1</span><span class="text-[#4b5563]">Ориентир сейчас: калькулятор и <a href="/services/smeta" class="text-orange-600 underline hover:text-orange-700">пример сметы</a></span></div>
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-orange-500">2</span><span class="text-[#4b5563]">Приёмка квартиры: на что смотреть у застройщика — <a href="/blog/priemka-kvartiry-zastroyshchik" class="text-orange-600 underline hover:text-orange-700">чек-лист</a></span></div>
                        <div class="flex gap-3 py-2 border-b border-gray-200"><span class="font-bold text-orange-500">3</span><span class="text-[#4b5563]">Замер готовой квартиры — бесплатно</span></div>
                        <div class="flex gap-3 py-2"><span class="font-bold text-orange-500">4</span><span class="text-[#4b5563]">Смета в 3 вариантах за 24 часа, старт в удобную дату</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Ремонт в новостройке — с чего начать</h2>
            <p class="mt-3 text-center text-[#6b7280] max-w-2xl mx-auto">Если квартира ещё строится — изучите <a href="/services/novostroyka" class="text-orange-600 underline hover:text-orange-700">ремонт в новостройке</a>: типы отделки от застройщика, усадка дома, приёмка.</p>
            <div class="mt-6 text-center">
                <a href="/blog/remont-novostroyki-2026" class="inline-block px-6 py-3 rounded-lg border border-gray-300 bg-white font-semibold text-[#111827] hover:border-orange-500 transition">Гайд: с чего начать и на чём сэкономить →</a>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="max-w-lg mx-auto">
                <?php
$ctaFormId = 'budushchiy_cta';
$ctaFormTitle = 'Получить ориентир стоимости';
$ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
$ctaButtonText = 'Получить ориентир';
$ctaShowName = true;
$ctaHiddenCity = 'Москва';
$ctaExpandable = false;
include './public/components/cta-form.php';
?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#f9fafb]">
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-xl font-bold text-[#111827] text-center" style="font-family:var(--font-heading)">Часто задаваемые вопросы</h2>
            <div class="mt-6 max-w-3xl mx-auto space-y-3">
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Когда лучше заказывать ремонт, если ключи будут через полгода?</summary><p class="mt-2 text-sm text-[#6b7280]">Ориентир цены можно получить уже сейчас через калькулятор. Точную смету составим после бесплатного замера готовой квартиры — заявка ни к чему не обязывает.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Цена не вырастет, пока я жду ключи?</summary><p class="mt-2 text-sm text-[#6b7280]">Точная стоимость фиксируется в договоре по смете после замера. Ориентир сейчас нужен, чтобы спланировать бюджет.</p></details>
                <details class="bg-white rounded-xl p-4"><summary class="font-semibold text-[#111827] cursor-pointer">Что проверить при приёмке квартиры?</summary><p class="mt-2 text-sm text-[#6b7280]">Геометрию стен, стяжку, окна, электрику и сантехнику. Подробно — в нашем чек-листе приёмки. Можем выехать на приёмку вместе с вами.</p></details>
            </div>
        </div>
    </section>
    <section class="py-12 text-center bg-white">
        <div class="container mx-auto px-4 max-w-6xl">
            <h3 class="text-xl font-bold text-[#111827]" style="font-family:var(--font-heading)">Смотрите также</h3>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                <a href="/" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Главная</a>
                <a href="/services/novostroyka" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт в новостройке</a>
                <a href="/services/pod-klyuch" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Ремонт под ключ</a>
                <a href="/prices" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Цены</a>
                <a href="/calculator" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Калькулятор</a>
                <a href="/services/smeta" class="px-4 py-2 rounded-lg bg-white border border-gray-200 text-sm text-[#4b5563] hover:border-orange-500">Смета</a>
            </div>
        </div>
    </section>

        <!-- Финальный CTA -->
        <?php
        $ctaFormId = 'budushchiy_bottom_cta';
        $ctaFormTitle = 'Получить ориентир стоимости';
        $ctaFormSubtitle = 'Бесплатный расчёт за 5 минут';
        $ctaButtonText = 'Получить расчёт бесплатно';
        $ctaExpandable = false;
        $ctaSectionBadge = 'Бесплатный расчёт';
        $ctaSectionHeading = 'Планируете ремонт? Узнайте цену уже сейчас';
        $ctaSectionText = 'Оставьте заявку — посчитаем ориентир под ваш метраж, а точную смету сделаем после замера.';
        $ctaSectionBenefits = ['Бесплатный выезд', 'Смета за 24 часа', 'Фиксированная цена', 'Гарантия 3 года'];
        include './public/components/cta-section.php';
        ?>
</main>
<?php include_once './public/components/footer.php'; ?>
<script src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/scripts/components/reveal.min.js') ?>" defer></script>
</body>
</html>
