@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Bài viết </li>
                </ol>
        </nav>
</div>
<div class="row" style="margin:25px 0;padding-left:50%">
    <div class="col-sm-12">
        <form class="form-inline" action="">
            <div class="input-group rounded">
                <input type="text" class="form-control rounded" placeholder="Tên Bài Viết" name="name" value="{{\Request::get('name')}}"/>
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive">
        <h2>Quản lí bài viết <a href="{{route('admin.get.list.create.article')}}" class="float-end"><i class="fas fa-folder-plus btn btn-outline-dark">&nbspThêm mới</i></a></h2>
        <table class="table table-striped table-sm">
        <thead>
            <tr style="padding:10px 0px">
                <th scope="col">#</th>
                <th scope="col">Tên Bài Viết</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col" style="padding-left:60px">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @if(isset($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$article->a_name}}</td>
                        <td>
                            <img src=" {{pare_url_file($article->a_avatar)}}" alt=""  class="img img-reponsive" style="width:100px ; height:100px">  
                        </td>
                        <td>{{$article->a_description}}</td>
                        <td>
                            <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="{{$article->getStatus($article->a_active)['class']}}" style="--bs-btn-padding-y: .15rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                {{$article->getStatus($article->a_active)['name']}}
                            </a>
                        </td>
                        <td>{{$article->created_at}}</td>
                        <td>
                            <a href="{{route('admin.get.edit.article',$article->id)}}"><i style="padding: 5px 10px;border:1px solid #eee;" class="fas fa-edit">  Cập nhật</i></a>
                            <a href="{{route('admin.get.action.article',['delete',$article->id])}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-trash-alt">  Xóa</i></a>
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