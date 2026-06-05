{{-- ══════════════════════════════════════════════════════
     PETCHEMPARTS — PROFESSIONAL HEADER
     Colors: #C25A2A (terra) · #FFFFFF (white) · #F6F1E9 (cream)
     Font: Plus Jakarta Sans
══════════════════════════════════════════════════════ --}}

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
:root {
   
    --T:     #00D4FF;
    --T-dk:  #0056B9;
    --T-lt:  #4DBAF7;
    
    --T-xs:  rgba(76, 98, 171, 0.08);
    --T-sm:  rgba(47, 90, 198, 0.14);
    --T-md:  rgba(38, 89, 208, 0.22);
    --T-gl:  rgba(105, 134, 221, 0.3);
    --CR:    #F6F1E9;
    --CR-dk: #EDE5D8;
    --CR-dr: #D9CEBC;
    --WH:    #FFFFFF;
    --INK:   #FFFFFF;
    --INK2:  #408dcc;
    --MID:   #497cdc;
    --FOG:   #1568e4;
    --FN:    'Poppins', sans-serif;
    --sh-sm: 0 2px 12px rgba(28,14,6,0.08);
    --sh-md: 0 8px 32px rgba(28,14,6,0.12);
    --sh-lg: 0 20px 60px rgba(28,14,6,0.16);
}

* { box-sizing: border-box; }

/* ─── TOPBAR ─────────────────────────────────────── */
.pc-topbar {
    background: var(--INK);
    height: 36px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid rgba(76, 98, 171, 0.08);
}
.pc-topbar-inner {
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 28px;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0;
    font-family: var(--FN);
    font-size: 11.5px;
    font-weight: 500;
    color: var(--FOG);
    letter-spacing: 0.01em;
}
.pc-top-item {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 0 14px;
    border-right: 1px solid rgba(76, 98, 171, 0.08);
    height: 36px;
    white-space: nowrap;
}
.pc-top-item:first-child { padding-left: 0; }
.pc-top-item i { color: var(--T-lt); font-size: 10px; }
.pc-top-item a { color: var(--FOG); text-decoration: none; transition: color .18s; }
.pc-top-item a:hover { color: var(--T-lt); }
.pc-top-socials {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 0;
}
.pc-top-socials a {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--FOG);
    font-size: 11px;
    text-decoration: none;
    border-left: 1px solid rgba(76, 98, 171, 0.08);
    transition: all .18s;
}
.pc-top-socials a:hover { color: var(--T-lt); background: rgba(76, 98, 171, 0.08); }

/* ─── MAIN HEADER ────────────────────────────────── */
.pc-header {
    background: var(--WH);
    border-bottom: 1px solid var(--CR-dk);
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: box-shadow .25s;
}
.pc-header.is-scrolled {
    box-shadow: 0 4px 28px rgba(76, 98, 171, 0.08)
}
.pc-header-inner {
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 28px;
    height: 72px;
    display: flex;
    align-items: center;
    gap: 0;
}

/* Logo */
.pc-logo {
    flex-shrink: 0;
    margin-right: 40px;
    display: flex;
    align-items: center;
}
.pc-logo img {
    height: 44px;
    width: auto;
    display: block;
}

/* Page Nav */
.pc-nav {
    display: flex;
    align-items: center;
    gap: 2px;
    font-family: var(--FN);
}
.pc-nav a {
    padding: 8px 14px;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--INK2);
    text-decoration: none;
    border-radius: 8px;
    letter-spacing: 0.01em;
    transition: all .18s;
    white-space: nowrap;
}
.pc-nav a:hover {
    color: var(--T);
    background: var(--T-xs);
}

