@extends('layouts.app')

@section('title', 'Berhasil Daftar Campaign')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
    <div class="bg-white p-8 rounded-2xl shadow-lg flex flex-col items-center">
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" alt="Berhasil" class="w-32 h-32 mb-6" />
        <h2 class="text-2xl font-bold mb-4 text-center text-green-700">Pendaftaran Berhasil!</h2>
        <p class="mb-8 text-center text-gray-600">Selamat, Anda telah berhasil mendaftar sebagai partisipan campaign ini.</p>
        <a href="{{ url('/campaign/'.$campaign_id) }}"
           class="bg-red-700 text-white px-6 py-2 rounded-md font-semibold hover:bg-red-800 transition">
            Kembali ke Detail Campaign
        </a>
    </div>
</div>
@endsection