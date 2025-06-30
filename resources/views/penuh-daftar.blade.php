@extends('layouts.app')

@section('title', 'Berhasil Daftar Campaign')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-[#DDEDEE] p-10">
    <div class="bg-white rounded-xl shadow max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">
        <!-- Gambar di kiri -->
        <div>
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                alt="Campaign"
                class="object-cover w-full h-full rounded-r-none shadow-lg" />
        </div>

        <!-- Konten di kanan -->
        <div class="flex-1 py-8 px-20 flex flex-col justify-center">
            <h1 class="text-4xl font-bold text-center text-[#224344]">Campaign Penuh!</h2>
                <img class="w-full max-w-sm mx-auto object-contain" src="/welcome.png" alt="">
                <button type="submit" class="my-2 w-full bg-white text-[#810000] border-2 border-[#810000] py-2 rounded-full transition cursor-pointer">
                    Kembali ke beranda
                </button>
        </div>
    </div>
    @endsection