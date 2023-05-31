jQuery( document ).ready( function ( $ ) {
	"use strict";
	
	var prf_frontend = {

		/**
		 * Initialize frontend actions
		 */
		init: function() {
            this.maskGeneral();
        },

		maskGeneral: function() {
			prf_frontend.maskPhone( 'input.tel' );
		},

		maskPhone: function(selector) {
			var $element = $(selector),
					MaskBehavior = function(val) {
						return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
					},
					maskOptions = {
						onKeyPress: function(val, e, field, options) {
							field.mask(MaskBehavior.apply({}, arguments), options);
						}
					};

			$element.mask(MaskBehavior, maskOptions);
		},
    }
	prf_frontend.init();
});