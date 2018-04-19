<?php
/**
 * @package hg-adsmanager
 */
namespace HG\Pages;

use HG\Base\BaseController;
use \HG\Base\Entities;

class Country extends BaseController {

    public function register(){
        $this->registerCountryPostAction();
    }
    
    public function registerCountryPostAction() {
        add_action( 'wp_ajax_country_form_post', array( $this, 'postCountryFormHandler') );
        add_action( 'wp_ajax_country_form_put', array( $this, 'putCountryFormHandler') );
    }

    public function postCountryFormHandler() {
        //wp_redirect( $_SERVER['HTTP_REFERER']);
        if($_POST["countryName"]) {
            $countryEntity = new Entities\CountryEntity();
            $countryEntity->add($_POST["countryName"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Country Name is empty', 500);
        }
    }

    public function putCountryFormHandler() {
        if($_POST["countryId"] && $_POST["countryName"] ) {
            $countryEntity = new Entities\CountryEntity();
            $countryEntity->update($_POST["countryId"], $_POST["countryName"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Country Name is empty', 500);
        }
    }
}