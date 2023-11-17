function addToCart(event){
    event.preventDefault();
    var counter = document.getElementById('counter');

  
    // Hiển thị thẻ div
    counter.style.transform = 'translate(-50%, -50%)';
    counter.classList.remove('hide');
  
    // Di chuyển thẻ div lên trên và mờ dần sau 500ms (0.5 giây)
    setTimeout(function() {
      counter.style.transform = 'translate(-50%, -150%)';
      counter.classList.add('hide');
    }, 500); // thời gian hiển thị trước khi di chuyển lên và mờ dần
    let urlCart = $(this).data('url');
    $.ajax({
        type : "GET",
        url : urlCart,
        success : function(data){
            if(data["code"] == "200"){
                // console.log(data.html_total_quantity);
                console.log(data.total_quantity);
                updateTotalQuantity(data.total_quantity);
            }
        },
        error : function(){

        },
    });
}


function updateTotalQuantity(total_quantity){
    window.parent.postMessage({total_quantity : total_quantity},'*');
}

$(function(){
    $('.add_to_card').on('click',addToCart);
});