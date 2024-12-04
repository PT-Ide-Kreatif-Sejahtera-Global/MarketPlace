<x-layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	
	
	<div class="container mx-auto px-4 py-8">
		<!-- Search Section -->
		<div class="mb-8 max-w-2xl mx-auto">
			<form action="{{ route('search.umkm') }}" method="GET" class="relative">
				<input type="text" 
					   name="query" 
					   id="search-input"
					   class="w-full px-4 py-3 pl-12 text-gray-700 bg-white border border-lime-300 rounded-full focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-transparent shadow-sm"
					   placeholder="Search products discount..."
					   value="{{ request('query') }}"
				/>
				<svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
				</svg>
			</form>
		</div>

		<!-- Products Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
			@foreach($products->where('kategori', 'UMKM') as $product)
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
	$(document).ready(function () {
		$('#search-input').on('input', function () {
			var query = $(this).val();

			$.ajax({
				url: '{{ route("search.umkm") }}',
				method: 'GET',
				data: { query: query },
				success: function (data) {
					$('#product-list').html(data);
				}
			});
		});
	});
</script>