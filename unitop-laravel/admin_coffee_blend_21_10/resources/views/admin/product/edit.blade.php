@extends('layouts.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin-js-css/product/edit/edit.css') }}">
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Product', 'key' => 'Edit'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Chỉnh sửa Sản Phẩm</strong>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên Sản Phẩm<span
                                            style="color:red">&nbsp;*</span></label><input value="{{ $product->name }}"
                                        type="text" name="name" placeholder="Nhập tên danh mục" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Giá Sản Phẩm <span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="number" name="price" value="{{ $product->price }}"
                                        placeholder="10.000,..." class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Nội dung <span
                                            style="color:red">&nbsp;*</span></label>
                                    <textarea name="content" id="textarea-input" rows="9" placeholder="Content..." class="myEditor form-control">{!! $product->content !!}</textarea>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Danh mục <span
                                            style="color:red">&nbsp;*</span></label>
                                    <select class="form-control js-example-tags" name="category_id" id="">
                                        <option value="">Chọn Danh Mục</option>
                                        {!! $htmlSelect !!}
                                    </select>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Tags cho Sản Phẩm
                                        <span style="color:red">&nbsp;*</span></label>
                                    <select class="form-control js-example-tags" multiple="multiple" name="tags[]">
                                        @foreach ($product->tags as $tagItem)
                                            <option value="{{ $tagItem->id }}" selected>{{ $tagItem->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Ảnh Sản Phẩm <span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="file" id="file-input" name="feature_image_path"
                                        class="form-control-file" value="">
                                </div>
                                <div class="form-group">
                                    <img class="main-img" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Danh mục <span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="file" id="file-multiple-input" name="image_path[]" multiple=""
                                        class="form-control-file" value="">
                                </div>
                                <div class="form-group">
                                    <div class="thumnail">
                                        @foreach ($product->images as $imgDetail)
                                            <img src="{{ $imgDetail->image_path }}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4 form-actions form-group">
                                    <button type="submit"
                                        class="btn btn-outline-success btn-sm pt-2 pb-2 pl-3 pr-3">Lưu</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.1/tinymce.min.js"></script>
    <script src="{{ asset('admin-js-css/product/create/create.js') }}"></script>
@endsection
