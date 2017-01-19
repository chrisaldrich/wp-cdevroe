<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
  <p class="text-center"><?php if ( get_previous_posts_link() ) : ?><?php echo get_previous_posts_link(); ?><?php endif; ?> | <?php if ( get_next_posts_link() ) : ?><?php echo get_next_posts_link(); ?><?php endif; ?></p>
<?php endif; ?>
