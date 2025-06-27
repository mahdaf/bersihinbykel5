<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="mb-20" style="background-color: #FDFEFE;">
    @include('components.navbar')

    {{-- Profile Section --}}
    <main class="max-w-4xl mx-auto px-6 py-12">
        <div class="flex items-center gap-6 mb-12 justify-center">
            @guest
                <div class="w-30 h-30 rounded-full overflow-hidden bg-gray-200 flex items-center justify-center">
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
                    <p class="mb-1">{{ $user->email }}</p>
                    <p class="mb-4">{{ $user->nomorTelepon }}</p>
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
        <div x-data="{ tab: 'campaign' }">
            {{-- Tabs --}}
            <div class="flex gap-16 mb-2 justify-center relative">
                <button @click="tab = 'campaign'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'campaign' ? 'text-gray-900' : ''">
                    Campaign
                    <div x-show="tab === 'campaign'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>
                <button @click="tab = 'ditandai'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'ditandai' ? 'text-gray-900' : ''">
                    Ditandai
                    <div x-show="tab === 'ditandai'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-36"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>
                <button @click="tab = 'komentar'"
                    class="relative pb-3 font-medium text-gray-500 hover:text-gray-900 transition-colors"
                    :class="tab === 'komentar' ? 'text-gray-900' : ''">
                    Komentar
                    <div x-show="tab === 'komentar'" x-transition
                        class="absolute bottom-0 left-1/2 -translate-x-1/2 h-[4px] w-24"
                        style="background-color: #CE1212; border-radius: 9999px;">
                    </div>
                </button>
                <div class="absolute left-0 w-full h-px bg-[#e5e7eb]" style="bottom: 0; z-index: 0;"></div>
            </div>

            {{-- Tab Content --}}
            <div class="mt-4">
                <div x-show="tab === 'campaign'">
                    <div class="space-y-4">
                        @forelse ($campaigns as $campaign)
                            @include('components.campaignprofile-item', ['campaign' => $campaign])
                        @empty
                            <div class="text-center text-gray-400 py-10">Belum ada campaign yang kamu ikuti.</div>
                        @endforelse
                    </div>
                </div>
                <div x-show="tab === 'ditandai'">
                    <div class="space-y-4">
                        @forelse ($campaignsDitandai as $campaign)
                            @include('components.campaignprofile-item', ['campaign' => $campaign])
                        @empty
                            <div class="text-center text-gray-400 py-10">Belum ada campaign yang kamu tandai.</div>
                        @endforelse
                    </div>
                </div>
                <div x-show="tab === 'komentar'">
                    {{-- Summary Section --}}
                    <div x-data="{ tab: 'diunggah' }" class="flex flex-col gap-3">
                        <div class="flex">
                            <div class="inline-flex border border-[#e5e7eb] rounded-lg overflow-hidden">
                                <button
                                    :class="tab === 'diunggah'
                                        ?
                                        'bg-[#DDEDEE] text-black' :
                                        'bg-white text-[#b0b0b0] hover:bg-[#f5f5f5]'"
                                    class="px-6 py-2 text-sm font-medium transition focus:outline-none rounded-l-lg"
                                    @click="tab = 'diunggah'">
                                    Diunggah
                                </button>
                                <button
                                    :class="tab === 'disukai'
                                        ?
                                        'bg-[#DDEDEE] text-black' :
                                        'bg-white text-[#b0b0b0] hover:bg-[#f5f5f5]'"
                                    class="px-6 py-2 text-sm font-medium transition focus:outline-none rounded-r-lg"
                                    @click="tab = 'disukai'">
                                    Disukai
                                </button>
                            </div>
                        </div>

                        {{-- Posts --}}
                        <div class="space-y-2" x-show="tab === 'diunggah'">
                            @forelse ($komentarList as $item)
                                @include('components.komentarprofilitem', [
                                    'nama' => $item->nama_campaign,
                                    'waktu' => $item->waktu,
                                    'komentar' => $item->isi_komentar,
                                    'campaign_id' => $item->campaign_id,
                                ])
                            @empty
                                <div class="text-center text-gray-400 py-10">Belum ada komentar diunggah.</div>
                            @endforelse
                        </div>
                        <div class="space-y-6" x-show="tab === 'disukai'">
                            @forelse ($komentarDisukai as $item)
                                @include('components.komentarprofilitem', [
                                    'nama' => $item->nama_campaign,
                                    'waktu' => $item->waktu,
                                    'komentar' => $item->isi_komentar,
                                    'campaign_id' => $item->campaign_id,
                                ])
                            @empty
                                <div class="text-center text-gray-400 py-10">Belum ada komentar disukai.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
