<?php
/*
Plugin Name: WhatConverts
Plugin URI: http://wordpress.org/extend/plugins/whatconverts/
Description: Enables <a href="http://www.whatconverts.com/">WhatConverts</a> on all pages.
Version: 1.0.1
Author: WhatConverts
Author URI: http://www.whatconverts.com/
*/
	  
if (!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR',plugins_url());
	  
function activate_whatconverts() {
	add_option('account_id', '00000');
}

function deactive_whatconverts() {
	delete_option('account_id');
}

function admin_init_whatconverts() {
	register_setting('whatconverts', 'account_id');
}

function admin_menu_whatconverts() {
	add_options_page('WhatConverts', 'WhatConverts', 'manage_options', 'whatconverts', 'options_page_whatconverts');
}

function options_page_whatconverts() {
	include(WP_PLUGIN_DIR.'/whatconverts/options.php');  
}

function whatconverts() {
	$account_id = get_option('account_id');
	wp_enqueue_script( 'whatconverts-tracking-script', '//scripts.whatconverts.com/account/' . $account_id . '.js', array(), '', true );

}

register_activation_hook(__FILE__, 'activate_whatconverts');
register_deactivation_hook(__FILE__, 'deactive_whatconverts');

if (is_admin()) {
	add_action('admin_init', 'admin_init_whatconverts');
	add_action('admin_menu', 'admin_menu_whatconverts');
}

if (!is_admin()) {
	add_action('wp_enqueue_scripts', 'whatconverts');
}
?>