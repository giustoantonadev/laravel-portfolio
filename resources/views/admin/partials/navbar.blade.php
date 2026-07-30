<nav class="navbar navbar-expand-lg admin-navbar mb-4">
    <div class="container">

        {{-- BRAND --}}
        <a class="navbar-brand text-light fw-bold" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2 me-2"></i> Admin Panel
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- LINKS --}}
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-house-door me-1"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.projects.index') }}">
                        <i class="bi bi-folder2-open me-1"></i> Progetti
                    </a>
                </li>

                <li class="nav-item ms-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>

    </div>
</nav>
