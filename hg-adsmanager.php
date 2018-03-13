<?php
/**
 * Plugin Name: Ads Manager
 * Plugin URI: http://hornerogeek.com.ar/adsmanager
 * Description: Administrador de adsense.
 * Version: 1.0.0
 * Author: Jesú Márquez
 * Author URI: http://hornerogeek.com.ar/adsmanager
 * Requires at least: 4.0
 * Tested up to: 4.3
 *
 * Text Domain: adsmanager
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) or die( '¡Sin trampas!' );

require_once('hg-adsmanager-country-entity.php');

/**
 * FILTER
 */
add_filter( 'the_title', 'hg_change_title', 10, 2 );
function hg_change_title( $title, $id ) {
  $title = '[Exclusiva] ' . $title;
  return $title;
}


/**
 * PLUGIN PAGE
 */
add_action('admin_menu', 'hg_adsmanager_menu');

function hg_adsmanager_menu(){
    add_menu_page('Ads Manager', 'Ads Manager', 'manage_options', 'ng-adsmanager-country', 'hg_adsmanager_country_page');
    add_submenu_page('ng-adsmanager-country', 'Ads Manager - Country', 'Country', 'manage_options','ng-adsmanager-country', 'hg_adsmanager_country_page');
    add_submenu_page('ng-adsmanager-country', 'Ads Manager - Customer', 'Customer', 'manage_options','ng-adsmanager-customer', 'hg_adsmanager_customer_page');
}

function hg_adsmanager_country_page(){
    $countryObj = new HG_AdsManager_Country();
    $post_type = $_POST['post_type'];

    if(isset($post_type)){
        switch ($post_type) {
            case 'post':
                $countryObj->add($_POST['country-name']);
                break;
            
            default:
                # code...
                break;
        }
    }

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
                            <input type="hidden" name="post_type" value="post">
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
                                                <a href="edit-tags.php?action=delete&amp;taxonomy=category&amp;tag_ID=2&amp;_wpnonce=774b873b26" class="delete-tag aria-button-if-js" aria-label="Delete “prueba”" role="button">Delete</a>
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


/**
 * WIDGET
 */
add_action( 'widgets_init', function(){
    register_widget( 'HG_AdsManager_Widget' );
});

class HG_AdsManager_Widget extends WP_Widget {
    // class constructor
	public function __construct() {
        $widget_ops = array( 
            'classname' => 'hg_adsmanager_widget',
            'description' => 'Administrador de Adsense',
        );
        parent::__construct( 'hg_adsmanager', 'Ads Manager', $widget_ops );        
    }
	
	// output the widget content on the front-end
	public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
            <img src="<?php echo plugins_url( 'images/test.png', __FILE__ )  ?>"/>
        <?php
        echo $args['after_widget'];
    }

	// output the option form field in admin Widgets screen
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
        <?php esc_attr_e( 'Title:', 'text_domain' ); ?>
        </label> 
        
        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php        
    }

	// save options
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
