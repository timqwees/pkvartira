(function() {
  function isVisible(el) {
    var rect = el.getBoundingClientRect();
    var vh = window.innerHeight;
    return rect.top < vh - 60 && rect.bottom > 0;
  }

  function reveal() {
    document.querySelectorAll('.reveal').forEach(function(el) {
      if (isVisible(el)) el.classList.add('revealed');
    });
  }

  if ('IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.reveal').forEach(function(el) {
        observer.observe(el);
      });
    });
  } else {
    document.addEventListener('DOMContentLoaded', reveal);
    window.addEventListener('scroll', reveal);
  }

  var counted = false;
  function animateCounters() {
    if (counted) return;
    var counters = document.querySelectorAll('.counter');
    if (counters.length === 0 || !isVisible(counters[0].closest('.counter-section') || counters[0])) return;
    counted = true;
    counters.forEach(function(el) {
      var target = parseInt(el.getAttribute('data-target'), 10);
      var suffix = el.getAttribute('data-suffix') || '';
      var duration = 2000;
      var start = performance.now();
      function update(now) {
        var progress = Math.min((now - start) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        var current = Math.round(target * eased);
        el.textContent = current + suffix;
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
    });
  }

  if ('IntersectionObserver' in window) {
    var counterObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) { animateCounters(); counterObserver.unobserve(entry.target); }
      });
    }, { threshold: 0.3 });
    document.addEventListener('DOMContentLoaded', function() {
      var cs = document.querySelector('.counter-section, #counters');
      if (cs) counterObserver.observe(cs);
    });
  } else {
    document.addEventListener('DOMContentLoaded', animateCounters);
    window.addEventListener('scroll', animateCounters);
  }
})();
