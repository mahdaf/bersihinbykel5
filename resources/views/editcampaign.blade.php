<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - {{ $campaign->nama }}</title>
    @vite('resources/css/app.css','resource/js/app.js')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>


    <style>
        /* Layout Grid */
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

        /* Map */
        #map {
            height: 130px;
            border-radius: 0.75rem;
            margin-top: 0.5rem;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Form Inputs */
        .form-input,
        .form-textarea {
            background-color: #f5f5f5;
            border: none;
            padding: 12px 16px;
            margin-bottom: 16px;
            font-size: 14px;
            width: 100%;
        }

        .form-input {
            border-radius: 8px;
        }

        .form-input:focus {
            outline: 0;
            box-shadow: 0 0 0 2px #810000;
        }

        .form-textarea {
            border-radius: 8px;
            resize: vertical;
            min-height: 80px;
        }

        /* Form Labels & Submit Button */
        .form-label,
        .form-submit-btn {
            font-size: 16px;
            font-weight: 600;
        }

        .form-label {
            margin-bottom: 8px;
            display: block;
        }

        /* Date Container */
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

        /* Submit Button */
        .form-submit-btn {
            background-color: #810000;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 12px 0;
            width: 100%;
            cursor: pointer;
            margin-top: 8px;
        }

        .form-submit-btn:hover {
            background-color: #6a0000;
        }

        /* Syarat List */
        .syarat-list {
            margin-top: 8px;
            padding-left: 20px;
        }

        .syarat-list li {
            margin-bottom: 6px;
            list-style-type: decimal;
        }

        /* Upload Container */
        .upload-container {
            width: 100%;
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #55a7aa;
            border-radius: 12px;
            background-color: #ddedee;
            cursor: pointer;
            margin-bottom: 1.5rem;
        }

        .upload-icon {
            height: 2rem;
            width: 2rem;
            color: #55a7aa;
            margin-bottom: 0.5rem;
        }

        .upload-text {
            color: #55a7aa;
            font-weight: 600;
            text-align: center;
        }

        /* Page Header */
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
            color: #000;
            text-align: center;
            flex-grow: 1;
        }

        /* Image Preview */
        .image-preview {
            border-radius: 0.75rem;
            max-width: 28rem;
            height: 20rem;
            object-fit: cover;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-bottom: 1rem;
        }

        /* Carousel Dots */
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
            background-color: #d9d9d9;
        }

        .dot.active {
            background-color: #c9a74a;
        }

        /* Location Container */
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
            color: #4b5563;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .location-icon {
            height: 1.25rem;
            width: 1.25rem;
            color: #225151;
            margin-right: 0.25rem;
        }

        /* Suggestion Box */
        .suggestion-box {
            position: absolute;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 0 0 8px 8px;
            max-height: 180px;
            overflow-y: auto;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .suggestion-item {
            padding: 10px 16px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background: #f5f5f5;
        }

        /* Swiper Pagination */
        .swiper-pagination {
            position: relative;
            bottom: auto;
            left: auto;
            width: 100%;
            margin-top: 1rem;
            text-align: center;
        }

        .swiper-pagination-bullet {
            background-color: #d8d2f0;
            opacity: 1;
            width: 12px;
            height: 12px;
            margin: 0 4px;
        }

        .swiper-pagination-bullet-active {
            background-color: #e4b100;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiperElements = document.querySelectorAll('.mySwiper');
        swiperElements.forEach(function(element) {
            const paginationElement = element.parentElement.querySelector('.swiper-pagination');
            new Swiper(element, { loop: true, pagination: { el: paginationElement, clickable: true }, });
        });
    });
    </script>
