<!-- ══════════════════════════════════════════════
     HEADER — Terracotta & Cream Design System
     Colors: #C25A2A · #FFFFFF · #F6F1E9
     Font: Plus Jakarta Sans (already loaded)
══════════════════════════════════════════════ -->

<style>
/* ── ROOT TOKENS ── */
:root {
    --terra:      #C25A2A;
    --terra-dk:   #A34921;
    --terra-lt:   #D97B50;
    --terra-dim:  rgba(194, 90, 42, 0.10);
    --terra-glow: rgba(194, 90, 42, 0.22);
    --cream:      #F6F1E9;
    --cream-dk:   #EDE6D8;
    --cream-dkr:  #DDD4C0;
    --white:      #FFFFFF;
    --ink:        #1A0F08;
    --ink-2:      #3D2516;
    --ink-3:      #6B3F22;
    --mist:       #8C6E5A;
    --fog:        #B89880;
    --sep:        rgba(194, 90, 42, 0.15);
    --font:       'Plus Jakarta Sans', sans-serif;
}

/* ── TOPBAR ── */
.hdr-topbar {
    background: var(--ink);
    height: 38px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(194,90,42,0.25);
}
.hdr-topbar-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 12px;
    color: var(--fog);
    font-family: var(--font);
    letter-spacing: 0.01em;
}
.hdr-topbar-inner a {
    color: var(--fog);
    text-decoration: none;
    transition: color 0.2s;
}
.hdr-topbar-inner a:hover { color: var(--terra-lt); }
.hdr-top-sep {
    width: 1px;
    height: 12px;
    background: rgba(194,90,42,0.3);
    flex-shrink: 0;
}
.hdr-top-socials {
    margin-left: auto;
    display: flex;
    gap: 16px;
}
.hdr-top-socials a {
    font-size: 11px;
    color: var(--fog);
    transition: color 0.2s;
}
.hdr-top-socials a:hover { color: var(--terra-lt); }

/* ── MAIN HEADER ── */
.hdr-main {
    background: var(--white);
    border-bottom: 1px solid var(--cream-dk);
    position: sticky;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    transition: box-shadow 0.3s;
}
.hdr-main.scrolled {
    box-shadow: 0 4px 24px rgba(194, 90, 42, 0.10);
}
.hdr-main-inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 24px;
    height: 70px;
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
    margin-left: 16px;
}
.hdr-nav a {
    padding: 7px 14px;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--ink-2);
    text-decoration: none;
    border-radius: 8px;
    font-family: var(--font);
    transition: all 0.2s;
    white-space: nowrap;
    letter-spacing: 0.01em;
}
.hdr-nav a:hover {
    color: var(--terra);
    background: var(--terra-dim);
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
    background: var(--terra-dim);
    color: var(--terra-dk);
    text-decoration: none;
    padding: 9px 18px;
    border-radius: 10px;
    font-size: 13.5px;
    font-weight: 700;
    font-family: var(--font);
    border: 1.5px solid rgba(194,90,42,0.2);
    transition: all 0.22s;
}
.hdr-cart-btn:hover {
    background: var(--terra);
    color: var(--white);
    border-color: var(--terra);
    box-shadow: 0 6px 18px var(--terra-glow);
    transform: translateY(-1px);
}
.hdr-cart-badge {
    background: var(--terra);
    color: var(--white);
    font-size: 10.5px;
    font-weight: 800;
    min-width: 18px;
    height: 18px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    font-family: var(--font);
    transition: background 0.2s;
}
.hdr-cart-btn:hover .hdr-cart-badge {
    background: rgba(255,255,255,0.25);
}

/* User wrap */
.hdr-user-wrap { position: relative; }
.hdr-user-btn {
    display: flex;
    align-items: center;
    gap: 9px;
    background: none;
    border: 1.5px solid var(--cream-dk);
    padding: 6px 12px 6px 6px;
    border-radius: 50px;
    cursor: pointer;
    font-family: var(--font);
    transition: all 0.2s;
}
.hdr-user-btn:hover {
    border-color: var(--terra);
    background: var(--terra-dim);
}
.hdr-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--terra);
    display: block;
}
.hdr-user-name {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--ink);
    max-width: 110px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* User dropdown */
