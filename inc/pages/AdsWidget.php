<?php
/**
 * @package hg-adsmanager
 */
namespace HG\Pages;

use HG\Base\BaseController;
// use HG\Widgets\AdsManager_Widget;

class AdsWidget extends BaseController {

    public function register(){
        add_action( 'widgets_init', array($this, 'register_ads_widget'));
    }

    public function register_ads_widget() {
        register_widget( '\\HG\\Widgets\\AdsManager_Widget' );
    }
}