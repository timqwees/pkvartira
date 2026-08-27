<!-- CTA Modal — Проект Квартира -->
<div id="ctaModal" class="fixed inset-0 z-[200] hidden" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="ctaModalTitle">
    <div data-cta-backdrop class="cta-modal__backdrop"></div>
    <div data-cta-panel class="cta-modal__panel">
        <div class="cta-modal__header">
            <h2 id="ctaModalTitle" class="cta-modal__title">Рассчитайте стоимость ремонта</h2>
            <button type="button" id="ctaModalClose" class="cta-modal__close" aria-label="Закрыть">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 1l12 12M13 1L1 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            </button>
        </div>
        <form action="/send/email" method="POST" data-form-id="modal_cta" class="cta-modal__form">
            <p class="cta-modal__subtitle">Оставьте телефон — перезвоним за 5 минут и посчитаем точную смету</p>
            <div class="cta-modal__field">
                <input type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="15" data-type-phone name="телефн"
                    placeholder="(___) ___-__-__" aria-label="Телефон" required class="cta-modal__input">
            </div>
            <label class="cta-modal__consent">
                <input type="checkbox" required class="cta-modal__checkbox">
                <span>Согласен на обработку персональных данных</span>
            </label>
            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">
            <button type="submit" class="cta-modal__submit">Перезвоните мне</button>
            <!--<p class="cta-modal__note">Без спама — только по делу</p>-->
            <button type="button" id="modal_ctaToggleDetails" class="cta-modal__details-toggle">
                <span id="modal_ctaToggleText">Указать детали ремонта</span>
                <svg id="modal_ctaToggleIcon" width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </form>
        <div id="modal_ctaExpandable" class="cta-modal__expandable">
            <div class="cta-modal__expand-inner">
                <div class="cta-modal__option-group" role="radiogroup" aria-label="Тип жилья">
                    <input id="modal_ctaHousingNew" type="radio" name="Тип жилья" value="Новостройка" checked class="sr-only">
                    <label for="modal_ctaHousingNew" class="cta-modal__option cta-modal__option--active">Новостройка</label>
                    <input id="modal_ctaHousingOld" type="radio" name="Тип жилья" value="Вторичка" class="sr-only">
                    <label for="modal_ctaHousingOld" class="cta-modal__option">Вторичка</label>
                </div>
                <div class="cta-modal__field-group">
                    <span class="cta-modal__label">Комнат</span>
                    <div class="cta-modal__pills">
                        <input id="modal_ctaRooms1" type="radio" name="Комнат" value="1" checked class="sr-only">
                        <label for="modal_ctaRooms1" class="cta-modal__pill cta-modal__pill--active">1</label>
                        <input id="modal_ctaRooms2" type="radio" name="Комнат" value="2" class="sr-only">
                        <label for="modal_ctaRooms2" class="cta-modal__pill">2</label>
                        <input id="modal_ctaRooms3" type="radio" name="Комнат" value="3" class="sr-only">
                        <label for="modal_ctaRooms3" class="cta-modal__pill">3</label>
                        <input id="modal_ctaRooms4" type="radio" name="Комнат" value="4+" class="sr-only">
                        <label for="modal_ctaRooms4" class="cta-modal__pill">4+</label>
                        <input id="modal_ctaRoomsStudio" type="radio" name="Комнат" value="студия" class="sr-only">
                        <label for="modal_ctaRoomsStudio" class="cta-modal__pill">студия</label>
                    </div>
                </div>
                <div class="cta-modal__field-group">
                    <div class="cta-modal__range-header">
                        <span class="cta-modal__label">Площадь</span>
                        <span class="cta-modal__range-value"><span id="modal_ctaRangeValue">20</span> м²</span>
                    </div>
                    <input id="modal_ctaRangeSize" name="Площадь" type="range" min="20" max="300" value="20"
                        aria-label="Площадь в квадратных метрах" class="cta-modal__range">
                </div>
                <div class="cta-modal__field-group">
                    <span class="cta-modal__label">Тип ремонта</span>
                    <select name="Ремонт" aria-label="Тип ремонта" class="cta-modal__select">
                        <option value="Черновой ремонт">Черновой ремонт</option>
                        <option value="Чистовой ремонт">Чистовой ремонт</option>
                        <option value="Дизайнерский ремонт">Дизайнерский ремонт</option>
                        <option value="Косметический ремонт">Косметический ремонт</option>
                        <option value="Капитальный ремонт">Капитальный ремонт</option>
                    </select>
                </div>
                <div class="cta-modal__field-group">
                    <span class="cta-modal__label">Включить в расчёт</span>
                    <div class="cta-modal__pills cta-modal__pills--wrap">
                        <input id="modal_ctaExtraDraft" type="checkbox" name="Включить в расчёт" value="Черновой материал" class="sr-only">
                        <label for="modal_ctaExtraDraft" class="cta-modal__pill">Черновой материал</label>
                        <input id="modal_ctaExtraFinish" type="checkbox" name="Включить в расчёт2" value="Чистовой материал" class="sr-only">
                        <label for="modal_ctaExtraFinish" class="cta-modal__pill">Чистовой материал</label>
                        <input id="modal_ctaExtraDesign" type="checkbox" name="Включить в расчёт3" value="Дизайн-проект" class="sr-only">
                        <label for="modal_ctaExtraDesign" class="cta-modal__pill">Дизайн-проект</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="источник_заявки" value="Модальное окно (popup)">
            <input type="hidden" name="форма" value="modal_cta">
        </div>
    </div>
