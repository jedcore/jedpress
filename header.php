<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri (); ?>/css/_main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
  </head>
  <body  <?php body_class( $class ); ?>>

    <nav class="navbar navbar-light bg-faded">
      <div class="container">
        <a class="navbar-brand" href="<?php echo esc_attr( get_bloginfo( 'url' ) ); ?>"><strong><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></strong></a>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'ul',
                'container_class'   => 'nav',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

        
        <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get" class="form-inline pull-xs-right">
          <input  class="form-control" type="search" id="s" name="s" placeholder="Search">
          <button id="searchsubmit" class="btn btn-success-outline" type="submit">Search</button>
        </form>
      </div>
    </nav>

    