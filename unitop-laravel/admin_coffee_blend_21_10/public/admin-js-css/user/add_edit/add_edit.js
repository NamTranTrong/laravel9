$(function(){
    $(".js-example-tags").select2({
        tags: true
    });
    $(".js-example-tags").on('select2:opening select2:closing', function( event ) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    });
})
