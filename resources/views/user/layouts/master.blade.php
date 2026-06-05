<!DOCTYPE html>
<html lang="en">
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
 
<!-- SB Admin base (kept for JS compatibility) -->
<link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

@include('user.layouts.head')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('user.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('user.layouts.header')
        @yield('main-content')
      </div>
      <!-- End of Main Content -->
      @include('user.layouts.footer')

      <!-- JS (head) -->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
</body>

</html>
