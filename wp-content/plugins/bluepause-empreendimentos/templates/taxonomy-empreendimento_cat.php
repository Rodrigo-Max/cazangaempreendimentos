<?php get_header(); ?>
<div id="content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <article id="page-empreendimentos" class="page">
        <?php
            $cat = get_queried_object(  );
        ?>
        <div class="featured-image-bg">
            <h1 class="entry-title"><?php echo $cat->name; ?></h1>
        </div>

        <div class="container">
            <div class="entry" itemprop="text">
                <?php
                    if (have_posts()) {
                        echo '<div class="row margin-empreendimento">';
                        while (have_posts()){
                            the_post();
                            $cats = get_the_terms(get_the_ID(), 'empreendimento_cat');
                            $class_venda = 'venda-aberta';
                            foreach ($cats as $cat){
                                if ($cat->term_id == 4)
                                    $class_venda = 'venda-breve';
                                if ($cat->term_id == 5)
                                    $class_venda = 'ja-entregue';
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
                            echo '<p class="previsao-entrega"><strong>Previsão de entrega:</strong><br>', $previsao, '</p>';
        
                            if ($class_venda == 'venda-aberta' || $class_venda == 'ja-entregue')
                                echo '<div class="bt-cta">Clique aqui e conheça <br>o Bairro Planejado</div>';
                            else
                                echo '<div class="bt-cta"><strong>Cadastre-se</strong><br>Te avisaremos da abertura das <br>vendas antecipadamente.</div>';
        
                            echo '</div>';
        
                            echo '</a>';
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </article>
</div>
<?php get_footer(); ?>