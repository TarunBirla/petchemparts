
@extends('frontend.layouts.master')
@section('title','My Store || HOME PAGE')
@section('main-content')

    <style>
    .blog-sec {
        padding: 60px 20px;
        background: #fff;
        }

        .container {
            max-width: 90rem;
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
            top: 10px;
            left: 10px;
            background: black;
            color: #fff;
            font-size: 14px;
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

    <section class="feature-sec sectionpadding">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                <h1 class="text-center mt-5"><strong>Collections</strong></h1>
                </div>
            </div>

            <div class="featured-slider owl-carousel">
                @php
                $product_listss = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->limit(6)->get();
                @endphp

                @foreach($product_listss as $product)
                <div class="featured-item">
               <a href="{{route('product-detail',$product->slug)}}">
                    <div class="featured-img">
                    @php
                        $photos = json_decode($product->photo);
                    @endphp
                    @if(!empty($photos) && isset($photos[0]))
                        <img src="{{ asset($photos[0]) }}" alt="{{ $product->title }}" class="img-fluid">
                    @endif
                    <div class="featured-overlay">
                        <h4 class="title">{{ $product->title }}</h4>
                    </div>
                    </div>
                </a>
                </div>
                @endforeach

            </div>
            </div>
        </div>
    </section>

    <!-- subbanner sec end -->

    <!-- gallery listing sec start -->
    <section class="gallery-sec sectionpadding">
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-3">
                <div class="featured-item">
                    <a href="{{route('product-play','test')}}">
                        <div class="featured-img"><img src="images/frame 1.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="product-play.html">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>  
                <div class="featured-item">
                    <a href="product-play.html">
                        <div class="featured-img"><img src="images/frame 1.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                  
                </div>
                <div class="col-lg-3">
                <div class="featured-item">
                    <a href="product-details.html">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div> 
                <div class="featured-item">
                    <a href="product-details.html">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div> 
                <div class="featured-item">
                    <a href="product-details.html">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="product-details.html">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                     
                </div>
                <div class="col-lg-3">
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/frame 1.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div> 
                 <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/frame 1.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                   
                </div>
                <div class="col-lg-3">
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                 <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/frame 1.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="images/image 12.png" class="img-fluid"></div>
                        <div class="featured-content">
                            <h5>Title Title Title Title</h5>
                            <span><strong>Code: HF4328754</strong></span>
                            <p>Size: 36 X 36 in </p>
                            <p>Medium: Water Colour</p>
                        </div>
                    </a>
                      <div class="featured-attribute mt-3">
                        <button class="hearts"><i class="far fa-heart"></i>120</button>
                        <button class="comment"><i class="far fa-comment"></i>89</button>
                      </div>
                </div>                    
                </div>
                <div class="col-lg-12">
                    <ul class="pagination mt-3">
                        <li><a href=""><i class="fas fa-angle-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="" class="active">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">6</a></li>
                        <li><a href="">7</a></li>
                        <li><a href="">8</a></li>
                        <li><a href="">9</a></li>
                        <li><a href="">10</a></li>
                        <li><a href=""><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div> --}}

