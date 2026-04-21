@extends('frontend.layouts.master')

@section('title','E-SHOP || PRODUCT PAGE')

@section('main-content')
<style>
/* ===== GLOBAL ===== */
.shop.section {
    background: #f8f9fb;
    padding: 50px 0;
}

.breadcrumbs {
    background: #fff;
    border-bottom: 1px solid #eee;
    padding: 15px 0;
    margin-top:90px;
}

.bread-inner ul {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 5px;
}

.bread-inner ul li a {
    color: #444;
    text-decoration: none;
    font-weight: 500;
}

.bread-inner ul li.active a {
    color: #13A1F3;
}

/* ===== SIDEBAR ===== */
.shop-sidebar .single-widget {
    background: #fff;
    padding: 20px;
    margin-bottom: 25px;
    border-radius: 8px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.04);
}

.shop-sidebar .title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.categor-list li {
    margin-bottom: 10px;
}

.categor-list li a {
    color: #444;
    font-size: 14px;
    transition: 0.3s;
}

.categor-list li a:hover {
    color: #13A1F3;
    padding-left: 5px;
}

/* ===== PRICE FILTER ===== */
.filter_button {
    background: #13A1F3;
    border: none;
    padding: 8px 18px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
}

.price-filter .label-input {
    margin-top: 10px;
}

#amount {
    width: 100%;
    border: 0;
    font-weight: 600;
}

/* ===== RECENT PRODUCTS ===== */
.recent-post .single-post {
    display: flex;
    gap: 12px;
    margin-bottom: 15px;
}

.recent-post img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 6px;
}

/* ===== SHOP TOP ===== */
.shop-top {
    background: #fff;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.shop-shorter {
    display: flex;
    gap: 15px;
}

.shop-shorter label {
    font-weight: 500;
}

.shop-shorter select {
    padding: 5px 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* ===== PRODUCT LIST CARD ===== */
.single-product {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    height: 100%;
    position: relative;
    transition: 0.3s;
}

.single-product:hover {
    transform: translateY(-3px);
}

.product-img {
    position: relative;
}

.product-img img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    transition: 0.4s;
}

