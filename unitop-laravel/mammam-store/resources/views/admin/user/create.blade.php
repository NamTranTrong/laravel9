@extends('layouts.admin')

@section('title')
    <title>Add User</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin-css-js/user/create/create.css')}}">
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'User' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input
                                type="text" 
                                class="form-control" 
                                name="name" 
                                placeholder="Nhập Tên">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input 
                                type="text" 
                                class="form-control" 
                                name="email" 
                                placeholder="Nhập Email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input
                                type="text" 
                                class="form-control" 
                                name="password" 
                                placeholder="Nhập Password">
                            </div>

                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-css-js/user/create/create.js')}}"></script>
@endsection

