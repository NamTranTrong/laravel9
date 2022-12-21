@extends('admin::layouts.master')
@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Sản Phẩm /</span>
    <span class="text-muted fw-light">Quản lí sản phẩm/</span> 
    Thêm mới sản phẩm
</h4>
<div>
    @include('admin::product.form')
</div>
@stop