{{-- @php
    $featured = DB::table('products')
        ->where('is_featured', 1)
        ->where('status', 'active')
        ->orderBy('id', 'DESC')
        ->limit(20)
        ->get();
@endphp --}}

        {{-- <style>
            .product-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 30px;
                max-width: 1400px;
                margin: auto;
                padding: 40px 40px 40px 60px;/* 40px top, 40px right, 40px bottom, 60px left */
            }

            .product-card {
                background: #fff;
                border-radius: 8px;
                overflow: hidden;
            }

            .product-img {
                width: 100%;
                object-fit: cover;
                display: block;
                border-radius: 8px;  /* Border-radius applied to all corners */
            }

            .tall { height: 400px; }
            .short { height: 280px; }

            .product-info {
                padding: 12px 10px;
            }

            .title {
                font-weight: bold;
                font-size: 14px;
                margin-bottom: 4px;
            }

            .meta {
                font-size: 13px;
                color: #444;
                margin-bottom: 2px;
            }

            .reaction {
                display: flex;
                gap: 12px;
                padding: 8px 10px 12px;
                font-size: 13px;
                color: #666;
            }

            @media screen and (max-width: 1200px) {
                .product-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media screen and (max-width: 900px) {
                .product-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media screen and (max-width: 600px) {
                .product-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style> --}}

        {{-- <div class="product-grid">
            @foreach ($featured as $index => $product)
                @php
                    $photos = json_decode($product->photo);
                    $image  = $photos[0] ?? '/placeholder.jpg';
                    $isTall = $index % 2 === 0; // even index = tall
                @endphp

                <div class="product-card">
                    <a  href="{{ route('product-play', $product->slug) }}">
                        <img src="{{ asset($image) }}" class="product-img {{ $isTall ? 'tall' : 'short' }}" alt="{{ $product->title }}">
                    </a>
                    <div class="product-info">
                        <div class="title">{{ Str::limit($product->title, 40) }}</div>
                        <div class="meta">Code: <strong>{{ $product->code ?? 'HF' . $product->id }}</strong></div>
                        <div class="meta">Size: {{ $product->size ?? '36 x 36 in' }}</div>
                        <div class="meta">Medium: {{ $product->medium ?? 'Water Colour' }}</div>
                    </div>
                    <div class="reaction">
                        <span><i class="far fa-heart"></i> 120</span>
                        <span><i class="far fa-comment"></i> 89</span>
                    </div>
                </div>
            @endforeach
        </div> --}}




    </section>
    <!-- gallery listing sec end -->



   <!-- footer sec start -->

    <footer>

   <!-- instagram sec start -->
   {{-- <section class="instagram-sec sectionpadding">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-heading">
                       <h3 class="text-center mb-5"><i class="fab fa-instagram"></i> Instagram</h3>
                   </div>

                   <div class="instrgram-slider owl-carousel">
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                       <div class="ins-item position-relative">
                           <img src="images/image 11.png" class="img-fluid">
                           <div class="ins-overley"><i class="fab fa-instagram"></i></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <!-- instagram sec end -->

   <!-- follow sec start -->
   {{-- <section class="follow-sec sectionpadding">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-heading">
                       <h3 class="text-center mb-5">Follow Us</h3>
                   </div>
                   <div class="social-links">
                       <ul>
                           <li><a href=""><img src="images/facebook.png" class="img-fluid"></a></li>
                           <li><a href=""><img src="images/instra.png" class="img-fluid"></a></li>
                           <li><a href=""><img src="images/pin.png" class="img-fluid"></a></li>
                           <li><a href=""><img src="images/you.png" class="img-fluid"></a></li>
                           <li><a href=""><img src="images/in.png" class="img-fluid"></a></li>
                           <li><a href=""><img src="images/twi.png" class="img-fluid"></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <!-- follow sec end -->

   <!-- footer links sec start  -->
   {{-- <section class="footerlinks-sec sectionhalf">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-12">
                   <div class="section-heading">
                       <h3 class="text-center mb-5">
                           <ul class="footer-links">
                               <li><a href="" class="active">Home</a></li>
                               <li><a href="">Gallery</a></li>
                               <li><a href="">About</a></li>
                               <li><a href="">Event</a></li>
                               <li><a href="">Blog</a></li>
                               <li><a href="">Contact</a></li>
                           </ul>
                       </h3>
                   </div>
               </div>
               <div class="col-lg-5">
                   <div class="newsletter text-center">
                       <h5>Newsletter</h5>
                       <p>Receive our newsletter for art lovers and collectors</p>
                       <form>
                        <input type="text" placeholder="Your E-mail ID" name="" class="form-control">
                        <button class="sign-up">Sign Up</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <!-- footer links sec end  -->

   <!-- copyright sec start -->
   {{-- <section class="copyright-sec sectionhalf">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <ul class="copyright-list">
                       <li><a href="#">Terms Of Use</a></li>
                       <li><a href="">Privacy Policy</a></li>
                       <li>© 2024 Melody Brush. All rights reserved.</li>
                       <li>Powered by <a href="" class="creat-a">www.digibrandx.com</a></li>
                   </ul>
               </div>
           </div>
       </div>
   </section> --}}
   <!-- copyright sec end -->
   
   </footer>
   <!-- footer sec start -->

   {{-- <div class="mobile-cart-sec">
       <ul class="e-com-list">
           <li><a href="javascript:void(0)" class="search-btn"><img src="images/search.png" class="img-fluid"></a></li>
           <li><a href="cart.html"><img src="images/cart.png" class="img-fluid"></a></li>
           <li><a href="dashbord.html"><img src="images/profile.png" class="img-fluid"></a></li>
        </ul>
   </div> --}}

{{-- 
   <div class="main-search-area">
       <button class="srh-close"><img src="images/x.png" class="img-fluid"></button>
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-lg-7">
                <div class="searh-cotnent">
                   <h3>What You Search Today</h3>
                   <form class="srh-form">
                       <input type="text" placeholder="Search" name="">
                       <button class="searh-btn"><img src="images/srh-img.png" class="img-fluid"></button>
                   </form>
               </div>
               </div>
           </div>
       </div>
   </div> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/jquery.ripples.js"></script>
    <script src="js/custom.js"></script>  
    <script>
        // Fancybox Config
Fancybox.bind('[data-fancybox]', {
  //
}); 
    </script>
    <script>
        AOS.init();
      </script>

@endsection