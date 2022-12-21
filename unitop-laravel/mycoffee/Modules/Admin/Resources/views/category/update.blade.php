@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div style="padding-bottom:20px">
        <h1>Cập nhật danh mục</h1>
        <div style="border-bottom:1px solid #777">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                <li class="breadcrumb-item"><a href="">Quản lí danh mục</a></li>
                <li class="breadcrumb-item active">Cập nhật danh mục</li>
                </ol>
            </nav>
        </div> 
    </div>
    @include('admin::category.form')
</div>
@stop