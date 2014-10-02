<?php

/**
 * Plugin Name: 	Digests
 * Plugin URI: 		http://you.an-d.me
 * Description: 	...
 * Version: 		0.1
 * Author: 			Anthony Destenay
 * Author URI: 		http://you.an-d.me
 * License: 		GPL-2.0+
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:		wp-digests
 * Domain Path:		/lang
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'inc/activation.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/deactivation.php';

register_activation_hook( __FILE__, array( 'WP_Digests_Activation', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Digests_Deactivation', 'deactivate' ) );