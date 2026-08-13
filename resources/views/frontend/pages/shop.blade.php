@extends('frontend.layouts.master')

@section('title', 'Shop — Petchemparts Industrial & Petrochemical Parts')

@section('main-content')

@php
    $sidebarCats   = DB::table('categories')->where('status','active')->whereNull('parent_id')->get();
    $sidebarSubs   = DB::table('categories')->where('status','active')->whereNotNull('parent_id')->get()->groupBy('parent_id');
    $sidebarBrands = DB::table('brands')->where('status','active')->orderBy('title','asc')->get();

    $totalProducts = DB::table('products')->where('status','active')->count();
    $totalCats     = DB::table('categories')->where('status','active')->whereNull('parent_id')->count();

    $query = DB::table('products')
        ->leftJoin('categories as pc', 'products.cat_id', '=', 'pc.id')
        ->leftJoin('categories as cc', 'products.child_cat_id', '=', 'cc.id')
        ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
        ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
        ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')
        ->where('products.status', 'active')
        ->select(
            'products.*',
            'pc.title as category_name',
            'cc.title as subcategory_name',
            'manufacturers.name as manufacturer_name',
            'pdfs.file as pdf_file',
            'brands.title as brand_name'
        );

    if (request('search')) {
        $s = request('search');
        $query->where(function ($q) use ($s) {
            $q->where('products.title', 'like', "%$s%")
              ->orWhere('products.part_number', 'like', "%$s%")
              ->orWhere('products.model_number', 'like', "%$s%")
              ->orWhere('manufacturers.name', 'like', "%$s%")
              ->orWhere('brands.title', 'like', "%$s%");
        });
    }
    if (request('min_price')) { $query->where('products.price', '>=', request('min_price')); }
    if (request('max_price')) { $query->where('products.price', '<=', request('max_price')); }

    switch (request('sortBy')) {
        case 'title':      $query->orderBy('products.title', 'asc'); break;
        case 'price_asc':  $query->orderBy('products.price', 'asc'); break;
        case 'price_desc': $query->orderBy('products.price', 'desc'); break;
        default:           $query->orderBy('products.id', 'desc'); break;
    }

    $perPage  = (int) request('show', 12);
    $products = $query->paginate($perPage)->withQueryString();
@endphp

<style>
/* ============================================================
   SHOP — same editorial theme as the "All Products" page
   (Fraunces serif headers, JetBrains Mono labels, ink/paper/
   brass/green palette, flat 1px hairline borders)
   ============================================================ */

