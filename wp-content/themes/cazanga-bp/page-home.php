<?php get_header(); ?>
<div id="slider-home">
    <?php echo do_shortcode('[rev_slider alias="home"][/rev_slider]'); ?>
</div>
<section id="pilares" class="position-relative">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-3">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/bairros-planejados.png" class="d-block img-fluid mx-auto wow animate__rollIn" alt="Finanças" />
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="200ms">Bairros Planejados com<br><strong>Infraestrutura completa</strong></p>
            </div>
            <div class="col-6 col-md-3">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/financiamento.png" class="d-block img-fluid mx-auto wow animate__rollIn" data-wow-delay="400ms" alt="Pessoas" />
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="600ms"><strong>Financiamento</strong><br>próprio</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/tempo.png" class="d-block img-fluid mx-auto wow animate__rollIn" data-wow-delay="800ms" alt="Vendas" />
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="1000ms"><strong>Mais de 35 anos</strong><br>de mercado</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/bairros-entregues.png" class="d-block img-fluid mx-auto wow animate__rollIn" data-wow-delay="1200ms" alt="Operações" />
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="1400ms"><strong>Mais de xx Bairros</strong><br>Planejados entregues</p>
            </div>
        </div>
    </div>
</section>
<section id="bairros-abertos" class="position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="#" class="bairro venda-aberta">
                    <span class="tag"></span>
                    <figure>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/empreendimento.png" class="img-bairro" />
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-empreendimento.png" class="logo-bairro" />
                    </figure>
                    <div class="content-bairro">
                        <h3>Margarida Rezende</h3>
                        <p class="cidade"><strong>Cidade:</strong><br>Arcos</p>
                        <p class="previsao-entrega"><strong>Previsão de entrega:</strong><br>dez/2024</p>
                        <div class="bt-cta">Clique aqui e conheça <br>o Bairro Planejado</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="#" class="bairro venda-breve">
                    <span class="tag"></span>
                    <figure>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/empreendimento.png" class="img-bairro" />
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-empreendimento.png" class="logo-bairro" />
                    </figure>
                    <div class="content-bairro">
                        <h3>Margarida Rezende</h3>
                        <p class="cidade"><strong>Cidade:</strong><br>Arcos</p>
                        <p class="previsao-entrega"><strong>Previsão de entrega:</strong><br>dez/2024</p>
                        <div class="bt-cta"><strong>Cadastre-se</strong><br>Te avisaremos da abertura das <br>vendas antecipadamente.</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="#" class="bairro venda-breve">
                    <span class="tag"></span>
                    <figure>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/empreendimento.png" class="img-bairro" />
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo-empreendimento.png" class="logo-bairro" />
                    </figure>
                    <div class="content-bairro">
                        <h3>Margarida Rezende</h3>
                        <p class="cidade"><strong>Cidade:</strong><br>Arcos</p>
                        <p class="previsao-entrega"><strong>Previsão de entrega:</strong><br>dez/2024</p>
                        <div class="bt-cta"><strong>Cadastre-se</strong><br>Te avisaremos da abertura das <br>vendas antecipadamente.</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="bairros-entregues" class="position-relative">
    <h2 class="text-center">Bairros Planejados <strong>já entregues:</strong></h2>
    <div class="slick-carousel" id="slick-fotos">
        <div class="item">
            <a href="#" class="bairro-entregue" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bairro-1.png);">
                <h3>Alto dos Pinheiros</h3>
            </a>
        </div>
        <div class="item">
            <a href="#" class="bairro-entregue" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bairro-1.png);">
                <h3>Portal das Acácias</h3>
            </a>
        </div>
        <div class="item">
            <a href="#" class="bairro-entregue" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bairro-1.png);">
                <h3>Alto dos Pinheiros</h3>
            </a>
        </div>
        <div class="item">
            <a href="#" class="bairro-entregue" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bairro-1.png);">
                <h3>Alto dos Pinheiros</h3>
            </a>
        </div>
    </div>
</section>
<section id="whatsapp-home" class="position-relative">
    <div class="container">
        <a href="https://wa.me/553732221205" target="_blank"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/whatsapp-home.png" /><h2>Converse com nosso <strong><em>setor comercial</em></strong> pelo whatsapp. <strong>Clique aqui</strong></h2></a>
    </div>
</section>
<?php get_footer(); ?>