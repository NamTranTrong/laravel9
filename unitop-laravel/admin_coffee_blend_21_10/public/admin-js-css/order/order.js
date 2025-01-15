$(document).ready(function () {
    $('.order-status').each(function () {
        var status = $(this).data('status');
        $(this).find('.status-btn').addClass('button-hidden');

        $(this).find('.status-btn[data-status="' + status + '"]').removeClass('button-hidden');

    });

    $(document).on('click', '.status-btn', function (e) {
        e.preventDefault();
        var button = $(this);
        var currentStatus = $(this).data('status'); // Lấy trạng thái hiện tại của đơn hàng
        var orderId = button.closest('.order-status').data('order-id');
        // Lấy trạng thái mới
        var newStatus = (currentStatus + 1) % 4;
        console.log(newStatus);
        $.ajax({
            url:"/admin/order/change-status/" + orderId,
            type : "POST",
            data : {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                order_id: orderId,
                status: newStatus
            },
            success: function(response) {
                if (response.status === 200) {
                    // Nếu trạng thái được cập nhật thành công, thay đổi trạng thái UI
                    button.closest('.order-status').data('status', newStatus);
                    button.closest('.order-status').find('.status-btn').addClass('button-hidden');
                    button.closest('.order-status').find('.status-btn[data-status="' + newStatus + '"]').removeClass('button-hidden');
                } else {
                    console.error('Cập nhật trạng thái thất bại');
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi cập nhật trạng thái: ', error);
            }
        });
    });
});

