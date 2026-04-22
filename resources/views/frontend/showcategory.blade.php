@extends('frontend.layouts.master')

@section('title','Petchemparts || All Categories')

@section('main-content')

@php
$categories = DB::table('categories')
    ->where('status', 'active')
    ->whereNull('parent_id')
    ->paginate(12);

$subcategories = DB::table('categories')
    ->where('status', 'active')
    ->whereNotNull('parent_id')
    ->get()
    ->groupBy('parent_id');
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

    /* ── CATEGORIES SECTION ── */
    .cats-page-section {
        padding: 64px 0 80px;
        background: #F8FAFC;
    }
    .cats-page-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }

    /* Grid */
    .cats-page-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }
    @media (max-width: 1024px) { .cats-page-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px)  { .cats-page-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 480px)  { .cats-page-grid { grid-template-columns: 1fr; } }

    /* Category Card */
    .cat-card {
        background: #fff;
        border: 1.5px solid #E2E8F0;
        border-radius: 18px;
        padding: 28px 24px;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    .cat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: linear-gradient(90deg, #0EA5E9, #38BDF8);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s;
    }
    .cat-card:hover {
        border-color: #0EA5E9;
        box-shadow: 0 16px 48px rgba(14,165,233,0.12);
        transform: translateY(-5px);
        background: #fff;
    }
    .cat-card:hover::before { transform: scaleX(1); }

    .cat-icon-wrap {
        width: 50px;
        height: 50px;
        background: #E0F2FE;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #0EA5E9;
        margin-bottom: 16px;
        transition: all 0.3s;
    }
    .cat-card:hover .cat-icon-wrap {
        background: #0EA5E9;
        color: #fff;
    }

    .cat-name {
        font-family: 'Outfit', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 14px;
        text-decoration: none;
        display: block;
        line-height: 1.3;
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }
    .cat-name:hover { color: #0EA5E9; }

    /* Sub list */
    .sub-list {
        list-style: none;
        padding: 0;
        margin: 0 0 16px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        flex: 1;
    }
    .sub-list li a {
        font-size: 13.5px;
        color: #64748B;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 3px 0;
        transition: all 0.2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .sub-list li a::before {
        content: '';
        width: 4px;
        height: 4px;
        background: #CBD5E1;
        border-radius: 50%;
        flex-shrink: 0;
        transition: background 0.2s;
    }
    .sub-list li a:hover { color: #0EA5E9; padding-left: 4px; }
    .sub-list li a:hover::before { background: #0EA5E9; }

    .sub-more {
        font-size: 12px;
        color: #94A3B8;
        padding: 2px 0 0 11px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .cat-footer {
        padding-top: 14px;
        border-top: 1.5px solid #F1F5F9;
        margin-top: auto;
    }
    .cat-footer a {
        font-size: 13px;
        font-weight: 700;
        color: #0EA5E9;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: gap 0.2s;
    }
    .cat-footer a:hover { gap: 9px; color: #0284C7; }

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
            <span style="color:#fff;">All Categories</span>
        </div>
        <h1>All Categories</h1>
        <p>Browse our complete range of industrial & petrochemical parts by category.</p>
    </div>
</div>

<!-- Categories Grid -->
<section class="cats-page-section">
    <div class="cats-page-inner">

        @php
        $catIcons = ['fa-cogs','fa-bolt','fa-tint','fa-thermometer-half','fa-wrench','fa-industry','fa-cube','fa-filter','fa-plug','fa-fan','fa-tools','fa-microchip'];
        @endphp

        <div class="cats-page-grid">
            @foreach($categories as $i => $category)
            <div class="cat-card">
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
                        <li class="sub-more">+{{ count($subcategories[$category->id]) - 5 }} more subcategories</li>
                        @endif
                    @else
                        <li style="font-size:13px; color:#CBD5E1; padding: 4px 0;">No subcategories</li>
                    @endif
                </ul>

                <div class="cat-footer">
                    <a href="{{ route('product-cat', $category->slug) }}">
                        Browse Products <i class="fas fa-arrow-right" style="font-size:11px;"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-wrap">
            {{ $categories->links() }}
        </div>

    </div>
</section>

@endsection