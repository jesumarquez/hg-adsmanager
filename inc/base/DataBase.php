<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base;

class DataBase {
    public static function install() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hg_adsmanager_country';
        $charset_collate = $wpdb->get_charset_collate();
        
        define('HG_ADSMANAGER_DB_VERSION', 2);
        
        $sql[] = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            name tinytext NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";

        $table_name = $wpdb->prefix . 'hg_adsmanager_customer';
        $sql[] = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            name tinytext NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";

        $table_name = $wpdb->prefix . 'hg_adsmanager_publication';
        $sql[] = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            name tinytext NOT NULL,
            customer_id mediumint(9) NOT NULL,
            country_id mediumint(9) NOT NULL,
            active bool NOT NULL,
            image_url VARCHAR(2083) NOT NULL,
            call_to_action_url VARCHAR(2083) NOT NULL,
            start_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            finish_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
            ) $charset_collate;";

        require_once('../wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        update_option('HG_ADSMANAGER_DB_VERSION', HG_ADSMANAGER_DB_VERSION);
    }

    public static function uninstall() {
        global $wpdb;
        $tables_names = [
            'country', 
            'customer'
        ];

        foreach ($name as $tables_names) {
            $wpdb->query("DROP TABLE IF EXISTS $name");
        }

        if(get_option('HG_ADSMANAGER_DB_VERSION'))
            delete_option( 'HG_ADSMANAGER_DB_VERSION' );
    }
}
