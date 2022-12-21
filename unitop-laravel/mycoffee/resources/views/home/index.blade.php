@extends('layouts.app')
@section('content')
<section class="slide-banner">
    <ul class="slideshow">
        <li><span></span></li>
      <li><span>2</span></li>
        <li><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
    </ul>
</section>

    <section class="menu_home">
        <div class="container">
            <div class="row">
                <div class="clearfix"></div>
                <div class="menu_list_home flex_wrap display_flex">
                    <div class="menu_item menu_banner ">
                        <a title=BLINGBLING href="https://thecoffeehouse.com/collections/cloudtea"><img alt="BLINGBLING" class="lazyload"
                            src="{{asset('img/banner.png')}}"/></a>
                    </div>
                    @if(isset($productHot))
                        @foreach($productHot as $hot)
                        <div class="menu_item">
                            <div class="menu_item_image">
                                <a  href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}"
                                    title="CloudFee Hạnh Nhân Nướng"><img src="{{pare_url_file($hot->avatar)}}" alt=""></a>
                                <ul class="labels">
                                </ul>
                            </div>
                            <div class="menu_item_info">
                                <a class="pull-right" style="font-size:30px;color:#ffc107" href="{{route('add.product',[$hot->id])}}"><i class="fas fa-plus-circle"></i></a>
                                <h3><a href="/products/cloudfee-hanh-nhan-nuong" title="CloudFee Hạnh Nhân Nướng">{{$hot->pro_name}}</a></h3>
                                <div class="price_product_item">{{number_format($hot->pro_price),0,'',''}}đ
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <link href="{{asset('//theme.hstatic.net/1000075078/1000942964/14/cloudtea.scss.css?v=62')}}" rel='stylesheet' type='text/css'  media='all'  />
    <section class="cloudtea index">
        <div class="cloudtea-block right">
            <div class="container">
                <div class="row flex-box flex-w align-c justify-s">
                    <div class="info-block">
                        <div class="img-title"><img src="https://file.hstatic.net/1000075078/file/cloudtea_tagline_1_c39d8fd0d46b4144be9cebd05e318796.png" alt="CloudTea" /></div>
                        <div class="cloudtea-desc">Vừa êm mượt dịu dàng, vừa bùng nổ nồng nàn, BST Trà Sữa CloudTea Hương Vị Nụ Hôn Đầu mang đến trải nghiệm đầy mới mẻ. Chạm môi là foam béo mịn bồng bềnh, càng thêm đậm đà nhờ topping vụn bánh quy phô mai hoặc bột ca cao thơm lừng. Kế tiếp là tầng trà sữa sóng sánh, đậm hương, rõ vị. Và tầng thạch nguyên chất, dai giòn giúp giữ trọn vị trà sữa đến ngụm cuối cùng. 3 tầng hòa quyện, nhấp một ngụm là ghiền, nhớ mãi không thôi.</div>
                        <a class="flex-box align-c cloudtea-btn3" href="https://order.thecoffeehouse.com/Cloud-tea" target="_blank" title="Thử ngay">
                        <span>Thử ngay</span>
                        </a>
                    </div>
                    <div class="img-block">
                        <img src="https://file.hstatic.net/1000075078/file/cloudtea_1_5dc49fd17ba04030993d2f797dc570f2.png" alt="CloudTea" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Stores -->
    <!-- End Stores -->
    <!-- Blog -->
    <section class="blog_home">
        <div class="container">
            <div class="clearfix"></div>
            <h2 class="blog_home_title">
                <img src="https://file.hstatic.net/1000075078/file/coffee-2_2_92db24958ff14ac4b4249b3256f7a415.png"/>
                Chuyện Nhà
            </h2>
            <h3 class="blog_home_blogtitle">
                <a href="/blogs/coffeeholic">
                Coffeeholic
                </a>
            </h3>
            <div class="blog_lists flex_wrap display_flex">
                @if(isset($articleNews))
                    @foreach( $articleNews as $articleNew)
                        <div class="blog_item flex_direction_column display_flex">
                            <a class="article_item_image" href="/blogs/coffeeholic/ca-phe-sua-espresso-the-coffee-house-bat-lon-bat-vi-ngon" title="CÀ PHÊ SỮA ESPRESSO THE COFFEE HOUSE - BẬT LON BẬT VỊ NGON">
                                <div class="article_img lazyload">
                                    <img src="{{pare_url_file($articleNew->a_avatar)}}" alt="">
                                </div>
                            </a>
                            <div class="article_item_info">
                                <div class="article_published_at"><span>{{$articleNew->created_at}}</span></div>
                                <h3><a href="/blogs/coffeeholic/ca-phe-sua-espresso-the-coffee-house-bat-lon-bat-vi-ngon" title="CÀ PHÊ SỮA ESPRESSO THE COFFEE HOUSE - BẬT LON BẬT VỊ NGON">{{$articleNew->a_name}}</a></h3>
                                <p>{{$articleNew->a_description}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- End Blog -->
<style>
    .slideshow {
  list-style-type: none;
}

.slide-banner{
    height: 40vh;
    margin: 48px 0 55px 0;
}
/** SLIDESHOW **/
.slideshow,
.slideshow:after { 
    top: -16px; /*Not sure why I needed this fix*/
    width: 100%;
    height:60%;
    left: 0px;
    z-index: 0; 
}

.slideshow li span { 
	position: absolute;
    width: 100%;
    height: 60%;
    top: 0px;
    left: 0px;
    color: transparent;
    background-size: cover;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    opacity: 0;
    z-index: 0;
    animation: imageAnimation 30s linear infinite 0s; 
}


.slideshow li:nth-child(1) span { 
    background-image: url('../img/slide-1.png'); 
}
.slideshow li:nth-child(2) span { 
    background-image: url('../img/slide-2.png'); 
    animation-delay: 6s; 
}
.slideshow li:nth-child(3) span { 
    background-image:url('../img/slide-3.png'); 
    animation-delay: 12s; 
}
.slideshow li:nth-child(4) span { 
    background-image:url('../img/slide-4.png'); 
    animation-delay: 18s; 
}




@keyframes imageAnimation { 
    0% { opacity: 0; animation-timing-function: ease-in; }
    8% { opacity: 1; animation-timing-function: ease-out; }
    17% { opacity: 1 }
    25% { opacity: 0 }
    100% { opacity: 0 }
}


@keyframes titleAnimation { 
    0% { opacity: 0 }
    8% { opacity: 1 }
    17% { opacity: 1 }
    19% { opacity: 0 }
    100% { opacity: 0 }
}


.no-cssanimations .cb-slideshow li span {
	opacity: 1;
}
</style>
@stop