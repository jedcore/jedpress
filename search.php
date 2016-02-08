<?php get_header(); ?>
    <div class="container">
      <div class="row">
        <section class="col-lg-8">
          <div class="blog-list">
          <?php if ( have_posts() ) : ?>
            <h4 class="display-5"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h4>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
            <hr>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'entry' ); ?>
            <?php comments_template(); ?>
            <?php endwhile;  ?>
            <?php else : ?>
            <article id="post-0" class="post no-results not-found">
            <header class="header">
            <h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h2>
            </header>
            <section class="entry-content">
            <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
             <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get" class="form-inline">
                <input  class="form-control" type="search" id="s" name="s" placeholder="Search">
                <button id="searchsubmit" class="btn btn-success-outline" type="submit">Search</button>
              </form>
            </section>
            </article>
            <?php endif; ?>
            <?php
              if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
        </section>
         <?php get_sidebar(); ?>
      </div>
    </div>
<?php get_footer(); ?>

