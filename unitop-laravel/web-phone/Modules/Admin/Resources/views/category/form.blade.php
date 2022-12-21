<form action="" method="POST">
    @csrf
    <div class="mb-3 mt-3"> 
      <label for="name" class="form-label fw-bold" >Tên danh mục:</label>
      <input type="text" class="form-control" placeholder="Nhâp tên danh mục"  name="name" value="{{old("c_name",isset($category->c_name)?$category->c_name :'')}}" >
          @if($errors->has('name'))
          <div class="error-text">
              {{$errors->first('name')}};
          </div>
          @endif
    </div>
    <div class="mb-3 mt-3">
      <label for="icon" class="form-label fw-bold">Icon</label>
      <input type="text" class="form-control" placeholder="fa fa-icon" name="icon" value="{{old('c_icon',isset($category->c_icon)?$category->c_icon:'')}}">
          @if($errors->has('icon'))
          <div class="error-text">
              {{$errors->first('icon')}}
          </div>
          @endif
    </div>
    <div class="mb-3 mt-3"> 
      <label for="name" class="form-label fw-bold" >Meta title</label>
      <input type="text" class="form-control" placeholder="Meta title" name="c_title_seo" value="{{old('c_title_seo',isset($category->c_title_seo)?$category->c_title_seo:'')}}">
    </div>
    <div class="mb-3 mt-3"> 
      <label for="name" class="form-label fw-bold" >Meta description</label>
      <input type="text" class="form-control" placeholder="Meta Description" name="c_description_seo" value="{{old('c_description_seo',isset($category->c_description_seo)?$category->c_description_seo:'')}}">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label fw-normal">
        <input class="form-check-input " type="checkbox" name="outstanding">Nổi bật
      </label>
    </div>
    <button type="submit" class="btn btn-dark" >Lưu Danh Mục</button>
  </form>