@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{asset('admin-js-css/product/index/index.css')}}">
@endsection

@section('content')
    @include('partials.content-header',["name" => "Product" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              <a href="{{route('product.create')}}" class="button-link">
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
                        <th scope="col">Content</th>
                        <th scope="col">Piture</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{--  @foreach ($categories as $category )  --}}
                      <tr class="text-center">
                        <th>1</th>
                        <td>Áo khóa nam</td>
                        <td class="long-data">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt perspiciatis sed optio pariatur. Blanditiis placeat omnis, consectetur, accusamus eaque delectus illum sequi consequatur minima, aliquam commodi expedita necessitatibus nemo beatae!</td>
                        <td>Hình ảnh 1</td>
                        <td>
                            <a href="" class="btn bg-gradient-danger action_delete">
                              <span class="btn-inner--icon"><i class="fa-solid fa-trash-can pe-2"></i></span>
                              <span class="btn-inner--text">Delete</span>
                            </a>
                            <a href="" class="btn bg-gradient-secondary">
                              <span class="btn-inner--icon"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i></span>
                              <span class="btn-inner--text">Edit</span>
                            </a>
                        </td>
                      </tr>
                      {{--  @endforeach  --}}
                    </tbody>
                </table>
                <div>
                  {{--  {{$categories->links('vendor.pagination.bootstrap-5')}}  --}}
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
