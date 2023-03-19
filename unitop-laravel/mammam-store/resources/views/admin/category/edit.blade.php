@extends('layouts.admin')

@section('title')
    <title>Add Category</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin-css-js/category/edit/edit.css')}}">
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Danh Mục' , 'key' => 'Chỉnh Sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('category.update',['id' => $category->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Danh Mục Cha</label>
                                <select class="js-example-placeholder-single form-control" name="parent_id">
                                    <option value="0">Danh Mục Cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-css-js/category/edit/edit.js')}}"></script>
@endsection
