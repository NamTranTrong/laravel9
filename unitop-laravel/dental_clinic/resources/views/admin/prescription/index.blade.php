@extends('layouts.master')

@section('title')
    <title>Đơn thuốc</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Đơn thuốc</h6>
        <a href="{{route('add.prescription',['makh' => $plan->MAKH])}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MAKH</th>
                        <th scope="col">MATHUOC</th>
                        <th scope="col">SOLUONG</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescriptions as $prescription)
                        <tr>
                            <th>{{$prescription->MAKH}}</th>
                            <td>{{$prescription->MATHUOC}}</td>
                            <td>{{$prescription->SOLUONG}}</td>
                            <td>
                                <a href="{{route('edit.prescription',['makh' => $prescription->MAKH , 'mathuoc' => $prescription->MATHUOC])}}" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a data-url="{{route('delete.prescription',['makh' => $prescription->MAKH , 'mathuoc' => $prescription->MATHUOC])}}" class="btn btn-outline-danger action_delete">
                                  <span class="btn-inner--icon"><i class="fa-solid fa-trash-can"></i></span>
                                  <span class="btn-inner--text" >Delete</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('admin-css-js/prescription/js/delete/delete.js')}}"></script>
@endsection
