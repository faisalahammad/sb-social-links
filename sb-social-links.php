<?php 
/**
 * Plugin Name: SB Social Links
 * Plugin URI: https://nexyta.com/plugin/sb-social-links
 * Description: SB Social links is a FREE plugin for use on any website.
 * Version: 1.0
 * Author: Faisal Ahammad
 * Author URI: https://nexyta.com
 * License: GPLv2 or later
 * Text Domain: sbsl
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

// Required Files
require_once ( plugin_dir_path(__FILE__) . '/inc/sb-social-links-scripts.php' );
require_once ( plugin_dir_path(__FILE__) . '/inc/sb-social-links-class.php' );

// Register Widget
function register_sb_social_links() {
	register_widget('Sb_Social_links_widget');
}
add_action('widgets_init', 'register_sb_social_links');