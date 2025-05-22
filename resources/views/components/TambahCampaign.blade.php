<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Campaign</title>
    @vite('resources/css/app.css')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 130px; border-radius: 0.75rem; }
    </style>
</head>
<body class="bg-[#FAFAFA] min-h-screen">
    @include('components.navbar')

    <div class="flex flex-col items-center w-full pt-8">
        <div class="flex flex-row w-[90%] max-w-6xl gap-8">
            <!-- Kiri: Gambar & Lokasi -->
            <div class="flex-1 flex flex-col items-center">
                <!-- Back Arrow & Judul -->
                <div class="flex items-center w-full mb-4">
                    <a href="#" class="text-3xl text-[#225151] mr-4">&#60;</a>
                    <h1 class="text-2xl md:text-3xl font-bold text-black text-center flex-1">Buat Campaign</h1>
                </div>
                <!-- Gambar utama -->
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                     alt="Campaign" class="rounded-xl w-full max-w-md h-80 object-cover mb-4 shadow" />
                <!-- Carousel dots -->
                <div class="flex justify-center items-center gap-2 mb-4">
                    <span class="w-3 h-3 rounded-full bg-[#D9D9D9] inline-block"></span>
                    <span class="w-3 h-3 rounded-full bg-[#D9D9D9] inline-block"></span>
                    <span class="w-3 h-3 rounded-full bg-[#C9A74A] inline-block"></span>
                    <span class="w-3 h-3 rounded-full bg-[#D9D9D9] inline-block"></span>
                </div>
                <!-- Lokasi -->
                <div class="w-full max-w-md mt-2">
                    <h2 class="font-semibold text-lg mb-1">Lokasi Campaign</h2>
                    <div class="flex items-center text-gray-700 text-sm mb-2">
                        <svg class="w-5 h-5 mr-1 text-[#225151]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/>
                        </svg>
                        <span id="lokasi-text">Pilih lokasi pada peta</span>
                    </div>
                    <!-- Map Interaktif -->
                    <div id="map"></div>
                </div>
            </div>
            <!-- Kanan: Form Campaign -->
            <div class="flex-1 flex flex-col items-center">
                <form class="w-full max-w-md flex flex-col gap-4 bg-white rounded-2xl p-6 shadow">
                    <!-- Upload Gambar Latar -->
                    <label class="flex flex-col items-center justify-center border-2 border-dashed border-[#55A7AA] bg-[#DDEDEE] rounded-xl py-8 cursor-pointer mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#55A7AA] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
                        </svg>
                        <span class="text-[#55A7AA] font-semibold">Upload<br>Gambar Latar</span>
                        <input type="file" class="hidden" />
                    </label>
                    <input type="text" placeholder="Nama campaign"
                        class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                    <textarea placeholder="Deskripsi campaign"
                        class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base resize-none" rows="2" required></textarea>
                    <div class="relative">
                        <input type="date" placeholder="Pilih tanggal"
                            class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base pr-10" required>
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#55A7AA]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </span>
                    </div>
                    <input type="text" placeholder="Syarat dan Ketentuan"
                        class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                    <div class="relative">
                        <input type="text" placeholder="Alamat campaign lengkap"
                            class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base pl-10" id="alamat-campaign" required>
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#55A7AA]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/>
                            </svg>
                        </span>
                    </div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <!-- Upload Portofolio PDF -->
                    <label class="flex flex-col items-center justify-center border-2 border-dashed border-[#55A7AA] bg-[#DDEDEE] rounded-xl py-6 cursor-pointer mb-2 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#55A7AA] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-[#55A7AA] font-semibold">Upload Portofolio (PDF)</span>
                        <input type="file" name="portofolio" accept="application/pdf" class="hidden" required>
                    </label>

                    <button type="button" id="btn-buat" class="w-full bg-[#810000] text-white rounded-full py-3 font-semibold text-base hover:bg-[#a30000] transition mt-2">
                        Buat
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Notifikasi -->
    <div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <button id="close-modal" class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-[#810000]">&times;</button>
            <h2 class="text-2xl md:text-3xl font-bold text-[#225151] text-center mb-2">Pendaftaran<br>Berhasil!</h2>
            <img src="{{ asset('berhasil.png') }}" alt="Pendaftaran Berhasil" class="w-56 md:w-72 mb-6" />
            <a href="#" class="w-full">
                <button class="w-full bg-[#810000] text-white rounded-full py-3 font-semibold text-base hover:bg-[#a30000] transition mb-3">
                    Buka Grup
                </button>
            </a>
            <a href="{{ url('/') }}" class="w-full">
                <button class="w-full border-2 border-[#810000] text-[#810000] rounded-full py-3 font-semibold text-base hover:bg-[#f5eaea] transition">
                    Kembali ke beranda
                </button>
            </a>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Koordinat default Surabaya
        var defaultLat = -7.2819;
        var defaultLng = 112.7953;

        var map = L.map('map').setView([defaultLat, defaultLng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(map);

        // Set nilai awal input hidden
        document.getElementById('latitude').value = defaultLat;
        document.getElementById('longitude').value = defaultLng;

        function updateAddress(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        document.getElementById('alamat-campaign').value = data.display_name;
                    } else {
                        document.getElementById('alamat-campaign').value = '';
                    }
                });
        }

        // Update marker dan input saat map diklik
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Update input saat marker digeser
        marker.on('move', function(e) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Panggil sekali saat load awal
        updateAddress(defaultLat, defaultLng);

        // Modal logic
        const btnBuat = document.getElementById('btn-buat');
        const modal = document.getElementById('modal-success');
        const closeModal = document.getElementById('close-modal');

        btnBuat.addEventListener('click', function(e) {
            e.preventDefault();
            modal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Optional: close modal on outside click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
