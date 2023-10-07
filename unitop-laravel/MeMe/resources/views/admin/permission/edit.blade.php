@extends('layouts.admin')

@section('content')
    @include('partials.content-header',['name' => 'Permission','key' => 'Edit'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('permission.update',['id' => $module->id])}}">
                @csrf
                <div>
                  <label>Choose Model</label>
                  <select class="form-control" name="module_table">
                        <option value="">{{$module->name}}</option>
                        @foreach (config('permissions.module_table') as $module_table)
                            @if ( $module->name != $module_table)
                                <option value="{{$module_table}}">{{$module_table}}</option>
                            @endif
                        @endforeach
                  </select>
                </div>
                <div class="form-group mt-3">
                      <label for="">Choose Permission : </label>
                      @foreach (config('permissions.module_permission') as $module_permission)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="module_permission[]" type="checkbox" id="inlineCheckbox1" value="{{$module_permission}}"
                            @foreach ($permissions as $permission)
                                @if ( $permission == $module_permission)
                                    checked
                                @endif
                            @endforeach
                            >
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