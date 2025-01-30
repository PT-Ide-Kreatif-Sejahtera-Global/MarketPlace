<div
    class="group relative bg-white rounded-2xl drop-shadow-[0_0_5px_rgb(0,0,0,0.15)] overflow-hidden hover:drop-shadow-[0_0_8px_rgb(0,0,0,0.15)] transition-all duration-300 ease-in-out transform hover:-translate-y-1">
    <!-- Bagian Gambar -->
    <a href="{{ route('product.show', $product->id) }}" class="relative rounded-2xl overflow-hidden">
        <img src="{{ url($product->img) }}" alt="{{ $product->produk }}" class="w-full aspect-square object-cover transform transition-transform duration-300 group-hover:scale-105">
    </a>

    <!-- Isi konten -->
    <div class="p-2 md:p-3">
        <!-- Bagian Kategori -->
        <p class="text-[10px] md:text-xs font-medium text-secondary uppercase tracking-wide">
            {{ $product->kategori }}
        </p>

        <!-- Bagian Judul -->
        <a href="{{ route('product.show', $product->id) }}">
            <h3 class="text-sm md:text-base font-semibold text-secondary-dark line-clamp-2 group-hover:text-primary-dark transition-colors duration-200">
                {{ $product->produk }}
            </h3>
        </a>

        <!-- Bagian Harga -->
        <div class="flex items-center justify-between mb-1 md:mb-2">
            <div>
                <p class="text-base md:text-lg font-bold text-primary-dark">
                    Rp {{ number_format((float) $product->harga, 0, ',', '.') }}
                </p>
                @if ($product->original_price ?? false)
                    <p class="text-sm text-secondary line-through">
                        Rp {{ number_format((float) $product->original_price, 0, ',', '.') }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Bagian Tombol -->
        <a href="{{ route('product.show', $product->id) }}"
            class="block w-full text-center ring-1 ring-primary-dark text-primary-dark px-4 py-1 md:px-6 md:py-2 rounded-full font-medium transition-all duration-500 ease-out hover:bg-primary-dark hover:text-white hover:ring-primary-dark">
            View Details
        </a>
    </div>

    <!-- Bagian status Stok tersedia atau tidak -->
    <div
        class="absolute top-4 right-4 text-white text-[10px] md:text-xs font-semibold px-2 md:px-3 py-1 rounded-full 
   {{ $product->jumlah > 0 ? 'bg-green-500' : 'bg-red-500' }}">
        {{ $product->jumlah > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
    </div>
</div>
