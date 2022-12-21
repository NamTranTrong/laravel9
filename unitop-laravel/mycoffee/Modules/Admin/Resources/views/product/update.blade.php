@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div style="padding-bottom:20px">
        <h1>Cập nhật sản phẩm</h1>
        <div style="border-bottom:1px solid #777">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="">Quản lí sản phẩm</a></li>
                <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
                </ol>
            </nav>
        </div> 
    </div>
    @include('admin::product.form')
</div>
@stop