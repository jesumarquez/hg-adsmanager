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
    
    function adminNewPublication() {
        $action = 'new';
        $disabled = '';
        $readonly = '';
        $id                 = '';
        $name               = '';
        $customerId         = ' ';
        $countryId          = '';
        $imageUrl           = '';
        $callToActionUrl    = '';
        $startDate          = '';
        $finishDate         = '';
        $activeChecked      = '';

        return require_once( "$this->plugin_path/templates/publication-view.php" );
    }

    function adminViewPublication() {
        $action = 'view';
        $disabled = 'disabled="disabled"';
        $readonly = 'readonly="readonly"';
        $id = $_GET["id"];
        
        $publicationEntity = new \HG\Base\Entities\PublicationEntity();
        $publication = $publicationEntity->getById( $id );
        
        $name               = $publication->name;
        $customerId         = $publication->customer_id;
        $countryId          = $publication->country_id;
        $imageUrl           = $publication->image_url;
        $callToActionUrl    = $publication->call_to_action_url;
        $startDate          = date_format(date_create($publication->start_date), 'Y-m-d');
        $finishDate         = date_format(date_create($publication->finish_date), 'Y-m-d');
        $activeChecked      = $publication->active == '1' ? 'checked' : '';

        return require_once( "$this->plugin_path/templates/publication-view.php" );
    }

    function adminEditPublication() {
        $action = 'edit';
        $disabled = '';
        $readonly = '';
        $id = $_GET["id"];
        
        $publicationEntity = new \HG\Base\Entities\PublicationEntity();
        $publication = $publicationEntity->getById( $id );
        
        $name               = $publication->name;
        $customerId         = $publication->customer_id;
        $countryId          = $publication->country_id;
        $imageUrl           = $publication->image_url;
        $callToActionUrl    = $publication->call_to_action_url;
        $startDate          = date_format(date_create($publication->start_date), 'Y-m-d');
        $finishDate         = date_format(date_create($publication->finish_date), 'Y-m-d');
        $activeChecked      = $publication->active == '1' ? 'checked' : '';

        return require_once( "$this->plugin_path/templates/publication-view.php" );        
    }

    function adminDeletePublication() {
        $action = 'delete';
        $disabled = 'disabled="disabled"';
        $readonly = 'readonly="readonly"';
        $id = $_GET["id"];
        
        $publicationEntity = new \HG\Base\Entities\PublicationEntity();
        $publication = $publicationEntity->getById( $id );
        
        $name               = $publication->name;
        $customerId         = $publication->customer_id;
        $countryId          = $publication->country_id;
        $imageUrl           = $publication->image_url;
        $callToActionUrl    = $publication->call_to_action_url;
        $startDate          = date_format(date_create($publication->start_date), 'Y-m-d');
        $finishDate         = date_format(date_create($publication->finish_date), 'Y-m-d');
        $activeChecked      = $publication->active == '1' ? 'checked' : '';

        return require_once( "$this->plugin_path/templates/publication-view.php" );        
    }
}