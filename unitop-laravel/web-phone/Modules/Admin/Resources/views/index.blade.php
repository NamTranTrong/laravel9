@extends('admin::layouts.master')

@section('content')
             <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                            </button>
                        </div>
                    </div>
                    <h2>Section title</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <h2>Danh sách liên hệ mới nhất</h2>
                                
                                <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên Khách Hàng</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Trạng thái</th>
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
                                                <td>{{$contact->con_title}}</td>
                                                <td>{{$contact->con_content}}</td>
                                                <td>
                                                    <a href="{{route('admin.get.action.contact',['status',$contact->id])}}" class="{{$contact->getStatus($contact->con_status)['class']}}">
                                                        {{$contact->getStatus($contact->con_status)['name']}}
                                                    </a>
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
                        </div>
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <h2>Danh sách đánh giá mới nhất</h2>
                                
                                <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên khách hàng</th>
                                        <th scope="col">Tên Sản phẩm</th>
                                        <th scope="col">Rating</th>
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
                                            </tr>
                                            @php
                                            $i++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>                  
                        </div>
                        </div>
                    </div>

@endsection