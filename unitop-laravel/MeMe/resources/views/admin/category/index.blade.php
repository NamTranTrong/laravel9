@extends('layouts.admin')



@section('content')
    @include('partials.content-header',["name" => "Category" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              <a href="{{route('category.create')}}">
                <button class="btn bg-gradient-info ms-md-auto d-flex">
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
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category )
                      <tr class="text-center">
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="" class="btn bg-gradient-danger">
                              <span class="btn-inner--icon"><i class="fa-solid fa-trash-can pe-2"></i></span>
                              <span class="btn-inner--text">Delete</span>
                            </a>
                            <a href="{{route('category.edit',['id' => $category->id])}}" class="btn bg-gradient-secondary">
                              <span class="btn-inner--icon"><i class="fa-sharp fa-solid fa-pen-to-square pe-2"></i></span>
                              <span class="btn-inner--text">Edit</span>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                <div>
                  {{$categories->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
      </div>
    </div>


@endsection