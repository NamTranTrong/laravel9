$('.submit-search').on('click', function (e) {
    e.preventDefault(); // Ngăn form reload
    var searchValue = $('.value-search').val();

    if (!searchValue) {
        console.log('Input is empty');
        return;
    }

    console.log('Search Value:', searchValue);

    $.ajax({
        url: 'http://127.0.0.1:8000/admin/product/search',
        type: 'GET',
        data: { valueSearch: searchValue },
        success: function (response) {
            // Lấy phần tbody của table
            let tbody = $('table tbody');
            tbody.empty(); // Xóa nội dung cũ

            if (response.data.length === 0) {
                tbody.append('<tr><td colspan="6" class="text-center">Không tìm thấy kết quả.</td></tr>');
                return;
            }
            
          
            // Duyệt qua dữ liệu và thêm từng dòng vào table
            console.log(response); 
            console.log(response.data); 
            response.data.forEach(product => {
            

                const formattedPrice = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                  }).format(product.price);
                tbody.append(`
                     <tr role="row">
                        <td class="col-1">
                            <input type="checkbox" value="${product.id}" class="form-control-input category-checkbox">
                        </td>
                        <td class="col-2">${product.name}</td>
                        <td class="col-auto">${formattedPrice}</td>
                        <td class="col-3">
                            <div class="content-wrapper">
                                <div class="description">
                                    ${product.content}
                                </div>
                                <a href="javascript:void(0);" class="read-more">Xem thêm</a>
                            </div>
                        </td>
                        <td class="col-3 contain-imgs">
                            <div class="main-image">
                                <img src="${product.feature_image_path}" alt="Main Image">
                            </div>

                            <!-- Thẻ div nằm phía dưới cùng, chứa các ảnh nhỏ -->
                            <div class="thumbnail-container">
                                ${product.images.map(imageDetail => `
                                    <img src="${imageDetail.image_path}" alt="">
                                `).join('')}
                            </div>
                        </td>
                        <td class="col-auto">
                            <div class="d-flex justify-content-center">
                                <span class="mx-2">
                                    <a data-url="/admin/product/delete/${product.id}" class="action_delete">
                                        <button type="button" class="btn btn-warning">
                                            <i class="fa-solid fa-trash"></i>&nbsp;Delete
                                        </button>
                                    </a>
                                </span>
                                <span class="mx-2">
                                    <a href="/admin/product/edit/${product.id}">
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

            // function number_format(number) {
            //     return new Intl.NumberFormat('vi-VN').format(number);
            // }
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
});