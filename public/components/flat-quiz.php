<?php
/**
 * Flat Quiz — «Начнём с вашей квартиры»
 *
 * Интерактивная 4-шаговая форма подбора ремонта.
 * Шаг 1 — тип помещения, шаг 2 — площадь + дизайн-проект,
 * шаг 3 — сроки старта, шаг 4 — контакт и сводка.
 * Отправка — POST /send/email (поля совпадают с cta-form).
 */
if (!isset($quizId)) $quizId = 'flatquiz';
if (!isset($quizClass)) $quizClass = '';

$__base = htmlspecialchars((string) ($site['baseUrl'] ?? ''), ENT_QUOTES, 'UTF-8');
?>
<section id="quiz" class="py-16 md:py-24 bg-gray-50 reveal <?= htmlspecialchars($quizClass, ENT_QUOTES, 'UTF-8'); ?>" aria-labelledby="quiz-title">
<style>
.fq-card { background: linear-gradient(180deg, #ffffff 0%, #fafafa 100%); border:1px solid #e5e7eb; border-radius:28px; box-shadow:0 30px 70px -28px rgba(249,115,22,.25), 0 12px 30px -18px rgba(15,23,42,.12); }
.fq-opt { position:relative; display:flex; gap:.75rem; align-items:flex-start; padding:1rem 1.1rem; border:1px solid #e5e7eb; border-radius:18px; cursor:pointer; transition:transform .2s cubic-bezier(.2,.8,.4,1), border-color .18s ease, box-shadow .2s ease, background-color .18s ease; background:#fff; }
.fq-opt:hover { border-color:#fdba74; box-shadow:0 10px 24px -12px rgba(249,115,22,.4); transform:translateY(-2px); }
.fq-opt:has(input:checked) { border-color:#f97316; background:linear-gradient(135deg,#fff7ed 0%,#ffffff 100%); box-shadow:0 12px 28px -12px rgba(249,115,22,.5); transform:translateY(-2px); }
.fq-opt:has(input:focus-visible) { outline:2px solid #f97316; outline-offset:2px; }
.fq-opt input[type=radio]{ position:absolute; opacity:0; width:1px; height:1px; }
.fq-opt .fq-check { flex:0 0 auto; width:20px; height:20px; border-radius:50%; border:2px solid #cbd5e1; display:inline-flex; align-items:center; justify-content:center; margin-top:1px; transition:all .18s ease; }
.fq-opt:has(input:checked) .fq-check { border-color:#f97316; background:#f97316; }
.fq-opt:has(input:checked) .fq-check svg { opacity:1; transform:scale(1); }
.fq-check svg { width:10px; height:10px; color:#fff; opacity:0; transform:scale(.5); transition:all .18s ease; }
.fq-step { display:none; }
.fq-step.is-active { display:block; }
.fq-anim { animation: fqIn .28s ease both; }
@keyframes fqIn { from { opacity:0; transform: translateY(10px);} to { opacity:1; transform:none;} }
@media (prefers-reduced-motion: reduce){ .fq-anim{animation:none} .fq-opt{transition:none} }
.fq-btn { display:inline-flex; align-items:center; justify-content:center; gap:.5rem; border-radius:14px; font-weight:700; padding:.9rem 1.5rem; transition:all .18s ease; cursor:pointer; border:1px solid transparent; }
.fq-btn-primary { background:linear-gradient(135deg,#f97316 0%,#ea580c 100%); color:#fff; box-shadow:0 8px 22px -10px rgba(249,115,22,.5); }
.fq-btn-primary:hover:not(:disabled){ background:linear-gradient(135deg,#ea580c 0%,#c2410c 100%); transform:translateY(-1px); box-shadow:0 12px 28px -10px rgba(249,115,22,.6); }
.fq-btn-primary:disabled { background:#fed7aa; color:#9a3412; box-shadow:none; cursor:not-allowed; }
.fq-btn-ghost { background:#fff; color:#334155; border-color:#e2e8f0; }
.fq-btn-ghost:hover{ background:#f8fafc; }
.fq-progress-dot { width:34px; height:34px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; background:#eef2f7; color:#64748b; transition:all .2s ease; }
.fq-progress-dot.is-current { background:linear-gradient(135deg,#f97316 0%,#ea580c 100%); color:#fff; box-shadow:0 0 0 6px rgba(249,115,22,.15); transform:scale(1.08); }
.fq-progress-dot.is-done { background:#dcfce7; color:#16a34a; }
.fq-input { width:100%; border:1px solid #e5e7eb; border-radius:14px; padding:.95rem 1.1rem; font-size:1rem; color:#0f172a; background:#fff; transition:border-color .18s ease, box-shadow .18s ease; }
.fq-input:focus { outline:none; border-color:#f97316; box-shadow:0 0 0 4px rgba(249,115,22,.12); }
.fq-thumb { width:52px; height:52px; border-radius:12px; object-fit:cover; flex:0 0 auto; border:1px solid #e5e7eb; }
</style>

<div class="max-w-6xl mx-auto px-4">
    <div class="grid lg:grid-cols-[1fr_1.15fr] gap-10 lg:gap-14 items-start">

        <!-- Left column -->
        <div class="lg:sticky lg:top-8">
            <span class="label-tag">Подбор за 4 шага</span>
            <h2 id="quiz-title" class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight tracking-tight mt-3">
                Начнём с&nbsp;вашей квартиры
            </h2>
            <p class="mt-4 text-lg text-gray-500 leading-relaxed max-w-xl">
                Каким будет ваш ремонт? Четыре коротких вопроса помогут обсудить задачу предметно.
                Точную смету подготовим после замеров.
            </p>

            <div class="mt-8 flex items-center gap-4">
                <img src="<?= $__base; ?>/public/assets/images/about/team/1.jpg" alt="Специалист по обсуждению ремонта" width="64" height="64" loading="eager" class="w-16 h-16 rounded-2xl object-cover border border-gray-200 shadow-md">
                <div>
                    <div class="font-bold text-gray-900">Менеджер проектов</div>
                    <div class="text-sm text-gray-500">Подберёт состав работ и ответит на вопросы</div>
                </div>
            </div>

            <ul class="mt-8 space-y-3">
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0"><i class="fas fa-ruble-sign text-sm"></i></span>
                    <span class="text-gray-700"><strong class="font-semibold text-gray-900">Ориентир по бюджету</strong> — цена работ под вашу площадь</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0"><i class="fas fa-list-check text-sm"></i></span>
                    <span class="text-gray-700"><strong class="font-semibold text-gray-900">Понятный состав работ</strong> — без скрытых позиций</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0"><i class="fas fa-handshake text-sm"></i></span>
                    <span class="text-gray-700"><strong class="font-semibold text-gray-900">Согласованный следующий шаг</strong> — звонок или замер</span>
                </li>
            </ul>
        </div>

        <!-- Right column: quiz -->
        <form action="/send/email" method="POST" data-fq-form class="fq-card w-full p-5 md:p-7" novalidate>
            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

            <!-- Progress header -->
            <div class="flex items-center justify-between gap-3 mb-1">
                <div class="flex items-center gap-2" role="list" aria-label="Шаги">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                    <span class="fq-progress-dot" data-fq-dot="<?= $i; ?>"><?= $i; ?></span>
                    <?php endfor; ?>
                    <span class="text-xs font-semibold text-gray-400 ml-1 hidden sm:inline">Контакт</span>
                </div>
                <div class="text-xs font-semibold text-gray-400" data-fq-counter>Вопрос 1 из 4</div>
            </div>
            <div class="h-1.5 w-full bg-gray-100 rounded-full overflow-hidden mb-6">
                <div class="h-full bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 rounded-full transition-all duration-500 ease-out shadow-[0_0_8px_rgba(249,115,22,.4)]" data-fq-bar style="width:25%"></div>
            </div>

            <!-- Step 1 -->
            <fieldset class="fq-step is-active" data-fq-step="1">
                <legend class="text-xl md:text-2xl font-bold text-gray-900 mb-1">В какой квартире планируете ремонт?</legend>
                <p class="text-sm text-gray-500 mb-5">Тип помещения помогает понять отправную точку ремонта.</p>
                <div class="grid sm:grid-cols-2 gap-3">
                    <label class="fq-opt">
                        <input type="radio" name="Тип жилья" value="Пустая квартира перед ремонтом">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span class="text-sm font-semibold text-gray-800">Пустая квартира перед ремонтом</span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Тип жилья" value="Новостройка">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <img src="<?= $__base; ?>/public/assets/images/portfolio-photos/studio/2_31sqm/1.webp" alt="" width="52" height="52" loading="lazy" class="fq-thumb">
                        <span class="text-sm font-semibold text-gray-800">Новостройка<br><span class="block text-xs font-normal text-gray-400">Иллюстрация жилого интерьера</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Тип жилья" value="Вторичное жильё">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <img src="<?= $__base; ?>/public/assets/images/portfolio-photos/secondary/1_80sqm/02.webp" alt="" width="52" height="52" loading="lazy" class="fq-thumb">
                        <span class="text-sm font-semibold text-gray-800">Вторичное жильё<br><span class="block text-xs font-normal text-gray-400">Иллюстрация комнаты</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Тип жилья" value="Другое помещение">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span class="text-sm font-semibold text-gray-800">Другое помещение</span>
                    </label>
                </div>
                <p class="text-xs text-gray-400 mt-4">После выбора перейдём к следующему вопросу.</p>
            </fieldset>

            <!-- Step 2 -->
            <fieldset class="fq-step" data-fq-step="2">
                <legend class="text-xl md:text-2xl font-bold text-gray-900 mb-5">Какая площадь квартиры?</legend>
                <div class="grid sm:grid-cols-[1fr_auto] gap-4 items-end mb-6">
                    <div>
                        <label for="fq-area" class="block text-sm font-semibold text-gray-700 mb-1">Площадь, м²</label>
                        <input id="fq-area" type="number" min="1" max="500" step="1" name="Площадь" placeholder="Например, 85" class="fq-input" inputmode="numeric">
                    </div>
                    <img src="<?= $__base; ?>/public/assets/images/portfolio-photos/newbuilds/1_32new/1.webp" alt="" width="72" height="72" loading="lazy" class="fq-thumb !w-[72px] !h-[72px] hidden sm:block">
                </div>
                <p class="text-sm text-gray-500 mb-5">Укажите площадь по полу. Объёмы отдельных работ рассчитаем после замера.</p>

                <div class="text-base font-bold text-gray-900 mb-3">Есть ли дизайн-проект?</div>
                <p class="text-sm text-gray-500 mb-4">Работа с планом и образцами материалов.</p>
                <div class="space-y-3">
                    <label class="fq-opt">
                        <input type="radio" name="Дизайн-проект" value="Проект готов">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">Проект готов</span><span class="block text-xs text-gray-400">Обсудим реализацию и состав работ</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Дизайн-проект" value="Проект в разработке">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">Проект в разработке</span><span class="block text-xs text-gray-400">Уточним, что уже определено</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Дизайн-проект" value="Пока нет проекта">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">Пока нет проекта</span><span class="block text-xs text-gray-400">Обсудим вашу задачу и следующий шаг</span></span>
                    </label>
                </div>
            </fieldset>

            <!-- Step 3 -->
            <fieldset class="fq-step" data-fq-step="3">
                <legend class="text-xl md:text-2xl font-bold text-gray-900 mb-1">Когда хотите начать?</legend>
                <p class="text-sm text-gray-500 mb-5">Планирование сроков ремонта. Дату работ согласуем отдельно.</p>
                <div class="space-y-3">
                    <label class="fq-opt">
                        <input type="radio" name="Срок" value="В ближайший месяц">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">В ближайший месяц</span><span class="block text-xs text-gray-400">Готовы приступить сразу</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Срок" value="Через 1–3 месяца">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">Через 1–3 месяца</span><span class="block text-xs text-gray-400">Успеем всё спланировать</span></span>
                    </label>
                    <label class="fq-opt">
                        <input type="radio" name="Срок" value="Позже, пока планирую">
                        <span class="fq-check"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.8 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                        <span><span class="block text-sm font-semibold text-gray-800">Позже, пока планирую</span><span class="block text-xs text-gray-400">Удобный период поможет спланировать обсуждение</span></span>
                    </label>
                </div>
            </fieldset>

            <!-- Step 4 -->
            <fieldset class="fq-step" data-fq-step="4">
                <legend class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Куда позвонить для обсуждения?</legend>
                <p class="text-sm text-gray-600 bg-orange-50 border border-orange-100 rounded-xl px-4 py-3 mb-5" data-fq-summary aria-live="polite">
                    Заполните пару полей — перезвоним и обсудим задачу.
                </p>
                <div class="space-y-4">
                    <div>
                        <label for="fq-name" class="block text-sm font-semibold text-gray-700 mb-1">Ваше имя</label>
                        <input id="fq-name" type="text" name="имя" placeholder="Как к вам обращаться" class="fq-input" required>
                    </div>
                    <div>
                        <label for="fq-phone" class="block text-sm font-semibold text-gray-700 mb-1">Телефон</label>
                        <input id="fq-phone" type="tel" pattern="\+?[0-9\s\-\(\)]+" maxlength="18" data-type-phone name="телефн" placeholder="(___) ___-__-__" class="fq-input" required>
                    </div>
                    <label class="flex items-start gap-2 text-xs text-gray-500 cursor-pointer">
                        <input type="checkbox" required class="mt-0.5 accent-orange-500 shrink-0">
                        <span>Даю согласие на обработку персональных данных и ознакомлен с <a href="/soglasie" class="underline hover:text-orange-600">политикой конфиденциальности</a>.</span>
                    </label>
                </div>
            </fieldset>

            <!-- Footer nav -->
            <div class="flex items-center gap-3 mt-6">
                <button type="button" class="fq-btn fq-btn-ghost" data-fq-back hidden>
                    <i class="fas fa-arrow-left"></i> Назад
                </button>
                <button type="button" class="fq-btn fq-btn-primary flex-1" data-fq-next disabled>
                    Продолжить <i class="fas fa-arrow-right"></i>
                </button>
                <button type="submit" class="fq-btn fq-btn-primary flex-1" data-fq-submit hidden>
                    Получить расчёт <i class="fas fa-check"></i>
                </button>
            </div>
            <p class="text-xs text-gray-400 text-center mt-3" data-fq-note>Бесплатно. Ответим за 5 минут.</p>
        </form>
    </div>
</div>

<script>
(function () {
    var form = document.querySelector('[data-fq-form]');
    if (!form) return;
    var steps = Array.prototype.slice.call(form.querySelectorAll('[data-fq-step]'));
    var dots = Array.prototype.slice.call(form.querySelectorAll('[data-fq-dot]'));
    var counter = form.querySelector('[data-fq-counter]');
    var bar = form.querySelector('[data-fq-bar]');
    var nextBtn = form.querySelector('[data-fq-next]');
    var backBtn = form.querySelector('[data-fq-back]');
    var submitBtn = form.querySelector('[data-fq-submit]');
    var summary = form.querySelector('[data-fq-summary]');
    var current = 1;

    function setStep(n) {
        current = n;
        steps.forEach(function (s) {
            var on = Number(s.getAttribute('data-fq-step')) === n;
            s.classList.toggle('is-active', on);
            if (on) {
                s.classList.remove('fq-anim'); void s.offsetWidth; s.classList.add('fq-anim');
            }
        });
        dots.forEach(function (d, i) {
            var num = i + 1;
            d.classList.toggle('is-done', num < n);
            d.classList.toggle('is-current', num === n);
            d.innerHTML = num < n ? '<i class="fas fa-check" style="font-size:12px"></i>' : num;
        });
        counter.textContent = n === 4 ? 'Контакт' : ('Вопрос ' + n + ' из 4');
        bar.style.width = (n / 4 * 100) + '%';
        nextBtn.hidden = (n === 4);
        submitBtn.hidden = (n !== 4);
        backBtn.hidden = (n === 1);
        if (n === 4) updateSummary();
        var first = steps[n - 1].querySelector('input, button');
        if (first && window.innerWidth < 1024) first.focus({ preventScroll: true });
    }

    function canContinue() {
        var s = steps[current - 1];
        if (current === 1 || current === 3) {
            return !!s.querySelector('input[type=radio]:checked');
        }
        if (current === 2) {
            var area = s.querySelector('#fq-area');
            return !!area.value.trim() && !!s.querySelector('input[name="Дизайн-проект"]:checked');
        }
        return true;
    }

    function refresh() { nextBtn.disabled = !canContinue(); }

    function updateSummary() {
        var t = (form.querySelector('input[name="Тип жилья"]:checked') || {}).value || '—';
        var a = (form.querySelector('#fq-area') || {}).value || '—';
        var p = (form.querySelector('input[name="Дизайн-проект"]:checked') || {}).value || '—';
        var c = (form.querySelector('input[name="Срок"]:checked') || {}).value || '—';
        summary.textContent = t + ', ' + a + ' м². Дизайн-проект: ' + p.toLowerCase() + '. Начало: ' + c.toLowerCase() + '.';
    }

    form.addEventListener('change', function (e) {
        if (e.target.matches('input[type=radio]')) {
            refresh();
            // Автопереход после выбора (шаги 1 и 3, а на шаге 2 — если площадь уже указана)
            if (current === 1 || current === 3) {
                setTimeout(function () { if (canContinue()) setStep(current + 1); }, 320);
            } else if (current === 2 && e.target.name === 'Дизайн-проект') {
                var area = form.querySelector('#fq-area');
                if (area && area.value.trim()) {
                    setTimeout(function () { if (canContinue()) setStep(current + 1); }, 320);
                }
            }
        }
    });
    form.addEventListener('input', function (e) {
        if (e.target.id === 'fq-area') refresh();
    });

    nextBtn.addEventListener('click', function () { if (canContinue()) setStep(current + 1); });
    backBtn.addEventListener('click', function () { setStep(Math.max(1, current - 1)); });

    form.addEventListener('submit', function (e) {
        var name = form.querySelector('#fq-name');
        var phone = form.querySelector('#fq-phone');
        if (!name.value.trim()) { e.preventDefault(); name.focus(); return; }
        if (phone.value.replace(/\D/g, '').length < 11) { e.preventDefault(); phone.focus(); return; }
    });

    setStep(1);
})();
</script>
</section>
