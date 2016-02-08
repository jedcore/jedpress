<?php
/*comments*/
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
	
       <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>">
       	<?php echo get_avatar( $comment, 32 ); ?> <?php printf(__('%s'), get_comment_author_link()) ?></a>
       	<small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
       </div>
      
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
     
     <div class="comment-text"> 
     	<?php comment_text() ?>
     </div>
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      <?php delete_comment_link(get_comment_ID()); ?>
    </div>

   <div class="clear"></div>
<?php } ?>
<?php 
/*comment moderation*/
function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">del</a>';
    echo ' | <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">spam</a>';
  }
}

/*security*/
function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
    }
}

/*Theme Options*/
require_once ( get_stylesheet_directory() . '/theme-options.php' );

add_action('check_comment_flood', 'check_referrer');
require_once('wp_bootstrap_navwalker.php');
require_once('wp_bootstrap_pagination.php');
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'jedpress' ),
) );

add_action( 'after_setup_theme', 'jedpress_setup' );
function jedpress_setup()
{
load_theme_textdomain( 'jedpress', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'get_avatar' );
add_theme_support( "custom-background", $args );
add_theme_support( "custom-header", $args );
function jedpress_add_editor_styles() {
    add_editor_style( 'custom-jedpress-style.css' );
}
add_action( 'admin_init', 'jedpress_add_editor_styles' );

global $content_width;}
add_action( 'wp_enqueue_scripts', 'jedpress_load_scripts' );
function jedpress_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'jedpress_enqueue_comment_reply_script' );
function jedpress_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'jedpress_title' );
function jedpress_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'jedpress_filter_wp_title' );
function jedpress_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'jedpress_widgets_init' );
function jedpress_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'jedpress' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<div><h3 class="widget-title">',
'after_title' => '</h3></div>',
) );
}
function jedpress_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'jedpress_comments_number' );
function jedpress_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}