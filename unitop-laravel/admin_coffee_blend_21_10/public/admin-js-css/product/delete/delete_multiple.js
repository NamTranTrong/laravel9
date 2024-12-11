$(function(){
    $(document).on('click', '.select-all', function() {
        $('.product-checkbox').prop('checked', this.checked);
    });

    $(".delete-selected").on('click',function(event){
        var selectedProductIds = $('.product-checkbox:checked').map(function(){
            return $(this).val();
        }).get();
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
                    url: "http://127.0.0.1:8000/admin/product/delete-multiple",// Đảm bảo URL đúng
                    type: 'POST',
                    data: {
                        product_ids: selectedProductIds,
                        _token: $('meta[name="csrf-token"]').attr('content') // Lấy CSRF token từ thẻ meta
                    },
                    success: function (data) {
                        if(data.code == 200){
                            selectedProductIds.forEach(function (id) {
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
