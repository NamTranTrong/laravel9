$(document).ready(function () {
    // Khi người dùng click vào một danh mục
    $('#category-list a').click(function (e) {
        e.preventDefault(); // Ngăn không cho tải lại trang

        var categoryId = $(this).data('id'); // Lấy id của category

        // Gửi yêu cầu AJAX
        $.ajax({
            url:  '/collection/'+ categoryId, // Đường dẫn lấy sản phẩm
            type: 'GET',
            dataType: 'json',
            success: function (products) {
                var productList = $('.product-list');
                productList.empty(); // Xóa nội dung cũ trong #product-list

                if (products.length > 0) {
                    var productHTML = '<div class="product-list"><div class="row">';

                    // Duyệt qua danh sách sản phẩm và tạo HTML
                    $.each(products, function (index, product) {
                        var imageUrl = baseUrl + product.feature_image_path;
    
                        // Kiểm tra và in ra đường dẫn trong console
                        console.log("Image URL: ", imageUrl); // In đường dẫn ảnh vào console
                        productHTML += `
                                                   <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="${baseUrl + product.feature_image_path}" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                  
                                        <a href="#">
                                            <h5>${product.name}</h5>
                                        </a>
                                        <div class="product-price">
                                            ${product.price.toLocaleString()}đ
                                            <span>35.000đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    productHTML += '</div></div>';
                    productList.append(productHTML); // Thêm HTML mới vào product-list
                } else {
                    productList.append('<p>No products found</p>');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});