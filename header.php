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
		<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="/" title="Colin Devroe's blog">Colin Devroe</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if ( is_front_page() ) { echo 'class="active" '; } ?>role="presentation"><a href="/" title="Colin Devroe's blog">Home </a></li>
                    <!-- <li <?php if ( is_home() || is_singular('post') ) { echo 'class="active" '; } ?>role="presentation"><a href="/blog">Blog </a></li> -->
                    <li <?php if ( is_page('about') ) { echo 'class="active" '; } ?>role="presentation"><a href="/about" title="About Colin Devroe">About </a></li>
                  	<!-- <li <?php if ( is_page('hire') ) { echo 'class="active" '; } ?>role="presentation"><a class="text-uppercase bg-success" href="/hire">Hire </a></li> -->
                </ul>
            </div>
        </div>
    </nav>
