@extends('frontend.layouts.master')

@section('title', isset($pageTitle) ? $pageTitle . ' — Petchemparts' : 'Products — Petchemparts')

@section('main-content')

<style>
    /* ===== PRODUCT LIST FILTER PAGE ===== */
    :root {
        --primary: #0EA5E9;
        --primary-dark: #0284C7;
        --primary-light: #E0F2FE;
        --dark: #0F172A;
        --dark-2: #1E293B;
        --gray: #64748B;
        --light: #F8FAFC;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.06);
        --shadow-md: 0 8px 24px rgba(0,0,0,0.10);
    }

    /* ===== BREADCRUMB HEADER ===== */
    .plp-header {
        background: linear-gradient(135deg, var(--dark) 0%, #1E293B 100%);
        padding: 36px 0 28px;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }
    .plp-header::before {
        content: '';
        position: absolute;
        bottom: -60px; left: -60px;
        width: 280px; height: 280px;
        background: radial-gradient(circle, rgba(14,165,233,0.12) 0%, transparent 70%);
        pointer-events: none;
    }
    .plp-header::after {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(56,189,248,0.08) 0%, transparent 70%);
    }
    .plp-header-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }
    .plp-header-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }
    .plp-title {
        font-family: 'Outfit', sans-serif;
        font-size: 26px;
        font-weight: 800;
        color: white;
        margin: 0 0 8px;
    }
    .plp-title span { color: var(--primary); }
    .plp-breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #94A3B8;
    }
    .plp-breadcrumb a { color: #94A3B8; text-decoration: none; transition: color 0.2s; }
    .plp-breadcrumb a:hover { color: var(--primary); }
    .plp-breadcrumb i { font-size: 9px; }

    /* Stats row */
    .plp-stats-row {
        display: flex;
        gap: 24px;
        margin-top: 16px;
        flex-wrap: wrap;
    }
    .plp-stat-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12.5px;
        color: #94A3B8;
    }
    .plp-stat-chip i { color: var(--primary); font-size: 11px; }
    .plp-stat-chip strong { color: white; }

    /* ===== LAYOUT ===== */
    .plp-wrap {
        background: var(--light);
        min-height: 70vh;
        padding: 36px 0 60px;
    }
    .plp-layout {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 28px;
        align-items: start;
    }
    @media (max-width: 1024px) {
        .plp-layout { grid-template-columns: 1fr; }
        .plp-sidebar { display: none; }
        .plp-sidebar.open { display: block; }
    }

    /* ===== SIDEBAR ===== */
    .plp-sidebar {
        position: sticky;
        top: 100px;
    }
    .plp-widget {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        padding: 22px;
        margin-bottom: 18px;
        box-shadow: var(--shadow-sm);
        transition: box-shadow 0.2s;
    }
    .plp-widget:hover { box-shadow: var(--shadow-md); }
    .plp-widget-title {
        font-family: 'Outfit', sans-serif;
        font-size: 14.5px;
        font-weight: 700;
        color: var(--dark);
        padding-bottom: 12px;
        margin-bottom: 14px;
        border-bottom: 2px solid #F1F5F9;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .plp-widget-title i { color: var(--primary); font-size: 13px; }

    /* Category nav in sidebar */
    .plp-cat-nav { list-style: none; padding: 0; margin: 0; }
    .plp-cat-nav li { margin-bottom: 2px; }
    .plp-cat-nav > li > a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 13.5px;
        font-weight: 500;
        color: var(--gray);
        text-decoration: none;
        transition: all 0.2s;
    }
    .plp-cat-nav > li > a:hover,
    .plp-cat-nav > li > a.active {
        background: var(--primary-light);
        color: var(--primary);
        font-weight: 600;
    }
    .plp-cat-nav .cat-badge {
        background: #F1F5F9;
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 10px;
        color: #94A3B8;
        font-weight: 600;
    }
    .plp-cat-nav > li > a.active .cat-badge,
    .plp-cat-nav > li > a:hover .cat-badge {
        background: rgba(14,165,233,0.15);
        color: var(--primary);
    }

    /* Subcategory indented */
    .plp-sub-nav {
        list-style: none;
        padding: 4px 0 4px 14px;
        margin: 0;
        border-left: 2px solid #F1F5F9;
        margin-left: 20px;
    }
    .plp-sub-nav li a {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 5px 8px;
        font-size: 12.5px;
        color: #94A3B8;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
    }
    .plp-sub-nav li a::before {
        content: '';
        width: 4px; height: 4px;
        background: #CBD5E1;
        border-radius: 50%;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .plp-sub-nav li a:hover { color: var(--primary); }
    .plp-sub-nav li a:hover::before { background: var(--primary); }
    .plp-sub-nav li a.active { color: var(--primary); font-weight: 600; }
    .plp-sub-nav li a.active::before { background: var(--primary); }

    /* Brands list */
    .plp-brand-list {
        list-style: none;
        padding: 0; margin: 0;
        max-height: 200px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .plp-brand-list::-webkit-scrollbar { width: 3px; }
    .plp-brand-list::-webkit-scrollbar-track { background: #F1F5F9; border-radius: 4px; }
    .plp-brand-list::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 4px; }
    .plp-brand-list li a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 13px;
        color: var(--gray);
        text-decoration: none;
        transition: all 0.2s;
    }
    .plp-brand-list li a:hover { background: var(--primary-light); color: var(--primary); }
    .plp-brand-list li a.active { background: var(--primary-light); color: var(--primary); font-weight: 600; }
    .brand-dot {
        width: 8px; height: 8px;
        background: #E2E8F0;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .plp-brand-list li a:hover .brand-dot,
    .plp-brand-list li a.active .brand-dot { background: var(--primary); }

    /* Price range */
    .plp-price-row {
        display: flex;
        gap: 10px;
        margin-bottom: 14px;
    }
    .plp-price-field { flex: 1; }
    .plp-price-field label {
        display: block;
        font-size: 11px;
        color: #94A3B8;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 5px;
    }
    .plp-price-field input {
        width: 100%;
        height: 38px;
        padding: 0 10px;
        border: 1.5px solid #E2E8F0;
        border-radius: 8px;
        font-size: 13px;
        color: var(--dark);
        outline: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: border-color 0.2s;
    }
    .plp-price-field input:focus { border-color: var(--primary); }

    .plp-apply-btn {
        width: 100%;
        height: 40px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    .plp-apply-btn:hover { background: var(--primary-dark); box-shadow: 0 6px 16px rgba(14,165,233,0.28); }

    /* ===== MAIN ===== */
    .plp-main {}

    /* Top controls bar */
    .plp-controls {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 14px;
        padding: 14px 20px;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        box-shadow: var(--shadow-sm);
    }
    .plp-count {
        font-size: 14px;
        color: var(--gray);
    }
    .plp-count strong { color: var(--dark); }
    .plp-sort-row {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
    }
    .plp-sort-row label {
        font-size: 13px;
        font-weight: 600;
        color: var(--gray);
        white-space: nowrap;
    }
    .plp-sort-row select {
        height: 38px;
        padding: 0 12px;
        border: 1.5px solid #E2E8F0;
        border-radius: 8px;
        font-size: 13px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--dark);
        outline: none;
        background: white;
        cursor: pointer;
        transition: border-color 0.2s;
    }
    .plp-sort-row select:focus { border-color: var(--primary); }

    /* Mobile filter toggle */
    .plp-mobile-filter-btn {
        display: none;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        margin-bottom: 14px;
        transition: all 0.2s;
    }
    .plp-mobile-filter-btn:hover { background: var(--primary-dark); }
    @media (max-width: 1024px) { .plp-mobile-filter-btn { display: flex; } }

    /* Active filters */
    .plp-active-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 18px;
    }
    .plp-filter-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--primary-light);
        color: var(--primary);
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
        border: 1px solid rgba(14,165,233,0.2);
    }
    .plp-filter-tag a {
        color: var(--primary);
        text-decoration: none;
        font-size: 13px;
        line-height: 1;
        margin-left: 2px;
        opacity: 0.7;
        transition: opacity 0.2s;
    }
    .plp-filter-tag a:hover { opacity: 1; }

    /* ===== PRODUCT GRID ===== */
    .plp-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    @media (max-width: 1200px) { .plp-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 540px) { .plp-grid { grid-template-columns: 1fr; } }

    .plp-product-card {
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
        position: relative;
    }
    .plp-product-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    .plp-product-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), #38BDF8);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .plp-product-card:hover::before { transform: scaleX(1); }

    .plp-discount-badge {
        position: absolute;
        top: 12px; right: 12px;
        background: #EF4444;
        color: white;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        z-index: 2;
    }

    .plp-card-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .plp-card-breadcrumb {
        font-size: 11px;
        color: #94A3B8;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 4px;
        flex-wrap: wrap;
    }
    .plp-card-breadcrumb i { font-size: 9px; }

    .plp-card-title {
        font-family: 'Outfit', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 8px;
        line-height: 1.4;
        text-decoration: none;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.2s;
    }
    .plp-card-title:hover { color: var(--primary); }

    .plp-card-summary {
        font-size: 12.5px;
        color: var(--gray);
        line-height: 1.55;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .plp-card-meta {
        background: #F8FAFC;
        border-radius: 10px;
        padding: 10px 12px;
        margin-bottom: 14px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .plp-meta-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--gray);
    }
    .plp-meta-row i { color: var(--primary); font-size: 10px; width: 12px; flex-shrink: 0; }
    .plp-meta-key { font-weight: 600; color: #94A3B8; min-width: 78px; }

    .plp-card-price {
        font-family: 'Outfit', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 14px;
        display: flex;
        align-items: baseline;
        gap: 8px;
    }
    .plp-card-price .orig-price {
        font-size: 13px;
        font-weight: 500;
        color: #CBD5E1;
        text-decoration: line-through;
    }

    .plp-card-actions {
        display: flex;
        gap: 8px;
        margin-top: auto;
    }
    .plp-btn-view {
        width: 42px; height: 42px;
        background: var(--light);
        border: 1.5px solid #E2E8F0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray);
        font-size: 14px;
        text-decoration: none;
        flex-shrink: 0;
        transition: all 0.2s;
    }
    .plp-btn-view:hover {
        background: var(--primary-light);
        border-color: var(--primary);
        color: var(--primary);
    }
    .plp-btn-quote {
        flex: 1;
        height: 42px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: all 0.2s;
        cursor: pointer;
    }
    .plp-btn-quote:hover {
        background: var(--primary-dark);
        color: white;
        box-shadow: 0 6px 16px rgba(14,165,233,0.3);
    }

    /* Empty state */
    .plp-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 80px 24px;
        background: white;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
    }
    .plp-empty i { font-size: 46px; color: #CBD5E1; display: block; margin-bottom: 16px; }
    .plp-empty h3 { font-family: 'Outfit', sans-serif; font-size: 20px; color: var(--dark); margin-bottom: 8px; }
    .plp-empty p { font-size: 14px; color: var(--gray); }

    /* Pagination */
    .plp-pagination {
        margin-top: 32px;
        display: flex;
        justify-content: center;
    }
</style>

@php
    // ===== GET DATA =====
    $allCategories = App\Models\Category::getAllParentWithChild();
    $currentCategorySlug = request()->route('slug') ?? null;
    $currentSubSlug = request()->route('sub_slug') ?? null;
    $currentBrandSlug = request()->route('brand_slug') ?? null;

    // Current category & subcategory object
    $currentCategory = $currentCategorySlug
        ? DB::table('categories')->where('slug', $currentCategorySlug)->first()
        : null;
    $currentSubcategory = $currentSubSlug
        ? DB::table('categories')->where('slug', $currentSubSlug)->first()
        : null;
    $currentBrand = $currentBrandSlug
        ? DB::table('brands')->where('slug', $currentBrandSlug)->first()
        : null;

    // Sidebar brands
    $sidebarBrands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get();

    // Page title
    $pageTitle = $currentSubcategory->title ?? $currentCategory->title ?? $currentBrand->title ?? 'All Products';

    // ===== BUILD QUERY =====
    $query = DB::table('products')
        ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
        ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
        ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
        ->where('products.status', 'active')
        ->select(
            'products.*',
            'parent_cat.title as category_name',
            'parent_cat.slug as category_slug',
            'child_cat.title as subcategory_name',
            'child_cat.slug as subcategory_slug',
            'manufacturers.name as manufacturer_name',
            'brands.title as brand_name',
            'brands.slug as brand_slug_col'
        );

    // Category filter
    if ($currentCategory) {
        $query->where('products.cat_id', $currentCategory->id);
    }
    // Subcategory filter
    if ($currentSubcategory) {
        $query->where('products.child_cat_id', $currentSubcategory->id);
    }
    // Brand filter
    if ($currentBrand) {
        $query->where('products.brand_id', $currentBrand->id);
    }
    // Search filter
    if(request('search')) {
        $s = request('search');
        $query->where(function($q) use ($s) {
            $q->where('products.title','like',"%$s%")
              ->orWhere('products.part_number','like',"%$s%")
              ->orWhere('products.model_number','like',"%$s%")
              ->orWhere('manufacturers.name','like',"%$s%");
        });
    }
    // Price filter
    if(request('min_price')) { $query->where('products.price','>=',request('min_price')); }
    if(request('max_price')) { $query->where('products.price','<=',request('max_price')); }

    // Sort
    switch(request('sortBy')) {
        case 'title':       $query->orderBy('products.title','asc'); break;
        case 'price_asc':   $query->orderBy('products.price','asc'); break;
        case 'price_desc':  $query->orderBy('products.price','desc'); break;
        default:            $query->orderBy('products.id','desc'); break;
    }

    $perPage = (int) request('show', 12);
    $products = $query->paginate($perPage)->withQueryString();
    $totalCount = $products->total();
@endphp

{{-- ===== PAGE HEADER ===== --}}
<div class="plp-header">
    <div class="plp-header-inner">
        <div class="plp-header-top">
            <div>
                <h1 class="plp-title">
                    @if($currentBrand)
                        Brand: <span>{{ $currentBrand->title }}</span>
                    @elseif($currentSubcategory)
                        <span>{{ $currentSubcategory->title }}</span>
                    @elseif($currentCategory)
                        <span>{{ $currentCategory->title }}</span>
                    @else
                        All <span>Products</span>
                    @endif
                </h1>
                <div class="plp-breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="{{ route('shop') }}">Shop</a>
                    @if($currentCategory)
                        <i class="fas fa-chevron-right"></i>
                        <a href="{{ route('product-cat', $currentCategory->slug) }}">{{ $currentCategory->title }}</a>
                    @endif
                    @if($currentSubcategory)
                        <i class="fas fa-chevron-right"></i>
                        <span style="color: var(--primary);">{{ $currentSubcategory->title }}</span>
                    @endif
                    @if($currentBrand)
                        <i class="fas fa-chevron-right"></i>
                        <span style="color: var(--primary);">{{ $currentBrand->title }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="plp-stats-row">
            <div class="plp-stat-chip">
                <i class="fas fa-boxes"></i>
                <strong>{{ $totalCount }}</strong> Products
            </div>
            @if($currentCategory)
            <div class="plp-stat-chip">
                <i class="fas fa-layer-group"></i>
                Category: <strong>{{ $currentCategory->title }}</strong>
            </div>
            @endif
            @if($currentBrand)
            <div class="plp-stat-chip">
                <i class="fas fa-certificate"></i>
                Brand: <strong>{{ $currentBrand->title }}</strong>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- ===== MAIN LAYOUT ===== --}}
