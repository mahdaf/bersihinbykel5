<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Campaign</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="mb-20 bg-white">

    @include('components.navbar')

    
@php
    use Carbon\Carbon;
    // Cek apakah campaign sudah di-bookmark user
    $sudahBookmark = \DB::table('campaign_ditandai')
        ->where('akun_id', auth()->id())
        ->where('campaign_id', $campaign->id)
        ->exists();
@endphp

    <div class="max-w-7xl mx-auto px-14 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <!-- Kolom kiri: Swiper + pagination -->
            <div class= "mt-10">
                <x-swiper-gallery :gambar="$campaign->gambar_campaign" />
                <p class="text-600 font-semibold mt-2">Lokasi Campaign</p>
                <p class="flex items-center text-gray-500 mt-2 text-[16px]">
                    <!-- Ikon Lokasi -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 21c-4.418 0-8-5.373-8-10a8 8 0 1 1 16 0c0 4.627-3.582 10-8 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    {{ $campaign->lokasi ?? '-' }}
                </p>

            </div>
            <!-- Kolom kanan: Judul campaign -->
            <div>
                <div class="flex items-center mt-2 gap-4 justify-end">
                    <!-- Edit -->
                    <a href="{{ route('editcampaign', $campaign->id) }}" title="Edit Campaign">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                            viewBox="0 0 24 24" stroke="#810000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                            <path d="M13.5 6.5l4 4" />
                        </svg>
                    </a>
                    <!-- Hapus -->
                    <button type="button" title="Hapus Campaign" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                            viewBox="0 0 24 24" stroke="#810000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </button>
                </div>
                <div class="flex items-center mb-2">
                    @if($campaign->akun && $campaign->akun->fotoProfil)
                        <img
                            src="{{ filter_var($campaign->akun->fotoProfil, FILTER_VALIDATE_URL)
                                ? $campaign->akun->fotoProfil
                                : asset('storage/' . $campaign->akun->fotoProfil) }}"
                            class="w-7 h-7 rounded-full"
                            alt="{{ $campaign->akun->namaPengguna }}"
                        />
                    @else
                        <img src="{{ asset('default-profile.png') }}" class="w-7 h-7 rounded-full" alt="Default Profile"/>
                    @endif
                    <p class="text-600 text-[18px] ml-5">{{ $campaign->akun->namaPengguna ?? '-' }}</p>

                </div>
                <div x-data="{
        bookmarked: {{ $sudahBookmark ? 'true' : 'false' }},
        showSuccess: false,
        toggleBookmark() {
            fetch(this.bookmarked ? '{{ route('campaign.unbookmark', $campaign->id) }}' : '{{ route('campaign.bookmark', $campaign->id) }}', {
                method: this.bookmarked ? 'DELETE' : 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(res => {
                if(res.ok) {
                    this.bookmarked = !this.bookmarked;
                    this.showSuccess = true;
                    setTimeout(() => this.showSuccess = false, 3000);
                }
            });
        }
    }" class="relative flex items-center gap-4 mb-2">
                    <h1 class="text-3xl font-bold text-gray-800 leading-snug flex-1 break-words">
                        {{ $campaign->nama }}
                    </h1>
                    <button
                        type="button"
                        class="focus:outline-none"
                        @click="toggleBookmark"
                        :title="bookmarked ? 'Hapus Bookmark' : 'Bookmark'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                             :fill="bookmarked ? 'currentColor' : 'none'"
                             class="h-10 w-10 text-black transition-colors duration-200"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16l-7-4-7 4V5z"/>
                        </svg>
                    </button>
                    <!-- Popup sukses -->
                    <div x-show="showSuccess" x-transition
                         class="absolute top-12 right-0 bg-green-500 text-white px-4 py-2 rounded shadow text-sm"
                         x-cloak>
                        <span x-text="bookmarked ? 'Berhasil ditambahkan ke favorit!' : 'Berhasil dihapus dari favorit!'"></span>
                    </div>
                </div>
                <div class="flex items-center text-[18px] text-600 mb-2 gap-6">
                    <span class="flex items-center">
                        <!-- Ikon Kalender -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-black" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke-width="2" stroke="currentColor"
                                fill="none" />
                            <path d="M16 2v4M8 2v4M3 10h18" stroke-width="2" stroke="currentColor" />
                        </svg>
                        {{ Carbon::parse($campaign->waktu)->format('d/m/Y') }}
                    </span>
                    <span class="flex items-center">
                        <!-- Ikon Jam -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-black" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none" />
                            <path d="M12 6v6l4 2" stroke-width="2" stroke="currentColor" />
                        </svg>
                        {{ Carbon::parse($campaign->waktu)->format('H.i') }}
                    </span>
                </div>
                <p class="font-semibold mt-8 text-[16px]">TENTANG CAMPAIGN</p>
                <p class="text-600 mt-2 text-[16px]">{{ $campaign->deskripsi }}</p>
                <p class="font-semibold mt-4 text-[16px]">PARTISIPAN</p>
                <div class="flex items-center mt-2">
                    @foreach($campaign->partisipanCampaigns->take(3) as $partisipan)
                        @if($partisipan->akun && $partisipan->akun->fotoProfil)
                            <img
                                src="{{ filter_var($partisipan->akun->fotoProfil, FILTER_VALIDATE_URL)
                                    ? $partisipan->akun->fotoProfil
                                    : asset('storage/' . $partisipan->akun->fotoProfil) }}"
                                class="w-8 h-8 rounded-full border-2 border-white shadow -ml-2"
                                title="{{ $partisipan->nama }}"
                            />
                        @endif
                    @endforeach
                    @if($campaign->partisipanCampaigns->count() > 3)
                        <span class="ml-2 text-sm text-gray-500">
                            +{{ $campaign->partisipanCampaigns->count() - 3 }}
                        </span>
                    @endif
                </div>
                <!-- Button Ikuti Campaign -->
                <a
                    href="{{ route('partisipan.create', $campaign->id) }}"
                    class="mt-6 inline-block px-6 py-3 bg-[#810000] hover:bg-yellow-600 text-white rounded-3xl shadow transition-colors duration-200 focus:outline-none"
                >
                    IKUTI CAMPAIGN
                </a>
                
            </div>
        </div>
    </div>
</body>

</html>
