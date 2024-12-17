$(function(){
    $(document).on('click','#checkAll',function(){
        const row = $(this).closest('tr');
            
        // Tìm tất cả các checkbox trong hàng đó
        const checkboxes = row.find('.permission-checkbox');
        
        // Cập nhật trạng thái của các checkbox trong hàng dựa trên trạng thái của "Check All"
        checkboxes.prop('checked', $(this).is(':checked'));
    });
});