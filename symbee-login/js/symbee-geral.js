$(document).ready(function() {

// ********************************
// SIDE BAR
// ********************************

	// CLICK SIDEBAR
	$("#btn-sidebar").click(function() {
		$("#sidebar").animate({right: "0px"});
		$("#sideout").show();
	});

	$("#sideout").click(function() {
		$("#sideout").hide();
		$("#sidebar").animate({right: "-300px"});
	})


// ********************************
// HOME
// ********************************

	// Click em Nova História dentro de Minhas Histórias
	$(".click-nova").click(function() {
		window.location = "criarhistoria.php";
	});


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
		$('#genero-historia').val(Genero);
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

	// Submit form
	$("#btncriar").click(function() {
		$("#criar-form").submit();

		return false;
	});



});
