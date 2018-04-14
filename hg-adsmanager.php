<?php
/**
 * Plugin Name: Ads Manager
 * Plugin URI: http://hornerogeek.com.ar/adsmanager
 * Description: Administrador de adsense.
 * Version: 0.1.0
 * Author: Jesú Márquez
 * Author URI: http://hornerogeek.com.ar/adsmanager
 *
 * Text Domain: hg-adsmanager
 * Domain Path: /languages/
 * @package hg-adsmanager
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// activation
function activate_adsmanager_plugin() {
    HG\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_adsmanager_plugin' );


// deactivate
function deactivate_adsmanager_plugin() {
    HG\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_adsmanager_plugin' );

// registration
if( class_exists( 'Inc\\Init' ) ) { 
    HG\Init::register_services();
}


/* PLUGIN PAGE
add_action('admin_menu', 'hg_adsmanager_menu');

function hg_adsmanager_menu(){
    add_menu_page('Ads Manager', 'Ads Manager', 'manage_options', 'ng-adsmanager-country', 'hg_adsmanager_country_page');
    add_submenu_page('ng-adsmanager-country', 'Ads Manager - Countries', 'Countries', 'manage_options','ng-adsmanager-country', 'hg_adsmanager_country_page');
    add_submenu_page('ng-adsmanager-country', 'Ads Manager - Customers', 'Customers', 'manage_options','ng-adsmanager-customer', 'hg_adsmanager_customer_page');
}
require_once('hg-adsmanager-country-entity.php');
require_once('hg-adsmanager-widget.php');
require_once('../wp-includes/pluggable.php');

$countryObj = new HG_AdsManager_Country();
$hg_post_type = $_POST['hg_post_type'];
$wp_list_table = _get_list_table('WP_Terms_List_Table');

if(isset($hg_post_type) && $hg_post_type == 'post'){
    $countryObj->add($_POST['country-name']);
}
else{
    switch ($wp_list_table->current_action()) {
        case 'delete':
            if(isset($_REQUEST['country_ID'])){
                $countryObj->delete($_REQUEST['country_ID']);
                wp_redirect('admin.php?&page=ng-adsmanager-country', 202);
            }
            break;
        default:
            # code...
            break;
    }       
}

function hg_adsmanager_country_page(){
    $countryObj = new HG_AdsManager_Country();
    $countries = $countryObj->getAll();
    
   ?>
    <div class="wrap nosubsub">
        <h1 class="wp-heading-inline">Country</h1>
        <hr class="wp-header-end">
        <div id="col-container" class="wp-clearfix">
            
            <!--LEFT-->
            <div id="col-left">
                <div class="col-wrap">
                    <div class="form-wrap">
                        <h2>Add New Country</h2>
                        <form action="" id="addcountry" class="validate" method="post">
                            <input type="hidden" name="page" value="ng-adsmanager-country">
                            <input type="hidden" name="hg_post_type" value="post">
                            <div class="form-field form-required term-name-wrap">
                                <label for="country-name">Name</label>
                                <input name="country-name" id="country-name" type="text" value="" size="40" aria-required="true">
                            </div>
                            <p class="submit">
                                <input type="submit" name="submit" id="submit" class="button button-primary" value="Add New Country">
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <!--RIGHT-->
            <div id="col-right">
                <div class="col-wrap">
                    <h2 class="screen-reader-text">Countries List</h2>
                    <table class="wp-list-table widefat fixed striped tags">
                        <thead>
                            <tr>
                                <td id="cb" class="manage-column column-cb check-column">
                                    <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                                    <input id="cb-select-all-1" type="checkbox">
                                </td>
                                <th scope="col" id="name" class="manage-column column-name column-primary sortable desc">
                                    <a href="http://localhostz:8088/WP/wp-admin/edit-tags.php?taxonomy=category&amp;orderby=name&amp;order=asc">
                                    <span>Name</span>
                                    <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="the-list" data-wp-lists="list:tag">
                            
                            <?php foreach($countries as $country) { ?><!-- foreach countries -->

                                <tr id="tag-1">
                                    <th scope="row" class="check-column">&nbsp;</th>
                                    <td class="name column-name has-row-actions column-primary" data-colname="Name">
                                        <strong>
                                            <a class="row-title" href="http://localhostz:8088/WP/wp-admin/term.php?taxonomy=category&amp;tag_ID=1&amp;post_type=post&amp;wp_http_referer=%2FWP%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory" aria-label="“Argentina” (Edit)"><?php echo $country->name ?></a>
                                        </strong>
                                        <br>
                                        <div class="hidden" id="inline_1">
                                            <div class="name"><?php echo $country->name ?></div>
                                            <div class="slug"><?php echo $country->name ?></div>
                                            <div class="parent">0</div>
                                        </div>
                                        <div class="row-actions">
                                            <span class="edit">
                                                <a href="http://localhostz:8088/WP/wp-admin/term.php?taxonomy=category&amp;tag_ID=1&amp;post_type=post&amp;wp_http_referer=%2FWP%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory" aria-label="Edit “Argentina”">Edit</a> | 
                                            </span>
                                            <span class="inline hide-if-no-js">
                                                <a href="#" class="editinline aria-button-if-js" aria-label="Quick edit “Argentina” inline" role="button">Quick&nbsp;Edit</a> | 
                                            </span>
                                            <span class="delete">
                                                <a href="admin.php?action=delete&amp;page=ng-adsmanager-country&amp;country_ID=<?php echo $country->id ?>" class="delete-tag aria-button-if-js" aria-label="Delete “<?php echo $country->name ?>”" role="button">Delete</a>
                                            </span>
                                            <span class="view">
                                                <a href="http://localhostz:8088/WP/category/Argentina/" aria-label="View “Argentina” archive">View</a>
                                            </span>
                                        </div>
                                        <button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button>
                                    </td>

                                </tr>
                            
                            <?php } ?><!-- end foreach categories -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="manage-column column-cb check-column">
                                    <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
                                    <input id="cb-select-all-2" type="checkbox">
                                </td>
                                <th scope="col" class="manage-column column-name column-primary sortable desc">
                                    <a href="http://localhostz:8088/WP/wp-admin/edit-tags.php?taxonomy=category&amp;orderby=name&amp;order=asc">
                                        <span>Name</span>
                                        <span class="sorting-indicator"></span>
                                    </a>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
   <?php
}

 */
/*
 * WIDGET

add_action( 'widgets_init', function(){
    register_widget( 'HG_AdsManager_Widget' );
});

 */
