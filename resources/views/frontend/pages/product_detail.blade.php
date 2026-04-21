
@extends('frontend.layouts.master')
@section('title','E-Paninting || HOME PAGE')
@section('main-content')
<style>
.owl-carousel{
    display: flex;
	
}
	</style>
        <!-- subbanner sec start -->
    {{-- <section class="subbanner-sec sectionpadding">
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
                        <h3>Product Detail</h3>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- subbanner sec end -->
   
   <!-- product-details sec start -->
   @php
        $photos = json_decode($product_detail->photo);
        
    @endphp
    
    @php
    $org = ($product_detail->price - ($product_detail->price * $product_detail->discount) / 100);
@endphp

<div class="container mx-auto px-4 mt-40 mb-10" style="'margin-top:20px;">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            {{ $product_detail->title }}
        </h1>

        <!-- Price -->
        <p class="text-2xl font-semibold text-blue-600 mb-6">
            £{{ number_format($org, 2) }}
        </p>

        <!-- Quantity -->
        <div class="flex items-center gap-3 mb-6">
            <button onclick="decreaseQuantity()" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
            
            <input type="number" id="quantity" value="1" min="1"
                class="w-20 text-center border border-gray-300 rounded">

            <button onclick="increaseQuantity()" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
        </div>

        <!-- Button -->
        <a id="addToCartBtn"
           href="{{ route('add-to-cart', $product_detail->slug) }}"
           class="block text-center bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition">
            Request for Quote – £{{ number_format($org, 2) }}
        </a>

        <!-- Info Section -->
        <div class="space-y-4 mt-8">

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-700">
                    🚚 Delivery: 12–26 days (International), 3–6 days (US)
                </p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-700">
                    🔄 Return within 30 days (taxes not refundable)
                </p>
            </div>

        </div>

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

// initial load
updateCartLink();
</script>


<!--   <div class="container mx-auto px-4 mt-40 mb-8">-->
<!--     <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">-->
        <!-- Left: Image -->
<!--        <div class="flex justify-center items-start">-->
<!--            <h1 class="w-full max-w-md rounded-xl shadow-lg">{{ $product_detail->title }}</h1>-->
<!--        </div>-->

        <!-- Right: Product Details -->
<!--        <div class="space-y-6">-->
<!--            <h1 class="text-3xl font-bold text-gray-800">{{$product_detail->title}}</h1>-->
            
<!--             @php-->
<!--                $org=($product_detail->price-($product_detail->price*$product_detail->discount)/100);-->
<!--            @endphp-->
<!--            <p class="text-2xl font-semibold text-blue-600">£{{number_format($org,2)}}  </p>-->

            
<!--            <div class="flex items-center gap-2">-->
<!--                <button onclick="decreaseQuantity()" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">-</button>-->
<!--                <input type="number" id="quantity" value="1" min="1" class="w-16 text-center border border-gray-300 rounded">-->
<!--                <button onclick="increaseQuantity()" class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300 transition">+</button>-->
<!--            </div>-->


<!--<div class="buttons">-->
<!--    <a class="block text-center bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition" href="{{ route('add-to-cart', $product_detail->slug) }}">-->
<!--        Request for Quote – £{{ number_format($org, 2) }}-->
<!--    </a>-->
<!--</div>-->

<!--<div class="space-y-4 mt-6">-->
                <!-- Delivery Info -->
<!--                <div class="flex items-start gap-4 bg-gray-50 p-4 rounded-lg shadow-sm">-->
<!--                    <div class="flex-shrink-0">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" viewBox="0 0 31 30"><path d="M30 27.6692C29.6992 27.3684 ..."/></svg>-->
<!--                    </div>-->
<!--                    <p class="text-gray-700 text-sm">-->
<!--                        Estimate delivery times: 12-26 days (International), 3-6 days (United States).-->
<!--                    </p>-->
<!--                </div>-->

                <!-- Return Info -->
<!--                <div class="flex items-start gap-4 bg-gray-50 p-4 rounded-lg shadow-sm">-->
<!--                    <div class="flex-shrink-0">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" viewBox="0 0 31 30"><path d="M15.5684 15.1812L9.56316 ..."/></svg>-->
<!--                    </div>-->
<!--                    <p class="text-gray-700 text-sm">-->
<!--                        Return within 30 days of purchase. Duties & taxes are non-refundable.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->





<!--<script>-->
<!--function decreaseQuantity() {-->
<!--    var qty = document.getElementById('quantity');-->
<!--    if (qty.value > 1) qty.value--;-->
<!--}-->
<!--function increaseQuantity() {-->
<!--    var qty = document.getElementById('quantity');-->
<!--    qty.value++;-->
<!--}-->
<!--</script>-->
   <!-- product-details sec end -->

   {{-- <!-- product description sec start -->
   <section class="produt-description padding-bottom">
       <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pad-tab">
                  <button class="tablinks active" onclick="openCity(event, 'London')">Shipping</button>
                  <button class="tablinks" onclick="openCity(event, 'Paris')">Warrantee</button>
                  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Payment</button>
                  <button class="tablinks" onclick="openCity(event, 'Tokyo1')">Return</button>
                </div>
                <div id="London" class="tabcontent" style="display: block;">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>

                <div id="Paris" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p> 
                </div>

                <div id="Tokyo" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>
                <div id="Tokyo1" class="tabcontent">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the </p>
                </div>
            </div>
        </div>
       </div>
   </section>
   <!-- product description sec end -->

   <!-- printing sec start -->
   <section class="printing-sec">
       <div class="container">
           <div class="row">
            <div class="col-lg-6 text-center fst-pt">
                <div class="print-area">
                    <h3 class="mb-4">Print on Paper</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                <a href="#" class="theme-btn1"><span><i class="fas fa-angle-right"></i></span> Read More</a>
                </div>
            </div>
            <div class="col-lg-6 text-center snd-pt">
                <div class="print-area">
                    <h3 class="mb-4">Print on Canvas</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                <a href="#" class="theme-btn1"><span><i class="fas fa-angle-right"></i></span> Read More</a>
                </div>
            </div>
           </div>
       </div>
   </section>
   <!-- printing sec end -->


   <!-- related sec start -->
   <section class="pd-related-sec sectionpadding">
       <div class="container">
           <div class="row">
                <div class="col-lg-12">
                    <div class="related-product">
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
                    </div>
                </div>
               </div>
           </div>
       </div>
   </section>
   <!-- related sec end -->
   
  <!-- sequere sec start  -->
  <section class="sequere-sec">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <ul class="sequre-list">
                      <li class="text-center">
                            <div class="sq-icon">
                                <img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid">
                            </div>
                            <div class="sq-content">
                                <h4>SECURE PAYMENT</h4>
                                <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                            </div>
                      </li>
                      <li class="text-center">
                          <div class="sq-icon"><img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid"></div>
                          <div class="sq-content">
                              <h4>SAFE PACKAGING</h4>
                              <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                          </div>
                      </li>
                      <li class="text-center">
                            <div class="sq-icon">
                                <img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid">
                            </div>
                            <div class="sq-content">
                                <h4>FREE SHIPPING</h4>
                                <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                            </div>
                      </li>
                      <li class="text-center">
                            <div class="sq-icon">
                                <img src="{{asset('images/MoneyWavy.png')}}" class="img-fluid">
                            </div>
                            <div class="sq-content">
                                <h4>SECURE PAYMENT</h4>
                                <p>Above $ 600 value will be free. Artwork is shipped Worldwide using DHL, FedEx, DTDC and Bluedart.</p>
                            </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </section>
  <!-- sequere sec end  --> --}}

@endsection