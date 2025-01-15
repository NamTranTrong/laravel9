//hàm xử lý khi trả về 200 ở controller
function updateCartUI(response) {
    if (response.status === 200) {
        $('#cart-success-message').addClass('show');
        setTimeout(function() {
            $('#cart-success-message').removeClass('show');
        }, 1500);
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $('.cart-icon span').text(response.totalProduct);
        // Cập nhật tổng giá
        $('.select-total h5').text('TC: ' + Number(response.totalPrice).toLocaleString('vi-VN') + '₫');
        $('.cart-price').text(Number(response.totalPrice).toLocaleString('vi-VN') + '₫');

        // Cập nhật danh sách sản phẩm trong giỏ hàng
        var cartItemsHtml = '';
        $.each(response.cart, function (id, product) {
            cartItemsHtml += `
            <tr>
                <td class="si-pic"><img src="${baseUrl + product.image}" alt="${product.name}"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>${Number(product.price).toLocaleString('vi-VN')}₫ x ${product.quantity}</p>
                        <h6>${product.name}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="${product.id}"></i>
                </td>
            </tr>`;
        });
        $('.cart-hover .select-items tbody').html(cartItemsHtml);
    }
}
//gọi ajax khi ấn nút thêm sản phẩm
function addToCart(productId, quantity = 1) {
    $.ajax({
        url: "/cart/add-to-cart/" + productId,
        type: "POST",
        dataType: "json",
        data: {
            newQuantity: quantity,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Thông báo',
                    text: response.message,
                    confirmButtonText: 'OK',
                });
            }
            else{
                updateCartUI(response); // Gọi lại hàm cập nhật giao diện
            }
        },
        error: function (xhr, status, response) {
            console.error("AJAX Error: " + error);
            alert("Có lỗi xảy ra. Vui lòng thử lại sau!");
        }
    });
}

$(document).on("click", "#add-to-card", function (e) {
    e.preventDefault();
    var productId = $(this).data("id");
    if (!productId) {
        console.error("Product ID is missing!");
        return;
    }

    // Gọi hàm thêm vào giỏ hàng
    addToCart(productId);
});

$(document).on('click', '.si-close i', function (e) {
    e.preventDefault();
    var productId = $(this).data('id');

    if (!productId) {
        console.error('Product ID is missing!');
        return;
    }

    $.ajax({
        url: "/cart/remove-icon-bag-cart/" + productId,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status === 200) {
                var cart = response.cart;

                // Reset các giá trị tổng
                var totalPrice = 0;
                var totalProduct = 0;
                var updatedCartHtml = '';

                // Lặp qua giỏ hàng và tính toán
                $.each(cart, function (productId, product) {
                    totalProduct += product.quantity;
                    totalPrice += product.price * product.quantity;

                    updatedCartHtml += `
                 <tr>
                        <td class="si-pic"><img src="${baseUrl + product.image}" alt="${product.name}"></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>${Number(product.price).toLocaleString('vi-VN')}₫ x ${product.quantity}</p> 
                                <h6>${product.name}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <i class="ti-close" data-id="${product.id}"></i>
                        </td>
                    </tr>`;

                });
                // Cập nhật HTML giỏ hàng
                $('.cart-hover .select-items tbody').html(updatedCartHtml);
                // Cập nhật tổng giá và tổng sản phẩm

                $('.cart-icon span').text(totalProduct);
                $('.select-total h5').text('TC: ' + Number(totalPrice).toLocaleString('vi-VN') + '₫');
                $('.cart-price').text(Number(totalPrice).toLocaleString('vi-VN') + '₫');


                console.log('Product removed successfully!');
            } else {
                console.error('Failed to remove product:', response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
});

$(document).on('click','#specific-pro-qty .qtybtn',function(e){
    e.preventDefault();
    var productId = $(this).data('id');
    var quantity = $(this).closest('.pro-qty').find('.get-quantity').val();
    var that = $(this);
    
    $.ajax({
        url: "/cart/update-icon-shopping-cart/" + productId,
        type : 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            quantity: quantity
        },
        success : function(response){
            if(response.status === 200){
                that.parents('tr').find('.total-price').text(response.totalPrice);
                $('.subtotal span').text(response.totalPriceAll + 'đ');
                $('.cart-total span').text(response.totalPriceAll + 'đ');
            }
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi cập nhật giỏ hàng: ', error);
        }
    });
});

function removeFromCart(productId, callback) {
    $.ajax({
        url: "/cart/remove-icon-shopping-cart/" + productId,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            productId: productId,
        },
        success: function (response) {
            if (callback) {
                callback(response);  // Gọi callback sau khi hoàn tất
            }
        },
        error: function (response) {
            console.error('Error removing item from cart');
        }
    });
}


$(document).on('click', '.close-td .ti-close', function (e) {
    e.preventDefault();
    var productId = $(this).data('id');
    var that = $(this);

    // Gọi hàm removeFromCart
    removeFromCart(productId, function(response) {
        // Xóa sản phẩm khỏi bảng sau khi xóa thành công
        that.parents('tr').remove();

        // Cập nhật lại subtotal và tổng giỏ hàng
        $('.subtotal span').text(response.totalPriceAll);
        $('.cart-total span').text(response.totalPriceAll);
    });
});

// $(document).on('click','.close-td .ti-close',function(e){
//     e.preventDefault();
//     var that = $(this);
//     var productId = $(this).data('id');

//      $.ajax({
//         url :"/cart/remove-icon-shopping-cart/" + productId,
//         type : 'POST',
//         data : {
//             _token: $('meta[name="csrf-token"]').attr('content'),
//             productId : productId,
//         },
//         success : function(response){
//             that.parents('tr').remove();
//             $('.subtotal span').text(response.totalPriceAll);
//             $('.cart-total span').text(response.totalPriceAll);
//         },
//         error : function(response){

//         }
//      });
// });