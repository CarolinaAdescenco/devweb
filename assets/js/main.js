$(document).ready(function () {

	$('.selectpicker').selectpicker();

	$('.slider--home').slick({
		infinite: true,
		dots: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 4500,
		responsive: [{
			breakpoint: 993,
			settings: {
				dots: false,
				arrows: false,
			}
		}]
	});


	$('.slider--clientes').slick({
		infinite: true,
		dots: false,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 4500,
		slidesToShow: 4,
		responsive: [{
			breakpoint: 993,
			settings: {
				slidesToShow: 2,
				dots: false,
				arrows: true,
			}
		}]
	});

	$('#backToTop').hide().removeClass('d-flex').css({ opacity: 0 })

	$('#backToTop').on('click tap', function (evt) {
		evt.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		})
	})

});

$(window).scroll(function () {
	if ($(window).scrollTop() >= 200) {
		$('#backToTop').addClass('d-flex').show().css({ opacity: 1 })
	} else {
		$('#backToTop').hide().removeClass('d-flex').css({ opacity: 0 })
	}
});

$(function(){
	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
	};
	
	$('.telefone').mask(SPMaskBehavior, spOptions);

	$("#formulario-contato").submit(function(e){
		e.preventDefault();
		if($("#formulario-contato").valid()){
			$.ajax({
				url: 'http://dominio/ajax/send-mail-contato.php', 
				type: 'post',
				dataType: 'json',
				data: $("#formulario-contato").serialize(),
				success: function(data){
					console.log(data);
					if(data){
							Swal({
									type: 'success',
									title: 'Sua mensagem foi enviada com sucesso!',
									showConfirmButton: true,
							});
					} else{
							Swal({
									type: 'error',
									title: 'Erro ao enviar a mensagem!',
									showConfirmButton: true,
							})
					}
				}, 
				error: function(erro){
					console.log(erro);
				}
			});
		}
	});
});

$(function(){
	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
	};
	
	$('.telefone').mask(SPMaskBehavior, spOptions);

	$("#formulario-orcamento").submit(function(e){
		e.preventDefault();
		if($("#formulario-orcamento").valid()){
			$.ajax({
				url: 'http://dominio/ajax/send-mail-orcamento.php', 
				type: 'post',
				dataType: 'json',
				data: $("#formulario-orcamento").serialize(),
				success: function(data){
					console.log(data);
					if(data){
							Swal({
									type: 'success',
									title: 'Sua mensagem foi enviada com sucesso!',
									showConfirmButton: true,
							});
					} else{
							Swal({
									type: 'error',
									title: 'Erro ao enviar a mensagem!',
									showConfirmButton: true,
							})
					}
				}, 
				error: function(erro){
					console.log(erro);
				}
			});
		}
	});
});