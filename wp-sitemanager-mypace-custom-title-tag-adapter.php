<?php

/**
 * Plugin Name:     WP SiteManager Mypace Custom Title Tag Adapter
 * Plugin URI:      https://github.com/LENS-mgn/wp-sitemanager-mypace-custom-title-tag-adapter
 * Description:     Mypace Custom Title Tag support for WP SiteManager.
 * Author:          megane9988, Toro_Unit
 * Author URI:      https://www.m-g-n.me/
 * Text Domain:     wp-sitemanager-mypace-custom-title-tag-adapter
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_SiteManager_Mypace_Custom_Title_Tag_Adapter
 */

require 'classes/class-wp-sitemanager-mypace-custom-title-tag-adapter.php';

/**
 * Entry Point.
 */
function wp_sitemanager_mypace_custom_title_tag_adapter() {

	if ( class_exists( 'Mypace_Custom_Title_Tag' ) and class_exists( 'WP_SiteManager' ) ) {
		WP_SiteManager_Mypace_Custom_Title_Tag_Adapter::get_instance();
	}
}

add_action( 'plugins_loaded', 'wp_sitemanager_mypace_custom_title_tag_adapter' );
