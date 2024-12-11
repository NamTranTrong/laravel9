@extends('layouts.admin')

@section('title')
    <title>Menu</title>
@endsection

@section('header-csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Menu', 'key' => 'List'])
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length"><label>Show entries
                                            <select class="form-control form-control-sm" id="mySelect">
                                                    <option value="">All</option>
                                                    {{--  <option {{ request()->get('paginateValue') == 3 ? 'selected' : '' }} value="3">3</option>
                                                    <option {{ request()->get('paginateValue') == 4 ? 'selected' : '' }} value="4">4</option>
                                                    <option {{ request()->get('paginateValue') == 5 ? 'selected' : '' }} value="5">5</option>  --}}
                                            </select></label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="bootstrap-data-table_sm" class="dataTables_filter row">
                                            <div class="col-auto">
                                                <label for="search-input" class="col-form-label">Search:</label>
                                            </div>
                                            <div class="col">
                                                <input id="search-input" type="search" class="form-control"
                                                    aria-controls="bootstrap-data-table">
                                            </div>
                                            <div class="col-auto">
                                                    <button type="button" class="btn btn-warning delete-selected"><i
                                                            class="fa-solid fa-minus"></i>&nbspDelete</button>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('menu.add') }}">
                                                    <button type="button" class="btn btn-info"><i
                                                            class="fa-regular fa-plus"></i>&nbspAdd</button>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="bootstrap-data-table"
                                            class="table table-striped table-bordered dataTable no-footer table-category" role="grid"
                                            aria-describedby="bootstrap-data-table_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>
                                                        <input type="checkbox" value="" class="form-control-input select-all">
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($menus as $menu)
                                                    <tr role="row">
                                                        <td class="col-1">
                                                            <input type="checkbox" value="{{$menu->id}}"
                                                                class="form-control-input category-checkbox">
                                                        </td>
                                                        <td class="col-8">{{$menu->name}}</td>
                                                        <td class="col-3">
                                                            <div class="d-flex justify-content-center">
                                                                <span class="mx-2">
                                                                    <a  href="{{route('menu.delete',['id' => $menu->id])}}" class="action_delete">
                                                                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-trash"></i>&nbspDelete</button>
                                                                    </a>
                                                                </span>
                                                                <span class="mx-2">
                                                                    <a href="{{route('menu.edit',['id' => $menu->id])}}" >
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
                                <div id="pagination" >
                                    {{$menus->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection
