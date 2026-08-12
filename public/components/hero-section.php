<?php
if (!isset($heroFormId)) $heroFormId = 'hero';
if (!isset($heroSubtitle)) $heroSubtitle = 'Зафиксируем стоимость в договоре, выполним работы в срок и дадим гарантию 3 года на все виды работ.';
if (!isset($heroCtaText)) $heroCtaText = 'Рассчитать стоимость';
if (!isset($heroCtaAnchorText)) $heroCtaAnchorText = 'Смотреть цены';

if (!isset($title)) $title = '';
$heroParts = preg_split('/\s*—\s*/u', $title, 2);
$heroBase = trim($heroParts[0]);
$heroTail = isset($heroParts[1]) ? trim($heroParts[1]) : '';

$heroPrice = '';
if (preg_match('/от\s+[\d\s]+₽(?:\/м²)?/u', $heroTail, $pm)) {
    $heroPrice = $pm[0];
}
$heroRest = trim(preg_replace('/^цена\s*/u', '', $heroTail));
$heroRest = trim(preg_replace('/^от\s+[\d\s]+₽(?:\/м²)?/u', '', $heroRest));
$heroRest = trim(preg_replace('/^\s*,/', '', $heroRest));
?>
<section class="relative bg-black text-white">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-40" style="background-image: url(<?= htmlspecialchars($site['baseUrl'] . $bg_url); ?>);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-12 md:py-16 lg:py-20">
        <nav aria-label="breadcrumb" class="mb-8">
            <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-300" itemscope
                itemtype="https://schema.org/BreadcrumbList">
                <li class="font-medium" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                    <a href="<?= $site['baseUrl'] ?>" class="hover:text-orange-400 transition" itemprop="item">
                        <span itemprop="name">Главная</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li>/</li>
                <li class="font-medium" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                    <a href="<?= $site['baseUrl'] ?>/services" class="hover:text-orange-400 transition"
                        itemprop="item">
                        <span itemprop="name">Услуги</span>
                    </a>
                    <meta itemprop="position" content="2">
                </li>
                <li>/</li>
                <li class="font-medium" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                    <a href="<?= $site['canonicalUrl'] ?>" class="hover:text-orange-400 transition"
                        itemprop="item">
                        <span itemprop="name"><?= htmlspecialchars($heroBase ?: $title); ?></span>
                    </a>
                    <meta itemprop="position" content="3">
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-start">
            <div>
                <span class="label-tag !text-orange-400">Ремонт под ключ в Москве</span>

                <h1 class="text-3xl md:text-4xl lg:text-[44px] font-extrabold leading-tight tracking-tight">
                    <?php
                    echo htmlspecialchars($heroBase);
                    if ($heroPrice) {
                        echo ' <span class="text-orange-400">— ' . htmlspecialchars($heroPrice) . '</span>';
                        if ($heroRest) {
                            $sep = (mb_strpos($heroRest, 'под ключ') === 0) ? ' ' : ', ';
                            echo htmlspecialchars($sep . $heroRest);
                        }
                    } elseif ($heroRest) {
                        echo htmlspecialchars(' — ' . $heroRest);
                    }
                    ?>
                </h1>

                <p class="mt-5 text-lg text-gray-300 leading-relaxed max-w-xl">
                    <?= htmlspecialchars($heroSubtitle); ?>
                </p>

                <div class="flex flex-wrap gap-3">
                  <div class="mt-8 flex flex-col sm:flex-row gap-3 items-center">
                      <button data-button-dialog
                          class="cta-button bg-white hover:bg-orange-500 text-black px-6 py-3 rounded-full font-semibold transition">
                          <?= htmlspecialchars($heroCtaText); ?>
                      </button>
                      <->
                      <a href="#price"
                          class="cta-button border border-orange-400/30 bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-full font-semibold transition text-center">
                          <?= htmlspecialchars($heroCtaAnchorText); ?>
                      </a>
                  </div>
                    <span class="inline-flex items-center gap-2 text-sm font-medium text-gray-200 bg-white/10 border border-white/15 rounded-full px-4 py-2">
                        <i class="fa-solid fa-file-signature text-orange-400"></i> Фиксированная цена в договоре
                    </span>
                    <span class="inline-flex items-center gap-2 text-sm font-medium text-gray-200 bg-white/10 border border-white/15 rounded-full px-4 py-2">
                        <i class="fa-solid fa-calendar-check text-orange-400"></i> Реальные сроки
                    </span>
                    <span class="inline-flex items-center gap-2 text-sm font-medium text-gray-200 bg-white/10 border border-white/15 rounded-full px-4 py-2">
                        <i class="fa-solid fa-shield-halved text-orange-400"></i> Гарантия 3 года
                    </span>
                    <div class="flex items-center gap-2">
                        <span class="w-9 h-9 rounded-full bg-white/10 border border-white/15 flex items-center justify-center">
                            <i class="fa-solid fa-phone text-orange-400"></i>
                        </span>
                        <span>Ответим за 5 минут</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-9 h-9 rounded-full bg-white/10 border border-white/15 flex items-center justify-center">
                            <i class="fa-solid fa-location-dot text-orange-400"></i>
                        </span>
                        <span>Работаем по Москве и области</span>
                    </div>
                </div>

            </div>

            <div class="w-full lg:max-w-lg lg:ml-auto">
                <?php
                $ctaFormId = $heroFormId;
                $ctaFormTitle = 'Рассчитайте стоимость ремонта';
                $ctaFormSubtitle = 'Заполните форму и получите смету за 5 минут';
                $ctaButtonText = $heroCtaText;
                $ctaExpandable = true;
                include __DIR__ . '/cta-form.php';
                ?>
            </div>
        </div>
    </div>
</section>
