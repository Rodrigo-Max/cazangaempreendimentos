<a href="https://wa.me/553732221205" target="_blank" id="whatsapp-fixo"><i class="fab fa-whatsapp" aria-hidden="true"></i><div class="texto-whatsapp">Estamos online, converse com nosso time comercial agora mesmo.</div></a>
<footer id="main_footer" class="position-relative">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                <a href="<?php echo esc_url(get_bloginfo('url')); ?>" class="logo-rodape"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-footer.png" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="d-block mx-auto img-fluid mb-5 mb-lg-0 mx-xl-0" /></a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <address class="mt-3 mt-md-0"><p class="m-0 text-center text-md-left"><strong class="text-uppercase">Endereço</strong><br>Rua Jarbas Ferreira Pires, 412 - Lj 02<br>Centro - Arcos/MG | CEP: 35588-000</address>
                <p class="m-0 text-center text-md-left contato"><strong class="text-uppercase">Telefone</strong><br><a href="tel:03733511666">37 3351 1666</a> | <a href="tel:037999153167">37 99915 3167</a></p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <p class="mt-5 mt-md-0 text-center text-md-left social"><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a> <span>| Cazanga Empreendimentos</span></p>
            </div>
        </div>
    </div>
    <div id="developer"><p class="text-center">Desenvolvido por <a href="https://www.bp360.com.br/" rel="external" target="_blank">Agência BluePause</a></p></div>
</footer>
<?php wp_footer(); ?>

<?php if (is_single('post')): ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.11&appId=173328193027764';
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<script type="text/javascript">
		(function() {
			window.PinIt = window.PinIt || { loaded:false };
			if (window.PinIt.loaded) return;
			window.PinIt.loaded = true;
			function async_load(){
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				if (window.location.protocol == "https:")
					s.src = "https://assets.pinterest.com/js/pinit.js";
				else
					s.src = "http://assets.pinterest.com/js/pinit.js";
				var x = document.getElementsByTagName("script")[0];
				x.parentNode.insertBefore(s, x);
			}
			if (window.attachEvent)
				window.attachEvent("onload", async_load);
			else
				window.addEventListener("load", async_load, false);
		})();
	</script>
	<script >
	window.___gcfg = {
		lang: 'pt-BR',
		parsetags: 'onload'
	};
	</script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
<?php endif; ?>
    </body>
</html>