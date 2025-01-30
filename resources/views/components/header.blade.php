<header class="bg-gradient-to-r from-emerald-50 via-emerald-100 to-emerald-50 shadow-lg mt-16 relative overflow-hidden">
	<!-- Decorative background elements -->
	<div class="absolute inset-0 opacity-10">
		<div class="absolute -right-8 -top-8 w-32 h-32 bg-primary rounded-full"></div>
		<div class="absolute -left-4 -bottom-4 w-24 h-24 bg-primary-light rounded-full"></div>
	</div>

	<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 relative">
			<!-- Main content with enhanced styling -->
			<div class="bg-gradient-to-r from-primary to-primary-dark text-white py-6">
				<div class="container mx-auto px-3">
					<h1 class="text-4xl font-bold mb-2">{{ $slot }}</h1>
					<p class="text-xl">
					Temukan berbagai macam produk menarik di iDeaThings Marketplace
					</p>
				</div>
			</div>

		<!-- Optional decorative element -->
		<div class="absolute right-0 bottom-0 hidden lg:block">
			<svg class="w-32 h-32 text-emerald-200/50" fill="currentColor" viewBox="0 0 100 100">
				<path d="M0,0 L100,0 L100,100 L0,100 Z" fill-opacity="0.1"></path>
			</svg>
		</div>
	</div>
</header>

