@extends('layouts.admin')

@section('content')
    @include('partials.content-header',['name' => 'Permission','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('permission.store')}}">
                @csrf
                <div>
                  <label>Choose Model</label>
                  <select class="form-control" name="module_table" id="" value="{{old("module_table")}}">
                        <option value=""></option>
                        @foreach (config('permissions.module_table') as $module_table )
                            <option value="{{$module_table}}">{{$module_table}}</option>
                        @endforeach
                  </select>
                  @if($errors->has('module_table'))
                    <div class="text-danger error">
                        <span style="font-style:italic"> *{{$errors->first('module_table')}}</span>
                    </div>
                  @endif
                </div>
                <div class="form-group mt-3">
                      <label for="">Choose Permission : </label>
                      @foreach (config('permissions.module_permission') as $module_permission)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="module_permission[]" type="checkbox" id="inlineCheckbox1" value="{{$module_permission}}">
                            <label class="form-check-label" for="inlineCheckbox1">{{$module_permission}}</label>
                        </div>
                      @endforeach
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection