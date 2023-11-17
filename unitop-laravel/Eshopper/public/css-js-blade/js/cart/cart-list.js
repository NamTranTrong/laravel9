// Khi chuyển trang, lấy lại dữ liệu
$(document).ready(function() {
    var storedQuantity = localStorage.getItem('totalQuantity');
        if (storedQuantity) {
            $("#headerElement").text(storedQuantity);
        }
});

function UpdateCart(event){
    event.preventDefault();
    let quantity = $(this).parents(".quantity").find("input.get-quantity").val();
    let idCart   = $(this).data('id');
    let urlUpdateCart = $(this).parents(".url_cart_update").data('url');
    let quantityTotal = $(this).parents(".get_total_quantity").find('input.get-total-quantity').val();
    // console.log(quantityTotal);
    $.ajax({
        type : "GET",
        url  : urlUpdateCart,
        data : {
            quantity : quantity,
            id       : idCart,
        },
        success : function(data){
            if(data["code"] == "200"){
                $('.cart_wrapper').html(data.cart_component);
                $('#headerElement').text(quantityTotal);
            };
        },
        error : function(){

        }
    });
}

function DeleteCart(event){
    event.preventDefault();
    let urlDeleteCart = $(this).data('url');
    let quantityTotal = $(this).parents(".get_total_quantity").find('input.get-total-quantity').val();
    // alert(urlDeleteCart);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "GET",
                url : urlDeleteCart,
                success : function(data){
                    if(data["code"] == "200"){
                        $('.cart_wrapper').html(data.cart_component);
                        $('#headerElement').text(quantityTotal);
                    };
                },
            });
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
   
}

$(function(){
    $(document).on('click', '.update-cart', UpdateCart);
    $(document).on('click','.delete-cart',DeleteCart);
});


// $(document).on('change', '.get-quantity', updateCart);

// function updateCart() {
//     let quantity = $(this).val();
//     let idCart = $(this).closest('.quantity').find('.update-cart').data('id');
//     let urlUpdateCart = $(this).parents(".url_cart_update").data('url');
//     $.ajax({
//         type: "GET",
//         url: urlUpdateCart,
//         data: {
//             quantity: quantity,
//             id: idCart,
//         },
//         success: function(data) {
//             if (data["code"] == "200") {
//                 $('#cart_wrapper').html(data.cart_component);
//             }
//         },
//         error: function() {
//             // Xử lý lỗi nếu cần
//         }
//     });
// }