#userDropdown {
    position: absolute;
    right: 0;
    top: calc(100% + 10px);
    width: 200px;
    background: var(--white);
    border: 1.5px solid var(--cream-dk);
    border-radius: 14px;
    box-shadow: 0 16px 48px rgba(194,90,42,0.12), 0 2px 8px rgba(0,0,0,0.06);
    z-index: 9999;
    overflow: hidden;
    animation: hdrDropIn 0.18s ease;
}
#userDropdown.hidden { display: none; }
.hdr-dropdown-header {
    background: var(--cream);
    padding: 14px 16px;
    border-bottom: 1px solid var(--cream-dk);
}
.hdr-dropdown-header-name {
    font-size: 13.5px;
    font-weight: 800;
    color: var(--ink);
    font-family: var(--font);
    pointer-events: none;
    display: flex;
    align-items: center;
    gap: 8px;
}
.hdr-dropdown-header-name i { color: var(--terra); font-size: 14px; }
#userDropdown a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 16px;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--ink-2);
    text-decoration: none;
    font-family: var(--font);
    border-bottom: 1px solid var(--cream);
    transition: background 0.15s, color 0.15s;
}
#userDropdown a:last-child { border-bottom: none; }
#userDropdown a:hover { background: var(--cream); color: var(--terra); }
#userDropdown a i { font-size: 13px; color: var(--terra); width: 16px; }
#userDropdown a.hdr-logout { color: #C0392B; }
#userDropdown a.hdr-logout i { color: #C0392B; }
#userDropdown a.hdr-logout:hover { background: #FEF2F2; color: #C0392B; }

/* Login button */
.hdr-login-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--terra);
    color: var(--white) !important;
    text-decoration: none;
    padding: 10px 22px;
    border-radius: 10px;
    font-size: 13.5px;
    font-weight: 700;
    font-family: var(--font);
    transition: all 0.22s;
    white-space: nowrap;
    letter-spacing: 0.01em;
}
.hdr-login-btn:hover {
    background: var(--terra-dk);
    transform: translateY(-1px);
    box-shadow: 0 8px 22px var(--terra-glow);
    color: var(--white) !important;
}

@keyframes hdrDropIn {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* ── CATEGORY NAV BAR ── */
.hdr-catbar {
    background: var(--cream);
    border-bottom: 1.5px solid var(--cream-dkr);
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
    gap: 2px;
}
.hdr-catbar-inner::-webkit-scrollbar { display: none; }

.hdr-cat-item {
    position: relative;
    flex-shrink: 0;
}
.hdr-cat-link {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 13px 16px;
    font-size: 12.5px;
    font-weight: 700;
    color: var(--ink-2);
    text-decoration: none;
    font-family: var(--font);
    letter-spacing: 0.06em;
    border-bottom: 2.5px solid transparent;
    transition: all 0.2s;
    white-space: nowrap;
    text-transform: uppercase;
}
.hdr-cat-link i { font-size: 9px; opacity: 0.5; }
.hdr-cat-item:hover .hdr-cat-link {
    color: var(--terra);
    border-bottom-color: var(--terra);
}

/* Sub-menu */
.hdr-sub-menu {
    position: absolute;
    top: 100%;
    left: 0;
    min-width: 230px;
    background: var(--white);
    border: 1.5px solid var(--cream-dk);
    border-radius: 0 14px 14px 14px;
    box-shadow: 0 20px 52px rgba(194,90,42,0.12), 0 4px 16px rgba(0,0,0,0.06);
    display: none;
    z-index: 2000;
    animation: hdrDropIn 0.18s ease;
    max-height: 320px;
    overflow-y: auto;
}
.hdr-cat-item:hover .hdr-sub-menu { display: block; }
.hdr-sub-menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 18px;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink-2);
    text-decoration: none;
    font-family: var(--font);
    border-bottom: 1px solid var(--cream);
    transition: all 0.15s;
    white-space: nowrap;
}
.hdr-sub-menu a:last-child { border-bottom: none; }
.hdr-sub-menu a::before {
    content: '';
    width: 5px;
    height: 5px;
    background: var(--cream-dkr);
    border-radius: 50%;
    flex-shrink: 0;
    transition: background 0.15s;
}
.hdr-sub-menu a:hover {
    background: var(--cream);
    color: var(--terra);
    padding-left: 22px;
}
.hdr-sub-menu a:hover::before { background: var(--terra); }

