
<div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false" class="relative inline-block text-left">
    <button 
        type="button" 
        @click.prevent="isOpen = !isOpen" 
        class="inline-flex items-center gap-x-1.5 px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark text-secondary"
        id="menu-button" 
        :aria-expanded="isOpen">
        Rumah Tangga
        <svg class="-mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </button>

    <div 
        x-show="isOpen"
        @focusout="await $nextTick();!$el.contains($focus.focused()) && (isOpen = false)"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
        class="origin-top-right absolute top-full z-10 left-0 w-56 bg-white rounded-md shadow-lg [&[x-cloak]]:hidden"
        role="menu">
        
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
