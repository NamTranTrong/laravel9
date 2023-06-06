@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin-js-css/product/create/create.css')}}">
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
                <div class="form-group ">
                    <label>Enter Content</label>
                    <div id="editor" ></div>
                </div>
                <div class="form-group">
                    <label>Choose Pictures</label>
                    <input class="form-control" type="file" multiple name="feature_image_path">
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
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
@endsection