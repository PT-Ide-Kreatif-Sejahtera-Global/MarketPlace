<x-layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	
	
	<div class="container mx-auto px-4 py-8">
		<!-- Products Grid -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
			@foreach($products->where('kategori', 'pakaian pria') as $product)
				<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
					<div class="relative">
						<img src="{{ $product->img }}" 
							 alt="{{ $product->produk }}" 
							 class="w-full h-56 object-cover">
					</div>
					<div class="p-6">
						<h3 class="text-lg font-semibold text-gray-800 line-clamp-2 mb-2">{{ $product->produk }}</h3>
						<p class="text-lime-600 font-bold text-xl mb-4">Rp {{ number_format((float)$product->harga, 0, ',', '.') }}</p>
						<a href="/detail/{{ $product->id }}" 
						   class="block text-center bg-lime-600 text-white px-6 py-3 rounded-lg hover:bg-lime-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
							View Details
						</a>
					</div>
				</div>
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