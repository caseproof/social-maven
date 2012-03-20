(function ($) {
  $(document).ready(function(e) {
    var formfield;
    
    // Image uploader
    $('.soma-upload-button').click(function() {
      formfield = $(this).prev();
      tb_show('', 'media-upload.php?type=image&amp;TB_iframe=1');
    });
     
    window.send_to_editor = function(html) {
      imgurl = $('img',html).attr('src');
      formfield.val(imgurl);
      tb_remove();
    }
  });
})(jQuery);
