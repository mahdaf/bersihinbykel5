    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profil</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        {{-- Include langsung navbar --}}
        @include('components.navbar')

        <main class="p-6">
            <h1 class="text-xl font-bold mb-2">Profil</h1>
            <p class="mb-6">Ini profil</p>
        </main>
    </body>
    </html>
