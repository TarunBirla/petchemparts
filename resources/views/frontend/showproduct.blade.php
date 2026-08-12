@extends('frontend.layouts.master')
@section('title','Petchemparts || All Products')
@section('main-content')

@php
$products = DB::table('products')
    ->leftJoin('categories as pc','products.cat_id','=','pc.id')
    ->leftJoin('categories as cc','products.child_cat_id','=','cc.id')
    ->leftJoin('manufacturers','products.manufacturer_id','=','manufacturers.id')
    ->leftJoin('pdfs','products.pdf_id','=','pdfs.id')
    ->where('products.status','active')
    ->orderBy('products.id','DESC')
    ->select(
        'products.*',
        'pc.title as category_name',
        'cc.title as subcategory_name',
        'manufacturers.name as manufacturer_name',
        'pdfs.file as pdf_file'
    )
    ->paginate(12);
@endphp

<style>
/* ── HERO ── */
.pgp-hero {
    background: var(--ink);
    padding: 105px 48px 60px;
    position: relative;
    overflow: hidden;
}
.pgp-hero::before {
    content:'';
    position:absolute;inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
        linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:52px 52px;
}
.pgp-hero-inner {
    position:relative;z-index:2;
    max-width:1380px;margin:0 auto;
}
.pgp-breadcrumb {
    display:flex;align-items:center;gap:8px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:1px;
    color:var(--muted);margin-bottom:20px;
}
.pgp-breadcrumb a { color:var(--muted);text-decoration:none; }
.pgp-breadcrumb a:hover { color:var(--brass); }
.pgp-hero h1 {
    font-family:'Fraunces',serif;
    font-weight:450;
    font-size:clamp(32px,4vw,56px);
    letter-spacing:-1px;color:#fff;
    line-height:1.08;
}
.pgp-hero h1 em { color:var(--green);font-style:italic; }
.pgp-hero p {
    color:rgba(255,255,255,.5);
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:.5px;
    margin-top:12px;
}

/* ── SECTION ── */
.pgp-section {
    padding:80px 48px 100px;
    background:var(--paper);
}
.pgp-inner { max-width:1380px;margin:0 auto; }

/* Topbar */
.pgp-topbar {
    display:flex;align-items:center;
    justify-content:space-between;
    margin-bottom:40px;flex-wrap:wrap;gap:12px;
    padding-bottom:20px;
    border-bottom:1px solid var(--line);
}
.pgp-count {
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:1px;
    color:var(--muted);text-transform:uppercase;
}
.pgp-count strong { color:var(--ink); }

/* ── GRID ── */
.pgp-grid {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:1px;
    background:var(--line);
    border:1px solid var(--line);
    margin-bottom:60px;
}
@media(max-width:1100px){ .pgp-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:580px){  .pgp-grid{ grid-template-columns:1fr; } }

/* ── CARD ── */
.pgp-card {
    background:var(--white);
    padding:26px;
    display:flex;flex-direction:column;
    position:relative;
    transition:background .35s;
}
.pgp-card:hover { background:var(--paper); }

.pgp-thumb {
    height:150px;
    border-radius:2px;
    display:flex;align-items:center;justify-content:center;
    background:var(--paper-2);
    margin-bottom:20px;
    position:relative;overflow:hidden;
}
.pgp-thumb img {
    width:100%;height:100%;
    object-fit:cover;
    position:absolute;inset:0;
}
.pgp-thumb svg {
    width:52px;height:52px;
    color:var(--green);opacity:.8;
    transition:transform .5s;
}
.pgp-card:hover .pgp-thumb svg { transform:scale(1.1) rotate(-6deg); }

.pgp-stock-tag {
    position:absolute;top:10px;right:10px;
    font-family:'JetBrains Mono',monospace;
    font-size:9px;letter-spacing:.5px;
    padding:4px 9px;border-radius:12px;
    background:#fff;color:#1F8F52;
    font-weight:600;box-shadow:var(--shadow-sm);
}

.pgp-cats {
    font-family:'JetBrains Mono',monospace;
    font-size:10px;color:var(--muted);
    letter-spacing:1px;text-transform:uppercase;
    margin-bottom:8px;
    display:flex;align-items:center;gap:6px;
}

.pgp-title {
    font-family:'Fraunces',serif;
    font-weight:500;font-size:16px;
    color:var(--ink);margin-bottom:6px;
    line-height:1.3;
}

