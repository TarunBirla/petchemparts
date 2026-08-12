@extends('frontend.layouts.master')

@section('title', $product_detail->title . ' — Petchem Parts')

@section('main-content')

@php
    $photos = json_decode($product_detail->photo, true);
    if (!is_array($photos) || empty($photos)) {
        $photos = [$product_detail->photo];
    }
    $mainPhoto = !empty($photos[0]) ? asset($photos[0]) : null;

    $orgPrice = $product_detail->discount > 0
        ? $product_detail->price - ($product_detail->price * $product_detail->discount / 100)
        : $product_detail->price;
@endphp

<style>
    :root {
        --p-green: #0E3D2A;
        --p-green-dark: #082A1C;
        --p-green-light: #1D6146;
        --p-brass: #AD8036;
        --p-brass-light: #E0B15E;
        --p-paper: #F6F3EB;
        --p-ink: #14150F;
        --p-muted: #83887B;
        --p-line: #E3DFCF;
    }

    /* ===== HERO BREADCRUMB ===== */
    .pd-hero {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 60%, #0F2847 100%);
        padding: 40px 0 32px;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }

    .pd-hero-inner {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
        position: relative;
        z-index: 2;
    }

    .pd-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #94A3B8;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .pd-breadcrumb a { color: #94A3B8; text-decoration: none; transition: color 0.2s; }
    .pd-breadcrumb a:hover { color: var(--p-brass-light); }
    .pd-breadcrumb i { font-size: 9px; }

    .pd-hero-title {
        font-family: 'Fraunces', serif;
        font-size: clamp(24px, 4vw, 36px);
        font-weight: 500;
        color: #FFFFFF;
        margin: 0 0 10px 0;
        line-height: 1.2;
    }

    .pd-hero-tags {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .pd-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #E2E8F0;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-family: 'JetBrains Mono', monospace;
    }

    .pd-tag i { color: var(--p-brass-light); }

    /* ===== MAIN CONTENT BODY ===== */
    .pd-body {
        background: #F8FAFC;
        padding: 40px 0 80px;
    }

    .pd-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 28px;
        display: grid;
        grid-template-columns: 1fr 440px;
        gap: 36px;
        align-items: start;
    }

    @media (max-width: 1024px) {
        .pd-container { grid-template-columns: 1fr; }
    }

    /* ===== LEFT: GALLERY & DESCRIPTION ===== */
    .pd-gallery-card {
        background: #FFFFFF;
        border-radius: 8px;
        border: 1px solid var(--p-line);
        padding: 24px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        margin-bottom: 24px;
    }

    .pd-main-img-wrap {
        width: 100%;
        height: 380px;
        background: #FAF8F5;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
        border: 1px solid #E2E8F0;
    }

    .pd-main-img-wrap img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        transition: transform 0.3s;
    }

    .pd-main-img-wrap:hover img {
        transform: scale(1.05);
    }

    .pd-no-img {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        color: var(--p-muted);
    }

    .pd-no-img i { font-size: 48px; color: var(--p-brass); }

    .pd-thumbs-row {
        display: flex;
        gap: 10px;
        margin-top: 14px;
        overflow-x: auto;
    }

    .pd-thumb-item {
        width: 70px;
        height: 70px;
        border-radius: 6px;
        border: 2px solid #E2E8F0;
        cursor: pointer;
        overflow: hidden;
        background: #FAF8F5;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: border-color 0.2s;
    }

    .pd-thumb-item.active, .pd-thumb-item:hover {
        border-color: var(--p-green);
    }

    .pd-thumb-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Tabs & Description */
    .pd-info-card {
        background: #FFFFFF;
        border-radius: 8px;
        border: 1px solid var(--p-line);
        padding: 28px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
    }

    .pd-section-h3 {
        font-family: 'Fraunces', serif;
        font-size: 20px;
        color: var(--p-green);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid var(--p-paper);
        padding-bottom: 10px;
    }

    .pd-description-text {
        font-size: 15px;
        line-height: 1.7;
        color: #334155;
        margin-bottom: 24px;
    }

    .pd-specs-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-top: 20px;
    }

    @media (max-width: 600px) {
        .pd-specs-grid { grid-template-columns: 1fr; }
    }

    .pd-spec-box {
        background: #FAF8F5;
        border: 1px solid var(--p-line);
        border-radius: 6px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .pd-spec-label {
        font-size: 12.5px;
        color: var(--p-muted);
        font-weight: 500;
    }

    .pd-spec-val {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--p-ink);
    }

    /* ===== RIGHT: BUY / QUOTE CARD ===== */
    .pd-buy-card {
        background: #FFFFFF;
        border-radius: 8px;
        border: 1.5px solid var(--p-line);
        padding: 28px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        position: sticky;
        top: 100px;
    }

    .pd-stock-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(14, 61, 42, 0.08);
        color: var(--p-green);
        border: 1px solid rgba(14, 61, 42, 0.2);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .pd-price-row {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--p-line);
    }

    .pd-main-price {
        font-family: 'Fraunces', serif;
        font-size: 32px;
        font-weight: 600;
        color: var(--p-green);
        line-height: 1;
    }

    .pd-price-meta {
        font-size: 12.5px;
        color: var(--p-muted);
        margin-top: 6px;
    }

    .pd-orig-price {
        text-decoration: line-through;
        color: #94A3B8;
        font-size: 18px;
        margin-left: 8px;
    }

    .pd-discount-badge {
        background: var(--p-brass);
        color: #FFFFFF;
        font-size: 12px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 4px;
        margin-left: 8px;
    }

    /* Attributes Table */
    .pd-attr-table {
        width: 100%;
        margin-bottom: 24px;
    }

    .pd-attr-table tr {
        border-bottom: 1px dashed var(--p-line);
    }

    .pd-attr-table tr:last-child {
        border-bottom: none;
    }

    .pd-attr-table td {
        padding: 10px 0;
        font-size: 13.5px;
    }

    .pd-attr-label {
        color: var(--p-muted);
        font-weight: 500;
    }

    .pd-attr-val {
        text-align: right;
        font-weight: 700;
        color: var(--p-ink);
    }

    /* Quantity Control */
    .pd-qty-section {
        margin-bottom: 20px;
    }

    .pd-qty-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--p-ink);
        margin-bottom: 8px;
        display: block;
    }

    .pd-qty-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .pd-qty-btn {
        width: 36px;
        height: 36px;
        border: 1px solid var(--p-line);
        background: #FAF8F5;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .pd-qty-btn:hover {
        background: var(--p-green);
        color: #FFFFFF;
        border-color: var(--p-green);
    }

    .pd-qty-input {
        width: 60px;
        height: 36px;
        text-align: center;
        border: 1px solid var(--p-line);
        border-radius: 6px;
        font-size: 14px;
        font-weight: 700;
        outline: none;
    }

    /* Action Buttons */
    .pd-btn-quote-main {
        width: 100%;
        background: var(--p-green);
        color: #FFFFFF;
        border: none;
        padding: 14px 20px;
        border-radius: 6px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: background 0.25s, transform 0.15s;
        box-shadow: 0 4px 14px rgba(14, 61, 42, 0.2);
    }

    .pd-btn-quote-main:hover {
        background: var(--p-green-light);
        transform: translateY(-1px);
    }

    .pd-btn-whatsapp {
        width: 100%;
        margin-top: 10px;
        background: #25D366;
        color: #FFFFFF;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-decoration: none;
        transition: background 0.2s;
    }

    .pd-btn-whatsapp:hover {
        background: #1EBE5D;
        color: #FFFFFF;
        text-decoration: none;
    }

    .pd-guarantee-box {
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid var(--p-line);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .pd-g-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 12.5px;
        color: #475569;
    }

    .pd-g-item i { color: var(--p-brass); font-size: 14px; }
</style>

{{-- HERO BREADCRUMB --}}
<div class="pd-hero">
    <div class="pd-hero-inner">
        <div class="pd-breadcrumb">
            <a href="{{ url('/') }}">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('shop') }}">Shop Catalog</a>
            <i class="fas fa-chevron-right"></i>
            @if($product_detail->cat_info)
                <a href="{{ route('product-cat', $product_detail->cat_info->slug) }}">{{ $product_detail->cat_info->title }}</a>
                <i class="fas fa-chevron-right"></i>
            @endif
            <span style="color:var(--p-brass-light);">{{ $product_detail->title }}</span>
        </div>

        <h1 class="pd-hero-title">{{ $product_detail->title }}</h1>

        <div class="pd-hero-tags">
            @if($product_detail->part_number)
                <span class="pd-tag"><i class="fas fa-barcode"></i> PART: {{ $product_detail->part_number }}</span>
            @endif
            @if($product_detail->model_number)
                <span class="pd-tag"><i class="fas fa-tag"></i> MODEL: {{ $product_detail->model_number }}</span>
            @endif
            @if($product_detail->manufacturer)
                <span class="pd-tag"><i class="fas fa-industry"></i> MFR: {{ $product_detail->manufacturer->name }}</span>
            @endif
        </div>
    </div>
