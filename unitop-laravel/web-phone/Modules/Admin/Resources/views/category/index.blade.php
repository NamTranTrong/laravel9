@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Quản lí danh mục</li>
                </ol>
        </nav>
</div>
<div class="table-responsive">
        <h2>Quản lí danh mục <a href="{{route('admin.get.list.create.category')}}" class="float-end"><i class="fas fa-folder-plus btn btn-outline-dark">&nbspThêm mới</i></a></h2>
        
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Title Seo</th>
                <th scope="col">Description Seo</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" style="padding-left:60px">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @if(isset($categories))
                @foreach($categories as $category)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$category->c_name}}</td>
                    <td>{{$category->c_title_seo}}</td>
                    <td>{{$category->c_description_seo}}</td>
                    <td><a href="" class="{{$category->getStatus($category->c_active)['class']}}" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">{{$category->getStatus($category->c_active)['name']}}</a></td>
                    <td>
                        <a href="{{route('admin.get.edit.category',$category->id)}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-edit">  Cập nhật</i></a>
                        <a href="{{route('admin.get.action.category',['delete',$category->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
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