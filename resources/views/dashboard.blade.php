    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        {{-- Include langsung navbar --}}
        @include('components.navbar')

        <main class="m-20">
            <h1 class="mb-2 text-[24px] font-[900] text-black" style="font-family: 'Poppins', sans-serif;">
                CAMPAIGN TERDAFTAR
            </h1>


            <p class="mb-6">Selamat datang di dashboard!</p>

            {{-- Grid Campaign --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @include('components.campaign-item')
                @include('components.campaign-item')
                @include('components.campaign-item')
            </div>
        </main>
    </body>

    </html>
