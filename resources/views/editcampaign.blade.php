<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Campaign</title>
    @vite('resources/css/app.css')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
        /* Layout Styles */
        .page-container {
            background-color: #FAFAFA;
            min-height: 100vh;
        }
        .main-grid {
            display: flex;
            width: 90%;
            max-width: 1200px;
            gap: 3rem;
            margin: 0 auto;
            padding-top: 2rem;
        }
        .left-column {
            flex: 1;
            max-width: 45%;
        }
        .right-column {
            flex: 1.2;
            max-width: 55%;
        }

        /* Map Styles */
        #map {
            height: 130px;
            border-radius: 0.75rem;
            margin-top: 0.5rem;
        }

        /* Form Styles */
        .form-container {
            background-color: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .form-input {
            background-color: #F5F5F5;
            border: none;
            border-radius: 8px;
            padding: 12px 16px;
            width: 100%;
            margin-bottom: 16px;
            font-size: 14px;
        }
        .form-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px #810000;
        }
        .form-textarea {
            background-color: #F5F5F5;
            border: none;
            border-radius: 8px;
            padding: 12px 16px;
            width: 100%;
            margin-bottom: 16px;
            font-size: 14px;
            resize: vertical;
            min-height: 80px;
        }
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            font-size: 16px;
        }
        .form-date-container {
            position: relative;
        }
        .form-date-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
        }
        .form-submit-btn {
            background-color: #810000;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 12px 0;
            width: 100%;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            margin-top: 8px;
        }
        .form-submit-btn:hover {
            background-color: #6a0000;
        }
        .syarat-list {
            margin-top: 8px;
            padding-left: 20px;
        }
        .syarat-list li {
            margin-bottom: 6px;
            list-style-type: decimal;
        }

        /* Upload Styles */
        .upload-container {
            width: 100%;
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #55A7AA;
            border-radius: 12px;
            background-color: #DDEDEE;
            cursor: pointer;
            margin-bottom: 1.5rem;
        }
        .upload-icon {
            height: 2rem;
            width: 2rem;
            color: #55A7AA;
            margin-bottom: 0.5rem;
        }
        .upload-text {
            color: #55A7AA;
            font-weight: 600;
            text-align: center;
        }

        /* Header Styles */
        .page-header {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 1rem;
        }
        .back-button {
            font-size: 1.5rem;
            color: #225151;
            margin-right: 1rem;
        }
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: black;
            text-align: center;
            flex-grow: 1;
        }

        /* Image Preview Styles */
        .image-preview {
            border-radius: 0.75rem;
            width: 100%;
            max-width: 28rem;
            height: 20rem;
            object-fit: cover;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .carousel-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .dot {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 9999px;
            background-color: #D9D9D9;
        }
        .dot.active {
            background-color: #C9A74A;
        }

        /* Location Styles */
        .location-container {
            width: 100%;
            max-width: 28rem;
            margin-top: 0.5rem;
        }
        .location-title {
            font-weight: 600;
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }
        .location-text {
            display: flex;
            align-items: center;
            color: #4B5563;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }
        .location-icon {
            height: 1.25rem;
            width: 1.25rem;
            color: #225151;
            margin-right: 0.25rem;
        }
        .mySwiper .swiper-pagination {
            position: relative;
            bottom: auto;
            left: auto;
            width: 100%;
            margin-top: 1rem; /* Jarak dari gambar ke dots */
            text-align: center;
        }

        /* NEW: Styling untuk dot pagination tidak aktif */
        .mySwiper  .swiper-pagination-bullet {
            background-color: #d8d2f0; /* ungu muda */
            opacity: 1;
        }

        .mySwiper .swiper-pagination-bullet-active {
            background-color: #e4b100; /* kuning emas */
        }

        /* Tambahan untuk autocomplete suggestion */
        .suggestion-box {
            position: absolute;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 8px 8px;
            max-height: 180px;
            overflow-y: auto;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .suggestion-item {
            padding: 10px 16px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background: #f5f5f5;
        }
    </style>
</head>
<body class="page-container">
    @include('components.navbar')

    <div class="main-grid">
        <!-- Left Column: Image & Location -->
        <div class="left-column">
            <!-- Header -->
            <div class="page-header">
                <a href="#" class="back-button">&#60;</a>
                <h1 class="page-title">Edit Campaign</h1>
            </div>

            <!-- Main Image -->
            <!-- Swiper dinamis -->
            <div class="swiper mySwiper rounded-xl overflow-hidden">
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

            <!-- Location Section -->
            <div class="location-container">
                <h2 class="location-title">Lokasi Campaign</h2>
                <div class="location-text">
                    <svg class="location-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/>
                    </svg>
                    <span id="lokasi-text"></span>
                </div>
            </div>
        </div>

        <!-- Right Column: Form -->
        <div class="right-column">
        @if($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-container" action="{{ route('campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Upload Gambar Latar -->
    <label class="upload-container" id="gambar-latar-label">
        <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
        </svg>
        <span class="upload-text">Upload<br>Gambar Latar</span>
        <input type="file" name="gambar_latar" accept="image/*" class="hidden" id="gambar-latar-input" />
        <span id="gambar-latar-filename" style="margin-top:8px; color:#225151; font-size:14px;"></span>
    </label>

    <!-- Nama Campaign -->
    <label class="form-label">Nama campaign</label>
    <input type="text" class="form-input" name="nama_campaign" placeholder="Masukkan nama campaign">

    <!-- Deskripsi Campaign -->
    <label class="form-label">Deskripsi campaign</label>
    <textarea class="form-textarea" name="deskripsi_campaign" placeholder="Masukkan deskripsi campaign"></textarea>

    <!-- Pilih Tanggal -->
    <label class="form-label">Pilih tanggal</label>
    <div class="form-date-container">
        <input type="text" class="form-input" name="tanggal" id="tanggal" placeholder="Pilih tanggal" required>
    </div>

    <!-- Lokasi -->
    <label class="form-label">Lokasi Campaign</label>
    <div style="position:relative;">
        <input type="text" class="form-input" name="alamat_campaign" id="alamat-campaign" placeholder="Tulis alamat atau cari lokasi..." required value="">
        <input type="hidden" name="alamat_singkat" id="alamat-singkat" value="">
        <div id="suggestion-box" class="suggestion-box" style="display:none;"></div>
    </div>
    <div class="location-container">
        <div id="map" style="height: 180px; border-radius: 0.75rem; margin-top: 0.5rem;"></div>
    </div>
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">

    <button type="submit" class="form-submit-btn">
        Simpan
    </button>
</form>
        </div>
    </div>

    <!-- Modal Notification -->
    <div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm hidden">
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <h2 class="text-2xl md:text-3xl font-bold text-[#225151] text-center mb-2">Perubahan<br>Disimpan!</h2>
            <img src="{{ asset('ilustration.png') }}" class="w-56 md:w-72 mb-6" />
            <a href="{{ url('campaign/' . $campaign->id) }}" class="w-full">
                <button class="w-full bg-[#810000] text-white rounded-full py-3 font-semibold text-base hover:bg-[#a30000] transition mb-3">
                    Lihat Campaign
                </button>
            </a>
            <a href="{{ url('/') }}" class="w-full">
                <button class="w-full border-2 border-[#810000] text-[#810000] rounded-full py-3 font-semibold text-base hover:bg-[#f5eaea] transition">
                    Kembali ke beranda
                </button>
            </a>
        </div>
    </div>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('modal-success').classList.remove('hidden');
        });
    </script>
    @endif

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var defaultLat = -7.2819;
        var defaultLng = 112.7953;
        var map = L.map('map').setView([defaultLat, defaultLng], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(map);
        document.getElementById('latitude').value = defaultLat;
        document.getElementById('longitude').value = defaultLng;
        document.getElementById('lokasi-text').innerText = `Lat: ${defaultLat.toFixed(5)}, Lng: ${defaultLng.toFixed(5)}`;

        // Flag untuk membedakan perubahan manual/otomatis
        let isUpdatingFromMap = false;
        let isUpdatingFromInput = false;

        const LOCATIONIQ_KEY = 'pk.7a3a66a4b2e1082fa82fbcce11b0f5c9';

        function updateAddress(lat, lng) {
            isUpdatingFromMap = true;
            fetch(`https://us1.locationiq.com/v1/reverse?key=${LOCATIONIQ_KEY}&lat=${lat}&lon=${lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        document.getElementById('alamat-campaign').value = data.display_name;
                        // Ambil 3 bagian terakhir sebelum kode pos/negara untuk disimpan ke db
                        let parts = data.display_name.split(',').map(s => s.trim());
                        while (parts.length && (/^\d+$/.test(parts[parts.length-1]) || parts[parts.length-1].toLowerCase() === 'indonesia')) {
                            parts.pop();
                        }
                        let singkat = '';
                        if (parts.length >= 4) {
                            singkat = parts.slice(-3).join(', ');
                        } else {
                            singkat = parts.join(', ');
                        }
                        document.getElementById('alamat-singkat').value = singkat;
                    }
                })
                .finally(() => {
                    setTimeout(() => { isUpdatingFromMap = false; }, 100);
                });
        }

        function geocodeAddress(address) {
            isUpdatingFromInput = true;
            fetch(`https://us1.locationiq.com/v1/search?key=${LOCATIONIQ_KEY}&q=${encodeURIComponent(address)}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.length > 0) {
                        const lat = parseFloat(data[0].lat);
                        const lon = parseFloat(data[0].lon);
                        map.setView([lat, lon], 15);
                        marker.setLatLng([lat, lon]);
                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;
                        document.getElementById('lokasi-text').innerText = `Lat: ${lat.toFixed(5)}, Lng: ${lon.toFixed(5)}`;
                    }
                })
                .finally(() => {
                    setTimeout(() => { isUpdatingFromInput = false; }, 100);
                });
        }

        // Event: user mengetik alamat (autocomplete LocationIQ)
        const suggestionBox = document.getElementById('suggestion-box');
        const alamatInput = document.getElementById('alamat-campaign');
        let geocodeTimeout = null;
        alamatInput.addEventListener('input', function() {
            if (isUpdatingFromMap) return; // Jangan trigger jika perubahan dari map
            clearTimeout(geocodeTimeout);
            const address = this.value;
            if (address.length > 2) {
                geocodeTimeout = setTimeout(() => {
                    fetch(`https://us1.locationiq.com/v1/autocomplete?key=${LOCATIONIQ_KEY}&q=${encodeURIComponent(address)}&limit=5&countrycodes=ID&normalizeaddress=1`)
                        .then(res => res.json())
                        .then(data => {
                            suggestionBox.innerHTML = '';
                            if (Array.isArray(data) && data.length > 0) {
                                suggestionBox.style.display = 'block';
                                data.forEach(item => {
                                    let div = document.createElement('div');
                                    div.className = 'suggestion-item';
                                    div.textContent = item.display_place ? `${item.display_place}, ${item.display_address}` : item.display_name;
                                    div.onclick = function() {
                                        alamatInput.value = item.display_name;
                                        // Ambil 3 bagian terakhir sebelum kode pos/negara untuk disimpan ke db
                                        let parts = item.display_name.split(',').map(s => s.trim());
                                        // Buang bagian belakang jika berupa angka (kode pos) atau 'Indonesia'
                                        while (parts.length && (/^\d+$/.test(parts[parts.length-1]) || parts[parts.length-1].toLowerCase() === 'indonesia')) {
                                            parts.pop();
                                        }
                                        let singkat = '';
                                        if (parts.length >= 4) {
                                            singkat = parts.slice(-3).join(', ');
                                        } else {
                                            singkat = parts.join(', ');
                                        }
                                        document.getElementById('alamat-singkat').value = singkat;
                                        // Update peta dan marker
                                        const lat = parseFloat(item.lat);
                                        const lon = parseFloat(item.lon);
                                        map.setView([lat, lon], 15);
                                        marker.setLatLng([lat, lon]);
                                        document.getElementById('latitude').value = lat;
                                        document.getElementById('longitude').value = lon;
                                        document.getElementById('lokasi-text').innerText = `Lat: ${lat.toFixed(5)}, Lng: ${lon.toFixed(5)}`;
                                        suggestionBox.style.display = 'none';
                                    };
                                    suggestionBox.appendChild(div);
                                });
                            } else {
                                suggestionBox.style.display = 'none';
                            }
                        });
                }, 400);
            } else {
                suggestionBox.style.display = 'none';
            }
        });
        // Sembunyikan suggestion jika klik di luar
        document.addEventListener('click', function(e) {
            if (!alamatInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.style.display = 'none';
            }
        });

        // Event: klik pada map
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Event: marker digeser
        marker.on('move', function(e) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Inisialisasi alamat pada load pertama
        updateAddress(defaultLat, defaultLng);

        document.querySelector('form').addEventListener('submit', function(e) {
            var singkat = document.getElementById('alamat-singkat').value;
            var lengkap = document.getElementById('alamat-campaign').value;
            if (!singkat && lengkap) {
                // Ambil 3 bagian terakhir sebelum kode pos/negara
                let parts = lengkap.split(',').map(s => s.trim());
                while (parts.length && (/^\\d+$/.test(parts[parts.length-1]) || parts[parts.length-1].toLowerCase() === 'indonesia')) {
                    parts.pop();
                }
                if (parts.length >= 4) {
                    singkat = parts.slice(-3).join(', ');
                } else {
                    singkat = parts.join(', ');
                }
                document.getElementById('alamat-singkat').value = singkat;
            }
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
<script>
    flatpickr("#tanggal", {
    dateFormat: "d-m-Y",      // Format yang dikirim ke server (dd-mm-yyyy)
    altInput: true,           // Tampilkan input alternatif yang lebih user-friendly
    altFormat: "d-m-Y",       // Format tampilan di input (dd-mm-yyyy)
    allowInput: true,
    locale: "id"              // Opsional: gunakan bahasa Indonesia
});
</script>
</body>
</html>