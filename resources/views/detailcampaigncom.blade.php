<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>Daur Sampah Yuk - Bersih.in</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Pastikan app.js tidak mengimpor Swiper jika Anda menggunakan CDN di bawah --}}

    {{-- Swiper via CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    {{-- Lucide Icons --}}
    <style>
        /* MODIFIED: Penyesuaian pagination Swiper */
        .mySwiper .swiper-pagination {
            position: relative;
            bottom: auto;
            left: auto;
            width: 100%;
            margin-top: 1rem; /* Jarak dari gambar ke dots */
            text-align: center;
        }

        /* NEW: Styling untuk dot pagination tidak aktif */
        .mySwiper .swiper-pagination-bullet {
            background-color: #FDBA74; /* Tailwind orange-300 (sesuaikan dengan preferensi kuning/oranye muda Anda) */
            opacity: 1; /* Pastikan terlihat jelas */
            width: 8px; /* Ukuran default, bisa disesuaikan */
            height: 8px; /* Ukuran default, bisa disesuaikan */
        }

        /* MODIFIED: Styling untuk dot pagination aktif */
        .mySwiper .swiper-pagination-bullet-active {
            background-color: #F97316; /* Tailwind orange-600 (sesuaikan dengan preferensi oranye Anda) */
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Gambar Campaign -->
            <div>
                <div class="w-full max-w-md mx-auto">
                <!-- Slider container -->
                    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('foto sampah 1.jpg') }}" alt="Slide 1" class="w-full h-72 md:h-96 object-cover" /> {{-- Sedikit menambah tinggi gambar agar lebih proporsional jika lebar --}}
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('foto sampah 2.jpg') }}" alt="Slide 2" class="w-full h-72 md:h-96 object-cover" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('foto sampah 3.jpg') }}" alt="Slide 3" class="w-full h-72 md:h-96 object-cover" />
                                </div>
                            </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <!-- Detail Campaign -->
            <div>
                <p class="text-sm text-gray-500 font-medium">Bebersih Surabaya</p>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Daur Sampah Yuk</h1>
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <span class="mr-4 flex items-center"><i class="far fa-calendar mr-1"></i> 20/04/2024</span>
                    <span class="flex items-center"><i class="far fa-clock mr-1"></i> 09.30 – 18.00</span>
                </div>

                <h2 class="text-base font-semibold text-blue-900">Tentang Campaign</h2>
                <p class="text-sm mt-2 mb-4">Daur sampah yuk adalah campaign tahunan departemen Sistem Informasi ITS untuk membersihkan lingkungan dan limbah yang ada di sekitar kampus.</p>

                <div class="flex mb-4">
                    <div class="mr-8">
                        <p class="font-semibold text-sm mb-1">Partisipan</p>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/men/2.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/women/3.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <span class="ml-2 text-sm text-gray-500">+6</span>
                        </div>
                    </div>

                    <div>
                        <p class="font-semibold text-sm mb-1">Aktivitas</p>
                        <div class="flex items-center">
                            <img src="https://source.unsplash.com/30x30/?recycle" class="w-8 h-8 rounded-md" />
                            <img src="https://source.unsplash.com/30x30/?volunteer" class="w-8 h-8 rounded-md ml-1" />
                            <img src="https://source.unsplash.com/30x30/?clean" class="w-8 h-8 rounded-md ml-1" />
                            <span class="ml-2 text-sm text-gray-500">+2</span>
                        </div>
                    </div>
                </div>

                <button class="bg-red-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                    <a href = "/editcampaign"> 
                        EDIT CAMPAIGN
                    </a>
                </button>

                <div class="mt-8 border-t pt-4">
    <div class="max-w-2xl mx-auto mt-8">
        {{-- Komentar --}}
        <div id="commentsList">
    @foreach($komentar as $k)
        <div class="flex items-center mb-2 mt-2">
            <img src="{{ $k->akun->fotoProfil }}" class="w-10 h-10 rounded-full mr-3">
            <div>
                <p class="font-semibold text-sm">
                    {{ $k->akun?->namaPengguna ?? '-' }}
                </p>
                <p class="text-sm text-gray-700">{{ $k->komentar }}</p>
                @if(auth()->check() && auth()->user()->jenis_akun_id == 2)
                <button
                    type="button"
                    class="like-btn mt-1 text-xs flex items-center gap-1"
                    data-id="{{ $k->id }}"
                    data-liked="{{ $k->likes->contains(auth()->id()) ? '1' : '0' }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $k->likes->contains(auth()->id()) ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5 4.5 0 010-6.364z" />
                    </svg>
                    <span class="like-count">{{ $k->likes->count() }}</span>
                </button>
                @endif
            </div>
        </div>
    @endforeach
</div>
    </div>
</div>

    <!-- Font Awesome CDN buat icon kalender & jam -->
<script>
function timeAgo(date) {
    const now = new Date();
    const seconds = Math.floor((now - date) / 1000);
    if (seconds < 60) return "baru saja";
    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return `${minutes} menit`;
    const hours = Math.floor(minutes / 60);
    if (hours < 24) return `${hours} jam`;
    const days = Math.floor(hours / 24);
    return `${days} hari`;
}

</script>
<script>
document.querySelectorAll('.like-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const komentarId = btn.getAttribute('data-id');
        fetch(`/komentar/${komentarId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                role: '{{ auth()->user()->jenis_akun_id == 2 ? "komunitas" : "volunteer" }}'
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const svg = btn.querySelector('svg');
                svg.setAttribute('fill', data.liked ? 'red' : 'none');
                btn.setAttribute('data-liked', data.liked ? '1' : '0');
                btn.querySelector('.like-count').textContent = data.count;
            } else {
                alert(data.message || 'Tidak bisa like komentar.');
            }
        });
    });
});
</script>
</body>
</html>