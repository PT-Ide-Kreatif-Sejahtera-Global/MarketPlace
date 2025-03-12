<x-layout>
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="w-full mt-16 relative rounded-2xl overflow-hidden">
            <div class="absolute w-full h-full sm:h-1/2 bg-gradient-to-b from-emerald-50/90 to-transparent z-10"></div>
            <div class="absolute my-4 md:my-7 lg:my-10 mx-5 md:mx-7 lg:mx-10 inline-block z-10">
                <h1 class="text-xl md:text-4xl lg:text-5xl font-bold mb-1 md:mb-2 lg:mb-3 text-primary-dark">iDeaThings Collections</h1>
                <p class="w-4/5 md:w-full text-sm md:text-base text-secondary-dark">
                    Temukan berbagai macam produk menarik di iDeaThings Marketplace
                </p>
            </div>
            <a href="{{ route('product.paginate.produk') }}" class="absolute group z-10 bottom-4 left-4 md:bottom-7 md:left-7 lg:bottom-10 lg:left-10 flex space-x-3 px-4 py-1.5 md:px-6 lg:px-8 md:py-3 rounded-full items-center justify-center overflow-hidden bg-gray-900 text-sm md:text-base text-white shadow-2xl transition-all before:absolute before:h-0 before:w-0 before:rounded-full before:bg-primary before:duration-500 before:ease-out hover:text-secondary-dark hover:-translate-y-1 hover:shadow-primary hover:before:h-56 hover:before:w-72">
                <span class="relative z-10">Jelajahi Produk Kami</span>
                <svg class="relative w-4 h-4 md:w-6 md:h-6 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
            <img class="relative w-full aspect-[3/2] md:aspect-video lg:h-[85vh] lg:aspect-auto object-cover" src="{{ asset('/Img/hero-img.jpg') }}" alt="Hero Image">
        </div>
    </div>

    <div class="w-full mt-0.5 mb-4 md:mt-2 md:mb-6">
        <!-- Rumah Tangga Slider -->
        @php
            $houseCategories = ['electronic spot', 'home spot', 'clean spot', 'travel spot', 'stationery spot', 'cook spot'];
            $houseProducts = $product->whereIn('kategori', $houseCategories)->take(10);
        @endphp

        @if (!empty($houseProducts))
            <x-product-slide :products="$houseProducts" :carouselRoute="route('product.paginate.produk')">
                <x-slot:carouselTitle>Produk Rumah Tangga Terbaru</x-slot:carouselTitle>
            </x-product-slide>
        @endif

        <!-- Fashion Slider -->
        @php
            $fashionCategories = ['pakaian pria', 'pakaian wanita', 'tas pria', 'tas wanita', 'aksesoris'];
            $fashionProducts = $product->whereIn('kategori', $fashionCategories)->take(6);
        @endphp

        @if (!empty($fashionProducts))
            <x-product-slide :products="$fashionProducts" :carouselRoute="route('product.paginate.produk')">
                <x-slot:carouselTitle>Produk Fashion Terbaru</x-slot:carouselTitle>
            </x-product-slide>
        @endif

        <!-- UMKM Slider -->
        @php
            $umkmProducts = $product->where('kategori', 'umkm')->take(6);
        @endphp

        @if (!empty($umkmProducts))
            <x-product-slide :products="$umkmProducts" :carouselRoute="route('product.paginate.produk', ['kategori' => 'umkm'])">
                <x-slot:carouselTitle>Produk UMKM</x-slot:carouselTitle>
            </x-product-slide>
        @endif
    </div>
</x-layout>
