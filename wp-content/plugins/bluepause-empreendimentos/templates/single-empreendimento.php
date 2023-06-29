<?php get_header(); ?>
<div id="empreendimento-content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="empreendimento-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
                    if (function_exists('get_field')){
                        $logo = wp_get_attachment_image_url(get_field('logo'), 'full');
                        $slogan = get_field('slogan');
                        $breve_descricao = get_field('breve_descricao');
                        $mapa = get_field('mapa');
                        $video = get_field('video');

                        $area_terreno = get_field('area_terreno');
                        $area_lotes = get_field('area_lotes');
                        $area_ruas = get_field('area_ruas');
                        $area_institucional = get_field('area_institucional');
                        $total_lotes = get_field('total_lotes');
                        $cidade = get_field('cidade');

                        $formulario_facilita = get_field('formulario_facilita');
                    }
                    
                    $cats = get_the_terms(get_the_ID(), 'empreendimento_cat');
                    foreach ($cats as $cat){
                        if ($cat->term_id == 3)
                            $venda_aberta = true;
                    }

                    echo '<figure class="featured-image">';
                    if (has_post_thumbnail()){
                        $url_destacada = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        echo '<img src="', $url_destacada, '" class="img-bairro" />';
                    }
                    if (isset($logo)){
                        echo '<img src="', $logo, '" class="logo-bairro" />';
                    }
                    echo '</figure>';
                ?>
                <h1 class="d-none" itemprop="name"><?php the_title(); ?></h1>
                <div class="container descricao">
                    <?php if (!empty($slogan)){ ?><h2 class="slogan text-center text-lg-left text-uppercase"><?php echo $slogan; ?></h2><?php } ?>
                    <?php if (!empty($breve_descricao)){ ?><p class="breve-descricao text-center text-lg-left"><?php echo nl2br($breve_descricao); ?></p><?php } ?>
                </div>
                <?php
                    if (function_exists('have_rows')){
                        if( have_rows('fotos', get_the_ID()) ){
                            echo '<div class="slick-carousel" id="slick-galeria">';
                            while ( have_rows('fotos', get_the_ID()) ) {
                                the_row();
                                $images = get_sub_field('foto_do_empreendimento');
                                echo '<div class="item">';
                                echo '<div class="item-transition">';
                                echo '<img src="', wp_get_attachment_image_url($images, 'full'), '" class="d-block w-100 img-fluid" />';
                                echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                    }
                ?>
                <?php if (!empty($video)){ ?>
                    <div class="container video">
                        <h3 class="text-center"><strong>Confira a vista áerea</strong> do bairro planejado:</h3>
                        <?php $embed_video = bp_getVideoEmbedUrl($video); ?>              
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo $embed_video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php } ?>
                <section id="ficha-tecnica-empreendimento" class="position-relative">
                    <div class="container">
                        <h3 class="text-left text-uppercase">Ficha Técnica</h3>
                        <p class="nome-empreendimento"><?php the_title(); ?> | Bairro Planejado</p>
                        <?php if (isset($area_terreno)){ ?>
                            <p class="dados-terreno">Área total do Terreno: <strong><?php echo number_format($area_terreno, 2, ',', '.'); ?> M<sup>2</sup></strong></p>
                        <?php } ?>
                        <?php if (isset($area_lotes)){ ?>
                            <p class="dados-terreno">Área total de Lotes: <strong><?php echo number_format($area_lotes, 2, ',', '.'); ?> M<sup>2</sup></strong></p>
                        <?php } ?>
                        <?php if (isset($area_ruas)){ ?>
                            <p class="dados-terreno">Área total de Ruas: <strong><?php echo number_format($area_ruas, 2, ',', '.'); ?> M<sup>2</sup></strong></p>
                        <?php } ?>
                        <?php if (isset($area_institucional)){ ?>
                            <p class="dados-terreno">Área Institucional: <strong><?php echo number_format($area_institucional, 2, ',', '.'); ?> M<sup>2</sup></strong></p>
                        <?php } ?>
                        <?php if (isset($total_lotes)){ ?>
                            <p class="dados-terreno verde">Total de Lotes: <strong><?php echo number_format($total_lotes, 0, ',', '.'); ?></strong></p>
                        <?php } ?>
                        <?php if (isset($total_lotes)){ ?>
                            <p class="dados-terreno verde">Cidade: <strong class="text-uppercase"><?php echo $cidade; ?></strong></p>
                        <?php } ?>
                    </div>
                    <?php
                        if (!empty($url_destacada)){
                            echo '<div class="bg-ficha-tecnica" style="background-image: url(', $url_destacada, ')"></div>';
                        }
                    ?>
                </section>
                <?php if (isset($venda_aberta)){ ?>
                    <?php if (!empty($formulario_facilita)){ ?>
                        <section id="facilita-empreendimento" class="position-relative">
                            <h3 class="text-center"><strong>Gostou?</strong> Então garanta já sua unidade!</h3>
                            <?php echo stripslashes($formulario_facilita); ?>
                        </section>
                    <?php } else { ?>
                        <section id="whatsapp-empreendimento" class="position-relative">
                            <h3 class="text-center"><strong>Gostou?</strong> Então garanta já sua unidade!</h3>
                            <div class="bg-white">
                                <div class="container">
                                    <a href="https://wa.me/553732221205" target="_blank"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/whatsapp-home.png" /><h4>Converse com nosso <strong><em>setor comercial</em></strong> pelo whatsapp. <strong>Clique aqui</strong></h4></a>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                <?php } ?>
                <?php if (!empty($mapa)){ ?>
                    <section id="mapa-empreendimento" class="position-relative">
                        <h3 class="text-center text-uppercase">Localização do Empreendimento</h3>
                        <?php echo stripslashes($mapa); ?>
                    </div>
                <?php } ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>