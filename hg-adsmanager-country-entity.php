<?php

class HG_AdsManager_Country {
    private $table_name;
    private $wpdb;
    public function __construct(){
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'hg_adsmanager_country';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $this->table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate;";
        
        require_once('../wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public function getAll(){
        $result = $this->wpdb->get_results("SELECT name FROM {$this->table_name}", OBJECT );
        return $result;
    }

    public function add($name){
        $this->wpdb->insert(
            $this->table_name, 
            array(
                'time' => current_time('mysql'),
                'name' => $name
            )
        );        
    }
}
?>