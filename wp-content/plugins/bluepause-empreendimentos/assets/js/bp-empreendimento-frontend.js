jQuery( document ).ready( function ( $ ) {
	"use strict";

	$('#slick-galeria').slick({
		centerMode: true,
		centerPadding: '60px',
		slidesToShow: 3,
		variableWidth: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					centerMode: true,
			        centerPadding: '40px',
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
					centerMode: false,
					variableWidth: false,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					centerMode: false,
					variableWidth: false,
				}
			},
		]
	});

	/*fr = new FilmRoll({
		container: '#slick-fotos',
		height: 550,
		pager: false,
		scroll: false
	  });*/
});