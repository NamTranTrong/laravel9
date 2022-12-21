<form action="" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="row">
    <div class="col-sm-8">
      <div class="mb-3 mt-3"> 
        <label for="pro_name" class="form-label fw-bold" >Tên Sản Phẩm</label>
        <input type="text" class="form-control" placeholder="Nhâp tên danh mục"  name="pro_name" value="{{old("pro_name",isset($product->pro_name)?$product->pro_name :'')}}">
        @if($errors->has("pro_name"))
          <div class="error-text">
              {{$errors->first("pro_name")}}
          </div>
        @endif
      </div>
      <div class="mb-3 mt-3">
        <label for="pro_content" class="form-label fw-bold">Mô Tả</label>
        <textarea name="pro_content" id="" cols="30" rows="4" placeholder="Mô tả ngắn sản phẩm" class="form-control">{{old('pro_content',isset($product->pro_content)?$product->pro_content:'')}}</textarea>
        @if($errors->has("pro_content"))
          <div class="error-text">
              {{$errors->first("pro_content")}}
          </div>
        @endif
      </div>
      <div class="mb-3 mt-3">
        <label for="icon" class="form-label fw-bold">Nội Dung </label>
          <textarea name="pro_description" id="" cols="30" rows="4" placeholder="Nội dung sản phẩm" class="form-control">{{old('pro_description',isset($product->pro_description)?$product->pro_description:'')}}</textarea>
          @if($errors->has('pro_description'))
            <div class="error-text">
                {{$errors->first('pro_description')}}
            </div>
          @endif
      </div>
      <div class="mb-3 mt-3"> 
        <label for="pro_title_seo" class="form-label fw-bold" >Meta Title</label>
        <input type="text" class="form-control" placeholder="Meta Title" name="pro_title_seo" value="{{old('pro_title_seo',isset($product->pro_title_seo)?$product->pro_title_seo:'')}}">
      </div>
      <div class="mb-3 mt-3"> 
        <label for="pro_description_seo" class="form-label fw-bold" >Meta Description</label>
        <input type="text" class="form-control" placeholder="Meta Description" name="pro_description_seo" value="{{old('pro_description_seo',isset($product->pro_description_seo)?$product->pro_description_seo:'')}}">
      </div>
      <button type="submit" class="btn btn-dark btn-success" >Lưu Sản Phẩm</button>
    </div>
    <div class="col-sm 4">
      <div class="mb-3 mt-3"> 
        <label for="pro_category_id" class="form-label fw-bold" >Loại Sản Phẩm</label>
          <select name="pro_category_id" id="" class="form-control">
              <option value="">---Chọn loại sản phẩm---</option>
              @if(isset($categories))
                @foreach($categories as $category)
                  <option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id)?$product->pro_category_id:'')==$category->id?"selected='selected'":""}}>{{$category->c_name}}</option>
                @endforeach
              @endif
          </select>
          @if($errors->has('pro_category_id'))
            <div class="error-text">
                {{$errors->first('pro_category_id')}}
            </div>
          @endif
      </div>
      <div class="mb-3 mt-3"> 
        <label for='pro_price' class="form-label fw-bold" >Giá Sản Phẩm</label> 
        <input type="number" class="form-control" placeholder="Giá sản phẩm" name='pro_price' value='{{old('pro_price',isset($product->pro_price)?$product->pro_price:'')}}'>
        @if($errors->has('pro_price'))
          <div class="error-text">
              {{$errors->first('pro_price')}}
          </div>
        @endif
      </div>
      <div class="mb-3 mt-3"> 
        <label for="pro_sale" class="form-label fw-bold" >% Khuyến Mãi</label> 
        <input type="number" class="form-control" placeholder="% Giảm giá" name="pro_sale" value="0">
      </div>
      <div class="mb-3 mt-3"> 
        <label for="name" class="form-label fw-bold" >Avatar</label> 
        <input type="file" class="form-control" name="avatar">
      </div>
    <div class="form-check mb-3">
      <label class="form-check-label fw-normal">
        <input class="form-check-input " type="checkbox" name="outstanding">Nổi Bật
      </label>
    </div>
   </div>
  </form>