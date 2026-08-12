{{-- resources/views/frontend/layouts/master.blade.php --}}

{{-- ===== HEAD ===== --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('meta')
    <title>@yield('title', 'Petchemparts — Industrial & Petrochemical Parts Specialists')</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Core Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons & Extras -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Project CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/responstive.css')}}">
    <link rel="manifest" href="/manifest.json">

    <style>
        /* ===== CSS VARIABLES ===== */
        :root {
            --primary: #0EA5E9;
            --primary-dark: #0284C7;
            --primary-light: #E0F2FE;
            --accent: #F97316;
            --dark: #0F172A;
            --dark-2: #1E293B;
            --gray: #64748B;
            --light: #F8FAFC;
            --white: #FFFFFF;
            --radius: 14px;
            --shadow-sm: 0 2px 8px rgba(14,165,233,0.08);
            --shadow-md: 0 8px 30px rgba(14,165,233,0.13);
            --shadow-lg: 0 20px 60px rgba(14,165,233,0.18);
        }

        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white);
            color: var(--dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--light); }
        ::-webkit-scrollbar-thumb { background: var(--primary); border-radius: 10px; }
        ::selection { background: var(--primary-light); color: var(--primary-dark); }

        a { transition: all 0.25s ease; }

        /* Page Loader */
        #page-loader {
            position: fixed; inset: 0; background: var(--white);
            z-index: 99999; display: flex; align-items: center; justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        #page-loader.hidden { opacity: 0; visibility: hidden; }
        .loader-pulse {
            display: flex; gap: 10px; align-items: center;
        }
        .loader-dot {
            width: 12px; height: 12px; background: var(--primary);
            border-radius: 50%; animation: pulse 1.2s ease-in-out infinite;
        }
        .loader-dot:nth-child(2) { animation-delay: 0.2s; background: #38BDF8; }
        .loader-dot:nth-child(3) { animation-delay: 0.4s; background: var(--accent); }
        @keyframes pulse {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1.2); opacity: 1; }
        }

        /* Fix spacing for sticky header */
        .main-content-wrapper {
            padding-top: 0;
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Page Loader -->
<div id="page-loader">
    <div class="loader-pulse">
        <div class="loader-dot"></div>
        <div class="loader-dot"></div>
        <div class="loader-dot"></div>
    </div>
</div>
<script>
    window.addEventListener('load', () => {
        setTimeout(() => document.getElementById('page-loader').classList.add('hidden'), 400);
    });
</script>

{{-- ===== HEADER ===== --}}
@include('frontend.layouts.header')

{{-- ===== MAIN CONTENT ===== --}}
<main class="main-content-wrapper">
    @yield('main-content')
</main>

{{-- ===== FOOTER ===== --}}
@include('frontend.layouts.footer')

</body>
</html>