<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<style>
    body {
        font-family: "Poppins", sans-serif;

    }

    :root {
        --theme: #13A1F3;
    }

    .img-profile {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border-radius: 9999px;
        border: 2px solid var(--theme);
    }

    .cart-icon {
        font-size: 22px;
        color: var(--theme);
        position: relative;
        cursor: pointer;
    }

    .cart-icon .badge {
        position: absolute;
        top: -6px;
        right: -8px;
        background: var(--theme);
        color: #fff;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>


@php
    $categories = DB::table('categories')
        ->where('status', 'active')
        ->whereNull('parent_id')
        ->limit(5)
        ->get();

    $subcategories = DB::table('categories')
        ->where('status', 'active')
        ->whereNotNull('parent_id')
        ->get()
        ->groupBy('parent_id');
@endphp

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<style>
    :root {
        --theme: #0EA5E9;
        --theme-dark: #0284C7;
        --theme-light: #E0F2FE;
    }

    /* ── TOPBAR ── */
    .hdr-topbar {
        background: #0F172A;
        height: 36px;
        display: flex;
        align-items: center;
    }

    .hdr-topbar-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        width: 100%;
        display: flex;
        align-items: center;
        gap: 18px;
        font-size: 12.5px;
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hdr-topbar-inner a {
        color: #94A3B8;
        text-decoration: none;
    }

    .hdr-topbar-inner a:hover {
        color: var(--theme);
    }

    .hdr-top-sep {
        width: 1px;
        height: 13px;
        background: #334155;
        flex-shrink: 0;
    }

    .hdr-top-socials {
        margin-left: auto;
        display: flex;
        gap: 14px;
    }

    .hdr-top-socials a {
        font-size: 12px;
    }

    /* ── MAIN HEADER ── */
    .hdr-main {
        background: #fff;
        border-bottom: 1.5px solid #fff;
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        transition: box-shadow 0.3s;
    }

    .hdr-main.scrolled {
        box-shadow: 0 4px 24px rgba(14, 165, 233, 0.10);
    }

    .hdr-main-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        height: 68px;
        display: flex;
        align-items: center;
        gap: 24px;
    }

    /* Logo */
    .hdr-logo img {
        height: 46px;
        width: auto;
        object-fit: contain;
        display: block;
    }

    /* Page Nav Links */
    .hdr-nav {
        display: flex;
        align-items: center;
        gap: 2px;
        margin-left: 12px;
    }

    .hdr-nav a {
        padding: 6px 12px;
        font-size: 13.5px;
        font-weight: 500;
        color: #475569;
        text-decoration: none;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .hdr-nav a:hover {
        color: var(--theme);
        background: var(--theme-light);
    }

    /* Right actions */
    .hdr-actions {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    /* Cart / Request button */
    .hdr-cart-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--theme-light);
        color: var(--theme-dark);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 9px;
        font-size: 13.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
    }

    .hdr-cart-btn:hover {
        background: var(--theme);
        color: #fff;
    }

    .hdr-cart-badge {
        background: #F97316;
        color: #fff;
        font-size: 10.5px;
        font-weight: 800;
        min-width: 18px;
        height: 18px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 4px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* User button */
    .hdr-user-wrap {
        position: relative;
    }

    .hdr-user-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: none;
        border: none;
        padding: 6px 10px;
        border-radius: 9px;
        cursor: pointer;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: background 0.2s;
    }

    .hdr-user-btn:hover {
        background: #F8FAFC;
    }

    .hdr-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--theme);
        display: block;
    }

    .hdr-user-name {
        font-size: 13.5px;
        font-weight: 600;
        color: #1E293B;
        max-width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* User dropdown */
    #userDropdown {
        position: absolute;
        right: 0;
        top: calc(100% + 8px);
        width: 188px;
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 12px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10);
        z-index: 9999;
        overflow: hidden;
        animation: hdrDropIn 0.18s ease;
    }

    #userDropdown.hidden {
        display: none;
    }

    #userDropdown a {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 10px 15px;
        font-size: 13.5px;
        color: #334155;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        border-bottom: 1px solid #F8FAFC;
        transition: background 0.15s;
    }

    #userDropdown a:last-child {
        border-bottom: none;
    }

    #userDropdown a:hover {
        background: #F8FAFC;
    }

    #userDropdown a.hdr-logout {
        color: #EF4444;
    }

    #userDropdown a.hdr-logout:hover {
        background: #FEF2F2;
    }

    /* Login button */
    .hdr-login-btn {
        display: flex;
        align-items: center;
        gap: 7px;
        background: var(--theme);
        color: #fff !important;
        text-decoration: none;
        padding: 9px 20px;
        border-radius: 9px;
        font-size: 13.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .hdr-login-btn:hover {
        background: var(--theme-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(14, 165, 233, 0.28);
        color: #fff !important;
    }

    @keyframes hdrDropIn {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ── CATEGORY NAV BAR ── */
    .hdr-catbar {
        background: #0F172A;
        position: relative;
        z-index: 999;
    }

    .hdr-catbar-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        align-items: center;
        overflow-x: auto;
        scrollbar-width: none;
        justify-content: center;
    }

    .hdr-catbar-inner::-webkit-scrollbar {
        display: none;
    }

    .hdr-cat-item {
        position: relative;
        flex-shrink: 0;
    }

    .hdr-cat-link {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 12px 16px;
        font-size: 13px;
        font-weight: 500;
        color: #CBD5E1;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        letter-spacing: 0.03em;
        border-bottom: 2px solid transparent;
        transition: all 0.2s;
        white-space: nowrap;
        text-transform: uppercase;
    }

    .hdr-cat-link i {
        font-size: 10px;
        opacity: 0.6;
    }

    .hdr-cat-item:hover .hdr-cat-link {
        color: #fff;
        border-bottom-color: var(--theme);
    }

    /* Sub-menu */
    .hdr-sub-menu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 0 12px 12px 12px;
        box-shadow: 0 16px 48px rgba(0, 0, 0, 0.12);
        display: none;
        z-index: 2000;
        animation: hdrDropIn 0.18s ease;
        max-height: 300px;
        overflow-y: auto;
    }

    .hdr-cat-item:hover .hdr-sub-menu {
        display: block;
    }

    .hdr-sub-menu a {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        font-size: 13px;
        color: #334155;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        border-bottom: 1px solid #F8FAFC;
        transition: all 0.15s;
        white-space: nowrap;
    }

    .hdr-sub-menu a:last-child {
        border-bottom: none;
    }

    .hdr-sub-menu a::before {
        content: '';
        width: 5px;
        height: 5px;
        background: #CBD5E1;
        border-radius: 50%;
        flex-shrink: 0;
        transition: background 0.15s;
    }

    .hdr-sub-menu a:hover {
        background: var(--theme-light);
        color: var(--theme-dark);
        padding-left: 20px;
    }

    .hdr-sub-menu a:hover::before {
        background: var(--theme);
    }

    /* Mobile */
    @media (max-width: 768px) {
        .hdr-nav {
            display: none !important;
        }

        .hdr-user-name {
            display: none;
        }

        .hdr-topbar {
            display: none;
        }

        .hdr-main-inner {
            gap: 12px;
        }
    }
</style>

<!-- ── TOPBAR ── -->
<div class="hdr-topbar">
    <div class="hdr-topbar-inner">
        <i class="fas fa-phone-alt" style="color:var(--theme); font-size:11px;"></i>
        <span>+44 123 444 0530</span>
        <div class="hdr-top-sep"></div>
        <i class="fas fa-clock" style="color:var(--theme); font-size:11px;"></i>
        <span>7 Days a week · 9:00 AM – 7:00 PM</span>
        <div class="hdr-top-sep"></div>
        <i class="fas fa-envelope" style="color:var(--theme); font-size:11px;"></i>
        <a href="mailto:sales@petchemparts.com">sales@petchemparts.com</a>
        <div class="hdr-top-socials">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>

<!-- ── MAIN HEADER ── -->
<header class="hdr-main" id="mainHeader">
    <div class="hdr-main-inner">

        <!-- Logo -->
        <a href="/" class="hdr-logo" style="flex-shrink:0;">
            <img src="/brands/logo.png" alt="Petchemparts">
        </a>

        <!-- Page Nav -->
        <nav class="hdr-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/frontend/aboutus') }}">About Us</a>
            <a href="{{ url('/frontend/termcondition') }}">Terms & Conditions</a>
            <a href="{{ url('/frontend/contact') }}">Contact Us</a>
        </nav>

        <!-- Actions -->
        <div class="hdr-actions">

            <!-- Cart -->
            <div class="cart-icon">
                <a href="{{ url('/checkout') }}" class="hdr-cart-btn">
                    <i class="fas fa-file-alt" style="font-size:14px;"></i>
                    Request
                    <span class="hdr-cart-badge">{{ Helper::cartCount() }}</span>
                </a>
            </div>

            <!-- User -->
            @if(auth()->check())
                <div class="hdr-user-wrap">
                    <button class="hdr-user-btn" onclick="toggleUserDropdown()" type="button">
                        <img class="hdr-avatar" src="{{ auth()->user()->photo ?? asset('backend/img/avatar.png') }}"
                            alt="{{ auth()->user()->name }}">
                        <span class="hdr-user-name">{{ auth()->user()->name }}</span>
                        <i class="fas fa-chevron-down" style="font-size:10px; color:#94A3B8;"></i>
                    </button>

                    <div id="userDropdown" class="hidden">
                        <a
                            style="pointer-events:none; color:#94A3B8; font-size:11.5px; font-weight:700; text-transform:uppercase; letter-spacing:0.06em;">
                            <i class="fas fa-user-circle" style="color:var(--theme);"></i>
                            {{ auth()->user()->name }}
                        </a>
                        <a href="{{ url('/user/order') }}">
                            <i class="fas fa-th-large" style="color:var(--theme);"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('user.logout') }}" class="hdr-logout">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </div>
            @else
                <a href="/user/login" class="hdr-login-btn">
                    <i class="fas fa-sign-in-alt" style="font-size:13px;"></i>
                    Login
                </a>
            @endif

        </div>
    </div>
