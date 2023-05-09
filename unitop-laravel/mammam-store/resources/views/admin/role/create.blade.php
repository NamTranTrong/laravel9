@extends('layouts.admin')

@section('title')
    <title>Add Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/role/create/create.css')}}">
@endsection

@section('js')
   <script src="{{asset('admin-css-js\role\create\create.js')}}"></script>
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Role' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <form action="{{route('role.store')}}" method="post" style="width:100%">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Vai Trò</label>
                                    <input class="form-control" name="name" placeholder="Nhập tên vai trò">
                                </div>
    
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả Vai Trò</label>
                                    <textarea class="form-control" name="display_name"  rows="4" placeholder="Nhập mô tả Vai Trò"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">  
                                <label for="exampleInputEmail1" class="mr-3">Phân Quyền</label>
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <label for="">
                                            <input type="checkbox" class="checkbox_all">
                                        </label>
                                        All
                                    </div>
                                </div>
                                @foreach ($permissionParents as $permissionParent)
                                <div class="card border-info mb-3">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label for="">
                                                <input type="checkbox" class="checkbox_wrapper" value="{{$permissionParent->id}}">
                                            </label>
                                            {{$permissionParent->name}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($permissionParent->permissionChild as $permissionChildItem )
                                        <div class="col-md-3">
                                            <div class="card-body text-info">
                                                <label for="">
                                                    <input type="checkbox" name="permission_id[]"
                                                    class="checkbox_child"
                                                    value="{{$permissionChildItem->id}}">
                                                </label>
                                                {{$permissionChildItem->name}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




