<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base\Entities;

class CustomerEntity {
    private $table_name;
    private $wpdb;

    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'hg_adsmanager_customer';
    }

    public function getAll(){
        $countryTable = $this->wpdb->prefix . 'hg_adsmanager_country';
        $result = $this->wpdb->get_results("SELECT cust.id, cust.name, country_id, country.name country_name FROM {$this->table_name} cust INNER JOIN {$countryTable} country ON country.id = cust.country_id", ARRAY_A );
        return $result;
    }

    public function add($name, $countryId){
        $this->wpdb->insert(
            $this->table_name, 
            array(
                'time' => current_time('mysql'),
                'name' => $name,
                'country_id' => $countryId
            )
        );        
    }

    public function delete($id){
        // error_log('plugin error customerid: ' . $id, 3, 'c:/temp/php.log');
        $this->wpdb->delete(
            $this->table_name,
            array( 'id' => $id),
            array( '%d' )
        );
    }

    public function update($id, $name, $countryId) {
        $this->wpdb->update(
            $this->table_name,
            array( 
                'name' => $name, 
                'country_id' => $countryId 
            ),
            array( 'id' => $id )
        );
    }
}