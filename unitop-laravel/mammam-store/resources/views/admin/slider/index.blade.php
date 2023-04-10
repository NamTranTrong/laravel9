@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin-css-js/slider/index/index.js')}}"></script>
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('admin-css-js/slider/index/index.css')}}">
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'Slider', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <a href="{{route('slider.create')}}">
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
                      <th scope="col">Tên</th>
                      <th scope="col">Description</th>
                      <th scope="col">Hình ảnh</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($sliders as $slider )
                      <tr style="table-layout: fixed; width: 100%;">
                        <th style="width: 5%;" scope="row">{{$i}}</th>
                        <td style="width: 15%;">{{$slider->name}}</td>
                        <td style="width: 30%;">{{$slider->description}}</td>
                        <td style="width: 30%;">
                          <img src="{{$slider->image_path}}" class="img_150_100" alt="">
                        </td>
                        <td style="width: 20%;">
                            <a href="{{route('slider.edit',['id' => $slider->id])}}" class="btn btn-default">Edit</a>
                            <a data-url="{{route('slider.delete',['id' => $slider->id])}}" class="btn btn-danger action_delete">Delete</a>
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
                {{ $sliders->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

