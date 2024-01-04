@extends('layouts.master')

@section('title')
    <title>Tình trạng răng miệng</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Tình trạng răng miệng của bệnh nhân {{$patient->HOTEN}}</h6>
        <a href="" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">MAKH</th>
                        <th scope="col">BEMAT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($status as $statusItem)
                        <tr>
                            <th>{{$statusItem->STT}} ({{$statusItem->tooth->TENRANG}})</th>
                            <td>{{$statusItem->MAKH}}</td>
                            <td>{{$statusItem->BEMAT}}</td>
                            <td>
                                <a href="{{route('edit.status',['makh' => $statusItem->MAKH ,'stt' => $statusItem->STT ])}}" class="btn btn-outline-primary">
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
    {{--  <script src="{{asset('admin-css-js/contraindication/js/delete/delete.js')}}"></script>  --}}
@endsection
