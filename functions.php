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
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap4.min.css', false, '0.1.0' );
  wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', false );
	wp_enqueue_style( 'theme_styles', get_template_directory_uri() . '/assets/css/custom.css', false, '0.4' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/tether.min.js', array('jquery'), '0.1.0' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap4.min.js', array('jquery'), '0.1.0' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );

function theme_my_queryvars( $qvars ) {
	$qvars[] = 'type';
return $qvars;
}
add_filter('query_vars', 'theme_my_queryvars' );

?>
