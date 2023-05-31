jQuery( document ).ready( function ( $ ) {
	"use strict";

	/*if ($(window).width() > 767)
		var wow = new WOW().init();*/

	$('#slick-fotos').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		rows: 1,
		prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					rows: 1
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					rows: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					rows: 1
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					rows: 1
				}
			}
		]
	});
});