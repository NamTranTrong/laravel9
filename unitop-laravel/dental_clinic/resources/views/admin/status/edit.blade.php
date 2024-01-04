@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa tình trạng răng</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.status',['makh' => $status->MAKH ,'stt' => $status->STT ])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa tình trạng răng</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bề mặt</label>
                                <select class="form-select mb-3" name="bemat" >
                                    @foreach ($bemat as $bematItem )
                                        <option value="{{$bematItem}}" {{$status->BEMAT == $bematItem ? 'selected' : ''}}>{{$bematItem}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>
    </div>


@endsection