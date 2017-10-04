$(document).ready(function(){
	console.log("ez");
  $('.menutitleBar .next a').click(function(){
    if ($('.active').next('.menuList').length) {
        $('.active').removeClass('active')
                    .next('.menuList')
                    .addClass('active');
    }
  });
  $('.menutitleBar .prev a').click(function(){
    if ($('.active').prev('.menuList').length) {
        $('.active').removeClass('active')
                    .prev('.menuList')
                    .addClass('active');
    }
  });
});