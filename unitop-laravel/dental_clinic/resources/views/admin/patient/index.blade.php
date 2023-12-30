@extends('layouts.master')

@section('title')
    <title>Bệnh nhân</title>
@endsection

@section('content')
<div class="col-12">
    <div class="bg-light rounded h-100 p-4 mt-3 mr-3">
        <h6 class="mb-4">Danh sách bệnh nhân</h6>
        <a href="{{route('add.patient')}}" class="btn btn-outline-primary">
            <span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span>
            <span class="btn-inner--text">Add</span>
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MABN</th>
                        <th scope="col">HOTEN</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">SDT</th>
                        <th scope="col">TUOI</th>
                        <th scope="col">GIOITINH</th>
                        <th scope="col">TONGQUANSK</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">{{$patient->MABN}}</th>
                            <td>{{$patient->HOTEN}}</td>
                            <td>{{$patient->EMAIL}}</td>
                            <td>{{$patient->SDT}}</td>
                            <td>{{$patient->TUOI}}</td>
                            <td>{{$patient->GIOITINH}}</td>
                            <td>{{$patient->TONGQUANSK}}</td>
                            <td>
                                <a href="" class="btn btn-outline-primary">
                                    <span class="btn-inner--icon"><i class="fa-solid fa-pencil"></i></span>
                                    <span class="btn-inner--text">Edit</span>
                                </a>
                                <a href="" class="btn btn-outline-danger">
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