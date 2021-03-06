<?php
/**
 * Class OGPTest
 *
 * @package WP_SiteManager_Mypace_Custom_Title_Tag_Adapter
 */

/**
 * OGP test case.
 */
class OGPTest extends WP_UnitTestCase {

	public function test_og_title() {
		$post_id = $this->factory->post->create( array(
			'post_title' => 'Hello OGP!',
		) );

		update_post_meta( $post_id, 'mypace_title_tag', 'OGP Title' );
		$this->expectOutputRegex( '/<meta property="og:title" content="OGP Title" \/>/' );
		$this->go_to( get_permalink( $post_id ) );
		wp_head();
	}

	public function test_og_title_when_not_set() {
		$post_id = $this->factory->post->create( array(
			'post_title' => 'Hello OGP!',
		) );
		$this->expectOutputRegex( '/<meta property="og:title" content="Hello OGP!" \/>/' );
		$this->go_to( get_permalink( $post_id ) );
		wp_head();
	}

	public function test_titter_title() {
		$post_id = $this->factory->post->create( array(
			'post_title' => 'Hello Twitter!',
		) );
		update_post_meta( $post_id, 'mypace_title_tag', 'Twitter Title' );
		$this->expectOutputRegex( '/<meta name="twitter:title" content="Twitter Title" \/>/' );
		$this->go_to( get_permalink( $post_id ) );
		wp_head();
	}

	public function test_titter_title_when_not_set() {
		$post_id = $this->factory->post->create( array(
			'post_title' => 'Hello Twitter!',
		) );
		$this->expectOutputRegex( '/<meta name="twitter:title" content="Hello Twitter!" \/>/' );
		$this->go_to( get_permalink( $post_id ) );
		wp_head();
	}

}

