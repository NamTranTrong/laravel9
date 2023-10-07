@extends('layouts.admin')

@section('content')
    @include('partials.content-header',["name" => "User" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              <a href="{{route('user.create')}}" class="button-link">
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
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user )
                      <tr class="text-center">
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{ $user->roles->pluck('name')->implode(', ') }}
                        </td>
                        </td>
                        <td>
                            <a data-url="{{route('user.delete',['id' => $user->id])}}" class="btn bg-gradient-danger action_delete">
                              <span class="btn-inner--icon"><i class="fa-solid fa-trash-can pe-2"></i></span>
                              <span class="btn-inner--text">Delete</span>
                            </a>
                            <a href="{{route('user.edit',['id' => $user->id])}}" class="btn bg-gradient-secondary">
                              <span class="btn-inner--icon"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i></span>
                              <span class="btn-inner--text">Edit</span>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div>
                  {{$users->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin-js-css/user/delete/delete.js')}}"></script>
@endsection
