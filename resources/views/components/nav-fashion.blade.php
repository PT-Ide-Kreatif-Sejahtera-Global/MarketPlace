<div x-data="{ isOpen: false }" @mouseenter="isOpen = true" @mouseleave="isOpen = false" class="relative inline-block text-left">
    <button 
        type="button" 
        @click.prevent="isOpen = !isOpen" 
        class="inline-flex items-center gap-x-1.5 px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark text-secondary"
        id="menu-button" 
        :aria-expanded="isOpen">
        Fashion
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
        class="origin-top-right absolute z-10 top-full left-0 w-56 bg-white rounded-md shadow-lg [&[x-cloak]]:hidden"
        role="menu">
        
        <div class="py-1">
            <a href="{{ route('product.paginate.produk', ['kategori' => 'pakaian-pria']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Pakaian Pria</a>
            <a href="{{ route('product.paginate.produk', ['kategori' => 'pakaian-wanita']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Pakaian Wanita</a>
            <a href="{{ route('product.paginate.produk', ['kategori' => 'tas-pria']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Tas Pria</a>
            <a href="{{ route('product.paginate.produk', ['kategori' => 'tas-wanita']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Tas Wanita</a>
            <a href="{{ route('product.paginate.produk', ['kategori' => 'aksesoris']) }}" class="block px-4 py-2 text-sm text-secondary hover:bg-primary-dark hover:text-white">Aksesoris</a>
        </div>
    </div>
</div>
