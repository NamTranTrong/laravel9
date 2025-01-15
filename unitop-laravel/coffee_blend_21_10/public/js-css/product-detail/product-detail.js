$(document).on('click', '.pd-cart', function (e) {
    e.preventDefault();
    var dataUrl = $(this).data('url');
    var newQuantity = $('.get-quantity2').val();

    $.ajax({
        url: dataUrl,
        type: 'POST',
        data: {
            newQuantity: newQuantity,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },

        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Thông báo',
                    text: response.message,
                    confirmButtonText: 'OK',
                });
            } else {
                updateCartUI(response);
            }
        },

        error: function (xhr, status, error) {
            console.error('Error occurred:', error);
            console.log(xhr.responseText);
            alert("Failed to add product to cart. Please try again!");
        }
    });
});


  



