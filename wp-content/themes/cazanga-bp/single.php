<?php get_header(); ?>
<div id="main-content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="header-blog">
        <h1>BLOG TACADA</h1>
    </div>
    <section class="container-newsletter">
        <div class="container">
            <div class="bt-quero"><strong>Quero receber novidades!</strong></div>
            <form method="post" onsubmit="return false;" class="newsletter">
                <p class="fique-por-dentro text-uppercase">Fique por dentro!</p>
                <p class="cadastre">Cadastre-se, <strong class="font-weight-600">receba novidades</strong> sobre o que aconteceu na BluePause.</p>
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
                    <div class="col-12 order-md-5">
                        <p class="font-size-12">Ao informar seus dados, utilizaremos os mesmos apenas para enviar emails relacionados ao Blog Tacada. Não disponibilizaremos seus dados para terceiros em hipótese alguma.</p>
                    </div>
                    <div class="col-12 col-sm-12 order-md-4 col-md-2 col-lg-1">
                        <button type="submit" name="pn_enviar" class="d-block mx-auto text-uppercase"><i class="fas fa-chevron-right"></i> <strong>OK</strong></button>
                    </div>
                </div>
                <div class="error_pn"></div>
            </form>
        </div>
    </section>
    <div class="container">
        <?php
            if ( function_exists('yoast_breadcrumb') )
                yoast_breadcrumb('<nav id="breadcrumbs">','</nav>');
        ?>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9 blog-col">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
                        <?php
                            $values = get_post_custom( $post->ID );
                            $bp_subtitulo = isset( $values['bp_subtitulo'] ) ? esc_attr( $values['bp_subtitulo'][0] ) : '';
                            if (!empty($bp_subtitulo))
                                echo '<p class="entry-subtitle">', $bp_subtitulo, '</p>';
                        ?>
                        <header class="entry-header">
                            <p class="post-meta">
                                <span><time class="entry-date updated" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>
                                <span><?php echo get_the_category_list(', '); ?>
                            </p>
                        </header>
                        <div class="sep"></div>
                        <?php
                            if ( has_post_thumbnail() ) {
                                echo '<div class="featured-image"><figure>';
                                the_post_thumbnail('full');
                                echo '</figure></div>';
                            }
                        ?>
                        <div class="entry" itemprop="text">
                            <?php the_content(); ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php the_tags('<div class="list-tags"><span class="title-tags">Tags:</span> ', '', '</div>'); ?>
                        <div class="clearfix"></div>
                        <?php echo do_shortcode('[reaction_buttons]'); ?>
                        <div class="clearfix"></div>
                        <?php get_template_part( 'social', 'share' ); ?>
                        <div class="clearfix"></div>
                    </article>
                    <div class="pb-post"></div>
                <?php endwhile; ?>
                <?php comments_template(); ?>
                <?php if ( function_exists( 'echo_crp' ) ) { echo_crp(); } ?>
                <div class="clearfix"></div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<section id="contato">
	<div class="container custom-container">
		<h2 class="text-center text-162f49"><strong>Gostaria de sugerir uma matéria?</strong></h2>
		<p class="text-center text-162f49 font-size-xl-24 mt-3 mb-5">Preencha o formulário abaixo e mande sua ideia para nós.</p>
		<a href="javascript:void(0)" class="solicitar-contato text-uppercase font-size-18 font-size-xl-24 mx-auto"><strong>Sugerir matéria</strong></a>
		<div class="form-contato">
			<?php echo do_shortcode('[contact-form-7 id="116" title="Contato Blog"]'); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>