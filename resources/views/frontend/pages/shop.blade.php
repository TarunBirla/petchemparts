@extends('frontend.layouts.master')

@section('main-content')

@php
// MAIN CATEGORIES
$categories = DB::table('categories')
    ->where('status', 'active')
    ->whereNull('parent_id')
    ->get();

// SUB CATEGORIES (GROUPED)
$subcategories = DB::table('categories')
    ->where('status', 'active')
    ->whereNotNull('parent_id')
    ->get()
    ->groupBy('parent_id');
@endphp

<div class="container py-5 px-5 mt-[80px] max-w-7xl mx-auto">

    <h3 class="mb-4">Search Products</h3>

    {{-- FILTER FORM --}}
    <form method="GET" action="{{ route('shop') }}">
        <div class="row">

            {{-- Manufacturer --}}
            <div class="col-md-3 mb-3">
                <select name="manufacturer_id" class="form-control">
                    <option value="">-- Select Manufacturer --</option>
                    @foreach($manufacturers as $m)
                        <option value="{{ $m->id }}"
                            {{ request('manufacturer_id') == $m->id ? 'selected' : '' }}>
                            {{ $m->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Category --}}
            <div class="col-md-3 mb-3">
                <select name="category_id" class="form-control" onchange="this.form.submit()">
                    <option value="">-- Select Category --</option>

                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sub Category --}}
            <div class="col-md-3 mb-3">
                <select name="subcategory_id" class="form-control">
                    <option value="">-- Select Sub Category --</option>

                    @if(request('category_id') && isset($subcategories[request('category_id')]))
                        @foreach($subcategories[request('category_id')] as $sub)
                            <option value="{{ $sub->id }}"
                                {{ request('subcategory_id') == $sub->id ? 'selected' : '' }}>
                                {{ $sub->title }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            
                        <div class="col-md-3 mb-3">
             <button class=" text-center bg-[#13A1F3] text-white py-2 px-3 rounded-xl font-semibold hover:shadow-lg transition">Filter</button>
        <a href="{{ route('shop') }}" class="text-center bg-blue-700 text-white py-2 px-3 rounded-xl font-semibold hover:bg-[#13A1F3] hover:shadow-lg transition">Reset</a>
        </div>

        </div>

       
    </form>

    <hr>

    {{-- PRODUCTS --}}
   {{-- PRODUCTS --}}
<section class="py-3 bg-white">
    <div class="max-w-7xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            @forelse($products as $product)
                @php
                    $photos = json_decode($product->photo, true);
                    $image = $photos[0] ?? 'frontend/img/no-image.png';

                    $discountedPrice = $product->discount > 0
                        ? $product->price - ($product->price * $product->discount / 100)
                        : $product->price;
                @endphp

                <!-- Product Card -->
                <div class="bg-gray-50 rounded-2xl p-2 hover:shadow-xl transition">

                    <!-- Image -->
                    <div class="h-48 bg-white rounded-xl mb-2 overflow-hidden relative">
                        <img 
                            src="{{ asset($image) }}"
                            alt="{{ $product->title }}"
                            class="w-full h-full object-cover transition duration-300 hover:scale-105"
                        >
                    </div>

                    <!-- Category / Subcategory -->
                    <div class="text-xs text-gray-500 mb-1">
                        @if($product->category_name ?? false)
                            <span class="font-semibold text-gray-700">
                                {{ $product->category_name }}
                            </span>
                        @endif

                        @if($product->subcategory_name ?? false)
                            <span class="mx-1">›</span>
                            <span>{{ $product->subcategory_name }}</span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h3 class="font-bold text-lg mb-1 text-gray-800">
                        {{ $product->title }}
                    </h3>

                    <!-- Summary -->
                    <p class="text-sm text-gray-500 mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($product->summary ?? ''), 60) }}
                    </p>

                    <!-- Price -->
                    <div class="mb-2">
                        @if($product->discount > 0)
                            <span class="text-2xl font-bold text-[#13A1F3]">
                                £ {{ number_format($discountedPrice, 2) }}
                            </span>
                        @else
                            <span class="text-2xl font-bold text-[#13A1F3]">
                                £{{ number_format($product->price, 2) }}
                            </span>
                        @endif
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 mt-3">
                        <a href="{{ route('product-detail', $product->slug) }}"
                           class="w-1/4 text-center bg-[#13A1F3] text-white py-2 rounded-xl font-semibold hover:shadow-lg transition">
                            View
                        </a>

                        <a href="{{ route('add-to-cart', $product->slug) }}"
                           class="w-3/4 text-center bg-[#0EA5E9] text-white py-2 rounded-xl font-semibold hover:shadow-lg transition">
                            Request for Quote
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500">
                    No products found
                </div>
            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->withQueryString()->links() }}
        </div>

    </div>
</section>




</div>
@endsection
