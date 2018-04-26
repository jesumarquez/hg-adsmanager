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
        add_action( 'wp_ajax_country_form_delete', array( $this, 'deleteCountryFormHandler') );
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

    public function deleteCountryFormHandler() {
        if($_POST["countryId"]) {
            $countryEntity = new Entities\CountryEntity();
            $countryEntity->delete($_POST["countryId"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Id expected', 500);
        }
    }
}