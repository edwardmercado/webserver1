$(document).ready(function (){
	$('.divlogin').hide();
		$('.login').click(function (){
			$(".divlogin").animate({
            top:'30%',
			right:'40%',
			height:'35%',
			width:'20%',
			modal:true
			}, "normal");
			
			$('.dim').css({
				visibility: 'visible'
			});
		}); 
		$('.divlogin .innerCancel').click(function (){
			$(".divlogin").animate({
				top:'-30%',
				right:'-40%',
				height:'35%',
				width:'20%'
			}, "fast");

			$('.dim').css({
				visibility: 'hidden'
			});
		});
});