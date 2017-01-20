<?php

class WP_SiteManager_Mypace_Custom_Title_Tag_Adapter {

	private static $instance = null;

	/**
	 * @return static
	 */
	final public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * @throws Exception
	 */
	final private function __clone() {
		throw new Exception( 'You can not clone a singleton.' );
	}

	final private function __construct() {
		static::initialize();
	}

	protected function initialize() {
		$this->register_hooks();
	}

	public function register_hooks() {
		add_filter( 'wp_sitemanager_open_graph_tags', array( $this, 'wp_sitemanager_open_graph_tags' ) );
		add_filter( 'wp_sitemanager_twitter_cards_tags', array( $this, 'wp_sitemanager_twitter_cards_tags' ) );
	}

	/**
	 * @param array $og_tags
	 *
	 * @return array
	 */
	public function wp_sitemanager_open_graph_tags( array $og_tags ) {

		if ( ! isset( $og_tags['og:title'] ) ) {
			$og_tags['og:title'] = '';
		}
		$og_tags['og:title'] = $this->custom_title( $og_tags['og:title'] );
		return $og_tags;
	}

	/**
	 * @param array $tc_tags
	 *
	 * @return array
	 */
	public function wp_sitemanager_twitter_cards_tags( array $tc_tags ) {

		if ( ! isset( $tc_tags['twitter:title'] ) ) {
			$tc_tags['twitter:title'] = '';
		}
		$tc_tags['twitter:title'] = $this->custom_title( $tc_tags['twitter:title'] );
		return $tc_tags;
	}

	/**
	 *
	 * @see Mypace_Custom_Title_Tag::custom_title()
	 * @param $title
	 *
	 * @return string
	 */
	public static function custom_title( $title ) {
		if ( is_singular() ) {
			$post_id = get_the_ID();
			$my_title = get_post_meta( $post_id, 'mypace_title_tag', true );
			if ( $my_title ) {
				return esc_html( $my_title );
			}
		}
		return $title;
	}

}
