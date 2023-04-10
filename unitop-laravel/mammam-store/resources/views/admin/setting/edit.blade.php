@extends('layouts.admin')

@section('title')
    <title>Edit Setting</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admin-css-js/setting/edit/edit.css')}}">
@endsection


@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Setting' , 'key' => 'Chỉnh Sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('setting.update',['id' => $setting->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Key</label>
                                <input type="text" 
                                value="{{old('config_key',isset($setting->config_key) ? $setting->config_key : "")}}"
                                class="form-control @error('config_key') is-invalid @enderror" 
                                name="config_key" 
                                placeholder="Nhập Config_key"
                               >   

                                @error('config_key')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if (request()->type === 'text')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Value</label>
                                <input type="text" 
                                class="form-control @error('config_value') is-invalid @enderror" 
                                name="config_value"
                                placeholder="Nhập Config_value"
                                value="{{old('config_value',isset($setting->config_value) ? $setting->config_value : "")}}"
                                 >
                                @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @elseif (request()->type === 'textarea')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Config Value</label>
                                <textarea class="form-control" 
                                name="config_value" 
                                rows="4"> {{old('config_value',isset($setting->config_value) ? $setting->config_value : "")}}
                                </textarea>
                            
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

