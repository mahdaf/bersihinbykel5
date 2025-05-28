<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Campaign</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800">

    {{-- NAVBAR --}}
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col md:flex-row gap-8">
        {{-- LEFT SIDE (IMAGE & TITLE) --}}
        <div class="w-full md:w-2/3">
            <button class="mb-4 text-gray-600 hover:text-gray-900">
                ←
            </button>

            <h2 class="text-2xl font-bold mb-4">Edit Campaign</h2>

            <div class="relative">
                <img src="https://source.unsplash.com/featured/?cleaning" alt="Campaign" class="rounded-lg w-full object-cover shadow-md h-72">
                <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-2">
                    <span class="w-3 h-3 bg-purple-400 rounded-full"></span>
                    <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                    <span class="w-3 h-3 bg-gray-300 rounded-full"></span>
                </div>
            </div>

            <div class="mt-6">
                <p class="font-semibold">Lokasi Campaign</p>
                <div class="flex items-center text-sm text-gray-600 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.1046 0 2-.8954 2-2s-.8954-2-2-2-2 .8954-2 2 .8954 2 2 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2c4.9706 0 9 4.0294 9 9 0 7-9 11-9 11S3 18 3 11c0-4.9706 4.0294-9 9-9z" />
                    </svg>
                    Institut Teknologi Sepuluh Nopember, Keputih, Sukolilo,...
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE (FORM) --}}
        <div class="w-full md:w-1/3 space-y-4">
            <div class="bg-blue-50 p-4 rounded-lg">
                <label class="text-sm text-blue-700 font-medium block">Nama campaign</label>
                <p class="text-gray-800 mt-1">Jalanan Bersih</p>
            </div>

            <div class="bg-blue-50 p-4 rounded-lg">
                <label class="text-sm text-blue-700 font-medium block">Deskripsi campaign</label>
                <p class="text-gray-800 mt-1 text-sm">
                    Jalanan bersih adalah campaign baru yang diusung Bebersih.sby dan berlokasi di sekitar daerah A.Yani, bersama pemkot dan masyarakat.
                </p>
            </div>

            <div class="bg-blue-50 p-4 rounded-lg flex items-center justify-between">
                <span class="text-blue-700 font-medium text-sm">Pilih tanggal</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>

            <div class="bg-blue-50 p-4 rounded-lg">
                <label class="text-sm text-blue-700 font-medium block">Syarat dan Ketentuan</label>
                <ul class="list-decimal list-inside text-sm text-gray-800 mt-1">
                    <li>membawa sarung tangan karet</li>
                    <li>menggunakan boots</li>
                    <li>membawa kantung plastik minimal 2</li>
                    <li>menggunakan masker</li>
                </ul>
            </div>

            <button class="bg-red-800 text-white w-full py-2 rounded-lg font-semibold hover:bg-red-900 transition">
                Simpan
            </button>
        </div>
    </div>

</body>
</html>