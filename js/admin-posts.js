var uploadID          = '';
var storeSendToEditor = '';
var newSendToEditor   = '';

(function ($) {
  $(document).ready(function(e) {
    var formfield;
    
    // Image uploader
    $('.soma-upload-button').click(function() {
      uploadID = $(this).prev().attr('id');
      window.send_to_editor = newSendToEditor;
      tb_show('', 'media-upload.php?type=image&amp;TB_iframe=1');
    });

    storeSendToEditor = window.send_to_editor;
    newSendToEditor   = function(html) { imgurl = $('img',html).attr('src');
                                         $("#" + uploadID).val(imgurl);
                                         tb_remove();
                                         window.send_to_editor = storeSendToEditor;
                                       };
     
    /*
    window.send_to_editor = function(html) {
      imgurl = $('img',html).attr('src');
      formfield.val(imgurl);
      tb_remove();
    }
    */
  });
})(jQuery);
