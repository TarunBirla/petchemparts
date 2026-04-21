@extends('frontend.layouts.master')
@section('title','New Arrival || HOME PAGE')
@section('main-content')
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

    <div class="container" style="margin-bottom: 10rem;">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h1 class="text-center mt-5"><strong>Collections</strong></h1>
                </div>
            </div>
        </div>
        @if($collection->count() > 0) 
            <div class="toolbar" style="margin-top: 20px;">
                <button class="filter-btn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    FILTER
                </button>

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
                    <select>
                        <option>Best selling</option>
                        <option>Price, low to high</option>
                        <option>Price, high to low</option>
                        <option>Date, new to old</option>
                    </select>
                </div>
            </div>
        @endif
           
        <div class="grid" id="productGrid" style="grid-template-columns: repeat(4, 1fr);" >
            @foreach($collection as $product)
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
                            <button>
                                <i class="far fa-times-circle"></i>
                            </button>
                            <button>
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-details mt-2">
                        <h5 class="product-title">{{ $product->title }}</h5>
                        <p class="product-price">
                            <strong>
                                €{{ number_format($product->discount, 2) }}
                            </strong>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $collection->links('pagination::bootstrap-5') }} 
    </div>
    

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
@endsection
