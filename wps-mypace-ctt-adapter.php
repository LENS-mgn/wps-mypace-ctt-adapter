<?php

/**
 * Plugin Name:     WPS Mypace CTT Adapter
 * Plugin URI:      https://github.com/LENS-mgn/wps-mypace-ctt-adapter
 * Description:     Mypace Custom Title Tag support for WP SiteManager.
 * Author:          megane9988, Toro_Unit
 * Author URI:      https://www.m-g-n.me/
 * Text Domain:     wp-sitemanager-mypace-custom-title-tag-adapter
 * Domain Path:     /languages
 * Version:         0.2.0
 *
 * @package         WPS_Mypace_CTT_Adapter
 */

require 'classes/class-wps-mypace-ctt-adapter.php';

/**
 * Entry Point.
 */
function wps_mypace_ctt_adapter() {

	if ( class_exists( 'Mypace_Custom_Title_Tag' ) and class_exists( 'WP_SiteManager' ) ) {
		WPS_Mypace_CTT_Adapter::get_instance();
	}
}

add_action( 'plugins_loaded', 'wps_mypace_ctt_adapter' );
