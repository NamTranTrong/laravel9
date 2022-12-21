@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div>
        <div>
            <h1>Quản Lí Danh Mục</h1>
            <div style="border-bottom:1px solid #777">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                    <li class="breadcrumb-item active">Quản lí danh mục</li>
                    </ol>
                </nav>
            </div> 
        </div>
    </div>
    <div>
        <div>
            <a href="{{route('admin.get.create.category')}}">
                <button style="right:15px;top:50px;position: absolute;" type="button" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i>&nbspThêm mới</button>
            </a>
        </div>
        <div class="row" style="margin-top:20px"> 
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Tên mục Menu</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    @php 
                        $i=0;
                    @endphp
                    @if(isset($categories))
                        @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$category->c_name}}</td>
                                <td>{{isset($category->menu->menu_name)?$category->menu->menu_name:"[N\A]"}}</td>
                                <td>
                                    <a href="{{route('admin.get.action.category',['active',$category->id])}}">
                                         <button class="{{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</button>
                                    </a>
                                </td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.edit.category',$category->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.action.category',['delete',$category->id])}}">
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