@extends('layouts.app')
@section('content')
@php

use Darryldecode\Cart\Facades\CartFacade;
@endphp

<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cart | Lavoro</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
		
		<!-- Fonts
		============================================ -->
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		
 		<!-- CSS  -->
		
		<!-- Bootstrap CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        
		<!-- owl.carousel CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
        
		<!-- owl.theme CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
           	
		<!-- owl.transitions CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
        
		<!-- font-awesome.min CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		
		<!-- font-icon CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('fonts/font-icon.css')}}">
        
 		<!-- animate CSS
		============================================ -->         
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
		
		<!-- mobile menu CSS
		============================================ -->
		<link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
        
 		<!-- normalize CSS
		============================================ -->        
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
   
        <!-- main CSS
		============================================ -->          
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        
        <!-- style CSS
		============================================ -->          
        <link rel="stylesheet" href="{{asset('style.css')}}">
        
        <!-- responsive CSS
		============================================ -->          
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
        
        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
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
								<li class="category3"><span>Giỏ hàng</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- Shopping Table Container -->
		<div class="cart-area-start">
			<div class="container">
				<!-- Shopping Cart Table -->
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="cart-table" style="font-weight:900">
								<thead>
									<tr>
										<th>Stt</th>
										<th>Tên sản phẩm</th>
										<th>Hình ảnh</th>
										<th>Giá</th>
										<th>Số lượng</th>
										<th>Thành tiền</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
                                    @if(isset($products))
                                        @foreach($products as $key=>$product)
										
                                            <tr >
                                                <td>{{$product->id}}</td>
                                                <td>
                                                    <h6>{{$product->name}}</h6>
                                                </td>
                                                <td>
                                                    <a href="#"><img src="{{pare_url_file($product->attributes->avatar)}}" class="img-responsive" alt=""/></a>
                                                </td>
                                                <td>
                                                    <div class="cart-price">{{number_format($product->price,0,',',',')}}$</div>
                                                </td>
                                                <td>
                                                    {{$product->quantity}}
                                                </td>
                                                <td>
                                                    {{number_format($product->price*$product->quantity,0,',',',')}}$
                                                </td>
                                                <td>
													<a href="{{route('admin.get.edit.product',$product->id)}}"><i  class="fas fa-edit">  Sửa</i></a>
													<a href="{{route('delete.product',$key)}}"><i  class="fas fa-trash-alt">  Xóa</i></a>
												</td>
                                            </tr>
                                        @endforeach
                                    @endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- Shopping Cart Table -->
				<!-- Shopping Coupon -->
				<div class="row">
					<div class="col-md-12 vendee-clue">
						<!-- Shopping Estimate -->
						<div class="shipping coupon">
							<h5>Estimate Shipping and Tax</h5>
							<p>Enter your destination to get a shipping estimate.</p>
							<form>
								<div class="shippingTitle"><p><span>*</span>Country</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select>
											<option value="">Please Select</option>
											<option value="1">Country 1</option>
											<option value="2">Country 2</option>
											<option value="1">Country 3</option>
											<option value="2">Country 4</option>
											<option value="1">Country 5</option>
											<option value="2">Country 6</option>
											<option value="1">Country 7</option>
											<option value="2">Country 8</option>
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>State/Province</p></div>
								<div class="selectOption">
									<div class="selectParent">
										<select>
											<option value="">Please Select</option>
											<option value="1">Region 1</option>
											<option value="2">Region 2</option>
											<option value="1">Region 3</option>
											<option value="2">Region 4</option>
											<option value="1">Region 5</option>
											<option value="2">Region 6</option>
											<option value="1">Region 7</option>
											<option value="2">Region 8</option>
										</select>
									</div>
								</div>
								
								<div class="shippingTitle"><p>Zip/Postal Code</p></div>
								<div class="selectOption">
									<input type="text">
								</div>
								<button type="submit">Get Quotes</button>
							</form>
						</div>
						<!-- Shopping Estimate -->
						<!-- Shopping Code -->
						<div class="shipping coupon hidden-sm">
							<div class=""><h5>Discount Codes</h5></div>
							<p>Enter your coupon code if you have one.</p>
							<form>
								<input type="text" class="coupon-input">
								<button class="pull-left" type="submit">APPLY COUPON</button>
							</form>
						</div>
						<!-- Shopping Code -->
						<!-- Shopping Totals -->
						<div class="shipping coupon cart-totals">
							<ul>
								<li class="cartSubT">Tổng cộng: {{number_format(\Cart::getTotal(),0,',',',')}} $ <span></span></li>
							</ul>
							<a class="proceedbtn" href="{{route('get.form.pay')}}">Thanh toán</a>
						</div>
						<!-- Shopping Totals -->
					</div>
				</div>
				<!-- Shopping Coupon -->
			</div>	
		</div>
		<!-- Shopping Table Container -->
		<!-- FOOTER START -->
		<!-- FOOTER END -->
		
        <!-- JS -->
        
 		<!-- jquery-1.11.3.min js
		============================================ -->         
        <script src="{{asset('js/vendor/jquery-1.11.3.min.js')}}"></script>
        
 		<!-- bootstrap js
		============================================ -->         
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        
   		<!-- owl.carousel.min js
		============================================ -->       
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
		
		<!-- price-slider js
		============================================ --> 
        <script src="{{asset('js/price-slider.js')}}"></script>
		
		<!-- elevateZoom js 
		============================================ -->
		<script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
		
		<!-- jquery.bxslider.min.js')}}
		============================================ -->       
        <script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
		
		<!-- mobile menu js
		============================================ -->  
		<script src="{{asset('js/jquery.meanmenu.js')}}"></script>
		
		<!-- jquery scrollUp js 
		============================================ -->
        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
        
   		<!-- wow js
		============================================ -->   
        <script src="{{asset('js/wow.js')}}"></script>
		
		<!-- gmap js
		============================================ -->       
        <script src="{{asset('js/gmap.js')}}"></script>
        
   		<!-- plugins js
		============================================ -->         
        <script src="{{asset('js/plugins.js')}}"></script>
        
   		<!-- main js
		============================================ -->           
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>
@stop