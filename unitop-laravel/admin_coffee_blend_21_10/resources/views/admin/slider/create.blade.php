@extends('layouts.admin')

@section('title')
    <title>Create Slider</title>
@endsection

@section('css')
    {{--  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  --}}
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Slider', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Slider</strong>
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
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên Slider<span
                                            style="color:red">&nbsp;*</span></label><input value="{{ old('name') }}"
                                        type="text" name="name" placeholder="Nhập tên Slider"
                                        class="form-control ">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Nội dung <span
                                            style="color:red">&nbsp;*</span></label>
                                    <textarea name="description" id="textarea-input" rows="9" placeholder="Description..."
                                        class="myEditor form-control ">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Ảnh Slider<span
                                            style="color:red">&nbsp;*</span></label>
                                    <input type="file" id="file-input" name="image_path"
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
    {{--  <script src="{{ asset('admin-js-css/product/create/create.js') }}"></script>  --}}
@endsection
