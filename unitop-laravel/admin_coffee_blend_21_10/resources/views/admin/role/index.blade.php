@extends('layouts.admin')

@section('title')
    <title>Role</title>
@endsection

@section('header-csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Role', 'key' => 'List'])
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
                                                <a href="{{ route('role.add') }}">
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
                                            class="table table-striped table-bordered dataTable no-footer table-category"
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
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Mô tả</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role)
                                                    <tr role="row">
                                                        <td class="col-1">
                                                            <input type="checkbox" value="{{ $role->id }}"
                                                                class="form-control-input category-checkbox">
                                                        </td>
                                                        <td class="col-2">{{ $role->name }}</td>
                                                        <td class="col-auto">{{$role->display_name}}</td>
                                                        <td class="col-2">
                                                            <div class="d-flex justify-content-center">
                                                                <span class="mx-2">
                                                                    <a data-url="{{ route('role.delete', ['id' => $role->id]) }}"
                                                                        class="action_delete">
                                                                        <button type="button" class="btn btn-warning"><i
                                                                                class="fa-solid fa-trash"></i>&nbspDelete</button>
                                                                    </a>
                                                                </span>
                                                                <span class="mx-2">
                                                                    <a href="{{ route('role.edit', ['id' => $role->id]) }}">
                                                                        <button type="button" class="btn btn-success"><i
                                                                                class="fa-solid fa-pen-to-square"></i>&nbspEdit</button>
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
                                    {{ $roles->links() }}
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
    {{--  <script src="{{asset('admin-js-css/user/delete/delete.js')}}"></script>  --}}
@endsection
