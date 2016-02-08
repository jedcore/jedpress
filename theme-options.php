<?php

// Default options values
$sa_options = array(
	'footer_copyright' => '&copy; ' . date('Y') . ' ' . get_bloginfo('name'),
	'intro_text' => '',
	'featured_cat' => '',
	'layout_view' => 'fixed',
	'author_credits' => true
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function sa_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'sa_theme_options', 'sa_options', 'sa_validate_options' );
}

add_action( 'admin_init', 'sa_register_settings' );


// Store layouts views in array
$sa_layouts = array(
	'fixed' => array(
		'value' => 'fixed',
		'label' => 'Fixed Layout'
	),
	'fluid' => array(
		'value' => 'fluid',
		'label' => 'Fluid Layout'
	),
);


// Store layouts views in array
$sa_jumbohome = array(
	'show' => array(
		'value' => 'show',
		'label' => 'Show Jumbotron'
	),
	'hide' => array(
		'value' => 'hide',
		'label' => 'Hide Jumbotron'
	),
);

function sa_theme_options() {
	// Add theme options page to the addmin menu
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'jedpress', 'sa_theme_options_page' );
}

add_action( 'admin_menu', 'sa_theme_options' );

// Function to generate options page
function sa_theme_options_page() {
	global $sa_options, $sa_layouts, $sa_jumbohome;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">

	<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'sa_options', $sa_options ); ?>
	
	<?php settings_fields( 'sa_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->

	<tr valign="top"><th scope="row"><label for="footer_copyright">Footer Copyright Notice</label></th>
	<td>
	<input id="footer_copyright" name="sa_options[footer_copyright]" type="text" value="<?php  esc_attr_e($settings['footer_copyright']); ?>" />
	</td>
	</tr>



	<tr valign="top"><th scope="row">Jumbotron</th>
	<td>
	<?php foreach( $sa_jumbohome as $jumb ) : ?>
	<input type="radio" id="<?php echo $jumb['value']; ?>" name="sa_options[jumbohome]" value="<?php esc_attr_e( $jumb['value'] ); ?>" <?php checked( $settings['jumbohome'], $jumb['value'] ); ?> />
	<label for="<?php echo $jumb['value']; ?>"><?php echo $jumb['label']; ?></label><br />
	<?php endforeach; ?>
	</td>
	</tr>


	<tr valign="top"><th scope="row"><label for="intro_text">Jumbotron Content</label></th>
	<td>
	<textarea placeholder="Input anything. (HTML enabled)" id="intro_text" name="sa_options[intro_text]" rows="5" cols="30"><?php echo stripslashes($settings['intro_text']); ?></textarea>
	</td>
	</tr>

	<tr valign="top"><th scope="row">Author Credits</th>
	<td>
	<input type="checkbox" id="author_credits" name="sa_options[author_credits]" value="1" <?php checked( true, $settings['author_credits'] ); ?> />
	<label for="author_credits">Show Author Credits</label>
	</td>
	</tr>

	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>

	</div>

	<?php
}

function sa_validate_options( $input ) {
	global $sa_options, $sa_layouts, $sa_jumbohome;

	$settings = get_option( 'sa_options', $sa_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['intro_text'] = wp_filter_post_kses( $input['intro_text'] );

	// We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['jumbohome'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['jumbohome'], $sa_jumbohome ) )
		$input['jumbohome'] = $prev;
	
	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['author_credits'] ) )
		$input['author_credits'] = null;
	// We verify if the input is a boolean value
	$input['author_credits'] = ( $input['author_credits'] == 1 ? 1 : 0 );
	
	return $input;
}

endif;  // EndIf is_admin()



