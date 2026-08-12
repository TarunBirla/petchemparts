@extends('frontend.layouts.master')
@section('title','Petchemparts || All Categories')
@section('main-content')

@php
$allCategories = DB::table('categories')
    ->where('status','active')
    ->whereNull('parent_id')
    ->orderBy('title','asc')
    ->paginate(12);

$subcategories = DB::table('categories')
    ->where('status','active')
    ->whereNotNull('parent_id')
    ->get()
    ->groupBy('parent_id');

$catProductCounts = DB::table('products')
    ->where('status','active')
    ->selectRaw('cat_id, count(*) as total')
    ->groupBy('cat_id')
    ->pluck('total','cat_id');
@endphp

<style>
/* ── HERO ── */
.pgc-hero {
    background: var(--ink);
    padding: 105px 48px 60px;
    position: relative;
    overflow: hidden;
    
}
.pgc-hero::before {
    content:'';
    position:absolute;inset:0;
    background-image:
        linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px),
        linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:52px 52px;
}
.pgc-hero-inner {
    position:relative;z-index:2;
    max-width:1380px;margin:0 auto;
}
.pgc-breadcrumb {
    display:flex;align-items:center;gap:8px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:1px;
    color:var(--muted);margin-bottom:20px;
}
.pgc-breadcrumb a { color:var(--muted);text-decoration:none; }
.pgc-breadcrumb a:hover { color:var(--brass); }
.pgc-breadcrumb span { color:rgba(255,255,255,.4); }
.pgc-hero h1 {
    font-family:'Fraunces',serif;
    font-weight:450;
    font-size:clamp(32px,4vw,56px);
    letter-spacing:-1px;color:#fff;
    line-height:1.08;
}
.pgc-hero h1 em { color:var(--green);font-style:italic; }
.pgc-hero p {
    color:rgba(255,255,255,.5);
    font-size:15px;line-height:1.7;
    margin-top:12px;
    font-family:'JetBrains Mono',monospace;
    font-size:11px;letter-spacing:.5px;
}

/* ── MAIN SECTION ── */
.pgc-section {
    padding:80px 48px 100px;
    background:var(--paper);
}
.pgc-inner { max-width:1380px;margin:0 auto; }

/* ── GRID ── */
.pgc-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:1px;
    background:var(--line);
    border:1px solid var(--line);
    margin-bottom:60px;
}
@media(max-width:1100px){ .pgc-grid{ grid-template-columns:repeat(2,1fr); } }
@media(max-width:600px){  .pgc-grid{ grid-template-columns:1fr; } }

/* ── CARD ── */
.pgc-card {
    background:var(--white);
    padding:36px;
    display:flex;flex-direction:column;
    position:relative;overflow:hidden;
    transition:background .35s;
    text-decoration:none;
}
.pgc-card:hover { background:var(--paper); }

/* top accent line on hover */
.pgc-card::before {
    content:'';
    position:absolute;top:0;left:0;right:0;
    height:2px;
    background:var(--green);
    transform:scaleX(0);transform-origin:left;
    transition:transform .4s;
}
.pgc-card:hover::before { transform:scaleX(1); }

.pgc-ref {
    font-family:'JetBrains Mono',monospace;
    font-size:10px;color:var(--muted);
    letter-spacing:1.5px;margin-bottom:20px;
    text-transform:uppercase;
}
.pgc-icon-wrap {
    width:50px;height:50px;border-radius:50%;
    background:var(--green-dim);
    display:flex;align-items:center;justify-content:center;
    margin-bottom:20px;
    transition:transform .4s;
}
.pgc-card:hover .pgc-icon-wrap { transform:rotate(-8deg) scale(1.08); }
.pgc-icon { width:22px;height:22px;color:var(--green); }

.pgc-title {
    font-family:'Fraunces',serif;
    font-weight:500;font-size:20px;
    color:var(--ink);margin-bottom:12px;
    transition:color .25s;
}
.pgc-card:hover .pgc-title { color:var(--green); }

/* Sub chips */
.pgc-subs {
    display:flex;flex-wrap:wrap;gap:6px;
    margin-bottom:20px;flex:1;
}
.pgc-sub-chip {
    font-family:'JetBrains Mono',monospace;
    font-size:10px;letter-spacing:.5px;
    padding:4px 10px;border-radius:20px;
    background:var(--paper-2);color:var(--muted);
    border:1px solid var(--line);
    transition:background .25s,color .25s,border-color .25s;
    text-decoration:none;
}
.pgc-sub-chip:hover {
    background:var(--green-dim);
    color:var(--green);
    border-color:var(--green-dim2);
}
.pgc-sub-more {
    font-family:'JetBrains Mono',monospace;
    font-size:10px;color:var(--muted);
    padding:4px 0;letter-spacing:.5px;
}

