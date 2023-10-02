@extends('layouts.admin')

@section('content')
    @include('partials.content-header',['name' => 'Role','key' => 'Update'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('role.update',['id' => $role->id])}}">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" value="{{$role->name}}">
                </div>
                <div class="form-group">
                    <label>Enter Display Name</label>
                    <input class="form-control" name="display_name" value="{{$role->display_name}}">
                  </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection