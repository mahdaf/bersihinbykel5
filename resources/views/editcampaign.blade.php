<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Campaign</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800">

  {{-- NAVBAR --}}
  @include('components.navbar')

  <div class="max-w-7xl mx-auto px-6 py-10 flex flex-col lg:flex-row gap-10 items-stretch">
    
    {{-- LEFT COLUMN --}}
    <div class="flex-1 flex flex-col gap-6">
      {{-- Header --}}
      <div class="flex items-center gap-2">
        <button class="text-gray-600 hover:text-gray-900 text-xl">
          &larr;
        </button>
        <h2 class="text-2xl font-bold">Edit Campaign</h2>
      </div>

      {{-- Gambar placeholder --}}
      <div class="bg-[#E4F9F5] rounded-lg p-4 flex justify-center items-center h-48 w-full">
        <div class="border-2 border-dashed border-[#B2EBF2] rounded-lg w-full h-full flex justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#50C7B8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3H8a2 2 0 00-2 2v2h12V5a2 2 0 00-2-2z" />
          </svg>
        </div>
      </div>

      {{-- Map placeholder --}}
      <div class="bg-gray-100 rounded-lg flex-1"></div>
    </div>

    {{-- RIGHT FORM --}}
    <div class="flex-1 flex flex-col space-y-4">
      <form class="flex flex-col gap-4 h-full">

        {{-- Nama Campaign --}}
        <div class="bg-[#E4F9F5] rounded-xl p-4">
          <label class="text-sm font-medium text-[#50C7B8] block mb-1">Nama campaign</label>
          <input
            type="text"
            name="name"
            placeholder="Jalanan Bersih"
            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#50C7B8]"
          >
        </div>

        {{-- Deskripsi --}}
        <div class="bg-[#E4F9F5] rounded-xl p-4">
          <label class="text-sm font-medium text-[#50C7B8] block mb-1">Deskripsi campaign</label>
          <textarea
            name="description"
            rows="4"
            placeholder="Jalanan bersih adalah campaign…"
            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#50C7B8]"
          ></textarea>
        </div>

        {{-- Pilih Tanggal --}}
        <div class="bg-[#E4F9F5] rounded-xl p-4 flex items-center justify-between">
          <label class="text-sm font-medium text-[#50C7B8]">Pilih tanggal</label>
          <input
            type="date"
            name="date"
            class="bg-white border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#50C7B8]"
          >
        </div>

        {{-- Syarat & Ketentuan --}}
        <div class="bg-[#E4F9F5] rounded-xl p-4 flex-1">
          <label class="text-sm font-medium text-[#50C7B8] block mb-2">Syarat dan Ketentuan</label>
          <textarea
            name="terms"
            rows="6"
            placeholder="Membawa sarung tangan karet, menggunakan boots, membawa kantung plastik minimal 2, dan menggunakan masker."
            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#50C7B8]"
          ></textarea>
        </div>

        {{-- Submit --}}
        <button
          type="submit"
          class="block w-full bg-[#BF1E2E] text-white py-3 rounded-full font-semibold hover:bg-red-700 transition"
        >
          Simpan
        </button>
      </form>
    </div>
  </div>

</body>
</html>
