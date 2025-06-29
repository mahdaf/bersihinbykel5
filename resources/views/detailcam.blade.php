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
        @if(is_null($campaign->nama))
            <div class="flex flex-col items-center justify-center min-h-[300px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 7H7a2 2 0 01-2-2V7a2 2 0 012-2h5l2 2h5a2 2 0 012 2v10a2 2 0 01-2 2z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">Campaign telah dihapus</h2>
                <p class="text-gray-500">Campaign ini sudah tidak tersedia.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <!-- Kolom kiri: Swiper + pagination -->
                <div>
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
                    <p class="font-semibold mt-8 text-[16px]">Tentang Campaign</p>
                    <p class="text-600 mt-2 text-[16px]">{{ $campaign->deskripsi }}</p>
                    <p class="font-semibold mt-4 text-[16px]">Partisipan</p>
                    <div class="flex items-center mt-2 min-h-[40px]">
                        @if($campaign->partisipanCampaigns->count() === 0)
                            <span class="text-gray-400 text-sm">Belum ada partisipan</span>
                        @else
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
                        @endif
                    </div>
                    <!-- Button Ikuti Campaign -->
                    @php
                        $user = auth()->user();
                        $sudahTerdaftar = false;
                        if ($user && $user->jenis_akun_id == 1) {
                            $sudahTerdaftar = \DB::table('partisipan_campaign')
                                ->where('akun_id', $user->id)
                                ->where('campaign_id', $campaign->id)
                                ->exists();
                        }
                    @endphp

                    @if($user && $user->jenis_akun_id == 1)
                        @if($sudahTerdaftar)
                            <button
                                class="mt-6 inline-block px-6 py-3 bg-green-500 text-white rounded-3xl shadow cursor-not-allowed"
                                disabled
                            >
                                TERDAFTAR
                            </button>
                        @else
                            <a
                                href="{{ route('partisipan.create', $campaign->id) }}"
                                class="mt-6 inline-block px-6 py-3 bg-[#810000] hover:bg-yellow-600 text-white rounded-3xl shadow transition-colors duration-200 focus:outline-none"
                            >
                                IKUTI CAMPAIGN
                            </a>
                        @endif
                    @elseif($user && $user->jenis_akun_id == 2)
                        <button
                            class="mt-6 inline-block px-6 py-3 bg-gray-400 text-white rounded-3xl shadow cursor-not-allowed"
                            disabled
                            title="Akun komunitas tidak bisa mengikuti campaign"
                        >
                            IKUTI CAMPAIGN
                        </button>
                    @endif
                    
                </div>
            </div>
        @endif

        {{-- Komentar --}}
        <div class="mt-8 border border-gray-200 rounded-xl p-4">
            {{-- Form Komentar --}}
            @if(auth()->check())
                <form id="commentForm" class="flex items-center gap-3 mb-4" method="POST" action="{{ route('komentar.store', $campaign->id) }}">
                    @csrf
                    <img src="{{ filter_var(auth()->user()->fotoProfil, FILTER_VALIDATE_URL) ? auth()->user()->fotoProfil : asset('storage/' . auth()->user()->fotoProfil) }}" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <div class="font-semibold text-sm mb-1">{{ auth()->user()->namaPengguna }}</div>
                        <input
                            id="commentInput"
                            name="komentar"
                            type="text"
                            class="w-full border-0 border-b border-gray-300 rounded-none px-0 py-2 text-sm focus:outline-none focus:ring-0 focus:border-[#810000]"
                            placeholder="Tulis komentar kamu..."
                            autocomplete="off"
                            maxlength="280"
                            required
                        >
                    </div>
                    <button type="submit" class="bg-[#810000] text-white px-4 py-2 rounded-md hover:bg-red-800 transition">
                        Kirim
                    </button>
                </form>
            @endif
            </div>
        </div>
        <div class= "mx-14">
            <h3 class="font-semibold text-lg mb-4 text-gray-700">Komentar</h3>
            <x-list-komentar :komentar="$komentar" />
        </div>


        <script>
function updateLikeBtn(btn, liked, count) {
    const svg = btn.querySelector('svg');
    svg.setAttribute('fill', liked ? 'red' : 'none');
    svg.setAttribute('stroke', liked ? 'red' : '#171717');
    btn.setAttribute('data-liked', liked ? '1' : '0');
    btn.querySelector('.like-count').textContent = count;
}

document.addEventListener('DOMContentLoaded', function() {
    // AJAX untuk submit komentar
    const form = document.getElementById('commentForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const input = document.getElementById('commentInput');
            const komentar = input.value.trim();
            if (!komentar) return;

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ komentar })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const list = document.getElementById('commentsList');
                    const html = `
                        <div class="flex items-start mb-4">
                            <img src="${data.komentar.avatar ? data.komentar.avatar : '{{ asset('default-profile.png') }}'}" class="w-10 h-10 rounded-full mr-3" alt="Avatar">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-sm">${data.komentar.user}</span>
                                    <span class="text-xs text-gray-400">• ${data.komentar.updated_at}</span>
                                </div>
                                <div class="text-sm text-gray-700 mb-1">${data.komentar.komentar}</div>
                                <button
                                    type="button"
                                    class="like-btn mt-1 text-xs flex items-center gap-1"
                                    data-id="${data.komentar.id}"
                                    data-liked="0"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 24 24"
                                         class="w-5 h-5 transition-colors duration-200"
                                         fill="none"
                                         stroke="#171717"
                                         stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                                    </svg>
                                    <span class="like-count text-[#171717]-400">0</span>
                                </button>
                            </div>
                        </div>
                    `;
                    list.insertAdjacentHTML('afterbegin', html);
                    input.value = '';
                } else {
                    alert('Gagal menambah komentar.');
                }
            });
        });
    }

    // EVENT DELEGATION UNTUK LIKE
    document.getElementById('commentsList').addEventListener('click', function(e) {
        const btn = e.target.closest('.like-btn');
        if (!btn) return;
        const komentarId = btn.getAttribute('data-id');
        fetch(`/komentar/${komentarId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                updateLikeBtn(btn, data.liked, data.count);
            } else {
                alert(data.message || 'Tidak bisa like komentar.');
            }
        });
    });
});
</script>
    </div>
</body>

</html>
