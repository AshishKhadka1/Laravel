<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container-fluid">
        {{-- Brand --}}
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            {{ config('app.name', 'LaravelApp') }}
        </a>

        {{-- Hamburger toggle for mobile --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar links --}}
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary btn-sm fw-semibold" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm fw-semibold ">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary btn-sm fw-semibold" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm fw-semibold text-white" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</header>

<style>
    /* Buttons */
    .navbar .btn-sm {
        border-radius: 20px;
        transition: all 0.2s ease-in-out;
    }

    .navbar .btn-sm:hover {
        transform: translateY(-1px);
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    /* Brand hover */
    .navbar-brand:hover {
        color: #0d6efd;
        text-decoration: none;
    }

    /* Responsive button full width on mobile */
    @media (max-width: 768px) {
        .navbar .btn-sm {
            width: 100%;
            margin-bottom: 8px;
        }
    }
</style>
