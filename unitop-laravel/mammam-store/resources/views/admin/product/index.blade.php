@extends('layouts.admin')

@section('title')
    <title>Sản Phẩm</title>
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'Sản Phẩm', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <a href="{{route('product.create')}}">
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
                      <th scope="col">Tên Danh Mục</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Danh Mục</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   {{--  @php
                       $i=0;
                   @endphp
                    @foreach ($categories as $category )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit',[$category->id])}}" class="btn btn-default">Edit</a>
                            <a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @php
                      $i++;
                    @endphp
                    @endforeach  --}}
                  </tbody>
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

