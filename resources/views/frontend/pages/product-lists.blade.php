@extends('frontend.layouts.master')

@section('title', isset($pageTitle) ? $pageTitle . ' — Petchemparts' : 'Products — Petchemparts')

@section('main-content')

@php
    // ===== GET DATA =====
    $allCategories = App\Models\Category::getAllParentWithChild();
    $currentCategorySlug = request()->route('slug') ?? null;
    $currentSubSlug = request()->route('sub_slug') ?? null;
    $currentBrandSlug = request()->route('slug') ?? null;

    $currentCategory = $currentCategorySlug
        ? DB::table('categories')->where('slug', $currentCategorySlug)->first()
        : null;
    $currentSubcategory = $currentSubSlug
        ? DB::table('categories')->where('slug', $currentSubSlug)->first()
        : null;
    $currentBrand = $currentBrandSlug
        ? DB::table('brands')->where('slug', $currentBrandSlug)->first()
        : null;

    $sidebarBrands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get();

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

    if ($currentCategory)   { $query->where('products.cat_id', $currentCategory->id); }
    if ($currentSubcategory){ $query->where('products.child_cat_id', $currentSubcategory->id); }
    if ($currentBrand)      { $query->where('products.brand_id', $currentBrand->id); }

    if (request('search')) {
        $s = request('search');
        $query->where(function($q) use ($s) {
            $q->where('products.title','like',"%$s%")
              ->orWhere('products.part_number','like',"%$s%")
              ->orWhere('products.model_number','like',"%$s%")
              ->orWhere('manufacturers.name','like',"%$s%");
        });
    }
    if (request('min_price')) { $query->where('products.price','>=',request('min_price')); }
    if (request('max_price')) { $query->where('products.price','<=',request('max_price')); }

    switch (request('sortBy')) {
        case 'title':      $query->orderBy('products.title','asc'); break;
        case 'price_asc':  $query->orderBy('products.price','asc'); break;
        case 'price_desc': $query->orderBy('products.price','desc'); break;
        default:           $query->orderBy('products.id','desc'); break;
    }

    $perPage = (int) request('show', 12);
    $products = $query->paginate($perPage)->withQueryString();
    $totalCount = $products->total();
@endphp

<style>
/* ══════════════ TOKENS (fallback if not global) ══════════════ */
:root{
    --ink:#141414; --ink-soft:#333; --paper:#F6F4EF; --paper-2:#EFEAE0;
    --white:#fff; --line:#E4DFD4; --line-soft:#ECE7DC; --muted:#8A8375;
    --brass:#A9772F; --brass-2:#8B5F22;  

    --shadow-sm:0 2px 8px rgba(0,0,0,.06);
}

/* ── HERO ── */
.pgp-hero{ background:var(--ink); padding:105px 48px 60px; position:relative; overflow:hidden; }
.pgp-hero::before{
    content:''; position:absolute; inset:0;
    background-image:linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
                      linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:52px 52px;
}
.pgp-hero-inner{ position:relative; z-index:2; max-width:1380px; margin:0 auto; }
.pgp-breadcrumb{ display:flex; align-items:center; flex-wrap:wrap; gap:8px;
    font-family:'JetBrains Mono',monospace; font-size:11px; letter-spacing:1px;
    color:var(--muted); margin-bottom:20px; }
.pgp-breadcrumb a{ color:var(--muted); text-decoration:none; }
.pgp-breadcrumb a:hover{ color:var(--brass); }
.pgp-breadcrumb i{ font-size:9px; opacity:.6; }
.pgp-hero h1{ font-family:'Fraunces',serif; font-weight:450; font-size:clamp(30px,4vw,52px);
    letter-spacing:-1px; color:#fff; line-height:1.08; }
.pgp-hero h1 span{ color:var(--green); font-style:italic; }
.pgp-stats-row{ display:flex; flex-wrap:wrap; gap:10px; margin-top:22px; }
.pgp-stat-chip{ display:flex; align-items:center; gap:8px;
    font-family:'JetBrains Mono',monospace; font-size:11px; letter-spacing:.5px;
    color:rgba(255,255,255,.7); background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12); padding:8px 14px; border-radius:20px; }
