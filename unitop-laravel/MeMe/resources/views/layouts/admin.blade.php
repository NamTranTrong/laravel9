<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminlte/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('adminlte/assets/img/favicon.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('adminlte/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('adminlte/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link href="{{asset('adminlte/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{asset('adminlte/assets/css/soft-ui-dashboard.css')}}?v=1.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  @yield('title')
</head>

<body class="g-sidenav-show  bg-gray-100">

  @include('partials.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @include('partials.header')
    @yield('content')
  </main>

    @include('partials.fixed-plugin')
  <script src="{{asset('adminlte/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('adminlte/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('adminlte/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('adminlte/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('adminlte/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('layouts-css-js/layouts-js.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{asset('adminlte/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</body>

</html>