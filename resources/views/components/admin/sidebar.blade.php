<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>
 
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
       <a href="https://ideathings.id/" class="flex items-center ps-2.5 mb-5">
            <img class="h-10 md:h-12 w-auto rounded-full" src="{{ asset('/Img/logo.png') }}" alt="iDeaThings">
            <div class="ml-3 text-secondary font-extrabold text-lg md:text-xl tracking-tight">
                iDeaThings
            </div>
       </a>
       <ul class="space-y-2 font-medium">
          <li>
             <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-secondary-dark rounded-lg hover:bg-gray-100 group">
                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-secondary-dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                   <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                   <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                </svg>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
             <button class="flex items-center p-2 text-secondary-dark rounded-lg hover:bg-gray-100 group" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-secondary-dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
             </button>
          </li>
       </ul>
    </div>
</aside>

<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>

<script>
    $(document).ready(function () {
        const toggleButton = $("[data-drawer-toggle='logo-sidebar']");
        const sidebar = $("#logo-sidebar");
        const overlay = $("#overlay");

        if (toggleButton.length && sidebar.length) {
            toggleButton.on("click", function () {
                sidebar.toggleClass("-translate-x-full");
                overlay.toggleClass("hidden");
            });

            overlay.on("click", function () {
                sidebar.toggleClass("-translate-x-full");
                overlay.toggleClass("hidden");
            });
        }
    });
</script>