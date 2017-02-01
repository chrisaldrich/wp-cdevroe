<article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
  <div class="p-name e-content">
    <?php the_content(); ?>
  </div>
  <time class="dt-published" datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>"><a class="status-date u-url" href="<?php echo get_the_permalink(); ?>" title="Permalink to this status update"><?php echo get_the_date('g:ia \o\n F jS, Y'); ?></a></time>
</article>
