<?php
/*
Plugin Name: In Development
Plugin URI: https://catn.com/2014/09/09/writing-a-simple-wordpress-plugin-from-scratch/
Description: A skeleton to use functionality only on the development environment.
Version: 0.1
Author: miceno
Author URI: http://blogs.estotienearreglo.es
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

define( 'INDEVEL_VERSION', "0.2" );

if ( ! class_exists( 'InDevelopment' ) ) {
	class InDevelopment {
		/**
		 * Tag identifier used by file includes and selector attributes.
		 * @var string
		 */
		protected $tag = 'in-devel';

		/**
		 * User friendly name used to identify the plugin.
		 * @var string
		 */
		protected $name = 'In Development';

		/**
		 * Current version of the plugin.
		 * @var string
		 */
		protected $version = INDEVEL_VERSION;

		public function __construct() {
			/*
			add_filter( 'jetpack_development_mode', '__return_true' );
		    */
		}
	}

	new InDevelopment;
}


/*
   google analytics.
*/


function custom_google_analytics() {
	if ( defined( "GA_USERID" ) ) { ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', '<?php echo GA_USERID; ?>', 'auto');
            ga('send', 'pageview');
        </script><?php
	}
}

add_action( 'wp_head', 'custom_google_analytics', 10 );


/*
	Google Maps responsiveness
*/

function googlemaps_disable_zoom_scripts() {
	wp_register_script( 'googlemaps_disable_zoom_script',
		plugins_url( 'assets/js/disable-scroll-zoom.js', __FILE__ ),
		array( 'jquery' ),
		INDEVEL_VERSION,
		true );
	wp_enqueue_script( 'googlemaps_disable_zoom_script' );
}

add_action( 'wp_enqueue_scripts', 'googlemaps_disable_zoom_scripts' );

function googlemaps_responsive_styles() {
	wp_register_style( 'googlemaps_responsive_style',
		plugins_url( 'assets/css/responsive-maps.css', __FILE__ ),
		array(),
		INDEVEL_VERSION,
		'all' );
	wp_enqueue_style( 'googlemaps_responsive_style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'googlemaps_responsive_styles' );

/*
	Disable emoji icons to improve loading time
*/

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

add_action( 'init', 'disable_wp_emojicons' );

/*
	Disable devicepx script to improve loading time
*/

function dequeue_devicepx() {
	wp_dequeue_script( 'devicepx' );
}

add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );

/*
 * Write log messages
 */

if ( ! function_exists( 'write_log' ) ) {

	function write_log( $log ) {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log );
			}
		}
	}

}