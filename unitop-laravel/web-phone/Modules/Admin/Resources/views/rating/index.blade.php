@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản lí đánh giá</li>
                </ol>
        </nav>
</div>
<div class="table-responsive">
        <h2>Quản Lí Đánh Giá</h2>
        
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tên Sản phẩm</th>
                <th scope="col">Rating</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
        @php
            $i=0; 
        @endphp   
            @if(isset($ratings))
                @foreach($ratings as $rating)       
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{isset($rating->user->name)?$rating->user->name:"[N\A]"}}</td>
                        <td>{{isset($rating->product->pro_name)?$rating->product->pro_name:"[N\A]"}}</td>
                        <td>{{$rating->ra_number}}*</td>
                        <td>{{$rating->ra_content}}</td>
                        <td>
                            <a href="{{route('admin.get.action.category',['delete',$rating->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
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