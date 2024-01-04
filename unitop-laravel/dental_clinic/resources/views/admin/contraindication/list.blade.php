@extends('layouts.master')

@section('title')
    <title>Thông tin chống chỉ định</title>
@endsection

@section('content')
<div class="col-12" style="height:100vh">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Thông tin chống chỉ định của bệnh nhân {{$patient->HOTEN}}</h6>
        <a href="{{route('add.contraindication',['mabn' => $patient->MABN])}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MABN</th>
                        <th scope="col">MATHUOC</th>
                        <th scope="col">TINHTRANGDIUNG</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contraindications as $contraindication)
                        <tr>
                            <th>{{$contraindication->MABN}}</th>
                            <td>{{$contraindication->MATHUOC}}</td>
                            <td>{{$contraindication->TINHTRANGDIUNG}}</td>
                            <td>
                                <a href="{{ route('edit.contraindication', ['mabn' => $contraindication->MABN, 'mathuoc' => $contraindication->MATHUOC])}}" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a data-url="{{route('delete.contraindication',['mabn' => $contraindication->MABN, 'mathuoc' => $contraindication->MATHUOC])}}" class="btn btn-outline-danger action_delete">
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
