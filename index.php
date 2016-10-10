<?php get_header(); ?>
<section>
      <div class="container">
          <h2>Blog posts</h2>
          <div class="row">
              <div class="col-md-8">
                <?php
                if(get_query_var('type') == "post") {    global $my_post_formats_longname;   $args = array(          'tax_query' => array(
                            array( 'taxonomy' => 'post_format',
                                  'field' => 'slug',
                                  'terms' => $my_post_formats_longname,
                                  'operator' => 'NOT IN'
                                  )
                            )
                    );
                    query_posts( $args );
                }
                if ( have_posts() ) : ?>
                  <?php while ( have_posts() ) : the_post(); ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
                    <?php $format = get_post_format( $post->ID );
                    if ( !$format || $format == 'audio' ) : ?>
                      <h3><a class="p-name u-url" title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <p class="text-uppercase text-muted"><time class="dt-published" datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>"><?php echo get_the_date('F jS, Y'); ?></time></p>
                      <?php if ( !$format ) :
                        echo '<div class="p-summary">';
                        the_excerpt();
                        echo '</div>';
                      endif; ?>
                      <p class="text-primary"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php if ( !$format ) : ?>Read more<?php else : ?>Listen<?php endif;?>...</a></p>
                    <?php elseif ( $format == 'status') :
                        echo '<div class="p-name e-content">' . wpautop(get_the_content()) . '</div><time class="dt-published" datetime="'.get_the_date('Y-m-d H:i:s').'"><a class="status-date u-url" href="' . get_the_permalink() . '" title="Permalink to this status update">' . get_the_date('g:ia \o\n F jS, Y') . '</a></time>';
                      else :
                        echo '<div class="p-name e-content">';
                        the_content();
                        echo '</div>'; ?>
                      <p class="text-uppercase text-muted"><a class="u-url" title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date('F jS, Y'); ?></a></p>
                    <?php endif; ?>
                  </article>
                  <?php endwhile;
                endif; ?>
                <?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
                  <p class="text-uppercase text-center text-muted"><?php if ( get_previous_posts_link() ) : ?><?php echo get_previous_posts_link(); ?> | <?php endif; ?><?php if ( get_next_posts_link() ) : ?><?php echo get_next_posts_link(); ?><?php endif; ?></p>
                <?php endif; ?>
              </div>
              <div class="sidebar col-md-4">
                <?php get_sidebar(); ?>
              </div>
          </div>
      </div>
</section>
<?php get_footer(); ?>
