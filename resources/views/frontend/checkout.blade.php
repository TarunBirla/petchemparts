@extends('frontend.layouts.master')

@section('title','Petchemparts || Checkout')

@section('main-content')
<script src="https://cdn.tailwindcss.com"></script>


<style>

    .theme-bg { background-color: #13A1F3; }
    .theme-text { color: #13A1F3; }
    .theme-border { border-color: #13A1F3; }
</style>


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mt-[120px]">
        <h2 class="text-3xl font-bold text-gray-900 mb-8"></h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-semibold mb-6 theme-text"></h3>
                    
                    <!-- Product Item 1 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center border-b border-gray-200 pb-6 mb-6">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200&h=200&fit=crop" 
                             alt="Product" 
                             class="w-24 h-24 object-cover rounded-lg mb-4 sm:mb-0">
                        <div class="flex-1 sm:ml-6">
                            <h4 class="text-lg font-semibold text-gray-900">Premium Wireless Headphones</h4>
                            <p class="text-sm text-gray-600 mt-1">Category: Electronics</p>
                            <p class="text-sm text-gray-600">Subcategory: Audio</p>
                            <p class="text-sm text-gray-500 mt-2">High-quality wireless headphones with noise cancellation and premium sound.</p>
                        </div>
                        <div class="flex items-center mt-4 sm:mt-0 sm:ml-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                <input type="number" value="1" class="w-12 text-center border-x border-gray-300 py-1" readonly>
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                            </div>
                            <p class="text-xl font-bold theme-text ml-6">£89.99</p>
                        </div>
                    </div>

                    <!-- Product Item 2 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center border-b border-gray-200 pb-6 mb-6">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=200&h=200&fit=crop" 
                             alt="Product" 
                             class="w-24 h-24 object-cover rounded-lg mb-4 sm:mb-0">
                        <div class="flex-1 sm:ml-6">
                            <h4 class="text-lg font-semibold text-gray-900">Classic Watch</h4>
                            <p class="text-sm text-gray-600 mt-1">Category: Accessories</p>
                            <p class="text-sm text-gray-600">Subcategory: Watches</p>
                            <p class="text-sm text-gray-500 mt-2">Elegant timepiece with leather strap and stainless steel case.</p>
                        </div>
                        <div class="flex items-center mt-4 sm:mt-0 sm:ml-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                <input type="number" value="2" class="w-12 text-center border-x border-gray-300 py-1" readonly>
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                            </div>
                            <p class="text-xl font-bold theme-text ml-6">£129.99</p>
                        </div>
                    </div>

                    <!-- Product Item 3 -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200&h=200&fit=crop" 
                             alt="Product" 
                             class="w-24 h-24 object-cover rounded-lg mb-4 sm:mb-0">
                        <div class="flex-1 sm:ml-6">
                            <h4 class="text-lg font-semibold text-gray-900">Running Shoes</h4>
                            <p class="text-sm text-gray-600 mt-1">Category: Fashion</p>
                            <p class="text-sm text-gray-600">Subcategory: Footwear</p>
                            <p class="text-sm text-gray-500 mt-2">Comfortable and durable running shoes designed for performance.</p>
                        </div>
                        <div class="flex items-center mt-4 sm:mt-0 sm:ml-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                <input type="number" value="1" class="w-12 text-center border-x border-gray-300 py-1" readonly>
                                <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                            </div>
                            <p class="text-xl font-bold theme-text ml-6">£79.99</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h3 class="text-xl font-semibold mb-6 theme-text">Order Summary</h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>£429.96</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span>£5.99</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax</span>
                            <span>£43.60</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total</span>
                                <span class="theme-text">£479.55</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full theme-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition mb-4">
                         Request for Quote
                    </button>
                    
                    <!--<button class="w-full border-2 theme-border theme-text py-3 rounded-lg font-semibold hover:bg-gray-50 transition">-->
                    <!--    Continue Shopping-->
                    <!--</button>-->

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="w-5 h-5 mr-2 theme-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Secure Checkout
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection