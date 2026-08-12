@extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')
@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item  {{(($key==0)? 'active' : '')}}" >
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide " >
                    <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
@endif
{{-- @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}} 

<!-- why sec start -->
    <section class="why-sec sectionpadding">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="section-heading">
                       <h3 class="text-center mb-5">Why Melody Brush</h3>
                   </div>
                   <div class="why-body text-center">
                       <p> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                       <p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                       <a href="#" class="theme-btn"><span><i class="fas fa-angle-right"></i></span> Read More</a>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- why sec end -->
         <!-- featured sec start -->
   <section class="feature-sec sectionpadding">
       <div class="container">
           <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h3 class="text-center mb-5">Feature Collections</h3>
                </div>
            </div>
               <div class="featured-slider owl-carousel">
                 @if($featured)
                    @foreach($featured as $data)
                        <div class="featured-item">
                            <a href="#">
                                <div class="featured-img">
                                    @php
                                        $photos = json_decode($data->photo); 
                                    @endphp
                                    @if(!empty($photos) && isset($photos[0]))
                                        <img src="{{ asset($photos[0]) }}" alt="Featured Image" class="img-fluid">
                                    @endif
                                    {{-- <img src="{{$photo[0]}}" alt="{{$photo[0]}}" class="img-fluid"> --}}
                                </div>
                                <div class="featured-content">
                                    <!-- <p>{{$data->cat_info['title']}}</p> -->
                                    <h3>{{$data->title}} <br>Up to<span> {{$data->discount}}%</span></h3>
                                    <a href="{{route('product-detail',$data->slug)}}">Shop Now</a>
                                </div>
                            </a>
                            <div class="featured-attribute mt-3">
                                <button class="hearts"><i class="far fa-heart"></i>120</button>
                                <button class="comment"><i class="far fa-comment"></i>89</button>
                            </div>
                        </div>
                    @endforeach
                @endif
               </div>
           </div>
       </div>
   </section>
   <!-- featured sec end -->

   <!-- popular sec start -->
   <section class="feature-sec sectionpadding">
       <div class="container">
           <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h3 class="text-center mb-5">Popular Painting</h3>
                </div>
            </div>
               <div class="featured-slider owl-carousel">
                    @php
                        $product_listss = DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_listss as $product)
                        <div class="featured-item">
                            <a href="#">
                                <div class="featured-img">
                                    @php
                                        $photos = json_decode($product->photo); // Use $product instead of $data
                                    @endphp
                                    @if(!empty($photos) && isset($photos[0]))
                                        <img src="{{ asset($photos[0]) }}" alt="Featured Image" class="img-fluid">
                                    @endif
                                </div>
                                <div class="featured-content">
                                    <h4 class="title">
                                        <a href="#">{{ $product->title }}</a>
                                    </h4>
                                    <p class="price with-discount">${{ number_format($product->discount, 2) }}</p>
                                </div>
                            </a>
                            <div class="featured-attribute mt-3">
                                <button class="hearts"><i class="far fa-heart"></i>120</button>
                                <button class="comment"><i class="far fa-comment"></i>89</button>
                            </div>
                        </div>
                    @endforeach                                                                            
               </div>
           </div>
       </div>
   </section>
   <section class="instagram-sec sectionpadding">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-heading">
                <h3 class="text-center mb-5">
                  <i class="fab fa-instagram"></i> Instagram
                </h3>
              </div>

              <div class="instrgram-slider owl-carousel">
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
                <div class="ins-item position-relative">
                  <img src="{{asset('images/image 11.png')}}" class="img-fluid" />
                  <div class="ins-overley">
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   <!-- popular sec end -->
<!-- Start Shop Home List  -->
<!-- <section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Latest Items</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-md-4">
                            <div class="single-list">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        @php
                                            $photo=explode(',',$product->photo);
                                            // dd($photo);
                                        @endphp
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        <a href="{{route('add-to-cart',$product->slug)}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                                        <p class="price with-discount">${{number_format($product->discount,2)}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End Shop Home List  -->


   <!-- testimonial sec start -->
  <section class="testimonial-sec sectionpadding">
       <div class="container">
           <div class="row">
            <div class="col-lg-2"></div>
               <div class="col-lg-10">
                   <div class="section-heading position-relative">
                       <h3 class="mb-5">Testimonial</h3>
                   </div>
                   </div>
                   <div class="testimonial-area owl-carousel">
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>
                       </div>
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>

                       </div>
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>

                       </div>
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>
                       </div>
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>
                       </div>
                       <div class="testi-item">
                           <div class="row">
                               <div class="col-lg-2">
                                   <div class="testi-img">
                                       <img src="images/image 10.png" class="img-fluid">
                                   </div>
                               </div>
                               <div class="col-lg-9">
                               <div class="tesimonial-content">
                                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                               </div>                                   
                               </div>
                               <div class="col-lg-9">
                               </div>
                               <div class="col-lg-3">
                                 <div class="test-hed mt-4">
                                    <h6><strong>Rakesh Kumer</strong></h6>
                                    <p>Desinassion</p>
                                </div>
                               </div>
                           </div>

                       </div>                                                                                                                   
                   </div>
              </div>
       </div>
   </section>
   <!-- testimonial sec end -->

     <!-- blog sec start -->
     <section class="blog-sec sectionpadding">
       <div class="container">
           <div class="row">
            <div class="col-lg-12">
                <div class="section-heading position-relative">
                    <h3 class="text-center mb-5">Latest Blog</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
            </div>
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-6">
                        <div class="blog-list">
                                <h5 class="mb-3">{{$post->title}}</h5>
                            <span>{{$post->created_at->format('d M , Y. D')}}</span>
                            <p>{!! $post->summary!!}</p>
                            <a href="{{route('blog.detail',$post->slug)}}">
                                <img src="{{$post->photo}}" alt="{{$post->photo}}" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
               
               {{-- <div class="col-lg-6">
                   <div class="blog-list">
                       <h5 class="mb-3">Lorem Ipsum is simply </h5>
                       <span>Megha Biswas, Mumbai, Indian 20th Oct’24</span>
                       <p>of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>
                       <a href="#">
                           <img src="images/image 12.png" class="img-fluid">
                       </a>
                   </div>
               </div>                --}}
           </div>
       </div>
   </section>
   <!-- blog sec end -->
<!-- Start Shop Blog  -->
<!-- <section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="shop-single-blog">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                            <div class="content">
                                <p class="date">{{$post->created_at->format('d M , Y. D')}}</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="title">{{$post->title}}</a>
                                <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section> -->



<!-- End Shop Blog  -->
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
<!-- Start Shop Services Area -->

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

<!-- <section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- End Shop Services Area -->

<!-- @include('frontend.layouts.newsletter') -->

<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-gallery">
                                            <div class="quickview-slider-active">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{$product->title}}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{$rate_count}} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                @else
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Size</h5>
                                                        <select>
                                                            @php
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>black</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                            @csrf
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
													<input type="hidden" name="slug" value="{{$product->slug}}">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">Add to cart</button>
                                                <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
    <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script> -->
    <!-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script> -->
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            opacity: .8;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
