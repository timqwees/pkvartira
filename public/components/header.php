<style>
    /* ==================== МОБИЛЬНОЕ ПОДМЕНЮ ==================== */
    .mobile-menu .submenu {
        position: fixed;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: #fff;
        z-index: 1001;
        transition: left 0.4s ease;
        overflow-y: auto;
        padding: 0;
        box-shadow: 2px 0 20px rgba(0, 0, 0, 0.15);
    }

    .mobile-menu .submenu.show {
        left: 0;
    }

    .mobile-menu .submenu-header {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
        background: #fff;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .mobile-menu .submenu-title {
        font-size: 19px;
        font-weight: 600;
        color: #333;
    }

    .mobile-menu .submenu-services {
        list-style: none;
        padding: 10px 0 50px 0;
        margin: 0;
    }

    .mobile-menu .submenu-services li a {
        display: block;
        padding: 16px 20px;
        color: #333;
        text-decoration: none;
        border-bottom: 1px solid #f0f0f0;
        font-size: 16.5px;
        transition: all 0.2s ease;
    }

    .mobile-menu .submenu-services li a:hover {
        background: #f8fafc;
        color: #0f172a;
        padding-left: 25px;
    }

    .mobile-menu .back-btn {
        color: #333;
        font-size: 16px;
        font-weight: 500;
        padding: 8px 12px;
        margin-right: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .mobile-menu .back-btn:hover {
        background: #e9ecef;
        color: #0f172a;
        border-color: #adb5bd;
    }

    /* разрешаем показывать наше подменю */
    .mobile-menu .menu ul ul {
        display: block !important;
    }

    /* защита от переполнения на узких экранах: длинные названия не ломают меню */
    .mobile-menu {
        max-width: 100vw;
    }
    .mobile-menu a,
    .mobile-menu .submenu-services li a {
        overflow-wrap: anywhere;
        word-break: break-word;
    }

    .menu ul li span {
        display: none;
    }

    /* ==================== ШАПКА (формат ФСС) ==================== */
    :root {
        --fss-header-h: 90px;
        --h-paper: #f0efed;
        --h-ink: #171310;
        --h-muted: #b2ada8;
        --h-line: #ffffff29;
        --h-accent: #c7ab94;
        --h-ease: cubic-bezier(.2, .8, .2, 1);
    }

    @media (max-width: 992px) {
        :root { --fss-header-h: 78px; }
    }

    @media (max-width: 576px) {
        :root { --fss-header-h: 74px; }
    }

    #site-header {
        z-index: 100;
        position: fixed;
        inset: 0 0 auto;
        background: transparent !important;
        border-bottom: none;
    }

    #site-header[data-nav-mode="transparent"] {
        background: transparent !important;
    }

    .site-progress {
        z-index: 101;
        background: var(--h-accent);
        height: 2px;
        transform: scaleX(var(--scroll-progress, 0));
        transform-origin: 0;
        pointer-events: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
    }

    .site-navigation {
        height: var(--fss-header-h);
        color: var(--h-paper);
        backdrop-filter: blur(24px);
        background: #171718db;
        border-bottom: 1px solid var(--h-line);
        justify-content: space-between;
        align-items: center;
        gap: 30px;
        padding-inline: clamp(24px, 4.4vw, 96px);
        transition: background .3s, color .3s, border-color .3s, backdrop-filter .3s;
        display: flex;
    }

    /* Прозрачная шапка поверх hero */
    #site-header[data-nav-mode="transparent"] .site-navigation {
        --nav-opacity: .02;
        background:
            linear-gradient(180deg,
                rgb(18 17 16 / calc(var(--nav-opacity, .02) + .46)) 0%,
                rgb(18 17 16 / calc(var(--nav-opacity, .02) + .16)) 62%,
                rgb(18 17 16 / var(--nav-opacity, .02)) 100%);
        color: #fff;
        backdrop-filter: none;
        border-bottom-color: var(--h-line);
    }

    #site-header[data-nav-mode="transparent"] .site-navigation[data-stuck] {
        --nav-opacity: .82;
        --nav-blur: 24px;
        color: #fff;
        background: rgb(23 23 24 / var(--nav-opacity, .82));
        backdrop-filter: blur(var(--nav-blur, 24px));
        border-bottom-color: var(--h-line);
    }

    .site-navigation .brand {
        flex-shrink: 0;
        align-items: center;
        gap: 10px;
        display: flex;
    }

    .site-navigation .brand img {
        height: 38px;
        width: auto;
        filter: none;
    }

    .site-navigation .desktop-nav {
        gap: 34px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-inline: auto;
    }

    .site-navigation .desktop-nav > a,
    .site-navigation .desktop-nav .drop > a {
        padding-block: 8px;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 0;
        color: inherit;
        position: relative;
        background: none;
        white-space: nowrap;
    }

    .site-navigation .desktop-nav > a:after,
    .site-navigation .desktop-nav .drop > a:after {
        content: "";
        transform-origin: 100%;
        height: 1px;
        transition: transform .5s var(--h-ease);
        background: currentColor;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        transform: scaleX(0);
    }

    .site-navigation .desktop-nav > a:hover:after,
    .site-navigation .desktop-nav .drop:hover > a:after {
        transform-origin: 0;
        transform: scaleX(1);
    }

    .site-navigation .desktop-nav .drop:hover > a {
        background: none;
        color: #fff;
        padding: 8px 0;
    }

    .site-navigation .desktop-nav .arrow {
        font-size: 9px;
        margin-left: 4px;
        opacity: .6;
    }

    /* Выпадающее меню услуг — тёмная панель в духе ФСС */
    .site-navigation .drop ul {
        background: #1c1b1a;
        border: 1px solid var(--h-line);
        color: var(--h-paper);
        padding: 18px 22px;
        gap: 0 26px;
        border-radius: 0 0 10px 10px;
        /* Меню не должно выходить за правый край экрана */
        max-width: min(1080px, calc(100vw - 32px));
        flex-wrap: wrap;
        overflow-x: auto;
    }

    .site-navigation .drop ul .drop-title {
        color: var(--h-muted);
        font-size: 9px;
        letter-spacing: .14em;
        text-transform: uppercase;
        padding-block: 4px 10px;
        display: block;
    }

    .site-navigation .drop ul li a,
    .site-navigation .drop ul div > li > a {
        color: rgba(255, 255, 255, .78);
        font-size: 12px;
        padding: 7px 0;
    }

    .site-navigation .drop ul li a:hover,
    .site-navigation .drop ul div > li > a:hover {
        color: #fff;
        background: none;
    }

    .site-navigation .drop-submenu-arrow {
        color: var(--h-muted);
    }

    .site-navigation .header-actions {
        display: flex;
        align-items: center;
        gap: 26px;
        flex-shrink: 0;
    }

    .site-navigation .header-phone {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: inherit;
        text-decoration: none;
        white-space: nowrap;
        transition: opacity .25s var(--h-ease);
    }

    .site-navigation .header-phone:hover {
        opacity: .7;
    }

    .site-navigation .header-phone i {
        font-size: 10px;
        opacity: .6;
    }

    .site-navigation .nav-enquire {
        border: 0;
        border-bottom: 1px solid;
        border-radius: 0;
        background: none;
        box-shadow: none;
        min-height: 0;
        color: inherit;
        cursor: pointer;
        align-items: center;
        gap: 28px;
        padding: 8px 0;
        font-family: inherit;
        font-size: 12px;
        line-height: 1.2;
        display: inline-flex;
        white-space: nowrap;
        transition: opacity .25s var(--h-ease);
    }

    .site-navigation .nav-enquire:hover {
        opacity: .75;
        background: none;
        color: inherit;
    }

    .site-navigation .nav-enquire svg {
        transition: transform .4s var(--h-ease);
        flex-shrink: 0;
    }

    .site-navigation .nav-enquire:hover svg {
        transform: translate(3px, -3px);
    }

    .site-navigation .nav-toggle {
        display: none;
        align-items: center;
        gap: 12px;
        font-family: inherit;
        font-size: 12px;
        background: none;
        border: none;
        color: inherit;
        cursor: pointer;
        padding: 6px 0;
    }

    /* lg (1024–1280): только ключевые пункты */
    @media (min-width: 1024px) and (max-width: 1279.98px) {
        .site-navigation .nav-hide-lg,
        .site-navigation .nav-hide-xl { display: none !important; }
    }

    /* xl (1280–1536): прячем второстепенные */
    @media (min-width: 1280px) and (max-width: 1535.98px) {
        .site-navigation .nav-hide-xl { display: none !important; }
    }

    @media (min-width: 1024px) and (max-width: 1100px) {
        .site-navigation .brand img { height: 34px; }
    }

    @media (max-width: 1100px) {
        .site-navigation { gap: 20px; }
        .site-navigation .desktop-nav { gap: 22px; }
        .site-navigation .header-actions { gap: 18px; }
    }

    /* До 1200px навигация не помещается — прячем её, оставляем бургер */
    @media (max-width: 1199.98px) {
        .site-navigation .desktop-nav { display: none; }
        .site-navigation .header-phone { display: none; }
        .site-navigation .nav-toggle { display: inline-flex; }
    }

    @media (max-width: 1199.98px) {
        .site-navigation .brand img { height: 34px; }
    }

    @media (max-width: 576px) {
        .site-navigation .nav-enquire { display: none; }
        .site-navigation .brand img { height: 30px; }
    }

    /* ==================== МОБИЛЬНОЕ МЕНЮ (формат ФСС) ==================== */
    .mobile-menu-overlay {
        opacity: 0;
        visibility: hidden;
        transition: opacity .3s var(--h-ease), visibility .3s var(--h-ease);
        z-index: 110;
    }

    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .mobile-menu {
        top: var(--fss-header-h);
        height: calc(100% - var(--fss-header-h));
        width: min(92vw, 420px);
        max-width: 100vw;
        background: #171310;
        color: var(--h-paper);
        transform: translateX(-102%);
        transition: transform .45s var(--h-ease);
        z-index: 120;
    }

    .mobile-menu.active {
        transform: translateX(0);
    }

    .mobile-menu .mobile-menu-close i {
        color: var(--h-paper);
    }

    .mobile-menu > div > .flex {
        margin-bottom: 12px;
    }

    .mobile-menu nav a,
    .mobile-menu nav a:hover {
        color: var(--h-paper);
        background: none;
        border-radius: 0;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
        padding: 14px 0;
        font-size: 22px;
        letter-spacing: -.03em;
    }

    .mobile-menu nav a i {
        opacity: .5;
        font-size: 14px;
    }

    .mobile-menu hr {
        display: none;
    }

    .mobile-menu .submenu {
        background: #171310;
        color: var(--h-paper);
    }

    .mobile-menu .submenu-header {
        background: #171310;
        border-bottom: 1px solid rgba(255, 255, 255, .12);
    }

    .mobile-menu .back-btn {
        background: transparent;
        border-color: rgba(255, 255, 255, .25);
        color: var(--h-paper);
    }

    .mobile-menu .submenu-services li a,
    .mobile-menu .submenu-services li a:hover {
        color: rgba(255, 255, 255, .82);
        border-bottom-color: rgba(255, 255, 255, .1);
        background: none;
    }

    .mobile-menu .submenu-services li.text-xs {
        color: rgba(255, 255, 255, .45) !important;
    }

    .mobile-menu .submenu-services li a i {
        color: var(--h-muted);
    }

