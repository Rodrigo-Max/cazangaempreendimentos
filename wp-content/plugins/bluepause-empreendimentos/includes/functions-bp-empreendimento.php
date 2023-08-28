<?php
	function bp_getYoutubeEmbedUrl($url){
		$url = esc_url($url);
		$youtube_id = bp_getYoutubeVideoId($url);

		return 'https://www.youtube.com/embed/' . $youtube_id . '?rel=0';
	}

	function bp_getYoutubeVideoId($url){
		$url = esc_url($url);
		$youtube_id = '';

		if (preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $url, $matches)){
			$youtube_id = $matches[1];
		}

		return $youtube_id ;
	}

	function bp_getVimeoEmbedUrl($url){
		$url = esc_url($url);
		$vimeo_id = bp_getVimeoVideoIdFromUrl($url);

		return 'https://player.vimeo.com/video/' . $vimeo_id ;
	}

	function bp_getVimeoVideoIdFromUrl($url = '') {
		$regs = array();
		$id = '';

		if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
			$id = $regs[3];
		}

		return $id;
	}

	// pega a embed url do video do youtube ou vimeo, retorna vazio se não pertecer a nenhum dos dois 
	function bp_getVideoEmbedUrl($url){
		$embed = '';
		$url = esc_url( $url );
		
		if (strpos($url, 'youtube') || strpos($url, 'youtu.be'))
			$embed = bp_getYoutubeEmbedUrl($url);

		if (strpos($url, 'vimeo'))
			$embed = bp_getVimeoEmbedUrl($url);
		
		return $embed;
	}

	function bp_getVideoThumbnail( $src ) {
		$url_pieces = explode('/', $src);
		
		if ( $url_pieces[2] == 'player.vimeo.com' ) { // If Vimeo
			$id = $url_pieces[4];
			$hash = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . $id . '.php'));
			$thumbnail = $hash[0]['thumbnail_large'];
		}
        elseif ( $url_pieces[2] == 'www.youtube.com' ) { // If Youtube
			$extract_id = explode('?', $url_pieces[4]);
			$id = $extract_id[0];
			$thumbnail = 'http://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
		}
	
		return $thumbnail;
	}

	
	function bp_getNumericNav() {
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

		echo '<div class="bp-empreendimento-numeric-nav"><ul>' . "\n";

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