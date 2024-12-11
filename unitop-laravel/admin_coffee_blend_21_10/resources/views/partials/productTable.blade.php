<table id="bootstrap-data-table"
class="table table-striped table-bordered dataTable no-footer table-category"
role="grid" aria-describedby="bootstrap-data-table_info">
<thead>
    <tr role="row">
        <th>
            <input type="checkbox" value=""
                class="form-control-input select-all">
        </th>
        <th class="sorting_asc" tabindex="0"
            aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
            aria-sort="ascending"
            aria-label="Name: activate to sort column descending"
            style="width: 238.2px;">Name</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
            rowspan="1" colspan="1"
            aria-label="Position: activate to sort column ascending"
            style="width: 380.2px;">Price</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
            rowspan="1" colspan="1"
            aria-label="Position: activate to sort column ascending"
            style="width: 380.2px;">Description</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
            rowspan="1" colspan="1"
            aria-label="Position: activate to sort column ascending"
            style="width: 380.2px;">Picture</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
            rowspan="1" colspan="1"
            aria-label="Position: activate to sort column ascending"
            style="width: 380.2px;">Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($products as $product)
        <tr role="row">
            <td class="col-1">
                <input type="checkbox" value="{{$product->id}}"
                    class="form-control-input category-checkbox">
            </td>
            <td class="col-2">{{$product->name}}</td>
            <td class="col-auto">{{number_format($product->price)}} vnđ</td>
            <td class="col-3">
                <div class="content-wrapper">
                    <div class="description">
                        {!!$product->content!!}
                    </div>
                    <a href="javascript:void(0);" class="read-more">Xem thêm</a>
                </div>
            </td>
            <td class="col-3 contain-imgs">
                <div class="main-image">
                    <img src="{{$product->feature_image_path}}" alt="Main Image">
                </div>
    
                <!-- Thẻ div nằm phía dưới cùng, chứa các ảnh nhỏ -->
                <div class="thumbnail-container">
                    @foreach ($product->images as $imageDetail)
                        <img src="{{$imageDetail->image_path}}" alt="">
                    @endforeach
                </div>
            </td>
            <td class="col-auto">
                <div class="d-flex justify-content-center">
                    <span class="mx-2">
                        <a  data-url="{{route('product.delete',['id' => $product->id])}}" class="action_delete">
                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-trash"></i>&nbspDelete</button>
                        </a>
                    </span>
                    <span class="mx-2">
                        <a href="{{route('product.edit',['id' => $product->id])}}" >
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>&nbspEdit</button>
                        </a>
                    </span>
                </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>