</div>

<style>
/* ── Modal ── */
.cta-modal__backdrop {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.45);
    opacity: 0;
    transition: opacity 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    -webkit-backdrop-filter: blur(4px);
    backdrop-filter: blur(4px);
}

.cta-modal__panel {
    position: relative;
    z-index: 2;
    width: 440px;
    max-width: calc(100vw - 2rem);
    max-height: calc(100vh - 2rem);
    margin: auto;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    border: 1px solid rgba(0, 0, 0, 0.06);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 4px 12px rgba(0, 0, 0, 0.03);
    overflow: hidden;
    opacity: 0;
    transform: translateY(12px) scale(0.98);
    transition: opacity 0.35s cubic-bezier(0.4, 0, 0.2, 1), transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    flex-direction: column;
}

.cta-modal__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 24px 0;
}

.cta-modal__title {
    font-family: 'Unbounded', sans-serif;
    font-size: 17px;
    font-weight: 600;
    color: #0f172a;
    line-height: 1.35;
    letter-spacing: -0.01em;
    margin: 0;
}

.cta-modal__close {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background: transparent;
    color: #94a3b8;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    flex-shrink: 0;
}
.cta-modal__close:hover {
    background: #f1f5f9;
    color: #475569;
}

.cta-modal__form {
    padding: 16px 24px 24px;
    flex: 1;
    overflow-y: auto;
}

.cta-modal__subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 13.5px;
    color: #64748b;
    line-height: 1.5;
    margin: 0 0 20px;
}

.cta-modal__field {
    margin-bottom: 14px;
    position: relative;
}

.cta-modal__input {
    width: 100%;
    padding: 14px 16px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #1f2937;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box;
}
.cta-modal__input::placeholder {
    color: #9ca3b8;
}
.cta-modal__input:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
}

.cta-modal__consent {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #94a3b8;
    cursor: pointer;
    margin-bottom: 18px;
    line-height: 1.5;
}

.cta-modal__checkbox {
    margin-top: 1px;
    accent-color: #f97316;
    flex-shrink: 0;
    width: 14px;
    height: 14px;
}

.cta-modal__submit {
    width: 100%;
    padding: 16px;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #fff;
    background: #f97316;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.25);
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    letter-spacing: 0.01em;
}
.cta-modal__submit:hover {
    background: #ea580c;
    box-shadow: 0 10px 20px -3px rgba(249, 115, 22, 0.35);
    transform: translateY(-1px);
}
.cta-modal__submit:active {
    transform: translateY(0) scale(0.98);
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
}

.cta-modal__note {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: #cbd5e1;
    text-align: center;
    margin: 10px 0 0;
}

