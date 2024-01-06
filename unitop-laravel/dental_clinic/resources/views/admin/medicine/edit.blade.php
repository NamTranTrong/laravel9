@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa thuốc</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/css/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.medicine',['mathuoc' => $medicine->MATHUOC])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa thông tin thuốc</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên thuốc</label>
                                <input type="text" class="form-control" placeholder="Thuốc A" name="tenthuoc" value="{{$medicine->TENTHUOC}}" >
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Giá thuốc</label>
                                <input type="number" limit="1" class="form-control" name="giathuoc" value="{{$medicine->GIATHUOC}}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>

    </div>
@endsection