    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        @vite('resources/css/app.css')
    </head>

    <body class="mb-20">
        @include('components.navbar')
        <div class="mx-20 pt-20 flex items-center gap-4 ">
            @include('components.searchbar')
            @include('components.filterbutton')
        </div>
        <main class="mx-20 pt-10">
            <div class="mb-4 pr-8 flex items-center justify-between">
                <h1 class="text-[32px] font-[700] text-black" style="font-family: 'Poppins', sans-serif !important;">
                    CAMPAIGN YANG TERDAFTAR
                </h1>
                <a href="#" class="text-[16px] text-[#810000] hover:underline font-[600]"
                    style="font-family: 'Roboto', sans-serif;">
                    LIHAT SEMUA
                </a>
            </div>


            {{-- Grid Campaign --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-7">
                @include('components.campaign-item')
                @include('components.campaign-item')
            </div>
        </main>
         <main class="mx-20 pt-15">
            <div class="mb-4 pr-8 flex items-center justify-between">
                <h1 class="text-[32px] font-[700] text-black" style="font-family: 'Poppins', sans-serif !important;">
                    CAMPAIGN REKOMENDASI
                </h1>
                <a href="#" class="text-[16px] text-[#810000] hover:underline font-[600]"
                    style="font-family: 'Roboto', sans-serif;">
                    LIHAT SEMUA
                </a>
            </div>


            {{-- Grid Campaign --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-7">
                @include('components.campaign-item')
                @include('components.campaign-item')
                @include('components.campaign-item')
            </div>
        </main>
    </body>

    </html>
