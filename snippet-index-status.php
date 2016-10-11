<article id="post-<?php the_ID(); ?>" <?php post_class( 'h-entry' ); ?>>
<?php
  echo '<div class="p-name e-content">' . wpautop(get_the_content()) . '</div><time class="dt-published" datetime="'.get_the_date('Y-m-d H:i:s').'"><a class="status-date u-url" href="' . get_the_permalink() . '" title="Permalink to this status update">' . get_the_date('g:ia \o\n F jS, Y') . '</a></time>';
?>
</article>
