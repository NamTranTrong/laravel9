@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@php

use Darryldecode\Cart\Facades\CartFacade;
@endphp

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="{{route('home')}}" style="color:#aaa">Trang chủ</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="home">
                            <a href="{{route('get.list.shoppingCart')}}">Giỏ hàng</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Thanh toán</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=" container-fluid my-5 ">
    <div class="row justify-content-center ">
        <div class="col-xl-10">
            <div class="card shadow-lg ">     
                <div class="row justify-content-around">
                    <div class="col-md-5">
                        <form action="" method="post">
                            @csrf
                            <div class="card border-0">
                                <div class="card-header pb-0">
                                    <h2 class="card-title space ">THANH TOÁN</h2>
                                    <p class="card-text text-muted mt-4  space">Thông tin thanh toán</p>
                                    <hr class="my-0">
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="NAME" class="text-muted mb-1">Email</label>
                                        <input type="text" class="form-control form-control-sm" name="email" id="NAME" aria-describedby="helpId" value="{{get_data_user('web','email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="NAME" class=" text-muted mb-1">Số điện thoại</label>
                                        <input type="text" class="form-control form-control-sm" name="phone" id="NAME" aria-describedby="helpId" value="{{get_data_user('web','phone')}}">
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-sm-6 pr-sm-2">
                                            <div class="form-group">
                                                <label for="NAME" class=" text-muted mb-1">Ngày đặt hàng</label>
                                                <input type="text" class="form-control form-control-sm" name="date" id="NAME" aria-describedby="helpId" value="{{get_data_user('web','created_at')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="NAME" class="small text-muted mb-1">Mã giảm giá</label>
                                                <input type="text" class="form-control form-control-sm" name="code" id="NAME" aria-describedby="helpId" placeholder="xxx">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label for="address" class=" text-muted mb-1">Địa chỉ</label>
                                        <input type="text" class="form-control form-control-sm" name="address" id="NAME" aria-describedby="helpId" placeholder="Số nhà,đường,quận,huyện,xã,thôn,ấp,thành phố">
                                </div>
                                <div class="form-group">
                                        <label for="note" class=" text-muted mb-1">Ghi chú</label>
                                        <textarea name="note" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div> 
                                </div>
                            </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card border-0 ">
                            <div class="card-header card-2">
                                <p class="card-text text-muted mt-md-4  mb-2 space">Danh sách sản phẩm <span class=" small text-muted ml-2 cursor-pointer"><a href="{{route('get.list.shoppingCart')}}"></a> Cập nhật</span> </p>
                                <hr class="my-2">
                            </div>
                            <div class="card-body pt-0">
                                @if(isset($products))
                                    @foreach($products as $product)
                                        <div class="row  justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <img class=" img-fluid" src="{{pare_url_file($product->attributes->avatar)}}" width="62" height="62">
                                                    <div class="media-body  my-auto">
                                                        <div class="row ">
                                                            <div class="col-auto"><p class="mb-0"><b>{{$product->name}}</b></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1">{{$product->quantity}}</p></div>
                                            <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b>{{number_format($product->price,0,',',',')}}</b></p></div>
                                        </div>
                                        <hr class="my-2">
                                    @endforeach
                                 @endif
                                <div class="row ">
                                    <div class="col">
                                        <div class="row justify-content-between">
                                            <div class="col-4"><p class="mb-1"><b>Tổng cộng :</b></p></div>
                                            <div class="flex-sm-col col-auto"><p class="mb-1"><b>{{number_format(\Cart::getTotal(),0,',',',')}} $</b></p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 mt-4 ">
                                    <div class="col-md-7 col-lg-6 mx-auto"><button type="submit" class="btn btn-block btn-outline-primary btn-lg">Thanh toán</button></div>
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
@stop