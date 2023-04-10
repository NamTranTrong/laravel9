@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('content')
    <div class="content-wrapper" style="min-height: 358.4px;">
        @include('partials.content-header',['name' => 'Setting', 'key' => 'Danh sách'])
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle float-right mb-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Thêm mới
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('setting.create').'?type=text'}}">Text</a>
                      <a class="dropdown-item" href="{{route('setting.create').'?type=textarea'}}">Textarea</a>
                    </div>
                  </div>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Config Key</th>
                      <th scope="col">Config Value</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($settings as $setting )
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$setting->config_key}}</td>
                        <td>{{$setting->config_value}}</td>
                        <td>
                            <a href="{{route('setting.edit',['id' => $setting->id]).'?type=' . $setting->type}}" class="btn btn-default">Edit</a>
                            <a href="" data-url={{route('setting.delete',['id' => $setting->id])}} class="btn btn-danger action_delete">Delete</a>
                        </td>
                      </tr>
                    @php
                      $i++;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                {{ $settings->links('vendor.pagination.custom') }}
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin-css-js/setting/delete/delete.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

