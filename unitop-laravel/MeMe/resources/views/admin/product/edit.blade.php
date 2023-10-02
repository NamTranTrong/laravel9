@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin-js-css/product/edit/edit.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
@endsection

@section('content')
    @include('partials.content-header',['name' => 'Product','key' => 'Edit'])
    <div class="content">
        <div class="container">
            <form method="POST" action="{{route('product.update',['id' => $product->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Enter Name</label>
                  <input class="form-control" name="name" placeholder="Ex: Quần, Áo, Nón,..." value="{{$product->name}}">
                    @if ($errors->has('name'))
                            <div class="text-danger error">
                                <span style="font-style:italic"> *{{$errors->first('name')}}</span>
                            </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Enter Price</label>
                    <input class="form-control" type="number" name="price" placeholder="Ex: 100000,200000,..." value="{{$product->price}}">
                    @if ($errors->has('price'))
                        <div class="text-danger error">
                            <span style="font-style:italic"> *{{$errors->first('price')}}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Choose Category</label>
                    <select class="form-control" name="category_id" id="" value="{{old("category_id")}}">
                        <option value=""></option>
                        {!!$htmlSelectCategory!!}
                    </select>
                    @if ($errors->has('category_id'))
                        <div class="text-danger error">
                            <span style="font-style:italic"> *{{$errors->first('category_id')}}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Choose Tags</label>
                    <select class="js-example-tokenizer form-control" multiple="multiple" name="tags[]"> 
                        @foreach ($selectTags as $tag)
                            <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                        @endforeach
                        
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label>Enter Content</label>
                    <textarea name="content" class="form-control my-editor" style="height: 400px">{{$product->content}}</textarea>
                    @if ($errors->has('content'))
                        <div class="text-danger error">
                            <span style="font-style:italic"> *{{$errors->first('content')}}</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Choose Main Picture</label>
                    <input class="form-control" type="file" name="feature_image_path" value="{{old("feature_image_path")}}" >
                    <div class="image-main-product">
                        <img src="{{$product->feature_image_path}}" selected alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Choose Details Pictures</label>
                    <input class="form-control" type="file" multiple name="images[]" value="{{old("images[]")}}">
                    <div class="images-detail-product">
                        @foreach ($productDetailImagePath as $imageItem)
                            <img src="{{$imageItem->image_path}}" alt=""> 
                        @endforeach
                    </div>
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