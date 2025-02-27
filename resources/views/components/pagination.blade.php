<!-- Pagination -->
<div class="mt-12">
    <nav class="flex justify-center items-center">
        <ul class="flex space-x-2 items-center" id="pagination-container">
            @if ($products->onFirstPage())
                <li class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    &laquo; Prev
                </li>
            @else
                <li>
                    <a href="{{ $products->previousPageUrl() }}"
                        class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                        &laquo; Prev
                    </a>
                </li>
            @endif

            @php
                $currentPage = $products->currentPage();
                $lastPage = $products->lastPage();
            @endphp

            <div id="pagination-links" class="flex space-x-2"></div>

            @if ($products->hasMorePages())
                <li>
                    <a href="{{ $products->nextPageUrl() }}"
                        class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    Next &raquo;
                </li>
            @endif
        </ul>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPage = {{ $currentPage }};
        let lastPage = {{ $lastPage }};
        let paginationLinks = document.getElementById("pagination-links");

        function updatePagination() {
            let range;
            let screenWidth = window.innerWidth;

            if (screenWidth >= 1024) {
                range = 2;
            } else if (screenWidth >= 768) {
                range = 1;
            } else {
                range = 0;
            }

            let html = "";

            if (screenWidth >= 375) {
                if (currentPage > range + 1) {
                    html += `<li><a href="{{ $products->url(1) }}" class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">1</a></li>`;
                    if (currentPage > range + 2) {
                        html += `<li class="text-gray-400 px-2">...</li>`;
                    }
                }
    
                for (let page = Math.max(1, currentPage - range); page <= Math.min(lastPage, currentPage + range); page++) {
                    let isActive = page === currentPage ? "bg-primary-dark text-white" : "bg-white text-primary-dark hover:bg-emerald-50";
    
                    let url = `?page=${page}`;
    
                    html += `<li><a href="${url}" class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base rounded-lg ${isActive} transition duration-300">${page}</a></li>`;
                }
    
                if (currentPage < lastPage - range) {
                    if (currentPage < lastPage - range - 1) {
                        html += `<li class="text-gray-500 px-2">...</li>`;
                    }
                    html += `<li><a href="{{ $products->url($lastPage) }}" class="px-3 py-1.5 md:px-4 md:py-2 text-sm md:text-base bg-white text-primary-dark rounded-lg hover:bg-emerald-50 transition duration-300">${lastPage}</a></li>`;
                }
            }

            paginationLinks.innerHTML = html;
        }

        updatePagination();
        window.addEventListener("resize", updatePagination);
    });
</script>