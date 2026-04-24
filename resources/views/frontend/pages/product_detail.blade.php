@extends('frontend.layouts.master')
@section('title', 'Product Detail')
@section('main-content')

@php
    $photos = json_decode($product_detail->photo, true);
    $org = ($product_detail->price - ($product_detail->price * $product_detail->discount) / 100);
@endphp


<div class="container mx-auto px-4 mt-20 mb-10">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            {{ $product_detail->title }}
        </h1>

        <!-- Product Info -->
        <div class="bg-gray-50 p-4 rounded-lg space-y-2 mb-6">

            <p><strong>Category:</strong>
                {{ optional($product_detail->cat_info)->title ?? 'N/A' }}
            </p>

            <p><strong>Brand:</strong>
                {{ optional($product_detail->brand)->title ?? 'N/A' }}
                {{ $product_detail->brand_id ?? 'N/A' }}
            </p>

            <p><strong>Manufacturer:</strong>
                {{ optional($product_detail->manufacturer)->name ?? 'N/A' }}
                {{ $product_detail->manufacturer_id ?? 'N/A' }}
            </p>

            <p><strong>Part Number:</strong>
                {{ $product_detail->part_number ?? 'N/A' }}
            </p>

            <p><strong>Model Number:</strong>
                {{ $product_detail->model_number ?? 'N/A' }}
            </p>

        </div>

        <!-- Price -->
        <p class="text-2xl font-semibold text-blue-600 mb-6">
            £{{ number_format($org, 2) }}
        </p>

        <!-- Quantity -->
        <div class="flex items-center gap-3 mb-6">
            <button onclick="decreaseQuantity()" class="px-3 py-1 bg-gray-200 rounded">-</button>

            <input type="number" id="quantity" value="1" min="1"
                class="w-20 text-center border border-gray-300 rounded">

            <button onclick="increaseQuantity()" class="px-3 py-1 bg-gray-200 rounded">+</button>
        </div>

        <!-- Button -->
        <a id="addToCartBtn"
           href="{{ route('add-to-cart', $product_detail->slug) }}"
           class="block text-center bg-blue-600 text-white py-3 rounded-lg">
            Request for Quote – £{{ number_format($org, 2) }}
        </a>

    </div>
</div>

<script>
function decreaseQuantity() {
    let qty = document.getElementById('quantity');
    if (qty.value > 1) qty.value--;
    updateCartLink();
}

function increaseQuantity() {
    let qty = document.getElementById('quantity');
    qty.value++;
    updateCartLink();
}

function updateCartLink() {
    let qty = document.getElementById('quantity').value;
    let btn = document.getElementById('addToCartBtn');
    let baseUrl = "{{ route('add-to-cart', $product_detail->slug) }}";
    btn.href = baseUrl + "?qty=" + qty;
}

updateCartLink();
</script>

@endsection