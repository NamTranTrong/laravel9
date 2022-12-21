@extends('layouts.app')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Liên hệ</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- contact-details start -->
<div class="main-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="contact-us-area">
                    <!-- google-map-area start -->
                    <div id="map-container-google-1" class="z-depth-1-half map-container">
                        <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                          style="border:0;width:100%;height:200px;" allowfullscreen></iframe>
                      </div>
                    <!-- google-map-area end -->
                    <!-- contact us form start -->
                    <div class="contact-us-form" method="POST" action="">
                        <div class="sec-heading-area">
                            <h2>Thông tin liên hệ</h2>
                        </div>
                        <div class="contact-form">
                            <span class="legend">Contact Information</span>
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-top">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                        <label>Họ Tên <sup style="color:red">*</sup></label>
                                        <input type="text" name="con_name" class="form-control">
                                        @if($errors->has('con_name'))
                                            <div class="error-text" style="color:red;font-style:italic">
                                                {{$errors->first('con_name')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Email<sup style="color:red">*</sup></label>
                                        <input type="email" name="con_email" class="form-control">
                                        @if($errors->has('con_email'))
                                            <div class="error-text" style="color:red;font-style:italic">
                                                {{$errors->first('con_email')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="con_title" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                        <label>Nội dung <sup style="color:red">*</sup></label>
                                        <textarea class="yourmessage" name="con_content"></textarea>
                                        @if($errors->has('con_content'))
                                            <div class="error-text" style="color:red;font-style:italic">
                                                {{$errors->first('con_content')}}
                                            </div>
                                        @endif
                                    </div>												
                                </div>
                                <div class="submit-form form-group col-sm-12 submit-review pull-left">
                                    <button type="submit" class="add-tag-btn">Gửi thông tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact us form end -->
                </div>					
            </div>
        </div>
    </div>	
</div>
@stop