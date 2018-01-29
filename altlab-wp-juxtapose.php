<?php
/* Plugin Name: ALTLab WP Juxtapose
 * Version: 1.0.2
 * Author: Jeff Everhart
 * Author URI: http://altlab.vcu.edu/team-members/jeff-everhart/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Description: This plugin is a wrapper for the Knight Lab Juxtapose tool that uses the WordPress media library and renders images using shortcodes
 *
 *
*/


// Add CSS and JS

require_once(plugin_dir_path(__FILE__) . '/classes/altlab-wp-juxtapose.php');

$ALTLabWPJuxtapose = new ALTLabWPJuxtapose();



function altlab_wp_juxtapose_load_admin_scripts($hook){

	if($hook !== 'toplevel_page_altlab_wp_juxtapose'){
		return;
	}
	wp_enqueue_style('bootstrap-css', plugins_url('/css/bootstrap-custom.css', __FILE__));
	wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'altlab_wp_juxtapose_load_admin_scripts' );


?>
