<?php
/**
 * @package ng-adsmanager
 */
namespace HG\Base;

use \HG\Base\BaseController;

class Enqueue extends BaseController {
    
    public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    public function enqueue() {
        //enqueue all our scripts
        //wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' );
        wp_enqueue_script( 'hgcountryscript', $this->plugin_url . 'assets/country.js' );
    }

}