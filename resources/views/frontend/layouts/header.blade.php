{{-- resources/views/frontend/layouts/header.blade.php --}}


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        /* ==============================
           GLOBAL RESET & VARIABLES
        ============================== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary:       #0EA5E9;
            --primary-dark:  #0284C7;
            --primary-light: #BAE6FD;
            --primary-xlight:#F0F9FF;
            --accent:        #0369A1;
            --white:         #FFFFFF;
            --gray-50:       #F8FAFC;
            --gray-100:      #F1F5F9;
            --gray-200:      #E2E8F0;
            --gray-300:      #CBD5E1;
            --gray-400:      #94A3B8;
            --gray-500:      #64748B;
            --gray-700:      #334155;
            --gray-900:      #0F172A;
            --dark:          #0F172A;
            --shadow-sm:     0 1px 3px rgba(14,165,233,0.08), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md:     0 4px 16px rgba(14,165,233,0.12), 0 2px 6px rgba(0,0,0,0.06);
            --shadow-lg:     0 12px 40px rgba(14,165,233,0.16), 0 4px 12px rgba(0,0,0,0.08);
            --radius-sm:     6px;
            --radius-md:     10px;
            --radius-lg:     16px;
            --radius-xl:     24px;
            --font-display:  'Outfit', sans-serif;
            --font-body:     'Plus Jakarta Sans', sans-serif;
            --transition:    all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        }

        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font-body);
            background: var(--gray-50);
            color: var(--gray-700);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* ==============================
           ANNOUNCEMENT BAR
        ============================== */
        .announce-bar {
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 8px 0;
            font-size: 13px;
            overflow: hidden;
        }
        .announce-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .announce-scroll {
            flex: 1;
            display: flex;
            gap: 48px;
            white-space: nowrap;
            overflow: hidden;
            mask-image: linear-gradient(90deg, transparent 0%, black 8%, black 92%, transparent 100%);
        }
        .announce-scroll-inner {
            display: inline-flex;
            gap: 48px;
            animation: marquee 28s linear infinite;
        }
        .announce-item {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-weight: 500;
            letter-spacing: 0.01em;
        }
        .announce-item i { font-size: 11px; opacity: 0.85; }
        .announce-right {
            display: flex;
            gap: 20px;
            flex-shrink: 0;
        }
        .announce-right a {
            color: rgba(255,255,255,0.88);
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.2s;
        }
        .announce-right a:hover { color: white; }
        @keyframes marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @media (max-width: 640px) { .announce-right { display: none; } }

        /* ==============================
           MAIN HEADER
        ============================== */
        .site-header {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
        }
        .header-main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            gap: 24px;
            height: 70px;
        }

        /* Logo */
        .header-logo {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }
        .header-logo img { height: 38px; }
        .header-logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }
        .logo-name {
            font-family: var(--font-display);
            font-size: 17px;
            font-weight: 800;
            color: var(--gray-900);
            letter-spacing: -0.01em;
        }
        .logo-tag {
            font-size: 10px;
            font-weight: 500;
            color: var(--primary);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* Search bar */
        .header-search {
            flex: 1;
            max-width: 480px;
            position: relative;
        }
        .header-search-input {
            width: 100%;
            height: 42px;
            background: var(--gray-100);
            border: 1.5px solid var(--gray-200);
            border-radius: 100px;
            padding: 0 44px 0 44px;
            font-size: 13.5px;
            font-family: var(--font-body);
            color: var(--gray-900);
            outline: none;
            transition: var(--transition);
        }
        .header-search-input:focus {
            background: var(--white);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(14,165,233,0.12);
        }
        .header-search-input::placeholder { color: var(--gray-400); }
        .header-search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 13px;
            pointer-events: none;
        }
        .header-search-btn {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--primary);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 100px;
            font-size: 11px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .header-search-btn:hover { background: var(--primary-dark); }

        /* Search suggestions dropdown */
        .header-search-drop {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            z-index: 999;
            display: none;
            overflow: hidden;
            max-height: 320px;
            overflow-y: auto;
        }
        .hsd-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 16px;
            color: var(--gray-700);
            font-size: 13.5px;
            text-decoration: none;
            border-bottom: 1px solid var(--gray-100);
            transition: background 0.15s;
        }
        .hsd-item:last-child { border-bottom: none; }
        .hsd-item:hover { background: var(--primary-xlight); color: var(--primary-dark); }
        .hsd-item i { color: var(--primary); font-size: 12px; }
        .hsd-pn {
            margin-left: auto;
            font-size: 11px;
            background: var(--gray-100);
            color: var(--gray-500);
            padding: 2px 8px;
            border-radius: 4px;
        }

        /* Header right actions */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }
        .h-action {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1.5px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-600);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 15px;
            transition: var(--transition);
            position: relative;
        }
        .h-action:hover {
            border-color: var(--primary);
            background: var(--primary-xlight);
            color: var(--primary);
        }
        .h-action-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--primary);
            color: white;
            font-size: 9px;
            font-weight: 700;
            min-width: 16px;
            height: 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            border: 2px solid white;
        }
        .btn-quote {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--primary);
            color: white;
            border: none;
            padding: 0 18px;
            height: 40px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            transition: var(--transition);
            white-space: nowrap;
        }
        .btn-quote:hover {
            background: var(--primary-dark);
            color: white;
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }
        .h-menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            background: var(--gray-100);
            border: none;
            border-radius: var(--radius-md);
            font-size: 18px;
            color: var(--gray-700);
            cursor: pointer;
        }

        @media (max-width: 1024px) { .header-search { max-width: 340px; } }
        @media (max-width: 768px) {
            .header-search { display: none; }
            .btn-quote span { display: none; }
            .btn-quote { padding: 0 12px; }
            .h-menu-toggle { display: flex; }
        }

        /* ==============================
           NAV BAR
        ============================== */
        .site-nav {
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }
        .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: stretch;
            gap: 0;
            height: 46px;
        }

        .nav-item {
            position: relative;
            display: flex;
            align-items: center;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 14px;
            height: 46px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--gray-600);
            text-decoration: none;
            white-space: nowrap;
            transition: var(--transition);
            border-bottom: 2px solid transparent;
        }
        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }
        .nav-link i { font-size: 11px; color: var(--gray-400); }

        /* Mega dropdown */
        .nav-drop {
            position: absolute;
            top: calc(100% + 1px);
            left: 0;
            min-width: 220px;
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: all 0.2s ease;
            z-index: 999;
            padding: 8px 0;
        }
        .nav-item:hover .nav-drop {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .nav-drop-link {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 18px;
            font-size: 13.5px;
            color: var(--gray-600);
            text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }
        .nav-drop-link i { color: var(--primary); font-size: 12px; width: 16px; text-align: center; }
        .nav-drop-link:hover {
            background: var(--primary-xlight);
            color: var(--primary-dark);
        }

        /* Nav right side */
        .nav-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .nav-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-500);
        }
        .nav-badge i { color: var(--primary); }

        /* ==============================
           MOBILE MENU
        ============================== */
        .mobile-nav {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 2000;
        }
        .mobile-nav.open { display: flex; }
        .mobile-nav-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15,23,42,0.5);
            backdrop-filter: blur(4px);
        }
        .mobile-nav-panel {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: min(320px, 88vw);
            background: var(--white);
            overflow-y: auto;
            padding: 0 0 32px;
            display: flex;
            flex-direction: column;
        }
        .mobile-nav-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid var(--gray-200);
            position: sticky;
            top: 0;
            background: var(--white);
            z-index: 1;
        }
        .mobile-nav-close {
            width: 34px;
            height: 34px;
            border: none;
            background: var(--gray-100);
            border-radius: var(--radius-sm);
            font-size: 16px;
            cursor: pointer;
            color: var(--gray-600);
        }
        .mobile-search {
            padding: 14px 20px;
            border-bottom: 1px solid var(--gray-100);
        }
        .mobile-search input {
            width: 100%;
            height: 40px;
            border: 1.5px solid var(--gray-200);
            border-radius: 100px;
            padding: 0 16px 0 38px;
            font-size: 13px;
            font-family: var(--font-body);
            background: var(--gray-100);
            outline: none;
        }
        .mobile-search { position: relative; }
        .mobile-search i {
            position: absolute;
            left: 34px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 12px;
        }
        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 13px 20px;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray-700);
            text-decoration: none;
            border-bottom: 1px solid var(--gray-100);
        }
        .mobile-nav-link:hover { background: var(--primary-xlight); color: var(--primary); }

        @media (max-width: 768px) {
            .site-nav { display: none; }
        }
    </style>


    {{-- Announcement Bar --}}
    <div class="announce-bar">
        <div class="announce-inner">
            <div class="announce-scroll">
                <div class="announce-scroll-inner">
                    <span class="announce-item"><i class="fas fa-shield-alt"></i> 100% Genuine OEM Parts</span>
                    <span class="announce-item"><i class="fas fa-shipping-fast"></i> Express Worldwide Shipping</span>
                    <span class="announce-item"><i class="fas fa-headset"></i> Expert Technical Support 7 Days</span>
                    <span class="announce-item"><i class="fas fa-boxes"></i> 50,000+ Part Numbers in Stock</span>
                    <span class="announce-item"><i class="fas fa-globe"></i> Serving 45+ Countries Globally</span>
                    <span class="announce-item"><i class="fas fa-award"></i> 20+ Years Industry Experience</span>
                    {{-- duplicate for seamless loop --}}
                    <span class="announce-item"><i class="fas fa-shield-alt"></i> 100% Genuine OEM Parts</span>
                    <span class="announce-item"><i class="fas fa-shipping-fast"></i> Express Worldwide Shipping</span>
                    <span class="announce-item"><i class="fas fa-headset"></i> Expert Technical Support 7 Days</span>
                    <span class="announce-item"><i class="fas fa-boxes"></i> 50,000+ Part Numbers in Stock</span>
                    <span class="announce-item"><i class="fas fa-globe"></i> Serving 45+ Countries Globally</span>
                    <span class="announce-item"><i class="fas fa-award"></i> 20+ Years Industry Experience</span>
                </div>
            </div>
            <div class="announce-right">
                <a href="tel:+441234440530"><i class="fas fa-phone-alt"></i> +44 123 444 0530</a>
                <a href="mailto:sales@petchemparts.com"><i class="fas fa-envelope"></i> sales@petchemparts.com</a>
            </div>
        </div>
    </div>

    {{-- Main Header --}}
    <header class="site-header">
        <div class="header-main">
            {{-- Logo --}}
            <a href="/" class="header-logo">
                <img src="/brands/logo.png" alt="Petchemparts" onerror="this.style.display='none'">
                <div class="header-logo-text">
                    <span class="logo-name">Petchemparts</span>
                    <span class="logo-tag">Industrial Specialists</span>
                </div>
            </a>

            {{-- Search --}}
            <form method="GET" action="{{ route('shop') }}" class="header-search">
                <i class="fas fa-search header-search-icon"></i>
                <input
                    type="text"
                    id="headerSearch"
                    name="search"
                    class="header-search-input"
                    placeholder="Search by part number, brand, model…"
                    autocomplete="off"
                    value="{{ request('search') }}"
                >
                <button type="submit" class="header-search-btn">
                    <i class="fas fa-arrow-right"></i>
                </button>
                <div class="header-search-drop" id="headerSearchDrop"></div>
            </form>

            {{-- Actions --}}
            <div class="header-actions">
                @auth
                <a href="{{ route('frontend.profile') }}" class="h-action" title="My Account">
                    <i class="fas fa-user"></i>
                </a>
                @else
                <a href="{{ route('login') }}" class="h-action" title="Login">
                    <i class="fas fa-user"></i>
                </a>
                @endauth
                <a  class="h-action" title="Cart">
                    <i class="fas fa-shopping-cart"></i>
                    @if(session('cart') && count(session('cart')) > 0)
                    <span class="h-action-badge">{{ count(session('cart')) }}</span>
                    @endif
                </a>
                <a href="{{ url('/frontend/contact') }}" class="btn-quote">
                    <i class="fas fa-file-invoice"></i>
                    <span>Request Quote</span>
                </a>
                <button class="h-menu-toggle" id="mobileMenuBtn" aria-label="Open menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    {{-- Navigation Bar --}}
    <nav class="site-nav">
        <div class="nav-inner">
            <div class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/shop') }}" class="nav-link {{ request()->is('shop*') ? 'active' : '' }}">
                    Shop <i class="fas fa-chevron-down"></i>
                </a>
                <div class="nav-drop">
                    @php $navCats = DB::table('categories')->where('status','active')->whereNull('parent_id')->limit(8)->get(); @endphp
                    @foreach($navCats as $nc)
                    <a href="{{ route('product-cat', $nc->slug) }}" class="nav-drop-link">
                        <i class="fas fa-cog"></i> {{ $nc->title }}
                    </a>
                    @endforeach
                    <a href="{{ url('/shop') }}" class="nav-drop-link" style="border-top:1px solid var(--gray-100); margin-top:4px; padding-top:12px; color:var(--primary); font-weight:600;">
                        <i class="fas fa-th-large"></i> View All Products
                    </a>
                </div>
            </div>
            <div class="nav-item">
                <a href="/frontend/showcategory" class="nav-link">Categories</a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/frontend/aboutus') }}" class="nav-link">About Us</a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/frontend/contact') }}" class="nav-link">Contact</a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/frontend/termcondition') }}" class="nav-link">Terms</a>
            </div>

            <div class="nav-right">
                <span class="nav-badge"><i class="fas fa-circle" style="font-size:7px; color:#22C55E;"></i> Currently Open</span>
                <span class="nav-badge"><i class="fas fa-lock"></i> Secure Checkout</span>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu Drawer --}}
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
        <div class="mobile-nav-panel">
            <div class="mobile-nav-header">
                <span class="logo-name" style="font-family:var(--font-display);font-size:16px;font-weight:800;color:var(--gray-900);">Petchemparts</span>
                <button class="mobile-nav-close" id="mobileNavClose"><i class="fas fa-times"></i></button>
            </div>
            <div class="mobile-search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search parts…">
            </div>
            <a href="/" class="mobile-nav-link">Home <i class="fas fa-chevron-right" style="font-size:11px;color:var(--gray-400);"></i></a>
            <a href="{{ url('/shop') }}" class="mobile-nav-link">Shop All Parts <i class="fas fa-chevron-right" style="font-size:11px;color:var(--gray-400);"></i></a>
            <a href="/frontend/showcategory" class="mobile-nav-link">Categories <i class="fas fa-chevron-right" style="font-size:11px;color:var(--gray-400);"></i></a>
            <a href="{{ url('/frontend/aboutus') }}" class="mobile-nav-link">About Us <i class="fas fa-chevron-right" style="font-size:11px;color:var(--gray-400);"></i></a>
            <a href="{{ url('/frontend/contact') }}" class="mobile-nav-link">Contact Us <i class="fas fa-chevron-right" style="font-size:11px;color:var(--gray-400);"></i></a>
            <a href="{{ url('/frontend/contact') }}" class="mobile-nav-link" style="color:var(--primary);">Request a Quote <i class="fas fa-chevron-right" style="font-size:11px;"></i></a>
            <div style="padding:20px;">
                <p style="font-size:12.5px;color:var(--gray-400);margin-bottom:10px;">Contact Us</p>
                <p style="font-size:13px;color:var(--gray-700);"><i class="fas fa-phone-alt" style="color:var(--primary);margin-right:7px;"></i>+44 123 444 0530</p>
                <p style="font-size:13px;color:var(--gray-700);margin-top:6px;"><i class="fas fa-envelope" style="color:var(--primary);margin-right:7px;"></i>sales@petchemparts.com</p>
            </div>
        </div>
    </div>

    <script>
    // Header search autocomplete
    $(document).on('keyup', '#headerSearch', function(){
        const q = $(this).val();
        if (q.length < 2) { $('#headerSearchDrop').hide().html(''); return; }
        $.ajax({
            url: "{{ route('product.search') }}", type:'GET', data:{q},
            success: data => {
                if (!data.length) {
                    $('#headerSearchDrop').html(`<div style="padding:14px 16px;font-size:13.5px;color:var(--gray-400);">No results for "<strong>${q}</strong>"</div>`).show();
                    return;
                }
                let html = '';
                data.forEach(item => {
                    html += `<a href="/shop?search=${encodeURIComponent(item.title)}" class="hsd-item">
                        <i class="fas fa-cog"></i>
                        <span style="flex:1;">${item.title}</span>
                        ${item.part_number ? `<span class="hsd-pn">${item.part_number}</span>` : ''}
                    </a>`;
                });
                $('#headerSearchDrop').html(html).show();
            }
        });
    });
    $(document).click(e => { if (!$(e.target).closest('#headerSearch,#headerSearchDrop').length) $('#headerSearchDrop').hide(); });

    // Mobile menu
    const mobileNav = document.getElementById('mobileNav');
    document.getElementById('mobileMenuBtn').addEventListener('click', () => mobileNav.classList.add('open'));
    document.getElementById('mobileNavClose').addEventListener('click', () => mobileNav.classList.remove('open'));
    document.getElementById('mobileNavBackdrop').addEventListener('click', () => mobileNav.classList.remove('open'));
    </script>

