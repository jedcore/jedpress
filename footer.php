<?php 
	global $sa_options;
	$sa_settings = get_option( 'sa_options', $sa_options );
?>
 <div class="footer">
      <div class="container">
      <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <?php echo $sa_settings['footer_copyright']; ?>
          <?php do_action( 'jedcore_credits' ); ?>
                <?php if( $sa_settings['author_credits'] ) : ?>
            <a href="<?php echo esc_url( __('http://wordpress.org/', 'jedpress') ); ?>"
            title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">
          <?php printf( __('Proudly powered by %s.', 'twentyten'), 'WordPress' ); ?> 
        </a>Designed by <a href="https://jedcore.com/">Jedcore</a>
                <?php endif; ?>
        </a>
      </div>
    </div>


    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  	<?php wp_footer(); ?>
  </body>
</html>