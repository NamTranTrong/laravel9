

@extends('layouts.master')


@section('title')
    <title>Cart</title>
@endsection

@section('content')
    
<!-- Cart Start -->
<div class="cart_wrapper">
    @include('home.cart.component.table-cart');
</div>
<!-- Cart End -->

@endsection

@section('js')
    <script src="{{asset('css-js-blade/js/cart/cart-list.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection