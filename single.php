<?php get_header();
$cols = '8';
if (have_posts()) :
 while ( have_posts() ) : the_post();

 $format = get_post_format( get_the_id() );

 $cols = ( $format == 'image' ) ? '12' : '8'; // Number of columns the main content area is

 ?>
 <section>
 <div class="container">
     <div class="row">
         <div class="col-md-<?php echo $cols; ?>">
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <?php if ( !$format || $format == 'audio' ) : ?>

                  <h2><?php the_title(); ?></h2>
                  <?php do_action("emojiemo_render"); ?>
                  <p class="published-on"><?php the_date('F jS, Y'); ?></p>
                  <?php the_content(); ?>

                <?php else : ?>

                  <?php the_content(); ?>
                  <p class="published-on">Published on <?php the_date('F jS, Y'); ?></p>

                <?php endif; ?>

                <?php if ( $category_list = get_the_term_list( get_the_id(), 'category', '', ', ', '') ) { ?>
        				<!--	<p><strong>In:</strong> <?php echo $category_list; ?></p> -->
        				<?php } // end category list ?>

                <?php if ( $tag_list = get_the_term_list( get_the_id(), 'post_tag', ' #', ', #', '') ) { ?>
      					  <p class="published-on"><?php echo $tag_list; ?></p>
      				  <?php } // end tag list ?>
              </article>

              <?php comments_template( '', true ); ?>

          </div>
          <?php if ( $format != 'image' ) : // Do not show sidebar on photos ?>
          <div class="col-md-4 sidebar">
            <?php get_sidebar(); ?>
          </div>
        <?php endif; ?>
        </div>
  </section>
<?php
endwhile; endif;
get_footer(); ?>
