<?php

class WP_Digests {

	protected $loader;
	protected $WP_Digests;
	protected $version;

	public function __construct() {

		$this->plugin_name = 'wp-digests';
		$this->version = '0.1.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/loader.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/i18n.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/admin.class.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/public.class.php';

		$this->loader = new WP_Digests_Loader();

	}

	private function set_locale() {

		$plugin_i18n = new WP_Digests_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		$plugin_admin = new WP_Digests_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'custom_post_type' );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'custom_post_type_metaboxes' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'save_custom_post_type_metaboxes' );
		$this->loader->add_action( 'wp_ajax_extract_data', $plugin_admin, 'extract_data' );

	}

	private function define_public_hooks() {

		$plugin_public = new WP_Digests_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_filter( 'template_include', $plugin_public, 'custom_post_type_template', 1 );

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
	
	public function Markdown($text) {
		include_once( plugin_dir_path( __FILE__ ) . '../lib/Parsedown/Parsedown.php' );
		$Parsedown = new Parsedown();
		
		return $Parsedown->setBreaksEnabled(true)->text($text);
		
	}

}