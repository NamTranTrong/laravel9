$(function(){
    $("#checkbox_wrapper").on('click',function(){
        $(this).parents(".checkbox_permission").find(".checkbox_child").prop("checked",$(this).prop("checked"));
    })
})