@extends('layouts.admin')

@section('title')
    <title>Add Permission</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin-css-js/permission/create/create.css')}}">
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Phân Quyền' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('permission.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Chọn Vai Trò</label>
                                <select class="js-example-placeholder-single form-control" name="module_table">
                                    <option value="0">Danh Sách Module</option>
                                    @foreach (config('permissions.module_table') as $permission_module_table)
                                        <option value="{{$permission_module_table}}">{{$permission_module_table}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">  
                        <label for="exampleInputEmail1" class="mr-3">Phân Quyền</label>
                        <div class="card border-info mb-3">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <label for="">
                                        <input type="checkbox" class="checkbox_wrapper" value="">
                                    </label>
                                    Chọn Tất Cả
                                </div>
                            </div>
                            <div class="row">
                                
                                @foreach (config('permissions.module_permission') as $module_permission)
                                <div class="col-md-3">
                                    <div class="card-body text-info">
                                        <label for="">
                                            <input type="checkbox"
                                            class="checkbox_child"
                                            name = "module_permission[]"
                                            value="{{$module_permission}}">
                                        </label>
                                        {{$module_permission}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-css-js/permission/create/create.js')}}"></script>
@endsection
