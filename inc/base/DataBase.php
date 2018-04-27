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
        
        require_once('../wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public static function uninstall() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'hg_adsmanager_country';
        // $wpdb->query("DROP TABLE IF EXISTS $table_name");
        $table_name = $wpdb->prefix . 'hg_adsmanager_customer';
        // $wpdb->query("DROP TABLE IF EXISTS $table_name");
    }
}
