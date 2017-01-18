<?php

/**
 * Plugin Name:     Wp q Mypace Custom Title Tag Adapter
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     wp-sitemanager-mypace-custom-title-tag-adapter
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wp_SiteManager_Mypace_Custom_Title_Tag_Adapter
 */
class Wp_SiteManager_Mypace_Custom_Title_Tag_Adapter {


	/**
	 * Wp_SiteManager_Mypace_Custom_Title_Tag_Adapter constructor.
	 */
	public function __construct() {

		//add_action( 'plugins_loaded')

		if ( class_exists( 'Mypace_Custom_Title_Tag' ) and class_exists( 'WP_SiteManager' ) ) {

			add_action( 'wp_sitemanager_open_graph_tags', array( $this, 'wp_sitemanager_open_graph_tags' ) );
			add_action( 'wp_sitemanager_twitter_cards_tags', array( $this, 'wp_sitemanager_twitter_cards_tags' ) );
		}

	}
}



function wp_sitemanager_mypace_custom_title_tag_adapter() {
	if ( class_exists( 'Mypace_Custom_Title_Tag' ) and class_exists( 'WP_SiteManager' ) ) {

	}
}

add_action( 'plugins_loaded', 'wp_sitemanager_mypace_custom_title_tag_adapter');
