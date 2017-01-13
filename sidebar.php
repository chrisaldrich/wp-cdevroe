<div class="sidebar-section">
  <h4>About me</h4>
  <p><img class="avatar" src="<?php echo get_template_directory_uri(); ?>/assets/images/cdevroe500.jpg" alt="Colin Devroe's avatar is a selfie photo of him in the forest."></p>
  <p>I'm <a href="mailto:colin@cdevroe.com" title="Send me an email" class="email fn p-name u-email">Colin Devroe</a>, a reverse engineer, blogger, investor, photographer, hiker, and kayaker. You can read more about me on <a href="/about" title="About Colin Devroe" rel="me">my about page</a>.<p>
</div>
<div class="sidebar-section">
<p class="text-center social-icons">
  <a href="mailto:colin@cdevroe.com" title="Contact me via email" rel="me"><i class="fa fa-envelope-o"></i></a>
  <a href="http://twitter.com/cdevroe" title="Follow me on Twitter" rel="me"><i class="fa fa-twitter"></i></a>
  <a href="http://instagram.com/cdevroe" title="Follow me on Instagram" rel="me"><i class="fa fa-instagram"></i></a>
  <a href="http://facebook.com/cdevroe" title="Friend me on Facebook" rel="me"><i class="fa fa-facebook"></i></a>
  <a href="http://linkedin.com/cdevroe" title="Connect with me on LinkedIn" rel="me"><i class="fa fa-linkedin"></i></a>
  <a href="http://github.com/cdevroe" title="Follow me on Github" rel="me"><i class="fa fa-github"></i></a></p>
</div>
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
