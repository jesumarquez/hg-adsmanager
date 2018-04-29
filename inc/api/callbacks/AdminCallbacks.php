<?php
/**
 * @package ExamplePlugin
 */

namespace HG\Api\Callbacks;

use HG\Base\BaseController;

class AdminCallbacks extends BaseController {
    function adminDashboard() {
        return require_once( "$this->plugin_path/templates/admin.php" );
    }
    function adminCountry() {
        return require_once( "$this->plugin_path/templates/country.php" );
    }
    function adminCustomer() {
        return require_once( "$this->plugin_path/templates/customer.php" );
    }
    function adminPublication() {
        return require_once( "$this->plugin_path/templates/publication.php" );
    }
}