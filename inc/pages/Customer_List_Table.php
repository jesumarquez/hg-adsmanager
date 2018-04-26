<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Pages;

use \HG\Base;
use \HG\Base\Entities;

class Customer_List_Table extends Base\WP_List_Table {
    var $data = [];
    var $customer_entity;

    public function __construct() {
		parent::__construct( array( 
            'plural'	=>	'customers',	// Plural value used for labels and the objects being listed.
            'singular'	=>	'customer',		// Singular label for an object being listed, e.g. 'post'.
            'ajax'		=>	false,		// If true, the parent class will call the _js_vars() method in the footer		
        ) );
        $this->customer_entity = new Entities\CustomerEntity();
    }
    
    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->data = $this->customer_entity->getAll();
        usort( $this->data, array( &$this, 'usort_reorder' ) );
        $this->items = $this->data;
    }
    
    public function get_columns() {
        $columns = array(
            'name' => 'Name',
            'country_name' => 'Country'
        );

        return $columns;        
    }
    
    function column_default ( $item, $column_name ) {
        switch ($column_name) {
            case 'name':
            case 'country_id':
            case 'country_name':
                return $item[ $column_name ];
            default:
                return print_r( $item, true );
        }
    }

    function column_name($item) {
        // $actions = array(
        //           'edit'      => sprintf('<a href="?page=%s&action=%s&country=%s">Edit</a>',$_REQUEST['page'],'edit',$item['ID']),
        //           'delete'    => sprintf('<a href="?page=%s&action=%s&country=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ID']),
        //       );
        $actions = array(
            'edit'      => sprintf('<a href="#" onclick="editCustomer(%d, \'%s\', %d)">Edit</a>', $item['id'], $item['name'], $item['country_id']),
            'delete'    => sprintf('<a href="#" onclick="deleteCustomer(%d)">Delete</a>', $item['id']),
        );

        return sprintf('%1$s %2$s', $item['name'], $this->row_actions($actions) );
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', false ),
            'country_name' => array( 'country_name', false ),
        );
        return $sortable_columns;
    }

    function usort_reorder( $a, $b ) {
        // If no sort, default to title
        $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'name';
        // If no order, default to asc
        $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
        // Determine sort order
        $result = strcmp( $a[$orderby], $b[$orderby] );
        // Send final sort direction to usort
        return ( $order === 'asc' ) ? $result : -$result;
    }

    function no_items() {
        _e( 'No customers found, dude.' );
    }
}