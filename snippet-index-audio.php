<article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
  <h3><a class="p-name u-url" title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p class="text-uppercase text-muted"><time class="dt-published" datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>"><?php echo get_the_date('F jS, Y'); ?></time></p>
  <div class="p-summary">
    <?php the_excerpt(); ?>
  </div>
  <p class="text-primary"><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">Listen...</a></p>
</article>
