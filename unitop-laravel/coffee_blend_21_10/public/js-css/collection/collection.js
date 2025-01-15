$(document).ready(function () {
    // Xử lý khi click vào thẻ li trong ul
    $("ul.ml-3 li").on("click", function (e) {
        e.preventDefault(); // Ngăn reload trang khi click vào link
        $("ul.ml-3 li").removeClass("active");
        $(this).addClass("active");
    });

    $(".parent-category").on("click", function (e) {
        e.preventDefault(); // Ngăn reload trang khi click vào link
        $(".filter-catagories .active").removeClass("active");
        $(this).addClass("active");
    });

    $("ul.ml-3 li a").on("click", function (e) {
        e.preventDefault(); // Ngăn reload trang khi click vào link

        // Đặt lại màu cho tất cả li và thẻ a cha
        $("ul.ml-3 li a").removeClass("active");
        $("ul.ml-3 li").removeClass("active");
        $(".parent-category").removeClass("active");

        // Thêm class active cho thẻ li được click
        $(this).addClass("active");
        $("ul.ml-3 li").addClass("active");

        // Tìm thẻ a cha của ul và thêm class active
        $(this).closest(".collapse").siblings(".parent-category").addClass("active");
    });
});

$(document).on("click", "#category-list a", function (e) {
    e.preventDefault();
    var categoryId = $(this).data("id");

    if (!categoryId) {
        console.error("Category ID is missing!");
        return;
    }

    $.ajax({
        url: "/collection/" + categoryId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (!response || !response.products || !response.category) {
                console.error("Invalid response structure");
                return;
            }

            var products = response.products;
            var category = response.category;

            var fullUrl = "/collection/category-" + categoryId;
            history.pushState({ categoryId: categoryId }, "", fullUrl);

            var productList = $(".product-list");
            productList.empty();

            let productHTML = `
                <div class="product-list">
                    <div class="category_name">
                        <h4>${category.name}</h4>
                    </div>
                    <div class="row">
            `;
            products.forEach((product) => {
                let formattedPrice = Number(product.price).toLocaleString("vi-VN");
                productHTML += `
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="${baseUrl + product.feature_image_path}" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active" id="add-to-card" data-id="${product.id}"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="${product.link}">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <a href="#"><h5>${product.name}</h5></a>
                                <div class="product-price">
                                    ${formattedPrice}đ
                                    <span>35.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            productHTML += "</div></div>";
            productList.append(productHTML);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            alert("Có lỗi xảy ra. Vui lòng thử lại sau!");
        }
    });
});




