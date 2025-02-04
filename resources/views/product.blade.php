<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-4">
        <!-- Search Section with Better Styling -->
		<x-search-bar>
			<x-slot:placeholder>"Search products..."</x-slot:placeholder>
		</x-search-bar>

        <!-- Products Grid -->
        <div id="product-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 md:gap-4">
            @forelse ($kategori ? $products->where('kategori', $kategori) : $products as $product)
                <x-product-card :product="$product" />
            @empty
                <p class="text-center text-secondary">Produk tidak ditemukan.</p>
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
