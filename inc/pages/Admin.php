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
            ],
            [
                'parent_slug'   => 'hg_adsmanager',
                'page_title'    => 'HG Ads Manager',
                'menu_title'    => 'Customer',
                'capability'    => 'manage_options',
                'menu_slug'     => 'hg_adsmanager_customer',
                'callback'      => array( $this->callbacks, 'adminCustomer') 
            ],
            [
                'parent_slug'   => 'hg_adsmanager',
                'page_title'    => 'HG Ads Manager',
                'menu_title'    => 'Publications',
                'capability'    => 'manage_options',
                'menu_slug'     => 'hg_adsmanager_publication',
                'callback'      => array( $this->callbacks, 'adminPublication') 
            ],
            [
                'parent_slug'   => 'hg_adsmanager_publication',
                'page_title'    => 'HG Ads Manager',
                'menu_title'    => 'New Publication',
                'capability'    => 'manage_options',
                'menu_slug'     => 'hg_adsmanager_new_publication',
                'callback'      => array( $this->callbacks, 'adminNewPublication') 
            ]
        ];
    }
}