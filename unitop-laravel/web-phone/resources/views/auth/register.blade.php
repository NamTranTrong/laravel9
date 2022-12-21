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
                        <li class="category3"><span>Đăng ký</span></li>
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
                <div class="customer-register my-account">
                    <form method="post" class="register" action="">
                        @csrf
                        <div class="form-fields">
                            <h2>Đăng kí</h2>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Họ Tên<span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="reg_email" placeholder="Nguyễn Văn A" value="">
                                @if($errors->has('name'))
                                    <div class="text-danger">
                                        * {{$errors->first('name')}}
                                    </div>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Email<span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" placeholder="namdeptraithanhlichvodichvutru@gmail.com" id="reg_email" value="">
                                @if($errors->has('email'))
                                    <div class="text-danger">
                                        * {{$errors->first('email')}}
                                    </div>
                                @endif
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Mật khẩu<span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" placeholder="Ít nhất 8 kí tự" id="reg_password">
                                @if($errors->has('password'))
                                    <div class="text-danger">
                                        * {{$errors->first('password')}}
                                    </div>
                                @endif

                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Số điện thoại<span class="required">*</span></label>
                                <input type="password" class="input-text" name="phone" placeholder="+84" id="reg_password">
                                @if($errors->has('phone'))
                                    <div class="text-danger">
                                        * {{$errors->first('phone')}}
                                    </div>
                                @endif
                            </p>
                            <div style="left: -999em; position: absolute;">
                                <label for="trap">Anti-spam</label>
                                <input type="text" name="email_2" id="trap" tabindex="-1">
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                            <input type="submit" class="breutton" name="register" value="Đăng kí">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
