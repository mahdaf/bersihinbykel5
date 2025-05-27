<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    @vite('resources/css/app.css')
</head>
<body>
    {{-- Include langsung navbar --}}
    @include('components.navbar')

    <main class="p-6 max-w-xl mx-auto bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Profil Pengguna</h1>
        <div class="flex flex-row gap-5 items-center justify-center w-full mb-6">
            <div>
                <img src="https://ui-avatars.com/api/?name=Nama+Pengguna" alt="Foto Profil" class="w-24 h-24 rounded-full mr-6 border-2 border-gray-300">
            </div>
            <div class="flex flex-col">
            <h2 class="text-xl font-semibold">Nama Pengguna</h2>
            <p class="text-gray-600">email@email.com</p>
            </div>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Nomor Telepon:</label>
            <p class="text-gray-700">081234567890</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Alamat:</label>
            <p class="text-gray-700">Jl. Contoh Alamat No. 123, Kota</p>
        </div>
        <div class="mb-4">
            <label class="block font-medium">Tanggal Lahir:</label>
            <p class="text-gray-700">01 Januari 2000</p>
        </div>
        <div class="flex gap-2 mt-6">
            <a href="#" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit Profil</a>
            <a href="#" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Ganti Password</a>
        </div>
    </main>
</body>
</html>
