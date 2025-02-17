<div
    class="group h-full grid relative bg-white rounded-lg md:rounded-2xl drop-shadow-[0_0_5px_rgb(0,0,0,0.15)] overflow-hidden hover:drop-shadow-[0_0_8px_rgb(0,0,0,0.15)] transition-all duration-300 ease-in-out transform hover:-translate-y-1">
    <!-- Bagian Gambar -->
    <a href="{{ route('product.show', $product->id) }}" class="relative rounded-lg md:rounded-2xl overflow-hidden">
        <img src="{{ url($product->img) }}" alt="{{ $product->produk }}" class="w-full aspect-square object-cover transform transition-transform duration-300 group-hover:scale-105">

        <!-- Bagian status Stok tersedia atau tidak -->
        @if ($product->jumlah == 0)
            <div class="absolute w-full h-full top-0 left-0 bg-secondary-subtle/50 flex justify-center items-center transform transition-transform duration-300 group-hover:scale-105">
                <div class="w-3/5 p-2 md:p-3 bg-secondary/85 text-sm lg:text-base text-white/95 text-center font-medium aspect-square flex justify-center items-center rounded-full">
                    <span>Stok Habis</span>
                </div>
            </div>
        @endif
    </a>

    <!-- Isi konten -->
    <div class="p-2 md:p-3 h-full flex flex-col justify-between gap-1.5 md:gap-2">
        <div>
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
            <div class="flex items-center justify-between">
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
        </div>
    </div>
</div>
