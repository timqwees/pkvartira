<!-- Footer -->
<footer class="bg-[#0f172a] text-white py-12 md:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            <style>
                @media (min-width: 375px) and (max-width: 768px) {
                    footer .grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
            </style>

            <div class="space-y-4">
                <a href="/" class="inline-block">
                    <img width="145" height="48" class="h-12" src="/public/assets/images/logo/full_white.svg" alt="Проект Квартира" title="Проект Квартира — ремонт квартир под ключ">
                </a>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Профессиональный ремонт квартир и домов под ключ в Москве. Гарантия 3 года, фиксированная смета, ежедневные фотоотчёты.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="<?= $site['vk'] ?>" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-orange-500 flex items-center justify-center transition-colors" aria-label="Мы в VK">
                        <i class="fab fa-vk text-sm"></i>
                    </a>
                    <a href="<?= $site['telegram'] ?>" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-orange-500 flex items-center justify-center transition-colors" aria-label="Мы в Telegram">
                        <i class="fab fa-telegram-plane text-sm"></i>
                    </a>
                    <a href="<?= $site['whatsapp'] ?>" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-orange-500 flex items-center justify-center transition-colors" aria-label="Мы в WhatsApp">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                    <a href="<?= $site['max'] ?>" class="w-9 h-9 rounded-lg bg-white/10 hover:bg-orange-500 flex items-center justify-center transition-colors" aria-label="Мы в MAX">
                        <img class="h-4 w-4 brightness-0 invert" src="/public/assets/images/icons/MAX.svg" alt="MAX">
                    </a>
                </div>
            </div>

            <div>
                <h5 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Услуги</h5>
                <ul class="space-y-2.5">
                    <li><a href="/services/pod-klyuch" class="text-gray-400 hover:text-orange-500 transition text-sm">Ремонт квартир под ключ</a></li>
                    <li><a href="/services/doma" class="text-gray-400 hover:text-orange-500 transition text-sm">Ремонт домов</a></li>
                    <li><a href="/services/studio" class="text-gray-400 hover:text-orange-500 transition text-sm">Ремонт студий</a></li>
                    <li><a href="/services/nowostroyka" class="text-gray-400 hover:text-orange-500 transition text-sm">Ремонт в новостройке</a></li>
                    <li><a href="/services/vtorichka" class="text-gray-400 hover:text-orange-500 transition text-sm">Ремонт вторичного жилья</a></li>
                    <li><a href="/services/ukladka-laminata" class="text-gray-400 hover:text-orange-500 transition text-sm">Укладка ламината</a></li>
                    <li><a href="/services/keramogranit-nazarovo" class="text-gray-400 hover:text-orange-500 transition text-sm">Укладка керамогранита</a></li>
                    <li><a href="/calculator" class="text-gray-400 hover:text-orange-500 transition text-sm">Калькулятор стоимости</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Компания</h5>
                <ul class="space-y-2.5">
                    <li><a href="/about" class="text-gray-400 hover:text-orange-500 transition text-sm">О нас</a></li>
                    <li><a href="/portfolio" class="text-gray-400 hover:text-orange-500 transition text-sm">Портфолио</a></li>
                    <li><a href="/reviews" class="text-gray-400 hover:text-orange-500 transition text-sm">Отзывы</a></li>
                    <li><a href="/stocks" class="text-gray-400 hover:text-orange-500 transition text-sm">Акции</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-orange-500 transition text-sm">Блог</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-orange-500 transition text-sm">Контакты</a></li>
                </ul>
            </div>

            <div>
                <h5 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider">Контакты</h5>
                <ul class="space-y-3">
                    <li>
                        <a href="tel:<?= $site['phone']; ?>" class="flex items-center gap-3 text-gray-400 hover:text-orange-500 transition text-sm">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0"><i class="fas fa-phone text-xs"></i></span>
                            <?= $site['phone']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?= $site['email']; ?>" class="flex items-center gap-3 text-gray-400 hover:text-orange-500 transition text-sm" aria-label="Написать на <?= $site['email']; ?>">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0"><i class="fas fa-envelope text-xs"></i></span>
                            <?= $site['email']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= htmlspecialchars($site['kartaAdress']); ?>" target="_blank" rel="noopener" class="flex items-center gap-3 text-gray-400 hover:text-orange-500 transition text-sm">
                            <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center flex-shrink-0"><i class="fas fa-map-marker-alt text-xs"></i></span>
                            <span><?= htmlspecialchars($site['address']['streetAddress']) ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 mt-10 md:mt-12 pt-6 md:pt-8">
            <h5 class="font-semibold text-white mb-4 text-sm uppercase tracking-wider text-center md:text-left">Районы работ</h5>
            <div class="flex flex-wrap justify-center md:justify-start gap-x-4 gap-y-1.5 text-sm text-gray-400">
                <a href="/services/lyubertsy" class="hover:text-orange-500 transition">Люберцы</a>
                <a href="/services/odintsovo" class="hover:text-orange-500 transition">Одинцово</a>
                <a href="/services/mitino" class="hover:text-orange-500 transition">Митино</a>
                <a href="/services/khimki" class="hover:text-orange-500 transition">Химки</a>
                <a href="/services/balashikha" class="hover:text-orange-500 transition">Балашиха</a>
                <a href="/services/krasnogorsk" class="hover:text-orange-500 transition">Красногорск</a>
                <a href="/services/mytishchi" class="hover:text-orange-500 transition">Мытищи</a>
                <a href="/services/podolsk" class="hover:text-orange-500 transition">Подольск</a>
                <a href="/services/domodedovo" class="hover:text-orange-500 transition">Домодедово</a>
                <a href="/services/shcherbinka" class="hover:text-orange-500 transition">Щербинка</a>
                <a href="/services/zelenograd" class="hover:text-orange-500 transition">Зеленоград</a>
                <a href="/services/ramenskoye" class="hover:text-orange-500 transition">Раменское</a>
                <a href="/services/pushkino" class="hover:text-orange-500 transition">Пушкино</a>
                <a href="/services/reutov" class="hover:text-orange-500 transition">Реутов</a>
                <a href="/services/dolgoprudny" class="hover:text-orange-500 transition">Долгопрудный</a>
                <a href="/services/lobnya" class="hover:text-orange-500 transition">Лобня</a>
                <a href="/services/zvenigorod" class="hover:text-orange-500 transition">Звенигород</a>
                <a href="/services/vidnoye" class="hover:text-orange-500 transition">Видное</a>
                <a href="/services/solnechnogorsk" class="hover:text-orange-500 transition">Солнечногорск</a>
                <a href="/services/kaluga" class="hover:text-orange-500 transition">Калуга</a>
                <a href="/services/akademicheskaya" class="hover:text-orange-500 transition">м. Академическая</a>
                <a href="/services/leninsky-prospekt" class="hover:text-orange-500 transition">Ленинский пр.</a>
            </div>
        </div>
        <div class="border-t border-white/10 mt-6 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-500 text-xs">&copy; 2026 Проект Квартира. Все права защищены.</p>
            <div class="flex items-center gap-6">
                <a href="/soglashenie" class="text-gray-500 hover:text-orange-500 transition text-xs">Соглашение и обработка персональных данных</a>
            </div>
        </div>
    </div>
</footer>

<!-- Local Type Phone -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@27.1.3/dist/css/intlTelInput.css" media="print" onload="this.media='all'">
<noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@27.1.3/dist/css/intlTelInput.css">
</noscript>
<style>
    [data-type-phone] { padding-left: 78px !important; }
    .iti__dropdown-content { z-index: 9999 !important; max-height: 250px !important; }
    .iti__country-list { max-height: 200px !important; overflow-y: auto !important; }
    .iti--container { z-index: 9999 !important; }
</style>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@27.1.3/dist/js/intlTelInputWithUtils.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.intlTelInput !== 'function') return;
        document.querySelectorAll("[data-type-phone]").forEach(function(input) {
            window.intlTelInput(input, {
                initialCountry: "ru",
                separateDialCode: true,
                formatAsYouType: true,
            });
        });
    });
