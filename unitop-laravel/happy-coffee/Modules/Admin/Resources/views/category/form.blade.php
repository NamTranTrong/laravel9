<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="card-body card mb-4">
          <label class="form-lable" for=""><strong>Hình ảnh</strong></label>
          <input name="ca_avatar" type="file" onchange="readURL(this);" class="form-control">
          <img class="form-control mt-3" name="ca_avatar" id="input_img" style="width:250px;height:250px;margin-left:8%" src="{{asset(old("ca_avatar",isset($category->ca_avatar)?pare_url_file($category->ca_avatar):'img/no_img.jpg'))}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-body mb-4 card">
          <div>
            <label for="defaultFormControlInput" class="form-label"><strong>Tên danh mục</strong></label>
            <input type="text" name="ca_name" class="form-control" value="{{old('ca_name',isset($category->ca_name)? $category->ca_name : "")}}" placeholder="Thức ăn nhanh,..." aria-describedby="defaultFormControlHelp">
            @if($errors->has('ca_name'))
              <div class="error">
                  {{ $errors->first('ca_name') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
      <div class="form-check mt-2">
        <input class="form-check-input" name="ca_active" type="checkbox"  value="{{(old('ca_active',isset($category->ca_active)=="1"?1:""))}}" checked id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1"> Hiện danh mục </label>
      </div>
      <div>
        <button type="submit" class="btn btn-primary mt-2">Tạo danh mục</button>
      </div>
</form>

