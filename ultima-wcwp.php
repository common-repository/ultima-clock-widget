<?php 
/*
Plugin Name: Ultima - WordPress Clock Widget Plugin
Plugin URI:  http://themeatelier.net/
Description: Professional - WP social widget wordpress plugins
Version:     1.0
Author:      ThemeAtelier
Author URI:  http://themeatelier.net/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: ultimawcwp
*/

// direct access block
if( ! defined( 'ABSPATH' ) ) {
	exit ( 'Direct access denied.' );
}

// load textdomain
load_plugin_textdomain( 'ultimawcwp', false, basename( dirname( __FILE__ ) ) . '/languages' );

// enqueue script
add_action( 'wp_enqueue_scripts', 'ultimaWcwp_enqueue_script' );

function ultimaWcwp_enqueue_script(){

wp_enqueue_style( 'widget', plugins_url( 'css/widget.css', __FILE__ ), array(), '1.1.1' );

wp_enqueue_script( 'clock-main', plugins_url( 'js/clock-main.js', __FILE__ ), array('jquery'), '1.1.1', true );

}

require_once( dirname( __FILE__ ).'/widgets/clock-widget.php');
