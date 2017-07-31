<?php
/**
 * Plugin Name: SW Lists
 * Plugin URI: http://www.beaverlodgehq.com
 * Description: Add custom lists in Beaver Builder.
 * Version: 1.0.0
 * Author: Jon Mather
 * Author URI: http://www.simplewebsiteinaday.com.au
 */

define( 'SW_LISTS_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'SW_LISTS_MODULE_URL', plugins_url( '/', __FILE__ ) );

function sw_lists_module() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'includes/bb-sw-lists-module.php';
    }
}
add_action( 'init', 'sw_lists_module' );
