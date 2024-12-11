@extends('layouts.admin')

@section('title')
    <title>Create Menu</title>
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Menu', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Menu</strong>
                        </div>
                        <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên Menu<span
                                            style="color:red">&nbsp;*</span></label><input type="text" name="name"
                                        placeholder="Nhập tên menu" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Menu Cha<span
                                            style="color:red">&nbsp;*</span></label>
                                    <select class="form-control" name="parent_id" id="">
                                        <option value="">---- Chọn menu cha ---</option>
                                        {!! $optionSelect !!}
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
