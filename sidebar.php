<div class="sidebar-section">
  <?php get_search_form( true ); ?>
</div>

<?php if ( !is_page() ) : ?>
<div class="sidebar-section">
  <p><strong>Filter posts:</strong> <a href="/blog">All</a>, <a href="/blog?type=post">Posts</a>, <a href="/type/status">Statuses</a>, <a href="/type/image">Images</a>, <a href="/type/audio">Audio</a></p>
</div>
<?php endif; ?>

<div class="sidebar-section">
  <h4>Ongoing updates</h4>
  <ul>
    <li><a href="http://cdevroe.com/tag/what-i-saw/" title="What I saw this week series of posts">I share links every Friday</a></li>
    <li><a href="http://cdevroe.com/tag/event/" title="Events I've attended">I attend events</a></li>
    <li><a href="http://cdevroe.com/tag/indieweb/" title="Some posts about the indieweb">I'm passionate about the indieweb</a></li>
  </ul>
</div>

<?php $recommended_posts = new WP_Query( array( 'tag' => 'recommended', 'posts_per_page' => 12 ) );
if ( $recommended_posts->have_posts() ) : ?>
<div class="sidebar-section">
  <h4>Recommended posts</h4>
  <ul>
    <?php while ( $recommended_posts->have_posts() ) : $recommended_posts->the_post(); ?>
      <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul>
</div>
<?php endif; ?>
