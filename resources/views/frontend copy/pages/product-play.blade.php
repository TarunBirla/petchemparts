{{-- @extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')

<style>
    .sc-button-group .sc-button-download .soundHeader{ 
        display:none !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM8z4+2e5c7e5a5b5e5a5b5e5a5b5e5a5b5e5" crossorigin="anonymous" />
    <script src="https://w.soundcloud.com/player/api.js"></script>
    <section class="subbanner-sec sectionpadding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                      </ol>
                    </nav>
                    <div class="section-heading">
                        <h3>Painting Title Painting Title </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subbanner sec end -->

   

   <!-- product play sec start -->
   <section class="product-play padding-top">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                    <div style="position: relative; width: 100%; height: 100vh; overflow: hidden;">
                        @php
                            $photos = json_decode($product_play->photo);
                        @endphp
                        <a  href="{{ route('product-detail', $product_play->slug) }}">
                            <img src="{{asset($photos[0]) }}" id="coverImage"
                            alt="Play Song"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; cursor: pointer; z-index: 2;">
                        <a>
                            <iframe
                            id="sc-player"
                            width="100%"
                            height="80"
                            scrolling="no"
                            frameborder="no"
                            allow="autoplay"
                            src="{{$product_play->url}}"
                            style="z-index: 1; position: relative;">
                        </iframe>
                    </div>
                   <div style="margin-top: 10px;">
                        <button id="playBtn" style="padding: 8px 16px; margin-right: 5px; color: black; border: none;">
                            <img id="playIcon" src="{{ asset('images/Prplay.png') }}" alt="" style="width: 20px; vertical-align: middle;"> Play
                        </button>

                        <button id="pauseBtn" style="padding: 8px 16px; margin-right: 5px; color: black; border: none;">
                            <img id="pauseIcon" src="{{ asset('images/play.png') }}" alt="" style="width: 20px; vertical-align: middle;"> Pause
                        </button>
                    </div>
               </div>


              

               <div class="lyrics-area mt-5">
                   <div class="row">
                       <div class="col-6 col-lg-10">
                           <h3>Lyrics</h3>
                       </div>
                       <div class="col-6 col-lg-2">
                           <select class="form-select">
                               <option selected>English</option>
                               <option selected>Bengali</option>
                               <option>Hindi</option>
                           </select>
                       </div>
                       <div class="col-lg-12 mt-3">
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                           cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                           proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                       </div>
                   </div>
               </div>

               <div class="product-play-share mt-5">
                   <div class="social-links">
                       <ul>
                           <li><button><img src="{{asset('images/chat.png')}}" class="img-fluid"><span> 120</span></button></li>
                           <li><button><img src="{{asset('images/heart.png')}}" class="img-fluid"> <span> 89</span></button></li>
                           <li><a href=""><img src="{{asset('images/facebook.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/instra.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/pin.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/you.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/in.png')}}" class="img-fluid"></a></li>
                           <li><a href=""><img src="{{asset('images/twi.png')}}" class="img-fluid"></a></li>
                       </ul>
                   </div>
               </div>
               <div class="about-product mt-5">
                   <h3 class="mb-3">About The Paintings</h3>
                   <p>{!! $product_play->summary !!}</p>
               </div>

               <div class="related-product mt-5">
                <h3 class="mb-3">Related Product</h3>
                <div class="featured-slider owl-carousel">
                <div class="featured-item">
                    <a href="#">
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
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
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
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
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
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
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
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
                        <div class="featured-img"><img src="{{asset('images/image 12.png')}}" class="img-fluid"></div>
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
               </div>
           </div>
       </div>
   </section>
   <!-- product play sec end -->








  @endsection
  
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const iframeElement = document.getElementById('sc-player');
        const widget = SC.Widget(iframeElement);

        document.getElementById('playBtn').addEventListener('click', function () {
            widget.play();
        });

        document.getElementById('pauseBtn').addEventListener('click', function () {
            widget.pause();
        });

        document.getElementById('stopBtn').addEventListener('click', function () {
            widget.seekTo(0); 
            widget.pause();   
        });
        playBtn.addEventListener('click', function () {
            widget.play();
            pauseIcon.src = "{{ asset('images/Vector.png') }}"; 
        });

        pauseBtn.addEventListener('click', function () {
            widget.pause();
            pauseIcon.src = "{{ asset('images/Prplay.png') }}"; 
        });
    });
</script> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Designer Handmade Polki Necklace Set</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 90rem;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            font-size: 40px;
            font-weight: 600;
            margin-bottom: 30px;
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
            border: 1px solid #eee;
            border-radius: 8px;
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
</head>
<body>

<div class="container">
    <div class="header">
        Designer Handmade Polki Necklace Set
    </div>

    <div class="toolbar">
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

    <div class="dot-layout" data-columns="4">
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

    <div class="dot-layout" data-columns="6">
        <div class="dot-lines">
            <div class="dot-row">
                <div class="dot"></div>
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
                <div class="dot"></div>
            </div>
        </div>
    </div>

    <div class="dot-layout" data-columns="8">
        <div class="dot-lines">
            <div class="dot-row">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
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
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>

    <div class="dot-layout active" data-columns="10">
        <div class="dot-lines">
            <div class="dot-row">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
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

    <div class="grid" id="productGrid" style="grid-template-columns: repeat(10, 1fr);">
                @php
                $product_listss = DB::table('products')->where('status', 'active')->orderBy('id', 'DESC')->limit(6)->get();
                @endphp
                 @foreach($product_listss as $product)
        {{-- @for ($i = 0; $i < 8; $i++) --}}
               @php
                        $photos = json_decode($product->photo);
               @endphp
            <div class="product-card">
                 @if(!empty($photos) && isset($photos[0]))
                <img src="{{ asset($photos[0]) }}" alt="Product">
                @endif
                <div class="product-title">{{ $product->title }}</div>
                <div class="product-price">Rs. 3,500.00</div>
            </div>
        @endforeach
    </div>
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

</body>
</html>