/* ── HERO ── */
.shp-hero {
    background: var(--ink);
    padding: 105px 48px 60px;
    position: relative;
    overflow: hidden;
}
.shp-hero::before {
    content:'';
    position:absolute;inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
        linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:52px 52px;
}
.shp-hero-inner {
    position:relative;z-index:2;
    max-width:1380px;margin:0 auto;
    display:flex;align-items:flex-end;justify-content:space-between;
    flex-wrap:wrap;gap:20px;
}
.shp-breadcrumb {
    display:flex;align-items:center;gap:8px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:1px;
    color:var(--muted);margin-bottom:20px;
}
.shp-breadcrumb a { color:var(--muted);text-decoration:none; }
.shp-breadcrumb a:hover { color:var(--brass); }
.shp-hero h1 {
    font-family:'Fraunces',serif;
    font-weight:450;
    font-size:clamp(32px,4vw,56px);
    letter-spacing:-1px;color:#fff;
    line-height:1.08;
}
.shp-hero h1 em { color:var(--green);font-style:italic; }
.shp-hero p {
    color:rgba(255,255,255,.5);
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:.5px;
    margin-top:12px;
}
.shp-hero-stats {
    display:flex;gap:10px;flex-wrap:wrap;
    position:relative;z-index:2;
}
.shp-stat-pill {
    display:inline-flex;align-items:center;gap:7px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.14);
    border-radius:20px;
    padding:7px 16px;
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;letter-spacing:.5px;
    color:rgba(255,255,255,.55);
}
.shp-stat-pill strong { color:#fff; }
.shp-stat-pill svg { width:11px;height:11px;stroke:var(--green);fill:none;stroke-width:2; }

/* ── SECTION / LAYOUT ── */
.shp-section { padding:70px 48px 100px; background:var(--paper); }
.shp-container {
    max-width:1380px;margin:0 auto;
    display:grid;grid-template-columns:280px 1fr;
    gap:36px;align-items:start;
}
@media (max-width:1100px) { .shp-container { grid-template-columns:1fr; } }

/* ── SIDEBAR ── */
.shp-sidebar {
    position:sticky;top:100px;
    display:flex;flex-direction:column;gap:20px;
}
@media (max-width:1100px) {
    .shp-sidebar {
        position:fixed;top:0;left:0;
        width:300px;height:100vh;
        background:var(--white);
        z-index:9999;overflow-y:auto;
        padding:26px 22px;
        box-shadow:6px 0 40px rgba(0,0,0,.22);
        transform:translateX(-100%);
        transition:transform .35s cubic-bezier(.4,0,.2,1);
        display:flex !important;
    }
    .shp-sidebar.open { transform:translateX(0); }
    .shp-close-btn { display:flex !important; }
}
.shp-close-btn {
    display:none;align-items:center;justify-content:space-between;
    margin-bottom:22px;flex-shrink:0;
    padding-bottom:16px;border-bottom:1px solid var(--line);
}
.shp-close-btn span {
    font-family:'Fraunces',serif;
    font-size:17px;font-weight:500;color:var(--ink);
}
.shp-close-btn button {
    width:32px;height:32px;
    background:var(--paper-2);
    border:1px solid var(--line);
    border-radius:50%;cursor:pointer;
    color:var(--muted);font-size:13px;
    display:flex;align-items:center;justify-content:center;
}
.shp-overlay {
    display:none;position:fixed;inset:0;
    background:rgba(15,15,15,.55);
    z-index:9998;backdrop-filter:blur(2px);
}
.shp-overlay.show { display:block; }

.shp-widget {
    background:var(--white);
    border:1px solid var(--line);
    border-radius:2px;
    padding:24px 22px;
}
.shp-widget-title {
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;font-weight:600;
    letter-spacing:1.2px;text-transform:uppercase;
    color:var(--ink);
    display:flex;align-items:center;gap:8px;
    padding-bottom:14px;margin-bottom:14px;
    border-bottom:1px solid var(--line);
}
.shp-widget-title svg { width:12px;height:12px;stroke:var(--green);fill:none;stroke-width:2; }

.shp-cat-list { list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:1px; }
.shp-cat-list li a {
    display:flex;align-items:center;justify-content:space-between;
    padding:9px 10px;border-radius:2px;
    font-family:'JetBrains Mono',monospace;
    font-size:11.5px;letter-spacing:.3px;
    color:var(--ink-soft);text-decoration:none;
    transition:all .2s;
}
.shp-cat-list li a:hover, .shp-cat-list li a.is-active {
    background:var(--paper-2);
    color:var(--ink);
}
.shp-cat-count {
    font-family:'JetBrains Mono',monospace;
    background:var(--paper-2);
    font-size:9.5px;padding:2px 7px;border-radius:9px;
    color:var(--muted);font-weight:600;flex-shrink:0;
}
.shp-cat-list li a:hover .shp-cat-count, .shp-cat-list li a.is-active .shp-cat-count {
    background:#fff;color:var(--green);border:1px solid var(--line);
}
.shp-sub-list {
    list-style:none;padding:2px 0 6px 18px;margin:0 0 0 12px;
    border-left:1px solid var(--line);
}
.shp-sub-list li a {
    display:flex;align-items:center;gap:7px;
    padding:6px 8px;
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;color:var(--muted);
    text-decoration:none;border-radius:2px;
    transition:all .2s;
}
.shp-sub-list li a::before {
    content:'';width:4px;height:4px;
    background:var(--line);border-radius:50%;
    flex-shrink:0;transition:background .2s;
}
.shp-sub-list li a:hover { color:var(--brass); }
.shp-sub-list li a:hover::before { background:var(--brass); }

.shp-brand-list {
    list-style:none;padding:0;margin:0;
    max-height:210px;overflow-y:auto;
    display:flex;flex-direction:column;gap:1px;padding-right:4px;
}
.shp-brand-list::-webkit-scrollbar { width:3px; }
.shp-brand-list::-webkit-scrollbar-track { background:var(--paper-2); }
.shp-brand-list::-webkit-scrollbar-thumb { background:var(--line); border-radius:4px; }
.shp-brand-list li a {
    display:flex;align-items:center;gap:9px;
    padding:7px 10px;border-radius:2px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;color:var(--ink-soft);
    text-decoration:none;transition:all .2s;
}
.shp-brand-list li a:hover { background:var(--paper-2);color:var(--ink); }
.shp-brand-dot {
    width:6px;height:6px;background:var(--line);
    border-radius:50%;flex-shrink:0;transition:background .2s;
}
.shp-brand-list li a:hover .shp-brand-dot { background:var(--green); }

.shp-price-row { display:flex;gap:10px;margin-bottom:14px; }
.shp-price-field { flex:1; }
.shp-price-field label {
    display:block;
    font-family:'JetBrains Mono',monospace;
    font-size:9.5px;color:var(--muted);
    font-weight:600;text-transform:uppercase;letter-spacing:.8px;margin-bottom:6px;
}
.shp-price-field input {
    width:100%;height:38px;padding:0 10px;
    border:1px solid var(--line);border-radius:2px;
    font-family:'JetBrains Mono',monospace;
    font-size:12px;color:var(--ink);
    outline:none;transition:border-color .2s;background:var(--white);
}
.shp-price-field input:focus { border-color:var(--ink); }
.shp-apply-btn {
    width:100%;height:40px;
    background:var(--ink);color:#fff;
    border:none;border-radius:20px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:.6px;font-weight:600;
    cursor:pointer;
    display:flex;align-items:center;justify-content:center;gap:7px;
    transition:all .25s;
}
.shp-apply-btn:hover { background:var(--green); }
.shp-reset-link {
    display:block;text-align:center;margin-top:10px;
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;color:var(--muted);text-decoration:none;transition:color .2s;
}
.shp-reset-link:hover { color:var(--brass); }

/* ── MAIN ── */
.shp-mobile-toggle {
    display:none;align-items:center;gap:8px;
    padding:13px 20px;
    background:var(--ink);color:#fff;
    border:none;border-radius:22px;
    font-family:'JetBrains Mono',monospace;
    font-size:11.5px;letter-spacing:.5px;font-weight:600;
    cursor:pointer;margin-bottom:20px;width:100%;
    justify-content:center;transition:all .2s;
}
.shp-mobile-toggle:hover { background:var(--green); }
@media (max-width:1100px) { .shp-mobile-toggle { display:flex; } }
.shp-mobile-toggle .badge {
    background:#fff;color:var(--ink);
    font-size:9.5px;padding:1px 8px;border-radius:10px;font-weight:700;
}

.shp-search-box {
    background:var(--white);border:1px solid var(--line);
    border-radius:2px;padding:20px 22px;
    margin-bottom:20px;position:relative;
}
.shp-search-row { display:flex;gap:10px; }
.shp-search-row input {
    flex:1;height:48px;padding:0 18px;
    border:1px solid var(--line);border-radius:2px;
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:14px;color:var(--ink);outline:none;transition:all .2s;
    background:var(--white);
}
.shp-search-row input:focus { border-color:var(--ink); }
.shp-search-row input::placeholder { color:var(--muted); }
.shp-search-btn {
    height:48px;padding:0 26px;
    background:var(--ink);color:#fff;
    border:none;border-radius:24px;
    font-family:'JetBrains Mono',monospace;
    font-size:11.5px;letter-spacing:.6px;font-weight:600;
    cursor:pointer;display:flex;align-items:center;gap:8px;
    white-space:nowrap;transition:all .2s;
}
.shp-search-btn:hover { background:var(--green); }
#shpAutoResult {
    position:absolute;top:calc(100% - 8px);left:22px;right:22px;
    background:var(--white);border:1px solid var(--line);border-top:none;
    z-index:3000;display:none;max-height:320px;overflow-y:auto;
    box-shadow:0 20px 50px rgba(0,0,0,.14);
}
.shp-active-pills { display:flex;flex-wrap:wrap;gap:8px;margin-top:16px; }
.shp-pill {
    display:inline-flex;align-items:center;gap:6px;
    background:var(--paper-2);
    border:1px solid var(--line);
    color:var(--ink-soft);
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;font-weight:600;letter-spacing:.3px;
    padding:5px 12px;border-radius:16px;
}
.shp-pill a { color:var(--muted);text-decoration:none;margin-left:2px;transition:color .2s; }
.shp-pill a:hover { color:var(--brass); }
.shp-pill.clear { cursor:pointer;color:var(--brass);border-color:var(--brass); }

