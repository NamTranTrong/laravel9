@php
    $baseUrl = 'http://127.0.0.1:8081';
@endphp

@extends('layouts.master')

@section('title')
    <title>Login</title>
@endsection


@section('css')
@endsection

@section('content')
    <!-- Login Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="group-input">
                                <label for="username">Email Address*</label>
                                <input name="email" type="email" id="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input name="password" type="password" id="pass">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input name="remember" type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('register.index') }}" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form Section End -->
@endsection
