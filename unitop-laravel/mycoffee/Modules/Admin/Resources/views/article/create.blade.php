@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div style="padding-bottom:20px">
        <h1>Thêm mới Bài Viết</h1>
        <div style="border-bottom:1px solid #777">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.product')}}">Bài viết</a></li>
                <li class="breadcrumb-item"><a href="">Quản lí bài viết</a></li>
                <li class="breadcrumb-item active">Thêm mới bài viết</li>
                </ol>
            </nav>
        </div> 
    </div>
    @include('admin::article.form')
</div>
@stop