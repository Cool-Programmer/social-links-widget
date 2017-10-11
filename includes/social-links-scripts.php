<?php 
	function sl_scripts_enqueue()
	{
		wp_enqueue_style('sl-stylesheet', plugins_url() . '/social-links/css/style.css');
		wp_enqueue_script('sl-javascript', plugins_url() . '/social-links/js/main.js');
	}
	add_action('wp_enqueue_scripts', 'sl_scripts_enqueue');