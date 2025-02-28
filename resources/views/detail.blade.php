<x-layout>	
	<div class="min-h-screen container mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-5 md:pt-20 md:pb-8">
		<!-- Breadcrumb -->
		<div class="container mx-auto px-2 md:px-4 py-2.5 md:py-4">
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
					<li class="flex items-center shrink-0">
						<svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
						</svg>
						<a href="{{ route('product.paginate.produk') }}" class="ms-1 text-xs md:text-sm font-medium text-secondary-light hover:text-primary-dark md:ms-2 shrink-0">Produk</a>
					</li>
					<li class="flex items-center min-w-16">
						<svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
						</svg>
						<a href="{{ route('product.paginate.produk', ['kategori' => $product->kategori]) }}" class="ms-1 text-xs md:text-sm font-medium text-secondary-light hover:text-primary-dark md:ms-2 truncate w-full block">
							{{ ucwords($product->kategori) }}
						</a>
					</li>
					<li aria-current="page" class="flex items-center min-w-0">
						<svg class="h-4 w-4 md:h-5 md:w-5 text-gray-400 rtl:rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
						</svg>
						<span class="ms-1 text-xs md:text-sm font-medium text-secondary-light md:ms-2 truncate w-full block">
							{{ $product->produk }}
						</span>
					</li>
				</ol>
			</nav>			
		</div>

		<!-- Main Content -->
		<div class="container mx-auto px-2 md:px-4 pt-2 pb-4 md:pt-4 md:pb-8">
			<div class="w-full flex flex-col md:flex-row items-start gap-5 md:gap-10">
				<!-- Product Image Section -->
				<img src="{{ $product->img ? asset($product->img) : asset('img/product1.jpg') }}" 
					alt="{{ $product->produk }}" 
					class="w-full md:w-1/2 min-w-[50%] h-auto rounded-xl object-contain transform transition hover:scale-105"
					onerror="this.src='{{ asset('img/product1.jpg') }}'">

				<!-- Product Details Section -->
				<div class="w-full flex flex-col gap-2 md:gap-3">
					<!-- Stock Status -->
					<div class="inline-block">
						<span class="px-2 py-1 md:px-4 md:py-1.5 {{ $product->jumlah > 0 ? 'bg-emerald-100 text-primary-dark' : 'bg-red-100 text-red-700' }} rounded-full text-xs md:text-sm font-medium">
							{{ $product->jumlah > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
						</span>
					</div>

					<!-- Product Title -->
					<h1 class="text-lg md:text-2xl lg:text-3xl font-semibold text-secondary-dark">{{ $product->produk }}</h1>
					
					<!-- Category Badge -->
					<div class="text-secondary uppercase rounded-full text-sm font-medium">
						{{ $product->kategori }}
					</div>

					<!-- Price -->
					<div class="text-lg md:text-2xl lg:text-3xl font-bold text-primary-dark">
						Rp {{ number_format((float)$product->harga, 0, ',', '.') }}
					</div>

					<hr class="my-3 border-slate-300">

					<!-- Product Description -->
					<div class="prose max-w-none text-secondary text-sm md:text-base">
						<p class="whitespace-pre-line break-words">{{ $product->description }}</p>
					</div>

					<!-- Action Buttons -->
					<div class="space-y-4 pt-4 md:pt-6">
						@if ($product->jumlah > 0)
							<a href="{{ $product->link }}" target="_blank"
							class="block w-full text-center text-sm md:text-base bg-primary-dark text-white px-4 py-2 md:px-6 md:py-4 rounded-full hover:bg-emerald-700 transition duration-300 transform hover:-translate-y-0.5 font-medium">
								Beli Sekarang
							</a>
						@else
							<button class="block w-full text-center text-sm md:text-base bg-slate-200 text-secondary-light px-4 py-2 md:px-6 md:py-4 rounded-full font-medium" disabled>
								Stok Habis
							</button>
						@endif

						<a href="{{ url()->previous() }}"
						   class="block w-full text-center text-sm md:text-base bg-slate-100 text-secondary-dark px-4 py-2 md:px-6 md:py-4  rounded-full hover:bg-slate-200 transition duration-300 transform hover:-translate-y-0.5 font-medium">
							Kembali
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-layout>
