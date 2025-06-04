<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="mb-20">
    @include('components.navbar')

    <div class="min-h-screen bg-[#fcfcfc]">
        <div class="max-w-4xl mx-auto px-6 py-8">
            {{-- Profile Section --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-full overflow-hidden">
                    <img src="{{ asset('images/placeholder.svg') }}" alt="Fulan" class="w-full h-full object-cover" />
                </div>
                <div class="flex-1">
                    <h1 class="text-2xl font-semibold text-[#171717] mb-1">Fulan</h1>
                    <p class="text-[#171717] mb-1">fulan12345@gmail.com</p>
                    <p class="text-[#171717]">081234567890</p>
                </div>
                <button class="bg-[#ddedee] border border-[#ddedee] text-[#171717] hover:bg-[#cdcdcd] px-4 py-2 rounded-md flex items-center">
                    {{-- Ganti icon edit dengan SVG langsung atau gunakan komponen jika pakai Blade Icons --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h3l9-9a1.5 1.5 0 00-2.121-2.121l-9 9v3z" />
                    </svg>
                    edit profile
                </button>
            </div>

            {{-- Tabs --}}
            <div class="flex gap-8 mb-8 border-b border-[#ddedee]">
                <button class="pb-3 text-[#171717] font-medium">Campaign</button>
                <button class="pb-3 text-[#171717] font-medium">Ditandai</button>
                <button class="pb-3 text-[#171717] font-medium border-b-2 border-[#ce1212]">Komentar</button>
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
