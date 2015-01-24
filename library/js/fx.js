// JavaScript Document
$(document).ready(function() {
	$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {},
			overlay: {
				locked: false
			}
		}
	})
	$('.fancybox-img').fancybox({
		openEffect  : 'elastic',
		closeEffect : 'elastic',
		helpers: {
			overlay: {
				locked: false
			}
		}
	})
	
	$('html').niceScroll({ cursorwidth: 9, scrollspeed: 90 });
	$('.list-attualizacoes').niceScroll({ cursorwidth: 5, scrollspeed: 90, cursorcolor: '#000', autohidemode: false });
	var UserHeight = $(window).height();
	$('.login-box .button.form').click(function() {
		if ( $('input[type="text"]').val() == '' ) {
			$('.login-box input[type="text"]').addClass('form-error');
		} else if ( $('input[type="email"]').val() == '' ) {
			$('.login-box input[type="email"]').addClass('form-error');
		} else {
			$('.login').animate({opacity: 0}, 999, function() {
				$(this).css({display: 'none'});
				$('html, body').animate({scrollTop: -UserHeight}, 0);
			});	
			$('html, body').stop().animate({scrollTop: UserHeight}, 1000, 'easeInOutExpo', function() {
			})
			$('.site').css({display: 'block'}).animate({opacity: 1}, 2000);
		}
	})
	$('#sem-cadastro').click(function() {
		$('.login').animate({opacity: 0}, 999, function() {
			$(this).css({display: 'none'});
			$('html, body').animate({scrollTop: -UserHeight}, 0);
			$('html').niceScroll({ cursorwidth: 9, scrollspeed: 90 });
		});	
		$('html, body').stop().animate({scrollTop: UserHeight}, 1000, 'easeInOutExpo', function() {
		})
		$('.site').css({display: 'block'}).animate({opacity: 1}, 2000);
	})
	
	$('.desc-hand-write, #phone-print').hover(function() {
		$('#phone-print').addClass('hovered');
	}, function() {
		$('#phone-print').removeClass('hovered');
	});
	
	$('.icon').hover(function() {
		$(this).prev().addClass('hovered');
		$(this).next().addClass('hovered');
		$(this).addClass('hovered');
	}, function() {
		$(this).prev().removeClass('hovered');
		$(this).next().removeClass('hovered');
		$(this).removeClass('hovered');
	});
	
	$('.hist-picture').hover(function() {
		var HistID = $(this).parent().parent().attr('id');
		
		$('#' + HistID + '-content').addClass('hovered');
	}, function() {
		var HistID = $(this).parent().parent().attr('id');
		
		$('#' + HistID + '-content').removeClass('hovered');
	});
	
	$('.ler-link, .ler-link-perfil').click(function(){
		$('.mask').css({display: 'block'}).stop().animate({opacity: .7}, 300);
		$('.ler-uma-historia').css({display: 'block'}).stop().animate({opacity: 1}, 300);
	});
	
	/* criar história */
	
	$('#name-historia').focus(function() {
		$('.selecione-cat, .selecione-cat ~ .desc-input').css({display: 'block'}).animate({opacity: 1}, function() {
			$('.selecione-cat, .selecione-cat ~ .desc-input').addClass('transitions');
		});
	});
	
	$('.selecione-cat').click(function() {
		$('html,body').stop().animate({scrollTop: 220}, 800, 'easeOutExpo');
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
			$('.fake-select').removeClass('open');
		} else {
			$(this).addClass('active');
			$('.fake-select').addClass('open');
		}
	});
	
	$('.ler-uma-historia-selecione-cat').click(function() {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
			$('.fake-select').removeClass('open');
			$('html,body').stop().animate({scrollTop: 60}, 800, 'easeOutExpo');
		} else {
			$(this).addClass('active');
			$('.fake-select').addClass('open');
			$('html,body').stop().animate({scrollTop: 220}, 800, 'easeOutExpo');
		}
	})
	
	$('.fake-select li').click(function() {
		var Genero = $(this).text();
		$('.fake-select').removeClass('open');
		$('.selecione-cat').removeClass('active').text(Genero);
		$('.ler-uma-historia-selecione-cat').removeClass('active').text(Genero);
		$('.radios').css({display: 'block'}).stop().animate({opacity: 1});
		// Criar história - passa genero para input hidden
		$('#genero-historia').val(Genero);
		$('#genero-historia-ler').val(Genero);
	});
	
	$('.ler-uma-historia-selecione-cat').next().next().click(function() {
		$('html,body').stop().animate({scrollTop: 60}, 800, 'easeOutExpo');
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
	
	/* single história */
	
	$('.ots-hists, .list-outras').hover(function() {
		$('.ots-hists').addClass('open');	
		$('.list-outras').addClass('open');	
	}, function() {
		$('.ots-hists').removeClass('open');	
		$('.list-outras').removeClass('open');	
	})
	
	$('.autor-img img').hover(function(e) {
		$('.autor-img h4').css({display: 'block'}).stop().animate( { right: 170, opacity: 1 }, 500, 'easeOutExpo' )   
    }, function() {
		$('.autor-img h4').stop().animate( { right: 70, opacity: 0 }, 500, 'easeOutExpo', function() {
			$('.autor-img h4').css({display: 'none'})	
		})   
	});
	
	$('.ver-desafio').click(function(e) {
		$(this).siblings('.mask').css({display: 'block'}).stop().animate({opacity: .7}, 300);
		$(this).siblings('.box-desafio').css({display: 'block'}).stop().animate({opacity: 1}, 300);
    });
	
	/* */
	
	/* logged homepage */
	
	/*if ( $('.area-perfil').hasClass('open') ) {
		$('.area-perfil').removeClass('open');
		$('#ascrail2001').css({opacity: 0});
	} else {
		$('.area-perfil').addClass('open');
		$('#ascrail2001').css({opacity: 1});
	}*/
	
	$('.login-drop').click(function(e) {
		if ( $('.area-perfil').hasClass('open') ) {
			$('.area-perfil').removeClass('open');
			$('#ascrail2001').css({opacity: 0});
		} else {
			$('.area-perfil').addClass('open');
			$('#ascrail2001').css({opacity: 1});
		}
    });
	
	$('#ver-hists, .close-area').click(function() {
		if ( $('.area-historias').hasClass('open') ) {
			$('.area-historias').removeClass('open');
			$('html,body').stop().animate({scrollTop: 0}, 600, 'easeOutExpo');
		} else {
			$('.area-historias').addClass('open');
			$('html,body').stop().animate({scrollTop: 550}, 600, 'easeOutExpo');
		}
    });
	
	$('.box-sobre-user textarea').focus(function() {
		$('.box-sobre-user').addClass('focused');
	}).blur(function() {
		$('.box-sobre-user').removeClass('focused');
	})
	
	$('#edit-text-sobre').click(function() {
		$('.box-sobre-user').addClass('focused');
		$('.box-sobre-user textarea').focus();
	})
	
	$('#save-text-sobre').click(function() {
		$('.box-sobre-user').removeClass('focused');
		$('.box-sobre-user textarea').blur();
	})
	
	$('.close-area').hover(function() {
		$('.close-molde').addClass('hovered');
	}, function(){
		$('.close-molde').removeClass('hovered');
	});
	
	/* inicio história */
	
	$('.mask, .editar-capa .button, .sair-pagina .button').click(function(e) {
        $('.mask, .editar-capa, .sair-pagina, .ler-uma-historia, .box-desafio, .box-form').stop().animate({opacity: 0}, 300, function() {
			$('.mask, .editar-capa, .sair-pagina, .ler-uma-historia, .box-desafio, .box-form').css({display: 'none'});
		})
    });
	
	$('.lista-contato ul a').click(function(e) {
		$('.mask').css({display: 'block'}).stop().animate({opacity: .7}, 300);
		$('.box-form').css({display: 'block'}).stop().animate({opacity: 1}, 300);
    });
	
	$('#editar-capa').click(function(e) {
		$('.mask').css({display: 'block'}).stop().animate({opacity: .7}, 300);
		$('.editar-capa').css({display: 'block'}).stop().animate({opacity: 1}, 300);
    });
	
	$('.button-back-page').click(function(e) {
		$('.mask').css({display: 'block'}).stop().animate({opacity: .7}, 300);
		$('.sair-pagina').css({display: 'block'}).stop().animate({opacity: 1}, 300);
    });
	
	/* single história */
	
	$('.outros-part-list li').hover(function() {
		$(this).find('.tool-autor').css({display: 'block'}).stop().animate({bottom: -60, opacity: 1}, 300, 'easeOutBack');
	}, function() {
		$(this).find('.tool-autor').stop().animate({bottom: -45, opacity: 0}, 300, 'easeInBack', function() {
			$(this).css({display: 'block'});
		});
	});



// EDITADOS BY ALAN
	
	// Criar historia
	$("#btncriar").click(function() {
		$("#criar-form").submit();

		return false;
	});

	//COntador de caracteres
	$("#addintro").keyup(function() {
		textotamanho = $("#addintro").val().length;
		$(".contador-caracteres").html(textotamanho);
		$(this).removeClass("error");
		$(".min-caracteres").removeClass("error");
	});

	// Salvar Intro - Validaçao e post de form
	$(".btn-salvar").click(function() {
		var textointro = $("#addintro").val();
		var textotamanho = textointro.length;
		if (textotamanho < 150) {
			$("#addintro").addClass("error");
			$("#addintro").focus();
			$(".min-caracteres").addClass("error");
		}
		else {
			$("#form-intro").submit();
		}
		return false;
	});

	$("#addintro").blur(function() {
		$(this).removeClass("error");
		$(".min-caracteres").removeClass("error");
	});

	//Salvar novo trecho

	$(".btn-salvar-novo-trecho").click(function() {
		var mincarac = $("#mincaracteres").val();
		var textointro = $("#addnovotrecho").val();
		var textotamanho = textointro.length;
		if (textotamanho < mincarac) {
			$("#addnovotrecho").addClass("error");
			$("#addnovotrecho").focus();
			$(".min-caracteres").addClass("error");
		}
		else {
			$("#form-intro").submit();
		}
		return false;
	});

	$("#addnovotrecho").blur(function() {
		$(this).removeClass("error");
		$(".min-caracteres").removeClass("error");
	});

	$("#addnovotrecho").keyup(function() {
		textotamanho = $("#addnovotrecho").val().length;
		$(".contador-caracteres").html(textotamanho);
		$(this).removeClass("error");
		$(".min-caracteres").removeClass("error");
	});

	// BTN LER HISTORIA
	$("#ler-btn").click(function() {
		$("#ler-historia").submit();

		return false;
	});
	
});

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

