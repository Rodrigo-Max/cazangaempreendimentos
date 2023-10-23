jQuery( document ).ready( function ( $ ) {
	"use strict";

	$('#slick-fotos').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		rows: 1,
		prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
	});
});