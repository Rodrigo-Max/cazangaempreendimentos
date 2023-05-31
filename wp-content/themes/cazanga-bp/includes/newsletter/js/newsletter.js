function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
jQuery(function($) {
	function checkNewsletter(n, e, b){
		if(n.length == 0){
			b.html('<div class="animated shake alert alert-danger">Nome em branco!</div>');
			return false;
		}
		if(!validateEmail(e)){
			b.html('<div class="animated shake alert alert-danger">E-mail inválido!</div>');
			return false;
		}
		b.html('');
		return true;
	}

	$('.newsletter').on('submit', function(event) {
		event.preventDefault();
		var pn = $(this);
        var error = $(this).find('.error_pn');
		var email    = $.trim($(this).find('.input-email').val());
		var nome    = $.trim($(this).find('.input-text').val());

		if (checkNewsletter(nome, email, error)){
			$.ajax({
	            type:     'GET',
	            url:      p_newsletter.ajax_url,
	            cache:    false,
	            dataType: 'json',
	            data:     $( this ).serialize(),
	            beforeSend: function(){
	                error.html( '<div class="alert alert-info text-center" role="alert">Cadastrando...</div>' );
	            },
	            success: function ( data ) {
	                if ( 0 < data.error.length ) {
	                    error.html( '<div class="animated shake text-center alert alert-danger" role="alert">' + data.error + '</div>' );
	                } else if ( 0 < data.success.length ) {
	                    pn[0].reset();
	                    error.html( '<div class="animated shake text-center alert alert-success" role="alert">Seu cadastro foi realizado com sucesso.</div>' );
	                } else {
	                    error.html( '<div class="animated shake text-center alert alert-danger" role="alert"><strong>Erro:</strong> não foi possível realizar o cadastro, tente novamente.</div>' );
	                }
	            },
	            error: function (erro) {
	            	error.html( '<div class="animated shake text-center alert-danger" role="alert"><strong>Erro:</strong> não foi possível realizar o cadastro, tente novamente.</div>' );
	            }
	        });
		}
		return false;
	});
});