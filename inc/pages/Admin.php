<?php
/**
 * @package hg-adsmanager
 */
namespace HG\Pages;

use HG\Base\BaseController;
use HG\Api\Settings;
use HG\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

    public $settings;
    public $callbacks;
    public $pages;
    public $subpages;

    public function register() {
        $this->settings = new Settings();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        
        $this->setSubPages();

        $this->registerAdminPostAction();

        $this->settings
            ->addPages( $this->pages )
            ->withSubPage( 'Dashboard' )
            ->addSubPages( $this->subpages )
            ->register();
    }

    public function setPages() {
        $this->pages = [
            [
                'page_title'    => 'Ads Manager',
                'menu_title'    => 'HG Ads Manager',
                'capability'    => 'manage_options',
                'menu_slug'     => 'hg_adsmanager',
                'callback'      => array( $this->callbacks, 'adminDashboard' ),
                'icon_url'      => 'dashicons-images-alt',
                'position'      => 110
            ]
        ];
    }

    public function setSubPages() {
        $this->subpages =  [
            [
                'parent_slug'   => 'hg_adsmanager',
                'page_title'    => 'HG Ads Manager',
                'menu_title'    => 'Country',
                'capability'    => 'manage_options',
                'menu_slug'     => 'hg_adsmanager_country',
                'callback'      => array( $this->callbacks, 'adminCountry') 
            ]
        ];
    }

    public function registerAdminPostAction() {
        // add_action('admin_post_noprov_contact_form', array( $this, 'contactFormPostHandler'));
        // add_action('admin_post_contact_form', array( $this, 'contactFormPostHandler'));
        add_action( 'wp_ajax_example_plugin_post', array( $this, 'contactFormPostHandler') );
        add_action('admin_notices', array( $this, 'shapeSpace_add_settings_errors' ) );
        
    }

    public function contactFormPostHandler() {
        // wp_redirect( $_SERVER['HTTP_REFERER']);
        echo $_POST["whatever"];
        wp_die('error');
    }

    // display default admin notice
    function shapeSpace_add_settings_errors() {
        
        settings_errors();
        /**ob_start(); ?>
            <div class="notice notice-success is-dismissible">
                <p>Message</p>
            </div>
        <?php
        echo ob_get_clean();
        */
    }
}