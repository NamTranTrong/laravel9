    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 ">
                <div class="card-body card mb-4">
                    <div>
                        <label for="defaultFormControlInput" class="form-label"><strong>Tên Sản phẩm</strong></label>
                        <input type="text" name="pro_name" class="form-control" value="{{old('pro_name',isset($product->pro_name)? $product->pro_name : "")}}" placeholder="Gà rán, Dưa hấu,..." aria-describedby="defaultFormControlHelp">
                        @if($errors->has('pro_name'))
                            <div class="error">
                                {{ $errors->first('pro_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label"><strong>Mô tả sản phẩm</strong></label>
                        <textarea name="pro_description"  id="summernote" value="">{{old('pro_description',isset($product->pro_description)?$product->pro_description:"")}}</textarea>
                        @if($errors->has('pro_description'))
                            <div class="error">
                                {{ $errors->first('pro_description') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label"><strong>Mô tả tiêu đề sản phẩm</strong></label>
                        <textarea  name="pro_description_seo" id="summernote2"  value="">{{old('pro_description_seo',isset($product->pro_description_seo)?$product->pro_description_seo:"")}}</textarea>
                        @if($errors->has('pro_description_seo'))
                            <div class="error">
                                {{ $errors->first('pro_description_seo') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" value="1" name="pro_active" type="checkbox"  {{(old('pro_active',isset($product->pro_active)=="1"?1:"")) }} id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1"> Hiện Sản Phẩm </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" name="pro_hot" type="checkbox"  {{(old('pro_hot',isset($product->pro_hot)=="1"?1:""))}} id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1"> Sản Phẩm Hot </label>
                    </div>
                    <div> 
                        <button type="submit" class="btn btn-primary mt-2" >Tạo Sản Phẩm</button>
                    </div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="mb-4 card-body card">
                    <label for="defaultFormControlInput" class="form-label"><strong>Danh mục</strong></label>
                    <select id="largeSelect" name="pro_category_id"  class="form-select form-select-lg" >
                        <option value="">---Chọn Danh Mục---</option>
                        @if(isset($categories))
                            @foreach( $categories as $category )    
                                <option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id)?$product->pro_category_id:'')==$category->id?"selected='selected'":""}}>{{$category->ca_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('pro_category_id'))
                    <div class="error-text">
                        {{$errors->first('pro_category_id')}}
                    </div>
                  @endif
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label"><strong>Giá</strong></label>
                        <input name="pro_price" value="" {{number_format(old('pro_price',isset($product->pro_price)?$product->pro_price:0))}} class="form-control" placeholder="20,000vnd,..." type="text" id="formFileMultiple" multiple="">
                        @if($errors->has('pro_price'))
                            <div class="error">
                                {{ $errors->first('pro_price') }}
                            </div>
                         @endif
                    </div>
                    <div class="mt-3">
                        <label for="pro_avatar" class="form-label"><strong>Hình ảnh</strong></label>
                        <input onchange="readURL(this);" type="file" name="pro_avatar" class="form-control">
                        @if($errors->has('pro_avatar'))
                            <div class="error">
                                {{ $errors->first('pro_avatar') }}
                            </div>
                         @endif
                    </div>
                    <div class="mt-3">
                        <label for="pro_avatar" class="form-label"><strong>Hình ảnh</strong></label>
                        <input type="file" value="" name="files[]" id="gallery-photo-add" multiple class="form-control">
                    </div>
                    <div class="mt-3 form-control">
                        <img style="width:450px;height:450px;margin-left:%" id="input_img" src="{{asset('img\no_img.jpg')}}" alt="">
                    </div>
                    <div class="mt-3">
                       <div class="form-control gallery" style="display:flex;overflow:auto">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
@section('script')
<script src="{{asset('js/ckeditor.js')}}">
</script>
<script type="text/javascript">
    CKEDITOR.replace( 'summernote' );
    CKEDITOR.replace( 'summernote2' );
</script>


@stop


