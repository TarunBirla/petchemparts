<!DOCTYPE html>
<html lang="en">

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

</body>

</html>
