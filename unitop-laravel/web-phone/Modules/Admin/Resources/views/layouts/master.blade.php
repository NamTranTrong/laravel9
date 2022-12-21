<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Dashboard Template · Bootstrap v5.2</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
        <link href="{{asset('theme_admin/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{asset('/docs/5.2/assets/img/favicons/apple-touch-icon.png')}}" sizes="180x180">
        <link rel="icon" href="{{asset('/docs/5.2/assets/img/favicons/favicon-32x32.png')}}" sizes="32x32" type="image/png">
        <link rel="icon" href="{{asset('/docs/5.2/assets/img/favicons/favicon-16x16.png')}}" sizes="16x16" type="image/png">
        <link rel="manifest" href="{{asset('https://getbootstrap.com/docs/5.2/assets/img/favicons/manifest.json')}}">
        <link rel="mask-icon" href="{{asset('/docs/5.2/assets/img/favicons/safari-pinned-tab.svg')}}" color="#712cf9">
        <link rel="icon" href="{{asset('https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>

        <meta name="theme-color" content="#712cf9">
        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            }
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
            }
            .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }
            .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            }
            .bi {
            vertical-align: -.125em;
            fill: currentColor;
            }
            .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
            }
            .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            }
            .table>tbody {
                vertical-align: middle;
                font-size:initial;
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="{{asset('theme_admin/css/dashboard.css')}}" rel="stylesheet">
    </head>
    <body>
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Sign out</a>
                </div>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName() == "admin.home" ? "active" :""}}" aria-current="page" href="{{route('admin.home')}}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Trang Chủ
                            </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{URL::to('/admin/category')}}" class="nav-link {{\Request::route()->getName() == "admin.get.list.category" ? "active" :""}}">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Danh mục
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName() == "admin.get.list.product" ? "active" :""}}" href="{{route('admin.get.list.product')}}">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Sản phẩm
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName()=="admin.get.list.user"?'active':""}}" href="{{route('admin.get.list.user')}}">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Khách hàng
                                </a>
                            </li>
                                 <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName()=="admin.get.list.rating"?'active':""}}" href="{{route('admin.get.list.rating')}}">
                                <span class="align-text-bottom"></span>
                                <i class="fas fa-eye" style="color:#999"></i>&ensp;Đánh giá
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName()=="admin.get.list.article"?'active':""}}" href="{{route('admin.get.list.article')}}">
                                <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                                Tin tức 
                                </a> 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName()=="admin.get.list.transaction"?'active':""}}" href="{{route('admin.get.list.transaction')}}">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Đơn hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{\Request::route()->getName()=="admin.get.list.contact"?'active':""}}" href="{{route('admin.get.list.contact')}}">
                                <span class="align-text-bottom"></span>
                                <i class="fas fa-phone" style="color:#999"></i>&ensp; Liên hệ
                                </a>
                            </li>
                        </ul>   
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @if(\Session::has('success'))
                        <div class="alert alert-success" role="alert"> 
                            <strong>Success</strong>-{{\Session::get('success')}}
                        </div>
                    @endif  
                    @if(\Session::has('warning'))
                        <div class="alert alert-watning" role="alert"> 
                            <strong>Warning</strong>-{{\Session::get('warning')}}
                        </div>
                     @endif 
                @yield('content')   
                </main>

            </div>
        </div>
        <script src="{{asset('theme_admin/js/bootstrap.bundle.min.js')}}" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="{{asset('theme_admin/js/feather.min.js')}}" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="{{asset('theme_admin/js/Chart.min.js')}}" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{asset('theme_admin/js/dashboard.js')}}"></script>
        <script src="{{asset('js/vendor/jquery-1.11.3.min.js')}}"></script>
        <script src="{{asset('js/chart.min.js')}}"></script>
        {{-- <script src="{{asset('js/vendor/jquery-1.11.3.min.js')}}"></script> --}}
        
 		<!-- bootstrap js
		============================================ -->         
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
		
		<!-- Nivo slider js
		============================================ --> 		
		<script src="{{asset('custom-slider/js/jquery.nivo.slider.js')}}"></script>
		<script src="{{asset('custom-slider/home.js')}}"></script>
        
   		<!-- owl.carousel.min js
		============================================ -->       
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
		
		<!-- jquery scrollUp js 
		============================================ -->
        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
		
		<!-- price-slider js
		============================================ --> 
        <script src="{{asset('js/price-slider.js')}}"></script>
		
		<!-- elevateZoom js 
		============================================ -->
		<script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
		
		<!-- jquery.bxslider.min.js
		============================================ -->       
        <script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
		
		<!-- mobile menu js
		============================================ -->  
		<script src="{{asset('js/jquery.meanmenu.js')}}"></script>	
        
   		<!-- wow js
		============================================ -->       
        <script src="{{asset('js/wow.js')}}"></script>
        
   		<!-- plugins js
		============================================ -->         
        <script src="{{asset('js/plugins.js')}}"></script>
        
   		<!-- main js
		============================================ -->           
        <script src="{{asset('js/main.js')}}"></script>
        @yield('script')
    </body>
</html>
