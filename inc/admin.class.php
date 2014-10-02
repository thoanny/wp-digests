<?php

class Plugin_Name_Admin {

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

}