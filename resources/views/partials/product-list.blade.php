@if(isset($products) && $products->isEmpty())
    <p class="text-center text-gray-500">Produk tidak ditemukan.</p>
@else
    @foreach ($products as $product)
    <div
    class="group relative bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:-translate-y-1">
    <!-- Bagian Gambar -->
    <div class="relative overflow-hidden p-2">
        <div class="rounded-xl border-2 border-gray-200 overflow-hidden shadow-md">
            <img src="{{ $product->img }}" alt="{{ $product->produk }}"
                class="w-full h-56 object-cover transform transition-transform duration-300 group-hover:scale-110">
        </div>
    </div>

    <!-- Isi konten -->
    <div class="p-6">
        <!-- Bagian Kategori -->
        <div class="text-xs font-semibold text-lime-600 uppercase tracking-wide mb-2">
            {{ $product->kategori }}
        </div>

        <!-- Bagian Judul -->
        <h3
            class="text-lg font-bold text-gray-900 line-clamp-2 mb-3 group-hover:text-lime-600 transition-colors duration-200">
            {{ $product->produk }}
        </h3>

        <!-- Bagian Harga -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-2xl font-bold text-lime-600">
                    Rp {{ number_format((float) $product->harga, 0, ',', '.') }}
                </p>
                @if ($product->original_price ?? false)
                    <p class="text-sm text-gray-500 line-through">
                        Rp {{ number_format((float) $product->original_price, 0, ',', '.') }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Bagian Tombol -->
        <a href="{{ route('product.show', $product->id) }}"
            class="block w-full text-center bg-lime-600 text-white px-6 py-3 rounded-lg font-semibold
                 hover:bg-lime-700 active:bg-lime-800 
                 transition-all duration-200 ease-in-out
                 transform hover:shadow-lg active:scale-95">
            View Details
        </a>
    </div>

    <!-- Bagina status Stok tersedia atau tidak -->
    <div
        class="absolute top-4 right-4 text-white text-xs font-bold px-3 py-1 rounded-full 
   {{ $product->jumlah > 0 ? 'bg-green-500' : 'bg-red-500' }}">
        {{ $product->jumlah > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
    </div>
</div>

    @endforeach
@endif
