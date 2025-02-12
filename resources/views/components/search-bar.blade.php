<form id="search-form" class="relative">
    <input type="text" name="query" id="search-input"
        class="w-full pr-2 py-2 pl-10 text-gray-700 text-sm md:text-base bg-white border border-primary rounded-full focus:outline-none focus:ring-2 focus:ring-primary-dark focus:border-transparent shadow-sm"
        placeholder={{ $placeholder ?? 'Search...' }} />
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
</form>