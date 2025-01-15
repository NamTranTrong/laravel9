@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')

@section('title')
    <title>Shopping Cart</title>
@endsection


@section('css')
@endsection

@section('content')
    <!-- Shopping Cart Section Begin -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalProduct = 0; // Tổng số sản phẩm
                                    $totalPrice = 0; // Tổng giá trị giỏ hàng
                                @endphp

                                @foreach (session('cart', []) as $id => $product)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img src="{{ $baseUrl . $product['image'] }}" alt="">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $product['name'] }}</h5>
                                        </td>
                                        <td class="p-price first-row">
                                            {{ number_format($product['price'], 0, ',', '.') }}đ
                                        </td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty" id="specific-pro-qty">
                                                    <span class="dec qtybtn" data-id="{{ $product['id'] }}">-</span>
                                                    <input type="text" class="get-quantity"
                                                        value="{{ $product['quantity'] }}">
                                                    <span class="inc qtybtn" data-id="{{ $product['id'] }}">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row">
                                            {{ number_format($product['quantity'] * $product['price'], 0, ',', '.') }}đ
                                        </td>
                                        <td class="close-td first-row">
                                            <i class="ti-close" data-id="{{ $product['id'] }}"></i>
                                        </td>
                                    </tr>
                                    @php
                                        $totalProduct += $product['quantity']; // Tính tổng số sản phẩm
                                        $totalPrice += $product['quantity'] * $product['price']; // Tính tổng tiền
                                    @endphp
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8 text-end">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{number_format($totalPrice,0,'.',',')}}đ</span></li>
                                    <li class="cart-total">Total <span>{{number_format($totalPrice,0,'.',',')}}đ</span></li>
                                </ul>
                                <a href="http://127.0.0.1:8000/order" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection

@section('js')
    <script>
        // Truyền đường dẫn của route vào JavaScript
        var routePath = @json('/cart/shopping-cart');

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
