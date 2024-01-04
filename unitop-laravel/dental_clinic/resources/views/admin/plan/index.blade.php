@extends('layouts.master')

@section('title')
    <title>Kế hoạch điều trị</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Kế hoạch điều trị của bệnh nhân {{$patient->HOTEN}}</h6>
        <a href="{{route('add.plan',['mabn' => $patient->MABN])}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MAKH</th>
                        <th scope="col">MABN</th>
                        <th scope="col">MADT</th>
                        <th scope="col">MANS</th>
                        <th scope="col">MANV</th>
                        <th scope="col">NGAYDT</th>
                        <th scope="col">MOTA</th>
                        <th scope="col">TRANGTHAI</th>
                        <th scope="col">DONTHUOC</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <th>{{$plan->MAKH}}</th>
                            <td>{{$plan->MABN}}</td>
                            <td>{{$plan->MADT}}</td>
                            <td>{{$plan->MANS}}</td>
                            <td>{{$plan->MANV}}</td>
                            <td>{{$plan->NGAYDT}}</td>
                            <td>{{$plan->MOTA}}</td>
                            <td>{{$plan->TRANGTHAI}}</td>
                            <td>
                                    <a href="{{route('list.prescription',['makh' => $plan->MAKH])}}">
                                        <i class="fa-solid fa-receipt fa-xl"></i>
                                    </a>
                            </td>
                            <td>
                                <a href="{{route('edit.plan',['makh' => $plan->MAKH])}}" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a data-url="" class="btn btn-outline-danger action_delete">
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
    <script src="{{asset('admin-css-js/contraindication/js/delete/delete.js')}}"></script>
@endsection