.shp-controls {
    background:var(--white);border:1px solid var(--line);
    border-radius:2px;padding:16px 22px;margin-bottom:26px;
    display:flex;align-items:center;justify-content:space-between;
    flex-wrap:wrap;gap:12px;
}
.shp-result-info {
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:.4px;
    color:var(--muted);text-transform:uppercase;
}
.shp-result-info strong { color:var(--ink); }
.shp-sort-row { display:flex;align-items:center;gap:10px;flex-wrap:wrap; }
.shp-sort-row label {
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;font-weight:600;color:var(--muted);
    white-space:nowrap;letter-spacing:.3px;
}
.shp-sort-row select {
    height:36px;padding:0 12px;
    border:1px solid var(--line);border-radius:2px;
    font-family:'JetBrains Mono',monospace;
    font-size:11.5px;color:var(--ink);background:var(--white);
    outline:none;cursor:pointer;transition:border-color .2s;
}
.shp-sort-row select:focus { border-color:var(--ink); }

/* ── PRODUCT GRID (matches the All-Products card theme) ── */
.shp-grid {
    display:grid;grid-template-columns:repeat(3,1fr);
    gap:1px;background:var(--line);border:1px solid var(--line);
}
@media (max-width:900px) { .shp-grid { grid-template-columns:repeat(2,1fr); } }
@media (max-width:600px) { .shp-grid { grid-template-columns:1fr; } }

