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
                        <li class="category3"><span>Đăng nhập</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- account-details Area Start -->
<div class="customer-login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="customer-login my-account">
                    <form method="post" class="login" action="">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng Nhập</h2>
                            <p class="form-row form-row-wide">
                                <label for="username">Email<span class="required">*</span></label>
                                <input type="text" class="input-text" name="email" id="username" value="">
                                @if($errors->has('email'))
                                    <div class="text-danger">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Mật khẩu <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password">
                            </p>
                        </div>
                        <div class="form-action">
                            <p class="lost_password"> <a href="#">Quên mật khẩu?</a></p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="login" value="Đăng nhập">
                            </div>
                            <label for="rememberme" class="inline"> 
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Nhớ mật khẩu </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection