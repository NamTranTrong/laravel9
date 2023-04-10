@extends('layouts.admin')

@section('title')
    <title>Thêm mới Sản Phẩm</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin-css-js/product/create/create.css')}}">
@endsection



@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Sản Phẩm' , 'key' => 'Thêm mới'])
        <div class="content" style="display:flex">
            <div class="container-fluid">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên sản phẩm">
                                @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tags cho Sản Phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple" name='tags[]'>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                <input value="{{old('price')}}" type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Vd :10.000,20.000,...">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Chọn Danh Mục Cha</label>
                                <select class="js-example-placeholder-single js-states form-control @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="0">Danh Mục Cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh Chi Tiết Sản Phẩm</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="ckeditor_editor_init" rows="8">{{old('content')}}</textarea>
                                @error('content')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-css-js/product/create/create.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
@endsection