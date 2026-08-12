{{-- resources/views/frontend/layouts/master.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.head')
</head>
<body>

    @include('frontend.layouts.header')

    @yield('main-content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts._quote_modal')

</body>
</html>