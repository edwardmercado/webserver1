$(document).ready(function (){
	$('.naviBar').hide();
		$('.topBar a').toggle(function (){
			$('.naviBar').animate({width: 'toggle'}, "normal");
			
			$(".topBar img").fadeOut(function() { 
			$(this).load(function() { $(this).fadeIn(); }); 
			$(this).attr("src", "Images/drawer2.png"); 
			}); 
			
			$('.dim').css({
				visibility: 'visible'
			});
		}, function(){
			$('.naviBar').animate({width: 'toggle'}, "normal");
			
			$(".topBar img").fadeOut(function() { 
			$(this).load(function() { $(this).fadeIn(); }); 
			$(this).attr("src", "Images/drawer.png"); 
			}); 
			
			$('.dim').css({
				visibility: 'hidden'
			});
		});
});