/* ── DIVIDER ACCENT LINE ── */
.hdr-accent-line {
    height: 3px;
    background: linear-gradient(90deg, var(--terra-dk), var(--terra), var(--terra-lt), transparent);
}

/* Mobile */
@media (max-width: 768px) {
    .hdr-nav { display: none !important; }
    .hdr-user-name { display: none; }
    .hdr-topbar { display: none; }
    .hdr-main-inner { gap: 12px; }
    .hdr-catbar-inner { justify-content: flex-start; }
}
</style>

<!-- ── ACCENT LINE ── -->
<div class="hdr-accent-line"></div>

<!-- ── TOPBAR ── -->
<div class="hdr-topbar">
    <div class="hdr-topbar-inner">
        <i class="fas fa-phone-alt" style="color:var(--terra-lt); font-size:10px;"></i>
        <span>+44 123 444 0530</span>
        <div class="hdr-top-sep"></div>
        <i class="fas fa-clock" style="color:var(--terra-lt); font-size:10px;"></i>
        <span>7 Days a week · 9:00 AM – 7:00 PM</span>
        <div class="hdr-top-sep"></div>
        <i class="fas fa-envelope" style="color:var(--terra-lt); font-size:10px;"></i>
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
            <a href="{{ url('/checkout') }}" class="hdr-cart-btn">
                <i class="fas fa-file-alt" style="font-size:13px;"></i>
                Request
                <span class="hdr-cart-badge">{{ Helper::cartCount() }}</span>
            </a>

            <!-- User -->
            @if(auth()->check())
                <div class="hdr-user-wrap">
                    <button class="hdr-user-btn" onclick="toggleUserDropdown()" type="button">
                        <img class="hdr-avatar"
                             src="{{ auth()->user()->photo ?? asset('backend/img/avatar.png') }}"
                             alt="{{ auth()->user()->name }}">
                        <span class="hdr-user-name">{{ auth()->user()->name }}</span>
                        <i class="fas fa-chevron-down" style="font-size:9px; color:var(--mist);"></i>
                    </button>

                    <div id="userDropdown" class="hidden">
                        <div class="hdr-dropdown-header">
                            <span class="hdr-dropdown-header-name">
                                <i class="fas fa-user-circle"></i>
                                {{ auth()->user()->name }}
                            </span>
                        </div>
                        <a href="{{ url('/user/order') }}">
                            <i class="fas fa-th-large"></i>
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
                    <i class="fas fa-sign-in-alt" style="font-size:12px;"></i>
                    Login
                </a>
            @endif

        </div>
    </div>
</header>

<!-- ── CATEGORY NAV BAR ── -->
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

<nav class="hdr-catbar">
    <div class="hdr-catbar-inner">
        @foreach($categories as $category)
            <div class="hdr-cat-item">
                <a href="{{ route('product-cat', $category->slug) }}" class="hdr-cat-link">
                    {{ $category->title }}
                    @if(isset($subcategories[$category->id]))
                        <i class="fas fa-chevron-down"></i>
                    @endif
                </a>

                @if(isset($subcategories[$category->id]))
                    <div class="hdr-sub-menu">
                        @foreach($subcategories[$category->id] as $sub)
                            <a href="{{ route('product-sub-cat', [
                                'slug'     => $category->slug,
                                'sub_slug' => $sub->slug
                            ]) }}">
                                {{ $sub->title }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
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