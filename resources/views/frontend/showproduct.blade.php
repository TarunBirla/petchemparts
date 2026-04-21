@extends('frontend.layouts.master')

@section('title','Petchemparts || All categorys')

@section('main-content')
<!--<script src="https://cdn.tailwindcss.com"></script>-->



        <!-- Heading -->
       

       
@php
// Fetch products with parent & child categories
$products = DB::table('products')
    ->leftJoin('categories as parent_cat', 'products.cat_id', '=', 'parent_cat.id')
    ->leftJoin('categories as child_cat', 'products.child_cat_id', '=', 'child_cat.id')
    ->where('products.status', 'active')
    ->orderBy('products.id', 'DESC')
    ->select(
        'products.*',
        'parent_cat.title as category_name',
        'child_cat.title as subcategory_name'
    )
    ->paginate(12); // ✅ Pagination, 12 per page
@endphp


<section class="py-20 bg-gray-50 mt-[140px]">
    <div class="max-w-7xl mx-auto px-4">
         <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">
            Popular All Products
        </h2>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($products as $product)
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

    <!--@if($product->discount > 0)-->
    <!--    <span class="absolute top-3 left-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full">-->
    <!--        -{{ $product->discount }}%-->
    <!--    </span>-->
    <!--@endif-->
</div>
<div class="text-xs text-gray-500 mb-1">
    @if($product->category_name)
        <span class="font-semibold text-gray-700">
            {{ $product->category_name }}
        </span>
    @endif

    @if($product->subcategory_name)
        <span class="mx-1">›</span>
        <span class="text-gray-500">
            {{ $product->subcategory_name }}
        </span>
    @endif
</div>



                    <!-- Title -->
                    <h3 class="font-bold text-lg mb-1 text-gray-800">
                        {{ $product->title }}
                    </h3>

                    <!-- Short Description -->
                    <p class="text-sm text-gray-500 mb-2">
                        {{ \Illuminate\Support\Str::limit(strip_tags($product->summary ?? ''), 60) }}
                    </p>

                    <!-- Price -->
                    <div class="mb-2">
                        @if($product->discount > 0)
                            <!--<span class="text-sm line-through text-gray-400">-->
                            <!--    £{{ number_format($product->price, 2) }}-->
                            <!--</span>-->
                            <span class="text-2xl font-bold text-[#13A1F3] ml-2">
                                £{{ number_format($discountedPrice, 2) }}
                            </span>
                        @else
                            <span class="text-2xl font-bold text-[#13A1F3]">
                                £{{ number_format($product->price, 2) }}
                            </span>
                        @endif
                    </div>

                    <!-- Button -->
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
            @endforeach

        </div>

        
<!-- Pagination -->
        <div class="flex justify-center mt-12">
            {{ $products->links() }} <!-- ✅ Use $products, not $categories -->
        </div>


    </div>
</section>


@endsection
