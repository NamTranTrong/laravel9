@extends('layouts.admin')

@section('title')
    <title>Create Setting</title>
@endsection

@section('css')
    {{--  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  --}}
@endsection


@section('content')
    @include('partials.breadcrumbs', ['name' => 'Setting', 'key' => 'Edit'])
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Chỉnh Sửa Setting</strong>
                        </div>
                        <form action="{{ route('setting.update', ['id' => $setting->id]) . '?type=' . request()->type }}"
                            method="POST">
                            @csrf
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Config Key<span
                                            style="color:red">&nbsp;*</span></label><input
                                        value="{{ $setting->config_key }}" type="text" name="config_key"
                                        placeholder="Nhập Config Key" class="form-control ">
                                </div>
                                @if ($setting->type === 'text')
                                    <div class="form-group"><label for="company" class=" form-control-label">Config
                                            Value<span style="color:red">&nbsp;*</span></label><input
                                            value="{{ $setting->config_value }}" type="text" name="config_value"
                                            placeholder="Nhập Config Value" class="form-control ">
                                    </div>
                                @elseif ($setting->type === 'textarea')
                                    <div class="form-group"><label for="company" class=" form-control-label">Config
                                            Value<span style="color:red">&nbsp;*</span></label>
                                        <textarea class="form-control" name="config_value" id="" cols="20" rows="4"
                                            placeholder="Nhập Config Value">{{ $setting->config_value }}</textarea>
                                    </div>
                                @endif
                                <div class="mt-4 form-actions form-group">
                                    <button type="submit"
                                        class="btn btn-outline-success btn-sm pt-2 pb-2 pl-3 pr-3">Lưu</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.1/tinymce.min.js"></script>
    {{--  <script src="{{ asset('admin-js-css/product/create/create.js') }}"></script>  --}}
@endsection
