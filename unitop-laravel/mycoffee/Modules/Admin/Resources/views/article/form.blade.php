<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="mt-3">
                <label for="a_name" class="form-label">Tên Bài Viết:</label>
                <input type="text" class="form-control" placeholder="Vd: Tại sao cà phê có màu đen,..." name="a_name" value="{{old("a_name",isset($article->a_name)?$article->a_name:'')}}">
                    @if($errors->has('a_name'))
                        <div class="error-text">
                            {{$errors->first('a_name')}}
                        </div>
                    @enderror
                <div class="mb-3 mt-3">
                    <label for="icon" class="form-label">Mô tả Bài Viết</label>
                    <textarea name="a_description" id="" cols="30" rows="4" placeholder="Mô tả bài viết" class="form-control">{{old('a_description',isset($article->a_description)?$article->a_description:'')}}</textarea>
                    @if($errors->has('a_description'))
                        <div class="error-text">
                            {{$errors->first('a_description')}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 mt-3">
                     <label for="icon" class="form-label">Nội dung Bài viết</label>
                      <textarea name="a_content" id="" cols="30" rows="4" placeholder="Nội dung bài viết" class="form-control">{{old('a_content',isset($article->a_content)?$article->a_content:'')}}</textarea>
                </div>
                    @if($errors->has('a_content'))
                        <div class="error-text">
                            {{$errors->first('a_content')}}
                        </div>
                    @enderror
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Nổi bật
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <label for="pro_price" class="form-label mt-3">Hình ảnh:</label>
            <input type="file" name="a_avatar" class="form-control" value="{{old('avatar',isset($product->avatar)?$product->avatar:"")}}">
            @if($errors->has('a_avatar'))
                <div class="error-text">
                    {{$errors->first('a_avatar')}}
                </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-dark btn-success" >Lưu Bài Viết</button>
</form>
