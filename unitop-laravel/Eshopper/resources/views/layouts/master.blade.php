<html>
    <head>
        <meta charset="utf-8">
        <title>EShopper - Bootstrap Shop Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
    
        <!-- Favicon -->
        <link href="{{asset('eshopper-1.0.0/img/favicon.ico')}}" rel="icon">
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="{{asset('eshopper-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('eshopper-1.0.0/css/style.css')}}" rel="stylesheet">
        @yield('title')
        @yield('css')
    </head>
    <body>
        @include('components.header')
        @yield('content')
        @include('components.footer')
    </body>
</html>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('eshopper-1.0.0/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('eshopper-1.0.0/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('eshopper-1.0.0/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('eshopper-1.0.0/mail/contact.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('/eshopper-1.0.0/js/main.js')}}"></script>
@yield('js')