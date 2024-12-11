$('.submit-search').on('click', function (e) {
    e.preventDefault(); // Ngăn form reload
    var searchValue = $('.value-search').val();

    if (!searchValue) {
        console.log('Input is empty');
        return;
    }

    console.log('Search Value:', searchValue);

    $.ajax({
        url: 'http://127.0.0.1:8000/admin/category/search',
        type: 'GET',
        data: { valueSearch: searchValue },
        success: function (response) {
            // Lấy phần tbody của table
            let tbody = $('table tbody');
            tbody.empty(); // Xóa nội dung cũ
        
            if (response.data.length === 0) {
                tbody.append('<tr><td colspan="3" class="text-center">Không tìm thấy kết quả.</td></tr>');
                return;
            }
        
            // Duyệt qua dữ liệu và thêm từng dòng vào table
            response.data.forEach(category => {
                tbody.append(`
                    <tr role="row">
                        <td class="col-1">
                            <input type="checkbox" value="${category.id}" class="form-control-input category-checkbox">
                        </td>
                        <td class="col-8">${category.name}</td>
                        <td class="col-3">
                            <div class="d-flex justify-content-center">
                                <span class="mx-2">
                                    <a data-url="admin/category/delete/${category.id}" class="action_delete">
                                        <button type="button" class="btn btn-warning">
                                            <i class="fa-solid fa-trash"></i>&nbsp;Delete
                                        </button>
                                    </a>
                                </span>
                                <span class="mx-2">
                                    <a href="admin/category/edit/${category.id}">
                                        <button type="button" class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit
                                        </button>
                                    </a>
                                </span>
                            </div>
                        </td>
                    </tr>
                `);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
});