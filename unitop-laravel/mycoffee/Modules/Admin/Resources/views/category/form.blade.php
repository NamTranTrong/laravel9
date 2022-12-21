<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3 mt-3">
                <label for="c_name" class="form-label">Tên Menu:</label>
                <input type="text" class="form-control" placeholder="Vd: Cà phê Việt Nam,Trà trái cây,..." name='c_name' value="{{old("c_name",isset($category->c_name)?$category->c_name:'')}}"  >
                @if($errors->has('c_name'))
                <div class="error-text">
                    {{$errors->first('c_name')}}
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
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Tên mục Menu:</label>
                <select class="form-control" name="ca_menu_id" id="">
                    <option value="">---Chọn mục Menu---</option>
                    @if(isset($menu_s))
                        @foreach($menu_s as $menu)                              
                            <option value="{{$menu->id}}" {{old('ca_menu_id',isset($category->ca_menu_id)?$category->ca_menu_id:'')==$menu->id?"selected='selected'":""}}>{{$menu->menu_name}}</option>
                        @endforeach
                    @endif     
                </select>
                @if($errors->has('ca_menu_id'))
                <div class="error-text">
                    {{$errors->first('ca_menu_id')}}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-dark btn-success" >Lưu Danh mục</button>
</form>
