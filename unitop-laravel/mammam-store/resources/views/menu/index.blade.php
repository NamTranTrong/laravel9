@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'Menu', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <a href="{{route('menu.create')}}">
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
                      <th scope="col">Tên Menu</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  {{--  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($menus as $menu )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',[$category->id])}}" class="btn btn-default">Edit</a>
                            <a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @php
                      $i++;
                    @endphp
                    @endforeach
                  </tbody>  --}}
                </table>
              </div>
              {{--  <div class="col-md-12">
                {{ $categories->links('vendor.pagination.custom') }}
              </div>  --}}
            </div>
          </div>
        </div>
    </div>
@endsection

