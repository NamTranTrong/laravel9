$('#mySelect').on('change', function() {
    var optionValue = $(this).val(); // Lấy giá trị của thẻ option được chọn

    $.ajax({
        url : 'http://127.0.0.1:8000/admin/product',
        type : 'GET',
        data : {
            paginateValue : optionValue,
        },
        success: function(response) {
            // Cập nhật dữ liệu trong bảng hoặc nội dung nào đó
            $('.table-model').html(response.html);
            $('#pagination').html(response.pagination);
        },
        error:function(){
            
        }
    });
});
