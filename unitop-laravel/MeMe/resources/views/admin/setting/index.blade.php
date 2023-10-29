@extends('layouts.admin')

@section('content')
    @include('partials.content-header',["name" => "Setting" , "key" => "List"])
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-3">
              {{--  <a href="{{route('setting.create')}}" class="button-link">
                <button class="btn bg-gradient-info">
                  <span class="btn-inner--icon"><i class="fa-solid fa-plus pe-2"></i></span>
                  <span class="btn-inner--text">ADD</span>
                </button>
              </a>  --}}
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
              
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>              
            </div>
            <div class="col-md-12">
                <table class="table table-striped"> 
                    <thead>
                      <tr class="text-center">
                        <th class="col-sm-1" scope="col">#</th>
                        <th scope="col">Config_key</th>
                        <th scope="col">Config_value</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{--  @foreach ($users as $user )  --}}
                      <tr class="text-center">
                        <th>1</th>
                        <td>contact_phone</td>
                        <td>0937197829</td>
                        </td>
                        <td>
                            <a class="btn bg-gradient-danger action_delete">
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
                  {{--  {{$users->links('vendor.pagination.bootstrap-5')}}  --}}
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
