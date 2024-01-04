@extends('layouts.master')

@section('title')
    <title>Cuộc hẹn</title>
@endsection

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách cuộc hẹn</h6>
        <a href="" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MACH</th>
                        <th scope="col">MANV</th>
                        <th scope="col">MABN</th>
                        <th scope="col">MATK</th>
                        <th scope="col">MANS</th>
                        <th scope="col">MAPHONG</th>
                        <th scope="col">NGAYHEN</th>
                        <th scope="col">GHICHU</th>
                        <th scope="col">TINHTRANG</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apointments as $apointment)
                        <tr>
                            <th scope="row">{{$apointment->MACH}}</th>
                            <td>{{$apointment->MANV}}</td>
                            <td>{{$apointment->MABN}}</td>
                            <td>{{$apointment->MATK}}</td>
                            <td>{{$apointment->MANS}}</td>
                            <td>{{$apointment->MAPHONG}}</td>
                            <td>{{$apointment->NGAYHEN}}</td>
                            <td>{{$apointment->GHICHU}}</td>
                            <td>{{$apointment->TINHTRANG}}</td>
                            <td>
                                <a href="" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a data-url="{{route('delete.apointment',['mach' => $apointment->MACH])}}" class="btn btn-outline-danger action_delete">
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