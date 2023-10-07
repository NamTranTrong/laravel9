@extends('layouts.admin')

@section('content')
    @include('partials.content-header',["name" => "Role" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              <a href="{{route('role.create')}}" class="button-link">
                <button class="btn bg-gradient-info">
                  <span class="btn-inner--icon"><i class="fa-solid fa-plus pe-2"></i></span>
                  <span class="btn-inner--text">ADD</span>
                </button>
              </a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped"> 
                    <thead>
                      <tr class="text-center">
                        <th class="col-sm-1" scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Display Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role )
                      <tr class="text-center">
                        <th>{{$role->id}}</th>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>
                            <a data-url="{{route('role.delete',['id' => $role->id])}}" class="btn bg-gradient-danger action_delete">
                              <span class="btn-inner--icon"><i class="fa-solid fa-trash-can pe-2"></i></span>
                              <span class="btn-inner--text">Delete</span>
                            </a>
                            <a href="{{route('role.edit',['id' => $role->id])}}" class="btn bg-gradient-secondary">
                              <span class="btn-inner--icon"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i></span>
                              <span class="btn-inner--text">Edit</span>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div>
                  {{$roles->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin-js-css/category/delete/delete.js')}}"></script>
@endsection
