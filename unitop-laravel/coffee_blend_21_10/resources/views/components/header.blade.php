@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp


<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    {!! getConfigValueSetting('contact-email') !!}
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    {{ getConfigValueSetting('phone-contact') }}
                </div>
            </div>
            <div class="ht-right">
                @if (Auth::check())
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>
                        Hi,{{ Auth::user()->name }}! <span style="color:aqua;cursor:pointer;text-decoration: underline;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                            xuất</span>
                    </a>
                    <form id="logout-form" action="{{ route('login.index') }}" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login.index') }}" class="login-panel"><i class="fa fa-user"></i>
                        Đăng nhập
                    </a>
                @endif
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="{{ asset('coffee_blend/img/flag-1.jpg') }}"
                            data-imagecss="flag yt" data-title="English">English</option>
                        <option value='yu' data-image="{{ asset('coffee_blend/img/flag-2.jpg') }}"
                            data-imagecss="flag yu" data-title="Bangladesh">German </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="/coffee_blend/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        @include('components.header-menu')
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="{{ route('cart.shoppingCart') }}">
                                    <i class="icon_bag_alt"></i>

                                    <span> {{ $totals['total_quantity'] }}</span>
                                    <!-- Hiển thị số lượng sản phẩm -->
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @if (!empty($cart))
                                                    @foreach ($cart as $item)
                                                        <tr>
                                                            <td class="si-pic"><img
                                                                    src="{{$baseUrl.$item['image']}}"
                                                                    alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{number_format($item['price'],0,'.',',')}}₫ x
                                                                        {{$item['quantity']}}</p>
                                                                    <h6>{{$item['name']}}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close" data-id="17"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Total:</span>
                                        <h5>{{number_format($totals['total_price'],0,'.',',')}}₫</h5> <!-- Hiển thị tổng tiền -->
                                    </div>
                                    <div class="select-button">
                                        <a href="http://127.0.0.1:8000/cart/shopping-cart"
                                            class="primary-btn view-card">View
                                            Cart</a>
                                        <a href="http://127.0.0.1:8000/order"
                                            class="primary-btn checkout-btn">Checkout</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{number_format($totals['total_price'],0,'.',',')}}₫</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->

