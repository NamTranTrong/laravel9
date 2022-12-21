<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="mt-3">
                <label for="pro_name" class="form-label">Tên Sản Phẩm:</label>
                <input type="text" class="form-control" placeholder="Vd: Cà phê sữa đá, Cà phê sữa nóng..." name="pro_name" value="{{old("pro_name",isset($product->pro_name)?$product->pro_name:'')}}">
                    @if($errors->has('pro_name'))
                        <div class="error-text">
                            {{$errors->first('pro_name')}}
                        </div>
                    @enderror
                <label for="pro_price" class="form-label mt-3">Giá sản phẩm (vnd) :</label>
                <input type="text" class="form-control" placeholder="40.000" name='pro_price' value="{{old("pro_price",isset($product->pro_price)?$product->pro_price:'')}}">
                @if($errors->has('pro_price'))
                    <div class="error-text">
                        {{$errors->first('pro_price')}}
                    </div>
                @enderror
                <label for="pro_sale" class="form-label mt-3">Khuyến mãi (%):</label>
                <input type="text" class="form-control" placeholder="10" name='pro_sale' value="{{old("pro_sale",isset($product->pro_sale)?$product->pro_sale:'')}}">
                <div class="mb-3 mt-3">
                    <label for="icon" class="form-label">Mô tả Sản Phẩm </label>
                      <textarea name="pro_description" id="" cols="30" rows="4" placeholder="Nội dung sản phẩm" class="form-control">{{old('pro_description',isset($product->pro_description)?$product->pro_description:'')}}</textarea>
                  </div>
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Nổi bật
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Tên Danh Mục:</label>
                <select class="form-control" name="pro_category_id" id="">
                    <option value="">---Chọn Danh Mục---</option>
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
                @enderror
                <label for="pro_price" class="form-label mt-3">Hình ảnh:</label>
                <input type="file" name="avatar" class="form-control" value="{{old('avatar',isset($product->avatar)?$product->avatar:"")}}">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-dark btn-success" >Lưu Sản Phẩm</button>
</form>
