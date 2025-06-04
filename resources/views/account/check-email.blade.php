<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-50">

    <main class="flex flex-col items-center bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('Logo.png') }}" alt="Logo" class="h-12"/>
        </div>
        <h1 class="font-semibold text-lg text-black mb-2">Cek Email Kamu</h1>
        <p class="text-center text-gray-500 text-sm leading-relaxed mb-6">
            Cek email kamu untuk link reset password. Jika tidak ada di inbox, cek juga folder spam.
        </p>
        <div class="text-center mt-6">
            <p class="text-sm font-semibold text-black">
                Kembali ke
                <a href="{{ route('login') }}" class="text-[#810000] cursor-pointer">Login</a>
            </p>
        </div>
    </main>

</body>
</html>