.pgp-ref {
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;color:var(--muted);
    margin-bottom:8px;
}

.pgp-meta {
    display:flex;flex-direction:column;
    gap:4px;margin-bottom:14px;flex:1;
}
.pgp-meta-row {
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;color:var(--muted);
    display:flex;align-items:center;gap:6px;
}
.pgp-meta-row strong { color:var(--ink-soft); }

.pgp-pdf-link {
    display:inline-flex;align-items:center;gap:5px;
    font-family:'JetBrains Mono',monospace;
    font-size:10px;color:var(--brass);
    text-decoration:none;margin-bottom:14px;
    letter-spacing:.5px;
}
.pgp-pdf-link:hover { color:var(--brass-2); }

.pgp-foot {
    display:flex;justify-content:space-between;
    align-items:center;
    border-top:1px solid var(--line-soft);
    padding-top:16px;margin-top:auto;
}
.pgp-price {
    font-family:'Fraunces',serif;
    font-weight:560;font-size:18px;color:var(--ink);
}
.pgp-price .orig {
    font-size:12px;color:var(--muted);
    text-decoration:line-through;
    display:block;font-weight:400;
    font-family:'JetBrains Mono',monospace;
}
.pgp-price .vat {
    font-size:10px;color:var(--muted);
    display:block;font-weight:400;
    font-family:'JetBrains Mono',monospace;
}

.pgp-btns { display:flex;gap:8px; }
.pgp-view-btn {
    width:36px;height:36px;border-radius:50%;
    border:1px solid var(--line);
    display:flex;align-items:center;justify-content:center;
    color:var(--ink);text-decoration:none;
    transition:all .3s;
}
.pgp-view-btn:hover {
    background:var(--ink);color:#fff;
    border-color:var(--ink);
}
.pgp-view-btn svg { width:14px;height:14px;stroke:currentColor; }

.pgp-quote-btn {
    height:36px;padding:0 16px;
    background:var(--ink);color:#fff;
    border:none;border-radius:20px;
    font-family:'JetBrains Mono',monospace;
    font-size:10.5px;letter-spacing:.5px;
    text-decoration:none;
    display:flex;align-items:center;gap:6px;
    transition:background .25s,transform .25s;
    cursor:pointer;
}
.pgp-quote-btn:hover {
    background:var(--green);color:#fff;
    transform:translateY(-2px);
}

/* ── EMPTY ── */
.pgp-empty {
    grid-column:1/-1;
    text-align:center;padding:80px 20px;
}
.pgp-empty p {
    font-family:'Fraunces',serif;
    font-size:22px;color:var(--muted);
}

/* ── PAGINATION ── */
.pgp-pagination {
    display:flex;justify-content:center;
    gap:6px;flex-wrap:wrap;
}
.pgp-pagination .page-item .page-link {
    font-family:'JetBrains Mono',monospace;
    font-size:12px;letter-spacing:.5px;
    border:1px solid var(--line);
    color:var(--ink);
    border-radius:4px !important;
    padding:9px 16px;
    transition:all .2s;
    background:var(--white);
}
.pgp-pagination .page-item.active .page-link,
.pgp-pagination .page-item .page-link:hover {
    background:var(--ink);
    border-color:var(--ink);
    color:#fff;
}

/* ── PAGINATION ── */
.pgp-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.pgp-pagination nav {
    display: flex;
    justify-content: center;
    width: 100%;
}

.pgp-pagination .pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.pgp-pagination .page-item {
    margin: 0;
}

.pgp-pagination .page-link {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 0 !important;

    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    font-weight: 500;

    color: var(--ink);
    background: var(--white);

    border: 1px solid var(--line) !important;
    border-radius: 4px !important;

    text-decoration: none;
    box-shadow: none;

    transition: all .2s ease;
}

.pgp-pagination .page-link:hover {
    color: #fff;
    background: var(--ink);
    border-color: var(--ink) !important;
}

.pgp-pagination .page-item.active .page-link {
    color: #fff;
    background: var(--ink);
    border-color: var(--ink) !important;
}

.pgp-pagination .page-item.disabled .page-link {
    color: #aaa;
    background: var(--paper);
    border-color: var(--line) !important;
    opacity: .7;
    pointer-events: none;
}

