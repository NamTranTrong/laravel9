@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa bệnh nhân</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.patient',[$patient->MABN])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa bệnh nhân</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Họ và Tên</label>
                                <input type="text" class="form-control" placeholder="Nguyễn Văn A" name="hoten" value="{{$patient->HOTEN}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="example@gmail.com" name="email" value="{{$patient->EMAIL}}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="0123456789" name="sdt" value="{{$patient->SDT}}">
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Tuổi</label>
                                    <input type="number" class="form-control" placeholder="32" name="tuoi" value="{{$patient->TUOI}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                                <select class="form-select mb-3" name="gioitinh" >
                                    @foreach ($genders as $gender )
                                        <option value="{{$gender}}" {{$patient->GIOITINH == $gender ? 'selected' : ''}}>{{$gender}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tình trạng sức khỏe</label>
                                <select class="form-select mb-3" name="tinhtrangsk">
                                    @foreach ($status as $statusItem )
                                        <option value="{{$statusItem}}" {{$patient->TONGQUANSK == $statusItem ? 'selected' : ''}}>{{$statusItem}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>

    </div>


@endsection