</style>
<?php
$__navPath = parse_url((string)($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH) ?: '/';
$__navHome = ($__navPath === '/' || $__navPath === '/index.php');
$__navServicePage = (bool) preg_match('#^/services/[^/]+/?$#', $__navPath);
$__navMode = $navMode ?? (($__navHome || $__navServicePage) ? 'transparent' : 'solid');
?>
<!-- Header -->
<header id="site-header" data-header data-nav-mode="<?= $__navMode ?>">
    <div class="site-progress" aria-hidden="true"></div>
    <div class="site-navigation" data-header-bar>
        <!-- Brand -->
        <a href="/" rel="publisher" class="brand" aria-label="Проект Квартира — на главную"
            title="Главная страница Проект Квартира — ремонт квартир под ключ в Москве">
            <img src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/logo/full_white.svg') ?>"
                alt="Проект Квартира — ремонт квартир под ключ в Москве" width="152" height="50" loading="eager"
                decoding="async">
        </a>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav" aria-label="Основная навигация">
            <a href="/" class="nav-hide-xl" title="Главная страница">Главная</a>
            <div class="drop">
                <a href="/services" title="Все услуги и виды ремонта">Услуги <i class="fas fa-chevron-down dropdown-arrow arrow"></i></a>
                <ul class="flex p-4 py-0">
                    <div class="flex flex-col pr-4"><span class="drop-title">Виды ремонта</span>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/pod-klyuch" title="Ремонт квартир под ключ в Москве"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт квартир под ключ</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/premium" title="Дизайнерский ремонт квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Дизайнерский ремонт</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/chistovaya" title="Чистовая отделка квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Чистовая отделка</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/chernovaya" title="Черновая отделка квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Черновая отделка</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/white-box" title="White Box отделка квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>White Box</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/dizayn-interierov" title="Дизайн интерьеров квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Дизайн интерьеров</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/novostroyka" title="Ремонт в новостройке"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт в новостройке</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka" title="Ремонт во вторичном жилье"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт во вторичке</a></li>
                    </div>
                    <div class="flex flex-col pr-4"><span class="drop-title">По типу помещения</span>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio" title="Ремонт квартир-студий"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Квартиры-студии</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room" title="Ремонт 1-комнатных квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>1-комнатные квартиры</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room" title="Ремонт 2-комнатных квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>2-комнатные квартиры</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room" title="Ремонт 3-комнатных квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>3-комнатные квартиры</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/4room" title="Ремонт 4-комнатных квартир"><i class="fas fa-chevron-right drop-submenu-arrow"></i>4-комнатные квартиры</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/doma" title="Ремонт домов и коттеджей"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Дома и коттеджи</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/kommercheskie" title="Ремонт коммерческих помещений"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Коммерческие помещения</a></li>
                    </div>
                    <div class="grid grid-cols-2 gap-y-2 gap-x-4 pr-4"><span class="drop-title col-span-2">Популярные районы</span>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/mitino" title="Ремонт квартир в Митино"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Митино</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/khimki" title="Ремонт квартир в Химках"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Химки</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/dolgoprudny" title="Ремонт квартир в Долгопрудном"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Долгопрудный</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/odintsovo" title="Ремонт квартир в Одинцово"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Одинцово</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/krasnogorsk" title="Ремонт квартир в Красногорске"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Красногорск</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/lyubertsy" title="Ремонт квартир в Люберцах"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Люберцы</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/balashikha" title="Ремонт квартир в Балашихе"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Балашиха</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/mytishchi" title="Ремонт квартир в Мытищах"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Мытищи</a></li>
                        <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services" title="Все районы обслуживания"><i class="fas fa-chevron-right drop-submenu-arrow"></i><strong>Все районы →</strong></a></li>
                    </div>
                    <div class="flex flex-col pr-4">
                        <div class="flex flex-col">
                            <span class="drop-title">Образцы документов</span>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/smeta-obrazec" title="Образец сметы на ремонт"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Смета на ремонт: образец</a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/dogovor-obrazec" title="Шаблон договора на ремонт"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Договор на ремонт: шаблон</a></li>
                        </div>
                        <div class="flex flex-col">
                            <span class="drop-title">Другое</span>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/kalkulyator-ploshchadi" title="Калькулятор площади квартиры"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Калькулятор площади (м²)</a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/stocks" title="Акции и скидки на ремонт"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Акции и скидки</a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/blog/kak-poschitat-kvadratnye-metry" title="Как посчитать квадратные метры квартиры"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Как посчитать квадратные метры</a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/blogs" title="Все статьи о ремонте и дизайне"><i class="fas fa-chevron-right drop-submenu-arrow"></i>Все статьи о ремонте</a></li>
                        </div>
                    </div>
                </ul>
            </div>
            <a href="/prices" title="Цены на ремонт квартир">Цены</a>
            <a href="/calculator" title="Онлайн калькулятор стоимости ремонта">Калькулятор</a>
            <a href="/portfolio" title="Примеры выполненных работ">Портфолио</a>
            <a href="/reviews" class="nav-hide-lg" title="Отзывы клиентов">Отзывы</a>
            <a href="/about" class="nav-hide-xl" title="О компании Проект Квартира">О компании</a>
            <a href="/contact" class="nav-hide-lg" title="Контакты и адрес офиса">Контакты</a>
            <a href="/blogs" class="nav-hide-xl" title="Статьи о ремонте и дизайне">Блоги</a>
        </nav>

        <!-- Actions -->
        <div class="header-actions">
            <a class="header-phone" href="tel:<?= $site['phone']; ?>" title="Позвонить: +7 495 473-17-37">
                <i class="fas fa-phone" aria-hidden="true"></i>+7 495 473-17-37
            </a>
            <button type="button" class="nav-enquire" data-button-dialog title="Получить расчет стоимости ремонта">
                Оставить заявку
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                    <path d="M7 7h10v10"></path>
                    <path d="M7 17 17 7"></path>
                </svg>
            </button>
            <button type="button" class="nav-toggle mobile-menu-toggle" aria-label="Открыть меню" aria-expanded="false">
                <span>Меню</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                    <path d="M4 5h16"></path>
                    <path d="M4 12h16"></path>
                    <path d="M4 19h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>
<script defer>
    (function () {
        var header = document.getElementById('site-header');
        if (!header) return;
        var bar = header.querySelector('[data-header-bar]');
        var hero = document.getElementById('hero');
        var mode = header.getAttribute('data-nav-mode');
        var ticking = false;

        function update() {
            var y = window.scrollY || window.pageYOffset || 0;
            var h = hero ? hero.offsetHeight : 0;
            var p = mode === 'transparent'
                ? (y <= 4 ? 0 : Math.min(1, Math.max(0, (y - h * 0.3) / (h * 0.55 || 1))))
                : 1;
            bar.style.setProperty('--nav-opacity', (0.02 + 0.8 * p).toFixed(3));
            bar.style.setProperty('--nav-blur', (1 + 23 * p).toFixed(0) + 'px');
            if (p > 0.03) { bar.setAttribute('data-stuck', ''); } else { bar.removeAttribute('data-stuck'); }
            var max = document.documentElement.scrollHeight - window.innerHeight;
            document.documentElement.style.setProperty('--scroll-progress', max > 0 ? (y / max).toFixed(4) : '0');
        }

        function onScroll() {
            if (ticking) return;
            ticking = true;
            requestAnimationFrame(function () { ticking = false; update(); });
        }

        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', update);
        window.addEventListener('load', update);
        update();
    })();
</script>
<!-- Mobile Menu -->
<div class="mobile-menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>
<div class="mobile-menu fixed left-0 top-0 h-full w-80 bg-white shadow-xl z-50 lg:hidden overflow-y-auto scroll">
    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-2">
                <!-- logo name --><a href="/" rel="publisher" class="flex items-center space-x-2" title="Главная страница"><img width="145" height="48" class="h-12"
                        src="<?= \Setting\Route\Functions\TheFunction::asset('/public/assets/images/logo/full_white.svg') ?>" alt="Проект Квартира — ремонт квартир под ключ в Москве remont.pkvartira.ru"></a>
            </div><button class="mobile-menu-close p-2" aria-label="Закрыть меню"><i
                    class="fas fa-times text-2xl text-gray-800"></i></button>
        </div>
        <nav class="space-y-4 mb-8"><a href="/"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Главная
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="#services-submenu"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition submenu-trigger"
                data-submenu="services-submenu">
                Услуги
                <i class="fa fa-arrow-right"></i>
            </a>
            <div id="services-submenu" class="submenu">
                <div class="submenu-header mt-16">
                    <button class="back-btn">← Назад</button>
                </div>
                <ul class="submenu-services">
                    <li class="text-xs font-bold text-gray-400 uppercase tracking-wider px-4 py-2">Виды ремонта</li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/pod-klyuch">Ремонт квартир под
                            ключ</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/premium">Дизайнерский ремонт</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/chistovaya">Чистовая отделка</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/chernovaya">Черновая отделка</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/white-box">White Box</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/dizayn-interierov">Дизайн интерьеров</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/novostroyka">Ремонт в
                            новостройке</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka">Ремонт во вторичке</a></li>
                    <li class="text-xs font-bold text-gray-400 uppercase tracking-wider px-4 py-2 mt-2">По типу помещения</li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio">Квартиры-студии</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room">1-комнатные квартиры</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room">2-комнатные квартиры</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room">3-комнатные квартиры</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/4room">4-комнатные квартиры</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/doma">Дома и коттеджи</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/kommercheskie">Коммерческие помещения</a></li>
                </ul>
            </div>
            <hr><a href="/prices"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Цены
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/calculator"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Калькулятор
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/portfolio"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Портфолио
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/reviews"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Отзывы
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/about"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">О
                компании <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/contact"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Контакты
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/blogs"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-[#fef8f3] hover:text-[#876b55] rounded-lg transition">Блоги
                <i class="fa fa-arrow-right"></i></a>
        </nav>
        <div class="border-t pt-6">
            <div class="text-center mb-6"><a href="tel:<?= htmlspecialchars($site['phone'])?>"
                    class="text-2xl font-bold text-gray-800 block mb-2"><?= htmlspecialchars($site['phone'])?></a>
                <p class="text-sm text-gray-600">Ежедневно с 9:00 до 22:00</p>
            </div>
        </div>
    </div>
</div>
<style>
    dialog::backdrop {
        background: rgba(0, 0, 0, 0.55);
    }

    dialog[data-dialog] {
        width: fit-content;
        max-width: calc(100vw - 2rem);
        margin: auto;
        box-sizing: border-box;
    }
</style>

<dialog data-dialog class="rounded-xl border-0 p-4 max-w-[calc(100vw-2rem)]">
    <div class="w-fit min-w-0 max-w-full">
    <div class="flex items-start justify-between gap-4 px-6 py-4 border-b border-gray-100 min-w-0">
        <div class="flex flex-col gap-2 min-w-0">
            <div class="text-lg md:text-xl font-bold text-gray-900">Получить 3 варианта сметы</div>
            <p class="text-2sm text-gray-600">Укажите ваше имя и номер телефона - расскажем о стоимости ремонта
            </p>
        </div>
        <button type="button" id="closeEstimateDialog"
            class="shrink-0 text-gray-500 hover:text-gray-900 pt-0.5">
            <span class="text-2xl leading-none">&times;</span>
        </button>
    </div>
    <div class="flex flex-col md:flex-row md:w-max md:items-stretch gap-4 md:gap-5">
        <form action="/send/email" method="POST" data-form-id="header_dialog"
            class="bg-white rounded-2xl overflow-visible w-full max-w-sm shrink-0 md:mx-0 mx-auto">
            <div class="flex flex-col gap-4 px-6 py-5">
                <div class="flex flex-col gap-3">
                    <input name="имя" type="text" placeholder="Ваше имя" aria-label="Ваше имя"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500" required />
                    <div class="mb-5 relative text-black w-full">
                        <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн"
                            placeholder="(___) ___-__-__" aria-label="Телефон" class="border w-full rounded-xl p-4" required>
                        <span class="bg-white rounded-lg px-2 absolute -top-3 left-4 text-black">Телефон <span
                                class="text-red-400">*</span></span>
                    </div>
                    <label class="flex items-start gap-3 cursor-pointer text-sm text-gray-700 leading-snug select-none">
                        <input type="checkbox" name="согласие_персональные_данные" value="да" required aria-label="Согласие на обработку персональных данных"
                            class="mt-0.5 h-4 w-4 shrink-0 rounded border-gray-300 text-orange-600 focus:ring-orange-500 accent-orange-500">
                        <span>
                            Нажимая «Отправить», я принимаю
                            <a href="/soglashenie" class="text-blue-600 hover:underline">соглашение</a>
                            и соглашаюсь на
                            <a href="/documents/soglasie-na-obrabotku-personalnyh-dannyh.docx"
                                class="text-blue-600 hover:underline" download>обработку персональных данных</a>
                            согласно
                            <a href="/documents/politika-konfidencialnosti.docx"
                                class="text-blue-600 hover:underline" download>политике конфиденциальности</a>.
                        </span>
                    </label>
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
                    <button type="submit"
                        class="w-full bg-[#876b55] hover:bg-[#6d5744] text-white py-3 rounded-xl text-base md:text-lg font-bold">
                        Отправить
                    </button>
                </div>
            </div>
        </form>
        <div class="relative flex justify-center items-center px-2 shrink-0">
            <ul class="p-3 bg-gray-200 rounded-xl flex flex-col gap-4">
                <li><i class="fas fa-user-check px-2"></i> <span class="font-bold text-red-400">Бесплатная</span>
                    консультация
                </li>
                <li><i class="fas fa-people-arrows px-2"></i> Запланируем выезд: инженера-замерщика<br> (при
                    необходимости)
                </li>
                <li><i class="fas fa-comment-slash px-2"></i> Без навязчивых звонков</li>
            </ul>
        </div>
    </div>
    </div>
</dialog>

<script defer>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-button-dialog]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var dialog = document.querySelector('[data-dialog]');
                if (dialog && !dialog.open) dialog.showModal();
            });
        });

        document.getElementById('closeEstimateDialog').addEventListener('click', function () {
            var dialog = document.querySelector('[data-dialog]');
            if (dialog) dialog.close();
        });
    });
</script>