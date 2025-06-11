@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
<div class="flex flex-col md:flex-row items-center justify-center min-h-screen bg-gray-50">
    <!-- Gambar di kiri -->
    <div class="hidden md:block md:w-1/2 lg:w-2/5">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
             alt="Campaign" class="object-cover w-full h-[500px] rounded-l-2xl shadow-lg" />
    </div>
    <!-- Form di kanan -->
    <div class="w-full md:w-1/2 lg:w-2/5 bg-white p-8 rounded-2xl shadow-lg h-[500px] flex flex-col justify-center">
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar Partisipan Campaign</h2>
        <form method="POST" action="{{ route('partisipan.store', $campaign_id) }}" class="flex-1 flex flex-col justify-center">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-6">
                <label class="block mb-1 font-semibold">Nomor Telepon</label>
                <input type="text" name="nomorTelepon" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="w-full bg-red-700 text-white py-2 rounded hover:bg-red-800 transition">Daftar</button>
        </form>
    </div>
</div>
@endsection