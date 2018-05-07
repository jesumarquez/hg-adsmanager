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
        add_action( 'wp_ajax_publication_form_put', array( $this, 'putPublicationFormHandler') );
        add_action( 'wp_ajax_publication_form_delete', array( $this, 'deletePublicationFormHandler') );
    }

    public function postPublicationFormHandler() {
        if( $_POST["publicationName"] &&
            $_POST["customerId"] &&
            $_POST["countryId"] &&
            $_POST["imageUrl"] &&
            $_POST["callToActionUrl"] &&
            $_POST["startDate"] &&
            $_POST["endDate"] &&
            ($_POST["active"] == "1"  || $_POST["active"] == "0")
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

    public function putPublicationFormHandler() {
        if( $_POST["id"] &&
            $_POST["publicationName"] &&
            $_POST["customerId"] &&
            $_POST["countryId"] &&
            $_POST["imageUrl"] &&
            $_POST["callToActionUrl"] &&
            $_POST["startDate"] &&
            $_POST["endDate"] &&
            ($_POST["active"] == "1"  || $_POST["active"] == "0") 
        ) {
            $publicationEntity = new Entities\PublicationEntity();
            $publicationEntity->update(
                $_POST["id"],
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

    public function deletePublicationFormHandler() {
        if( $_POST["id"] ) {
            $publicationEntity = new Entities\PublicationEntity();
            $publicationEntity->delete( $_POST["id"] );      
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Some parameters are empty', 500);
        }             
    }
}