</head>
<body>
    @include('components.navbar')

    <div class="main-grid">
        <div class="left-column">
            <div class="page-header">
                <a href="javascript:history.back()" class="back-button">&#60;</a>
                <h1 class="page-title">Edit - {{ $campaign->nama }}</h1>
            </div>
            <div><x-swiper-gallery :gambar="$campaign->gambar_campaign" /></div>
            <div class="location-container">
                <h2 class="location-title">Lokasi Campaign</h2>
                <div class="location-text">
                    <svg class="location-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z"/></svg>
                    <span id="lokasi-text">{{ $campaign->lokasi ?? 'Lokasi belum ditentukan' }}</span>
                </div>
            </div>
        </div>

        <div class="right-column">

            {{-- Notifikasi akan muncul di sini jika ada session flash --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                 <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-container" id="campaign-form" action="{{ route('campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label class="form-label">Gambar Campaign (Maks. 3)</label>
                <div id="gambar-preview-container" style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center; margin-bottom: 1rem;">
                    @foreach($campaign->gambar_campaign as $gambar)
                        <div class="gambar-item-lama" data-id="{{ $gambar->id }}" style="position:relative; display:inline-block;">
                            <img src="{{ filter_var($gambar->gambar, FILTER_VALIDATE_URL) ? $gambar->gambar : asset('storage/' . $gambar->gambar) }}" alt="Gambar Campaign" style="width:110px; height:80px; object-fit:cover; border-radius:8px; border:1px solid #ccc;">
                            <button type="button" onclick="removeOldImage(this)" style="position:absolute;top:2px;right:2px;background:#fff;border:none;border-radius:50%;width:22px;height:22px;display:flex;align-items:center;justify-content:center;cursor:pointer;"><span style="color:#810000;font-size:18px;">&times;</span></button>
                        </div>
                    @endforeach
                </div>

                <label for="gambar-latar-input" id="gambar-latar-label" style="cursor:pointer; display:inline-block; padding: 8px 12px;background-color: #ebe8e8; border-radius: 8px; border: 1px solid #ccc;">
                    + Tambah Gambar
                </label>
                <input type="file" name="gambar_latar[]" accept="image/*" class="hidden" id="gambar-latar-input" multiple>
                <div id="gambar-dihapus-container" style="display: none;"></div>

                <label class="form-label mt-4">Nama Campaign</label>
                <input
                    type="text"
                    name="nama_campaign"
                    placeholder="Nama Campaign"
                    class="input-form-custom focus:ring-2 focus:ring-[#810000]"
                    value="{{ old('nama_campaign', $campaign->nama) }}"
                    required
                />

                <label class="form-label">Deskripsi Campaign</label>
                <textarea
                    class="input-form-custom focus:ring-2 focus:ring-[#810000]"
                    name="deskripsi_campaign"
                    placeholder="Ganti deskripsi campaign"
                    required
                >{{ old('deskripsi_campaign', $campaign->deskripsi) }}</textarea>

                <label class="form-label">Waktu Pelaksanaan</label>
                <div class="form-date-container">
                    <input
                        type="text"
                        class="input-form-custom focus:ring-2 focus:ring-[#810000]"
                        name="waktu"
                        id="waktu"
                        placeholder="Ganti tanggal & jam pelaksanaan"
                        required
                        value="{{ old('waktu', $campaign->waktu ? \Carbon\Carbon::parse($campaign->waktu)->format('d-m-Y H:i') : '' ) }}"
                        style="cursor:pointer;"
                    >
                </div>

                <label class="form-label">Kuota Partisipan</label>
                <input
                    type="number"
                    class="input-form-custom focus:ring-2 focus:ring-[#810000]"
                    name="kuota_partisipan"
                    min="1"
                    placeholder="Ganti kuota partisipan"
                    value="{{ old('kuota_partisipan', $campaign->kuota_partisipan) }}"
                    required
                />

                <label class="form-label">Lokasi Campaign</label>
                <div style="position:relative;">
                    <input
                        type="text"
                        class="input-form-custom focus:ring-2 focus:ring-[#810000]"
                        name="alamat_campaign"
                        id="alamat-campaign"
                        placeholder="Ganti alamat atau cari lokasi..."
                        required
                        value="{{ old('alamat_campaign', $campaign->lokasi) }}"
                    />
                    <div id="suggestion-box" class="suggestion-box" style="display:none;"></div>
                </div>
                <div class="location-container">
                    <div id="map" style="height: 180px; border-radius: 0.75rem; margin-top: 0.5rem;"></div>
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <button type="submit" class="form-submit-btn">Simpan</button>
            </form>
        </div>
    </div>

    <div id="modal-success" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm hidden">
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <button onclick="document.getElementById('modal-success').classList.add('hidden')" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">×</button>
            <h2 class="text-2xl md:text-3xl font-bold text-[#225151] text-center mb-2">Perubahan<br>Disimpan!</h2>
            <img src="{{ asset('ilustration.png') }}" class="w-56 md:w-72 mb-6" />
            <a href="{{ url('campaign/' . $campaign->id) }}" class="w-full">
                <button class="w-full bg-[#810000] text-white rounded-full py-3 font-semibold text-base hover:bg-[#a30000] transition mb-3">Lihat Campaign</button>
            </a>
            <a href="{{ url('/dashboard') }}" class="w-full">
                <button class="w-full border-2 border-[#810000] text-[#810000] rounded-full py-3 font-semibold text-base hover:bg-[#f5eaea] transition">Kembali ke beranda</button>
            </a>
        </div>
    </div>
    <div id="modal-error" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm hidden">
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg flex flex-col items-center px-10 py-8 relative max-w-md w-full">
            <button onclick="document.getElementById('modal-error').classList.add('hidden')" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">×</button>
            <h2 class="text-2xl md:text-3xl font-bold text-[#a30000] text-center mb-2">Perubahan<br>Gagal Disimpan!</h2>
            <img src="{{ asset('ilustration.png') }}" class="w-56 md:w-72 mb-6" />
            <div id="modal-error-message" class="w-full text-center text-[#a30000] font-semibold mb-4"></div>
            <button onclick="document.getElementById('modal-error').classList.add('hidden')" class="w-full bg-[#f5eaea] text-[#a30000] rounded-full py-3 font-semibold text-base hover:bg-[#ffeaea] transition mb-3">Tutup</button>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan modal jika ada session flash
            @if(session('success'))
                document.getElementById('modal-success').classList.remove('hidden');
            @endif
            @if(session('error'))
                const modalError = document.getElementById('modal-error');
                const modalErrorMessage = document.getElementById('modal-error-message');
                modalErrorMessage.textContent = "{{ session('error') }}";
                modalError.classList.remove('hidden');
            @endif

            // --- LOGIKA GAMBAR ---
            const imageInput = document.getElementById('gambar-latar-input');
            const previewContainer = document.getElementById('gambar-preview-container');
            const uploadLabel = document.getElementById('gambar-latar-label');
            const deletedContainer = document.getElementById('gambar-dihapus-container');
            const form = document.getElementById('campaign-form');
            const MAX_IMAGES = 3;
            let currentFiles = new DataTransfer();

            function updateUploadButtonVisibility() {
                const currentImageCount = previewContainer.children.length;
                uploadLabel.style.display = currentImageCount >= MAX_IMAGES ? 'none' : 'inline-block';
            }

            imageInput.addEventListener('change', function(event) {
                const files = Array.from(event.target.files);
                const currentImageCount = previewContainer.children.length;
                const allowedNewCount = MAX_IMAGES - currentImageCount;

                if (files.length > allowedNewCount) {
                    alert(`Anda hanya bisa menambahkan ${allowedNewCount} gambar lagi.`);
                }

                // Ambil hanya file yang diizinkan
                const filesToAdd = files.slice(0, allowedNewCount);

                filesToAdd.forEach(file => {
                    // Tambahkan file ke DataTransfer untuk di-submit
                    currentFiles.items.add(file);

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const div = document.createElement('div');
                        div.className = 'gambar-item-baru';
                        div.style.cssText = 'position:relative; display:inline-block;';
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Gambar Baru" style="width:110px; height:80px; object-fit:cover; border-radius:8px;">
                            <button type="button" class="hapus-gambar-baru" style="position:absolute;top:2px;right:2px;background:#fff;border:none;border-radius:50%;width:22px;height:22px;display:flex;align-items:center;justify-content:center;cursor:pointer;">&times;</button>
                        `;
                        // Lampirkan file asli ke elemen untuk dihapus nanti
                        div._file = file;
                        previewContainer.appendChild(div);
                        updateUploadButtonVisibility();
                    };
                    reader.readAsDataURL(file);
                });

                // Update file input dengan file yang sudah dikelola
                imageInput.files = currentFiles.files;
            });

            // Event delegation untuk menghapus pratinjau gambar baru
            previewContainer.addEventListener('click', function(e) {
                if (e.target.closest('.hapus-gambar-baru')) {
                    const itemToRemove = e.target.closest('.gambar-item-baru');
                    const fileToRemove = itemToRemove._file;

                    // Buat DataTransfer baru tanpa file yang dihapus
                    const newFiles = new DataTransfer();
                    for (let i = 0; i < currentFiles.files.length; i++) {
                        if (currentFiles.files[i] !== fileToRemove) {
                            newFiles.items.add(currentFiles.files[i]);
                        }
                    }
                    // Ganti file list yang ada
                    currentFiles = newFiles;
                    imageInput.files = currentFiles.files;

                    itemToRemove.remove();
                    updateUploadButtonVisibility();
                }
            });

            window.removeOldImage = function(button) {
                const item = button.parentElement;
                const imageId = item.dataset.id;

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'gambar_dihapus[]';
                hiddenInput.value = imageId;
                deletedContainer.appendChild(hiddenInput);

                item.remove();
                updateUploadButtonVisibility();
            }

            updateUploadButtonVisibility();

            // MENCEGAH SUBMIT FORM SAAT ENTER
            const formInputs = form.querySelectorAll('input, textarea');
            formInputs.forEach(input => {
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        return false;
                    }
                });
            });

            // DATE PICKER & MAPS
            flatpickr("#waktu", { enableTime: true, dateFormat: "d-m-Y H:i", time_24hr: true, locale: "id" });
            var defaultLat = {{ optional($campaign)->latitude ?? -7.2819 }};
            var defaultLng = {{ optional($campaign)->longitude ?? 112.7953 }};
            var map = L.map('map').setView([defaultLat, defaultLng], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap contributors' }).addTo(map);
            var marker = L.marker([defaultLat, defaultLng], {draggable:true}).addTo(map);
            document.getElementById('latitude').value = defaultLat;
            document.getElementById('longitude').value = defaultLng;

        });
    </script>
</body>
</html>
