<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="mb-20">
    @include('components.navbar')

    {{-- Profile Section --}}
    <main class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center gap-6 mb-12 justify-center">
            <div class="w-30 h-30 rounded-full overflow-hidden bg-gray-200">
                <img src="{{ asset('communityprofile.jpeg') }}" alt="Profile" class="w-full h-full object-cover" />
            </div>
            <div class="flex flex-col items-start text-left">
                <h1 class="text-2xl font-bold text-gray-900 mb-1">Fulan</h1>
                <p class="mb-1">fulan12345@gmail.com</p>
                <p class="mb-4">081234567890</p>
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
                    Campaign
                    <div x-show="tab === 'all'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>

                <button @click="tab = 'berlangsung'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'berlangsung' ? 'text-gray-900' : ''">
                    Ditandai
                    <div x-show="tab === 'berlangsung'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-36"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>

                <button @click="tab = 'selesai'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'selesai' ? 'text-gray-900' : ''">
                    Komentar
                    <div x-show="tab === 'selesai'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>
            </div>

{{-- Summary Section --}}
<div x-data="{ tab: 'diunggah' }" class="flex flex-col gap-6 mb-8">
    <div class="flex flex-row gap-4">
        <button
            :class="tab === 'diunggah' ? 'bg-[#ddedee] text-[#171717]' : 'bg-white border border-[#ddedee] text-[#171717]'"
            class="flex-1 rounded-lg p-4 text-center font-medium transition"
            @click="tab = 'diunggah'">
            Diunggah
        </button>
        <button
            :class="tab === 'disukai' ? 'bg-[#ddedee] text-[#171717]' : 'bg-white border border-[#ddedee] text-[#171717]'"
            class="flex-1 rounded-lg p-4 text-center font-medium transition"
            @click="tab = 'disukai'">
            Disukai
        </button>
    </div>

    {{-- Posts --}}
    <div class="space-y-6" x-show="tab === 'diunggah'">
        @foreach ([
            'Senang banget bisa ikut kegiatan bersih-bersih hari ini. Awalnya ragu karena capek setelah kuliah, tapi ternyata suasananya seru dan rame, jadi semangat lagi. Bisa kenalan sama orang baru juga, ngobrol-ngobrol sambil mungutin sampah tuh ada vibes healing-nya.',
            'Hore bisa ikut bersih2, sangat mantap',
            'Aku suka dengan campaign hari ini, karena membuat saya bisa kenal lebih banyak orang baru.'
        ] as $content)
            <div class="bg-white rounded-lg border border-[#ddedee] p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center bg-[#810000] text-white text-sm px-2 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Daur Sampah Yuk
                    </span>
                </div>
                <p class="text-sm text-[#b0b0b0] mb-3">Senin, 12 Maret 2025</p>
                <p class="text-[#171717] leading-relaxed">{{ $content }}</p>
            </div>
        @endforeach
    </div>
    <div class="space-y-6" x-show="tab === 'disukai'">
        @foreach ([
            'Postingan yang saya sukai 1',
            'Postingan yang saya sukai 2'
        ] as $content)
            <div class="bg-white rounded-lg border border-[#ddedee] p-6">
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center bg-[#810000] text-white text-sm px-2 py-1 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Daur Sampah Yuk
                    </span>
                </div>
                <p class="text-sm text-[#b0b0b0] mb-3">Senin, 12 Maret 2025</p>
                <p class="text-[#171717] leading-relaxed">{{ $content }}</p>
            </div>
        @endforeach
    </div>
</div>
</body>

</html>
