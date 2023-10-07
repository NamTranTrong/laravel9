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
                <div class="checkbox_permission">
                    <div class="form-check form-check-inline">
                        <label style="font-size:15px;font-style:italic" for="">Select All</label>
                        <input class="form-check-input" type="checkbox" id="checkbox_wrapper" >
                    </div>
                    @foreach ($getModules as $getModule )                
                            @foreach (config('permissions.module_table') as $module_table)
                                    @if($module_table === $getModule->name)
                                        <div>
                                            <label style="font-size:15px;font-style:italic" for="">{{$module_table}}</label>
                                        </div>
                                    @endif
                            @endforeach
                        @php
                            $permissionNames = $getModule->permissionChild;
                        @endphp    
                        @foreach ($permissionNames as $permissionName)     
                            <div class="form-check form-check-inline">
                                <input class="form-check-input checkbox_child" name="module_permission[]" type="checkbox" id="inlineCheckbox1" value="{{$permissionName->id}}"
                                    @foreach ($permissions as $permission)
                                        @if ($permissionName->name == $permission)
                                            checked
                                        @endif
                                    @endforeach
                                >
                                <label class="form-check-label" for="inlineCheckbox1">{{$permissionName->name}}</label>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin-js-css/role/edit/edit.js')}}"></script>
@endsection