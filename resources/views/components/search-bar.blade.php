<form id="search-form" class="relative min-w-80">
    <input type="text" name="query" id="search-input"
        class="w-full pr-2 py-2 pl-10 text-gray-700 text-sm md:text-base bg-transparent border border-primary rounded-full focus:outline-none focus:ring-2 focus:ring-primary-dark focus:border-transparent shadow-sm relative z-10"
        placeholder={{ $placeholder ?? 'Search...' }} />
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400 z-20" fill="none" stroke="currentColor"
        viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
    <div id="search-hint" class="hidden absolute right-3 top-1/2 -translate-y-1/2 items-center gap-0.5 text-xs md:text-sm text-gray-400/65 z-0">
        <span>Enter</span>
        <svg xmlns="http://www.w3.org/2000/svg" height="14px" viewBox="0 -960 960 960" width="14px" fill="currentColor"><path d="M360-240 120-480l240-240 56 56-144 144h488v-160h80v240H272l144 144-56 56Z"/></svg>
    </div>
</form>