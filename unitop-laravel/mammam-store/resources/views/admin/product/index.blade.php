@extends('layouts.admin')

@section('title')
    <title>Sản Phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin-css-js/product/index/list.css')}}">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('admin-css-js/product/index/list.js')}}"></script>
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
                      <th scope="col">Tên Sản Phẩm</th>
                      <th scope="col">Giá</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Danh Mục</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($products as $product )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{number_format(floatval($product->price), 2, '.', ',')}}</td>
                        <td>
                          <img src="{{$product->feature_image_path}}" class="img_150_100" alt="">
                        </td>
                        <td>{{optional($product->category)->name}}</td>
                        <td>
                            <a href="{{route('product.edit',[$product->id])}}" class="btn btn-default">Edit</a>
                            <a href="" data-url="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger action_delete">Delete</a>
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
                {{ $products->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

