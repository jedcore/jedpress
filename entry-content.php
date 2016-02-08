<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'img-fluid')); } ?>
 <div class="card-block">
<?php the_content(); ?>
</div>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>