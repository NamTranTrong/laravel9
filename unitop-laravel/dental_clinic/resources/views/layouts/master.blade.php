<!DOCTYPE html>
<html lang="en">

<head>

    @yield('title')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('bootstrap-admin-template-free/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap-admin-template-free/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('bootstrap-admin-template-free/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('bootstrap-admin-template-free/css/style.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
            @include('components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content container">
            <!-- Navbar Start -->
                @include('components.header')
            <!-- Navbar End -->

            @yield('content')

            <!-- Footer Start -->
                @include('components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    {{--  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap-admin-template-free/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('bootstrap-admin-template-free/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')

    <!-- Template Javascript -->
    <script src="{{asset('bootstrap-admin-template-free/js/main.js')}}"></script>

</body>

</html>