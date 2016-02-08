<?php get_header(); ?>
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="blog-list">
            <h4 class="display-5">Blog Feed</h4>
            <hr>
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>
			<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
			<?php endwhile; endif; ?>
        </section>
         <?php get_sidebar(); ?>
      </div>
    </div>
<?php get_footer(); ?>

