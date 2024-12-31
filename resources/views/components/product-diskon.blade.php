<div
    class="group relative bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1">
    <!-- Image Container -->
    <div class="relative overflow-hidden p-2">
        <div class="rounded-xl border-2 border-gray-200 overflow-hidden shadow-md">
            <img src="{{ $product->img }}" alt="{{ $product->produk }}"
                class="w-full h-56 object-cover transform transition-transform duration-300 group-hover:scale-110">
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">

        <!-- Category -->
        <div class="text-xs font-semibold text-lime-600 uppercase tracking-wide mb-2">
            {{ $product->kategori }}
        </div>

        <!-- Title -->
        <h3
            class="text-lg font-bold text-gray-900 line-clamp-2 mb-3 group-hover:text-lime-600 transition-colors duration-200">
            {{ $product->produk }}
        </h3>

        <!-- Price Section -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <s class="text-lime-600 font-bold text-xl mb-4"
                    style="text-decoration: line-through; text-decoration-color: red;">
                    Rp {{ number_format((float) $product->harga, 0, ',', '.') }}
                </s>
                <p class="text-lime-600 font-bold text-xl mb-4">
                    Rp {{ number_format((float) $product->harga_diskon, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <!-- Button -->
        <a href="{{ route('product.show', $product->id) }}"
           class="block text-center bg-lime-600 text-white px-6 py-3 rounded-lg hover:bg-lime-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5">

            View Details
        </a>
    </div>

    <!-- Stock Status Badge -->
    <div
        class="absolute top-4 right-4 text-white text-xs font-bold px-3 py-1 rounded-full 
   {{ $product->jumlah > 0 ? 'bg-green-500' : 'bg-red-500' }}">
        {{ $product->jumlah > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
    </div>
</div>
