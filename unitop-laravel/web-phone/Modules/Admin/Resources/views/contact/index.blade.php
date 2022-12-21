@extends('admin::layouts.master')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route ('admin.home')}}">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Thông tin liên hệ</li>
                </ol>
        </nav>
</div>
<div class="table-responsive">
        <h2>Thông Tin Liên Hệ</h2>
        
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @if(isset($contacts))
                @foreach($contacts as $contact)       
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$contact->con_name}}</td>
                        <td>{{$contact->con_email}}</td>
                        <td>{{$contact->con_title}}</td>
                        <td>{{$contact->con_content}}</td>
                        <td>
                            <a href="{{route('admin.get.action.contact',['status',$contact->id])}}" class="{{$contact->getStatus($contact->con_status)['class']}}">
                                {{$contact->getStatus($contact->con_status)['name']}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.edit.category',$contact->id)}}"><i style="padding: 5px 10px;border:1px solid #eee" class="fas fa-edit">  Cập nhật</i></a>
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