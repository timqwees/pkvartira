<!-- Improved CTA Modal with better visibility -->
<div id="ctaModal" class="fixed inset-0 z-[200] hidden" aria-hidden="true" role="dialog" aria-labelledby="ctaModalTitle" aria-modal="true">
    <div class="cta-modal-backdrop absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-300"></div>
    <div class="relative z-10 w-full max-w-md transform scale-95 opacity-0 transition-all duration-400 ease-out">
        <!-- Card with subtle dark overlay for better text readability -->
        <div class="cta-modal-card bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl p-6 md:p-8 relative overflow-hidden">
            <!-- Close button with high contrast -->
            <button type="button" id="ctaModalClose"
                class="absolute top-3 right-3 w-8 h-8 rounded-full bg-orange-600 text-black text-sm font-bold flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2"
                aria-label="Закрыть">
                <i class="fas fa-times"></i>
            </button>

            <!-- Icon box with strong contrast -->
            <div class="relative mb-6 flex justify-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-orange-600 flex items-center justify-center shadow-lg shadow-orange-500/20">
                    <i class="fas fa-calculator text-xl text-orange"></i>
                </div>
            </div>

            <!-- Title & Description - dark text on light background -->
            <div class="text-center mb-6">
                <h2 id="ctaModalTitle" class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 leading-tight">
                    Узнайте точную стоимость ремонта
                </h2>
                <p class="text-gray-800 text-lg leading-relaxed max-w-xl mx-auto">
                    Бесплатный расчёт за 5 минут с выездом на замер. Фиксированная смета, гарантия 3 года, без скрытых доплат.
                </p>
            </div>

            <!-- Trust Indicators with contrasting colors -->
            <div class="flex flex-wrap justify-center gap-4 mb-6 p-4 rounded-xl border border-gray-200 bg-gray-50">
                <div class="flex items-center gap-2 text-sm text-gray-700">
                    <i class="fas fa-shield-alt text-orange-600"></i>
                    <span>Гарантия 3 года</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-700">
                    <i class="fas fa-ruler-combined text-orange-600"></i>
                    <span>Бесплатный замер</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-700">
                    <i class="fas fa-file-contract text-orange-600"></i>
                    <span>Фиксированная смета</span>
                </div>
            </div>

            <!-- CTA Buttons with clear contrast -->
            <div class="space-y-3">
                <!-- Primary bright button -->
                <a href="/calculator"
                    class="w-full px-6 py-3.5 rounded-xl bg-orange-600 text-black font-semibold text-lg transition-all duration-300 hover:bg-orange-700 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2">
                    <i class="fas fa-calculator mr-3"></i>
                    <span>Рассчитать стоимость</span>
                </a>

                <!-- Secondary button -->
                <a href="/contact"
                    class="w-full px-6 py-3.5 rounded-xl bg-white border-2 border-orange-300 text-orange-700 font-semibold text-lg transition-all duration-300 hover:bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2">
                    <i class="fas fa-phone mr-3"></i>
                    <span>Перезвоните мне</span>
                </a>
            </div>

            <!-- Don't show again with clear label -->
            <div class="mt-4 flex items-center gap-2">
                <input type="checkbox" id="ctaModalDontShow" class="w-4 h-4 rounded border border-gray-300 focus:ring-orange-400 focus:ring-offset-2">
                <label for="ctaModalDontShow" class="text-sm text-gray-700 cursor-pointer">Больше не показывать</label>
            </div>

            <!-- Subtle note -->
            <p class="mt-4 text-xs text-gray-500 text-center">
                Никакого спама — только полезная информация по ремонту
            </p>
        </div>
    </div>
</div>

<!-- Minimal scripts -->
<script>
    'use strict';
    const dontShowKey = 'ctaModalDontShow';
    const shownKey = 'ctaModalShown';
    
    if (localStorage.getItem(dontShowKey) === 'true' || sessionStorage.getItem(shownKey)) {
        return;
    }

    const modal = document.getElementById('ctaModal');
    const closeBtn = document.getElementById('ctaModalClose');
    const dontShowCheckbox = document.getElementById('ctaModalDontShow');

    function showModal() {
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function hideModal() {
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    function handleClose() {
        if (dontShowCheckbox.checked) {
            localStorage.setItem(dontShowKey, 'true');
        }
        hideModal();
    }

    closeBtn.addEventListener('click', handleClose);
    backdrop.addEventListener('click', handleClose);
    dontShowCheckbox.addEventListener('change', function() {
        if (this.checked) {
            localStorage.setItem(dontShowKey, 'true');
        } else {
            localStorage.removeItem(dontShowKey);
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            handleClose();
        }
    });

    // 20 second timer
    setTimeout(showModal, 20000);
</script>