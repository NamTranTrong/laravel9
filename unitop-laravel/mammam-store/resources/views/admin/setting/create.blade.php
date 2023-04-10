@extends('layouts.admin')

@section('title')
    <title>Add Setting</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin-css-js/setting/create/create.css')}}">
    
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Setting' , 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('setting.store').'?type='.request()->type}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Key</label>
                                <input value="{{old('config_key')}}" type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" placeholder="Nhập Config_key">

                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if (request()->type === 'text')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Value</label>
                                <input type="text" value="{{old('config_value')}}" class="form-control @error('config_value') is-invalid @enderror" name="config_value" placeholder="Nhập Config_value">
                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @elseif (request()->type === 'textarea')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Value</label>
                                <textarea value="{{old('config_value')}}" name="config_value" rows="5" class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config_value"></textarea>
                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif  

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

