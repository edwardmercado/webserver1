function notify(){
	var send = $('#txtaffect1').val();
	var cashier = $('#txtaffect2').val();
	var id = $('#txtaffect3').val();
	var message = "Cashier "+cashier+" has received an order. ID: "+id+".";
	if(send=="no"){
		console.log("dumaan");
		addNotice('<p>Cashier '+cashier+' has received an order. <br>ID: '+id+'</p>');
	}
$('#growlNotif')
  .find('.close')
  .live('click', function() {
    $(this)
      .closest('.notice')
      .animate({
        border: 'none',
        height: 0,
        marginBottom: 0,
        marginTop: '-6px',
        opacity: 0,
        paddingBottom: 0,
        paddingTop: 0,
        queue: false
      }, 500, function() {
        $(this).remove();
      });
  });
}

function addNotice(notice) {
  $('<div class="notice"></div>')
    .append('<div class="skin"></div>')
    .append('<a href="#" class="close">close</a>')
    .append($('<div class="content"></div>').html($(notice)))
    .hide()
    .appendTo('#growlNotif')
    .fadeIn(500);
}
