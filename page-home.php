<?php
/*
 Template Name: home
*/
 get_header(); ?>

<div class="jumbotron hero">
  <div class="container">
      <div class="row">
          <div class="col-md-12 get-it">
              <h1 class="text-center">Colin Devroe</h1>
              <p class="text-center">Reverse Engineer. Blogger. Photographer. Drone pilot. Hiker. Kayaker.</p>
              <p class="text-center"><a class="btn btn-primary btn-lg" role="button" href="mailto:colin@cdevroe.com" title="Contact me via email">colin @ cdevroe.com</a><a class="btn btn-success btn-lg" role="button" href="/hire">Hire Me</a></p>
          </div>
      </div>
  </div>
</div>
<section>
  <div class="container">
      <!-- <h2 class="text-center hidden-xs hidden-sm">Latest updates</h2> -->
      <div class="row">
          <div class="col-md-4 statuses">
            <h3 class="">Recent statuses</h3>

            <?php
            $recent_statuses = new WP_Query( array ('post_type' => 'post',
                                                    'tax_query' => array(
                                                                  'relation' => 'AND',
                                                                  array( 'taxonomy' => 'post_format',
                                                                          'field'    => 'slug',
                                                                          'terms'    => array( 'post-format-status' ),
                                                    )),
                                                    'posts_per_page' => '6', 'order' => 'DESC' ) );
            if ( $recent_statuses->have_posts() ) : ?>

            <?php while ( $recent_statuses->have_posts() ) : $recent_statuses->the_post(); ?>
              <div class="item">
                  <?php the_content(); ?>
                  <p class="text-uppercase text-muted"><a href="<?php the_permalink(); ?>" title="Permalink for this status update"><?php echo get_the_date('F jS, Y'); ?></a></p>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
            <p class="text-uppercase text-center text-muted"><a href="/type/status" title="All status updates">All Statuses</a></p>
          </div>
          <div class="col-md-4 blogposts">
              <h3 class="">Recent Blog posts</h3>
              <?php
              $recent_posts = new WP_Query( array(
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'post_format',
                          'field' => 'slug',
                          'terms' => array(
                              'post-format-aside',
                              'post-format-audio',
                              'post-format-chat',
                              'post-format-gallery',
                              'post-format-image',
                              'post-format-link',
                              'post-format-quote',
                              'post-format-status',
                              'post-format-video'
                          ),
                          'operator' => 'NOT IN'
                      )
                  ),
                'posts_per_page' => '6'
              ) );
              if ( $recent_posts->have_posts() ) : ?>
              <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
              <div class="item">
                <h4><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p class="text-uppercase text-muted"><?php echo get_the_date('F jS, Y'); ?></p>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

              <p class="text-uppercase text-center text-muted"><a href="/blog/?type=post" title="All blog posts">All Posts</a></p>
          </div>
          <div class="col-md-4 photos">
            <h3 class="">A random photo</h3>

            <?php
            // Added in September 2016
            $random_number = rand(1,25);
            $recent_photos = new WP_Query( array ('post_type' => 'post',
                                                    'tax_query' => array(
                                                                  'relation' => 'AND',
                                                                  array( 'taxonomy' => 'post_format',
                                                                          'field'    => 'slug',
                                                                          'terms'    => array( 'post-format-image' ),
                                                    )),
                                                    'posts_per_page' => '1', 'paged' => $random_number, 'order' => 'DESC' ) );
            if ( $recent_photos->have_posts() ) : ?>
            <?php while ( $recent_photos->have_posts() ) : $recent_photos->the_post(); ?>
              <div class="item">
                  <?php the_content(); ?>
                  <p class="text-uppercase text-muted"><a href="<?php the_permalink(); ?>" title="Permalink for this photo"><?php echo get_the_date('F jS, Y'); ?></a></p>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
            <p class="text-uppercase text-center text-muted"><a href="/type/image" title="All photos">All Photos</a></p>
          </div>
      </div>
  </div>
</section>
<section class="features">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <p>I've had the privilege to work with some amazing people and companies over the years. Perhaps <a href="/hire">your company could be next</a>?</p>
          </div>
          <div class="col-md-6">
              <div class="row">
                  <div class="col-xs-4">
                      <ul><li>TubeMogul</li><li>Aol</li><li>Xerox</li><li>McGraw Hill</li><li>C-SPAN</li></ul>
                  </div>
                  <div class="col-xs-4">
                      <ul><li>Sony</li><li>Voce</li><li>Google</li><li>WordPress VIP</li><li>Disney Parks</li></ul>
                  </div>
                  <div class="col-xs-4">
                      <ul><li>Uncrate</li><li>Wine Library</li><li>Citywide</li><li>Viddler</li><li>Benco Dental</li></ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<?php get_footer(); ?>
