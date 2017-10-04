$(function(){
  $('.menuBar .add').click(function() {
    $('#dialog').dialog('open');
  });
  
  $('#dialog').dialog({
    autoOpen: false,
    height: 280,
    modal: true,
    resizable: false,
    buttons: {
      Confirm: function() {
        $('#addProducts').submit();
        // Submit Rating
      },
      'Cancel': function() {
        $(this).dialog('close');
      }
    }
  });
});

