@extends('frontend.layouts.master')

@section('title','Petchemparts || All Products')

@section('main-content')

@php
$products = DB::table('products')
    ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
    ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
    ->leftJoin('manufacturers', 'products.manufacturer_id', '=', 'manufacturers.id')
    ->leftJoin('pdfs', 'products.pdf_id', '=', 'pdfs.id')

    ->where('products.status', 'active')
    ->orderBy('products.id', 'DESC')
    ->select(
        'products.*',
        'parent_cat.title as category_name',
        'child_cat.title as subcategory_name',
        'manufacturers.name as manufacturer_name',
        'pdfs.file as pdf_file'
    )
    ->paginate(12);
@endphp

<style>
    /* ── PAGE HERO ── */
    .pg-hero {
        background: linear-gradient(135deg, #0F172A 0%, #1E3A5F 60%, #0EA5E9 100%);
        padding: 72px 0 56px;
        position: relative;
        overflow: hidden;
    }
    .pg-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230EA5E9' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .pg-hero-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 2;
    }
    .pg-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #94A3B8;
        margin-bottom: 18px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .pg-breadcrumb a { color: #94A3B8; text-decoration: none; }
    .pg-breadcrumb a:hover { color: #0EA5E9; }
    .pg-breadcrumb i { font-size: 10px; }
    .pg-hero h1 {
        font-family: 'Outfit', sans-serif;
        font-size: clamp(2rem, 4.5vw, 3.2rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 10px;
    }
    .pg-hero p {
        font-size: 16px;
        color: #94A3B8;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── PRODUCTS SECTION ── */
    .prods-page-section {
        padding: 64px 0 80px;
        background: #F8FAFC;
    }
    .prods-page-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Count bar */
    .prods-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
        flex-wrap: wrap;
        gap: 12px;
    }
    .prods-count {
        font-size: 14px;
        color: #64748B;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .prods-count strong { color: #0F172A; }

    /* Grid */
    .prods-page-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }
    @media (max-width: 1100px) { .prods-page-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px)  { .prods-page-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 480px)  { .prods-page-grid { grid-template-columns: 1fr; } }

    /* Product Card */
    .prod-card {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: all 0.3s;
    }
    .prod-card:hover {
        border-color: #0EA5E9;
        box-shadow: 0 16px 48px rgba(14,165,233,0.12);
        transform: translateY(-4px);
    }

    .prod-card-body {
        padding: 18px 18px 20px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .prod-breadcrumb {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        color: #94A3B8;
        margin-bottom: 9px;
        flex-wrap: wrap;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .prod-breadcrumb i { font-size: 9px; color: #CBD5E1; }

    .prod-title {
        font-family: 'Outfit', sans-serif;
        font-size: 14.5px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 8px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .prod-desc {
        font-size: 12.5px;
        color: #94A3B8;
        line-height: 1.55;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', sans-serif;
        flex: 1;
    }

    .prod-meta {
        display: flex;
        flex-direction: column;
        gap: 3px;
        margin-bottom: 12px;
    }
    .prod-meta-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #64748B;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .prod-meta-row i { color: #0EA5E9; font-size: 10px; width: 12px; flex-shrink: 0; }
    .meta-lbl { color: #94A3B8; font-weight: 600; }

    .prod-price {
        font-family: 'Outfit', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #0EA5E9;
        margin-bottom: 12px;
    }
    .prod-price .orig {
        font-size: 13px;
        font-weight: 500;
        color: #CBD5E1;
        text-decoration: line-through;
        margin-left: 6px;
    }

    .prod-actions {
        display: flex;
        gap: 8px;
    }
    .btn-view {
        width: 40px;
        height: 40px;
        background: #F8FAFC;
        border: 1.5px solid #E2E8F0;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748B;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.2s;
        flex-shrink: 0;
    }
    .btn-view:hover {
        background: #E0F2FE;
        border-color: #0EA5E9;
        color: #0EA5E9;
    }
    .btn-quote {
        flex: 1;
        height: 40px;
        background: #0EA5E9;
        color: #fff;
        border: none;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-quote:hover {
        background: #0284C7;
        color: #fff;
        box-shadow: 0 5px 14px rgba(14,165,233,0.28);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 80px 24px;
        color: #94A3B8;
    }
    .empty-state i { font-size: 56px; color: #E2E8F0; margin-bottom: 16px; }
    .empty-state h3 { font-family: 'Outfit', sans-serif; font-size: 20px; color: #475569; margin-bottom: 8px; }

    /* ── PAGINATION ── */
    .pagination-wrap {
        display: flex;
        justify-content: center;
        margin-top: 48px;
    }
    .pagination-wrap .pagination {
        gap: 6px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    .pagination-wrap .page-item .page-link {
        border: 1.5px solid #E2E8F0;
        color: #475569;
        border-radius: 9px !important;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
    }
    .pagination-wrap .page-item.active .page-link,
    .pagination-wrap .page-item .page-link:hover {
        background: #0EA5E9;
        border-color: #0EA5E9;
        color: #fff;
        box-shadow: 0 4px 12px rgba(14,165,233,0.25);
    }
</style>

<!-- Hero -->
<div class="pg-hero">
    <div class="pg-hero-inner">
        <div class="pg-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <span style="color:#fff;">All Products</span>
        </div>
        <h1>All Products</h1>
        <p>Browse our complete inventory of genuine industrial & petrochemical parts.</p>
    </div>
</div>

<!-- Products Grid -->
<section class="prods-page-section">
    <div class="prods-page-inner">

        <div class="prods-topbar">
            <p class="prods-count">
                Showing <strong>{{ $products->firstItem() }}–{{ $products->lastItem() }}</strong> of <strong>{{ $products->total() }}</strong> products
            </p>
        </div>

        @if($products->count())
        <div class="prods-page-grid">
            @foreach($products as $product)
            @php
                $photos = json_decode($product->photo, true);
                $discountedPrice = $product->discount > 0
                    ? $product->price - ($product->price * $product->discount / 100)
                    : $product->price;
            @endphp
            <div class="prod-card">
                <div class="prod-card-body">
                    <!-- Breadcrumb -->
                    <div class="prod-breadcrumb">
                        @if($product->category_name)
                        <span>{{ $product->category_name }}</span>
                        @endif
                        @if($product->subcategory_name)
                        <i class="fas fa-chevron-right"></i>
                        <span>{{ $product->subcategory_name }}</span>
                        @endif
                    </div>

                    <div class="prod-title">{{ $product->title }}</div>

                    @if($product->summary)
                    <div class="prod-desc">{{ \Illuminate\Support\Str::limit(strip_tags($product->summary), 75) }}</div>
                    @endif

                    <div class="prod-meta">
                        @if($product->manufacturer_name)
                        <div class="prod-meta-row">
                            <i class="fas fa-industry"></i>
                            <span class="meta-lbl">Brand:</span>
                            <span>{{ $product->manufacturer_name }}</span>
                        </div>
                        @endif
                        @if($product->part_number)
                        <div class="prod-meta-row">
                            <i class="fas fa-barcode"></i>
                            <span class="meta-lbl">Part No:</span>
                            <span>{{ $product->part_number }}</span>
                        </div>
                        @endif
                        @if($product->model_number)
                        <div class="prod-meta-row">
                            <i class="fas fa-tag"></i>
                            <span class="meta-lbl">Model:</span>
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

                    <div class="prod-price">
                        £{{ number_format($discountedPrice, 2) }}
                        @if($product->discount > 0)
                        <span class="orig">£{{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>

                    <div class="prod-actions">
                        <a href="{{ route('product-detail', $product->slug) }}" class="btn-view" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('add-to-cart', $product->slug) }}" class="btn-quote">
                            <i class="fas fa-file-invoice"></i> Request Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <h3>No products found</h3>
            <p>Check back later or browse our categories.</p>
        </div>
        @endif

        <!-- Pagination -->
        <div class="pagination-wrap">
            {{ $products->links() }}
        </div>

    </div>
</section>

@endsection