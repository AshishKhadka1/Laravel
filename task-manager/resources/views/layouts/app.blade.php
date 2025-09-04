<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
<style>

/* Navbar base */
header.navbar {
    padding: 0.8rem 1.5rem;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1050;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

/* Brand */
.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
    letter-spacing: 1px;
    transition: color 0.3s;
}


/* Navbar links */
.navbar-nav .nav-link {
    color: black;
    font-weight: 500;
    margin-left: 15px;
    transition: color 0.3s, background 0.3s, border-radius 0.3s;
    padding: 6px 12px;
    border-radius: 6px;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    background-color: rgba(255,255,255,0.1);
}

/* Logout button styled like link but better */
.navbar-nav .btn-link.nav-link {
    color: black;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 6px;
    transition: background-color 0.3s, color 0.3s;
}

.navbar-nav .btn-link.nav-link:hover {
    background-color: rgba(255,255,255,0.1);
    color: #f87171; /* Red hover for logout */
}

/* Responsive padding */
@media (max-width: 768px) {
    header.navbar {
        padding: 0.6rem 1rem;
    }

    .navbar-nav .nav-link {
        margin-left: 8px;
        padding: 5px 10px;
    }
}


.sidebar {
    width: 220px;
    min-height: 100vh;
    background-color: #212529;
    color: #fff;
    padding: 20px 10px;
    position: fixed;
    top: 0;
    left: 0;
    transition: width 0.3s ease;
}

/* Sidebar collapsed */
.sidebar.collapsed {
    width: 70px;
}

/* Header inside sidebar */
.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

/* Toggle button */
.toggle-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.2rem;
    cursor: pointer;
    padding: 8px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.toggle-btn:hover {
    background-color: #495057;
}

/* Nav links */
.sidebar .nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar .nav-links a {
    display: flex;
    align-items: center;
    padding: 10px 12px;
    color: #adb5bd;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.2s;
}

.sidebar .nav-links a:hover {
    background-color: #495057;
    color: #fff;
}

.sidebar .nav-links i {
    font-size: 1.2rem;
    margin-right: 8px;
    transition: margin 0.3s;
}

/* Hide text when collapsed */
.sidebar.collapsed .link-text {
    display: none;
}

.sidebar.collapsed .nav-links i {
    margin-right: 0;
    text-align: center;
    width: 100%;
}

.sidebar.collapsed .brand {
    display: none;
}

.sidebar.collapsed .sidebar-header {
    justify-content: center;
}

/* Content shift - move all content when sidebar toggles */
#app {
    margin-left: 230px;
    transition: margin-left 0.3s ease;
}

#app.sidebar-collapsed {
    margin-left: 80px;
}

#app.no-sidebar {
    margin-left: 5px;
}
</style>
</head>
<body>
    <div id="app" class="{{ Auth::check() ? '' : 'no-sidebar' }}">
        @if(Auth::check())
            @include('partials.sidebar')
        @endif
        @include('partials.header')
        
        <main class="py-4 main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        
        @include('partials.footer')
    </div>

    @stack('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const app = document.getElementById('app');
        
        if (toggleBtn && sidebar && app) {
            // Check for saved state in localStorage
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                app.classList.add('sidebar-collapsed');
            }
            
            // Toggle functionality
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                app.classList.toggle('sidebar-collapsed');
                
                // Save state to localStorage
                const isNowCollapsed = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarCollapsed', isNowCollapsed);
            });
        }
    });
</script>
</body>
</html>
