<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="background: var(--surface); border-bottom: 1px solid var(--border); height: 64px; padding: 0 24px; box-shadow: 0 4px 24px rgba(0,0,0,0.3); position: relative; z-index: 100;">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3 d-md-none"
            style="color:var(--muted); width:36px; height:36px; background:var(--surface-2); border:1px solid var(--border) !important; border-radius:8px !important; display:flex; align-items:center; justify-content:center; padding:0 !important;">
        <i class="fa fa-bars" style="font-size:13px;"></i>
    </button>

    <!-- Brand name on mobile -->
    <span class="d-md-none" style="font-family:var(--font-d); font-weight:800; font-size:15px; color:var(--text); margin-right:auto; letter-spacing:0.02em;">
        Petchemparts
    </span>

    <!-- Right Nav -->
    <ul class="navbar-nav ml-auto align-items-center" style="gap:6px;">

        <!-- Home Link -->
        <li class="nav-item">
            <a href="{{route('home')}}" target="_blank"
               class="topbar-icon-btn"
               style="width:36px; height:36px; background:var(--surface-2); border:1px solid var(--border); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--muted); font-size:13px; text-decoration:none; transition:all 0.2s;"
               title="View Site"
               onmouseover="this.style.background='var(--accent-dim)'; this.style.borderColor='rgba(0,194,255,0.3)'; this.style.color='var(--accent)'"
               onmouseout="this.style.background='var(--surface-2)'; this.style.borderColor='var(--border)'; this.style.color='var(--muted)'">
                <i class="fas fa-external-link-alt" style="font-size:12px;"></i>
            </a>
        </li>

        <!-- Messages -->
        <li class="nav-item dropdown no-arrow mx-1" id="messageT" data-url="{{route('messages.five')}}">
            @include('backend.message.message')
        </li>

        <!-- Divider -->
        <div class="topbar-divider d-none d-sm-block"
             style="border-left:1px solid var(--border); height:28px; margin:0 10px;"></div>

        <!-- User Dropdown -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#"
               id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               style="display:flex; align-items:center; gap:10px; padding:4px 8px; border-radius:10px; transition:background 0.2s;"
               onmouseover="this.style.background='var(--surface-2)'"
               onmouseout="this.style.background='transparent'">

                <!-- Avatar -->
                <div style="position:relative;">
                    @if(Auth()->user()->photo)
                        <img src="{{Auth()->user()->photo}}"
                             style="width:34px; height:34px; border-radius:8px; object-fit:cover; border:2px solid var(--border-2);">
                    @else
                        <img src="{{asset('backend/img/avatar.png')}}"
                             style="width:34px; height:34px; border-radius:8px; object-fit:cover; border:2px solid var(--border-2);">
                    @endif
                    <!-- Online dot -->
                    <span style="position:absolute; bottom:-1px; right:-1px; width:9px; height:9px; background:var(--green); border-radius:50%; border:2px solid var(--surface);"></span>
                </div>

                <!-- Name + role -->
                <span class="d-none d-lg-flex flex-column" style="line-height:1.2; align-items:flex-start;">
                    <span style="font-family:var(--font-d); font-size:13.5px; font-weight:700; color:var(--text);">
                        {{Auth()->user()->name}}
                    </span>
                    <span style="font-family:var(--font-m); font-size:9.5px; color:var(--muted); letter-spacing:0.1em; text-transform:uppercase;">
                        Administrator
                    </span>
                </span>

                <i class="fas fa-chevron-down d-none d-lg-block" style="font-size:9px; color:var(--dim); margin-left:2px;"></i>
            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown"
                 style="background:var(--surface-2); border:1px solid var(--border-2); border-radius:14px; box-shadow:0 20px 60px rgba(0,0,0,0.6); padding:8px; min-width:210px; margin-top:8px;">

                <!-- User info header -->
                <div style="padding:12px 14px 14px; border-bottom:1px solid var(--border); margin-bottom:6px;">
                    <div style="font-family:var(--font-d); font-size:14px; font-weight:700; color:var(--text);">{{Auth()->user()->name}}</div>
                    <div style="font-family:var(--font-m); font-size:10px; color:var(--muted); letter-spacing:0.08em;">{{Auth()->user()->email ?? 'admin@petchemparts.com'}}</div>
                </div>

                <a class="dropdown-item" href="{{route('admin-profile')}}"
                   style="display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:8px; font-size:13.5px; font-weight:500; color:var(--muted); font-family:var(--font-b); text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'"
                   onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'">
                    <i class="fas fa-user-circle" style="font-size:13px; width:16px; color:var(--dim);"></i>
                    My Profile
                </a>

                <a class="dropdown-item" href="{{route('change.password.form')}}"
                   style="display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:8px; font-size:13.5px; font-weight:500; color:var(--muted); font-family:var(--font-b); text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'"
                   onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'">
                    <i class="fas fa-key" style="font-size:13px; width:16px; color:var(--dim);"></i>
                    Change Password
                </a>

                <a class="dropdown-item" href="{{route('settings')}}"
                   style="display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:8px; font-size:13.5px; font-weight:500; color:var(--muted); font-family:var(--font-b); text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='var(--accent-dim)'; this.style.color='var(--accent)'"
                   onmouseout="this.style.background='transparent'; this.style.color='var(--muted)'">
                    <i class="fas fa-cog" style="font-size:13px; width:16px; color:var(--dim);"></i>
                    Settings
                </a>

                <div style="border-top:1px solid var(--border); margin:6px 0;"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   style="display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:8px; font-size:13.5px; font-weight:500; color:var(--red); font-family:var(--font-b); text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.background='rgba(255,71,87,0.1)'"
                   onmouseout="this.style.background='transparent'">
                    <i class="fas fa-sign-out-alt" style="font-size:13px; width:16px;"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>