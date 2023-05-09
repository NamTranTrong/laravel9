@extends('layouts.admin')

@section('title')
    <title>User</title>
@endsection



@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'User', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <a href="{{route('user.create')}}">
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
                      <th scope="col">Tên User</th>
                      <th scope="col">Gmail</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($users as $user )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('user.edit',['id' => $user->id])}}" class="btn btn-default">Edit</a>
                            <a href="" data-url={{route('user.delete',['id' => $user->id])}} class="btn btn-danger action_delete">Delete</a>
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
                {{ $users->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection


@section('js')
  <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admin-css-js/user/delete/delete.js')}}"></script>
@endsection
