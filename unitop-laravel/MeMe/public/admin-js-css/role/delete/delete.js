function actionDelete(even){
    even.preventDefault();
    var requestUrl = $(this).data('url');
    var that = $(this);
    Swal.fire({
        title: 'Bạn muốn xóa vai trò này?',
        text: "Bạn sẽ không thấy vai trò sau khi đã xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type : 'GET',
                url : requestUrl,
                success : function(data){
                    if(data["code"] == "200")
                    that.parent().parent().remove();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                },
                error : function(data){
                }
            })

        }
      })
}

$(function(){
    $(".action_delete").on('click',actionDelete);
});