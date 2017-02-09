<?php
$number_of_pings = get_comments_number( $post->ID );
if ( $number_of_pings > 0 ) : ?>
  <h3 id="replies">Replies</h3>
  <p>There are <?php echo $number_of_pings; ?> replies from around the web.</p>

  <?php
  $comments = get_comments( array( 'post_id' => $post->ID, 'type' => 'webmention' ) );
  wp_list_comments( array( 'style' => 'div', 'type' => 'all', 'callback' => 'indieweb_comment') );	?>
<?php endif; ?>
