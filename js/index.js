//efeito do Logo 
$(document).ready(function(){
	$('.home').hide()
	.delay('250')
	.fadeIn("slow");
});

$(document).ready(function(){
	$('.carousel').hide()
	.delay('150')
	.fadeIn("slow");
});

//Efeito do Login com a Barra de Rolagem
$(window).scroll(function(){
	var topo = $(window).scrollTop();
		if(topo<300){
			$('#login').fadeOut('1000');
		}else{
			$('#login').fadeIn('1000');
	}
});

