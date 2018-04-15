<?php

/**
 * @package hg-adsmanager
 */

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// clear database stored data
HG\Base\DataBase::uninstall();