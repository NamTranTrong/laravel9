@extends('layouts.app')
@section('content')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//theme.hstatic.net/1000075078/1000942964/14/component.css?v=84" rel="stylesheet" type="text/css" media="all">
    <link href="//theme.hstatic.net/1000075078/1000942964/14/carousel.css?v=84" rel="stylesheet" type="text/css" media="all">
    <script src="//theme.hstatic.net/1000075078/1000942964/14/component.button.js?v=84" type="text/babel"></script> 
    <style>
        a{color: #000;}
        h4{font-weight: 600 !important;}
        [data-filter="temp"] {
        display: none !important;
        }
    </style>
    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <ol class="breadcrumb breadcrumb-arrow" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="/collections/all" target="_self"><span itemprop="name">Menu</span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="/collections/cloudtea" target="_self" itemprop="item"><span itemprop="name">{{$productDetail->category->c_name}}</span></a>
                            <meta itemprop="position" content="2">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="active">
                            <span itemprop="name"> {{$productDetail->pro_name}}</span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--React test-->
    <div id="productinfor">
        <div class="product_info_r">
            <div class="product_wrap_r container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div id="productCarousel" class="carousel slide" data-interval="false">
                            <div class="carousel-inner" role="listbox">
                                <div data-carousel="0" class="item active"><img src="{{pare_url_file($productDetail->avatar)}}"></div>
                                <a class="left carousel-control" href="#productCarousel" role="button" data-slide="prev" style="display: none;"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a><a class="right carousel-control" href="#productCarousel" role="button" data-slide="next" style="display: none;"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                            </div>
                            <div id="thumbCarousel">
                                <div data-target="#productCarousel" data-slide-to="0" class="thumb active"><img src="{{pare_url_file($productDetail->avatar)}}"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div>
                            <div class="inforr_product">
                                <div>
                                    <p class="info_product_title">{{$productDetail->pro_name}}</p>
                                    <div class="info_product_price"><span class="price">{{number_format($productDetail->pro_price),0    ,'',''}} đ</span><del class="price_original hide">0 đ</del><span class="sale_percent hide">Giảm 0 %</span></div>
                                </div>
                            </div>
                            <div class="option_sizes">
                                <p class="option_title">Chọn size (bắt buộc)</p>
                                <div class="product_options">
                                    <div id="ax_1042978588" class="opt_size">
                                        <div data-filter="Nhỏ" data-barcode="10010179" data-sku="636265f9ccbcf400133f4f01" class="product__info__item__list__item icons_0 ">
                                            <svg viewBox="0 0 13 16" xmlns="http://www.w3.org/2000/svg">
                                                <path class="shape " d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"></path>
                                            </svg>
                                            <div class="circle">Nhỏ + 0 đ</div>
                                        </div>
                                        <div data-filter="Vừa" data-barcode="10010180" data-sku="636265f9ccbcf400133f4f01" class="product__info__item__list__item icons_1 ">
                                            <svg viewBox="0 0 13 16" xmlns="http://www.w3.org/2000/svg">
                                                <path class="shape " d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"></path>
                                            </svg>
                                            <div class="circle">Vừa + 4.000 đ</div>
                                        </div>
                                        <div data-filter="Lớn" data-barcode="10010181" data-sku="636265f9ccbcf400133f4f01" class="product__info__item__list__item icons_2 ">
                                            <svg viewBox="0 0 13 16" xmlns="http://www.w3.org/2000/svg">
                                                <path class="shape " d="M11.6511 1.68763H10.3529V0.421907C10.3529 0.194726 10.1582 0 9.93104 0H2.17444C1.94726 0 1.75254 0.194726 1.75254 0.421907V1.65517H0.454361C0.194726 1.68763 0 1.88235 0 2.10953V4.18661C0 4.41379 0.194726 4.60852 0.421907 4.60852H1.33063L1.72008 8.8925L1.78499 9.76876L2.30426 15.6105C2.33671 15.8377 2.49899 16 2.72617 16H9.28195C9.50913 16 9.70385 15.8377 9.70385 15.6105L10.2231 9.76876L10.288 8.8925L10.6775 4.60852H11.5862C11.8134 4.60852 12.0081 4.41379 12.0081 4.18661V2.10953C12.073 1.88235 11.8783 1.68763 11.6511 1.68763ZM2.56389 8.40568H3.50507C3.47262 8.56795 3.47262 8.73022 3.47262 8.8925C3.47262 9.02231 3.47262 9.15213 3.50507 9.28195H2.66126L2.6288 8.92495L2.56389 8.40568ZM9.47667 8.92495L9.44422 9.28195H8.56795C8.60041 9.15213 8.60041 9.02231 8.60041 8.8925C8.60041 8.73022 8.56795 8.56795 8.56795 8.40568H9.50913L9.47667 8.92495ZM7.72414 8.8925C7.72414 9.83367 6.97769 10.5801 6.03651 10.5801C5.09534 10.5801 4.34888 9.83367 4.34888 8.8925C4.34888 7.95132 5.09534 7.20487 6.03651 7.20487C6.97769 7.20487 7.72414 7.95132 7.72414 8.8925ZM8.92495 15.1562H3.18053L2.72617 10.1582H3.82961C4.28398 10.9371 5.09534 11.4564 6.03651 11.4564C6.97769 11.4564 7.8215 10.9371 8.24341 10.1582H9.34686L8.92495 15.1562ZM9.60649 7.52941H8.21095C7.75659 6.81542 6.94523 6.3286 6.03651 6.3286C5.12779 6.3286 4.31643 6.81542 3.86207 7.52941H2.49899L2.23935 4.60852H9.86613L9.60649 7.52941ZM11.1968 3.73225H10.3205H1.75254H0.876268V2.56389H2.17444H2.2069H2.23935H8.27586C8.50304 2.56389 8.69777 2.36917 8.69777 2.14199C8.69777 1.91481 8.50304 1.72008 8.27586 1.72008H2.6288V0.876268H9.47667V2.10953C9.47667 2.33671 9.6714 2.53144 9.89858 2.53144H11.1968V3.73225Z"></path>
                                            </svg>
                                            <div class="circle">Lớn + 10.000 đ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="option_topping">
                                <p class="option_title">Topping</p>
                                <div class="product_options">
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox" id="1089803120" tid="prolang" name="topping_tch" title="Kem Phô Mai Macchiato" alt="10100024" value="10000">
                                        <div class="option_inner tch_top">
                                            <div class="name">Kem Phô Mai Macchiato + 10.000 đ</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox" id="1089803122" tid="prolang" name="topping_tch" title="Shot Espresso" alt="10100003" value="10000">
                                        <div class="option_inner tch_top">
                                            <div class="name">Shot Espresso + 10.000 đ</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox" id="1089803123" tid="prolang" name="topping_tch" title="Trân châu trắng" alt="10100016" value="10000">
                                        <div class="option_inner tch_top">
                                            <div class="name">Trân châu trắng + 10.000 đ</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox" id="1089803124" tid="prolang" name="topping_tch" title="Sốt Caramel" alt="10100019" value="10000">
                                        <div class="option_inner tch_top">
                                            <div class="name">Sốt Caramel + 10.000 đ</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox" id="1093043289" tid="prolang" name="topping_tch" title="Thạch Cà Phê" alt="10100031" value="10000">
                                        <div class="option_inner tch_top">
                                            <div class="name">Thạch Cà Phê + 10.000 đ</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="product_to_cart">
                                <ul class="order_method">
                                    <li class="x1" style="background-color: rgb(229, 121, 5);">
                                        <a target="_blank" href="https://order.thecoffeehouse.com/?code=10010181">
                                            <svg width="21" height="21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14 0C14.5523 0 15 0.447715 15 1V1.999L20 2V8L17.98 7.999L20.7467 15.5953C20.9105 16.032 21 16.5051 21 16.999C21 19.2082 19.2091 20.999 17 20.999C15.1368 20.999 13.5711 19.7251 13.1265 18.0008L8.87379 18.0008C8.42948 19.7256 6.86357 21 5 21C3.05513 21 1.43445 19.612 1.07453 17.7725C0.435576 17.439 0 16.7704 0 16V3C0 2.44772 0.447715 2 1 2H8C8.55228 2 9 2.44772 9 3V11C9 11.5128 9.38604 11.9355 9.88338 11.9933L10 12H12C12.5128 12 12.9355 11.614 12.9933 11.1166L13 11V2H10V0H14ZM5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15ZM17 14.999C15.8954 14.999 15 15.8944 15 16.999C15 18.1036 15.8954 18.999 17 18.999C18.1046 18.999 19 18.1036 19 16.999C19 15.8944 18.1046 14.999 17 14.999ZM15.852 7.999H15V11C15 12.6569 13.6569 14 12 14H10C8.69412 14 7.58312 13.1656 7.17102 12.0009L1.99994 12V14.3542C2.73289 13.5238 3.80528 13 5 13C6.86393 13 8.43009 14.2749 8.87405 16.0003H13.1257C13.5693 14.2744 15.1357 12.999 17 12.999C17.2373 12.999 17.4697 13.0197 17.6957 13.0593L15.852 7.999ZM7 7H2V10H7V7ZM18 4H15V6H18V4ZM7 4H2V5H7V4Z" fill="white" fill-opacity="0.6"></path>
                                            </svg>
                                            <span>Đặt giao tận nơi</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--data product-->
    <!--end React test-->
    <div class="product-info">
        <div class="product_info_wrap container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product_content_bottom">
                    <hr class="hidden-xs">
                    <div>
                        <h4 class="related_product_title">Mô tả sản phẩm</h4>
                        <p>{{$productDetail->pro_description}}</p>
                    </div>
                    <hr>
                    <div id="product-related">
                        <h4 class="related_product_title">Sản phẩm liên quan</h4>
                        <div class="list_product_related buy_combo">
                            <div class="menu_item">
                                <div class="menu_item_image">
                                    <a href="/products/cloudtea-hong-tra-arabica" title="CloudTea Hồng Trà Arabica"><img class=" lazyloaded" src="//product.hstatic.net/1000075078/product/1665655072_hong-tra-arabica_83361962013c4b489a3f6240a9b20d33_large.jpg" data-src="//product.hstatic.net/1000075078/product/1665655072_hong-tra-arabica_83361962013c4b489a3f6240a9b20d33_large.jpg" alt="cloudtea hong tra arabica"></a>
                                    <ul class="labels">
                                    </ul>
                                </div>
                                <div class="menu_item_info">
                                    <h3><a href="/products/cloudtea-hong-tra-arabica" title="CloudTea Hồng Trà Arabica">CloudTea Hồng Trà Arabica</a></h3>
                                    <div class="price_product_item">55.000 đ</div>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="menu_item_image">
                                    <a href="/products/cloudtea-oolong-nuong-caramel" title="CloudTea Oolong Nướng Caramel"><img class=" lazyloaded" src="//product.hstatic.net/1000075078/product/1667460870_caramel_1c6936e22301444c951e44cc18a96999_large.jpg" data-src="//product.hstatic.net/1000075078/product/1667460870_caramel_1c6936e22301444c951e44cc18a96999_large.jpg" alt="cloudtea oolong nuong caramel"></a>
                                    <ul class="labels">
                                    </ul>
                                </div>
                                <div class="menu_item_info">
                                    <h3><a href="/products/cloudtea-oolong-nuong-caramel" title="CloudTea Oolong Nướng Caramel">CloudTea Oolong Nướng Caramel</a></h3>
                                    <div class="price_product_item">55.000 đ</div>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="menu_item_image">
                                    <a href="/products/cloudtea-oolong-nuong-kem-cheese" title="CloudTea Oolong Nướng Kem Cheese"><img class=" lazyloaded" src="//product.hstatic.net/1000075078/product/1667460766_kem-cheese_cff00d281759455aabe3761796cd220a_large.jpg" data-src="//product.hstatic.net/1000075078/product/1667460766_kem-cheese_cff00d281759455aabe3761796cd220a_large.jpg" alt="cloudtea oolong nuong kem cheese"></a>
                                    <ul class="labels">
                                    </ul>
                                </div>
                                <div class="menu_item_info">
                                    <h3><a href="/products/cloudtea-oolong-nuong-kem-cheese" title="CloudTea Oolong Nướng Kem Cheese">CloudTea Oolong Nướng Kem Cheese</a></h3>
                                    <div class="price_product_item">55.000 đ</div>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="menu_item_image">
                                    <a href="/products/cloudtea-oolong-nuong-kem-dua" title="CloudTea Oolong Nướng Kem Dừa"><img class=" lazyloaded" src="//product.hstatic.net/1000075078/product/1668574461_cloudtea-oolong-nuong-kem-dua_810a463530484a3c9ba551edcc0b84df_large.png" data-src="//product.hstatic.net/1000075078/product/1668574461_cloudtea-oolong-nuong-kem-dua_810a463530484a3c9ba551edcc0b84df_large.png" alt="cloudtea oolong nuong kem dua"></a>
                                    <ul class="labels">
                                    </ul>
                                </div>
                                <div class="menu_item_info">
                                    <h3><a href="/products/cloudtea-oolong-nuong-kem-dua" title="CloudTea Oolong Nướng Kem Dừa">CloudTea Oolong Nướng Kem Dừa</a></h3>
                                    <div class="price_product_item">55.000 đ</div>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="menu_item_image">
                                    <a href="/products/cloudtea-oolong-nuong-kem-dua-da-xay" title="CloudTea Oolong Nướng Kem Dừa Đá Xay"><img class=" lazyloaded" src="//product.hstatic.net/1000075078/product/1665655139_oolong-kem-dua-daxay_06f6e6ba14e6437a9febfceeefe3a9ec_large.png" data-src="//product.hstatic.net/1000075078/product/1665655139_oolong-kem-dua-daxay_06f6e6ba14e6437a9febfceeefe3a9ec_large.png" alt="cloudtea oolong nuong kem dua da xay"></a>
                                    <ul class="labels">
                                    </ul>
                                </div>
                                <div class="menu_item_info">
                                    <h3><a href="/products/cloudtea-oolong-nuong-kem-dua-da-xay" title="CloudTea Oolong Nướng Kem Dừa Đá Xay">CloudTea Oolong Nướng Kem Dừa Đá Xay</a></h3>
                                    <div class="price_product_item">55.000 đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="relevant_articles" class="hidden">
                        <hr>
                        <h4 class="related_product_title">Bài viết liên quan</h4>
                        <div class="article_wrap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop