@php
    $baseUrl = 'http://127.0.0.1:8081'
@endphp

@extends('layouts.master')
@section('title')
    <title>Home</title>
@endsection

@section('content')
    @include('home.components.slider')

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('images/coffee-new-banner.png') }}" alt="">
                        <div class="inner-text">
                            <h4>Cà Phê</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('images/cake-banner-new.png') }}" alt="">
                        <div class="inner-text">
                            <h4>Bánh</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('images/traxanh-banner-new.png') }}" alt="">
                        <div class="inner-text">
                            <h4>Trà Xanh</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img src="{{ asset('images/hot-product-banner.png') }}" alt="">
                        <div class="inner-text">
                            <h4>Trái cây xay</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
    <section>
        <div class="separate-section" style="width:100%;position:relative;height:50px;">
            <span style="position:absolute;width:30%;border-bottom:1px solid #e7ab3c;bottom:60;left:50%;transform:translate(-50%);"></span>

        </div>
    </section>
    <!-- Banner Best Seller Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="best-seller-product-image">
                        <img src="{{ asset('images/best-seller.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1" style="margin-top:20px">
                    <div class="product-slider owl-carousel">
                        @foreach ($bestSellerProducts as $bestSellerProduct )
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ asset($baseUrl.$bestSellerProduct->feature_image_path) }}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$bestSellerProduct->category->name}}</div>
                                <a href="#">
                                    <h5>{{$bestSellerProduct->name}}</h5>
                                </a>
                                <div class="product-price">
                                    {{ number_format($bestSellerProduct->price, 0, ',', '.') }}đ
                                    <span>35.000đ</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Best Seller End -->
    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="{{ asset('images/deal-of-week.jpg') }}">
        <div class="container" style="margin-bottom:40px">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog )
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset($baseUrl.$blog->feature_image_path) }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                   {{$blog->created_at}}
                                </div>
                            </div>
                            <a href="#">
                                <h4>{{$blog->name}}</h4>
                            </a>
                            <p>
                                {!! \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) !!}
                                <a href="">xem thêm</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('coffee_blend/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('coffee_blend/img/icon-2.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="{{ asset('coffee_blend/img/icon-1.png') }}" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection



</html>
