@extends('admin::layouts.master')


@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Danh mục /</span>
    <span class="text-muted fw-light">Quản lí danh mục /</span> 
    Cập nhật danh mục
</h4>
<div>
    @include('admin::category.form')
</div>
@stop

