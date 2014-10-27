$(document).ready(function() {

// ********************************
// HOME LOGADO
// ********************************

	// CLICK SIDEBAR
	$("#btn-sidebar").click(function() {
		$("#sidebar").toggle("slide");
		$("#sideout").show();
	});

	$("#sideout").click(function() {
		$("#sideout").hide();
		$("#sidebar").toggle("slide");
	})


// ********************************
// CRIAR HISTÓRIA
// ********************************
	$('.selecione-cat').click(function() {
		// $('html,body').animate({scrollTop: 150}, 1000, 'easeOutExpo');
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
			$('.fake-select').removeClass('open');
		} else {
			$(this).addClass('active');
			$('.fake-select').addClass('open');
		}
	});

	$('.fake-select li').click(function() {
		var Genero = $(this).text();
		$('.fake-select').removeClass('open');
		$('.selecione-cat').removeClass('active').text(Genero);
		$('.radios').css({display: 'block'}).stop().animate({opacity: 1});
	});
	
	$('.radios label').click(function() {
		$('.radios label').removeClass('selected');
		$(this).addClass('selected');
		$('.b-criar').addClass('ready')
	});
	
	$('.radios input').click(function() {
		$('.radios label').removeClass('selected');
		$(this).prev().addClass('selected');
		$('.b-criar').addClass('ready')
	});


});
