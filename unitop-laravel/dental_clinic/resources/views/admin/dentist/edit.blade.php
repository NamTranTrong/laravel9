@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa nha sĩ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/css/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.dentist',['mans' => $dentist->MANS])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa thông tin nha sĩ</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Họ và Tên</label>
                                <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="hoten" value="{{$dentist->HOTENNS}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="+84 " name="sdt" value="{{$dentist->SDTNS}}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Thêm mới</button>
                    </div>
                </form>
            </div>

    </div>
@endsection