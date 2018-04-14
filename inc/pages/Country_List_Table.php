<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Pages;

use \HG\Base;

class Country_List_Table extends Base\WP_List_Table {
    var $example_data = [];
    // var $example_data = array (
    //     array('ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell',
    //         'isbn' => '978-0982514542'),
    //     array('ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
    //         'isbn' => '0312384378'),
    //     array('ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
    //         'isbn' => '978-1905548927'),
    //     array('ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
    //         'isbn' => '978-0979621130'),
    //     array('ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
    //         'isbn' => '978-0061988929'),
    //     array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
    //         'isbn' => '978-0307454355')
    // );

    public function __construct() {
		parent::__construct( array( 
            'plural'	=>	'countries',	// Plural value used for labels and the objects being listed.
            'singular'	=>	'country',		// Singular label for an object being listed, e.g. 'post'.
            'ajax'		=>	false,		// If true, the parent class will call the _js_vars() method in the footer		
        ) );
    }
    
    public function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        usort( $this->example_data, array( &$this, 'usort_reorder' ) );
        $this->items = $this->example_data;
    }
    
    public function get_columns() {
        $columns = array(
            'name' => 'Name'
        );

        return $columns;        
    }
    
    function column_default ( $item, $column_name ) {
        switch ($column_name) {
            case 'name':
                return $item[ $column_name ];
            default:
                return print_r( $item, true );
        }
    }

    function column_name($item) {
        $actions = array(
                  'edit'      => sprintf('<a href="?page=%s&action=%s&country=%s">Edit</a>',$_REQUEST['page'],'edit',$item['ID']),
                  'delete'    => sprintf('<a href="?page=%s&action=%s&country=%s">Delete</a>',$_REQUEST['page'],'delete',$item['ID']),
              );
      
        return sprintf('%1$s %2$s', $item['name'], $this->row_actions($actions) );
    }
    
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', false ),
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
        _e( 'No countries found, dude.' );
    }
}