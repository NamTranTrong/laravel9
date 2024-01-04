@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa đơn thuốc</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/css/add.css')}}">
@endsection

@section('content')
    @if(session('error'))
    <div class="alert alert-danger" style="height: 50px">
        {{ session('error') }}
    </div>
    @endif
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.prescription',['makh' => $prescription->MAKH , 'mathuoc' => $prescription->MATHUOC])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa đơn thuốc</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số lượng thuốc</label>
                                <input type="number" min="1" class="form-control" name="soluong" value="{{$prescription->SOLUONG}}">
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn nhân viên</label>
                                <select class="form-select mb-3" name="mathuoc">
                                    @foreach ($medicines as $medicine)
                                        <option value="{{$medicine->MATHUOC}}" {{$prescription->MATHUOC == $medicine->MATHUOC ? 'selected' : ''}}>{{$medicine->TENTHUOC}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>

    </div>


@endsection