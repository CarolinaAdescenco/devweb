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
})