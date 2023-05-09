@extends('layouts.admin')

@section('title')
    <title>Role</title>
@endsection



@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'Role', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <a href="{{route('role.create')}}">
                  <button class="btn btn-success float-right mb-2">
                  Thêm mới
                  </button>
                </a>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên Vai Trò</th>
                      <th scope="col">Mô tả Vai Trò</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($roles as $role )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>
                            <a href="{{route('role.edit',['id' => $role->id])}}" class="btn btn-default">Edit</a>
                            <a href="" data-url={{route('role.delete',['id' => $role->id])}} class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                    @php
                      $i++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                {{ $roles->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection


@section('js')
  <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admin-css-js/role/delete/delete.js')}}"></script>
@endsection
