<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
		if ( ! function_exists( '_wp_render_title_tag' ) ) {
			function theme_slug_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
			}
			add_action( 'wp_head', 'theme_slug_render_title' );
		} ?>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<link rel="alternate" href="/feed" title="Colin Devroe's feed">

    <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container">

			<div class="row header">
				<div class="col-sm">
					<h1>Colin Devroe</h1>
					<p>Senior Vice President <a href="http://condronmedia.com/">Condron Media</a></p>
					<p>Reverse engineer. Blogger. Investor. Photographer Hiker. Kayaker.</p>
				</div>
				<div class="col-sm">
					<ul class="nav justify-content-center">
						<li class="nav-item <?php if ( is_front_page() ) { echo 'active'; } ?>" role="presentation"><a class="nav-link" href="/" title="Colin Devroe's blog">Home </a></li>
						<li class="nav-item <?php if ( is_page('about') ) { echo 'active'; } ?>" role="presentation"><a class="nav-link" href="/about" title="About Colin Devroe">About </a></li>
					</ul>
					<?php get_template_part( 'snippet-social-icons' ); ?>
				</div>
			</div>
