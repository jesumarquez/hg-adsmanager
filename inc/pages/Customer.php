<?php
/**
 * @package hg-adsmanager
 */
namespace HG\Pages;

use HG\Base\BaseController;
use \HG\Base\Entities;

class Customer extends BaseController {

    public function register(){
        $this->registerCustomerPostAction();
    }
    
    public function registerCustomerPostAction() {
        add_action( 'wp_ajax_customer_form_post', array( $this, 'postCustomerFormHandler') );
        add_action( 'wp_ajax_customer_form_put', array( $this, 'putCustomerFormHandler') );
        add_action( 'wp_ajax_customer_form_delete', array( $this, 'deleteCustomerFormHandler') );
    }

    public function postCustomerFormHandler() {
        //wp_redirect( $_SERVER['HTTP_REFERER']);
        if($_POST["customerName"] && $_POST["countryId"]) {
            $customerEntity = new Entities\CustomerEntity();
            $customerEntity->add($_POST["customerName"], $_POST["countryId"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Some parameters are empty', 500);
        }
    }

    public function putCustomerFormHandler() {
        if($_POST["customerId"] && $_POST["customerName"] && $_POST["countryId"] ) {
            $customerEntity = new Entities\CustomerEntity();
            $customerEntity->update($_POST["customerId"], $_POST["customerName"], $_POST["countryId"] );
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Some parameters are empty', 500);
        }
    }

    public function deleteCustomerFormHandler() {
        if($_POST["customerId"]) {
            $customerEntity = new Entities\CustomerEntity();
            $customerEntity->delete($_POST["customerId"]);
            wp_send_json_success( 'OK' );
        }
        else{
            wp_send_json_error('Id expected', 500);
        }
    }
}