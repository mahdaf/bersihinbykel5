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
                <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="Gambar Campaign" class="w-full h-72 md:h-96 object-cover" />
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
            
            <!-- Location Section -->
            <div class="location-container">
                <!-- <h2 class="location-title">Lokasi Campaign</h2>
                <div class="location-text">
                    <svg class="location-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/>
                    </svg>
                    <span id="lokasi-text"></span>
                </div>
                <!-- Interactive Map -->
                <!-- <div id="map"></div> -->
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
        <span class="form-date-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </span>
    </div>
    
    <!-- Alamat Campaign Lengkap -->
    <!-- <label class="form-label">Alamat campaign lengkap</label>
    <div class="relative">
        <input type="text" class="form-input" name="alamat_campaign" value="{{ old('alamat_campaign', $campaign->lokasi) }}" id="alamat-campaign">
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/>
            </svg>
        </span>
    </div> -->

    <!-- Lokasi -->
    <label class="form-label">Lokasi Campaign</label>
    <select class="form-input" name="alamat_campaign" required>
        <option value="">Pilih Lokasi</option>
        @php
        $cities = [
            'Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Palembang', 'Makassar',
            'Bekasi', 'Depok', 'Tangerang', 'Denpasar', 'Yogyakarta', 'Malang', 'Padang',
            'Samarinda', 'Batam', 'Pekanbaru', 'Balikpapan', 'Pontianak', 'Banjarmasin',
            'Manado', 'Ambon', 'Jayapura', 'Cirebon', 'Tasikmalaya', 'Solo', 'Magelang', 'Cimahi'
            ];
        @endphp
        @foreach($cities as $city)
            <option value="{{ $city }}">{{ $city }}</option>
        @endforeach
    </select>
    
    <!-- Hidden input latitude & longitude jika ingin dikirim -->
    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">

    <!-- Upload Portofolio -->
    <label class="upload-container" id="portofolio-label">
        <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <span class="upload-text">Upload Portofolio (PDF)</span>
        <input type="file" name="portofolio" accept="application/pdf" class="hidden" id="portofolio-input">
        <span id="portofolio-filename" style="margin-top:8px; color:#225151; font-size:14px;"></span>
    </label>

    <button type="submit" class="form-submit-btn">
        Simpan
    </button>
</form>
        </div>
    </div>

    <!-- Modal Notification -->
    <div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <button id="close-modal" class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-[#810000]">&times;</button>
            <h2 class="text-2xl md:text-3xl font-bold text-[#225151] text-center mb-2">Perubahan<br>Disimpan!</h2>
            <img src="{{ asset('berhasil.png') }}" alt="Pendaftaran Berhasil" class="w-56 md:w-72 mb-6" />
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
        // Default Surabaya coordinates
        var defaultLat = -7.2819;
        var defaultLng = 112.7953;

        var map = L.map('map').setView([defaultLat, defaultLng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(map);

        // Set initial hidden input values
        document.getElementById('latitude').value = defaultLat;
        document.getElementById('longitude').value = defaultLng;

        function updateAddress(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    if (data.display_name) {
                        document.getElementById('alamat-campaign').value = data.display_name;
                    }
                });
        }

        // Update marker and inputs when map is clicked
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Update inputs when marker is moved
        marker.on('move', function(e) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            document.getElementById('lokasi-text').innerText = `Lat: ${e.latlng.lat.toFixed(5)}, Lng: ${e.latlng.lng.toFixed(5)}`;
            updateAddress(e.latlng.lat, e.latlng.lng);
        });

        // Call once on initial load
        updateAddress(defaultLat, defaultLng);

        // Modal logic
        const btnSimpan = document.querySelector('.form-submit-btn');
        const modal = document.getElementById('modal-success');
        const closeModal = document.getElementById('close-modal');

        btnSimpan.addEventListener('click', function(e) {
            // e.preventDefault(); // HAPUS BARIS INI!
            // modal.classList.remove('hidden'); // Hapus juga jika tidak ingin modal muncul sebelum submit
        });

        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Preview gambar latar
        const gambarInput = document.getElementById('gambar-latar-input');
        const gambarFilename = document.getElementById('gambar-latar-filename');
        const gambarLabel = document.getElementById('gambar-latar-label');

        gambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                gambarFilename.textContent = file.name;
            } else {
                gambarFilename.textContent = '';
            }
        });

        const portofolioInput = document.getElementById('portofolio-input');
const portofolioFilename = document.getElementById('portofolio-filename');
const portofolioLabel = document.getElementById('portofolio-label');

portofolioInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        portofolioFilename.textContent = file.name;
    } else {
        portofolioFilename.textContent = '';
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