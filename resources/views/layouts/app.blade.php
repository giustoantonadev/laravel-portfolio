<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Portfolio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(180deg, #0d0d0d, #1a1a1a);
            color: #e6e6e6;
            font-family: 'Inter', sans-serif;
        }

        /* Public navbar */
        .public-navbar {
            backdrop-filter: blur(10px);
            background: rgba(15, 15, 15, 0.7);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .nav-link {
            color: #ccc !important;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .public-container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    </style>
</head>

<body>

    {{-- NAVBAR PUBBLICA --}}
    <nav class="navbar navbar-expand-lg public-navbar mb-4">
        <div class="container">

            <a class="navbar-brand text-light" href="/">
                <i class="bi bi-stars me-2"></i> Portfolio
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="publicNavbar">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.projects.index') }}">
                            <i class="bi bi-folder2-open me-1"></i> Projects
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="bi bi-person-circle me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i> Register
                        </a>
                    </li>


                </ul>
            </div>

        </div>
    </nav>

    {{-- CONTENUTO --}}
    <div class="container public-container">
        @yield('content')
    </div>

</body>

</html>