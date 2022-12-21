@extends('admin::layouts.master')
@section('content')
    <input type="hidden" id="post_gallery" value="{{route('admin.store.gallery',$pro_id)}}">
    <input type="hidden" name="pro_id" value="{{$pro_id}}" id="get_pro_id">
    <form id="get-data-gallery" enctype="multipart/form-data" method="POST">
        <input name="files[]" type="file" multiple>
        <button type="submit" class="btn btn-primary">Tải ảnh</button>
        @csrf
    </form>

    <div id="upload_imgs">

    </div>
@stop