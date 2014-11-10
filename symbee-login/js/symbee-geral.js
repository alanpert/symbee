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


	//Click História Criada
	// $(".historia-andamento").click(function() {
	// 	//console.log(1);
	// 	var titulohistoriaclick = $(this).children(".historia-infos").children(".titulo").html();
	// 	var generohistoriaclick = $(this).children(".historia-infos").children(".genero").html();
	// 	var criadorhistoriaclick = $(this).children(".historia-infos").children(".criador").html();

	// 	var urlhistoriaclick = "http://www.symbee.com.br/symbee-login/historia-visualizacao.php?titulo=" + titulohistoriaclick + "&genero=" + generohistoriaclick + "&criador=" + criadorhistoriaclick;
		
	// 	window.location.href = urlhistoriaclick;
	// 	//console.log(urlhistoriaclick);
	// });



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

// ********************************
// HISTÓRIA INTRODUÇÃO
// ********************************

	// Menu Config
	$(".btn-config .action-config").click(function() {
		$("#drop-config-hist").slideToggle("fast");
		return false;
	});

});
