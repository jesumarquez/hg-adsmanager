<?php
/**
 * Plugin Name: HG Ads Manager
 * Plugin URI: http://hornerogeek.com.ar/adsmanager
 * Description: Administrador de adsense.
 * Version: 0.1.0
 * Author: Jesú Márquez
 * Author URI: http://hornerogeek.com.ar/adsmanager
 *
 * Text Domain: hg-adsmanager
 * Domain Path: /languages/
 * @package hg-adsmanager
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// activation
function activate_adsmanager_plugin() {
    HG\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_adsmanager_plugin' );


// deactivate
function deactivate_adsmanager_plugin() {
    HG\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_adsmanager_plugin' );

// registration
if( class_exists( 'Inc\\Init' ) ) { 
    HG\Init::register_services();
}
