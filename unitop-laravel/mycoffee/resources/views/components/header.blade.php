<header >
    <div class="container">
        <div class="header_nav">
            <div class="header_menu">
                <div class="close-btn-wrap">
                    <a href="" class="closemenu-mobile">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.00023 5.58599L11.9502 0.635986L13.3642 2.04999L8.41423 6.99999L13.3642 11.95L11.9502 13.364L7.00023 8.41399L2.05023 13.364L0.63623 11.95L5.58623 6.99999L0.63623 2.04999L2.05023 0.635986L7.00023 5.58599Z"
                                fill="black" fill-opacity="0.85"/>
                        </svg>
                    </a>
                </div>
                <ul class="clearfix">
                    <li >
                        <a href="{{route('home')}}" title="Cà phê">Trang chủ</a>
                    </li>
                    <li class="has_child ">
                        <a href="" title="Menu">
                            Menu
                            <svg width="6" height="4" viewBox="0 0 6 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.99992 3.33332L0.333252 0.666656H5.66659L2.99992 3.33332Z"
                                    fill="black" fill-opacity="0.6"/>
                            </svg>
                        </a>
                        @if(isset($menu_s)) 
                                <ul class="menu_child" id="menu_child_3_3">
                                    @foreach($menu_s as $menu)
                                        <li class="lv2_title">
                                                <a href="/collections/cloudtea" title="CloudTea">{{$menu->menu_name}}</a>
                                            <ul class="menu_child_lv3">
                                                @if($categories)
                                                    @foreach($categories as $category)
                                                        <li class="lv3_title" main-menu-new-men>
                                                            <a href="{{route('get.list.product',[$category->c_slug,$category->id])}}" title="CloudTea">
                                                                @if($category->ca_menu_id == $menu->id)
                                                                    {{$category->c_name}}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                        @endif
                    </li>
                    <li class="has_child">
                        <a href="/pages/chuyen-ca-phe-va-tra" title="Chuyện Nhà">
                            Chuyện Nhà
                            <svg width="6" height="4" viewBox="0 0 6 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.99992 3.33332L0.333252 0.666656H5.66659L2.99992 3.33332Z"
                                    fill="black" fill-opacity="0.6"></path>
                            </svg>
                        </a>
                        <ul class="menu_child" id="menu_child_5_5">
                            <li class="lv2_title">
                                <a href="/pages/chuyen-ca-phe-va-tra?b=1000676335"
                                    title="Coffeeholic">Coffeeholic</a>
                                <ul class="menu_child_lv3">
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676335&h=chuyencaphe"
                                            title="Chuyện Cà Phê">
                                        #chuyencaphe
                                        </a>
                                    </li>
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676335&h=phacaphe"
                                            title="Pha Cà Phê">
                                        #phacaphe
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="lv2_title">
                                <a href="/pages/chuyen-ca-phe-va-tra?b=1000676336"
                                    title="Teaholic">Teaholic</a>
                                <ul class="menu_child_lv3">
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676336&h=phatra"
                                            title="Pha Trà">
                                        #phatra
                                        </a>
                                    </li>
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676336&h=cauchuyenvetra"
                                            title="Câu chuyện về trà">
                                        #cauchuyenvetra
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="lv2_title">
                                <a href="/pages/chuyen-ca-phe-va-tra?b=1000676337"
                                    title="Blog">Blog</a>
                                <ul class="menu_child_lv3">
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676337&h=inthemood"
                                            title="In The Mood">
                                        #inthemood
                                        </a>
                                    </li>
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676337&h=Review"
                                            title="Review">
                                        #Review
                                        </a>
                                    </li>
                                    <li class="lv3_title">
                                        <a href="/pages/chuyen-ca-phe-va-tra?b=1000676337&h=HumanofTCH"
                                            title="Human of TCH">
                                        #HumanofTCH
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="/pages/cloudfee-the-he-ca-phe-moi" title="Cảm hứng CloudFee">Cảm hứng CloudFee</a>
                    </li>
                    <li >
                        <a href="/pages/danh-sach-cua-hang" title="Cửa hàng">Cửa hàng</a>
                    </li>
                    <li >
                        <a href="https://tuyendung.thecoffeehouse.com" title="Tuyển dụng"
                            target="blank">Tuyển dụng</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 header_menu">
                <ul class="clearfix pull-right ">
                    <li class="has_child ">
                        <a href="" title="Menu">
                            <i class="fas fa-user" style="font-size:25px;"></i>
                            <svg width="6" height="4" viewBox="0 0 6 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.99992 3.33332L0.333252 0.666656H5.66659L2.99992 3.33332Z"
                                    fill="black" fill-opacity="0.6"/>
                            </svg>
                        </a>
                            <ul class="menu_child" id="menu_child_3_3" style="width:100%;padding:0;">
                                    <li class="lv2_title" >
                                      <ul>
                                        <li> <a href="{{route('get.login')}}">Đăng nhập</a></li>
                                        <li> <a href="{{route('get.register')}}">Đăng kí</a>
                                        </li>
                                        <hr style="margin:5px 0;height:2px;border-width:0;color:gray;background-color:gray">
                                        <li> <a href="">Thông tin tài khoản</a></li>
                                      </ul>
                                    </li>
                            </ul>
                    </li>
                    <li class="has_child">
                        <a href="">
                            <i class="fas fa-shopping-bag" style="font-size:25px;"></i>
                            <span style="border:1px solid #fff;border-radius:50%;position: absolute;margin-bottom:5px;background-color:sandybrown;padding:2px">
                                {{\Cart::getContent()->count()}}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
