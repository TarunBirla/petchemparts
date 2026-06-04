@extends('frontend.layouts.master')

@section('title','Petchemparts || Checkout')

@section('main-content')

<style>
    * { box-sizing: border-box; }

    .checkout-wrapper {
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 16px 60px;
        margin-top: 80px;
        font-family: 'Segoe UI', sans-serif;
    }

    .checkout-page-title {
        font-size: 22px;
        font-weight: 600;
        color: #1a1a2e;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Account Bar */
    .account-bar {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 12px;
        padding: 16px 22px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }
    .account-bar-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .account-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #dbeafe;
        color: #1d4ed8;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        flex-shrink: 0;
    }
    .account-name {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a2e;
        margin: 0;
    }
    .account-email {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
    }
    .account-logout {
        font-size: 13px;
        color: #2563eb;
        text-decoration: none;
    }
    .account-logout:hover { text-decoration: underline; }

    .newsletter-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 22px;
        font-size: 13px;
        color: #6b7280;
    }
    .newsletter-row input[type=checkbox] {
        width: 15px;
        height: 15px;
        accent-color: #2563eb;
    }

    /* Layout */
    .checkout-layout {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 22px;
        align-items: start;
    }

    /* Form Card */
    .form-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }

    .section-heading {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.09em;
        text-transform: uppercase;
        color: #9ca3af;
        margin-bottom: 18px;
    }

    .form-divider {
        height: 1px;
        background: #f0f0f0;
        margin: 22px 0;
    }

    .field {
        margin-bottom: 16px;
    }
    .field label {
        display: block;
        font-size: 13px;
        color: #4b5563;
        margin-bottom: 5px;
        font-weight: 500;
    }
    .field label .req {
        color: #ef4444;
        margin-left: 2px;
    }
    .field input,
    .field select {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 9px 12px;
        font-size: 14px;
        color: #1a1a2e;
        background: #fff;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .field input:focus,
    .field select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }
    .field .error-msg {
        font-size: 12px;
        color: #ef4444;
        margin-top: 4px;
        display: block;
    }

    .row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    /* Payment Box */
    .payment-box {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #f8faff;
        border: 1px solid #dbeafe;
        border-radius: 10px;
        padding: 14px 16px;
    }
    .payment-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: #dbeafe;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .payment-label {
        font-size: 14px;
        font-weight: 600;
        color: #1a1a2e;
        margin: 0;
    }
    .payment-sub {
        font-size: 12px;
        color: #6b7280;
        margin: 0;
    }
    .payment-check {
        margin-left: auto;
        color: #16a34a;
        font-size: 18px;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 14px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: background 0.2s;
    }
    .submit-btn:hover { background: #1d4ed8; }

    /* Order Summary */
    .summary-card {
        background: #fff;
        border: 1px solid #e8e8e8;
        border-radius: 14px;
        padding: 22px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        position: sticky;
        top: 100px;
    }
    .summary-title {
        font-size: 16px;
        font-weight: 600;
        color: #1a1a2e;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    .items-scroll {
        max-height: 360px;
        overflow-y: auto;
        margin-bottom: 4px;
    }
    .items-scroll::-webkit-scrollbar { width: 4px; }
    .items-scroll::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 4px; }
    .items-scroll::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
    .cart-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #f5f5f5;
    }
    .cart-item:last-child { border-bottom: none; }
    .cart-item-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 16px;
        flex-shrink: 0;
    }
    .cart-item-name {
        font-size: 13px;
        font-weight: 500;
        color: #1a1a2e;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin-bottom: 2px;
    }
    .cart-item-qty {
        font-size: 12px;
        color: #9ca3af;
    }
    .cart-item-price {
        margin-left: auto;
        font-size: 14px;
        font-weight: 600;
        color: #1a1a2e;
        white-space: nowrap;
    }
    .totals-section {
        margin-top: 14px;
        padding-top: 12px;
        border-top: 1px solid #f0f0f0;
    }
    .total-row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 8px;
    }
    .total-final {
        display: flex;
        justify-content: space-between;
        font-size: 17px;
        font-weight: 700;
        color: #1a1a2e;
        padding-top: 10px;
        border-top: 1px solid #e5e7eb;
        margin-top: 4px;
    }
    .secure-badge {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: #f0fdf4;
        color: #15803d;
        font-size: 12px;
        font-weight: 500;
        border-radius: 8px;
        padding: 8px;
        margin-top: 14px;
    }

    @media (max-width: 768px) {
        .checkout-layout { grid-template-columns: 1fr; }
        .row-2 { grid-template-columns: 1fr; }
        .summary-card { position: static; }
    }
</style>

