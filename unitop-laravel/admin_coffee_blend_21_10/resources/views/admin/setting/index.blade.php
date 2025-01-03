@extends('layouts.admin')

@section('title')
    <title>Setting</title>
@endsection

@section('header-csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    {{--  <link rel="stylesheet" href="{{asset('admin-js-css/product/index/css/index.css')}}">  --}}
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Setting', 'key' => 'List'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <div id="bootstrap-data-table_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row pb-3">
                                    <div class="col-sm-5">
                                        <div class="dataTables_length" id="bootstrap-data-table_length"><label>Show entries
                                                <select class="form-control form-control-sm" id="mySelect">
                                                    <option value="">All</option>
                                                    <option {{ request()->get('paginateValue') == 2 ? 'selected' : '' }}
                                                        value="2">2</option>
                                                    <option {{ request()->get('paginateValue') == 3 ? 'selected' : '' }}
                                                        value="3">3</option>
                                                    <option {{ request()->get('paginateValue') == 4 ? 'selected' : '' }}
                                                        value="4">4</option>
                                                </select></label></div>
                                    </div>
                                    <div class="col-7">
                                        <div id="bootstrap-data-table_sm" class="dataTables_filter row align-items-center">
                                            <div class="col d-flex align-items-center ">
                                                <label for="search-input" class="col-form-label mr-2">Search:</label>
                                                <input id="search-input" type="search"
                                                    class="form-control me-3 value-search">
                                                <button type="button" class="btn btn-outline-info ml-2 submit-search"><i
                                                        class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-warning delete-selected">
                                                    <i class="fa-solid fa-minus"></i>&nbspDelete
                                                </button>
                                            </div>
                                            <div class="col-auto">
                                                <div class="dropdown">
                                                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      Add
                                                    </button>
                                                    <div class="dropdown-menu mt-5" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="{{route('setting.add')."?type=text"}}">Text</a>
                                                      <a class="dropdown-item" href="{{route('setting.add')."?type=textarea"}}">Textarea</a>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table"
                                            class="table table-striped table-bordered dataTable no-footer table-model"
                                            role="grid" aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>
                                                        <input type="checkbox" value=""
                                                            class="form-control-input select-all">
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">config_key</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">config_value</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($settings as $setting)
                                                    <tr role="row">
                                                        <td class="col-1">
                                                            <input type="checkbox" value="{{$setting->id}}"
                                                                class="form-control-input product-checkbox">
                                                        </td>
                                                        <td class="col-2">{{$setting->config_key}}</td>
                                                        <td class="col-6">
                                                            {!!$setting->config_value!!}
                                                        </td>
                                                        <td class="col-auto">
                                                            <div class="d-flex justify-content-center">
                                                                <span class="mx-2">
                                                                    <a  data-url="{{route('setting.delete',['id' => $setting->id])}}" class="action_delete">
                                                                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-trash"></i>&nbspDelete</button>
                                                                    </a>
                                                                </span>
                                                                <span class="mx-2">
                                                                    <a href="{{route('setting.edit',['id' => $setting->id])."?type=".$setting->type}}" >
                                                                        <button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>&nbspEdit</button>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="pagination">
                                    {{$settings->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection

@section('js')
    <script src="{{asset('admin-js-css/setting/delete/delete.js')}}"></script>
@endsection
