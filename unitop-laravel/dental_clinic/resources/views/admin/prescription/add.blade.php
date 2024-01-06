@extends('layouts.master')

@section('title')
    <title>Thêm mới đơn thuốc</title>
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
                <form method="POST" action="{{route('store.prescription',['makh' => $plan->MAKH])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm đơn thuốc</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Số lượng thuốc</label>
                                <input type="number" min="1" class="form-control" name="soluong" >
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Chọn thuốc</label>
                                <select class="form-select mb-3" name="mathuoc">
                                    @foreach ($medicines as $medicine)
                                        <option value="{{$medicine->MATHUOC}}">{{$medicine->TENTHUOC}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Thêm mới</button>
                    </div>
                </form>
            </div>

    </div>


@endsection