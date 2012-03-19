(function ($) {
  $(document).ready(function(e) {
    if($('input#soma_enabled').prop('checked'))
      $('.soma-options').show();

    $('input#soma_enabled').change( function() {
      if($(this).prop('checked'))
        $('.soma-options').slideDown('slow');
      else
        $('.soma-options').slideUp('slow');
    });
  });
})(jQuery);
