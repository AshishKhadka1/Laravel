<div id="sidebar" class="sidebar shadow-sm">
    {{-- Sidebar Toggle Button --}}
    <button id="sidebarToggle" class="sidebar-toggle-btn">
        <i class="bi bi-list"></i>
    </button>

    <h5 class="sidebar-title"><i class="bi bi-grid"></i> Dashboard</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="bi bi-house me-2"></i> Home
            </a>
        </li>

        @if (Auth::user()->is_admin === 1)
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="bi bi-list-ul me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.create') }}" class="nav-link">
                    <i class="bi bi-plus-circle me-2"></i> Add News
                </a>
            </li>
            <li class="nav-item">
                <a href=" route('admin.users.index') }}" class="nav-link">
                    <i class="bi bi-people me-2"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="bi bi-tags me-2"></i> Categories
                </a>
            </li>
        @else
            @auth
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link">
                        <i class="bi bi-list-ul me-2"></i> All News
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news.create') }}" class="nav-link">
                        <i class="bi bi-plus-circle me-2"></i> Add News
                    </a>
                </li>
            @endauth
        @endif
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("sidebarToggle");
        const contentWrapper = document.querySelector(".content-wrapper");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("collapsed");
            if(contentWrapper){
                contentWrapper.classList.toggle("full");
            }
        });
    });
</script>
