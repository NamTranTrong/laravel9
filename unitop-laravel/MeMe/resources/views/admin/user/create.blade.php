@extends('layouts.admin')


@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
@endsection

@section('content')
    @include('partials.content-header',['name' => 'User','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('user.store')}}">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Nhập tên của bạn">
                </div>
                <div class="form-group">
                    <label>Enter Email</label>
                    <input class="form-control" name="email" placeholder="admin12345@gmail.com">
                </div>
                <div class="form-group">
                    <label>Choose Role</label>
                    <select class="js-example-tokenizer form-control" multiple="multiple" name="role_id[]" > 
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" class="form-control" name="password" placeholder="1-9 kí tự">
                </div>
                <div class="form-group">
                    <label>Enter Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu">
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin-js-css/user/create/create.js')}}"></script>
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
@endsection
