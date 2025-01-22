<div class="mb-8 max-w-2xl mx-auto">
    <form id="search-form" class="relative">
        <input type="text" name="query" id="search-input"
            class="w-full px-4 py-3 pl-12 text-gray-700 bg-white border border-lime-300 rounded-full focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-transparent shadow-sm"
            placeholder={{ $placeholder ?? 'Search...' }} />
        <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </form>
</div>