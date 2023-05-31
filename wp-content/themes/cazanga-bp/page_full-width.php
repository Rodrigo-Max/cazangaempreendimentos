<?php
/*
Template Name: Largura Total
Template Post Type: page
*/
?>
<?php get_header(); ?>
<?php
    $page_actual = is_page(1310) || is_page(1334) || is_page(1336) ? true : false;
?>
<div id="content" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog"<?php echo $page_actual ? ' style="background-color: #f6f6f6;"' : ''; ?>>
    <div class="container custom-container">
        <?php
            echo is_front_page() ? '<div class="d-none">' : '', ''; // Oculta breadcrumbs na home

            if ( function_exists('yoast_breadcrumb') )
                yoast_breadcrumb('<div id="breadcrumbs">','</div>');

            echo is_front_page() ? '</div>' : ''; // Fim Oculta breadcrumbs na home
        ?>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container custom-container">
                <?php
                    if ( has_post_thumbnail() ) {
                        echo '<div class="featured-image">';
                        the_post_thumbnail();
                        echo '</div>';
                    }
                ?>
                <?php the_title('<h1 class="entry-title" itemprop="name">', '</h1>'); ?>
            </div>
            <div class="entry" itemprop="text">
                <?php the_content(); ?>
                <div class="clearfix"></div>
            </div>
        </article>
    <?php endwhile; ?>
    <?php endif; ?>
    <div class="container custom-container">
        <?php bp_form(); ?>
    </div>
</div>
<?php get_footer(); ?>