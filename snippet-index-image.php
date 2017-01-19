<article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
  <div class="p-name e-content">
    <?php the_content(); ?>
  </div>
  <p><a class="u-url" title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_date('F jS, Y'); ?></a></p>
</article>
