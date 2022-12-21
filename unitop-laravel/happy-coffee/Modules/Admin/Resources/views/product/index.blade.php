@extends('admin::layouts.master')

@section('content')

<div class="alert alert-success" style="display:none"></div>
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản Phẩm /</span> Quản lí sản phẩm</h4>
    <div class="card">
        <div style="display:flex;justify-content:space-between">
            <h5 class="card-header">Product</h5>
            <a href="{{route('admin.get.create.product')}}" style="align-items:center;display:flex">
                <button type="submit" class="btn btn-primary me-2">Thêm mới</button>
            </a>
        </div>
       
        <div class="table-responsive text-nowrap">
          <table class="table table-light">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên Sản Phẩm</th>
                <th>Tiêu đề miêu tả</th>
                <th>Hình ảnh</th>
                <th>Gallery</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $i=0;
                @endphp
                @if(isset($products))
                    @foreach($products as $product)
                    <tr id="table-cate">
                        <td>
                            <div class="form-check">
                                {{$i}}
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3" checked="">
                            </div>    
                        </td>
                        <td><strong>{{$product->pro_name}}</strong></td>
                        <td>
                             {{$product->pro_description_seo}}
                        </td>
                        <td>
                            <img src="{{pare_url_file(isset($product->pro_avatar)?$product->avatar:"[N\A]")}}" style="width:120px;height:120px" alt="">
                        </td>
                        <td>
                            <a href="{{route('admin.get.create.gallery',$product->id)}}">
                                <button class="btn btn-primary"><i class="bx bx-edit-alt me-1"></i>Edit Gallery</button>
                            </a>
                            <div style="display:flex;overflow:hidden;" class="mt-3">
                                <img src="{{pare_url_file(isset($product->pro_avatar)?$product->avatar:"[N\A]")}}" style="width:50px;height:50px" alt="">
                                <img src="{{pare_url_file(isset($product->pro_avatar)?$product->avatar:"[N\A]")}}" style="width:50px;height:50px" alt="">
                                <img src="{{pare_url_file(isset($product->pro_avatar)?$product->avatar:"[N\A]")}}" style="width:50px;height:50px" alt="">
                            </div>
                        </td>
                        <td class="display:flex;justify-content:space-between">
                            <a href="{{route('admin.get.action.product',['hot',$product->id])}}">
                                <input type="hidden" value="{{$product->pro_active}}" id="getActive">
                                <button  class="{{$product->getHot()['class']}}" value="1" id="active" >{{$product->getHot()['name']}}</button>
                            </a>
                            <a href="{{route('admin.get.action.product',['active',$product->id])}}">
                                <input type="hidden" value="{{$product->pro_active}}" id="getActive">
                                <button  class="{{$product->getStatus()['class']}}" value="1" id="active" >{{$product->getStatus()['name']}}</button>
                            </a>
                        </td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.get.edit.product',[$product->id])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="bx bx-trash me-1"></i> Delete</a>
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
          {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
</div>
@stop
@section('script')

@stop
