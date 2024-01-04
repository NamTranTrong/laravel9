
function actionDelete(event){
    event.preventDefault();
    var dataUrl = $(this).data('url');
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
        $.ajax({
            url : dataUrl,
            type : 'GET',
            success : function(data){
                if (result.isConfirmed) {
                    if(data.code == 200 ){
                        that.closest('tr').remove();
                        Swal.fire({
                          title: "Deleted!",
                          text: "Your file has been deleted.",
                          icon: "success"
                        });
                    }    
                  }
            },
            error : function(){

            }
        });
      });
}

$(function(){
    $(".action_delete").on("click",actionDelete);
});

