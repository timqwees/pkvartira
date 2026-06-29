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
                    <img class="h-12" src="/public/assets/images/logo/full_white.svg" alt="Проект Квартира" title="Проект Квартира — ремонт квартир под ключ">
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

        <div class="border-t border-white/10 mt-10 md:mt-12 pt-6 md:pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
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
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@27.1.3/dist/js/intlTelInputWithUtils.min.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.intlTelInput !== 'function') return;
        document.querySelectorAll("[data-type-phone]").forEach(function(input) {
            window.intlTelInput(input, {
                initialCountry: "ru",
                separateDialCode: true,
                countryOrder: ["ru"],
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
<script>
    document.addEventListener('click', function (e) {
        var submitBtn = e.target.closest('form [type="submit"]');
        if (!submitBtn) return;
        var form = submitBtn.closest('form');
        var fio = (form.querySelector('input[name="имя"]') || {}).value || '';
        var phoneInput = form.querySelector('input[name="телефн"], input[name="телефон"]');
        var phoneNumber = phoneInput ? phoneInput.value : '';
        var email = (form.querySelector('input[name="почта"]') || {}).value || '';
        var ct_site_id = 82739;
        var subject = 'Заявка с ' + location.hostname;

        var ct_data = {
            fio: fio,
            phoneNumber: phoneNumber,
            email: email,
            subject: subject,
            requestUrl: location.href,
            sessionId: window.call_value
        };
        if ((!!phoneNumber) && !window.ct_snd_flag) {
            window.ct_snd_flag = 1; setTimeout(function () { window.ct_snd_flag = 0; }, 40000);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://api.calltouch.ru/calls-service/RestAPI/requests/' + ct_site_id + '/register/', false);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify(ct_data));
        }
    }, true);
</script>