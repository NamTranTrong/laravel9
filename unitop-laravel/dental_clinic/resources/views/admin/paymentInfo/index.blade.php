@extends('layouts.master')

@section('title')
    <title>Thông tin thanh toán</title>
@endsection

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách thông tin thanh toán</h6>
        <a href="" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MATT</th>
                        <th scope="col">MANV</th>
                        <th scope="col">MAKH</th>
                        <th scope="col">NGAYGD</th>
                        <th scope="col">TONGTIEN</th>
                        <th scope="col">LOAITHANHTOAN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymentInfos as $paymentInfo)
                        <tr>
                            <th scope="row">{{$paymentInfo->MATT}}</th>
                            <td>{{$paymentInfo->MANV}}</td>
                            <td>{{$paymentInfo->MAKH}}</td>
                            <td>{{$paymentInfo->NGAYGD}}</td>
                            <td>{{$paymentInfo->TONGTIEN}}</td>
                            <td>{{$paymentInfo->LOAITHANHTOAN}}</td>
                            <td>
                                <a href="" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a class="btn btn-outline-danger action_delete">
                                  <span class="btn-inner--icon"><i class="fa-solid fa-trash-can"></i></span>
                                  <span class="btn-inner--text">Delete</span>
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
    <script src="{{asset('admin-css-js/apointment/delete/delete.js')}}"></script>
@endsection