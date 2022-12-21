<form action="" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="row">
    <div class="col-sm-8">
      <div class="mb-3 mt-3"> 
        <label for="a_name" class="form-label fw-bold" >Tên Bài Viết</label>
        <input type="text" class="form-control" placeholder="Nhâp tên bài viết"  name="a_name" value="{{old("a_name",isset($article->a_name)?$article->a_name :'')}}">
        @if($errors->has("a_name"))
          <div class="error-text">
              {{$errors->first("a_name")}}
          </div>
        @endif
      </div>
      <div class="mb-3 mt-3">
        <label for="a_content" class="form-label fw-bold">Mô Tả</label>
        <textarea name="a_content" id="" cols="30" rows="4" placeholder="Mô tả ngắn bài viết" class="form-control">{{old('a_content',isset($article->a_content)?$article->a_content:'')}}</textarea>
        @if($errors->has("a_content"))
          <div class="error-text">
              {{$errors->first("a_content")}}
          </div>
        @endif
      </div>
      <div class="mb-3 mt-3">
        <label for="a_description" class="form-label fw-bold">Nội Dung </label>
          <textarea name="a_description" id="" cols="30" rows="4" placeholder="Nội dung bài viết" class="form-control">{{old('a_description',isset($article->a_description)?$article->a_description:'')}}</textarea>
          @if($errors->has('a_description'))
            <div class="error-text">
                {{$errors->first('a_description')}}
            </div>
          @endif
      </div>
      <div class="mb-3 mt-3"> 
        <label for="a_title_seo" class="form-label fw-bold" >Meta Title</label>
        <input type="text" class="form-control" placeholder="Meta Title" name="a_title_seo" value="{{old('a_title_seo',isset($article->a_title_seo)?$article->a_title_seo:'')}}">
      </div>
      <div class="mb-3 mt-3"> 
        <label for="a_description_seo" class="form-label fw-bold" >Meta Description</label>
        <input type="text" class="form-control" placeholder="Meta Description" name="a_description_seo" value="{{old('a_description_seo',isset($article->a_description_seo)?$article->a_description_seo:'')}}">
      </div>
      <div class="mb-3 mt-3"> 
        <label for="name" class="form-label fw-bold" >Avatar</label> 
        <input type="file" class="form-control" name="avatar">
      </div>
      <button type="submit" class="btn btn-dark btn-success" >Lưu Sản Phẩm</button>
    </div>
  </form>