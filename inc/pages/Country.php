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
        try {
            if($_POST["countryName"]
            && $_POST["code"] 
            && ($_POST["active"] == "1"  || $_POST["active"] == "0")
            ) {
                $countryEntity = new Entities\CountryEntity();
                $countryEntity->add($_POST["countryName"], $_POST["code"], $_POST["active"]);
                wp_send_json_success( 'OK' );
            }
            else{
                wp_send_json_error('Country Name is empty', 500);
            }
        }
        catch ( \Exception $e ) {
            \error_log('HG AdsManger ' . $e->__toString());
            wp_send_json_error('Ocurrio un error inesperado al intentar agregar el país' , 500);
        }
    }

    public function putCountryFormHandler() {
        if($_POST["countryId"] 
        && $_POST["countryName"] 
        && $_POST["code"]
        && ($_POST["active"] == "1"  || $_POST["active"] == "0")) {
            $countryEntity = new Entities\CountryEntity();
            $countryEntity->update($_POST["countryId"], $_POST["countryName"], $_POST["code"], $_POST["active"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Some parameters are empty', 500);
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