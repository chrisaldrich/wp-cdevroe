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
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>


                <?php if ( !$format || $format == 'audio' ) : ?>

                  <h2 class="p-name"><?php the_title(); ?></h2>
                  <?php do_action("emojiemo_render"); ?>
                  <p class="published-on"><time class="dt-published" datetime="<?php the_date('Y-m-d H:i:s'); ?>"><?php the_date('F jS, Y'); ?></time></p>
                  <div class="e-content">
                    <?php the_content(); ?>
                  </div>

                <?php elseif ( $format == 'status') :
                    echo '<div class="p-name e-content">' . wpautop(get_the_content()) . '</div><time class="dt-published" datetime="'.get_the_date('Y-m-d H:i:s').'"><span class="status-date"> - ' . get_the_date('g:ia \o\n F jS, Y') . '</span></time>';
                ?>

                  <p class="text-uppercase text-center text-muted"><a href="/type/status" title="All status updates">All statuses</a></p>

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
