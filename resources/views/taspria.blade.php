<x-layout>
	<x-slot:title>{{ $title }}</x-slot:title>

	<div class="container mx-auto px-4 py-8">
		<!-- Search Section -->
		<x-search-bar>
			<x-slot:placeholder>"Search men's bag collections..."</x-slot:placeholder>
		</x-search-bar>

		<!-- Products Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
			@foreach($products->where('kategori', 'tas pria') as $product)
				<x-product-card :product="$product" />
			@endforeach
		</div>

		<!-- Pagination -->
		<div class="mt-12">
			<nav class="flex justify-center items-center">
				<ul class="flex space-x-2">
					@if ($products->onFirstPage())
						<li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">&laquo; Prev</li>
					@else
						<li>
							<a href="{{ $products->previousPageUrl() }}"
							   class="px-4 py-2 bg-white text-lime-600 rounded-lg hover:bg-lime-50 transition duration-300">
								&laquo; Prev
							</a>
						</li>
					@endif

					@foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
						<li>
							<a href="{{ $url }}"
							   class="px-4 py-2 rounded-lg {{ $page == $products->currentPage() ? 'bg-lime-600 text-white' : 'bg-white text-lime-600 hover:bg-lime-50' }} transition duration-300">
								{{ $page }}
							</a>
						</li>
					@endforeach

					@if ($products->hasMorePages())
						<li>
							<a href="{{ $products->nextPageUrl() }}"
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
                    query: query,
					kategori: 'tas pria'
                },
                success: function(data) {
					console.log(data);
                    $('#product-list').html(data);
                }
            });
        });
    });
</script>