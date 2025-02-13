<div x-data="{ openDropdown: null }" class="flex space-x-4">
    <!-- Navbar Rumah -->
    <div class="relative inline-block text-left">
        <button 
            type="button" 
            @click="openDropdown = (openDropdown === 'rumah') ? null : 'rumah'" 
            class="{{ in_array(request()->path(), [
                        'produk/electronic-spot',
                        'produk/home-spot',
                        'produk/clean-spot',
                        'produk/travel-spot',
                        'produk/stationery-spot',
                        'produk/cook-spot'
                    ]) ? 'text-primary-dark font-bold' : 'text-secondary' }} inline-flex items-center gap-x-1.5 px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
            Rumah Tangga
            <svg class="-mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>

        <div 
            x-show="openDropdown === 'rumah'"
            @click.outside="openDropdown = null"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute left-0 z-10 mt-2 w-56 origin-top-right divide-y divide-primary-subtle rounded-md bg-white/95 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            
            <div class="py-1">
                <a href="{{ route('product.paginate.produk', ['kategori' => 'electronic-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Electronic Spot</a>
                <a href="{{ route('product.paginate.produk', ['kategori' => 'home-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Home Spot</a>
                <a href="{{ route('product.paginate.produk', ['kategori' => 'clean-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Clean Spot</a>
                <a href="{{ route('product.paginate.produk', ['kategori' => 'travel-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Travel Spot</a>
                <a href="{{ route('product.paginate.produk', ['kategori' => 'stationery-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Stationery Spot</a>
                <a href="{{ route('product.paginate.produk', ['kategori' => 'cook-spot']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Cook Spot</a>
            </div>
        </div>
    </div>