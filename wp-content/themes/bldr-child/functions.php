<?php

define("GA_USERID", 'UA-XXXXXXXXXXXX');


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'bldr', get_template_directory_uri() . '/style.css' );
}

function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );


/*
 *
 * WooCommerce support
 *
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="page-full-entry-content">';
  echo '<div class="grid grid-pad">';
  echo '<div class="col-1-1">';
  echo '<div id="primary" class="content-area">';
  echo '<main id="main" class="site-main" role="main">';
}

function my_theme_wrapper_end() {
  echo '</main>';
  echo '</div> <!-- primary ->';
  echo '</div> <!-- col-1-1 ->';
  echo '</div> <!-- grid ->';
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


function wpb_last_updated_date( $content ) {
   $u_time = get_the_time('U'); 
   $u_modified_time = get_the_modified_time('U'); 
   if ($u_modified_time >= $u_time + 86400) { 
      $updated_date = get_the_modified_time('F jS, Y');
      $updated_time = get_the_modified_time('h:i a'); 
      $custom_content .= '<p class="last-updated">Last updated on '. $updated_date . ' at '. $updated_time .'</p>';  
   } 
   $custom_content .= $content;
   return $custom_content;
}
# add_filter( 'the_content', 'wpb_last_updated_date' );

function bldr_child_the_modified_date(){
    $u_time = get_the_time('U'); 
    $u_modified_time = get_the_modified_time('U'); 
    if ($u_modified_time >= $u_time + 86400) { 
        printf( __( '%1$s at %2$s' ), get_the_modified_time(get_option('date_format')), get_the_modified_time(get_option('time_format')) );
    } 
}
