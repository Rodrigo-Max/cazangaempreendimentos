<?php get_header(); ?>
<div id="content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
                if ( has_post_thumbnail()) :
                    $bgimage_ext_id = get_the_post_thumbnail_url( get_the_id(), 'full' );

                    echo '<div class="featured-image-bg" style="background-image: url(', $bgimage_ext_id, ');">';
                    echo '<div class="overlay-bg"></div>';
                    echo '<h1 class="entry-title text-center" itemprop="name">Cazanga Empreendimentos:<br>construindo seu futuro com solidez e confiança</h1>';
                    echo '</div>';
                else :
                    echo '<div class="featured-image-bg">';
            ?>
                    <?php echo is_front_page() ? '<div class="d-none">' : '', ''; ?>
                    <h1 class="entry-title text-center" itemprop="name">Cazanga Empreendimentos:<br>construindo seu futuro com solidez e confiança</h1>
                    <?php echo is_front_page() ? '</div>' : ''; ?>
                    <?php echo '</div>'; ?>
            <?php
                endif;
            ?>
            <div class="container">
                <?php
                    echo is_front_page() ? '<div class="d-none">' : '', ''; // Oculta breadcrumbs na home

                    if ( function_exists('yoast_breadcrumb') )
                        yoast_breadcrumb('<div id="breadcrumbs">','</div>');

                    echo is_front_page() ? '</div>' : ''; // Fim Oculta breadcrumbs na home
                ?>
                <div class="entry" itemprop="text">
                    <p>Com uma trajetória de mais de 13 anos de excelência, a Cazanga Empreendimentos se firma como a principal fomentadora de bairros planejados de Arcos – Minas Gerais.</p>
                    <p>Nosso compromisso com a qualidade e a confiança é reforçado pelo legado de mais de uma dezena de bairros planejados entregues, que não apenas transformam as vidas das pessoas, mas também impulsionam o crescimento econômico e social.</p>
                    <p>Desde o início de nossa jornada, buscamos incansavelmente a excelência em cada empreendimento que trazemos à vida. Na Cazanga Empreendimentos, compreendemos que nossos projetos não são apenas loteamentos, mas sim cenários para histórias de vida.&nbsp;</p>
                    <p>Uma das maneiras pelas quais estabelecemos nossa autoridade é através do nosso compromisso com o sucesso dos nossos clientes. Oferecemos uma vantagem única: o financiamento próprio. Isso não apenas simplifica o processo, mas também demonstra nossa confiança em nossos projetos e no valor que eles agregam às vidas das pessoas.</p>
                    <p>Nosso compromisso com a qualidade, a inovação e a satisfação do cliente é a base que sustenta nossa autoridade e liderança no mercado.</p>
                    <p>Se você busca mais do que um loteamento, mas sim uma experiência transformadora, convidamos você a se juntar à família Cazanga. Juntos, continuaremos a construir horizontes, moldar destinos e criar um futuro que todos nós merecemos.</p>
                        
                    <div class="slick-carousel" id="slick-fotos">
                        <div class="item">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/sobre/DSC00041.png" class="d-block img-fluid mx-auto" />
                        </div>
                        <div class="item">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/sobre/DSC00038-2.png" class="d-block img-fluid mx-auto" />
                        </div>
                        <div class="item">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/sobre/DSC00029.jpeg" class="d-block img-fluid mx-auto" />
                        </div>
                        <div class="item">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/sobre/DSC00028.jpeg" class="d-block img-fluid mx-auto" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3742.3493451078007!2d-45.54623262386901!3d-20.285802149488465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b4897dd454d163%3A0x74e6f61195e85447!2sCazanga%20Empreendimento!5e0!3m2!1spt-BR!2sbr!4v1692727749991!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>