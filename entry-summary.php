<section class="entry-summary">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'img-fluid')); } ?>
 <div class="card-block">
<?php the_excerpt(); ?>
</div>
<div class="entry-links"><?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?></div>
</section>