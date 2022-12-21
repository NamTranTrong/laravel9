@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div>
        <div>
            <h1>Quản Lí Sản Phẩm</h1>
            <div style="border-bottom:1px solid #777">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Quản lí sản phẩm</li>
                    </ol>
                </nav>
            </div> 
        </div>
    </div>
    <div>
        <div>
            <a href="{{route('admin.get.create.product')}}">
                <button style="right:15px;top:50px;position: absolute;" type="button" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i>&nbspThêm mới</button>
            </a>
        </div>
        <div class="row" style="margin-top:20px"> 
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Mô tả sản phẩm</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    @php 
                        $i=0;
                    @endphp
                    @if(isset($products))
                        @foreach($products as $product)
                        <tbody>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$product->pro_name}}
                                    <ul>
                                        <li>Giá : {{number_format($product->pro_price),0,'',''}}đ</li>
                                        <li>Khuyến mãi : {{$product->pro_sale}}%</li>
                                        <li>Danh mục: {{$product->category->c_name}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="{{pare_url_file($product->avatar)}}" style="width:120px;height:120px" alt="">
                                </td>
                                <td style="width:30%">{{$product->pro_description}}</td>
                                <td>
                                    <a style="text-decoration:none" href="{{route('admin.get.action.product',['active',$product->id])}}">
                                        <button class="{{$product->getStatus()['class']}}">{{$product->getStatus()['name']}}</button>
                                    </a>
                                    <a href="{{route('admin.get.action.product',['hot',$product->id])}}">
                                        <button class="{{$product->getHot()['class']}}">{{$product->getHot()['name']}}</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.edit.product',$product->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.action.product',['delete',$product->id])}}">
                                                <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                            @php 
                                $i++;
                            @endphp
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@stop