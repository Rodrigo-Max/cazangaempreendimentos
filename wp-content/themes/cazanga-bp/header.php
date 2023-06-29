<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
<div class="address-top d-none d-lg-block">
    <div class="container">
        <p class="m-0 text-center"><strong>Atendimento:</strong> 37 3351-1666 | 37 99915-3167  •  Rua Jarbas Ferreira Pires, 412 - Lj 02 - Centro, Arcos-MG  •  Acompanhe nossas redes sociais: <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></p>
    </div>
</div>
<header id="main_header">
    <div class="container custom-container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?php echo esc_url(get_bloginfo('url')); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_html(get_bloginfo('name')); ?>" class="img-fluid" /></a>
            <?php
                wp_nav_menu([
                    'menu'            => 'primary',
                    'theme_location'  => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'bs4navbar',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav mx-auto',
                    'depth'           => 2,
                    'fallback_cb'     => 'bs4navwalker::fallback',
                    'walker'          => new bs4navwalker()
                ]);
            ?>
        </nav>
        <a href="#" class="burger-menu vertical-align"><i></i></a>
        <nav class="nav-menu">
            <div class="nav-menu-layer"><span></span></div>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'table-align', 'menu_class' => 'nav-list cell-view' ) ); ?>
        </nav>
    </div>
</header>