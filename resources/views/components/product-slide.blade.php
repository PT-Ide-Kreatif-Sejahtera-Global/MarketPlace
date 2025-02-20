@props(['products', 'carouselRoute'])

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="relative">
    <!-- Swiper Container -->
    <div class="swiper-container px-8 py-1.5 md:px-12 md:py-4 overflow-hidden">
        <div class="flex justify-between items-center my-5">
            <h2 class="text-lg md:text-2xl font-bold text-secondary-dark">{{ $carouselTitle }}</h2>
            <a href="{{ $carouselRoute }}" class="flex items-center text-sm md:text-base text-end font-medium text-primary-dark hover:font-semibold hover:underline md:hover:bg-transparent md:p-0 hover:bg-slate-100 p-1 rounded-full">
                <span class="hidden md:block">Lihat Semua </span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0ead75"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
            </a>
        </div>
        <div class="swiper-wrapper">
            @foreach ($products as $item)
                <div class="swiper-slide !h-auto">
                    <x-product-card :product="$item" />
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Swiper Initialization -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".swiper-container", {
            slidesPerView: 2,
            spaceBetween: 12,
            breakpoints: {
                576: { slidesPerView: 3, spaceBetween: 14 },
                768: { slidesPerView: 4, spaceBetween: 15 },
                1024: { slidesPerView: 6, spaceBetween: 16 },
            },
            mousewheel: {
                forceToAxis: true,
            },
            freeMode: true,
            touchRatio: 1
        });
    });
</script>