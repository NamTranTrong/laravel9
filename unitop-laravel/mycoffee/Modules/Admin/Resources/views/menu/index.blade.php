@extends('admin::layouts.master')
@section('content')
<div class="container">
    <div>
        <div>
            <h1>Quản Lí Menu</h1>
            <div style="border-bottom:1px solid #777">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Menu</a></li>
                    <li class="breadcrumb-item active">Quản lí Menu</li>
                    </ol>
                </nav>
            </div> 
        </div>
    </div>
    <div>
        <div>
            <a href="{{route('admin.get.create.menu')}}">
                <button style="right:15px;top:50px;position: absolute;" type="button" class="btn btn-outline-dark"><i class="fa-solid fa-plus"></i>&nbspThêm mới</button>
            </a>
        </div>
        <div class="row" style="margin-top:20px"> 
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên mục trong Menu</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    @php 
                        $i=0;
                    @endphp
                    @if(isset($menu_s))
                        @foreach($menu_s as $menu)
                        <tbody>
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$menu->menu_name}}</td>
                                <td>
                                    <!-- Call to action buttons -->
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.edit.menu',$menu->id)}}">
                                                <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{route('admin.get.action.menu',['delete',$menu->id])}}">
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