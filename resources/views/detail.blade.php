<x-layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	
	<div class="min-h-screen">
		<!-- Breadcrumb -->
		<div class="container mx-auto px-4 py-4">
			<nav class="text-gray-500 text-sm">
				<a href="{{ route('product.paginate.produk') }}" class="hover:text-primary-dark">Produk</a>
				<span class="mx-2">/</span>
				<a href="{{ route('product.paginate.produk', str_replace(" ", "-", $product->kategori)) }}" class="hover:text-primary-dark">{{ ucwords($product->kategori) }}</a>
				<span class="mx-2">/</span>
				<span class="text-secondary-dark">{{ $product->produk }}</span>
			</nav>
		</div>

		<!-- Main Content -->
		<div class="container mx-auto px-4 pt-4 pb-8">
			{{-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-12"> --}}
			<div class="flex flex-col md:flex-row items-start gap-10">
				<!-- Product Image Section -->
				<img src="{{ $product->img ? asset($product->img) : asset('img/product1.jpg') }}" 
					alt="{{ $product->produk }}" 
					class="w-full md:w-1/2 h-auto rounded-xl object-contain transform transition hover:scale-105"
					onerror="this.src='{{ asset('img/product1.jpg') }}'">

				<!-- Product Details Section -->
				<div class="flex flex-col gap-3">
					<!-- Category Badge -->
					<div class="inline-block">
						<span class="px-4 py-1.5 bg-emerald-100 text-primary-dark uppercase rounded-full text-sm font-medium">
							{{ $product->kategori }}
						</span>
					</div>

					<!-- Product Title -->
					<h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-secondary-dark">{{ $product->produk }}</h1>
					
					<!-- Stock Status -->
					<div class="flex items-center space-x-2">
						<div class="w-2 h-2 rounded-full {{ $product->jumlah > 0 ? 'bg-primary-dark' : 'bg-red-500' }}"></div>
						<span class="text-{{ $product->jumlah > 0 ? 'secondary' : 'red-500' }} font-medium text-sm md:text-base">
							{{ $product->jumlah > 0 ? 'Stok Tersedia' : 'Stok Habis' }}
						</span>
					</div>

					<!-- Price -->
					<div class="text-lg md:text-xl lg:text-2xl tracking-wide font-bold text-primary-dark">
						Rp {{ number_format((float)$product->harga, 0, ',', '.') }}
					</div>

					<hr class="my-3 border-slate-300">

					<!-- Product Description -->
					<div class="prose max-w-none text-secondary">
						<p class="whitespace-pre-line">{{ $product->description }}</p>
					</div>

					<!-- Action Buttons -->
					<div class="space-y-4 pt-6">
						@if ($product->jumlah > 0)
							<a href="{{ $product->link }}" target="_blank"
							class="block w-full text-center bg-primary-dark text-white px-6 py-4 rounded-full hover:bg-emerald-700 transition duration-300 transform hover:-translate-y-0.5 font-medium">
								Beli Sekarang
							</a>
						@else
							<button class="block w-full text-center bg-slate-200 text-secondary-light px-6 py-4 rounded-full font-medium" disabled>
								Stok Habis
							</button>
						@endif

						<a href="{{ url()->previous() }}"
						   class="block w-full text-center bg-slate-100 text-secondary-dark px-6 py-4 rounded-full hover:bg-slate-200 transition duration-300 transform hover:-translate-y-0.5 font-medium">
							Kembali
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-layout>
