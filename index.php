<?php get_header(); ?>
<section>
      <div class="container">
          <h2>Blog posts</h2>
          <div class="row">
              <div class="col-md-8">
                <?php
                // This allows me to show "Posts" on the index page by themselves
                if(get_query_var('type') == "post") {
                  global $my_post_formats_longname;
                  $args = array('tax_query' => array(
                            array( 'taxonomy' => 'post_format',
                                  'field' => 'slug',
                                  'terms' => $my_post_formats_longname,
                                  'operator' => 'NOT IN'
                                  ))
                          );
                  query_posts( $args );
                }

                if ( have_posts() ) :
                  while ( have_posts() ) : the_post();
                    get_template_part( 'snippet-index', get_post_format() );
                  endwhile;
                endif;

                get_template_part( 'snippet-pagination' );
                ?>

              </div>
              <div class="sidebar col-md-4">
                <?php get_sidebar(); ?>
              </div>
          </div>
      </div>
</section>
<?php get_footer(); ?>
