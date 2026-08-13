<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Petchem Parts || Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('brands/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('brands/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('brands/logo.png') }}">
    <!-- Custom fonts for this template-->
     <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;500;600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Petchem Parts Frontend Theme Overrides for Admin -->
    <style>
        :root {
            --green-primary: #0E3D2A;
            --green-secondary: #1D6146;
            --green-dark: #082A1C;
            --brass-accent: #AD8036;
            --brass-light: #E0B15E;
            --paper-bg: #F6F3EB;
            --ink-dark: #14150F;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif !important;
            background-color: #F8FAFC !important;
            color: #14150F !important;
        }

        /* Sidebar Styling */
        .bg-gradient-primary,
        .sidebar-dark,
        .sidebar {
            background-color: var(--green-primary) !important;
            background-image: linear-gradient(180deg, #0E3D2A 0%, #1D6146 100%) !important;
        }

        .sidebar-dark .sidebar-brand {
            background: #082A1C !important;
            border-bottom: 2px solid var(--brass-accent) !important;
            color: #FFFFFF !important;
            font-family: 'Fraunces', serif;
            font-size: 16px;
            font-weight: 600;
        }

        .sidebar-dark .sidebar-brand .sidebar-brand-text {
            color: #FFFFFF !important;
        }

        .sidebar-dark .nav-item.active .nav-link,
        .sidebar-dark .nav-item .nav-link:hover {
            color: #FFFFFF !important;
            background: rgba(255, 255, 255, 0.12) !important;
            border-left: 4px solid var(--brass-accent);
        }

        .sidebar-dark .nav-item .nav-link i {
            color: var(--brass-light) !important;
        }

        .sidebar-dark .sidebar-heading {
            color: var(--brass-light) !important;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .sidebar-dark #sidebarToggle {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        .sidebar-dark #sidebarToggle:hover {
            background-color: var(--brass-accent) !important;
        }

        /* Topbar Header */
        .topbar,
        .navbar-light {
            background-color: #FFFFFF !important;
            border-bottom: 2px solid var(--brass-accent) !important;
            box-shadow: 0 4px 20px rgba(14, 61, 42, 0.08) !important;
        }

        .topbar .nav-item .nav-link {
            color: var(--green-primary) !important;
        }

        .topbar .dropdown-menu {
            border: 1px solid var(--brass-accent) !important;
            border-radius: 8px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        }

        /* Cards & Titles */
        .card {
            border-radius: 8px !important;
            border: 1px solid #E3DFCF !important;
        }

        .card-header {
            background-color: #FAF8F5 !important;
            border-bottom: 1px solid #E3DFCF !important;
        }

        .card-header h6,
        .card-header .text-primary {
            color: var(--green-primary) !important;
            font-weight: 700 !important;
        }

        .border-left-primary {
            border-left: 0.25rem solid var(--green-primary) !important;
        }

        .border-left-success {
            border-left: 0.25rem solid var(--brass-accent) !important;
        }

        .border-left-info {
            border-left: 0.25rem solid var(--green-secondary) !important;
        }

        .text-primary {
            color: var(--green-primary) !important;
        }

        .text-success {
            color: var(--brass-accent) !important;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--green-primary) !important;
            border-color: var(--green-primary) !important;
            color: #FFFFFF !important;
            font-weight: 600;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--green-secondary) !important;
            border-color: var(--green-secondary) !important;
            box-shadow: 0 4px 12px rgba(14, 61, 42, 0.25) !important;
        }

        .btn-success {
            background-color: var(--brass-accent) !important;
            border-color: var(--brass-accent) !important;
            color: #FFFFFF !important;
        }

        .btn-success:hover {
            background-color: var(--brass-light) !important;
            border-color: var(--brass-light) !important;
            color: #14150F !important;
        }

        .btn-outline-primary {
            color: var(--green-primary) !important;
            border-color: var(--green-primary) !important;
        }

        .btn-outline-primary:hover {
            background-color: var(--green-primary) !important;
            color: #FFFFFF !important;
        }

        /* Tables & Badges */
        .thead-dark th {
            background-color: var(--green-primary) !important;
            border-color: var(--green-secondary) !important;
            color: #FFFFFF !important;
        }

        .badge-primary {
            background-color: var(--green-primary) !important;
        }

        .badge-success {
            background-color: var(--green-secondary) !important;
        }

        .badge-info {
            background-color: var(--brass-accent) !important;
        }

        .badge-warning {
            background-color: var(--brass-light) !important;
            color: #14150F !important;
        }

        /* Pagination */
        .page-item.active .page-link {
            background-color: var(--green-primary) !important;
            border-color: var(--green-primary) !important;
        }

        .page-link {
            color: var(--green-primary) !important;
        }

        /* Form Inputs */
        .form-control:focus {
            border-color: var(--green-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(14, 61, 42, 0.15) !important;
        }
    </style>
    @stack('styles')
  
     <!-- Bootstrap core JavaScript-->
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  

  <!-- Core plugin JavaScript-->
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
</head>