/* Previous / Next */
.pgp-pagination .page-item:first-child .page-link,
.pgp-pagination .page-item:last-child .page-link {
    width: auto;
    min-width: 85px;
    padding: 0 15px !important;
}

/* Remove Bootstrap focus shadow */
.pgp-pagination .page-link:focus {
    box-shadow: none !important;
}

/* Mobile */
@media(max-width:580px) {
    .pgp-pagination .pagination {
        gap: 4px;
    }

    .pgp-pagination .page-link {
        width: 34px;
        height: 34px;
        font-size: 10px;
    }

    .pgp-pagination .page-item:first-child .page-link,
    .pgp-pagination .page-item:last-child .page-link {
        min-width: 65px;
        padding: 0 10px !important;
    }
}
@media(max-width:768px){
    .pgp-hero,.pgp-section{ padding-left:24px;padding-right:24px; }
}
</style>

{{-- HERO --}}
<div class="pgp-hero">
    <div class="pgp-hero-inner">
        <div class="pgp-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <span style="color:rgba(255,255,255,.6);">All Products</span>
        </div>
        <h1>All <em>Products</em></h1>
        <p>{{ $products->total() }} PARTS LISTED · VERIFIED BY OUR ENGINEERING DESK</p>
    </div>
</div>

{{-- PRODUCTS --}}
<section class="pgp-section">
    <div class="pgp-inner">

        <div class="pgp-topbar">
            <div class="pgp-count">
                Showing
                <strong>{{ $products->firstItem() }}–{{ $products->lastItem() }}</strong>
                of <strong>{{ $products->total() }}</strong> products
            </div>
        </div>

        <div class="pgp-grid">
            @forelse($products as $product)
            @php
                $photos   = json_decode($product->photo, true);
                $hasImg   = !empty($photos[0]);
                $discPrice = $product->discount > 0
                    ? $product->price - ($product->price * $product->discount / 100)
                    : $product->price;
                $isNew = \Carbon\Carbon::parse($product->created_at)->diffInDays(now()) < 30;
            @endphp

            <div class="pgp-card">
                {{-- Thumb --}}
                <div class="pgp-thumb">
                    @if($isNew)
                        <span class="pgp-stock-tag">NEW IN</span>
                    @elseif($product->discount > 0)
                        <span class="pgp-stock-tag" style="color:var(--brass);">
                            -{{ $product->discount }}% OFF
                        </span>
                    @else
                        <span class="pgp-stock-tag">IN STOCK</span>
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

                {{-- Category breadcrumb --}}
                @if($product->category_name)
                <div class="pgp-cats">
                    {{ $product->category_name }}
                    @if($product->subcategory_name)
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <path d="M9 18l6-6-6-6"/>
                        </svg>
                        {{ $product->subcategory_name }}
                    @endif
                </div>
                @endif

                <div class="pgp-title">{{ Str::limit($product->title, 55) }}</div>

                @if($product->part_number)
                    <div class="pgp-ref">REF. {{ $product->part_number }}</div>
                @endif

                <div class="pgp-meta">
                    @if($product->manufacturer_name)
                    <div class="pgp-meta-row">
                        <strong>MFR</strong> {{ $product->manufacturer_name }}
                    </div>
                    @endif
                    @if($product->model_number)
                    <div class="pgp-meta-row">
                        <strong>MODEL</strong> {{ $product->model_number }}
                    </div>
                    @endif
                </div>

                @if($product->pdf_file)
                <a href="{{ asset($product->pdf_file) }}" target="_blank" class="pgp-pdf-link">
                    ↓ {{ basename($product->pdf_file) }}
                </a>
                @endif

                <div class="pgp-foot">
                    <div class="pgp-price">
                        £{{ number_format($discPrice, 0) }}
                        @if($product->discount > 0)
                            <span class="orig">£{{ number_format($product->price, 0) }}</span>
                        @endif
                        <span class="vat">excl. VAT</span>
                    </div>
                    <div class="pgp-btns">
                        <a href="{{ route('product-detail', $product->slug) }}"
                           class="pgp-view-btn" title="View Details">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </a>
                        <button type="button" onclick="addToQuote({{ $product->id }})" class="pgp-quote-btn" style="border:none;cursor:pointer;">
                            + Quote
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="pgp-empty">
                <p>No products found.</p>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
       <div class="pgp-pagination">
    {{ $products->onEachSide(2)->links('pagination::bootstrap-5') }}
</div>

    </div>
</section>

@endsection