<div class="checkout-wrapper">
    <div class="checkout-page-title">
        <i class="fas fa-shopping-cart"></i> Checkout
    </div>

    {{-- Account Bar --}}
    <div class="account-bar">
        <div class="account-bar-left">
            <div class="account-avatar">
                @if(auth()->check())
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                @else
                    <i class="fas fa-user" style="font-size:16px;"></i>
                @endif
            </div>
            <div>
                @if(auth()->check())
                    <p class="account-name">{{ auth()->user()->name }}</p>
                    <p class="account-email">{{ auth()->user()->email }}</p>
                @else
                    <p class="account-name">Guest</p>
                    <p class="account-email">Not logged in</p>
                @endif
            </div>
        </div>
        @if(auth()->check())
            <a href="{{ url('/user/logout') }}" class="account-logout">
                <i class="fas fa-sign-out-alt"></i> Log out
            </a>
        @else
            <a href="{{ url('/user/login') }}" class="account-logout">
                <i class="fas fa-sign-in-alt"></i> Log in
            </a>
        @endif
    </div>

    <div class="newsletter-row">
        <input type="checkbox" id="newsletter" name="newsletter">
        <label for="newsletter">Email me with news and offers</label>
    </div>

    {{-- Checkout Form --}}
    <form method="POST" action="{{ route('cart.order') }}">
        @csrf
        <input type="radio" name="payment_method" value="cod" checked hidden>

        <div class="checkout-layout">

            {{-- LEFT: Form --}}
            <div class="form-card">
                <p class="section-heading">Delivery information</p>

                {{-- Country --}}
                <div class="field">
                    <label for="country">Country / Region</label>
                    <select id="country" name="country">
                        <option value="UK">United Kingdom</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="AU">Australia</option>
                    </select>
                </div>

                {{-- Name --}}
                <div class="row-2">
                    <div class="field">
                        <label>First name <span class="req">*</span></label>
                        <input type="text" name="first_name"
                            value="{{ auth()->check() ? auth()->user()->first_name : old('first_name') }}"
                            placeholder="John">
                        @error('first_name')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Last name <span class="req">*</span></label>
                        <input type="text" name="last_name"
                            value="{{ auth()->check() ? auth()->user()->last_name : old('last_name') }}"
                            placeholder="Doe">
                        @error('last_name')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Email & Phone --}}
                <div class="row-2">
                    <div class="field">
                        <label>Email <span class="req">*</span></label>
                        <input type="email" name="email"
                            value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                            placeholder="john@example.com">
                        @error('email')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Phone <span class="req">*</span></label>
                        <input type="text" name="phone"
                            value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}"
                            placeholder="+44 7700 000000">
                        @error('phone')
                            <span class="error-msg">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Address --}}
                <div class="field">
                    <label>Address line 1 <span class="req">*</span></label>
                    <input type="text" name="address1" value="{{ old('address1') }}" placeholder="Street address">
                    @error('address1')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label>Address line 2</label>
                    <input type="text" name="address2" value="{{ old('address2') }}" placeholder="Apartment, suite, etc. (optional)">
                </div>

                {{-- City & Postcode --}}
                <div class="row-2">
                    <div class="field">
                        <label>City <span class="req">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="London">
                    </div>
                    <div class="field">
                        <label>Postal code <span class="req">*</span></label>
                        <input type="text" name="post_code" value="{{ old('post_code') }}" placeholder="SW1A 1AA">
                    </div>
                </div>

                <div class="form-divider"></div>
                <p class="section-heading">Payment method</p>

                <div class="payment-box">
                    <div class="payment-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div>
                        <p class="payment-label">Cash on Delivery</p>
                        <p class="payment-sub">Pay when your order arrives</p>
                    </div>
                    <span class="payment-check">
                        <i class="fas fa-check-circle"></i>
                    </span>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-lock"></i> Place Order
                </button>
            </div>

            {{-- RIGHT: Order Summary --}}
            <div class="summary-card">
                <div class="summary-title">Order Summary</div>

                <div class="items-scroll">
                    @foreach ($cartItems as $item)
                        @php
                            $photos = json_decode($item->product->photo, true);
                            $img = $photos[0] ?? 'default.png';
                        @endphp
                        <div class="cart-item">
                            <div class="cart-item-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div style="flex:1; min-width:0;">
                                <div class="cart-item-name">{{ $item->product->title }}</div>
                                <div class="cart-item-qty">Qty: {{ $item->quantity }}</div>
                            </div>
                            <div class="cart-item-price">£{{ number_format($item->amount, 2) }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="totals-section">
                    <div class="total-row">
                        <span>Subtotal ({{ Helper::cartCount() }} items)</span>
                        <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Shipping</span>
                        <span style="color:#16a34a; font-weight:500;">Free</span>
                    </div>
                    <div class="total-final">
                        <span>Total</span>
                        <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
                    </div>
                </div>

                <div class="secure-badge">
                    <i class="fas fa-shield-alt"></i>
                    Secure checkout · Cash on delivery
                </div>
            </div>

        </div>
    </form>
</div>

@endsection