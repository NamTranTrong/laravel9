@extends('layouts.admin')

@section('title')
    <title>Add Menu</title>
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Menu' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Menu</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên Menu">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn Menu Cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Menu Cha</option>
                                    {{--  {!! $htmlOption !!}  --}}
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