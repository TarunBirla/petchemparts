@extends('frontend.layouts.master')
@section('title','New Arrival || HOME PAGE')
@section('main-content')
    <style>
            /* Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        /* Modal Content */
        .modal-content {
            background: #fff;
            max-width: 1000px;
            width: 90%;
            display: flex;
            flex-direction: column;
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Close Button */
        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        /* Modal Layout */
        .modal-body {
            display: flex;
            flex-wrap: wrap;
            padding: 30px;
            gap: 30px;
        }

        .modal-image img {
            max-width: 100%;
            border-radius: 8px;
        }

        .modal-details {
        flex: 1;
        min-width: 300px;
        }

        .badge {
            background: #000;
            color: #fff;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 4px;
            margin-right: 10px;
        }

        .alert-text {
            color: #ff4d4f;
            font-weight: 500;
        }

        .price {
            font-size: 1.75rem;
            margin: 10px 0;
        }

        .description {
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        /* Quantity */
        .quantity-control {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .quantity-control button {
            width: 32px;
            height: 32px;
            background: #eee;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }
        .quantity-control input {
            width: 50px;
            text-align: center;
            margin: 0 8px;
        }

        /* Action Buttons */
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .add-to-cart {
            background: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            flex: 1;
        }
        .wishlist, .remove {
            background: #fff;
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Buy Now */
        .buy-now {
            background: #e50000;
            color: #fff;
            border: none;
            padding: 12px;
            font-weight: bold;
            width: 100%;
            border-radius: 4px;
        }

        .blog-sec {
            padding: 60px 20px;
            background: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .blog-heading {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }

        .blog-row {
            display: flex;
            gap: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .blog-card {
            flex: 0 0 30%;
            background: #fff;
            text-align: center;
            position: relative;
        }

        .blog-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .blog-image-wrapper img  {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
            border-radius: 10px;
        }
        .blog-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .blog-label {
            position: absolute;
            top: 130px;
            left: 10px;
            background: black;
            color: #fff;
            font-size: 10px;
            padding: 6px 15px;
            font-weight: bold;
            border-radius: 4px;
        }

        .blog-title {
            font-size: 22px;
            margin: 20px 0 15px;
            padding: 0 10px;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            font-weight: bold;
            color: black;
            text-decoration: none;
            margin-top: 10px;
            font-size: 16px;
        }

        .read-more .arrow {
            margin-left: 5px;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .read-more:hover .arrow {
            transform: translateX(5px);
        }


        .product-card {
            position: relative;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .product-img-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
            border-radius: 10px;
        }

        .product-hover-icons {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .product-hover-icons button {
            background: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.1);
        }

        .product-card:hover .product-hover-icons {
            opacity: 1;
        }

        .product-details {
            
            padding: 10px 5px;
        }

        .h4 {
            margin-top: 10px !important;
        }

        .product-title {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 14px;
            color: #000;
        }

        .featured-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .featured-img {
            position: relative;
        }

        .featured-img img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 10px;
            transition: transform 0.4s ease;
        }

        .featured-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .featured-item:hover img {
            transform: scale(1.05);
        }

        .featured-item:hover .featured-overlay {
            opacity: 1;
        }

        .featured-overlay h4 {
            font-size: 16px;
            margin: 0;
        }

    </style>
    <style>
         .product-card {
            position: relative;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); */
        }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .product-img-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
            border-radius: 10px;
        }

        .product-hover-icons {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 10px;
            opacity: 0;
            transition: all 0.2s ease;
        }

        .product-hover-icons button {
            background: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 10px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.15);
        }

        .product-card:hover .product-img-wrapper img {
            transform: scale(1.1);
        }

        .product-card:hover .product-hover-icons {
            opacity: 1;
        }

        .product-details {
            
            padding: 10px 5px;
        }

        .h4 {
            margin-top: 10px !important;
        }
        .product-title {
            display: -webkit-box;
            -webkit-line-clamp: 2; 
            -webkit-box-orient: vertical;  
            overflow: hidden;
            text-overflow: ellipsis;
            height: 2.8em; /* approx height for 2 lines */
        }

        .product-price {
            font-size: 14px;
            color: #000;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .filter-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
        }
        .dots {
            display: flex;
            gap: 20px; /* space between layouts */
            align-items: center;
        }

        .dot-layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            opacity: 0.4;
            transition: opacity 0.3s;
        }

        .dot-layout.active {
            opacity: 1;
        }

        .dot-lines {
            display: flex;
            flex-direction: column; /* flex-col */
            gap: 6px; /* space between two rows */
        }

        .dot-row {
            display: flex;
            gap: 6px; /* space between dots in row */
            justify-content: center;
        }

        .dot {
            width: 4px;
            height: 4px;
            background-color: black;
            border-radius: 50%;
        }

        .line {
            width: 16px;
            height: 2px;
            background-color: black;
        }

        .sort {
            display: flex;
            align-items: center;
        }
        .sort select {
            padding: 8px 12px;
            font-size: 14px;
        }
        .grid {
            display: grid;
            gap: 20px;
        }
        .product-card {
            /* border: 1px solid #eee; */
            /* border-radius: 8px; */
            overflow: hidden;
            background: white;
            text-align: center;
            padding-bottom: 10px;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .product-title {
            font-size: 16px;
            font-weight: 500;
            margin: 10px 10px 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .product-price {
            font-size: 16px;
            font-weight: 600;
            color: black;
            margin: 0 10px 10px;
        }
    </style>
       <script>
        function openModal(button) {
            const title = button.getAttribute('data-title');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');
            const description = button.getAttribute('data-description');
            const addToCartUrl = button.getAttribute('data-slug');
            const wishlistUrl = button.getAttribute('data-wishlist');
    
            // Show modal
            document.getElementById('quickViewModal').style.display = 'flex';
    
            // Populate fields
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-price').innerText = `£ ${price}`;
            document.getElementById('modal-image').src = image;
            document.getElementById('modal-description').innerText = description;
    
            // Handle Add to Cart
            document.getElementById('modal-cart-btn').onclick = function () {
                const qty = document.getElementById('quantity').value;
                window.location.href = `${addToCartUrl}?qty=${qty}`;
            };
    
            // Handle Buy It Now
            document.getElementById('modal-buy-btn').onclick = function () {
                const qty = document.getElementById('quantity').value;
                window.location.href = `${addToCartUrl}?qty=${qty}&buy_now=1`;
            };
    
            // Handle Wishlist
            document.getElementById('modal-wishlist-btn').onclick = function () {
                window.location.href = wishlistUrl;
            };
        }
    
        function closeModal() {
            document.getElementById('quickViewModal').style.display = 'none';
        }
    
        function adjustQty(amount) {
            const qtyInput = document.getElementById('quantity');
            let value = parseInt(qtyInput.value) + amount;
            qtyInput.value = value < 1 ? 1 : value;
        }
    </script>

    <div class="container" style="margin-bottom: 10rem;">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h1 class="text-center mt-5"><strong>New Arrivals</strong></h1>
                </div>
            </div>
        </div>
        @if($newarrival->count() > 0) 
            <div class="toolbar" style="margin-top: 20px;">
               
                <!--<button class="filter-btn">-->
                <!--    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"-->
                <!--        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">-->
                <!--        <line x1="4" y1="21" x2="4" y2="14"></line>-->
                <!--        <line x1="4" y1="10" x2="4" y2="3"></line>-->
                <!--        <line x1="12" y1="21" x2="12" y2="12"></line>-->
                <!--        <line x1="12" y1="8" x2="12" y2="3"></line>-->
                <!--        <line x1="20" y1="21" x2="20" y2="16"></line>-->
                <!--        <line x1="20" y1="12" x2="20" y2="3"></line>-->
                <!--        <line x1="1" y1="14" x2="7" y2="14"></line>-->
                <!--        <line x1="9" y1="8" x2="15" y2="8"></line>-->
                <!--        <line x1="17" y1="16" x2="23" y2="16"></line>-->
                <!--    </svg>-->
                <!--    FILTER-->
                <!--</button>-->
                <div class="dots">
                    <div class="dot-layout" data-columns="1">
                        <div class="dot-lines">
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="dot-layout" data-columns="2">
                        <div class="dot-lines">
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>

                    <div class="dot-layout" data-columns="3">
                        <div class="dot-lines">
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>

                    <div class="dot-layout active" data-columns="4">
                        <div class="dot-lines">
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>

                    <div class="dot-layout" data-columns="5">
                        <div class="dot-lines">
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                            <div class="dot-row">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="sort">
                    <select id="sortDropdown">
                        <option value="">Sort by</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price, low to high</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price, high to low</option>
                        <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Date, new to old</option>
                        <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Date, old to new</option>
                    </select>
                </div>
            </div>
        @endif

        <div class="grid" id="productGrid" style="grid-template-columns: repeat(4, 1fr);" >
            @foreach($newarrival as $product)
                <div class="product-card">
                    <div class="product-img-wrapper">
                        @php
                            $photos = json_decode($product->photo);
                        @endphp
                        @if(!empty($photos) && isset($photos[0]))
                            <a href="{{route('product-detail',$product->slug)}}"> 
                                <img src="{{ asset($photos[0]) }}" alt="{{ $product->title }}" class="img-fluid">
                            </a>
                        @endif
                        <div class="product-hover-icons">
                            <button><a href="{{route('add-to-cart',$product->slug)}}">
                                <i class="fas fa-shopping-bag"></i>
                                </a>
                            </button>
                            <button>
                                <a href="{{route('add-to-wishlist',$product->slug)}}">
                                    <i class="far fa-heart"></i>
                                </a>
                            </button>
                             <button
                                onclick="openModal(this)"
                                data-title="{{ $product->title }}"
                                data-price="{{ number_format($product->price, 2) }}"
                                data-image="{{ asset($photos[0]) }}"
                                data-slug="{{ route('add-to-cart', $product->slug) }}"
                                data-detail="{{ route('product-detail', $product->slug) }}"
                                data-wishlist="{{ route('add-to-wishlist', $product->slug) }}"
                            >
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-details mt-2">
                        <h5 class="product-title">{{ $product->title }}</h5>
                        <p class="product-price">
                             @php
                                $after_discount=($product->price-($product->price*$product->discount)/100);
                            @endphp
                            <strong>
                                £ {{ number_format($after_discount, 2) }}
                            </strong>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

  <div id="quickViewModal" class="modal-overlay" style="display:none;">
        <div class="modal-content">
            <!--<button class="remove" onclick="closeModal()"><i class="far fa-times-circle"></i></button>-->
            <div class="modal-body" style="display: flex; gap: 20px;">
            <div class="modal-image">
                <img id="modal-image" src="" alt="Product Image" style="max-width: 250px;">
            </div>
            <div class="modal-details">
                <h2 id="modal-title">Product Title</h2>
                <div class="badge-row">
                <span class="badge">BEST SELLER</span>
                <span class="alert-text">⚡ Selling fast! 32 people have this in their carts.</span>
                </div>
                <p class="price" id="modal-price">£ 0.00</p>
                <p class="description" id="modal-description">Product description goes here.</p>

                <label for="quantity">Quantity</label>
                <div class="quantity-control">
                <button onclick="adjustQty(-1)">−</button>
                <input id="quantity" type="number" value="1" min="1">
                <button onclick="adjustQty(1)">+</button>
                </div>

                 <div class="modal-actions">
                    <button class="add-to-cart" id="modal-cart-btn">Add to cart</button>
                    <a href="javascript:void(0);" id="modal-wishlist-btn"><i class="far fa-heart"></i></a>
                    <button class="remove" onclick="closeModal()"><i class="far fa-times-circle"></i></button>
                </div>
                <button class="buy-now" id="modal-buy-btn">BUY IT NOW</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
             document.getElementById("quickViewModal").style.display = "none";
        }
      
         document.getElementById("quickViewModal").addEventListener("click", function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
    <script>
        const dotLayouts = document.querySelectorAll('.dot-layout');
        const productGrid = document.getElementById('productGrid');

        dotLayouts.forEach(layout => {
            layout.addEventListener('click', function () {
                dotLayouts.forEach(d => d.classList.remove('active'));
                this.classList.add('active');

                const columns = this.getAttribute('data-columns');
                productGrid.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
            });
        });
    </script>
     <script>
    document.getElementById('sortDropdown').addEventListener('change', function () {
        const sort = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('sort', sort);
        window.location.href = url.toString();
    });
</script>
@endsection
