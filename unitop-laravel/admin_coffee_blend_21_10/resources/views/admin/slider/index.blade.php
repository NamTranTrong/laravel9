@extends('layouts.admin')

@section('title')
    <title>Slider</title>
@endsection

@section('header-csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    {{--  <link rel="stylesheet" href="{{asset('admin-js-css/product/index/css/index.css')}}">  --}}
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Slider', 'key' => 'List'])
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
                                                <a href="{{ route('slider.add') }}">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa-regular fa-plus"></i>&nbspAdd
                                                    </button>
                                                </a>
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
                                                        style="width: 238.2px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Picture</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sliders as $slider)
                                                    <tr role="row">
                                                        <td class="col-1">
                                                            <input type="checkbox" value="{{$slider->id}}"
                                                                class="form-control-input product-checkbox">
                                                        </td>
                                                        <td class="col-2">{{$slider->name}}</td>
                                                        <td class="col-3">
                                                            {!!$slider->description!!}
                                                        </td>
                                                        <td>
                                                            <img src="{{$slider->image_path}}" style="width: 300px;height:80px" alt="">
                                                        </td>
                                                        <td class="col-auto">
                                                            <div class="d-flex justify-content-center">
                                                                <span class="mx-2">
                                                                    <a  data-url="{{route('slider.delete',['id' => $slider->id])}}" class="action_delete">
                                                                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-trash"></i>&nbspDelete</button>
                                                                    </a>
                                                                </span>
                                                                <span class="mx-2">
                                                                    <a href="{{route('slider.edit',['id' => $slider->id])}}" >
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
                                    {{$sliders->links()}}
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
    <script src="{{asset('admin-js-css/slider/delete/delete.js')}}"></script>
@endsection