</header>

<!-- ── CATEGORY NAV BAR ── -->
<nav class=" shadow-sm">
    <div class="max-w-6xl mx-auto px-4">
        <ul
            class="flex justify-center flex-nowrap  gap-5  text-gray-700 text-sm font-medium   uppercase tracking-wide  overflow-x-auto lg:overflow-x-visible whitespace-nowrap scrollbar-hide">

            @foreach($categories as $category)
                <li class="relative group shrink-0">
                    <!-- Main Category Link -->
                    <a href="{{ route('product-cat', $category->slug) }}"
                        class="text-gray-800 text-[14px] font-medium hover:text-blue-800">
                        {{ $category->title }}
                    </a>


                    <!-- Mega Menu -->
                    <div class="absolute left-0 top-full hidden group-hover:block z-50 ">
                        <div class="bg-white text-sm shadow-xl rounded-xl w-max min-w-[220px] border">
                            <div class="py-2 max-h-[300px] overflow-y-auto">

                                @if(isset($subcategories[$category->id]))
                                    @foreach($subcategories[$category->id] as $sub)

                                                        <!-- ITEM -->
                                                        <a href="{{ route('product-sub-cat', [
                                            'slug' => $category->slug,
                                            'sub_slug' => $sub->slug
                                        ]) }}" class="flex items-center gap-3 px-2 py-1
                                                    text-gray-700 text-[12px]
                                                    hover:bg-blue-50 hover:text-blue-600
                                                    transition rounded-lg mx-2">

                                                            <!-- TEXT -->
                                                            <span class="font-medium text-left whitespace-nowrap">
                                                                {{ $sub->title }}
                                                            </span>

                                                        </a>

                                    @endforeach
                                @else
                                    <div class="px-4 py-3 text-gray-400 text-left">
                                        No sub categories
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>


                </li>
            @endforeach
        </ul>
    </div>
</nav>

<script>
    // Scroll shadow
    window.addEventListener('scroll', () => {
        document.getElementById('mainHeader').classList.toggle('scrolled', window.scrollY > 8);
    });

    // User dropdown
    function toggleUserDropdown() {
        document.getElementById('userDropdown').classList.toggle('hidden');
    }
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.hdr-user-wrap')) {
            const dd = document.getElementById('userDropdown');
            if (dd) dd.classList.add('hidden');
        }
    });
</script>