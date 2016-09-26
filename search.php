<?php get_header(); ?>
<section>
<div class="container">
    <h2>Search results for <?php echo get_search_query(); ?></h2>
    <div class="row">
        <div class="col-md-8">
						<?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
              <article>
                  <?php if ( $post->post_type == 'post' || $post->post_type == 'audio' ) : ?>
                    <h3 class="text-primary"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <p class="text-primary"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">Read more...</a></p>
                  <?php else : ?>
                    <?php the_content(); ?>
                  <?php endif; ?>
									<p class="text-uppercase text-muted text-primary"><a href="<?php the_permalink(); ?>" title="Permalink for this item"><?php echo get_the_date('F jS, Y'); ?></a></p>
              </article>
							<?php endwhile; ?>

						<?php endif; ?>

            <?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
              <p class="text-uppercase text-center text-muted"><?php if ( get_previous_posts_link() ) : ?><?php echo get_previous_posts_link(); ?><?php endif; ?> | <?php if ( get_next_posts_link() ) : ?><?php echo get_next_posts_link(); ?><?php endif; ?></p>
            <?php endif; ?>
          </div>
          <div class="col-md-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