/* Actions */
.pc-actions {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

/* Request quote button */
.pc-cart-btn {
    display: flex;
    align-items: center;
    gap: 9px;
    background: var(--T-xs);
    color: var(--T-dk);
    text-decoration: none;
    padding: 9px 18px;
    border-radius: 9px;
    font-size: 13.5px;
    font-weight: 700;
    font-family: var(--FN);
    border: 1.5px solid var(--T-md);
    transition: all .22s;
    white-space: nowrap;
}
.pc-cart-btn:hover {
    background: var(--T);
    color: var(--WH);
    border-color: var(--T);
    box-shadow: 0 6px 20px var(--T-gl);
    transform: translateY(-1px);
}
.pc-cart-badge {
    background: var(--T);
    color: var(--WH);
    font-size: 10px;
    font-weight: 800;
    min-width: 20px;
    height: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    transition: background .2s;
}
.pc-cart-btn:hover .pc-cart-badge {
    background: rgba(255,255,255,0.28);
}

/* User */
.pc-user-wrap { position: relative; }
.pc-user-btn {
    display: flex;
    align-items: center;
    gap: 9px;
    background: none;
    border: 1.5px solid var(--CR-dk);
    padding: 5px 12px 5px 5px;
    border-radius: 50px;
    cursor: pointer;
    font-family: var(--FN);
    transition: all .2s;
}
.pc-user-btn:hover {
    border-color: var(--T);
    background: var(--T-xs);
}
.pc-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 2.5px solid var(--T);
    display: block;
    flex-shrink: 0;
}
.pc-uname {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--T);
    max-width: 110px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.pc-user-btn .fa-chevron-down {
    font-size: 9px;
    color: var(--FOG);
    transition: transform .22s;
}
.pc-user-btn.open .fa-chevron-down { transform: rotate(180deg); }

/* User dropdown */
#pcUserDrop {
    position: absolute;
    right: 0;
    top: calc(100% + 10px);
    width: 210px;
    background: var(--WH);
    border: 1.5px solid var(--CR-dk);
    border-radius: 14px;
    box-shadow: var(--sh-lg);
    z-index: 9999;
    overflow: hidden;
    transform-origin: top right;
    transform: scale(0.95) translateY(-6px);
    opacity: 0;
    pointer-events: none;
    transition: all .2s cubic-bezier(0.16,1,0.3,1);
}
#pcUserDrop.open {
    transform: scale(1) translateY(0);
    opacity: 1;
    pointer-events: auto;
}
.pc-drop-head {
    background: var(--CR);
    padding: 14px 16px;
    border-bottom: 1px solid var(--CR-dk);
    display: flex;
    align-items: center;
    gap: 9px;
}
.pc-drop-head i { color: var(--T); font-size: 14px; }
.pc-drop-head span {
    font-size: 13.5px;
    font-weight: 800;
    color: var(--T);
    font-family: var(--FN);
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
#pcUserDrop a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 16px;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--INK2);
    text-decoration: none;
    font-family: var(--FN);
    border-bottom: 1px solid var(--CR);
    transition: all .15s;
}
#pcUserDrop a:last-child { border-bottom: none; }
#pcUserDrop a i { font-size: 13px; color: var(--T); width: 16px; text-align: center; }
#pcUserDrop a:hover { background: var(--CR); color: var(--T); }
#pcUserDrop a.pc-logout { color: #C0392B; }
#pcUserDrop a.pc-logout i { color: #C0392B; }
#pcUserDrop a.pc-logout:hover { background: #FEF2F2; color: #C0392B; }

/* Login button */
.pc-login-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--T);
    color: var(--WH) !important;
    text-decoration: none;
    padding: 10px 22px;
    border-radius: 9px;
    font-size: 13.5px;
    font-weight: 700;
    font-family: var(--FN);
    transition: all .22s;
    white-space: nowrap;
}
.pc-login-btn:hover {
    background: var(--T-dk);
    transform: translateY(-1px);
    box-shadow: 0 8px 22px var(--T-gl);
    color: var(--WH) !important;
}

/* ─── MEGA MENU NAV BAR ──────────────────────────── */
.pc-megabar {
    background: var(--CR);
    border-bottom: 2px solid var(--CR-dr);
    position: relative;
    z-index: 999;
}
.pc-megabar-inner {
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 28px;
    display: flex;
    align-items: center;
    gap: 0;
}

.pc-cat-item {
    position: static;
    flex-shrink: 0;
}
.pc-cat-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 14px 18px;
    font-family: var(--FN);
    font-size: 12.5px;
    font-weight: 700;
    color: var(--INK2);
    text-decoration: none;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    border-bottom: 3px solid transparent;
    transition: all .2s;
    cursor: pointer;
    white-space: nowrap;
    background: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-radius: 0;
    position: relative;
}
.pc-cat-btn i {
    font-size: 9px;
    color: var(--FOG);
    transition: transform .22s;
}
.pc-cat-item:hover .pc-cat-btn,
.pc-cat-item.active .pc-cat-btn {
    color: var(--T);
    border-bottom-color: var(--T);
}
.pc-cat-item:hover .pc-cat-btn i,
.pc-cat-item.active .pc-cat-btn i {
    transform: rotate(180deg);
    color: var(--T);
}

