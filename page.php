<?php get_header();
if (have_posts()) :
 while ( have_posts() ) : the_post(); ?>
 <section>
 <div class="container">
     <div class="row">
         <div class="col-md-8">
              <article>
                <h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
              </article>
          </div>
          <div class="col-md-4 sidebar">
            <?php get_sidebar(); ?>
          </div>

        </div>
    </div>
</section>
<section class="features">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <p>I've had the privilege to work with some amazing people and companies over the years in many capacities. Here are just a few of them.</p>
          </div>
          <div class="col-md-6">
              <div class="row">
                  <div class="col-xs-4">
                      <ul><li>TubeMogul</li><li>Aol</li><li>Xerox</li><li>McGraw Hill</li><li>C-SPAN</li></ul>
                  </div>
                  <div class="col-xs-4">
                      <ul><li>Sony</li><li>Voce</li><li>Google</li><li>WordPress VIP</li><li>Disney Parks</li></ul>
                  </div>
                  <div class="col-xs-4">
                      <ul><li>Uncrate</li><li>Wine Library</li><li>Citywide</li><li>Viddler</li><li>Benco Dental</li></ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<?php
endwhile; endif;
get_footer(); ?>
