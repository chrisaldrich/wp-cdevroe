<?php get_header(); ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <article>
          <h2>This is not the page you're looking for</h2>
    			<p>But you can talk to Kylo Ren about it...</p>
    			<p><img src="<?php echo get_template_directory_uri(); ?>/assets/images/kylo.jpeg"></p>
    			<p>Or, go <a href="/">home</a>.</p>
        </article>
      </div>
      <div class="col-md-4 sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