<div class="plp-wrap">
    <div class="plp-layout">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="plp-sidebar" id="plpSidebar">

            {{-- Categories Widget --}}
            <div class="plp-widget">
                <div class="plp-widget-title">
                    <i class="fas fa-layer-group"></i> Categories
                </div>
                <ul class="plp-cat-nav">
                    <li>
                        <a href="{{ route('shop') }}" class="{{ !$currentCategorySlug ? 'active' : '' }}">
                            All Products
                            <span class="cat-badge">All</span>
                        </a>
                    </li>
                    @if($allCategories)
                    @foreach($allCategories as $catItem)
                    @php $catProductCount = DB::table('products')->where('cat_id',$catItem->id)->where('status','active')->count(); @endphp
                    <li>
                        <a href="{{ route('product-cat', $catItem->slug) }}"
                           class="{{ $currentCategorySlug == $catItem->slug ? 'active' : '' }}">
                            {{ $catItem->title }}
                            <span class="cat-badge">{{ $catProductCount }}</span>
                        </a>
                        @if($catItem->child_cat && $catItem->child_cat->count() && ($currentCategorySlug == $catItem->slug || $currentSubSlug))
                        <ul class="plp-sub-nav">
                            @foreach($catItem->child_cat as $subItem)
                            <li>
                                <a href="{{ route('product-sub-cat', [$catItem->slug, $subItem->slug]) }}"
                                   class="{{ $currentSubSlug == $subItem->slug ? 'active' : '' }}">
                                    {{ $subItem->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>

            {{-- Brands Widget --}}
            <div class="plp-widget">
                <div class="plp-widget-title">
                    <i class="fas fa-certificate"></i> Brands
                </div>
                <ul class="plp-brand-list">
                    @foreach($sidebarBrands as $brand)
                    <li>
                        <a href="{{ route('product-brand', $brand->slug) }}"
                           class="{{ $currentBrandSlug == $brand->slug ? 'active' : '' }}">
                            <span>{{ $brand->title }}</span>
                            <span class="brand-dot"></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

          

        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="plp-main">

            {{-- Mobile toggle --}}
            <button class="plp-mobile-filter-btn" onclick="document.getElementById('plpSidebar').classList.toggle('open')">
                <i class="fas fa-sliders-h"></i> Filters
                @if(request('min_price') || request('max_price') || request('search'))
                <span style="background:white;color:var(--primary);font-size:11px;padding:1px 6px;border-radius:10px;">Active</span>
                @endif
            </button>

            {{-- Active filter tags --}}
            @if(request('search') || request('min_price') || request('max_price'))
            <div class="plp-active-filters">
                @if(request('search'))
                <span class="plp-filter-tag">
                    <i class="fas fa-search" style="font-size:10px;"></i>
                    "{{ request('search') }}"
                    <a href="{{ request()->fullUrlWithoutQuery(['search']) }}"><i class="fas fa-times"></i></a>
                </span>
                @endif
                @if(request('min_price') || request('max_price'))
                <span class="plp-filter-tag">
                    <i class="fas fa-pound-sign" style="font-size:10px;"></i>
                    £{{ request('min_price',0) }} – £{{ request('max_price','∞') }}
                    <a href="{{ request()->fullUrlWithoutQuery(['min_price','max_price']) }}"><i class="fas fa-times"></i></a>
                </span>
                @endif
            </div>
            @endif

            {{-- Controls: count + sort --}}
            <form method="GET" action="{{ request()->url() }}" id="plpSortForm">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif

                <div class="plp-controls">
                    <div class="plp-count">
                        Showing
                        <strong>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</strong>
                        of <strong>{{ $totalCount }}</strong> results
                    </div>
                    <div class="plp-sort-row">
                        <label>Show:</label>
                        <select name="show" onchange="document.getElementById('plpSortForm').submit()">
                            <option value="12" {{ request('show',12)==12 ? 'selected':'' }}>12</option>
                            <option value="24" {{ request('show')==24 ? 'selected':'' }}>24</option>
                            <option value="36" {{ request('show')==36 ? 'selected':'' }}>36</option>
                        </select>
                        <label>Sort:</label>
                        <select name="sortBy" onchange="document.getElementById('plpSortForm').submit()">
                            <option value="">Default</option>
                            <option value="title" {{ request('sortBy')=='title' ? 'selected':'' }}>Name A–Z</option>
                            <option value="price_asc" {{ request('sortBy')=='price_asc' ? 'selected':'' }}>Price: Low–High</option>
                            <option value="price_desc" {{ request('sortBy')=='price_desc' ? 'selected':'' }}>Price: High–Low</option>
                            <option value="newest" {{ request('sortBy')=='newest' ? 'selected':'' }}>Newest</option>
                        </select>
                    </div>
                </div>
            </form>

            {{-- ===== PRODUCTS GRID ===== --}}
            <div class="plp-grid">
                @forelse($products as $i => $product)
                @php
                    $photos = json_decode($product->photo, true);
                    $image = $photos[0] ?? 'frontend/img/no-image.png';
                    $discountedPrice = $product->discount > 0
                        ? $product->price - ($product->price * $product->discount / 100)
                        : $product->price;
                @endphp

                <div class="plp-product-card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 60 }}">
                    @if($product->discount > 0)
                    <div class="plp-discount-badge">-{{ $product->discount }}%</div>
                    @endif

                    <div class="plp-card-body">
                        {{-- Breadcrumb --}}
                        <div class="plp-card-breadcrumb">
                            @if($product->category_name)
                            <span>{{ $product->category_name }}</span>
                            @endif
                            @if($product->subcategory_name)
                            <i class="fas fa-chevron-right"></i>
                            <span>{{ $product->subcategory_name }}</span>
                            @endif
                        </div>

                        {{-- Title --}}
                        <a href="{{ route('product-detail', $product->slug) }}" class="plp-card-title">
                            {{ $product->title }}
                        </a>

                        {{-- Summary --}}
                        @if($product->summary)
                        <div class="plp-card-summary">
                            {{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 80) }}
                        </div>
                        @endif

                        {{-- Meta --}}
                        <div class="plp-card-meta">
                            @if($product->manufacturer_name)
                            <div class="plp-meta-row">
                                <i class="fas fa-industry"></i>
                                <span class="plp-meta-key">Manufacturer:</span>
                                <span>{{ $product->manufacturer_name }}</span>
                            </div>
                            @endif
                            @if($product->part_number)
                            <div class="plp-meta-row">
                                <i class="fas fa-barcode"></i>
                                <span class="plp-meta-key">Part No:</span>
                                <span>{{ $product->part_number }}</span>
                            </div>
                            @endif
                            @if($product->model_number)
                            <div class="plp-meta-row">
                                <i class="fas fa-tag"></i>
                                <span class="plp-meta-key">Model:</span>
                                <span>{{ $product->model_number }}</span>
                            </div>
                            @endif
                            @if($product->brand_name)
                            <div class="plp-meta-row">
                                <i class="fas fa-certificate"></i>
                                <span class="plp-meta-key">Brand:</span>
                                <span>{{ $product->brand_name }}</span>
                            </div>
                            @endif
                        </div>

                        {{-- Price --}}
                        <div class="plp-card-price">
                            £{{ number_format($discountedPrice, 2) }}
                            @if($product->discount > 0)
                            <span class="orig-price">£{{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="plp-card-actions">
                            <a href="{{ route('product-detail', $product->slug) }}" class="plp-btn-view" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('add-to-cart', $product->slug) }}" class="plp-btn-quote">
                                <i class="fas fa-file-invoice"></i>
                                Request Quote
                            </a>
                        </div>
                    </div>
                </div>

                @empty
                <div class="plp-empty">
                    <i class="fas fa-search-minus"></i>
                    <h3>No Products Found</h3>
                    <p>
                        @if(request('search'))
                            No results for "{{ request('search') }}". Try a different search term.
                        @else
                            No products available in this category yet.
                        @endif
                    </p>
                    <a href="{{ route('shop') }}" style="display:inline-flex;align-items:center;gap:6px;margin-top:16px;padding:10px 24px;background:var(--primary);color:white;border-radius:10px;text-decoration:none;font-weight:700;font-size:14px;">
                        Back to All Products
                    </a>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="plp-pagination">
                {{ $products->withQueryString()->links() }}
            </div>

        </div>
    </div>
</div>

@endsection