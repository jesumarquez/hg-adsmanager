<?php
/**
 * @package ng-adsmanager
 */
namespace HG\Base;

use \HG\Base\BaseController;

class ErrorHandler extends BaseController {
    
    public function register() {
        set_exception_handler( array( $this, 'hg_exception_handler') );
    }

    public function hg_exception_handler($e) {
        \error_log('HG AdsManger ' . $e->__toString());
        wp_send_json_error( 'Ocurrio un error inesperado', 500);
    }
}