<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>

    {{-- Breeze + Bootstrap --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Background moderno */
        body {
            background: #0d0d0d;
            color: #e6e6e6;
            font-family: 'Inter', sans-serif;
        }

        /* Navbar moderna con effetto glass */
        .admin-navbar {
            backdrop-filter: blur(12px);
            background: rgba(20, 20, 20, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Container più arioso */
        .admin-container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* Card moderne */
        .card {
            border: none;
            border-radius: 14px;
        }

        /* Link navbar */
        .nav-link {
            color: #ccc !important;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        /* Brand */
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body style="
    background: linear-gradient(180deg, #0d0d0d, #1a1a1a);
    color: #e6e6e6;
    font-family: 'Inter', sans-serif;">


    {{-- MESSAGGI DI SUCCESSO O ERRORE --}}

    {{-- NAVBAR (partial) --}}
    @include('admin.partials.navbar')

    {{-- CONTENUTO --}}
    <div class="container admin-container">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>