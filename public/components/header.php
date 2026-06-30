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

    .menu ul li span {
        display: none;
    }
</style>
<!-- Header -->
<header class="bg-white border-b-[1px] border-[#bab9bb80] fixed w-full top-0 z-[100]" style="backdrop-filter: blur(12px); background: rgba(255,255,255,0.85);">
    <nav class="mx-auto px-6 py-4 lg:py-0">
        <div class="flex justify-between items-center">
            <!-- logo name --><a href="/" class="flex items-center space-x-2"><img class="h-[50px] translate-y-0.5"
                    src="/public/assets/images/logo/full.svg" alt="ПКвартира — ремонт квартир под ключ"></a>
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <!-- Главная --><a href="/" class="py-6 text-gray-600 hover:text-blue-600 transition">Главная</a>
                <!-- Услуги -->
                <div class="drop py-6"><a href="/">Услуги <i class="fas fa-chevron-down dropdown-arrow arrow"></i></a>
                    <ul class="flex p-4 py-0">
                        <!-- section 1 -->
                        <!-- TODO: border-r border-[#bab9bb80] при section 1+-->
                        <div class="flex flex-col pr-4"><span class="drop-title">Виды
                                ремонта</span>
                            <!-- <li class="drop-submenu"><a href="/"><i
                                                                class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                                            квартир под ключ </a>
                                                        <ul>
                                                            <li><a href="/">Покраска стен</a></li>
                                                            <li><a href="/">Замена плитки</a></li>
                                                            <li><a href="/">Электрика</a></li>
                                                            <li><a href="/">Сантехника</a></li>
                                                            <li><a href="/">Двери и окна</a></li>
                                                        </ul>
                                                        </li>-->
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    квартир студии </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/pod-klyuch"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    квартир под ключ </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/nowostroyka"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    в новостройке </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    во вторичке </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    1-комнатных квартир </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    2-комнатных квартир </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    3-комнатных квартир </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/4room"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    4-комнатных квартир </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/doma"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    домов </a></li>
                            <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/kommercheskie"><i
                                        class="fas fa-chevron-right drop-submenu-arrow"></i>Ремонт
                                    коммерческих помещений </a></li>
                        </div>
                    </ul>
                </div>
                <!-- Цена --><a href="/prices" class="py-6 text-gray-600 hover:text-blue-600 transition">Цена</a>
                <!-- Калькулятор --><a href="/calculator"
                    class="py-6 text-gray-600 hover:text-blue-600 transition">Калькулятор</a>
                <!-- Портфолио --><a href="/portfolio"
                    class="py-6 text-gray-600 hover:text-blue-600 transition">Портфолио</a>
                <!-- Отзывы --><a href="/reviews" class="py-6 text-gray-600 hover:text-blue-600 transition">Отзывы</a>
                <!-- О компании --><a href="/about"
                    class="py-6 text-gray-600 hover:text-blue-600 transition lg:hidden xl:block">О
                    компании</a>
                <!-- Контакты --><a href="/contact"
                    class="py-6 text-gray-600 hover:text-blue-600 transition lg:hidden xl:block">Контакты</a>
                <!-- Блоги --><a href="/blogs"
                    class="py-6 text-gray-600 hover:text-blue-600 transition lg:hidden xl:block">Блоги</a>
            </div>
            <!-- Desktop Contact -->
            <div class="hidden lg:flex items-stretch items-end gap-6">
                <div class="flex flex-col justify-center items-center lg:hidden xl:flex"><a
                        href="tel:<?= $site['phone']; ?>" class="text-xl font-bold text-gray-800">+7 495
                        473-17-37</a>
                    <p class="text-sm text-gray-600">Ежедневно с 9:00 до 22:00</p>
                </div><button data-button-dialog
                    class="flex items-center bg-orange-500 text-white px-6 rounded-lg hover:bg-orange-600 transition py-2">Получить
                    расчет </button>
            </div>
            <div class="lg:hidden flex justify-between items-center gap-4">
                <!-- Mobile Menu Button --><button data-button-dialog
                    class="hidden sm:flex text-sm bg-orange-500 text-white p-2 rounded-lg hover:bg-orange-600 transition">Получить
                    расчет </button><button class="lg:hidden mobile-menu-toggle p-2" aria-label="Открыть меню">
                    <div class="relative w-6 h-5"><span
                            class="absolute top-0 left-0 w-full h-0.5 bg-gray-800 transition-all duration-300"></span><span
                            class="absolute top-2 left-0 w-full h-0.5 bg-gray-800 transition-all duration-300"></span><span
                            class="absolute top-4 left-0 w-full h-0.5 bg-gray-800 transition-all duration-300"></span>
                    </div>
                </button>
            </div>
        </div>
    </nav>
</header>
<!-- Mobile Menu -->
<div class="mobile-menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>
<div class="mobile-menu fixed left-0 top-0 h-full w-80 bg-white shadow-xl z-50 lg:hidden overflow-y-auto scroll">
    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-2">
                <!-- logo name --><a href="/" class="flex items-center space-x-2"><img class="h-12"
                        src="/public/assets/images/logo/full.svg" alt="ПКвартира — ремонт квартир под ключ"></a>
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
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/studio">Ремонт квартир-студий</a>
                    </li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/pod-klyuch">Ремонт квартир под
                            ключ</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/nowostroyka">Ремонт в
                            новостройке</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/vtorichka">Ремонт во вторичке</a>
                    </li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/1room">Ремонт 1-комнатных
                            квартир</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/2room">Ремонт 2-комнатных
                            квартир</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/3room">Ремонт 3-комнатных
                            квартир</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/4room">Ремонт 4-комнатных
                            квартир</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/doma">Ремонт домов</a></li>
                    <li><a href="<?= htmlspecialchars($site['baseUrl']) ?>/services/kommercheskie">Ремонт коммерческих
                            помещений</a></li>
                </ul>
            </div>
            <hr><a href="/prices"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Цены
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/calculator"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Калькулятор
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/portfolio"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Портфолио
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/reviews"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Отзывы
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/about"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">О
                компании <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/contact"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Контакты
                <i class="fa fa-arrow-right"></i></a>
            <hr><a href="/blogs"
                class="flex justify-between items-center py-3 px-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition">Блоги
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
        <form action="/send/email" method="POST"
            class="bg-white rounded-2xl overflow-hidden w-full max-w-sm shrink-0 md:mx-0 mx-auto">
            <div class="flex flex-col gap-4 px-6 py-5">
                <div class="flex flex-col gap-3">
                    <input name="имя" type="text" placeholder="Ваше имя" aria-label="Ваше имя"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500" />
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
                            <a href="/public/documents/soglasie-na-obrabotku-personalnyh-dannyh.docx"
                                class="text-blue-600 hover:underline" download>обработку персональных данных</a>
                            согласно
                            <a href="/public/documents/politika-konfidencialnosti.docx"
                                class="text-blue-600 hover:underline" download>политике конфиденциальности</a>.
                        </span>
                    </label>
                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl text-base md:text-lg font-bold">
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
                    необходимсти)
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