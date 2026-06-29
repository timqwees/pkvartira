(function() {
  function initFAQ() {
    document.querySelectorAll('.faq-toggle').forEach(function(button) {
      button.addEventListener('click', function() {
        var content = button.nextElementSibling;
        var icon = button.querySelector('i');
        if (content) content.classList.toggle('hidden');
        if (icon) icon.classList.toggle('rotate-180');
      });
    });
  }
  if ('requestIdleCallback' in window) {
    requestIdleCallback(initFAQ);
  } else {
    document.addEventListener('DOMContentLoaded', initFAQ);
  }
})();
