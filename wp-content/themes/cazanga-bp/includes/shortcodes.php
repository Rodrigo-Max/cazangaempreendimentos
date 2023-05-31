<?php
function getFormNewsletterBP( $atts ) {
  $string = '
  <section class="container-newsletter">
  <form method="post" onsubmit="return false;" class="newsletter">
      <p class="cadastre">Cadastre-se, <strong class="font-weight-600">receba novidades</strong> sobre o que aconeteceu na BluePause.</p>
      <div class="row">
          <div class="col-12 col-sm-4 col-md-4 col-lg-4">
              <label>Nome
                  <input type="text" name="Nome" class="input-text" aria-label="Nome"></label>
          </div>
          <div class="col-12 col-sm-4 col-md-3 col-lg-4">
              <label>Email
                  <input type="email" name="Email" class="input-email" aria-label="Email"></label>
          </div>
          <div class="col-12 col-sm-4 col-md-3 col-lg-3">
              <label>Empresa (opcional)
                  <input type="text" name="Empresa" class="input-empresa" aria-label="Empresa"></label>
          </div>
          <div class="col-12 col-sm-12 col-md-2 col-lg-1">
              <button type="submit" name="pn_enviar" class="d-block mx-auto text-uppercase"><i class="fas fa-chevron-right"></i> <strong>OK</strong></button>
          </div>
      </div>
      <div class="error_pn"></div>
  </form>
  </section>';

	return $string;
}
add_shortcode( 'newsletter-bp', 'getFormNewsletterBP' );