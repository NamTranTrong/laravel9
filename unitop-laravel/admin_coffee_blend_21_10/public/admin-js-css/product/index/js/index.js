$(function () {
    // Khi nhấn "Xem thêm"
    $(document).on('click','.read-more', function () {
        var content = $(this).siblings('.description').html(); // Lấy nội dung đầy đủ
        $('#contentModal .modal-body').html(content); // Đặt nội dung vào modal
        $('#contentModal').fadeIn(); // Hiển thị modal
    });

    // Đóng modal khi nhấn nút close
    $('.close-btn').on('click', function () {
        $('#contentModal').fadeOut(); // Ẩn modal
    });

    // Đóng modal khi nhấn ra ngoài modal-content
    $(window).on('click', function (event) {
        if ($(event.target).is('#contentModal')) {
            $('#contentModal').fadeOut(); // Ẩn modal
        }
    });
});