</script>
<!-- Notification System -->
<script>
    // Показать уведомление
    function showNotification(msg, type = 'info') {
        let container = document.getElementById('notification-container') || ((newContainer = document.createElement('div')) => (newContainer.id = 'notification-container', newContainer.className = 'fixed right-2 top-2 z-[999] flex flex-col gap-2', document.body.appendChild(newContainer), newContainer))();
            const element = container.appendChild(document.createElement('div'));
            element.className = `px-6 py-3 rounded-lg text-white z-50 transform translate-x-full transition-transform duration-300 ${{ success: 'bg-green-500', error: 'bg-red-500', info: 'bg-blue-500' }[type] || 'bg-blue-500'}`;
            element.innerHTML = '<i class="fa-solid fa-info-circle"></i> ' + msg;
            setTimeout(() => element.classList.remove('translate-x-full'), 100);
            setTimeout(() => element.classList.add('translate-x-full'), 4100);
            setTimeout(() => (element.remove(), container.children.length || container.remove()), 4400);
        }

        // Показать уведомление при загрузке страницы если есть параметры
        <?php
            $message_status = $_GET['message_status'] ?? null;
            $message_msg = $_GET['message_msg'] ?? null;
            if ($message_status && $message_msg)
                echo "showNotification('" . addslashes($message_msg) . "', '" . $message_status . "');";
            ?>
</script>
<!-- calltouch -->
<script>
(function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","38sedkgm");
</script>
<!-- calltouch -->
<!-- calltouch requsest -->    
<script type="text/javascript">
(function() {
    var ct_get_val = function(form, selector) {
        var el = form.querySelector(selector);
        return el ? el.value.trim() : '';
    };

    document.addEventListener('click', function(e) {
        var t_el = e.target;
        if (!t_el.closest('form [type="submit"], form button[type="submit"]')) return;

        try {
            var f = t_el.closest('form');
            if (!f) return;
            var fio = ct_get_val(f, 'input[name="имя"]');
            var phone = ct_get_val(f, 'input[name="телефн"], input[name="телефон"]');
            var email = ct_get_val(f, 'input[name="почта"]');
            var site_id = '82739';
            var sub = 'Заявка с ' + location.hostname;

            var ct_data = {
                subject: sub,
                fio: fio,
                phoneNumber: phone,
                email: email,
                requestUrl: location.href,
                sessionId: window.call_value
            };


            var ct_check = !!phone && !window.ct_snd_flag;

            if (ct_check) {

                window.ct_snd_flag = 1;
                setTimeout(function() { window.ct_snd_flag = 0; }, 10000);

                var post_data = Object.keys(ct_data)
                    .filter(function(k) { return !!ct_data[k]; })
                    .map(function(k) { return encodeURIComponent(k) + '=' + encodeURIComponent(ct_data[k]); })
                    .join('&');

                var CT_URL = 'https://api.calltouch.ru/calls-service/RestAPI/requests/' + site_id + '/register/';

                var request = new XMLHttpRequest();
                request.open('POST', CT_URL, true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(post_data);

                console.log('Calltouch request sent:', ct_data);
            }
        } catch (err) {
            console.error('Calltouch script error:', err);
        }
    }, true);
})();
</script>
<!-- calltouch requsest -->    