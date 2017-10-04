$(document).ready(function(){
	var affect = $('#txtaffect').val();
	if(affect == -1){
		addNotice('<p>May nagorder!</p>');
	}
  setTimeout(function() {
    addNotice('<p>Sagot agad!!!!</p>');
  }, 5000);
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
      }, 1000, function() {
        $(this).remove();
      });
  });
});

function addNotice(notice) {
  $('<div class="notice"></div>')
    .append('<div class="skin"></div>')
    .append('<a href="#" class="close">close</a>')
    .append($('<div class="content"></div>').html($(notice)))
    .hide()
    .appendTo('#growlNotif')
    .fadeIn(1000);
}
