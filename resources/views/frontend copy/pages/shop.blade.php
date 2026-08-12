@extends('frontend.layouts.master')

@section('title', 'Shop — Petchemparts Industrial & Petrochemical Parts')

@section('main-content')

<style>
    :root {
        --primary: #0EA5E9;
        --primary-dark: #0284C7;
        --primary-light: #E0F2FE;
        --dark: #0F172A;
        --dark-2: #1E293B;
        --gray: #64748B;
        --light: #F8FAFC;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
        --shadow-md: 0 8px 28px rgba(0,0,0,0.10);
    }

    /* ===== PAGE HEADER ===== */
    .shop-header {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 60%, #0F2847 100%);
        padding: 44px 0 36px;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }
    .shop-header::before {
        content: '';
        position: absolute;
        top: -60px; right: -80px;
        width: 360px; height: 360px;
        background: radial-gradient(circle, rgba(14,165,233,0.18) 0%, transparent 65%);
        pointer-events: none;
    }
    .shop-header-inner {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .shop-header-inner h1 {
        font-family: 'Outfit', sans-serif;
        font-size: 30px;
        font-weight: 800;
        color: white;
        margin: 0 0 6px;
        letter-spacing: -0.02em;
    }
    .shop-header-inner h1 span { color: var(--primary); }
    .shop-header-breadcrumb {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 13px;
        color: #64748B;
    }
    .shop-header-breadcrumb a { color: #64748B; text-decoration: none; transition: color 0.2s; }
    .shop-header-breadcrumb a:hover { color: var(--primary); }
    .shop-header-breadcrumb i { font-size: 9px; }
    .shop-header-right { display: flex; gap: 14px; flex-wrap: wrap; }
    .shop-stat-pill {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.10);
        border-radius: 24px;
        padding: 6px 16px;
        font-size: 13px;
        color: #94A3B8;
    }
    .shop-stat-pill i { color: var(--primary); font-size: 11px; }
    .shop-stat-pill strong { color: white; }

    /* ===== BODY ===== */
    .shop-body {
        background: #F1F5F9;
        padding: 36px 0 70px;
    }
    .shop-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
        display: grid;
        grid-template-columns: 268px 1fr;
        gap: 28px;
        align-items: start;
    }
    @media (max-width: 1100px) {
        .shop-container { grid-template-columns: 1fr; }
    }

    /* ===== SIDEBAR ===== */
    .shop-sidebar {
        position: sticky;
        top: 96px;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    @media (max-width: 1100px) {
        .shop-sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 290px;
            height: 100vh;
            background: white;
            z-index: 9999;
            overflow-y: auto;
            padding: 24px 20px;
            box-shadow: 4px 0 32px rgba(0,0,0,0.18);
            transform: translateX(-100%);
            transition: transform 0.35s cubic-bezier(0.4,0,0.2,1);
            display: flex !important;
        }
        .shop-sidebar.open { transform: translateX(0); }
        .sidebar-close-btn { display: flex !important; }
    }
    .sidebar-close-btn {
        display: none;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        flex-shrink: 0;
    }
    .sidebar-close-btn span {
        font-family: 'Outfit', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--dark);
    }
    .sidebar-close-btn button {
        width: 32px; height: 32px;
        background: #F1F5F9;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        color: var(--gray);
        font-size: 14px;
        display: flex; align-items: center; justify-content: center;
    }
    .sidebar-overlay {
        display: none;
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 9998;
        backdrop-filter: blur(2px);
    }
    .sidebar-overlay.show { display: block; }

    .s-widget {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        padding: 22px 20px;
        box-shadow: var(--shadow-sm);
    }
    .s-widget-title {
        font-family: 'Outfit', sans-serif;
        font-size: 13px;
        font-weight: 800;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 8px;
        padding-bottom: 13px;
        margin-bottom: 13px;
        border-bottom: 2px solid #F1F5F9;
        text-transform: uppercase;
        letter-spacing: 0.07em;
    }
    .s-widget-title i { color: var(--primary); font-size: 12px; }

    .s-cat-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1px; }
    .s-cat-list li a {
        display: flex; align-items: center; justify-content: space-between;
        padding: 8px 10px;
        border-radius: 9px;
        font-size: 13.5px;
        color: var(--gray);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s;
    }
    .s-cat-list li a:hover, .s-cat-list li a.is-active {
        background: var(--primary-light);
        color: var(--primary);
        font-weight: 600;
    }
    .s-cat-count {
        background: #F1F5F9;
        font-size: 10.5px;
        padding: 2px 7px;
        border-radius: 10px;
        color: #94A3B8;
        font-weight: 700;
        flex-shrink: 0;
    }
    .s-cat-list li a:hover .s-cat-count, .s-cat-list li a.is-active .s-cat-count {
        background: rgba(14,165,233,0.15);
        color: var(--primary);
    }
    .s-sub-list {
        list-style: none;
        padding: 2px 0 4px 20px;
        margin: 0;
        border-left: 2px solid #F1F5F9;
        margin-left: 18px;
    }
    .s-sub-list li a {
        display: flex; align-items: center; gap: 6px;
        padding: 5px 8px;
        font-size: 12.5px;
        color: #94A3B8;
        text-decoration: none;
        border-radius: 7px;
        transition: all 0.2s;
    }
    .s-sub-list li a::before {
        content: '';
        width: 4px; height: 4px;
        background: #CBD5E1; border-radius: 50%;
        flex-shrink: 0; transition: background 0.2s;
    }
    .s-sub-list li a:hover { color: var(--primary); }
    .s-sub-list li a:hover::before { background: var(--primary); }

    .s-brand-list {
        list-style: none; padding: 0; margin: 0;
        max-height: 210px; overflow-y: auto;
        display: flex; flex-direction: column; gap: 1px;
        padding-right: 4px;
    }
    .s-brand-list::-webkit-scrollbar { width: 3px; }
    .s-brand-list::-webkit-scrollbar-track { background: #F1F5F9; border-radius: 4px; }
    .s-brand-list::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 4px; }
    .s-brand-list li a {
        display: flex; align-items: center; gap: 9px;
        padding: 7px 10px;
        border-radius: 9px;
        font-size: 13px;
        color: var(--gray);
        text-decoration: none;
        transition: all 0.2s;
    }
    .s-brand-list li a:hover { background: var(--primary-light); color: var(--primary); }
    .brand-dot {
        width: 7px; height: 7px;
        background: #E2E8F0;
        border-radius: 50%;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .s-brand-list li a:hover .brand-dot { background: var(--primary); }

    .price-row { display: flex; gap: 10px; margin-bottom: 14px; }
    .price-field { flex: 1; }
    .price-field label {
        display: block; font-size: 10.5px; color: #94A3B8;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 5px;
    }
    .price-field input {
        width: 100%; height: 38px; padding: 0 10px;
        border: 1.5px solid #E2E8F0; border-radius: 9px;
        font-size: 13px; color: var(--dark);
        font-family: 'Plus Jakarta Sans', sans-serif;
        outline: none; transition: border-color 0.2s;
    }
    .price-field input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,0.08); }
    .s-apply-btn {
        width: 100%; height: 40px;
        background: var(--primary); color: white;
        border: none; border-radius: 10px;
        font-size: 13.5px; font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center; gap: 7px;
        transition: all 0.2s;
    }
    .s-apply-btn:hover { background: var(--primary-dark); box-shadow: 0 6px 18px rgba(14,165,233,0.28); }
    .s-reset-link {
        display: block; text-align: center; margin-top: 10px;
        font-size: 12.5px; color: #94A3B8; text-decoration: none; transition: color 0.2s;
    }
    .s-reset-link:hover { color: var(--primary); }

    /* ===== MAIN ===== */
    .mobile-filter-toggle {
        display: none;
        align-items: center; gap: 8px;
        padding: 12px 20px;
        background: var(--primary); color: white;
        border: none; border-radius: 11px;
        font-size: 14px; font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer; margin-bottom: 18px; width: 100%;
        justify-content: center; transition: all 0.2s;
        box-shadow: 0 4px 14px rgba(14,165,233,0.25);
    }
    .mobile-filter-toggle:hover { background: var(--primary-dark); }
    @media (max-width: 1100px) { .mobile-filter-toggle { display: flex; } }

    .shop-search-box {
        background: white; border: 1.5px solid #E2E8F0;
        border-radius: 16px; padding: 18px 22px;
        margin-bottom: 20px; box-shadow: var(--shadow-sm);
        position: relative;
    }
    .search-input-row { display: flex; gap: 10px; }
    .search-input-row input {
        flex: 1; height: 48px; padding: 0 18px;
        border: 1.5px solid #E2E8F0; border-radius: 11px;
        font-size: 14px; font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--dark); outline: none; transition: all 0.2s;
    }
    .search-input-row input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(14,165,233,0.08);
    }
    .search-input-row input::placeholder { color: #94A3B8; }
    .search-go-btn {
        height: 48px; padding: 0 26px;
        background: var(--primary); color: white;
        border: none; border-radius: 11px;
        font-size: 14px; font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer; display: flex; align-items: center; gap: 7px;
        white-space: nowrap; transition: all 0.2s;
    }
    .search-go-btn:hover { background: var(--primary-dark); box-shadow: 0 6px 18px rgba(14,165,233,0.3); }
    #shopAutoResult {
        position: absolute;
        top: calc(100% - 10px); left: 22px; right: 22px;
        background: white; border: 1.5px solid #E2E8F0;
        border-top: none;
        border-bottom-left-radius: 14px; border-bottom-right-radius: 14px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.13);
        z-index: 3000; display: none;
        max-height: 320px; overflow-y: auto;
    }
    .active-filter-pills { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px; }
    .af-pill {
        display: inline-flex; align-items: center; gap: 6px;
        background: var(--primary-light);
        border: 1px solid rgba(14,165,233,0.22);
        color: var(--primary);
        font-size: 12px; font-weight: 600;
        padding: 4px 11px; border-radius: 20px;
    }
    .af-pill a { color: var(--primary); text-decoration: none; font-size: 12px; opacity: 0.65; margin-left: 3px; transition: opacity 0.2s; }
    .af-pill a:hover { opacity: 1; }

    .shop-controls {
        background: white; border: 1.5px solid #E2E8F0;
        border-radius: 14px; padding: 13px 20px;
        margin-bottom: 22px;
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 12px; box-shadow: var(--shadow-sm);
    }
    .shop-result-info { font-size: 13.5px; color: var(--gray); }
    .shop-result-info strong { color: var(--dark); }
    .shop-sort-row { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .shop-sort-row label { font-size: 12.5px; font-weight: 600; color: var(--gray); white-space: nowrap; }
    .shop-sort-row select {
        height: 36px; padding: 0 12px;
        border: 1.5px solid #E2E8F0; border-radius: 9px;
        font-size: 13px; font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--dark); background: white; outline: none; cursor: pointer;
        transition: border-color 0.2s;
    }
    .shop-sort-row select:focus { border-color: var(--primary); }

    /* ===== PRODUCT GRID ===== */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    @media (max-width: 1300px) { .products-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 600px) { .products-grid { grid-template-columns: 1fr; } }

    .p-card {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 18px;
        overflow: hidden;
        display: flex; flex-direction: column;
        transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        position: relative;
    }
    .p-card:hover {
        border-color: var(--primary);
        box-shadow: 0 12px 36px rgba(14,165,233,0.14);
        transform: translateY(-5px);
    }
    .p-card::after {
        content: '';
        position: absolute; top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, #38BDF8 100%);
        transform: scaleX(0); transform-origin: left;
        transition: transform 0.35s ease;
    }
    .p-card:hover::after { transform: scaleX(1); }
    .p-discount-tag {
        position: absolute; top: 14px; right: 14px;
        background: linear-gradient(135deg, #EF4444, #F97316);
        color: white; font-size: 11px; font-weight: 800;
        padding: 3px 9px; border-radius: 7px; z-index: 2;
    }
    .p-body { padding: 20px; flex: 1; display: flex; flex-direction: column; }
    .p-breadcrumb {
        display: flex; align-items: center; gap: 4px;
        font-size: 11px; color: #94A3B8; margin-bottom: 9px; flex-wrap: wrap;
    }
    .p-breadcrumb i { font-size: 8px; }
    .p-title {
        font-family: 'Outfit', sans-serif;
        font-size: 15px; font-weight: 700; color: var(--dark);
        margin-bottom: 8px; line-height: 1.4; text-decoration: none;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        transition: color 0.2s;
    }
    .p-title:hover { color: var(--primary); }
    .p-summary {
        font-size: 12.5px; color: #94A3B8; line-height: 1.55;
        margin-bottom: 13px;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
        flex: 1;
    }
    .p-meta-box {
        background: #F8FAFC; border-radius: 11px;
        padding: 11px 13px; margin-bottom: 14px;
        display: flex; flex-direction: column; gap: 5px;
    }
    .p-meta-row { display: flex; align-items: center; gap: 7px; font-size: 12px; color: #64748B; line-height: 1.3; }
    .p-meta-row i { color: var(--primary); font-size: 10px; width: 13px; flex-shrink: 0; }
    .p-meta-label { font-weight: 700; color: #94A3B8; min-width: 76px; flex-shrink: 0; }
    .p-meta-value { color: var(--dark-2); font-weight: 500; }
    .p-price {
        font-family: 'Outfit', sans-serif;
        font-size: 24px; font-weight: 800; color: var(--primary);
        margin-bottom: 14px;
        display: flex; align-items: baseline; gap: 8px;
        letter-spacing: -0.02em;
    }
    .p-price-orig { font-size: 14px; font-weight: 500; color: #CBD5E1; text-decoration: line-through; letter-spacing: 0; }
    .p-actions { display: flex; gap: 8px; }
    .p-btn-eye {
        width: 44px; height: 44px;
        background: #F1F5F9; border: 1.5px solid #E2E8F0;
        border-radius: 11px;
        display: flex; align-items: center; justify-content: center;
        color: #94A3B8; text-decoration: none; font-size: 15px;
        flex-shrink: 0; transition: all 0.2s;
    }
    .p-btn-eye:hover { background: var(--primary-light); border-color: var(--primary); color: var(--primary); }
    .p-btn-quote {
        flex: 1; height: 44px;
        background: var(--primary); color: white;
        border: none; border-radius: 11px;
        font-size: 13px; font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-decoration: none;
        display: flex; align-items: center; justify-content: center; gap: 7px;
        cursor: pointer; transition: all 0.2s;
    }
    .p-btn-quote:hover { background: var(--primary-dark); color: white; box-shadow: 0 8px 20px rgba(14,165,233,0.32); }
    .p-empty {
        grid-column: 1 / -1;
        background: white; border: 1.5px dashed #CBD5E1;
        border-radius: 18px; text-align: center; padding: 90px 30px;
    }
    .p-empty i { font-size: 52px; color: #E2E8F0; display: block; margin-bottom: 18px; }
    .p-empty h3 { font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; color: var(--dark); margin-bottom: 8px; }
    .p-empty p { font-size: 14px; color: var(--gray); margin-bottom: 22px; }
    .p-empty a {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 11px 26px;
        background: var(--primary); color: white;
        border-radius: 11px; text-decoration: none;
        font-weight: 700; font-size: 14px; transition: all 0.2s;
    }
    .p-empty a:hover { background: var(--primary-dark); color: white; }
    .shop-pagination { margin-top: 36px; display: flex; justify-content: center; }
</style>

{{-- ===== HEADER ===== --}}
<div class="shop-header">
    <div class="shop-header-inner">
        <div>
            <h1>Shop <span>Products</span></h1>
            <div class="shop-header-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span style="color: var(--primary);">Shop</span>
            </div>
        </div>
        @php
            $totalProducts = DB::table('products')->where('status','active')->count();
            $totalCats = DB::table('categories')->where('status','active')->whereNull('parent_id')->count();
        @endphp
        <div class="shop-header-right">
            <div class="shop-stat-pill"><i class="fas fa-boxes"></i> <strong>{{ $totalProducts }}</strong> Products</div>
            <div class="shop-stat-pill"><i class="fas fa-layer-group"></i> <strong>{{ $totalCats }}</strong> Categories</div>
        </div>
    </div>
</div>

{{-- ===== BODY ===== --}}
<div class="shop-body">
    <div class="shop-container">

        {{-- ===== SIDEBAR ===== --}}
        @php
            $sidebarCats = DB::table('categories')->where('status','active')->whereNull('parent_id')->get();
            $sidebarSubs = DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
            $sidebarBrands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get();
        @endphp

        <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

        <aside class="shop-sidebar" id="shopSidebar">
            <div class="sidebar-close-btn">
                <span><i class="fas fa-sliders-h" style="color:var(--primary);margin-right:7px;"></i>Filters</span>
                <button onclick="closeSidebar()"><i class="fas fa-times"></i></button>
            </div>

            {{-- Categories --}}
            <div class="s-widget">
                <div class="s-widget-title"><i class="fas fa-layer-group"></i> Categories</div>
                <ul class="s-cat-list">
                    <li>
                        <a href="{{ route('shop') }}" class="{{ !request('search') && !request('min_price') ? 'is-active' : '' }}">
                            All Products <span class="s-cat-count">{{ $totalProducts }}</span>
                        </a>
                    </li>
                    @foreach($sidebarCats as $cat)
                    @php $cnt = DB::table('products')->where('cat_id',$cat->id)->where('status','active')->count(); @endphp
                    <li>
                        <a href="{{ route('product-cat', $cat->slug) }}">
                            {{ $cat->title }} <span class="s-cat-count">{{ $cnt }}</span>
                        </a>
                        @if(isset($sidebarSubs[$cat->id]) && $sidebarSubs[$cat->id]->count())
                        <ul class="s-sub-list">
                            @foreach($sidebarSubs[$cat->id]->take(5) as $sub)
                            <li>
                                <a href="{{ route('product-sub-cat', [$cat->slug, $sub->slug]) }}">{{ $sub->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Brands --}}
            <div class="s-widget">
                <div class="s-widget-title"><i class="fas fa-certificate"></i> Brands</div>
                <ul class="s-brand-list">
                    @foreach($sidebarBrands as $brand)
                    <li>
                        <a href="{{ route('product-brand', $brand->slug) }}">
                            <span class="brand-dot"></span> {{ $brand->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            
        </aside>

        {{-- ===== MAIN ===== --}}
        <div class="shop-main">

            <button class="mobile-filter-toggle" onclick="openSidebar()">
                <i class="fas fa-sliders-h"></i>
                Filters & Categories
                @if(request('min_price') || request('max_price') || request('search'))
                <span style="background:white;color:var(--primary);font-size:11px;padding:1px 8px;border-radius:10px;font-weight:700;">Active</span>
                @endif
            </button>

            {{-- Search Box --}}
            <div class="shop-search-box">
                <form method="GET" action="{{ route('shop') }}">
                    @if(request('sortBy'))<input type="hidden" name="sortBy" value="{{ request('sortBy') }}">@endif
                    @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                    @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif
                    @if(request('show'))<input type="hidden" name="show" value="{{ request('show') }}">@endif
                    <div class="search-input-row">
                        <input
                            type="text"
                            id="shopSearch"
                            name="search"
                            placeholder="🔍  Search by Part Number, Model, Product Name, or Brand..."
                            autocomplete="off"
                            value="{{ request('search') }}"
                        >
                        <button type="submit" class="search-go-btn">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                    <div id="shopAutoResult"></div>
                </form>

                @if(request('search') || request('min_price') || request('max_price'))
                <div class="active-filter-pills">
                    @if(request('search'))
                    <span class="af-pill">
                        <i class="fas fa-search" style="font-size:9px;"></i>
                        "{{ request('search') }}"
                        <a href="{{ route('shop', array_diff_key(request()->all(), ['search'=>''])) }}"><i class="fas fa-times"></i></a>
                    </span>
                    @endif
                    @if(request('min_price') || request('max_price'))
                    <span class="af-pill">
                        <i class="fas fa-pound-sign" style="font-size:9px;"></i>
                        £{{ request('min_price', 0) }} – £{{ request('max_price', '∞') }}
                        <a href="{{ route('shop', array_diff_key(request()->all(), ['min_price'=>'','max_price'=>''])) }}"><i class="fas fa-times"></i></a>
                    </span>
                    @endif
                    <a href="{{ route('shop') }}" class="af-pill" style="cursor:pointer;text-decoration:none;">
                        <i class="fas fa-times" style="font-size:9px;"></i> Clear All
                    </a>
                </div>
                @endif
            </div>

            {{-- Build query + Controls --}}
            @php
                $query = DB::table('products')
                    ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
                    ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
                    ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
                    ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
                    ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')
                
                    ->where('products.status', 'active')
                    ->select(
                        'products.*',
                        'parent_cat.title as category_name',
                        'child_cat.title as subcategory_name',
                        'manufacturers.name as manufacturer_name',
                        'pdfs.file as pdf_file',
                        'brands.title as brand_name'
                    );
                if(request('search')) {
                    $s = request('search');
                    $query->where(function($q) use ($s) {
                        $q->where('products.title','like',"%$s%")
                          ->orWhere('products.part_number','like',"%$s%")
                          ->orWhere('products.model_number','like',"%$s%")
                          ->orWhere('manufacturers.name','like',"%$s%")
                          ->orWhere('brands.title','like',"%$s%");
                    });
                }
                if(request('min_price')) { $query->where('products.price','>=',request('min_price')); }
                if(request('max_price')) { $query->where('products.price','<=',request('max_price')); }
                switch(request('sortBy')) {
                    case 'title':       $query->orderBy('products.title','asc'); break;
                    case 'price_asc':   $query->orderBy('products.price','asc'); break;
                    case 'price_desc':  $query->orderBy('products.price','desc'); break;
                    default:            $query->orderBy('products.id','desc'); break;
                }
                $perPage = (int) request('show', 12);
                $products = $query->paginate($perPage)->withQueryString();
            @endphp

            <form method="GET" action="{{ route('shop') }}" id="ctrlForm">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif
                <div class="shop-controls">
                    <div class="shop-result-info">
                        Showing <strong>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</strong>
                        of <strong>{{ $products->total() }}</strong> results
                    </div>
                    <div class="shop-sort-row">
                        <label>Show:</label>
                        <select name="show" onchange="document.getElementById('ctrlForm').submit()">
                            <option value="12" {{ request('show',12)==12?'selected':'' }}>12</option>
                            <option value="24" {{ request('show')==24?'selected':'' }}>24</option>
                            <option value="36" {{ request('show')==36?'selected':'' }}>36</option>
                            <option value="48" {{ request('show')==48?'selected':'' }}>48</option>
                        </select>
                        <label>Sort by:</label>
                        <select name="sortBy" onchange="document.getElementById('ctrlForm').submit()">
                            <option value="">Default</option>
                            <option value="title" {{ request('sortBy')=='title'?'selected':'' }}>Name A–Z</option>
                            <option value="price_asc" {{ request('sortBy')=='price_asc'?'selected':'' }}>Price: Low → High</option>
                            <option value="price_desc" {{ request('sortBy')=='price_desc'?'selected':'' }}>Price: High → Low</option>
                        </select>
                    </div>
                </div>
            </form>

            {{-- Products --}}
            <div class="products-grid">
                @forelse($products as $i => $product)
                @php
                    $photos = json_decode($product->photo, true);
                    $finalPrice = $product->discount > 0
                        ? $product->price - ($product->price * $product->discount / 100)
                        : $product->price;
                @endphp
                <div class="p-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 70 }}">
                    @if($product->discount > 0)
                    <div class="p-discount-tag">-{{ $product->discount }}% OFF</div>
                    @endif
                    <div class="p-body">
                        <div class="p-breadcrumb">
                            @if($product->category_name)<span>{{ $product->category_name }}</span>@endif
                            @if($product->subcategory_name)<i class="fas fa-chevron-right"></i><span>{{ $product->subcategory_name }}</span>@endif
                        </div>
                        <a href="{{ route('product-detail', $product->slug) }}" class="p-title">{{ $product->title }}</a>
                        @if($product->summary)
                        <div class="p-summary">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 80) }}</div>
                        @endif
                        <div class="p-meta-box">
                            @if($product->manufacturer_name)
                            <div class="p-meta-row"><i class="fas fa-industry"></i><span class="p-meta-label">Manufacturer</span><span class="p-meta-value">{{ $product->manufacturer_name }}</span></div>
                            @endif
                            @if($product->part_number)
                            <div class="p-meta-row"><i class="fas fa-barcode"></i><span class="p-meta-label">Part No</span><span class="p-meta-value">{{ $product->part_number }}</span></div>
                            @endif
                            @if($product->model_number)
                            <div class="p-meta-row"><i class="fas fa-tag"></i><span class="p-meta-label">Model</span><span class="p-meta-value">{{ $product->model_number }}</span></div>
                            @endif
                            @if($product->brand_name)
                            <div class="p-meta-row"><i class="fas fa-certificate"></i><span class="p-meta-label">Brand</span><span class="p-meta-value">{{ $product->brand_name }}</span></div>
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
                        <div class="p-price">
                            £{{ number_format($finalPrice, 2) }}
                            @if($product->discount > 0)
                            <span class="p-price-orig">£{{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        <div class="p-actions">
                            <a href="{{ route('product-detail', $product->slug) }}" class="p-btn-eye" title="View Details"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('add-to-cart', $product->slug) }}" class="p-btn-quote">
                                <i class="fas fa-file-invoice"></i> Request Quote
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-empty">
                    <i class="fas fa-search-minus"></i>
                    <h3>No Products Found</h3>
                    <p>Try adjusting your search or filters.</p>
                    <a href="{{ route('shop') }}"><i class="fas fa-times"></i> Clear Filters</a>
                </div>
                @endforelse
            </div>

            <div class="shop-pagination">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>

    </div>
</div>

<script>
function openSidebar() {
    document.getElementById('shopSidebar').classList.add('open');
    document.getElementById('sidebarOverlay').classList.add('show');
    document.body.style.overflow = 'hidden';
}
function closeSidebar() {
    document.getElementById('shopSidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('show');
    document.body.style.overflow = '';
}
$(document).on('keyup', '#shopSearch', function () {
    const q = $(this).val();
    if (q.length < 2) { $('#shopAutoResult').hide().html(''); return; }
    $.ajax({
        url: "{{ route('product.search') }}", type: "GET", data: { q },
        success: (data) => {
            let html = '';
            if (data.length) {
                data.forEach(item => {
                    html += `<a href="/shop?search=${encodeURIComponent(item.title)}"
                        style="display:flex;align-items:center;gap:10px;padding:12px 18px;text-decoration:none;color:#1E293B;font-size:13.5px;border-bottom:1px solid #F8FAFC;transition:background 0.15s;"
                        onmouseover="this.style.background='#F0F9FF'" onmouseout="this.style.background=''">
                        <i class="fas fa-cog" style="color:#0EA5E9;font-size:12px;flex-shrink:0;"></i>
                        <span style="flex:1;font-weight:500;">${item.title}</span>
                        ${item.part_number ? `<span style="background:#F1F5F9;color:#64748B;font-size:11px;padding:2px 8px;border-radius:5px;">${item.part_number}</span>` : ''}
                    </a>`;
                });
            } else {
                html = `<div style="padding:16px 18px;color:#94A3B8;font-size:13.5px;">No results for "<strong>${q}</strong>"</div>`;
            }
            $('#shopAutoResult').html(html).show();
        }
    });
});
$(document).click(e => {
    if (!$(e.target).closest('#shopSearch, #shopAutoResult').length) $('#shopAutoResult').hide();
});
</script>

@endsection