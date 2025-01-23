<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-4">
        <!-- Search Section with Better Styling -->
		<x-search-bar>
			<x-slot:placeholder>"Search products..."</x-slot:placeholder>
		</x-search-bar>

        <!-- Products Grid -->
        <div id="product-list" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 md:gap-4">
            @foreach ($product as $products)
                <x-product-card :product="$products" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            <nav class="flex justify-center items-center">
                <ul class="flex space-x-2">
                    @if ($product->onFirstPage())
                        <li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">&laquo; Prev</li>
                    @else
                        <li>
                            <a href="{{ $product->previousPageUrl() }}"
                                class="px-4 py-2 bg-white text-lime-600 rounded-lg hover:bg-lime-50 transition duration-300">
                                &laquo; Prev
                            </a>
                        </li>
                    @endif

                    @foreach ($product->getUrlRange(1, $product->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-lg {{ $page == $product->currentPage() ? 'bg-lime-600 text-white' : 'bg-white text-lime-600 hover:bg-lime-50' }} transition duration-300">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach

                    @if ($product->hasMorePages())
                        <li>
                            <a href="{{ $product->nextPageUrl() }}"
                                class="px-4 py-2 bg-white text-lime-600 rounded-lg hover:bg-lime-50 transition duration-300">
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
