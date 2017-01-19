<?php get_header(); ?>

<div class="row content">
  <div class="col-sm col-md-8">

    <?php if ( is_search() ) : ?>
      <h2>Search results for <?php echo get_search_query(); ?></h2>
    <?php endif; ?>
    <?php if ( is_front_page() ) : ?>
      <h2>Recent posts</h2>
    <?php endif; ?>

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
    else :
      get_template_part( 'snippet-404' );
    endif;

    get_template_part( 'snippet-pagination' );
    ?>

  </div>
  <div class="col-sm col-md-4">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
