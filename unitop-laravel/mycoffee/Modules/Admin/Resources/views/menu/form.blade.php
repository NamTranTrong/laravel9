<form  action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Tên Menu:</label>
                <input type="text" class="form-control" placeholder="Vd: Cà phê, Trà ..." name="menu_name" value="{{old("menu_name",isset($menu->menu_name)?$menu->menu_name:'')}}"  >
                @if($errors->has('menu_name'))
                    <div class="error-text">
                        {{$errors->first('menu_name')}}
                    </div>  
                @enderror
            </div>
            {{-- <div class="form-check mb-3">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div> --}}
             <button type="submit" class="mt-3 btn btn-outline-dark">Lưu Sản Phẩm</button>
        </div>
    </div>
</form>
