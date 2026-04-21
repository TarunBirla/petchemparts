@extends('frontend.layouts.master')

@section('title','Petchemparts || Terms & Conditions')

@section('main-content')
<script src="https://cdn.tailwindcss.com"></script>
    <style>
    
    .icon-hover {
    padding: 8px;
    border-radius: 50%;
    transition: background 0.2s;
}

.icon-hover:hover {
    background: #f1f5f9;
}

.badge {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #2563eb;
    color: #fff;
    font-size: 11px;
    min-width: 18px;
    height: 18px;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    justify-content: center;
}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
           font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

       .hero-section {
           
            position: relative;
            height: 40vh;
            min-height: 500px;
            overflow: hidden;
        }


        /* Banner Slider */
        .banner-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }

        .slide.active {
            opacity: 1;
            z-index: 1;
        }

        .slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:transparent;
            z-index: 1;
        }

        /* Page Turn Effect */
        .slide.page-turn-out {
            animation: pageTurnOut 1.2s ease-in-out forwards;
            transform-origin: left center;
        }

        .slide.page-turn-in {
            animation: pageTurnIn 1.2s ease-in-out forwards;
            transform-origin: left center;
        }

        @keyframes pageTurnOut {
            0% {
                transform: perspective(2000px) rotateY(0deg);
                opacity: 1;
            }
            50% {
                transform: perspective(2000px) rotateY(-90deg);
                opacity: 0.5;
            }
            100% {
                transform: perspective(2000px) rotateY(-180deg);
                opacity: 0;
            }
        }

        @keyframes pageTurnIn {
            0% {
                transform: perspective(2000px) rotateY(180deg);
                opacity: 0;
            }
            50% {
                transform: perspective(2000px) rotateY(90deg);
                opacity: 0.5;
            }
            100% {
                transform: perspective(2000px) rotateY(0deg);
                opacity: 1;
            }
        }

        /* Content Overlay */
        .content-overlay {
            position: relative;
            z-index: 10;
          
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
        }

        .hero-title {
            font-size: clamp(2.5rem, 2.5rem, 2.5rem);
            font-weight: bold;
            color: white;
            text-align: center;
            margin-bottom: 10px;
            animation: fadeInUp 1s ease-out;
            text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
            margin-top:130px;
        }

        .hero-subtitle {
            font-size: clamp(1.5rem, 1.5rem, 1.5rem);
            color: white;
            text-align: center;
            margin-bottom: 12px;
            animation: fadeInUp 1s ease-out 0.2s backwards;
            text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
        }

        /* Search Bar */
        .search-container {
            max-width: 900px;
            width: 100%;
            animation: fadeInUp 1s ease-out 0.4s backwards;
        }

        .search-wrapper {
            background: white;
            border-radius: 20px;
            padding: 1rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .search-box {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .search-input {
            flex: 1;
            padding: 1.2rem 1.5rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .search-btn {
            background: linear-gradient(135deg, #3b82f6, #9333ea);
            color: white;
            padding: 1.2rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
            max-width: 900px;
            width: 100%;
            margin-top: 4.5rem;
            animation: fadeInUp 1s ease-out 0.6s backwards;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1rem 1rem;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.95;
        }

        /* Navigation Dots */
        .slider-nav {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.8rem;
            z-index: 20;
        }

        .nav-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.6);
        }

        .nav-dot.active {
            background: white;
            transform: scale(1.3);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating particles */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            50% {
                transform: translateY(-30px) translateX(20px);
            }
        }

        @media (min-width: 768px) {
            .search-box {
                flex-direction: row;
            }

            .search-btn {
                width: auto;
            }
        }


                /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Smooth dropdown animation */
        .mega-enter {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.35s ease;
        }

        .group:hover .mega-enter {
            opacity: 1;
            transform: translateY(0);
        }

        /* Menu underline animation */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: #2563eb;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Icon hover */
        .icon-hover {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .icon-hover:hover {
            transform: scale(1.15);
            color: #2563eb;
        }

        /* Search glow */
        .search-input:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
        }

    </style>



<script>
function toggleUserDropdown() {
    document.getElementById('userDropdown').classList.toggle('hidden');
}

document.addEventListener('click', function (e) {
    const dropdown = document.getElementById('userDropdown');
    if (!e.target.closest('.relative')) {
        dropdown?.classList.add('hidden');
    }
});
</script>



   @if(count($banners) > 0)
<section class="hero-section ">

    <!-- Banner Slider -->
    <div class="banner-slider">
        @foreach($banners as $key => $banner)
            <div
                class="slide {{ $key == 0 ? 'active' : '' }}"
                style="background-image: url('{{ $banner->photo }}')"
            >
                <div class="content-overlay">
                    <h1 class="hero-title">
                        {{ $banner->title }}
                    </h1>

                    @if($banner->description)
                        <h6 class="hero-subtitle">
                            {!! html_entity_decode($banner->description) !!}
                        </h6>
                    @endif

                    <!-- Quick Stats (static – optional) -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number">10k+</div>
                            <div class="stat-label">Products</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Brands</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Support</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Genuine</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Floating Particles -->
    <div class="particle" style="width:8px;height:8px;left:10%;top:20%;animation-delay:0s;"></div>
    <div class="particle" style="width:6px;height:6px;left:80%;top:30%;animation-delay:2s;"></div>
    <div class="particle" style="width:10px;height:10px;left:20%;top:70%;animation-delay:4s;"></div>
    <div class="particle" style="width:7px;height:7px;left:90%;top:60%;animation-delay:1s;"></div>
    <div class="particle" style="width:9px;height:9px;left:50%;top:15%;animation-delay:3s;"></div>

    <!-- Slider Navigation Dots -->
    <div class="slider-nav">
        @foreach($banners as $key => $banner)
            <div
                class="nav-dot {{ $key == 0 ? 'active' : '' }}"
                data-slide="{{ $key }}"
            ></div>
        @endforeach
    </div>

</section>
@endif

<script>
// document.addEventListener("DOMContentLoaded", function () {

//     const slides = document.querySelectorAll('.slide');
//     const navDots = document.querySelectorAll('.nav-dot');
//     let currentSlide = 0;
//     let isTransitioning = false;

//     function showSlide(index) {
//         if (isTransitioning || index === currentSlide) return;
//         isTransitioning = true;

//         const current = slides[currentSlide];
//         const next = slides[index];

//         current.classList.add('page-turn-out');
//         current.classList.remove('active');

//         setTimeout(() => {
//             next.classList.add('page-turn-in', 'active');

//             setTimeout(() => {
//                 current.classList.remove('page-turn-out');
//                 next.classList.remove('page-turn-in');
//                 currentSlide = index;
//                 isTransitioning = false;
//             }, 1200);
//         }, 100);

//         navDots.forEach((dot, i) => {
//             dot.classList.toggle('active', i === index);
//         });
//     }

//     // Auto slide
//     let autoSlide = setInterval(() => {
//         let nextIndex = (currentSlide + 1) % slides.length;
//         showSlide(nextIndex);
//     }, 5000);

//     // Dot click
//     navDots.forEach((dot, index) => {
//         dot.addEventListener('click', () => {
//             clearInterval(autoSlide);
//             showSlide(index);
//             autoSlide = setInterval(() => {
//                 let nextIndex = (currentSlide + 1) % slides.length;
//                 showSlide(nextIndex);
//             }, 5000);
//         });
//     });

// });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".nav-dot");
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
      dots[i].classList.toggle("active", i === index);
    });
    current = index;
  }

  // Auto slide
  let interval = setInterval(() => {
    showSlide((current + 1) % slides.length);
  }, 4000);

  // Dot click
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      clearInterval(interval);
      showSlide(index);
      interval = setInterval(() => {
        showSlide((current + 1) % slides.length);
      }, 4000);
    });
  });
});
</script>


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

