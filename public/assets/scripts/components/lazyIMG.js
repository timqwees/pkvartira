function lazyLoad(imgs) {
  imgs.forEach(img => {
    if (img.hasAttribute('data-src')) {
      img.src = img.getAttribute('data-src');
      img.removeAttribute('data-src');
      img.addEventListener('load', () => img.classList.add('loaded'));
    }
  });
}

document.addEventListener('DOMContentLoaded', () => {
  const lazyElements = document.querySelectorAll('.lazy');

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          lazyLoad([entry.target]);
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '200px 0px' });

    lazyElements.forEach(el => observer.observe(el));
  } else {
    lazyLoad(lazyElements);
  }
});
