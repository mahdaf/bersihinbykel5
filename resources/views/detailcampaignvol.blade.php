<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bersih.in</title>
    @vite(['resources/css/app.css'])

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
    <style>
        .mySwiper .swiper-pagination {
            position: relative;
            bottom: auto;
            left: auto;
            width: 100%;
            margin-top: 1rem;
            text-align: center;
        }
        .mySwiper .swiper-pagination-bullet {
            background-color: #FDBA74;
            opacity: 1;
            width: 8px;
            height: 8px;
        }
        .mySwiper .swiper-pagination-bullet-active {
            background-color: #F97316;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-2 gap-8">

            <!-- Gambar Campaign -->
            <div>
                <div class="w-full max-w-md mx-auto">
                    <!-- Slider container -->
                    <div class="swiper mySwiper rounded-xl overflow-hidden">
                        <div class="swiper-wrapper">
                            {{-- 
                                Jika ada field gambar di DB, bisa loop disini.
                                Contoh:
                                @foreach($campaign->gambar as $img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/'.$img) }}" alt="Gambar Campaign" class="w-full h-72 md:h-96 object-cover" />
                                    </div>
                                @endforeach
                            --}}
                            <div class="swiper-slide">
                                <img src="{{ asset('foto sampah 1.jpg') }}" alt="Slide 1" class="w-full h-72 md:h-96 object-cover" />
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
                <p class="text-sm text-gray-500 font-medium">
                    {{ $campaign->akun->nama ?? 'Tanpa Nama Akun' }}
                </p>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    {{ $campaign->nama }}
                </h1>
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <span class="mr-4 flex items-center">
                        <i class="far fa-calendar mr-1"></i>
                        {{ \Carbon\Carbon::parse($campaign->waktu)->format('d/m/Y') }}
                    </span>
                    <span class="flex items-center">
                        <i class="far fa-clock mr-1"></i>
                        {{ \Carbon\Carbon::parse($campaign->waktu)->format('H.i') }} – 
                        {{ \Carbon\Carbon::parse($campaign->waktu_diperbarui)->format('H.i') }}
                    </span>
                </div>

                <h2 class="text-base font-semibold text-blue-900">Tentang Campaign</h2>
                <p class="text-sm mt-2 mb-4">{{ $campaign->deskripsi }}</p>

                <div class="flex mb-4">
                    <div class="mr-8">
                        <p class="font-semibold text-sm mb-1">Kuota Partisipan</p>
                        <span class="ml-2 text-sm text-gray-500">{{ $campaign->kuota_partisipan }} orang</span>
                    </div>
                    <div>
                        <p class="font-semibold text-sm mb-1">Lokasi</p>
                        <span class="ml-2 text-sm text-gray-500">{{ $campaign->lokasi }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-2">Kontak: {{ $campaign->kontak }}</p>

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
                    <div id="commentsList"></div>
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
            time: new Date(Date.now() - 2*86400000).toISOString(),
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

    setInterval(() => {
        document.querySelectorAll('.comment-time').forEach(span => {
            const t = span.getAttribute('data-time');
            span.textContent = timeAgo(new Date(t));
        });
    }, 30000);
    </script>
</body>
</html>