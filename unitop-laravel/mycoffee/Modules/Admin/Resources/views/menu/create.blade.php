@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div style="padding-bottom:20px">
        <h1>Thêm mới Menu</h1>
        <div style="border-bottom:1px solid #777">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.menu')}}">Menu</a></li>
                <li class="breadcrumb-item"><a href="">Quản lí Menu</a></li>
                <li class="breadcrumb-item active">Thêm mới Menu</li>
                </ol>
            </nav>
        </div> 
    </div>
    @include('admin::menu.form')
</div>
@stop