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
		$(this).next().addClass('selected');
		$('.b-criar').addClass('ready')
	});

	// Submit form
	$("#btncriar").click(function() {
		$("#criar-form").submit();

		return false;
	});

// ********************************
// HISTÓRIA INTRODUÇÃO - historia-criada.php
// ********************************

	// Menu Config
	$(".btn-config .action-config").click(function() {
		$("#drop-config-hist").slideToggle("fast");
		return false;
	});

	$(".btn-salvar").click(function() {
		var textointro = $("#addintro").val();
		var textotamanho = textointro.length;
		if (textotamanho < 150) {
			$("#addintro").addClass("error");
			$("#addintro").focus();
			$(".min-carac").addClass("error");
		}
		else {
			$("#form-intro").submit();
		}
		return false;
		
	});

	$("#addintro").blur(function() {
		$(this).removeClass("error");
		$(".min-carac").removeClass("error");
	});

	$("#addintro").keyup(function() {
		textotamanho = $("#addintro").val().length;
		$(".contador-caracteres").html(textotamanho);
		$(this).removeClass("error");
		$(".min-carac").removeClass("error");
	});


// ********************************
// HISTÓRIA VISUALIZAÇÃO
// ********************************

	$(".info-click").click(function() {
		$(this).parent().siblings(".infos-cont").slideToggle();

		return false;
	});

	$(".btn-salvar-novo-trecho").click(function() {
		var mincarac = $("#mincaracteres").val();
		var textointro = $("#addnovotrecho").val();
		var textotamanho = textointro.length;
		if (textotamanho < mincarac) {
			$("#addnovotrecho").addClass("error");
			$("#addnovotrecho").focus();
			$(".min-carac").addClass("error");
		}
		else {
			$("#form-intro").submit();
		}
		return false;
		
	});

	$("#addnovotrecho").blur(function() {
		$(this).removeClass("error");
		$(".min-carac").removeClass("error");
	});

	$("#addnovotrecho").keyup(function() {
		textotamanho = $("#addnovotrecho").val().length;
		$(".contador-caracteres").html(textotamanho);
		$(this).removeClass("error");
		$(".min-carac").removeClass("error");
	});


	// Ver Desafio
	$(".verdesafiotrecho").click(function() {
		$(this).siblings(".mask").show();
		$(this).siblings(".box-desafio").show();

		return false;
	});

	$(".mask").click(function() {
		$(this).hide();
		$(this).siblings(".box-desafio").hide();
	});



	//CONVIDAR AMIGO
	$(".abrir-convidar").click(function() {
		$("#drop-config-hist").slideUp("fast");
		$(".box-convidar-amigos").slideDown();

		return false;
	});

	$(".btn-fechar-convidar").click(function() {
		$(".box-convidar-amigos").slideUp();
		$(".box-convidar-amigos-sucesso").slideUp();

		return false;
	});

	$(".btn-ok-convidar").click(function() {
		$(".box-convidar-amigos").hide();
		$(".box-convidar-amigos-sucesso").show();
		// $("#form-convidar").submit();

		return false;
	});


	



// ********************************
// COMO FUNCIONA
// ********************************

	$(".tabs-wrap>div").hide();
	$(".tabs-wrap>div:first-child").show();

	$(".menu-navegacao li a").click(function() {
		$(".menu-navegacao li").removeClass("ativo");
		$(this).parent().addClass("ativo");

		$(".tabs-wrap>div").hide();

		var tabshow = $(this).attr("href");
		$(tabshow).show();

		return false;
	});


});
