<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
    <div class="relative">
        <img src="{{ $product->img }}"
             alt="{{ $product->produk }}"
             class="w-full h-56 object-cover">
    </div>
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-800 line-clamp-2 mb-2">{{ $product->produk }}</h3>
        <s class="text-lime-600 font-bold text-xl mb-4">Rp {{ number_format((float)$product->harga, 0, ',', '.') }}</s>
        <p class="text-lime-600 font-bold text-xl mb-4">Rp {{ number_format((float)$product->harga_diskon, 0, ',', '.') }}</p>
       <a href="{{ route('product.show', $product->id) }}"
           class="block text-center bg-lime-600 text-white px-6 py-3 rounded-lg hover:bg-lime-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
            View Details
        </a>
    </div>
</div>