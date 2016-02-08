 <!--blog-entry starts here-->
            <div id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
              <div class="card-block">
                <?php if ( is_singular() ) { echo '<h4 class="card-title">'; } else { echo '<h4 class="card-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h4>'; } else { echo '</h4>'; } ?> 
				<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
              </div>
             
             	<?php get_template_part( 'entry', ( is_archive() || is_search() ||  is_front_page() ?  'summary' : 'content' ) ); ?>
				<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>

            </div>
<!--blog-entry ends here-->