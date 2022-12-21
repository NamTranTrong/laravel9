@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item"><a href="{{route ('admin.get.list.category')}}">Quản lí danh mục</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                </ol>
        </nav>
</div>
<div>
  @include("admin::category.form")
</div>
@stop