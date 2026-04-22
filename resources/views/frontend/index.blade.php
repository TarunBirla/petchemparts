@extends('frontend.layouts.master')

@section('title', 'Petchemparts — Industrial & Petrochemical Parts Specialists')

@section('main-content')

<style>
    /* ===== HERO ===== */
    .hero-section {
        position: relative;
        height: 580px;
        overflow: visible;
        margin-top: 0;
        z-index: 1;
    }
    .hero-slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.2s ease;
    }
    .hero-slide.active { opacity: 1; z-index: 1; }
    .hero-slide::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(15,23,42,0.82) 0%, rgba(15,23,42,0.35) 100%);
    }
    .hero-content {
        position: absolute;
        inset: 0;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 0 0 80px;
        max-width: 700px;
    }
    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(14,165,233,0.18);
        border: 1px solid rgba(14,165,233,0.35);
        color: #7DD3FC;
        font-size: 12.5px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 20px;
        margin-bottom: 20px;
        backdrop-filter: blur(8px);
        width: fit-content;
    }
    .hero-title {
        font-family: 'Outfit', sans-serif;
        font-size: clamp(2rem, 4vw, 3.2rem);
        font-weight: 800;
        color: white;
        line-height: 1.15;
        margin-bottom: 18px;
        text-shadow: 0 2px 20px rgba(0,0,0,0.3);
    }
    .hero-subtitle {
        font-size: 16px;
        color: #CBD5E1;
        margin-bottom: 36px;
        line-height: 1.65;
        max-width: 520px;
    }
    .hero-cta-group {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }
    .hero-btn-primary {
        background: var(--primary);
        color: white;
        padding: 14px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s;
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-shadow: 0 8px 24px rgba(14,165,233,0.35);
    }
    .hero-btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 14px 32px rgba(14,165,233,0.4);
        color: white;
    }
    .hero-btn-outline {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(8px);
        color: white;
        padding: 14px 28px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255,255,255,0.25);
        transition: all 0.25s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .hero-btn-outline:hover {
        background: rgba(255,255,255,0.18);
        color: white;
        transform: translateY(-2px);
    }

    /* Hero dots */
    .hero-dots {
        position: absolute;
        bottom: 28px;
        left: 80px;
        display: flex;
        gap: 8px;
        z-index: 10;
    }
    .hero-dot {
        width: 8px;
        height: 8px;
        background: rgba(255,255,255,0.35);
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
    }
    .hero-dot.active {
        background: var(--primary);
        width: 28px;
    }

    /* Hero stats floating card */
    .hero-stats-card {
        position: absolute;
        bottom: 40px;
        right: 60px;
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 16px;
        padding: 20px 28px;
        z-index: 10;
        display: flex;
        gap: 32px;
    }
    .hero-stat {
        text-align: center;
        color: white;
    }
    .hero-stat-num {
        font-family: 'Outfit', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: white;
        line-height: 1;
    }
    .hero-stat-num span { color: var(--primary); }
    .hero-stat-label {
        font-size: 12px;
        color: #94A3B8;
        margin-top: 4px;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .hero-content { padding: 0 24px; max-width: 100%; }
        .hero-stats-card { display: none; }
        .hero-dots { left: 24px; }
        .hero-section { height: 480px; }
    }

    /* ===== SEARCH SECTION ===== */
    .search-section {
        background: white;
        padding: 0;
        position: relative;
        z-index: 10;
    }
    .search-card {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        transform: translateY(-36px);
    }
    .search-inner {
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        padding: 32px 36px;
        border: 1px solid #E2E8F0;
    }
    .search-inner h2 {
        font-size: 22px;
        color: var(--dark);
        margin-bottom: 20px;
    }
    .search-inner h2 span { color: var(--primary); }
    .search-form-row {
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .search-form-row input {
        flex: 1;
        height: 50px;
        padding: 0 20px;
        border: 2px solid #E2E8F0;
        border-radius: 10px;
        font-size: 14.5px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--dark);
        transition: border-color 0.2s;
        outline: none;
    }
    .search-form-row input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(14,165,233,0.10);
    }
    .search-form-row input::placeholder { color: #94A3B8; }
    .search-submit-btn {
        height: 50px;
        padding: 0 32px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        transition: all 0.2s;
    }
    .search-submit-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    @media (max-width: 640px) {
        .search-form-row { flex-direction: column; }
        .search-submit-btn { width: 100%; justify-content: center; }
        .search-inner { padding: 24px 20px; }
    }

    /* ===== BRANDS ===== */
    .brands-section {
        padding: 20px 0 48px;
        background: var(--light);
        overflow: hidden;
    }
    .section-label {
        text-align: center;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--primary);
        margin-bottom: 8px;
    }
    .section-title {
        font-family: 'Outfit', sans-serif;
        font-size: clamp(1.6rem, 3vw, 2.2rem);
        font-weight: 800;
        color: var(--dark);
        text-align: center;
        margin-bottom: 40px;
    }
    .brands-track-wrapper {
        position: relative;
        overflow: hidden;
    }
    .brands-track-wrapper::before,
    .brands-track-wrapper::after {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        width: 80px;
        z-index: 2;
    }
    .brands-track-wrapper::before { left: 0; background: linear-gradient(to right, var(--light), transparent); }
    .brands-track-wrapper::after { right: 0; background: linear-gradient(to left, var(--light), transparent); }

    .brands-track {
        display: flex;
        gap: 16px;
        transition: transform 0.7s cubic-bezier(0.25,0.1,0.25,1);
    }
    .brand-chip {
        flex-shrink: 0;
        min-width: 180px;
        height: 72px;
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 24px;
        font-weight: 700;
        font-size: 14px;
        color: var(--gray);
        letter-spacing: 0.04em;
        transition: all 0.2s;
        cursor: default;
        box-shadow: var(--shadow-sm);
    }
    .brand-chip:hover {
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }

    /* ===== CATEGORIES ===== */
    .categories-section {
        padding: 72px 0;
        background: white;
    }
    .cats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    @media (max-width: 1024px) { .cats-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) { .cats-grid { grid-template-columns: 1fr; } }

    .cat-card {
        background: var(--light);
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        padding: 28px;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    .cat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), #38BDF8);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .cat-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
        background: white;
    }
    .cat-card:hover::before { transform: scaleX(1); }

    .cat-icon-wrap {
        width: 52px;
        height: 52px;
        background: var(--primary-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
        font-size: 22px;
        color: var(--primary);
        transition: all 0.3s;
    }
    .cat-card:hover .cat-icon-wrap {
        background: var(--primary);
        color: white;
    }
    .cat-name {
        font-family: 'Outfit', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 14px;
        text-decoration: none;
        display: block;
    }
    .cat-name:hover { color: var(--primary); }

    .sub-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .sub-list a {
        font-size: 13.5px;
        color: var(--gray);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 3px 0;
        transition: color 0.2s;
    }
    .sub-list a::before {
        content: '';
        width: 4px;
        height: 4px;
        background: #CBD5E1;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .sub-list a:hover { color: var(--primary); }
    .sub-list a:hover::before { background: var(--primary); }

    .cat-footer {
        margin-top: 18px;
        padding-top: 14px;
        border-top: 1px solid #E2E8F0;
    }
    .cat-footer a {
        font-size: 13px;
        font-weight: 600;
        color: var(--primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .cat-footer a:hover { gap: 9px; }

    /* ===== PRODUCTS ===== */
    .products-section {
        padding: 72px 0;
        background: var(--light);
    }
    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    @media (max-width: 1024px) { .products-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px) { .products-grid { grid-template-columns: 1fr; } }

    .product-card {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
    }
    .product-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    .product-card-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }

    .product-breadcrumb {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        color: #94A3B8;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }
    .product-breadcrumb i { font-size: 9px; color: #CBD5E1; }

    .product-title {
        font-family: 'Outfit', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .product-desc {
        font-size: 13px;
        color: var(--gray);
        line-height: 1.55;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }
    .product-meta {
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: 14px;
    }
    .product-meta-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        color: #64748B;
    }
    .product-meta-row i { color: var(--primary); font-size: 11px; width: 14px; }
    .meta-label { font-weight: 600; color: #94A3B8; }

    .product-price {
        font-family: 'Outfit', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 14px;
    }
    .product-price .orig-price {
        font-size: 14px;
        font-weight: 500;
        color: #CBD5E1;
        text-decoration: line-through;
        margin-left: 6px;
    }

    .product-actions {
        display: flex;
        gap: 8px;
    }
    .btn-view {
        width: 44px;
        height: 44px;
        background: var(--light);
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray);
        text-decoration: none;
        font-size: 15px;
        transition: all 0.2s;
        flex-shrink: 0;
    }
    .btn-view:hover {
        background: var(--primary-light);
        border-color: var(--primary);
        color: var(--primary);
    }
    .btn-quote {
        flex: 1;
        height: 44px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: all 0.2s;
    }
    .btn-quote:hover {
        background: var(--primary-dark);
        color: white;
        box-shadow: 0 6px 16px rgba(14,165,233,0.3);
    }

    /* ===== TRUST BADGES ===== */
    .trust-section {
        background: var(--dark-2);
        padding: 64px 0;
    }
    .trust-grid {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
    }
    @media (max-width: 768px) {
        .trust-grid { grid-template-columns: repeat(2, 1fr); gap: 24px; }
    }
    .trust-card {
        text-align: center;
        padding: 32px 20px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 16px;
        transition: all 0.3s;
    }
    .trust-card:hover {
        background: rgba(14,165,233,0.08);
        border-color: rgba(14,165,233,0.25);
        transform: translateY(-4px);
    }
    .trust-icon {
        width: 64px;
        height: 64px;
        background: rgba(14,165,233,0.15);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        font-size: 26px;
        color: var(--primary);
    }
    .trust-card h3 {
        font-family: 'Outfit', sans-serif;
        font-size: 18px;
        font-weight: 700;
        color: white;
        margin-bottom: 6px;
    }
    .trust-card p { font-size: 13.5px; color: #64748B; margin: 0; }

    /* ===== SHOW ALL BTN ===== */
    .show-all-wrap {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }
    .show-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 36px;
        background: var(--primary);
        color: white;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 15px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.25s;
        box-shadow: 0 8px 24px rgba(14,165,233,0.25);
    }
    .show-all-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 14px 32px rgba(14,165,233,0.35);
        color: white;
    }

    .section-header {
        text-align: center;
        margin-bottom: 48px;
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 24px 48px;
    }

    /* Category icon mapping (visual variety) */
    .cat-icons { --icons: '\f085','\f7d9','\f3cd','\f1e6','\f013','\f552'; }
</style>


{{-- ===== HERO ===== --}}
@if(count($banners) > 0)
<section class="hero-section">
    @foreach($banners as $key => $banner)
    <div class="hero-slide {{ $key == 0 ? 'active' : '' }}"
         style="background-image: url('{{ $banner->photo }}')">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <i class="fas fa-certificate" style="font-size:11px;"></i>
               {{ $banner->title }}
            </div>
            <h1 class="hero-title">{{ $banner->title }}</h1>
            @if($banner->description)
            <p class="hero-subtitle">{!! html_entity_decode(strip_tags($banner->description)) !!}</p>
            @endif
            <div class="hero-cta-group">
                <a href="{{ url('/shop') }}" class="hero-btn-primary">
                    <i class="fas fa-search"></i> Browse Parts
                </a>
                <a href="{{ url('/frontend/contact') }}" class="hero-btn-outline">
                    <i class="fas fa-file-alt"></i> Request Quote
                </a>
            </div>
        </div>
    </div>
    @endforeach

   

    <!-- Dots -->
    <div class="hero-dots">
        @foreach($banners as $key => $banner)
        <button class="hero-dot {{ $key == 0 ? 'active' : '' }}" data-slide="{{ $key }}"></button>
        @endforeach
    </div>
</section>
@endif

<script>
(function(){
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let cur = 0;
    if (!slides.length) return;
    function goTo(i) {
        slides[cur].classList.remove('active');
        dots[cur].classList.remove('active');
        cur = i % slides.length;
        slides[cur].classList.add('active');
        dots[cur].classList.add('active');
    }
    dots.forEach((d, i) => d.addEventListener('click', () => { goTo(i); clearInterval(timer); timer = setInterval(() => goTo(cur + 1), 5000); }));
    let timer = setInterval(() => goTo(cur + 1), 5000);
})();
</script>


{{-- ===== SEARCH CARD ===== --}}
<div class="search-section">
    <div class="search-card">
        <div class="search-inner" data-aos="fade-up">
            <h2><span>Select by Part</span>  Number or Manufacturer</h2>
            <form method="GET" action="{{ route('shop') }}" style="position:relative;">
                <div class="search-form-row">
                    <input
                        type="text"
                        id="globalSearch"
                        name="search"
                        placeholder="🔍  Search by Part Number, Model, Product Name, or Brand..."
                        autocomplete="off"
                        value="{{ request('search') }}"
                    >
                    <button type="submit" class="search-submit-btn">
                        <i class="fas fa-search"></i>
                        Search Products
                    </button>
                </div>
                <div id="searchResult" style="
                    position:absolute; top:calc(100% + 8px); left:0; right:0;
                    background:white; border:1.5px solid #E2E8F0; border-radius:12px;
                    box-shadow:0 16px 48px rgba(0,0,0,0.12); z-index:2000;
                    display:none; max-height:320px; overflow-y:auto;
                "></div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on('keyup', '#globalSearch', function () {
    const q = $(this).val();
    if (q.length < 2) { $('#searchResult').hide().html(''); return; }
    $.ajax({
        url: "{{ route('product.search') }}", type: "GET", data: { q },
        success: (data) => {
            let html = '';
            if (data.length) {
                data.forEach(item => {
                    html += `<a href="/shop?search=${encodeURIComponent(item.title)}" style="display:flex;align-items:center;gap:10px;padding:11px 18px;text-decoration:none;color:#1E293B;font-size:13.5px;border-bottom:1px solid #F8FAFC;transition:background 0.15s;" onmouseover="this.style.background='#F0F9FF'" onmouseout="this.style.background=''">
                        <i class="fas fa-cog" style="color:#0EA5E9;font-size:13px;"></i>
                        <span style="flex:1;">${item.title}</span>
                        ${item.part_number ? `<span style="background:#F1F5F9;color:#64748B;font-size:11px;padding:2px 8px;border-radius:4px;">${item.part_number}</span>` : ''}
                    </a>`;
                });
            } else {
                html = `<div style="padding:16px 18px;color:#94A3B8;font-size:13.5px;">No results found for "<strong>${q}</strong>"</div>`;
            }
            $('#searchResult').html(html).show();
        }
    });
});
$(document).click(e => { if (!$(e.target).closest('#globalSearch, #searchResult').length) $('#searchResult').hide(); });
</script>


{{-- ===== BRANDS ===== --}}
<section class="brands-section">
    <div class="section-label">Our Partners</div>
    <h2 class="section-title">Trusted By Top Brands</h2>
    <div class="brands-track-wrapper">
        <div id="brandTrack" class="brands-track">
            @php $brands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get(); @endphp
            @foreach($brands as $brand)
            <div class="brand-chip">{{ $brand->title }}</div>
            @endforeach
        </div>
    </div>
</section>
<script>
(function(){
    const track = document.getElementById('brandTrack');
    if (!track) return;
    const itemW = 196;
    let idx = 0;
    const total = track.children.length;
    setInterval(() => {
        idx++;
        track.style.transform = `translateX(-${idx * itemW}px)`;
        if (idx >= total - 5) {
            setTimeout(() => {
                track.style.transition = 'none';
                track.style.transform = 'translateX(0)';
                idx = 0;
                setTimeout(() => track.style.transition = 'transform 700ms cubic-bezier(0.25,0.1,0.25,1)', 50);
            }, 700);
        }
    }, 2500);
})();
</script>


{{-- ===== CATEGORIES ===== --}}
@php
$categories = DB::table('categories')->where('status','active')->whereNull('parent_id')->limit(4)->get();
$subcategories = DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
@endphp

<section class="categories-section">
    <div class="section-header">
        <div class="section-label">Browse by Type</div>
        <h2 class="section-title" style="margin-bottom:0;">Popular Categories</h2>
    </div>
    <div class="cats-grid">
        @php
        $catIcons = ['fa-cogs', 'fa-bolt', 'fa-tint', 'fa-thermometer-half', 'fa-wrench', 'fa-industry', 'fa-cube', 'fa-filter'];
        @endphp
        @foreach($categories as $i => $category)
        <div class="cat-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="cat-icon-wrap">
                <i class="fas {{ $catIcons[$i % count($catIcons)] }}"></i>
            </div>
            <a href="{{ route('product-cat', $category->slug) }}" class="cat-name">
                {{ $category->title }}
            </a>
            <ul class="sub-list">
                @if(isset($subcategories[$category->id]))
                    @foreach($subcategories[$category->id]->take(5) as $sub)
                    <li>
                        <a href="{{ route('product-sub-cat', ['slug' => $category->slug, 'sub_slug' => $sub->slug]) }}">
                            {{ $sub->title }}
                        </a>
                    </li>
                    @endforeach
                    @if(count($subcategories[$category->id]) > 5)
                    <li style="font-size:12px; color:#94A3B8; padding: 4px 0 0 10px;">
                        +{{ count($subcategories[$category->id]) - 5 }} more
                    </li>
                    @endif
                @else
                    <li style="font-size:13px; color:#CBD5E1;">No subcategories</li>
                @endif
            </ul>
            <div class="cat-footer">
                <a href="{{ route('product-cat', $category->slug) }}">
                    View all <i class="fas fa-arrow-right" style="font-size:11px;"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="show-all-wrap">
        <a href="/frontend/showcategory" class="show-all-btn">
            View All Categories <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>


{{-- ===== PRODUCTS ===== --}}
@php
$products = DB::table('products')
    ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
    ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
    ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
    ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')
    ->where('products.status', 'active')
    ->orderBy('products.id', 'DESC')
    ->select('products.*', 'parent_cat.title as category_name', 'child_cat.title as subcategory_name', 'manufacturers.name as manufacturer_name','pdfs.file as pdf_file')
    ->limit(8)
    ->get();
@endphp

<section class="products-section">
    <div class="section-header">
        <div class="section-label">Our Inventory</div>
        <h2 class="section-title" style="margin-bottom:0;">Latest Products</h2>
    </div>
    <div class="products-grid">
        @foreach($products as $i => $product)
        @php
            $photos = json_decode($product->photo, true);
            $image = $photos[0] ?? 'frontend/img/no-image.png';
            $discountedPrice = $product->discount > 0
                ? $product->price - ($product->price * $product->discount / 100)
                : $product->price;
        @endphp
        <div class="product-card" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}">
            <div class="product-card-body">
                <!-- Breadcrumb -->
                <div class="product-breadcrumb">
                    @if($product->category_name)
                    <span>{{ $product->category_name }}</span>
                    @endif
                    @if($product->subcategory_name)
                    <i class="fas fa-chevron-right"></i>
                    <span>{{ $product->subcategory_name }}</span>
                    @endif
                </div>

                <!-- Title -->
                <div class="product-title">{{ $product->title }}</div>

                <!-- Desc -->
                @if($product->summary)
                <div class="product-desc">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 80) }}</div>
                @endif

                <!-- Meta -->
                <div class="product-meta">
                    @if($product->manufacturer_name)
                    <div class="product-meta-row">
                        <i class="fas fa-industry"></i>
                        <span class="meta-label">Manufacturer:</span>
                        <span>{{ $product->manufacturer_name }}</span>
                    </div>
                    @endif
                    @if($product->part_number)
                    <div class="product-meta-row">
                        <i class="fas fa-barcode"></i>
                        <span class="meta-label">Part No:</span>
                        <span>{{ $product->part_number }}</span>
                    </div>
                    @endif
                    @if($product->model_number)
                    <div class="product-meta-row">
                        <i class="fas fa-tag"></i>
                        <span class="meta-label">Model:</span>
                        <span>{{ $product->model_number }}</span>
                    </div>
                    @endif
                    @if($product->pdf_file)
                        <div class="product-meta-row">
                            <i class="fas fa-file-pdf"></i>

                            <a href="{{ asset($product->pdf_file) }}" target="_blank" class="meta-label">
                                  {{ basename($product->pdf_file) }}
                            </a>
                        </div>
                        @endif
                </div>

                <!-- Price -->
                <div class="product-price">
                    £{{ number_format($discountedPrice, 2) }}
                    @if($product->discount > 0)
                    <span class="orig-price">£{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>

                <!-- Actions -->
                <div class="product-actions">
                    <a href="{{ route('product-detail', $product->slug) }}" class="btn-view" title="View Details">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('add-to-cart', $product->slug) }}" class="btn-quote">
                        <i class="fas fa-file-invoice"></i>
                        Request Quote
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="show-all-wrap">
        <a href="/frontend/showproduct" class="show-all-btn">
            View All Products <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>


{{-- ===== TRUST BADGES ===== --}}
<section class="trust-section">
    <div class="trust-grid">
        <div class="trust-card" data-aos="fade-up" data-aos-delay="0">
            <div class="trust-icon"><i class="fas fa-shield-alt"></i></div>
            <h3>100% Genuine</h3>
            <p>All parts sourced from authorized suppliers. Guaranteed authentic.</p>
        </div>
        <div class="trust-card" data-aos="fade-up" data-aos-delay="80">
            <div class="trust-icon"><i class="fas fa-award"></i></div>
            <h3>20+ Years</h3>
            <p>Two decades of industry expertise serving global clients.</p>
        </div>
        <div class="trust-card" data-aos="fade-up" data-aos-delay="160">
            <div class="trust-icon"><i class="fas fa-check-double"></i></div>
            <h3>Quality Verified</h3>
            <p>Every part is thoroughly inspected before dispatch.</p>
        </div>
        <div class="trust-card" data-aos="fade-up" data-aos-delay="240">
            <div class="trust-icon"><i class="fas fa-headset"></i></div>
            <h3>Expert Support</h3>
            <p>Our team is available 7 days a week to assist you.</p>
        </div>
    </div>
</section>

@endsection