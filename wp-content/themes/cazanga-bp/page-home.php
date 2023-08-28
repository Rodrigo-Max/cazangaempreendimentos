<?php get_header(); ?>
<div id="slider-home">
    <div class="d-block d-md-none">
        <?php echo do_shortcode('[rev_slider alias="home-mobile"][/rev_slider]'); ?>
    </div>
    <div class="d-none d-md-block">
        <?php echo do_shortcode('[rev_slider alias="home"][/rev_slider]'); ?>
    </div>
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
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="1000ms"><strong>Mais de 12 anos</strong><br>de mercado</p>
            </div>
            <div class="col-6 col-md-3">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/bairros-entregues.png" class="d-block img-fluid mx-auto wow animate__rollIn" data-wow-delay="1200ms" alt="Operações" />
                <p class="text-center mb-5 wow animate__rollIn" data-wow-delay="1400ms"><strong>Mais de uma dezena de</strong><br>Bairros Planejados entregues</p>
            </div>
        </div>
    </div>
</section>
<section id="bairros-abertos" class="position-relative">
    <div class="container">
        <?php
           $args = array(
                'posts_per_page'   => 3,
                'post_type'        => 'empreendimento',
                'tax_query' => array(
                    array (
                        'taxonomy' => 'empreendimento_cat',
                        'field' => 'term_id',
                        'terms' => array(6),
                    )
                ),
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $queryEmpreendimento = new WP_Query( $args );
            if ($queryEmpreendimento->have_posts()){
                echo '<div class="row justify-content-center">';
                while ($queryEmpreendimento->have_posts()){
                    $queryEmpreendimento->the_post();
                    
                    $cats = get_the_terms(get_the_ID(), 'empreendimento_cat');
                    $class_venda = 'venda-aberta';
                    foreach ($cats as $cat){
                        if ($cat->term_id == 4)
                            $class_venda = 'venda-breve';
                    }
                    
                    $cidade = '';
                    $previsao = '';
                    if (function_exists('get_field')){
                        $logo_listagem = wp_get_attachment_image_url(get_field('logo_listagem'), 'medium');
                        $previsao = get_field('previsao');
                        $cidade = get_field('cidade');
                    }

                    echo '<div class="col-12 col-md-6 col-lg-4">';
                    echo '<a href="', get_the_permalink(), '" class="bairro ', $class_venda, '">';
                    echo '<span class="tag"></span>';
                    
                    echo '<figure>';

                    if (has_post_thumbnail()){
                        echo '<img src="', get_the_post_thumbnail_url(get_the_ID(), 'full'), '" class="img-bairro" />';
                    }

                    if (isset($logo_listagem)){
                        echo '<img src="', $logo_listagem, '" class="logo-bairro" />';
                    }
                    echo '</figure>';

                    echo '<div class="content-bairro">';
                    echo '<h3>', get_the_title(), '</h3>';
                    echo '<p class="cidade"><strong>Cidade:</strong><br>', $cidade, '</p>';

                    if ($class_venda != 'ja-entregue'){
                        if (!empty($previsao))
                            echo '<p class="previsao-entrega"><strong>Previsão de entrega:</strong><br>', $previsao, '</p>';
                    }
                    else
                        echo '<p class="previsao-entrega"><strong>Empreendimento concluído</strong></p>';

                    if ($class_venda == 'venda-aberta')
                        echo '<div class="bt-cta">Clique aqui e conheça <br>o Bairro Planejado</div>';
                    else
                        echo '<div class="bt-cta"><strong>Cadastre-se</strong><br>Te avisaremos da abertura das <br>vendas antecipadamente.</div>';

                    echo '</div>';

                    echo '</a>';
                    echo '</div>';
                }
                echo '</div>';
            }
            wp_reset_postdata();
        ?>
    </div>
</section>
<section id="bairros-entregues" class="position-relative">
    <h2 class="text-center">Bairros Planejados <strong>já entregues:</strong></h2>
    <?php
        $args = array(
            'posts_per_page'   => 8,
            'post_type'        => 'empreendimento',
            'tax_query' => array(
                array (
                    'taxonomy' => 'empreendimento_cat',
                    'field' => 'term_id',
                    'terms' => 5,
                )
            ),
        );
        $queryEmpreendimento = new WP_Query( $args );
        if ($queryEmpreendimento->have_posts()){
            echo '<div class="slick-carousel" id="slick-fotos">';
            while ($queryEmpreendimento->have_posts()){
                $queryEmpreendimento->the_post();

                $url = '';
                if (has_post_thumbnail())
                    $url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                echo '<div class="item">';
                echo '<a href="', get_the_permalink(), '" class="bairro-entregue" style="background-image: url(', $url, ');">';
                echo '<h3>', get_the_title(), '</h3>';
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }
        wp_reset_postdata();
    ?>
</section>
<section id="whatsapp-home" class="position-relative">
    <div class="container">
        <a href="https://wa.me/5537999153167" target="_blank"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/whatsapp-home.png" /><h2>Converse com nosso <strong><em>setor comercial</em></strong> pelo whatsapp. <strong>Clique aqui</strong></h2></a>
    </div>
</section>
<?php get_footer(); ?>