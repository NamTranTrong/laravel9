@extends('layouts.admin')


@section('css')
    {{--  <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">  --}}
@endsection

@section('content')
    @include('partials.content-header',['name' => 'Setting','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('setting.store').'?type='.request()->type}}" >
                @csrf
                <div class="form-group">
                    <label>Enter Config Key</label>
                    <input class="form-control" name="config_key" placeholder="Ví dụ: contact_phone,...">
                </div>
                @if (request()->type === 'text')
                  <div class="form-group">
                      <label>Enter Config Value</label>
                      <input type="text" class="form-control" name="config_value"  placeholder="ví dụ : link facebook, số điện thoại,...">
                  </div>
                @endif
                @if (request()->type === 'textarea')
                    <label>Enter Config Value </label>
                    <textarea class="form-control" name="config_value" id="" cols="100" rows="5" placeholder="Ví dụ :Mã html,..."></textarea>
                @endif
                <div>
                    <button type="submit" class="btn btn-outline-primary mt-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    {{--  <script src="{{asset('admin-js-css/user/create/create.js')}}"></script>  --}}
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
@endsection
