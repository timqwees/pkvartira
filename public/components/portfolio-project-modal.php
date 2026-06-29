<div id="portfolioProjectModal" class="fixed inset-0 z-[200] hidden" aria-hidden="true">
    <div class="portfolio-modal-backdrop absolute inset-0 bg-black/60"></div>
    <div class="relative z-10 flex min-h-full items-center justify-center p-4">
        <div
            class="portfolio-modal-panel w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white rounded-2xl shadow-2xl">
            <div class="flex items-start justify-between gap-4 p-5 md:p-6 border-b border-gray-200">
                <div>
                    <h2 id="portfolioModalTitle" class="text-xl md:text-2xl font-bold text-gray-900"></h2>
                    <p id="portfolioModalSubtitle" class="mt-1 text-sm text-gray-500 hidden"></p>
                </div>
                <button type="button" id="portfolioModalClose"
                    class="shrink-0 w-10 h-10 rounded-full border border-gray-200 text-gray-600 hover:bg-gray-50 transition"
                    aria-label="Закрыть">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="relative h-64 md:h-96 bg-gray-100">
                <div class="swiper swiper-portfolio-modal w-full h-full">
                    <div class="swiper-wrapper" id="portfolioModalSlides"></div>
                    <div class="swiper-button-next !w-10 !h-10 !bg-white/90 !rounded-full !text-blue-700 after:!content-none" aria-label="Следующее фото">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </div>
                    <div class="swiper-button-prev !w-10 !h-10 !bg-white/90 !rounded-full !text-blue-700 after:!content-none" aria-label="Предыдущее фото">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="p-5 md:p-6">
                <div id="portfolioModalMeta" class="flex flex-wrap gap-4 text-sm text-gray-600"></div>
                <button data-button-dialog
                    class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-lg bg-orange-500 hover:bg-orange-600 text-white font-semibold transition">
                    Рассчитать похожий ремонт
                </button>
            </div>
        </div>
    </div>
</div>
