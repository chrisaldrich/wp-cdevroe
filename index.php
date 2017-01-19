<?php get_header(); ?>

<div class="row content">
  <div class="col-sm col-md-8">

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
  <div class="col-sm col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
