
@extends('frontend.layouts.master')

@section('title','Petchemparts || All categorys')

@section('main-content')
<!--        <style>-->
<!--            :root {-->
<!--                --primary-color: #333;-->
<!--                --accent-color: #2874f0;-->
<!--                --light-bg: #f8f9fa;-->
<!--                --border-color: #e1e1e1;-->
<!--                --success-color: #28a745;-->
<!--            }-->
            
<!--            * {-->
<!--                margin: 0;-->
<!--                padding: 0;-->
<!--                box-sizing: border-box;-->
<!--                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;-->
<!--            }-->
            
<!--            body {-->
<!--                background-color: #f5f5f5;-->
<!--                color: #333;-->
<!--                line-height: 1.6;-->
<!--            }-->
            
<!--            header {-->
<!--                display: flex;-->
<!--                justify-content: space-between;-->
<!--                align-items: center;-->
<!--                padding: 15px 50px;-->
<!--                background-color: #fff;-->
<!--                box-shadow: 0 2px 5px rgba(0,0,0,0.1);-->
<!--                position: sticky;-->
<!--                top: 0;-->
<!--                z-index: 100;-->
<!--            }-->
            
<!--            .store-name {-->
<!--                font-size: 24px;-->
<!--                font-weight: bold;-->
<!--                color: var(--primary-color);-->
<!--                text-decoration: none;-->
<!--            }-->
            
<!--            .cart-icon {-->
<!--                font-size: 24px;-->
<!--                color: var(--primary-color);-->
<!--                position: relative;-->
<!--            }-->
            
<!--            .cart-icon .badge {-->
<!--                position: absolute;-->
<!--                top: -8px;-->
<!--                right: -8px;-->
<!--                background-color: var(--accent-color);-->
<!--                color: white;-->
<!--                border-radius: 50%;-->
<!--                width: 18px;-->
<!--                height: 18px;-->
<!--                font-size: 12px;-->
<!--                display: flex;-->
<!--                align-items: center;-->
<!--                justify-content: center;-->
<!--            }-->
            
<!--            .container {-->
<!--                max-width: 1200px;-->
<!--                margin: 30px auto;-->
<!--                padding: 0 15px;-->
<!--                display: flex;-->
<!--                flex-wrap: wrap;-->
<!--            }-->
<!--            @media (max-width: 768px) {-->
<!--                .checkout-inner {-->
<!--                    flex-direction: column;-->
<!--                }-->
<!--            }-->
<!--            @media (max-width: 768px) {-->
<!--                .checkout-inner {-->
<!--                    flex-direction: column;-->
<!--                }-->

<!--                .checkout-summary {-->
<!--                    width: 100%;-->
<!--                }-->
<!--            }-->
<!--            .checkout-inner {-->
<!--                display: flex;-->
<!--                gap: 30px;-->
<!--                align-items: flex-start;-->
<!--                flex-wrap: wrap;-->
<!--            }-->
<!--            .checkout-container {-->
<!--                display: flex;-->
<!--                width: 100%;-->
<!--                gap: 30px;-->
<!--            }-->
            
<!--            .checkout-form {-->
<!--                flex: 1;-->
<!--                background: #fff;-->
<!--                border-radius: 8px;-->
<!--                padding: 30px;-->
<!--                box-shadow: 0 2px 10px rgba(0,0,0,0.05);-->
<!--            }-->
            
<!--            .checkout-summary {-->
<!--                width: 380px;-->
<!--                background: #fff;-->
<!--                border-radius: 8px;-->
<!--                padding: 25px;-->
<!--                box-shadow: 0 2px 10px rgba(0,0,0,0.05);-->
<!--                align-self: flex-start;-->
<!--            }-->
            
<!--            .section-title {-->
<!--                font-size: 20px;-->
<!--                font-weight: 600;-->
<!--                margin-bottom: 20px;-->
<!--                padding-bottom: 10px;-->
<!--                border-bottom: 1px solid var(--border-color);-->
<!--            }-->
            
<!--            .account-info {-->
<!--                background: #fff;-->
<!--                border-radius: 8px;-->
<!--                padding: 20px;-->
<!--                margin-bottom: 20px;-->
<!--                box-shadow: 0 2px 10px rgba(0,0,0,0.05);-->
<!--            }-->
            
