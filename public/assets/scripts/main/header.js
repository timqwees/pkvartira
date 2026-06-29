document.addEventListener('DOMContentLoaded', () => {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileMenuClose = document.querySelector('.mobile-menu-close');
  const mobileMenu = document.querySelector('.mobile-menu');
  const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

  function openMobileMenu() {
    mobileMenu.classList.add('active');
    mobileMenuOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    mobileMenuOverlay.classList.remove('active');
    mobileMenu.querySelectorAll('.submenu').forEach(el => el.classList.remove('show'));
    document.body.style.overflow = '';
  }

  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener('click', () => {
      if (mobileMenu.classList.contains('active')) {
        closeMobileMenu();
      } else {
        openMobileMenu();
      }
    });
  }

  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', closeMobileMenu);
  }

  if (mobileMenuOverlay) {
    mobileMenuOverlay.addEventListener('click', closeMobileMenu);
  }

  document.querySelectorAll('.submenu-trigger').forEach(trigger => {
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      const submenuId = this.dataset.submenu;
      const submenu = document.getElementById(submenuId);
      if (submenu) {
        submenu.classList.add('show');
      }
    });
  });

  document.querySelectorAll('.back-btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      this.closest('.submenu').classList.remove('show');
    });
  });

  mobileMenu.querySelectorAll('a:not(.submenu-trigger)').forEach(link => {
    link.addEventListener('click', closeMobileMenu);
  });

  const isTouchDevice = window.matchMedia('(hover: none) and (pointer: coarse)').matches;

  if (isTouchDevice) {
    document.querySelectorAll('.drop > a').forEach(link => {
      link.addEventListener('click', function (e) {
        const drop = this.parentElement;

        if (!drop.classList.contains('active')) {
          e.preventDefault();
          document.querySelectorAll('.drop.active').forEach(d => {
            if (d !== drop) d.classList.remove('active');
          });
          drop.classList.add('active');
        }
      });
    });

    document.addEventListener('click', function (e) {
      if (!e.target.closest('.drop')) {
        document.querySelectorAll('.drop.active').forEach(d => d.classList.remove('active'));
      }
    });
  }
});
