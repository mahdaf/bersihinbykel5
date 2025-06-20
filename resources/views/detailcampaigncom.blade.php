<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daur Sampah Yuk - Bersih.in</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        /* MODIFIED: Penyesuaian pagination Swiper */
        .mySwiper .swiper-pagination {
            position: relative;
            bottom: auto;
            left: auto;
            width: 100%;
            margin-top: 1rem;
            text-align: center;
        }

        /* NEW: Styling untuk dot pagination tidak aktif */
        .mySwiper  .swiper-pagination-bullet {
            background-color: #d8d2f0;
            opacity: 1;
        }

        .mySwiper .swiper-pagination-bullet-active {
            background-color: #e4b100;
        }

        /* Style untuk dropdown delete */
        .delete-dropdown {
            position: relative;
            display: inline-block;
        }

        .delete-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
            overflow: hidden;
        }

        .delete-dropdown-content a {
            color: #333;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            text-align: left;
        }

        .delete-dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .delete-dropdown:hover .delete-dropdown-content {
            display: block;
        }

        .delete-option {
            color: #e53e3e;
        }

        .delete-option:hover {
            background-color: #fee2e2 !important;
        }

        .bookmark-btn {
            color: #4a5565; /* abu-abu gelap */
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            transition: color 0.2s;
        }

        .bookmark-btn:hover {
            color: #e4b100; /* yellow-500 */
        }

        .bookmark-btn.active {
            color: #e4b100; /* yellow-500 */
        }

        .bookmark-btn svg {
            transition: fill 0.2s, stroke 0.2s;
            fill: none;
            stroke: #4a5565;
        }

        .bookmark-btn:hover svg {
            fill: none; /* Tidak ada fill saat hover */
            stroke: #4a5565; /* Outline kuning saat hover */
        }

        .bookmark-btn.active svg {
            fill: #4a5565;   /* Fill abu-abu saat aktif */
            stroke: #4a5565;
        }

        .bookmark-btn.active:hover svg {
            fill: #4a5565;   /* Tetap fill abu-abu saat aktif+hover */
            stroke: #4a5565; /* Outline kuning saat aktif+hover */
        }

        .action-buttons {
            display: flex;
            align-items: center;
        }
        .clicked {
            background-color: green;
        }
    </style>

    <script>
        const button = document.getElementById("myButton");
        button.addEventListener("click", function () {
            button.classList.toggle("clicked");
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookmarkBtn = document.getElementById('bookmarkBtn');
            const bookmarkIcon = document.getElementById('bookmarkIcon');

            bookmarkBtn.addEventListener('click', function () {
                bookmarkBtn.classList.toggle('active');
                const isActive = bookmarkBtn.classList.contains('active');
                bookmarkBtn.setAttribute('aria-pressed', isActive);

                // Ubah SVG fill dan stroke sesuai status
                if (isActive) {
                    bookmarkIcon.setAttribute('fill', '#e4b100');
                    bookmarkIcon.setAttribute('stroke', '#e4b100');
                } else {
                    bookmarkIcon.setAttribute('fill', 'none');
                    bookmarkIcon.setAttribute('stroke', 'currentColor');
                }
            });
        });
    </script>
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Gambar Campaign -->
            <div>
                <div class="w-full max-w-md mx-auto">
                    <div class="swiper mySwiper rounded-xl overflow-hidden">
                        <div class="swiper-wrapper">
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
                <div class="flex items-center justify-between mb-1">
                    <p class="text-sm text-gray-500 font-medium">Bebersih Surabaya</p>

                    <!-- Delete dropdown button -->
                    <div class="delete-dropdown">

                        <button class="text-gray-500 hover:text-red-600 transition" title="Delete Campaign">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </button>
                        <div class="delete-dropdown-content">
                            <a href="/hapuscampaign" class="delete-option">Hapus Campaign</a>
                            <a href="#" onclick="event.preventDefault(); document.querySelector('.delete-dropdown-content').style.display='none';">Batal</a>
                        </div>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-2">Daur Sampah Yuk
                <button id="bookmarkBtn" class="bookmark-btn" title="Bookmark Campaign" aria-pressed="false">
                    <svg id="bookmarkIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="#4a5565" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                </button>
                </h1>

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
                            <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/men/2.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <img src="https://randomuser.me/api/portraits/women/3.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-2" />
                            <span class="ml-2 text-sm text-gray-500">+2</span>
                        </div>
                    </div>
                </div>

                <button class="bg-red-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-red-800 transition">
                    <a href="/editcampaign">
                        EDIT CAMPAIGN
                    </a>
                </button>

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

const comments = [
    {
        user: "landakberduri",
        avatar: "https://randomuser.me/api/portraits/men/10.jpg",
        text: "Baru sadar, ternyata kegiatan campaign itu penting banget untuk ngejadiin lingkungan sekitar lebih aware terhadap kebersihan lingkungan",
        time: new Date(Date.now() - 86400000).toISOString(), // 1 hari lalu
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

renderComments();

// Update waktu setiap 30 detik
setInterval(() => {
    document.querySelectorAll('.comment-time').forEach(span => {
        const t = span.getAttribute('data-time');
        span.textContent = timeAgo(new Date(t));
    });
}, 30000);

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

// Tandai komentar dummy agar tidak hilang saat render
document.querySelectorAll('#commentsList > div').forEach(el => el.classList.add('dummy-comment'));
</script>
</body>
</html>