<!--            .account-header {-->
<!--                display: flex;-->
<!--                justify-content: space-between;-->
<!--                align-items: center;-->
<!--                margin-bottom: 15px;-->
<!--            }-->
            
<!--            .account-title {-->
<!--                font-size: 18px;-->
<!--                font-weight: 500;-->
<!--            }-->
            
<!--            .account-toggle {-->
<!--                color: var(--accent-color);-->
<!--                cursor: pointer;-->
<!--                font-size: 20px;-->
<!--            }-->
            
<!--            .account-details {-->
<!--                margin-bottom: 10px;-->
<!--            }-->
            
<!--            .account-email {-->
<!--                color: #666;-->
<!--                margin-bottom: 10px;-->
<!--            }-->
            
<!--            .logout-link {-->
<!--                color: var(--accent-color);-->
<!--                text-decoration: none;-->
<!--            }-->
            
<!--            .logout-link:hover {-->
<!--                text-decoration: underline;-->
<!--            }-->
            
<!--            .newsletter-checkbox {-->
<!--                display: flex;-->
<!--                align-items: center;-->
<!--                margin-top: 15px;-->
<!--            }-->
            
<!--            .newsletter-checkbox input {-->
<!--                margin-right: 10px;-->
<!--            }-->
            
<!--            .delivery-section {-->
<!--                margin-top: 30px;-->
<!--            }-->
            
<!--            .form-group {-->
<!--                margin-bottom: 20px;-->
<!--            }-->
            
<!--            .form-group label {-->
<!--                display: block;-->
<!--                margin-bottom: 8px;-->
<!--                font-weight: 500;-->
<!--            }-->
            
<!--            .form-control {-->
<!--                width: 100%;-->
<!--                padding: 12px 15px;-->
<!--                border: 1px solid var(--border-color);-->
<!--                border-radius: 4px;-->
<!--                font-size: 15px;-->
<!--                transition: border-color 0.3s;-->
<!--            }-->
            
<!--            .form-control:focus {-->
<!--                border-color: var(--accent-color);-->
<!--                outline: none;-->
<!--            }-->
            
<!--            .form-row {-->
<!--                display: flex;-->
<!--                gap: 20px;-->
<!--            }-->
            
<!--            .form-col {-->
<!--                flex: 1;-->
<!--            }-->
            
<!--            .country-select {-->
<!--                position: relative;-->
<!--            }-->
            
<!--            .country-select .form-control {-->
<!--                padding-right: 30px;-->
<!--                appearance: none;-->
<!--                cursor: pointer;-->
<!--            }-->
            
<!--            .country-select::after {-->
<!--                content: "▼";-->
<!--                font-size: 12px;-->
<!--                color: #666;-->
<!--                position: absolute;-->
<!--                right: 15px;-->
<!--                top: 50%;-->
<!--                transform: translateY(-50%);-->
<!--                pointer-events: none;-->
<!--            }-->
            
<!--            .address-search {-->
<!--                position: relative;-->
<!--            }-->
            
<!--            .search-icon {-->
<!--                position: absolute;-->
<!--                right: 15px;-->
<!--                top: 50%;-->
<!--                transform: translateY(-50%);-->
<!--                color: #666;-->
<!--            }-->
            
<!--            .shipping-method {-->
<!--                margin-top: 30px;-->
<!--            }-->
            
<!--            .shipping-placeholder {-->
<!--                background-color: var(--light-bg);-->
<!--                padding: 15px;-->
<!--                border-radius: 4px;-->
<!--                text-align: center;-->
<!--                color: #666;-->
<!--            }-->
            
<!--            .product-list {-->
<!--                margin-bottom: 25px;-->
<!--            }-->
            
<!--            .product-item {-->
<!--                display: flex;-->
<!--                margin-bottom: 15px;-->
<!--                position: relative;-->
<!--            }-->
            
<!--            .product-image {-->
<!--                width: 60px;-->
<!--                height: 60px;-->
<!--                border-radius: 5px;-->
<!--                margin-right: 15px;-->
<!--                overflow: hidden;-->
<!--                position: relative;-->
<!--            }-->
            
<!--            .product-image img {-->
<!--                width: 100%;-->
<!--                height: 100%;-->
<!--                object-fit: cover;-->
<!--            }-->
            
