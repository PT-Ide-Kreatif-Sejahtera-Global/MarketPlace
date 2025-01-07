<x-layout>
	<x-slot:title>{{ $title }}</x-slot:title>

	<!-- Slick Carousel CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

	<div class="container mx-auto px-4 py-8">
			<!-- Full-page Carousel Section -->
			<div class="mb-12 relative">
					<div class="carousel" id="product-carousel">
							@foreach ($product->take(5) as $carouselProduct)
									<div class="carousel-slide">
											<div class="relative h-[600px] rounded-3xl overflow-hidden shadow-2xl">
													<!-- Full-page Image Background -->
													<img src="{{ $carouselProduct->img }}" 
															 alt="{{ $carouselProduct->produk }}"
															 class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
													
													<!-- Overlay Content with Darker Shadow -->
													<div class="absolute inset-0 bg-gradient-to-t from-black/50 to-black/20">
															<!-- Category and Stock Badges -->
															<div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm">
																	<span class="text-lime-600 font-semibold text-sm">{{ $carouselProduct->kategori }}</span>
															</div>
															<div class="absolute top-4 right-4 {{ $carouselProduct->jumlah > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white px-4 py-2 rounded-full font-medium text-sm shadow-sm">
																	{{ $carouselProduct->jumlah > 0 ? 'In Stock' : 'Out of Stock' }}
															</div>

															<!-- Content at Bottom -->
															<div class="absolute bottom-0 left-0 right-0 p-8">
																	<h3 class="text-4xl font-bold text-white mb-4">
																			{{ $carouselProduct->produk }}
																	</h3>
																	
																	<div class="flex items-center justify-between mb-6">
																			<div>
																					<p class="text-4xl font-bold text-white">
																							Rp {{ number_format($carouselProduct->harga, 0, ',', '.') }}
																					</p>
																					@if ($carouselProduct->original_price ?? false)
																							<p class="text-sm text-gray-300 line-through">
																									Rp {{ number_format($carouselProduct->original_price, 0, ',', '.') }}
																							</p>
																					@endif
																			</div>
																			<a href="{{ route('product.show', $carouselProduct->id) }}"
																				 class="inline-flex items-center bg-lime-600 text-white px-8 py-4 rounded-xl font-bold
																								hover:bg-lime-700 active:bg-lime-800 
																								transition-all duration-300
																								transform hover:-translate-y-1 hover:shadow-xl">
																					View Details
																					<svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
																							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
																					</svg>
																			</a>
																	</div>
															</div>
													</div>
											</div>
									</div>
							@endforeach
					</div>

					<!-- Custom Navigation Arrows -->
					<button class="absolute top-1/2 -left-12 transform -translate-y-1/2 bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none prev-arrow z-10">
							<svg class="w-8 h-8 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
							</svg>
					</button>
					<button class="absolute top-1/2 -right-12 transform -translate-y-1/2 bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none next-arrow z-10">
							<svg class="w-8 h-8 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
							</svg>
					</button>
			</div>

			<!-- Replaced Explore Products Button -->
			<div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
					<a href="{{ route('product.paginate.produk') }}" 
						 class="group inline-flex items-center space-x-3 text-white border-2 border-white/50 hover:border-white px-8 py-3 rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
							<span class="text-lg font-medium">Jelajahi Produk Kami</span>
							<svg class="w-6 h-6 transition-transform duration-300 group-hover:translate-x-2" 
									 fill="none" 
									 stroke="currentColor" 
									 viewBox="0 0 24 24">
									<path stroke-linecap="round" 
												stroke-linejoin="round" 
												stroke-width="1.5" 
												d="M17 8l4 4m0 0l-4 4m4-4H3"/>
							</svg>
					</a>
			</div>
	</div>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

	<script>
			$(document).ready(function() {
					$('#product-carousel').slick({
							autoplay: true,
							autoplaySpeed: 5000,
							dots: true,
							arrows: true,
							prevArrow: $('.prev-arrow'),
							nextArrow: $('.next-arrow'),
							infinite: true,
							speed: 800,
							fade: true,
							cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
							slidesToShow: 1,
							slidesToScroll: 1,
							adaptiveHeight: true
					});

					// Existing search functionality
					$('#search-input').on('input', function() {
							var query = $(this).val();
							$.ajax({
									url: '{{ route('search') }}',
									method: 'GET',
									data: { query: query },
									success: function(data) {
											$('#product-list').html(data);
									}
							});
					});
			});
	</script>
</x-layout>