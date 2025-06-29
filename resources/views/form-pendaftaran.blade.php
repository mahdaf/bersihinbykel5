@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
<div class="flex flex-col md:flex-row items-center justify-center min-h-screen bg-[#DDEDEE] p-10">
    <!-- Gambar di kiri -->
    <div class="hidden md:block md:w-1/2 lg:w-2/5 h-[100vh]">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
             alt="Campaign"
             class="object-cover w-full h-full rounded-l-2xl rounded-r-none shadow-lg" />
    </div>
    <!-- Form di kanan -->
    <div class="w-full md:w-1/2 lg:w-2/5 bg-white p-8 rounded-r-2xl rounded-l-none shadow-lg h-[100vh] flex flex-col justify-center">
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Partisipan Campaign</h2>
        <form method="POST" action="{{ route('partisipan.store', $campaign_id) }}" class="flex-1 flex flex-col justify-center">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-600">Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    class="w-full rounded-xl px-3 py-2 bg-[#DDEDEE] text-[#055A7A] focus:ring-2 focus:ring-[#055A7A] focus:outline-none"
                    required
                    value="{{ auth()->user()->namaPengguna ?? '' }}"
                >
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-600">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="w-full rounded-xl px-3 py-2 bg-[#DDEDEE] text-[#055A7A]"
                    required
                    value="{{ old('email', auth()->user()->email ?? '') }}"
                    oninput="validateEmail()"
                >
                <div id="email-error" class="text-red-600 text-sm mt-1"></div>
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-1 font-semibold text-gray-600">Nomor Telepon</label>
                <input
                    type="text"
                    name="nomorTelepon"
                    id="nomorTelepon"
                    class="w-full rounded-xl px-3 py-2 bg-[#DDEDEE] text-[#055A7A]"
                    required
                    maxlength="14"
                    pattern="[0-9]+"
                    inputmode="numeric"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,14); validatePhone()"
                    title="Nomor telepon hanya boleh angka dan maksimal 14 digit"
                    value="{{ old('nomorTelepon', auth()->user()->nomorTelepon ?? '') }}"
                >
                <div id="phone-error" class="text-red-600 text-sm mt-1"></div>
                @error('nomorTelepon')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-600">Motivasi</label>
                <textarea
                    name="motivasi"
                    class="w-full rounded-xl px-3 py-2 bg-[#DDEDEE] text-[#055A7A] focus:ring-2 focus:ring-[#055A7A] focus:outline-none"
                    maxlength="200"
                    rows="3"
                    placeholder="Ceritakan motivasi Anda mengikuti campaign ini"
                >{{ old('motivasi') }}</textarea>
                @error('motivasi')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-[#810000] text-white py-2 rounded-full hover:bg-[#0778A8] transition">
                Daftar
            </button>
        </form>
    </div>
</div>

<script>
function validateEmail() {
    const email = document.getElementById('email').value;
    const errorDiv = document.getElementById('email-error');
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !regex.test(email)) {
        errorDiv.textContent = 'Format email tidak valid.';
    } else {
        errorDiv.textContent = '';
    }
}

function validatePhone() {
    const phone = document.getElementById('nomorTelepon').value;
    const errorDiv = document.getElementById('phone-error');
    if (phone && (!/^[0-9]+$/.test(phone) || phone.length < 9 || phone.length > 15)) {
        errorDiv.textContent = 'FORMAT nomor telepon harus 9-15 digit angka.';
    } else {
        errorDiv.textContent = '';
    }
}
</script>
@endsection