<!--            .product-badge {-->
<!--                position: absolute;-->
<!--                top: -5px;-->
<!--                right: -5px;-->
<!--                background-color: var(--accent-color);-->
<!--                color: white;-->
<!--                width: 20px;-->
<!--                height: 20px;-->
<!--                border-radius: 50%;-->
<!--                display: flex;-->
<!--                align-items: center;-->
<!--                justify-content: center;-->
<!--                font-size: 12px;-->
<!--            }-->
            
<!--            .product-details {-->
<!--                flex: 1;-->
<!--            }-->
            
<!--            .product-title {-->
<!--                font-weight: 500;-->
<!--                margin-bottom: 5px;-->
<!--                font-size: 14px;-->
<!--            }-->
            
<!--            .product-price {-->
<!--                font-weight: 600;-->
<!--                color: var(--primary-color);-->
<!--            }-->
            
<!--            .checkout-summary-line {-->
<!--                display: flex;-->
<!--                justify-content: space-between;-->
<!--                margin-bottom: 15px;-->
<!--            }-->
            
<!--            .checkout-total {-->
<!--                display: flex;-->
<!--                justify-content: space-between;-->
<!--                margin-top: 20px;-->
<!--                padding-top: 15px;-->
<!--                border-top: 1px solid var(--border-color);-->
<!--                font-weight: 600;-->
<!--                font-size: 18px;-->
<!--            }-->
            
<!--            .shipping-info {-->
<!--                margin: 15px 0;-->
<!--                color: #666;-->
<!--            }-->
            
<!--            .currency {-->
<!--                font-size: 14px;-->
<!--                margin-right: 5px;-->
<!--                color: #666;-->
<!--            }-->
            
<!--            @media (max-width: 992px) {-->
<!--                .checkout-container {-->
<!--                    flex-direction: column;-->
<!--                }-->
                
<!--                .checkout-summary {-->
<!--                    width: 100%;-->
<!--                    margin-top: 30px;-->
<!--                }-->
<!--            }-->
            
<!--            @media (max-width: 768px) {-->
<!--                header {-->
<!--                    padding: 15px 20px;-->
<!--                }-->
                
<!--                .form-row {-->
<!--                    flex-direction: column;-->
<!--                    gap: 15px;-->
<!--                }-->
<!--            }-->
            
<!--            .place-order-btn {-->
    background: #007bff;      /* Bootstrap Primary */
<!--    border: none;-->
<!--    padding: 14px 20px;-->
<!--    font-size: 18px;-->
<!--    font-weight: 600;-->
<!--    border-radius: 6px;-->
<!--    color: #fff;-->
<!--    cursor: pointer;-->
<!--    width: 100%;-->
<!--    transition: 0.3s ease;-->
<!--}-->

<!--.place-order-btn:hover {-->
    background: #0056b3;      /* Darker hover */
<!--}-->

<!--.place-order-btn:focus {-->
<!--    outline: none;-->
<!--    box-shadow: 0 0 0 3px rgba(0,123,255,0.4);-->
<!--}-->

