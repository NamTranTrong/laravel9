@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin-js-css/product/create/create.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
@endsection

@section('content')
    @include('partials.content-header',['name' => 'Product','key' => 'Add'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('product.store')}}">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Ex: Quần, Áo, Nón,...">
                </div>
                <div class="form-group">
                    <label>Enter Price</label>
                    <input class="form-control" type="number" name="price" placeholder="Ex: 100000,200000,...">
                </div>
                <div class="form-group">
                    <label>Choose Category</label>
                    <select class="form-control" name="parent_id" id="">
                        <option value=""></option>
                        {!!$htmlSelect!!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Choose Tags</label>
                    <select class="js-example-tokenizer form-control" multiple="multiple" name="tags[]"></select>
                    </select>
                </div>
                <div class="form-group ">
                    <label>Enter Content</label>
                    <textarea name="content" class="form-control my-editor" style="height: 400px"></textarea>
                </div>
                <div class="form-group">
                    <label>Choose Main Picture</label>
                    <input class="form-control" type="file" name="feature_image_path">
                </div>
                <div class="form-group">
                    <label>Choose Details Pictures</label>
                    <input class="form-control" type="file" multiple name="img_path[]">
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('admin-js-css/product/create/create.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
@endsection