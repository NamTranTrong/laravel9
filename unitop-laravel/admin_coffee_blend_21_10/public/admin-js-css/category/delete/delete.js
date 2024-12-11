$(function () {
  $(document).on('click','.action_delete', actionDelete);
});

function actionDelete(event) {
  var requestUrl = $(this).data('url');
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
        type: 'GET',
        url: requestUrl,
        success: function (data) {
          if (data.code == 200) {
            that.closest("tr").remove();
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
        error: function () {

        },
      });
    }
  });
}