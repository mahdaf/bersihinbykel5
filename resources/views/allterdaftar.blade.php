<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Semua Campaign Terdaftar</title>
    @vite('resources/css/app.css')
</head>

<body class="mb-20">
    @include('components.navbar')

    <main class="mx-20 pt-10">
        <div class="mb-4 pr-8 flex items-center justify-between">
            <h1 class="text-[32px] font-[700] text-black"
                style="font-family: 'Poppins', sans-serif !important;">
                SEMUA CAMPAIGN TERDAFTAR
            </h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-7">
            @guest
                <div class="col-span-3 text-center text-gray-500 py-10">Login untuk melihat campaign terdaftar
                </div>
            @else
                @forelse($userCampaigns as $campaign)
                    @include('components.campaign-item', ['campaign' => $campaign])
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-10">Belum ada campaign yang kamu ikuti
                    </div>
                @endforelse
            @endguest
        </div>
    </main>
</body>

</html>
