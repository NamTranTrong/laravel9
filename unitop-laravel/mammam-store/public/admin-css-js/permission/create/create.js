$(function(){
    $(".js-example-placeholder-single").select2({
        allowClear: true,
    });

    $('.checkbox_wrapper').on('click',function(){
        $(this).parents('.card').find('.checkbox_child').prop('checked',$(this).prop('checked'));
    });

})