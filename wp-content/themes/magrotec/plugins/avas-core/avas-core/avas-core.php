<?php
/*
Plugin Name: Avas Core
Plugin URI: https://x-theme.com/avas
Description: This plugin for Avas WordPress theme only. To use Avas theme properly you must install this plugin.
Author: theme-x
Version: 1.2
Author URI: https://x-theme.com/
Text Domain: avas-core
*/

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit; 
global $bddex;

// Plugin Path
define( 'AVAS_PLUGIN_PATH', ABSPATH . 'wp-content/plugins/avas-core/' );

// Plugin URL
define( 'AVAS_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define('AVAS_PLUGIN_VERSION', '1.2');
/**
 * Include language
 */
add_action( 'after_setup_theme', 'bddex_load_plugin_textdomain' );
function bddex_load_plugin_textdomain() {
	load_plugin_textdomain( 'avas-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// Enabled Shortcode for widget
add_filter('widget_text', 'do_shortcode');

/* ---------------------------------------------------------
   Include files
------------------------------------------------------------ */	
require_once AVAS_PLUGIN_PATH . 'inc/functions.php'; // functions
require_once AVAS_PLUGIN_PATH . 'elementor/init.php'; // Elementor
require_once AVAS_PLUGIN_PATH . 'inc/social-media.php'; // Social Media
require_once AVAS_PLUGIN_PATH . 'inc/widgets/recent-post-widget.php'; // Recent posts widget
require_once AVAS_PLUGIN_PATH . 'inc/widgets/post-gallery-widget.php'; // posts gallery
require_once AVAS_PLUGIN_PATH . 'inc/widgets/posts-carousel.php'; // posts carousel
require_once AVAS_PLUGIN_PATH . 'inc/widgets/recent-project-widget.php'; // Recent project widget
require_once AVAS_PLUGIN_PATH . 'inc/widgets/recent-service-widget.php'; // Recent service widget
require_once AVAS_PLUGIN_PATH . 'inc/mega-menu.php'; // Mega menu
require_once AVAS_PLUGIN_PATH . 'inc/cpt.php'; // custom post type
require_once AVAS_PLUGIN_PATH . 'inc/gallery.php'; // gallery
require_once AVAS_PLUGIN_PATH . 'inc/meta/post.php'; // Posts Meta fields
require_once AVAS_PLUGIN_PATH . 'inc/meta/service.php'; // services meta fields
require_once AVAS_PLUGIN_PATH . 'inc/meta/portfolio.php'; // portfolio meta fields
require_once AVAS_PLUGIN_PATH . 'inc/meta/team.php'; // team meta fields
require_once AVAS_PLUGIN_PATH . 'inc/breadcrumbs.php'; // breadcrumbs
require_once AVAS_PLUGIN_PATH . 'inc/author-bio.php'; // author bio

/* ---------------------------------------------------------
   Update checker
------------------------------------------------------------ */
require AVAS_PLUGIN_PATH . 'inc/update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/xy440/avas-core/',
	__FILE__,
	'avas-core'
);
$myUpdateChecker->setAuthentication('f0bd364995e53968a1085d4837e2b8676b2d4445');
$myUpdateChecker->setBranch('master');

/* ---------------------------------------------------------
   Enqueue Styles and Scripts
------------------------------------------------------------ */	
if(!function_exists('bddex_plugin_enqueue')):
add_action('wp_enqueue_scripts', 'bddex_plugin_enqueue');
function bddex_plugin_enqueue() {

	// CSS
	wp_enqueue_style( 'misc-css', AVAS_PLUGIN_URL . '/assets/css/misc.min.css' );
	wp_enqueue_style( 'slick', AVAS_PLUGIN_URL . '/assets/css/slick.min.css' );
	wp_enqueue_style( 'owl-carousel', AVAS_PLUGIN_URL . '/assets/css/owl-carousel.min.css' );
	wp_enqueue_style( 'lightslider', AVAS_PLUGIN_URL . '/assets/css/lightslider.min.css' );
	wp_enqueue_style( 'flexslider', AVAS_PLUGIN_URL . '/assets/css/flexslider.min.css' );
	wp_enqueue_style( 'slider', AVAS_PLUGIN_URL . '/assets/css/slider.min.css' );
	wp_enqueue_style( 'flipster', AVAS_PLUGIN_URL . '/assets/css/flipster.min.css' );
	wp_enqueue_style( 'magnific-popup', AVAS_PLUGIN_URL . '/assets/css/magnific-popup.min.css' );
	wp_enqueue_style( 'lity', AVAS_PLUGIN_URL . '/assets/css/lity.min.css' );
	wp_enqueue_style( 'font-awesome', AVAS_PLUGIN_URL . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'icomoon', AVAS_PLUGIN_URL . '/assets/css/icomoon.min.css' );
	wp_enqueue_style( 'flaticon', AVAS_PLUGIN_URL . '/assets/css/flaticon.min.css' );
	wp_enqueue_style('dashicons');	

	// JS
	wp_enqueue_script( 'main-script', AVAS_PLUGIN_URL . '/assets/js/main.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'misc', AVAS_PLUGIN_URL . '/assets/js/misc.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'stats', AVAS_PLUGIN_URL . '/assets/js/stats.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'post-carousel', AVAS_PLUGIN_URL . '/assets/js/post-carousel.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'slick', AVAS_PLUGIN_URL . '/assets/js/slick.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'flexslider', AVAS_PLUGIN_URL . '/assets/js/jquery.flexslider.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'owl-carousel', AVAS_PLUGIN_URL . '/assets/js/owl.carousel.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'lightslider', AVAS_PLUGIN_URL . '/assets/js/lightslider.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'modernizr', AVAS_PLUGIN_URL . '/assets/js/modernizr.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'lity', AVAS_PLUGIN_URL . '/assets/js/lity.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'flipster', AVAS_PLUGIN_URL . '/assets/js/jquery.flipster.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'countdown', AVAS_PLUGIN_URL . '/assets/js/countdown.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'timeline', AVAS_PLUGIN_URL . '/assets/js/timeline.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'instagram', AVAS_PLUGIN_URL . '/assets/js/instagram.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'waypoints', AVAS_PLUGIN_URL . '/assets/js/waypoints.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'infinite-scroll', AVAS_PLUGIN_URL . '/assets/js/infinite-scroll.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'typed', AVAS_PLUGIN_URL . '/assets/js/typed.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'morphext', AVAS_PLUGIN_URL . '/assets/js/morphext.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'imagesloaded', AVAS_PLUGIN_URL . '/assets/js/imagesloaded.pkgd.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'isotope', AVAS_PLUGIN_URL . '/assets/js/isotope.pkgd.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'magnific-popup', AVAS_PLUGIN_URL . '/assets/js/jquery.magnific-popup.min.js', array(), AVAS_PLUGIN_VERSION, true );
	wp_enqueue_script( 'load-more', AVAS_PLUGIN_URL . '/assets/js/load-more.js', array(), AVAS_PLUGIN_VERSION, true );

	}
endif;

/* ---------------------------------------------------------
    EOF
------------------------------------------------------------ */