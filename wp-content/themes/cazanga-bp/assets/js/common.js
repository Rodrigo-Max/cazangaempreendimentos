jQuery( document ).ready( function ( $ ) {
	"use strict";

    $(document).scroll(function(e){
		var scrollTop = $(document).scrollTop();

	    if(scrollTop > 200 ){
	        $('#main_header').addClass('mini-navbar');
        }
        else{
	        $('#main_header').removeClass('mini-navbar');
	    }
	});

	$('.back-to-top').click(function(e){
		$('html, body').animate({
			scrollTop: 0
		}, 600);
	});

    $('li.menu-item a[href*="#"]:not([href="#"])').click(function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			e.preventDefault();
			var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                var mtop = 63;

                $('html, body').animate({
                    scrollTop: (target.offset().top - mtop)
                }, 1000);

                return false;
            }
        }
	});
});