.cta-modal__details-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    width: 100%;
    margin-top: 16px;
    padding: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
    background: transparent;
    border: 1px solid #f1f5f9;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.cta-modal__details-toggle:hover {
    background: #f8fafc;
    color: #475569;
    border-color: #e2e8f0;
}
.cta-modal__details-toggle svg {
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.cta-modal__details-toggle.expanded svg {
    transform: rotate(180deg);
}

/* ── Expandable ── */
.cta-modal__expandable {
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    pointer-events: none;
    transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.35s ease;
}
.cta-modal__expandable.expanded {
    max-height: 600px;
    opacity: 1;
    pointer-events: auto;
}

.cta-modal__expand-inner {
    padding: 4px 24px 24px;
    border-top: 1px solid #f1f5f9;
}

/* ── Option groups ── */
.cta-modal__option-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
    background: #f8fafc;
    border-radius: 10px;
    padding: 4px;
    margin: 16px 0;
}

.cta-modal__option {
    padding: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 13.5px;
    font-weight: 500;
    color: #475569;
    text-align: center;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
}
.cta-modal__option:hover {
    color: #0f172a;
}
.cta-modal__option--active,
.cta-modal__option.active {
    background: #fff;
    color: #0f172a;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.03);
    font-weight: 600;
}

.cta-modal__field-group {
    margin-bottom: 16px;
}

.cta-modal__label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #475569;
    margin-bottom: 8px;
}

.cta-modal__range-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}
.cta-modal__range-header .cta-modal__label {
    margin-bottom: 0;
}

.cta-modal__range-value {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #0f172a;
}

.cta-modal__pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}
.cta-modal__pills--wrap {
    flex-wrap: wrap;
}

.cta-modal__pill {
    padding: 8px 14px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #475569;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
}
.cta-modal__pill:hover {
    border-color: #cbd5e1;
    color: #0f172a;
}
.cta-modal__pill--active,
.cta-modal__pill.active {
    background: #f97316;
    border-color: #f97316;
    color: #fff;
}

.cta-modal__range {
    width: 100%;
    accent-color: #f97316;
    height: 4px;
}

.cta-modal__select {
    width: 100%;
    padding: 12px 14px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #0f172a;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    outline: none;
    cursor: pointer;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    box-sizing: border-box;
    -webkit-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1.5L6 6.5L11 1.5' stroke='%2394a3b8' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    padding-right: 36px;
}
.cta-modal__select:focus {
    border-color: #f97316;
    box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
}

/* ── Center modal ── */
#ctaModal:not(.hidden) {
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ── Scrollbar ── */
.cta-modal__form::-webkit-scrollbar { width: 3px; }
.cta-modal__form::-webkit-scrollbar-track { background: transparent; }
.cta-modal__form::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 3px; }
</style>

