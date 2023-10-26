@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" href="{{asset('admin-js-css/slide/index/index.css')}}">
@endsection

@section('content')
    @include('partials.content-header',["name" => "Slide" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              <a href="{{route('slide.create')}}" class="button-link">
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
                      @foreach ($slides as $slide )
                      <tr class="text-center">
                        <th class="vertical-align-middle">1</th>
                        <td class="vertical-align-middle">{{$slide->name}}</td>
                        <td class="long-data vertical-align-middle">
                          <div class="product-content">
                            {{$slide->description}}
                          </div>
                          <div id="collapse-target" tabindex="-1"></div>
                        </td>
                        <td class="vertical-align-middle">
                          <img style="width:170px;height:200px;" src="{{$slide->image_path}}" alt="">
                        </td>
                        <td class="vertical-align-middle">
                            <a data-url="" class="btn bg-gradient-danger action_delete">
                              <span class="btn-inner--icon"><i class="fa-solid fa-trash-can pe-2"></i></span>
                              <span class="btn-inner--text">Delete</span>
                            </a>
                            <a href="{{route('slide.edit',['id' => $slide->id])}}" class="btn bg-gradient-secondary">
                              <span class="btn-inner--icon"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i></span>
                              <span class="btn-inner--text">Edit</span>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div>
                  {{$slides->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
@endsection
