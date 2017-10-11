<?php
/*
*	Plugin name: Social Links Widget
*	Plugin URI: http://www.iodevllc.com
*	Description: Add social icons with links to profiles.
* 	Version: 0.1 beta
*	Author:	Mher Margaryan
*	Author URI: iodevllc.com
*/

// Exit if direct
if (!defined('ABSPATH')) {
	exit("You are not allowed to be here!");
}

// Load scripts
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-scripts.php');

// Load the class file
require_once(plugin_dir_path(__FILE__) . '/includes/social-links-class.php');

// Register the widget
function register_social_links()
{
	register_widget('SL_Widget');
}
add_action('widgets_init', 'register_social_links');