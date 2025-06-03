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

    <!-- Font Awesome CDN buat icon kalender & jam -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
    function toggleModal() {
        const modal = document.getElementById("popupModal");
        modal.classList.toggle("hidden");
    }
</script>

</body>
</html>