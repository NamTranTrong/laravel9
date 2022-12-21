@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div>
        <div>
            <h1>Quản Lí Bài Viết</h1>
            <div style="border-bottom:1px solid #777">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                    <li class="breadcrumb-item active">Quản lí bài viết</li>
                    </ol>
                </nav>
            </div> 
        </div>
    </div>
    <div>
        <div>
            <a href="{{route('admin.get.create.article')}}">
                <button style="right:15px;top:50px;position: absolute;" type="button" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i>&nbspThêm mới</button>
            </a>
        </div>
        <div class="row" style="margin-top:20px"> 
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên bài viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Mô tả bài viết</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    @php 
                        $i=0;
                    @endphp
                    @if(isset($articles))
                        @foreach($articles as $article)
                        <tbody>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$article->a_name}}
                                    <ul>
                                        <li>Lượt xem :1000</li>
                                        <li>Ngày up : {{$article->updated_at}}</li>
                                    </ul>
                                </td>
                                <td>
                                    <img src="{{pare_url_file($article->a_avatar)}}" style="width:120px;height:120px" alt="">
                                </td>
                                <td style="width:30%">{{$article->a_description}}</td>
                                <td>
                                    <a style="text-decoration:none" href="{{route('admin.get.action.article',['active',$article->id])}}">
                                        <button class="{{$article->getStatus()['class']}}">{{$article->getStatus()['name']}}</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.edit.article',$article->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.action.article',['delete',$article->id])}}">
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