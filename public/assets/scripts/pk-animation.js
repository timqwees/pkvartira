/**
 * PKvartira Animation System
 * FSS-aligned scroll implementation (GSAP 3.15 + ScrollTrigger + Lenis)
 * Load order: Lenis -> GSAP -> ScrollTrigger -> This file
 */
(function () {
	'use strict';

	if (typeof window.ResizeObserver === 'undefined') {
		window.ResizeObserver = function () {
			this.observe = function () {};
			this.unobserve = function () {};
			this.disconnect = function () {};
		};
	}

	var reduceMotion = function () {
		if (!window.matchMedia) return false;
		return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	};

	var clipRadius = function (el) {
		var radius = window.getComputedStyle(el).borderTopLeftRadius || '';
		var value = parseFloat(radius);
		if (!radius || isNaN(value) || value < 1) return '8px';
		return value + 'px';
	};

	var lenisInstance = null;
	var scrollToTarget = function (target, offset) {
		offset = offset === undefined ? -105 : offset;
		if (lenisInstance) {
			lenisInstance.scrollTo(target, { offset: offset, duration: 1.05 });
		} else if (target && target.scrollIntoView) {
			target.scrollIntoView({ behavior: 'auto', block: 'start' });
		}
	};
	window.pkScrollTo = scrollToTarget;

	var refreshScroll = function () {
		requestAnimationFrame(function () {
			if (window.lenisInstance) window.lenisInstance.resize();
			if (window.ScrollTrigger) window.ScrollTrigger.refresh();
		});
	};

	var whenFontsReady = function (cb) {
		if (!document.fonts || !document.fonts.ready) {
			cb();
			return;
		}
		var timer = setTimeout(cb, 2000);
		document.fonts.ready.then(function () {
			clearTimeout(timer);
			cb();
		});
	};

	function initScrollProgress() {
		var bar = document.querySelector('.site-progress');
		if (!bar) return;

		var maxScroll = 0;
		var measure = function () {
			var doc = document.documentElement;
			maxScroll = doc.scrollHeight - doc.clientHeight;
		};

		var update = function () {
			if (!maxScroll) {
				measure();
				if (!maxScroll) return;
			}
			var progress = (window.scrollY || document.documentElement.scrollTop) / maxScroll;
			bar.style.setProperty('--scroll-progress', Math.min(1, Math.max(0, progress)));
		};

		var refresh = function () {
			measure();
			update();
		};

		window.addEventListener('scroll', update, { passive: true });
		window.addEventListener('resize', refresh, { passive: true });
		window.addEventListener('load', refresh, { once: true });

		measure();
		update();
	}

	function initLenis() {
		if (typeof Lenis === 'undefined') return null;

		var lenis = new Lenis({
			duration: 1.12,
			smoothWheel: true,
			syncTouch: false,
			anchors: { offset: -105 },
			prevent: function (element) {
				return element.closest('#nav-panel') !== null;
			}
		});

		document.documentElement.dataset.motionEngine = 'gsap-lenis';
		window.lenisInstance = lenis;
		lenisInstance = lenis;
		window.__lenis = lenis;

		lenis.on('scroll', function () {
			if (window.ScrollTrigger) window.ScrollTrigger.update();
		});

		if (window.gsap) {
			window.gsap.ticker.add(function (time) {
				lenis.raf(time * 1000);
			});
			window.gsap.ticker.lagSmoothing(0);
		} else {
			var raf = function (time) {
				lenis.raf(time);
				requestAnimationFrame(raf);
			};
			requestAnimationFrame(raf);
		}

		return lenis;
	}

	var HERO_PRESETS = [
		{
			root: '.hero',
			bg: '.hero-visual',
			parts: [
				{ sel: '.hero-content > .eyebrow', from: { y: 12 }, dur: 0.8, at: 0.12 },
				{ sel: '.hero h1 > span', from: { yPercent: 25 }, dur: 1.2, stagger: 0.12, at: 0.25 },
				{ sel: '.hero-intro > *', from: { y: 18 }, dur: 0.9, stagger: 0.08, at: 0.6 },
				{ sel: '.hero-bottom > *', from: { y: 20 }, dur: 0.9, stagger: 0.08, at: 0.85 }
			]
		},
		{
			root: '.uslugi-hero',
			parts: [
				{ sel: '.uslugi-hero-inner > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		},
		{
			root: '.page-hero',
			parts: [
				{ sel: '.page-hero-inner > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		},
		{
			root: '.prj-hero',
			parts: [
				{ sel: '.prj-hero-inner > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		},
		{
			root: '.prj-hero--inner',
			parts: [
				{ sel: '.prj-hero-inner > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		},
		{
			root: '.blog-hero',
			parts: [
				{ sel: '.blog-hero-content > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		},
		{
			root: '.page-hero-inner',
			parts: [
				{ sel: '> *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 }
			]
		}
	];

	function initHeroes() {
		if (!window.gsap) return;
		var gsap = window.gsap;
		var reduced = reduceMotion();

		HERO_PRESETS.forEach(function (preset) {
			var root = document.querySelector(preset.root);
			if (!root) return;

			if (reduced) {
				preset.parts.forEach(function (part) {
					var targets = root.querySelectorAll(part.sel);
					if (!targets.length) return;
					gsap.set(targets, { opacity: 1, y: 0, yPercent: 0, visibility: 'visible' });
				});
				if (preset.bg) {
					var bg = root.querySelector(preset.bg);
					if (bg) gsap.set(bg, { scale: 1 });
				}
				return;
			}

			var tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

			if (preset.bg) {
				var bg = root.querySelector(preset.bg);
				if (bg) tl.fromTo(bg, { scale: 1.07 }, { scale: 1, duration: 2 }, 0);
			}

			preset.parts.forEach(function (part) {
				var targets = root.querySelectorAll(part.sel);
				if (!targets.length) return;

				var fromVars = { autoAlpha: 0 };
				for (var key in part.from) {
					if (Object.prototype.hasOwnProperty.call(part.from, key)) fromVars[key] = part.from[key];
				}

				var toVars = { autoAlpha: 1, y: 0, yPercent: 0, duration: part.dur || 0.9, ease: 'power3.out' };
				if (part.stagger) toVars.stagger = part.stagger;

				tl.fromTo(targets, fromVars, toVars, part.at || 0);
			});
		});
	}

	function initParallax() {
		if (!window.gsap || !window.ScrollTrigger) return;

		var gsap = window.gsap;
		var mq = window.matchMedia
			? window.matchMedia('(min-width: 993px) and (prefers-reduced-motion: no-preference)')
			: { matches: true };
		if (!mq.matches) return;

		[['.hero', '.hero-visual', 12]].forEach(function (row) {
			var trigger = document.querySelector(row[0]);
			var target = document.querySelector(row[1]);
			if (!trigger || !target) return;
			gsap.to(target, {
				yPercent: row[2],
				ease: 'none',
				scrollTrigger: {
					trigger: trigger,
					start: 'top top',
					end: 'bottom top',
					scrub: 0.65
				}
			});
		});
	}

	function initHeader() {
		var header = document.querySelector('[data-header]') || document.querySelector('.header, header');
		if (!header) return;

		var bar = header.querySelector('[data-header-bar]') || header;
		var hero = document.querySelector('[data-nav-hero]') || document.querySelector('.hero');
		var heroHeight = hero ? hero.offsetHeight : 0;

		function getScrollY() {
			if (lenisInstance) {
				return lenisInstance.scroll;
			}
			return window.scrollY || window.pageYOffset || 0;
		}

		if (hero && typeof ResizeObserver !== 'undefined') {
			new ResizeObserver(function () {
				heroHeight = hero.offsetHeight;
			}).observe(hero);
		}

		var update = function () {
			var y = getScrollY();
			var progress;

			if (y <= 4) {
				progress = 0;
			} else if (heroHeight) {
				progress = Math.min(1, Math.max(0, (y - heroHeight * 0.3) / (heroHeight * 0.55)));
			} else {
				progress = y > 100 ? 1 : 0;
			}

			bar.style.setProperty('--nav-opacity', String(0.02 + 0.8 * progress));
			bar.style.setProperty('--nav-blur', (1 + 23 * progress) + 'px');
			bar.toggleAttribute('data-stuck', progress > 0.03);
		};

		// Use native scroll event with rAF throttling (like FSS)
		var ticking = false;
		var onScroll = function () {
			if (ticking) return;
			ticking = true;
			requestAnimationFrame(function () {
				ticking = false;
				update();
			});
		};
		window.addEventListener('scroll', onScroll, { passive: true });

		window.addEventListener('resize', function () {
			if (hero) heroHeight = hero.offsetHeight;
			update();
		});

		window.addEventListener('pageshow', update);
		window.addEventListener('load', update);
		update();
	}

	/* ============================================================
	   CINEMA SLIDER — manual switching, no autoplay
	   ============================================================ */
	function initCinema() {
		var root = document.querySelector('[data-cinema]') || document.querySelector('.hero');
		if (!root) return;

		var buttons = Array.prototype.slice.call(root.querySelectorAll('[data-cinema-select]'));
		var images = Array.prototype.slice.call(root.querySelectorAll('[data-cinema-image]'));
		if (!buttons.length || !images.length) return;

		var gsap = window.gsap;
		var current = 0;

		var setText = function (selector, value) {
			var el = root.querySelector(selector);
			if (el) el.textContent = value;
		};

		buttons.forEach(function (btn, index) {
			btn.addEventListener('click', function () {
				if (index === current) return;
				current = index;

				buttons.forEach(function (b, i) {
					b.setAttribute('aria-pressed', String(i === index));
				});

				images.forEach(function (img, i) {
					img.classList.toggle('is-active', i === index);
					if (gsap) {
						gsap.to(img, {
							opacity: i === index ? 1 : 0,
							scale: i === index ? 1 : 1.035,
							duration: reduceMotion() ? 0 : 1.2,
							ease: 'power2.inOut',
							overwrite: true
						});
					}
				});

				var num = String(index + 1).padStart(2, '0');
				var name = btn.dataset.name || '';
				setText('[data-cinema-number]', num);
				setText('[data-cinema-name]', name);
				setText('[data-cinema-caption]', btn.dataset.caption || '');
				setText('[data-cinema-status]', num + ' / ' + String(images.length).padStart(2, '0') + ' — ' + name);

				var link = root.querySelector('[data-cinema-link]');
				if (link && btn.dataset.project) {
					link.href = '/portfolio/' + btn.dataset.project;
				}

				if (gsap && !reduceMotion()) {
					gsap.fromTo(
						root.querySelectorAll('[data-cinema-name], [data-cinema-caption]'),
						{ y: 8, opacity: 0.35 },
						{ y: 0, opacity: 1, duration: 0.5, stagger: 0.05, ease: 'power2.out', overwrite: true }
					);
				}
			});
		});
	}

	function initReveals() {
		var revealElements = document.querySelectorAll('.reveal:not(.visible)');

		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.classList.add('visible');
						observer.unobserve(entry.target);
					}
				});
			}, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

			document.querySelectorAll('.reveal').forEach(function (el) {
				observer.observe(el);
			});
		} else {
			function reveal() {
				document.querySelectorAll('.reveal:not(.visible)').forEach(function (el) {
					if (el.getBoundingClientRect().top < window.innerHeight - 50 && el.getBoundingClientRect().bottom > 50) {
						el.classList.add('visible');
					}
				});
			}
			document.addEventListener('DOMContentLoaded', reveal);
			window.addEventListener('scroll', reveal, { passive: true });
		}
	}

	function initCounters() {
		var counters = document.querySelectorAll('.counter[data-target]');
		if (!counters.length) return;

		var animateCounter = function (counter) {
			var target = parseInt(counter.getAttribute('data-target'), 10);
			var suffix = counter.getAttribute('data-suffix') || '';
			var start = performance.now();

			function update(now) {
				var progress = Math.min((now - start) / 2000, 1);
				var eased = 1 - Math.pow(1 - progress, 3);
				var current = Math.round(target * eased);
				counter.textContent = current + suffix;
				if (progress < 1) requestAnimationFrame(update);
			}
			requestAnimationFrame(update);
		};

		if ('IntersectionObserver' in window) {
			var counterObserver = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						animateCounter(entry.target);
						counterObserver.unobserve(entry.target);
					}
				});
			}, { threshold: 0.3 });

			document.querySelectorAll('.counter[data-target]').forEach(function (el) {
				counterObserver.observe(el);
			});
		}
	}

	function initImageReveals() {
		if (reduceMotion()) return;
		if (typeof gsap === 'undefined') return;

		var gsap = window.gsap;

		var selector = '.project-card__image, .expertise-image, .project-detail-hero, .project-next > a, .esp-item .ph, .blog-card-img, .blog-featured-img, .prj-gallery figure, .svc-aud__media, .svc-work__media, .svc-project__media, .article-img, .blog-popular-img';

		var imageEls = document.querySelectorAll(selector);

		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						var el = entry.target;
						var radius = clipRadius(el);

						gsap.fromTo(el,
							{ clipPath: 'inset(6% 0% 0% 0% round ' + radius + ')', opacity: 0.25 },
							{
								clipPath: 'inset(0% 0% 0% 0% round ' + radius + ')',
								opacity: 1,
								duration: 0.6,
								ease: 'power3.out'
							}
						);

						var img = el.querySelector('img');
						if (img) {
							gsap.fromTo(img, { scale: 1.05 }, { scale: 1, duration: 0.6, ease: 'power3.out' }, 0);
						}

						observer.unobserve(el);
					}
				});
			}, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

			for (var i = 0; i < Math.min(imageEls.length, 20); i++) {
				observer.observe(imageEls[i]);
			}
		}
	}

	function init() {
		var safe = function (name, fn) {
			try {
				fn();
			} catch (e) {
				console.error('[PK] Ошибка инициализации модуля ' + name + ':', e);
			}
		};

		safe('scroll-progress', initScrollProgress);
		safe('lenis', initLenis);
		safe('reveals', initReveals);
		safe('counters', initCounters);

		if (reduceMotion()) {
			safe('header', initHeader);
			return;
		}

		if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
			console.warn('[PK] GSAP or ScrollTrigger not loaded');
			safe('header', initHeader);
			return;
		}

		gsap.registerPlugin(ScrollTrigger);

		ScrollTrigger.config({
			limitCallbacks: true,
			ignoreMobileResize: true,
			autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load,resize'
		});

		safe('heroes', initHeroes);
		safe('parallax', initParallax);
		safe('cinema', initCinema);
		safe('header', initHeader);
		safe('image-reveals', initImageReveals);

		whenFontsReady(function () {
			refreshScroll();
		});

		refreshScroll();
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(refreshScroll);
		}
		window.addEventListener('load', refreshScroll, { once: true });

		setTimeout(function () {
			document.querySelectorAll('.reveal:not(.visible)').forEach(function (el) {
				el.classList.add('visible');
			});
		}, 2500);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init, { once: true });
	} else {
		init();
	}

	window.PKAnimation = {
		init: init,
		initHeroes: initHeroes,
		initReveals: initReveals,
		initParallax: initParallax,
		initHeader: initHeader,
		initCounters: initCounters,
		scrollToTarget: scrollToTarget,
		refreshScroll: refreshScroll,
		Utils: { clipRadius: clipRadius }
	};

	/* Performance hints - promote animated elements to own layer */
	var style = document.createElement('style');
	style.textContent = `
		.hero, .hero-visual, .cinema-image {
			will-change: transform, opacity;
		}
		.hero-content, .hero-bottom, .hero-project, .hero-cta {
			will-change: transform, opacity;
		}
		.reveal {
			will-change: transform, opacity;
		}
		@media (prefers-reduced-motion: reduce) {
			.hero, .hero-visual, .cinema-image,
			.hero-content, .hero-bottom, .hero-project, .hero-cta,
			.reveal {
				will-change: auto;
			}
		}
	`;
	document.head.appendChild(style);

})();
