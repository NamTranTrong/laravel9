// Lắng nghe sự kiện từ file product.html
$(function(){
    window.addEventListener('message', function (event) {
        $("#headerElement").text(event.data.total_quantity);
        localStorage.setItem('totalQuantity', event.data.total_quantity);
    });

});