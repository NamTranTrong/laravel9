@extends('layouts.admin')

@section('title')
    <title>Edit Blog</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Blog', 'key' => 'Edit'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Sản Phẩm</strong>
                        </div>
                        <form action="{{ route('blog.update',['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tiêu đề<span
                                            style="color:red">&nbsp;*</span></label><input value="{{$blog->name}}"
                                        type="text" name="name" class="form-control ">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Nội dung <span
                                            style="color:red">&nbsp;*</span></label>
                                    <textarea name="content" id="textarea-input" rows="9"
                                        class="myEditor form-control ">{{ $blog->content }}</textarea>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Ảnh Blog <span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="file" id="file-input" name="feature_image_path"
                                        class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <img class="main-img" src="{{ $blog->feature_image_path }}" alt="">
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
    <script src="{{ asset('admin-js-css/blog/create/create.js') }}"></script>
@endsection
