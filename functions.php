<?php

function theme_setup(){
	$my_post_formats = array( 'status', 'audio', 'image' );
	add_theme_support( 'post-thumbnails' , array('post', 'page') );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );
	add_theme_support( 'search-form' );
	add_theme_support( 'post-formats', $my_post_formats );
}
add_action( 'init', 'theme_setup' );

$my_post_formats = array( 'status', 'audio', 'image' );
foreach ($my_post_formats as $shortname) {
    $my_post_formats_longname[] = 'post-format-'.$shortname;
}

function theme_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap4.min.css', false, '0.4.1' );
  wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', false );
	wp_enqueue_style( 'theme_styles', get_template_directory_uri() . '/assets/css/custom.css', false, '0.4.1' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/tether.min.js', array('jquery'), '0.4.1' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap4.min.js', array('jquery'), '0.4.1' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );

function theme_my_queryvars( $qvars ) {
	$qvars[] = 'type';
return $qvars;
}
add_filter('query_vars', 'theme_my_queryvars' );

function show_syndication_links( $post_ID ) {
	if ( empty($post_ID) ) return;

	if ( function_exists('get_syndication_links') ) : // The syndication links plugin is activated

		// Retrieve syndication links
		$syndication_links = Syn_Meta::get_syndication_links_data( $post_ID );

		if ( !empty($syndication_links) ) : // If syndication links are found for this post

			$link_list = '<p>Also on ';
			foreach ( $syndication_links as $url ) {
				if ( empty( $url ) || ! is_string( $url ) ) { continue; }

				$domain =       Syn_Meta::extract_domain_name( $url );
				$name =         ucfirst(str_replace('.com','',$domain));

				$link_list .= sprintf( '<a aria-label="%1$s" class="syn-link u-syndication" href="%2$s" rel="syndication" title="This post is also published to %1$s">%1$s</a>, ', $name, esc_url( $url ) );
			}

			$link_list .= '</p>';
		else :
			return; // No links found
		endif;
	else :
		return; // Syndication links plugin not activated
	endif;

	return $link_list;
}

?>
