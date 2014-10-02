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
			'name'                => _x( 'Digests', 'Post Type General Name', 'digests' ),
			'singular_name'       => _x( 'Digest', 'Post Type Singular Name', 'digests' ),
			'menu_name'           => __( 'Digests', 'digests' ),
			'parent_item_colon'   => __( 'Parent:', 'digests' ),
			'all_items'           => __( 'All Digests', 'digests' ),
			'view_item'           => __( 'View Digest', 'digests' ),
			'add_new_item'        => __( 'Add New Digest', 'digests' ),
			'add_new'             => __( 'Add New', 'digests' ),
			'edit_item'           => __( 'Edit Digest', 'digests' ),
			'update_item'         => __( 'Update Digest', 'digests' ),
			'search_items'        => __( 'Search Digest', 'digests' ),
			'not_found'           => __( 'Not found', 'digests' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'digests' ),
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