.product-img .hover-img {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.product-img:hover .hover-img {
    opacity: 1;
}

.button-head {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    opacity: 0;
    text-align: center;
    transition: 0.3s;
}

.product-img:hover .button-head {
    opacity: 1;
}

.product-action a {
    margin: 0 5px;
    color: #444;
    font-size: 16px;
    display: inline-block;
    transition: 0.3s;
}

.product-action a:hover {
    color: #13A1F3;
}

.product-action-2 a {
    display: inline-block;
    background: #13A1F3;
    color: #fff;
    padding: 5px 12px;
    border-radius: 5px;
    margin-top: 5px;
    transition: 0.3s;
}

.product-action-2 a:hover {
    background: #13A1F3;
}

/* ===== LIST CONTENT ===== */
.list-content {
    background: #fff;
    padding: 20px;
    height: 100%;
    margin-top: 15px;
}

.product-price span {
    font-size: 20px;
    font-weight: 700;
    color: #13A1F3;
}

.product-price del {
    font-size: 14px;
    margin-left: 10px;
    color: #13A1F3;
}

.list-content .title {
    font-size: 20px;
    font-weight: 600;
    margin: 10px 0;
}

.list-content .des {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* ===== BUTTON ===== */
.btn.cart {
    background: #13A1F3;
    color: #fff;
    padding: 10px 22px;
    border-radius: 6px;
    margin-top: 10px;
    display: inline-block;
}

.btn.cart:hover {
    background: #13A1F3;
}

/* ===== MODAL ===== */
.modal-content {
    border-radius: 10px;
}

.quickview-content h2 {
    font-size: 24px;
    font-weight: 600;
}

/* ===== MOBILE ===== */
@media(max-width:768px){
    .product-img img {
        height: 200px;
    }
    .shop-shorter {
        flex-direction: column;
        gap: 10px;
    }
}
</style>



<form action="{{route('shop.filter')}}" method="POST">
@csrf
<section class="product-area shop-sidebar shop-list shop  section mt-[60px]">
    <div class="container max-w-7xl mx-auto">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">

                    
                    <div class="single-widget category">
                        <h3 class="title">Categories</h3>
                        <ul class="categor-list">
                            @php
                                $menu = App\Models\Category::getAllParentWithChild();
                                // Current category slug from route
                                $currentCategorySlug = request()->route('slug');
                            @endphp
                    
                            @if($menu)
                                @foreach($menu as $cat_info)
                                    @if($cat_info->slug == $currentCategorySlug)
                                        @if($cat_info->child_cat->count() > 0)
                                            <li>
                                                <a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                                                <ul>
                                                    @foreach($cat_info->child_cat as $sub_menu)
                                                        <li>
                                                            <a href="{{ route('product-sub-cat', [$cat_info->slug, $sub_menu->slug]) }}">
                                                                {{ $sub_menu->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('product-cat', $cat_info->slug) }}">{{ $cat_info->title }}</a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>


                    <!-- Price Filter -->
                    <!--<div class="single-widget range">-->
                    <!--    <h3 class="title">Shop by Price</h3>-->
                    <!--    <div class="price-filter">-->
                    <!--        <div class="price-filter-inner">-->
                    <!--            @php $max=DB::table('products')->max('price'); @endphp-->
                    <!--            <div id="slider-range" data-min="0" data-max="{{$max}}"></div>-->
                    <!--            <div class="product_filter">-->
                    <!--                <button type="submit" class="filter_button">Filter</button>-->
                    <!--                <div class="label-input">-->
                    <!--                    <span>Range:</span>-->
                    <!--                    <input type="text" id="amount" readonly/>-->
                    <!--                    <input type="hidden" name="price_range" id="price_range" value="@if(!empty($_GET['price'])){{$_GET['price']}}@endif"/>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!-- Recent Posts -->
                   <div class="single-widget recent-post">
    <h3 class="title">Recent post</h3>

    @foreach($recent_products as $product)
        @php
            $photos = json_decode($product->photo, true);
            $image = (is_array($photos) && count($photos))
                ? $photos[0]
                : 'backend/img/placeholder.png';

            $org = ($product->price - ($product->price * $product->discount) / 100);
        @endphp

        <div class="single-post first">

            <div class="content">
                <h5>
                    <a href="{{ route('product-detail',$product->slug) }}">
                        {{ $product->title }}
                    </a>
                </h5>

                <p class="price">
                    £{{ number_format($org,2) }}
                </p>
            </div>
        </div>
    @endforeach
</div>


                    <!-- Brands -->
                    <div class="single-widget category">
                        <h3 class="title">Brands</h3>
                        <ul class="categor-list">
                            @php $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get(); @endphp
                            @foreach($brands as $brand)
                                <li><a href="{{route('product-brand',$brand->slug)}}">{{$brand->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Product List -->
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                        <div class="shop-top">
                            <div class="shop-shorter">
                                <div class="single-shorter">
                                    <label>Show :</label>
                                    <select class="show" name="show" onchange="this.form.submit();">
                                        <option value="">Default</option>
                                        <option value="9" @if(!empty($_GET['show']) && $_GET['show']=='9') selected @endif>09</option>
                                        <option value="15" @if(!empty($_GET['show']) && $_GET['show']=='15') selected @endif>15</option>
                                        <option value="21" @if(!empty($_GET['show']) && $_GET['show']=='21') selected @endif>21</option>
                                        <option value="30" @if(!empty($_GET['show']) && $_GET['show']=='30') selected @endif>30</option>
                                    </select>
                                </div>
                               <div class="single-shorter">
                                    <label>Sort By :</label>
                                    <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                         <option value="">Default</option>
                                         <option value="title" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='title') selected @endif>Name</option>
                                         <option value="price" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='price') selected @endif>Price</option> 
                                         <option value="category" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='category') selected @endif>Category</option>
                                         <option value="brand" @if(!empty($_GET['sortBy']) && $_GET['sortBy']=='brand') selected @endif>Brand</option>
                                         </select>
                                         </div>

                            </div>
                            <!--<ul class="view-mode">-->
                            <!--    <li><a href="{{route('product-grids')}}"><i class="fa fa-th-large"></i></a></li>-->
                            <!--    <li class="active"><a href="javascript:void(0)"><i class="fa fa-th-list"></i></a></li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                </div>

               <div class="row">
    @if(count($products))
        @foreach($products as $product)
@php
    $photos = json_decode($product->photo, true);

    if (is_array($photos) && count($photos) > 0) {
        $firstImage = $photos[0];
    } else {
        $photoArr = explode(',', $product->photo);
        $firstImage = $photoArr[0] ?? null;
    }

    // ✅ IMPORTANT FIX HERE
    $imageUrl = $firstImage
        ? asset(trim($firstImage, '[]" '))
        : asset('backend/img/placeholder.png');

    $after_discount = ($product->price - ($product->price * $product->discount) / 100);
@endphp


            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="single-product">
                    <div class="product-img">
                        <div class="button-head">
                            <div class="product-action-2">
                                <a title="Request for Quote" href="{{route('add-to-cart',$product->slug)}}">Request for Quote</a>
                            </div>
                        </div>
                    </div>
                    <div class="list-content text-center pt-3">
                        <h3 class="title">
                            <a href="{{ route('product-detail',$product->slug) }}">{{ $product->title }}</a>
                        </h3>
                        <div class="product-price mb-2">
                            <span>${{ number_format($after_discount,2) }}</span>
                        </div>
                        <p class="des">{!! html_entity_decode($product->summary) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
        
    @else
        <h4 class="text-warning" style="margin:100px auto;">There are no products.</h4>
    @endif
</div>



            </div>
        </div>
    </div>
</section>
</form>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
    if ($("#slider-range").length > 0) {
        const max_value = parseInt( $("#slider-range").data('max') ) || 500;
        const min_value = parseInt($("#slider-range").data('min')) || 0;
        let price_range = min_value+'-'+max_value;
        if($("#price_range").length > 0 && $("#price_range").val()){
            price_range = $("#price_range").val().trim();
        }
        let price = price_range.split('-');
        $("#slider-range").slider({
            range: true,
            min: min_value,
            max: max_value,
            values: price,
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " -  $" + ui.values[1]);
                $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    }
});
</script>
@endpush
