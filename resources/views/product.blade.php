<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-6 md:pt-20 md:pb-8">
        <h2 class="mb-2 md:mb-3 text-xl font-semibold text-secondary-dark sm:text-2xl">{{ $title }}</h2>
        <div class="w-full flex flex-col gap-5 md:flex-row md:justify-between md:items-center mb-8">
            <nav class="flex w-full overflow-hidden" aria-label="Breadcrumb">
				<ol class="flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse w-full">
					<li class="flex items-center shrink-0">
						<a href="{{ route('product.paginate.home') }}" class="text-xs md:text-sm font-medium text-secondary-light hover:text-primary-dark flex items-center">
							<svg class="me-2.5 h-3 w-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
								<path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
							</svg>
							Home
						</a>
					</li>
                    @if (request()->is('produk'))
                        <li class="flex items-center shrink-0">
                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <span class="ms-1 text-xs md:text-sm font-medium text-secondary-light md:ms-2 shrink-0">Produk</span>
                        </li>
                    @endif
                    @if (request()->is('produk/*'))
                        <li class="flex items-center shrink-0">
                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <a href="{{ route('product.paginate.produk') }}" class="ms-1 text-xs md:text-sm font-medium text-secondary-light hover:text-primary-dark md:ms-2 shrink-0">Produk</a>
                        </li>
                        <li aria-current="page" class="flex items-center min-w-16">
                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                            </svg>
                            <span class="ms-1 text-xs md:text-sm font-medium text-secondary-light md:ms-2 truncate w-full block">{{ ucwords($kategori) }}</span>
                        </li>
                    @endif
                </ol>
            </nav>
            
            <x-search-bar>
                <x-slot:placeholder>"Search products..."</x-slot:placeholder>
            </x-search-bar>
        </div>

        <!-- Products Grid -->
        <div id="product-list" class="relative grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
            @forelse ($kategori ? $products->where('kategori', $kategori) : $products as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="absolute text-center text-secondary">Produk tidak ditemukan.</p>
            @endforelse
        </div>

        <x-pagination :products="$products" />
    </div>
</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search-input').on('input', function() {
            var query = $(this).val();
            var kategori = <?php echo json_encode($kategori); ?>

            $.ajax({
                url: '{{ route('search') }}',
                method: 'GET',
                data: {
                    query: query,
                    kategori: kategori
                },
                success: function(data) {
                    $('#product-list').html(data);
                }
            });
        });
    });
</script>
