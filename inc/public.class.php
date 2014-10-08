<?php

class WP_Digests_Public {

	private $name;
	private $version;

	public function __construct( $name, $version ) {

		$this->name = $name;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->name, plugin_dir_url( dirname(__FILE__) ) . 'css/public.css', array(), $this->version, 'all' );
		
		$custom_css .= '#digest .item{background: '.get_option('wp_digests_item_background').';}';
        wp_add_inline_style( $this->name, $custom_css );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->name, plugin_dir_url( dirname(__FILE__) ) . 'js/public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function custom_post_type_template( $template_path ) {
		
		if ( get_post_type() == 'digest' ) {
			if ( is_single() ) {
				if ( $theme_file = locate_template( array ( 'single-digest.php' ) ) ) {
					$template_path = $theme_file;
				} else {
					$template_path = plugin_dir_path( __FILE__ ) . 'tpl/single-digest.php';
				}
			} elseif( is_archive() ) {
				if ( $theme_file = locate_template( array ( 'archive-digest.php' ) ) ) {
					$template_path = $theme_file;
				} else {
					$template_path = plugin_dir_path( __FILE__ ) . 'tpl/archive-digest.php';
				}
			}
		}
		return $template_path;
		
	}

}