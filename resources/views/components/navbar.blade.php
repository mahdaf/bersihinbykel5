<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />


    <!-- Tailwind (via Laravel Vite) -->
    @vite('resources/css/app.css')
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="sticky-top navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <!-- Logo kiri -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="d-inline-block align-text-top">
            </a>

            <!-- Hamburger -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu kanan -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">HOME</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="/profil">PROFIL</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
