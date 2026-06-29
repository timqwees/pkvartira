document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('[data-toggle-section]').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      var sectionId = this.getAttribute('data-toggle-section');

      document.querySelectorAll('[data-toggle-section]').forEach(function (t) {
        t.classList.remove('bg_active');
      });
      this.classList.add('bg_active');

      document.querySelectorAll('[data-section]').forEach(function (section) {
        section.style.transition = 'opacity 0.3s';
        section.style.opacity = '0';
        setTimeout(function () {
          section.classList.add('hidden');
        }, 300);
      });

      var targetSection = document.querySelector('[data-section="' + sectionId + '"]');
      if (targetSection) {
        setTimeout(function () {
          targetSection.classList.remove('hidden');
          targetSection.style.transition = 'opacity 0.3s';
          targetSection.style.opacity = '0';
          setTimeout(function () {
            targetSection.style.opacity = '1';
          }, 10);
        }, 300);
      }
    });
  });
});
