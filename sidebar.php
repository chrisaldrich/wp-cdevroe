<div class="sidebar-section">
  <h4>About me</h4>
  <p><img class="avatar" src="<?php echo get_template_directory_uri(); ?>/assets/images/cdevroe.jpg" alt="Colin Devroe's avatar is a photo of him, from overhead, in a parking garage in Scranton, PA"></p>
  <p>I'm <a href="mailto:colin@cdevroe.com" title="Send me an email">Colin Devroe</a> and this is my blog. Thanks for stopping by. You can read more about me on <a href="/about" title="About Colin Devroe">my about page</a> and I'm <a href="/hire" title="Find out what Colin can be hired for">available for hire</a> if you need something built on the web.<p>
</div>

<div class="sidebar-section">
  <h4>Search</h4>
  <?php get_search_form( true ); ?>
</div>

<?php if ( !is_page() ) : ?>
<div class="sidebar-section">
  <h4>Filter posts:</h4>
  <p><a href="/blog">All</a>, <a href="/blog?type=post">Posts</a>, <a href="/type/status">Statuses</a>, <a href="/type/image">Images</a>, <a href="/type/audio">Audio</a></p>
</div>
<?php endif; ?>

<div class="sidebar-section">
  <h4>Ongoing updates</h4>
  <ul>
    <li><a href="http://cdevroe.com/2016/09/25/hiking-every-trail-in-lackawanna-state-park/">I'm hiking every trail in Lackawanna State Park</a></li>
    <li><a href="http://cdevroe.com/tag/observations/">I write observation posts</a></li>
    <li><a href="http://cdevroe.com/tag/work/">I sometimes write about work</a></li>
  </ul>
</div>

<div class="sidebar-section">
  <h4>Recommended posts</h4>
  <ul>
    <li><a href="http://cdevroe.com/2014/08/18/congratulate-before-you-ask/">Congratulate before you ask</a></li>
    <li><a href="http://cdevroe.com/2013/11/20/why-you-should-applaud-when-people-make/">Why you should applaud when people make things</a></li>
    <li><a href="http://cdevroe.com/2014/03/26/you-should-go-to-meetups/">You should go to meetups</a></li>
    <li><a href="http://cdevroe.com/2016/08/02/tips-for-new-drone-owners/">Tips for new drone owners</a></li>
    <li><a href="http://cdevroe.com/2016/09/29/creating-your-own-hiking-checklist/">Creating your own hiking checklist</a></li>
    <li><a href="http://cdevroe.com/2012/08/22/how-to-tear-down-the-walls-of/">How to tear down the walls of your echo chamber</a></li>
  </ul>
</div>
