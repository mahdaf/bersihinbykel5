<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daur Sampah Yuk - Bersih.in</title>
    @vite(['resources/css/app.css']) {{-- Pastikan app.js tidak mengimpor Swiper jika Anda menggunakan CDN di bawah --}}

    {{-- Swiper via CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySwiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        });
    });
    </script>

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

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Gambar Campaign -->
            <div>
                 <div class="w-full max-w-2xl mx-auto">
                <!-- Slider container -->
                    <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg h-80 md:h-[32rem]">
                        <div class="swiper-wrapper">
                            @foreach($campaign->gambar_campaign as $gambar)
                            <div class="swiper-slide">
                                @php
                                    $isUrl = filter_var($gambar->gambar, FILTER_VALIDATE_URL);
                                    $src = $isUrl ? $gambar->gambar : asset('storage/' . $gambar->gambar);
                                @endphp
                                <img src="{{ $src }}" alt="Gambar Campaign" class="w-full h-full object-cover" />
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
                    <span class="flex items-center"><i class="far fa-clock mr-1"></i> {{ \Carbon\Carbon::parse($campaign->waktu)->format('H.i') }} – Selesai</span>
                </div>

                @php
                    // Cek apakah campaign sudah di-bookmark user
                    $sudahBookmark = \DB::table('campaign_ditandai')
                        ->where('akun_id', auth()->id())
                        ->where('campaign_id', $campaign->id)
                        ->exists();
                @endphp

                <div class="row align-items-center mb-3">
                    <div class="col-auto flex gap-2">
                        @if($sudahBookmark)
                            <form action="{{ route('campaign.unbookmark', $campaign->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark cursor-pointer" title="Hapus Bookmark">
                                    <i class="bi bi-bookmark-fill"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('campaign.bookmark', $campaign->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary cursor-pointer" title="Bookmark">
                                    <i class="bi bi-bookmark"></i>
                                </button>
                            </form>
                        @endif

                        <form action="{{ route('campaign.nullify', $campaign->id) }}" method="POST" onsubmit="return confirm('Yakin ingin mengosongkan semua data campaign ini?');">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger cursor-pointer" title="Null-kan Data Campaign">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col">
                        <h5 class="mb-0">Tentang Campaign</h5>
                    </div>
                </div>

                <p class="text-sm mt-2 mb-4">{{ $campaign->deskripsi }}</p>

                <div class="flex mb-4">

                    <div class="mr-8">
                        <p class="font-semibold text-sm mb-1">Partisipan</p>
                        <div class="flex items-center">
                            <!-- Static -->
                            <!-- <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/men/2.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/women/3.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <span class="ml-2 text-sm text-gray-500">+6</span> -->

                            <!-- Dynamic -->
                            @foreach($campaign->partisipanCampaigns as $partisipan)
                                @break($loop->index >= 3)
                                @if($partisipan->akun && $partisipan->akun->fotoProfil)
                                    <img
                                        src="{{ filter_var($partisipan->akun->fotoProfil, FILTER_VALIDATE_URL)
                                            ? $partisipan->akun->fotoProfil
                                            : asset('storage/' . $partisipan->akun->fotoProfil) }}"
                                        class="w-8 h-8 rounded-full border-2 border-white -ml-2"
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
                    </div>

                    <!-- <div>
                        <p class="font-semibold text-sm mb-1">Aktivitas</p>
                        <div class="flex items-center">
                            <img src="https://source.unsplash.com/30x30/?recycle" class="w-8 h-8 rounded-md" />
                            <img src="https://source.unsplash.com/30x30/?volunteer" class="w-8 h-8 rounded-md ml-1" />
                            <img src="https://source.unsplash.com/30x30/?clean" class="w-8 h-8 rounded-md ml-1" />
                            <span class="ml-2 text-sm text-gray-500">+2</span>
                        </div>
                    </div> -->
                </div>

                <a href="{{ route('partisipan.create', $campaign->id) }}"
                   class="bg-red-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-red-800 transition block text-center w-full md:w-auto">
                    IKUTI CAMPAIGN
                </a>

                <div class="mt-8 border-t pt-4">
                    <div id="commentsList">
                    </div>

                    <!-- Form Komentar Baru -->
                    <form id="commentForm" class="flex items-start gap-2 mt-4">
                        <img src="https://randomuser.me/api/portraits/men/11.jpg" class="w-10 h-10 rounded-full mt-1">
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

    const comments = [
        {
            user: "landakberduri",
            avatar: "https://randomuser.me/api/portraits/men/10.jpg",
            text: "Baru sadar, ternyata kegiatan campaign itu penting banget untuk ngejadiin lingkungan sekitar lebih aware terhadap kebersihan lingkungan",
            time: new Date(Date.now() - 86400000).toISOString(),
            likes: 530,
            liked: false
        },
        {
            user: "sukamakancoklat",
            avatar: "https://randomuser.me/api/portraits/women/12.jpg",
            text: "Keren banget acaranya! Semoga makin banyak yang peduli lingkungan.",
            time: new Date(Date.now() - 2*86400000).toISOString(), // 2 hari lalu
            likes: 120,
            liked: false
        }
    ];

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

</body>
</html>
