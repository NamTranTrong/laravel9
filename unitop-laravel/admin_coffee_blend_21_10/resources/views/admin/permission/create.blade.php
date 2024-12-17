@extends('layouts.admin')

@section('title')
    <title>Create Permission</title>
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Permission', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Thêm Permission</strong>
                        </div>
                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Chọn Model<span
                                            style="color:red">&nbsp;*</span></label>
                                    <select class="form-control" name="module" id="">
                                        <option value="">---Chọn Module---</option>
                                        @foreach (config('permissions.table_module') as $model)
                                            <option value="{{$model}}">{{ $model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Chọn Quyền<span
                                            style="color:red">&nbsp;*</span></label>
                                    <div>
                                        <!-- Checkbox Check All -->
                                        <div>
                                            <input type="checkbox" id="checkAll" onclick="toggleCheckboxes(this)" />
                                            <label for="checkAll">All</label>
                                        </div>

                                        <!-- List of Checkboxes -->
                                        <div style="display: flex; gap: 40px; align-items: center;">
                                            @foreach (config('permissions.module_permission') as $modulePermission )
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <input name='permission_check[]' value="{{$modulePermission}}" type="checkbox" id="add" class="permission-checkbox"
                                                    style="transform: scale(1.5);" />
                                                <label for="add" style="font-size: 1.2em;">{{$modulePermission}}</label>
                                            </div>
                                            @endforeach
                                        </div>
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
    <script src={{asset('admin-js-css/permission/create/create-edit.js')}}></script>
@endsection
