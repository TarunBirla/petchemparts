
<style>
    :root {
    --theme: #13A1F3;
}

/* Theme text */
.text-theme {
    color: var(--theme) !important;
}

/* Theme button */
.btn-theme {
    background: var(--theme);
    color: #fff;
}
.btn-theme:hover {
    background: #0d7ec7;
}

/* Profile image */
.img-profile {
    width: 36px;
    height: 36px;
    object-fit: cover;
}

.border-theme {
    border: 2px solid var(--theme);
}

/* Dropdown icons */
.dropdown-item i {
    color: var(--theme);
}

/* Hover effects */
.navbar .nav-link:hover {
    color: var(--theme);
}

</style>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link text-theme rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small"
                   placeholder="Search for...">
            <div class="input-group-append">
                <button class="btn btn-theme" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Home -->
        <li class="nav-item mx-1">
            <a class="nav-link text-theme" href="{{route('home')}}" target="_blank" data-toggle="tooltip" title="Home">
                <i class="fas fa-home fa-fw"></i>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center"
               href="#" id="userDropdown" role="button" data-toggle="dropdown">

                <span class="mr-2 d-none d-lg-inline text-gray-700 small font-weight-bold">
                    {{ Auth()->user()->name }}
                </span>

                <img class="img-profile rounded-circle border-theme"
                     src="{{ Auth()->user()->photo ?? asset('backend/img/avatar.png') }}">
            </a>

            <!-- Dropdown -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <a class="dropdown-item" href="{{route('user-profile')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2"></i> Profile
                </a>

                <a class="dropdown-item" href="{{route('user.change.password.form')}}">
                    <i class="fas fa-key fa-sm fa-fw mr-2"></i> Change Password
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-danger"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