.pgp-stat-chip strong{ color:#fff; }
.pgp-stat-chip i{ color:var(--green); font-size:11px; }

/* ── LAYOUT ── */
.pgp-wrap{ background:var(--paper); }
.pgp-layout{ max-width:1380px; margin:0 auto; padding:56px 48px 100px;
    display:grid; grid-template-columns:280px 1fr; gap:44px; align-items:start; }
@media(max-width:1024px){ .pgp-layout{ grid-template-columns:1fr; } }

/* ── SIDEBAR ── */
.pgp-sidebar{ display:flex; flex-direction:column; gap:1px; position:sticky; top:24px; }
.pgp-widget{ background:var(--white); border:1px solid var(--line); }
.pgp-widget + .pgp-widget{ margin-top:20px; }
.pgp-widget-title{ font-family:'JetBrains Mono',monospace; font-size:11px; letter-spacing:1.5px;
    text-transform:uppercase; color:var(--muted); padding:18px 20px; border-bottom:1px solid var(--line-soft);
    display:flex; align-items:center; gap:8px; }
.pgp-widget-title i{ color:var(--green); font-size:11px; }



     .pgp-cat-nav, .pgp-brand-list{ list-style:none; margin:0; padding:10px 0; }

.pgp-brand-list{
    max-height:300px;
    overflow-y:auto;
}
.pgp-cat-nav > li > a, .pgp-brand-list li a{
    display:flex; align-items:center; justify-content:space-between; gap:10px;
    padding:10px 20px; font-family:'JetBrains Mono',monospace; font-size:12px;
    color:var(--ink-soft); text-decoration:none; transition:all .2s; border-left:2px solid transparent; }
.pgp-cat-nav > li > a:hover, .pgp-brand-list li a:hover{ background:var(--paper); color:var(--ink); }
.pgp-cat-nav > li > a.active, .pgp-brand-list li a.active{
    background:var(--paper); color:var(--ink); font-weight:600; border-left-color:var(--green); }
.pgp-cat-badge{ font-size:10px; color:var(--muted); background:var(--paper-2);
    padding:2px 8px; border-radius:10px; }
.pgp-cat-nav > li > a.active .pgp-cat-badge{ background:var(--ink); color:#fff; }

.pgp-sub-nav{ list-style:none; margin:0 0 6px; padding:0 0 0 32px; }
.pgp-sub-nav li a{ display:block; padding:7px 12px; font-family:'JetBrains Mono',monospace;
    font-size:11px; color:var(--muted); text-decoration:none; border-left:2px solid var(--line-soft);
    transition:all .2s; }
.pgp-sub-nav li a:hover{ color:var(--ink); }
.pgp-sub-nav li a.active{ color:var(--brass); border-left-color:var(--brass); font-weight:600; }

.pgp-brand-list li a{ justify-content:flex-start; }
.pgp-brand-dot{ width:5px; height:5px; border-radius:50%; background:var(--line); margin-left:auto; }
.pgp-brand-list li a.active .pgp-brand-dot{ background:var(--green); }

/* Mobile filter toggle */
.pgp-mobile-filter-btn{ display:none; width:100%; align-items:center; justify-content:center; gap:8px;
    background:var(--ink); color:#fff; border:none; padding:14px; font-family:'JetBrains Mono',monospace;
    font-size:12px; letter-spacing:.5px; border-radius:6px; margin-bottom:20px; cursor:pointer; }
@media(max-width:1024px){
    .pgp-mobile-filter-btn{ display:flex; }
    .pgp-sidebar{ display:none; position:static; }
    .pgp-sidebar.open{ display:flex; margin-bottom:20px; }
}

/* ── ACTIVE FILTER TAGS ── */
.pgp-active-filters{ display:flex; flex-wrap:wrap; gap:8px; margin-bottom:20px; }
.pgp-filter-tag{ display:flex; align-items:center; gap:8px; background:var(--white);
    border:1px solid var(--line); padding:6px 12px; border-radius:20px;
    font-family:'JetBrains Mono',monospace; font-size:11px; color:var(--ink-soft); }
.pgp-filter-tag a{ color:var(--muted); text-decoration:none; }
.pgp-filter-tag a:hover{ color:#c0392b; }

/* ── CONTROLS ── */
.pgp-controls{ display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:14px;
    padding-bottom:20px; margin-bottom:32px; border-bottom:1px solid var(--line); }
.pgp-count{ font-family:'JetBrains Mono',monospace; font-size:11px; letter-spacing:1px;
    color:var(--muted); text-transform:uppercase; }
.pgp-count strong{ color:var(--ink); }
.pgp-sort-row{ display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
.pgp-sort-row label{ font-family:'JetBrains Mono',monospace; font-size:11px; color:var(--muted); }
.pgp-sort-row select{ font-family:'JetBrains Mono',monospace; font-size:11.5px; color:var(--ink);
    border:1px solid var(--line); background:var(--white); padding:8px 12px; border-radius:5px;
    cursor:pointer; }

/* ── GRID (same visual language as All-Products cards) ── */
.pgp-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:1px;
    background:var(--line); border:1px solid var(--line); margin-bottom:50px; }
@media(max-width:900px){ .pgp-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:560px){ .pgp-grid{ grid-template-columns:1fr; } }

.pgp-card{ background:var(--white); padding:26px; display:flex; flex-direction:column;
    position:relative; transition:background .3s; }
.pgp-card:hover{ background:var(--paper); }

.pgp-discount-badge{ position:absolute; top:14px; right:14px; font-family:'JetBrains Mono',monospace;
    font-size:9px; letter-spacing:.5px; padding:4px 9px; border-radius:12px;
    background:#fff; color:var(--brass); font-weight:600; box-shadow:var(--shadow-sm); }

.pgp-cats{ font-family:'JetBrains Mono',monospace; font-size:10px; color:var(--muted);
    letter-spacing:1px; text-transform:uppercase; margin-bottom:10px; display:flex; align-items:center; gap:6px; }
.pgp-cats i{ font-size:8px; opacity:.6; }

.pgp-card-title{ font-family:'Fraunces',serif; font-weight:500; font-size:16px; color:var(--ink);
    margin-bottom:8px; line-height:1.3; text-decoration:none; display:block; }
.pgp-card-title:hover{ color:var(--brass); }

.pgp-card-summary{ font-family:'JetBrains Mono',monospace; font-size:11px; color:var(--muted);
    line-height:1.5; margin-bottom:12px; }

.pgp-meta{ display:flex; flex-direction:column; gap:4px; margin-bottom:14px; flex:1; }
.pgp-meta-row{ font-family:'JetBrains Mono',monospace; font-size:10.5px; color:var(--muted);
    display:flex; align-items:center; gap:6px; }
.pgp-meta-row i{ width:12px; color:var(--green); font-size:10px; }
.pgp-meta-row .pgp-meta-key{ color:var(--ink-soft); font-weight:600; }

.pgp-card-price{ font-family:'Fraunces',serif; font-weight:560; font-size:18px; color:var(--ink);
    margin-bottom:16px; padding-top:16px; border-top:1px solid var(--line-soft); margin-top:auto; }
.pgp-card-price .orig-price{ font-size:12px; color:var(--muted); text-decoration:line-through;
    margin-left:8px; font-weight:400; font-family:'JetBrains Mono',monospace; }

.pgp-card-actions{ display:flex; gap:8px; }
.pgp-btn-view{ width:36px; height:36px; border-radius:50%; border:1px solid var(--line);
    display:flex; align-items:center; justify-content:center; color:var(--ink); text-decoration:none;
    transition:all .3s; flex-shrink:0; }
.pgp-btn-view:hover{ background:var(--ink); color:#fff; border-color:var(--ink); }
.pgp-btn-quote{ flex:1; height:36px; padding:0 16px; background:var(--ink); color:#fff; border:none;
    border-radius:20px; font-family:'JetBrains Mono',monospace; font-size:10.5px; letter-spacing:.5px;
    text-decoration:none; display:flex; align-items:center; justify-content:center; gap:6px;
    transition:background .25s, transform .25s; cursor:pointer; }
.pgp-btn-quote:hover{ background:var(--green); color:#fff; transform:translateY(-2px); }

/* ── EMPTY ── */
.pgp-empty{ grid-column:1/-1; text-align:center; padding:90px 20px; }
.pgp-empty i{ font-size:36px; color:var(--line); margin-bottom:16px; }
.pgp-empty h3{ font-family:'Fraunces',serif; font-size:22px; color:var(--ink); margin-bottom:8px; }
.pgp-empty p{ font-family:'JetBrains Mono',monospace; font-size:12px; color:var(--muted); }

/* ── PAGINATION ── */
.pgp-pagination-wrap{ display:flex; flex-direction:column; align-items:center; gap:16px; }
.pgp-pagination-info{ font-family:'JetBrains Mono',monospace; font-size:11px; letter-spacing:.5px;
    color:var(--muted); text-transform:uppercase; }
.pgp-pagination{ display:flex; align-items:center; justify-content:center; gap:6px; flex-wrap:wrap;
    list-style:none; margin:0; padding:0; }
.pgp-pg-item{ display:flex; }
.pgp-pg-link{ min-width:36px; height:36px; padding:0 6px; display:flex; align-items:center;
    justify-content:center; font-family:'JetBrains Mono',monospace; font-size:12px;
    border:1px solid var(--line); border-radius:6px; color:var(--ink); background:var(--white);
    text-decoration:none; line-height:1; transition:all .2s ease; box-sizing:border-box; }
a.pgp-pg-link:hover{ background:var(--ink); border-color:var(--ink); color:#fff; }
.pgp-pg-item.is-active .pgp-pg-link{ background:var(--ink); border-color:var(--ink); color:#fff; font-weight:600; }
.pgp-pg-item.is-dots .pgp-pg-link{ border:none; background:transparent; color:var(--muted); cursor:default; }
.pgp-pg-item.is-disabled .pgp-pg-link{ color:var(--muted); background:var(--paper-2); border-color:var(--line);
    opacity:.55; cursor:not-allowed; }
.pgp-pg-link.pgp-pg-arrow svg{ width:13px; height:13px; stroke:currentColor; display:block; }
@media(max-width:480px){ .pgp-pg-link{ min-width:32px; height:32px; font-size:11px; } }

@media(max-width:768px){ .pgp-hero,.pgp-layout{ padding-left:24px; padding-right:24px; } }
</style>

{{-- ===== PAGE HEADER ===== --}}
<div class="pgp-hero">
    <div class="pgp-hero-inner">
        <div class="pgp-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('shop') }}">Shop</a>
            @if($currentCategory)
                <i class="fas fa-chevron-right"></i>
                <a href="{{ route('product-cat', $currentCategory->slug) }}">{{ $currentCategory->title }}</a>
            @endif
            @if($currentSubcategory)
                <i class="fas fa-chevron-right"></i>
                <span style="color:rgba(255,255,255,.6);">{{ $currentSubcategory->title }}</span>
            @endif
            @if($currentBrand)
                <i class="fas fa-chevron-right"></i>
                <span style="color:rgba(255,255,255,.6);">{{ $currentBrand->title }}</span>
            @endif
        </div>

        <h1>
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

        <div class="pgp-stats-row">
            <div class="pgp-stat-chip"><i class="fas fa-boxes"></i> <strong>{{ $totalCount }}</strong> Products</div>
            @if($currentCategory)
            <div class="pgp-stat-chip"><i class="fas fa-layer-group"></i> Category: <strong>{{ $currentCategory->title }}</strong></div>
            @endif
            @if($currentBrand)
            <div class="pgp-stat-chip"><i class="fas fa-certificate"></i> Brand: <strong>{{ $currentBrand->title }}</strong></div>
            @endif
        </div>
    </div>
</div>

{{-- ===== MAIN LAYOUT ===== --}}
<div class="pgp-wrap">
    <div class="pgp-layout">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="pgp-sidebar" id="plpSidebar">

            <div class="pgp-widget">
                <div class="pgp-widget-title"><i class="fas fa-layer-group"></i> Categories</div>
                <ul class="pgp-cat-nav">
                    <li>
                        <a href="{{ route('shop') }}" class="{{ !$currentCategorySlug ? 'active' : '' }}">
                            All Products <span class="pgp-cat-badge">All</span>
                        </a>
                    </li>
                    @if($allCategories)
                    @foreach($allCategories as $catItem)
                    @php $catProductCount = DB::table('products')->where('cat_id',$catItem->id)->where('status','active')->count(); @endphp
                    <li>
                        <a href="{{ route('product-cat', $catItem->slug) }}"
                           class="{{ $currentCategorySlug == $catItem->slug ? 'active' : '' }}">
                            {{ $catItem->title }}
                            <span class="pgp-cat-badge">{{ $catProductCount }}</span>
                        </a>
                        @if($catItem->child_cat && $catItem->child_cat->count() && ($currentCategorySlug == $catItem->slug || $currentSubSlug))
                        <ul class="pgp-sub-nav">
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

            <div class="pgp-widget">
                <div class="pgp-widget-title"><i class="fas fa-certificate"></i> Brands</div>
                <ul class="pgp-brand-list">
                    @foreach($sidebarBrands as $brand)
                    <li>
                        <a href="{{ route('product-brand', $brand->slug) }}"
                           class="{{ $currentBrandSlug == $brand->slug ? 'active' : '' }}">
                            <span>{{ $brand->title }}</span>
                            <span class="pgp-brand-dot"></span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <div class="pgp-main">

            <button class="pgp-mobile-filter-btn" onclick="document.getElementById('plpSidebar').classList.toggle('open')">
                <i class="fas fa-sliders-h"></i> Filters
                @if(request('min_price') || request('max_price') || request('search'))
                <span style="background:#fff;color:var(--ink);font-size:11px;padding:1px 6px;border-radius:10px;">Active</span>
                @endif
            </button>

            @if(request('search') || request('min_price') || request('max_price'))
            <div class="pgp-active-filters">
                @if(request('search'))
                <span class="pgp-filter-tag">
                    <i class="fas fa-search"></i> "{{ request('search') }}"
                    <a href="{{ request()->fullUrlWithoutQuery(['search']) }}"><i class="fas fa-times"></i></a>
                </span>
                @endif
                @if(request('min_price') || request('max_price'))
                <span class="pgp-filter-tag">
                    <i class="fas fa-pound-sign"></i> £{{ request('min_price',0) }} – £{{ request('max_price','∞') }}
                    <a href="{{ request()->fullUrlWithoutQuery(['min_price','max_price']) }}"><i class="fas fa-times"></i></a>
                </span>
                @endif
            </div>
            @endif

            <form method="GET" action="{{ request()->url() }}" id="plpSortForm">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif

                <div class="pgp-controls">
                    <div class="pgp-count">
                        Showing <strong>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</strong>
                        of <strong>{{ $totalCount }}</strong> results
                    </div>
                    <div class="pgp-sort-row">
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
            <div class="pgp-grid">
                @forelse($products as $product)
                @php
                    $photos = json_decode($product->photo, true);
                    $image = $photos[0] ?? null;
                    $discountedPrice = $product->discount > 0
                        ? $product->price - ($product->price * $product->discount / 100)
                        : $product->price;
                @endphp

                <div class="pgp-card">
                    @if($product->discount > 0)
                    <div class="pgp-discount-badge">-{{ $product->discount }}%</div>
                    @endif

                    <div class="pgp-cats">
                        @if($product->category_name)<span>{{ $product->category_name }}</span>@endif
                        @if($product->subcategory_name)<i class="fas fa-chevron-right"></i><span>{{ $product->subcategory_name }}</span>@endif
                    </div>

                    <a href="{{ route('product-detail', $product->slug) }}" class="pgp-card-title">
                        {{ Str::limit($product->title, 55) }}
                    </a>

                    @if($product->summary)
                    <div class="pgp-card-summary">
                        {{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 80) }}
                    </div>
                    @endif

                    <div class="pgp-meta">
                        @if($product->manufacturer_name)
                        <div class="pgp-meta-row"><i class="fas fa-industry"></i> <span class="pgp-meta-key">MFR</span> {{ $product->manufacturer_name }}</div>
                        @endif
                        @if($product->part_number)
                        <div class="pgp-meta-row"><i class="fas fa-barcode"></i> <span class="pgp-meta-key">Part No</span> {{ $product->part_number }}</div>
                        @endif
                        @if($product->model_number)
                        <div class="pgp-meta-row"><i class="fas fa-tag"></i> <span class="pgp-meta-key">Model</span> {{ $product->model_number }}</div>
                        @endif
                        @if($product->brand_name)
                        <div class="pgp-meta-row"><i class="fas fa-certificate"></i> <span class="pgp-meta-key">Brand</span> {{ $product->brand_name }}</div>
                        @endif
                    </div>

                    <div class="pgp-card-price">
                        £{{ number_format($discountedPrice, 2) }}
                        @if($product->discount > 0)
                        <span class="orig-price">£{{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>

                    <div class="pgp-card-actions">
                        <a href="{{ route('product-detail', $product->slug) }}" class="pgp-btn-view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('add-to-cart', $product->slug) }}" class="pgp-btn-quote">
                            <i class="fas fa-file-invoice"></i> Request Quote
                        </a>
                    </div>
                </div>

                @empty
                <div class="pgp-empty">
                    <i class="fas fa-search-minus"></i>
                    <h3>No Products Found</h3>
                    <p>
                        @if(request('search'))
                            No results for "{{ request('search') }}". Try a different search term.
                        @else
                            No products available in this category yet.
                        @endif
                    </p>
                </div>
                @endforelse
            </div>

            {{-- ===== PAGINATION ===== --}}
            @if($products->lastPage() > 1)
            <div class="pgp-pagination-wrap">
                <div class="pgp-pagination-info">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</div>

                @php
                    $current = $products->currentPage();
                    $last    = $products->lastPage();
                    $window  = 1;
                    $pages = collect();
                    $pages->push(1);
                    for ($i = $current - $window; $i <= $current + $window; $i++) {
                        if ($i > 1 && $i < $last) $pages->push($i);
                    }
                    if ($last > 1) $pages->push($last);
                    $pages = $pages->unique()->sort()->values();
                @endphp

                <ul class="pgp-pagination">
                    <li class="pgp-pg-item {{ $current == 1 ? 'is-disabled' : '' }}">
                        @if($current == 1)
                            <span class="pgp-pg-link pgp-pg-arrow">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                            </span>
                        @else
                            <a href="{{ $products->url($current - 1) }}" class="pgp-pg-link pgp-pg-arrow" aria-label="Previous">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                            </a>
                        @endif
                    </li>

                    @foreach($pages as $i => $page)
                        @if($i > 0 && $page - $pages[$i - 1] > 1)
                        <li class="pgp-pg-item is-dots"><span class="pgp-pg-link">…</span></li>
                        @endif
                        <li class="pgp-pg-item {{ $page == $current ? 'is-active' : '' }}">
                            @if($page == $current)
                                <span class="pgp-pg-link">{{ $page }}</span>
                            @else
                                <a href="{{ $products->url($page) }}" class="pgp-pg-link">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach

                    <li class="pgp-pg-item {{ $current == $last ? 'is-disabled' : '' }}">
                        @if($current == $last)
                            <span class="pgp-pg-link pgp-pg-arrow">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                            </span>
                        @else
                            <a href="{{ $products->url($current + 1) }}" class="pgp-pg-link pgp-pg-arrow" aria-label="Next">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            @endif

        </div>
    </div>
</div>

@endsection