@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<style>
	.pro-rating .active{
		color:#ffca08 !important;
		size: 20px;
	};
	.fa{
		font-size: initial !important;
	};
	body {
  padding-top: 70px;
}
.btn-grey{
    background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}
.padding-bottom-7{
	padding-bottom:7px;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
}

</style>
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
        <title>Product Details | Lavoro</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
		
		<!-- Fonts
		============================================ -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
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
		
		<!-- meanmenu CSS
		============================================ -->		
        <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
		
		<!-- font-icon CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('fonts/font-icon.css')}}">
        
 		<!-- animate CSS
		============================================ -->         
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        
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
    <body class="s-prodct">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Add your site or application content here -->
		<!-- header area start -->
		<!-- header area end -->
		<!-- breadcrumbs area start -->
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
								<li class="category3"><span>{{$productDetail->pro_name}}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- product-details Area Start -->
		<div class="product-details-area">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<div class="zoomWrapper">
							<div id="img-1" class="zoomWrapper single-zoom">
								<a href="#">
									<img style="max-width:120%" id="zoom1" src="{{pare_url_file($productDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productDetail->pro_avatar)}}" alt="big-1">
								</a>
							</div>
							<div class="single-zoom-thumb">
								<ul class="bxslider" id="gallery_01">
									<li>
										<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('img/product-details/big-1-1.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-1-1.jpg')}}"><img src="{{asset('img/product-details/th-1-1.jpg')}}" alt="zo-th-1" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-1-2.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-1-2.jpg')}}"><img src="{{asset('img/product-details/th-1-2.jpg')}}" alt="zo-th-2"></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-1-3.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-1-3.jpg')}}"><img src="{{asset('img/product-details/th-1-3.jpg')}}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-4.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-4.jpg')}}"><img src="{{asset('img/product-details/th-4.jpg')}}" alt="zo-th-4"></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-5.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-5.jpg')}}"><img src="{{asset('img/product-details/th-5.jpg')}}" alt="zo-th-5" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-6.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-6.jpg')}}"><img src="{{asset('img/product-details/th-6.jpg')}}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-7.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-7.jpg')}}"><img src="{{asset('img/product-details/th-7.jpg')}}" alt="ex-big-3" /></a>
									</li>
									<li class="">
										<a href="#" class="elevatezoom-gallery" data-image="{{asset('img/product-details/big-8.jpg')}}" data-zoom-image="{{asset('img/product-details/ex-big-8.jpg')}}"><img src="{{asset('img/product-details/th-8.jpg')}}" alt="ex-big-3" /></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="product-list-wrapper">
							<div class="single-product">
								<div class="product-content">
									<h2 class="product-name"><a href="#"><h1>{{$productDetail->pro_name}}</h1></a></h2>
									<div class="rating-price">	
										@php
											$ageDetail=0;
					
											if($productDetail->pro_total_rating){
												$ageDetail=round($productDetail->pro_total_number/$productDetail->pro_total_rating,2);
											}
										@endphp
										<div class="pro-rating">
												<span class="rating">
													@for($i=1;$i<=5;$i++)
														<i class="fas fa-star {{$i<= $ageDetail ? 'active' : ''}}" style="color:#999"></i>
													@endfor
												</span>
												<span style="color:#000">{{$ageDetail!=0 ? $ageDetail=$ageDetail : '0 đánh giá'}}</span>
										</div>
										<div class="price-boxes">
											<span class="new-price">{{number_format($productDetail->pro_price),0,'',''}} $</span>
									
										</div>
									</div>
									<div class="product-desc">
										<p>{{$productDetail->pro_title_seo}}</p>
									</div>
									<p class="availability in-stock">Availability: <span>In stock</span></p>
									<div class="actions-e">
										<div class="action-buttons-single">
											<div class="inputx-content">
												<label for="qty">Quantity:</label>
												<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
											</div>
											<div class="add-to-cart">
												<a href="#">Add to cart</a>
											</div>
											<div class="add-to-links">
												<div class="add-to-wishlist">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
												</div>
												<div class="compare-button">
													<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
												</div>									
											</div>
										</div>
									</div>
									<div class="singl-share">
                                        <a href="#"><img src="{{asset('img/single-share.png')}}" alt=""></a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="single-product-tab">
						  <!-- Nav tabs -->
						<ul class="details-tab">
							<li class="active"><a href="#home" data-toggle="tab" style="font-weight:bolder">Nội dung</a></li>
							<li class=""><a href="#messages" data-toggle="tab" style="font-weight:bolder"> Đánh giá (1)</a></li>
						</ul>
						  <!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-tab-content">
                                    {{-- <p>{{asset($productDetail->pro_description_seo)}}</p> --}}
                                    <p>{{$productDetail->pro_description_seo}}</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="single-post-comments col-md-6 col-md-offset-3">
									<div class="comments-area">
										<h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
										<div class="comments-list">
											<ul>
												<li>
													<div class="comments-details">
														<div class="comments-list-img">
															<img src="{{asset('img/user-1.jpg')}}" alt="">
														</div>
														<div class="comments-content-wrap">
															<span>
																<b><a href="#">Admin - </a></b>
																<span class="post-time">October 6, 2014 at 1:38 am</span>
															</span>
															<p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
														</div>
													</div>
												</li>									
											</ul>
										</div>
									</div>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Add a review</h3>
										<span class="email-notes">Your email address will not be published. Required fields are marked *</span>
										<form action="#">
											<div class="row">
												<div class="col-md-12">
													<p>Name *</p>
													<input type="text">
												</div>
												<div class="col-md-12">
													<p>Email *</p>
													<input type="email">
												</div>
												<div class="col-md-12">
													<p>Your Rating</p>
													<div class="pro-rating">
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
														<a href="#"><i class="fa fa-star-o"></i></a>
													</div>
												</div>
												<div class="col-md-12 comment-form-comment">
													<p>Your Review</p>
													<textarea id="message" cols="30" rows="10"></textarea>
													<input type="submit" value="Submit">
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
		<style>
			.glyphicon { margin-right:5px;}
			.rating .glyphicon {font-size: 22px;}
			.rating-num { margin-top:0px;font-size: 54px; }
			.progress { margin-bottom: 5px;}
			.progress-bar { text-align: left; }
			.rating-desc .col-md-3 {padding-right: 0px;}
			.sr-only { margin-left: 5px;overflow: visible;clip: auto; }
			.product-tab-content{
				overflow: hidden;
			}
			.product-tab-content h2{
				font-size:24px !important;
			}
			.product-tab-content h3{
				font-size:20px !important;
			}
			.product-tab-content h4{
				font-size:18px !important;
			}
			@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Styling h1 and links
