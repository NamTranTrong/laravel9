$(document).ready(function () {
    // Lưu trạng thái sao đã chọn
    var selectedRating = 0;

    // Hover sự kiện
    $(document).on('mouseenter', '.star', function () {
        var starValue = $(this).data('star');

        // Cập nhật trạng thái các sao khi hover
        if (selectedRating === 0) { // Nếu chưa có sao nào được chọn
            $('.star').each(function () {
                var currentValue = $(this).data('star');
                if (currentValue <= starValue) {
                    $(this).removeClass('far').addClass('fas');
                } else {
                    $(this).removeClass('fas').addClass('far');
                }
            });
        }
    });

    // Click sự kiện
    $(document).on('click', '.star', function () {
        var starValue = $(this).data('star');

        // Lưu lại trạng thái đã chọn
        selectedRating = starValue;

        // Cập nhật trạng thái sao sau khi click
        $('.star').each(function () {
            var currentValue = $(this).data('star');
            if (currentValue <= selectedRating) {
                $(this).removeClass('far').addClass('fas');
            } else {
                $(this).removeClass('fas').addClass('far');
            }
        });
        // Cập nhật giá trị vào form ẩn
        $('#ratingValue').val(selectedRating);

    });

    // Reset lại khi rời khỏi vùng sao (nếu không click)
    $(document).on('mouseleave', '.stars', function () {
        if (selectedRating === 0) { // Nếu chưa chọn sao nào, reset lại
            $('.star').removeClass('fas').addClass('far');
        }
    });
});
