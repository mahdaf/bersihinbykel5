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
    <link href="https://unpkg.com/lucide-icons/dist/umd/lucide.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide-icons"></script>

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

<body class="min-h-screen bg-[#f3f3fa]">
    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid lg:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <div class="w-full">
                        {{-- MODIFIED: Tambahkan class shadow-lg untuk bayangan --}}
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

                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="font-semibold text-[#171717] mb-3">Lokasi Campaign</h3>
                        <div class="flex items-start gap-2">
                            <i data-lucide="map-pin" class="w-5 h-5 text-[#4a4a4a] mt-0.5 flex-shrink-0"></i>
                            <span class="text-[#4a4a4a]">Institut Teknologi Sepuluh Nopember, Keputih, Sukolilo,...</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Bebersih Surabaya" class="w-full h-full object-cover">
                    </div>
                    <span class="font-medium text-[#171717]">Bebersih Surabaya</span>
                </div>

                <div class="flex items-start justify-between">
                    <h1 class="text-3xl font-bold text-[#171717]">Daur Sampah Yuk</h1>
                    <i data-lucide="bookmark" class="w-6 h-6 text-[#4a4a4a] cursor-pointer"></i> {{-- Tambah cursor-pointer jika interaktif --}}
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <i data-lucide="calendar" class="w-5 h-5 text-[#4a4a4a]"></i>
                        <span class="text-[#4a4a4a]">20/04/2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="clock" class="w-5 h-5 text-[#4a4a4a]"></i>
                        <span class="text-[#4a4a4a]">09.30 - 18.00</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="font-semibold text-[#171717]">Tentang Campaign</h3>
                    <p class="text-[#4a4a4a] leading-relaxed">
                        Daur sampah yuk adalah campaign tahunan departemen Sistem Informasi ITS untuk membersihkan lingkungan
                        dan limbah yang ada di sekitar kampus
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-medium text-[#171717] mb-3">Partisipan</h4>
                        <div class="flex items-center">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white overflow-hidden">
                                    {{-- Pastikan 'images/avatar-placeholder.png' ada di folder public --}}
                                    <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Participant 1" class="w-full h-full object-cover">
                                </div>
                                <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white overflow-hidden">
                                    <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Participant 2" class="w-full h-full object-cover">
                                </div>
                                <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white overflow-hidden">
                                    <img src="{{ asset('images/avatar-placeholder.png') }}" alt="Participant 3" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <span class="ml-2 text-sm text-[#4a4a4a]">+6</span>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-medium text-[#171717] mb-3">Aktivitas</h4>
                        <div class="flex items-center">
                            <div class="flex -space-x-2">
                                {{-- ADDED/UNCOMMENTED: Menggunakan gambar dummy untuk aktivitas --}}
                                {{-- Pastikan file-file gambar ini ada di folder public/images/ --}}
                                <img src="{{ asset('images/activity-placeholder-1.jpg') }}" alt="Aktivitas 1" class="w-8 h-8 rounded-md object-cover border-2 border-white bg-gray-200">
                                <img src="{{ asset('images/activity-placeholder-2.jpg') }}" alt="Aktivitas 2" class="w-8 h-8 rounded-md object-cover border-2 border-white bg-gray-200">
                                <img src="{{ asset('images/activity-placeholder-3.jpg') }}" alt="Aktivitas 3" class="w-8 h-8 rounded-md object-cover border-2 border-white bg-gray-200">
                            </div>
                            {{-- MODIFIED: ml-3 diubah menjadi ml-2 untuk jarak yang lebih dekat --}}
                            <span class="ml-2 text-sm text-[#4a4a4a]">+2</span>
                        </div>
                    </div>
                </div>

                <button onclick="toggleModal()" class="w-fit bg-[#810000] hover:bg-[#6d0000] text-white py-3 px-8 rounded-lg font-medium transition">
                    IKUTI CAMPAIGN
                </button>

                {{-- Modal (struktur sama seperti sebelumnya) --}}
                <div id="popupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-3xl p-8 w-full max-w-md relative shadow-2xl mx-4">
                        <button onclick="toggleModal()" class="absolute top-4 right-4 text-gray-600 hover:text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <h2 class="text-xl font-bold text-[#55a7aa] mb-6 text-center">Form Pendaftaran Campaign</h2>
                        <form>
                            <input type="text" placeholder="Nama Lengkap"
                                class="w-full mb-3 p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />
                            <input type="email" placeholder="Email"
                                class="w-full mb-3 p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />
                            <div class="flex gap-2 mb-3">
                                <button type="button" class="bg-[#55a7aa] text-white px-4 rounded-2xl text-lg shrink-0">+62</button>
                                <input type="text" placeholder="Nomor Ponsel"
                                    class="w-full p-3 bg-[#ddedee] text-[#55a7aa] rounded-2xl placeholder:text-[#55a7aa] text-lg" />
                            </div>
                            <div class="mb-4">
                                <label class="text-[#55a7aa] text-lg font-medium block mb-2">Upload KTP</label>
                                <input type="file" class="w-full text-[#55a7aa] bg-[#ddedee] rounded-2xl p-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#55a7aa] file:text-white hover:file:bg-[#4a9194]" />
                            </div>
                            <button type="submit" class="w-full bg-[#810000] hover:bg-[#810000]/90 text-white py-3 rounded-2xl text-lg font-medium">
                                Daftar
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Comment Section (struktur sama seperti sebelumnya) --}}
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden">
                                <img src="{{ asset('images/avatar-placeholder.png') }}" alt="landakberduri" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1"> {{-- justify-between agar ikon ... ke kanan --}}
                                    <div class="flex items-center gap-2">
                                        <span class="font-medium text-[#171717]">landakberduri</span>
                                        <span class="text-sm text-[#4a4a4a]">• 1d</span>
                                    </div>
                                    <i data-lucide="more-horizontal" class="w-4 h-4 text-[#4a4a4a] cursor-pointer"></i>
                                </div>
                                <p class="text-[#4a4a4a] text-sm leading-relaxed mb-3">
                                    Baru sadar, ternyata kegiatan campaign itu penting banget untuk ngejadiin lingkungan sekitar lebih
                                    aware terhadap kebersihan lingkungan
                                </p>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="heart" class="w-4 h-4 text-[#4a4a4a] cursor-pointer"></i>
                                    <span class="text-sm text-[#4a4a4a]">530</span>
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
                    <div class="flex items-center mb-2">
                        <img src="https://randomuser.me/api/portraits/men/10.jpg" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="font-semibold text-sm">landakberduri <span class="text-xs text-gray-500">• 1d</span></p>
                            <p class="text-sm text-gray-700">Baru sadar, ternyata kegiatan campaign itu penting banget untuk ngejadiin lingkungan sekitar lebih aware terhadap kebersihan lingkungan</p>
                            <p class="text-xs text-gray-500 mt-1">❤️ 530</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Swiper
            new Swiper('.mySwiper', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                // Jika ingin autoplay, tambahkan:
                // autoplay: {
                //   delay: 3000,
                //   disableOnInteraction: false,
                // },
            });

            // Inisialisasi Lucide icons
            lucide.createIcons();
        });

        // Fungsi untuk menampilkan/menyembunyikan modal
        function toggleModal() {
            const modal = document.getElementById('popupModal');
            if (modal) {
                modal.classList.toggle('hidden');
            }
        }
    </script>
</body>
</html>
