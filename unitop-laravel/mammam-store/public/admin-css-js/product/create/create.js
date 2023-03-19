$(function(){
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',', ' '],
    });
    $(".js-example-placeholder-single").select2({
        allowClear: true,
    });


  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };

    CKEDITOR.replace('ckeditor_editor_init', options);

})


