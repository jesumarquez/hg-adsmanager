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
                code tinytext NOT NULL,
                active bool NOT NULL,
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

            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Afghanistan', 'code'=>'AF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Aland Islands', 'code'=>'AX', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Albania', 'code'=>'AL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Algeria', 'code'=>'DZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'American Samoa', 'code'=>'AS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Andorra', 'code'=>'AD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Angola', 'code'=>'AO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Anguilla', 'code'=>'AI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Antarctica', 'code'=>'AQ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Antigua and Barbuda', 'code'=>'AG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Argentina', 'code'=>'AR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Armenia', 'code'=>'AM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Aruba', 'code'=>'AW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Australia', 'code'=>'AU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Austria', 'code'=>'AT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Azerbaijan', 'code'=>'AZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bahamas', 'code'=>'BS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bahrain', 'code'=>'BH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bangladesh', 'code'=>'BD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Barbados', 'code'=>'BB', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Belarus', 'code'=>'BY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Belgium', 'code'=>'BE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Belize', 'code'=>'BZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Benin', 'code'=>'BJ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bermuda', 'code'=>'BM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bhutan', 'code'=>'BT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bolivia', 'code'=>'BO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bosnia and Herzegovina', 'code'=>'BA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Botswana', 'code'=>'BW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bouvet Island', 'code'=>'BV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Brazil', 'code'=>'BR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'British Virgin Islands', 'code'=>'VG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'British Indian Ocean Territory', 'code'=>'IO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Brunei Darussalam', 'code'=>'BN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Bulgaria', 'code'=>'BG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Burkina Faso', 'code'=>'BF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Burundi', 'code'=>'BI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cambodia', 'code'=>'KH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cameroon', 'code'=>'CM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Canada', 'code'=>'CA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cape Verde', 'code'=>'CV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cayman Islands', 'code'=>'KY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Central African Republic', 'code'=>'CF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Chad', 'code'=>'TD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Chile', 'code'=>'CL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'China', 'code'=>'CN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Hong Kong, SAR China', 'code'=>'HK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Macao, SAR China', 'code'=>'MO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Christmas Island', 'code'=>'CX', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cocos (Keeling) Islands', 'code'=>'CC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Colombia', 'code'=>'CO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Comoros', 'code'=>'KM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Congo (Brazzaville)', 'code'=>'CG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Congo, (Kinshasa)', 'code'=>'CD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cook Islands', 'code'=>'CK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Costa Rica', 'code'=>'CR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Côte d\'Ivoire', 'code'=>'CI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Croatia', 'code'=>'HR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cuba', 'code'=>'CU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Cyprus', 'code'=>'CY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Czech Republic', 'code'=>'CZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Denmark', 'code'=>'DK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Djibouti', 'code'=>'DJ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Dominica', 'code'=>'DM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Dominican Republic', 'code'=>'DO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Ecuador', 'code'=>'EC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Egypt', 'code'=>'EG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'El Salvador', 'code'=>'SV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Equatorial Guinea', 'code'=>'GQ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Eritrea', 'code'=>'ER', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Estonia', 'code'=>'EE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Ethiopia', 'code'=>'ET', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Falkland Islands (Malvinas)', 'code'=>'FK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Faroe Islands', 'code'=>'FO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Fiji', 'code'=>'FJ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Finland', 'code'=>'FI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'France', 'code'=>'FR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'French Guiana', 'code'=>'GF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'French Polynesia', 'code'=>'PF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'French Southern Territories', 'code'=>'TF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Gabon', 'code'=>'GA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Gambia', 'code'=>'GM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Georgia', 'code'=>'GE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Germany', 'code'=>'DE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Ghana', 'code'=>'GH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Gibraltar', 'code'=>'GI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Greece', 'code'=>'GR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Greenland', 'code'=>'GL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Grenada', 'code'=>'GD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guadeloupe', 'code'=>'GP', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guam', 'code'=>'GU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guatemala', 'code'=>'GT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guernsey', 'code'=>'GG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guinea', 'code'=>'GN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guinea-Bissau', 'code'=>'GW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Guyana', 'code'=>'GY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Haiti', 'code'=>'HT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Heard and Mcdonald Islands', 'code'=>'HM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Holy See (Vatican City State)', 'code'=>'VA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Honduras', 'code'=>'HN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Hungary', 'code'=>'HU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Iceland', 'code'=>'IS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'India', 'code'=>'IN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Indonesia', 'code'=>'ID', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Iran, Islamic Republic of', 'code'=>'IR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Iraq', 'code'=>'IQ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Ireland', 'code'=>'IE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Isle of Man', 'code'=>'IM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Israel', 'code'=>'IL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Italy', 'code'=>'IT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Jamaica', 'code'=>'JM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Japan', 'code'=>'JP', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Jersey', 'code'=>'JE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Jordan', 'code'=>'JO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Kazakhstan', 'code'=>'KZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Kenya', 'code'=>'KE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Kiribati', 'code'=>'KI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Korea (North)', 'code'=>'KP', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Korea (South)', 'code'=>'KR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Kuwait', 'code'=>'KW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Kyrgyzstan', 'code'=>'KG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Lao PDR', 'code'=>'LA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Latvia', 'code'=>'LV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Lebanon', 'code'=>'LB', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Lesotho', 'code'=>'LS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Liberia', 'code'=>'LR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Libya', 'code'=>'LY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Liechtenstein', 'code'=>'LI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Lithuania', 'code'=>'LT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Luxembourg', 'code'=>'LU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Macedonia, Republic of', 'code'=>'MK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Madagascar', 'code'=>'MG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Malawi', 'code'=>'MW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Malaysia', 'code'=>'MY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Maldives', 'code'=>'MV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mali', 'code'=>'ML', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Malta', 'code'=>'MT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Marshall Islands', 'code'=>'MH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Martinique', 'code'=>'MQ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mauritania', 'code'=>'MR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mauritius', 'code'=>'MU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mayotte', 'code'=>'YT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mexico', 'code'=>'MX', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Micronesia, Federated States of', 'code'=>'FM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Moldova', 'code'=>'MD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Monaco', 'code'=>'MC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mongolia', 'code'=>'MN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Montenegro', 'code'=>'ME', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Montserrat', 'code'=>'MS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Morocco', 'code'=>'MA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Mozambique', 'code'=>'MZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Myanmar', 'code'=>'MM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Namibia', 'code'=>'NA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Nauru', 'code'=>'NR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Nepal', 'code'=>'NP', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Netherlands', 'code'=>'NL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Netherlands Antilles', 'code'=>'AN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'New Caledonia', 'code'=>'NC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'New Zealand', 'code'=>'NZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Nicaragua', 'code'=>'NI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Niger', 'code'=>'NE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Nigeria', 'code'=>'NG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Niue', 'code'=>'NU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Norfolk Island', 'code'=>'NF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Northern Mariana Islands', 'code'=>'MP', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Norway', 'code'=>'NO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Oman', 'code'=>'OM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Pakistan', 'code'=>'PK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Palau', 'code'=>'PW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Palestinian Territory', 'code'=>'PS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Panama', 'code'=>'PA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Papua New Guinea', 'code'=>'PG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Paraguay', 'code'=>'PY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Peru', 'code'=>'PE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Philippines', 'code'=>'PH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Pitcairn', 'code'=>'PN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Poland', 'code'=>'PL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Portugal', 'code'=>'PT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Puerto Rico', 'code'=>'PR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Qatar', 'code'=>'QA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Réunion', 'code'=>'RE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Romania', 'code'=>'RO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Russian Federation', 'code'=>'RU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Rwanda', 'code'=>'RW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint-Barthélemy', 'code'=>'BL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint Helena', 'code'=>'SH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint Kitts and Nevis', 'code'=>'KN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint Lucia', 'code'=>'LC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint-Martin (French part)', 'code'=>'MF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint Pierre and Miquelon', 'code'=>'PM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saint Vincent and Grenadines', 'code'=>'VC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Samoa', 'code'=>'WS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'San Marino', 'code'=>'SM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Sao Tome and Principe', 'code'=>'ST', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Saudi Arabia', 'code'=>'SA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Senegal', 'code'=>'SN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Serbia', 'code'=>'RS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Seychelles', 'code'=>'SC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Sierra Leone', 'code'=>'SL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Singapore', 'code'=>'SG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Slovakia', 'code'=>'SK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Slovenia', 'code'=>'SI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Solomon Islands', 'code'=>'SB', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Somalia', 'code'=>'SO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'South Africa', 'code'=>'ZA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'South Georgia and the South Sandwich Islands', 'code'=>'GS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'South Sudan', 'code'=>'SS', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Spain', 'code'=>'ES', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Sri Lanka', 'code'=>'LK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Sudan', 'code'=>'SD', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Suriname', 'code'=>'SR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Svalbard and Jan Mayen Islands', 'code'=>'SJ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Swaziland', 'code'=>'SZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Sweden', 'code'=>'SE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Switzerland', 'code'=>'CH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Syrian Arab Republic (Syria)', 'code'=>'SY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Taiwan, Republic of China', 'code'=>'TW', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tajikistan', 'code'=>'TJ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tanzania, United Republic of', 'code'=>'TZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Thailand', 'code'=>'TH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Timor-Leste', 'code'=>'TL', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Togo', 'code'=>'TG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tokelau', 'code'=>'TK', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tonga', 'code'=>'TO', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Trinidad and Tobago', 'code'=>'TT', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tunisia', 'code'=>'TN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Turkey', 'code'=>'TR', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Turkmenistan', 'code'=>'TM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Turks and Caicos Islands', 'code'=>'TC', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Tuvalu', 'code'=>'TV', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Uganda', 'code'=>'UG', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Ukraine', 'code'=>'UA', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'United Arab Emirates', 'code'=>'AE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'United Kingdom', 'code'=>'GB', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'United States of America', 'code'=>'US', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'US Minor Outlying Islands', 'code'=>'UM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Uruguay', 'code'=>'UY', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Uzbekistan', 'code'=>'UZ', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Vanuatu', 'code'=>'VU', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Venezuela (Bolivarian Republic)', 'code'=>'VE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Viet Nam', 'code'=>'VN', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Virgin Islands, US', 'code'=>'VI', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Wallis and Futuna Islands', 'code'=>'WF', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Western Sahara', 'code'=>'EH', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Yemen', 'code'=>'YE', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Zambia', 'code'=>'ZM', 'active' => 0) );
            $wpdb->insert( $country_table_name, array('time'=> current_time('mysql'), 'name'=>'Zimbabwe', 'code'=>'ZW', 'active' => 0) );

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
            'publication',
            'country', 
            'customer'
        ];

        foreach ($tables_names as $name) {
            $tbl_name = $wpdb->prefix . 'hg_adsmanager_' . $name;
            $wpdb->query("DROP TABLE IF EXISTS $tbl_name");
        }

        if(get_option('HG_ADSMANAGER_DB_VERSION'))
            delete_option( 'HG_ADSMANAGER_DB_VERSION' );
    }
}
