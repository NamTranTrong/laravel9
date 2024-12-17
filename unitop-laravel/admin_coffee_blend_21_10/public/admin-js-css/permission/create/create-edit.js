$(function(){
    $(document).on('click','#checkAll',function(){
        $('.permission-checkbox').prop('checked',this.checked);
    });
});

