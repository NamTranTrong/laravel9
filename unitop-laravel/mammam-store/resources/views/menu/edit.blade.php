@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa Menu</title>
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Menu' , 'key' => 'Chỉnh Sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('menu.update',['id' => $menu->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Menu</label>
                                <input type="text" class="form-control" value="{{$menu->name}}" name="name" placeholder="Nhập tên Menu">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Menu Cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Menu Cha</option>
                                    {!! $selectOption !!}
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