/* ─── MEGA DROPDOWN ──────────────────────────────── */
.pc-mega {
    position: fixed;
    top: var(--mega-top, 144px);
    left: 0;
    right: 0;
    z-index: 998;
    padding: 0 28px;
    pointer-events: none;
    opacity: 0;
    transform: translateY(-8px);
    transition: all .22s cubic-bezier(0.16,1,0.3,1);
}
.pc-mega.visible {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}
.pc-mega-inner {
    max-width: 1360px;
    margin: 0 auto;
    background: var(--WH);
    border: 1.5px solid var(--CR-dk);
    border-top: 3px solid var(--T);
    border-radius: 0 0 16px 16px;
    box-shadow: 0 24px 60px rgba(28,14,6,0.14);
    overflow: hidden;
    display: flex;
}

/* Left: Category title panel */
.pc-mega-left {
    width: 240px;
    flex-shrink: 0;
    background: var(--CR);
    border-right: 1px solid var(--CR-dk);
    padding: 28px 24px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.pc-mega-cat-name {
    font-family: var(--FN);
    font-size: 18px;
    font-weight: 700;
    color: var(--T);
    margin-bottom: 4px;
    line-height: 1.2;
}
.pc-mega-cat-desc {
    font-size: 12px;
    color: var(--FOG);
    font-weight: 500;
    line-height: 1.5;
    margin-bottom: 16px;
}
.pc-mega-view-all {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: var(--T);
    color: var(--WH);
    text-decoration: none;
    font-family: var(--FN);
    font-size: 12px;
    font-weight: 700;
    padding: 9px 16px;
    border-radius: 8px;
    letter-spacing: 0.03em;
    transition: all .2s;
    width: fit-content;
    margin-top: auto;
}
.pc-mega-view-all:hover {
    background: var(--T-dk);
    gap: 10px;
}

/* Right: Subcategories grid */
.pc-mega-right {
    flex: 1;
    padding: 28px 32px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 6px;
    align-content: start;
    max-height: 380px;
    overflow-y: auto;
}
.pc-mega-right::-webkit-scrollbar { width: 4px; }
.pc-mega-right::-webkit-scrollbar-thumb { background: var(--CR-dr); border-radius: 4px; }

.pc-sub-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    border-radius: 9px;
    text-decoration: none;
    font-family: var(--FN);
    font-size: 13px;
    font-weight: 600;
    color: var(--INK2);
    border: 1px solid transparent;
    transition: all .18s;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.pc-sub-link::before {
    content: '';
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--CR-dr);
    flex-shrink: 0;
    transition: background .18s, transform .18s;
}
.pc-sub-link:hover {
    background: var(--T-xs);
    border-color: var(--T-md);
    color: var(--T);
    transform: translateX(3px);
}
.pc-sub-link:hover::before {
    background: var(--T);
    transform: scale(1.3);
}

/* Empty state */
.pc-mega-empty {
    grid-column: 1/-1;
    padding: 32px 0;
    text-align: center;
    color: var(--FOG);
    font-size: 13px;
    font-family: var(--FN);
}

/* Backdrop */
.pc-mega-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(28,14,6,0.25);
    z-index: 997;
    opacity: 0;
    pointer-events: none;
    transition: opacity .22s;
}
.pc-mega-backdrop.visible {
    opacity: 1;
    pointer-events: auto;
}

/* ─── ACCENT LINE ────────────────────────────────── */
.pc-accent-line {
    height: 3px;
    background: linear-gradient(90deg, var(--T-dk) 0%, var(--T) 40%, var(--T-lt) 70%, transparent 100%);
}

/* ─── MOBILE ─────────────────────────────────────── */
@media (max-width: 768px) {
    .pc-nav { display: none; }
    .pc-uname { display: none; }
    .pc-topbar { display: none; }
    .pc-megabar-inner { overflow-x: auto; }
    .pc-megabar-inner::-webkit-scrollbar { display: none; }
    .pc-mega { padding: 0 12px; }
    .pc-mega-inner { flex-direction: column; }
    .pc-mega-left { width: 100%; border-right: none; border-bottom: 1px solid var(--CR-dk); }
    .pc-mega-right { grid-template-columns: repeat(2, 1fr); }
}
</style>

