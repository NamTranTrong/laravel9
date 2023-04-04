@extends('layouts.admin')
@section('title')
<title>Thêm mới Sản Phẩm</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admin-css-js/product/create/create.css')}}">
<link rel="stylesheet" href="{{asset('admin-css-js/product/edit/edit.css')}}">
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 358.4px;">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Sản Phẩm' , 'key' => 'Chỉnh Sửa'])
    <div class="content" style="display:flex">
        <div class="container-fluid">
            <form action="{{route('product.update',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" value="{{$product->name}}" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Ảnh Sản Phẩm</label>
                                    <input type="file" class="form-control-file" name="feature_image_path">
                                </div>
                                <div class="col-md-7 mt-2">
                                    <img class="img_product_edit" src="{{$product->feature_image_path}}" alt="">
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Chọn Danh Mục Cha</label>
                            <select class="js-example-placeholder-single js-states form-control" name="category_id">
                                <option value="0" selected>{{$product->category->name}}</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags cho Sản Phẩm</label>
                            <select class="form-control tags_select_choose" multiple="multiple" name='tags[]'>
                                @foreach ($product->tags as $tag )
                                    <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="Vd :10.000,20.000,...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="exampleInputEmail1">Ảnh Chi Tiết Sản Phẩm</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                        </div>
                    </div>
                    <div class="col-md-12 container_img_edit">
                        @if(!empty($product->images))
                            @foreach($product->images as $productDetail)
                                <div>
                                    <img class="img_product_edit" src="{{$productDetail->image_path}}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea class="form-control" value={{$product->content}} name="content" id="ckeditor_editor_init" rows="8">{{$product->content}}</textarea>
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