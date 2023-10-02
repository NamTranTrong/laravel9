@extends('layouts.admin')

@section('content')
    @include('partials.content-header',['name' => 'Role','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('role.store')}}">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Ex: Admin, Editor, Client,...">
                </div>
                <div class="form-group">
                    <label>Enter Display Name</label>
                    <input class="form-control" name="display_name" placeholder="Ex: Quản lý hệ thống, chỉnh sửa nội dung,...">
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
                                    <input class="form-check-input" name="module_permission[]" type="checkbox" id="inlineCheckbox1" value="{{$permissionName->id}}">
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