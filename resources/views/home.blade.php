<x-home-layout>
    <div class="w-full mt-16 relative rounded-2xl overflow-hidden">
        <div class="absolute my-6 md:my-10 px-6 md:px-10 inline-block z-10">
            <h1 class="text-4xl font-bold mb-2 text-primary-dark">iDeaThings Collections</h1>
            <p class="text-base text-secondary-dark">
                Temukan berbagai macam produk menarik di iDeaThings Marketplace
            </p>
        </div>
        <a href="{{ route('product.paginate.produk') }}" class="absolute group z-10 bottom-6 left-4 md:bottom-10 md:left-10 flex space-x-3 px-6 py-2 md:px-8 md:py-3 rounded-full items-center justify-center overflow-hidden bg-gray-900 text-white shadow-2xl transition-all before:absolute before:h-0 before:w-0 before:rounded-full before:bg-primary before:duration-500 before:ease-out hover:text-secondary-dark hover:-translate-y-1 hover:shadow-primary hover:before:h-56 hover:before:w-72">
            <span class="relative z-10">Jelajahi Produk Kami</span>
            <svg class="relative w-6 h-6 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
        <img class="relative w-full h-[85vh] object-cover" src="{{ asset('/Img/hero-img.jpg') }}" alt="Hero Image">
    </div>

    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <div class="container mx-auto px-4 py-8">
        <!-- Full-page Carousel Section -->
        <div class="mb-12 relative">
            <div class="carousel" id="product-carousel">
                @foreach ($product->take(5) as $carouselProduct)
                    <div class="carousel-slide">
                        <div class="relative h-[600px] rounded-3xl overflow-hidden shadow-2xl">
                            <!-- Full-page Image Background -->
                            <img src="{{ $carouselProduct->img }}" alt="{{ $carouselProduct->produk }}"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">

                            <!-- Overlay Content with Darker Shadow -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-black/20">
                                <!-- Category and Stock Badges -->
                                <div
                                    class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm">
                                    <span
                                        class="text-primary-dark font-semibold text-sm">{{ $carouselProduct->kategori }}</span>
                                </div>
                                <div
                                    class="absolute top-4 right-4 {{ $carouselProduct->jumlah > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white px-4 py-2 rounded-full font-medium text-sm shadow-sm">
                                    {{ $carouselProduct->jumlah > 0 ? 'In Stock' : 'Out of Stock' }}
                                </div>

                                <!-- Content at Bottom -->
                                <div class="absolute bottom-0 left-0 right-0 p-8">
                                    <h3 class="text-4xl font-bold text-white mb-4">
                                        {{ $carouselProduct->produk }}
                                    </h3>

                                    <div class="flex items-center justify-between mb-6">
                                        <div>
                                            <p class="text-4xl font-bold text-white">
                                                Rp {{ number_format($carouselProduct->harga, 0, ',', '.') }}
                                            </p>
                                            @if ($carouselProduct->original_price ?? false)
                                                <p class="text-sm text-gray-300 line-through">
                                                    Rp
                                                    {{ number_format($carouselProduct->original_price, 0, ',', '.') }}
                                                </p>
                                            @endif
                                        </div>
                                        <a href="{{ route('product.show', $carouselProduct->id) }}"
                                            class="inline-flex items-center bg-primary text-secondary-dark px-8 py-4 rounded-xl font-bold
                                                hover:bg-primary-dark hover:text-white 
                                                transition-all duration-300
                                                transform hover:-translate-y-1 hover:shadow-xl">
                                            View Details
                                            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Custom Navigation Arrows -->
            <button
                class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none prev-arrow z-10">
                <svg class="w-8 h-8 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button
                class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none next-arrow z-10">
                <svg class="w-8 h-8 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#product-carousel').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: true,
                prevArrow: $('.prev-arrow'),
                nextArrow: $('.next-arrow'),
                infinite: true,
                speed: 800,
                fade: true,
                cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            // Existing search functionality
            $('#search-input').on('input', function() {
                var query = $(this).val();
                $.ajax({
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#product-list').html(data);
                    }
                });
            });
        });
    </script>
</x-home-layout>
