@extends('admin::layouts.master')

@section('content')

<div class="alert alert-success" style="display:none"></div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục /</span> Quản lí danh mục</h4>
    <div class="card">
        <div style="display:flex;justify-content:space-between">
            <h5 class="card-header">Category</h5>
            <a href="{{route('admin.get.create.category')}}" style="align-items:center;display:flex">
                <button type="submit" class="btn btn-primary me-2">Thêm mới</button>
            </a>
        </div>
       
        <div class="table-responsive text-nowrap">
          <table class="table table-light">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $i=0;
                @endphp
                @if(isset($categories))
                    @foreach($categories as $category)
                    <tr id="table-cate">
                        <td>
                            <div class="form-check">
                                {{$i}}
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" checked="">
                            </div>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{$category->ca_name}}</strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <img style="width:120px;height:120px;margin-left:-38px" src="{{pare_url_file(isset($category->ca_avatar)?$category->ca_avatar:"[N\A]")}}" alt="">
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.category',['active',$category->id])}}">
                                {{-- <input type="hidden" value="{{$category->ca_active}}" id="getActive"> --}}
                                <button  class="{{$category->getStatus()['class']}}" value="1" id="active" >{{$category->getStatus()['name']}}</button>
                            </a>
                        </td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.get.edit.category',[$category->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                @endif
            </tbody>
          </table>
          {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
      </div>
@stop

{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            $(document).on('click','#active',function(){
                var cate_id = $(this).val();
                var ca_active = $(this).closest('#table-cate').find('#getActive').val();
               
                if(ca_active == 0 ){
                    ca_active = 1;
                }
                else{
                    ca_active = 0;
                }
                console.log(ca_active);
                var data = {
                    'cate_id'  : cate_id,
                    'ca_active' : ca_active,
                };

                $.ajax({
                    type: "GET",
                    url : "admin/category/"+cate_id,
                    data : "data",
                    success:function(response){
                        alert(response.message);
                    }
                });
            });   

        });
    </script> --}}
