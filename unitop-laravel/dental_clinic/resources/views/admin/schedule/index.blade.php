@extends('layouts.master')

@section('title')
    <title>Lịch trình</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách lịch trình của nha sĩ {{$dentist->HOTENNS}}</h6>
        <a href="" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MALT</th>
                        <th scope="col">MANS</th>
                        <th scope="col">MATGLAMVIEC</th>
                        <th scope="col">MATHANG</th>
                        <th scope="col">MANGAY</th>
                        <th scope="col">NAM</th>
                        <th scope="col">TINHTRANG</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <th>{{$schedule->MALT}}</th>
                            <td>{{$schedule->MANS}}</td>
                            <td>{{$schedule->MATGLAMVIEC}}</td>
                            <td>{{$schedule->MATHANG}}</td>
                            <td>{{$schedule->MANGAY}}</td>
                            <td>{{$schedule->NAM}}</td>
                            <td>{{$schedule->TINHTRANG}}</td>
                            <td>
                                <a href="" class="btn btn-outline-primary">
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
    <script src="{{asset('admin-css-js/prescription/js/delete/delete.js')}}"></script>
@endsection
