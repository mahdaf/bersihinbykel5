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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
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

    <style>.page-container{background-color:#fafafa;min-height:100vh}.main-grid{display:flex;width:90%;max-width:1200px;gap:3rem;margin:0 auto;padding-top:2rem}.left-column{flex:1;max-width:45%}.right-column{flex:1.2;max-width:55%}#map{height:130px;border-radius:.75rem;margin-top:.5rem}.form-container{background-color:#fff;border-radius:12px;padding:24px;box-shadow:0 2px 8px rgba(0,0,0,.1)}.form-input,.form-textarea{background-color:#f5f5f5;border:none;padding:12px 16px;margin-bottom:16px;font-size:14px;width:100%}.form-input{border-radius:8px}.form-input:focus{outline:0;box-shadow:0 0 0 2px #810000}.form-textarea{border-radius:8px;resize:vertical;min-height:80px}.form-label,.form-submit-btn{font-size:16px;font-weight:600}.form-label{margin-bottom:8px;display:block}.form-date-container{position:relative}.form-date-icon{position:absolute;right:12px;top:50%;transform:translateY(-50%);color:#555}.form-submit-btn{background-color:#810000;color:#fff;border:none;border-radius:20px;padding:12px 0;width:100%;cursor:pointer;margin-top:8px}.form-submit-btn:hover{background-color:#6a0000}.syarat-list{margin-top:8px;padding-left:20px}.syarat-list li{margin-bottom:6px;list-style-type:decimal}.upload-container{width:100%;height:200px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:2px dashed #55a7aa;border-radius:12px;background-color:#ddedee;cursor:pointer;margin-bottom:1.5rem}.upload-icon{height:2rem;width:2rem;color:#55a7aa;margin-bottom:.5rem}.image-preview,.page-header{width:100%;margin-bottom:1rem}.upload-text{color:#55a7aa;font-weight:600;text-align:center}.page-header{display:flex;align-items:center}.back-button{font-size:1.5rem;color:#225151;margin-right:1rem}.page-title{font-size:1.5rem;font-weight:700;color:#000;text-align:center;flex-grow:1}.image-preview{border-radius:.75rem;max-width:28rem;height:20rem;object-fit:cover;box-shadow:0 4px 6px -1px rgba(0,0,0,.1)}.carousel-dots{display:flex;justify-content:center;align-items:center;gap:.5rem;margin-bottom:1rem}.dot{width:.75rem;height:.75rem;border-radius:9999px;background-color:#d9d9d9}.dot.active{background-color:#c9a74a}.location-container{width:100%;max-width:28rem;margin-top:.5rem}.location-title{font-weight:600;font-size:1.125rem;margin-bottom:.25rem}.location-text{display:flex;align-items:center;color:#4b5563;font-size:.875rem;margin-bottom:.5rem}.location-icon{height:1.25rem;width:1.25rem;color:#225151;margin-right:.25rem}.mySwiper .swiper-pagination{position:relative;bottom:auto;left:auto;width:100%;margin-top:1rem;text-align:center}.mySwiper .swiper-pagination-bullet{background-color:#d8d2f0;opacity:1}.mySwiper .swiper-pagination-bullet-active{background-color:#e4b100}.suggestion-box{position:absolute;background:#fff;border:1px solid #ccc;border-radius:0 0 8px 8px;max-height:180px;overflow-y:auto;width:100%;z-index:1000;box-shadow:0 2px 8px rgba(0,0,0,.08)}.suggestion-item{padding:10px 16px;cursor:pointer}.suggestion-item:hover{background:#f5f5f5}</style>
</head>
<body class="page-container">
    @include('components.navbar')

    <div class="main-grid">
        <!-- Left Column: Image & Location -->
        <div class="left-column">
            <!-- Header -->
            <div class="page-header">
                <a href="javascript:history.back()" class="back-button">&#60;</a>
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

        <form class="form-container" action="{{ route('campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <!-- Upload Gambar Campaign -->
    <label class="form-label">Gambar Campaign</label>
    @php
        $gambarLama = count($campaign->gambar_campaign);
    @endphp
    <div id="gambar-preview-row" style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-bottom: 1rem;">
        @foreach($campaign->gambar_campaign as $gambar)
            @php
                $isUrl = filter_var($gambar->gambar, FILTER_VALIDATE_URL);
                $src = $isUrl ? $gambar->gambar : asset('storage/' . $gambar->gambar);
            @endphp
            <div class="gambar-preview-item" style="position:relative; display:inline-block;">
                <img src="{{ $src }}" alt="Gambar Campaign" style="width:110px; height:80px; object-fit:cover; border-radius:8px; border:1px solid #ccc;">
                <button type="button" class="hapus-gambar-btn" data-id="{{ $gambar->id }}" style="position:absolute;top:2px;right:2px;background:#fff;border:none;border-radius:50%;width:22px;height:22px;display:flex;align-items:center;justify-content:center;box-shadow:0 1px 4px rgba(0,0,0,0.12);cursor:pointer;">
                    <span style="color:#810000;font-size:18px;">&times;</span>
                </button>
            </div>
        @endforeach

        <template id="gambar-baru-template">
            <div class="gambar-baru-item" style="position:relative; display:inline-block;">
                <img src="" alt="Gambar Baru" style="width:110px; height:80px; object-fit:cover; border-radius:8px; border:1px solid #ccc;">
                <button type="button" class="hapus-gambar-baru-btn" style="position:absolute;top:2px;right:2px;background:#fff;border:none;border-radius:50%;width:22px;height:22px;display:flex;align-items:center;justify-content:center;box-shadow:0 1px 4px rgba(0,0,0,0.12);cursor:pointer;">
                    <span style="color:#810000;font-size:18px;">&times;</span>
                </button>
            </div>
        </template>
        <!-- Tombol upload gambar hanya muncul jika total gambar < 3 -->
        <label class="upload-container" id="gambar-latar-label" style="width:110px;height:80px;display:flex;flex-direction:column;align-items:center;justify-content:center;cursor:pointer;margin:0;{{ ($gambarLama >= 3) ? 'display:none;' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="height:2rem;width:2rem;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" />
            </svg>
            <span class="upload-text" style="font-size:12px;line-height:1.1;text-align:center;">Upload<br>Gambar</span>
            <input type="file" name="gambar_latar[]" accept="image/*" class="hidden" id="gambar-latar-input" multiple>
            <!-- Hapus preview nama file -->
        </label>
        <div id="max-gambar-warning" style="display:none;color:#810000;font-size:13px;margin-top:4px;text-align:center;">Maksimal 3 gambar, tidak bisa upload lagi.</div>
    </div>
    <div id="gambar-baru-preview" style="display:flex;gap:12px;flex-wrap:wrap;"></div>

    <script>
        let gambarBaruFiles = [];
        const inputGambar = document.getElementById('gambar-latar-input');
        const gambarPreviewRow = document.getElementById('gambar-preview-row');
        const gambarBaruTemplate = document.getElementById('gambar-baru-template');
        const uploadLabel = document.getElementById('gambar-latar-label');
        const maxWarning = document.getElementById('max-gambar-warning');

        inputGambar.addEventListener('change', function() {
            const gambarLama = gambarPreviewRow.querySelectorAll('.gambar-preview-item').length;
            const gambarBaru = gambarPreviewRow.querySelectorAll('.gambar-baru-item').length;
            let files = Array.from(this.files);

            // Hitung sisa slot gambar yang boleh diupload
            let sisaSlot = 3 - (gambarLama + gambarBaru);

            if (files.length > sisaSlot) {
                this.value = '';
                maxWarning.style.display = 'block';
                setTimeout(() => { maxWarning.style.display = 'none'; }, 5000);
                return;
            } else {
                maxWarning.style.display = 'none';
            }

            // Tambahkan preview untuk setiap file baru (maksimal sisa slot)
            files.slice(0, sisaSlot).forEach((file, idx) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    const clone = gambarBaruTemplate.content.cloneNode(true);
                    const img = clone.querySelector('img');
                    img.src = e.target.result;
                    // Hapus gambar baru
                    clone.querySelector('.hapus-gambar-baru-btn').onclick = function() {
                        this.parentElement.remove();
                        // Tampilkan tombol upload jika total gambar < 3
                        if ((gambarPreviewRow.querySelectorAll('.gambar-preview-item').length + gambarPreviewRow.querySelectorAll('.gambar-baru-item').length) < 3) {
                            uploadLabel.style.display = 'flex';
                            inputGambar.disabled = false;
                            maxWarning.style.display = 'none';
                        }
                    };
                    gambarPreviewRow.insertBefore(clone, uploadLabel);
                };
                reader.readAsDataURL(file);
            });

            // Sembunyikan tombol upload jika sudah 3 gambar
            if ((gambarPreviewRow.querySelectorAll('.gambar-preview-item').length + gambarPreviewRow.querySelectorAll('.gambar-baru-item').length) >= 3) {
                uploadLabel.style.display = 'none';
                inputGambar.disabled = true;
                maxWarning.style.display = 'block';
            } else {
                uploadLabel.style.display = 'flex';
                inputGambar.disabled = false;
                maxWarning.style.display = 'none';
            }

            // Reset input agar bisa upload file yang sama lagi jika dihapus
            this.value = '';
        });

        // Fungsi untuk menghapus file dari input file (reset input)
        function removeFileFromInput(input, idx) {
            const dt = new DataTransfer();
            gambarBaruFiles.forEach((file, i) => {
                if (i !== idx) dt.items.add(file);
            });
            input.files = dt.files;
            // Trigger ulang event change agar preview update
            input.dispatchEvent(new Event('change'));
        }

        // Hapus gambar lama AJAX
        document.querySelectorAll('.hapus-gambar-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('Hapus gambar ini?')) {
                    fetch("{{ url('campaign/gambar/hapus') }}/" + this.dataset.id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success) {
                            this.parentElement.remove();
                            // Tampilkan tombol upload jika total gambar < 3
                            if ((gambarPreviewRow.querySelectorAll('.gambar-preview-item').length + gambarPreviewRow.querySelectorAll('.gambar-baru-item').length) < 3) {
                                uploadLabel.style.display = 'flex';
                                inputGambar.disabled = false;
                            }
                        } else {
                            alert('Gagal menghapus gambar');
                        }
                    });
                }
            });
        });

        document.getElementById('gambar-latar-label').addEventListener('click', function() {
            document.getElementById('gambar-latar-input').click();
        });
    </script>

    <!-- Nama Campaign -->
    <label class="form-label">Nama Campaign</label>
    <input type="text" class="form-input" name="nama_campaign" placeholder="Ganti nama campaign" value="{{ old('nama_campaign', $campaign->nama) }}">

    <!-- Deskripsi Campaign -->
    <label class="form-label">Deskripsi Campaign</label>
    <textarea class="form-textarea" name="deskripsi_campaign" placeholder="Ganti deskripsi campaign">{{ old('deskripsi_campaign', $campaign->deskripsi) }}</textarea>

    <!-- Tanggal & Jam Pelaksanaan -->
    <label class="form-label">Waktu Pelaksanaan</label>
    <div class="form-date-container">
        <input type="text" class="form-input" name="waktu" id="waktu" placeholder="Ganti tanggal & jam pelaksanaan" required value="{{ old('waktu', $campaign->waktu ? \Carbon\Carbon::parse($campaign->waktu)->format('d-m-Y H:i') : '' ) }}" readonly style="background-color:#F5F5F5; cursor:pointer;">
    </div>
    <script>
        flatpickr("#waktu", {
            enableTime: true,
            dateFormat: "d-m-Y H:i",
            time_24hr: true,
            altInput: false,
            allowInput: false,
            locale: "id"
        });
    </script>

    <!-- Kuota Partisipan -->
    <label class="form-label">Kuota Partisipan</label>
    <input type="number" class="form-input" name="kuota_partisipan" min="1" placeholder="Ganti kuota partisipan" value="{{ old('kuota_partisipan', $campaign->kuota_partisipan) }}" required>

    <!-- Lokasi -->
    <label class="form-label">Lokasi Campaign</label>
    <div style="position:relative;">
        <input type="text" class="form-input" name="alamat_campaign" id="alamat-campaign" placeholder="Ganti alamat atau cari lokasi..." required value="">
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

    <!-- Modal Notification Gagal -->
    <div id="modal-error" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm hidden">
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <h2 class="text-2xl md:text-3xl font-bold text-[#a30000] text-center mb-2">Perubahan<br>Gagal Disimpan!</h2>
            <img src="{{ asset('ilustration.png') }}" class="w-56 md:w-72 mb-6" />
            <div class="w-full text-center text-[#a30000] font-semibold mb-4">{{ session('error') }}</div>
            <button onclick="document.getElementById('modal-error').classList.add('hidden')" class="w-full bg-[#f5eaea] text-[#a30000] rounded-full py-3 font-semibold text-base hover:bg-[#ffeaea] transition mb-3">
                Tutup
            </button>
        </div>
    </div>

    @if(session('success') && !session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('modal-success').classList.remove('hidden');
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('modal-error').classList.remove('hidden');
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
            if (isUpdatingFromMap) return;
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
</body>
</html>
