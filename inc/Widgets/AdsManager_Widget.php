<?php
namespace HG\Widgets;

/**
 * @package hg-adsmanager
 */

use GeoIp2\Database\Reader;

class AdsManager_Widget extends \WP_Widget {
    // class constructor
	public function __construct() {
        $widget_ops = array( 
            'classname' => 'hg_adsmanager_widget',
            'description' => 'Administrador de Adsense',
        );
        parent::__construct( 'hg_adsmanager', 'Ads Manager', $widget_ops );        
    }
	
	// output the widget content on the front-end
	public function widget( $args, $instance ) {
        echo $args['before_widget'];

        //get country code
        $ipaddress = '201.216.208.145'; // $this->get_client_ip();
        $country_code = $this->get_country_code( $ipaddress );        
        
        $publicationEntity = new \HG\Base\Entities\PublicationEntity();
        $publication = $publicationEntity->getById(3);

        echo "<img src='{$publication->image_url}' />";
        
        echo $args['after_widget'];
    }

    function get_client_ip() {
        $ipaddress = '';
        
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');

        return $ipaddress;
    }

    function get_country_code( $ip ) {
        $result = null;

        try {
            $plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
            $reader = new Reader( $plugin_path . 'inc/geoip2/GeoLite2-Country.mmdb' );
            $result = $reader->country( $ip )->country->isoCode;
        } catch (\Exception $e) {
            // handle the exception
        }
        return $result;
    }
}