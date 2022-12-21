@extends('layouts.app')
@section('content')
<div class="collection_menu_wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 stikySidebar">
                <aside class="sidebar_menu">
                    <ul class="hidden-sm hidden-xs">
                        <li>
                            <a class="menu_scroll_link view_all" href="javascript:void(0)" data-url="/collections/all">
                            Tất Cả
                            </a>
                        </li>
                        <li>
                            @if(isset($menu_s))
                                @foreach($menu_s as $menu)
                                    <a class=" menu_scroll_link active" href="" data-parent-id="103658000" data-url="/collections/ca-phe">
                                        {{$menu->menu_name}}
                                    </a>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            @if($category->ca_menu_id == $menu->id)
                                                <ul class="sidebar_menu_lv2" style="">
                                                    <li>
                                                        <a class="" href="{{route('get.list.product',[$category->c_slug,$category->id])}}">{{$category->c_name}}</a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </li>
                </aside>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 border_right_before">
                <div class="con-loaded block_menu_item loaded" id="103658001" data-parent-target="103658000">
                            <h3 class="block_menu_item_title">
                                <span class="line_after_heading section_heading">{{$cateProduct->c_name}}</span>
                            </h3>
                    @if(isset($products))

                            <div class="flex_wrap display_flex menu_lists menu_list_collection">
                                @foreach($products as $product)
                                <div class="menu_item">
                                    <div class="menu_item_image">
                                        <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img class=" lazyloaded" src="{{pare_url_file($product->avatar)}}" data-src="//product.hstatic.net/1000075078/product/1665655345_tch-sua-da_d490c8fe35bd4380a9cb68e4fb5bfbf3_large.jpg" alt="the coffee house sua da"></a>
                                        <ul class="labels">
                                        </ul>
                                    </div>
                                    <div class="menu_item_info">
                                        <a class="pull-right" style="font-size:30px;color:#ffc107" href=""><i class="fas fa-plus-circle"></i></a>
                                        <h3><a href="/products/the-coffee-house-sua-da" title="The Coffee House Sữa Đá">{{$product->pro_name}}</a></h3>
                                        <div class="price_product_item">{{number_format($product->pro_price),0,'',''}} đ</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop