@extends('layouts.master')

@section('title')
    <title>Chỉnh sửa đơn chống chỉ định</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/patient/add.css')}}">
@endsection

@section('content')
    <div class="row g-4 mt-1" style="height:100vh">
            <div class="col-sm-12">
                <form method="POST" action="{{route('update.contraindication',['mabn' => $contraindication->MABN, 'mathuoc' => $contraindication->MATHUOC])}}">
                    @csrf
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Chỉnh sửa đơn chống chỉ định</h6>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tình trạng dị ứng</label>
                                <select class="form-select mb-3" name="tinhtrangdiung" >
                                    @foreach ($status as $statusItem )
                                        <option value="{{$statusItem}}" {{$contraindication->TINHTRANGDIUNG == $statusItem ? 'selected' : ''}}>{{$statusItem}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-2">Cập nhật</button>
                    </div>
                </form>
            </div>
    </div>


@endsection