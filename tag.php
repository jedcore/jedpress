<?php get_header(); ?>
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="blog-list">
            <h4 class="display-5"><?php _e( 'Tag Archives: ', 'jedpress' ); ?><?php single_tag_title(); ?></h4>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
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

