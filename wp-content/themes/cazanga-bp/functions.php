<?php
	define('BP_VERSION', '0.0.8');

	if ( is_admin() ){
		require_once('admin/settings.php');
		require_once('includes/newsletter/table_to_csv.php');
		require_once('includes/newsletter/list-newsletter.php');
	}

	require_once('includes/wp_my_walker_nav_menu.php');
	require_once('includes/bs4navwalker.php');
	require_once('includes/shortcodes.php');
	require_once('includes/post-meta-box.php');

	$bp_opcoes = get_option('bp_theme_settings');

	function modo_manutencao() {
		if( !is_user_logged_in() ) {
			include('includes/manutencao/index.php');
			exit;
		}
	}

	if (!empty($bp_opcoes['bpSoff']) && $bp_opcoes['bpSoff'] == 1)
		add_action('get_header', 'modo_manutencao');

	remove_action( 'wp_head', 'wp_generator' );

	add_action( 'after_setup_theme', 'bpSetupMenus' );
    if ( ! function_exists( 'bpSetupMenus' ) ):
        function bpSetupMenus() {
            register_nav_menus( array(
            	'primary' => __( 'Menu Principal', 'wptuts' ),
            	'secondary' => __('Menu Footer', 'wptuts'),
            ));
        }
	endif;

	if(function_exists('add_theme_support')){
		add_theme_support( 'post-thumbnails' );
	}

	function bpHomeTitle( $title, $sep ){
		global $paged, $page;

		$sep = '-';

	   if ( is_feed() )
		   return $title;

	   if (!is_front_page()){
		   $title = str_replace(' &raquo; ', '', $title);
		   $title = $title.' '.$sep.' '.get_bloginfo( 'name' );
	   }
	   else
		   $title = get_bloginfo( 'name' );

	   return $title;
   }
   add_filter( 'wp_title', 'bpHomeTitle', 10, 2 );

   function isSidebarActive($index){
	   global $wp_registered_sidebars;
	   $widgetcolums = wp_get_sidebars_widgets();

	   if ($widgetcolums[$index])
		   return true;

	   return false;
   }

   function bpSidebar() {
	   register_sidebar( array (
	   'name' => 'Barra Lateral',
	   'id' => 'sidebar',
	   'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	   'after_widget' => "</li>",
	   'before_title' => '<h3 class="widget-title">',
	   'after_title' => '</h3>',
	   ) );
   }
   add_action('init', 'bpSidebar');

	function image_alt_by_url( $image_url ) {
		global $wpdb;

		if( empty( $image_url ) ) {
			return false;
		}

		$query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
		$image_id   = ( ! empty( $query_arr ) ) ? $query_arr[0] : 0;

		return get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	}

	function wpdocs_custom_excerpt_length( $length ) {
    	return 30;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	function wpbeginner_numeric_posts_nav() {
		if( is_singular() )
			return;

		global $wp_query;

		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		if ( $paged >= 1 )
			$links[] = $paged;

		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="post_nav"><ul>' . "\n";

		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );

		echo '</ul></div>' . "\n";
	}

	function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
            padding-bottom: 0;
			background-size: 118px 45px;
			width: 118px;
			height: 45px;
        }
    </style>
<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	function my_login_logo_url() {
		return 'http://www.bp360.com.br/';
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );

	function my_login_logo_url_title() {
		return get_bloginfo('name').' desenvolvido por Agência BluePause';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );

	/* Scripts e Estilos Wordpress */
	function bpScripts() {
		wp_register_script('jquery-slim', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true);

		// Main css
		wp_register_style('style-bp360', get_stylesheet_uri(), false, BP_VERSION);

		// Main js
		wp_register_script('common-bp360', get_stylesheet_directory_uri().'/assets/js/common.js', array('jquery'), BP_VERSION, true);
		wp_register_script('whatsapp-bp360', get_stylesheet_directory_uri().'/assets/js/bp-whatsapp.js', array('jquery'), BP_VERSION, true);

		// Fonts
		wp_dequeue_style( 'fontawesome' );
		wp_register_style('noto-sans-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;600;700;800;900&display=swap"', false, BP_VERSION);
		
		wp_register_script('font-awesome-bp360', 'https://kit.fontawesome.com/3036d3d63b.js', array(), '5.10.2', true);

		// Animate css
		wp_register_style('animate', get_stylesheet_directory_uri().'/assets/css/animate.css', false, '3.7.0');

		// Bootstrap 4.3.1
		wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', false, '4.6.2');

		wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '4.6.2', true);
		wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), '1.16.1', true);

		// BP Social Share Buttons
		wp_register_script('bpssb', get_stylesheet_directory_uri().'/assets/js/bpssb.js', array('jquery'), BP_VERSION, true);

		// Slick
		wp_register_style('slick', get_stylesheet_directory_uri().'/assets/js/slick/slick.css', false, '1.9.0');
		wp_register_script('slick', get_stylesheet_directory_uri().'/assets/js/slick/slick.min.js', array('jquery'), '1.9.0', true);

		// home bp360
		wp_register_script('home-bp360', get_stylesheet_directory_uri().'/assets/js/home.js', array('jquery'), BP_VERSION, true);
		wp_register_style('home-bp360', get_stylesheet_directory_uri().'/assets/css/home.css', false, BP_VERSION);

		// Form de Inscrição
		wp_register_script('contato', get_stylesheet_directory_uri().'/assets/js/contato.js', array('jquery'), BP_VERSION, true);

		// Form de Blog
		wp_register_script('blog', get_stylesheet_directory_uri().'/assets/js/blog.js', array('jquery'), BP_VERSION, true);

		// Reveal CSS animations on scrolling
		wp_register_script('wow', get_stylesheet_directory_uri().'/assets/js/wow.min.js', array('jquery'), '1.1.3', true);

		// Lightbox
		wp_register_style('lightbox2', get_stylesheet_directory_uri().'/assets/js/lightbox2/css/lightbox.min.css', false, '2.10.0');
		wp_register_script('lightbox2', get_stylesheet_directory_uri().'/assets/js/lightbox2/js/lightbox.min.js', array('jquery'), '2.10.0', true);

		// Masonry jQquery
		wp_register_script('masonry', get_stylesheet_directory_uri().'/assets/js/masonry.pkgd.min.js', array('jquery'), '4.2.2', true);

		// Images Loaded jQquery
		wp_register_script('images-loaded', get_stylesheet_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true);

		// Scripts blog e categoria de posts
		wp_register_script('blog-masonry', get_stylesheet_directory_uri().'/assets/js/blog-masonry.js', array('jquery'), BP_VERSION, true);

		wp_enqueue_style('bootstrap');
		wp_enqueue_style('noto-sans-jp');
		wp_enqueue_style('style-bp360');
		//wp_enqueue_style('animate');
		//wp_enqueue_script('jquery-slim');
		//wp_enqueue_script('popper');
		wp_enqueue_script('bootstrap');
		wp_enqueue_script('whatsapp-bp360');
		wp_enqueue_script('common-bp360');

		if (is_front_page()){
			wp_enqueue_style('home-bp360');

			wp_enqueue_style('slick');
			wp_enqueue_script('slick');

			wp_enqueue_script('home-bp360');
		}
		
		wp_enqueue_script('font-awesome-bp360');
	}
	add_action( 'wp_enqueue_scripts', 'bpScripts', 1000 );
