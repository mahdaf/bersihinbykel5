<nav class="sticky top-0 bg-white shadow-sm px-12 z-30">
    <div class="container mx-auto px-4 flex items-center justify-between h-28">
        <!-- Logo kiri -->
        <a href="/" class="flex items-center">
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

        <!-- Menu kanan (desktop) -->
        @auth
            <ul id="navbar-menu" class="hidden lg:flex space-x-8 font-light" style="color: #810000;">
                <li>
                    <a href="/dashboard"
                        class="relative px-1 pb-3
        {{ request()->is('dashboard') ? 'text-[#810000] border-b-2 border-[#810000]' : 'text-[#810000] hover:border-b-2 hover:border-[#810000]' }}">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="/profil"
                        class="relative px-1 pb-3
        {{ request()->is('profil') ? 'text-[#810000] border-b-2 border-[#810000]' : 'text-[#810000] hover:border-b-2 hover:border-[#810000]' }}">
                        PROFIL
                    </a>
                </li>
                <li class="relative">
                    <!-- Tombol titik tiga -->
                    <button id="logout-dropdown-btn" class="relative px-1 pb-3 text-[#810000] hover:border-b-2 hover:border-[#810000] flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>

                    <!-- Dropdown konfirmasi logout -->
                    <div id="logout-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                        <div class="p-4">
                            <p class="text-gray-700 text-sm mb-4">Keluar dari akun Anda?</p>
                            <div class="flex space-x-2">
                                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                                    @csrf
                                    <button type="submit" class="w-full px-3 py-2 bg-[#E7424B] text-white text-sm rounded-md hover:bg-[#c7323a] transition">
                                        Log Out
                                    </button>
                                </form>
                                <button id="cancel-logout" class="flex-1 px-3 py-2 bg-gray-200 text-gray-700 text-sm rounded-md hover:bg-gray-300 transition">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        @else
            <ul id="navbar-menu" class="hidden lg:flex space-x-8 font-light">
                <li>
                    <a href="/login"
                        class="relative inline-block px-10 py-2 text-white bg-[#E7424B] border-2 border-[#E7424B] rounded-md hover:bg-[#c7323a] hover:border-[#c7323a] focus:outline-none focus:ring-2 focus:ring-[#E7424B] focus:ring-opacity-50">
                        Masuk
                    </a>
                </li>
                <li>
                    <a href="/register"
                        class="relative inline-block px-10 py-2 text-[#E7424B] border-2 border-[#E7424B] rounded-md hover:bg-[#E7424B] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#E7424B] focus:ring-opacity-50">
                        Daftar
                    </a>
                </li>
            </ul>
        @endauth
    </div>

    <!-- Mobile menu (hidden by default) -->
    @auth
        <ul id="mobile-menu" class="lg:hidden hidden flex-col bg-white border-t border-gray-200">
            <li class="border-b border-gray-200">
                <a href="/dashboard"
                    class="block px-4 py-2 hover:bg-gray-100 {{ request()->is('dashboard') ? 'bg-gray-100 font-bold' : '' }}">
                    HOME
                </a>
            </li>
            <li class="border-b border-gray-200">
                <a href="/profil"
                    class="block px-4 py-2 hover:bg-gray-100 {{ request()->is('profil') ? 'bg-gray-100 font-bold' : '' }}">
                    PROFIL
                </a>
            </li>
            <li class="pb-2">
                <!-- Tombol titik tiga untuk mobile -->
                <button id="mobile-logout-dropdown-btn" class="w-full text-left px-4 py-2 hover:bg-gray-100 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                    Menu
                </button>

                <!-- Dropdown konfirmasi logout untuk mobile -->
                <div id="mobile-logout-dropdown" class="hidden bg-gray-50 border-t border-gray-200">
                    <div class="p-4">
                        <p class="text-gray-700 text-sm mb-4">Keluar dari akun Anda?</p>
                        <div class="flex space-x-2">
                            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full px-3 py-2 bg-[#E7424B] text-white text-sm rounded-md hover:bg-[#c7323a] transition">
                                    Log Out
                                </button>
                            </form>
                            <button id="mobile-cancel-logout" class="flex-1 px-3 py-2 bg-gray-200 text-gray-700 text-sm rounded-md hover:bg-gray-300 transition">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    @else
        <ul id="mobile-menu" class="lg:hidden hidden flex-col bg-white border-t border-gray-200 px-4 py-4 space-y-2">
            <li>
                <a href="/login"
                    class="block w-full px-4 py-2 text-white bg-[#E7424B] border-2 border-[#E7424B] rounded-md text-center hover:bg-[#c7323a] hover:border-[#c7323a] transition">
                    Masuk
                </a>
            </li>
            <li>
                <a href="/register"
                    class="block w-full px-4 py-2 text-[#E7424B] border-2 border-[#E7424B] rounded-md text-center hover:bg-[#E7424B] hover:text-white hover:border-[#c7323a] transition">
                    Daftar
                </a>
            </li>
        </ul>
    @endauth

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

        // Toggle logout dropdown untuk desktop
        const logoutBtn = document.getElementById('logout-dropdown-btn');
        const logoutDropdown = document.getElementById('logout-dropdown');
        const cancelLogout = document.getElementById('cancel-logout');

        logoutBtn.addEventListener('click', () => {
            logoutDropdown.classList.toggle('hidden');
        });

        cancelLogout.addEventListener('click', () => {
            logoutDropdown.classList.add('hidden');
        });

        // Toggle logout dropdown untuk mobile
        const mobileLogoutBtn = document.getElementById('mobile-logout-dropdown-btn');
        const mobileLogoutDropdown = document.getElementById('mobile-logout-dropdown');
        const mobileCancelLogout = document.getElementById('mobile-cancel-logout');

        mobileLogoutBtn.addEventListener('click', () => {
            mobileLogoutDropdown.classList.toggle('hidden');
        });

        mobileCancelLogout.addEventListener('click', () => {
            mobileLogoutDropdown.classList.add('hidden');
        });

        // Tutup dropdown ketika klik di luar
        document.addEventListener('click', (e) => {
            if (!logoutBtn.contains(e.target) && !logoutDropdown.contains(e.target)) {
                logoutDropdown.classList.add('hidden');
            }
            if (!mobileLogoutBtn.contains(e.target) && !mobileLogoutDropdown.contains(e.target)) {
                mobileLogoutDropdown.classList.add('hidden');
            }
        });
    </script>
</nav>
