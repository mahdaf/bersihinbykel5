<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="mb-20 bg-gray-50 min-h-screen">
    @include('components.navbar')

    {{-- Profile Section --}}
    <main class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center gap-6 mb-12 justify-center">
            <div class="w-30 h-30 rounded-full overflow-hidden bg-gray-200">
                <img src="{{ asset('communityprofile.jpeg') }}" alt="Profile" class="w-full h-full object-cover" />
            </div>
            <div class="flex flex-col items-start text-left">
                <h1 class="text-2xl font-bold text-gray-900 mb-1">Bebersih Surabaya</h1>
                <p class="mb-4">bebersih.sby@gmail.com</p>
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
        </div>
        {{-- Tabs + Content --}}
        <div x-data="{ tab: 'all' }">
            {{-- Tabs --}}
            <div class="flex gap-16 mb-8 justify-center">
                <button @click="tab = 'all'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'all' ? 'text-gray-900' : ''">
                    All
                    <div x-show="tab === 'all'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
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
            </div>

            {{-- All Campaigns --}}
            <div x-show="tab === 'all'" x-transition>
                <div class="space-y-4">
                    @foreach ($campaigns as $campaign)
                        @include('components.campaignprofile-item', ['campaign' => $campaign])
                    @endforeach
                </div>
            </div>

            {{-- Campaign Berlangsung --}}
            <div x-show="tab === 'berlangsung'" x-transition>
                <div class="space-y-4">
                    @include('components.campaignprofile-item')
                    @include('components.campaignprofile-item')
                </div>
            </div>

            {{-- Campaign Selesai --}}
            <div x-show="tab === 'selesai'" x-transition>
                <div class="space-y-4">
                    @include('components.campaignprofile-item')
                </div>
            </div>
        </div>
    </main>

</body>

</html>
