<?php
/**
 * @package hg-adsmanager
 */
namespace HG\Pages;

use HG\Base\BaseController;
use \HG\Base\Entities;

class Publication extends BaseController {
    public function register() {
        add_action( 'wp_ajax_publication_form_post', array( $this, 'postPublicationFormHandler') );
    }

    public function postPublicationFormHandler() {
        if( $_POST["publicationName"] &&
            $_POST["customerId"] &&
            $_POST["countryId"] &&
            $_POST["imageUrl"] &&
            $_POST["callToActionUrl"] &&
            $_POST["startDate"] &&
            $_POST["endDate"] &&
            $_POST["active"]  
        ) {
            $publicationEntity = new Entities\PublicationEntity();
            $publicationEntity->add(
                $_POST["publicationName"],
                $_POST["customerId"],
                $_POST["countryId"],
                $_POST["imageUrl"],
                $_POST["callToActionUrl"],
                $_POST["startDate"],
                $_POST["endDate"],
                $_POST["active"] 
            );      
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Some parameters are empty', 500);
        }    
    }
}