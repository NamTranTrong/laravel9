@extends('layouts.admin')


@section('css')
    {{--  <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">  --}}
@endsection

@section('content')
    @include('partials.content-header',['name' => 'Setting','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Nhập tên Slide">
                </div>
                <div class="form-group">
                    <label>Enter Description</label>
                    <textarea class="form-control" name="description" id="" cols="100" rows="5" placeholder="Nhập mô tả Slide"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    {{--  <script src="{{asset('admin-js-css/user/create/create.js')}}"></script>  --}}
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
@endsection
