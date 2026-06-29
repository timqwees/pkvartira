document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('portfolioProjectModal');
    const dataEl = document.getElementById('portfolio-projects-data');

    if (!modal || !dataEl) {
        return;
    }

    const projects = JSON.parse(dataEl.textContent || '[]');
    const projectsMap = Object.fromEntries(projects.map((project) => [project.slug, project]));
    const titleEl = document.getElementById('portfolioModalTitle');
    const subtitleEl = document.getElementById('portfolioModalSubtitle');
    const slidesEl = document.getElementById('portfolioModalSlides');
    const metaEl = document.getElementById('portfolioModalMeta');
    const closeBtn = document.getElementById('portfolioModalClose');
    const backdrop = modal.querySelector('.portfolio-modal-backdrop');
    let modalSwiper = null;

    function destroyModalSwiper() {
        if (modalSwiper) {
            modalSwiper.destroy(true, true);
            modalSwiper = null;
        }
    }

    function openProjectModal(slug, pushState = true) {
        const project = projectsMap[slug];
        if (!project) {
            return;
        }

        titleEl.textContent = project.title;
        if (project.subtitle) {
            subtitleEl.textContent = project.subtitle;
            subtitleEl.classList.remove('hidden');
        } else {
            subtitleEl.textContent = '';
            subtitleEl.classList.add('hidden');
        }

        slidesEl.innerHTML = project.photos.map((photo) => `
            <div class="swiper-slide">
                <img src="${photo}" alt="${project.title}" class="w-full h-full object-cover" loading="lazy">
            </div>
        `).join('');

        const metaItems = [];
        if (project.category) {
            metaItems.push(`<span class="inline-flex items-center gap-2"><i class="fas fa-tag text-blue-700"></i>${project.category}</span>`);
        }
        if (project.size) {
            metaItems.push(`<span class="inline-flex items-center gap-2"><i class="fas fa-ruler-combined text-blue-700"></i>${project.size}</span>`);
        }
        if (project.duration) {
            metaItems.push(`<span class="inline-flex items-center gap-2"><i class="fas fa-clock text-blue-700"></i>${project.duration}</span>`);
        }
        if (project.price) {
            metaItems.push(`<span class="inline-flex items-center gap-2"><i class="fas fa-ruble-sign text-blue-700"></i>${project.price}</span>`);
        }
        metaEl.innerHTML = metaItems.join('');

        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        destroyModalSwiper();
        if (typeof Swiper !== 'undefined' && project.photos.length) {
            modalSwiper = new Swiper('.swiper-portfolio-modal', {
                loop: project.photos.length > 1,
                slidesPerView: 1,
                navigation: {
                    nextEl: '#portfolioProjectModal .swiper-button-next',
                    prevEl: '#portfolioProjectModal .swiper-button-prev',
                },
                pagination: {
                    el: '#portfolioProjectModal .swiper-pagination',
                    clickable: true,
                },
            });
        }

        document.querySelectorAll('.project-card').forEach((card) => {
            card.classList.toggle('ring-2', card.dataset.projectSlug === slug);
            card.classList.toggle('ring-orange-500', card.dataset.projectSlug === slug);
        });

        if (pushState) {
            const url = new URL(window.location.href);
            url.searchParams.set('project', slug);
            window.history.replaceState({}, '', url);
        }
    }

    function closeProjectModal() {
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        destroyModalSwiper();

        document.querySelectorAll('.project-card').forEach((card) => {
            card.classList.remove('ring-2', 'ring-orange-500');
        });

        const url = new URL(window.location.href);
        url.searchParams.delete('project');
        window.history.replaceState({}, '', url.pathname + url.search);
    }

    document.querySelectorAll('[data-open-project]').forEach((trigger) => {
        trigger.addEventListener('click', function (event) {
            event.preventDefault();
            openProjectModal(this.dataset.openProject, true);
        });
    });

    document.querySelectorAll('.project-card[data-project-slug]').forEach((card) => {
        card.addEventListener('click', function (event) {
            if (event.target.closest('a, button, .swiper-button-next, .swiper-button-prev, .swiper-pagination')) {
                return;
            }
            openProjectModal(this.dataset.projectSlug, true);
        });
    });

    closeBtn?.addEventListener('click', closeProjectModal);
    backdrop?.addEventListener('click', closeProjectModal);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeProjectModal();
        }
    });

    const params = new URLSearchParams(window.location.search);
    const projectSlug = params.get('project');
    if (projectSlug && projectsMap[projectSlug]) {
        const card = document.getElementById('project-' + projectSlug);
        if (card) {
            card.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        openProjectModal(projectSlug, false);
    }
});
