@extends('layouts.admin')

@section('title')
    <title>Order</title>
@endsection

@section('header-csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    @include('partials.breadcrumbs', ['name' => 'Order', 'key' => 'List'])
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
                                                        style="width: 238.2px;">Order Code</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Customer Name</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Date</th>

                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Total</th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 238.2px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 380.2px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr role="row">
                                                        <td class="col-1">
                                                            <input type="checkbox" value="{{ $order->id }}"
                                                                class="form-control-input category-checkbox">
                                                        </td>
                                                        <td class="col-1" style="color:aqua;font-size:12px;">
                                                            {{ $order->order_code }}</td>
                                                        <td class="col-2">
                                                            {{ $order->last_name . ' ' . $order->first_name }}
                                                        </td>
                                                        <td class="col-2">{{ $order->created_at }}</td>
                                                        <td class="col-2">{{ $order->total_price }}đ</td>
                                                        <td class="col-2 order-status" data-order-id={{$order->id}} data-status={{$order->status}} style="text-align:center">
                                                            <button type="button" data-status=0
                                                                class="btn btn-secondary status-btn">Chưa xử lý...
                                                            </button>
                                                            <button type="button" data-status=1
                                                                class="btn btn-primary status-btn ">Đang
                                                                xử lý...
                                                            </button>
                                                            <button type="button" data-status=2
                                                                class="btn btn-warning status-btn">Đang
                                                                giao hàng...
                                                            </button>
                                                            <button type="button" data-status=3
                                                                class="btn btn-success status-btn">Đã
                                                                giao...
                                                            </button>
                                                        </td>
                                                        <td class="col-2">
                                                            <div class="d-flex justify-content-center">
                                                                <span class="mx-2">
                                                                    <a href="" class="action_delete">
                                                                        <button type="button" class="btn btn-info"><i
                                                                                class="fa-solid fa-trash"></i>&nbspView</button>
                                                                    </a>
                                                                </span>
                                                                <span class="mx-2">
                                                                    <a href="">
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
                                    {{ $orders->links() }}
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
    <script src="{{asset('admin-js-css/order/order.js')}}"></script>
@endsection