<!--        </style>-->
        


        <!--<div class="container">-->
        <!--    <div class="account-info">-->
        <!--        <div class="account-header">-->
        <!--            <h3 class="account-title">Account</h3>-->
        <!--            <i class="fas fa-chevron-up account-toggle"></i>-->
        <!--        </div>-->
        <!--        <div class="account-details" style="display: block;">-->
        <!--            @if(auth()->check())-->
        <!--                <p class="account-email">{{ auth()->user()->name }}</p>-->
        <!--                                        <p class="account-email">{{ auth()->user()->email }}</p>-->
        <!--                <a href="{{ url('/user/logout') }}" class="logout-link">Log out</a>-->
        <!--            @else-->
        <!--                <a href="{{ url('/user/login') }}" class="login-link">Log in</a>-->
        <!--            @endif-->
        <!--        </div>-->
        <!--        <div class="newsletter-checkbox">-->
        <!--            <input type="checkbox" id="newsletter" name="newsletter">-->
        <!--            <label for="newsletter">Email me with news and offers</label>-->
        <!--        </div>-->
        <!--    </div>-->
           
        <!--    <div class="checkout-container"  style="display:flex">-->
        <!--        <form method="POST" action="{{ route('cart.order') }}">-->
        <!--            @csrf-->
        <!--            <div class="checkout-inner" style="display: flex; gap: 30px; align-items: flex-start;">-->
                        <!-- LEFT -->
        <!--                <div class="checkout-form">-->
        <!--                    <h2 class="section-title">Petchemparts Checkout</h2>-->

        <!--                    <div class="form-group">-->
        <!--                        <label for="country">Country/Region</label>-->
        <!--                        <select id="country" name="country" class="form-control select2">-->
        <!--                            <option value="UK">United Kingdom</option>-->
        <!--                            <option value="US">United States</option>-->
        <!--                            <option value="CA">Canada</option>-->
        <!--                            <option value="AU">Australia</option>-->
        <!--                        </select>-->
        <!--                    </div>-->

        <!--                    <div class="form-row">-->
        <!--                        <div class="form-col">-->
        <!--                            <label>First Name *</label>-->
        <!--                            <input type="text" name="first_name" class="form-control" value="{{ auth()->check() ? auth()->user()->first_name : old('first_name') }}">-->
        <!--                            @error('first_name') -->
        <!--                            <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                        </div>-->
        <!--                        <div class="form-col">-->
        <!--                            <label>Last Name *</label>-->
        <!--                            <input type="text" name="last_name" class="form-control" value="{{ auth()->check() ? auth()->user()->last_name : old('last_name') }}">-->
        <!--                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="form-row">-->
        <!--                        <div class="form-col">-->
        <!--                            <label>Email *</label>-->
        <!--                            <input type="email" name="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : old('email') }}">-->
        <!--                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                        </div>-->
        <!--                        <div class="form-col">-->
        <!--                            <label>Phone *</label>-->
        <!--                            <input type="text" name="phone" class="form-control" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}">-->
        <!--                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                        </div>-->
        <!--                    </div>-->
                            
                        <!--                                <div class="form-row">-->
                        <!--        <div class="form-col">-->
                        <!--            <label>Start Date *</label>-->
                        <!--<input type="date" class="form-control" id="start_date" name="start_date" required>-->
                                   
                        <!--        </div>-->
                        <!--        <div class="form-col">-->
                        <!--            <label>End Date *</label>-->
                        <!--<input type="date" class="form-control" id="end_date" name="end_date" required>-->
                        <!--        </div>-->
                        <!--    </div>-->

        <!--                    <div class="form-group" style=" margin-top: 10px;">-->
        <!--                        <label>Address Line 1 *</label>-->
        <!--                        <input type="text" name="address1" class="form-control" value="{{ old('address1') }}">-->
        <!--                        @error('address1') <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                    </div>-->

        <!--                    <div class="form-group">-->
        <!--                        <label>Address Line 2</label>-->
        <!--                        <input type="text" name="address2" class="form-control" value="{{ old('address2') }}">-->
        <!--                        @error('address2') <span class="text-danger">{{ $message }}</span> @enderror-->
        <!--                    </div>-->

        <!--                    <div class="form-row">-->
        <!--                        <div class="form-col">-->
        <!--                            <label>City *</label>-->
        <!--                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">-->
        <!--                        </div>-->
        <!--                        <div class="form-col">-->
        <!--                            <label>Postal Code *</label>-->
        <!--                            <input type="text" name="post_code" class="form-control" value="{{ old('post_code') }}">-->
        <!--                        </div>-->
        <!--                    </div>-->

                            <!--<div class="form-group">-->
                            <!--    <label>Shipping Method</label>-->
                            <!--    @if(count(Helper::shipping()) > 0 && Helper::cartCount() > 0)-->
                            <!--        <select name="shipping" class="nice-select">-->
                            <!--            <option value="">Select your address</option>-->
                            <!--            @foreach(Helper::shipping() as $shipping)-->
                            <!--                <option value="{{ $shipping->id }}" data-price="{{ $shipping->price }}">{{ $shipping->type }} - £{{ $shipping->price }}</option>-->
                            <!--            @endforeach-->
                            <!--        </select>-->
                            <!--    @else-->
                            <!--        <p>Shipping not available</p>-->
                            <!--    @endif-->
                            <!--</div>-->

        <!--                    <div class="form-group" style=" margin-top: 10px;">-->
                                <!--<label>Payment Method</label><br>-->
        <!--                        <input type="radio" name="payment_method" style="display:none;" value="cod" checked>-->
                                <!--Cash on Delivery<br>-->
                                <!-- <input type="radio" name="payment_method" value="paypal"> PayPal -->
        <!--                    </div>-->

                            <!--<div class="button">-->
                            <!--    <button type="submit" class="btn">Place Order</button>-->
                            <!--</div>-->
                                                    
        <!--                         <div class="text-center mt-3">-->
        <!--                    <button type="submit" class="btn place-order-btn">-->
        <!--                        Submit-->
        <!--                    </button>-->
        <!--                </div>-->


        <!--                </div>-->

                        <!-- RIGHT -->
        <!--                <div class="checkout-summary">-->
        <!--                    <div class="product-list">-->
        <!--                        @foreach ($cartItems as $item)-->
        <!--                            @php $photos = json_decode($item->product->photo); @endphp-->
        <!--                            <div class="product-item">-->
        <!--                                <div class="product-image">-->
        <!--                                    <img src="{{ asset($photos[0]) }}" alt="{{ $item->product->title }}" width="60">-->
        <!--                                    <span class="product-badge">{{ $item->quantity }}</span>-->
        <!--                                </div>-->
        <!--                                <div class="product-details">-->
        <!--                                    <h4 class="product-title">{{ $item->product->title }}</h4>-->
        <!--                                    <p class="product-price">£{{ number_format($item->amount, 2) }}</p>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        @endforeach-->
        <!--                    </div>-->

        <!--                    <div class="checkout-summary-line">-->
        <!--                        <span>Subtotal · {{ Helper::cartCount() }} items</span>-->
                                <!--<span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>-->
        <!--                        <span id="subtotal_price">£{{ number_format(Helper::totalCartPrice(), 2) }}</span>-->

        <!--                    </div>-->

                            <!--<div class="checkout-summary-line shipping-summary">-->
                            <!--    <span>Shipping</span>-->
                            <!--    <span>Enter shipping address</span>-->
                            <!--</div>-->

        <!--                    <div class="checkout-total" id="order_total_price">-->
        <!--                        <span>Total</span>-->
                                <!--<span>INR £{{ number_format(Helper::totalCartPrice(), 2) }}</span>-->
        <!--                        <span id="total_price">£{{ number_format(Helper::totalCartPrice(), 2) }}</span>-->
                                
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </form>-->
        <!--    </div>-->
          
        <!--</div>-->
        <div class="container max-w-7xl mx-auto px-4 py-10 mt-[80px]">
    <!-- Account Info -->
    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <div class="flex justify-between items-center cursor-pointer">
            <h3 class="text-xl font-semibold">Account</h3>
            <i class="fas fa-chevron-up account-toggle"></i>
        </div>
        <div class="mt-4">
            @if(auth()->check())
                <p class="text-gray-700">{{ auth()->user()->name }}</p>
                <p class="text-gray-700">{{ auth()->user()->email }}</p>
                <a href="{{ url('/user/logout') }}" class="text-blue-600 hover:underline">Log out</a>
            @else
                <a href="{{ url('/user/login') }}" class="text-blue-600 hover:underline">Log in</a>
            @endif
        </div>
        <div class="mt-4 flex items-center gap-2">
            <input type="checkbox" id="newsletter" name="newsletter" class="form-checkbox h-4 w-4 text-blue-600">
            <label for="newsletter" class="text-gray-700">Email me with news and offers</label>
        </div>
    </div>

    <!-- Checkout Form -->
    <form method="POST" action="{{ route('cart.order') }}" class="flex flex-col lg:flex-row gap-8">
        @csrf

        <!-- LEFT -->
        <div class="lg:w-2/3 bg-white p-6 rounded-xl shadow space-y-6">
            <h2 class="text-2xl font-semibold mb-4">Petchemparts Checkout</h2>

            <!-- Country -->
            <div>
                <label for="country" class="block text-gray-700 font-medium mb-1">Country/Region</label>
                <select id="country" name="country" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="UK">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <option value="AU">Australia</option>
                </select>
            </div>

            <!-- Name Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">First Name *</label>
                    <input type="text" name="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->first_name : old('first_name') }}">
                    @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Last Name *</label>
                    <input type="text" name="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->last_name : old('last_name') }}">
                    @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Email & Phone Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">Email *</label>
                    <input type="email" name="email" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->email : old('email') }}">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Phone *</label>
                    <input type="text" name="phone" class="w-full border border-gray-300 rounded-md px-3 py-2"
                        value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}">
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 mb-1">Address Line 1 *</label>
                <input type="text" name="address1" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('address1') }}">
                @error('address1') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-1">Address Line 2</label>
                <input type="text" name="address2" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('address2') }}">
                @error('address2') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- City & Postal Code -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-1">City *</label>
                    <input type="text" name="city" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('city') }}">
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Postal Code *</label>
                    <input type="text" name="post_code" class="w-full border border-gray-300 rounded-md px-3 py-2" value="{{ old('post_code') }}">
                </div>
            </div>

            <!-- Hidden Payment Method -->
            <input type="radio" name="payment_method" value="cod" checked hidden>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition font-semibold">
                    Submit
                </button>
            </div>
        </div>

        <!-- RIGHT: Summary -->
        <div class="lg:w-1/3 bg-white p-6 rounded-xl shadow space-y-4">
            <h3 class="text-xl font-semibold mb-4">Order Summary</h3>

            <div class="space-y-4">
                @foreach ($cartItems as $item)
                    @php $photos = json_decode($item->product->photo); @endphp
                    <div class="flex items-center gap-3">
                        <img src="{{ asset($photos[0]) }}" alt="{{ $item->product->title }}" class="w-16 h-16 object-cover rounded">
                        <div>
                            <h4 class="font-medium text-gray-700">{{ $item->product->title }}</h4>
                            <p class="text-gray-600">£{{ number_format($item->amount, 2) }} x {{ $item->quantity }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between border-t pt-4">
                <span>Subtotal · {{ Helper::cartCount() }} items</span>
                <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
            </div>

            <div class="flex justify-between border-t pt-4 font-bold text-lg">
                <span>Total</span>
                <span>£{{ number_format(Helper::totalCartPrice(), 2) }}</span>
            </div>
        </div>
    </form>
</div>


                       <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
                <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
                <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
               
<script>
$(document).ready(function () {

    const $start = $("#start_date");
    const $end = $("#end_date");
    const $total = $("#total_price");
    const $subtotal = $("#subtotal_price");

    let weeklyPrice = parseFloat("{{ Helper::totalCartPrice() }}");

    let allowedDates = [];

    $end.prop("disabled", true);

    $start.on("change", function () {
        generateWeeklyEndDates();
        $end.prop("disabled", false);
        $end.val("");
        calculateTotal();
    });

    $end.on("change", function () {
        let val = $end.val();
        if (!allowedDates.includes(val)) {
            alert("Please select only weekly end dates:\n" + allowedDates.join("\n"));
            $end.val("");
            return;
        }
        calculateTotal();
    });

    function generateWeeklyEndDates() {
        let startDate = $start.val();
        if (!startDate) return;

        let start = new Date(startDate);

        allowedDates = [
            formatYMD(addDays(start, 7)),
            formatYMD(addDays(start, 14)),
            formatYMD(addDays(start, 21)),
            formatYMD(addDays(start, 28))
        ];

        $end.attr("min", allowedDates[0]);
    }

    function addDays(date, days) {
        let d = new Date(date);
        d.setDate(d.getDate() + days);
        return d;
    }

    function formatYMD(d) {
        return d.toISOString().split("T")[0];
    }

    function calculateTotal() {
        let start = $start.val();
        let end = $end.val();
        if (!start || !end) return;

        let s = new Date(start);
        let e = new Date(end);

        // EXACT DAYS (NO +1)
        let diffDays = Math.floor((e - s) / (1000 * 60 * 60 * 24));

        // WEEK = diffDays / 7 because only weekly allowed
        let weeks = diffDays / 7;

        let rentTotal = weeklyPrice * weeks;

        $subtotal.text("£" + rentTotal.toFixed(2));
        $total.text("£" + rentTotal.toFixed(2));
    }
});
</script>







    </body>
</html>


@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush


@endsection