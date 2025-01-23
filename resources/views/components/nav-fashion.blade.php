<div x-data="{ isOpen: false }" class="relative inline-block text-left">
  <div>
      <button 
          type="button" 
          @click="isOpen = !isOpen" 
          class="{{ request()->is('fashion/*') ? 'text-lime-600 font-bold' : 'text-gray-600' }} inline-flex w-full justify-center gap-x-1.5 px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-lime-600" 
          id="menu-button" 
          aria-expanded="true" 
          aria-haspopup="true">
          Fashion
          <svg class="-mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>
      </button>
  </div>

  <div 
      x-show="isOpen"
      x-transition:enter="transition ease-out duration-100 transform"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-75 transform"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="absolute left-0 z-10 mt-2 w-56 origin-top-right divide-y divide-lime-100 rounded-md bg-white/95 drop-shadow-[0_0_10px_rgba(54,83,20,0.25)] focus:outline-none" 
      role="menu" 
      aria-orientation="vertical" 
      aria-labelledby="menu-button" 
      tabindex="-1">
      
       <div class="py-1" role="none">
              <a href="{{ route('fashion.pakaianpria') }}" class="text-lime-700 hover:bg-lime-700 hover:text-white block px-4 py-2 text-sm" role="menuitem">Pakaian Pria</a>
     
              <a href="{{ route('fashion.pakaianwanita') }}" class="text-lime-700 hover:bg-lime-700 hover:text-white block px-4 py-2 text-sm" role="menuitem">Pakaian Wanita</a>
     
              <a href="{{ route('fashion.taspria') }}" class="text-lime-700 hover:bg-lime-700 hover:text-white block px-4 py-2 text-sm" role="menuitem">Tas Pria</a>
              
              <a href="{{ route('fashion.taswanita') }}" class="text-lime-700 hover:bg-lime-700 hover:text-white block px-4 py-2 text-sm" role="menuitem">Tas Wanita</a>
              
              <a href="{{ route('fashion.aksesoris') }}" class="text-lime-700 hover:bg-lime-700 hover:text-white block px-4 py-2 text-sm" role="menuitem">Aksesoris</a>
      </div>
  </div>
</div>