<script>
(function(){
    'use strict';
    var modal = document.getElementById('ctaModal');
    if (!modal) return;
    var backdrop = modal.querySelector('[data-cta-backdrop]');
    var panel = modal.querySelector('[data-cta-panel]');
    var closeBtn = document.getElementById('ctaModalClose');
    var isOpen = false;

    function showModal() {
        if (isOpen) return;
        isOpen = true;
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(function() {
            if (backdrop) backdrop.style.opacity = '1';
            if (panel) { panel.style.opacity = '1'; panel.style.transform = 'translateY(0) scale(1)'; }
        });
        setTimeout(function() { if (closeBtn) closeBtn.focus(); }, 120);
    }

    function hideModal() {
        if (!isOpen) return;
        isOpen = false;
        if (backdrop) backdrop.style.opacity = '0';
        if (panel) { panel.style.opacity = '0'; panel.style.transform = 'translateY(12px) scale(0.98)'; }
        setTimeout(function() {
            modal.classList.add('hidden');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }, 350);
    }

    if (closeBtn) closeBtn.addEventListener('click', function(e) { e.stopPropagation(); hideModal(); });
    if (backdrop) backdrop.addEventListener('click', hideModal);
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape' && isOpen) hideModal(); });
    modal.addEventListener('click', function(e) { if (e.target === modal && isOpen) hideModal(); });

    var toggle = document.getElementById('modal_ctaToggleDetails');
    var expandable = document.getElementById('modal_ctaExpandable');
    var toggleIcon = document.getElementById('modal_ctaToggleIcon');
    var toggleText = document.getElementById('modal_ctaToggleText');
    if (toggle && expandable) {
        toggle.addEventListener('click', function() {
            var open = expandable.classList.toggle('expanded');
            toggle.classList.toggle('expanded', open);
            if (toggleText) toggleText.textContent = open ? 'Свернуть' : 'Указать детали ремонта';
        });
    }

    var range = document.getElementById('modal_ctaRangeSize');
    var rangeVal = document.getElementById('modal_ctaRangeValue');
    if (range && rangeVal) {
        rangeVal.textContent = '20';
        range.addEventListener('input', function(e) { rangeVal.textContent = e.target.value; });
    }

    function labelFor(id) { return document.querySelector('label[for="' + id + '"]'); }
    function setPillActive(label, active) {
        if (!label) return;
        label.classList.toggle('active', active);
        if (label.classList.contains('cta-modal__pill')) {
            label.classList.toggle('cta-modal__pill--active', active);
        }
    }
    function setOptionActive(label, active) {
        if (!label) return;
        label.classList.toggle('active', active);
        if (label.classList.contains('cta-modal__option')) {
            label.classList.toggle('cta-modal__option--active', active);
        }
    }

    if (expandable) {
        expandable.addEventListener('change', function(e) {
            if (!e.target || e.target.tagName !== 'INPUT') return;
            var input = e.target;
            if (input.type === 'radio') {
                expandable.querySelectorAll('input[type="radio"][name="' + input.name + '"]').forEach(function(r) {
                    setPillActive(labelFor(r.id), false);
                    setOptionActive(labelFor(r.id), false);
                });
                setPillActive(labelFor(input.id), input.checked);
                setOptionActive(labelFor(input.id), input.checked);
            } else if (input.type === 'checkbox') {
                setPillActive(labelFor(input.id), input.checked);
            }
        });
        expandable.querySelectorAll('input:checked').forEach(function(input) {
            setPillActive(labelFor(input.id), true);
            setOptionActive(labelFor(input.id), true);
        });
    }

    function initIntlTel() {
        if (typeof window.intlTelInput !== 'function') return;
        var phoneInput = modal.querySelector('[data-type-phone]');
        if (phoneInput && !phoneInput.dataset.intlTelInputId) {
            window.intlTelInput(phoneInput, {
                initialCountry: "ru",
                separateDialCode: true,
                formatAsYouType: true,
            });
        }
    }
    initIntlTel();
    document.addEventListener('DOMContentLoaded', initIntlTel);

    window.__showCtaModal = showModal;
    window.__hideCtaModal = hideModal;

    /* ── Scroll-down trigger: показ через 45с после скролла вниз ── */
    var scrollTimer = null;
    var lastScrollY = 0;
    var scrollThreshold = 80;
    var SHOW_DELAY = 45000;

    function onScroll() {
        if (isOpen) return;
        var y = window.scrollY || window.pageYOffset;
        var scrolledDown = y - lastScrollY > scrollThreshold;

        if (scrolledDown) {
            lastScrollY = y;
            if (!scrollTimer) {
                scrollTimer = setTimeout(function() {
                    scrollTimer = null;
                    showModal();
                }, SHOW_DELAY);
            }
        } else if (y < lastScrollY) {
            lastScrollY = y;
            if (scrollTimer) {
                clearTimeout(scrollTimer);
                scrollTimer = null;
            }
        }
    }

    function resetScrollTrigger() {
        lastScrollY = window.scrollY || window.pageYOffset;
        if (scrollTimer) { clearTimeout(scrollTimer); scrollTimer = null; }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', resetScrollTrigger, { passive: true });
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) { if (scrollTimer) { clearTimeout(scrollTimer); scrollTimer = null; } }
        else { resetScrollTrigger(); }
    });
})();
</script>
