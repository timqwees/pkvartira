/**
 * PKvartira Animation System
 * Inspired by FSS (ProMaintenance) animation architecture
 * Uses GSAP + ScrollTrigger + Lenis for smooth animations
 * 
 * Load order: Lenis -> GSAP -> ScrollTrigger -> This file
 * Place at bottom of body before closing tag
 */
(function() {
    'use strict';

    /* ============================================================
       CONFIGURATION
       ============================================================ */
    var CONFIG = {
        // Reduced motion
        reduceMotion: function() {
            return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        },

        // Animation durations
        durations: {
            fast: 150,
            base: 250,
            slow: 400,
            hero: 1200,
            reveal: 800,
            parallax: 1200
        },

        // Easing
        easing: {
            easeOut: 'power3.out',
            easeInOut: 'power2.inOut',
            easeOutExpo: 'expo.out'
        },

        // ScrollTrigger config
        scrollTrigger: {
            limitCallbacks: true,
            ignoreMobileResize: true,
            autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load,resize'
        }
    };

    /* ============================================================
       UTILITIES
       ============================================================ */
    var Utils = {
        // Check if element is in viewport
        isInViewport: function(el, offset) {
            var rect = el.getBoundingClientRect();
            var offset = offset || 0;
            var vh = window.innerHeight;
            return rect.top < (vh - offset) && rect.bottom > offset;
        },

        // Debounce
        debounce: function(fn, wait) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    fn.apply(context, args);
                }, wait);
            };
        },

        // Throttle
        throttle: function(fn, limit) {
            var inThrottle;
            return function() {
                var args = arguments;
                var context = this;
                if (!inThrottle) {
                    fn.apply(context, args);
                    inThrottle = true;
                    setTimeout(function() { inThrottle = false; }, limit);
                }
            };
        },

        // Check if element is visible (not display:none, opacity:0, etc.)
        isVisible: function(el) {
            return !!el && 
                window.getComputedStyle(el).display !== 'none' &&
                window.getComputedStyle(el).visibility !== 'hidden' &&
                parseFloat(window.getComputedStyle(el).opacity) > 0;
        }
    };

    /* ============================================================
       LENIS SMOOTH SCROLL
       ============================================================ */
    function initLenis() {
        if (typeof Lenis === 'undefined') {
            console.warn('[PK] Lenis not loaded, smooth scroll disabled');
            return null;
        }

        var lenis = new Lenis({
            duration: 0.8,
            easing: function(t) { return 1 - Math.pow(1 - t, 3); },
            smooth: true,
            smoothTouch: false,
            touchMultiplier: 1.5,
            wheelMultiplier: 0.8
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Expose for debugging
        window.lenisInstance = lenis;
        console.log('[PK] Lenis initialized');

        return lenis;
    }

    /* ============================================================
       GSAP + SCROLLTRIGGER INIT
       ============================================================ */
    function initGSAP() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
            console.warn('[PK] GSAP or ScrollTrigger not loaded');
            return false;
        }

        gsap.registerPlugin(ScrollTrigger);

        ScrollTrigger.config({
            limitCallbacks: true,
            ignoreMobileResize: true,
            autoRefreshEvents: 'visibilitychange,DOMContentLoaded,load,resize'
        });

        console.log('[PK] GSAP + ScrollTrigger initialized');
        return true;
    }

    /* ============================================================
       HERO ANIMATIONS
       ============================================================ */
    var HERO_PRESETS = [
        {
            root: '.hero',
            parts: [
                { sel: '.hero-content > *', at: 0, from: { y: 24, opacity: 0 }, dur: 0.8, stagger: 0.1 },
                { sel: '.hero-form', at: 0.2, from: { y: 32, opacity: 0 }, dur: 0.8 }
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
        if (CONFIG.reduceMotion()) return;
        if (typeof gsap === 'undefined') return;

        var gsap = window.gsap;
        HERO_PRESETS.forEach(function(preset) {
            var root = document.querySelector(preset.root);
            if (!root) return;

            var tl = gsap.timeline({
                defaults: { ease: 'power3.out' },
                scrollTrigger: {
                    trigger: root,
                    start: 'top 95%',
                    toggleActions: 'play none none none'
                }
            });

            // Background scale animation
            var bg = root.querySelector('.hero-bg, .hero__bg, [data-hero-bg]');
            if (bg) {
                tl.fromTo(bg, { scale: 1.07 }, { scale: 1, duration: 2, ease: 'power3.out' }, 0);
            }

            preset.parts.forEach(function(part) {
                var targets = root.querySelectorAll(part.sel);
                if (!targets.length) return;

                var fromVars = { opacity: 0 };
                for (var key in part.from) {
                    if (Object.prototype.hasOwnProperty.call(part.from, key)) {
                        fromVars[key] = part.from[key];
                    }
                }

                var toVars = { opacity: 1, y: 0, yPercent: 0, duration: part.dur || 0.8, ease: 'power3.out' };
                if (part.stagger) toVars.stagger = part.stagger;

                tl.fromTo(targets, fromVars, toVars, part.at || 0);
            });
        });
    }

    /* ============================================================
       SCROLL REVEALS (IntersectionObserver + CSS fallback)
       ============================================================ */
    function initReveals() {
        // CSS-based reveal (uses .reveal class from CSS)
        var revealElements = document.querySelectorAll('.reveal:not(.visible)');
        
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.reveal').forEach(function(el) {
                // Add delay classes if not already present
                if (!el.classList.contains('reveal-delay-1') &&
                    !el.classList.contains('reveal-delay-2') &&
                    !el.classList.contains('reveal-delay-3')) {
                    // Auto-assign delay based on sibling index
                    var siblings = Array.from(el.parentNode.querySelectorAll('.reveal'));
                    var index = siblings.indexOf(el);
                    if (index >= 0) {
                        el.classList.add('reveal-delay-' + Math.min(index + 1, 6));
                    }
                }
                observer.observe(el);
            });
        } else {
            // Fallback for old browsers
            function reveal() {
                document.querySelectorAll('.reveal:not(.visible)').forEach(function(el) {
                    if (Utils.isInViewport(el, 50)) {
                        el.classList.add('visible');
                    }
                });
            }
            document.addEventListener('DOMContentLoaded', function() { reveal(); });
            window.addEventListener('scroll', Utils.throttle(function() { reveal(); }, 100));
        }
    }

    /* ============================================================
       PARALLAX EFFECTS (Optimized)
       ============================================================ */
    function initParallax() {
        if (CONFIG.reduceMotion()) return;
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

        var gsap = window.gsap;
        var parallaxElements = [
            { trigger: '.hero', target: '.hero-bg, .hero__bg, .hero-bg img', yPercent: 15 },
            { trigger: '.prj-hero', target: '.prj-hero-bg, .prj-hero__bg', yPercent: 8 },
            { trigger: '.uslugi-hero', target: '.uslugi-hero-bg', yPercent: 8 },
            { trigger: '.page-hero', target: '.page-hero-bg, .page-hero__bg', yPercent: 8 }
        ];

        parallaxElements.forEach(function(row) {
            var trigger = document.querySelector(row.trigger);
            var target = document.querySelector(row.target);
            if (!trigger || !target) return;

            // Add will-change for performance
            target.style.willChange = 'transform';

            gsap.to(target, {
                yPercent: row.yPercent,
                ease: 'none',
                scrollTrigger: {
                    trigger: trigger,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 0.3,  // Reduced from 0.5 for smoother feel
                    // Add invalidateOnRefresh for better performance
                    invalidateOnRefresh: true
                }
            });
        });
    }

    /* ============================================================
       HEADER SCROLL EFFECT (Lenis + GSAP)
       ============================================================ */
    function initHeader() {
        var header = document.querySelector('[data-header]') || document.querySelector('.header, header');
        if (!header) return;

        var hero = document.querySelector('[data-nav-hero]') || document.querySelector('.hero, .uslugi-hero, .page-hero, .prj-hero');
        var heroHeight = hero ? hero.offsetHeight : 0;

        // Update hero height on resize
        if (hero && typeof ResizeObserver !== 'undefined') {
            new ResizeObserver(function() {
                heroHeight = hero.offsetHeight;
            }).observe(hero);
        }

        var update = function() {
            var y = window.scrollY || window.pageYOffset || 0;
            var progress;

            if (y <= 4) {
                progress = 0;
            } else if (heroHeight) {
                progress = Math.min(1, Math.max(0, (y - heroHeight * 0.3) / (heroHeight * 0.55)));
            } else {
                progress = y > 100 ? 1 : 0;
            }

            // CSS variables for header
            document.documentElement.style.setProperty('--header-opacity', (0.02 + 0.8 * progress).toFixed(2));
            document.documentElement.style.setProperty('--header-blur', (1 + 23 * progress) + 'px');
            
            header.classList.toggle('scrolled', progress > 0.03);
        };

        window.addEventListener('scroll', Utils.throttle(update, 16), { passive: true });
        window.addEventListener('resize', function() {
            if (hero) heroHeight = hero.offsetHeight;
            update();
        });
        update();
    }

    /* ============================================================
       COUNTER ANIMATION
       ============================================================ */
    function initCounters() {
        var counters = document.querySelectorAll('.counter[data-target]');
        if (!counters.length) return;

        var animateCounter = function(counter) {
            var target = parseInt(counter.getAttribute('data-target'), 10);
            var suffix = counter.getAttribute('data-suffix') || '';
            var duration = 2000;
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
            var counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            document.querySelectorAll('.counter[data-target]').forEach(function(el) {
                counterObserver.observe(el);
            });
        }
    }

    /* ============================================================
       IMAGE REVEAL (clip-path zoom) - Optimized
       ============================================================ */
    function initImageReveals() {
        if (CONFIG.reduceMotion()) return;
        if (typeof gsap === 'undefined') return;

        var gsap = window.gsap;

        var selector = '.project-card__image, .expertise-image, .project-detail-hero, .project-next > a, .esp-item .ph, .blog-card-img, .blog-featured-img, .prj-gallery figure, .svc-aud__media, .svc-work__media, .svc-project__media, .article-img, .blog-popular-img';

        document.querySelectorAll(selector).forEach(function(el) {
            var radius = getComputedStyle(el).borderRadius || '8px';
            
            // Add will-change for performance
            el.style.willChange = 'clip-path, opacity';
            
            gsap.fromTo(el,
                { clipPath: 'inset(6% 0% 0% 0% round ' + radius + ')', opacity: 0.25 },
                {
                    clipPath: 'inset(0% 0% 0% 0% round ' + radius + ')',
                    opacity: 1,
                    duration: 0.9,  // Reduced from 1.15
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 85%',  // Earlier trigger
                        toggleActions: 'play none none none',
                        // Invalidate on refresh for better performance
                        invalidateOnRefresh: true
                    }
                }
            );

            var img = el.querySelector('img');
            if (img) {
                img.style.willChange = 'transform';
                gsap.fromTo(img, { scale: 1.05 }, { scale: 1, duration: 1.0, ease: 'power3.out' }, 0);
            }
        });
    }

    /* ============================================================
       COUNTERS
       ============================================================ */
    function initCounters() {
        var counters = document.querySelectorAll('.counter[data-target]');
        if (!counters.length) return;

        if ('IntersectionObserver' in window) {
            var counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var counter = entry.target;
                        var target = parseInt(counter.getAttribute('data-target'), 10);
                        var suffix = counter.getAttribute('data-suffix') || '';
                        var duration = 2000;
                        var start = performance.now();

                        function update(now) {
                            var progress = Math.min((now - start) / 2000, 1);
                            var eased = 1 - Math.pow(1 - progress, 3);
                            var current = Math.round(target * eased);
                            counter.textContent = current + suffix;
                            if (progress < 1) requestAnimationFrame(update);
                        }
                        requestAnimationFrame(update);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            document.querySelectorAll('.counter[data-target]').forEach(function(el) {
                counterObserver.observe(el);
            });
        }
    }

    /* ============================================================
       HEADER SCROLL EFFECT
       ============================================================ */
    function initHeader() {
        var header = document.querySelector('[data-header]') || document.querySelector('.header, header');
        if (!header) return;

        var hero = document.querySelector('[data-nav-hero]') || document.querySelector('.hero, .uslugi-hero, .page-hero, .prj-hero');
        var heroHeight = hero ? hero.offsetHeight : 0;

        if (hero && typeof ResizeObserver !== 'undefined') {
            new ResizeObserver(function() {
                heroHeight = hero.offsetHeight;
            }).observe(hero);
        }

        var update = function() {
            var y = window.scrollY || window.pageYOffset || 0;
            var progress;

            if (y <= 4) {
                progress = 0;
            } else if (heroHeight) {
                progress = Math.min(1, Math.max(0, (y - heroHeight * 0.3) / (heroHeight * 0.55)));
            } else {
                progress = y > 100 ? 1 : 0;
            }

            document.documentElement.style.setProperty('--header-opacity', String(0.02 + 0.8 * progress));
            document.documentElement.style.setProperty('--header-blur', (1 + 23 * progress) + 'px');
            header.classList.toggle('scrolled', progress > 0.03);
        };

        window.addEventListener('scroll', function() { update(); }, { passive: true });
        update();
    }

    /* ============================================================
       INITIALIZATION
       ============================================================ */
    function init() {
        console.log('[PK] Initializing animation system...');

        // Check for reduced motion
        if (CONFIG.reduceMotion()) {
            console.log('[PK] Reduced motion enabled, skipping animations');
            // Still initialize core functionality
            initHeader();
            initReveals();
            initCounters();
            return;
        }

        // Load order matters!
        var lenis = initLenis();
        var gsapReady = initGSAP();

        if (!gsapReady) {
            console.warn('[PK] GSAP not available, falling back to CSS animations');
            initReveals();
            initHeader();
            initCounters();
            return;
        }

        // GSAP ready - initialize all modules
        initHeroes();
        initReveals();
        initParallax();
        initHeader();
        initImageReveals();
        initCounters();

        // Refresh ScrollTrigger after fonts load
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(function() {
                if (window.ScrollTrigger) ScrollTrigger.refresh();
            });
        }

        // Refresh on load
        window.addEventListener('load', function() {
            if (window.ScrollTrigger) ScrollTrigger.refresh();
        });

        // Force reveal after timeout
        setTimeout(forceRevealVisible, 2500);

        console.log('[PK] Animation system initialized');
    }

    /* ============================================================
       AUTO-INIT
       ============================================================ */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            init();
        }, { once: true });
    } else {
        init();
    }

    // Expose for debugging
    window.PKAnimation = {
        init: init,
        initHeroes: initHeroes,
        initReveals: initReveals,
        initParallax: initParallax,
        initHeader: initHeader,
        initCounters: initCounters,
        forceReveal: forceRevealVisible,
        Utils: Utils,
        CONFIG: CONFIG
    };

    /* ============================================================
       PERFORMANCE HINTS (CSS via JS)
       ============================================================ */
    // Add will-change to common animated elements
    var style = document.createElement('style');
    style.textContent = `
        /* Performance hints */
        .hero-bg, .hero__bg, .hero-bg img,
        .prj-hero-bg, .prj-hero__bg,
        .uslugi-hero-bg, .uslugi-hero-bg img,
        .page-hero-bg, .page-hero__bg,
        .project-card__image, .expertise-image, .project-detail-hero,
        .project-next > a, .esp-item .ph, .blog-card-img,
        .blog-featured-img, .prj-gallery figure,
        .svc-aud__media, .svc-work__media, .svc-project__media,
        .article-img, .blog-popular-img {
            will-change: transform, clip-path, opacity;
        }
        
        .reveal {
            will-change: transform, opacity;
        }
        
        .hero, .uslugi-hero, .page-hero, .prj-hero {
            contain: layout style paint;
        }
        
        /* Reduce paint area for hero backgrounds */
        .hero-bg, .hero__bg {
            content-visibility: auto;
        }
    `;
    document.head.appendChild(style);

})();