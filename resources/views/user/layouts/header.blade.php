<style>
:root {
    --theme: #13A1F3;
}
.topbar {
    background: #ffffff !important;
    border-bottom: 1px solid #e8edf3;
    padding: 0 20px;
    height: 62px;
}
.topbar .navbar-search .input-group {
    border-radius: 8px;
    overflow: hidden;
    border: 1px solid #e8edf3;
    background: #f8fafc;
}
.topbar .navbar-search input {
    background: transparent;
    border: none;
    font-size: 13px;
    padding: 8px 14px;
    color: #374151;
}
.topbar .navbar-search input:focus {
    outline: none;
    box-shadow: none;
}
.topbar .navbar-search .btn-search {
    background: var(--theme);
    border: none;
    color: #fff;
    padding: 0 14px;
    font-size: 13px;
    cursor: pointer;
}
.topbar .navbar-search .btn-search:hover {
    background: #0d7ec7;
}

#sidebarToggleTop {
    background: none;
    border: none;
    color: #6b7280;
    font-size: 18px;
    padding: 8px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.15s;
}
#sidebarToggleTop:hover {
    background: #eef6ff;
    color: var(--theme);
}

.topbar-divider {
    width: 1px;
    height: 30px;
    background: #e8edf3;
    margin: 0 10px;
}

/* Home icon btn */
.topbar-icon-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    color: #6b7280;
    text-decoration: none;
    transition: background 0.15s, color 0.15s;
}
.topbar-icon-btn:hover {
    background: #eef6ff;
    color: var(--theme);
    text-decoration: none;
}

/* User dropdown trigger */
.user-dropdown-toggle {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none !important;
    padding: 4px 8px;
    border-radius: 10px;
    transition: background 0.15s;
}
.user-dropdown-toggle:hover {
    background: #f3f4f6;
}
.user-dropdown-toggle .user-name {
    font-size: 14px;
    font-weight: 600;
    color: #1a1a2e;
}
.user-dropdown-toggle .user-role {
    font-size: 11px;
    color: #9ca3af;
}
.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--theme);
}

/* Dropdown menu */
.topbar .dropdown-menu {
    border: 1px solid #e8edf3;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.10);
    padding: 8px;
    min-width: 200px;
    margin-top: 8px;
}
.topbar .dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    color: #374151;
    transition: background 0.12s;
}
.topbar .dropdown-item i {
    width: 16px;
    text-align: center;
    color: var(--theme);
    font-size: 13px;
}
.topbar .dropdown-item:hover {
    background: #eef6ff;
    color: var(--theme);
}
.topbar .dropdown-item.text-danger {
    color: #ef4444 !important;
}
.topbar .dropdown-item.text-danger i {
    color: #ef4444;
}
.topbar .dropdown-item.text-danger:hover {
    background: #fef2f2;
}
.topbar .dropdown-divider {
    border-color: #f0f0f0;
    margin: 6px 0;
}
</style>

<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

    {{-- Sidebar Toggle --}}
    <!-- <button id="sidebarToggleTop" type="button">
        <i class="fa fa-bars"></i>
    </button> -->

    {{-- Search --}}
    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 navbar-search">
        <div class="input-group">
            <input type="text" placeholder="Search...">
            <div class="input-group-append">
                <button class="btn-search" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    {{-- Right Side --}}
    <ul class="navbar-nav ml-auto align-items-center">

        {{-- Home --}}
        <li class="nav-item mx-1">
            <a class="topbar-icon-btn" href="{{ route('home') }}" target="_blank" title="Go to site">
                <i class="fas fa-home fa-fw"></i>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        {{-- User Dropdown --}}
        <li class="nav-item dropdown no-arrow">
            <a class="user-dropdown-toggle dropdown-toggle" href="#"
               id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-none d-lg-block text-right">
                    <div class="user-name">{{ Auth()->user()->name }}</div>
                    <div class="user-role">{{ ucfirst(Auth()->user()->role ?? 'User') }}</div>
                </div>
                <img class="user-avatar"
                     src="{{ Auth()->user()->photo ?? asset('backend/img/avatar.png') }}"
                     alt="{{ Auth()->user()->name }}">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('user-profile') }}">
                    <i class="fas fa-user"></i> My Profile
                </a>
                <a class="dropdown-item" href="{{ route('user.order.index') }}">
                    <i class="fas fa-box-open"></i> My Orders
                </a>
                <a class="dropdown-item" href="{{ route('user.change.password.form') }}">
                    <i class="fas fa-key"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('topbar-logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="topbar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>