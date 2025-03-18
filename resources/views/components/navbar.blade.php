<nav class="bg-white/95 fixed w-full top-0 z-50 transition-all duration-300" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex py-4 md:py-5 items-center justify-between">
            <!-- Logo and text -->
            <div class="flex-shrink-0 flex items-center space-x-3 transform transition-transform hover:scale-105">
                <a href="{{ url('https://ideathings.id/') }}" class="flex items-center">
                    <img class="h-10 md:h-12 w-auto rounded-full" src="{{ asset('/Img/logo.png') }}" alt="iDeaThings">
                    <div class="ml-3 text-secondary font-extrabold text-lg md:text-xl tracking-tight">
                        iDeaThings
                    </div>
                </a>
            </div>

            <!-- Centered navigation with modern hover effects -->
            <div class="hidden md:flex justify-center items-center space-x-2 lg:space-x-6">
                <a href="{{ route('product.paginate.home') }}" class="group relative {{ request()->is('/') || request()->is('home') ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                    Home
                </a>
                <a href="{{ route('product.paginate.produk') }}" class="group relative {{ request()->is('produk') ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                    Produk
                </a>

                <x-nav-fashion class="group relative text-secondary hover:text-primary-dark px-3 py-2 text-sm font-medium transition-all duration-300">
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-dark scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </x-nav-fashion>

                <x-nav-rumah class="group relative text-secondary hover:text-primary-dark px-3 py-2 text-sm font-medium transition-all duration-300">
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-dark scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
                </x-nav-rumah>

                <a href="{{ route('product.paginate.produk', ['kategori' => 'umkm']) }}" class="{{ request()->is('produk/umkm') ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                    UMKM
                </a>
            </div>

			<div class="hidden md:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="flex items-center space-x-2 px-2 lg:px-4 py-2 rounded-full bg-primary text-secondary-dark font-bold transition-all duration-300 hover:shadow-lg hover:scale-105 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:rotate-12" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>
                        <span class="md:hidden lg:block">Login Admin</span>
                    </a>
                @endguest
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 px-2 lg:px-4 py-2 rounded-full bg-primary text-secondary-dark font-bold transition-all duration-300 hover:shadow-lg hover:scale-105 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:rotate-12" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                            <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z"/>
                        </svg>
                        <span class="md:hidden lg:block">Admin</span>
                    </a>
                @endauth
			</div>

            <!-- Mobile Menu Toggle -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen" class="inline-flex items-center justify-center rounded-full p-2 text-secondary hover:text-primary-dark hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{'hidden': !isOpen, 'block': isOpen }" class="hidden h-5 w-5 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu with enhanced styling -->
    <div x-show="isOpen" @click.outside="isOpen = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="md:hidden bg-white/95 backdrop-blur-lg shadow-lg">
        <div class="flex flex-col space-y-2 p-3">
            <a href="{{ route('product.paginate.home') }}" class="group relative {{ request()->is('/') || request()->is('home')  ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                Home
            </a>
            <a href="{{ route('product.paginate.produk') }}" class="group relative {{ request()->is('produk') ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                Produk
            </a>
 
            <x-nav-fashion class="group relative text-secondary hover:text-primary-dark px-3 py-2 text-sm font-medium transition-all duration-300">
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-dark scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
            </x-nav-fashion>

            <x-nav-rumah class="group relative text-secondary hover:text-primary-dark px-3 py-2 text-sm font-medium transition-all duration-300">
                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-dark scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></span>
            </x-nav-rumah>

            <a href="{{ route('product.paginate.produk', ['kategori' => 'umkm']) }}" class="{{ request()->is('/produk/umkm') ? 'text-primary-dark font-bold' : 'text-secondary' }} px-3 py-2 text-sm font-medium transition-all duration-300 hover:text-primary-dark">
                UMKM
            </a> 
        </div>
    </div>
</nav>