@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')
@section('title')
    <title>Shop</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('js-css/collection/collection.css') }}">
@endsection

@section('content')
    <div id="cart-success-message" class="cart-success-message">
        <i class="far fa-check-circle fa-lg" style="color: #63E6BE;"></i><span>Đã thêm vào giỏ hàng!</span>
    </div>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Mục lục</h4>
                        <ul class="filter-catagories">
                            @foreach ($lv2Categories as $lv2Category)
                                <li>
                                    <a href="#" class="parent-category" data-toggle="collapse"
                                        data-target="#category-{{ $lv2Category->id }}">
                                        <i class="far fa-lemon fa-sm"></i>
                                        {{ $lv2Category->name }}
                                    </a>
                                    <!-- Menu con tương ứng -->
                                    <div id="category-{{ $lv2Category->id }}" class="collapse">
                                        <ul class="ml-3">
                                            @if ($lv2Category->categoryChild->count())
                                                @foreach ($lv2Category->categoryChild as $lv3Category)
                                                    <li id="category-list"><a data-id="{{ $lv3Category->id }}"
                                                            href="">{{ $lv3Category->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    {{--  Product show option, search  --}}
                    {{--  <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="product-list">
                        @if ($category->products()->count())
                            <div class="category_name">
                                <h4>{{ $category->name }}</h4>
                            </div>
                        @endif
                        <div class="row">
                            @foreach ($category->products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="{{ asset($baseUrl . $product->feature_image_path) }}" alt="">
                                            {{--  <div class="sale pp-sale">Sale</div>  --}}
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a id="add-to-card" data-id="{{ $product->id }}"
                                                        href=""><i class="icon_bag_alt"></i></a>
                                                </li>
                                                <li class="quick-view"><a
                                                        href="{{ route('product.getProduct', ['id' => $product->id]) }}">+
                                                        Quick View</a>
                                                </li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            <a href="{{ route('product.getProduct', ['id' => $product->id]) }}">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($product->price, 0, ',', '.') }}đ
                                                <span>35.000đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{--  Load More  --}}
                    {{--  <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>  --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection

@section('js')
    <script src="{{ asset('js-css/collection/collection.js') }}"></script>
@endsection
