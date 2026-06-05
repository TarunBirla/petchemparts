<style>
.sidebar {
    background: #ffffff !important;
    border-right: 1px solid #e8edf3;
    min-height: 100vh;
    width: 260px !important;
}
.sidebar-brand {
    padding: 22px 20px 18px;
    border-bottom: 1px solid #e8edf3;
    text-decoration: none !important;
    display: flex;
    align-items: center;
    gap: 10px;
}
.sidebar-brand-icon {
    width: 36px;
    height: 36px;
    background: #13A1F3;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.sidebar-brand-icon i {
    color: #fff;
    font-size: 16px;
}
.sidebar-brand-text {
    font-size: 17px;
    font-weight: 700;
    color: #1a1a2e !important;
    letter-spacing: 0.3px;
}

.sidebar-section-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #b0b8c8;
    padding: 18px 20px 6px;
}

.sidebar .nav-item .nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 20px;
    border-radius: 8px;
    margin: 2px 10px;
    font-size: 14px;
    font-weight: 500;
    color: #4b5563 !important;
    transition: background 0.15s, color 0.15s;
    text-decoration: none;
}
.sidebar .nav-item .nav-link i {
    font-size: 15px;
    width: 18px;
    text-align: center;
    color: #9ca3af;
    transition: color 0.15s;
}
.sidebar .nav-item .nav-link:hover {
    background: #eef6ff;
    color: #13A1F3 !important;
}
.sidebar .nav-item .nav-link:hover i {
    color: #13A1F3;
}
.sidebar .nav-item.active .nav-link {
    background: #13A1F3;
    color: #fff !important;
}
.sidebar .nav-item.active .nav-link i {
    color: #fff;
}

.sidebar-divider {
    border: none;
    border-top: 1px solid #e8edf3;
    margin: 10px 20px;
}

.sidebar-toggle-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 14px 20px;
    margin-top: auto;
}
</style>

<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

    {{-- Brand --}}
    <a class="sidebar-brand" href="{{ route('user') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <span class="sidebar-brand-text">My Account</span>
    </a>

    <div class="sidebar-section-label">Main Menu</div>

    {{-- Profile --}}
    <li class="nav-item {{ request()->routeIs('user-profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user-profile') }}">
            <i class="fas fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>

    {{-- Orders --}}
    <li class="nav-item {{ request()->routeIs('user.order.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.order.index') }}">
            <i class="fas fa-box-open"></i>
            <span>My Orders</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-section-label">Account</div>

    {{-- Change Password --}}
    <li class="nav-item {{ request()->routeIs('user.change.password*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.change.password.form') }}">
            <i class="fas fa-key"></i>
            <span>Change Password</span>
        </a>
    </li>

    {{-- Logout --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>