<?php get_header(); ?>
<section>
<div class="container">
    <h2>Search results for <?php echo get_search_query(); ?></h2>
    <div class="row">
        <div class="col-md-8">
						<?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php $format = get_post_format( $post->ID );
                  if ( !$format || $format == 'audio' ) : ?>
                    <h3><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="text-uppercase text-muted"><?php echo get_the_date('F jS, Y'); ?></p>
                    <?php if ( !$format ) :
                      the_excerpt();
                    endif; ?>
                    <p class="text-primary"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php if ( !$format ) : ?>Read more<?php else : ?>Listen<?php endif;?>...</a></p>
                  <?php elseif ( $format == 'status') : ?>
                    <?php $content = get_the_content();
                    $content .= ' - <a class="status-date" href="' . get_the_permalink() . '" title="' . the_title_attribute('','',false) . '">' . get_the_date('g:ia \o\n F jS, Y') . '</a>';
                    echo wpautop($content); ?>
                  <?php else : ?>
                    <?php the_content(); ?>
                    <p class="text-uppercase text-muted"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date('F jS, Y'); ?></a></p>
                  <?php endif; ?>
                </article>
							<?php endwhile; ?>
						<?php endif; ?>

            <?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
              <p class="text-uppercase text-center text-muted"><?php if ( get_previous_posts_link() ) : ?><?php echo get_previous_posts_link(); ?><?php endif; ?> | <?php if ( get_next_posts_link() ) : ?><?php echo get_next_posts_link(); ?><?php endif; ?></p>
            <?php endif; ?>
          </div>
          <div class="sidebar col-md-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
