function actionDelete(event){
    event.preventDefault();
    var requestUrl = $(this).data('url');
    var that = $(this);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url : requestUrl,
                success : function(data){
                    if(data.code == 200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                    }

                },
                error : function(){
                }
            });

        }
      })
}

$(function(){
    $('.action_delete').on('click',actionDelete);
})


