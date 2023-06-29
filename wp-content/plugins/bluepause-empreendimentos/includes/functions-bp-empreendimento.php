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