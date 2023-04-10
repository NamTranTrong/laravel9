@extends('layouts.admin')

@section('title')
    <title>Add Slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/slider/create/create.css')}}">
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Slider' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Slider</label>
                                <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên Slider" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả Slider</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh Slider</label>
                                <input type="file" class="form-control-file @error('images_path') is-invalid @enderror" name="image_path">
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
    <script src="{{asset('admin-css-js/menu/create/create.js')}}"></script>
@endsection