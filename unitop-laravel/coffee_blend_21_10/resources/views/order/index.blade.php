@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')
@section('title')
    <title>Order</title>
@endsection

@section('css')
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form method="POST" action="{{route('order.create')}}"  class="checkout-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">

                        <h4>Thông tin giao hàng</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">Tên<span>*</span></label>
                                <input name="first_name" type="text" id="fir">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Họ<span>*</span></label>
                                <input name="last_name" type="text" id="last">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Ghi chú</label>
                                <input type="text" id="cun-name" name="note">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Xã/Huyện/Tỉnh/Thành Phố<span>*</span></label>
                                <input type="text" id="cun" name="city_address">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Địa chỉ<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Mã giảm giá(nếu có)</label>
                                <input type="text" id="zip" name="discount_code">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email<span>*</span></label>
                                <input type="text" id="email" name="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại<span>*</span></label>
                                <input type="text" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Hóa đơn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach ($cart as $cartItem)
                                        <li class="fw-normal">{{ $cartItem['name'] }} x {{ $cartItem['quantity'] }}
                                            <span>{{ number_format($cartItem['quantity'] * $cartItem['price'], 0, ',', '.') }}đ</span>
                                        </li>
                                    @endforeach
                                    <li class="fw-normal">Subtotal <span> {{ number_format($totalPriceAll, 0, ',', '.') }}đ
                                        </span></li>
                                    <li class="total-price">Total <span>
                                            {{ number_format($totalPriceAll, 0, ',', '.') }}đ</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection

@section('js')
    <script>
        // Truyền đường dẫn của route vào JavaScript
        var routePath = @json('/order');

        // Nếu chuỗi chứa dấu escape, thay thế nó bằng dấu gạch chéo xuôi
        routePath = routePath.replace(/\\\//g, '/'); // Thay thế \/ thành /
        var currentDomain = window.location.origin;
        var routeUrl = currentDomain + routePath;
        // So sánh với URL của route đã truyền từ Blade
        if (window.location.href === routeUrl) {
            // Nếu URL hiện tại và route URL giống nhau, xóa phần tử div
            $('.cart-icon').remove(); // Sử dụng class hoặc selector khác nếu cần
            $('.cart-price').remove();
        }
    </script>
@endsection
