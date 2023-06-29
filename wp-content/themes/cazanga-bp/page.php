<?php get_header(); ?>
<div id="content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
                if ( has_post_thumbnail()) :
                    $bgimage_ext_id = get_the_post_thumbnail_url( get_the_id(), 'full' );

                    echo '<div class="featured-image-bg" style="background-image: url(', $bgimage_ext_id, ');">';
                    echo '<div class="overlay-bg"></div>';
                    the_title('<h1 class="entry-title" itemprop="name">', '</h1>');
                    echo '</div>';
                else :
                    echo '<div class="featured-image-bg">';
            ?>
                <?php echo is_front_page() ? '<div class="d-none">' : '', ''; ?>
                    <?php the_title('<h1 class="entry-title" itemprop="name">', '</h1>'); ?>
                <?php echo is_front_page() ? '</div>' : ''; ?>
                <?php echo '</div>'; ?>
            <?php endif; ?>

            <div class="container">
                <?php
                    echo is_front_page() ? '<div class="d-none">' : '', ''; // Oculta breadcrumbs na home

                    if ( function_exists('yoast_breadcrumb') )
                        yoast_breadcrumb('<div id="breadcrumbs">','</div>');

                    echo is_front_page() ? '</div>' : ''; // Fim Oculta breadcrumbs na home
                ?>
                <div class="entry" itemprop="text">
                    <?php the_content(); ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>