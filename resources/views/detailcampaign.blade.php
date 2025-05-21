<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Campaign</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Gambar Campaign -->
            <div>
                 <img src="https://source.unsplash.com/featured/?trash" alt="Campaign Image" class="rounded-lg shadow-md">
                <div class="flex justify-center mt-4 space-x-2">
                    <span class="w-3 h-3 rounded-full bg-purple-400"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                    <span class="w-3 h-3 rounded-full bg-gray-400"></span>
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    <p><strong>Lokasi Campaign:</strong></p>
                    <p><i class="fas fa-map-marker-alt"></i> Institut Teknologi Sepuluh Nopember, Keputih, Surabaya</p>
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

                <button class="bg-red-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-red-800 transition">IKUTI CAMPAIGN</button>

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
</body>
</html>