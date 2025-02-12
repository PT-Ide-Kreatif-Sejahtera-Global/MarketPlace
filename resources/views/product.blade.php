<x-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-8">
        <h2 class="mb-2 md:mb-3 text-xl font-semibold text-secondary-dark sm:text-2xl">{{ $title }}</h2>
        <div class="w-full flex flex-col gap-5 md:flex-row md:justify-between md:items-center mb-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('product.paginate.home') }}" class="inline-flex items-center text-sm font-medium text-secondary-light hover:text-primary-dark">
                            <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    @if (request()->is('produk'))
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-secondary-light md:ms-2">Produk</span>
                            </div>
                        </li>
                    @endif
                    @if (request()->is('produk/*'))
                        <li>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                </svg>
                                <a href="{{ route('product.paginate.produk') }}" class="ms-1 text-sm font-medium text-secondary-light hover:text-primary-dark md:ms-2">Produk</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-secondary-light md:ms-2">{{ ucwords($kategori) }}</span>
                            </div>
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

        <!-- Pagination -->
        <div class="mt-12">
            <nav class="flex justify-center items-center">
                <ul class="flex space-x-2 items-center">
                    @if ($products->onFirstPage())
                        <li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">&laquo; Prev</li>
                    @else
                        <li>
                            <a href="{{ $products->previousPageUrl() }}"
                                class="px-4 py-2 bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                                &laquo; Prev
                            </a>
                        </li>
                    @endif
        
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-lg {{ $page == $products->currentPage() ? 'bg-primary-dark text-white' : 'bg-white text-primary-dark hover:bg-emerald-50' }} transition duration-300">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
        
                    @if ($products->hasMorePages())
                        <li>
                            <a href="{{ $products->nextPageUrl() }}"
                                class="px-4 py-2 bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                                Next &raquo;
                            </a>
                        </li>
                    @else
                        <li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Next &raquo;</li>
                    @endif
                </ul>
            </nav>
        </div>

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