/* Footer */
.pgc-foot {
    display:flex;align-items:center;
    padding-top:20px;margin-top:auto;
    border-top:1px solid var(--line-soft);
}
.pgc-count {
    font-family:'JetBrains Mono',monospace;
    font-size:11px;color:var(--muted);letter-spacing:.5px;
}
.pgc-arrow {
    margin-left:auto;color:var(--muted);
    transition:transform .3s,color .3s;
}
.pgc-card:hover .pgc-arrow {
    transform:translateX(5px);
    color:var(--brass);
}

/* ── PAGINATION ── */
.pgc-pagination {
    display:flex;justify-content:center;gap:6px;flex-wrap:wrap;
}
.pgc-pagination .page-item .page-link {
    font-family:'JetBrains Mono',monospace;
    font-size:12px;letter-spacing:.5px;
    border:1px solid var(--line);
    color:var(--ink);
    border-radius:4px !important;
    padding:9px 16px;
    transition:all .2s;
    background:var(--white);
}
.pgc-pagination .page-item.active .page-link,
.pgc-pagination .page-item .page-link:hover {
    background:var(--ink);
    border-color:var(--ink);
    color:#fff;
}

/* ── EMPTY ── */
.pgc-empty {
    grid-column:1/-1;
    text-align:center;padding:80px 20px;
}
.pgc-empty p {
    font-family:'Fraunces',serif;
    font-size:22px;color:var(--muted);
}

@media(max-width:768px){
    .pgc-hero,.pgc-section{ padding-left:24px;padding-right:24px; }
}
</style>

{{-- HERO --}}
<div class="pgc-hero">
    <div class="pgc-hero-inner">
        <div class="pgc-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <span>/</span>
            <span style="color:rgba(255,255,255,.6);">All Categories</span>
        </div>
        <h1>All <em>Categories</em></h1>
        <p>{{ $allCategories->total() }} CATEGORIES · ORGANISED THE WAY YOUR PLANT IS</p>
    </div>
</div>

{{-- GRID --}}
<section class="pgc-section">
    <div class="pgc-inner">

        <div class="pgc-grid">
            @forelse($allCategories as $i => $cat)
            @php
                $subs  = $subcategories[$cat->id] ?? collect();
                $count = $catProductCounts[$cat->id] ?? 0;
                $refNum = str_pad(($allCategories->currentPage() - 1) * $allCategories->perPage() + $i + 1, 2, '0', STR_PAD_LEFT);
                $catIcons = [
                    '<path d="M9 3h6v4H9zM7 7h10l1 4H6zM6 11h12v10H6z"/>',
                    '<path d="M4 14l6-10 6 10h-4l4 8-9-8h3z"/>',
                    '<circle cx="12" cy="12" r="3.2"/><path d="M12 2v3M12 19v3M22 12h-3M5 12H2"/>',
                    '<circle cx="12" cy="12" r="7"/><circle cx="12" cy="12" r="2.4"/><path d="M12 2v3M12 19v3"/>',
                    '<path d="M12 2l7 4v6c0 5-3.2 8.5-7 10-3.8-1.5-7-5-7-10V6z"/>',
                    '<path d="M3 18c2 1.2 4 1.2 6 0s4-1.2 6 0 4 1.2 6 0M4 14l1-7h14l1 7"/>',
                    '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>',
                    '<path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/>',
                ];
                $iconSvg = $catIcons[$i % count($catIcons)];
            @endphp
            <a href="{{ route('product-cat', $cat->slug) }}" class="pgc-card">

                <div class="pgc-ref">REF. {{ $refNum }}</div>

                <div class="pgc-icon-wrap">
                    <svg class="pgc-icon" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        {!! $iconSvg !!}
                    </svg>
                </div>

                <div class="pgc-title">{{ $cat->title }}</div>

                {{-- Sub chips --}}
                @if($subs->count())
                <div class="pgc-subs">
                    @foreach($subs->take(4) as $sub)
                        <span class="pgc-sub-chip">{{ $sub->title }}</span>
                    @endforeach
                    @if($subs->count() > 4)
                        <span class="pgc-sub-more">+{{ $subs->count() - 4 }} more</span>
                    @endif
                </div>
                @else
                <div class="pgc-subs">
                    <span class="pgc-sub-chip">Browse all parts</span>
                </div>
                @endif

                <div class="pgc-foot">
                    <div class="pgc-count">
                        {{ number_format($count) }} PART{{ $count != 1 ? 'S' : '' }}
                    </div>
                    <svg class="pgc-arrow" width="14" height="14" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </div>
            </a>
            @empty
            <div class="pgc-empty">
                <p>No categories found.</p>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="pgc-pagination">
            {{ $allCategories->links() }}
        </div>

    </div>
</section>

@endsection