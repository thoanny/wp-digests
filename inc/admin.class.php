<?php

class WP_Digests_Admin {

	private $name;
	private $version;

	public function __construct( $name, $version ) {

		$this->name = $name;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function custom_post_type() {
	
		$labels = array(
			'name'                => _x( 'Digests', 'Post Type General Name', 'wp-digests' ),
			'singular_name'       => _x( 'Digest', 'Post Type Singular Name', 'wp-digests' ),
			'menu_name'           => __( 'Digests', 'wp-digests' ),
			'parent_item_colon'   => __( 'Parent:', 'wp-digests' ),
			'all_items'           => __( 'All Digests', 'wp-digests' ),
			'view_item'           => __( 'View Digest', 'wp-digests' ),
			'add_new_item'        => __( 'Add New Digest', 'wp-digests' ),
			'add_new'             => __( 'Add New', 'wp-digests' ),
			'edit_item'           => __( 'Edit Digest', 'wp-digests' ),
			'update_item'         => __( 'Update Digest', 'wp-digests' ),
			'search_items'        => __( 'Search Digest', 'wp-digests' ),
			'not_found'           => __( 'Not found', 'wp-digests' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'wp-digests' ),
		);
		$args = array(
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'digest', $args );
		
	}

}