<!-- ── ACCENT ── -->
<div class="pc-accent-line"></div>

<!-- ── TOPBAR ── -->
<div class="pc-topbar">
    <div class="pc-topbar-inner">
        <div class="pc-top-item">
            <i class="fas fa-phone-alt"></i>
            <span>+44 123 444 0530</span>
        </div>
        <div class="pc-top-item">
            <i class="fas fa-clock"></i>
            <span>Mon–Sun · 9:00 AM – 7:00 PM</span>
        </div>
        <div class="pc-top-item">
            <i class="fas fa-envelope"></i>
            <a href="mailto:sales@petchemparts.com">sales@petchemparts.com</a>
        </div>
        <div class="pc-top-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>Loughton, IG10 3TS, UK</span>
        </div>
        <div class="pc-top-socials">
            <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</div>

<!-- ── MAIN HEADER ── -->
<header class="pc-header" id="pcHeader">
    <div class="pc-header-inner">

        <a href="/" class="pc-logo">
            <img src="/brands/logo.png" alt="Petchemparts">
        </a>

        <nav class="pc-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/frontend/aboutus') }}">About Us</a>
            <a href="{{ url('/frontend/termcondition') }}">Terms & Conditions</a>
            <a href="{{ url('/frontend/contact') }}">Contact Us</a>
        </nav>

        <div class="pc-actions">
            <a href="{{ url('/checkout') }}" class="pc-cart-btn">
                <i class="fas fa-file-invoice" style="font-size:13px;"></i>
                Request Quote
                <span class="pc-cart-badge">{{ Helper::cartCount() }}</span>
            </a>

            @if(auth()->check())
                <div class="pc-user-wrap">
                    <button class="pc-user-btn" id="pcUserBtn" type="button">
                        <img class="pc-avatar"
                             src="{{ auth()->user()->photo ?? asset('backend/img/avatar.png') }}"
                             alt="{{ auth()->user()->name }}">
                        <span class="pc-uname">{{ auth()->user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div id="pcUserDrop">
                        <div class="pc-drop-head">
                            <i class="fas fa-user-circle"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <a href="{{ url('/user/order') }}">
                            <i class="fas fa-th-large"></i> Dashboard
                        </a>
                        <a href="{{ route('user.logout') }}" class="pc-logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            @else
                <a href="/user/login" class="pc-login-btn">
                    <i class="fas fa-sign-in-alt" style="font-size:12px;"></i>
                    Login
                </a>
            @endif
        </div>

    </div>
</header>

<!-- ── MEGA MENU BAR ── -->
@php
    $navCategories = DB::table('categories')
        ->where('status', 'active')
        ->whereNull('parent_id')
        ->orderBy('title','asc')
        ->get();

    $allSubcategories = DB::table('categories')
        ->where('status', 'active')
        ->whereNotNull('parent_id')
        ->orderBy('title','asc')
        ->get()
        ->groupBy('parent_id');
@endphp

<nav class="pc-megabar" id="pcMegabar">
    <div class="pc-megabar-inner">
        @foreach($navCategories as $cat)
            <div class="pc-cat-item" data-cat-id="{{ $cat->id }}">
                <button class="pc-cat-btn" type="button">
                    {{ $cat->title }}
                    @if(isset($allSubcategories[$cat->id]))
                        <i class="fas fa-chevron-down"></i>
                    @endif
                </button>
            </div>
        @endforeach
    </div>
</nav>

<!-- ── MEGA DROPDOWN PANEL ── -->
<div class="pc-mega-backdrop" id="pcBackdrop"></div>

<div class="pc-mega" id="pcMega">
    <div class="pc-mega-inner">
        <div class="pc-mega-left">
            <div class="pc-mega-cat-name" id="pcMegaName">Category</div>
            <div class="pc-mega-cat-desc" id="pcMegaDesc">Browse all products in this category</div>
            <a href="#" class="pc-mega-view-all" id="pcMegaLink">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="pc-mega-right" id="pcMegaSubs">
            <!-- filled by JS -->
        </div>
    </div>
</div>

<!-- Subcategory data for JS -->
<script>
const PC_SUBS = {
    @foreach($navCategories as $cat)
    "{{ $cat->id }}": {
        name: "{{ addslashes($cat->title) }}",
        slug: "{{ $cat->slug }}",
        link: "{{ route('product-cat', $cat->slug) }}",
        subs: [
            @if(isset($allSubcategories[$cat->id]))
                @foreach($allSubcategories[$cat->id] as $sub)
                { title: "{{ addslashes($sub->title) }}", link: "{{ route('product-sub-cat', ['slug' => $cat->slug, 'sub_slug' => $sub->slug]) }}" },
                @endforeach
            @endif
        ]
    },
    @endforeach
};

(function() {
    const header = document.getElementById('pcHeader');
    const megabar = document.getElementById('pcMegabar');
    const mega    = document.getElementById('pcMega');
    const backdrop= document.getElementById('pcBackdrop');
    const megaName= document.getElementById('pcMegaName');
    const megaDesc= document.getElementById('pcMegaDesc');
    const megaLink= document.getElementById('pcMegaLink');
    const megaSubs= document.getElementById('pcMegaSubs');
    const userBtn = document.getElementById('pcUserBtn');
    const userDrop= document.getElementById('pcUserDrop');
    let activeItem = null;

    function setMegaTop() {
        const barRect = megabar.getBoundingClientRect();
        mega.style.top = (barRect.bottom) + 'px';
    }

    function openMega(catId, item) {
        const data = PC_SUBS[catId];
        if (!data) return;

        // Deactivate previous
        if (activeItem) activeItem.classList.remove('active');
        activeItem = item;
        item.classList.add('active');

        megaName.textContent = data.name;
        megaDesc.textContent = 'Browse all products in ' + data.name;
        megaLink.href = data.link;

        let html = '';
        if (data.subs.length > 0) {
            data.subs.forEach(s => {
                html += `<a href="${s.link}" class="pc-sub-link">${s.title}</a>`;
            });
        } else {
            html = `<div class="pc-mega-empty"><i class="fas fa-folder-open" style="font-size:24px;margin-bottom:8px;display:block;"></i>No subcategories found.</div>`;
        }
        megaSubs.innerHTML = html;

        setMegaTop();
        mega.classList.add('visible');
        backdrop.classList.add('visible');
    }

    function closeMega() {
        mega.classList.remove('visible');
        backdrop.classList.remove('visible');
        if (activeItem) activeItem.classList.remove('active');
        activeItem = null;
    }

    // Attach hover to each cat item
    document.querySelectorAll('.pc-cat-item').forEach(item => {
        const catId = item.dataset.catId;
        const hasSubs = PC_SUBS[catId] && PC_SUBS[catId].subs.length >= 0;

        item.addEventListener('mouseenter', () => {
            openMega(catId, item);
        });
    });

    // Keep open when hovering mega panel
    mega.addEventListener('mouseenter', () => {});
    document.getElementById('pcMegabar').addEventListener('mouseleave', (e) => {
        if (!mega.contains(e.relatedTarget)) {
            // check if going into mega panel
        }
    });

    // Close when mouse leaves both megabar and mega panel
    let leaveTimer;
    function scheduleClose() { leaveTimer = setTimeout(closeMega, 120); }
    function cancelClose()   { clearTimeout(leaveTimer); }

    document.getElementById('pcMegabar').addEventListener('mouseleave', scheduleClose);
    document.getElementById('pcMegabar').addEventListener('mouseenter', cancelClose);
    mega.addEventListener('mouseleave', scheduleClose);
    mega.addEventListener('mouseenter', cancelClose);
    backdrop.addEventListener('mouseenter', closeMega);

    // Backdrop click
    backdrop.addEventListener('click', closeMega);

    // Scroll shadow
    window.addEventListener('scroll', () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
        if (mega.classList.contains('visible')) setMegaTop();
    }, { passive: true });

    // User dropdown
    if (userBtn) {
        userBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userBtn.classList.toggle('open');
            userDrop.classList.toggle('open');
        });
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.pc-user-wrap')) {
                userBtn.classList.remove('open');
                userDrop.classList.remove('open');
            }
        });
    }
})();
</script>