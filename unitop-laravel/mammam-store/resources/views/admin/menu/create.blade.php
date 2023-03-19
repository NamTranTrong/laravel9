@extends('layouts.admin')

@section('title')
    <title>Add Menu</title>
@endsection

@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin-css-js/menu/create/create.css')}}">
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Menu' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('menu.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Menu</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên Menu">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Menu Cha</label>
                                <select class="js-example-placeholder-single form-control" name="parent_id">
                                    <option value="0">Danh Mục Cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin-css-js/menu/create/create.js')}}"></script>
@endsection