––––––––––––––––––––––––––––––––– */
			h1[alt="Simple"] {color: white;}
			/* a[href], a[href]:hover {color: grey;text-decoration: none} */

			.starrating > input {display: none;}  /* Remove radio buttons */

			.starrating > label:before { 
			content: "\f005"; /* Star */
			margin: 2px;
			font-size: 3em;
			font-family: FontAwesome;
			display: inline-block; 
			}

			.starrating > label
			{
			color: #7f7f7f; /* Start color when not clicked */
			}

			.starrating > input:checked ~ label
			{ color: #ffca08 ; } /* Set yellow color when star checked */

			.starrating > input:hover ~ label
			{ color: #ffca08 ;  } /* Set yellow color when star hover */
		</style>
		<div class="container" style="padding-left:30px;">
			<h2>Đánh giá sản phẩm</h2>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="well well-sm">
						<div class="row">
							<div class="col-xs-12 col-md-4 text-center">
								<h1 class="rating-num" >
									{{$ageDetail}}
								</h1>
								<div class="pro-rating" style="margin-top:-16px">
									<span class="rating">
										@for($i=1;$i<=5;$i++)
											<i class="fas fa-star {{$i<= $ageDetail ? 'active' : ''}}" style="color:#999;font-size:20px;"></i>
										@endfor
									</span>
								</div>
								<div>
									<span class="glyphicon glyphicon-user"></span>{{$productDetail->pro_total_rating}} lượt đánh giá
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="row rating-desc">
									<div class="col-xs-3 col-md-3 text-right">
										<span class="glyphicon glyphicon-star"></span>5
									</div>
									<div class="col-xs-8 col-md-9">
										<div class="progress progress-striped">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
												aria-valuemin="0" aria-valuemax="100" style="width: 80%">
												<span class="sr-only">80%</span>
											</div>
										</div>
									</div>
									<!-- end 5 -->
									<div class="col-xs-3 col-md-3 text-right">
										<span class="glyphicon glyphicon-star"></span>4
									</div>
									<div class="col-xs-8 col-md-9">
										<div class="progress">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
												aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												<span class="sr-only">60%</span>
											</div>
										</div>
									</div>
									<!-- end 4 -->
									<div class="col-xs-3 col-md-3 text-right">
										<span class="glyphicon glyphicon-star"></span>3
									</div>
									<div class="col-xs-8 col-md-9">
										<div class="progress">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
												aria-valuemin="0" aria-valuemax="100" style="width: 40%">
												<span class="sr-only">40%</span>
											</div>
										</div>
									</div>
									<!-- end 3 -->
									<div class="col-xs-3 col-md-3 text-right">
										<span class="glyphicon glyphicon-star"></span>2
									</div>
									<div class="col-xs-8 col-md-9">
										<div class="progress">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
												aria-valuemin="0" aria-valuemax="100" style="width: 20%">
												<span class="sr-only">20%</span>
											</div>
										</div>
									</div>
									<!-- end 2 -->
									<div class="col-xs-3 col-md-3 text-right">
										<span class="glyphicon glyphicon-star"></span>1
									</div>
									<div class="col-xs-8 col-md-9">
										<div class="progress">
											<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100" style="width: 15%">
												<span class="sr-only">15%</span>
											</div>
										</div>
									</div>
									<!-- end 1 -->
								</div>
								<!-- end row -->
							</div>
							<div class="col-xs-12 col-md-4">
								<div class="container">
									<p style="font-weight:700">Chọn đánh giá của bạn</p>
									<div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
										<input type="radio" id="star5" name="rating"  /><label style="cursor: pointer" value="5" class="js-action" for="star5" title="5 star">5</label>
										<input type="radio" id="star4" name="rating"  /><label style="cursor: pointer" value="4" class="js-action" for="star4" title="4 star">4</label>
										<input type="radio" id="star3" name="rating"  /><label style="cursor: pointer" value="3" class="js-action" for="star3" title="3 star">3</label>
										<input type="radio" id="star2" name="rating"  /><label style="cursor: pointer" value="2" class="js-action" for="star2" title="2 star">2</label>
										<input type="radio" id="star1" name="rating"  /><label style="cursor: pointer" value="1" class="js-action" for="star1" title="1 star">1</label>
									</div>
							  </div>	
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" value="" class="number_rating" >
			</div>
		</div>
		<div class="form_rating container hide" style="padding-left:30px;">
			<textarea name="" class="form-control" id="ra_content" placeholder="Shop rất biết ơn nếu bạn nhận xét để shop có thể cố gắng hơn ạ !" cols="30" rows="3"></textarea>
			<div class="" style="margin-top:10px;">
					<a href="{{route('post.rating.product',$productDetail)}}" style="padding:10px 5px 0 5px;" class="btn btn-secondary btn-lg active js_rating_product" role="button" aria-pressed="true">Gửi đánh giá</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12" style="margin-left:12px;">
					<hr/>
					<div class="review-block">
						@if(isset($ratings))
							@foreach($ratings as $rating)
							<div class="row">
								<div class="col-sm-3">
									<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
									<div class="review-block-name"><a href="#">{{$rating->user->name}}</a></div>
									<div class="review-block-date">{{$rating->created_at}}<br/>1 day ago</div>
								</div>
								<div class="col-sm-9">
									<div class="pro-rating" style="padding-bottom:20px;">
										<span class="rating">
											@for($i=1;$i<=5;$i++)
												<i class="fas fa-star {{$i<= $rating->ra_number ? 'active' : ''}}" style="color:#999"></i>
											@endfor
										</span>
									</div>
									<div class="review-block-title">Nội dung đánh giá</div>
									<div class="review-block-description">{{$rating->ra_content}}</div>
								</div>
							</div>
							<hr/>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	
		<div class="our-product-area new-product">
			<div class="container">
				<div class="area-title">
					<h2>New products</h2>
				</div>
				<!-- our-product area start -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="features-curosel">
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-1.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-2.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$200.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-5.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-6.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$300.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Primis in faucibus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-9.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-10.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$270.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Voluptas nulla</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
									
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-13.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-1.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$340.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Cras neque metus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<span class="sale-text">Sale</span>
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-4.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-5.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$360.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Occaecati cupiditate</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-8.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-9.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$400.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Accumsan elit</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-11.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-12.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$280.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Pellentesque habitant</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
								<!-- single-product start -->
								<div class="col-lg-12 col-md-12">
									<div class="single-product first-sale">
										<div class="product-img">
											<a href="#">
												<img class="primary-image" src="{{asset('img/products/product-11.jpg')}}" alt="" />
												<img class="secondary-image" src="{{asset('img/products/product-2.jpg')}}" alt="" />
											</a>
											<div class="action-zoom">
												<div class="add-to-cart">
													<a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
												</div>
											</div>
											<div class="actions">
												<div class="action-buttons">
													<div class="add-to-links">
														<div class="add-to-wishlist">
															<a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
														</div>
														<div class="compare-button">
															<a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
														</div>									
													</div>
													<div class="quickviewbtn">
														<a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
													</div>
												</div>
											</div>
											<div class="price-box">
												<span class="new-price">$222.00</span>
											</div>
										</div>
										<div class="product-content">
											<h2 class="product-name"><a href="#">Donec ac tempus</a></h2>
											<p>Nunc facilisis sagittis ullamcorper...</p>
										</div>
									</div>
								</div>
								<!-- single-product end -->
							</div>
						</div>	
					</div>
				</div>
				<!-- our-product area end -->	
			</div>
		</div>
    </body>
</html>
@stop

@section('script')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$(function(){
			$(".js-action").click(function(e){
				e.preventDefault();
				let $this= $(this);
            	let number= $this.attr('value');
				console.log(number);
				if($(".form_rating").hasClass('hide')){
					$(".form_rating").addClass('active').removeClass('hide');
				}else{
					$(".form_rating").addClass('hide').removeClass('active');
				}
				$(".number_rating").val(number);
			});

		

			$(".js_rating_product").click(function(e){
				e.preventDefault();
				let content=$("#ra_content").val();
				let number=$(".number_rating").val();
				let url = $(this).attr('href');
				if(content && number){
					$.ajax({
						url:url,
						type:'POST',
						data: {
							number:number,
							content: content
						}

					}).done(function(result){
						if(result.code=1)
						alert("Cảm ơn bạn đã đánh giá!");
						location.reload();
					});
				}	
			});
		});
	</script>
@stop


