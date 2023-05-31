jQuery( document ).ready( function ( $ ) {
	"use strict";

    $('.solicitar-contato').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
        $('.form-contato').slideToggle(600);
    });

    $('.bt-quero').click(function(e) {
        $(this).toggleClass('active');
        $('.newsletter').slideToggle(400);
    });
});