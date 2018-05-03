<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Pages;

use \HG\Base;
use \HG\Base\Entities;

class Publication_List_Table extends Base\WP_List_Table {
    var $data = [];
    var $publication_entity;

    public function __construct() {
		parent::__construct( array( 
            'plural'	=>	'publications',	// Plural value used for labels and the objects being listed.
            'singular'	=>	'publication',		// Singular label for an object being listed, e.g. 'post'.
            'ajax'		=>	false,		// If true, the parent class will call the _js_vars() method in the footer		
        ) );
        $this->publication_entity = new Entities\PublicationEntity();
    }
    
    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->data = $this->publication_entity->getAll();
        usort( $this->data, array( &$this, 'usort_reorder' ) );
        $this->items = $this->data;
    }
    
    public function get_columns() {
        $columns = array(
            'name' => 'Name',
            'customer' => 'Customer',
            'country' => 'Country',
            'active' => 'Active',
            'start_date' => 'Start Date',
            'finish_date' => 'Finish Date'
        );

        return $columns;        
    }
    
    function column_default ( $item, $column_name ) {
        switch ($column_name) {
            case 'name':
            case 'customer':
            case 'country':
            case 'start_date':
            case 'finish_date':
                return $item[ $column_name ];
            case 'active':
                $checked = $item[ $column_name ] == 1 ? 'checked' : '';
                return "<input type='checkbox' disabled='disabled' {$checked} />";
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
            'edit'      => sprintf('<a href="#" onclick="editPublication(%d, \'%s\')">Edit</a>', $item['id'], $item['name'] ),
            'delete'    => sprintf('<a href="#" onclick="deletePublication(%d)">Delete</a>', $item['id']),
        );

        return sprintf('%1$s %2$s', $item['name'], $this->row_actions($actions) );
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', false )
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
        _e( 'No publications found, dude.' );
    }
}