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
    function adminCity() {
        return require_once( "$this->plugin_path/templates/country.php" );
    }
}