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
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom" style="position: relative; overflow: hidden;">
                                <img class="product-big-img" src="{{ $baseUrl . $product->feature_image_path }}"
                                    alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-139px, 0px, 0px); transition: 1.2s; width: 559px;">
                                            @if ($product->images()->count())
                                                @foreach ($product->images as $productImage)
                                                    <div class="owl-item" style="width: 129.583px; margin-right: 10px;">
                                                        <div class="pt"
                                                            data-imgbigurl="{{ $baseUrl . $productImage->image_path }}">
                                                            <img src="{{ $baseUrl . $productImage->image_path }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                                class="fa fa-angle-left"></i></button><button type="button"
                                            role="presentation" class="owl-next disabled"><i
                                                class="fa fa-angle-right"></i></button></div>
                                    <div class="owl-dots disabled"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 1; $i < $averageRating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    <span>({{ number_format($averageRating, 2) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <h4>{{ number_format($product->price, 0, ',', '.') }}đ<span>50.000 đ</span></h4>
                                </div>
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" id="sm-size">
                                        <label for="sm-size">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="md-size">
                                        <label for="md-size">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="lg-size">
                                        <label for="lg-size">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="xl-size">
                                        <label for="xl-size">xs</label>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <span class="dec qtybtn" data-id="{{ $product->id }}">-</span>
                                        <input type="text" value="1" class="get-quantity2">
                                        <span class="inc qtybtn" data-id="{{ $product->id }}">+</span>
                                    </div>
                                    <a href=""
                                        data-url={{ route('product.addToCart', ['productId' => $product->id]) }}
                                        class="primary-btn pd-cart">Thêm vào giỏ hàng</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>TAGS</span>:
                                        @if ($product->tags()->count())
                                            @foreach ($product->tags as $tag)
                                                {{ $tag->name }}
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">Mô tả</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Đánh giá ({{ $totalFeedBack }})</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7 format-content">
                                                {!! $product->content !!}
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="p-catagory">Customer Rating</td>
                                                    <td>
                                                        <div class="pd-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Price</td>
                                                    <td>
                                                        <div class="p-price">$495.00</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Add To Cart</td>
                                                    <td>
                                                        <div class="cart-add">+ add to cart</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Availability</td>
                                                    <td>
                                                        <div class="p-stock">22 in stock</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Weight</td>
                                                    <td>
                                                        <div class="p-weight">1,3kg</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Size</td>
                                                    <td>
                                                        <div class="p-size">Xxl</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Color</td>
                                                    <td><span class="cs-color"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Sku</td>
                                                    <td>
                                                        <div class="p-code">00012</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">

                                        <div class="comment-option">
                                            @foreach ($productFeedBacks as $productFeedBack)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img style="height: 30px;width:30px;"
                                                            src="{{ asset('images/download.png') }}" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for ($i = 0; $i < $productFeedBack->rating; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </div>
                                                        <h5>{{ $productFeedBack->user->name }}<span>{{ $productFeedBack->created_at }}</span>
                                                        </h5>
                                                        <div class="at-reply">{{ $productFeedBack->comment }}</div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="leave-comment">
                                            <h4>Đánh giá của bạn</h4>
                                            <div class="stars">
                                                <i class="far fa-star fa-lg star" style="color: #FFD43B;"
                                                    data-star="1"></i>
                                                <i class="far fa-star fa-lg star" style="color: #FFD43B;"
                                                    data-star="2"></i>
                                                <i class="far fa-star fa-lg star" style="color: #FFD43B;"
                                                    data-star="3"></i>
                                                <i class="far fa-star fa-lg star" style="color: #FFD43B;"
                                                    data-star="4"></i>
                                                <i class="far fa-star fa-lg star" style="color: #FFD43B;"
                                                    data-star="5"></i>
                                            </div>
                                            <form id="ratingForm" method="POST"
                                                action="{{ route('feedback.postFeedBack', ['productId' => $product->id]) }}"
                                                class="comment-form">
                                                @csrf
                                                <input type="hidden" name="rating" id="ratingValue">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <textarea name="comment" placeholder="Hãy nêu cảm nhận của bạn !"></textarea>
                                                        <button type="submit" class="site-btn">Đăng</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ $baseUrl . $relatedProduct->feature_image_path }}" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a
                                            href="{{ route('product.getProduct', ['id' => $relatedProduct->id]) }}">+
                                            Quick
                                            View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <a href="{{ route('product.getProduct', ['id' => $relatedProduct->id]) }}">
                                    <h5>{{ $relatedProduct->name }}</h5>
                                </a>
                                <div class="product-price">
                                    {{ number_format($relatedProduct->price, 0, '.', ',') }}
                                    <span>55.00đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js-css/product-detail/product-detail.js') }}"></script>
    <script src="{{ asset('js-css/feedback/feedback.js') }}"></script>
@endsection
