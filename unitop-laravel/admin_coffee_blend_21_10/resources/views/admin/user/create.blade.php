@extends('layouts.admin')

@section('title')
    <title>Create User</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'User', 'key' => 'Create'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tạo User</strong>
                        </div>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            @if ($errors->has('error_pass'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('error_pass') }}
                                </div>
                            @endif
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Tên User<span
                                            style="color:red">&nbsp;*</span></label><input type="text" name="name"
                                        placeholder="Nhập tên user" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Email<span
                                            style="color:red">&nbsp;*</span></label><input type="email" name="email"
                                        placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Password<span
                                            style="color:red">&nbsp;*</span></label><input type="password" name="password"
                                        placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Confirm
                                        Password<span style="color:red">&nbsp;*</span></label><input type="password"
                                        name="confirm_pass" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">Vai trò User
                                        <span style="color:red">&nbsp;*</span></label>
                                    <select class="form-control js-example-tags" multiple="multiple" name="role_ids[]">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin-js-css/user/add_edit/add_edit.js') }}"></script>
@endsection
