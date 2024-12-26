@extends('layouts.admin')

@section('title')
    <title>Create Blog</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Blog', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Sản Phẩm</strong>
                        </div>
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tiêu đề<span
                                            style="color:red">&nbsp;*</span></label><input value="{{ old('name') }}"
                                        type="text" name="name" placeholder="Nhập tiêu đề"
                                        class="form-control ">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Nội dung <span
                                            style="color:red">&nbsp;*</span></label>
                                    <textarea name="content" id="textarea-input" rows="9" placeholder="Content..."
                                        class="myEditor form-control ">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Ảnh Blog <span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="file" id="file-input" name="feature_image_path"
                                        class="form-control-file">
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
