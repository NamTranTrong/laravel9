@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')
@section('title')
    <title>Shop</title>
@endsection

@section('content')
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
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <!-- Menu cha 1 -->
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

                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Mens hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
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
                    </div>
                    <div class="product-list">
                        @foreach ($lv2Categories as $lv2Category)
                            @if ($lv2Category->categoryChild()->count())
                                @foreach ($lv2Category->categoryChild as $lv3Category)
                                    @if ($lv3Category->products()->count())
                                        <div class="category_name">
                                            <h4>{{ $lv3Category->name }}</h4>
                                        </div>
                                    @endif

                                    <div class="row">
                                        @foreach ($lv3Category->products as $product)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="product-item">
                                                    <div class="pi-pic">
                                                        <img src="{{ asset($baseUrl . $product->feature_image_path) }}"
                                                            alt="">
                                                        {{--  <div class="sale pp-sale">Sale</div>  --}}
                                                        <div class="icon">
                                                            <i class="icon_heart_alt"></i>
                                                        </div>
                                                        <ul>
                                                            <li class="w-icon active"><a href="#"><i
                                                                        class="icon_bag_alt"></i></a>
                                                            </li>
                                                            <li class="quick-view"><a href="#">+ Quick View</a>
                                                            </li>
                                                            <li class="w-icon"><a href="#"><i
                                                                        class="fa fa-random"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="pi-text">
                                                        <a href="#">
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
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection

@section('js')
    <script src="{{ asset('js-css/collection/collection.js') }}"></script>
    <script>
        var baseUrl = "{{ $baseUrl }}"; // Lấy URL gốc của public folder
    </script>
@endsection
