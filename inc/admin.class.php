<?php

class WP_Digests_Admin {

	private $name;
	private $version;

	public function __construct( $name, $version ) {

		$this->name = $name;
		$this->version = $version;

	}

	public function enqueue_styles() {

		wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) . '../css/admin.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . '../js/admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_settings(){
		add_option( 'wp_digests_embedly_api_key', '');
		register_setting( 'default', 'wp_digests_embedly_api_key' );
	}
	
	public function register_options_page(){
		add_options_page( __('Options des résumés', 'wp-digests'), __('Digests', 'wp-digests'), 'manage_options', 'wp-digests-options', 'WP_Digests_Admin::options_page');
	}
	
	public function options_page(){
		// http://blog.wphub.com/creating-simple-options-page/
		include_once( plugin_dir_path( __FILE__ ) . 'tpl/options.php' );
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
			'menu_icon'			  => 'dashicons-index-card',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'			  => array('slug' => 'digests'),
		);
		register_post_type( 'digest', $args );
		
	}
	
	public function custom_post_type_metaboxes() {
		add_meta_box('digest_items', __('Liens/Objets/...'), 'WP_Digests_Admin::custom_post_type_metaboxes_content', 'digest', 'normal', 'core');
	}
	
	public function custom_post_type_metaboxes_content(){
		global $post;
		$digest_items = get_post_meta($post->ID, 'digest_items', true);
		
		wp_nonce_field( 'custom_post_type_metaboxes_nonce', 'custom_post_type_metaboxes_nonce' );

		include_once( plugin_dir_path( __FILE__ ) . 'tpl/metabox-digest.php' );
	}
	
	public function save_custom_post_type_metaboxes($post_id){
		// src: https://gist.github.com/helenhousandi/1593065/download#
		
		if ( ! isset( $_POST['custom_post_type_metaboxes_nonce'] ) || ! wp_verify_nonce( $_POST['custom_post_type_metaboxes_nonce'], 'custom_post_type_metaboxes_nonce' ) )
			return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;
		if (!current_user_can('edit_post', $post_id))
			return;
		
		$old = get_post_meta($post_id, 'digest_items', true);
		$new = array();
		
		$thumbnails = $_POST['thumbnail'];
		$provider_names = $_POST['provider_name'];
		$provider_urls = $_POST['provider_url'];
		$types = $_POST['type'];
		$urls = $_POST['url'];
		$titles = $_POST['title'];
		$comments = $_POST['comment'];
		$descriptions = $_POST['description'];
		$count = count( $titles );
		
		for ( $i = 0; $i < $count; $i++ ) {
			if ( $titles[$i] != '' ) :
				$new[$i]['title'] = stripslashes( strip_tags( $titles[$i] ) );
				$new[$i]['url'] = stripslashes( $urls[$i] );
				$new[$i]['thumbnail'] = stripslashes( $thumbnails[$i] );
				$new[$i]['provider_name'] = stripslashes( strip_tags( $provider_names[$i] ) );
				$new[$i]['provider_url'] = stripslashes( $provider_urls[$i] );
				$new[$i]['type'] = stripslashes( strip_tags( $types[$i] ) );
				$new[$i]['description'] = stripslashes( strip_tags( $descriptions[$i] ) );
				$new[$i]['comment'] = stripslashes( strip_tags( $comments[$i] ) );
			endif;
		}
		 
		if ( !empty( $new ) && $new != $old )
			update_post_meta( $post_id, 'digest_items', $new );
		elseif ( empty($new) && $old )
			delete_post_meta( $post_id, 'digest_items', $old );
	}
	
	public function extract_data() {
		echo $_POST;
		die();
	}

}