.shp-card {
    background:var(--white);padding:26px;
    display:flex;flex-direction:column;position:relative;
    transition:background .35s;
}
.shp-card:hover { background:var(--paper); }

.shp-thumb {
    height:140px;border-radius:2px;
    display:flex;align-items:center;justify-content:center;
    background:var(--paper-2);margin-bottom:18px;
    position:relative;overflow:hidden;
}
.shp-thumb img { width:100%;height:100%;object-fit:cover;position:absolute;inset:0; }
.shp-thumb svg { width:48px;height:48px;color:var(--green);opacity:.8;transition:transform .5s; }
.shp-card:hover .shp-thumb svg { transform:scale(1.1) rotate(-6deg); }
.shp-disc-tag {
    position:absolute;top:10px;right:10px;
    font-family:'JetBrains Mono',monospace;
    font-size:9px;letter-spacing:.5px;font-weight:700;
    padding:4px 9px;border-radius:12px;
    background:#fff;color:var(--brass);
    box-shadow:0 2px 8px rgba(0,0,0,.08);
}
.shp-cats {
    font-family:'JetBrains Mono',monospace;
    font-size:10px;color:var(--muted);
    letter-spacing:1px;text-transform:uppercase;
    margin-bottom:8px;display:flex;align-items:center;gap:6px;flex-wrap:wrap;
}
.shp-cats svg { width:9px;height:9px;stroke:var(--muted);fill:none;stroke-width:2; }
.shp-title {
    font-family:'Fraunces',serif;font-weight:500;font-size:16px;
    color:var(--ink);margin-bottom:6px;line-height:1.3;text-decoration:none;
    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
    transition:color .2s;
}
.shp-title:hover { color:var(--green); }
.shp-summary {
    font-family:'Plus Jakarta Sans',sans-serif;
    font-size:12px;color:var(--muted);line-height:1.5;margin-bottom:10px;
    display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;
}
.shp-ref {
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;color:var(--muted);margin-bottom:8px;
}
.shp-meta { display:flex;flex-direction:column;gap:4px;margin-bottom:14px;flex:1; }
.shp-meta-row {
    font-family:'JetBrains Mono',monospace;font-size:10.5px;color:var(--muted);
    display:flex;align-items:center;gap:6px;
}
.shp-meta-row strong { color:var(--ink-soft); }
.shp-pdf-link {
    display:inline-flex;align-items:center;gap:5px;
    font-family:'JetBrains Mono',monospace;font-size:10px;color:var(--brass);
    text-decoration:none;margin-bottom:14px;letter-spacing:.5px;
}
.shp-pdf-link:hover { color:var(--brass-2); }
.shp-foot {
    display:flex;justify-content:space-between;align-items:center;
    border-top:1px solid var(--line-soft);padding-top:16px;margin-top:auto;
}
.shp-price { font-family:'Fraunces',serif;font-weight:560;font-size:18px;color:var(--ink); }
.shp-price .orig {
    font-size:12px;color:var(--muted);text-decoration:line-through;
    display:block;font-weight:400;font-family:'JetBrains Mono',monospace;
}
.shp-price .vat {
    font-size:10px;color:var(--muted);display:block;font-weight:400;
    font-family:'JetBrains Mono',monospace;
}
.shp-btns { display:flex;gap:8px; }
.shp-view-btn {
    width:36px;height:36px;border-radius:50%;
    border:1px solid var(--line);
    display:flex;align-items:center;justify-content:center;
    color:var(--ink);text-decoration:none;transition:all .3s;
}
.shp-view-btn:hover { background:var(--ink);color:#fff;border-color:var(--ink); }
.shp-view-btn svg { width:14px;height:14px;stroke:currentColor;fill:none; }
.shp-quote-btn {
    height:36px;padding:0 16px;
    background:var(--ink);color:#fff;
    border:none;border-radius:20px;
    font-family:'JetBrains Mono',monospace;font-size:10.5px;letter-spacing:.5px;
    text-decoration:none;display:flex;align-items:center;gap:6px;
    transition:background .25s,transform .25s;cursor:pointer;
}
.shp-quote-btn:hover { background:var(--green);transform:translateY(-2px); }

.shp-empty { grid-column:1/-1;text-align:center;padding:80px 20px;background:var(--white); }
.shp-empty svg { width:48px;height:48px;color:var(--line);margin-bottom:16px; }
.shp-empty h3 { font-family:'Fraunces',serif;font-size:22px;font-weight:500;color:var(--ink);margin-bottom:8px; }
.shp-empty p {
    font-family:'JetBrains Mono',monospace;font-size:11.5px;color:var(--muted);margin-bottom:22px;
}
.shp-empty a {
    display:inline-flex;align-items:center;gap:7px;padding:11px 26px;
    background:var(--ink);color:#fff;border-radius:22px;text-decoration:none;
    font-family:'JetBrains Mono',monospace;font-weight:600;font-size:11.5px;letter-spacing:.5px;
    transition:all .2s;
}
.shp-empty a:hover { background:var(--green); }

.shp-pagination { margin-top:40px;display:flex;justify-content:center; }
.shp-pagination .pagination { display:flex;align-items:center;justify-content:center;gap:6px;margin:0;padding:0;list-style:none; }
.shp-pagination .page-link {
    min-width:40px;height:40px;padding:0 12px !important;
    display:flex;align-items:center;justify-content:center;
    font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:500;
    color:var(--ink);background:var(--white);
    border:1px solid var(--line) !important;border-radius:4px !important;
    text-decoration:none;box-shadow:none;transition:all .2s;
}
.shp-pagination .page-link:hover { color:#fff;background:var(--ink);border-color:var(--ink) !important; }
.shp-pagination .page-item.active .page-link { color:#fff;background:var(--ink);border-color:var(--ink) !important; }
.shp-pagination .page-item.disabled .page-link { color:#aaa;background:var(--paper);opacity:.7;pointer-events:none; }
.shp-pagination .page-link:focus { box-shadow:none !important; }

@media(max-width:768px){
    .shp-hero,.shp-section{ padding-left:24px;padding-right:24px; }
}
</style>

{{-- ===== HERO ===== --}}
<div class="shp-hero">
    <div class="shp-hero-inner">
        <div>
            <div class="shp-breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <span style="color:rgba(255,255,255,.6);">Shop</span>
            </div>
            <h1>Shop <em>Products</em></h1>
            <p>BROWSE OUR FULL INDUSTRIAL &amp; PETROCHEMICAL PARTS CATALOGUE</p>
        </div>
        <div class="shp-hero-stats">
            <div class="shp-stat-pill">
                <svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="1"/><path d="M8 7V5a4 4 0 0 1 8 0v2"/></svg>
                <strong>{{ $totalProducts }}</strong> Products
            </div>
            <div class="shp-stat-pill">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                <strong>{{ $totalCats }}</strong> Categories
            </div>
        </div>
    </div>
</div>

{{-- ===== BODY ===== --}}
<section class="shp-section">
    <div class="shp-container">

        <div class="shp-overlay" id="shpOverlay" onclick="shpCloseSidebar()"></div>

        {{-- SIDEBAR --}}
        <aside class="shp-sidebar" id="shpSidebar">
            <div class="shp-close-btn">
                <span>Filters</span>
                <button onclick="shpCloseSidebar()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Categories --}}
            <div class="shp-widget">
                <div class="shp-widget-title">
                    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                    Categories
                </div>
                <ul class="shp-cat-list">
                    <li>
                        <a href="{{ route('shop') }}" class="{{ !request('search') && !request('min_price') ? 'is-active' : '' }}">
                            All Products <span class="shp-cat-count">{{ $totalProducts }}</span>
                        </a>
                    </li>
                    @foreach($sidebarCats as $cat)
                    @php $cnt = DB::table('products')->where('cat_id',$cat->id)->where('status','active')->count(); @endphp
                    <li>
                        <a href="{{ route('product-cat', $cat->slug) }}">
                            {{ $cat->title }} <span class="shp-cat-count">{{ $cnt }}</span>
                        </a>
                        @if(isset($sidebarSubs[$cat->id]) && $sidebarSubs[$cat->id]->count())
                        <ul class="shp-sub-list">
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
            <div class="shp-widget">
                <div class="shp-widget-title">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="6"/><path d="M9 14l-2 7 5-3 5 3-2-7"/></svg>
                    Brands
                </div>
                <ul class="shp-brand-list">
                    @foreach($sidebarBrands as $brand)
                    <li>
                        <a href="{{ route('product-brand', $brand->slug) }}">
                            <span class="shp-brand-dot"></span> {{ $brand->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </aside>

        {{-- MAIN --}}
        <div class="shp-main">

            <button class="shp-mobile-toggle" onclick="shpOpenSidebar()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                Filters &amp; Categories
                @if(request('min_price') || request('max_price') || request('search'))
                <span class="badge">Active</span>
                @endif
            </button>

            {{-- Search Box --}}
            <div class="shp-search-box">
                <form method="GET" action="{{ route('shop') }}">
                    @if(request('sortBy'))<input type="hidden" name="sortBy" value="{{ request('sortBy') }}">@endif
                    @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                    @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif
                    @if(request('show'))<input type="hidden" name="show" value="{{ request('show') }}">@endif
                    <div class="shp-search-row">
                        <input
                            type="text"
                            id="shpSearch"
                            name="search"
                            placeholder="Search by Part Number, Model, Product Name, or Brand..."
                            autocomplete="off"
                            value="{{ request('search') }}"
                        >
                        <button type="submit" class="shp-search-btn">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                            Search
                        </button>
                    </div>
                    <div id="shpAutoResult"></div>
                </form>

                @if(request('search') || request('min_price') || request('max_price'))
                <div class="shp-active-pills">
                    @if(request('search'))
                    <span class="shp-pill">
                        "{{ request('search') }}"
                        <a href="{{ route('shop', array_diff_key(request()->all(), ['search'=>''])) }}">✕</a>
                    </span>
                    @endif
                    @if(request('min_price') || request('max_price'))
                    <span class="shp-pill">
                        £{{ request('min_price', 0) }} – £{{ request('max_price', '∞') }}
                        <a href="{{ route('shop', array_diff_key(request()->all(), ['min_price'=>'','max_price'=>''])) }}">✕</a>
                    </span>
                    @endif
                    <a href="{{ route('shop') }}" class="shp-pill clear">Clear All</a>
                </div>
                @endif
            </div>

            {{-- Controls --}}
            <form method="GET" action="{{ route('shop') }}" id="shpCtrlForm">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                @if(request('min_price'))<input type="hidden" name="min_price" value="{{ request('min_price') }}">@endif
                @if(request('max_price'))<input type="hidden" name="max_price" value="{{ request('max_price') }}">@endif
                <div class="shp-controls">
                    <div class="shp-result-info">
                        Showing <strong>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</strong>
                        of <strong>{{ $products->total() }}</strong> results
                    </div>
                    <div class="shp-sort-row">
                        <label>Show:</label>
                        <select name="show" onchange="document.getElementById('shpCtrlForm').submit()">
                            <option value="12" {{ request('show',12)==12?'selected':'' }}>12</option>
                            <option value="24" {{ request('show')==24?'selected':'' }}>24</option>
                            <option value="36" {{ request('show')==36?'selected':'' }}>36</option>
                            <option value="48" {{ request('show')==48?'selected':'' }}>48</option>
                        </select>
                        <label>Sort by:</label>
                        <select name="sortBy" onchange="document.getElementById('shpCtrlForm').submit()">
                            <option value="">Default</option>
                            <option value="title" {{ request('sortBy')=='title'?'selected':'' }}>Name A–Z</option>
                            <option value="price_asc" {{ request('sortBy')=='price_asc'?'selected':'' }}>Price: Low → High</option>
                            <option value="price_desc" {{ request('sortBy')=='price_desc'?'selected':'' }}>Price: High → Low</option>
                        </select>
                    </div>
                </div>
            </form>

            {{-- Products --}}
            <div class="shp-grid">
                @forelse($products as $product)
                @php
                    $photos = json_decode($product->photo, true);
                    $hasImg = !empty($photos[0]);
                    $finalPrice = $product->discount > 0
                        ? $product->price - ($product->price * $product->discount / 100)
                        : $product->price;
                @endphp
                <div class="shp-card">
                    <div class="shp-thumb">
                        @if($product->discount > 0)
                        <span class="shp-disc-tag">-{{ $product->discount }}% OFF</span>
                        @endif
                        @if($hasImg)
                            <img src="{{ $photos[0] }}" alt="{{ $product->title }}">
                        @else
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                <circle cx="12" cy="12" r="7"/>
                                <circle cx="12" cy="12" r="2.4"/>
                                <path d="M12 2v3M12 19v3M2 12h3M19 12h3"/>
                            </svg>
                        @endif
                    </div>

                    @if($product->category_name)
                    <div class="shp-cats">
                        {{ $product->category_name }}
                        @if($product->subcategory_name)
                            <svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                            {{ $product->subcategory_name }}
                        @endif
                    </div>
                    @endif

                    <a href="{{ route('product-detail', $product->slug) }}" class="shp-title">{{ $product->title }}</a>

                    @if($product->part_number)
                        <div class="shp-ref">REF. {{ $product->part_number }}</div>
                    @endif

                    @if($product->summary)
                    <div class="shp-summary">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 80) }}</div>
                    @endif

                    <div class="shp-meta">
                        @if($product->manufacturer_name)
                        <div class="shp-meta-row"><strong>MFR</strong> {{ $product->manufacturer_name }}</div>
                        @endif
                        @if($product->model_number)
                        <div class="shp-meta-row"><strong>MODEL</strong> {{ $product->model_number }}</div>
                        @endif
                        @if($product->brand_name)
                        <div class="shp-meta-row"><strong>BRAND</strong> {{ $product->brand_name }}</div>
                        @endif
                    </div>

                    @if($product->pdf_file)
                    <a href="{{ asset($product->pdf_file) }}" target="_blank" class="shp-pdf-link">
                        ↓ {{ basename($product->pdf_file) }}
                    </a>
                    @endif

                    <div class="shp-foot">
                        <div class="shp-price">
                            £{{ number_format($finalPrice, 0) }}
                            @if($product->discount > 0)
                                <span class="orig">£{{ number_format($product->price, 0) }}</span>
                            @endif
                            <span class="vat">excl. VAT</span>
                        </div>
                        <div class="shp-btns">
                            <a href="{{ route('product-detail', $product->slug) }}" class="shp-view-btn" title="View Details">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                            <button type="button" onclick="addToQuote({{ $product->id }})" class="shp-quote-btn" style="border:none;cursor:pointer;">
                                + Quote
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="shp-empty">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
                    <h3>No Products Found</h3>
                    <p>TRY ADJUSTING YOUR SEARCH OR FILTERS</p>
                    <a href="{{ route('shop') }}">Clear Filters</a>
                </div>
                @endforelse
            </div>

            <div class="shp-pagination">
                {{ $products->onEachSide(2)->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
</section>

<script>
function shpOpenSidebar() {
    document.getElementById('shpSidebar').classList.add('open');
    document.getElementById('shpOverlay').classList.add('show');
    document.body.style.overflow = 'hidden';
}
function shpCloseSidebar() {
    document.getElementById('shpSidebar').classList.remove('open');
    document.getElementById('shpOverlay').classList.remove('show');
    document.body.style.overflow = '';
}
$(document).on('keyup', '#shpSearch', function () {
    const q = $(this).val();
    if (q.length < 2) { $('#shpAutoResult').hide().html(''); return; }
    $.ajax({
        url: "{{ route('product.search') }}", type: "GET", data: { q },
        success: (data) => {
            let html = '';
            if (data.length) {
                data.forEach(item => {
                    html += `<a href="/shop?search=${encodeURIComponent(item.title)}"
                        style="display:flex;align-items:center;gap:10px;padding:12px 18px;text-decoration:none;color:var(--ink);font-family:'JetBrains Mono',monospace;font-size:12px;border-bottom:1px solid var(--paper-2);transition:background .15s;"
                        onmouseover="this.style.background='var(--paper-2)'" onmouseout="this.style.background=''">
                        <span style="flex:1;">${item.title}</span>
                        ${item.part_number ? `<span style="background:var(--paper-2);color:var(--muted);font-size:10px;padding:2px 8px;border-radius:5px;">${item.part_number}</span>` : ''}
                    </a>`;
                });
            } else {
                html = `<div style="padding:16px 18px;color:var(--muted);font-family:'JetBrains Mono',monospace;font-size:12px;">No results for "<strong>${q}</strong>"</div>`;
            }
            $('#shpAutoResult').html(html).show();
        }
    });
});
$(document).click(e => {
    if (!$(e.target).closest('#shpSearch, #shpAutoResult').length) $('#shpAutoResult').hide();
});
</script>

@endsection