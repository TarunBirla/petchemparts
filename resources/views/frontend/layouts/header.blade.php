<script src="https://cdn.tailwindcss.com"></script>
   
    <style>
        body{
           font-family: "Poppins", sans-serif;
            
        }
     
:root {
    --theme: #13A1F3;
}

.img-profile {
    width: 36px;
    height: 36px;
    object-fit: cover;
    border-radius: 9999px;
    border: 2px solid var(--theme);
  }
   .cart-icon {
  font-size: 22px;
  color: var(--theme);
  position: relative;
  cursor: pointer;
}

.cart-icon .badge {
  position: absolute;
  top: -6px;
  right: -8px;
  background: var(--theme);
  color: #fff;
  border-radius: 50%;
  width: 18px;
  height: 18px;
  font-size: 11px;
  display: flex;
  align-items: center;
  justify-content: center;
}

    </style>
       <!-- Modern Navigation -->
   <header class="fixed top-0 left-0 w-full glass shadow-md z-50  bg-white">
<!--       <div class="w-full ">-->
<!--  <div class="max-w-7xl mx-auto px-10 py-1 flex items-center justify-between text-sm text-gray-700">-->
<!--    <div>0044-7891363776 </div>-->
<!--    <div>7 Days a week from 9:00 am to 7:00 pm</div>-->
<!--  </div>-->
<!--</div>-->

    <!-- TOP BAR -->
    <div class="max-w-7xl mx-auto px-6 py-2  bg-white flex items-center justify-between">
     

        <!-- LOGO -->
        <div class="text-2xl font-bold bg-gradient-to-r from-[#13A1F3] to-purple-600 bg-clip-text text-transparent">
             <a href="/">
            <img src="/brands/logo.png" class="h-[50px]"/>
            </a>
        </div>
    
         <div class="flex items-center gap-4 ml-auto">
                 <nav class="hidden md:flex items-center gap-8">
                        <a 
                href="{{ url('/') }}"
                   class="text-gray-700 text-sm font-medium hover:text-[#13A1F3] transition">
                    Home
                </a>
        
                <a 
                href="{{ url('/frontend/aboutus') }}"
                   class="text-gray-700 text-sm font-medium hover:text-[#13A1F3] transition">
                    About Us
                </a>
        
                <a href="{{ url('/frontend/termcondition') }}"
                   class="text-gray-700 text-sm font-medium hover:text-[#13A1F3] transition">
                    Terms & Conditions
                </a>
        
                <a href="{{ url('/frontend/contact') }}"
                   class="text-gray-700 text-sm font-medium hover:text-[#13A1F3] transition">
                    Contact Us
                </a>
            </nav>
            
            <div class="cart-icon">
            <a href="{{ url('/checkout') }}" class="text-lg" style="text-decoration: none; color: var(--primary-color); font-weight: bold;">
                Request
                <span class="badge">{{ Helper::cartCount() }}</span>
            </a>
        </div>
            
            {{-- USER --}}
            @if(auth()->check())
                <div class="relative">
                    <button onclick="toggleUserDropdown()"
                        class="flex items-center gap-2 bg-transparent border-0 p-0 focus:outline-none">
        
                        <!-- User Icon -->
                        <img class="img-profile"
                             src="{{ auth()->user()->photo ?? asset('backend/img/avatar.png') }}">
        
                        <!-- User Name -->
                        <span class="text-sm font-medium text-gray-700 hidden md:inline">
                            {{ auth()->user()->name }}
                        </span>
                    </button>
        
                    <!-- Dropdown -->
                    <div id="userDropdown"
                         class="hidden absolute right-0 mt-3 w-44 bg-white shadow-lg rounded-md z-50">
                        <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            {{ auth()->user()->name }}
                        </a>
                        <a href="{{ url('/user/order') }}"
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Dashboard
                        </a>
                        <a href="{{ route('user.logout') }}"
                           class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                            Logout
                        </a>
                    </div>
                </div>
            @else
                <a href="/user/login" class="flex items-center text-gray-700 text-sm font-medium hover:text-[#13A1F3] transition">

                    Login
                </a>
            @endif
        
            <!-- CART -->
        
        
        
        </div>

</div>


                <!-- MENU BAR -->
                @php
            $categories = DB::table('categories')
                ->where('status', 'active')
                ->whereNull('parent_id')
                ->limit(6)
                ->get();
            
            $subcategories = DB::table('categories')
                ->where('status', 'active')
                ->whereNotNull('parent_id')
                ->get()
                ->groupBy('parent_id');
            @endphp

    
       
            <nav class=" bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <ul
            class="flex justify-center flex-nowrap  gap-5  text-gray-700 text-sm font-medium   uppercase tracking-wide  overflow-x-auto lg:overflow-x-visible whitespace-nowrap scrollbar-hide">
            
            @foreach($categories as $category)
                <li class="relative group shrink-0">
                    <!-- Main Category Link -->
                    <a href="{{ route('product-cat', $category->slug) }}"
                       class="text-gray-800 text-sm font-medium hover:text-blue-800">
                        {{ $category->title }}
                    </a>

                    
                    <!-- Mega Menu -->
<div class="absolute left-0 top-full hidden group-hover:block z-50 ">
  <div class="bg-white text-sm shadow-xl rounded-xl w-max min-w-[220px] border">
    <div class="py-2 max-h-[300px] overflow-y-auto">

      @if(isset($subcategories[$category->id]))
        @foreach($subcategories[$category->id] as $sub)

          <!-- ITEM -->
          <a href="{{ route('product-sub-cat', [
                'slug' => $category->slug,
                'sub_slug' => $sub->slug
            ]) }}"
            class="flex items-center gap-3 px-2 py-1
                   text-gray-700 text-[12px]
                   hover:bg-blue-50 hover:text-blue-600
                   transition rounded-lg mx-2">

            <!-- TEXT -->
            <span class="font-medium text-left whitespace-nowrap">
              {{ $sub->title }}
            </span>

          </a>

        @endforeach
      @else
        <div class="px-4 py-3 text-gray-400 text-left">
          No sub categories
        </div>
      @endif

    </div>
  </div>
</div>


                </li>
            @endforeach
        </ul>
    </div>
</nav>



</header>