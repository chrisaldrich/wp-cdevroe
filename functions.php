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

function custom_rewrite_basic() {
  add_rewrite_rule('^type/post/page/([0-9]+)/?', 'index.php?type=post&paged=$matches[1]', 'top');
	add_rewrite_rule('^type/post/?', 'index.php?type=post', 'top');
}
add_action('init', 'custom_rewrite_basic');

function show_syndication_links( $post_ID ) {
	// If no post ID, return
	if ( empty($post_ID) ) return;

	// If the syndication links plugin is not activated, return
	if ( ! function_exists('get_syndication_links') ) return;

	// Retrieve syndication links
	$syndication_links = Syn_Meta::get_syndication_links_data( $post_ID );

	// If syndication links are not found for this post, return
	if ( empty($syndication_links) ) return;

	// Build link list
	$link_list = '<p>Also on ';
	foreach ( $syndication_links as $url ) {
		if ( empty( $url ) || ! is_string( $url ) ) { continue; }

		$domain =       Syn_Meta::extract_domain_name( $url );
		$name =         ucfirst(str_replace('.com','',$domain));

		$link_list .= sprintf( '<a aria-label="%1$s" class="syn-link u-syndication" href="%2$s" rel="syndication" title="This post is also published to %1$s">%1$s</a>, ', $name, esc_url( $url ) );
	}
	$link_list .= '</p>';

	return $link_list;
}

function indieweb_comment($comment, $args, $depth) {
		$show_webmention = false;

    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

		<?php if ( strpos( get_comment_text(), 'liked' ) > 0 ) :
			$show_webmention = true;
			$type = 'Liked';
		endif;
		if ( strpos( get_comment_text(), 'favorited' ) > 0 ) :
			$show_webmention = true;
			$type = 'Liked';
		endif;
		if ( strpos( get_comment_text(), 'mentioned' ) > 0 ) :
			$show_webmention = true;
			$type = 'Mentioned';
		endif;
		if ( strpos( get_comment_text(), 'reposted' ) > 0 ) :
			$show_webmention = true;
			$type = 'Reposted';
		endif;
		?>


		<?php if ( $show_webmention ) :
			echo $type .' by ' . sprintf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ) . ' on ' . sprintf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			else :
				//echo get_comment_text();
				//var_dump(strpos( get_comment_text(), 'liked' ) > 0);
				//var_dump(strpos( get_comment_text(), 'reposted' ) > 0);
		?>
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php// if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
        /* translators: 1: date, 2: time */
        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        ?>
    </div>

		<?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif;
	endif; ?>
    <?php
    }

?>
