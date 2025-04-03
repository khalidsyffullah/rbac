<aside id="sidebar">
    <div class="d-flex ">
        <button class="toggle-btn" type="button">
            <i class="bi bi-grid"></i>
        </button>
        <div class="sidebar-logo">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="bi bi-list-check"></i>
                <span>Task</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#admin-settings" aria-expanded="false" aria-controls="admin-settings">
                <i class="bi bi-shield-lock"></i>
                <span>Admin Settings</span>
            </a>
            <ul id="admin-settings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('users.index') }}" class="sidebar-link">
                        <i class="bi bi-people"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('roles.index') }}" class="sidebar-link">
                        <i class="bi bi-key"></i>
                        <span>Roles and permissions</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer">
        <!-- Move the dropdown list above the toggle link so that it opens upward -->
        <ul id="admin-profile" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
            data-bs-target="#admin-profile" aria-expanded="false" aria-controls="admin-profile">
            <i class="bi bi-person-circle"></i>
            <span>{{ Auth::user()->name }}</span>
        </a>
    </div>
</aside>












