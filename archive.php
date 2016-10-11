<?php get_header(); ?>
<section>
      <div class="container">
          <h2><?php the_archive_title(); ?></h2>
          <div class="row">
              <div class="col-md-8">
                <?php if ( have_posts() ) :
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
