<nav class="sticky top-0 bg-white shadow-sm px-12 z-30">
    <div class="container mx-auto px-4 flex items-center justify-between h-28">
        <!-- Logo kiri -->
        <a href="#" class="flex items-center">
            <img src="{{ asset('Logo.png') }}" alt="Logo" class="h-22 w-auto" />
        </a>

        <!-- Hamburger button (mobile) -->
        <button id="mobile-menu-button" aria-label="Toggle menu" aria-expanded="false"
            class="lg:hidden focus:outline-none">
            <svg class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    <!-- Menu kanan -->
    <ul id="navbar-menu" class="hidden lg:flex space-x-8 font-light text-[#810000]">
        <li>
            <a href="/login"
                class="relative inline-block px-6 py-2 text-white bg-[#810000] rounded-md hover:bg-[#a52a2a] focus:outline-none focus:ring-2 focus:ring-[#810000] focus:ring-opacity-50">
                Masuk
            </a>
        </li>
        <li>
            <a href="/register"
                class="relative inline-block px-6 py-2 text-[#810000] border-2 border-[#810000] rounded-md hover:bg-[#810000] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#810000] focus:ring-opacity-50">
                Daftar
            </a>
        </li>
    </ul>


    <!-- Mobile menu (hidden by default) -->
    <ul id="mobile-menu" class="lg:hidden hidden flex-col bg-white border-t border-gray-200">
        <li class="border-b border-gray-200">
            <a href="/login"
                class="block px-4 py-2 hover:bg-gray-100 {{ request()->is('login') ? 'bg-gray-100 font-bold' : '' }}">
                Masuk
            </a>
        </li>
        <li class="pb-2">
            <a href="/register"
                class="block px-4 py-2 hover:bg-gray-100 {{ request()->is('register') ? 'bg-gray-100 font-bold' : '' }}">
                Register
            </a>
        </li>
    </ul>

    <script>
        // Toggle mobile menu
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        btn.addEventListener('click', () => {
            const isHidden = menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            btn.setAttribute('aria-expanded', !isHidden);
        });
    </script>
</nav>
