<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="mb-20 min-h-screen" style="background-color: #FDFEFE;">
    @include('components.navbar')

    {{-- Profile Section --}}
    <main class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center gap-6 mb-12 justify-center">
            @guest
                <div class="w-30 h-30 rounded-full overflow-hidden bg-gray-200 flex items-center justify-center">
                    <!-- Heroicon: User -->
                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 19.25a7.25 7.25 0 0115 0v.25a.75.75 0 01-.75.75h-13.5a.75.75 0 01-.75-.75v-.25z" />
                    </svg>
                </div>
                <div class="flex flex-col items-start text-left">
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Guest</h1>
                    <p class="mb-4">-</p>
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-medium transform transition-transform duration-200 hover:scale-105"
                        style="background-color: #DDEDEE; border: 1px solid #DDEDEE; color: #333;">
                        Login
                    </a>
                </div>
            @else
                <div class="w-30 h-30 rounded-full overflow-hidden bg-gray-200">
                    <img src="{{ $user->fotoProfil }}" alt="Profile" class="w-full h-full object-cover" />
                </div>
                <div class="flex flex-col items-start text-left">
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->namaPengguna }}</h1>
                    <p class="mb-4">{{ $user->email }}</p>
                    <a href="#"
                        class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-medium transform transition-transform duration-200 hover:scale-105"
                        style="background-color: #DDEDEE; border: 1px solid #DDEDEE; color: #333;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="black" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.232 5.232l3.536 3.536M16.5 9.75l-9.75 9.75H5.25v-1.5l9.75-9.75z" />
                        </svg>
                        edit profile
                    </a>
                </div>
            @endguest
        </div>
        {{-- Tabs + Content --}}
        <div x-data="{ tab: 'all' }">
            {{-- Tabs --}}
            <div class="flex gap-16 mb-8 justify-center relative">
                <button @click="tab = 'all'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'all' ? 'text-gray-900' : ''">
                    All
                    <div x-show="tab === 'all'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-16"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>

                <button @click="tab = 'berlangsung'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'berlangsung' ? 'text-gray-900' : ''">
                    Berlangsung
                    <div x-show="tab === 'berlangsung'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-36"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>

                <button @click="tab = 'selesai'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'selesai' ? 'text-gray-900' : ''">
                    Selesai
                    <div x-show="tab === 'selesai'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>
                <div class="absolute left-0 w-full h-px bg-[#e5e7eb]" style="bottom: 0; z-index: 0;"></div>
            </div>

            {{-- All --}}
            <div x-show="tab === 'all'" x-transition>
                <div class="space-y-4">
                    @guest
                        <div class="text-center text-gray-400 py-10">Silakan login untuk melihat campaign Anda.</div>
                    @else
                        @forelse ($campaignsAll as $campaign)
                            @include('components.campaignprofile-item', ['campaign' => $campaign])
                        @empty
                            <div class="text-center text-gray-400 py-10">Tidak ada campaign.</div>
                        @endforelse
                    @endguest
                </div>
            </div>

            {{-- Campaign Berlangsung --}}
            <div x-show="tab === 'berlangsung'" x-transition>
                <div class="space-y-4">
                    @guest
                        <div class="text-center text-gray-400 py-10">Silakan login untuk melihat campaign Anda.</div>
                    @else
                        @forelse ($campaignsBerlangsung as $campaign)
                            @include('components.campaignprofile-item', ['campaign' => $campaign])
                        @empty
                            <div class="text-center text-gray-400 py-10">Tidak ada campaign yang sedang berlangsung.</div>
                        @endforelse
                    @endguest
                </div>
            </div>

            {{-- Campaign Selesai --}}
            <div x-show="tab === 'selesai'" x-transition>
                <div class="space-y-4">
                    @guest
                        <div class="text-center text-gray-400 py-10">Silakan login untuk melihat campaign Anda.</div>
                    @else
                        @forelse ($campaignsSelesai as $campaign)
                            @include('components.campaignprofile-item', ['campaign' => $campaign])
                        @empty
                            <div class="text-center text-gray-400 py-10">Tidak ada campaign yang sudah selesai.</div>
                        @endforelse
                    @endguest
                </div>
            </div>
        </div>
    </main>

</body>

</html>
