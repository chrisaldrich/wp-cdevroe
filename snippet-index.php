<article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
  <h3><a class="p-name u-url" title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <?php if ( !is_page() ) { ?><p><time class="dt-published" datetime="<?php echo get_the_date('Y-m-d H:i:s'); ?>"><?php echo get_the_date('F jS, Y'); ?></time></p><?php } ?>
  <?php if ( is_single() || is_page() ) : ?>
    <div class="e-content">
      <?php the_content(); ?>
    </div>
    <?php if ( $tag_list = get_the_term_list( get_the_id(), 'post_tag', ' #', ', #', '') ) { ?>
      <p class="taglist"><?php echo $tag_list; ?></p>
    <?php } ?>
  <?php else : ?>
    <div class="p-summary">
      <?php the_excerpt(); ?>
    </div>
    <p><a title="Permalink to <?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">Read more...</a></p>
  <?php endif; ?>

</article>
