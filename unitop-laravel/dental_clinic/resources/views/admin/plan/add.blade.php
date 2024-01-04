@extends('layouts.master')

@section('title')
    <title>Thêm mới kế hoạch</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/css/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1">
            <div class="col-sm-12">
                <form method="POST" action="{{route('store.plan',['mabn' => $get_mabn])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm kế hoạch</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" placeholder="Kế hoạch điều trị viêm nướu" name="mota" >
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn nhân viên</label>
                                <select class="form-select mb-3" name="manv">
                                    @foreach ($staffs as $staff)
                                        <option value="{{$staff->MANV}}">{{$staff->HOTENNV}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn nha sĩ</label>
                                <select class="form-select mb-3" name="mans">
                                    @foreach ($dentists as $dentist)
                                        <option value="{{$dentist->MANS}}">{{$dentist->HOTENNS}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn điều trị</label>
                                <select class="form-select mb-3" name="madt">
                                    @foreach ($treatments as $treatment)
                                        <option value="{{$treatment->MADT}}">{{$treatment->TENDT}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn điều trị</label>
                                <input type="date" class="form-control" name="ngaydt" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn trạng thái</label>
                                <select class="form-select mb-3" name="trangthai">
                                    @foreach ($status as $statusItem)
                                        <option value="{{$statusItem}}">{{$statusItem}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Thêm mới</button>
                    </div>
                </form>
            </div>

    </div>


@endsection