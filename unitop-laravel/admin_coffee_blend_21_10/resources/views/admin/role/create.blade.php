@extends('layouts.admin')

@section('title')
    <title>Create Role</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin-js-css/role/create-edit.css') }}">
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Role', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tạo Role</strong>
                        </div>
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên Vai Trò<span
                                            style="color:red">&nbsp;*</span></label><input type="text" name="name"
                                        placeholder="Nhập tên user" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Mô tả vai trò<span
                                            style="color:red">&nbsp;*</span></label>
                                    <textarea class="form-control" name="display_name" id="" cols="30" rows="4"></textarea>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Permission</strong>
                                    </div>
                                    <div class="card-body">
                                        <div id="bootstrap-data-table_wrapper"
                                            class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="bootstrap-data-table_length">
                                                        <label>Show <select name="bootstrap-data-table_length"
                                                                aria-controls="bootstrap-data-table"
                                                                class="form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="20">20</option>
                                                                <option value="50">50</option>
                                                                <option value="-1">All</option>
                                                            </select> entries</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="bootstrap-data-table_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder=""
                                                                aria-controls="bootstrap-data-table"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="bootstrap-data-table"
                                                        class="table table-striped table-bordered dataTable no-footer"
                                                        role="grid" aria-describedby="bootstrap-data-table_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="col-2">Module</th>
                                                                <th class="col-2">All</th>
                                                                <th class="col-2">Add</th>
                                                                <th class="col-2">List</th>
                                                                <th class="col-2">Update</th>
                                                                <th class="col-2">Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($modules as $module)
                                                                <tr role="row" class="odd">
                                                                    <td>{{ $module->name }}</td>
                                                                    <td>
                                                                        <input type="checkbox" class="large-checkbox" id="checkAll">
                                                                    </td>
                                                                    {{-- Cột Add --}}
                                                                    <td>
                                                                        @if ( $modulePermission = $module->modulePermissions->firstWhere('name', 'add'))
                                                                            <input type="checkbox" class="large-checkbox permission-checkbox"
                                                                                name="permissions[]" value="{{$modulePermission->id}}">
                                                                        @endif
                                                                    </td>

                                                                    {{-- Cột List --}}
                                                                    <td>
                                                                        @if ($modulePermission = $module->modulePermissions->firstWhere('name', 'list'))
                                                                            <input type="checkbox" class="large-checkbox permission-checkbox"
                                                                                name="permissions[]" value="{{$modulePermission->id}}">
                                                                        @endif
                                                                    </td>

                                                                    {{-- Cột Update --}}
                                                                    <td>
                                                                        @if ($modulePermission = $module->modulePermissions->firstWhere('name', 'update'))
                                                                            <input type="checkbox" class="large-checkbox permission-checkbox"
                                                                                name="permissions[]" value="{{$modulePermission->id}}">
                                                                        @endif
                                                                    </td>

                                                                    {{-- Cột Delete --}}
                                                                    <td>
                                                                        @if ($modulePermission = $module->modulePermissions->firstWhere('name', 'delete'))
                                                                            <input type="checkbox" class="large-checkbox permission-checkbox"
                                                                                name="permissions[]" value="{{$modulePermission->id}}">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src={{asset('admin-js-css/role/create-edit.js')}}></script>
@endsection