</div>

{{-- MAIN CONTENT BODY --}}
<div class="pd-body">
    <div class="pd-container">

        {{-- LEFT COLUMN --}}
        <div>
            <!-- Gallery Card -->
            <div class="pd-gallery-card">
                <div class="pd-main-img-wrap">
                    @if($mainPhoto)
                        <img id="pdMainImg" src="{{ $mainPhoto }}" alt="{{ $product_detail->title }}">
                    @else
                        <div class="pd-no-img">
                            <i class="fas fa-cogs"></i>
                            <span>No Product Image Preview</span>
                        </div>
                    @endif
                </div>

                @if(count($photos) > 1)
                <div class="pd-thumbs-row">
                    @foreach($photos as $idx => $photoUrl)
                    <div class="pd-thumb-item {{ $idx == 0 ? 'active' : '' }}" onclick="switchImage('{{ asset($photoUrl) }}', this)">
                        <img src="{{ asset($photoUrl) }}" alt="Thumbnail">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Description Card -->
            <div class="pd-info-card">
                <h3 class="pd-section-h3">
                    <i class="fas fa-align-left" style="color:var(--p-brass);"></i>
                    Product Overview & Specifications
                </h3>

                @if($product_detail->summary)
                <div class="pd-description-text" style="font-weight: 500; border-left: 3px solid var(--p-brass); padding-left: 14px; margin-bottom: 20px;">
                    {!! $product_detail->summary !!}
                </div>
                @endif

                @if($product_detail->description)
                <div class="pd-description-text">
                    {!! $product_detail->description !!}
                </div>
                @else
                <p class="pd-description-text" style="color:var(--p-muted);">
                    Industrial grade genuine part verified for petrochemical, oil & gas, and manufacturing applications. Supplied with full manufacturer authenticity guarantee.
                </p>
                @endif

                <!-- Specs Grid -->
                <h4 style="font-size: 15px; font-weight: 700; color: var(--p-green); margin: 24px 0 12px 0;">Technical Attributes</h4>
                <div class="pd-specs-grid">
                    <div class="pd-spec-box">
                        <span class="pd-spec-label">Condition</span>
                        <span class="pd-spec-val" style="text-transform: capitalize;">{{ $product_detail->condition ?? 'New / Surplus' }}</span>
                    </div>

                    <div class="pd-spec-box">
                        <span class="pd-spec-label">Stock Status</span>
                        <span class="pd-spec-val" style="color:var(--p-green);">
                            {{ $product_detail->stock > 0 ? $product_detail->stock . ' Units Available' : 'Available on Request' }}
                        </span>
                    </div>

                    <div class="pd-spec-box">
                        <span class="pd-spec-label">Category</span>
                        <span class="pd-spec-val">{{ optional($product_detail->cat_info)->title ?? 'N/A' }}</span>
                    </div>

                    <div class="pd-spec-box">
                        <span class="pd-spec-label">Brand</span>
                        <span class="pd-spec-val">{{ optional($product_detail->brand)->title ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: BUY / QUOTE CARD --}}
        <div>
            <div class="pd-buy-card">
                <div class="pd-stock-status">
                    <i class="fas fa-check-circle"></i> Genuine Verified Part
                </div>

                <div class="pd-price-row">
                    <div style="display:flex; align-items:baseline;">
                        <span class="pd-main-price">£{{ number_format($orgPrice, 2) }}</span>
                        @if($product_detail->discount > 0)
                            <span class="pd-orig-price">£{{ number_format($product_detail->price, 2) }}</span>
                            <span class="pd-discount-badge">-{{ $product_detail->discount }}% OFF</span>
                        @endif
                    </div>
                    <div class="pd-price-meta">Excluding VAT & Customs Duties</div>
                </div>

                <!-- Attributes Summary Table -->
                <table class="pd-attr-table">
                    @if($product_detail->part_number)
                    <tr>
                        <td class="pd-attr-label"><i class="fas fa-barcode" style="color:var(--p-brass);margin-right:6px;"></i> Part No:</td>
                        <td class="pd-attr-val">{{ $product_detail->part_number }}</td>
                    </tr>
                    @endif
                    @if($product_detail->model_number)
                    <tr>
                        <td class="pd-attr-label"><i class="fas fa-tag" style="color:var(--p-brass);margin-right:6px;"></i> Model No:</td>
                        <td class="pd-attr-val">{{ $product_detail->model_number }}</td>
                    </tr>
                    @endif
                    @if($product_detail->manufacturer)
                    <tr>
                        <td class="pd-attr-label"><i class="fas fa-industry" style="color:var(--p-brass);margin-right:6px;"></i> Manufacturer:</td>
                        <td class="pd-attr-val">{{ $product_detail->manufacturer->name }}</td>
                    </tr>
                    @endif
                    @if($product_detail->brand)
                    <tr>
                        <td class="pd-attr-label"><i class="fas fa-certificate" style="color:var(--p-brass);margin-right:6px;"></i> Brand:</td>
                        <td class="pd-attr-val">{{ $product_detail->brand->title }}</td>
                    </tr>
                    @endif
                </table>

                <!-- Quantity Selector -->
                <div class="pd-qty-section">
                    <label class="pd-qty-label">Select Quantity:</label>
                    <div class="pd-qty-wrap">
                        <button type="button" class="pd-qty-btn" onclick="adjustDetailQty(-1)">-</button>
                        <input type="number" id="pdQuantityInput" value="1" min="1" class="pd-qty-input">
                        <button type="button" class="pd-qty-btn" onclick="adjustDetailQty(1)">+</button>
                    </div>
                </div>

                <!-- Action Button -->
                <button type="button" onclick="submitDetailQuote()" class="pd-btn-quote-main">
                    <i class="fas fa-file-invoice"></i> Request Official Quote
                </button>

                <!-- WhatsApp Button -->
                @php
                    $waText = urlencode("Hi Petchem Parts, I want to inquire about: " . $product_detail->title . " (Part: " . ($product_detail->part_number ?? 'N/A') . ")");
                @endphp
                <a href="https://api.whatsapp.com/send?phone=447879175585&text={{ $waText }}" target="_blank" class="pd-btn-whatsapp">
                    <i class="fab fa-whatsapp" style="font-size:18px;"></i> Quick WhatsApp Inquiry
                </a>

                <!-- Guarantee List -->
                <div class="pd-guarantee-box">
                    <div class="pd-g-item"><i class="fas fa-shield-alt"></i> 100% Genuine Manufacturer Guarantee</div>
                    <div class="pd-g-item"><i class="fas fa-truck-loading"></i> Fast Dispatch & Worldwide Freight</div>
                    <div class="pd-g-item"><i class="fas fa-headset"></i> Dedicated Industrial Sales Support</div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function switchImage(imgSrc, thumbEl) {
    document.getElementById('pdMainImg').src = imgSrc;
    document.querySelectorAll('.pd-thumb-item').forEach(el => el.classList.remove('active'));
    thumbEl.classList.add('active');
}

function adjustDetailQty(delta) {
    const input = document.getElementById('pdQuantityInput');
    let val = parseInt(input.value) || 1;
    val += delta;
    if (val < 1) val = 1;
    input.value = val;
}

function submitDetailQuote() {
    const qty = parseInt(document.getElementById('pdQuantityInput').value) || 1;
    addToQuote({{ $product_detail->id }}, null, qty);
}
</script>

@endsection