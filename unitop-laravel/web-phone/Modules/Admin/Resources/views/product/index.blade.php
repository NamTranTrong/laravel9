@extends('admin::layouts.master')

@section('content')
    <style>
        .rating .active{
            color : #ffca08 !important;
        }
    </style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản Lí Sản Phẩm </li>
                </ol>
        </nav>
</div>
<div class="row" style="margin:25px 0;padding-left:50%">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="input-group rounded">
                <input type="text" class="form-control rounded" placeholder="Tên Sản Phẩm" name="name" value="{{\Request::get('name')}}"/>
                <select name="cate" id="" class="form-control rounded " style="margin-left:5px">
                    <option value="">---Danh Mục---</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{\Request::get('cate')==$category->id?"selected='selected'":""}}>{{$category->c_name}}</option>
                        @endforeach
                    @endif
                </select>
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive">
        <h2>Quản lí sản phẩm <a href="{{route('admin.get.list.create.product')}}" class="float-end"><i class="fas fa-folder-plus btn btn-outline-dark">&nbspThêm mới</i></a></h2>
        <table class="table table-striped table-sm">
        <thead>
            <tr style="padding:10px 0px">
                <th scope="col">#</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Loại Sản Phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Nổi bật</th>
                <th scope="col" style="padding-left:60px">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
             $i=0;
            @endphp
            @if(isset($products))
                @foreach($products as $product)
                    @php
                        $age=0;

                        if($product->pro_total_rating){
                            $age=round($product->pro_total_number/$product->pro_total_rating,2);
                        }
                    @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$product->pro_name}}
                            <ul>
                                <li><span><i class="fas fa-hand-holding-usd"></i></span><span> {{$product->pro_price}}$</span></li>
                                <li><span><i class="fas fa-tag"></i></span><span> {{$product->pro_sale}}%</span></li>
                                <li>
                                    <span>Đánh giá :</span>
                                    <span class="rating">
                                        @for($j=1;$j<=5;$j++)
                                            <i class="fas fa-star {{$j<= $age ? 'active' : ''}}" style="color:#999"></i>
                                        @endfor
                                    </span>
                                    <span style="color:#000">{{$age}}</span>
                                </li>
                            </ul>
                        </td>
                        <td>{{isset($product->category->c_name)?$product->category->c_name:'[N\A]'}}</td>
                        <td>
                            <img src="{{pare_url_file($product->pro_avatar)}}" alt="" class="img img-reponsive" style="width:100px ; height:100px">
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="{{$product->getStatus($product->pro_active)['class']}}" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                {{$product->getStatus($product->pro_active)['name']}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="{{$product->getHot($product->pro_hot)['class']}}" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                {{$product->getHot($product->pro_hot)['name']}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.edit.product',$product->id)}}"><i style="padding: 5px 10px;border:1px solid #eee;" class="fas fa-edit">  Cập nhật</i></a>
                            <a href="{{route('admin.get.action.product',['delete',$product->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            @endif
        </tbody>
    </table>                  
</div>
@endsection