<div class="container max-w-7xl mx-auto py-3 px-5">

<h2 class="text-3xl font-bold text-center mb-4  text-gray-800">
                Select by Part number or Manufacturer
            </h2>

    <form method="GET" action="{{ route('shop') }}">
        <div class="row">

            {{-- Manufacturer --}}
            <div class="col-md-3 mb-3">
                <select name="manufacturer_id" class="form-control">
                    <option value="">-- Select Manufacturer --</option>
                    @foreach($manufacturers as $m)
                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                    @endforeach
                </select>
            </div>

                       {{-- Category --}}
            <div class="col-md-3 mb-3">
                <select name="category_id" id="category" class="form-control">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Sub Category --}}
            <div class="col-md-3 mb-3">
                <select name="subcategory_id" id="subcategory" class="form-control">
                    <option value="">-- Select Sub Category --</option>
                </select>
            </div>


            <div class="col-md-3">
                <button class="btn btn-primary w-100 inline-flex items-center justify-center px-8 py-2
             font-semibold rounded-full
              bg-[#13A1F3] text-white
              hover:bg-blue-700 transition shadow-lg">
                    Search Products
                </button>
            </div>
        


        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const category = document.getElementById('category');
    const subcategory = document.getElementById('subcategory');

    category.addEventListener('change', function () {
        const categoryId = this.value;

        subcategory.innerHTML = '<option value="">Loading...</option>';

        if (!categoryId) {
            subcategory.innerHTML = '<option value="">-- Select Sub Category --</option>';
            return;
        }

        fetch(`/get-subcategories/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                subcategory.innerHTML = '<option value="">-- Select Sub Category --</option>';

                if (data.length === 0) {
                    subcategory.innerHTML += '<option value="">No Subcategories</option>';
                }

                data.forEach(sub => {
                    subcategory.innerHTML += `
                        <option value="${sub.id}">
                            ${sub.title}
                        </option>
                    `;
                });
            })
            .catch(error => {
                console.error(error);
                subcategory.innerHTML = '<option value="">Error loading</option>';
            });
    });

});
</script>


    <!-- Top Brands Carousel -->
    <section class="py-4 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">
                Trusted By Top Brands
            </h2>

            <!-- Carousel Wrapper -->
            <div class="relative w-full overflow-hidden">
    <!-- Track -->
    <div
        id="brandTrack"
        class="flex gap-8 items-center transition-transform duration-700 ease-in-out"
    >
        @php
            $brands = DB::table('brands')->where('status', 'active')->orderBy('title', 'asc')->get();
        @endphp

        @foreach($brands as $brand)
            <div class="min-w-[200px] h-24 flex items-center justify-center bg-[#F9FAFB] rounded-xl shadow hover:shadow-md transition">
                <span>{{ $brand->title }}</span>
            </div>
        @endforeach
    </div>
</div>

        </div>
    </section>
    <script>
        const track = document.getElementById("brandTrack");
        let index = 0;
        const itemWidth = 232; // 200px + gap
        const totalItems = track.children.length;

        setInterval(() => {
            index++;

            track.style.transform = `translateX(-${index * itemWidth}px)`;

            // Reset smoothly for infinite effect
            if (index >= totalItems - 6) {
                setTimeout(() => {
                    track.style.transition = "none";
                    track.style.transform = "translateX(0)";
                    index = 0;
                    setTimeout(() => {
                        track.style.transition =
                            "transform 700ms ease-in-out";
                    }, 50);
                }, 700);
            }
        }, 2500);
    </script>


    <!-- Popular Categories -->
    @php
$categories = DB::table('categories')
    ->where('status', 'active')
    ->whereNull('parent_id')   // only MAIN categories
     ->limit(4)
    ->get();

$subcategories = DB::table('categories')
    ->where('status', 'active')
    ->whereNotNull('parent_id')
    ->get()
    ->groupBy('parent_id');   // group by main category
@endphp

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">
            Popular Categories
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach($categories as $category)
                <div class="category-card bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">

                    <!-- Icon Area -->
                   <div class="h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                        <!--@if(!empty($category->photo))-->
                        <!--    <img-->
                        <!--        src="{{ asset($category->photo) }}"-->
                        <!--        alt="{{ $category->title }}"-->
                        <!--        class="w-full h-full object-cover"-->
                        <!--    >-->
                        <!--@else-->
                            <!-- fallback image -->
                        <!--    <img-->
                        <!--        src="{{ asset('images/category-placeholder.png') }}"-->
                        <!--        alt="No Image"-->
                        <!--        class="w-24 h-24 opacity-60"-->
                        <!--    >-->
                        <!--@endif-->
                    </div>


                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800 uppercase">
                            <a href="{{ route('product-cat', $category->slug) }}">
                                
                            {{ $category->title }}
                            </a>
                        </h3>

                        <!-- Subcategories -->
                        <ul class="space-y-2 text-gray-600 mb-6">
                            @if(isset($subcategories[$category->id]))
                                @foreach($subcategories[$category->id]->take(4) as $sub)
<li>
        <a href="{{ route('product-sub-cat', [
        'slug' => $category->slug,
        'sub_slug' => $sub->slug
    ]) }}"

       class="hover:text-[#13A1F3] transition">
        {{ $sub->title }}
    </a>
</li>

                                @endforeach
                            @else
                                <li class="text-gray-400 text-sm">
                                    No subcategories
                                </li>
                            @endif
                        </ul>


                        


                    </div>
                </div>
            @endforeach

        </div>
        
<div class="flex justify-center mt-6">
    <a href="/frontend/showcategory"
       class="inline-flex items-center justify-center px-8 py-2
              text-lg font-semibold rounded-full
              bg-[#13A1F3] text-white
              hover:bg-blue-700 transition shadow-lg">
        Show All →
    </a>
</div>

    </div>
</section>



    <!-- Popular Products -->
    <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Heading -->
        <h2 class="text-4xl font-bold text-center mb-16 text-gray-800">
            Popular Products
        </h2>

       
        @php
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
     ->limit(4)
    ->get();
@endphp


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
    <!--<img -->
    <!--    src="{{ asset($image) }}"-->
    <!--    alt="{{ $product->title }}"-->
    <!--    class="w-full h-full object-cover transition duration-300 hover:scale-105"-->
    <!-->

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
        <div class="flex justify-center mt-6">
    <a href="/frontend/showproduct"
       class="inline-flex items-center justify-center px-8 py-2
              text-lg font-semibold rounded-full
              bg-[#13A1F3] text-white
              hover:bg-blue-700 transition shadow-lg">
        Show All →
    </a>
</div>
    </div>
</section>


    <!-- Trust Badges -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-[#13A1F3] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">100% Genuine</h3>
                    <p class="text-gray-400">Authentic Products</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-[#13A1F3] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">20 Years</h3>
                    <p class="text-gray-400">Industry Experience</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-[#13A1F3] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">100% Verified</h3>
                    <p class="text-gray-400">Quality Assured</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-[#13A1F3] rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Secure Payment</h3>
                    <p class="text-gray-400">Safe Transactions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    
                <div class="border-t border-gray-700 pt-8 max-w-7xl mx-auto">
                <div class=" rounded-lg p-6 mb-6">
                    <h5 class="text-black font-bold mb-3">Legal Disclaimer</h5>
                    <p class="text-sm text-black leading-relaxed">
                        Petchemparts is not an authorized dealer, agent or affiliate of any of the designer, brands, or manufacturer; the products of which are offered for sale on www.petchemparts.com. All trademarks, brand names, and logos mentioned are used for identification purposes only and are registered trademarks of their respective owners who reserve the rights of ownership. The use of trademark, brand name or product on our website is not intended to suggest that the company, trademark or brand is affiliated to or endorses our website. All products are 100% genuine and legally purchased from authorized sources.
                    </p>
                </div>
                
                <!-- Payment Methods -->
                <div class="flex flex-wrap items-center justify-center gap-4 mb-6">
                    <div class="bg-white rounded px-3 py-2">
                        <span class="text-gray-800 font-semibold text-sm">VISA</span>
                    </div>
                    <div class="bg-white rounded px-3 py-2">
                        <span class="text-gray-800 font-semibold text-sm">MasterCard</span>
                    </div>
                    <div class="bg-white rounded px-3 py-2">
                        <span class="text-gray-800 font-semibold text-sm">PayPal</span>
                    </div>
                    <div class="bg-white rounded px-3 py-2">
                        <span class="text-gray-800 font-semibold text-sm">Amex</span>
                    </div>
                </div>
                
                
            </div>
            
            
  

    <script>
        // Back to top button functionality
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });
        
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Mobile menu toggle (if needed)
        // Add your mobile menu logic here
    </script>
    
    @endsection