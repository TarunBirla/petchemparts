
<style>


</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15" style="color:black">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3" style="color:black">Welcome Admin Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <!-- <div class="sidebar-heading">
        Banner
    </div> -->

    <li class="nav-item"> 
      <a class="nav-link" href="{{route('banner.index')}}" >
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>
          <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>
        </div>
      </div> -->
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            PaintingStudio
        </div> -->

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}"  >
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
       
      </li>
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link"  href="{{route('product.index')}}" >
          <i class="fas fa-cubes"></i>
          <span>Products Management</span>
        </a>
       
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('pdf.index') }}">
        <i class="fas fa-file-pdf"></i>
        <span>PDF</span>
    </a>
</li>

    {{-- Brands --}}
     <li class="nav-item">
        <a class="nav-link" href="{{route('brand.index')}}" >
          <i class="fas fa-table"></i>
          <span>Brands</span>
        </a>
       
    </li> 
    
    <li class="nav-item">
    <a class="nav-link" href="{{ route('manufacturer.index') }}">
        <i class="fas fa-industry"></i>
        <span>Manufacturers</span>
    </a>
</li>


    {{-- Shipping --}}
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">-->
    <!--      <i class="fas fa-truck"></i>-->
    <!--      <span>Shipping</span>-->
    <!--    </a>-->
    <!--    <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
    <!--      <div class="bg-white py-2 collapse-inner rounded">-->
    <!--        <h6 class="collapse-header">Shipping Options:</h6>-->
    <!--        <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>-->
    <!--        <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--</li>-->

    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Transaction History</span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>My Payment Details</span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span> Logistics Details</span>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span> Shipping Tracking</span>
        </a>
    </li> -->
   
   
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#termsCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Terms And Condition</span>
        </a>
        <div id="termsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Terms and Condition Options:</h6>
            <a class="collapse-item" href="{{route('terms.index')}}">Terms And Condition</a>
            <a class="collapse-item" href="{{route('terms.create')}}">Add Terms And Condition</a>
          </div>
        </div>
    </li> -->
    
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#aboutCollapse" aria-expanded="true" aria-controls="aboutCollapse">
          <i class="fas fa-sitemap"></i>
          <span>About US</span>
        </a>
        <div id="aboutCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">About US Options:</h6>
            <a class="collapse-item" href="{{route('about.index')}}">About US</a>
            <a class="collapse-item" href="{{route('about.create')}}">Add About US</a>
          </div>
        </div>
    </li> -->
    <!-- Reviews -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('review.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li> -->
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Posts
    </div> -->

    <!-- Posts -->
    <li class="nav-item">
      <a class="nav-link " href="{{route('post.index')}}" >
        <i class="fas fa-fw fa-folder"></i>
        <span>Blogs</span>
      </a>
     
    </li>

     <!-- Category -->
     <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
          <i class="fas fa-sitemap fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>
            <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>
          </div>
        </div>
      </li> -->

      <!-- Tags -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
            <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>
            </div>
        </div>
    </li> -->

      <!-- Comments -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="fas fa-table"></i>
          <span> Gift Coupon</span></a>
    </li> -->
     <!-- Users -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
     <!-- General settings -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-danger"
       href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>

    <form id="sidebar-logout-form"
          action="{{ route('logout') }}"
          method="POST"
          style="display:none;">
        @csrf
    </form>
</li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>