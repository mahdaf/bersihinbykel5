<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bersih.in</title>
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
                 <div class="w-full max-w-2xl mx-auto">
                <!-- Slider container -->
                    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg h-80 md:h-[32rem]">
                        <div class="swiper-wrapper">
                            @foreach($campaign->gambar_campaign as $gambar)
                            <div class="swiper-slide">
                                <img src="{{ $gambar->gambar }}" alt="Gambar Campaign" class="w-full h-full object-cover" />
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <!-- Detail Campaign -->
            <div>
                <p class="text-sm text-gray-500 font-medium">{{ $campaign->lokasi }}</p>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $campaign->nama }}</h1>
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <span class="mr-4 flex items-center"><i class="far fa-calendar mr-1"></i> {{ \Carbon\Carbon::parse($campaign->waktu)->format('d/m/Y') }}</span>
                    <span class="flex items-center"><i class="far fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($campaign->waktu)->format('H.i') }} – {{ \Carbon\Carbon::parse($campaign->waktu)->addHours(8)->format('H.i') }}</span>
                </div>

                <h2 class="text-base font-semibold text-blue-900">Tentang Campaign</h2>
                <p class="text-sm mt-2 mb-4">{{ $campaign->deskripsi }}</p>

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

                <button onclick="toggleModal()" class="bg-red-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                IKUTI CAMPAIGN
                </button>

                                <!-- Modal Pendaftaran Campaign -->
                <div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-3xl p-8 w-full max-w-md relative shadow-2xl">
                        <!-- Tombol Close -->
                        <button onclick="toggleModal()" class="absolute top-4 right-4 text-gray-600 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>

                        <!-- Form -->
                        <h2 class="text-xl font-bold text-[#55a7aa] mb-6 text-center">Form Pendaftaran Campaign</h2>
                        <form>
                            <input type="text" placeholder="Nama Lengkap"
                                class="w-full mb-3 p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />

                            <input type="email" placeholder="Email"
                                class="w-full mb-3 p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />

                            <div class="flex gap-2 mb-3">
                                <button type="button" class="bg-[#55a7aa] text-white px-4 rounded-2xl text-lg">+62</button>
                                <input type="text" placeholder="Nomor Ponsel"
                                    class="w-full p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />
                            </div>

                            <div class="mb-4">
                                <label class="text-[#55a7aa] text-lg font-medium block mb-2">Upload KTP</label>
                                <input type="file" class="w-full text-[#55a7aa] bg-[#ddedee] rounded-2xl p-3" />
                            </div>

                            <button type="submit"
                                    class="w-full bg-[#810000] hover:bg-[#810000]/90 text-white py-3 rounded-2xl text-lg font-medium">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-8 border-t pt-4">
                    <div id="commentsList">
                    @foreach($komentar as $k)
                        <div class="flex items-center mb-2 mt-2">
        <img src="{{ $k->akun->fotoProfil }}" class="w-10 h-10 rounded-full mr-3">
        <div>
            <p class="font-semibold text-sm">
                {{ $k->akun?->namaPengguna ?? '-' }}
            </p>
            <p class="text-sm text-gray-700">{{ $k->komentar }}</p>
            @if(auth()->check() && in_array(auth()->user()->jenis_akun_id, [1,2]))
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
                    
                    <!-- Form Komentar Baru -->
                    <form id="commentForm" class="flex items-start gap-2 mt-4">
                        <img src="{{ $user->fotoProfil }}" class="w-10 h-10 rounded-full mt-1">
                        <div class="flex-1">
                            <input
                                id="commentInput"
                                type="text"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-200"
                                placeholder="Isi komentar kamu..."
                                autocomplete="off"
                                required
                            >
                        </div>
                        <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                            Kirim
                        </button>
                    </form>
                    <script>
document.getElementById('commentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const input = document.getElementById('commentInput');
    const text = input.value.trim();
    if (!text) return;

    fetch('{{ route('komentar.store', $campaign->id) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ komentar: text })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            input.value = '';
            location.reload(); // Tambahkan baris ini
        } else {
            // Tampilkan pesan error jika perlu
        }
    });
});
</script>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome CDN buat icon kalender & jam -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
    function toggleModal() {
        const modal = document.getElementById("popupModal");
        modal.classList.toggle("hidden");
    }

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



    function renderComments() {
        const list = document.getElementById('commentsList');
        let html = "";
        comments.forEach((c, i) => {
            html += `
            <div class="flex items-center mb-2 mt-2">
                <img src="${c.avatar}" class="w-10 h-10 rounded-full mr-3">
                <div>
                    <p class="font-semibold text-sm">${c.user} <span class="text-xs text-gray-500">• <span class="comment-time" data-time="${c.time}">${timeAgo(new Date(c.time))}</span></span></p>
                    <p class="text-sm text-gray-700">${c.text}</p>
                    <button type="button" class="like-btn mt-1 text-xs flex items-center gap-1" data-index="${i}">
                        <span class="heart-icon ${c.liked ? 'text-red-600' : 'text-gray-400'} transition-colors">&#10084;</span>
                        <span class="like-count">${c.likes}</span>
                    </button>
                </div>
            </div>
            `;
        });
        list.innerHTML = html;

        // Event listener untuk like
        document.querySelectorAll('.like-btn').forEach(btn => {
            btn.onclick = function() {
                const idx = +btn.getAttribute('data-index');
                if (!comments[idx].liked) {
                    comments[idx].likes += 1;
                    comments[idx].liked = true;
                } else {
                    comments[idx].likes -= 1;
                    comments[idx].liked = false;
                }
                renderComments();
            }
        });
    }

    // Submit handler untuk form komentar
    document.getElementById('commentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const input = document.getElementById('commentInput');
        const text = input.value.trim();
        if (!text) return;
        comments.unshift({
            user: "kamu",
            avatar: "https://randomuser.me/api/portraits/men/11.jpg",
            text,
            time: new Date().toISOString(),
            likes: 0,
            liked: false
        });
        renderComments();
        input.value = '';
    });

    renderComments();

    // Update waktu setiap 30 detik
    setInterval(() => {
        document.querySelectorAll('.comment-time').forEach(span => {
            const t = span.getAttribute('data-time');
            span.textContent = timeAgo(new Date(t));
        });
    }, 30000);

    var swiper = new Swiper('.mySwiper', {
        loop: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: false
        },
        watchOverflow: false,
    });
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