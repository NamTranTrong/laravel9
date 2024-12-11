$(function(){
    $(document).on('click', '.select-all', function() {
        $('.category-checkbox').prop('checked', this.checked);
    });

    $(".delete-selected").on('click',function(event){
        var selectedCategoryIds = $('.category-checkbox:checked').map(function(){
            return $(this).val();
        }).get();
        var that = $(this);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "http://127.0.0.1:8000/admin/category/delete-multiple",// Đảm bảo URL đúng
                    type: 'POST',
                    data: {
                        category_ids: selectedCategoryIds,
                        _token: $('meta[name="csrf-token"]').attr('content') // Lấy CSRF token từ thẻ meta
                    },
                    success: function (data) {
                        if(data.code == 200){
                            selectedCategoryIds.forEach(function (id) {
                                $(`tr:has(input[value='${id}'])`).remove(); // Xóa <tr> dựa trên value của checkbox
                            });            
                            Swal.fire({
                              title: "Deleted!",
                              text: "Your file has been deleted.",
                              icon: "success"
                            });
                        }
                        else{
                            alert(data.message || 'An error occurred.');
                        }


                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
          });
    });
});
