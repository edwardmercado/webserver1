$(function(){
  $('.menuList a').click(function() {
    $('#dialogProducts').dialog('open');
  });
  
  $('#dialogProducts').dialog({
    autoOpen: false,
    height: 280,
    modal: true,
    resizable: false,
    buttons: {
      Confirm: function() {
        $(this).dialog('close');
        // Submit Rating
      },
      'Cancel': function() {
        $(this).dialog('close');
      }
    }
  });
});

