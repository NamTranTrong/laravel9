@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa nhân viên</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/css/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.staff',['manv'=>$staff->MANV])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa thông tin nhân viên</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Họ và Tên</label>
                                <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="hoten" value="{{$staff->HOTENNV}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="+84 " name="sdt" value="{{$staff->SDTNV}}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>

    </div>
@endsection