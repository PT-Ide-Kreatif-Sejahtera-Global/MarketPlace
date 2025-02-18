<!-- Pagination -->
<div class="mt-12">
    <nav class="flex justify-center items-center">
        <ul class="flex space-x-2 items-center">
            @if ($products->onFirstPage())
                <li class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">&laquo; Prev</li>
            @else
                <li>
                    <a href="{{ $products->previousPageUrl() }}"
                        class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                        &laquo; Prev
                    </a>
                </li>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                <li>
                    <a href="{{ $url }}"
                        class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base rounded-lg {{ $page == $products->currentPage() ? 'bg-primary-dark text-white' : 'bg-white text-primary-dark hover:bg-emerald-50' }} transition duration-300">
                        {{ $page }}
                    </a>
                </li>
            @endforeach

            @if ($products->hasMorePages())
                <li>
                    <a href="{{ $products->nextPageUrl() }}"
                        class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Next &raquo;</li>
            @endif
        </ul>
    </nav>
</div>