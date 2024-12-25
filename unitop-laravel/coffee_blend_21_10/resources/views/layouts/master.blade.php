<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('coffee_blend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    @yield('css')
</head>

<body>
    @include('components.page-preloader')
    @include('components.header')
    @yield('content')
    @include('components.footer')
</body>

<!-- Js Plugins -->
<script src="{{ asset('coffee_blend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery.dd.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('coffee_blend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('coffee_blend/js/main.js') }}"></script>
<script src="{{ asset('js-css/header-fixed.js') }}""></script>
@yield('js')

</html>
