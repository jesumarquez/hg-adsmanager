<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base\Entities;

class CountryEntity {
    private $table_name;
    private $wpdb;

    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'hg_adsmanager_country';
    }

    public function getAll(){
        $result = $this->wpdb->get_results("SELECT id, name, code, active FROM {$this->table_name}", ARRAY_A );
        return $result;
    }

    public function getAllActived() {
        $result = $this->wpdb->get_results("SELECT id, name, code, active FROM {$this->table_name} WHERE active = 1", ARRAY_A );
        return $result;
    }

    public function add($name, $code, $active){
        $this->wpdb->insert(
            $this->table_name, 
            array(
                'time' => current_time('mysql'),
                'name' => $name,
                'code' => $code,
                'active' => $active
            )
        );        
    }

    public function delete($id){
        // error_log('plugin error countryid: ' . $id, 3, 'c:/temp/php.log');
        $this->wpdb->delete(
            $this->table_name,
            array( 'id' => $id),
            array( '%d' )
        );
    }

    public function update($id, $name, $code, $active) {
        $this->wpdb->update(
            $this->table_name,
            array( 
                'name' => $name, 
                'code' => $code,
                'active' => $active
             ),
            array( 'id' => $id )
        );
    }
}