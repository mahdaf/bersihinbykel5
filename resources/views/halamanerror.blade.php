<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="mb-20">
    @include('components.navbar')

    {{-- Error 404 Page --}}
    <div class="min-h-screen bg-white flex flex-col items-center justify-center px-4">
        <div class="text-center space-y-8 max-w-md">
            {{-- Error 404 Title --}}
            <h1 class="text-4xl md:text-5xl font-bold text-[#224344] mb-8">Error 404</h1>

            {{-- Illustration --}}
            <div class="flex justify-center mb-8">
                <img src="{{ asset('ilustration.png') }}" alt="404 Error Illustration" class="max-w-full h-auto" width="400" height="300">
            </div>

            {{-- Back to Homepage Button --}}
            <a href="#" class="inline-block border-2 border-[#810000] text-[#810000] bg-transparent hover:bg-[#810000] hover:text-white rounded-full px-8 py-3 text-base font-medium transition-colors duration-200">
                Kembali ke beranda
            </a>
        </div>
    </div>
</body>

</html>
