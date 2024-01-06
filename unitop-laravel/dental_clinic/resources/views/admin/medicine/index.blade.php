@extends('layouts.master')

@section('title')
    <title>Thuốc</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách thuốc</h6>
        <a href="{{route('add.medicine')}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MATHUOC</th>
                        <th scope="col">TENTHUOC</th>
                        <th scope="col">GIATHUOC</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                        <tr>
                            <th>{{$medicine->MATHUOC}}</th>
                            <td>{{$medicine->TENTHUOC}}</td>
                            <td>{{$medicine->GIATHUOC}}</td>
                            <td>
                                <a href="{{route('edit.medicine',['mathuoc' => $medicine->MATHUOC])}}" class="btn btn-outline-primary">
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
