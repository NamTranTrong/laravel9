<table id="bootstrap-data-table"
class="table table-striped table-bordered dataTable no-footer table-category" role="grid"
aria-describedby="bootstrap-data-table_info">
<thead>
    <tr role="row">
        <th>
            <input type="checkbox" value="" class="form-control-input select-all">
        </th>
        <th class="sorting_asc" tabindex="0"
            aria-controls="bootstrap-data-table" rowspan="1" colspan="1"
            aria-sort="ascending"
            aria-label="Name: activate to sort column descending"
            style="width: 238.2px;">Name</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
            rowspan="1" colspan="1"
            aria-label="Position: activate to sort column ascending"
            style="width: 380.2px;">Action</th>
    </tr>
</thead>
<tbody>
        @foreach ($categories as $category)
        <tr role="row">
            <td class="col-1">
                <input type="checkbox" value="{{$category->id}}"
                    class="form-control-input category-checkbox">
            </td>
            <td class="col-8">{{$category->name}}</td>
            <td class="col-3">
                <div class="d-flex justify-content-center">
                    <span class="mx-2">
                        <a  data-url="{{route('category.delete',['id' => $category->id])}}" class="action_delete">
                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-trash"></i>&nbspDelete</button>
                        </a>
                    </span>
                    <span class="mx-2">
                        <a href="{{route('category.edit',['id' => $category->id])}}" >
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>&nbspEdit</button>
                        </a>
                    </span>
                </div>
            </td>
        </tr>
        @endforeach
</tbody>
</table>