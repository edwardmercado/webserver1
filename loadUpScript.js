$(function(){
  $('.menuBar .load').click(function() {
    $('#dialog').dialog('open');
  });
  
  $('#dialog').dialog({
    autoOpen: false,
    height: 280,
    modal: true,
    resizable: false,
    buttons: {
      Confirm: function() {
        $(this).dialog('close');
        // Submit Rating
		$('#loadValues').submit();
      },
      'Cancel': function() {
        $(this).dialog('close');
      }
    }
  });
});

