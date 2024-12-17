@extends('layouts.admin')

@section('title')
    <title>Create Category</title>
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Category', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Danh Mục</strong>
                        </div>
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên danh mục<span
                                            style="color:red">&nbsp;*</span></label><input type="text" name="name"
                                        placeholder="Nhập tên danh mục" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Danh mục cha<span
                                            style="color:red">&nbsp;*</span></label>
                                    <select class="form-control" name="parent_id" id="">
                                        <option value="0">---- Chọn danh mục cha ---</option>
                                        {!! $htmlSelect !!}
                                    </select>
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