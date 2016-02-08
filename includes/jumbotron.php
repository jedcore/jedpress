 <div class="container">
    <?php if ( has_header_image() ) { ?>
    <img class="img-fluid" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
    <?php } ?>
    <div class="jumbotron" id="header">
     <?php
      $homeurl = ".get_bloginfo('template_directory').";
      if( $sa_settings['intro_text'] != '' ) {
        echo $sa_settings['intro_text'];
       }
       else{
        include ( 'jumbotron-defaults.php');
      }
      ?>
    </div>
  </div>

