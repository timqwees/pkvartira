function initSwipers() {
  if (typeof Swiper === 'undefined') {
    setTimeout(initSwipers, 500);
    return;
  }

  function getMaxSlidesPerView(breakpoints) {
    if (!breakpoints) return 1;
    let max = 1;
    for (const [, val] of Object.entries(breakpoints)) {
      if (val.slidesPerView > max) max = val.slidesPerView;
    }
    return max;
  }

  function createSwiper(el, config) {
    const slides = el.querySelectorAll('.swiper-slide');
    const maxSPV = getMaxSlidesPerView(config.breakpoints);
    if (slides.length <= maxSPV) {
      config.loop = false;
    }
    new Swiper(el, config);
  }

  document.querySelectorAll('.swiper-type-1').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      autoplay: { delay: 4000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
  });

  document.querySelectorAll('.swiper-type-2').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      autoplay: { delay: 2000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 640: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
  });

  document.querySelectorAll('.swiper-type-3').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      autoplay: { delay: 5000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1024: { slidesPerView: 4 } }
    });
  });

  document.querySelectorAll('.swiper-type-4').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      autoplay: { delay: 4000, disableOnInteraction: false },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 640: { slidesPerView: 2 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
  });

  document.querySelectorAll('.swiper-type-5').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      effect: 'coverflow',
      coverflowEffect: {
        rotate: 10,
        stretch: 0,
        depth: 100,
        modifier: 2
      },
      autoplay: { delay: 2000, disableOnInteraction: false },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 320: { slidesPerView: 2 }, 480: { slidesPerView: 3 }, 640: { slidesPerView: 4 }, 768: { slidesPerView: 5 } }
    });
  });

  document.querySelectorAll('.swiper-type-6').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      speed: 1000,
      autoplay: { delay: 2000, disableOnInteraction: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: { 320: { slidesPerView: 2 }, 480: { slidesPerView: 3 }, 640: { slidesPerView: 4 }, 768: { slidesPerView: 5 }, 1024: { slidesPerView: 6 } }
    });
  });

  document.querySelectorAll('.swiper-type-one').forEach(el => {
    createSwiper(el, {
      loop: true,
      slidesPerView: 1,
      speed: 1000,
      autoplay: { delay: 4000, disableOnInteraction: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
  });
}

document.addEventListener('DOMContentLoaded', initSwipers);
