<style>
/* Sidebar wrapper */
.sidebar {
    background-color: #fff !important;
}

/* Brand text */
.sidebar .sidebar-brand-text {
    font-weight: 600;
    color: #000;
}

/* Nav links */
.sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #333 !important;
    padding: 12px 20px;
    font-size: 14px;
}

/* Icons */
.sidebar .nav-link i {
    color: #6c757d;
    font-size: 14px;
}

/* Text */
.sidebar .nav-link span {
    color: #333;
}

/* Hover */
.sidebar .nav-link:hover {
    background-color: #e7ecff;
    color: #4e73df !important;
}

/* Active */
.sidebar .nav-item.active .nav-link {
    background-color: #13A1F3;
    color: #fff !important;
}

.sidebar .nav-item.active .nav-link i,
.sidebar .nav-item.active .nav-link span {
    color: #fff !important;
}

/* Divider */
.sidebar-divider {
    border-color: #ddd;
}
</style>

<ul class="navbar-nav sidebar accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
        <div class="sidebar-brand-text mx-3">User</div>
    </a>

    <!-- Profile -->
    <li class="nav-item {{ request()->routeIs('user-profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user-profile') }}">
            <i class="fas fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>

    <!-- Orders -->
    <li class="nav-item {{ request()->routeIs('user.order.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.order.index') }}">
            <i class="fas fa-box"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Toggle -->
    <!--<div class="text-center d-none d-md-inline">-->
    <!--    <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
    <!--</div>-->

</ul>
