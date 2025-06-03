<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun Baru</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen my-10">

    <div class="flex flex-col items-center justify-center min-h-screen pt-4">
        <div class="flex flex-col items-center w-full">
            <img src="{{ asset('Logo.png') }}" alt="Logo" class="h-14 mb-4" />
            <h1 class="text-2xl md:text-3xl font-bold text-black text-center mb-2 mt-2">Buat Akun Baru</h1>
            <p class="text-gray-500 text-base text-center mb-8">
                Lengkapi data-data berikut untuk mendaftar akun.
            </p>
            <form method="POST" action="{{ route('account/register') }}" class="w-full max-w-md flex flex-col gap-4">
                @csrf
                <input type="text" name="name" placeholder="Nama lengkap"
                    class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                <input type="email" name="email" placeholder="Email"
                    class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                <div class="relative">
                    <input type="password" name="password" placeholder="Kata sandi"
                        class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#55A7AA] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10 0-1.657.336-3.234.938-4.675m2.062 2.675A9.956 9.956 0 0112 3c5.523 0 10 4.477 10 10 0 1.657-.336 3.234-.938 4.675m-2.062-2.675A9.956 9.956 0 0112 21c-5.523 0-10-4.477-10-10 0-1.657.336-3.234.938-4.675" /></svg>
                    </span>
                </div>
                <div class="relative">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi"
                        class="rounded-xl py-3 px-5 w-full bg-[#DDEDEE] text-[#55A7AA] placeholder-[#55A7AA] focus:outline-none focus:ring-2 focus:ring-[#810000] text-base" required>
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#55A7AA] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-5.523 0-10-4.477-10-10 0-1.657.336-3.234.938-4.675m2.062 2.675A9.956 9.956 0 0112 3c5.523 0 10 4.477 10 10 0 1.657-.336 3.234-.938 4.675m-2.062-2.675A9.956 9.956 0 0112 21c-5.523 0-10-4.477-10-10 0-1.657.336-3.234.938-4.675" /></svg>
                    </span>
                </div>
                <div class="flex items-center mt-2 mb-2">
                    <input type="checkbox" id="terms" name="terms" class="mr-2 w-5 h-5 rounded border-gray-300 focus:ring-[#810000]">
                    <label for="terms" class="text-gray-700 text-sm">Saya setuju dengan syarat dan ketentuan yang berlaku</label>
                </div>
                <button type="submit" class="w-full bg-[#810000] text-white rounded-full py-3 font-semibold text-base hover:bg-[#a30000] transition mt-2">
                    Daftar
                </button>
            </form>
            <div class="text-center mt-8">
                <p class="text-black text-base">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-[#810000] font-semibold">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
</html>
