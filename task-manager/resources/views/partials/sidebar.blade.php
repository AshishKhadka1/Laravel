<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <span class="brand">Menu</span>
        <button id="toggle-btn" class="toggle-btn">
            <i class="bi bi-list"></i>
        </button>
    </div>
    <hr>
    <ul class="nav-links">
        <li>
            <a href="{{ route('tasks.list') }}">
                <i class="bi bi-list-task"></i>
                <span class="link-text">My Tasks</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tasks.create') }}">
                <i class="bi bi-plus-circle"></i>
                <span class="link-text">Add Task</span>
            </a>
        </li>
    </ul>
</aside>
