<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'News Portal') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        
    .sidebar {
    width: 250px;
    height: 100vh;
    background: #ffffff;
    border-right: 1px solid #e5e5e5;
    padding: 1rem;
    position: fixed;
    top: 0;
    left: 0;
    transition: all 0.3s ease;
    z-index: 1000;
}

.sidebar.collapsed {
    width: 70px;
}
.sidebar.collapsed .sidebar-title {
    display: none;
}
.sidebar.collapsed .nav-link span,
.sidebar.collapsed .nav-link {
    font-size: 0;
    padding-left: 0.7rem;
}
.sidebar.collapsed .nav-link i {
    font-size: 1.3rem;
    margin: 0 auto;
}

.sidebar-toggle-btn {
    background: #0d6efd;
    border: none;
    color: #fff;
    padding: 0.5rem 0.7rem;
    border-radius: 50%;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}
.sidebar-toggle-btn:hover {
    background: #0b5ed7;
}

.sidebar-title {
    font-weight: bold;
    color: #0d6efd;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
}

.sidebar .nav-link {
    color: #333;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    padding: 0.6rem 0.8rem;
    border-radius: 8px;
    transition: background 0.3s ease, color 0.3s ease;
}
.sidebar .nav-link:hover {
    background: #f1f5ff;
    color: #0d6efd;
}
.sidebar .nav-link i {
    font-size: 1.1rem;
    margin-right: 0.5rem;
}
.sidebar .nav-link.active {
    background: #0d6efd;
    color: #fff;
}

/* ================= Navbar ================= */
.custom-navbar {
    background: linear-gradient(90deg, #0d6efd, #0b5ed7);
    padding: 0.6rem 1rem;
    transition: all 0.3s ease-in-out;
    z-index: 1030;
}

/* Brand */
.custom-navbar .navbar-brand {
    font-size: 1.3rem;
    color: #fff !important;
    transition: color 0.3s ease;
}
.custom-navbar .navbar-brand:hover {
    color: #e2e6ea !important;
}

/* Nav links */
.custom-navbar .nav-link {
    color: #f8f9fa;
    font-weight: 500;
    margin-left: 0.6rem;
    padding: 0.5rem 0.9rem;
    border-radius: 6px;
    transition: background 0.3s ease, color 0.3s ease;
}

/* Logout button */
.logout-btn {
    border: none;
    background: none;
    font-weight: 500;
    padding: 0.5rem 0.9rem;
    border-radius: 6px;
    color: #f8f9fa;
    transition: background 0.3s ease, color 0.3s ease;
}
.logout-btn:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
}

/* Toggler button */
.custom-toggler {
    border: none;
    background: none;
}
.custom-toggler .navbar-toggler-icon {
    filter: brightness(0) invert(1); /* White icon */
}
.custom-toggler:focus {
    box-shadow: none;
}

/* Collapse menu (mobile) */
.asssssssssa {
    transition: max-height 0.3s ease-in-out;
}
@media (max-width: 991px) {
    .custom-navbar .nav-link {
        margin: 0.4rem 0;
        display: block;
        text-align: center;
    }
}

/* ================= Main Content ================= */
.main-content {
    transition: margin-left 0.3s ease, padding 0.3s ease;
    padding: 5rem 1.5rem 1.5rem; /* Top padding = navbar height */
}
/* Sidebar expanded */
#app:not(.no-sidebar):not(.sidebar-collapsed) .main-content,nav {
    margin-left: 250px;
}
/* Sidebar collapsed */
#app.sidebar-collapsed .main-content{
    margin-left: 70px;
}
/* No sidebar (logged out) */
#app.no-sidebar .main-content {
    margin-left: 0;
}

    </style>
</head>
<body>
    <div id="app" class="{{ Auth::check() ? '' : 'no-sidebar' }}">
        @if(Auth::check())
            @include('partials.sidebar')
        @endif

        @include('partials.header')

        <main class="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        @include('partials.footer')
    </div>

    @stack('scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggle-btn'); // in sidebar
        const sidebar = document.getElementById('sidebar');
        const app = document.getElementById('app');

        if (toggleBtn && sidebar && app) {
            // Restore from localStorage
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                app.classList.add('sidebar-collapsed');
            }

            // Toggle
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                app.classList.toggle('sidebar-collapsed');

                // Save state
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            });
        }
    });
    </script>
</body>
</html>
