<?php
namespace HG\Widgets;

/**
 * @package hg-adsmanager
 */


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
        
        $publicationEntity = new \HG\Base\Entities\PublicationEntity();
        $publication = $publicationEntity->getById(3);
    //     $ipaddress = '';
    // if (getenv('HTTP_CLIENT_IP'))
    //     $ipaddress = getenv('HTTP_CLIENT_IP');
    // else if(getenv('HTTP_X_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    // else if(getenv('HTTP_X_FORWARDED'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED');
    // else if(getenv('HTTP_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_FORWARDED_FOR');
    // else if(getenv('HTTP_FORWARDED'))
    //     $ipaddress = getenv('HTTP_FORWARDED');
    // else if(getenv('REMOTE_ADDR'))
    //     $ipaddress = getenv('REMOTE_ADDR');
    // else
    //     $ipaddress = 'UNKNOWN';
        echo "<img src='{$publication->image_url}' />";
        
        echo $args['after_widget'];
    }
}