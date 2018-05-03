<?php
/**
 * @package hg-adsmanager
 */

namespace HG\Base;

class DataBase {
    public static function install() {
        global $wpdb;
        
        $country_table_name     = $wpdb->prefix . 'hg_adsmanager_country';
        $customer_table_name    = $wpdb->prefix . 'hg_adsmanager_customer';
        $publication_table_name = $wpdb->prefix . 'hg_adsmanager_publication';

        $charset_collate = $wpdb->get_charset_collate();
        
        define('HG_ADSMANAGER_DB_VERSION', 3);
        $installed_db_version = get_option('HG_ADSMANAGER_DB_VERSION');

        if(! $installed_db_version )
        {
            // COUNTRY
            $sql[] = "CREATE TABLE $country_table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                name tinytext NOT NULL,
                PRIMARY KEY  (id)
                ) $charset_collate;";

            // CUSTOMER
            $sql[] = "CREATE TABLE $customer_table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                name tinytext NOT NULL,
                PRIMARY KEY  (id)
                ) $charset_collate;";

            // PUBLICATION
            $sql[] = "CREATE TABLE $publication_table_name (
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

            $sql2 = "ALTER TABLE `$publication_table_name`
            ADD CONSTRAINT `FK_hg_adsmanager_publication_customer` FOREIGN KEY (`customer_id`) REFERENCES `$customer_table_name` (`id`)";
            $wpdb->query($sql);

            $sql2 = "ALTER TABLE `$publication_table_name`
            ADD CONSTRAINT `FK_hg_adsmanager_publication_country` FOREIGN KEY (`country_id`) REFERENCES `$country_table_name` (`id`)";
            $wpdb->query($sql);
        }
        else {
            switch ($installed_db_version) {
                case '2':
                    $sql = "ALTER TABLE `$publication_table_name`
                    ADD CONSTRAINT `FK_hg_adsmanager_publication_customer` FOREIGN KEY (`customer_id`) REFERENCES `$customer_table_name` (`id`)";
                    $wpdb->query($sql);
        
                    $sql = "ALTER TABLE `$publication_table_name`
                    ADD CONSTRAINT `FK_hg_adsmanager_publication_country` FOREIGN KEY (`country_id`) REFERENCES `$country_table_name` (`id`)";
                    $wpdb->query($sql);

                break;
                default:
                    # code...
                    break;
            }
        }
        
        update_option('HG_ADSMANAGER_DB_VERSION', HG_ADSMANAGER_DB_VERSION);
    }

    public static function uninstall() {
        global $wpdb;
        $tables_names = [
            'country', 
            'customer',
            'publication'
        ];

        foreach ($name as $tables_names) {
            $wpdb->query("DROP TABLE IF EXISTS $name");
        }

        if(get_option('HG_ADSMANAGER_DB_VERSION'))
            delete_option( 'HG_ADSMANAGER_DB_VERSION' );
    }
}
