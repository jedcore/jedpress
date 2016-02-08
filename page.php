<?php get_header(); ?>
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="blog-list">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h4 class="display-5"><?php the_title();?></h4>
            <hr>
         <div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'img-fluid')); } ?>
            <div class="card-block">
             <?php the_content();?>
            </div>
          </div>
			<?php endwhile; endif; ?>
        </section>
         <?php get_sidebar(); ?>
      </div>
    </div>
<?php get_footer(); ?>

