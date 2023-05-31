jQuery( document ).ready( function ( $ ) {
	"use strict";
	var $grid = $('.blog-posts').imagesLoaded( function() {
		// init Masonry after all images have loaded
		$grid.masonry({
			itemSelector: '.post-item',
		});
	});
});