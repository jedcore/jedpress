<?php get_header(); ?>
 <?php
    global $sa_options;
        $sa_settings = get_option( 'sa_options', $sa_options );
      ?>
  <?php if( $sa_settings['jumbohome'] == 'show' ) : ?>
  <?php include ( get_template_directory() . '/includes/jumbotron.php'); ?>
  <?php endif; ?>

   
    <!--You may delete jumbotron if you don't want it-->
    
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="blog-list">
            <h4 class="display-5">Blog Feed</h4>
            <hr>
           
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'entry' ); ?>
            <?php comments_template(); ?>
            <?php endwhile; endif; ?>
            <?php
              if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
        </section>
         <?php get_sidebar(); ?>
      </div>
    </div>


<?php get_footer(); ?>

