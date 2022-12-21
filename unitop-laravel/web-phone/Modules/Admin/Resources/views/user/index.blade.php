@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản lí khách hàng</li>
                </ol>
        </nav>
</div>
<div class="table-responsive">
        <h2>Quản Lí Khách Hàng <a href="{{route('admin.get.list.create.category')}}" class="float-end"><i class="fas fa-folder-plus btn btn-outline-dark">&nbspThêm mới</i></a></h2>
        
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col" style="padding-left:60px">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
            @if(isset($users))
                @foreach($users as $user)       
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->avatar}}</td>
                        <td>
                            <a href="{{route('admin.get.edit.category',$user->id)}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-edit">  Cập nhật</i></a>
                            <a href="{{route('admin.get.action.category',['delete',$user->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            @php
                $i++;
            @endphp
        </tbody>
    </table>                  
</div>
@endsection