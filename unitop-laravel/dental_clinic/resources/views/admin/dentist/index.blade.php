@extends('layouts.master')

@section('title')
    <title>Nha sĩ</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách nha sĩ</h6>
        <a href="{{route('add.dentist')}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MANS</th>
                        <th scope="col">HOTENNS</th>
                        <th scope="col">SDTNS</th>
                        <th scope="col">LICHTRINH</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dentists as $dentist)
                        <tr>
                            <th>{{$dentist->MANS}}</th>
                            <td>{{$dentist->HOTENNS}}</td>
                            <td>{{$dentist->SDTNS}}</td>
                            <td >
                                <a href="{{route('list.schedule',['mans' => $dentist->MANS])}}">
                                    <i class="fa-solid fa-calendar-days fa-xl" style="color: #d17915;"></i> 
                                </a>
                            </td>
                            <td>
                                <a href="{{route('edit.dentist',['mans' => $dentist->MANS])}}" class="btn btn-outline-primary">
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
